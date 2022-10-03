<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function SuccessResponse($message, $model = null, $successCode = 200) {
        $response_json = [
            'status' => 'Success',
            'message' => $message,
        ];

        if ($model) {
            $response_json = [
                'status' => 'Success',
                'message' => $message,
                'data' => $model
            ];
        }

        return response()->json($response_json , $successCode);
    }

    public function SuccessPaginateResponse($message, $model = null, $successCode = 200){

        $paginator = [
            'data' => $model->items(),
            'meta' => [
                'current_page' => $model->currentPage(),
                'last_page' => $model->lastPage(),
                'per_page' => $model->perPage(),
                'total' => $model->total(),
            ]
        ];

        $response_json = [
            'status' => 'Success',
            'message' => $message,
            'data' => $paginator,
        ];

        return response()->json($response_json , $successCode);
    }

    public function ErrorResponse($message, $errorCode = 400) {
        $response_json = [
            'status' => 'Error',
            'message' => $message,
        ];

        return response()->json($response_json, $errorCode);
    }

    public function AuthorizationResponse($message, $user, $token){
        $response_json = [
            'status' => 'success',
            'user' => $user,
            'message' => $message,
            'authorization' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ];

        return response()->json($response_json, 200);
    }
}
