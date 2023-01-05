<?php

namespace App\Http\Controllers;

use App\DTO\LoginDTO;
use App\Service\LoginService;
use App\Service\RegisterService;
use Illuminate\Http\Request;
use Validator;
use App\DTO\RegisterDTO;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    /**
     * Register api
     *
     * @param Request $request
     * @param RegisterService $registerService
     * @return JsonResponse
     */
    public function register(Request $request, RegisterService $registerService): JsonResponse
    {
        $success = $registerService->run(RegisterDTO::make($request));
        return response()->json([$success, 'message' => 'User register successfully.']);
    }

    /**
     * Login api
     *
     * @param Request $request
     * @param LoginService $loginService
     * @return JsonResponse
     */
    public function login(Request $request, LoginService $loginService): JsonResponse
    {
        $message = $loginService->run(LoginDTO::make($request));
        return response()->json([$message]);
    }
}
