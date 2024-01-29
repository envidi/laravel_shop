@extends('layouts.client')
@section('content')
    <div class="contain_cart">
        <div class="cart_wrapper">
            <div class="row">
                <div class="col-md-8 cart">
                    <div class="title">
                        <div class="row">
                            <div class="col"><h4><b>Shopping Cart {{ is_array($value) ? count($value): null}}</b></h4></div>
                            <div class="col align-self-center text-right text-muted">3 items</div>
                        </div>
                    </div>   
                    @if (is_array($value))
                    @foreach ($value as $key => $item)
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid" src="{{asset('assets/client/images/'. $item['image'])}}"></div>
                            <div class="col">
                                <div class="row text-muted">{{$item['name']}}</div>
                                <div class="row">Cotton T-shirt</div>
                            </div>
                            <div class="col block_quantity" data-id="{{$key}}">
                                <a class="decrement" href="#">-</a>
                                <input type="text" value="{{$item['quantity']}}" name="quantity" class="input_quantity">
                                <a class="increment" href="#">+</a>
                            </div>
                            <div class="col d-flex align-items-center">&euro; 
                                <input type="text" class="input_total" value="{{$item['total']}} "> 
                                <form style="width: auto; display: flex; justify-content: center" action="{{route('deleteFromCart')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="index" value="{{$key}}">
                                    
                                    <button style="width: 50px" class="ms-5 btn" type="submit">
                                        <span class="close ">&#10005;</span>
                                    </button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                        <h5>Không có giỏ hàng</h5>
                    @endif 
                   
                   
                   
                    
                    <div class="back-to-shop"><a href="#">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
                </div>
                <div class="col-md-4 summary">
                    <div><h5 class="h5_cart"><b>Summary</b></h5></div>
                    <hr>
                    <div class="row">
                        <div class="col" style="padding-left:0;">ITEMS 3</div>                        
                        &euro;<input type="text" class="col text-right summary_total" value="{{$total_summary}}">
                    </div>
                    <div class="form_cart">
                        <p>SHIPPING</p>
                        <select class="select_cart"><option class="text-muted">Standard-Delivery- &euro;5.00</option></select>
                        <p>GIVE CODE</p>
                        <input class="input_cart" id="code" placeholder="Enter your code">
                    </div>
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <div class="col">TOTAL PRICE</div>
                        &euro;<input type="text" class="col text-right summary_total_all" value="{{$total_summary}}">
                    </div>
                    @if (is_array($value))
                    <form action="{{route('create_payment')}}" method="POST">
                        @csrf
                        @foreach ($value as $key => $item)
                            <input type="hidden" name="quantity_hidden[]" class="quantity_hidden" value="{{$item['quantity']}}">
                            <input type="hidden" name="total_hidden[]" class="total_hidden" value="{{$item['total']}}">
                            
                            <input type="hidden" name="id_hidden[]" value="{{$key}}">
                        @endforeach
                        
                        <input type="hidden" name="total" class="total_all_hidden" value="{{$total_summary}}">
                        <button type="submit" class="btn_cart">Thanh toán</button>
                    </form>
                    @else
                    <button type="submit" class="btn_cart">Thanh toán</button>
                    @endif
                    
                    </div>
                </div>
            
        </div>
    </div>

@endsection
@section('sidebar')
    <h3>Home sidebar</h3>
@endsection
@section('js')
    <script src="{{asset('assets/client/js/cart.js')}}"></script>
@endsection