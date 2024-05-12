<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Category</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
        crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .btn-primary {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Show Category</h1>
        <div class="card">
            <div class="card-body">
                <p><b>Category Name:</b> {{ $category->name }}</p>
                <p><b>Description:</b> {{ $category->description }}</p>
            </div>
        </div>
        <div class="mt-3">
            <h2>Services in this Category:</h2>
            <ul class="list-group">
                @foreach($services as $service)
                    <li class="list-group-item">{{ $service->name }}</li>
                @endforeach
            </ul>
        </div>
        <a class="btn btn-primary mt-3" href="{{ route('categories.index') }}">Back</a>
    </div>
</body>

</html>
