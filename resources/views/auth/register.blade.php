<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'figtree', sans-serif;
        }
        .card {
            margin-top: 50px;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .form-control {
            border-radius: 10px;
        }
        .btn-primary {
            border-radius: 10px;
            margin-top: 10px;
        }
        .btn-link {
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h1 class="card-title">Register</h1>
                    </div>
                    <div class="card-body">
                        @if(Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if(Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="John Doe" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}" title="Password must contain at least 8 characters, including one uppercase letter, one lowercase letter, one number, and one special character." required>
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" id="role" class="form-select" required onchange="toggleAdminInput()">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="mb-3" id="adminInput" style="display: none;">
                                <label for="adminInputField" class="form-label">Admin code</label>
                                <input type="text" name="admin_input" class="form-control" id="adminInputField" placeholder="Admin code">
                            </div>
                            <div class="mb-3">
                                <div class="d-grid">
                                    <button class="btn btn-primary">Register</button>
                                </div>
                            </div>
                        </form>
                        <div class="text-center">
                            <a href="{{ route('login') }}" class="btn btn-link">Already have an account? Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleAdminInput() {
            const roleSelect = document.getElementById('role');
            const adminInputDiv = document.getElementById('adminInput');
            const adminInputField = document.getElementById('adminInputField');
            if (roleSelect.value === 'admin') {
                adminInputDiv.style.display = 'block';
                adminInputField.required = true;
            } else {
                adminInputDiv.style.display = 'none';
                adminInputField.required = false;
            }
        }
    </script>
</body>
</html>
