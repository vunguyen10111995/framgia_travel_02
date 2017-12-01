@extends('sites.master')

@section('style')
    {{ Html::style('css/profile_home.css') }}
    {{ Html::style('bowers/select2/dist/css/select2.min.css') }}
    {{ Html::style('/bowers/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}
   
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
                                <li class=""><a href="{{ route('user.dashboard', Auth::user()->id) }}">{{ trans('site.dashboard') }}</a></li>
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('images/avatar.png') }}" alt=""><i class="fa fa-angle-down" aria-hidden="true"></i></a>
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
<div class="page-wrap">
    <div class="container content-request">
        <div class="w3agile-about-section-head text-center">
            <h2>{{ trans('site.schedule') }}</h2>
            <span></span>
            <hr>
        </div>
        <div class="centeredDiv">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label>{{ trans('site.visit_province') }}</label>
                    <i class="fa fa-location-arrow"></i>
                    @php
                        $choiceSArr = [];
                        foreach($choices as $choice) {
                            $choiceSArr[] = $choice['province_id'];
                        }
                    @endphp
                    <select name="proChoice[]" class="form-control select2" id="mySelectBox" multiple required disabled="">
                        @foreach($provinces as $province)
                            <option value="{{ $province->id }}"{{ in_array($province->id, $choiceSArr) ? 'selected' : '' }}> 
                                {{ $province->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>{{ trans('site.from') }}</label>
                        <i class="fa fa-calendar"></i>
                        <input type='text' name="start_at" class="form-control datepicker"  value="{{ $fork->plan->start_at }}"/ disabled="">
                    </div>
                    <div class="form-group col-md-6">
                        <label>{{ trans('site.to') }}</label>
                                <i class="fa fa-calendar"></i>
                        <input type="text" name="end_at" class="form-control datepicker" value="{{ $fork->plan->end_at }}" disabled="">
                    </div>
                </div>
                <div>
                    <h5><b>{{ trans('site.description') }}</b> <i class="fa fa-pencil" aria-hidden="true"></i>
                    </h5>
                    <textarea class="form-control" name="description" disabled="">{{ $fork->plan->description }}</textarea>
                </div>
                <br>
                <div>
                    <h5><b>{{ trans('site.description') }}</b> <i class="fa fa-pencil" aria-hidden="true"></i>
                    </h5>
                    <textarea class="form-control" name="description" disabled="">{{ $fork->plan->description }}</textarea>
                </div>
                <div>
                    <h5><b>{{ trans('site.description') }}</b> <i class="fa fa-pencil" aria-hidden="true"></i>
                    </h5>
                    <textarea class="form-control" name="price" disabled="">{{ $fork->plan->price }}</textarea>
                </div>
                <div class="row">
                    <div class="form-group col-md-12 service">
                        <label>{{ trans('site.number_ser') }}</label>
                        <i class="fa fa-calendar"></i>
                        <input name="number_services" type="text" id="number-services" class="form-control" min="0" value="{{ count($fork->forkSchedules) }}" disabled="">
                    </div>
                </div>
                <div class="form-group">
                    <span>
                        <b>{{ trans('site.schedule') }}</b>
                    </span>
                    <div class="schedules">
                        <div id="expand">
                            @foreach($fork->forkSchedules as $fork_schedule)
                            <p class="number-services">{{ $loop->iteration }}</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>
                                        <b>{{ trans('site.title') }}</b> 
                                        <i class="fa fa-commenting-o"></i>
                                    </h5>
                                    <textarea class="form-control" name="title_schedule[]" required="" disabled="">{{ $fork_schedule->title }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>
                                        <b>{{ trans('admin.number_of_day') }}</b> 
                                        <i class="fa fa-calendar"></i>
                                    </h5>
                                    <input type="text" name="date[]" class="form-control" required="" value="{{ $fork_schedule->date }}" disabled="">
                                </div>
                                <div class="col-md-3">
                                    <h5>
                                        <b>{{ trans('site.start_at') }}</b> 
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    </h5>
                                    <input type="text" name="sta[]" class="form-control timepicker" required="" value="{{ $fork_schedule->start_at }}" disabled="">
                                </div>
                                <div class="col-md-3">
                                    <h5>
                                        <b>{{ trans('site.end_at') }}</b> 
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    </h5>
                                    <input type="text" name="end[]" class="form-control timepicker" required="" value="{{ $fork_schedule->end_at }}" disabled="">
                                </div>
                            </div>
                            <div class="row filter">
                                <div class="col-md-3">
                                    <h5>
                                        <b>{{ trans('site.province') }}</b> 
                                        <i class="fa fa-location-arrow"></i>
                                        <input type="text" name="province" value="{{ $fork_schedule->service->province->name }}" class="form-control" disabled="">
                                    </h5>
                                </div>
                                <div class="col-md-3">
                                    <h5>
                                        <b>{{ trans('admin.categories') }}</b> 
                                        <i class="fa fa-location-arrow"></i>
                                    </h5>
                                    <input type="text" name="category" value="{{ $fork_schedule->service->category->name }}" class="form-control" disabled="">
                                </div>
                                <div class="col-md-6">
                                    <h5>
                                        <b>{{ trans('admin.service') }}</b> 
                                        <i class="fa fa-location-arrow"></i>
                                    </h5>
                                    <input type="text" name="service" class="form-control" value="{{ $fork_schedule->service->name }}" disabled="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>
                                        <b>{{ trans('admin.description') }}</b> 
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </h5>
                                    <textarea class="form-control" name="des[]" required="" disabled="">{{ $fork_schedule->description }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>
                                        <b>{{ trans('site.price') }}</b>
                                        <i class="fa fa-usd"></i>
                                    </h5>
                                    <textarea class="form-control" rows="1" name="price[]" autocomplete="off" placeholder="Expected Price" required="" disabled="">{{ $fork_schedule->price }}</textarea>
                                </div>
                            </div>
                            @endforeach
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
    {{ Html::script('bowers/select2/dist/js/select2.full.min.js') }}
    {{ Html::script('/bowers/moment/min/moment.min.js') }}
    {{ Html::script('/bowers/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}
    {{ Html::script('js/list_fork.js') }}  
@endsection
