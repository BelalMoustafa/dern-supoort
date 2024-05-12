<!DOCTYPE html>
<html lang="en">

<head>
    <title>Show Category</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr"
    data-pc-theme="light">
    <nav class="pc-sidebar bg-primary text-light">
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item pc-hasmenu">
                    <a href="{{Route('admin-home')}}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-gauge"></i>
                        </span>
                        <span class="pc-mtext text-light">Dashboard</span>
                    </a>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-list"></i>
                        </span>
                        <span class="pc-mtext text-light">Categories</span><span class="pc-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item "><a class="pc-link text-light" href="{{Route('categories.index')}}">View Categories</a></li>
                        <li class="pc-item "><a class="pc-link text-light" href="{{Route('categories.create')}}">Add Category</a></li>
                    </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-gear"></i>
                        </span>
                        <span class="pc-mtext text-light">Services</span><span class="pc-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item "><a class="pc-link text-light" href="{{Route('services.index')}}">View Services</a></li>
                        <li class="pc-item"><a class="pc-link text-light" href="{{Route('services.create')}}">Add Service</a></li>
                    </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-bell"></i>
                        </span>
                        <span class="pc-mtext text-light">Requests</span><span class="pc-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item text-light"><a class="pc-link text-light" href="{{Route('admin-requests.index')}}">View Waiting</a></li>
                        <li class="pc-item text-light"><a class="pc-link text-light" href="{{Route('admin-requests.accept')}}">View accepted</a></li>
                        <li class="pc-item text-light"><a class="pc-link text-light" href="{{Route('admin-requests.reject')}}">View rejected</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <header class="pc-header ">
        <div class="header-wrapper">
            <div class="me-auto pc-mob-drp">
                <ul class="list-unstyled">
                    <li class="pc-h-item d-none d-md-inline-flex">
                        <form action="{{ route('categories.search') }}" method="GET">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Search for category..." name="query">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="ms-auto">
                <ul class="list-unstyled">
                    <li class="dropdown pc-h-item header-user-profile">
                        <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="{{Route('profile')}}"
                            role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">
                            <img src="{{asset('assets/images/user/avatar-4.jpg')}}" alt="user-image" class="user-avtar" />
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="pc-container">
        <div class="pc-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{Route('admin-home')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{Route('categories.index')}}">Category</a></li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Category</h2>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Category Description</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        <form action="{{ route('categories.destroy', $category->id)}}" method="Post">
                                            <a class="btn btn-primary" href="{{Route('categories.show', $category->id)}}">show Category</a>
                                            <a class="btn btn-warning" href="{{route('categories.edit', $category->id) }}">Edit Category</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a class="btn btn-primary ms-3" href="{{ route('admin-home') }}">Back</a>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/pcoded.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
</body>
</html>
