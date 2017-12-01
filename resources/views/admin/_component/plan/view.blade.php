@extends('admin.master')

@section('style')
    {{ Html::style('css/admin_plan.css') }}
    {{ Html::style('bowers/select2/dist/css/select2.min.css') }}
    {{ Html::style('/bowers/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}
   
@endsection

@section('content')
<div class="page-wrap">
    <div class="container content-request">
        <div class="w3agile-about-section-head text-center">
            <h2>{{ trans('site.schedule') }}</h2>
            <span></span>
            <hr>
        </div>
        <div class="centeredDiv">
            <div class="form-group">
                <label>{{ trans('site.visit_province') }}</label>
                <i class="fa fa-location-arrow"></i>
                @php
                    $choiceSArr = [];
                    foreach($choices as $choice) {
                        $choiceSArr[] = $choice['province_id'];
                    }
                @endphp
                <select name="proChoice[]" class="form-control select2" id="mySelectBox" multiple required disabled="">
                    @foreach($provinces as $province)
                        <option value="{{ $province->id }}"{{ in_array($province->id, $choiceSArr) ? 'selected' : '' }}> 
                            {{ $province->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>{{ trans('site.from') }}</label>
                    <i class="fa fa-calendar"></i>
                    <input type='text' name="start_at" class="form-control datepicker"  value="{{ $plan->start_at }}"/ disabled="">
                </div>
                <div class="form-group col-md-6">
                    <label>{{ trans('site.to') }}</label>
                            <i class="fa fa-calendar"></i>
                    <input type="text" name="end_at" class="form-control datepicker" value="{{ $plan->end_at }}" disabled="">
                </div>
            </div>
            <div>
                <h5><b>{{ trans('site.description') }}</b> <i class="fa fa-pencil" aria-hidden="true"></i>
                </h5>
                <textarea class="form-control" name="description" disabled="">{{ $plan->description }}</textarea>
            </div>
            <br>
            <div>
                <h5><b>{{ trans('site.description') }}</b> <i class="fa fa-pencil" aria-hidden="true"></i>
                </h5>
                <textarea class="form-control" name="description" disabled="">{{ $plan->description }}</textarea>
            </div>
            <div>
                <h5><b>{{ trans('site.description') }}</b> <i class="fa fa-pencil" aria-hidden="true"></i>
                </h5>
                <textarea class="form-control" name="price" disabled="">{{ $plan->price }}</textarea>
            </div>
            <div class="row">
                <div class="form-group col-md-12 service">
                    <label>{{ trans('site.number_ser') }}</label>
                    <i class="fa fa-calendar"></i>
                    <input name="number_services" type="text" id="number-services" class="form-control" min="0" value="{{ count($plan->schedules) }}" disabled="">
                </div>
            </div>
            <div class="form-group">
                <span>
                    <b>{{ trans('site.schedule') }}</b>
                </span>
                <div class="schedules">
                    <div id="expand">
                        @foreach($plan->schedules as $plan_schedule)
                        	<p class="number-services">{{ $loop->iteration }}</p>
                        	<div class="row">
                            	<div class="col-md-12">
                                    <h5>
                                        <b>{{ trans('site.title') }}</b> 
                                        <i class="fa fa-commenting-o"></i>
                                    </h5>
                                    <textarea class="form-control" name="title_schedule[]" required="" disabled="">{{ $plan_schedule->title }}</textarea>
                                </div>
                        	</div>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>
                                        <b>{{ trans('admin.number_of_day') }}</b> 
                                        <i class="fa fa-calendar"></i>
                                    </h5>
                                    <input type="text" name="date[]" class="form-control" required="" value="{{ $plan_schedule->date }}" disabled="">
                                </div>
                                <div class="col-md-3">
                                    <h5>
                                        <b>{{ trans('site.start_at') }}</b> 
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    </h5>
                                    <input type="text" name="sta[]" class="form-control timepicker" required="" value="{{ $plan_schedule->start_at }}" disabled="">
                                </div>
                                <div class="col-md-3">
                                    <h5>
                                        <b>{{ trans('site.end_at') }}</b> 
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    </h5>
                                    <input type="text" name="end[]" class="form-control timepicker" required="" value="{{ $plan_schedule->end_at }}" disabled="">
                                </div>
                            </div>
                            <div class="row filter">
                                <div class="col-md-3">
                                    <h5>
                                        <b>{{ trans('site.province') }}</b> 
                                        <i class="fa fa-location-arrow"></i>
                                        <input type="text" name="province" value="{{ $plan_schedule->service->province->name }}" class="form-control" disabled="">
                                    </h5>
                                </div>
                                <div class="col-md-3">
                                    <h5>
                                        <b>{{ trans('admin.categories') }}</b> 
                                        <i class="fa fa-location-arrow"></i>
                                    </h5>
                                    <input type="text" name="category" value="{{ $plan_schedule->service->category->name }}" class="form-control" disabled="">
                                </div>
                                <div class="col-md-6">
                                    <h5>
                                        <b>{{ trans('admin.service') }}</b> 
                                        <i class="fa fa-location-arrow"></i>
                                    </h5>
                                    <input type="text" name="service" class="form-control" value="{{ $plan_schedule->service->name }}" disabled="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>
                                        <b>{{ trans('admin.description') }}</b> 
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </h5>
                                    <textarea class="form-control" name="des[]" required="" disabled="">{{ $plan_schedule->description }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>
                                        <b>{{ trans('site.price') }}</b>
                                        <i class="fa fa-usd"></i>
                                    </h5>
                                    <textarea class="form-control" rows="1" name="price[]" autocomplete="off" placeholder="Expected Price" required="" disabled="">{{ $plan_schedule->price }}</textarea>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 25px">
                                <div class="col-md-6">
                                    <h5>
                                        <b>{{ trans('site.status') }}</b>
                                    </h5>
                                    <input type="text" name="status" value="{{ ($plan->status == config('setting.status.inprogress')) ? trans('admin.inprogress') 
                                        : trans('admin.approved')  }}" class="form-control">
                                </div>
                            </div>
                        @endforeach
                	</div>
            	</div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    {{ Html::script('bowers/select2/dist/js/select2.full.min.js') }}
    {{ Html::script('/bowers/moment/min/moment.min.js') }}
    {{ Html::script('/bowers/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}
    {{ Html::script('js/list_fork.js') }}  
@endsection
