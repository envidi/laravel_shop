@extends('layouts.dashboard')
@section('content_admin')
    <div class="d-flex flex-column justify-content-center mx-auto w-full">
        <h1 class="text-center mb-5">Edit User</h1>
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
        <form class="form-add" style="width: 800px;" action="{{ route('users.handleEdit', ['id' => $userDetail->id]) }}"
            method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" name="name" class="form-control"
                    value="{{ old('name', $userDetail->name) ?? $userDetail->name }}" placeholder="Name...">
                @error('name')
                    <span style="color: red">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" placeholder="Email..."
                    value="{{ old('email') ?? $userDetail->email }}" name="email">
                @error('email')
                    <span style="color: red">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="text" class="form-control" placeholder="Password..."
                    value="{{ old('password') ?? $userDetail->password }}" name="password">
                @error('password')
                    <span style="color: red">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="contain-btn mt-4">

                <button type="submit" class="form_submit-btn btn btn-primary">Update</button>
                <button type="button" class="form_submit-btn btn btn-warning">
                    <a href={{ route('admin.users') }} style="text-decoration: none">Back</a>
                </button>
            </div>
        </form>
    </div>
@endsection
