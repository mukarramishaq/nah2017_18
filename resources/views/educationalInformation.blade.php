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
      <div class="col-md-9">
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Educational Information</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div>
                <span class=" ajax-info label col-md-12"></span>
            </div>
            <form role="form" id="educationalInformationForm" action="{{route('educationalSaveAndNext')}}" method="POST" onsubmit="return confirm('Once submitted, you cannot access this section anymore!. Do you want to submit?');">
                {{csrf_field()}}
              <div class="box-body">
                <div class="row">
                
                <div class="col-md-6">               
                <div class="form-group">
                	<label for="">Degree Name</label>
                	<br>
                    @if($educationalI->degree == 'phd')
                        <label class = "radioLable" style="margin-right: 20px;">
                                <input type="radio" name="degreeName" value="master" class="minimal-red">
                                Master 
                        </label>
                        <label class = "radioLable" style="margin-right: 20px;">
                                <input type="radio" name="degreeName" value="phd" class="minimal-red" checked>
                                PhD 
                        </label>
                        <label class = "radioLable" style="margin-right: 20px;">
                                <input type="radio" name="degreeName" value="bachelor" class="minimal-red" >
                                Bachelor  
                        </label>

                    @elseif($educationalI->degree == 'master')
                        <label class = "radioLable" style="margin-right: 20px;">
                                <input type="radio" name="degreeName" value="master" class="minimal-red"  checked>
                                Master 
                        </label>
                        <label class = "radioLable" style="margin-right: 20px;">
                                <input type="radio" name="degreeName" value="phd" class="minimal-red">
                                PhD 
                        </label>
                        <label class = "radioLable" style="margin-right: 20px;">
                                <input type="radio" name="degreeName" value="bachelor" class="minimal-red" >
                                Bachelor  
                        </label>

                    @else
                        <label class = "radioLable" style="margin-right: 20px;">
                                <input type="radio" name="degreeName" value="master" class="minimal-red" >
                                Master 
                        </label>
                        <label class = "radioLable" style="margin-right: 20px;">
                                <input type="radio" name="degreeName" value="phd" class="minimal-red">
                                PhD 
                        </label>
                        <label class = "radioLable" style="margin-right: 20px;">
                                <input type="radio" name="degreeName" value="bachelor" class="minimal-red"  checked>
                                Bachelor  
                        </label>

                    @endif
                </div>
                </div>
                <div class="col-md-6">                
                <div class="form-group">
                    <label for="nustRegistrationNumber">NUST Registration Number</label>
                    <input type="text" value="{{$educationalI->reg_no}}"  required="true" class="form-control" name="nustRegistrationNumber" id="nustRegistrationNumber" placeholder="Enter registration Number">
                </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <label>School/College</label>
                    <select  required="true"  class="form-control select2 select2-hidden-accessible" name="school" id="school" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        @foreach($schools as $school) 
                            @if(strpos($educationalI->school,$school->name) !== false)                           
                                <option value="{{$school->name}}" selected>{{$school->name}}</option>
                            @else
                                <option value="{{$school->name}}">{{$school->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label>Discipline</label>
                    <select  required="true"  class="form-control select2 select2-hidden-accessible" name="discipline"  id="discipline" style="width: 100%;" tabindex="-1" aria-hidden="true">
                    @foreach($disciplines as $discipline)  
                        @if($educationalI->discipline == $discipline->name)  
                            <option value="{{$discipline->name}}" selected>{{$discipline->name}}</option>
                        @else                        
                            <option value="{{$discipline->name}}">{{$discipline->name}}</option>
                        @endif
                    @endforeach
                    </select>
                </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <label>Enrollment Year</label>
                    <select  required="true"  class="form-control select2 select2-hidden-accessible" name="enrollmentYear"  id="enrollmentYear" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        @for($i = 1960; $i < 2017; $i++)
                            @if($educationalI->enrollment_year == $i)
                                <option value="{{$i}}" selected>{{$i}}</option>
                            @else
                                <option value="{{$i}}">{{$i}}</option>
                            @endif
                        @endfor
                    </select>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label>Graduation Year</label>
                    <select  required="true"  class="form-control select2 select2-hidden-accessible" name="graduationYear"  id="graduationYear" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        @for($i = 1960; $i <= 2017; $i++)
                            @if($educationalI->graduation_year == $i)
                                <option value="{{$i}}" selected>{{$i}}</option>
                            @else
                                <option value="{{$i}}">{{$i}}</option>
                            @endif
                        @endfor
                    </select>
                </div>
                </div>
                </div>
                <!-- radio -->
                <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                	<label for="">Do You Have an Alumni Card?</label>
                	<br>
                    @if($educationalI->has_alumni_card == true)
                        <label class = "radioLable" style="margin-right: 20px;">
                            <input type="radio" name="alumniCard" class="minimal-red" value="1" checked>
                            Yes
                        </label>
                        <label class = "radioLable" style="margin-right: 20px;">
                            <input type="radio" name="alumniCard" class="minimal-red" value="0">
                            No
                        </label> 
                    @else
                        <label class = "radioLable" style="margin-right: 20px;">
                            <input type="radio" name="alumniCard" class="minimal-red" value="1">
                            Yes
                        </label>
                        <label class = "radioLable" style="margin-right: 20px;">
                            <input type="radio" name="alumniCard" class="minimal-red" value="0" checked>
                            No
                        </label> 
                    @endif

                </div>
                </div> 
                </div>           
              </div>
              <!-- /.box-body -->
              <div class="box-footer text-right">
                <button type="button" class="btn btn-flat bg-red"  onclick="save();">Save</button>
                <button type="submit" class="btn btn-flat bg-red">Save & Next</button>
              </div>
              <div class="overlay">
              <i class="fa fa-refresh fa-spin"></i>
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
    <script src="{{asset('js/educationalInformation.js')}}"> 
       
    </script>
    <script>
        // @foreach($disciplines as $discipline)
        //      console.log('{{$discipline->name}}');
        // @endforeach
        
 
        
        function save()
        {
            $('.overlay').show();
            $('.ajax-info').addClass('label-info').text('Sending data ...');
            $('.ajax-info').show(500);
            
            
            var data = {

                    'nustRegistrationNumber': $('#nustRegistrationNumber').val(),
                    'degreeName':$('input[name=degreeName]:checked').val(),
                    'school':$('#school').val(),
                    'discipline':$('#discipline').val(),
                    'enrollmentYear':$('#enrollmentYear').val(),
                    'graduationYear': $('#graduationYear').val(),
                    'alumniCard': $('input[name=alumniCard]:checked').val(),
                };
                
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'/educationalInformation/save',
                type: 'POST',
                data: data,
                dataType: 'json',
                success: function(data){
                    
                    $('.overlay').hide();
                    if(data.type == 'success'){
                        $('.ajax-info').removeClass('label-info').addClass('label-success').text(data.msg);
                        setTimeout(function() {
                            $('.ajax-info').hide().removeClass('label-success').addClass('label-info');
                        }, 3000);
                    }
                    else{
                        $('.ajax-info').removeClass('label-info').addClass('label-danger').text(data.msg);
                        setTimeout(function() {
                            $('.ajax-info').hide().removeClass('label-danger').addClass('label-info');
                        }, 3000);
                    }

                    
                
                },
                error: function(request, error){
                    $('.overlay').hide();
                    $('.ajax-info').removeClass('label-info').addClass('label-danger').text('Error: Unknown error. Make sure you have working internet connection!');
                    setTimeout(function() {
                        $('.ajax-info').hide().removeClass('label-danger').addClass('label-info');
                    }, 5000);
                },

            });
        }
    </script>
    <script>
        $(document).ready(function(){$('.overlay').hide();});
    </script>
@endsection