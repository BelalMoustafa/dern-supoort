<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Service</title>
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

        .card {
            margin-bottom: 20px;
        }

        .btn-primary {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Show Service</h1>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Service Name:</th>
                    <td>{{ $service->name }}</td>
                </tr>
                <tr>
                    <th>Description:</th>
                    <td>{{ $service->description }}</td>
                </tr>
                <tr>
                    <th>Price:</th>
                    <td>{{ $service->price }}</td>
                </tr>
                <tr>
                    <th>Service Duration:</th>
                    <td>{{ $service->duration }}</td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Accepted
                    </div>
                    <div class="card-body">
                        @foreach($serviceRequests as $request)
                            @if($request->request_status == "accepted")
                                <p><b>User Name:</b> {{ $request->user->name }}</p>
                                <b>{{ $request->service->name }}:</b> {{ $request->description }}
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Waiting
                    </div>
                    <div class="card-body">
                        @foreach($serviceRequests as $request)
                            @if($request->request_status == "waiting")
                                <p><b>User Name:</b> {{ $request->user->name }}</p>
                                <b>{{ $request->service->name }}:</b> {{ $request->description }}
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <a class="btn btn-primary" href="{{ route('services.index') }}">Back</a>
    </div>
</body>

</html>
