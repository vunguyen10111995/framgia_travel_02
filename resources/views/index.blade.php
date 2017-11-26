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
<!-- TOP DEALS -->
<section class="mainContentSection packagesSection">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="sectionTitle">
                    <h2><span class="lightBg">{{ trans('site.new_plans') }}</span></h2>
                </div>
            </div>
        </div>
            @foreach($plans as $plan)
                <div class="col-sm-4 col-xs-12">
                    <div class="thumbnail deals">
                        <img src="images/img_sites/home/deal/deal-01.jpg" alt="deal-image">
                        <a href="single-package-right-sidebar.html" class="pageLink"></a>
                        <div class="discountInfo">
                            <div class="discountOffer">
                                <h4>
                                    50% <span>OFF</span>
                                </h4>
                            </div>
                            <ul class="list-inline rating homePage">
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            </ul>
                        </div>
                        <div class="caption">
                            <h4><a href="single-package-right-sidebar.html" class="captionTitle">{{ $plan->title }}</a></h4>
                            <p>{{ $plan->descriptions }}</p>
                            <div class="detailsInfo">
                                <h5>
                                    <span>{{ trans('site.start_from') }}</span>
                                    ${{ $plan->price }}
                                </h5>
                                <ul class="list-inline detailsBtn">
                                    <li><a href="{{ route('user.plan.detail', $plan->id) }}" class="btn buttonTransparent">{{ trans('site.details') }}</a></li>
                                    <li><a href='booking-1.html' class="btn buttonTransparent">{{ trans('site.book_now') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        <div class="row">
            <div class="col-xs-12">
                <div class="btnArea">
                    <a href="packages-grid.html" class="btn buttonTransparent">{{ trans('site.view_all') }}</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- PROMOTION PARALLAX -->
<section class="promotionWrapper">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="promotionTable">
                    <div class="promotionTableInner">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- DESTINATIONS -->
<section class="whiteSection">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="sectionTitle">
                    <h2><span>{{ trans('site.our_destinations') }}</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="media destinations">
                    <a class="media-left" href="destination-cities.html">
                    <img class="media-object" src="images/img_sites/home/destination.jpg" alt="Destination">
                    </a>
                    <div class="media-body">
                        <h3 class="media-heading">{{ trans('site.choose') }}<br>{{ trans('site.your_destinations') }}</h3>
                        <div class="clearfix">
                            <ul class="list-unstyled">
                                <li><i class="fa fa-minus" aria-hidden="true"></i>Asia</li>
                                <li><a href="destination-single-city.html"><i class="fa fa-square" aria-hidden="true"></i>Aenean</a></li>
                                <li><a href="destination-single-city.html"><i class="fa fa-square" aria-hidden="true"></i>Etiam</a></li>
                                <li><a href="destination-single-city.html"><i class="fa fa-square" aria-hidden="true"></i>Donec</a></li>
                            </ul>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-minus" aria-hidden="true"></i>Europe</li>
                                <li><a href="destination-single-city.html"><i class="fa fa-square" aria-hidden="true"></i>Maecenas</a></li>
                                <li><a href="destination-single-city.html"><i class="fa fa-square" aria-hidden="true"></i>Cras Sagittis</a></li>
                                <li><a href="destination-single-city.html"><i class="fa fa-square" aria-hidden="true"></i>Vestibulum</a></li>
                            </ul>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-minus" aria-hidden="true"></i>America</li>
                                <li><a href="destination-single-city.html"><i class="fa fa-square" aria-hidden="true"></i>Morbi Sed</a></li>
                                <li><a href="destination-single-city.html"><i class="fa fa-square" aria-hidden="true"></i>Pellentesque</a></li>
                                <li><a href="destination-single-city.html"><i class="fa fa-square" aria-hidden="true"></i>Proin</a></li>
                            </ul>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-minus" aria-hidden="true"></i>Africa</li>
                                <li><a href="destination-single-city.html"><i class="fa fa-square" aria-hidden="true"></i>Duis Eu</a></li>
                                <li><a href="destination-single-city.html"><i class="fa fa-square" aria-hidden="true"></i>Morbi Nisl</a></li>
                                <li><a href="destination-single-city.html"><i class="fa fa-square" aria-hidden="true"></i>Curabitur</a></li>
                            </ul>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-minus" aria-hidden="true"></i>Australia</li>
                                <li><a href="destination-single-city.html"><i class="fa fa-square" aria-hidden="true"></i>Vivamus</a></li>
                                <li><a href="destination-single-city.html"><i class="fa fa-square" aria-hidden="true"></i>Nibh Odio</a></li>
                                <li><a href="destination-single-city.html"><i class="fa fa-square" aria-hidden="true"></i>Dictum</a></li>
                            </ul>
                        </div>
                        <div class="media-btn">
                            <a href="destination-cities.html" class="btn buttonTransparent">{{ trans('site.view_all') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- COUNTING PARALLAX -->
<section class="countUpSection">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-xs-6">
                <div class="text-center">
                    <div class="icon">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </div>
                    <div class="counter">179</div>
                    <h5>{{ trans('site.destinations') }}</h5>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="text-center">
                    <div class="icon">
                        <i class="fa fa-gift" aria-hidden="true"></i>
                    </div>
                    <div class="counter">48</div>
                    <h5>{{ trans('site.plan_pack') }}</h5>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="text-center">
                    <div class="icon">
                        <i class="fa fa-smile-o" aria-hidden="true"></i>
                    </div>
                    <div class="counter">4562</div>
                    <h5>{{ trans('site.happy_clients') }}</h5>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="text-center">
                    <div class="icon">
                        <i class="fa fa-life-ring" aria-hidden="true"></i>
                    </div>
                    <div class="counter">24</div>
                    <h5>{{ trans('site.hours_support') }}</h5>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- TOUR PACKAGES -->
<section class="whiteSection">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="sectionTitle">
                    <h2><span>{{ trans('site.our_packages') }}</span></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="filter-container isotopeFilters">
                    <ul class="list-inline filter">
                        <li class="active"><a href="#" data-filter="*">{{ trans('site.all_places') }}</a></li>
                        <li><a href="#" data-filter=".asia">Asia</a></li>
                        <li><a href="#" data-filter=".america">America</a></li>
                        <li><a href="#" data-filter=".africa">Africa</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row isotopeContainer">
            <div class="col-sm-4 isotopeSelector asia">
                <article class="">
                    <figure>
                        <img src="images/img_sites/home/packages/packages-1.jpg" alt="">
                        <h4>Vestibulum Tour</h4>
                        <div class="overlay-background">
                            <div class="inner"></div>
                        </div>
                        <div class="overlay">
                            <a class="fancybox-pop" href="single-package-fullwidth.html">
                                <div class="overlayInfo">
                                    <h5>{{ trans('site.start_from') }}<span>$399</span></h5>
                                    <p><i class="fa fa-calendar" aria-hidden="true"></i>27 Jan, 2017</p>
                                </div>
                            </a>
                        </div>
                    </figure>
                </article>
            </div>
            <div class="col-sm-4 isotopeSelector america africa">
                <article class="">
                    <figure>
                        <img src="images/img_sites/home/packages/packages-2.jpg" alt="">
                        <h4>Maecenas Tour</h4>
                        <div class="overlay-background">
                            <div class="inner"></div>
                        </div>
                        <div class="overlay">
                            <a class="fancybox-pop" href="single-package-fullwidth.html">
                                <div class="overlayInfo">
                                    <h5>{{ trans('site.start_from') }}<span>$599</span></h5>
                                    <p><i class="fa fa-calendar" aria-hidden="true"></i>09 Feb, 2017</p>
                                </div>
                            </a>
                        </div>
                    </figure>
                </article>
            </div>
            <div class="col-sm-4 isotopeSelector africa">
                <article class="">
                    <figure>
                        <img src="images/img_sites/home/packages/packages-3.jpg" alt="">
                        <h4>Lobortis Tour</h4>
                        <div class="overlay-background">
                            <div class="inner"></div>
                        </div>
                        <div class="overlay">
                            <a class="fancybox-pop" href="single-package-fullwidth.html">
                                <div class="overlayInfo">
                                    <h5>{{ trans('site.start_from') }}<span>$299</span></h5>
                                    <p><i class="fa fa-calendar" aria-hidden="true"></i>14 Feb, 2017</p>
                                </div>
                            </a>
                        </div>
                    </figure>
                </article>
            </div>
            <div class="col-sm-4 isotopeSelector asia america">
                <article class="">
                    <figure>
                        <img src="images/img_sites/home/packages/packages-4.jpg" alt="">
                        <h4>Leo Lacus Tour</h4>
                        <div class="overlay-background">
                            <div class="inner"></div>
                        </div>
                        <div class="overlay">
                            <a class="fancybox-pop" href="single-package-fullwidth.html">
                                <div class="overlayInfo">
                                    <h5>{{ trans('site.start_from') }}<span>$399</span></h5>
                                    <p><i class="fa fa-calendar" aria-hidden="true"></i>11 Jan, 2017</p>
                                </div>
                            </a>
                        </div>
                    </figure>
                </article>
            </div>
            <div class="col-sm-4 isotopeSelector america">
                <article class="">
                    <figure>
                        <img src="images/img_sites/home/packages/packages-5.jpg" alt="">
                        <h4>Nullam Tour</h4>
                        <div class="overlay-background">
                            <div class="inner"></div>
                        </div>
                        <div class="overlay">
                            <a class="fancybox-pop" href="single-package-fullwidth.html">
                                <div class="overlayInfo">
                                    <h5>{{ trans('site.start_from') }}<span>$199</span></h5>
                                    <p><i class="fa fa-calendar" aria-hidden="true"></i>02 Feb, 2017</p>
                                </div>
                            </a>
                        </div>
                    </figure>
                </article>
            </div>
            <div class="col-sm-4 isotopeSelector africa asia">
                <article class="">
                    <figure>
                        <img src="images/img_sites/home/packages/packages-6.jpg" alt="">
                        <h4>Hendrerit Tour</h4>
                        <div class="overlay-background">
                            <div class="inner"></div>
                        </div>
                        <div class="overlay">
                            <a class="fancybox-pop" href="single-package-fullwidth.html">
                                <div class="overlayInfo">
                                    <h5>{{ trans('site.start_from') }}<span>$799</span></h5>
                                    <p><i class="fa fa-calendar" aria-hidden="true"></i>26 Feb, 2017</p>
                                </div>
                            </a>
                        </div>
                    </figure>
                </article>
            </div>
        </div>
    </div>
</section>
@endsection
