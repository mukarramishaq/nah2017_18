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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Registrations</a></li>
        <li class="active">Person's Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Person's Details</h3>

        </div>
        <div class="box-body">
          <div class="row"> 
              <div class="col-md-4 col-sm-12 col-xs-12 col-md-push-8">
                  
                  <div class="row">      
                    <div class="col-md-8 col-sm-8 col-xs-8 col-md-offset-2 col-sm-offset-2 col-xs-offset-2"> 
                      
                      <img class="imgPicker pull-right img-responsive" id="imgViewer" src="{{asset('profile_images/'.$data->picture_path)}}" alt="your image"  width="100%"/>                     
                                              
                    </div>
                  
                </div>
              </div>
              <div class="col-md-8 col-sm-12 col-xs-12 col-md-pull-4">                 
              <div class="form-group">
                <label for="">Name</label>
                <p>{{$data->name}}</p>
              </div>   
              <div class="form-group">
                <label for="">Email</label>
                <p>{{$data->email}}</p>
              </div>           
              
              </div>
             
              </div>

              <div class="row">
              <div class="col-md-4">
                <label for="">CNIC</label>
                <p>{{$data->cnic}}</p>
              </div> 
              <div class="col-md-4">
              <div class="form-group">
                <label for="">DOB</label>
                <p>{{$data->dob}}</p>
              </div>
              </div>
              <div class="col-md-4">
              <div class="form-group">
              <label>Gender</label>
              <p>{{$data->gender}}</p>
              </div>
              </div>              
              </div>  
              <div class="row"> 
              <div class="col-md-4">
                <label for="">Registration  Number</label>
                <p>{{$data->reg_no}}</p>
              </div> 
              <div class="col-md-4">
               <div class="form-group">
                <label for="">School</label>
                <p>{{$data->school}}</p>
              </div>  
              </div>
              <div class="col-md-4">
              <div class="form-group">
                <label for="">Degree</label>
                <p>{{$data->degree}}</p>
              </div>
              </div>
              </div>              
              <div class="row">
              <div class="col-md-4">
               <div class="form-group">
                <label for="">Phone Number</label>
                <p>{{$data->phone_number}}</p>
              </div>  
              </div>
              <div class="col-md-4">
              <div class="form-group">
                <label for="">Emergency Phone Number</label>
                <p>{{$data->emergency_phone_number}}</p>
              </div>
              </div>
              <div class="col-md-4">
              <div class="form-group">
                <label for="">Disability Support</label>
                <p>{{$data->disability}}</p>
              </div>    
              </div>              
              </div>
              <div class="row">
              <div class="col-md-4">
              <div class="form-group">
                <label for="">Alumni Card</label>
                <p>{{$data->has_alumni_card}}</p>
              </div>    
              </div> 
              <div class="col-md-4">
                <label for="">Registration Type</label>
                <p>{{$data->registration_type}}</p>
              </div>
              <div class="col-md-4">
              <div class="form-group">
                <label for="">Number Of Guests</label>
                <p>{{$data->no_of_guests}}</p>
              </div>    
              </div> 
              </div>
              <div class="row">
              <div class="col-md-4">
                <label for="">Amount Due</label>
                <p>{{$data->amount_due}}</p>
              </div>
              <div class="col-md-4">
              <div class="form-group">
                <label for="">Amount Paid</label>
                <p>{{$data->amount_paid}}</p>
              </div>    
              </div> 
              </div>
              <div class="row">
              <div class="col-md-12">
              <div class="form-group">
                <label for="">Challan</label>
                <img class="img-responsive pad" src="{{asset('chalan_images/'.$data->paid_chalan_path)}}" alt="Photo">
              </div>
              </div>
              </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div>
                <span class=" ajax-info label col-md-12"></span>
            </div>
          <span  class="btn btn-flat bg-red"  onclick="reject({{$data->admin_id}},{{$data->user_id}});">Reject</span>
          <span  class="btn btn-flat bg-green" style="float: right;" onclick="approve({{$data->admin_id}},{{$data->user_id}});">Approve</span>
          
        </div>
        <!-- /.box-footer-->
        <div class="overlay">
            <i class="fa fa-refresh fa-spin fa-4x"></i>
          </div>
      </div>
      <!-- /.box -->
      

    </section>
    <!-- /.content -->

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

 
<script>
  $('.overlay').hide();
  function approve(admin_id,user_id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.overlay').show();
    
    $.ajax({
        url:'/admin/approve/'+admin_id+'/'+user_id,
        type: 'POST',
        data: {
          'admin_id':admin_id,
          'user_id':user_id,
          'action':'approve',
        },
        dataType: 'json',
        success: function(data){
            
            $('.overlay').hide();
            if(data.type == 'success'){
                $('.ajax-info').removeClass('label-info').addClass('label-success').text(data.msg).show();
                
                setTimeout(function() {
                    $('.ajax-info').hide().removeClass('label-success').addClass('label-info');
                }, 3000);
            }
            else{
                $('.ajax-info').removeClass('label-info').addClass('label-danger').text(data.msg).show();
                setTimeout(function() {
                    $('.ajax-info').hide().removeClass('label-danger').addClass('label-info');
                }, 3000);
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
  function reject(admin_id,user_id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.overlay').show();
    $.ajax({
        url:'/admin/reject/'+admin_id+'/'+user_id,
        type: 'POST',
        data: {
          'admin_id':admin_id,
          'user_id':user_id,
          'action':'reject',
        },
        dataType: 'json',
        success: function(data){
            
            $('.overlay').hide();
            if(data.type == 'success'){
                $('.ajax-info').removeClass('label-info').addClass('label-success').text(data.msg).show();
                
                setTimeout(function() {
                    $('.ajax-info').hide().removeClass('label-success').addClass('label-info');
                }, 3000);
            }
            else{
                $('.ajax-info').removeClass('label-info').addClass('label-danger').text(data.msg).show();
                setTimeout(function() {
                    $('.ajax-info').hide().removeClass('label-danger').addClass('label-info');
                }, 3000);
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