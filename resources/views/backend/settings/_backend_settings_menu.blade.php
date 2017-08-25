<ul class="nav nav-tabs">
    <li class="{{ menu_current_route('backend.settings.general') }}"><a href="{{ route('backend.settings.general') }}"> General Settings</a></li>
    <li class="{{ menu_current_route('backend.users.*') }}"><a href="{{ route('backend.users.index') }}"> Manage Users</a></li>
    <li class="{{ menu_current_route('backend.roles.*') }}"><a href="{{ route('backend.roles.index') }}"> Manage Roles</a></li>
    <li class="{{ menu_current_route('backend.modules.*') }}"><a href="{{ route('backend.modules.index') }}"> Manage Modules</a></li>
</ul>