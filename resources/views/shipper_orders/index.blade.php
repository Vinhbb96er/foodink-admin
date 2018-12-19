@extends('layouts.master')
@section('title_page', trans('lang.manager_shipper_order'))

@section('content')
    <div class="panel">
      <div class="panel-body">
      <div class="col-md-12 padding-0" style="padding-bottom:20px;">
        <div class="col-md-6" style="padding-left:10px;"></div>
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
            <th>@lang('lang.no')</th>
            <th>@lang('lang.shipper_name')</th>
            <th>@lang('lang.store_name')</th>
            <th>@lang('lang.customer')</th>
            <th>@lang('lang.address')</th>
            <th>@lang('lang.ship_cost')</th>
            <th>@lang('lang.total')</th>
            <th>@lang('lang.status')</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($shipperOrders as $shipperOrder)
                <tr>
                    <th class="text-center">{{ $loop->iteration }}</th>
                    <th>
                        <a href="{{ route('shipper.show', $shipperOrder->shipper_id) }}">{{ $shipperOrder->shipper->info->name }}</a>
                    </th>
                    <th>
                        <a href="{{ route('store.show', $shipperOrder->order->store_id) }}">
                            {{ $shipperOrder->order->store->name }}
                        </a>
                    </th>
                    <th>{{ $shipperOrder->order->customer->name }}</th>
                    <th>{{ $shipperOrder->order->address }}</th>
                    <th>{{ $shipperOrder->order->ship_cost }}</th>
                    <th>{{ $shipperOrder->order->total }}</th>
                    <th>
                        <span class="status-label shipper-label-{{ $shipperOrder->status }}">
                            {{ $shipperOrder->status_text }}
                        </span>
                    </th>
                </tr>
            @empty
                <tr>
                    <th colspan="10" class="no-result">
                        @lang('lang.no_result')
                    </th>
                </tr>
            @endforelse
        </tbody>
      </table>
      </div>
      <div class="col-md-6" style="padding-top:20px;">
        <span>showing 0-10 of {{ $shipperOrders->total() }} items</span>
      </div>
      <div class="col-md-6">
            {{ $shipperOrders->links() }}
      </div>
    </div>
@endsection
