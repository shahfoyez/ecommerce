@extends('layouts.admin_master')
@section('title','Add Product')
@section('content')
<div class="row justify-content-center">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add Product</h3>
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
        <form method="post" action="/admin/product/insert" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="form-group">
              <label>Product Name</label>
              <input name="name" type="text" class="form-control" placeholder="Enter Product Name">
            </div>
            <div class="form-group">
                <label>Product Type</label>
                <input name="type" type="text" class="form-control" placeholder="Enter Product Type">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input name="price" type="number" class="form-control" placeholder="Enter Price">
            </div>
            <div class="form-group">
              <label>Specefication</label>
              <textarea name="spec" class="form-control" cols="5" rows="5" placeholder="Product Specefication"></textarea>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="desc" class="form-control" cols="5" rows="5" placeholder="Product Description"></textarea>
              </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control" onchange="document.getElementById('previewImage').src = window.URL.createObjectURL(this.files[0])">
            </div>
            <div class="form-group">
                <img id="previewImage" width="160" height="120">
            </div>
            <div class="col-lg-13">
                <label>Bidable?</label>
                <select name="bidable" class="form-control">
                    <option value="">Select</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="col-lg-13">
                <label>Bid Status</label>
                <select name="status" class="form-control">
                    <option value="">Select</option>
                    <option value="1">Active</option>
                    <option value="0">Off</option>
                </select>
            </div>

            <div class="col-lg-13">
                <label>Category</label>
                <select id="category" name="category" class="form-control">
                    <option value="">Select</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-13">
                <label>Sub Category</label>
                <select id="sub_category" name="subCategory" class="form-control">
                    {{-- @foreach ($subCategories as $subCategory)
                        <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                    @endforeach --}}

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
@push('js')
  <script>
    $(function(){
        $('#category').change(function(){
            var options;
            var category = $(this).val()
            var url= "{{ url('/subcategories') }}"
            $.ajax({
            url: url,
            data: {
                categoryID: category
            }
            }).done(function(response) {
                if(response){
                    $.each(response, function( i, val ) {
                        options += '<option value="'+val.id+'">'+val.name+'</option>';
                        $('#sub_category').html(options)
                    })
                }
            });
        });
    });
  </script>
@endpush
