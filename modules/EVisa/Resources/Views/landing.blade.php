@extends('layouts.app')
@section('content')
    <header>
        <nav class="navbar navbar-inverse    navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'eVisa') }}
                    </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            @include('layouts.partials.topnave2')
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Profile</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-default navbar-fixed-top"  style="margin-top: 50px; background-color: #FFF; z-index: 900;">
            <div class="container">
                <div class="navbar-header">
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav tp-icon">
                        <li><a href="#"><strong>Overview</strong></a></li>
                        <li><a href="{{ route('eligibility') }}">Eligibility</a></li>
                        <li><a href="{{ route('faq') }}">FAQs</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container margin-top">





        <div class="row">
            <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="images/landing7.jpg" alt="First slide">
                            <div class="carousel-caption">
                                <h4>Get your evisa in 3 easy steps!</h4>
                                <h2>1. Apply   2. Make Payment   3. Download</h2>

                                <a href="#" class="btn btn-primary apply-button" title="Enlace">APPLY NOW</a>

                            </div>
                        </div>




                        <div class="item">
                            <img src="images/landing11.jpg" alt="Second slide">
                            <div class="carousel-caption">
                                <h3>get your evisa online, across all devices!</h3>
                                <!--  <h2> wheather you choose a timeless location or an elegant wedding, being in kenya feels like a faraway place</h2> -->
                            </div>
                        </div>






                        <div class="item">
                            <img src="images/landing8.jpg" alt="Second slide">
                            <div class="carousel-caption">
                                <h3>THINK FUTURE, THINK KENYA</h3>
                                <h2> wheather you wish to take a magical holiday or undertake business in kenya</h2>
                                <a href="single.html" class="btn btn-primary apply-button" title="Enlace">WATCH VIDEO</a>
                            </div>


                        </div>
                        <div class="item">
                            <img src="images/landing4.jpg" alt="Second slide">
                            <div class="carousel-caption">
                                <h3>See The Migration In Mara</h3>
                                <h2> This is one of the remarkable wildlife attractions that make’s Kenya one of the best wildlife destinations in the world</h2>
                            </div>
                        </div>
                        <!--     <div class="item">
                                <img src="images/landing.jpg" alt="Third slide">
                                <div class="carousel-caption">
                                   <h3>Dhow Safaris</h3>
                                   <h2>A day spent at sea on a Dhow Safari is a wonderful experience and a fantastic way to explore Kenya’s pristine coastline</h2>
                                </div>
                            </div> -->
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span></a><a class="right carousel-control"
                                                                                     href="#carousel-example-generic" data-slide="next"><span class="glyphicon glyphicon-chevron-right">
                        </span></a>
                </div>

            </div>
        </div>





        <div class="row">


            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">


                <div class="panel visa-types">

                    <div class="panel-heading m-t-50">
                        <h3>Welcome to eVisa</h3>
                        <p>Apply for a Single entry visa, Transit visa or Courtesy visa to Kenya and pay securely using your VISA card or Mastercard.</p>

                    </div>


                    <div class="panel-body p-t-0">

                        <div class="row box">

                            <div class="col-md-4">

                                <div>
                                    <div class="box-images">  <img class="img-responsive" src="images/apply.jpg" alt="Second slide"></div>
                                    <p>Apply for a Single entry visa, Transit visa or Courtesy visa to Kenya</p>
                                    <div class="learn-more">
                                        <!--  <a href="single.html" class="btn btn-primary apply-button white-bg" title="Enlace">LEARN MORE</a> -->
                                        <a href="landing.html" class="btn btn-primary apply-button" title="Enlace">APPLY NOW</a>

                                    </div>
                                </div>

                            </div>


                            <div class="col-md-4">

                                <div>
                                    <div class="box-images">  <img class="img-responsive" src="images/ongoing.jpg" alt="Second slide"></div>
                                    <p>Apply for a Single entry visa, Transit visa or Courtesy visa to Kenya</p>
                                    <div class="learn-more">
                                        <a href="ongoing.html" class="btn btn-primary apply-button white-bg" title="Enlace">I HAVE AN ONGOING APPLICATION</a>


                                    </div>
                                </div>

                            </div>



                            <div class="col-md-4">

                                <div>
                                    <div class="box-images">  <img class="img-responsive" src="images/requirements.jpg" alt="Second slide"></div>
                                    <p>Apply for a Single entry visa, Transit visa or Courtesy visa to Kenya</p>
                                    <div class="learn-more">
                                        <!--  <a href="single.html" class="btn btn-primary apply-button white-bg" title="Enlace">LEARN MORE</a> -->
                                        <a href="single.html" class="btn btn-primary apply-button" title="Enlace">VISA REQUIREMENTS </a>

                                    </div>
                                </div>

                            </div>



                        </div>
                    </div>




                </div>






            </div>


        </div>











    </div> <!-- /container -->



    <footer>



        <div class="footer-bottom">

            <div class="container">
                <p class=""> © 2017 - Republic of Kenya - All Rights Reserved / Terms of Use </p>

            </div>
        </div>

    </footer>

@endsection