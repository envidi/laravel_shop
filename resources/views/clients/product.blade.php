@extends('layouts.client')
@section('carousel')
  @include('clients.blocks.carousel')
@endsection
@section('content')
<main>

  
    <div class="album py-5 ">
      <div class="container">
  
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach ($listProduct as $product)
            <div class="col">
                <div class="card shadow-sm">
                  <div class="contain-image_home">
                    <img class="image_home" src="{{asset('assets/client/images/'.$product->image)}}" alt="">
                  </div>
                  <div class="card-body">
                    <h4>
                      <a href="{{route('product_detail',['id'=>$product->id])}}">
                        {{$product->name}}
                      </a>
                    </h4>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <button type="button" class="btn btn-secondary mb-3">{{$product->category_name}}</button>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-outline-primary" >{{$product->price}}</button>
                      </div>
                      
                      <small class="text-body-secondary">{{$product->created_at}}</small>
                    </div>
                        <form action="{{route('addToCart')}}" method="POST">
                          @csrf
                          
                          <input type="hidden" name="product_id" value="{{$product->id}}">
                          <input type="hidden" name="name" value="{{$product->name}}">
                          <input type="hidden" name="price" value="{{$product->price}}">                          
                          <input type="hidden" name="image" value="{{$product->image}}">
                          <input type="hidden" name="quantity" value="1">
                          <button type="submit" class="btn btn-primary my-3 w-100 py-1 d-flex justify-content-center align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                              <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                            </svg>
                            
                            <span class="ms-1">Đặt hàng</span>
                          </button>
                        </form>
                  </div>
                </div>
              </div>
            @endforeach
          
        </div>
      </div>
    </div>
  
  </main>
@endsection
@section('sidebar')
    <h3>Home sidebar</h3>
@endsection