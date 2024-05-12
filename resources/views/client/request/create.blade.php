</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Service Request</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr"
    data-pc-theme="light">
    <nav class="pc-sidebar bg-primary">
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('user-home', Auth::id()) }}" class="pc-link">
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
                        <span class="pc-mtext text-light">Requests</span><span class="pc-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link text-light" href="{{ route('requests.index', Auth::id()) }}">View Requests</a></li>
                        <li class="pc-item"><a class="pc-link text-light" href="{{ route('requests.create', Auth::id()) }}">Add Request</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <header class="pc-header">
        <div class="header-wrapper">
            <div class="ms-auto">
                <ul class="list-unstyled">
                    <li class="dropdown pc-h-item header-user-profile">
                        <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="{{Route('profile')}}"
                            role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">
                            <img src="../assets/images/user/avatar-4.jpg" alt="user-image" class="user-avtar" />
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
                                <li class="breadcrumb-item"><a href="{{Route('requests.create')}}">Add Service Reuest</a></li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Add Service Reuest</h2>
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
                    <form action="{{ route('requests.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="service_id">
                                </div>
                                <div class="form-group">
                                    <strong>Service:</strong>
                                    <br>
                                    <select name="service_id" class="form-control">
                                        @foreach($services as $s)
                                            <option value="{{ $s->id }}">{{ $s->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" value="{{ Auth::id() }}" name="user_id" readonly>
                                </div>
                                <div class="form-group">
                                    <strong for="description">Description:</strong>
                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                </div>
                                <br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <script src="{{ asset('assets/js/pcoded.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
</body>
</html>
