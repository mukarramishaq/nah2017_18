@extends('layouts.app')

@section('sidebar-menu')
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>
            <!-- Optionally, you can add icons to the links -->
            <li ><a href="{{route('home')}}"><i class="fa fa-home"></i> <span>Home</span></a></li>
            
            <li class="active"><a href="{{route('personalInformation')}}"><i class="fa fa-user"></i> <span>Personal Information</span></a></li>
            <li ><a href="{{route('educationalInformation')}}"><i class="fa fa-mortar-board"></i> <span>Educational Information</span></a></li>
            <li ><a href="{{route('professionalInformation')}}"><i class="fa fa-black-tie"></i> <span>Professional Information</span></a></li>
            <li ><a href="#"><i class="fa fa-handshake-o"></i> <span>Support</span></a></li>
        </ul>
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="row">
      <div class="col-md-8 col-sm-10 col-md-offset-2 col-sm-offset-1">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Personal Information</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="personalInformationForm">
              <div class="box-body">
                
                <div class="row"> 
                 <div class="col-md-4 col-sm-12 col-xs-12 col-md-push-8">
                  <div class="form-group">
                  <div class="row">  
                    <div class="col-md-8 col-sm-4 col-xs-4 col-md-offset-2 col-sm-offset-4 col-xs-offset-4 text-center"> 
                      <label for="imgPicker" style="text-align: center;">Your Image</label>
                      <img class="imgPicker" id="imgViewer" src="http://placehold.it/120" alt="your image" />                      
                      <button type="button" id="uploadImage" >  Upload Image
                         <input type="file" accept=".png,.jpeg,.jpg,.gif,.tif,.bmp"  id="imagePicker"  class="hide_file" onchange="readURL(this);">
                      </button>                                           
                    </div>
                  </div>
                </div>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12 col-md-pull-4">                     
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="name" required="true" class="form-control" id="name" placeholder="Enter name">
                </div>               
               <div class="form-group">
                <label>Gender</label>
                <select  required="true"  class="form-control select2 select2-hidden-accessible"  id="gender" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  <option selected="selected" value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="other">Other</option>
                </select>
              </div>
                </div>
               
                </div>
                <div class="form-group">
                  <label for="cNIC">CNIC</label>
                  <input type="number"  required="true" size="13" class="form-control" id="cNIC" placeholder="Enter CNIC">
                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" required="true" class="form-control" id="email"  placeholder="Enter email">

                  <p class="help-block">Example block-level help text here.</p>
                </div>
                 <div class="form-group">
                  <label for="phoneNumber">Phone Number</label>
                  <input type="text" required="true" class="form-control" id="phoneNumber" placeholder="Enter Phone Number" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                  <p class="help-block">Example block-level help text here.</p>
                </div>  
                <div class="form-group">
                  <label for="emergencyPhoneNumber">Emergency Phone Number</label>
                  <input type="text" required="true" class="form-control" id="emergencyPhoneNumber" placeholder="Enter Phone Number" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                  <p class="help-block">Example block-level help text here.</p>
                </div>              
              </div>
              <!-- /.box-body -->
              <div class="box-footer text-right">
                <button type="button" class="btn btn-primary"  onclick="save();">Save</button>
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
 <script type="text/javascript" src="{{asset('js/imagePicker1.js')}}" > </script>
 <script type="text/javascript" src="{{asset('js/personal.js')}}" > </script>
 <script src="{{asset('theme/lte/plugins/input-mask/jquery.inputmask.js')}}"></script>
 <script src="{{asset('theme/lte/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
 <script src="{{asset('theme/lte/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
  <script src="{{asset('theme/lte/plugins/input-mask/jquery.inputmask.phone.extensions.js')}}"></script>
  <script>
  $(function () {
    //Money Euro
    $('[data-mask]').inputmask()

  
  })
</script>
 @endsection