@extends('layouts.app')

@section('sidebar-menu')
        
@endsection

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Registrations</a></li>
        <li class="active">Person's Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Person's Details</h3>

        </div>
        <div class="box-body">
          <div class="row"> 
              <div class="col-md-4 col-sm-12 col-xs-12 col-md-push-8">
                  
                  <div class="row">      
                    <div class="col-md-4 col-sm-4 col-xs-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4"> 
                      
                      <img class="imgPicker pull-right img-responsive" id="imgViewer" src="http://placehold.it/200x200" alt="your image"  width="100%"/>                     
                                              
                    </div>
                  
                </div>
              </div>
              <div class="col-md-8 col-sm-12 col-xs-12 col-md-pull-4">                 
              <div class="form-group">
                <label for="">Name</label>
                <p>Farooqi</p>
              </div>   
              <div class="form-group">
                <label for="">Email</label>
                <p>abdulsamadfaruqi@gmail.com</p>
              </div>           
              
              </div>
             
              </div>

              <div class="row">
              <div class="col-md-4">
                <label for="">CNIC</label>
                <p>1234567890987</p>
              </div> 
              <div class="col-md-4">
              <div class="form-group">
                <label for="">Age</label>
                <p>18 years</p>
              </div>
              </div>
              <div class="col-md-4">
              <div class="form-group">
              <label>Gender</label>
              <p>Male</p>
              </div>
              </div>              
              </div>  
              <div class="row"> 
              <div class="col-md-4">
                <label for="">Registration  Number</label>
                <p>NUST008BESE</p>
              </div> 
              <div class="col-md-4">
               <div class="form-group">
                <label for="">School</label>
                <p>NBS</p>
              </div>  
              </div>
              <div class="col-md-4">
              <div class="form-group">
                <label for="">Degree</label>
                <p>BESE</p>
              </div>
              </div>
              </div>              
              <div class="row">
              <div class="col-md-4">
               <div class="form-group">
                <label for="">Phone Number</label>
                <p>1234567890</p>
              </div>  
              </div>
              <div class="col-md-4">
              <div class="form-group">
                <label for="">Emergency Phone Number</label>
                <p>1234567890</p>
              </div>
              </div>
              <div class="col-md-4">
              <div class="form-group">
                <label for="">Disability Support</label>
                <p>No</p>
              </div>    
              </div>              
              </div>
              <div class="row">
              <div class="col-md-4">
              <div class="form-group">
                <label for="">Alumni Card</label>
                <p>No</p>
              </div>    
              </div> 
              <div class="col-md-4">
                <label for="">Registration Type</label>
                <p>Early Bird</p>
              </div>
              <div class="col-md-4">
              <div class="form-group">
                <label for="">Number Of Guests</label>
                <p>2</p>
              </div>    
              </div> 
              </div>
              <div class="row">
              <div class="col-md-4">
                <label for="">Amount Due</label>
                <p>PKR 2500</p>
              </div>
              <div class="col-md-4">
              <div class="form-group">
                <label for="">Amount Paid</label>
                <p>PKR 0</p>
              </div>    
              </div> 
              </div>
              <div class="row">
              <div class="col-md-12">
              <div class="form-group">
                <label for="">Challan</label>
                <img class="img-responsive pad" src="http://www.sepeb.com/hot-girl-wallpaper-hd/hot-girl-wallpaper-hd-006.jpg" alt="Photo">
              </div>
              </div>
              </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="button" class="btn btn-flat bg-red"  onclick="">Reject</button>
          <button type="button" class="btn btn-flat bg-green" style="float: right;" onclick="">Approve</button>

        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection

@section('header-styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('theme/lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <style type="text/css">
    
  tr:hover {
    cursor: pointer;
}
  </style>
@endsection
@section('footer-scripts')

<!-- DataTables -->
<script src="{{asset('theme/lte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('theme/lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
 <script src="{{asset('theme/lte/plugins/input-mask/jquery.inputmask.js')}}"></script>
 <script src="{{asset('theme/lte/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>k
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.1/jquery.form.min.js"></script>
  <script>
  $(function () {
    //Money Euro
    $('[data-mask]').inputmask()

  
  })
</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  });
</script>
 @endsection