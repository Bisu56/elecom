<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    public function index()
    {
        $product_attributes = ProductAttribute::latest()->get();
        return view('admin.product_attribute.manage', compact('product_attributes'));
    }

    public function create()
    {
        return view('admin.product_attribute.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:product_attributes,name',
        ]);

        ProductAttribute::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.product_attribute.create')->with('success', 'Product Attribute Created Successfully');
    }

    public function edit(ProductAttribute $product_attribute)
    {
        return view('admin.product_attribute.edit', compact('product_attribute'));
    }

    public function update(Request $request, ProductAttribute $product_attribute)
    {
        $request->validate([
            'name' => 'required|unique:product_attributes,name,' . $product_attribute->id,
            'status' => 'required',
        ]);

        $product_attribute->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.product_attribute.index')->with('success', 'Product Attribute Updated Successfully');
    }

    public function destroy(ProductAttribute $product_attribute)
    {
        $product_attribute->delete();
        return back()->with('success', 'Product Attribute Deleted Successfully');
    }

    public function manage()
    {
        // This method is now redundant, index will handle showing all attributes
        // and manage will be the view that lists them.
        // It's kept here for now but will be removed or refactored if needed.
        return redirect()->route('admin.product_attribute.index');
    }
}
