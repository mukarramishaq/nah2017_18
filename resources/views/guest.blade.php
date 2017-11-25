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
                                <label for="guestContact">Guest Contact Number</label>
                                <input type="text" required="true" class="form-control" name="guestContact" id="guestContact" placeholder="Enter Guest Contact Number">
                            </div>
                        </div>
                    </div>

                    {{--  next row  --}}

                    <div class="row">
                
                        <div class="col-md-6">               
                            <div class="form-group">
                	            <label for="guestRelation">Relation</label>
                                <input type="text" required="true" class="form-control" name="guestRelation" id="guestRelation" placeholder="Guest Relation">
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
      <h3 class="box-title">Data Table</h3>
    </div>
  <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>User Id</th>
          <th>Name</th>
          <th>CNIC</th>
          <th>Pakage Name</th>
          <th>Challan ID</th>
          <th>Status</th>
          <th>Status Updated by</th>
        </tr>
        </thead>
        <tbody>
          {{--

          @foreach($data as $person) 
        <tr onclick="document.location = 'userDetails/?id={{$person->id}}';"> 
              <td>{{$person->id}}</td>
              <td>{{$person->name}}</td>
              <td>{{$person->cnic}}</td>              
              <td>{{$person->package_name}}</td>
              <td>{{$person->challan_id}}</td>
              <td>{{$person->status}}</td>
              <td>{{$person->status_updated_by}}</td>
         
        </tr>
         @endforeach
        --}}
        </a>
        <tr>
          <td>Trident</td>
          <td>Internet
            Explorer 5.0
          </td>
          <td>Win 95+</td>
          <td>5</td>
          <td>C</td>
          <td>X</td>
          <td>X</td>
        </tr>
        <tr>
          <td>Trident</td>
          <td>Internet
            Explorer 5.5
          </td>
          <td>Win 95+</td>
          <td>5.5</td>
          <td>A</td>
          <td>X</td>
          <td>X</td>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
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
 @endsection