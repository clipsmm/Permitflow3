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
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
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
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
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
        <nav class="navbar navbar-default navbar-fixed-top"
             style="margin-top: 50px; background-color: #FFF; z-index: 900;">
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
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="/images/landing12.jpg" alt="First slide">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                <!-- pannel -->
                <!--     <div class="panel visa-types requirement2"> -->
                <div class="panel panel-default m-t-10">
                    <div class="panel-heading">
                        <h3 class="panel-title">Requirements and all you need to Know</h3>
                        <!--   <p>Below are the requirements and fees for a single entry visa.</p> -->
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel with-nav-tabs panel-default m-b-0">
                                    <div class="panel-heading p-t-10">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tab11default" data-toggle="tab"><i class="fa fa-money"></i>Fees</a></li>
                                            <li><a href="#tab22default" data-toggle="tab"><i class="fa fa-paperclip"></i>Attachments</a></li>
                                            <li><a href="#tab33default" data-toggle="tab"><i class="fa fa-file-text"></i>Basic Requirements</a></li>
                                            <li><a href="#tab44default" data-toggle="tab"><i class="fa fa-camera"></i>Photo Requirement</a></li>
                                        </ul>
                                    </div>
                                    <div class="panel-body padding-0">
                                        <div class="tab-content">
                                            <!-- tab -->
                                            <div class="tab-pane fade in active" id="tab11default">
                                                <div class="panel m-r-10 m-l-10 m-t-0 m-b-0">
                                                    <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">
                                                        <h3 class="panel-title2">
                                                            All evisa applications attract a 1 USD service charge and card handling fee will be surcharged.
                                                        </h3>
                                                        <div class="col-md-4">
                                                            <div class="pricing hover-effect">
                                                                <div class="pricing-head">
                                                                    <h3>Single entry visa</h3>
                                                                    <h4><i>$</i>51</h4>
                                                                </div>
                                                                <ul class="pricing-content list-unstyled">
                                                                    <li>
                                                                        Card handling surcharged
                                                                    </li>
                                                                    <li>
                                                                        Debit cards
                                                                    </li>
                                                                    <li>
                                                                        Credit cards
                                                                    </li>
                                                                    <li>
                                                                        VISA Card
                                                                    </li>
                                                                    <li>
                                                                        Mastercard
                                                                    </li>
                                                                </ul>
                                                                <div class="pricing-footer">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="pricing hover-effect">
                                                                <div class="pricing-head">
                                                                    <h3>Transit Visa</h3>
                                                                    <h4><i>$</i>21</h4>
                                                                </div>
                                                                <ul class="pricing-content list-unstyled">
                                                                    <li>
                                                                        Card handling surcharged
                                                                    </li>
                                                                    <li>
                                                                        Debit cards
                                                                    </li>
                                                                    <li>
                                                                        Credit cards
                                                                    </li>
                                                                    <li>
                                                                        VISA Card
                                                                    </li>
                                                                    <li>
                                                                        Mastercard
                                                                    </li>
                                                                </ul>
                                                                <div class="pricing-footer">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="pricing hover-effect">
                                                                <div class="pricing-head">
                                                                    <h3>Courtesy Visa</h3>
                                                                    <h4><i>$</i>0</h4>
                                                                </div>
                                                                <ul class="pricing-content list-unstyled">
                                                                    <li>
                                                                        0
                                                                    </li>
                                                                    <li>
                                                                        0
                                                                    </li>
                                                                    <li>
                                                                        0
                                                                    </li>
                                                                    <li>
                                                                        0
                                                                    </li>
                                                                    <li>
                                                                        0
                                                                    </li>
                                                                </ul>
                                                                <div class="pricing-footer">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- tab1 -->
                                            <!-- tab1 -->
                                            <div class="tab-pane fade" id="tab22default">
                                                <div class="panel m-r-10 m-l-10 m-t-0 m-b-0">
                                                    <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">
                                                        <h3 class="panel-title2">
                                                            During the application process you will be required to attach the following documents. The file formats that may be attached are: <strong>PDF, JPG or Microsoft word</strong>.
                                                        </h3>
                                                        <div class="col-md-4">
                                                            <div class="pricing hover-effect">
                                                                <div class="pricing-head">
                                                                    <h5>Single entry visa</h5>
                                                                </div>
                                                                <ul class="pricing-content list-unstyled">
                                                                    <li>
                                                                        <strong>Business Visits</strong>
                                                                    </li>
                                                                    <li>
                                                                        1. Invitation Letters from company / Invitation letter for business visits
                                                                    </li>
                                                                    <li>
                                                                        2. Copies of registration of the company
                                                                    </li>
                                                                    <li>
                                                                        <strong>Family visits</strong>
                                                                    </li>
                                                                    <li>
                                                                        1. Invitation Letters from family.
                                                                    </li>
                                                                    <li>
                                                                        2. Identity card / Passport / Alien card / Entry permit of the host.
                                                                    </li>
                                                                    <li>
                                                                        <strong>Tourists</strong>
                                                                    </li>
                                                                    <li>
                                                                        1. Travel itinerary (Details about places to visit if going as tourist).
                                                                    </li>
                                                                    <li>
                                                                        2. Hotel bookings.
                                                                    </li>
                                                                </ul>
                                                                <div class="pricing-footer">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="pricing hover-effect">
                                                                <div class="pricing-head">
                                                                    <h5>Transit Visa</h5>
                                                                </div>
                                                                <ul class="pricing-content list-unstyled">
                                                                    <li>
                                                                        1. Clear Passport bio data page.
                                                                    </li>
                                                                    <li>
                                                                        2. A clear photograph.
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="pricing hover-effect">
                                                                <div class="pricing-head">
                                                                    <h5>Courtesy Visa</h5>
                                                                </div>
                                                                <ul class="pricing-content list-unstyled">
                                                                    <li>
                                                                        1. Clear Passport bio data page.
                                                                    </li>
                                                                    <li>
                                                                        2. A clear photograph.
                                                                    </li>
                                                                </ul>
                                                                <div class="pricing-footer">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- tab1 -->
                                            <!-- tab -->
                                            <div class="tab-pane fade" id="tab33default">
                                                <div class="panel m-r-10 m-l-10 m-t-0 m-b-0">
                                                    <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">
                                                        <h3 class="panel-title2">
                                                            Before you travel ensure that you are in possession of the following.
                                                        </h3>
                                                        <div class="col-md-4">
                                                            <div class="pricing hover-effect">
                                                                <div class="pricing-head">
                                                                    <h5>Single entry visa</h5>
                                                                </div>
                                                                <ul class="pricing-content list-unstyled">
                                                                    <li>1. Valid travel document not less than six months.</li>
                                                                    <li>2. At least One Blank page in the holders passport.</li>
                                                                    <li>3. An onward ticket.</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="pricing hover-effect">
                                                                <div class="pricing-head">
                                                                    <h5>Transit Visa</h5>
                                                                </div>
                                                                <ul class="pricing-content list-unstyled">
                                                                    <li>1. Valid travel document not less than six months.</li>
                                                                    <li>2. At least One Blank page in the holders passport.</li>
                                                                    <li>3. An onward ticket.</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="pricing hover-effect">
                                                                <div class="pricing-head">
                                                                    <h5>Courtesy Visa</h5>
                                                                </div>
                                                                <ul class="pricing-content list-unstyled">
                                                                    <li>1. Valid travel document not less than six months..</li>
                                                                    <li>2. Must be a holder of a service, official and diplomatic passport</li>
                                                                    <li>3. Must hold an official letter from the country of origin/ organization/ foreign affairs.</li>
                                                                    <li>4. At least One Blank page in the holders passport.</li>
                                                                    <li>5. Spouses and children accompanying Diplomatic, Service or Official passport holders on duty, but travelling on ordinary passports do not qualify for courtesy visa whether on transit, business or holiday.</li>
                                                                    <li>6.An onward ticket or a boarding pas for passangers on transit</li>
                                                                    <li>4. In cases of applicants who fall under category 3 of the Visa regime / Regulations, the Kenyan visa regulations must apply whether on transit or official business.</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- tab1 -->
                                            <!-- tab -->
                                            <div class="tab-pane fade" id="tab44default">
                                                <div class="panel panel-default m-r-10 m-l-10 m-t-10 m-b-10">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Consider the following while taking a photo for evisa.</h3>
                                                    </div>
                                                    <div class="panel-body p-t-20 p-b-10 p-l-10 p-r-10">
                                                        <div class="col-md-12">
                                                            <p> 1. DO NOT take photograph of or scan the photo in your passport.</p>
                                                            <p>2. Must be taken within the past 6 months, showing your current appearance.</p>
                                                            <p>3. Must be in color.</p>
                                                            <p>4. Must show your full face, front view with a plain white or off-white background.</p>
                                                            <p>5. Must be taken in normal street attire. Uniforms should NOT BE worn in photographs except religious attire that is worn daily.</p>
                                                            <p>6. Do not wear a hat or headgear that obscures the hair or hairline.</p>
                                                            <p>7. If you normally wear prescription glasses, a hearing device, wig or similar articles, they should be worn for your picture.</p>
                                                            <p>8. Dark glasses or nonprescription glasses with tinted lenses are not acceptable unless you need them for medical reasons. A medical certificate may be required.</p>
                                                        </div>
                                                    </div>
                                                    <div class="panel-footer">
                                                        <a target="_ext" href="images/photography-guidelines.pdf" class="btn btn-md btn-info">
                                                            <span class="fa fa-picture-o"></span> View photo guidelines
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- tab1 -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--   end pannel -->
            </div>
        </div>
    </div>
    <!-- /container -->
@endsection