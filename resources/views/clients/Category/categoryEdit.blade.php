
<h1>Edit category</h1>
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
<form class="form-add" action="{{route('categories.handleEdit',['id'=>$categoryDetail->id])}}"  method="POST">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input type="text" name="name" class="form-control" value="{{ old('name',$categoryDetail->name) ?? $categoryDetail->name}}" placeholder="Name...">
        @error('name')
            <span style="color: red">
                {{$message}}
            </span>
        @enderror
    </div>
    
    <div class="contain-btn">
        
        <button type="submit" class="form_submit-btn btn btn-primary">Update</button>
        <button type="button" class="form_submit-btn btn btn-warning">
            <a href={{route('categories.list')}} style="text-decoration: none">Back</a>
        </button>
    </div>
    </form>
