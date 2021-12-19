@extends('layouts.admin.admin_master')
@section('title','All Categories')
@section('content')
<div class="row">
    <div class="col-12">
        {{-- {{ dd(session()->all()) }} --}}
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
          <h3 class="card-title"><a href="/admin/category/create" class="btn btn-primary btn-sm">Add Category</a></h3>
          <h3 class="card-tools"><a href="#" onclick="window.print()" class="btn btn-primary btn-sm">Print</a></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
          <table class="table table-head-fixed text-nowrap p-2" id="myTable">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Category</th>
                <th>Slug</th>
                <th>Image</th>
                <th>User</th>
                <th>Published</th>
                <th>No Of SC</th>
                <th class="text-right">Action</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
              @foreach ($categories as $category)
              <tr>
                <td>{{ $i++ }}</td>
                <td> {{ $category->name }}</td>
                <td> {{ $category->slug }}</td>
                @php
                    $path = $category->image == 'default.jpg' ? asset('uploads/default/default.jpg') : asset('uploads/categories/'.$category->image);
                @endphp
                <td>
                    <img src="{{ $path }}" alt="" srcset="" width="50" height="30">
                </td>
                <td> {{ $category->user->name }}</td>
                <td> {{ $category->created_at->diffForHumans() }}</td>
                <td> {{ $category->subCategory->count() }}</td>

                <td class="text-right">
                    <a href="/admin/category/edit/{{ $category->id }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="/admin/category/delete/{{ $category->id }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
