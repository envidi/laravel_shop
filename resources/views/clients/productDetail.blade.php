@extends('layouts.client')
@section('content')
    
<section class="py-5">
    <div class="container">
      <div class="row gx-5">
        <aside class="col-lg-6">
          <div class="border rounded-4 mb-3 d-flex justify-content-center">
            <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big.webp">
              <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="{{asset('assets/client/images/'.$singleProduct->image)}}" />
            </a>
          </div>
          <div class="d-flex justify-content-center mb-3">
           
           
          </div>
          <!-- thumbs-wrap.// -->
          <!-- gallery-wrap .end// -->
        </aside>
        <main class="col-lg-6">
          <div class="ps-lg-3">
            <h4 class="title text-dark">
                {{$singleProduct->name}}
            </h4>
            
  
            <div class="mb-3">
              <span class="h5">Price : &euro;{{$singleProduct->price}}</span>
              
            </div>
  
            <p>
              Modern look and quality demo item is a streetwear-inspired collection that continues to break away from the conventions of mainstream fashion. Made in Italy, these black and brown clothing low-top shirts for
              men.
            </p>
  
            <div class="row">
              <dt class="col-3">Type:</dt>
              <dd class="col-9">{{$singleProduct->category_name}}</dd>
  
              
            </div>
  
            <hr />
            <form action="{{route('addToCart')}}" method="POST">
              @csrf
            <div class="row mb-4">
              
              <!-- col.// -->
              <div class="col-md-4 col-6 mb-3">
                <label class="mb-2 d-block">Quantity</label>
                <div class="input-group product_detail_contain_input mb-3" style="width: 170px;">
                  <button class="btn btn-white border border-secondary px-3 decrement_product_detail" type="button" id="button-addon1" data-mdb-ripple-color="dark">
                    <i class="fas fa-minus decrement_product_detail_icon"></i>
                  </button>
                 
                  <input type="number"  class="form-control text-center border border-secondary product_detail_input" name="quantity" value="1"  />
                  <button class="btn btn-white border border-secondary px-3 increment_product_detail" type="button" id="button-addon2" data-mdb-ripple-color="dark">
                    <i class="fas fa-plus increment_product_detail_icon"></i>
                  </button>
                  <input type="hidden" name="product_id" value="{{$singleProduct->id}}">
                  <input type="hidden" name="name" value="{{$singleProduct->name}}">
                  <input type="hidden" name="price" value="{{$singleProduct->price}}">                          
                  <input type="hidden" name="image" value="{{$singleProduct->image}}">
                </div>
              </div>
            </div>
           
            <button type="submit" href="#" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Add to cart </button>
          </form>
          </div>
        </main>
      </div>
    </div>
  </section>
@endsection
@section('sidebar')
    <h3>Home sidebar</h3>
@endsection
@section('js')
    <script src="{{asset('assets/client/js/product_detail.js')}}"></script>
@endsection