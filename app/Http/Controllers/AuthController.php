<?php
namespace App\Http\Controllers;

use App\Domain\Contracts\Services\AuthServiceInterface;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterUserRequest $request)
    {
        $this->authService->register($request->all());
        return response()->json([
            'code' => 200,
            'message' => 'Registration Success',
        ]);
    }

    public function login(LoginUserRequest $request)
    {
        try{
            $this->authService->login($request->all());
        }catch(ValidationException $e){
            return response()->json([
                'code' => 401,
                'message' => 'Unauthorized',
            ]);
        }
        
        return response()->json([
            'code' => 200,
            'message' => 'Login Success',
            'token' => '',
        ]);
    }

    public function logout()
    {
        $this->authService->logout();
    }
}
