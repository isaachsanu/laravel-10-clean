<?php
namespace App\Domain\Contracts\Repositories;

use App\Domain\Entities\User;

interface UserRepositoryInterface
{
    public function create(array $data): User;

    public function findByEmail(string $email): ?User;
}
