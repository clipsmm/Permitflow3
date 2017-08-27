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
                <!--
                   <div class="panel visa-types m-b-0 requirement">

                        <div class="panel-heading m-t-50">
                           <h3>Types of Visa</h3>
                            <p>As defined by the Kenyan constitution and Visa Regulations, and relates to the purpose of your travel.</p>

                         </div>


                             <div class="panel-body p-t-0 p-b-0">

                                           <div class="row box">
                                             <div class="col-md-4">
                                                 <div>
                                                   <span class="fa-stack fa-3x">
                                                                                     <i class="fa fa-circle fa-stack-2x icon-background3"></i>
                                                                                     <i class="fa fa-clock-o fa-stack-1x icon-color"></i>
                                                                           </span>

                                                 <h2>Single Entry Visa</h2>
                                                 <p>Issued for single entry to persons whose nationalities require visa to enter Kenya either for business, tourism or medical reasons.</p>


                                               </div>
                                             </div>

                                               <div class="col-md-4">
                                                 <div>

                                                  <span class="fa-stack fa-3x">
                                                                                   <i class="fa fa-circle fa-stack-2x icon-background2"></i>
                                                                                   <i class="fa fa-refresh fa-stack-1x icon-color"></i>
                                                                         </span>

                                                 <h2>Transit Visa</h2>
                                                 <p>Issued to persons connecting through Kenya to other destinations for a period not exceeding 72 hours. Those connecting flights directly without leaving the airport dont need to apply for Transit visas.</p>


                                               </div>
                                             </div>


                                                <div class="col-md-4">
                                                 <div>

                                                  <span class="fa-stack fa-3x">
                                                     <i class="fa fa-circle fa-stack-2x icon-background2"></i>
                                                     <i class="fa fa-refresh fa-stack-1x icon-color"></i>
                                               </span>

                                                 <h2>Courtesy Visa!</h2>
                                                 <p>Your stay period may be renewed for a further 90 days at the immigration headquarters in Nairobi. The maximum number of days a visitor may stay in Kenya is 6 months. </p>


                                               </div>
                                             </div>


                                           </div>
                               </div>

                           </div>
                   -->
                <!-- pannel -->
                <div class="panel visa-types requirement2">
                    <div class="panel-heading m-t-50">
                        <h3>Requirements and all you need to Know</h3>
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
                                                <div class="panel panel-form m-r-10 m-l-10 m-t-0 m-b-0">
                                                    <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">
                                                        <div class="p-t-0 p-m-10 p-b-10">
                                                            <p>All evisa applications attract a 1 USD service charge and card handling fee will be surcharged.</p>
                                                        </div>
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
                                                <div class="panel panel-form m-r-10 m-l-10 m-t-0 m-b-0">
                                                    <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- tab1 -->
                                            <!-- tab -->
                                            <div class="tab-pane fade" id="tab33default">
                                                <div class="panel panel-form m-r-10 m-l-10 m-t-0 m-b-0">
                                                    <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- tab1 -->
                                            <!-- tab -->
                                            <div class="tab-pane fade" id="tab44default">
                                                <div class="panel panel-form m-r-10 m-l-10 m-t-0 m-b-0">
                                                    <div class="panel-body p-t-10 p-b-10 p-l-0 p-r-0">
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
    <footer>
        <div class="footer-bottom">
            <div class="container">
                <p class=""> © 2017 - Republic of Kenya - All Rights Reserved / Terms of Use </p>
            </div>
        </div>
    </footer>
@endsection