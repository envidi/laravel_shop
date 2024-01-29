<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 class="title-list">List category</h1>
    @session('msg')
        <div class="alert alert-warning" role="alert">
           {{session('msg')}}
        </div>
    @endsession
    
    <button type="button" class="btn btn-primary mt-3 mb-3">
        <a href={{route('categories.add')}} style="text-decoration: none;color: white">
            Add category
        </a>
    </button>
    <table class="table table-striped" style="width: 50%;">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col" colspan="2">Action</th>
          </tr>
        </thead>
        <tbody>
            @if ($categoryList)
                @foreach ($categoryList as $key => $cate)
                    <tr>
                        <td scope="row">{{$cate->id}}</td>
                        <td>{{$cate->name}}</td>
                        <td>
                            <a class="btn btn-warning" href="{{route('categories.edit',['id'=>$cate->id])}}">
                                Edit
                            </a>
                        </td>
                        <td>
                            <a onclick="return confirm('Are you sure to delete this category?')" class="btn btn-danger" href="{{route('categories.handleDelete',['id'=>$cate->id])}}">
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