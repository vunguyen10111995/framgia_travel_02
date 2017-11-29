@extends('sites.master')

@section('style')
    {{ Html::style('css/profile_home.css') }}
    {{ Html::style('bowers/select2/dist/css/select2.min.css') }}
@endsection

@section('script')
    {{ Html::script('js/list_fork.js') }}
@endsection

@section('content')

<section>
    <nav class="navbar navbar-default navbar-main navbar-fixed-top nav-header" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('home') }}"></a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown singleDrop">
                        <a href="{{ route('home') }}">{{ trans('site.home') }}</a>
                    </li>
                    <li class="dropdown megaDropMenu ">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="300" data-close-others="true" aria-expanded="false">{{ trans('site.provinces') }}</a>
                    </li>
                    <li class="dropdown singleDrop ">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('site.hotels') }}</a>
                    </li>
                    <li class="dropdown singleDrop ">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('site.restaurants') }}</a>
                    </li>
                    <li class="dropdown singleDrop ">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('site.activities') }}</a>
                    </li>
                    <li class="dropdown singleDrop ">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('site.guides') }}</a>
                    </li>
                    @if (Auth::guest())
                        <li class="dropdown singleDrop ">
                            <a href="" data-toggle="modal" data-target="#register">{{ trans('register') }}</a>
                        </li>
                        <li class="dropdown singleDrop ">
                            <a href="" data-toggle="modal" data-target="#login">{{ trans('login') }}</a>
                        </li>
                    @else    
                        <li class="dropdown singleDrop active">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('site.admin') }}</a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class=""><a href="#">{{ trans('site.dashboard') }}</a></li>
                                <li class=""><a href="{{ route('user.profile') }}">{{ trans('site.profile') }}</a></li>
                                <li class=""><a href="{{ route('user.plan') }}">{{ trans('site.add_plan') }}</a></li>
                                <li class=""><a href="{{ route('user.request') }}">{{ trans('site.request_services') }}</a></li>
                                <li class=""><a href="#">{{ trans('site.booking') }}</a></li>
                                <li class="">
                                    <a href="{{ route('logout') }}">
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            {{ csrf_field() }}
                                        </form>
                                        {{ trans('site.logout') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif 
                </ul>
            </div>
        </div>
    </nav>
</section>
<!-- DASHBOARD MENU  -->
<section class="dashboardMenu">
    <nav class="navbar dashboradNav">
        <div class="container">
            <div class="dashboardNavRight">
                <ul class="NavRight">
                    <li class="dropdown singleDrop">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('images/01.jpg') }}" alt=""><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <ul class="dropdown-menu dropdownMenu">
                            <li>
                                <a href="{{ route('user.profile') }}">
                                    <h5>{{ trans('site.profile') }}</h5>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.setting') }}">
                                    <h5>{{ trans('site.setting') }}</h5>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}">
                                    <h5>{{ trans('site.logout') }}</h5>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav dashboardNavLeft">
                    <li><a class="active" href="{{ route('user.dashboard', Auth::user()->id) }}"><i class="fa fa-tachometer" aria-hidden="true"></i>{{ trans('site.dashboard') }}</a></li>
                    <li><a href="{{ route('user.profile') }}"><i class="fa fa-user" aria-hidden="true"></i>{{ trans('site.profile') }}</a></li>
                    <li><a href="booking.html"><i class="fa fa-cube" aria-hidden="true"></i>{{ trans('site.booking') }}</a></li>
                    <li><a href="{{ route('user.setting') }}"><i class="fa fa-cogs" aria-hidden="true"></i>{{ trans('site.setting') }}</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
</section>
<div class="user-profile-wrapper">
    <div class="user-header">
        <div class="content">
            <div class="content-top">
                <div class="container">
                    <div class="inner-top">
                        <div class="image">
                            <img src="{{ $user->avatar }}" alt="image">
                        </div>
                        <div class="GridLex-gap-20">
                            <div class="GridLex-grid-noGutter-equalHeight GirdLex-grid-bottom">
                                <div class="GridLex-col-7_sm-12_xs-12_xss-12">
                                    <div class="GridLex-inner">
                                        <div class="heading clearfix">
                                            <h3>{{ $user->full_name }}</h3>
                                            @if($user->level == 2)
                                                <span class="label label-info"><i class="fa fa-trophy mr-3"></i> Certified Guide</span>
                                            @else
                                                <span class="label label-success"><i class="fa fa-check mr-3"></i> Verified</span>    
                                            @endif
                                        </div>
                                        <ul class="user-meta">
                                            <li><i class="fa fa-map-marker"></i> {{ $user->address }} <span class="mh-5 text-muted">|</span> <i class="fa fa-phone"></i> +4 8547 985</li>
                                            <li>
                                                <div class="dashboardSocialIcon">
                                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true" title="facebook"></i></a>
                                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true" title="twitter"></i></a>
                                                    <a href="#"><i class="fa fa-rss" aria-hidden="true" title="rss"></i></a>
                                                    <a href="#"><i class="fa fa-vimeo" aria-hidden="true" title="vimeo"></i></a>
                                                </div>
                                                @if($user->id == Auth::user()->id)
                                                @else
                                                    @foreach($userFollowers as $q)
                                                        @if($q->following_id == Auth::user()->id)
                                                            <a href="#" class="btn btn-xs btn-border"><span>{{ trans('site.unfollow') }}</span></a>
                                                            @break
                                                        @else
                                                           <a href="#" class="btn btn-xs btn-border"><span>{{ trans('site.follow') }}</span></a>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </li>
                                            <li>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="GridLex-col-5_sm-12_xs-12_xss-12">   
                                </div>      
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-bottom">
                <div class="container">
                    <div class="inner-bottom">
                        <ul class="user-header-menu">
                            @if($user->id == Auth::user()->id)
                                <li><a href="{{ route('user.profile') }}">{{ trans('site.profile') }}</a></li>
                                <li><a href="{{ route('user.dashboard', Auth::user()->id) }}">{{ trans('site.plans') }} <span>{{ $numberPlan }}</span></a></li>
                                <li><a href="">{{ trans('site.gallery') }}</a></li>
                                <li><a href="">{{ trans('site.reviews') }}</a></li>
                                <li><a href="" data-toggle="modal" data-target="#following">{{ trans('site.followings') }} <span>{{ $following }}</span></a></li>
                                <li><a href="" data-toggle="modal" data-target="#follower">{{ trans('site.followers') }} <span>{{ $follower }}</span></a></li>
                                <li class="active"><a href="">{{ trans('site.dashboard') }}</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="content-dashboard">
        <div class="col-md-3 .col-md-pull-9">
            <div class="sidebar"> 
                <ul class="nav nav-sidebar">
                    <li class="active"><a href="">{{ trans('site.my_plans') }}</a></li>
                    <li><a href="" id="list_fork" value="{{ Auth::user()->id }}">{{ trans('site.my_fork_plans') }}</a></li>
                    <li><a href="">{{ trans('site.request_services') }}</a></li>
                    <li><a href="">{{ trans('site.booking') }}</span></a></li>
                    <li><a href="">{{ trans('site.my_wishlist') }}</a></li>
                    <li><a href="">{{ trans('site.logout') }}</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9 .col-md-push-3" id="show_info">
            <h4 class="h4-plan">{{ trans('site.my_plans') }}</h4>
            @if($user->id == Auth::user()->id)
                <a href="{{ route('user.plan') }}"><i class="fa fa-plus-circle" aria-hidden="true"></i><span> {{ trans('site.add_plan') }}</span></a>
            @endif
            <div class="wrap">
                @foreach($plans as $plan)
                    <a href="{{ route('user.schedule', $plan->id) }}" class="content-plan">
                        <div class="tile">
                            <h1 class="del-plan">
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </h1>
                            <img src="{{ asset('images/avatar.png') }}">
                            <div class="text">
                                <h5 class="animate-text">
                                    {{ trans('site.start_at') }}:
                                    {{ $plan->start_at }}
                                    <br>
                                    {{ trans('site.end_at') }}:
                                    {{ $plan->end_at }}
                                </h5>
                                @foreach($plan->planProvinces as $choice)
                                    <h5 class="animate-text">
                                        <i class="fa fa-hand-o-right"></i>
                                        {{ $choice->province->name }}
                                    </h5>
                                @endforeach
                            </div>
                            <div class="create-schedule">{{ trans('site.create_schedule') }}</div>
                        </div>
                    </a>
                    <h5 class="title-plan">{{ trans('site.fork') }}</h5>
                    <i class="fa fa-eye" aria-hidden="true"> &nbsp;  {{ count($plan->forks) }}</i>
                    <h5 class="title-plan">{{ $plan->title }}</h5>
                @endforeach
                {!! $plans->render() !!}
            </div>
        </div>
    </div>
</div>
<!-- Followings -->
<div class="modal fade" id="following" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">{{ trans('site.close') }}</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ trans('site.followings') }}</h4>
            </div>
            <div class="modal-body">
                @foreach($userFollowers as $follower)
                    <div class="content-follow">
                        <a href="{{ route('user.dashboard', ['id' => $follower->followingUser->id]) }}"><img src="{{ $follower->followingUser->avatar }}" class="img-circle" width="50" height="50"></a>
                        <a href="{{ route('user.dashboard', ['id' => $follower->followingUser->id]) }}">
                            {{ $follower->followingUser->full_name }}
                        </a>
                        <a href="#" id="btn-unfollow" class="btn btn-xs btn-border"><span>{{ trans('site.unfollow') }}</span></a>
                   </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Followers -->
<div class="modal fade" id="follower" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">{{ trans('site.close') }}</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ trans('site.followers') }}</h4>
            </div>
            <div class="modal-body"> 
                @foreach($userFollowings as $following)
                    <div class="content-follow">
                        <a href="{{ route('user.dashboard', ['id' => $following->followerUser->id]) }}"><img src="{{ $following->followerUser->avatar }}" class="img-circle" width="50" height="50"></a>
                        <a href="{{ route('user.dashboard', ['id' => $following->followerUser->id]) }}">
                            {{ $following->followerUser->full_name }}
                        </a>
                        @foreach($userFollowers as $follower)
                            @if($following->followerUser->id == $follower->following_id)
                                <a href="#" id="btn-unfollow" class="btn btn-xs btn-border"><span>{{ trans('site.unfollow') }}</span></a>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
