<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GeneralJsonException extends Exception
{
    public function render(Request $request)
    {
        return new JsonResponse([
            'error' => $this->getMessage(),
            'result' => null
        ], $this->code);
    }
}
