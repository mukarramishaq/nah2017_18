@extends('layouts.app')

@section('content')


<div class="modal fade" id="modal-chalan">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-red">
                
                <h4 class="modal-title">Upload Paid Chalan Copy</h4>
              </div>
              {!! Form::open(['route'=>'ajax.upload-chalan','files'=>'true']) !!}
              <div class="modal-body">
                
                  <span class="label label-danger error-msg" style="display:none">
                      
                  </span>
                  <div class="row">
                    <div class="preview-uploaded-image col-md-4 col-md-offset-4" >
                    </div>
                    <div class="overlay">
                        <i class="fa fa-refresh fa-spin fa-5x"></i>
                    </div>
                  </div>
                  <div class="form-group input-picture">
                    <label>Paid Chalan Image:</label>
                    <input type="file" name="image" class="form-control">
                  </div>
                  
                
              </div>
              <div class="modal-footer">
              
                <div class="form-group form-footer">
                <button class="btn bg-red upload-image" type="submit">Upload Chalan Image</button>
                <button class="btn bg-red" data-toggle="modal" data-target="#modal-chalan"  type="button">Close</button>
                </div>
              </div>
              {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


<div class="row">        
      <div class="col-md-9">
          <!-- general form elements -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Chalan | Payment Decision</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            
              <div class="box-body">
                <div class="row">
                    <!-- general form elements -->
                    <div class="box box-default col-md-10 col-md-offset-1">
                        <div class="box-header with-border">
                        <h3 class="box-title">Get Chalan</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        
                        
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-1">
                                <button class="btn btn-flat bg-red" onclick="downloadChalan('{{route('downloadChalan')}}');"><span class="fa fa-cloud-download"></span> Download Chalan Form</button>
                                </div>
                            </div>     
                        </div>
                       
                    </div>
                    <!-- /.box -->
                </div>

                <div class="row">
                    <!-- general form elements -->
                    <div class="box box-default col-md-10 col-md-offset-1">
                        <div class="box-header with-border">
                        <h3 class="box-title">Paid Chalan Details</h3>
                        </div>
                        <!-- /.box-header -->
                        <div>
                            <span class=" ajax-info label col-md-12"></span>
                        </div>
                        <!-- form start -->
                        
                        <form role="form" id="chalanMethodForm" action="{{route('chalanMethodSubmit')}}" method="POST" >
                        {{csrf_field()}}
                        <div class="box-body">
                            <div class="row">
                                <div class="form-group col-md-4 col-md-offset-1">
                                    <label for="amount">Amount</label>
                                    <input type="number" required="true" name="amount" class="form-control" id="amount" placeholder="Enter paid amount">
                                </div>
                                <div class="form-group col-md-4 col-md-offset-1">
                                    <label for="branch-address">Branch Address of HBL</label>
                                    <input type="text" required="true" name="branch-address" class="form-control" id="branch-address" placeholder="Enter Branch Address">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <input type="text" style="display:none;" id="id-is-chalan-uploaded" value="{{$payment->paid_chalan_path}}" required>
                                </div>
                            </div>
                           
                            <div class="row">
                                <div class="class-preview col-md-10 col-md-offset1">
                                    @if($payment->paid_chalan_path)
                                        <img src="{{asset('chalan_images/'.$payment->user_id.'.png')}}"  width="100%"/>
                                    @endif
                                </div>
                            </div>
                            <br> <br>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-1">
                                <button type="button" class="btn btn-flat bg-red" data-toggle="modal" data-target="#modal-chalan"><span class="fa fa-cloud-upload"></span> Upload Paid Chalan Copy</button>
                                </div>
                            </div>

                            
                                    
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-right">
                            <button class="btn btn-flat bg-red" type="submit" onclick="pivf();">Submit</button>
                        </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
                           
              </div>
              <!-- /.box-body -->
              <div class="box-footer text-right">
                
              </div>
          </div>
          <!-- /.box -->
          
        </div>
        <div class="col-md-3">
        <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Guidelines</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ul>
                    <li>Download generated challan form from “Get Challan” portion by clicking on “Download Challan Form” button.</li>
                    <li>Pay the challan in any HBL branch and upload a clear image of paid challan in “Paid Challan Details” portion using upload button. Enter amount paid and HBL branch address and submit it to complete your registration process.</li>
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
    </div>
@endsection
@section('header-styles')
<link rel="stylesheet" href="{{asset('theme/lte/plugins/iCheck/all.css')}}">
@endsection

@section('footer-scripts')
<!-- jQuery 3 -->
<script src="{{asset('theme/lte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{asset('theme/lte/plugins/iCheck/icheck.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.1/jquery.form.min.js"></script>
<script>
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
</script>
<script>
    $('.overlay').hide();
    // $(document).ready(function(){
    //     var ci = "{{$payment->paid_chalan_path}}";
    //     var i = "{{$payment->user_id}}";
    //     var u = "route('')"
    //     if(ci != ""){
    //         $('.class-preview').html('<img class="imgPicker" id="imgViewer" src="'+response.responseJSON.url+'?'+d.getTime()+'" alt="your image"  width="100%"/>');
    //     }
    // });
    function pivf(){
        $('.ajax-info').hide();
        if(document.getElementById('id-is-chalan-uploaded').value.indexOf('.png') !== -1 || document.getElementById('id-is-chalan-uploaded').value != ""){
            //out= confirm('Once submitted, you cannot access this section anymore! Do you want to submit?');	
            //return out;
            return true;
        }
        else{
            $('.ajax-info').addClass('label-info').text('Upload your paid chalan picture please!');
            $('.ajax-info').show();
            return false;
        }
    }
    function downloadChalan(url){
        d = new Date();
        window.location.replace(url+"?"+d.getTime());
    }

	
    $("body").on("click",".upload-image",function(e){
        $.ajaxSetup({ cache: false });
        $('.overlay').show();
        $(this).parents("form").ajaxForm({ 
          complete: function(response) 
          {
            $('.overlay').hide();
            
            if($.isEmptyObject(response.responseJSON.image)){
              $('.error-msg').css('display','none');
              d = new Date();
              $('.preview-uploaded-image').html('<img src="'+response.responseJSON.url+'?'+d.getTime()+'" height="100px" width="100px">');
              $('#modal-pic .modal-footer .form-footer').html('<button class="btn bg-red upload-image" type="submit">Upload Image</button><button class="btn bg-red" data-dismiss="modal">Close</button>');
              $('.class-preview').html('<img class="imgPicker" id="imgViewer" src="'+response.responseJSON.url+'?'+d.getTime()+'" alt="your image"  width="100%"/>');
              $('#id-is-chalan-uploaded').val(response.responseJSON.url+"");
                      
            }else{
              var msg=response.responseJSON.image;
              $(".error-msg").find("ul").html('');
              $(".error-msg").css('display','block');
              $.each( msg, function( key, value ) {
                $(".error-msg").html(value);
              });
            }
          }
        });
      });
</script>
@endsection