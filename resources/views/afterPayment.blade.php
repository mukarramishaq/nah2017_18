@extends('layouts.app')

@section('content')
<div class="row">        
      <div class="col-md-9">
            <!-- general form elements -->
            <div class="box box-danger">
                <div class="box-header with-border">
                <h3 class="box-title">Payment Verification</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
            
            
                <div class="box-body">
                    <div class="row">
                        
                        <p class="col-md-10 col-md-offset-1">Thank You for registering for this worderful event. We'll inform you about your payment verification through email or call within 24-48 hours.</p>
                    </div>
                            
                </div>
                <!-- /.box-body -->
              
              
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-3">
            <div class="row">
        <div class="col-md-12">
        <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Contact Us</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="row"><div class="col-md-12">
            <p>In case of any query contact us on</p>
            <p><b>Email:</b></p>
            <p><span class="label label-info" style="font-size: 14px;">registrations@homecoming.nust.edu.pk</span></p>
            <p><span class="label label-info" style="font-size: 14px;">support@alumni.nust.edu.pk</span></p>
            <p><b>Phone Number:</b></p>
            <p><span class="label label-info" style="font-size: 14px;">+923343631447</span></p>
            <p><span class="label label-info" style="font-size: 14px;">051-90856838</span></p>
            </div></div>
            </div>
            <!-- /.box-body -->
           
        </div>
        </div>
        </div>
    </div>
        
</div>
@endsection
@section('header-styles')
<link rel="stylesheet" href="{{asset('theme/lte/plugins/iCheck/all.css')}}">
@endsection

@section('footer-scripts')
<!-- jQuery 3 -->
<script src="{{asset('theme/lte/bower_components/jquery/dist/jquery.min.js')}}"></script>


@endsection