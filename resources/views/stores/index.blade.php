@extends('layouts.master')

@section('content')
    <div class="panel">
      <div class="panel-body">
      <div class="col-md-12 padding-0" style="padding-bottom:20px;">
        <div class="col-md-6" style="padding-left:10px;">
            <Button class="btn btn-danger block-store-all" 
                data-url="{{ route('store.block_many_store') }}"
                data-msg="@lang('lang.message.confirm_block_many_store')">
                @lang('lang.block_all')
            </Button>
            <Button class="btn btn-success active-store-all" 
                data-url="{{ route('store.active_many_store') }}"
                data-msg="@lang('lang.message.confirm_active_many_store')">
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
            <th>@lang('lang.store_name')</th>
            <th>@lang('lang.owner')</th>
            <th>@lang('lang.email')</th>
            <th>@lang('lang.address')</th>
            <th>@lang('lang.status')</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($stores as $store)
                <tr>
                    <td style="border: 1px solid #ddd !important;">
                        <label class="checkbox-wrap">
                            <input type="checkbox" class="checkbox-element" name="checkbox1" value="{{ $store->id }}" />
                            <span class="checkmark"></span>
                        </label>
                    </td>
                    <th>{{ $loop->iteration }}</th>
                    <th>
                        <a href="{{ route('store.show', $store->id) }}">{{ $store->name }}</a>
                    </th>
                    <th>{{ $store->user->name }}</th>
                    <th>{{ $store->email }}</th>
                    <th>{{ $store->address }}</th>
                    <th>
                        <span class="status-label label-{{ $store->status }}">
                            {{ $store->status_text }}
                        </span>
                    </th>
                </tr>
            @empty
            @endforelse
          
        </tbody>
      </table>
      </div>
      <div class="col-md-6" style="padding-top:20px;">
        <span>showing 0-10 of {{ $stores->total() }} items</span>
      </div>
      <div class="col-md-6">
            {{ $stores->links() }}
      </div>
    </div>
@endsection
