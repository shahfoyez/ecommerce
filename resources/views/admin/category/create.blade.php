@extends('layouts.admin_master')
@section('title','Add Category')
@section('content')
<div class="row justify-content-center">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add Category</h3>
        </div>
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        {{-- @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif --}}
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="/admin/category/insert" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label>Category Name</label>
              <input name="name" type="text" class="form-control" placeholder="Enter service title">
            </div>
            <div class="form-group">
              <label>Slug</label>
              <textarea name="slug" class="form-control" cols="5" rows="5" placeholder="write here"></textarea>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control" onchange="document.getElementById('previewImage').src = window.URL.createObjectURL(this.files[0])">
              </div>

              <div class="form-group">
                <img id="previewImage" width="160" height="120">
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
