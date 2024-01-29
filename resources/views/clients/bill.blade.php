@extends('layouts.client')
@section('content')
    
<h1>Bill</h1>
<ol>
    @foreach ($quantity_hidden as $item)
        
    <li>{{$item}}</li>
    @endforeach
</ol>
<ol>
    @foreach ($total as $item)
        
    <li>{{$item}}</li>
    @endforeach
</ol>
<ol>
    @foreach ($id_hidden as $item)
        
    <li>{{$item}}</li>
    @endforeach
</ol>
@endsection
@section('sidebar')
    <h3>Home sidebar</h3>
@endsection
@section('js')
    
@endsection