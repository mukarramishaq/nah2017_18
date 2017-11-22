<!DOCTYPE html>
    <html>
    <head>
        <title>Laravel 5 - Ajax upload image to server without refresh the page with preview</title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.1/jquery.form.min.js"></script>
    </head>
    <body>
    <div class="container">
      <h1>Laravel 5 - jQuery ajax upload image with example</h1>
      {!! Form::open(['route'=>'ajax.upload-image','files'=>'true']) !!}
          <div class="alert alert-danger error-msg" style="display:none">
            <ul></ul>
        </div>
        <div class="preview-uploaded-image">
        </div>
          <div class="form-group">
          <label>Image:</label>
          <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
          <button class="btn btn-primary upload-image" type="submit">Upload Image</button>
        </div>
      {!! Form::close() !!}
    </div>
    <script type="text/javascript">
      $("body").on("click",".upload-image",function(e){
        $(this).parents("form").ajaxForm({ 
          complete: function(response) 
          {
            if($.isEmptyObject(response.responseJSON.image)){
              $('.preview-uploaded-image').html('<img src="'+response.responseJSON.url+'">');
            }else{
              var msg=response.responseJSON.image;
              $(".error-msg").find("ul").html('');
              $(".error-msg").css('display','block');
              $.each( msg, function( key, value ) {
                $(".error-msg").find("ul").append('<li>'+value+'</li>');
              });
            }
          }
        });
      });
    </script>
    </body>
    </html>