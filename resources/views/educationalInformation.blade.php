@extends('layouts.app')

@section('sidebar-menu')
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>
            <!-- Optionally, you can add icons to the links -->
            <li ><a href="{{route('home')}}"><i class="fa fa-home"></i> <span>Home</span></a></li>
            
            <li ><a href="{{route('personalInformation')}}"><i class="fa fa-user"></i> <span>Personal Information</span></a></li>
            <li class="active"><a href="{{route('educationalInformation')}}"><i class="fa fa-mortar-board"></i> <span>Educational Information</span></a></li>
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
              <h3 class="box-title">Educational Information</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="personalInformationForm">
              <div class="box-body">
                
                <div class="form-group">
	                <label for="nustRegistrationNumber">NUST Registration Number</label>
	                <input type="number"  required="true" size="13" class="form-control" id="nustRegistrationNumber" placeholder="Enter registration Number">
	                <p class="help-block">Example block-level help text here.</p>
                </div>
               <!-- radio -->
                <div class="form-group">
                	<label for="">Degree Name</label>
                	<br>
                    <label class = "radioLable" style="margin-right: 20px;">
                        <input type="radio" name="degreeRadio" value="bachelor" class="minimal-red" checked>
                        Bachelor
                    </label>
                    <label class = "radioLable" style="margin-right: 20px;">
                        <input type="radio" name="degreeRadio" value="master" class="minimal-red">
                        Master
                    </label>
                    <label class = "radioLable">
                        <input type="radio" name="degreeRadio" value="phd" class="minimal-red">
                        PhD
                    </label>
                </div>
                <div class="form-group">
                    <label>School</label>
                    <select  required="true"  class="form-control select2 select2-hidden-accessible"  id="gender" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        <option selected="selected" value="male">NBS</option>
                        <option value="female">SEECS</option>
                        <option value="other">SADA</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Discipline</label>
                    <select  required="true"  class="form-control select2 select2-hidden-accessible"  id="gender" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        <option selected="selected" value="male">SE</option>
                        <option value="female">EE</option>
                        <option value="other">CS</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Enrolment Year</label>
                    <select  required="true"  class="form-control select2 select2-hidden-accessible"  id="gender" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        <option selected="selected" value="male">1960</option>
                        <option value="female">1990</option>
                        <option value="other">2017</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Graduation Year</label>
                    <select  required="true"  class="form-control select2 select2-hidden-accessible"  id="gender" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        <option selected="selected" value="male">1960</option>
                        <option value="female">1990</option>
                        <option value="other">2017</option>
                    </select>
                </div>
                <!-- radio -->
                <div class="form-group">
                	<label for="">Do You Have an Alumni Card?</label>
                	<br>
                    <label class = "radioLable" style="margin-right: 20px;">
                        <input type="radio" name="cardRadio" class="minimal-red">
                        Yes
                    </label>
                    <label class = "radioLable" style="margin-right: 20px;">
                        <input type="radio" name="cardRadio" class="minimal-red" checked>
                        No
                    </label>                    
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
  <!-- iCheck for checkboxes and radio inputs -->
  	<link rel="stylesheet" href="{{asset('theme/lte/plugins/iCheck/all.css')}}">
  	<style>
		.radioLable{
			font-weight:normal;
		}
	</style>
@endsection

@section('footer-scripts')
	<!-- iCheck 1.0.1 -->
	<script src="{{asset('theme/lte/plugins/iCheck/icheck.min.js')}}"></script>
	<script>
	  $(function () {
	   
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