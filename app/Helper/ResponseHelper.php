<?php

namespace App\Helper;

use Illuminate\Http\JsonResponse;

class ResponseHelper
{
    public static function Out(bool $success, $data, int $code): JsonResponse
    {

        return response()->json(['success' => $success, 'data' => $data], $code);

    }
}
