<?php

namespace App\Http\Controllers\Api\V1\Authentication;

use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\Authentication\LoginRequest;
use App\Http\Requests\Authentication\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends BaseApiController
{

    /**
     * @OA\Post(
     *      path="/v1/login",
     *      operationId="login",
     *      tags={"Authentication"},
     *      summary="Login",
     *      description="Returns access token",
     *      @OA\RequestBody(
     *          required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(type="object", ref="#/components/schemas/LoginRequest")
     *         )
     *      ),
     *      @OA\Response(response=200, description="Successful operation", @OA\JsonContent()),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=401, description="Unauthenticated"),
     *      @OA\Response(response=403, description="Forbidden")
     * )
     */
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        $data = [...$user->toArray(), 'token' => $token]; 

        return response()->json($data, 200);
    }

    /**
     * @OA\Post(
     *      path="/v1/register",
     *      operationId="register",
     *      tags={"Authentication"},
     *      summary="Register",
     *      description="Returns access token",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(type="object", ref="#/components/schemas/RegisterRequest")
     *          )
     *      ),
     *      @OA\Response(response=200, description="Successful operation", @OA\JsonContent()),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=401, description="Unauthenticated"),
     *      @OA\Response(response=403, description="Forbidden")
     * )
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());

        $token = $user->createToken('auth_token')->plainTextToken;

        $data = [...$user->toArray(), 'token' => $token]; 

        return response()->json($data, 201);
    }

    /**
     * @OA\Post(
     *      path="/v1/logout",
     *      operationId="logout",
     *      tags={"Authentication"},
     *      summary="Logout",
     *      description="Logout",
     *      @OA\Response(response=200, description="Successful operation", @OA\JsonContent()),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=401, description="Unauthenticated"),
     *      @OA\Response(response=403, description="Forbidden")
     * )
     */
    public function logout()
    {
        User::current()->tokens()->delete();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
