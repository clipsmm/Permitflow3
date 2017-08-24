<nav class="navbar navbar-inverse    navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'eVisa') }}
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="/">Home</a></li>
                <li class=""><a href="/accounts/46/services">Make Application</a></li>
                <li class=""><a href="/accounts/46/applications">Application History</a></li>

            </ul>
            <div id="searchbar" class="col-sm-3 col-md-6">
                <form accept-charset="UTF-8" action="/search-business" class="navbar-form navbar-left" method="get" role="search">
                    <input name="_utf8" type="hidden" value="✓">
                    <div class="input-group">
                        <input class="form-control" id="search_q" name="search[q]" placeholder="Search businesses by name" type="text">  <span class="input-group-btn">
            <button class="btn btn-default">
            <span class="fa fa-search"></span>
            </button>
            </span>
                    </div>
                </form>
            </div>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
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

