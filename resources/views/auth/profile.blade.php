<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'figtree', sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            padding: 20px;
        }
        .btn-primary,
        .btn-danger {
            border-radius: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Welcome to Your Profile</h1>
        <div class="card mt-3">
            <div class="card-body">
                <p class="card-text"><strong>Name:</strong> {{ Auth::user()->name }}</p>
                <p class="card-text"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                <p class="card-text"><strong>Role:</strong> {{ Auth::user()->role }}</p>
                <a href="{{ route('edit-profile') }}" class="btn btn-primary">Edit Profile</a>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
