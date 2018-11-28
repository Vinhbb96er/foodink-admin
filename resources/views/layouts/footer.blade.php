        </div>
        <div class="footer right">
            <p><i class="fa fa-copyright" aria-hidden="true"></i> @lang('lang.copyright')</p>
          </div>
        </div>
        <!-- start: Mobile -->
        <div id="mimin-mobile" class="reverse">
            <div class="mimin-mobile-menu-list">
                <div class="col-md-12 sub-mimin-mobile-menu-list animated fadeInLeft">
                    
                </div>
            </div>       
        </div>
        <button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
            <span class="fa fa-bars"></span>
        </button>
        {{ Html::script(asset('asset/js/jquery.min.js')) }}
        {{ Html::script(asset('asset/js/bootstrap.min.js')) }}
        {{ Html::script(asset('asset/js/plugins/moment.min.js')) }}
        {{ Html::script(asset('asset/js/plugins/jquery.nicescroll.js')) }}
        {{ Html::script(asset('asset/js/main.js')) }}
  </body>
</html>
