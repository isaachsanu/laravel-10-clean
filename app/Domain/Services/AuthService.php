<?php
namespace App\Domain\Services;

use App\Domain\Contracts\Repositories\UserRepositoryInterface;
use App\Domain\Contracts\Services\AuthServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthService implements AuthServiceInterface
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(array $data): void
    {
        // Validate the input data
        // ...
        
        // Create a new user
        $user = $this->userRepository->create($data);
        
        // Additional actions after registration
        // ...
    }

    public function login(array $data): bool
    {
        // Attempt to authenticate the user
        if (Auth::attempt($data)) {
            return true;
        }
        
        throw ValidationException::withMessages([
            'email' => ['Invalid credentials.'],
        ]);
    }

    public function logout(): void
    {
        Auth::logout();
    }
}
