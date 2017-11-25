{{ Html::style('css/header.css') }}
<header>
    <nav class="navbar navbar-default navbar-main navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('home') }}"></a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown singleDrop active ">
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
                        <li class="dropdown singleDrop ">
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
            <input type="text" name="search" id="search_text" class="form-control" placeholder="{{ trans('site.keyword_search') }}..."> 
            <div id="search-result">  
            </div> 
        </div>
    </nav>
</header>
<!-- Register Modal -->
<div class="modal fade signupLoging" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content modalContentCustom">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ trans('create_account') }}</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" class="form-control bg-ash" name="full_name" id="exampleInputEmail1" placeholder="{{ trans('site.full_name') }}">
                        @if($errors->has('full_name'))
                            <span class="help-block">{{ $errors->first('full_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control bg-ash" name="email" id="exampleInputPassword1" placeholder="{{ trans('email') }}">
                        @if($errors->has('email'))
                            <span class="help-block">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control bg-ash" name="password" id="exampleInputPassword1" placeholder="{{ trans('site.password_register') }}">
                        @if($errors->has('password'))
                            <span class="help-block">{{ $errors->first('password') }}</span>
                        @endif
                    </div> 
                    <div class="form-group">
                       <input type="password" class="form-control bg-ash" name="password_confirm" placeholder="{{ trans('site.password_confirm') }}">
                       @if($errors->has('password_confirm'))
                            <span class="help-block">{{ $errors->first('password_confirm') }}</span>
                        @endif
                    </div>
                    <select class="form-control" name="gender">
                        <option value="0">{{ trans('male') }}</option>
                        <option value="1">{{ trans('female') }}</option>
                    </select>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" required> {{ trans('site.agree_register') }}
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">{{ trans('site.register') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Login Modal -->
<div class="modal fade signupLoging" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content modalContentCustom">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ trans('site.login_account') }}</h4>
            </div>
            <div class="modal-body">
                <form method="get" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="email" name="email" class="form-control bg-ash" id="exampleInputPassword1" placeholder="{{ trans('site.email') }}" >
                        @if($errors->has('email'))
                            <span class="help-block">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control bg-ash" id="exampleInputPassword1" placeholder="{{ trans('site.password') }}" >
                        @if($errors->has('password'))
                            <span class="help-block">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="checkbox">
                        <label>
                        <input type="checkbox"> {{ trans('site.remember_me') }}
                        </label>
                        <a class="forgotPass clerfix" href="#">{{ trans('site.forgot_password') }}</a>
                    </div>
                    <button type="submit" class="btn btn-default">{{ trans('site.login') }}</button>
                </form>  
            </div>
            <div class="modal-footer">
                <div class="dontHaveAccount">
                    <p>{{ trans('site.notpass') }}<a href="" data-toggle="modal" id="register" data-target="#register">{{ trans('site.register') }}</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
    {{ Html::script('js/search-ajax.js') }}
@endsection
