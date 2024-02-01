@extends('layouts.dashboard')
@section('content_admin')
    <div class="d-flex flex-column m-3" style="width: 100%">
        <h1 class="title-list">List Users</h1>
        @session('msg')
            <div class="alert alert-warning" role="alert">
                {{ session('msg') }}
            </div>
        @endsession

        <button type="button" class="btn btn-primary my-3 mx-5" style="width: 10%">
            <a href={{ route('users.add') }} style="text-decoration: none;color: white">
                Add User
            </a>
        </button>
        <table class="table table-striped mx-auto text-center" style="width: 90%;">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Create_At</th>
                    <th scope="col">Updated</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>

                @if ($usersList)
                    @foreach ($usersList as $key => $users)
                        <tr>
                            <td scope="row">{{ $users->id }}</td>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->created_at }}</td>
                            <td>{{ $users->updated_at }}</td>
                            <td>
                                <a href="{{ route('users.edit', ['id' => $users->id]) }}">
                                    <button type="submit" class="btn btn-success">Sửa</button>
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
    </div>
    @php
    @endphp
@endsection
