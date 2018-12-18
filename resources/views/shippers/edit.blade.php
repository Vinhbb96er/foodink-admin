@extends('layouts.master')
@section('title_page', trans('lang.manager_shipper'))

@section('content')
    <div class="panel form-element-padding">
        <div class="panel-heading">
            <h4>@lang('lang.update_shipper')</h4>
        </div>
        {{ Form::open(['route' => ['shipper.update', $shipper->id], 'id' => 'form-shipper', 'method' => 'PUT']) }}
            <div class="panel-body content-block">
                @include('shippers.shipper_form')
                {{ Form::hidden('id', $shipper->id, ['id' => 'shipper-id']) }}
                {{ Form::hidden('user_id', $shipper->user_id) }}
                <div class="col-md-12">
                    <div class="form-group text-center btn-create-group">
                        <input type="button" class="btn btn-info btn-register" value="@lang('lang.update')" data-msg="@lang('lang.message.confirm_update_shipper')" id="btn-register">
                        @if ($shipper->status == config('setting.shipper.status.block'))
                            <input type="button" class="btn btn-success btn-active-shipper" 
                                value="@lang('lang.active')" 
                                data-msg="@lang('lang.message.confirm_active_shipper')" 
                                data-url="{{ route('shipper.active_many_shipper') }}">
                        @else
                            <input type="button" class="btn btn-danger btn-block-shipper" 
                                value="@lang('lang.block')" 
                                data-msg="@lang('lang.message.confirm_block_shipper')" 
                                data-url="{{ route('shipper.block_many_shipper') }}">
                        @endif
                    </div>
                </div>
            </div>
        {{ Form::close() }}
    </div>
@endsection

@push('js')
    {{ Html::script(asset('vendor/jquery-validation/jquery.validate.min.js')) }}
    {{ Html::script(asset('asset/js/shipper.js')) }}
@endpush
