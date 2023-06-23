<?php
namespace App\Domain\Contracts\Services;

interface AuthServiceInterface
{
    public function register(array $data): void;

    public function login(array $credentials): bool;

    public function logout(): void;
}
