<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Repositories\CategoryRepository\CategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
    }

    public function index()
    {
        $title = 'لیست دسته بندی محصولات';
        $categories=$this->categoryRepository->all();
        return view('admin.category.index', compact('title','categories'));
    }

    public function create()
    {
        $title = 'تعریف دسته بندی جدید';
        $categories = $this->categoryRepository->all();
        return view('admin.category.create', compact('title', 'categories'));
    }

    public function store(Request $request)
    {
        $category = $this->categoryRepository->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'category_type' => $request->category_type
        ]);
        if($category && $category instanceof Category){
            return redirect()->back()->with('success','دسته مورد نظر شما با موفقیت ثبت گردید');
        }
    }

    public function getCategoriesOfCategoryTypeNum(Request $request)
    {
        $categoryTypeNumber = $request->catTypeNum;
        $categoryOfThisType = $this->categoryRepository->all()->where('category_type', $categoryTypeNumber);
        $subCategory = view('admin.category.showsubcategory.showsubcategory', compact('categoryOfThisType'))->render();
        return $subCategory;
    }
}
