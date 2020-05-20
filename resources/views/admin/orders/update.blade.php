@extends("layout.app")
@section('content')
<h2>Update Form</h2>
<form action="/orders/edit_proccess" method="post">
	{{csrf_field()}}
  <input type="hidden" name="id" value="{{ $data->id }}">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $data->name }}">
     @error('name')
     <small class="mt-2 mb-2">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group">
    <label for="phone">No Phone</label>
    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $data->phone }}">
     @error('phone')
     <small class="mt-2 mb-2">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ $data->address }}">
     @error('address')
     <small class="mt-2 mb-2">{{ $message }}</small>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection