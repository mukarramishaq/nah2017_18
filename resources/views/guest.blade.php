@extends('layouts.app')

@section('sidebar-menu')
        
@endsection

@section('content')
<div class="row">
<section class="col-md-9">
<div class="box">

<div class="box-header">
        <h3 class="box-title">Guests Info | Registration Fee</h3>
    </div>

    <div class="box-body">
                    <div class="row">

<div class="box box-danger col-md-6 col-xs-10 col-xs-offset-1 col-md-offset-1">
    <div class="box-header with-border">
        <h3 class="box-title">Add Guests</h3>
    </div>
    
    



<form role="form" id="GuestsInformationForm" action="{{route('guestAdd')}}" method="POST" >
                {{csrf_field()}}
              <div class="box-body">
                    <div class="row">
                
                        <div class="col-md-6">               
                            <div class="form-group">
                	            <label for="guestName">Guest Name</label>
                                <input type="text" required="true" class="form-control" name="guestName" id="guestName" placeholder="Enter Guest Name">
                            </div>
                        </div>
                        <div class="col-md-6">                
                            <div class="form-group">
                                <label for="guestContact">Guest CNIC/B-form</label>
                                <input type="text" required="true" class="form-control" name="guestContact" id="guestContact" placeholder="Enter Guest CNIC/B-from Number" data-inputmask='"mask": "99999-9999999-9"' data-mask>
                            </div>
                        </div>
                    </div>

                    {{--  next row  --}}

                    <div class="row">
                
                        <div class="col-md-6">               
                            <div class="form-group">
                	            <label for="guestRelation">Relation</label>
                                <select  required="true" name="guestRelation"  class="form-control select2 select2-hidden-accessible"  id="gender" style="width: 100%;" tabindex="-1" aria-hidden="true">
                  
                                    <option selected="selected" value="Spouse">Spouse</option>
                                    <option value="child">Child</option>
                 
                                </select>
                                <span class="label label-danger">Children under age of 5 need not to be added.</span>
                            </div>
                        </div>
                        
                    </div>




                
              <!-- /.box-body -->
              <div class="box-footer text-right">
                <button type="submit" class="btn btn-flat bg-red">Add Guest</button>
              </div>
              </div>
              
            </form>










</div>
<div class="col-md-4 col-xs-10 col-xs-offset-1">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h4>{{$price->registration_type == 'earlybird' ? 'Early Bird Registration' : ''}}</h4>
              <h4>Total:</h4> <h3>Rs.{{(count($guests)*$price->guest_price)+$price->alumni_price}}/-</h3>

              
            </div>
            
            <div class="small-box-footer"><p>Alumni Fee: Rs.{{$price->alumni_price}}/- per alumnus</p><p>Guest Fee: Rs.{{$price->guest_price}}/- per guest</p></div>
          </div>
        </div>
        <!-- ./col -->
</div>
<!-- /.row -->


  <!-- ends here  -->
<div class="box box-danger">
    <div class="box-header with-border">
      <h3 class="box-title">Added Guests</h3>
    </div>
  <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Name</th>
          <th>CNIC</th>
          <th>Relation</th>
          
        </tr>
        </thead>
        <tbody>
         
          
          @foreach($guests as $g) 
        <tr> 
              
              <td>{{$g->name}}</td>
              <td>{{$g->contact_no}}</td>              
              <td>{{$g->relation}}</td>
              <th><button type="submit" class="btn btn-flat bg-red" onclick="removeButton('{{route('guestDelete',['id'=>$g->id])}}')">Remove Guest</button></th>
          
        </tr>
         @endforeach
         
          
        
       </tbody>
        
        <tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
<div class="box-footer text-right">

  <form method="POST" action="{{route('doneAndNext')}}">
  {{csrf_field()}}
  <div class="row">
    <div class="col-md-9" style="text-align: left;">
      <label for="">Do you need any disability support?</label>
        <label class = "radioLable" style="margin-right: 20px;">
                <input type="radio" name="disability" value="1" class="minimal-red">
                Yes 
        </label>
        <label class = "radioLable" style="margin-right: 20px;">
                <input type="radio" name="disability" value="0" class="minimal-red" checked>
                No 
        </label>
    </div>

    <div class="col-md-3">
    <button type="submit" class="btn btn-flat bg-red">Done and Continue</button>
    </div>
  </div>
  </form>
</div>

</div>
  </section>
  <section class="col-md-3">
  <div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Guidelines</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <ul style="padding-left: 15px;">
                    <li>Respected alumni, if you wish to attend Alumni homecoming with your spouse and/or children, kindly add their details with careful precision in this section.</li>
                    <li>Basic registration fee for alumni attending is PKR {{$price->alumni_price}}.</li>
                    <li>For every additional guest, you are requested to pay PKR {{$price->guest_price}} per guest.</li>                    
                    <li>As you add/remove guests, you will be able to view your total registration fee in the All-Red box on the top.</li>
                </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="row">
        <div class="col-md-12">
        <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Contact Us</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="row"><div class="col-md-12">
            <p>In case of any query contact us on</p>
            <p><b>Email:</b></p>
            <p><span class="label label-info" style="font-size: 14px;">registrations@homecoming.nust.edu.pk</span></p>
            <p><span class="label label-info" style="font-size: 14px;">support@alumni.nust.edu.pk</span></p>
            <p><b>Phone Number:</b></p>
            <p><span class="label label-info" style="font-size: 14px;">+923343631447</span></p>
            <p><span class="label label-info" style="font-size: 14px;">051-90856838</span></p>
            </div></div>
            </div>
            <!-- /.box-body -->
           
        </div>
        </div>
        </div>
        </div>
  </section>
</div>
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
<script>
  function removeButton(url){
    
  
    window.location.replace(url);
  }
</script>
<script src="{{asset('theme/lte/plugins/input-mask/jquery.inputmask.js')}}"></script>
<script>
  $(function () {
    //Money Euro
    $('[data-mask]').inputmask()

  
  })
</script>
 @endsection