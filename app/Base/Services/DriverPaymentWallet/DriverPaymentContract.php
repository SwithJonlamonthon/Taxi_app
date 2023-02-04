<?php

namespace App\Base\Services\DriverPaymentWallet;
use Illuminate\Http\Request;
use Intervention\Image\Image;

interface DriverPaymentContract {
	/**
	 * Encode the image and return the resource handle.
	 *
	 * @param mixed $file
	 * @param bool $autoScale
	 * @return Image
	 */
	 /**
     * Add wallet
     */
    public function addDriverMoneyToWallet(Request $request);

}
