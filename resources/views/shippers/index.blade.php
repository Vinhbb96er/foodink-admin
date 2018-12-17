@extends('layouts.master')
@section('title_page', trans('lang.manager_shipper'))

@section('content')
    <div class="panel">
      <div class="panel-body">
      <div class="col-md-12 padding-0" style="padding-bottom:20px;">
        <div class="col-md-6" style="padding-left:10px;">
            <a class="btn btn-default" href="{{ route('shipper.create') }}">
                <i class="fa fa-plus"></i> @lang('lang.add')
            </a>
            <Button class="btn btn-danger block-all" 
                data-url="{{ route('shipper.block_many_shipper') }}"
                data-msg="@lang('lang.message.confirm_block_many_shipper')">
                @lang('lang.block_all')
            </Button>
            <Button class="btn btn-success active-all" 
                data-url="{{ route('shipper.active_many_shipper') }}"
                data-msg="@lang('lang.message.confirm_active_many_shipper')">
                @lang('lang.active_all')
            </Button>
        </div>
        <div class="col-md-6">
             <div class="col-lg-12">
                <div class="input-group">
                    <input type="text" class="form-control" aria-label="...">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default">@lang('lang.search')</button>
                    </div><!-- /btn-group -->
                </div><!-- /input-group -->
              </div><!-- /.col-lg-6 -->
        </div>
     </div>
      <div class="responsive-table">
          
        <table class="table table-striped table-bordered" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th style="padding-left:10px;">
                <label class="checkbox-wrap">
                    <input type="checkbox" class="checkbox-all" name="checkbox1" />
                    <span class="checkmark"></span>
                </label>
            </th>
            <th>@lang('lang.no')</th>
            <th>@lang('lang.shipper_name')</th>
            <th>@lang('lang.phone')</th>
            <th>@lang('lang.address')</th>
            <th>@lang('lang.status')</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($shippers as $shipper)
                <tr>
                    <td style="border: 1px solid #ddd !important;">
                        <label class="checkbox-wrap">
                            <input type="checkbox" class="checkbox-element" name="checkbox1" value="{{ $shipper->id }}" />
                            <span class="checkmark"></span>
                        </label>
                    </td>
                    <th>{{ $loop->iteration }}</th>
                    <th>
                        <a href="{{ route('shipper.show', $shipper->id) }}">{{ $shipper->info->name }}</a>
                    </th>
                    <th>{{ $shipper->info->phone }}</th>
                    <th>{{ $shipper->info->address }}</th>
                    <th>
                        <span class="status-label label-{{ $shipper->status }}">
                            {{ $shipper->status_text }}
                        </span>
                    </th>
                </tr>
            @empty
                <tr colspans="5">
                    <th>
                        @lang('lang.no_results')
                    </th>
                </tr>
            @endforelse
        </tbody>
      </table>
      </div>
      <div class="col-md-6" style="padding-top:20px;">
        <span>showing 0-10 of {{ $shippers->total() }} items</span>
      </div>
      <div class="col-md-6">
            {{ $shippers->links() }}
      </div>
    </div>
@endsection
