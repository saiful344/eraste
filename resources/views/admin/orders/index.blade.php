@extends("layout.app")
@section('content')
        <table id="data_product_side" class="display table" style="width:100%">
            <thead>
                <tr>
                    <th>Order Code</th>
                    <th>Product</th>
                    <th>Total Order</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
        <script>
            $(function() {
                $('#data_product_side').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "/orders/all_data",
                    columns: [{
                            data: 'order_code',
                            name: 'order_code'
                        },
                        {
                            data: 'product',
                            name: 'product'
                        },
                        {
                            data: 'price',
                            name: 'price'
                        },
                        {
                            data: 'action',
                            data: 'action'
                        }
                    ]
                });
            });
        </script>

@endsection