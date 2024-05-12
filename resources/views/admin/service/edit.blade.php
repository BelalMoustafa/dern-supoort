<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Service</title>
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
                                <li class="breadcrumb-item"><a href="{{Route('services.edit', $service->id)}}">Update Service</a></li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Update Service</h2>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    @if(session('status'))
                        <div class="alert alert-success mb-1 mt-1">
                        {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('services.update', $service->id) }}" method="POST"enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Category:</strong>
                                    <br>
                                    <select name="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $service->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Service Name:</strong>
                                    <br>
                                    <input type="text" name="name" class="form-control"placeholder="Service Name" value="{{ $service->name }}">
                                    @error('name')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Service description:</strong>
                                    <br>
                                    <input type="text" name="description" class="form-control"placeholder="Service Description" value="{{ $service->description }}">
                                    @error('description')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Price:</strong>
                                    <br>
                                    <input type="text" name="price" class="form-control" placeholder="Service Price"value="{{ $service->price }}">
                                    @error('price')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Duration:</strong>
                                    <br>
                                    <input type="text" name="duration" class="form-control" placeholder="Service Duration"value="{{ $service->duration }}">
                                    @error('duration')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary ms-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/pcoded.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
</body>
</html>
