<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registration | NUST Alumni Homecoming</title>
  <link rel="icon" href="{{asset('logos/favico.png')}}" type="image/png" sizes="16x16">
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
   <link rel="stylesheet" href="{{asset('theme/lte/plugins/iCheck/square/red.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body class="hold-transition register-page bg-navy">
<div class="register-box">
  <div class="register-logo">
    <a href="{{route('home')}}">NUST Alumni <b>Homecoming</b>' 17</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Sign Up by US</p>
    @if ($alert = Session::get('msg'))
      <div class="alert alert-{{Session::get('type')}}">
        <center>
            {{ $alert }}
        </center>
      </div>
    @endif
    @if ($errors->has('email') || $errors->has('password') || $errors->has('name')|| $errors->has('g-recaptcha-response'))
        <div class="alert alert-error">
            @if($errors->has('email'))
                {{ $errors->first('email') }}
            @endif
            @if($errors->has('password'))
                {{ $errors->first('password') }}
            @endif
            @if($errors->has('name'))
                {{ $errors->first('name') }}
            @endif
            @if($errors->has('g-recaptcha-response'))
                {{ $errors->first('g-recaptcha-response') }}
            @endif
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}
    	
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Full Name" name="name">
        <input type="hidden" value="true" class="form-control" name="is_byus"/>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="g-recaptcha" data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}"></div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn bg-navy btn-block btn-flat">Sign Up</button>
        </div>
        <!-- /.col -->
      </div>

    </form>
    <br>
    <div class="row ">
       <div class="col-xs-12 text-center">
          <p>Already have account? <a href="{{route('login')}}" class="text-center">Login</a></p>
          
        </div>
    </div>
    
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="{{asset('theme/lte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('theme/lte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('theme/lte/plugins/iCheck/icheck.min.js')}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-red',
      radioClass: 'iradio_square-red',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>

