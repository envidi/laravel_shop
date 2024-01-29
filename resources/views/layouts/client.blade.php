<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/client/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/cart.css')}}">
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    @include('clients.blocks.header')    
    <main>
       
        @yield('carousel')
        {{-- <aside>
            @section('sidebar')
                @include('clients.blocks.sidebarblock')
            @show
         
        </aside> --}}
        <div class="content">
            @yield('content')
        </div>
    </main>
   @include('clients.blocks.footer')
    <script src="{{asset('assets/client/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/client/js/custom.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    @yield('js')
</body>
</html>