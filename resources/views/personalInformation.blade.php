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
      <div class="col-md-9">
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Personal Information</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="personalInformationForm" action="{{route('personalSaveAndNext')}}" method="POST">
              {{ csrf_field() }}
              <div class="box-body">
                
                <div class="row"> 
                 <div class="col-md-4 col-sm-12 col-xs-12 col-md-push-8">
                  <div class="form-group">
                  <div class="row">  
                    <div class="col-md-4 col-sm-2 col-xs-4 col-md-offset-4 col-sm-offset-5 col-xs-offset-4 text-center"> 
                      <label for="imgPicker" style="text-align: center;">Your Image</label>
                      <img class="imgPicker" id="imgViewer" src="http://placehold.it/120" alt="your image" />                      
                      <button type="button" id="uploadImage">  Upload Image
                         <input type="file" accept=".png,.jpeg,.jpg,.gif,.tif,.bmp"  id="imagePicker"  class="hide_file" onchange="readURL(this);">
                      </button>                                           
                    </div>
                  </div>
                </div>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12 col-md-pull-4">                 
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="name" required="true" name="name" value="{{$personalI->name}}" class="form-control" id="name" placeholder="Enter name">
                </div>   
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" value="{{$personalI->email}}" name="email" required="true" class="form-control" id="email"  placeholder="Enter email">
                </div>           
                
                </div>
               
                </div>

                <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                  <label for="cNIC">CNIC</label>
                  <input type="text" value="{{$personalI->cnic}}" name="cNIC"  required="true" size="13" class="form-control" id="cNIC" placeholder="Enter CNIC" data-inputmask='"mask": "99999-9999999-9"' data-mask>
                  <p class="help-block">Example block-level help text here.</p>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                <label>Gender</label>
                <select  required="true" name="gender"  class="form-control select2 select2-hidden-accessible"  id="gender" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  @if($personalI->gender == 'male')
                    <option selected="selected" value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                  @elseif($personalI->gender == 'female')
                    <option value="male">Male</option>
                    <option value="female" selected="selected">Female</option>
                    <option value="other">Other</option>
                  @elseif($personalI->gender == 'other')
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other" selected="selected">Other</option>
                  @else
                    <option value="male" selected="selected">Male</option>
                    <option value="female">Female</option>
                    <option value="other" >Other</option>
                  @endif
                </select>
                </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                 <div class="form-group">
                  <label for="phoneNumber">Phone Number</label>
                  <input type="text" value="{{$personalI->mobile_no}}" name="phoneNumber" required="true" class="form-control" id="phoneNumber" placeholder="Enter Phone Number" data-inputmask='"mask": "(999) 999-9999999"' data-mask>
                  <p class="help-block">Example block-level help text here.</p>
                </div>  
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label for="emergencyPhoneNumber">Emergency Phone Number</label>
                  <input type="text" value="{{$personalI->emergency_no}}" name="emergencyPhoneNumber" required="true" class="form-control" id="emergencyPhoneNumber" placeholder="Enter Phone Number" data-inputmask='"mask": "(999) 999-9999999"' data-mask>
                  <p class="help-block">Example block-level help text here.</p>
                </div>
                </div>
                </div>  
                <div class="form-group">
                  <label for="">Any Disability?</label>
                  <br>
                  <label class = "radioLable" style="margin-right: 20px;">
                  <input type="radio" name="disability" class="minimal-red" value="1" checked>
                  Yes
                  </label>
                  <label class = "radioLable" style="margin-right: 20px;">
                      <input type="radio" name="disability" class="minimal-red" value="0">
                      No
                  </label> 
                  {{-- --------------------------------------------------------------------
                    @if($educationalI->any_disability == true)
                        <label class = "radioLable" style="margin-right: 20px;">
                            <input type="radio" name="disability" class="minimal-red" value="1" checked>
                            Yes
                        </label>
                        <label class = "radioLable" style="margin-right: 20px;">
                            <input type="radio" name="disability" class="minimal-red" value="0">
                            No
                        </label> 
                    @else
                        <label class = "radioLable" style="margin-right: 20px;">
                            <input type="radio" name="disability" class="minimal-red" value="1">
                            Yes
                        </label>
                        <label class = "radioLable" style="margin-right: 20px;">
                            <input type="radio" name="disability" class="minimal-red" value="0" checked>
                            No
                        </label> 
                    @endif
                    --------------------------------------------------------------------------- --}}
                </div>            
              </div>
              <!-- /.box-body -->
              <div class="overlay">
                <i class="fa fa-refresh fa-spin fa-5x"></i>
              </div>
              <div class="row">
              <div class="col-md-12">
              <div class="box-footer text-right">
                <button type="button" class="btn btn-flat bg-red"  onclick="save();">Save</button>
                <button type="submit" class="btn btn-flat bg-red">Save & Next</button>
              </div>
              </div>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-3">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Instructions</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
          </div>
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