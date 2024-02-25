<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .li-hover {
        padding: 3px 10px;
        border-radius: 25px;
        background: #1f1f1f;
        margin: 3px 0;
    }

    .li-hover:hover {
        background-color: blue;
    }
</style>

<body>

    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px; height: 100vh;position: sticky;top: 0px">
        <a href="/admin/dashboard"
            class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <svg class="bi pe-none me-2" width="40" height="32">
                <use xlink:href="#bootstrap"></use>
            </svg>
            <span class="fs-4">Sidebar</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="li-hover">
                <a href="/admin/dashboard" class="nav-link text-white">
                    Dashboard
                </a>
            </li>
            <li class="li-hover">
                <a href="/admin/products" class="nav-link text-white">
                    Products
                </a>
            </li>
            <li class="li-hover">
                <a href="{{route('admin.categories.list')}}" class="nav-link text-white">
                    Category
                </a>
            </li>
            <li class="li-hover">
                <a href="{{route('order.list')}}" class="nav-link text-white">
                    Orders
                </a>
            </li>
            <li class="li-hover">
                <a href="/admin/users" class="nav-link text-white">
                    Users
                </a>
            </li>
            <li class="li-hover">
                <a href="#" class="nav-link text-white">
                    Settings
                </a>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="li-hover">
                    <a href="/"
                        class="nav-link text-white my-1 icon-link icon-link-hover d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="d-flex items-center" style="width: 15%">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                        </svg>

                        <p class="d-flex items-center">Back to home</p>
                    </a>
                </li>
            </ul>
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                    class="rounded-circle me-2">
                <strong>user</strong>
            </a>
        </div>
    </div>

</body>

</html>
