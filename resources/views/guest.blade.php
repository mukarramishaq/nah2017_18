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
              <h4>Total:</h4> <h3>Rs.{{(count($guests)*$price->guest_price)+$price->alumni_price}}/-</h3>

              
            </div>
            
            <div class="small-box-footer"><p>Alumni Fee: Rs.1500/- per alumnus</p><p>Guest Fee: Rs.1000/- per guest</p></div>
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
          <th>Contact Number</th>
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
        
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
<div class="box-footer text-right">
                <button type="submit" class="btn btn-flat bg-red" onclick = " window.location.replace('{{route('doneAndNext')}}');">Done and Continue</button>
              </div>

</div>
  </section>
  <section class="col-md-3">
  <div class="col-md-12">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Instructions</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <ul style="padding-left: 15px;">
                    <li>If you want to bring your spouse or children with you then you'll have to add their information here</li>
                    <li><b class="bg-red"><u>Note:</u></b> You'll have to pay for every guest. Your registration fee is {{$price->alumni_price}} whereas registration fee of each guest is {{$price->guest_price}}.</li>
                    <li>You can see your total registration fee that you'll have to pay in All Red Box</li>
                </ul>
            </div>
            <!-- /.box-body -->
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