@extends('admin.master')

@section('title')
    {{ trans('admin.profile') }}
@endsection

@section('script')
    {!! Html::script('js/manage_plan.js') !!}
@endsection

@section('content')
    <div class="max">
        <div id="tabs-container">
            <ul class="tabs-menu">
                <li class="current">
                    <a href="#tab-1">{{ trans('admin.plan') }}</a>
                </li>
                <li>
                    <a href="#tab-2">{{ trans('admin.profile') }}</a>
                </li>
                <li>
                    <a href="#tab-3">{{ trans('admin.gallery') }}</a>
                </li>
                <li>
                    <a href="#tab-4">{{ trans('admin.request_services') }}</a>
                </li>
            </ul>
            <div class="tab">
                <div id="tab-1" class="tab-content">
                    <h2>{{ trans('admin.your_plans') }}</h2>
                    <div class="row content-3">
                        @foreach($admin->plans as $plan)
                            <div class="col-md-6 card-deck">
                                <div class="card">
                                    <a href="{{ route('admin.plan.edit', $plan->id) }}"><img class="card-img-top" src="{{ asset('images/avatar.png') }}"></a>
                                    <div class="card-block" style="text-align: center">
                                        <h4 class="card-title">{{ trans('admin.plan') }} {{ $plan->id }}</h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div id="tab-2" class="tab-content">
                    <p></p>
                </div>
                <div id="tab-3" class="tab-content">
                    <p></p>
                </div>
                <div id="tab-4" class="tab-content">
                    <p></p>
                </div>
            </div>
        </div>
    </div>
@endsection
