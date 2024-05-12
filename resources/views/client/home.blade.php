<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Dashboard</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr"
    data-pc-theme="light">
    <nav class="pc-sidebar bg-primary">
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('user-home', $user->id) }}" class="pc-link">
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
                        <li class="pc-item"><a class="pc-link text-light" href="{{ route('requests.index', ['id' => $user->id]) }}">View Requests</a></li>
                        <li class="pc-item"><a class="pc-link text-light" href="{{ route('requests.create', ['id' => $user->id]) }}">Add Request</a></li>
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
                                <li class="breadcrumb-item"><a href="{{ route('user-home', $user->id) }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('user-home', $user->id) }}">Dashboard</a></li>
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
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            Accepted Requests
                        </div>
                        <div class="card-body">
                            @foreach($acceptedRequests as $request)
                                <b>{{ $request->service->name }}&nbsp;:&nbsp;</b><span>{{ $request->description }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-warning text-white">
                            Waiting Requests
                        </div>
                        <div class="card-body">
                            @foreach($waitingRequests as $request)
                                <b>{{ $request->service->name }}&nbsp;:&nbsp;</b><span>{{ $request->description }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-danger text-white">
                            Rejected Requests
                        </div>
                        <div class="card-body">
                            @foreach($rejectedRequests as $request)
                                <b>{{ $request->service->name }}&nbsp;:&nbsp;</b><span>{{ $request->description }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/js/pcoded.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
</body>

</html>
