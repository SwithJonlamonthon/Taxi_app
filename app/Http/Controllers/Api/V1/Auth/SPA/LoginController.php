<?php

namespace App\Http\Controllers\Api\V1\Auth\SPA;

use App\Base\Constants\Auth\Role;
use App\Http\Controllers\Api\V1\Auth\LoginController as BaseLoginController;
use App\Http\Requests\Auth\SendLoginOTPRequest;
use App\Http\Requests\Auth\UserLoginRequest;
use Illuminate\Http\JsonResponse;
use Log;

class LoginController extends BaseLoginController
{
    /**
     * Login the normal user.
     *
     * @param UserLoginRequest $request
     * @return JsonResponse
     */
    public function loginSpaUser(UserLoginRequest $request)
    {
        return $this->loginUserAccount($request, Role::USER, [], false);
    }

    /**
     * Send the OTP for user login.
     *
     * @param SendLoginOTPRequest $request
     * @return JsonResponse
     */
    public function sendUserLoginOTP(SendLoginOTPRequest $request)
    {
        $field = 'mobile';

        $mobile = $request->input($field);

        $user = $this->resolveUserFromMobile($mobile, Role::USER);

        $this->validateUser($user, "User with that mobile number doesn't exist.", $field);

        if (!$user->createOTP()) {
            $this->throwSendOTPErrorException($field);
        }

        $otp = $user->getCreatedOTP();
        /*
                     * Send OTP here
                     * Temporary logger
        */
        Log::info("Login OTP for {$mobile} is : {$otp}");

        return $this->respondSuccess(['uuid' => $user->getCreatedOTPUuid()]);
    }
}
