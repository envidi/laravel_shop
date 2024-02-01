@extends('layouts.dashboard')
@section('content_admin')
    <div class="d-flex flex-column justify-content-center mx-auto w-full">

        <h1 class="text-center mb-5">ADD User</h1>

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
        <form class="form-add" style="width: 800px;" action="<?= route('handleAddUser') ?>" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name...">
                @error('name')
                    <span style="color: red">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" placeholder="Email" name="email">
                @error('email')
                    <span style="color: red">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="text" class="form-control" placeholder="password..." name="password">
                @error('password')
                    <span style="color: red">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="contain-btn mt-4">

                <button type="submit" class="form_submit-btn btn btn-primary">Submit</button>
                <button type="button" class="form_submit-btn btn btn-warning">
                    <a href={{ route('admin.users') }} style="text-decoration: none">Back</a>
                </button>
            </div>
        </form>

    </div>
@endsection
