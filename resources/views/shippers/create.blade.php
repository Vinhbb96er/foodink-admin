@extends('layouts.master')
@section('title_page', trans('lang.manager_shipper'))

@section('content')
    <div class="panel form-element-padding">
        <div class="panel-heading">
            <h4>@lang('lang.create_shipper')</h4>
        </div>
        {{ Form::open(['route' => 'shipper.store', 'id' => 'form-shipper']) }}
            <div class="panel-body content-block">
                @include('shippers.shipper_form')
                <div class="col-md-12">
                    <div class="form-group text-center btn-create-group">
                        <input type="button" class="btn btn-info btn-register" value="@lang('lang.register')" data-msg="@lang('lang.message.confirm_register_shipper')" id="btn-register">
                        <input type="reset" class="btn btn-warning" value="@lang('lang.reset')">
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
