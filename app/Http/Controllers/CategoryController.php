<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getAll()
    {
        $categories = Category::all();
        return view('category.list',compact('categories'));
    }

    public function showFormAdd()
    {
        return view('category.add');
    }

    public function addCategory(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->type = $request->type;
        $category->save();
        return redirect()->route('categories.list');
    }

}
