@extends('layouts.app')

@section('sidebar-menu')
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"></li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{route('home')}}"><i class="fa fa-home"></i> <span>Home</span></a></li>
            
            <li ><a href="#"><i class="fa fa-user"></i> <span>{{__('navbar.account')}}</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-credit-card"></i> <span>{{__('navbar.billing.billing')}}</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    
                    <li><a href="#">{{__('navbar.billing.mycards')}}</a></li>
                    <li><a href="#">{{__('navbar.billing.invoices')}}</a></li>
                </ul>
            </li>

            <li ><a href="#"><i class="fa fa-handshake-o"></i> <span>{{__('navbar.support')}}</span></a></li>
        </ul>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
<!--<div class="row">
    

</div>-->
@endsection

@section('footer-scripts')

@endsection

@section('header-styles')

@endsection
