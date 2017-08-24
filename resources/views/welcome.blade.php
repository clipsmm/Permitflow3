@extends('layouts.app')
@section('content')
    <header>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">eVisa</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
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
                        <li><a href="eligibility.html">Eligibility</a></li>
                        <li><a href="faq.html">FAQs</a></li>
                        <li><a href="contacts.html">Contact Us</a></li>
                        @if (Route::has('login'))
                            @auth
                                <li><a href="{{ url('/home') }}">Home</a></li>
                                @else
                                    <li class="pull-right">  <a href="{{ route('login') }}">Login</a></li>
                                    <li class="pull-right"> <a href="{{ route('register') }}">Register</a></li>
                                    @endauth
                                @endif
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </nav>
        <!-- End Header -->
    </header>
    <div class="container">
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
                            <img src="images/landing2.jpg" alt="First slide">
                            <div class="carousel-caption">
                                <h3>Welcome to eVisa</h3>
                                <h2>Apply for a Single entry visa, Transit visa or Courtesy visa to Kenya and pay securely using your VISA card or Mastercard.</h2>
                                <a href="#" class="btn btn-primary apply-button" title="Enlace">APPLY NOW</a>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/landing4.jpg" alt="Second slide">
                            <div class="carousel-caption">
                                <h3>See The Migration In Mara</h3>
                                <h2> This is one of the remarkable wildlife attractions that make’s Kenya one of the best wildlife destinations in the world</h2>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/landing.jpg" alt="Third slide">
                            <div class="carousel-caption">
                                <h3>Dhow Safaris</h3>
                                <h2>A day spent at sea on a Dhow Safari is a wonderful experience and a fantastic way to explore Kenya’s pristine coastline</h2>
                            </div>
                        </div>
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
                        <h3>Types of Visa</h3>
                        <p>As defined by the Kenyan constitution and Visa Regulations, and relates to the purpose of your travel.</p>
                    </div>
                    <div class="panel-body p-t-0">
                        <div class="row box">
                            <div class="col-md-4">
                                <div>
                                    <img src="images/icon1.png">
                                    <h2>Single Entry Visa</h2>
                                    <p>Issued for single entry to persons whose nationalities require visa to enter kenya either for business,tourism or medical reasons.</p>
                                    <div class="learn-more">
                                        <a href="#" class="btn btn-primary apply-button white-bg" title="Enlace">LEARN MORE</a>
                                        <a href="#" class="btn btn-primary apply-button" title="Enlace">APPLY NOW</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div>
                                    <img src="images/icon1.png">
                                    <h2>Transit Visa</h2>
                                    <p>Issued to persons connecting through Kenya to other destinations for a period not exceeding 72 hours. </p>
                                    <div class="learn-more">
                                        <a href="#" class="btn btn-primary apply-button white-bg" title="Enlace">LEARN MORE</a>
                                        <a href="#" class="btn btn-primary apply-button" title="Enlace">APPLY NOW</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div>
                                    <img src="images/icon1.png">
                                    <h2>Courtesy Visa!</h2>
                                    <p>This is a visa issued to Diplomatic, Official and Service passport holders coming into the country on official duties.</p>
                                    <div class="learn-more">
                                        <a href="#" class="btn btn-primary apply-button white-bg" title="Enlace">LEARN MORE</a>
                                        <a href="#" class="btn btn-primary apply-button" title="Enlace">APPLY NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /container -->
    <footer>
        <div class="footer-bottom">
            <div class="container">
                <p class=""> © 2017 - Republic of Kenya - All Rights Reserved / Terms of Use </p>
            </div>
        </div>
    </footer>
@endsection