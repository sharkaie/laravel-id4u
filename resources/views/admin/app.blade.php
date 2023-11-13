<!DOCTYPE html>
<html lang="en">
  <head>
      @include('admin.layouts.head')

        @section('page-css')
        @show
  </head>

  <body class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
    <div class="kt-page-loader kt-page-loader--base">
        <div class="blockui">
            <span>Loading...</span>
            <span><div class="kt-spinner kt-spinner--brand"></div></span>
        </div>
    </div>
    @include('admin.layouts.aside')
    @include('admin.layouts.header')
      <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        @section('subheader')
        @show
          <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            @section('main-content')
            @show
          </div>
      </div>
      <div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
        @include('admin.layouts.footer')
      </div>

        </div>
      </div>
    </div>

    
    <div id="kt_scrolltop" class="kt-scrolltop">
      <i class="fa fa-arrow-up"></i>
    </div>
    @include('admin.layouts.chat')
    @include('admin.layouts.scripts')

    @section('page-scripts')
    @show
  </body>

</html>
