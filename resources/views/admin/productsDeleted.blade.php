@extends('layouts.dashboard')
@section('content_admin')
    <div class="d-flex flex-column m-3" style="width: 100%">
        <h1 class="title-list text-center my-3 text-danger">List product deleted</h1>
        @session('msg')
            <div class="alert alert-warning" role="alert">
                {{ session('msg') }}
            </div>
        @endsession
        <table class="table table-striped mx-auto text-center mt-5" style="width: 90%;">
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
                                    src="{{ asset('assets/client/images/' . $product->image) }}" alt="">
                            </td>
                            <td>{{ $product->category_name }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('products.restore', $product->id) }}">
                                    Restore
                                </a>
                                <a onclick="return confirm('Are you sure to delete this product?')" class="btn btn-danger"
                                    href="{{ route('products.hardDelete', ['id' => $product->id]) }}">
                                    Delete Forever
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
