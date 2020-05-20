@extends("layout.app")
@section('content')
<h2>Create Form</h2>
<form action="/users/insert_proccess" method="post">
	{{csrf_field()}}
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
    @error('name')
     <small class="mt-2 mb-2">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group">
    <label for="email">email</label>
    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}">
    @error('email')
     <small class="mt-2 mb-2">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group">
    <label for="password">password</label>
    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{old('password')}}">
    @error('password')
     <small class="mt-2 mb-2">{{ $message }}</small>
    @enderror
  </div>
    <div class="form-group ">
    <label for="password">Role</label>
     <select class="form-control @error('role') is-invalid @enderror" name="role">
        <option value="user">User</option>
        <option value="admin">Admin</option>
      </select>
        @error('role')
       <small class="mt-2 mb-2">{{ $message }}</small>
      @enderror
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection