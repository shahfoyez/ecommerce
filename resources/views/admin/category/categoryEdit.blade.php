@extends('layouts.admin_master')
@section('title','Edit Category')
@section('content')
<div class="row justify-content-center">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Category</h3>
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
        <form method="post" action="/admin/category/update?id={{ $category->id }}" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="form-group">
                <label>Category Name</label>
                <input type="text" name="name" class="form-control" value="{{ $category->name }}"/>
            </div>
            {{-- @error('name')
                <p class="c-red">Invalid Name Field!</p>
            @enderror --}}
            <div class="form-group">
              <label>Slug</label>
              <textarea name="slug" class="form-control" cols="5" rows="5">{{ $category->slug }}</textarea>
            </div>
            {{-- @error('image')
            <p>image</p>
            @enderror --}}
            {{-- Image --}}
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control" onchange="document.getElementById('previewImage').src = window.URL.createObjectURL(this.files[0])" >
            </div>
            @php
                $path = $category->image == 'default.jpg' ? asset('default/default.jpg') : asset('uploads/categories/'.$category->image);
            @endphp
            <div class="form-group">
                <img src="{{ $path }}" id="previewImage" width="200" height="150">
            </div>
            {{-- Image End --}}
            {{-- @error('image')
                <p>image</p>
            @enderror --}}
          </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
      <!-- /.card -->

    </div>
    <!--/.col (right) -->
  </div>
@endsection
