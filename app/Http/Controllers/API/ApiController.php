<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class ApiController extends Controller
{
    /**
     * Current API version.
     */
    const VERSION = '1.0.0';

    /**
     * Determine if the request wants extended information.
     *
     * @param Request $request
     * @return bool
     */
    public function wantsExtendedInformation(Request $request)
    {
        return $request->filled('extended') && $request->boolean('extended');
    }
}
