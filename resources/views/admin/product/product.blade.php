@extends('layouts.admin.admin_master')
@section('title','All Products')
@section('content')
<div class="row">
    <div class="col-12">
        {{-- Session flash message --}}
        @if (session()->has('message'))
            <div x-data="{ show:true }"
                x-init="setTimeout(() => show = false, 4000)"
                x-show="show"
                class="alert alert-success pb-0">
                <p>{{ session('message') }}</p>
            </div>
        @endif
      <div class="card">
        <div class="card-header  ">
          <h3 class="card-title"><a href="/admin/product/create" class="btn btn-primary btn-sm">Add Product</a></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
          <table class="table table-head-fixed text-nowrap p-2" id="myTable">
            <thead>
              <tr>
                <th>S/N</th>
                <th weith='10%'>Product</th>
                <th>Type</th>
                <th>Price</th>
                <th>Image</th>
                <th>Category</th>
                <th>Subcategory</th>
                <th>User</th>
                <th>Published</th>
                <th class="text-right">Action</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
              @foreach ($products as $product)
              <tr>
                <td>{{ $i++ }}</td>
                <td> {{ $product->name }}</td>
                <td> {{ $product->type }}</td>
                <td> ${{ $product->price }}</td>
                @php
                $path = $product->image == 'default.jpg' ? asset('uploads/default/default.jpg') : asset('uploads/products/'.$product->image);
                @endphp
                <td>
                    <img src="{{ $path }}" alt="" srcset="" width="50" height="30">
                </td>
                 <td> {{ $product->category->name }}</td>
                <td> {{ $product->subCategory->name }}</td>
                <td> {{ $product->user->name }}</td>
                <td> {{ $product->created_at->diffForHumans() }}</td>
                <td class="text-right">
                    <a href="/admin/product/edit/{{ $product->id }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="/admin/product/delete/{{ $product->id }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{-- {{$categories->links()}} --}}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection
