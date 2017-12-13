@extends('layouts.app')

@section('sidebar-menu')
<ul class="sidebar-menu" data-widget="tree">
    <li class="header"></li>
    <!-- Optionally, you can add icons to the links -->
    <li ><a href="{{route('adminPanel')}}"><i class="fa fa-home"></i> <span>Panel</span></a></li>
    
</ul>
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="box">
    <div class="box-header bg-red">
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
          <th>Gender</th>
          <th>Residence</th>
          <th>Payment Method</th>
          <th>Status</th>
          <th>Status Updated by</th>
        </tr>
        </thead>
        <tbody>
          @foreach($data as $person) 
        <tr > 
              <td>{{$person->id}}</td>
              <td onclick="document.location = 'userDetails/{{$person->id}}';">{{$person->name}}</td>
              <td>{{$person->cnic}}</td>              
              <td>{{$person->phone_number}}</td>
              <td>{{$person->gender}}</td>
              <td>{{$person->residence}}</td>
              <td>{{$person->payment_method}}</td>
              @if($person->status == 'Receipt Uploaded')
                <td><span class="label label-info">{{$person->status}}</span><a class="btn bg-magenta" href="{{route('downloadUAReceipts',[Auth::user()->id,$person->id,csrf_token()])}}" target="_blank"><i class="fa fa-cloud-download"></i></a></td>
              @elseif($person->status == 'rejected')
                <td><span class="label label-danger">{{$person->status}}</span></td>
              @elseif($person->status == 'approved')
                <td><span class="label label-success">{{$person->status}}</span></td>
              @elseif($person->status == 'default')
                <td><span class="label label-default">{{$person->status}}</span></td>
              @else
                <td><span class="label label-default">{{$person->status}}</span></td>
              @endif
              <td>{{$person->updated_by}}</td>
         
        </tr>
         @endforeach
        </a>
        
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>

<div class="modal fade" id="modal-cp">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-red">
        
        <h4 class="modal-title">Change Password</h4>
      </div>
      
      
      {!! Form::open(['route'=>'admin.changePassword','id'=>'form-cp']) !!}
      <div class="modal-body">
        <div class="form-group">
            <label>User ID</label>
            <input type="text" class="form-control" name="pid" id="id-pid">
        </div>
        <div class="form-group">
            <label >Email</label>
            <input type="text" class="form-control" name="pemail" id="id-pemail">
        </div>
        <div class="form-group">
          <label>New Password</label>
          <input type="password" class="form-control" name="npassword" id="id-npassword">
        </div>
        <div class="form-group">
          <label >Retype Password</label>
          <input type="password" class="form-control" name="repassword" id="id-repassword">
        </div>
        
      </div>
      <div class="modal-footer">
      
        <div class="form-group form-footer">
          <button class="btn bg-red" type="button" onclick="changePassword();">Change <div class="overlay">
        <i class="fa fa-refresh fa-spin fa-2x"></i>
      </div></button>
        </div>
        
      <div>
          <span class="ajax-info label col-md-12"></span>
      </div>
      
      </div>
      
      {!! Form::close() !!}
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
  <div class="box">
    <div class="box-header bg-purple">
      <h3 class="box-title">Data Table</h3>
      <button type="button" class="btn bg-red pull-right" data-toggle="modal" data-target="#modal-cp">Change Password</button>
    </div>
  <!-- /.box-header -->
    <div class="box-body">
      <table id="example2" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>User Id</th>
          <th>Name</th>
          <th>Email</th>
          
        </tr>
        </thead>
        <tbody>
          @foreach($data2 as $person) 
        <tr > 
              <td>{{$person->id}}</td>
              <td>{{$person->name}}</td>              
              <td>{{$person->email}}</td>
              
        </tr>
         @endforeach
        </a>
        
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
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
    })
  });
  $('.overlay').hide();
  $('.ajax-info').show();
  function changePassword()
        {
            $('.overlay').show();
            $('.ajax-info').addClass('label-info').text('Sending data ...');
            $('.ajax-info').show();
            
            
            var data = {

                    'user_id': $('#id-pid').val(),
                    'email':$('#id-pemail').val(),
                    'npassword':$('#id-npassword').val(),
                    'repassword':$('#id-repassword').val(),
                };
                
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'/admin/change/password/',
                type: 'POST',
                data: data,
                dataType: 'json',
                success: function(data){
                    
                    $('.overlay').hide();
                    if(data.type == 'success'){
                        $('.ajax-info').removeClass('label-info').addClass('label-success').text(data.msg).show();
                        
                    
                    }
                    else{
                        $('.ajax-info').removeClass('label-info').addClass('label-danger').text(data.msg).show();
                        
                    }

                    
                
                },
                error: function( jqXhr ) {
                    $('.overlay').hide();
                    console.log(jqXhr);
                    if( jqXhr.status === 401 ) //redirect if not authenticated user.
                        $( location ).prop( '', '/login' );
                    if( jqXhr.status === 422 ) {
                    //process validation errors here.
                    $errors = jqXhr.responseJSON; //this will get the errors response data.
                    //show them somewhere in the markup
                    //e.g
                    errorsHtml = '<ul>';
            
                    $.each( $errors, function( key, value ) {
                        errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                    });
                    errorsHtml += '</ul>';
                        
                    //$( '#form-errors' ).html( errorsHtml ); //appending to a <div id="form-errors"></div> inside form
                    $('.ajax-info').removeClass('label-info').addClass('label-danger').html(errorsHtml);
                    } else {
                        /// do some thing else
                        $('.ajax-info').removeClass('label-info').addClass('label-danger').text('Error: somethig else went wrong. Make sure you have a valid internet connection');
                             setTimeout(function() {
                                     $('.ajax-info').hide().removeClass('label-danger').addClass('label-info');
                             }, 5000);
                    }
                },

            });
        }
</script>
 @endsection