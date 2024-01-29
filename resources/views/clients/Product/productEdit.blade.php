
<h1>Edit product</h1>
@if (session('msg'))
    <div class="alert alert-success">
        {{session('msg')}}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        Dữ liệu nhập vào không hợp lệ
    </div>
@endif
<form class="form-add" action="{{route('products.handleEdit',['id'=>$productDetail->id])}}"  method="POST">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input type="text" name="name" class="form-control" value="{{ old('name',$productDetail->name) ?? $productDetail->name}}" placeholder="Name...">
        @error('name')
            <span style="color: red">
                {{$message}}
            </span>
        @enderror
    </div>
    <div class="mb-3">
        <label  class="form-label">Price</label>
        <input type="text" class="form-control" placeholder="Price..." value="{{old('price') ?? $productDetail->price}}" name="price">
        @error('price')
            <span style="color: red">
                {{$message}}
            </span>
        @enderror
    </div>
      <div class="mb-3">
        <label  class="form-label">Description</label>
        <input type="text" class="form-control" placeholder="Description..." value="{{old('description') ?? $productDetail->description}}" name="description">
        @error('desc')
            <span style="color: red">
                {{$message}}
            </span>
        @enderror
      </div>
      <div class="mb-3">
        <select class="form-select" aria-label="Default select example" name="category_id">
            @foreach ($allCate as $cate)
                <option @selected(old('category_id',$cate->id) === $productDetail->category_id) value="{{$cate->id}}">{{$cate->name}}</option>
                
            @endforeach

          </select>
        
      </div>
    <div class="contain-btn">
        
        <button type="submit" class="form_submit-btn btn btn-primary">Update</button>
        <button type="button" class="form_submit-btn btn btn-warning">
            <a href={{route('products.list')}} style="text-decoration: none">Back</a>
        </button>
    </div>
    </form>
