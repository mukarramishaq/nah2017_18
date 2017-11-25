@extends('layouts.app')

@section('content')
<div class="row">        
      <div class="col-md-9">
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Payment Method | Payment Decision</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form role="form" id="paymentMethodForm" action="#" method="POST" >
                {{csrf_field()}}
              <div class="box-body">
                <div class="row">
                    
                    <div class="form-group">
                        <div class="col-md-4  form-group">
                            <label>
                                <input type="radio" name="payment-method" class="minimal minimal-red form-control" checked>
                                Chalan
                            </label>
                        </div>
                        <div class="col-md-4  form-group">
                            <label>
                                <input type="radio" name="payment-method" class="minimal minimal-red form-control">
                                Online Payment
                            </label>
                        </div>
                        <div class="col-md-4  form-group">
                            <label>
                                <input type="radio" name="payment-method" class="minimal minimal-red form-control">
                                Cash on Delivery
                            </label>
                        </div>
                    </div>
                </div>
                           
              </div>
              <!-- /.box-body -->
              <div class="box-footer text-right">
                <button type="submit" class="btn btn-flat bg-red">Next</button>
              </div>
              
            </form>
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

@endsection