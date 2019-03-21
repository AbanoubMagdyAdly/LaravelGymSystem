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
                </tr>
                </thead>
                 </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
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
        ]
    } );
} );
</script>
      @endsection
