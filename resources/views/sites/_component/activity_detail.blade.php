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
                    <h2><span>{{ trans('site.details') }}</span></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 isotopeSelector asia">
                <article class="">
                    <figure>
                        <img src="{{ $activity->image }}" alt="" height="300px">
                        <h4>{{ $activity->name }}</h4>
                        <div class="overlay-background">
                            <div class="inner"></div>
                        </div>
                    </figure>
                </article>
            </div>
            <div class="col-sm-1">
                {!! Form::label('province', trans('site.province')) !!}
                {!! Form::text('description', $activity->province->name, ['class' => 'form-control']) !!}
                {!! Form::label('price', trans('site.price')) !!}
                {!! Form::text('price', $activity->price, ['class' => 'form-control']) !!}
                {!! Form::label('rate', trans('site.rate')) !!}
                {!! Form::text('rate', $activity->rate, ['class' => 'form-control']) !!}
            </div>
            <div class="col-sm-4">
                {!! Form::label('description', trans('site.description')) !!}
                <div class="form-group">
                    {!! Form::text('description', $activity->description, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
