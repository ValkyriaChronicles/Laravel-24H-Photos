<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Photos Network</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/25687081cb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('photos.index') }}">Photo Network</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if (Auth::user())
                <li class="nav-item navbar-text" style="color: #fff;">
                    Welcome, {{ Auth::user()->username }}
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('photos.index') }}">Feed</a>
                  </li>
                @if (Auth::user())
              <li class="nav-item">
                <a class="nav-link" href="{{ route('auth.logout') }}">Logout</a>
              </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.register') }}">Register</a>
                </li>
                @endif
            </ul>
            <form class="d-flex" action="{{ route('photos.search') }}">
              <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
              <button class="btn btn-light" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
    <div class="container" style="padding-top: 50px;">
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            <ul>
                <li>{{ session('success') }}</li>
            </ul>
        </div>
        @endif
        @yield('content')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    </div>
</body>
</html>