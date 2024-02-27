@extends('layouts.dashboard')
@section('content_admin')
    <div class="d-flex flex-column justify-content-center mx-auto w-full">
        <h1 class="text-center mb-5">Edit product</h1>
        @if (session('msg'))
            <div class="alert alert-success">
                {{ session('msg') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                Dữ liệu nhập vào không hợp lệ
            </div>
        @endif
        <form class="form-add" style="width: 800px;" action="{{ route('order.handleEdit', ['id' => $bill_single["id"]]) }}"
            method="POST">
            @csrf
            
           <div class="mt-1 mb-4">
            <span>Bill id</span>
            <span>{{$bill_single['id']}}</span>
           </div>
           <input type="hidden" value="{{$bill_single['id']}}" name="id">
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name="status">
                    @foreach ($array_status as $status)
                        <option @selected(old('status', $bill_single['status']) === $status) value="{{ $status }}">{{ $status }}</option>
                    @endforeach

                </select>

            </div>
            <div class="contain-btn mt-4">

                <button type="submit" class="form_submit-btn btn btn-primary">Update</button>
                <button type="button" class="form_submit-btn btn btn-warning">
                    <a href={{ route('order.list') }} style="text-decoration: none">Back</a>
                </button>
            </div>
        </form>
    </div>
@endsection
