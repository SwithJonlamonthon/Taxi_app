<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class ApiController extends Controller
{

    /**
     * Validate and get the uploaded file.
     *
     * @param string $name
     * @param Request|null $request
     * @return array|UploadedFile|null
     */
    protected function getValidatedUpload($name, $request = null)
    {
        if (is_null($request)) {
            $request = request();
        }

        if ($request->hasFile($name)) {
            if (($uploadedFile = $request->file($name)) && $uploadedFile->isValid()) {
                return $uploadedFile;
            }
        }

        return null;
    }
}
