@extends('layouts.master')
@section('title_page', trans('lang.manager_store'))

@section('content')
    <div class="panel form-element-padding">
        <div class="panel-heading">
            <h4>@lang('lang.store_infor')</h4>
        </div>
        <div class="panel-body content-block">
            <div class="col-md-12">
                <div class="form-group input-block">
                    <label class="col-sm-2 control-label">@lang('lang.store_name')</label>
                    <div class="col-sm-10">
                        {{ Form::text('name', $store->name, ['class' => 'form-control primary', 'disabled']) }}
                        <div class="error-area"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group input-block">
                    <label class="col-sm-2 control-label">@lang('lang.owner')</label>
                    <div class="col-sm-10">
                        {{ Form::text('owner', $store->owner->name, ['class' => 'form-control primary', 'disabled']) }}
                        <div class="error-area"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group input-block">
                    <label class="col-sm-2 control-label">@lang('lang.email')</label>
                    <div class="col-sm-10">
                        {{ Form::text('email', $store->email, ['class' => 'form-control primary', 'disabled']) }}
                        <div class="error-area"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group input-block">
                    <label class="col-sm-2 control-label">@lang('lang.address')</label>
                    <div class="col-sm-10">
                        {{ Form::text('address', $store->address, ['class' => 'form-control primary', 'disabled']) }}
                        <div class="error-area"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group input-block">
                    <label class="col-sm-2 control-label">@lang('lang.open_at')</label>
                    <div class="col-sm-10">
                        {{ Form::text('open_at', $store->open_at, ['class' => 'form-control primary', 'disabled']) }}
                        <div class="error-area"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group input-block">
                    <label class="col-sm-2 control-label">@lang('lang.close_at')</label>
                    <div class="col-sm-10">
                        {{ Form::text('close_at', $store->close_at, ['class' => 'form-control primary', 'disabled']) }}
                        <div class="error-area"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group input-block">
                    <label class="col-sm-2 control-label">@lang('lang.status')</label>
                    <div class="col-sm-10">
                        <span class="status-label label-{{ $store->status }}">
                            {{ $store->status_text }}
                        </span>
                    </div>
                </div>
            </div>
            {{ Form::hidden('id', $store->id, ['id' => 'store-id']) }}
            <div class="col-md-12">
                <div class="form-group text-center btn-create-group">
                    @if ($store->status == config('setting.store.status.block') || $store->status == config('setting.store.status.pending'))
                        <input type="button" class="btn btn-success btn-active-store" 
                            value="@lang('lang.active')" 
                            data-msg="@lang('lang.message.confirm_active_store')" 
                            data-url="{{ route('store.active_many_store') }}">
                    @endif

                    @if ($store->status == config('setting.store.status.accepted') || $store->status == config('setting.store.status.pending'))
                        <input type="button" class="btn btn-danger btn-block-store" 
                            value="@lang('lang.block')" 
                            data-msg="@lang('lang.message.confirm_block_store')" 
                            data-url="{{ route('store.block_many_store') }}">
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    {{ Html::script(asset('asset/js/store.js')) }}
@endpush
