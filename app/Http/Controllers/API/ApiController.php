<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kodewbit\LibriVox\Contracts\LibriVox;

abstract class ApiController extends Controller
{
    /**
     * Current API version.
     *
     * @type string
     */
    const VERSION = '1.0.0';

    /**
     * LibriVox Service Instance.
     *
     * @var LibriVox
     */
    public $librivox;

    /**
     * ApiController constructor.
     *
     * @param LibriVox $librivox
     */
    public function __construct(LibriVox $librivox)
    {
        $this->librivox = $librivox;
    }

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
