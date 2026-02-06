@extends('admin.layouts.layout')
@section('admin_page_title')Category Create
@endsection
@section('admin_layout')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Category</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <label for="category_name" class="fw-bold mb-2">Category Name</label>
                        <input type="text" name="category_name" id="category_name" class="form-control mb-3" placeholder="Enter category name">
                        <button type="submit" class="btn btn-primary w-100 mt-3">Create Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection