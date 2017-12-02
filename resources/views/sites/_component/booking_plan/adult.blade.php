<div class="guest-customer">
    <div class="customer-title"> Customer Adult </div>
    <div class="row">
        <div class="form-group col-sm-12 col-xs-12">
            <label for="">{{ trans('site.full_name') }}</label>
            <input type="text" class="form-control" name="full_name_guest[]">
            @if ($errors->has('full_name_guest'))
                <span class="alert alert-danger help-block">{{ $errors->first('full_name_guest[]') }}</span>
            @endif
        </div>
        <div class="form-group col-sm-6 col-xs-12">
            <label for="">{{ trans('site.gender') }}</label>
            <select name="gender[]" class="form-control">
                <option value="0">{{ trans('site.male') }}</option>
                <option value="1">{{ trans('site.female') }}</option>
            </select>
        </div>
        <div class="form-group col-sm-6 col-xs-12">
            <label for="">{{ trans('site.address') }}</label>
            <input type="text" class="form-control" name="address[]">
            @if ($errors->has('address'))
                <span class="alert alert-danger help-block">{{ $errors->first('address') }}</span>
            @endif
        </div>
        <div class="form-group col-sm-6 col-xs-12">
            <label for="">{{ trans('site.country') }}</label>
            <select class="form-control" name="country_guest[]">
                <option value="1">{{ trans('site.viet_nam') }}</option>
                <option value="2">{{ trans('site.over_viet_nam') }}</option>
                <option value="3">{{ trans('site.foreign') }}</option>
            </select>
        </div> 
        <div class="form-group col-sm-6 col-xs-12">
            <label for="">{{ trans('site.guest') }}</label>
            <select name="guest[]" class="form-control">
                <option value="0">{{ trans('site.adult') }}</option>
            </select>
        </div>  
    </div>  
</div>            
