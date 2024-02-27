@extends('layouts.client')
@section('content')
    <div class="contain_cart ">
        <div class="cart_wrapper my-5">
            <div class="row">
                <div class="col-md-8 cart ">
                    <div class="title">
                        <div class="row">
                            <div class="col"><h4><b>Confirm Cart </b></h4></div>
                            <div class="col align-self-center text-right text-muted">{{ is_array($value) ? count($value): null}} items</div>
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
                                <input type="text" value="{{$item['quantity']}}" disabled name="quantity" class="input_quantity">
                            </div>
                            <div class="col d-flex align-items-center">&euro; 
                                <input type="text" class="input_total" value="{{$item['total']}} "> 
                               
                                
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
                    <div><h5 class="h5_cart"><b>User Information</b></h5></div>
                    <hr>
                    <div class="row">
                        <div class="col" style="padding-left:0;">Name </div>  
                        <input type="text" class="col  summary_total" value="Envidi">
                    </div>
                    <div class="row">
                        <div class="col" style="padding-left:0;">Phone </div>  
                        <input type="text" class="col  summary_total" value="098765432">
                    </div>
                    @if (is_array($value))
                    <form action="{{route('create_payment')}}" method="POST">
                    <div class="form_cart">
                        <p>Address</p>
                        <span class="address_cart ">
                            Ha Noi Thanh Xuan
                        </span>
                        <p class="note_cart">Note</p>
                        <input class="input_cart" id="code" name="note" placeholder="Enter your note">
                    </div>
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <div class="col">TOTAL PRICE</div>
                        &euro;<input type="text" class=" summary_total_all" value="{{$total_summary}}">
                    </div>
                                       
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