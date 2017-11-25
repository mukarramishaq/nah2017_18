@extends('layouts.app')

@section('content')
<div class="row">        
      <div class="col-md-9">
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Chalan | Payment Decision</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            
              <div class="box-body">
                <div class="row">
                    <!-- general form elements -->
                    <div class="box box-default col-md-10 col-md-offset-1">
                        <div class="box-header with-border">
                        <h3 class="box-title">Get Chalan</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        
                        
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-1">
                                <button class="btn btn-flat bg-red">Download Chalan Form</button>
                                </div>
                            </div>
                                    
                        </div>
                       
                    </div>
                    <!-- /.box -->
                </div>

                <div class="row">
                    <!-- general form elements -->
                    <div class="box box-default col-md-10 col-md-offset-1">
                        <div class="box-header with-border">
                        <h3 class="box-title">Paid Chalan Details</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        
                        <form role="form" id="chalanMethodForm" action="{{route('chalanMethodSubmit')}}" method="POST" >
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group col-md-4 col-md-offset-1">
                                    <label for="amount">Amount</label>
                                    <input type="number" required="true" name="amount" class="form-control" id="amount" placeholder="Enter paid amount">
                                </div>
                                <div class="form-group col-md-4 col-md-offset-1">
                                    <label for="branch-address">Branch Address of HBL</label>
                                    <input type="text" required="true" name="branch-address" class="form-control" id="branch-address" placeholder="Enter Branch Address">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <input type="text" style="display:none;" id="is-chalan-uploaded">
                                </div>
                            </div>
                            <div class="row">
                                <div class="class-preview col-md-10 col-md-offset1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-1">
                                <button class="btn btn-flat bg-red"><span class="fa fa-cloud-upload"></span>Upload Paid Chalan Copy</button>
                                </div>
                            </div>

                            
                                    
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-right">
                            <button class="btn btn-flat bg-red" type="submit">Submit</button>
                        </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
                           
              </div>
              <!-- /.box-body -->
              <div class="box-footer text-right">
                
              </div>
          </div>
          <!-- /.box -->
          
        </div>
        <div class="col-md-3">
        <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Instructions</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ul>
                    <li>instruction1</li>
                </ul>
            </div>
            <!-- /.box-body -->
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
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('theme/lte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{asset('theme/lte/plugins/iCheck/icheck.min.js')}}"></script>
<script>
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
</script>
@endsection