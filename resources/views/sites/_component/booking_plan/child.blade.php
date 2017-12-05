<div class="guest-customer">
    <div class="customer-title"> {{ trans('site.cus_child') }} </div>
    <div class="row">
        <div class="form-group col-sm-12 col-xs-12">
            <label for="">{{ trans('site.full_name') }}</label>
            <input type="text" class="form-control" name="full_name_guest[]" id="full_name_guest">
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
            <input type="text" class="form-control" name="address[]" id="address_guest">
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
                <option value="1">{{ trans('site.child') }}</option>
            </select>
        </div>  
    </div>              
</div>
