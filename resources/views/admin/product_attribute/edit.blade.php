@extends('admin.layouts.layout')
@section('admin_page_title')Product Attribute Edit@endsection
@section('admin_layout')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Product Attribute</h4>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('admin.product_attribute.update', $product_attribute->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="attributeName" class="form-label">Attribute Name</label>
                                <input type="text" class="form-control" id="attributeName" name="name"
                                    value="{{ old('name', $product_attribute->name) }}" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="attributeStatus" class="form-label">Status</label>
                                <select class="form-select" id="attributeStatus" name="status" required>
                                    <option value="1" {{ old('status', $product_attribute->status) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $product_attribute->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update Attribute</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection