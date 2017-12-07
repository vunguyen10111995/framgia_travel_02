@extends('sites.master')

@section('content')

<section class="bannercontainer">
    <div class="fullscreenbanner-container">
        <div class="fullscreenbanner">
           <ul>
                <li data-transition="parallaxvertical" data-slotamount="5" data-masterspeed="700" data-title="Slide 1">
                    <img src="{{ asset('images/img_sites/home/slider/slider-01.jpg') }}" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                </li>
                <li data-transition="parallaxvertical" data-slotamount="5" data-masterspeed="1000" data-title="Slide 2">
                    <img src="{{ asset('images/img_sites/home/slider/slider-02.jpg') }}" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                </li>
                <li data-transition="parallaxvertical" data-slotamount="5" data-masterspeed="700" data-title="Slide 1">
                    <img src="{{ asset('images/img_sites//home/slider/slider-03.jpg') }}" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                </li>
                <li data-transition="parallaxvertical" data-slotamount="5" data-masterspeed="1000" data-title="Slide 2">
                    <img src="{{ asset('images/img_sites/home/slider/slider-04.jpg') }}" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- SEARCH TOUR -->
<section class="darkSection">
    <div class="container">
        <div class="row gridResize">
            <div class="col-sm-3 col-xs-12">
                <div class="sectionTitleDouble">
                    <p>{{ trans('site.search') }}</p>
                    <h2>{{ trans('site.your_plans') }}</span></h2>
                </div>
            </div>
            <div class="col-sm-7 col-xs-12">
                <div class="row">
                    <div class="col-sm-3 col-xs-12">
                        <div class="searchTour">
                            <select name="guiest_id2" id="guiest_id2" class="select-drop">
                                <option value="0">{{ trans('site.destinations') }}</option>
                                @foreach($provinces as $province)
                                    <option>{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="input-group date ed-datepicker" data-provide="datepicker">
                            <input type="text" class="form-control" placeholder="MM/DD/YYYY">
                            <div class="input-group-addon">
                                <span class="fa fa-calendar"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="input-group date ed-datepicker" data-provide="datepicker">
                            <input type="text" class="form-control" placeholder="MM/DD/YYYY">
                            <div class="input-group-addon">
                                <span class="fa fa-calendar"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="searchTour">
                            <select name="guiest_id3" id="guiest_id3" class="select-drop">
                                <option value="0">$1000 - $2000</option>
                                <option value="1">$1400 - $2000</option>
                                <option value="2">$1600 - $2000</option>
                                <option value="3">$1800 - $2000</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 col-xs-12">
                <a href="#" class="btn btn-block buttonCustomPrimary">{{ trans('site.search') }}</a>
            </div>
        </div>
    </div>
</section>
<section class="whiteSection">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="sectionTitle">
                    <h2><span>{{ trans('site.provinces') }}</span></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="filter-container isotopeFilters">
                    <ul class="list-inline filter">
                        <li class="active"><a href="#" data-filter="*">{{ trans('site.all_places') }}</a></li>
                        <li><a href="#" data-filter=".asia">{{ trans('site.viet_nam') }}</a></li>
                        <li><a href="#" data-filter=".america">{{ trans('site.over_viet_nam') }}</a></li>
                        <li><a href="#" data-filter=".africa">{{ trans('site.foreign') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row isotopeContainer">
            @foreach($provinces as $province) 
                <div class="col-sm-4 isotopeSelector asia">
                    <article class="">
                        <figure>
                            <img src="{{ $province->image }}" alt="" height="300px">
                            <h4>{{ $province->name }}</h4>
                            <div class="overlay-background">
                                <div class="inner"></div>
                            </div>
                            <div class="overlay">
                                <a class="fancybox-pop" href="{{ route('province.detail', $province->id) }}">
                                    <div class="overlayInfo">
                                        <h5><span></span></h5>
                                        <p><i class="fa fa-calendar" aria-hidden="true"></i>{{ substr($province->description, 0, 20) }}...</p>
                                    </div>
                                </a>
                            </div>
                        </figure>
                    </article>
                </div>
            @endforeach
        </div>
        <div class="row">{{ $provinces->links() }}</div>
    </div>
</section>
@endsection
