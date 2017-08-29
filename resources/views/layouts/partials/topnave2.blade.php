 <nav class="navbar navbar-default   navbar-fixed-top"  style="margin-top: 50px; background-color: #FFF; z-index: 900;">
    <div class="container">
        <div class="navbar-header">
            <div class="col-sm-2 col-md-2 col-lg-2 hidden-xs">
                <a class="navbar-brand" href="{{ route('frontend') }}">
                    <span class="hidden-xs">
                        @lang('Dashboard')
                    </span>
                    <span  class=""></span>
                </a>
            </div>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav tp-icon">
                <li><a href="#"><strong>
                            @lang('Make Application')
                        </strong></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right hidden-xs">
                @if(user())
                    <li class="#">
                        <a href="{{ route('backend.settings.general') }}"><i class="fa fa-cogs"></i>
                            @lang('Settings')
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
