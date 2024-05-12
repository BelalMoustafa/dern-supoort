<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Service Request</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <h1>Show Service Request</h1>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Service ID:</th>
                            <td>{{ $request->id }}</td>
                        </tr>
                        <tr>
                            <th>User ID:</th>
                            <td>{{ $request->user_id }}</td>
                        </tr>
                        <tr>
                            <th>Description:</th>
                            <td>{{ $request->description }}</td>
                        </tr>
                        <tr>
                            <th>Request Status:</th>
                            <td>{{ $request->request_status }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <a class="btn btn-primary mt-3" href="{{ route('requests.index') }}">Back</a>
    </div>
</body>

</html>
