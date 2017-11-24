<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{url('/home')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>N</b>AH</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Alumni <b>Homecoming</b></span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if(!Auth::user()->is_image_uploaded)
                            <span> <i class="fa fa-user fa-lg"> </i></span>
                        @else
                            <img src="{{asset('profile_images/'.Auth::user()->id.'.png')}}" class="user-image" alt="User Image">
                        @endif
                        
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">
                            
                                {{Auth::user()->name}}
                            
                            
                            
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            
                            <div>
                                <a href="{{ route('logout') }}" class="btn btn-default btn-flat col-md-12"
                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>