@extends('layouts.app')
@section('sidebar-menu')
<ul class="sidebar-menu" data-widget="tree">
    <li class="header"></li>
    <!-- Optionally, you can add icons to the links -->
    <li ><a href="{{route('adminPanel3')}}"><i class="fa fa-home"></i> <span>Panel</span></a></li>
    
</ul>
@endsection

@section('content')
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Table</h3>
    </div>
  <!-- /.box-header -->
    <div class="box-body">
    	<div class="row"><div class="col-md-12">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>User Id</th>
          <th>Name</th>
          <th>CNIC</th>
          <th>Phone Number</th>
          <th>M/F</th>
          <th>Res.</th>
          <th>P.Method</th>
          <th>Status</th>
          <th style="font-size:10px;">Status Updated by</th>
        </tr>
        </thead>
        <tbody style="font-size:14px;">
          @foreach($data as $person) 
        <tr > 
              <td onclick="document.location = '{{route('userDetails3',[$person->id])}}';">{{$person->id}}</td>
              <td onclick="document.location = '{{route('userDetails3',[$person->id])}}';">{{$person->name}}</td>
              <td onclick="document.location = '{{route('userDetails3',[$person->id])}}';">{{$person->cnic}}</td>              
              <td onclick="document.location = '{{route('userDetails3',[$person->id])}}';">{{$person->phone_number}}<br></td>
              <td onclick="document.location = '{{route('userDetails3',[$person->id])}}';">{{$person->gender == 'male' ? 'M' : 'F'}}</td>
              @if($person->residence == 'pakistani')
              	<td onclick="document.location = '{{route('userDetails3',[$person->id])}}';">PAK</td>
              @elseif($person->residence == 'overseas')
              	<td onclick="document.location = '{{route('userDetails3',[$person->id])}}';">OVS</td>
              @else
              	<td onclick="document.location = '{{route('userDetails3',[$person->id])}}';"></td>
              @endif
              
              <td onclick="document.location = '{{route('userDetails3',[$person->id])}}';">{{$person->payment_method}}</td>
              @if($person->status == 'Receipt Uploaded')
                <td style="font-size:12px;"><span class="label label-info">{{$person->status}}</span></td>
              @elseif($person->status == 'rejected')
                <td style="font-size:12px;"><span class="label label-danger">{{$person->status}}</span></td>
              @elseif($person->status == 'approved')
                <td style="font-size:12px;"><span class="label label-success">{{$person->status}}</span></td>
              @elseif($person->status == 'default')
                <td style="font-size:12px;"><span class="label label-default">{{$person->status}}</span></td>
              @else
                <td style="font-size:12px;"><span class="label label-default">{{$person->status}}</span></td>
              @endif
              <td style="font-size:10px;" onclick="document.location = 'userDetails/{{$person->id}}';">{{$person->updated_by}}</td>
         
        </tr>
         @endforeach
        </a>
        
        </tfoot>
      </table>
      </div></div>
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