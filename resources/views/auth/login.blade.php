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
<h2 class="text-center mt-4 mb-4">Login</h2>
<form action="/postlogin" method="post" class="m-auto col-5">
  {{csrf_field()}}
  <div class="form-group">
    <label for="name">Email</label>
    <input type="text" class="form-control @error('email') is-invalid @enderror" id="name" name="email" value="{{old('email')}}">
   @error('email')
     <small class="mt-2 mb-2">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="password" class="form-control @error('password') is-invalid @enderror" id="phone" name="password" value="{{old('password')}}">
    <div class="col-12 text-center">
  <button type="submit" class="btn btn-primary pl-4 pr-4 mt-5">Login</button>
  </div>
</form>
</body>
</html>
