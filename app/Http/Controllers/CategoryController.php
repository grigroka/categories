<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('parent_id', '=', 0)->get();
        $allCategories = Category::pluck('title', 'id')->all();

        return view('index')->with('categories', $categories)->with('allCategories', $allCategories);
    }

    public function addCategory(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
        Category::create($input);
        return back()->with('success', 'New Category added successfully.');
    }
}
