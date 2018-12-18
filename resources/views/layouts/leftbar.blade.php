<!-- start:Left Menu -->
<div id="left-menu">
  <div class="sub-left-menu scroll">
    <ul class="nav nav-list">
        <li><div class="left-bg"></div></li>
        <li class="time">
          <h1 class="animated fadeInLeft">21:00</h1>
          <p class="animated fadeInRight">Sat,October 1st 2029</p>
        </li>
        <li class="active ripple">
          <a class="tree-toggle nav-header"><span class="fa-user fa"></span> @lang('lang.manager_user') 
            <span class="fa-angle-right fa right-arrow text-right"></span>
          </a>
          <ul class="nav nav-list tree">
              <li><a href="">@lang('lang.left_bar.user_list')</a></li>
          </ul>
        </li>
        <li class="ripple">
          <a class="tree-toggle nav-header">
             <span class="fa-home fa"></span>  @lang('lang.manager_store')
            <span class="fa-angle-right fa right-arrow text-right"></span>
          </a>
          <ul class="nav nav-list tree">
            <li><a href="{{ route('store.index') }}">@lang('lang.left_bar.store_list')</a></li>
          </ul>
        </li>
        <li class="ripple">
          <a class="tree-toggle nav-header">
            <span class="fa-truck fa"></span> @lang('lang.manager_shipper')
            <span class="fa-angle-right fa right-arrow text-right"></span>
          </a>
          <ul class="nav nav-list tree">
            <li><a href="{{ route('shipper.index') }}">@lang('lang.left_bar.shipper_list')</a></li>
            <li><a href="{{ route('shipper.create') }}">@lang('lang.left_bar.register_shipper')</a></li>
          </ul>
        </li>
      </ul>
    </div>
</div>
<!-- end: Left Menu -->
