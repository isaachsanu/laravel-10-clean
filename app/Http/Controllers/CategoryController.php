<?php
namespace App\Http\Controllers;

use App\Domain\Contracts\Repositories\CategoryRepositoryInterface;
use App\Http\Requests\CategoryCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $data = $this->categoryRepository->all([]);
        return response()->json(['data' => $data]);
    }
    
    public function create(CategoryCreateRequest $request)
    {
        $create['name'] = $request->name;
        $data = $this->categoryRepository->create($create);
        return response()->json([
            'message' => 'create category success',
            'data' => $data
        ]);
    }
    
    public function update($id, CategoryCreateRequest $request)
    {
        $update['name'] = $request->name;
        $data = $this->categoryRepository->update($update, $id);
        return response()->json([
            'message' => 'update category success',
            'data' => $data
        ]);
    }
    
    public function delete($id)
    {
        $data = $this->categoryRepository->delete($id);
        return response()->json([
            'message' => 'delete category success'
        ]);
    }
}