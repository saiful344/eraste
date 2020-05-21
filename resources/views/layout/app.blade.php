<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eraste.</title>
    <link rel="stylesheet" href="{{ asset('DataTable/app.css')}}">
    <link rel="stylesheet" href="{{ asset('DataTable/datatables.min.css')}}">
    <script src="{{ asset('DataTable/jquery.min.js')}}"></script>
    <script src="{{ asset('DataTable/datatables.min.js')}}"></script>
</head>
 
<body class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    @if(auth()->user() == true)
    @if(auth()->user()->role === "admin")
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="/product">Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/orders">Orders</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="/users">Users</a>
      </li>
    </ul>
    @endif
    @endif
    <form class="form-inline my-2 my-lg-0 ">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    @if(auth()->user() == true)
      <li class="nav-item">
        <a class="nav-link" href="/logout">Log out</a>
      </li>
     @else
      <li class="nav-item">
        <a class="nav-link" href="/login">Login</a>
      </li>
      @endif
    </ul>
    </form>
  </div>
</nav>
@yield('content')
</body>
</html>
