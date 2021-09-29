@extends('layouts.admin_master')
@section('title','Edit Sub Category')
@section('content')
<div class="row justify-content-center">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Sub Category</h3>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{-- Session flash message --}}
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
        <form method="post" action="/admin/subCategory/update?id={{ $subCategory->id }}" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label>Sub Category Name</label>
              <input name="name" type="text" class="form-control" placeholder="Sub Category" value="{{ $subCategory->name }}">
            </div>
            <div class="form-group">
              <label>Slug</label>
              <textarea name="slug" class="form-control" cols="5" rows="5" placeholder="write here">{{ $subCategory->slug }}</textarea>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control" onchange="document.getElementById('previewImage').src = window.URL.createObjectURL(this.files[0])">
            </div>
            @php
                $path = $subCategory->image == 'default.jpg' ? asset('default/default.jpg') : asset('uploads/subCategories/'.$subCategory->image);
            @endphp
            <div class="form-group">
                <img src="{{ $path }}" id="previewImage" width="160" height="120">
            </div>
            {{-- Dropdown --}}
            <div class="col-lg-13">
                <label>Category</label>
                <select name="category" class="form-control">
                    <option value="1">Select</option>
                    @foreach ($subCategory->category->all() as $category)
                        <option value="{{ $category->id }}"
                            @if ($category->id == $subCategory->categoryID)
                                  {{ "selected" }}
                            @endif
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </>
      </div>
      <!-- /.card -->

    </div>
    <!--/.col (right) -->
  </div>
@endsection
