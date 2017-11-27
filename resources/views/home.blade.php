@extends('layouts.app')

@section('sidebar-menu')
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{route('home')}}"><i class="fa fa-home"></i> <span>Home</span></a></li>
            
            <li ><a href="{{route('personalInformation')}}"><i class="fa fa-user"></i> <span>Personal Information</span></a></li>
            <li ><a href="{{route('educationalInformation')}}"><i class="fa fa-mortar-board"></i> <span>Educational Information</span></a></li>
            <li ><a href="{{route('professionalInformation')}}"><i class="fa fa-black-tie"></i> <span>Professional Information</span></a></li>
            <li ><a href="#"><i class="fa fa-handshake-o"></i> <span>Support</span></a></li>
        </ul>
@endsection

@section('content')
<div class="row">        
<div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-danger">
          <div class="box-header with-border">
          <h3 class="box-title">Welcome to NUST Homecoming' 17</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
      
      
          <div class="box-body">
              
                <div class="col-md-10 col-md-offset-1">
                  <h3>Information regarding Fee Structure</h3>
                  <ul>
                    <li>Registration Fee per Alumnus is PKR {{$price->alumni_price}}/-</li>
                    <li>Alumnus can bring with him his close relatives (i.e spouse, child) as guests</li>
                    <li>Guests will be charged too. Per guest,  the alumnus has to pay PKR {{$price->guest_price}}/-</li>
                  </ul>
                  <h3>Information regarding Application</h3>
                  <ul>
                    <li>For successful registration, you'll have to complete the application</li>
                    <li>Fill out any stage of application carefully. Once you move to next then you will not be able to access/edit that stage later</li>
                    <li>If you have not completed any stage of application then just click <button type="button" class="btn bg-red btn-flat">Save</button>. Your incomplete stage will be saved and you can access that stage later.</li>
                    <li><span class="fa fa-warning fa-2x fa-red"></span> But Once you click on <button type="button" class="btn btn-flat bg-red">Save and Next</button> your stage will be submitted and you'll be redirected to next stage and you will no longer be able to access that stage in future.</li>
                  </ul>
                <div>
             
                      
          </div>
          <!-- /.box-body -->
          <br><br><br>
          <div class="box-footer text-right">
            <button type="button" class="btn btn-flat bg-red text-right">Continue Application</button>
          </div>
        
        
      </div>
      <!-- /.box -->
  </div>
  
</div>
<!--<div class="row">
    

</div>-->
@endsection

@section('footer-scripts')

@endsection

@section('header-styles')

@endsection
