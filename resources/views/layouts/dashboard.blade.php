<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/client/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/sidebar.css') }}">
    <title>Admin</title>
</head>

<body>
    <div class="d-flex">
        @include('admin.sidebar')

        @yield('content_admin')
    </div>
</body>

</html>
