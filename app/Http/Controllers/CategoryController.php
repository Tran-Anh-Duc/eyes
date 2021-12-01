<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $userId = Auth::user()->id;
        $categories = $this->categoryRepository->getByUserId($userId);
        return view('backend.category.list',compact('categories'));

    }

    public function showFormCreate()
    {
        return view('backend.category.create');
    }

    public function store(CreateCategoryRequest $request)
    {
        $category =$this->categoryRepository->create($request);
        return redirect()->route('categories.index');
    }

    public function showDetail($id)
    {
        $category = $this->categoryRepository->getById($id);
        return view('backend.category.detail',compact('category'));
    }

    public function destroy($id)
    {
        $category = $this->categoryRepository->getById($id);
        $this->categoryRepository->delete($id);
        return redirect()->route('categories.index');
    }

    public function showFormEdit($id)
    {
        $category = $this->categoryRepository->getById($id);
        return view('backend.category.edit',compact('category'));
    }

    public function update(Request $request,$id)
    {
        $category = $this->categoryRepository->edit($request,$id);
        return redirect()->route('categories.index');
    }


}
