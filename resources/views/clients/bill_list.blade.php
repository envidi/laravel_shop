@extends('layouts.client')
@section('content')
<h2 class="title_bill"> Your Bill </h1>
    @if (is_array($bill_user))
    @foreach ($bill_user as $item)
    <div class="contain_bill_list d-flex">

        <div class="info_bill">
            <div class="info_user block_bill">
                <span class="bill_info_user">Name customer</span> : {{$item['user_id']}}
            </div>
            <div class="bank block_bill"><span class="bill_info_user">Ngân hàng </span>: {{$item['typeBank']}}</div>
            <div class="status block_bill">
                <span class="bill_info_user">Status </span>: {{$item['status']}}
            </div>
            <div class="description block_bill">
                <span class="bill_info_user">Description </span>: {{$item['description']}}
            </div>
            <div class="date_bill block_bill">
                <span class="bill_info_user">Date </span>: {{$item['created_at']}}
            </div>
            <div class="date_bill block_bill">
                <span class="bill_info_user">Note </span>: {{$item['note']}}
            </div>
            <form action="{{route('cancleBill',['id'=>$item['id']])}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">
                    Cancle
                </button>
            </form>
            
        </div>
        <table class="table_bill">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Total</th>
                <th>Date</th>                
            </thead>
            <tbody>
                @foreach ($item['cartList'] as $cartItem)
                <tr>
                    <td>{{$cartItem->id}}</td>
                    <td>{{$cartItem->name}} ( {{$cartItem->quantity}} ) </td>
                    <td>{{$cartItem->price}}</td>
                    <td>
                        <img style="width: 50px" src="{{asset('assets/client/images/'.$cartItem->image)}}" alt="">
                    </td>
                    <td>{{$cartItem->total}}</td>
                    <td>{{$cartItem->created_at}}</td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
        </div>  
        
    @endforeach
    @else
        <h4>Không có đơn hàng</h4>
    @endif
   
 
@endsection
@section('sidebar')
    <h3>Home sidebar</h3>
@endsection
@section('js')
    
@endsection