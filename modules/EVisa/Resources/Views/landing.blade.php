@extends('layouts.app')
@section('content')
    @include('layouts.partials.topnav1')
    @if (Auth::guest())
        @include('layouts.partials.top_nav_default')
    @else
        @include('layouts.partials.topnave2')
    @endif

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
                                <a href="{{ $module->newUrl() }}" class="btn btn-primary apply-button" title="Enlace">APPLY NOW</a>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/landing11.jpg" alt="Second slide">
                            <div class="carousel-caption">
                                <h4>get your evisa online, across all devices!</h4>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/landing8.jpg" alt="Second slide">
                            <div class="carousel-caption">
                                <h4>THINK FUTURE, THINK KENYA</h4>
                                <h2> wheather you wish to take a magical holiday or undertake business in kenya</h2>
                                <a href="single.html" class="btn btn-primary apply-button" title="Enlace">WATCH VIDEO</a>
                            </div>
                        </div>
                        <div class="item">
                            <img src="images/landing4.jpg" alt="Second slide">
                            <div class="carousel-caption">
                                <h4>See The Migration In Mara</h4>
                                <h2> This is one of the remarkable wildlife attractions that make’s Kenya one of the best wildlife destinations in the world</h2>
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
                <div class="panel visa-types panel-landing m-b-0">
                    <div class="panel-heading m-t-40">
                        <h3>Get your kenya evisa online today</h3>
                        <p>Apply for a Single entry visa, Transit visa or Courtesy visa to Kenya and pay securely using your VISA card or Mastercard.</p>
                    </div>
                    <div class="panel-body p-t-0">
                        <div class="row box">
                            <div class="col-md-4">
                                <div>
                                    <div class="box-images">  <img class="img-responsive" src="images/apply.jpg" alt="Second slide"></div>
                                    <p>Get your eVisa to kenya, easy and conviniently</p>
                                    <div class="learn-more">
                                        <!--  <a href="single.html" class="btn btn-primary apply-button white-bg" title="Enlace">LEARN MORE</a> -->
                                        <a href="{{ $module->newUrl() }}" class="btn btn-primary apply-button" title="Enlace">APPLY NOW</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div>
                                    <div class="box-images">  <img class="img-responsive" src="images/ongoing.jpg" alt="Second slide"></div>
                                    <p>Requirements and fees for a kenya visa</p>
                                    <div class="learn-more">
                                        <a href="ongoing.html" class="btn btn-primary apply-button white-bg" title="Enlace">I HAVE AN ONGOING APPLICATION</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div>
                                    <div class="box-images">  <img class="img-responsive" src="images/requirements.jpg" alt="Second slide"></div>
                                    <p>Requirements and fees for a kenya visa</p>
                                    <div class="learn-more">
                                        <!--  <a href="single.html" class="btn btn-primary apply-button white-bg" title="Enlace">LEARN MORE</a> -->
                                        <a href="{{ route('e-visa.requirements') }}" class="btn btn-primary apply-button" title="Enlace">VISA REQUIREMENTS </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                <div class="footer-bottom">
                    <div class="container">
                        <p class=""> © 2017 - Republic of Kenya - All Rights Reserved / Terms of Use </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection