@extends('layouts.dashboard')
@section('content_admin')
<div style="width: 100%" class="d-flex flex-column align-items-center">
<h1 class="title-list">List category</h1>
@session('msg')
    <div class="alert alert-warning" role="alert">
       {{session('msg')}}
    </div>
@endsession

<button type="button" class="btn btn-primary mt-3 mb-3">
    <a href={{route('admin.categories.add')}} style="text-decoration: none;color: white">
        Add category
    </a>
</button>
<table class="table table-striped" style="width: 50%;">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col" colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
        @if ($categoryList)
            @foreach ($categoryList as $key => $cate)
                <tr>
                    <td scope="row">{{$cate->id}}</td>
                    <td>{{$cate->name}}</td>
                    <td>
                        <a class="btn btn-warning" href="{{route('admin.categories.edit',['id'=>$cate->id])}}">
                            Edit
                        </a>
                    </td>
                    <td>
                        <a onclick="return confirm('Are you sure to delete this category?')" class="btn btn-danger" href="{{route('categories.handleDelete',['id'=>$cate->id])}}">
                            Delete
                        </a>
                    </td>
                </tr>
            @endforeach
        @else 
            <tr>
                <th scope="row">Ko có danh mục</th>
                <td>Ko có danh mục</td>
                <td>Ko có danh mục</td>
                <td>Ko có danh mục</td>
            </tr>
        @endif
       
      
      
    </tbody>
  </table>
@php
@endphp
</div>
@endsection
