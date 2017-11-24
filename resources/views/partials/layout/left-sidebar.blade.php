@if(Auth::check())
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
            
           
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image" id="id-left-image">
                
                <img src="{{asset('theme/lte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
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