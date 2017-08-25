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
                        <h3>Frequently Asked Questions</h3>
                        <p>About the eVisa - Get Answers.</p>
                    </div>
                    <div class="panel-body p-t-0">
                        <div class="panel-group" id="faqAccordion">
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question0">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q: What is Lorem Ipsum?</a>
                                    </h4>
                                </div>
                                <div id="question0" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <h5><span class="label label-primary">Answer</span></h5>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five <a href="http://jquery2dotnet.com/" class="label label-success">http://jquery2dotnet.com/</a> centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q: Why do we use it?</a>
                                    </h4>
                                </div>
                                <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <h5><span class="label label-primary">Answer</span></h5>
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q: Why do we use it?</a>
                                    </h4>
                                </div>
                                <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <h5><span class="label label-primary">Answer</span></h5>
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q: Why do we use it?</a>
                                    </h4>
                                </div>
                                <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <h5><span class="label label-primary">Answer</span></h5>
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q: Why do we use it?</a>
                                    </h4>
                                </div>
                                <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <h5><span class="label label-primary">Answer</span></h5>
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q: Why do we use it?</a>
                                    </h4>
                                </div>
                                <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <h5><span class="label label-primary">Answer</span></h5>
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q: Why do we use it?</a>
                                    </h4>
                                </div>
                                <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <h5><span class="label label-primary">Answer</span></h5>
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q: Why do we use it?</a>
                                    </h4>
                                </div>
                                <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <h5><span class="label label-primary">Answer</span></h5>
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q: Why do we use it?</a>
                                    </h4>
                                </div>
                                <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <h5><span class="label label-primary">Answer</span></h5>
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q: Why do we use it?</a>
                                    </h4>
                                </div>
                                <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <h5><span class="label label-primary">Answer</span></h5>
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q: Why do we use it?</a>
                                    </h4>
                                </div>
                                <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <h5><span class="label label-primary">Answer</span></h5>
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q: Why do we use it?</a>
                                    </h4>
                                </div>
                                <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <h5><span class="label label-primary">Answer</span></h5>
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q: Why do we use it?</a>
                                    </h4>
                                </div>
                                <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <h5><span class="label label-primary">Answer</span></h5>
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q: Why do we use it?</a>
                                    </h4>
                                </div>
                                <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <h5><span class="label label-primary">Answer</span></h5>
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q: Why do we use it?</a>
                                    </h4>
                                </div>
                                <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <h5><span class="label label-primary">Answer</span></h5>
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q: Why do we use it?</a>
                                    </h4>
                                </div>
                                <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <h5><span class="label label-primary">Answer</span></h5>
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q: Why do we use it?</a>
                                    </h4>
                                </div>
                                <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <h5><span class="label label-primary">Answer</span></h5>
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q: Why do we use it?</a>
                                    </h4>
                                </div>
                                <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <h5><span class="label label-primary">Answer</span></h5>
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q: Why do we use it?</a>
                                    </h4>
                                </div>
                                <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <h5><span class="label label-primary">Answer</span></h5>
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question2">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q: Where does it come from?</a>
                                    </h4>
                                </div>
                                <div id="question2" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <h5><span class="label label-primary">Answer</span></h5>
                                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question3">
                                    <h4 class="panel-title">
                                        <a href="#" class="ing">Q: Where can I get some?</a>
                                    </h4>
                                </div>
                                <div id="question3" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <h5><span class="label label-primary">Answer</span></h5>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </p>
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