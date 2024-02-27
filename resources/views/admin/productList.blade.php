@extends('layouts.dashboard')
@section('content_admin')
    <div class="d-flex flex-column m-3" style="width: 100%">
        <h1 class="title-list">List product</h1>
        @session('msg')
            <div class="alert alert-warning" role="alert">
                {{ session('msg') }}
            </div>
        @endsession

        <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-primary my-3 mx-5" style="width: 10%">
                <a href={{ route('products.add') }} style="text-decoration: none;color: white">
                    Add product
                </a>
            </button>
            <button type="button" class="btn btn-danger my-3 mx-5" style="width: 10%">
                <a href={{ route('products.deleted') }} style="text-decoration: none;color: white">
                    Products deleted
                </a>
            </button>
        </div>
        <table class="table table-striped mx-auto text-center" style="width: 90%;">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Category</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($productList)
                    @foreach ($productList as $key => $product)
                        <tr>
                            <td scope="row">{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td style="width: 25%">{{ $product->description }}</td>
                            <td style="width: 15%"> <img width="40"
                                    src="{{ asset('assets/client/images/' . $product->image) }}" alt=""> </td>
                            <td>{{ $product->category_name }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('products.edit', ['id' => $product->id]) }}">
                                    Edit
                                </a>
                                <a onclick="return confirm('Are you sure to delete this product?')" class="btn btn-danger"
                                    href="{{ route('products.handleDelete', ['id' => $product->id]) }}">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    @php
    @endphp
@endsection
