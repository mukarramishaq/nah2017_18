@if(Auth::check())
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
            
           
        <!-- Sidebar user panel -->
        <div class="user-panel" style="padding-bottom: 60px;">
            <div class="row">
            <div class="col-md-12">
            <div class="image" id="id-left-image" style="width: inherit;">
                @if(!Auth::user()->is_image_uploaded)
                    <span> <i class="fa fa-user fa-4x"> </i></span>
                @else
                    <img src="{{asset('profile_images/'.Auth::user()->id.'.png')}}" class="img-circle" alt="User Image" style="width: inherit;">
                @endif
            </div>
            </div>
            </div>
            <div class="info" style="padding-left: 0px;">
               
                       <center><p style="font-size: 18px;">{{Auth::user()->name == 'Unnamed' ? '' : Auth::user()->name}}</p></center> 
                  
              
            </div>

        </div>

        <!-- Sidebar Menu -->
        @yield('sidebar-menu')
        
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
@endif