<html><head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Reset Password | NUST Alumni Homecoming</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="{{asset('theme/lte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('theme/lte/bower_components/font-awesome/css/font-awesome.min.css')}}">
<!-- Ionicons -->
<link rel="stylesheet" href="{{asset('theme/lte/bower_components/Ionicons/css/ionicons.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('theme/lte/dist/css/AdminLTE.min.css')}}">
<!-- iCheck -->
<link rel="stylesheet" href="{{asset('theme/lte/plugins/iCheck/square/blue.css')}}">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
<div class="login-logo">
  <a href="{{route('home')}}">NUST Alumni <b>Homecoming</b> 2017-18</a>
</div>
<!-- /.login-logo -->
<div class="login-box-body">
  <p class="login-box-msg">Reset Password</p>


  @if ($alert = Session::get('msg'))
    <div class="alert alert-{{Session::get('type')}}">
      <center>
          {{ $alert }}
      </center>
    </div>
  @endif
  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
  @if ($errors->has('email') || $errors->has('password') || $errors->has('password_confirmation'))
      <div class="alert alert-error">
          @if($errors->has('email'))
              {{ $errors->first('email') }}
          @endif
          @if($errors->has('password'))
              {{ $errors->first('password') }}
          @endif
          @if($errors->has('password_confirmation'))
              {{ $errors->first('password_confirmation') }}
          @endif
      </div>
  @endif
  
  

  <form method="POST" action="{{ route('password.email') }}">
    {{ csrf_field() }}
    
    <div class="form-group has-feedback">
     
      <input type="email" class="form-control" placeholder="Email" name="email">
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      
    </div>
    
    
    <div class="row">
      <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Send Password Reset Link</button>
      </div>
      <!-- /.col -->
    </div>
    <br></br>
    <div class="row ">
       <div class="col-xs-3">
          <p><a href="{{route('login')}}" class="text-center">Login</a></p>
          
        </div>
        <div class="col-xs-3 pull-right">
            <p><a href="{{route('register')}}" class="text-center">Sign Up</a></p>
        </div>
    </div>
  </form>
  
  
</div>
<!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{asset('theme/lte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('theme/lte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>



</body></html>