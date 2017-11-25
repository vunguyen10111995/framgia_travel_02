@extends('admin.master')

@section('title')
    {{ trans('admin.schedule') }}
@endsection

@section('content')
    <div class="container">
        <div class="centeredDiv">
            <h3> {{ trans('admin.your_plans') }} </h3>
            <form action="" method="POST">
                <div class="form-group">
                    <label>{{ trans('admin.name') }}</label> &nbsp;
                    <i class="fa fa-commenting-o"></i>
                    <input class="form-control" name="title" required="" autocomplete="off" value="{{ $plan->title }}">
                </div>
                <div class="form-group">
                    <label>{{ trans('admin.guides') }}</label> &nbsp;
                    <i class="fa fa-commenting-o"></i>
                    <input class="form-control" name="title" required="" autocomplete="off" value="{{ $plan->user->full_name }}">
                </div>
                <div class="form-group">
                    <label>{{ trans('admin.schedule') }}</label> &nbsp;
                    @foreach($plan->schedules as $c)
                    <p>{{ $loop->iteration }}</p>
                    <label>{{ trans('admin.service') }}</label>
                    <input type="text" name="" value="{{ $c->service->name }}" class="form-control">
                    <label>{{ trans('admin.start_at') }}</label>
                    <input type="datetime" name="" value="{{ $c->start_at }}">
                    <label>{{ trans('admin.end_at') }}</label>
                    <input type="datetime" name="" value="{{ $c->end_at }}">
                    <label>{{ trans('admin.number_of_day') }}</label>
                    <input type="text" name="" value="{{ $c->date }}">
                    <label>{{ trans('admin.title') }}</label>
                    <input type="text" name="" value="{{ $c->title }}">
                    <label>{{ trans('admin.price') }}</label>
                    <input type="text" name="" value="{{ $c->price }} $">
                    <label>{{ trans('admin.description') }}</label>
                    <input type="text" name="" value="{{ $c->description }}">
                    <br>
                    @endforeach
                </div>
            </form>
        </div>
    </div>
@endsection
