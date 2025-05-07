<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puskesmas Djatiroto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container">
            <h2>Puskesmas Djatiroto</h2>
        </div>
        <div class="container">
            @if(Auth::check())
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">
                    Login
                </a>
            @endif
        </div>
    </header>

    <div class="container mt-4">
        @if(Auth::check())
            <h1> Welcome, {{ Auth::user()->name }} </h1>
        @else
            <h1> Welcome, Guest </h1>
        @endif
    </div>
</body>
</html>
