@extends("layout.app")
@section('content')
<h2>Update Form</h2>
<form action="/product/edit_proccess" method="post">
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
    <label for="price">Price</label>
    <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ $data->price }}">
    @error('price')
     <small class="mt-2 mb-2">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group">
    <label for="qty">Qty</label>
    <input type="text" class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty" value="{{ $data->qty }}">
    @error('qty')
     <small class="mt-2 mb-2">{{ $message }}</small>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection