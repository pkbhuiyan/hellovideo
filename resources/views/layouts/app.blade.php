  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'uVideo') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- icons -->
    <link href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <!-- Styles -->

    <!-- PULSE -->
    <link rel="stylesheet" href="https://tilomitra.github.io/infinite/infinite.css">
    <!-- END -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>


<body style="background:#000;">
  {{-- facebook comment --}}
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.3&appId=367822757259753&autoLogAppEvents=1">
  </script>
  {{-- facebook comment --}}
    <div class="" id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top is-scrolling">
            <div class="container">
              @if (Auth::check())
                <router-link class="navbar-brand" to="/">
                    {{-- <img src="{{ asset('image/logo-white.png') }}" class="img-fluid logo-white" alt="logo"> --}}
                    <h4 style="color:#fff;">uVideo</h4>
                    
                </router-link>
              @else
                <a class="navbar-brand" href="/">
                  <h4 style="color:#fff;">uVideo</h4>
                </a>
              @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto left-side">
                      @if (Request::is('login')|| Request::is('register') )

                      @else
                        <li class="nav-item">
                          <router-link class="nav-link" to="/">HOME</router-link>
                        </li>
                        {{-- <li class="nav-item">
                          <router-link class="nav-link" to="/seminar">SERIES</router-link>
                        </li> --}}
                        <li class="nav-item">
                          <router-link class="nav-link" to="/contact">CONTACT US</router-link>
                        </li>
                      @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- END LIVE -->
                        @can('isAdmin')
                            <li class="nav-item">
                                <a class="nav-link" href="/dashboard" >Dashboard</a>
                            </li>
                        @endcan
                        
                        <!-- Authentication Links -->
                        
                        @can('isUser')
                            <li class="nav-item">
                                <router-link class="nav-link" to="/watchlist" >
                                  <i class="material-icons">bookmarks</i>
                                </router-link>
                            </li>
                        @endcan
                       @if(!auth()->check())
                            <li class="nav-item">
                              <a class="nav-link" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="javascript();" data-toggle="modal" data-target="#exampleModal">LOGIN</a>
                            </li> -->
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="javascript();" data-toggle="modal" data-target="#exampleModal1">SIGN IN / SIGN UP</a>
                            </li> --}}
                        
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} 
                                    <i class="material-icons">
                                    account_circle
                                    </i>
                                    
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('LOGOUT') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endif
                        <!-- search  -->
                      <li class="nav-item"><a href="#" class="nav-link openBtn"  onclick="openSearch()"><i class="fa fa-search" aria-hidden="true"></i></a> </li>
                      <!-- end search -->
                        
                    </ul>
                </div>
            </div>
            <search-result></search-result> 
        </nav>



        <main class="">
            <!--  search result -->
            
            {{-- login modal --}}
            @if(!auth()->check())
                <!-- <login></login> -->
                <validation></validation>
            @endif
            
            {{-- router view content --}}
            @yield('content')


        </main>
    </div>




<footer class="footer-section">
  <div class="row">

    <div class="container">
      <div class="col-md-5 links">
        <div class="copyright-section">
            <div class="bottom-logo">
              <h3 style="color:#fff;">uVideo</h3>
              <div class="footer-content">
                <ul>
                  <li>SALES & SUPPORT</li>
                  <li>Events & Booking: +8801841366555</li>
                  <li>Support: +880244810014</li>
                  <li>Write us: u@dhakalive.tv</li>
                </ul> 
              </div>
              <div class="social-links">
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-instagram"></a>
                <a href="#" class="fa fa-youtube"></a>
              </div>
            </div>
        </div>
        
      </div>
    <div class="col-md-3  links">
          <ul>
          <li class="ft_title">Links</li>
            <li>Home</li>
            <li>About</li>
            <li>Contact Us</li>
          </ul>
    </div>
    <div class="col-md-3 links">
      <ul>
        <li class="ft_title">Learn More</li>
        <li><a href="http://">Feedback</a></li>
        <li><a href="http://">Terms and Condition</a> </li>
        <li><a href="http://"> Privacy Policy</a> </li>
      </ul>
    </div>
    <div class="col-md-12">
        <div class="cpy-right-text">
            <p>2019 ©pkbhuiyan. ALL RIGHTS BELONG TO <a href="www.pkbhuiyan.com">Pranta Kumer Bhuiyan</a> LIMITED</p>
        </div>
    </div>
    </div>
    
  </div>
</footer>




    <style>

/* app.css */
.live {
    display: inline-flex;
}

.pulsate-css {
    animation: pulsate 1s ease-out;
    animation-iteration-count: infinite; 
    opacity: 0.0;

    /* you dont need the stuff below, but its what I used to create the loading circle */
    border: 3px solid red;
    border-radius: 30px;
    height: 18px;
    width: 18px;
    position: relative;
    display: inline-block;
    margin-top: 10px;
    text-align: center;
}


.social-links a {
  width: 45px;
    height: 45px;
    border: 1px solid;
    margin: 3px;
    border-radius: 50%;
    font-size: 25px;
    top: 50%;
    padding: 10px;
    text-decoration: none;
    position: relative;
}
.social-links a:hover{
  color:#fff;
  border:1px solid #fff;
}

.ft_title{
  margin-bottom: 10px;
  color: #fff;
}
div#app {
    margin-bottom: 80px;
}
.links{
  display:inline-flex;
}
.cpy-right-text{
  text-align:center;
}
.copyright-section{
  text-align:justify;
}

/* footer css */


footer.footer-section {
  margin-top: 30px;
    padding-bottom:47px;
    height: auto;
    width: 100%;
    position: absolute;
}

ul {
    list-style: none;
}

/* end css */

.left-side {
    margin-left: 74px;
}
.nav-item a {
    font-size: 14px!important;
    font-weight: bold;
}

    /*  custom css */

.content-wrapper{
  /* position: relative; */
  top:55px;
  margin-left:0!important;
  background:#000;
}
.vidlist-vid h3 {
    color: #ddd;
    text-transform: uppercase;
    font-weight: bold;
    font-size: 18px;
}
.navbar-laravel {
  background-color: #000;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
}
.nav-item i{
  color:#ddd;
}
li.nav-item a {
    color: #fff!important;
}
.dropdown-menu,.dropdown-menu a:hover{
  background:#000;
}

.dropdown-menu{
  border:1px solid;
}







.navbar-brand img {
  width: auto;
  height: 30px;
}

.nav-menu {
    background: #000;
    padding-top: 10px;
    padding-bottom: 10px;
}
.nav-item i {
    margin-right: 0px;
    font-size:20px;
}

.container{
  padding:9px!important;
}

/* search */



#search-btn{
  
  /* background-color: rgba(0,0,0,0.8); */
  border-radius: 2px;
  color: #666;
}

#search-btn:hover{
  cursor: pointer;
}
#search-overlay{
  display:none;
}
.block {
  position: fixed;
  top: 0;
  right: 0;
  bottom:0 ;
  left: 0;
  overflow: auto;
  text-align: center;
  background: rgba(0, 0, 0, 0.9);
  border: #a0a0a0 solid 1px;
  margin: 0;
}

.block:before {
  content: '';
  display: inline-block;
  height: 100%;
  vertical-align: middle;
  margin-right: 0;

}
/* SEARCH OVERLAY  */

.openBtn {
  /* background: #f1f1f1; */
  border: none;
  /* padding: 10px 15px; */
  font-size: 20px;
  cursor: pointer;
}

.openBtn:hover {
  /* background: #bbb; */
}

.overlay {
  height: 100%;
  width: 100%;
  display: none;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0.9);
}

.overlay-content {
  position: relative;
  top: 18%;
  width: 80%;
  text-align: center;
  margin-top: 30px;
  margin: auto;
}

.overlay .closebtn {
  position: absolute;
  top: 20px;
  right: 45px;
  font-size: 60px;
  cursor: pointer;
  color: white;
}

.overlay .closebtn:hover {
  color: #ccc;
}
.search-result i {
    font-size: 40px;
    color: #fff;
    width: 90px;
    float: left;
}

.overlay input[type=text] {
  padding: 7px;
    font-size: 24px;
    border: none;
    float: left;
    border-bottom: 1px solid #ddd;
    width: 60%;
    background: transparent!important;
    caret-color: red;
    color:#fff;
}
.overlay input[type=text]:focus {
    outline: none;
}

.overlay input[type=text]:hover {
  background: transparent;
    border-bottom: 1px solid #ddd;
}

.overlay button {
  float: left;
  width: 20%;
  padding: 15px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.overlay button:hover {
  background: #bbb;
}

/* END */

li.nav-item a,.nav-item {`
  /* color: #999!important; */
  top: 1px;
  position: relative;
  font-size: 16px;
  text-decoration:none;
    /* text-transform: uppercase; */
    /* font-weight: bold; */
}


button:focus{
  outline: none;
}


/* form */
@import url(https://fonts.googleapis.com/css?family=Raleway:400,100,200,300);
* {
  margin: 0;
  padding: 0; }

a {
  color: #666;
  text-decoration: none; }
  a:hover {
    color: #666; }

  }

input {
  font: 16px/26px "Raleway", sans-serif; }

body {
  color: #666;
  background-color: #f1f2f2;
  font: 16px/26px "Raleway", sans-serif; }

/* .form-wrap {
  background-color: #fff;
  width: 320px;
  margin: 3em auto;
  box-shadow: 0px 1px 8px #BEBEBE;
  -webkit-box-shadow: 0px 1px 8px #BEBEBE;
  -moz-box-shadow: 0px 1px 8px #BEBEBE; } */
  .form-wrap .tabs {
    overflow: hidden; }
    .form-wrap .tabs h3 {
      float: left;
      width: 50%; }
      .form-wrap .tabs h3 a {
        padding: 0.5em 0;
        text-align: center;
        font-weight: 400;
        text-decoration:none;
        background-color: #e6e7e8;
        display: block;
        color: #666; }
        .form-wrap .tabs h3 a.active {
          background-color: #fff; }
  .form-wrap .tabs-content {
    padding: 1.5em; }
    .form-wrap .tabs-content div[id$="tab-content"] {
      display: none; }
    .form-wrap .tabs-content .active {
      display: block !important; }
  .form-wrap form .input {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    color: inherit;
    font-family: inherit;
    padding: .8em 0 10px .8em;
    border: 1px solid #CFCFCF;
    outline: 0;
    display: inline-block;
    margin: 0 0 .8em 0;
    padding-right: 2em;
    width: 100%; }
  .form-wrap form .button {
    width: 100%;
    padding: .8em 0 10px .8em;
    background-color: #28A55F;
    border: none;
    color: #fff;
    cursor: pointer;
    text-transform: uppercase; }
    .form-wrap form .button:hover {
      background-color: #4FDA8C; }
  .form-wrap form .checkbox {
    visibility: hidden;
    padding: 20px;
    margin: .5em 0 1.5em; }
    .form-wrap form .checkbox:checked + label:after {
      -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
      filter: alpha(opacity=100);
      opacity: 1; }
  .form-wrap form label[for] {
    position: relative;
    padding-left: 20px;
    cursor: pointer; }
    .form-wrap form label[for]:before {
      content: '';
      position: absolute;
      border: 1px solid #CFCFCF;
      width: 17px;
      height: 17px;
      top: 0px;
      left: -14px; }
    .form-wrap form label[for]:after {
      -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
      filter: alpha(opacity=0);
      opacity: 0;
      content: '';
      position: absolute;
      width: 9px;
      height: 5px;
      background-color: transparent;
      top: 4px;
      left: -10px;
      border: 3px solid #28A55F;
      border-top: none;
      border-right: none;
      -webkit-transform: rotate(-45deg);
      -moz-transform: rotate(-45deg);
      -o-transform: rotate(-45deg);
      -ms-transform: rotate(-45deg);
      transform: rotate(-45deg); }
  .form-wrap .help-text {
    margin-top: .6em; }
    .form-wrap .help-text p {
      text-align: center;
      font-size: 14px; }


/* modal css */

.modal-body{
  padding:1.5rem!important;
}
p{
  margin-bottom: 0!important;
}

.content-wrapper{
  position:relative!important;
}
body{
  overflow-y:hidden;
}



    </style>


@auth
<script>
  // used for front-end user login validation

  window.isLogin = @json(auth()->check());
  
  </script>
@endauth


    <script>

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


     function openSearch() {
        document.getElementById("myOverlay").style.display = "block";
      }

      function closeSearch() {
        document.getElementById("myOverlay").style.display = "none";
      }
    $(document).ready(function() {


$("#close-sidebar").click(function() {
  $(".page-wrapper").removeClass("toggled");
});
$("#show-sidebar").click(function() {
  $(".page-wrapper").addClass("toggled");
});





});
    </script>
   
</body>
</html>
