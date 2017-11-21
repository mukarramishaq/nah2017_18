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
      <div class="col-md-12 col-sm-12">
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
	                <input type="text"  required="true" class="form-control" name="nustRegistrationNumber" id="nustRegistrationNumber" placeholder="Enter registration Number">
	                <p class="help-block">Example block-level help text here.</p>
                </div>
               <!-- radio -->
                <div class="form-group">
                	<label for="">Degree Name</label>
                	<br>
                    <label class = "radioLable" style="margin-right: 20px;">
                        <input type="radio" name="degreeName" value="bachelor" class="minimal-red" checked>
                        Bachelor
                    </label>
                    <label class = "radioLable" style="margin-right: 20px;">
                        <input type="radio" name="degreeName" value="master" class="minimal-red">
                        Master
                    </label>
                    <label class = "radioLable">
                        <input type="radio" name="degreeName" value="phd" class="minimal-red">
                        PhD
                    </label>
                </div>
                <div class="form-group">
                    <label>School/College</label>
                    <select  required="true"  class="form-control select2 select2-hidden-accessible" name="school" id="school" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        @foreach($schools as $school)                            
                            <option value="{{$school->name}}">{{$school->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Discipline</label>
                    <select  required="true"  class="form-control select2 select2-hidden-accessible" name="discipline"  id="discipline" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        
                    </select>
                </div>
                <div class="form-group">
                    <label>Enrolment Year</label>
                    <select  required="true"  class="form-control select2 select2-hidden-accessible" name="enrolmentYear"  id="enrolmentYear" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        @for($i = 1960; $i < 2017; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div>
                <div class="form-group">
                    <label>Graduation Year</label>
                    <select  required="true"  class="form-control select2 select2-hidden-accessible" name="graduationYear"  id="graduationYear" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        @for($i = 1960; $i < 2017; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div>
                <!-- radio -->
                <div class="form-group">
                	<label for="">Do You Have an Alumni Card?</label>
                	<br>
                    <label class = "radioLable" style="margin-right: 20px;">
                        <input type="radio" name="alumniCard" class="minimal-red">
                        Yes
                    </label>
                    <label class = "radioLable" style="margin-right: 20px;">
                        <input type="radio" name="alumniCard" class="minimal-red" checked>
                        No
                    </label>                    
                </div>            
              </div>
              <!-- /.box-body -->
              <div class="box-footer text-right">
                <button type="button" class="btn btn-flat bg-red"  onclick="save();">Save</button>
                <button type="submit" class="btn btn-flat bg-red">Save & Next</button>
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
    <script> 
        var disciplines = {{$disciplines}};
        console.log(disciplines);
    </script>
@endsection