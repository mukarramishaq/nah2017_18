@extends('layouts.app')

@section('sidebar-menu')
        <!-- <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>
            <!-- Optionally, you can add icons to the links 
            <li ><a href="{{route('home')}}"><i class="fa fa-home"></i> <span>Home</span></a></li>
            
            <li ><a href="{{route('personalInformation')}}"><i class="fa fa-user"></i> <span>Personal Information</span></a></li>
            <li ><a href="{{route('educationalInformation')}}"><i class="fa fa-mortar-board"></i> <span>Educational Information</span></a></li>
            <li class="active"><a href="{{route('professionalInformation')}}"><i class="fa fa-black-tie"></i> <span>Professional Information</span></a></li>
            <li ><a href="#"><i class="fa fa-handshake-o"></i> <span>Support</span></a></li>
        </ul> -->
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="row">
      <div class="col-md-9">
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Professional Information</h3>
            </div>
            <!-- /.box-header -->
            <div>
                <span class=" ajax-info label col-md-12"></span>
            </div>
            <!-- form start -->
            <form role="form" id="professionalInformationForm" action="{{route('professionalSaveAndNext')}}" method="POST" novalidate onsubmit="return confirm('Once submitted, you cannot access this section anymore!. Do you want to submit?');">
              {{csrf_field()}}
              <div class="box-body">
                <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <label>Employed</label>
                    <select  required="true"  class="form-control select2 select2-hidden-accessible" name="employed"  id="employed" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        @if($professionalI->employed == "selfemployed")
                            <option value="unemployed" >Un-employed</option>
                            <option value="employed">Employed</option>
                            <option value="selfemployed" selected>Self-employed</option>
                            <option value="highereducation">Higher Education</option>
                        @elseif($professionalI->employed == "employed")
                            <option value="unemployed" >Un-employed</option>
                            <option value="employed" selected>Employed</option>
                            <option value="selfemployed">Self-employed</option>
                            <option value="highereducation">Higher Education</option>
                        @elseif($professionalI->employed == "highereducation")
                            <option value="unemployed" >Un-employed</option>
                            <option value="employed">Employed</option>
                            <option value="selfemployed">Self-employed</option>
                            <option value="highereducation" selected>Higher Education</option>
                        @else
                            <option value="unemployed" selected>Un-employed</option>
                            <option value="employed">Employed</option>
                            <option value="selfemployed">Self-employed</option>
                            <option value="highereducation">Higher Education</option>
                        @endif
                    </select>
                </div> 
                </div>
                <div class="col-md-6">
                <div class="form-group collapse Employed">
                    <label>Industry</label>
                    <input type="name" required="true" value="{{$professionalI->industry}}" class="form-control" name="eIndustry" id="eIndustry" placeholder="Enter your industry name">
                </div> 
                </div>
                <div class="col-md-6">
                <div class="form-group collapse Self-employed">
                    <label>Industry</label>                    
                    <input type="name" required="true" class="form-control" name="seIndustry" value="{{$professionalI->industry}}" id="seIndustry" placeholder="Enter your industry name">
                </div> 
                </div>
                </div> 
                <div class="row"> 
                <div class="col-md-6">
                <div class="form-group collapse Employed">
                  <label for="organization">Organization</label>
                  <input type="name" required="true" value="{{$professionalI->organization}}" class="form-control" name="eOrganization" id="eOrganization" placeholder="Enter your organization name">
                </div> 
                </div>
                <div class="col-md-6"> 
                <div class="form-group collapse Employed">
                  <label>Your Designation</label>                    
                  <input type="name" required="true" value="{{$professionalI->designation}}" class="form-control" name="eDesignation" id="eDesignation" placeholder="Enter your designation">
                </div>  
                </div>
                </div>  
                <div class="row">
                <div class="col-md-6">            
                <div class="form-group collapse Self-employed">
                  <label for="eCompany">Startup/Company Name</label>
                  <input type="name" required="true" class="form-control" value="{{$entrepI->company_name}}" name="seCompany" id="seCompany" placeholder="Enter your startup name">
                </div> 
                </div>
                <div class="col-md-6">
                <div class="form-group collapse Self-employed">
                    <label>Your Designation</label>                    
                    <input type="name" required="true" value="{{$entrepI->designation}}" class="form-control" name="seDesignation" id="seDesignation" placeholder="Enter your designation">
                </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6 collapse Higher-education">
                <div class="form-group">
                    <label>University Name</label>                    
                    <input type="name" required="true" value="{{$higherE->university_name}}" class="form-control" name="heUniversityName" id="heUniversityName" placeholder="Enter your university name">
                </div>
                </div>
                <div class="col-md-6 collapse Higher-education">
                <div class="form-group">
                  <label>Degree Title</label>                   
                  <input type="name" required="true" value="{{$higherE->degree_name}}" class="form-control" name="heDegreeName" id="heDegreeName" placeholder="Enter your degree name"> 
                </div> 
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <label>Current Country</label>
                    <div class="input-group">
                    <span class="input-group-addon" id="span-flag-img"></span>
                    <select  required="true"  class="form-control select2 select2-hidden-accessible" name="currentCountry"  id="currentCountry" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        @foreach($countries as $country)
                          @if($professionalI->country == $country->iso_3166_2)
                            <option value="{{$country->iso_3166_2}}" selected>{{$country->name}}</option>
                          @else
                            <option value="{{$country->iso_3166_2}}"> {{$country->name}}</option>
                          @endif
                        @endforeach
                    </select>
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label for="currentCity">Current City</label>
                  <input type="text" required="true" value="{{$professionalI->city}}" class="form-control" name="currentCity"  id="currentCity" placeholder="Enter current city">
                </div> 
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                  <label for="currentAddress">Current Address</label>
                  <input type="text" required="true" value="{{$professionalI->address}}" class="form-control" name="currentAddress" id="currentAddress" placeholder="Enter current address">
                </div>
                </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer text-right">
                <button type="button" class="btn btn-flat bg-red"  onclick="save();">Save</button>
                <button type="button" class="btn btn-flat bg-red" onclick="saveAndNext();">Save & Next</button>
              </div>
              <div class="overlay">
              <i class="fa fa-refresh fa-spin"></i>
            </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-3">
        <div class="row">
        <div class="col-md-12">
        <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Guidelines</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <ul>
                <li>If you want to edit this page after some time then just click on save button. <b class="bg-red"><i>Once you clicked on Save and Next. Then you won't be able to access this section any more </i></b></li>
            </ul>
            </div>
            <!-- /.box-body -->
           
        </div>
        </div>
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
  <link rel="stylesheet" href="{{asset('theme/lte/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('theme/lte/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('theme/lte/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{asset('theme/lte/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset('theme/lte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('theme/lte/plugins/iCheck/all.css')}}">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{asset('theme/lte/plugins/timepicker/bootstrap-timepicker.min.css')}}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('theme/lte/plugins/iCheck/all.css')}}">  
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{asset('theme/lte/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{asset('theme/lte/plugins/timepicker/bootstrap-timepicker.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('theme/lte/dist/css/skins/_all-skins.min.css')}}">
  <style>
		.radioLable{
			font-weight:normal;
		}
	</style>

@endsection

@section('footer-scripts')
<script type="text/javascript" src="{{asset('js/professionalInformation.js')}}" > </script>
<!-- InputMask -->
<script src="{{asset('theme/lte/plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{asset('theme/lte/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{asset('theme/lte/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
<!-- date-range-picker -->
<script src="{{asset('theme/lte/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('theme/lte/bower_components/moment/min/moment.min.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('theme/lte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{asset('theme/lte/plugins/iCheck/icheck.min.js')}}"></script>
<!-- Page script -->
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

  })
</script>
<script>
  $(document).ready(function(){
    $('.overlay').hide();
    p = "{{url('flags')}}";
    flagname = $('#currentCountry').val();
    $('#span-flag-img').html('<img src="'+p+'/'+flagname+'.png" />');
    $('#currentCountry').on('change',function(e){
      flagname = $('#currentCountry').val();
      $('#span-flag-img').html('<img src="'+p+'/'+flagname+'.png" />');
    });
  });
</script>
<script src="{{asset('js/professional.js')}}">
  
</script>
@endsection