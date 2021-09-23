@extends('layouts.admin_master')
@section('title','Update Service')
@section('content')
<div class="row justify-content-center">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Update Service</h3>
        </div>
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif --}}
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" action="" enctype="multipart/form-data">
            {{-- {{csrf_field()}} --}}
            @csrf
            <input type="hidden" name="id" value="">
          <div class="card-body">
            <div class="form-group">
              <label>Service Title</label>
              <input name="title" type="text" value="" class="form-control" placeholder="Enter service title">
            </div>
            <div class="form-group">
              <label>Description</label>
              <textarea name="description" class="form-control" cols="5" rows="5" placeholder="write here"></textarea>
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control" onchange="document.getElementById('previewImage').src = window.URL.createObjectURL(this.files[0])">
              </div>
        {{-- @php
            $path = $service->image == 'default.jpg' ? asset('default/default.jpg') : asset('uploads/services/'.$service->image);
        @endphp --}}
              <div class="form-group">
                <img src" id="previewImage" width="200" height="150">
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
