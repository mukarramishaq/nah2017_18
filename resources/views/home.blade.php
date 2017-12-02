@extends('layouts.app')

@section('sidebar-menu')
        <!-- <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>
            <!-- Optionally, you can add icons to the links 
            <li class="active"><a href="{{route('home')}}"><i class="fa fa-home"></i> <span>Home</span></a></li>
            
            <li ><a href="{{route('personalInformation')}}"><i class="fa fa-user"></i> <span>Personal Information</span></a></li>
            <li ><a href="{{route('educationalInformation')}}"><i class="fa fa-mortar-board"></i> <span>Educational Information</span></a></li>
            <li ><a href="{{route('professionalInformation')}}"><i class="fa fa-black-tie"></i> <span>Professional Information</span></a></li>
            <li ><a href="#"><i class="fa fa-handshake-o"></i> <span>Support</span></a></li>
        </ul> -->
@endsection

@section('content')
<div class="row">        
<div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-danger">
          <div class="box-header with-border">
         

          </div>
          <!-- /.box-header -->
          <!-- form start -->
      
      
          <div class="box-body ">
              
                <div class="col-md-10 col-md-offset-1">
                  @if(!$user->is_verified)
                  <h1>Welcome to NUST Alumni Homecoming' 17</h1>
                  @else
                    <h1>Welcome back {{strtoupper($user->name)}}</h1>
                  @endif
                   @if(!$user->is_verfied)
                    <h3 class="box-title"> {{strtoupper('Hello '.$user->name)}},</h3>
                  @endif
                  
                  
                  <p>Homecoming gives the opportunity to reinforce the relationship shared
between the alumni and their Alma mater, along with providing numerous
networking opportunities for entrepreneurs and enthusiasts to promote
their aims. It also encourages alumni to participate actively in the
NUST community, to attend events, to volunteer, to create new ways for
alumni to stay connected to NUST and to contribute to the greatness of
NUST University.</p>
                <div>
             
                      
          </div>
          <!-- /.box-body -->
          <br><br><br>
          <div class="box-footer text-right">
                  @if($status->status == 'approved')
                    <span class="alert alert-success">Your application has been approved by Registrations Team. We hope to see you soon on event day. :)</span>
                    
                  @elseif($status->status == 'rejected')
                    <span class="alert alert-danger">Your application has been rejected by Registrations Team. For further query contact +92-335-3591055.</span>
                    
                  @else
            <a href="{{route('personalInformation')}}" class="btn btn-flat bg-red text-right">Continue</a>
              @endif
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

<style type="text/css">
  .vertical-align {
    display: inline-block;
    vertical-align: middle;
    float: none;
}
</style>

@endsection
