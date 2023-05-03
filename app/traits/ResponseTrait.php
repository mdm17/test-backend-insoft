<?php

namespace App\Traits;

trait ResponseTrait
{
    public function returnResponse(object $data = null, string $message, int $code)
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ], $code);
    }
}
