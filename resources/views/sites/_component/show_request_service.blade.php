<h3>{{ trans('site.you_have') }} {{ count($request_services) }} {{ trans('admin.request_services') }}</h3>
@foreach($request_services as $request_service)
    @if(count($request_services))
        <a href="{{ route('show.detail.request.service', $request_service->id) }}" class="view-request-service">
            <div class="tile">
                <h1 class="del-plan">
                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                </h1>
                <img src="{{ asset('images/avatar.png') }}">
                <div class="text">
                    <h3 class="animate-text">
                        {{ trans('admin.request_services') }} {{ $loop->iteration }}
                    </h3>
                    <h3 class="animate-text">
                        <p>{{ $request_service->name }}</p>
                    </h3>
                </div>
                <div class="create-request-service">{{ trans('admin.view_request_service') }}</div>
            </div>
        </a>
    @endif
@endforeach
