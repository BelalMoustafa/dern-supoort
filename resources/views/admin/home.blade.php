<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
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
                                <li class="breadcrumb-item"><a href="{{Route('admin-home')}}">Dashboard</a></li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Home</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @if($services->isEmpty())
                <div class="col-md-12">
                    <div class="alert alert-warning" role="alert">
                        No data available.
                    </div>
                </div>
                @else
                @foreach($services as $service)
                <div class="col-md-4 col-sm-6">
                    <div class="card statistics-card-1 overflow-hidden ">
                        <div class="card-body">
                            <img src="../assets/images/widget/img-status-4.svg" alt="img" class="img-fluid img-bg">
                            <h5 class="mb-4">{{$service->name}}</h5>
                            <div class="d-flex align-items-center mt-3">
                                <h3 class="f-w-300 d-flex align-items-center m-b-0">${{$service->price}}</h3>
                            </div>
                            <p class="text-muted mb-2 text-sm mt-3">This service takes time: {{$service->duration}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                <div class="col-md-12 col-xl-12">
                    @if($waitingRequests->isEmpty())
                    <div class="alert alert-danger" role="alert">
                        No requests available.
                    </div>
                    @else
                    <div class="card table-card">
                        <div class="card-header d-flex align-items-center justify-content-between py-3">
                            <h5>Last Requests</h5>
                        </div>
                        <div class="card-body py-2 px-0">
                            <div class="table-responsive">
                                <table class="table table-hover table-borderless table-sm mb-0">
                                    <thead>
                                        <tr>
                                            <th>Service Name</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($waitingRequests as $request)
                                        <tr>
                                            <td>{{ $request->service->name }}</td>
                                            <td>{{ $request->description }}</td>
                                            <td>{{ $request->request_status }}</td>
                                            <td>
                                                <form action="{{ route('admin-requests.acc', ['request_id' => $request->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="request_id" value="{{ $request->id }}">
                                                    <button type="submit" class="btn btn-success">Accepted</button>
                                                </form>
                                                <form action="{{ route('admin-requests.re', ['request_id' => $request->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="request_id" value="{{ $request->id }}">
                                                    <button type="submit" class="btn btn-danger">Rejected</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>

    <script src="{{ asset('assets/js/pcoded.js') }}"></script>
</body>

</html>
