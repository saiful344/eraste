@extends("layout.app")
@section('content')
<h2>Update Form</h2>
<form action="/users/edit_proccess" method="post">
	{{csrf_field()}}
  <input type="hidden" name="id" value="{{$data->id}}">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $data->name }}">
    @error('name')
     <small class="mt-2 mb-2">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group">
    <label for="email">email</label>
    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $data->email}}">
    @error('email')
     <small class="mt-2 mb-2">{{ $message }}</small>
    @enderror
  </div>
    <div class="form-group ">
    <label for="password">Role</label>
     <select class="form-control @error('role') is-invalid @enderror" name="role">
      @foreach($data_role as $value)
        @if($value == $data->role)
          <option value="{{$value}}" selected>{{$value}}</option>
        @else
          <option value="{{$value}}">{{$value}}</option>
        @endif
      @endforeach
      </select>
        @error('role')
       <small class="mt-2 mb-2">{{ $message }}</small>
      @enderror
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection