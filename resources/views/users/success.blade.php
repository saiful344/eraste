@extends("layout.app")
@section('content')
<h2>Success!</h2>
<div class="row">
  <div class="col-6">
    <p>Order No</p>
    <p>Produk Name</p>
    <p>Qty</p>
    <p>Total</p>
  </div>
  <div class="col-6">
    <p>{{$data_order->order_code}}</p>
    <p>{{$data_order->product->name}}</p>
    <p>{{$data_order->qty}}</p>
    <p><?php echo "Rp. ".number_format($data_order->qty * $data_order->product->price,2)?></p>
  </div>
</div>
  <a class="btn btn-primary pl-4 pr-4 text-white" href="/">Kembali Beli Product</a>
@endsection