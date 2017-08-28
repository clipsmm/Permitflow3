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
                        <li><a href="contacts.html">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                <div class="panel faq-panel">
                    <div class="panel-heading">
                        <h3>Eligibility</h3>
                        <p>Do you qualify to apply?</p>
                    </div>
                    <div class="panel-body">
                        <form class="col-sm-6 p-l-0 p-r-0" accept-charset="UTF-8" action="" method="get">
                            <input name="_utf8" type="hidden" value="✓">
                            <div class="input-group " id="adv-search">
                                <input type="hidden" name="application_id" value=''>
                                <input id="search_type" name="search[type]" type="hidden">            <input class="form-control" id="search_q" name="search[q]" placeholder="Search your Nationality." type="text" value="">
                                <div class="input-group-btn">
                                    <div class="btn-group" role="group">
                                        <div class="dropdown dropdown-lg full_width"></div>
                                        <button type="submit" name="submit" class="btn btn5 btn-primary"><span class="search_btn_txt"> <span class="fa fa-search"></span> Search</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-body p-t-0">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th class="width-40">Country</th>
                                <th class="">Do you qualify?</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class=''>
                                <td class="width-40">Afghanistan</td>
                                <td class="">Apply to <a href="#">Director of Immigration Servises</a></td>
                            </tr>
                            <tr class=''>
                                <td class="width-40">Albania</td>
                                <td class="">YES</td>
                            </tr>
                            <tr class=''>
                                <td class="width-40">Algeria </td>
                                <td class="">YES</td>
                            </tr>
                            <tr class=''>
                                <td class="width-40">Andorra </td>
                                <td class="">YES</td>
                            </tr>
                            <tr class=''>
                                <td class="width-40">Afghanistan</td>
                                <td class="">YES</td>
                            </tr>
                            <tr class=''>
                                <td class="width-40">Angola </td>
                                <td class="">
                                    <a href="#" class="btn btn-sm btn-info"> EXEMPTED
                                    </a>
                                </td>
                            </tr>
                            <tr class=''>
                                <td class="width-40">Argentina </td>
                                <td class="">YES</td>
                            </tr>
                            <tr class=''>
                                <td class="width-40">Armenia</td>
                                <td class="">YES</td>
                            </tr>
                            <tr class=''>
                                <td class="width-40">Afghanistan</td>
                                <td class="">Apply to <a href="#">Director of Immigration Servises</a></td>
                            </tr>
                            <tr class=''>
                                <td class="width-40">Afghanistan</td>
                                <td class="">YES</td>
                            </tr>
                            <tr class=''>
                                <td class="width-40">Afghanistan</td>
                                <td class="">YES</td>
                            </tr>
                            <tr class=''>
                                <td class="width-40">Afghanistan</td>
                                <td class="">YES</td>
                            </tr>
                            <tr class=''>
                                <td class="width-40">Afghanistan</td>
                                <td class="">YES</td>
                            </tr>
                            <tr class=''>
                                <td class="width-40">Afghanistan</td>
                                <td class="">YES</td>
                            </tr>
                            <tr class=''>
                                <td class="width-40">Afghanistan</td>
                                <td class="">YES</td>
                            </tr>
                            <tr class=''>
                                <td class="width-40">Afghanistan</td>
                                <td class="">Apply to <a href="#">Director of Immigration Servises</a></td>
                            </tr>
                            <tr class=''>
                                <td class="width-40">Albania</td>
                                <td class="">YES</td>
                            </tr>
                            <tr class=''>
                                <td class="width-40">Algeria </td>
                                <td class="">YES</td>
                            </tr>
                            <tr class=''>
                                <td class="width-40">Andorra </td>
                                <td class="">YES</td>
                            </tr>
                            <tr class=''>
                                <td class="width-40">Afghanistan</td>
                                <td class="">YES</td>
                            </tr>
                            <tr class=''>
                                <td class="width-40">Angola </td>
                                <td class="">
                                    <a href="#" class="btn btn-sm btn-info"> EXEMPTED
                                    </a>
                                </td>
                            </tr>
                            <tr class=''>
                                <td class="width-40">Argentina </td>
                                <td class="">YES</td>
                            </tr>
                            <tr class=''>
                                <td class="width-40">Armenia</td>
                                <td class="">YES</td>
                            </tr>
                            <tr class=''>
                                <td class="width-40">Armenia</td>
                                <td class="">YES</td>
                            </tr>
                            </tbody>
                        </table>
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