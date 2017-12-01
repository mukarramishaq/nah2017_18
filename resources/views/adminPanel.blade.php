@extends('layouts.app')

@section('sidebar-menu')
        
@endsection

@section('content')
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Table</h3>
    </div>
  <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>User Id</th>
          <th>Name</th>
          <th>CNIC</th>
          <th>Phone Number</th>
          <th>Payment Method</th>
          <th>Status</th>
          <th>Status Updated by</th>
        </tr>
        </thead>
        <tbody>
          {{--

          @foreach($data as $person) 
        <tr onclick="document.location = 'userDetails/?id={{$person->id}}';"> 
              <td>{{$person->id}}</td>
              <td>{{$person->name}}</td>
              <td>{{$person->cnic}}</td>              
              <td>{{$person->phone_number}}</td>
              <td>{{$person->payment_method}}</td>
              <td>{{$person->status}}</td>
              <td>{{$person->status_updated_by}}</td>
         
        </tr>
         @endforeach
        --}}
        </a>
        <tr>
          <td>Trident</td>
          <td>Internet
            Explorer 5.0
          </td>
          <td>1</td>
          <td>5</td>
          <td>C</td>
          <td>X</td>
          <td>X</td>
        </tr>
        <tr>
          <td>Trident</td>
          <td>Internet
            Explorer 5.0
          </td>
          <td>1</td>
          <td>5</td>
          <td>C</td>
          <td>X</td>
          <td>X</td>
        </tr>
        <tr>
          <td>Trident2</td>
          <td>Internet
            Explorer 4.0
          </td>
          <td>1</td>
          <td>9</td>
          <td>C</td>
          <td>E</td>
          <td>C</td>
        </tr>
        <tr>
          <td>Trident</td>
          <td>Internet
            Explorer 5.5
          </td>
          <td>Win 96+</td>
          <td>5.6</td>
          <td>B</td>
          <td>Y</td>
          <td>X</td>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
@endsection

@section('header-styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('theme/lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <style type="text/css">
    
  tr:hover {
    cursor: pointer;
}
  </style>
@endsection
@section('footer-scripts')

<!-- DataTables -->
<script src="{{asset('theme/lte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('theme/lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
 <script src="{{asset('theme/lte/plugins/input-mask/jquery.inputmask.js')}}"></script>
 <script src="{{asset('theme/lte/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>k
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.1/jquery.form.min.js"></script>
  <script>
  $(function () {
    //Money Euro
    $('[data-mask]').inputmask()

  
  })
</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  });
</script>
 @endsection