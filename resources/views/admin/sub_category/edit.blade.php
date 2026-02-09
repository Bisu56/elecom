@extends('admin.layouts.layout')
@section('admin_page_title')
    Edit Subcategory
@endsection
@section('admin_layout')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Subcategory</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('update.subcat', $subcategory->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="subcategory_name">Subcategory Name</label>
                            <input type="text" name="subcategory_name" class="form-control"
                                id="subcategory_name" value="{{ $subcategory->subcategory_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $subcategory->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
