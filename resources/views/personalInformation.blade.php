@extends('layouts.app')

@section('sidebar-menu')
        <!-- <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>
            <!-- Optionally, you can add icons to the links 
            <li ><a href="{{route('home')}}"><i class="fa fa-home"></i> <span>Home</span></a></li>
            
            <li class="active"><a href="{{route('personalInformation')}}"><i class="fa fa-user"></i> <span>Personal Information</span></a></li>
            <li ><a href="{{route('educationalInformation')}}"><i class="fa fa-mortar-board"></i> <span>Educational Information</span></a></li>
            <li ><a href="{{route('professionalInformation')}}"><i class="fa fa-black-tie"></i> <span>Professional Information</span></a></li>
            <li ><a href="#"><i class="fa fa-handshake-o"></i> <span>Support</span></a></li>
        </ul> -->
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

        <div class="modal fade" id="modal-pic">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-red">
                
                <h4 class="modal-title">Upload Your Picture</h4>
              </div>
              {!! Form::open(['route'=>'ajax.upload-image','files'=>'true']) !!}
              <div class="modal-body">
                
                  <span class="label label-danger error-msg" style="display:none">
                      
                  </span>
                  <div class="row">
                    <div class="preview-uploaded-image col-md-4 col-md-offset-4" >
                    </div>
                    <div class="overlay">
                <i class="fa fa-refresh fa-spin fa-5x"></i>
              </div>
                  </div>
                  <div class="form-group input-picture">
                    <label>Image:</label>
                    <input type="file" name="image" class="form-control">
                  </div>
                  
                
              </div>
              <div class="modal-footer">
              
                <div class="form-group form-footer">
                <button class="btn bg-red upload-image" type="submit">Upload Image</button>
                </div>
              </div>
              {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


    <div class="row">
      <div class="col-md-9">
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Personal Information</h3>
            </div>
            <!-- /.box-header -->
            <div>
                <span class=" ajax-info label col-md-12"></span>
            </div>
            <!-- form start -->
            <form role="form" id="personalInformationForm">
              {{ csrf_field() }}
              <div class="box-body">
                
                <div class="row"> 
                 <div class="col-md-4 col-sm-12 col-xs-12 col-md-push-7">
                  
                  <div class="row">      
                    <div class="col-md-4 col-sm-4 col-xs-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4"> 
                      <div style="width: 100px; margin-top: 10px;" class="class-imgv-div">
                      @if(!$personalI->picture_path)
                      <img class="imgPicker" id="imgViewer" src="http://via.placeholder.com/400" alt="your image"  width="100%"/>
                      @else
                        <img class="imgPicker" id="imgViewer" src="{{asset('profile_images/'.$personalI->picture_path)}}" alt="your image"  width="100%"/>
                      @endif
                      <input style="display:none;" type="text" id="id-is-picture-uploaded" name="is-picture-uploaded" value="{{$personalI->picture_path}}" required>
                      <input style="margin-top: 5px; width: inherit; font-size: 12px;" type="button" class="btn bg-red btn-flat"  data-toggle="modal" data-target="#modal-pic" onclick="" value="Upload Image"/> 
                      </div>                         
                    </div>
                  
                </div>
              </div>
                <div class="col-md-8 col-sm-12 col-xs-12 col-md-pull-4">   
                <div class="row">  
                <div class="col-md-9">            
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="name" required="true" name="name" value="{{$personalI->name}}" class="form-control" id="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label for="cNIC">CNIC</label>
                  <input type="text" value="{{$personalI->cnic" name="cNIC"  required="true" size="13" class="form-control" id="cNIC" placeholder="12345-6789012-3" data-inputmask='"mask": "99999-9999999-9"' data-mask>
                </div>  
                </div>
                </div>        
                
                </div>
               
                </div>

                <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                <label>Gender</label>
                <select  required="true" name="gender"  class="form-control select2 select2-hidden-accessible"  id="gender" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  @if($personalI->gender == 'male')
                    <option selected="selected" value="male">Male</option>
                    <option value="female">Female</option>
                  @elseif($personalI->gender == 'female')
                    <option value="male">Male</option>
                    <option value="female" selected="selected">Female</option>
                  @else
                    <option value="male" selected="selected">Male</option>
                    <option value="female">Female</option>
                  @endif
                </select>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label>Date of Birth</label>

                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" value="{{$personalI->dob}}" class="form-control pull-right" name="dob" id="datepicker" required>
                  </div>
                  <!-- /.input group -->
                </div>
                </div>
                </div>  
                <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" value="{{$personalI->email}}" name="email" required="true" class="form-control" id="email"  placeholder="Enter email">
                </div>                   
                </div>
                <div class="col-md-6">
                 <div class="form-group">
                  <label for="phoneNumber">Phone Number</label>
                  <input type="text" value="{{$personalI->mobile_no}}" name="phoneNumber" required="true" class="form-control" id="phoneNumber" placeholder="(092) 336-1234567" data-inputmask='"mask": "(999) 999-9999999"' data-mask>
                </div>
                </div>                
                </div>
                <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                  <label for="emergencyPhoneNumber">Emergency Phone Number</label>
                  <input type="text" value="{{$personalI->emergency_no}}" name="emergencyPhoneNumber" required="true" class="form-control" id="emergencyPhoneNumber" placeholder="(092) 336-1234567" data-inputmask='"mask": "(999) 999-9999999"' data-mask>
                </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Any Disability?</label>
                    <br>
                    @if($personalI->disability)
                      <label class = "radioLable" style="margin-right: 20px;">
                      <input type="radio" name="disability" class="minimal-red" value="1" checked>
                      Yes
                      </label>
                      <label class = "radioLable" style="margin-right: 20px;">
                        <input type="radio" name="disability" class="minimal-red" value="0" >
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
                    
                  </div>    

                </div>
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
                <button type="button" class="btn btn-flat bg-red" onclick="saveAndNext();">Save & Next</button>
              </div>
              </div>
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
               <ul style="padding-left: 15px;">
                    <li>Name: Enter your full name. Use only alphabets.</li>
                    <li>CNIC Format e.g 33303-3344555-6</li>
                    <li>Phone number Format (country-code) company-code seven digit number e.g (092) 334-1122333</li>
                    <li>If you want to edit this page after some time then just click on save button. <b class="bg-red"><i>Once you clicked on Save and Next. Then you won't be able to access this section any more </i></b></li>
                </ul>
            </div>
            <!-- /.box-body -->
          </div>
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
 <link rel="stylesheet" type="text/css" href="{{asset('css/imagePicker1.css')}}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{asset('theme/lte/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset('theme/lte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
@endsection
@section('footer-scripts')
 <script type="text/javascript" src="{{asset('js/imagePicker1.js')}}" > </script>
 <script type="text/javascript" src="{{asset('js/personal.js')}}" > </script>
 <script src="{{asset('theme/lte/plugins/input-mask/jquery.inputmask.js')}}"></script>
 <script src="{{asset('theme/lte/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
 <script src="{{asset('theme/lte/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
  <script src="{{asset('theme/lte/plugins/input-mask/jquery.inputmask.phone.extensions.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.1/jquery.form.min.js"></script>
<!-- date-range-picker -->
<script src="{{asset('theme/lte/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('theme/lte/bower_components/moment/min/moment.min.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('theme/lte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
  <script>
  $(function () {
    //Money Euro
    $('[data-mask]').inputmask()

  
  })
</script>
<script type="text/javascript">
      $("body").on("click",".upload-image",function(e){
        $.ajaxSetup({ cache: false });
        $('.overlay').show();
        $(this).parents("form").ajaxForm({ 
          complete: function(response) 
          {
          $('.overlay').hide();
            
            if($.isEmptyObject(response.responseJSON.image)){
              $('.error-msg').css('display','none');
              d = new Date();
              $('.preview-uploaded-image').html('<img src="'+response.responseJSON.url+'?'+d.getTime()+'" height="100px" width="100px">');
              $('#modal-pic .modal-footer .form-footer').html('<button class="btn bg-red upload-image" type="submit">Change Image</button><button class="btn bg-red" data-dismiss="modal">Close</button>');
              $('.class-imgv-div').html('<img class="imgPicker" id="imgViewer" src="'+response.responseJSON.url+'?'+d.getTime()+'" alt="your image"  width="100%"/><input style="margin-top: 5px; width: inherit; font-size: 12px;" type="button" class="btn bg-red btn-flat"  data-toggle="modal" data-target="#modal-pic" onclick="" value="Upload Image"/> ');
              $('#id-is-picture-uploaded').val(response.responseJSON.url+"");
                      
            }else{
              var msg=response.responseJSON.image;
              $('#modal-pic .modal-footer .form-footer').html('<button class="btn bg-red upload-image" type="submit">Change Image</button><button class="btn bg-red" data-dismiss="modal">Close</button>');
              $(".error-msg").find("ul").html('');
              $(".error-msg").css('display','block');
              $.each( msg, function( key, value ) {
                $(".error-msg").html(value);
              });
            }
          }
        });
      });

      $(document).ready(function(){
        
        //$('#modal-pic').modal({backdrop: 'static', keyboard: false});
        //$('#modal-pic').modal('hide');
        //$('#modal-pic').modal('show');
       
      });
</script>
<script>
  $(function () {
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
      //Money Euro
    $('[data-mask]').inputmask()
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

  })
</script>
 @endsection
