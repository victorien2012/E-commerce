<!DOCTYPE html>
<html lang="{{str_replace('_','-',app()->getLocale())}}">
  <head>
    <title>VoisinageFood</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="frontend/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="frontend/css/animate.css">

    <link rel="stylesheet" href="frontend/css/owl.carousel.min.css">
    <link rel="stylesheet" href="frontend/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="frontend/css/magnific-popup.css">

    <link rel="stylesheet" href="frontend/css/aos.css">

    <link rel="stylesheet" href="frontend/css/ionicons.min.css">

    <link rel="stylesheet" href="frontend/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="frontend/css/jquery.timepicker.css">


    <link rel="stylesheet" href="frontend/css/flaticon.css">
    <link rel="stylesheet" href="frontend/css/icomoon.css">
    <link rel="stylesheet" href="frontend/css/style.css">
  </head>
  <body class="goto-here">
		<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+ 225 0777355012</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">VoisinageFood@gmail.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">3-5 LIVRAISON EN JOURS OUVRABLES &amp; RETOURS GRATUITS</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">VoisinageFood</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
			  <li class="nav-item active"><a href="{{URL::to('/accueil')}}" class="nav-link">Acceuil</a></li>
			  <li class="nav-item active"><a href="{{URL::to('/produit')}}" class="nav-link">Produit</a></li>
			  <li class="nav-item active"><a href="{{URL::to('/')}}" class="nav-link">A propos</a></li>
			  <li class="nav-item active"><a href="{{URL::to('/inscrire')}}" class="nav-link">login</a></li>

	          <li class="nav-item cta cta-colored"><a href="{{URL::to('/panier')}}" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    {{--start content--}}

      @yield('contenu')
    {{--end content--}}


    {{-- @include('include.footer')  --}}


      <script src="frontend/js/jquery.min.js"></script>
      <script src="frontend/js/jquery-migrate-3.0.1.min.js"></script>
      <script src="frontend/js/popper.min.js"></script>
      <script src="frontend/js/bootstrap.min.js"></script>
      <script src="frontend/js/jquery.easing.1.3.js"></script>
      <script src="frontend/js/jquery.waypoints.min.js"></script>
      <script src="frontend/js/jquery.stellar.min.js"></script>
      <script src="frontend/js/owl.carousel.min.js"></script>
      <script src="frontend/js/jquery.magnific-popup.min.js"></script>
      <script src="frontend/js/aos.js"></script>
      <script src="frontend/js/jquery.animateNumber.min.js"></script>
      <script src="frontend/js/bootstrap-datepicker.js"></script>
      <script src="frontend/js/scrollax.min.js"></script>
      <script src="frontend/https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
      <script src="frontend/js/google-map.js"></script>
      <script src="frontend/js/main.js"></script>
      @yield('scripts')

      </body>
      </html>




