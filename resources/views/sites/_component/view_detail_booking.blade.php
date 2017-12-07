<h3>{{ $booking->plan->title }} <span id="detail_status">{{ trans('site.status') }} : {{ ($booking->status == config('setting.status.inprogress')) ? trans('admin.inprogress') : trans('admin.approved') }}</span></h3>
<div class="form-group">
    {!! Form::label('name_customer', trans('site.name_customer')) !!}
    {!! Form::text('full_name', $booking->full_name, array('class' => 'form-control')) !!}
    {!! Form::label('email', trans('site.email')) !!}
    {!! Form::text('email', $booking->email, array('class' => 'form-control')) !!}
    {!! Form::label('country', trans('site.country')) !!}
    {!! Form::text('country', $booking->country == config('setting.vietnam') ? trans('site.viet_nam') : ($booking->country == config('setting.foreign') ? trans('site.foreign') : trans('site.over_viet_nam')), array('class' => 'form-control')) !!}
    {!! Form::label('start_at', trans('site.start_at')) !!}
    {!! Form::text('start_at', $booking->plan->start_at, array('class' => 'form-control')) !!}
    {!! Form::label('end_at', trans('site.end_at')) !!}
    {!! Form::text('end_at', $booking->plan->end_at, array('class' => 'form-control')) !!}
    {!! Form::label('adult', trans('site.adult')) !!}
    {!! Form::text('adult', $booking->adult, array('class' => 'form-control')) !!}
    {!! Form::label('child', trans('site.child')) !!}
    {!! Form::text('child', $booking->child, array('class' => 'form-control')) !!}
    {!! Form::label('total_price', trans('site.total_price')) !!}
    {!! Form::text('total_price', $booking->total_amount, array('class' => 'form-control')) !!}
</div>
<h3>
    {!! Form::label('detail', trans('site.details')) !!}
</h3>
@foreach($booking->customers as $customer)
    <h4>{{ $loop->iteration }}</h4>
        <div class="guest-customer">
            <div class="row">
                <div class="form-group col-sm-12 col-xs-12">
                    {!! Form::label('full_name', trans('site.full_name')) !!}
                    {!! Form::text('full_name', $customer->full_name, array('class' => 'form-control')) !!}
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    {!! Form::label('gender', trans('site.gender')) !!}
                    {!! Form::text('gender', ($customer->gender == config('setting.gender.male')) ? trans('admin.male') : trans('admin.female'), array('class' => 'form-control')) !!}
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    {!! Form::label('address', trans('site.address')) !!}
                    {!! Form::text('address[]', $customer->address, array('class' => 'form-control')) !!}
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    {!! Form::label('country', trans('site.country')) !!}
                    {!! Form::text('country_guest[]', $booking->country == config('setting.vietnam') ? trans('site.viet_nam') : ($booking->country == config('setting.oversea') ? trans('site.over_viet_nam') : trans('site.foreign')), array('class' => 'form-control')) !!}
                </div> 
                <div class="form-group col-sm-6 col-xs-12">
                    {!! Form::label('guest', trans('site.guest')) !!}
                    {!! Form::text('guest', ($booking->guest == config('setting.guest')) ? trans('site.guest') : trans('site.adult'), array('class' => 'form-control')) !!}
                </div>               
            </div>
        </div>
@endforeach
