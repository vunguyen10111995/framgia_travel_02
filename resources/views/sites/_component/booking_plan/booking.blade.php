@extends('sites.master')

@section('style')
    {{ Html::style('css/profile_home.css')}}
    {{ Html::style('css/booking.css')}}
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
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav dashboardNavLeft">
                    <li><a class="active" href="{{ route('user.dashboard', Auth::user()->id) }}"><i class="fa fa-tachometer" aria-hidden="true"></i>{{ trans('site.dashboard') }}</a></li>
                    <li><a href="{{ route('user.profile') }}"><i class="fa fa-user" aria-hidden="true"></i>{{ trans('site.profile') }}</a></li>
                    <li><a class="active" href=""><i class="fa fa-cube" aria-hidden="true"></i>{{ trans('site.booking') }}</a></li>
                    <li><a href="{{ route('user.setting') }}"><i class="fa fa-cogs" aria-hidden="true"></i>{{ trans('site.setting') }}</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
</section>
<section class="mainContentSection">
    <div class="container">
        <div class="row progress-wizard">
            <div class="col-sm-4 col-xs-12 progress-wizard-step active">
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <a href="javascript:void(0)" class="progress-wizard-dot">
                <i class="fa fa-user" aria-hidden="true"></i>
                1. {{ trans('site.per_info') }}
                </a>
            </div>
            <div class="col-sm-4 col-xs-12 progress-wizard-step disabled">
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <a href="" class="progress-wizard-dot">
                <i class="fa fa-usd" aria-hidden="true"></i>
                2. {{ trans('site.pay_info') }}
                </a>
            </div>
            <div class="col-sm-4 col-xs-12 progress-wizard-step disabled">
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <a href="" class="progress-wizard-dot">
                <i class="fa fa-check" aria-hidden="true"></i>
                3. {{ trans('site.confirm') }}
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-sm-push-8 col-xs-12">
                <aside>
                    <br>
                    <div class="infoTitle">
                        <h2>{{ trans('site.book_detail') }}</h2>
                    </div>
                    <div class="bookDetailsInfo">
                        <img src="{{ asset('images/image/tam-suoi.jpg') }}" alt="image">
                        <div class="infoArea">
                            <h3>{{ $plan->title }}</h3>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-calendar" aria-hidden="true"></i>{{ trans('site.from') }}:  <span>{{ $plan->start_at }}</span></li>
                                <li><i class="fa fa-calendar" aria-hidden="true"></i>{{ trans('site.to') }}:  <span>{{ $plan->end_at }}</span></li>
                                <li>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    {{ trans('site.guests') }}:  
                                    <span class="number-adult">1</span>
                                    {{ trans('site.adults') }},
                                    <span class="number-child">0</span> {{ trans('site.child') }}
                                </li>
                            </ul>
                            <div class="priceTotal">
                                <h2>
                                {{ trans('site.total') }}: 
                                <span class="Total">
                                    $ {{ $sumSchedule }}
                                </span>
                                </h2>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
            <div class="col-sm-8 col-sm-pull-4 col-xs-12">
                <form action="{{ route('user.plan.bookingstore', $plan->id) }}" method="post" enctype="multipart/form-data" role="form"  plan-id="{{ $plan->id }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="total_amount" class="total_amount" value="{{ $sumSchedule }}">
                    <br>
                    <div class="infoTitle">
                        <h2 class="title-booking">{{ trans('site.per_info') }}</h2>
                    </div>
                    <div class="bookingForm guest-customer">
                        <div class="row">
                            <div class="form-group col-sm-12 col-xs-12">
                                <label for="">{{ trans('site.full_name') }}</label>
                                <input type="text" class="form-control" name="full_name">
                                @if ($errors->has('full_name'))
                                    <span class="alert alert-danger help-block">{{ $errors->first('full_name') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="">{{ trans('site.email') }}</label>
                                <input type="text" class="form-control" name="email">
                                @if ($errors->has('email'))
                                    <span class="alert alert-danger help-block">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="">{{ trans('site.phone_contact') }}</label>
                                <input type="text" class="form-control" name="phone">
                                @if ($errors->has('phone'))
                                    <span class="alert alert-danger help-block">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-sm-12 col-xs-12">
                                <label for="">{{ trans('country') }}</label>
                                <select class="form-control" name="country">
                                    <option value="1">{{ trans('site.viet_nam') }}</option>
                                    <option value="2">{{ trans('site.over_viet_nam') }}</option>
                                    <option value="3">{{ trans('site.foreign') }}</option>
                                </select>
                            </div> 
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="">{{ trans('site.adults') }}</label>
                                <input type="number" name="adult" class="form-control" min="1" id="number-adult" value="1" data-price="{{ $sumSchedule }}">
                            </div> 
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="">{{ trans('site.child') }}</label>
                                <input type="number" name="child" class="form-control" min="0" id="number-child" value="0">
                            </div>
                            <div class="form-group col-sm-4 col-xs-12">
                                <label for="">{{ trans('site.total') }}</label>
                                <input type="text" name="total_num" class="form-control"  id="total-number" value="1" readonly="true">
                            </div>
                        </div>
                    </div>
                    <br>
                    <p class="note"> {{ trans('site.note') }}: </p>
                    <span class="guest-note">{{ trans('site.adults') }}:</span>
                    <span> 08/12/1947 - 08/12/2005</span>   
                    <span class="guest-note">{{ trans('site.child') }}:</span>
                    <span> 09/12/2005 - 08/12/2017</span>
                    <hr>
                    <div class="infoTitle">
                        <h2 class="title-booking">{{ trans('site.guest_info') }}</h2>
                    </div>
                    <div class="guest-customer">
                        <div class="customer-title"> {{ trans('site.cus_adult') }} </div>
                        <div class="row">
                            <div class="form-group col-sm-12 col-xs-12">
                                <label for="">{{ trans('site.full_name') }}</label>
                                <input type="text" class="form-control" name="full_name_guest">
                                @if ($errors->has('full_name_guest'))
                                    <span class="alert alert-danger help-block">{{ $errors->first('full_name_guest[]') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="">{{ trans('site.gender') }}</label>
                                <select name="gender[]" class="form-control">
                                    <option value="0">{{ trans('site.male') }}</option>
                                    <option value="1">{{ trans('site.female') }}</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="">{{ trans('site.address') }}</label>
                                <input type="text" class="form-control" name="address[]">
                                @if ($errors->has('address'))
                                    <span class="alert alert-danger help-block">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="">{{ trans('site.country') }}</label>
                                <select class="form-control" name="country_guest[]">
                                    <option value="1">{{ trans('site.viet_nam') }}</option>
                                    <option value="2">{{ trans('site.over_viet_nam') }}</option>
                                    <option value="3">{{ trans('site.foreign') }}</option>
                                </select>
                            </div> 
                            <div class="form-group col-sm-6 col-xs-12">
                                <label for="">{{ trans('guest') }}</label>
                                <select name="guest[]" class="form-control">
                                    <option value="0">{{ trans('site.adult') }}</option>
                                </select>
                            </div>               
                        </div>
                    </div>
                    <div id="guest-adult">
                    </div>
                    <div id="guest-child">
                    </div>
                    <div class="checkbox col-xs-12">
                        <label>
                            <input type="checkbox" onchange="document.getElementById('btnt').disabled = !this.checked"/>{{ trans('site.agree_f') }} 
                            <a href="#">{{ trans('site.term_condition') }}</a>
                        </label>
                    </div>
                    <div class="col-xs-12">
                        <div class="buttonArea galleryBtnArea">
                            <ul class="list-inline">
                                <li><a href="#" class="btn buttonTransparent">{{ trans('site.back') }}</a></li>
                                <li class="pull-right"><button type="submit" class="btn buttonTransparent" id="btnt" disabled>{{ trans('site.next') }}</button></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
    {{ Html::script('js/booking.js') }}  
@endsection 
