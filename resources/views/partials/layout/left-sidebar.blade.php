@if(Auth::check())
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
            
           
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image" id="id-left-image">
                @if(!Auth::user()->is_image_uploaded)
                    <span> <i class="fa fa-user fa-4x"> </i></span>
                @else
                    <img src="{{asset('profile_images/'.Auth::user()->id.'.png')}}" class="img-circle" alt="User Image">
                @endif
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name == 'Unnamed' ? '' : Auth::user()->name}}</p>
                
            </div>
        </div>

        <!-- Sidebar Menu -->
        @yield('sidebar-menu')
        
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
@endif