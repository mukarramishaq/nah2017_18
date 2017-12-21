<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Homecoming'17 | NUST Alumni</title>
    <link rel="icon" href="{{asset('logos/favico.png')}}" type="image/png" sizes="16x16">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('welcome/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{asset('welcome/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'> -->

    <!-- Plugin CSS -->
    <link href="{{asset('welcome/vendor/magnific-popup/magnific-popup.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('welcome/css/creative.css')}}" rel="stylesheet">
    <style>
      
    </style>
    <style>
        .gir{
        font-family: 'GlacialIndifferenceRegular';
        }
        .gib{
        font-family: 'GlacialIndifferenceBold';
        }
        .lr{
        font-family: 'LatoRegular';
        }
        .lb{
        font-family: 'LatoBlack';
        }
        .lmr{
        font-family: 'LemonMilkRegular';
        }
        .lmb{
        font-family: 'LemonMilkBold';
        }
        .cent {
          margin: auto;
          width: 100%;
          opacity: .7;
          fgcolor:hover: white;
        }
        @media only screen and (min-width: 760px) {
          .cent{
            width: 500px;
          }
    </style>

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <!-- <a class="navbar-brand js-scroll-trigger" href="#page-top">Start Bootstrap</a> -->
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger lmr" href="#about" style="font-family:LemonMilkRegular">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger lmr" href="#statistics">Statistics</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger lmr" href="#registration">Registration</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger lmr" href="#contact">CONTACT US</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger lmr" href="{{route('login')}}">Login</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
        {{srand(time())}}
    <header class="masthead text-center text-white d-flex" style="background-image: url('/background_jpgs/jpgs-1920x1280/{{rand(1,5)}}.jpg');">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h3 class="text-uppercase gir" >
              NUST ALUMNI
            </h3>
            <h1 class="text-uppercase gib">Homecoming' 17</h1>
            <h5 class="text-uppercase gib">30.12.2017</h5><br>
          </div>
          <div class="col-lg-8 mx-auto">
            
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="{{route('register')}}" style="opacity:0.7;">Register Now.</a>
            <p>Already have an account? <a href="{{route('login')}}" style="font-family:LatoBlack;color:white;">Login</a>  
        </div>
        </div>
      </div>
    </header>

    <section class="bg-primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">NUST ALUMNI HOMECOMING</h2>
            <hr class="light my-4">
            <p class="mb-4" style="color:white;">Homecoming gives the opportunity to reinforce the relationship shared
between the alumni and their Alma mater, along with providing numerous
networking opportunities for entrepreneurs and enthusiasts to promote
their aims. It also encourages alumni to participate actively in the
NUST community, to attend events, to volunteer, to create new ways for
alumni to stay connected to NUST and to contribute to the greatness of
NUST.</p>
          </div>
        </div>
      </div>
    </section>

    <section id="statistics">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">2015 Alumni Homecoming Statistics</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
      
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-users text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Attendees</h3>
              <p class="text-muted mb-0">1975 guests attended the event.</p>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-globe text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">17 Countries Reached</h3>
              <p class="text-muted mb-0">People from 17 countries attended the event</p>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-music text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Artist</h3>
              <p class="text-muted mb-0">Roxen and QB Performance.</p>
            </div>
          </div>
        </div>
          <div class="row">
            <div class="col-lg-4 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-diamond text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Guests</h3>
              <p class="text-muted mb-0">80 industrial Guests</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-thumbs-up text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">250,000+</h3>
              <p class="text-muted mb-0">Social Media Reach</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-thumbs-up text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Pioneer Reach Celebration</h3>
              <p class="text-muted mb-0">Celebration</p>
            </div>
          </div>

      </div>
    
    </section>

    <!-- <section class="p-0" id="registration">
      <div class="container-fluid p-0">
        <div class="row no-gutters popup-gallery">
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/1.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/1.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/2.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/2.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/3.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/3.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/4.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/4.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/5.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/5.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/6.jpg">
              <img class="img-fluid" src="img/portfolio/thumbnails/6.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>  -->

    <section class="bg-dark text-white" id="registration">
      <div class="container text-center">
        <h2 class="mb-4">Registrations Are Open!</h2>
        <a class="btn btn-light btn-xl sr-button" href="{{route('register')}}">Register Now!</a>
      </div>
    </section>

    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Let's Get In Touch!</h2>
            <hr class="my-4">
            <p class="mb-5">Give us a call or send us an email and we will get back to you as soon as possible!</p>
          </div>
        </div>
        <div class="row">
        <div class="col-lg-4 ml-auto text-center">
        <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
        <p><b>Director Registrations<br>Jahangeer Ahmed:</b>+92 335 3591055<br>
        </p></p>
      </div>
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
            <p><b>Director Marketing and Sponsorship<br>Senam Khan:</b>+92 324 5707181<br>
            </p></p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p>
              <a href="mailto:your-email@your-domain.com">info@alumni.nust.edu.pk</a>
            </p>
          </div>
        </div>
      </div>
    </section>
    

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('welcome/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('welcome/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{asset('welcome/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('welcome/vendor/scrollreveal/scrollreveal.min.js')}}"></script>
    <script src="{{asset('welcome/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{asset('welcome/js/creative.min.js')}}"></script>
    <script>
    // function preloadImages(srcs) {
    //         if (!preloadImages.cache) {
    //             preloadImages.cache = [];
    //         }
    //         var img;
    //         for (var i = 0; i < srcs.length; i++) {
    //             img = new Image();
    //             img.src = srcs[i];
    //             preloadImages.cache.push(img);
    //         }
    //     }
    //var data = ["/background_jpgs/jpgs-1920x1280/2.jpg","/background_jpgs/jpgs-1920x1280/3.jpg","/background_jpgs/jpgs-1920x1280/4.jpg","/background_jpgs/jpgs-1920x1280/5.jpg","/background_jpgs/jpgs-1920x1280/1.jpg"];
    // preloadImages(data);
    /*$(document).ready(function(){
        
        var ii = -1;
        
        function chB(){
    		
			size = data.length;
				//console.log(size(data));
			imgURL = data[(ii%size)];
			console.log(imgURL);
			$("header.masthead")
				.fadeTo(2000,0.5, function() {
                    
                    $("header.masthead").css('background-image',"url("+imgURL+")");
			  		
		  		})
		  		.fadeTo(2000,1.0);
		  		//setTimeout(function(){chB('img/header.jpg');},20000);
		}
    	setInterval(function(){chB(ii++);},10000);
    	//setInterval(function(){chB('img/header.jpg');},20000);
        
    });*/
    
    </script>

  </body>

</html>
