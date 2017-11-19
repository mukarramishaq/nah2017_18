@extends('layouts.app')

@section('content')
    <div class="row">
      <div class="col-md-8 col-sm-10 col-md-offset-2 col-sm-offset-1">
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
                 <div class="col-md-4 col-sm-12 col-xs-12 col-md-push-8">
                  <div class="form-group">
                  <div class="row">  
                    <div class="col-md-8 col-sm-4 col-xs-6 col-md-offset- col-sm-offset-4 col-xs-offset-3 text-center"> 
                      <label for="imgPicker" style="text-align: center;">Your Image</label>
                      <img class="imgPicker" id="blah" src="http://placehold.it/120" alt="your image" />                      
                      <div id="chooseImage">  Choose Image
                         <input type="file" id="imgPicker" class="hide_file" onchange="readURL(this);">
                      </div>                                           
                    </div>
                  </div>    
                </div>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12 col-md-pull-4">                     
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="name" class="form-control" id="name" placeholder="Enter name">
                </div>               
                <div class="form-group">
                  <label for="">Gender</label>
                  <div class="row">
                    <div class="radio col-md-2">
                      <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
                        Male
                      </label>
                    </div>
                    <div class="radio col-md-2" style="margin-top: 10px;">
                      <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                        Female
                      </label>
                    </div>
                    <div class="radio col-md-2" style="margin-top: 10px;">
                      <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                        Others
                      </label>
                    </div>
                  </div>
                </div>
                </div>
               
                </div>
                <div class="form-group">
                  <label for="cNIC">CNIC</label>
                  <input type="number" size="13" class="form-control" id="cNIC" placeholder="Enter CNIC">
                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email"  placeholder="Enter email">

                  <p class="help-block">Example block-level help text here.</p>
                </div>
                 <div class="form-group">
                  <label for="phoneNumber">Phone Number</label>
                  <input type="number" class="form-control" id="phoneNumber" placeholder="Enter Phone Number">
                  <p class="help-block">Example block-level help text here.</p>
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
 <link rel="stylesheet" type="text/css" href="{{asset('css/imagePicker1.css')}}">
@endsection
@section('footer-scripts')
 <script type="text/javascript" src="{{asset('js/imagePicker1.js')}}" >   

 </script>
 @endsection