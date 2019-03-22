@extends('admin.layout.blank')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Hover Data Table</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="myTable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th >Show</th>
                  <th>Edit</th>
                  <th>Edit</th>

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
  $('#myTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "/citymanager/dataAjax",
        "type":"get",
        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "email" },
            {"mRender": function(data, type, row) {
              return '<a class="btn btn-info btn-sm" href=/citymanager/show/' + row.id + '>' + 'Show' + '</a>';}
            },
            {"mRender": function(data, type,row ) {
              return '<a class="btn btn-success btn-sm" href=/citymanager/' + row.id + '/edit'+ '>' + 'Edit' + '</a>';}
            },
            {"mRender": function(data, type,row ) {
              return '<a class="btn btn-warning btn-sm" href=/citymanager/' + row.id + '>' + 'Delete' + '</a>';}
            }
        ]
     } );
} );
</script>
      @endsection
