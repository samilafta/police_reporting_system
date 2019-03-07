<aside class="left-side sidebar-offcanvas">
    <section class="sidebar ">
        <div class="page-sidebar  sidebar-nav">
            <div class="clearfix"></div>
            <!-- BEGIN SIDEBAR MENU -->
            <ul id="menu" class="page-sidebar-menu">
                <li>
                    <a href="{{ route('home') }}">
                        <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="livicon" data-name="users" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                        <span class="title">Cases</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ route('cases.index') }}">
                                <i class="fa fa-angle-double-right"></i> Cases List
                            </a>
                        </li>
                        {{--<li>--}}
                            {{--<a href="{{route('users.profile')}}">--}}
                                {{--<i class="fa fa-angle-double-right"></i> My Profile--}}
                            {{--</a>--}}
                        {{--</li>--}}

                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="livicon" data-name="gears" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                        <span class="title">Setup</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ route('users.index') }}">
                                <i class="fa fa-angle-double-right"></i> Users List
                            </a>
                        </li>
                        <li>
                            <a href="{{route('roles.index')}}">
                                <i class="fa fa-angle-double-right"></i> Roles
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="{{ route('users.profile') }}">
                        <i class="livicon" data-name="user" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                        <span class="title">My Profile</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('reports.index') }}">
                        <i class="livicon" data-name="doc-portrait" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                        <span class="title">Reports</span>
                    </a>
                </li>

            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
    </section>
</aside>