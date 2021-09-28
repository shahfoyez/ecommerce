@extends('layouts.admin_master')
@section('title','All Sevices')
@section('content')
<div class="row">
    <div class="col-12">
        {{-- @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif --}}
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><a href="/admin/subCategory/create" class="btn btn-primary btn-sm">Add Sub Category</a></h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-head-fixed text-nowrap" id="myTable">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Image</th>
                <th>Category</th>
                <th>Published</th>
                <th class="text-right">Action</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
              @foreach ($subCategories as $subCategory)
              <tr>
                <td> {{ $i++ }}</td>
                {{-- {{ dd($subCategory->users) }} --}}
                <td> {{  $subCategory->name }}</td>
                <td> {{  $subCategory->slug   }}</td>
                @php
                    $path = $subCategory->image == 'default.jpg' ? asset('default/default.jpg') : asset('uploads/subCategories/'.$subCategory->image);
                @endphp
                <td>
                    <img src="{{ $path }}" alt="" srcset="" width="50" height="30">
                </td>
                {{-- {{ dd($subCategory->users()) }} --}}
                {{-- <td> {{ $subCategory->category->name }}</td> --}}
                <td> {{ "Electronics" }}</td>

                <td> {{ $subCategory->created_at->diffForHumans()  }}</td>
                <td class="text-right">
                    <a href="" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                    <a onclick="return confirm('Are you sure to delete?')" href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
