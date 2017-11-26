@extends('layouts.app')

@section('sidebar-menu')
        
@endsection

@section('content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Guests Details</h3>
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
                                <input type="text" required="true" class="form-control" name="guestContact" id="guestContact" placeholder="Enter Guest CNIC/B-from Number" data-inputmask='"mask": "12345-12345678"' data-mask>
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

  <!-- ends here  -->
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Guest Information</h3>
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
@endsection
<script>
  function removeButton(url){
    
  
    window.location.replace(url);
  }
</script>

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
 @endsection