<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 class="title-list">List product</h1>
    @session('msg')
        <div class="alert alert-warning" role="alert">
           {{session('msg')}}
        </div>
    @endsession
    
    <button type="button" class="btn btn-primary mt-3 mb-3">
        <a href={{route('products.add')}} style="text-decoration: none;color: white">
            Add product
        </a>
    </button>
    <table class="table table-striped" style="width: 90%;">
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
                        <td scope="row">{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td style="width: 25%">{{$product->description}}</td>
                        <td style="width: 15%"> <img width="40"  src="{{asset('assets/client/images/'.$product->image)}}" alt=""> </td>
                        <td>{{$product->category_name}}</td>
                        <td>
                            <a class="btn btn-warning" href="{{route('products.edit',['id'=>$product->id])}}">
                                Edit
                            </a>
                        </td>
                        <td>
                            <a onclick="return confirm('Are you sure to delete this product?')" class="btn btn-danger" href="{{route('products.handleDelete',['id'=>$product->id])}}">
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
    @php
    @endphp
</body>
</html>