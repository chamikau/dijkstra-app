<!DOCTYPE html>
<html>
<head>
    <title>Home - Dijkstra</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark px-3">
    <a class="navbar-brand" href="#">Dijkstra App</a>
    <a href="/logout" class="btn btn-outline-light btn-sm">Logout</a>
</nav>

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow p-4">

                <h3 class="text-center mb-4">Shortest Path Finder</h3>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="/shortest-path">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Start Node</label>
                        <input type="text"
                            name="start"
                            class="form-control @error('start') is-invalid @enderror"
                            placeholder="Enter A - I"
                            value="{{ old('start') }}">

                        @error('start')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">End Node</label>
                        <input type="text"
                            name="end"
                            class="form-control @error('end') is-invalid @enderror"
                            placeholder="Enter A - I"
                            value="{{ old('end') }}">

                        @error('end')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        Find Shortest Path
                    </button>
                </form>

            </div>

            @if(isset($result))
                <div class="card shadow mt-4 p-4">

                    <h4 class="text-success">Result</h4>
                    <hr>

                    <p><strong>Path:</strong> {{ $result['path'] }}</p>
                    <p><strong>Total Distance:</strong> {{ $result['distance'] }}</p>

                </div>
            @endif

        </div>
    </div>

</div>

</body>
</html>