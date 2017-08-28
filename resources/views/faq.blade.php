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
        @include('layouts.partials.top_nav_default')
    </header>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                <div class="panel faq-panel">
                    <div class="panel-heading">
                        <h3>Frequently Asked Questions</h3>
                        <p>About the eVisa - Get Answers.</p>
                    </div>
                    <div class="panel-body p-t-0">
                        <div class="panel-group" id="faqAccordion">
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question0">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q: Do I need an e-visa to visit Kenya?</a>
                                    </h4>
                                </div>
                                <div id="question0" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <p><strong>A: </strong>  All foreign citizens wishing to travel to Kenya will need an evisa, except citizens from countries who are exempt. Click HERE for a list of exempted countries.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q: Who needs to obtain an e-visa?</a>
                                    </h4>
                                </div>
                                <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <p><strong>A: </strong> The e-visa is only available to passport holders from 148 evisa eligible countries. Click HERE for a list of eligible nationalities.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question2">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q:  What types of visas are available for those visiting the Republic of Kenya?</a>
                                    </h4>
                                </div>
                                <div id="question2" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <p><strong>A: </strong> There are three e-visa types for people traveling to the Republic of Kenya temporarily.<br/><br/>
                                            <strong>Single Entry visa - </strong> Issued for single entry to persons whose nationalities require a visa to enter Kenya either for business, tourism or medical reasons.<br/><br/>
                                            <strong>Transit visa - </strong> Issued to persons connecting through Kenya to other destinations for a period not exceeding 72 hours. Those connecting flights directly without leaving the airport dont need to apply for Transit visas.<br/><br/>
                                            <strong>Courtesy visa - </strong> Issued to Diplomatic, Official and Service passport holders coming into the country on official duties, or transiting through Kenya to a third country for official business or duties. It is also issued to government officials and dignitaries on official duties but holding ordinary passports. It is issued free of charge / gratis.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question3">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q: How much is the e-visa??</a>
                                    </h4>
                                </div>
                                <div id="question3" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <p><strong>A: </strong>  1: Single entry visa USD $51.<br/>Transit visa USD $21.<br/>Courtesy visa No Charge.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question4">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q: Who DOES NOT qualify to apply for an evisa??</a>
                                    </h4>
                                </div>
                                <div id="question4" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <p><strong>A: </strong> If you are a passport holder of the CATEGORY THREE COUNTRIES, you will be required to submit a paper based application for a visa to the Department of Immigration services.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question5">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q:  How long does it take to get an e-Visa for Kenya??</a>
                                    </h4>
                                </div>
                                <div id="question5" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <p><strong>A: </strong> The processing time is 2 business days.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question6">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q:  What should I do after I apply for my e-Visa?</a>
                                    </h4>
                                </div>
                                <div id="question6" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <p><strong>A: </strong> Once the it is approved, the evisa will be made available to your evisa account. You must print a copy to carry with your passport and bring it along when you travel to Kenya. When you arrive in Kenya, you must have your evisa printout with your passport.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question7">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q: When will my eVisa expire?</a>
                                    </h4>
                                </div>
                                <div id="question7" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <p><strong>A: </strong> An evisa to Kenya once issued is valid for 3 months before you travel. Once you present yourself to immigration control at the port of entry, you may be issued with a stay period not exceeding 90 days, which may be renewed for a further 90 days at the immigration headquarters.<br/>The maximum number of days a visitor may stay in Kenya is 6 months.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question8">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q:  If my e-Visa application is denied by the Kenyan government will my fees be refunded?</a>
                                    </h4>
                                </div>
                                <div id="question8" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <p><strong>A: </strong> No, once the application has been submitted to the Kenyan government, the e-Visa application fees are non-refundable.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question9">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q:  I have already visited Kenya one time using my single entry visa, do I need to apply for another e-Visa?</a>
                                    </h4>
                                </div>
                                <div id="question9" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <p><strong>A: </strong> Yes, when your visa is used or expired you need to apply for another visa in order to travel to Kenya again.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question10">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q: Can i extend my stay in Kenya??</a>
                                    </h4>
                                </div>
                                <div id="question10" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <p><strong>A: </strong> After the initial days allocated by the immigration control at the port of entry have elapsed, you renew your visa at the immigration headquarters in Nairobi. The maximum number of days a visitor may stay in Kenya is 6 months.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question11">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q: If I cancel my online order will my fees be refunded?</a>
                                    </h4>
                                </div>
                                <div id="question11" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <p><strong>A: </strong> Once the application is in process, the e-Visa application fees are non-refundable.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question12">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q:  Is my personal information secure to submit online??</a>
                                    </h4>
                                </div>
                                <div id="question12" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <p><strong>A: </strong> Yes, when you complete your application for a Kenyan e-Visa, your information is secure and is submitted directly to the Kenyan government. Your personal information will be processed only for the purpose of making a decision on your visa application. <br/>Protection of the personal data provided in the application form will be the responsibility of the Kenyan government.</p>
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