<div class="row">
    <div class="col-md-12">
        <h5>
            <b>{{ trans('site.title') }}</b> 
            <i class="fa fa-commenting-o"></i>
        </h5>
        <textarea class="form-control" name="title_schedule[]" required></textarea>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <h5>
            <b>{{ trans('site.day') }}</b> 
            <i class="fa fa-calendar"></i>
        </h5>
        <input type="text" name="date[]" class="form-control" required>
    </div>
    <div class='col-md-3'>
        <h5>
            <b>{{ trans('site.from') }}</b> 
            <i class="fa fa-clock-o" aria-hidden="true"></i>
        </h5>
        <input type="text" name="sta[]"  class="form-control timepicker" required>
    </div>
    <div class="col-md-3">
        <h5>
            <b>{{ trans('site.to') }}</b> 
            <i class="fa fa-clock-o" aria-hidden="true"></i>
        </h5>
        <input type="text" name="end[]" class="form-control timepicker" required>
    </div>
</div>
<div class="row filter">
    <div class="col-md-3">
        <h5>
            <b>{{ trans('site.province') }}</b> 
            <i class="fa fa-location-arrow"></i>
        </h5>   
        <select name="province[]" id="province" class="form-control province">
            <option selected>{{ trans('site.select') }}</option>
        </select>
    </div>
    <div class="col-md-3">
        <h5>
            <b>{{ trans('site.category') }}</b> 
            <i class="fa fa-location-arrow"></i>
        </h5>
        <select name="category[]" id="category" class="form-control category">
            <option selected">{{ trans('site.select') }}</option>
            @foreach($categories as $category){
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <h5>
            <b>{{ trans('site.service') }}</b> 
            <i class="fa fa-location-arrow"></i>
            <a target="_blank" href=""></a>
        </h5>
        <select name="service[]" id="service" class="form-control service" required>
            <option selected>{{ trans('site.select') }}</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h5>
            <b>{{ trans('site.description') }}</b> 
            <i class="fa fa-pencil" aria-hidden="true"></i>
        </h5>
        <textarea class="form-control" name="des[]" required></textarea>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h5>
            <b>{{ trans('site.expected_price') }}</b>
            <i class="fa fa-usd"></i>
        </h5>
        <textarea class="form-control" rows="1" name="price[]"  autocomplete="off" placeholder="{{ trans('site.expected_price') }}" required></textarea>
    </div>
</div>
<hr>
{{ Html::script('js/dashboard.js') }} 
