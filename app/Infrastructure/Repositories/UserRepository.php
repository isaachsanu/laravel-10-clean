<?php
namespace App\Infrastructure\Repositories;

use App\Domain\Contracts\Repositories\UserRepositoryInterface;
use App\Domain\Entities\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function create(array $data): User
    {
        // Create and save a new user entity
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        $user->fresh();
        return $user;
    }

    public function findByEmail(string $email): ?User
    {
        // Find the user by email
        $user = User::where('email', $email)->first();
        return $user;
    }
}
