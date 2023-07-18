<?php
namespace App\Domain\Contracts\Repositories;

use App\Domain\Entities\Category;
use Illuminate\Support\Collection;

interface CategoryRepositoryInterface
{
    public function all(array $params): Collection;

    public function create(array $data): Category;

    public function findById(int $id): ?Category;
    
    public function update(array $data, int $id): Category;
    
    public function delete(int $id): bool;
}
