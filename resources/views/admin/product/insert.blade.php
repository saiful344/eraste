@extends("layout.app")
@section('content')
<h2>Create Form</h2>
<form action="/product/insert_proccess" method="post">
	{{csrf_field()}}
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
    @error('name')
     <small class="mt-2 mb-2">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group">
    <label for="price">Price</label>
    <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{old('price')}}">
    @error('price')
     <small class="mt-2 mb-2">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group">
    <label for="qty">Qty</label>
    <input type="text" class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty" value="{{old('qty')}}">
    @error('qty')
     <small class="mt-2 mb-2">{{ $message }}</small>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection