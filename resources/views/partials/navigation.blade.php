<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                {{--<a style="font-size: 2em; color: #3ad2d1; font-weight: 400  ">{{config('app.name')}}</a>--}}
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="image" class="img-circle" src="{{asset('img/profile_small.jpg')}}" />
                        </span>
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</strong>
                            </span> <span class="text-muted text-xs block">{{ Auth::user()->first_name }} <b class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>

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
            <li class=""><a href="{{ url('/home') }}"><i class="fa fa-home"></i>Dashboard</a></li>
            <li class="{{ isActiveRoute('users') }}">
                <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Users</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="{{ isActiveRoute('users.index') }}"><a href="{{ url('/admin/users') }}">Users</a></li>
                    <li class="{{ isActiveRoute('users.create') }}"><a href="{{ url('/admin/users/create') }}">Add User</a></li>
                </ul>
            </li>
            <li class="{{ isActiveRoute('users') }}">
                <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Access Control List</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="{{ isActiveRoute('users.index') }}"><a href="{{ url('/admin/roles') }}">Roles</a></li>
                    <li class="{{ isActiveRoute('users.create') }}"><a href="{{ url('/admin/permissions/create') }}">Create Permission</a></li>
                    <li class="{{ isActiveRoute('users.create') }}"><a href="{{ url('/admin/roles/create') }}">Create Role</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
