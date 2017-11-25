<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                        <img alt="image" class="img-circle" src="{{ asset('images/img_admin/profile_small.jpg') }}" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">{{ Auth::user()->full_name }}
                                </strong>
                            </span> 
                            <span class="text-muted text-xs block">Admin 
                                <b class="caret"></b>
                            </span> 
                        </span> 
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li>
                            <a href="{{ route('admin.profile', Auth::user()->id ) }}">{{ trans('admin.profile') }}</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="login.html">{{ trans('admin.logout') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li>
                <a href="{{ route('admin.user.index') }}"><i class="fa fa-pie-chart"></i> <span class="nav-label">{{ trans('admin.manage_user') }}</span></a>
            </li>
            <li>
                <a href="{{ route('admin.category.index') }}"><i class="fa fa-pie-chart"></i> <span class="nav-label">{{ trans('admin.manage_category') }}</span>  </a>
            </li>
            <li>
                <a href="{{ route('admin.province.index')}}"><i class="fa fa-pie-chart"></i> <span class="nav-label">{{ trans('admin.manage_province') }}</span>  </a>
            </li>
            <li>
                <a href="{{ route('admin.service.index')}}"><i class="fa fa-pie-chart"></i> <span class="nav-label">{{ trans('admin.manage_service') }}</span>  </a>
            </li>
            <li>
                <a href="{{ route('admin.plan.index') }}"><i class="fa fa-star"></i> <span class="nav-label">{{ trans('admin.plan') }}</span></a>
            </li>
        </ul>
    </div>
</nav>
