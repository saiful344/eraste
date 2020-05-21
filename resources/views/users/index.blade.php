@extends("layout.app")
@section('content')
<h2>Product</h2>
<div class="row">
@foreach($data as $value)
<div class="card m-4" style="width: 18rem;">
  <img src="https://www.mondragon-assembly.com/wp-content/uploads/2016/04/cosmetic1.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{ $value->name }}</h5>
    <p class="card-text">Rp. {{ $value->price }}</p>
    <a href="/buys/{{$value->id}}" class="btn btn-success col-12" >Beli</a>
  </div>
</div>
@endforeach
</div>
@endsection