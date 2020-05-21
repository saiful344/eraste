@extends("layout.app")
@section('content')
<h2>Order Information</h2>
<p>{{$data->name}}</p>
<p>Rp. {{$data->price}}</p>
<p>Qty {{$data->qty}} Pcs</p>
<h2>Customer Information</h2>
<form action="/orders/Output_note" method="post">
	{{csrf_field()}}
  <input type="hidden" name="product_id" value="{{$data->id}}" >
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
   @error('name')
     <small class="mt-2 mb-2">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{old('phone')}}">
    @error('phone')
     <small class="mt-2 mb-2">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address"> {{old('address')}}</textarea>
       @error('address')
     <small class="mt-2 mb-2">{{ $message }}</small>
    @enderror
  </div>
  <div class="form-group">
    <label for="qty">Qty</label>
    <input type="number" class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty" min="1" max="{{$data->qty}}" value="{{old('qty')}}">
    @error('qty')
     <small class="mt-2 mb-2">{{ $message }}</small>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary pl-4 pr-4">Beli</button>
</form>
@endsection