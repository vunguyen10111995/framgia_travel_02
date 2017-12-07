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
<section class="whiteSection">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="sectionTitle">
                    <h2><span>{{ trans('site.hotels') }}</span></h2>
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
            @foreach($categories->services as $hotel) 
                <div class="col-sm-4 isotopeSelector asia">
                    <article class="">
                        <figure>
                            <img src="{{ $hotel->image }}" alt="" height="300px">
                            <h4>{{ $hotel->name }}</h4>
                            <div class="overlay-background">
                                <div class="inner"></div>
                            </div>
                            <div class="overlay">
                                <a class="fancybox-pop" href="{{ route('hotel.detail', $hotel->id) }}">
                                    <div class="overlayInfo">
                                        <h5><span>{{ $hotel->price }}</span></h5>
                                        <p><i class="fa fa-calendar" aria-hidden="true"></i>{{ substr($hotel->description, 0, 20) }}...</p>
                                    </div>
                                </a>
                            </div>
                        </figure>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
