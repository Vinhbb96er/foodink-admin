<div class="col-md-12">
    <div class="form-group input-block">
        <label class="col-sm-2 control-label">@lang('lang.name')</label>
        <div class="col-sm-10">
            {{ Form::text('name', isset($shipper) ? $shipper->info->name : null, ['class' => 'form-control primary']) }}
            <div class="error-area">
                <label id="name-error" class="error" for="name"></label>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group input-block">
        <label class="col-sm-2 control-label">@lang('lang.email')</label>
        <div class="col-sm-10">
            {{ Form::text('email', isset($shipper) ? $shipper->info->email : null, ['class' => 'form-control primary']) }}
            <div class="error-area">
                <label id="email-error" class="error" for="email"></label>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group input-block">
        <label class="col-sm-2 control-label">@lang('lang.address')</label>
        <div class="col-sm-10">
            {{ Form::text('address', isset($shipper) ? $shipper->info->address : null, ['class' => 'form-control primary']) }}
            <div class="error-area">
                <label id="address-error" class="error" for="address"></label>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group input-block">
        <label class="col-sm-2 control-label">@lang('lang.phone')</label>
        <div class="col-sm-10">
            {{ Form::text('phone', isset($shipper) ? $shipper->info->phone : null, ['class' => 'form-control primary']) }}
            <div class="error-area">
                <label id="phone-error" class="error" for="phone"></label>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group input-block">
        <label class="col-sm-2 control-label">@lang('lang.identity_number')</label>
        <div class="col-sm-10">
            {{ Form::text('identity_number', isset($shipper) ? $shipper->identity_number : null, ['class' => 'form-control primary']) }}
            <div class="error-area">
                <label id="identity_number-error" class="error" for="identity_number"></label>
            </div>
        </div>
    </div>
</div>
@isset ($shipper)
    <div class="col-md-12">
        <div class="form-group input-block">
            <label class="col-sm-2 control-label">@lang('lang.status')</label>
            <div class="col-sm-10">
                <span class="status-label label-{{ $shipper->status }}">
                    {{ $shipper->status_text }}
                </span>
            </div>
        </div>
    </div>
@endisset
