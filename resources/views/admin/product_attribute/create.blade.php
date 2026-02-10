@extends('admin.layouts.layout')
@section('admin_page_title')Product Attribute Create @endsection
@section('admin_layout')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Product Attribute</h4>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('admin.product_attribute.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="attributeName" class="form-label">Attribute Name</label>
                                <input type="text" class="form-control" id="attributeName" name="name"
                                    value="{{ old('name') }}" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Add Attribute</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection