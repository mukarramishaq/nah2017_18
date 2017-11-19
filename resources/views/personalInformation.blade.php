@extends('layouts.app')

@section('content')

    <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Personal Information</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="row">
                  <div class="form-group col-md-2 col-sm-3 col-xs-4 col-md-offset-5 col-sm-offset-4 col-xs-offset-4 text-center">                   
                      <label for="imagePicker">Your Image</label>
                      <div class="img-picker" id="imagePicker"></div>
                  </div>    
                </div>       
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="name" class="form-control" id="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label for="gender">Gender</label>
                    <select class="form-control select2 select2-hidden-accessible" id="gender" style="width: 100%;" tabindex="-1" aria-hidden="true">
                      <option>Male</option>
                      <option>Female</option>
                      <option>Other</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="cNIC">CNIC</label>
                  <input type="number" size="13" class="form-control" id="cNIC" placeholder="Enter CNIC e.g. 38403xxxxxxxx">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email"  placeholder="Enter email">

                  <p class="help-block">Example block-level help text here.</p>
                </div>
                 <div class="form-group">
                  <label for="phoneNumber">Phone Number</label>
                  <input type="number" class="form-control" id="phoneNumber" placeholder="Enter Phone Number">
                </div>               
              </div>
              <!-- /.box-body -->
              <div class="box-footer text-right">
                <button type="submit" class="btn btn-primary" >Save</button>
                <button type="submit" class="btn btn-primary">Save & Next</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
    </div>
@endsection

@section('header-styles')
 <link rel="stylesheet" type="text/css" href="{{asset('css/imagePicker.css')}}">
@endsection
@section('footer-scripts')
 <script type="text/javascript" src="{{asset('js/imagePicker.js')}}" >   

 </script>
 @endsection