@extends('layouts.admin_master')
@section('title','Edit Product')
@section('content')
<div class="row justify-content-center">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Product</h3>
            </div>
            {{-- Validation Error --}}
            @if ($errors->any())
                <div class="alert alert-danger  mt-2 ml-2 pb-0">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- Session flash --}}
            @if (session()->has('message'))
                <div x-data="{ show:true }"
                    x-init="setTimeout(() => show = false, 4000)"
                    x-show="show"
                    class="alert alert-success pb-0">
                    <p>{{ session('message') }}</p>
                </div>
            @endif
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="/admin/product/update?id={{ $product->id }}" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
                <div class="form-group">
                    <label>Product Name</label>
                    <input name="name" type="text" class="form-control" placeholder="Enter Product Name" value={{ $product->name }}>
                </div>
                <div class="form-group">
                    <label>Product Type</label>
                    <input name="type" type="text" class="form-control" placeholder="Enter Product Type" value={{ $product->type }}>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input name="price" type="text" class="form-control" placeholder="Enter Price" value={{ $product->price }}>
                </div>

                <div class="form-group">
                <label>Specefication</label>
                <textarea name="spec" class="form-control" cols="5" rows="5" placeholder="Product Specefication">{{ $product->specification }}</textarea>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="desc" class="form-control" cols="5" rows="5" placeholder="Product Description">{{$product->description   }}</textarea>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" onchange="document.getElementById('previewImage').src = window.URL.createObjectURL(this.files[0])">
                </div>
                @php
                    $path = $product->image == 'default.jpg' ? asset('default/default.jpg') : asset('uploads/products/'.$product->image);
                @endphp
                <div class="form-group">
                    <img src="{{ $path }}" id="previewImage" width="160" height="120">
                </div>
                <div class="col-lg-13">
                    <label>Bidable?</label>
                    <select name="bidable" class="form-control">
                        <option value="">Select</option>
                        @if ($product->isBidable=='0')
                            <option value="1">Yes</option>
                            <option value="0" selected>No</option>
                        @else
                            <option value="1" selected>Yes</option>
                            <option value="0">No</option>
                        @endif
                    </select>
                </div>
                <div class="col-lg-13">
                    <label>Bid Status</label>
                    <select name="status" class="form-control">
                        <option value="">Select</option>
                        <option value="1"
                            @if ($product->isBidable=='1')
                                {{ "selected" }}
                            @endif
                        >Active</option>
                        <option value="0"
                        @if ($product->isBidable=='0')
                            {{ "selected" }}
                        @endif
                        >Off</option>
                    </select>
                </div>
                <div class="col-lg-13">
                    <label>Category</label>
                    <select name="category" class="form-control">
                        <option value="">Select</option>
                        @foreach ($product->category->all() as $category)
                            <option value="{{ $category->id }}"
                                @if ($category->id == $product->categoryID)
                                    {{ "selected" }}
                                @endif
                            >
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-13">
                    <label>Sub Category</label>
                    <select name="subCategory" class="form-control">
                        <option value="">Select</option>
                        @foreach ($product->subCategory->all() as $subCategory)
                            <option value="{{ $subCategory->id }}"
                                @if ($subCategory->id == $product->subCategoryID)
                                    {{ "selected" }}
                                @endif
                            >
                                {{ $subCategory->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.card -->

    </div>
    <!--/.col (right) -->
  </div>
@endsection
