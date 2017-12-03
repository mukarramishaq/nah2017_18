@extends('layouts.app')

@section('content')
<div class="row">        
    <div class="col-md-4 col-xs-10 col-xs-offset-1 col-md-offset-1">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{$data->total_user_accounts}}</h3>
            </div>
            
            <div class="small-box-footer">
                <p>Total User Accounts</p>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-md-4 col-xs-10 col-xs-offset-1 col-md-offset-1">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
               <h3>{{$data->total_no_of_guests}}</h3>
            </div>
            
            <div class="small-box-footer">
                <p>Total Guests</p>
            </div>
        </div>
    </div>
    <!-- ./col -->    
</div>
<div class="row">        
    <div class="col-md-4 col-xs-10 col-xs-offset-1 col-md-offset-1">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{$data->total_overseas_accounts}}</h3>
            </div>
            
            <div class="small-box-footer">
                <p>No of international alumni</p>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-md-4 col-xs-10 col-xs-offset-1 col-md-offset-1">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
               <h3>{{$data->total_overseas_guests}}</h3>
            </div>
            
            <div class="small-box-footer">
                <p>Guests accompanying international alumni</p>
            </div>
        </div>
    </div>
    <!-- ./col -->    
</div>
<div class="row">        
    <div class="col-md-4 col-xs-10 col-xs-offset-1 col-md-offset-1">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{$data->total_local_accounts}}</h3>
            </div>
            
            <div class="small-box-footer">
                <p>Total Local Alumni</p>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-md-4 col-xs-10 col-xs-offset-1 col-md-offset-1">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
               <h3>{{$data->total_local_guests}}</h3>
            </div>
            
            <div class="small-box-footer">
                <p>Guests accompanying local alumni</p>
            </div>
        </div>
    </div>
    <!-- ./col -->    
</div>
<div class="row">        
    <div class="col-md-4 col-xs-10 col-xs-offset-1 col-md-offset-1">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{$data->total_paid_accounts}}</h3>
            </div>
            
            <div class="small-box-footer">
                <p>Total Paid Alumni</p>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-md-4 col-xs-10 col-xs-offset-1 col-md-offset-1">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
               <h3>{{$data->total_paid_guests}}</h3>
            </div>
            
            <div class="small-box-footer">
                <p>Total Paid Guests</p>
            </div>
        </div>
    </div>
    <!-- ./col -->    
</div>
<div class="row">        
    <div class="col-md-4 col-xs-10 col-xs-offset-1 col-md-offset-1">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{$data->total_chalan_accounts}}</h3>
            </div>
            
            <div class="small-box-footer">
                <p>Alumni selected Challan</p>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-md-4 col-xs-10 col-xs-offset-1 col-md-offset-1">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
               <h3>{{$data->total_online_accounts}}</h3>
            </div>
            
            <div class="small-box-footer">
                <p>Alumni selected Online Payment</p>
            </div>
        </div>
    </div>
    <!-- ./col -->    
</div>
@endsection
@section('header-styles')
<link rel="stylesheet" href="{{asset('theme/lte/plugins/iCheck/all.css')}}">
@endsection

@section('footer-scripts')
<!-- jQuery 3 -->
<script src="{{asset('theme/lte/bower_components/jquery/dist/jquery.min.js')}}"></script>


@endsection