@extends('layouts.dashboard')
@section('content_admin')
    <div class="d-flex flex-column m-3" style="width: 100%">
        <h1 class="title-list">List bill</h1>
        @session('msg')
            <div class="alert alert-warning" role="alert">
                {{ session('msg') }}
            </div>
        @endsession

        
        <table class="table table-striped mx-auto text-center" style="width: 90%;">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">User name</th>
                    <th scope="col">Total</th>
                    <th scope="col">Bank</th>   
                    <th scope="col">Status</th>
                    <th scope="col">Item</th>
                    <th scope="col">Date</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($bill_all)
                    @foreach ($bill_all as $key => $bill)
                        <tr>
                            <td scope="row">{{ $bill['id'] }}</td>
                            <td>{{ $bill['user_id'] }}</td>
                            <td>{{ $bill['total'] }}</td>
                            <td >{{ $bill['typeBank'] }}</td>
                            <td >{{ $bill['status'] }}</td>
                            {{-- <td >{{ $bill['description'] }}</td> --}}
                            <td >
                                <div class="d-flex flex-column">
                                    @foreach ($bill['cartList'] as $item)
                                        <span>{{$item->name}} ( {{$item->quantity}} )</span>
                                    @endforeach
                                   
                                </div>
                            </td>
                            <td>{{ $bill['created_at'] }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('order.edit', ['id' => $bill['id']]) }}">
                                    Edit
                                </a>
                            </td>
                            <td>
                                {{-- <form action="{{ route('deleteBill', ['id' => $bill['id']]) }}">

                                </form> --}}
                                <a onclick="return confirm('Are you sure to delete this bill?')" class="btn btn-danger"
                                    href="{{ route('deleteBill', ['id' => $bill['id']]) }}">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th scope="row">Không có đơn hàng</th>
                        
                       
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    @php
    @endphp
@endsection
