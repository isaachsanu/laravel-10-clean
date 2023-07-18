<?php
namespace App\Infrastructure\Repositories;

use App\Domain\Contracts\Repositories\CategoryRepositoryInterface;
use App\Domain\Entities\Category;
use Illuminate\Support\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all(array $params): Collection
    {
        return Category::all();
    }

    public function create(array $data): Category
    {
        return Category::create($data);
    }

    public function findById(int $id): ?Category
    {
        return Category::find($id);
    }
      
    public function update(array $data, int $id): Category
    {
        $model = Category::where('id', $id)->first();
        $model->name = $data['name'];
        $model->save();

        return $model;
    }
    
    public function delete(int $id): bool
    {
        $category = Category::find($id);
        return $category->delete();
    }
}