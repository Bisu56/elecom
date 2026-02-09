<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class MasterSubCategoryController extends Controller
{
    public function create()
    {
        $categories = Category::all();

        return view('admin.sub_category.create', compact('categories'));
    }

    public function storesubcat(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $subcategory = new Subcategory;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();

        return redirect()->route('admin.sub_category.create')->with('success', 'Subcategory created successfully.');
    }

    public function manage()
    {
        // Fetch all subcategories with their associated category
        $subcategories = Subcategory::with('category')->get(); // Assuming 'category' is the relationship name in Subcategory model

        return view('admin.sub_category.manage', compact('subcategories'));
    }
}
