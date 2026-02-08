<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class MasterCategoryController extends Controller
{
    public function storecat(Request $request){
        $validate_data = $request->validate([
            'category_name' => 'unique:categories,category_name|required|string|max:255',
        ]);

        $category = new Category();
        $category->category_name = $validate_data['category_name'];
        $category->save();

        return redirect()->back()->with('success', 'Category created successfully!');
    }

    public function showcat($id){
        $category_info = Category::findOrFail($id);
        return view('admin.category.edit', compact('category_info'));
    }

    public function updatecat(Request $request, $id){
        $validate_data = $request->validate([
            'category_name' => 'unique:categories,category_name,'.$id.'|required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->category_name = $validate_data['category_name'];
        $category->save();

        return redirect()->back()->with('success', 'Category updated successfully!');
    }

    public function destroycat($id){
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully!');
    }
}