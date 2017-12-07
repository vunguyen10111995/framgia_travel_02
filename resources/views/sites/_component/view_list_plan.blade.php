<h3>{{ trans('site.you_have') }} {{ count($plans) }} {{ trans('admin.plans') }}</h3>
@foreach($plans as $plan)
    @if(count($plans))
        <a href="" class="content-plan">
            <h5 class="title-plan">{{ $plan->title }}</h5>
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
        <div>
            <span class="title-plan">{{ trans('site.fork') }}</span>
            <a class="fa fa-eye" aria-hidden="true" id="view_fork" data-toggle="modal" data-target="#view_list_fork" data-id="{{ $plan->id }}"> &nbsp;  {{ count($plan->forks) }}
            </a>
            <h5 class="title-plan">{{ trans('site.status') }} &nbsp; <span>{{ ($plan->status == config('setting.status.inprogress')) ? trans('admin.inprogress') : trans('admin.approved') }}</span></h5>
            <span class="title-plan">{{ trans('site.booking') }}</span>
            <a class="fa fa-eye" aria-hidden="true" id="view_booking" data-toggle="modal" data-target="#view_list_booking" data-id="{{ $plan->id }}"> &nbsp;  {{ count($plan->bookings) }}
            </a>
        </div>
    @endif
@endforeach
