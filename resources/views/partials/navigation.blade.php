<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                {{--<a style="font-size: 2em; color: #3ad2d1; font-weight: 400  ">{{config('app.name')}}</a>--}}
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">{{ Auth::user()->name }}</strong>
                            </span> <span class="text-muted text-xs block">{{ Auth::user()->role->name }} <b class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li>
                            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i> Log out
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    Admin
                </div>
            </li>
            <li class="{{ isActiveRoute('users') }}">
                <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Users</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="{{ isActiveRoute('users.index') }}"><a href="{{ url('/admin/users') }}">Users</a></li>
                    <li class="{{ isActiveRoute('users.create') }}"><a href="{{ url('/admin/users/create') }}">Add User</a></li>
                </ul>
            </li>
        </ul>

    </div>
</nav>
