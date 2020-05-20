@extends("layout.app")
@section('content')
<br>
<a class="btn" href="/product/insert">Inser Data</a>
<br>
<br>
        <table id="data_product_side" class="display table" style="width:100%">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
        <script>
            $(function() {
                $('#data_product_side').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "/product/all_data",
                    columns: [{
                            data: 'code',
                            name: 'code'
                        },
                        {
                            data: 'name',
                            name: 'name'
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