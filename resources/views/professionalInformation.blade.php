@extends('layouts.app')

@section('sidebar-menu')
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>
            <!-- Optionally, you can add icons to the links -->
            <li ><a href="{{route('home')}}"><i class="fa fa-home"></i> <span>Home</span></a></li>
            
            <li ><a href="{{route('personalInformation')}}"><i class="fa fa-user"></i> <span>Personal Information</span></a></li>
            <li ><a href="{{route('educationalInformation')}}"><i class="fa fa-mortar-board"></i> <span>Educational Information</span></a></li>
            <li class="active"><a href="{{route('professionalInformation')}}"><i class="fa fa-black-tie"></i> <span>Professional Information</span></a></li>
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
              <h3 class="box-title">Professional Information</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="personalInformationForm">
              <div class="box-body">
                <div class="form-group">
                    <label>Employed</label>
                    <select  required="true"  class="form-control select2 select2-hidden-accessible" name="employed"  id="employed" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        <option selected="selected" value="unemployed">Un-employed</option>
                        <option value="employed">Employed</option>
                        <option value="selfemployed">Self-employed</option>
                    </select>
                </div> 
                <div class="form-group collapse Employed">
                    <label>Industry</label>
                    <select  required="true"  class="form-control select2 select2-hidden-accessible" name="industry"  id="industry" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        <option selected="selected" value="male">Software House</option>
                        <option value="female">Bank</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group collapse Employed-industry">
                  <input type="name" required="true" class="form-control" name="otherIndustry" id="otherIndustry" placeholder="Enter your industry name">
                </div>   
                <div class="form-group collapse Employed">
                  <label for="organization">Organization</label>
                  <input type="name" required="true" class="form-control" name="organization" id="organization" placeholder="Enter your organization name">
                </div>  
                <div class="form-group collapse Employed">
                  <label for="designation">Designation</label>
                  <input type="name" required="true" class="form-control" name="designation" id="designation" placeholder="Enter your desigantion">
                </div>
                <div class="form-group collapse Employed">
                    <label>Your Designation</label>
                    <select  required="true"  class="form-control select2 select2-hidden-accessible" name="designation" id="designation" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        <option selected="selected" value="male">Software House</option>
                        <option value="female">Bank</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group collapse Employed-designation">
                  <input type="name" required="true" class="form-control" name="otherDesignation" id="otherDesignation" placeholder="Enter your industry name">
                </div>
                <div class="form-group collapse Self-employed">
                    <label>Industry</label>
                    <select  required="true"  class="form-control select2 select2-hidden-accessible" name="eIndustry"  id="eIndustry" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        <option selected="selected" value="male">Software House</option>
                        <option value="female">Bank</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group collapse Self-employed-industry">
                	<input type="name" required="true" class="form-control" name="eOtherIndustry" id="eOtherIndustry" placeholder="Enter your industry name">
                </div> 
                <div class="form-group collapse Self-employed">
                  <label for="eCompany">Company</label>
                  <input type="name" required="true" class="form-control" name="eCompany" id="eCompany" placeholder="Enter your company name">
                </div> 
                <div class="form-group collapse Self-employed">
	                <label>Established Date</label>

	                <div class="input-group date">
		                <div class="input-group-addon">
		            	    <i class="fa fa-calendar"></i>
		                </div>
		                <input type="text" class="form-control pull-right" name="establishedDate" id="establishedDate">
		            </div>
	                <!-- /.input group -->
	            </div>
	            <div class="form-group collapse Self-employed">
                    <label>Your Designation</label>
                    <select  required="true"  class="form-control select2 select2-hidden-accessible" name="eDesignation" id="eDesignation" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        <option selected="selected" value="male">Software House</option>
                        <option value="female">Bank</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group collapse Self-employed-designation">
                  <input type="name" required="true" class="form-control" name="eOtherDesignation" id="eOtherDesignation" placeholder="Enter your industry name">
                </div>
                <div class="form-group collapse Self-employed">
                    <label for="eCompanyLogo">Company Logo</label>
                    <input type="file" name="eCompanyLogo" id="eCompanyLogo">
                    <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="form-group collapse Self-employed">
                  <label for="eTotalEmployes">Total Employees</label>
                  <input type="name" required="true" class="form-control" name="eTotalEmployes" id="eTotalEmployes" placeholder="Enter number of employees">
                </div>
                <div class="form-group collapse Self-employed">
                  <label for="eTotalNustEmployes">Total NUSTians (Employees)</label>
                  <input type="name" required="true" class="form-control" name="eTotalNustEmployes" id="eTotalNustEmployes" placeholder="Enter number of NUSTians employees">
                </div>  
                <div class="form-group collapse Self-employed">
                  <label for="eWebsite">Website/Social Media Link</label>
                  <input type="url" required="true" class="form-control" name="eWebsite" id="eWebsite" placeholder="Enter website link">
                </div> 
                <div class="form-group">
                    <label>Current Country</label>
                    <select  required="true"  class="form-control select2 select2-hidden-accessible" name="currentCountry"  id="currentCountry" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        <option selected="selected" value="male">Pakistan</option>
                        <option value="female">USA</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="currentCity">Current City</label>
                  <input type="text" required="true" class="form-control" name="currentCity"  id="currentCity" placeholder="Enter current city">
                </div> 
                <div class="form-group">
                  <label for="currentAddress">Current Address</label>
                  <input type="text" required="true" class="form-control" name="currentAddress" id="currentAddress" placeholder="Enter current address">
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
  <link rel="stylesheet" href="{{asset('theme/lte/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset('theme/lte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('theme/lte/plugins/iCheck/all.css')}}">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{asset('theme/lte/plugins/timepicker/bootstrap-timepicker.min.css')}}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('theme/lte/plugins/iCheck/all.css')}}">
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
@endsection