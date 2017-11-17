@if(Auth::check())
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            
            <div>
            <center>
                <h4>
                    
                {{Auth::user()->name == 'Unnamed' ? '' : Auth::user()->name}}
                    
                </h4>
             </center>   
            </div>
        </div>

        <!-- Sidebar Menu -->
        @yield('sidebar-menu')
        
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
@endif