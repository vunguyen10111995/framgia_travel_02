<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                    <img alt="image" class="img-circle" src="{{ asset('images/img_admin/profile_small.jpg') }}" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Admin</strong>
                    </span> <span class="text-muted text-xs block">Admin <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">{{trans('admin.profile')}}</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">{{trans('admin.logout')}}</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li>
                <a href="#"><i class="fa fa-pie-chart"></i> <span class="nav-label">{{ trans('admin.manage_user') }}</span></a>
            </li>
            <li>
                <a href="metrics.html"><i class="fa fa-pie-chart"></i> <span class="nav-label">Metrics</span>  </a>
            </li>
            <li>
                <a href="metrics.html"><i class="fa fa-pie-chart"></i> <span class="nav-label">Metrics</span>  </a>
            </li>
            <li class="landing_link">
                <a target="_blank" href="landing.html"><i class="fa fa-star"></i> <span class="nav-label">Landing Page</span> <span class="label label-warning pull-right">NEW</span></a>
            </li>
            <li class="special_link">
                <a href="package.html"><i class="fa fa-database"></i> <span class="nav-label">Package</span></a>
            </li>
        </ul>
    </div>
</nav>
