<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
  <meta name="author" content="themefisher.com">

  <title>{{ config('app.name', 'FabLab') }}</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{ asset('assets/front/plugins/bootstrap/css/bootstrap.min.css')}}">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="{{ asset('assets/front/plugins/icofont/icofont.min.css')}}">
  <!-- Slick Slider  CSS -->
  <link rel="stylesheet" href="{{ asset('assets/front/plugins/slick-carousel/slick/slick.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/front/plugins/slick-carousel/slick/slick-theme.css')}}">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{ asset('assets/front/css/style.css')}}">

  @livewireStyles

</head>

<body id="top">

  <header>
    <div class="header-top-bar">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-8">
            <ul class="top-bar-info list-inline-item pl-0 mb-0">
              <li class="list-inline-item"><a href="mailto:fablab@iut.u-bordeaux.fr"><i class="icofont-support-faq mr-2"></i>fablab@iut.u-bordeaux.fr</a></li>
              <li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>BM 15 rue Naudet - Bâtiment 10A - 1er Etage, CS 10207 - 33175 GRADIGNAN CEDEX</li>
            </ul>
          </div>
          <div class="col-lg-4">
            @if(Route::has('login'))
                    @auth
                    <div text-lg-right top-right-bar mt-2 mt-lg-0>
                      <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                       <!--  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown">
            Mon Compte ({{Auth::user()->nom}})
            <span class="caret"></span>
          </button> -->
                  <a href=""  class="nav-link dropdown-toggle" style="color:white"  id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bienvenu <strong>{{Auth::user()->nom}}</strong> </a> 
                  <ul role="list" class="dropdown-menu" aria-labelledby="dropdown02">
                    <li role="listitem" ><a class="dropdown-item" href="{{route('frontend.portfolios.edit')}}">Portefolio</a></li>
                    <li role="listitem" ><a class="dropdown-item" href="{{route('frontend.reservations')}}">Réservations</a></li>
                    <li role="listitem" ><a class="dropdown-item" href="{{route('frontend.home')}}">Formations</a></li>
                    @if(Auth::user()->user_type === 'admin')
                    <li role="listitem" ><a class="dropdown-item" href="{{route('backend.dashboard')}}">Admin Panel </a></li>
                    @endif

                    <li><a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Se Déconnecter</a></li>
                    <form id="logout-form" action="{{route('logout')}}" method="POST">
                      @csrf
                  </ul>
                </li>
              </ul>
            </div> 

          <!--   <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown button
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnecter</a>
    <form id="logout-form" action="{{route('logout')}}" method="POST">
                      @csrf
    </form>
  </div>
</div> -->
            @else
            <div class="text-lg-right top-right-bar mt-2 mt-lg-0">
              <a href="{{ route('login') }}">
                <button><span style="color:black">Connexion</span></button>

              </a>

              @if (Route::has('register'))

              <a href="{{ route('register') }}">
                <button><span style="color:black">Inscription</span></button>

              </a>
              @endif
            </div>

            @endauth

            @endif


          </div>
        </div>
      </div>
    </div>
    <nav class="navbar navbar-expand-lg navigation" id="navbar">
      <div class="container">
        <a class="navbar-brand" href="{{route('frontend.home')}}">
          <img src="{{ asset('assets/front/images/logo.png')}}" alt="" class="img-fluid">
        </a>

        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icofont-navigation-menu"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarmain">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{route('frontend.home')}}">Accueil</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{route('frontend.presentation')}}">Présentation</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('frontend.machines')}}">Machines</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('frontend.projects')}}">Projets</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('frontend.formations')}}">Formations</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('frontend.portfolios')}}">Portfolios</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('frontend.contact')}}">Contact</a></li>





          </ul>
        </div>
      </div>
    </nav>
  </header>



  {{ $slot }}


  <!-- footer Start -->
  <footer class="footer section gray-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 mr-auto col-sm-6">
          <div class="widget mb-5 mb-lg-0">
            <div class="logo mb-4">
              <img src="{{ asset('assets/front/images/logo.png')}}" alt="" class="img-fluid">
            </div>
            <p>Un Text</p>

            <ul class="list-inline footer-socials mt-4">
              <li class="list-inline-item"><a href="https://www.facebook.com/Fablab-Cohabit-1713924472234837/"><i class="icofont-facebook"></i></a></li>
              <li class="list-inline-item"><a href="https://www.linkedin.com/in/fablab-cohabit-707248179/?originalSubdomain=fr"><i class="icofont-linkedin"></i></a></li>
              <li class="list-inline-item"><a href="https://www.instagram.com/fablabcohabit/?hl=en"><i class="icofont-instagram"></i></a></li>
            </ul>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 col-sm-6">
          <div class="widget mb-5 mb-lg-0">
            <h4 class="text-capitalize mb-3">Nos Services</h4>
            <div class="divider mb-4"></div>

            <ul class="list-unstyled footer-menu lh-35">
              <li><a href="{{route('frontend.machines')}}">Machines </a></li>
              <li><a href="{{route('frontend.formations')}}">Formations</a></li>
              <li><a href="{{route('frontend.projects')}}">Projets</a></li>
              <li><a href="{{route('frontend.portfolios')}}">Portfolios</a></li>
            </ul>
          </div>
        </div>


        <div class="col-lg-2 col-md-6 col-sm-6">
          <div class="widget mb-5 mb-lg-0">
            <h4 class="text-capitalize mb-3">Support</h4>
            <div class="divider mb-4"></div>

            <ul class="list-unstyled footer-menu lh-35">
              <li><a href="#">Terms & Conditions</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Company Support </a></li>
              <li><a href="#">FAQuestions</a></li>
              <li><a href="#">Company Licence</a></li>
            </ul>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="widget widget-contact mb-5 mb-lg-0">
            <h4 class="text-capitalize mb-3">Contacter Nous</h4>
            <div class="divider mb-4"></div>

            <div class="footer-contact-block mb-4">
              <div class="icon d-flex align-items-center">
                <i class="icofont-email mr-3"></i>
                <span class="h6 mb-0">FAB MANAGER(S)
                  Jean-Baptiste Bonnemaison
                  Pierre Grangé Praderas
                </span>
              </div>
              <h4 class="mt-2"><a href="mail-to:fablab@iut.u-bordeaux.fr">
                  fablab@iut.u-bordeaux.fr</a></h4>
            </div>
            <div class="footer-contact-block mb-4">
              <div class="icon d-flex align-items-center">
                <i class="icofont-email mr-3"></i>
                <span class="h6 mb-0">Du mardi au Vendredi - 10h-18h</span>
              </div>
              <h4 class="mt-2">BM 15 rue Naudet - Bâtiment 10A - 1er Etage, CS 10207 - 33175 GRADIGNAN CEDEX </h4>
            </div>

            <div class="footer-contact-block">
              <div class="icon d-flex align-items-center">
                <i class="icofont-support mr-3"></i>
                <span class="h6 mb-0">Du mardi au Vendredi - 10h-18h</span>
              </div>
              <h4 class="mt-2"><a href="tel:+05 56 84 79 61">05 56 84 79 61</a></h4>
            </div>
          </div>
        </div>
      </div>

      <div class="footer-btm py-4 mt-5">
        <div class="row align-items-center justify-content-between">
          <div class="col-lg-6">
            <div class="copyright">
              &copy; Copyright Reserved to <span class="text-color">Cohabit</span> by <a href="https://cohabit.fr/" target="_blank">Fablab</a>
            </div>
          </div>
          <!-- <div class="col-lg-6">
            <div class="subscribe-form text-lg-right mt-5 mt-lg-0">
              <form action="#" class="subscribe">
                <input type="text" class="form-control" placeholder="Your Email address">
                <a href="#" class="btn btn-main-2 btn-round-full">Subscribe</a>
              </form>
            </div>
          </div> -->
        </div>

        <div class="row">
          <div class="col-lg-4">
            <a class="backtop js-scroll-trigger" href="#top">
              <i class="icofont-long-arrow-up"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </footer>



  <!-- 
    Essential Scripts
    =====================================-->


  <!-- Main jQuery -->
  <script src="{{ asset('assets/front/plugins/jquery/jquery.js')}}"></script>
  <!-- Bootstrap 4.3.2 -->
  <script src="{{ asset('assets/front/plugins/bootstrap/js/popper.js')}}"></script>
  <script src="{{ asset('assets/front/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('assets/front/plugins/counterup/jquery.easing.js')}}"></script>
  <!-- Slick Slider -->
  <script src="{{ asset('assets/front/plugins/slick-carousel/slick/slick.min.js')}}"></script>
  <!-- Counterup -->
  <script src="{{ asset('assets/front/plugins/counterup/jquery.waypoints.min.js')}}"></script>

  <script src="{{ asset('assets/front/plugins/shuffle/shuffle.min.js')}}"></script>
  <script src="{{ asset('assets/front/plugins/counterup/jquery.counterup.min.js')}}"></script>
  <!-- Google Map -->
  <script src="{{ asset('assets/front/plugins/google-map/map.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>

  <script src="{{ asset('assets/front/js/script.js')}}"></script>
  <script src="{{ asset('assets/front/js/contact.js')}}"></script>

  @livewireScripts

</body>

</html>