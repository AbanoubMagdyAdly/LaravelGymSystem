@extends('admin.layout.blank')

@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="myTable" class=" col-sm-11 row-sm-3 table table-bordered row- table-light text-dark table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Manager ID</th>
                            <th>City ID</th>

                            <th >Show</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                        </thead>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <td>

        <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready( function () {
                var pathArray = window.location.pathname.split('/');
                $('#myTable').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "/"+pathArray[1]+"/dataAjax",
                    "type":"get",
                    "columns": [
                        { "data": "id" },
                        { "data": "name" },
                        { "data": "created_at" },
                        { "data": "user.name" },
                        { "data": "city.name" },

                        {"mRender": function(data, type, row) {
                                return '<a class="btn btn-info btn-sm" href=/'+pathArray[1]+'/show/' + row.id + '>' + 'Show' + '</a>';}
                        },
                        {"mRender": function(data, type,row ) {
                                return '<a class="btn btn-warning btn-sm" href=/'+pathArray[1]+'/' + row.id + '/edit'+ '>' + 'Edit' + '</a>';}
                        },
                        {"mRender": function(data, type,row ) {
                                return '<a class="btn btn-danger btn-sm" href=/'+pathArray[1]+'/' + row.id + '>' + 'Delete' + '</a>';}
                        }
                    ]
                } );
            } );


            function delValidate(){
                if (!confirm ('Do You Want to Delete this Post ?'))
                    event.preventDefault();
            }
        </script>
@endsection