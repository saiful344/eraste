@extends("layout.app")
@section('content')
<br>
<a class="btn" href="/users/insert">Inser Data</a>
<br>
<br>
        <table id="data_product_side" class="display table" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
        <script>
            $(function() {
                $('#data_product_side').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "/users/all_data",
                    columns: [{
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'email',
                            name: 'email'
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