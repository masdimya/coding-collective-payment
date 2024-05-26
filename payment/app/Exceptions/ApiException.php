<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;


class ApiException extends Exception
{
    public function __construct($message = "Internal Server Error", $code = 500)
    {
        parent::__construct($message, $code);
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function render(Request $request)
    {
        return response()->json([
            'error' => 'Internal Server Error',
            'message' => $this->getMessage()
        ], $this->getCode());
    }
}
