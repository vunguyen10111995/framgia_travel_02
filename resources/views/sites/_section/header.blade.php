{{ Html::style('css/header.css') }}
<header>
    <nav class="navbar navbar-default navbar-main navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"></a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown singleDrop active ">
                        <a href="index.html">{{ trans('site.home') }}</a>
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
                            <a href="#"><img src="img/home/register.png" class="img-register" title="{{ trans('site.register') }}"></a>
                        </li>
                        <li class="dropdown singleDrop ">
                            <a href="#"><img src="img/home/login.ico" class="img-login" title="{{ trans('site.login') }}"></a>
                        </li>
                    @else    
                        <li class="dropdown singleDrop ">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('site.admin') }}</a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class=""><a href="#">{{ trans('site.dashboard') }}</a></li>
                                <li class=""><a href="#">{{ trans('site.profile') }}</a></li>
                                <li class=""><a href="#">{{ trans('site.add_plan') }}</a></li>
                                <li class=""><a href="#">{{ trans('site.request_services') }}</a></li>
                                <li class=""><a href="#">{{ trans('site.booking') }}</a></li>
                                <li class=""><a href="#">{{ trans('site.logout') }}</a></li>
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
@section('script')
    {{ Html::script('js/search-ajax.js') }}
@endsection
