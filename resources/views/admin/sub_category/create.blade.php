@extends('admin.layouts.layout')
@section('admin_page_title')Sub Category Create
@endsection
@section('admin_layout')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Subcategory</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('store.subcat') }}" method="POST">
                        @csrf
                        <label for="subcategory_name" class="fw-bold mb-2">Subcategory Name</label>
                        <input type="text" name="subcategory_name" id="subcategory_name" class="form-control mb-3" placeholder="Enter subcategory name">
                        <div class="form-group">
                            <label for="category_id">Parent Category</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option value="">Select a Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mt-3">Create Subcategory</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection