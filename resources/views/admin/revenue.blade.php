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
                  <th>trainee</th>
                
                  <th>Gym</th>
                  <th>City</th>
                  <th >price</th>
                  

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
        processing: true,
        "paging": true,
        serverSide: true,
        "searching" : true,
        "ordering":true,
        "ajax": "/"+pathArray[1]+"/dataAjax",
        "type":"get",
        "columns": [
            {"data":'trainee.name'},
       
            {"data":'gym.name' },
            {"data":'city.name' },
            {"data": 'price'},
          
        ]
     } );
} );

function delValidate(){
          if (!confirm ('Do You Want to Delete this Post ?'))
            event.preventDefault();
        }
</script>
      @endsection
