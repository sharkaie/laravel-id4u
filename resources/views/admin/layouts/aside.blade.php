
<!-- begin:: Page -->
<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
    <div class="kt-header-mobile__logo">
        <a href="demo1/index.html">
  <img alt="Logo" src="{{asset('admin/assets/media/logos/logo-light.png')}}"/>
</a>
    </div>
    <div class="kt-header-mobile__toolbar">
        <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>

        

        <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
    </div>
</div>
<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
        <!-- begin:: Aside -->
        <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>

        <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
            <!-- begin:: Aside -->
            <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
                <div class="kt-aside__brand-logo">
                    <a href="demo1/index.html">
  <img alt="Logo" src="{{asset('admin/assets/media/logos/logo-light.png')}}"/>
</a>
                </div>

                <div class="kt-aside__brand-tools">
                    <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
    <span><img src="{{asset('admin/assets/media/icons/svg/Navigation/Angle-double-left.svg')}}"/></span>
    <span><img src="{{asset('admin/assets/media/icons/svg/Navigation/Angle-double-right.svg')}}"/></span>
  </button>
                    <!--
  <button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
  -->
                </div>
            </div>
            <!-- end:: Aside -->
            <!-- begin:: Aside Menu -->
            @php
              $role_switcher = Auth::guard('admin')->user()->role;
            @endphp
@switch($role_switcher)
  @case('super_admin')
            <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">

                <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">

                    <ul class="kt-menu__nav ">
                        <li class="kt-menu__item  @php if(Request::is('admin/dashboard')){echo "kt-menu__item--active";} @endphp" aria-haspopup="true"><a href="{{route('admin-dashboard')}}" class="kt-menu__link "><span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
    <polygon id="Bound" points="0 0 24 0 24 24 0 24"/>
    <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero"/>
    <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3"/>
</g>
</svg></span><span class="kt-menu__link-text">Dashboard</span></a></li>

                        <li class="kt-menu__section ">
                            <h4 class="kt-menu__section-text">User Manager</h4>
                            <i class="kt-menu__section-icon flaticon-more-v2"></i>
                        </li>
                        <li class="kt-menu__item  kt-menu__item--submenu @php if(Request::is('admin/agent')||Request::is('admin/agent/create')){echo "kt-menu__item--open";} @endphp" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                  <polygon id="Shape" points="0 0 24 0 24 24 0 24"/>
                                  <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" id="Mask" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                  <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" id="Mask-Copy" fill="#000000" fill-rule="nonzero"/>
                              </g>
                          </svg>
                        </span><span class="kt-menu__link-text">Agents</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                <ul class="kt-menu__subnav">
                                    <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Agents</span></span>
                                    </li>

                                <li class="kt-menu__item @php if(Request::is('admin/agent/create')){echo "kt-menu__item--active";} @endphp" aria-haspopup="true"><a href="{{route('agent.create')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">New</span></a></li>
                                    <li class="kt-menu__item @php if(Request::is('admin/agent')){echo "kt-menu__item--active";} @endphp"
                                        aria-haspopup="true"><a href="{{route('agent.index')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">List</span></a></li>
                            </div>
                        </li>
                        <li class="kt-menu__item  kt-menu__item--submenu @php if(Request::is('admin/customer')){echo "kt-menu__item--open";} @endphp" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                  <polygon id="Shape" points="0 0 24 0 24 24 0 24"/>
                                  <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                  <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero"/>
                              </g>
                          </svg>
                        </span><span class="kt-menu__link-text">Customers</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                <ul class="kt-menu__subnav">
                                    <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Customers</span></span>
                                    </li>
                                                                        <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">New</span></a></li>
                                    <li class="kt-menu__item @php if(Request::is('admin/customer')){echo "kt-menu__item--active";} @endphp" aria-haspopup="true"><a href="{{route('customer.index')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">List</span></a></li>

                                </ul>
                            </div>
                        </li>

<li class="kt-menu__section ">
    <h4 class="kt-menu__section-text">Form Settings</h4>
    <i class="kt-menu__section-icon flaticon-more-v2"></i>
</li>
<li class="kt-menu__item  kt-menu__item--submenu @php if(Request::is('admin/form/create')||Request::is('admin/form')){echo "kt-menu__item--open";} @endphp" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <rect id="bound" x="0" y="0" width="24" height="24"/>
          <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" id="Combined-Shape" fill="#000000" opacity="0.3"/>
          <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" id="Rectangle-102-Copy" fill="#000000"/>
      </g>
  </svg>
</span><span class="kt-menu__link-text">Digital Form</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Digital Form</span></span>
            </li>
            <li class="kt-menu__item @php if(Request::is('admin/form/create')){echo "kt-menu__item--active";} @endphp" aria-haspopup="true"><a href="{{route('form.create')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">New</span></a></li>
            <li class="kt-menu__item @php if(Request::is('admin/form')){echo "kt-menu__item--active";} @endphp" aria-haspopup="true"><a href="{{route('form.index')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">List</span></a></li>
    </div>
</li>
<li class="kt-menu__item @php if(Request::is('admin/field')){echo "kt-menu__item--active";} @endphp" aria-haspopup="true"><a href="{{route('field.index')}}" class="kt-menu__link "><span class="kt-menu__link-icon">
  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <rect id="bound" x="0" y="0" width="24" height="24"/>
          <path d="M10.5,5 L19.5,5 C20.3284271,5 21,5.67157288 21,6.5 C21,7.32842712 20.3284271,8 19.5,8 L10.5,8 C9.67157288,8 9,7.32842712 9,6.5 C9,5.67157288 9.67157288,5 10.5,5 Z M10.5,10 L19.5,10 C20.3284271,10 21,10.6715729 21,11.5 C21,12.3284271 20.3284271,13 19.5,13 L10.5,13 C9.67157288,13 9,12.3284271 9,11.5 C9,10.6715729 9.67157288,10 10.5,10 Z M10.5,15 L19.5,15 C20.3284271,15 21,15.6715729 21,16.5 C21,17.3284271 20.3284271,18 19.5,18 L10.5,18 C9.67157288,18 9,17.3284271 9,16.5 C9,15.6715729 9.67157288,15 10.5,15 Z" id="Combined-Shape" fill="#000000"/>
          <path d="M5.5,8 C4.67157288,8 4,7.32842712 4,6.5 C4,5.67157288 4.67157288,5 5.5,5 C6.32842712,5 7,5.67157288 7,6.5 C7,7.32842712 6.32842712,8 5.5,8 Z M5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 C6.32842712,10 7,10.6715729 7,11.5 C7,12.3284271 6.32842712,13 5.5,13 Z M5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 C6.32842712,15 7,15.6715729 7,16.5 C7,17.3284271 6.32842712,18 5.5,18 Z" id="Combined-Shape" fill="#000000" opacity="0.3"/>
      </g>
  </svg>
</span><span class="kt-menu__link-text">Field Manager</span></a></li>

<li class="kt-menu__section ">
    <h4 class="kt-menu__section-text">Form Data</h4>
    <i class="kt-menu__section-icon flaticon-more-v2"></i>
</li>
<li class="kt-menu__item  kt-menu__item--submenu @php if(Request::is('admin/uploadsa/data-excel')|| Request::is('admin/uploadsa/photos_cropped') ||Request::is('admin/uploadsa/photos')){echo "kt-menu__item--open";} @endphp" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
      <rect id="bound" x="0" y="0" width="24" height="24"/>
      <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" id="Combined-Shape" fill="#000000" opacity="0.3"/>
      <path d="M8.54301601,14.4923287 L10.6661,14.4923287 L10.6661,16.5 C10.6661,16.7761424 10.8899576,17 11.1661,17 L12.33392,17 C12.6100624,17 12.83392,16.7761424 12.83392,16.5 L12.83392,14.4923287 L14.9570039,14.4923287 C15.2331463,14.4923287 15.4570039,14.2684711 15.4570039,13.9923287 C15.4570039,13.8681299 15.41078,13.7483766 15.3273331,13.6563877 L12.1203391,10.1211145 C11.934804,9.91658739 11.6185961,9.90119131 11.414069,10.0867264 C11.4020553,10.0976245 11.390579,10.1091008 11.3796809,10.1211145 L8.1726869,13.6563877 C7.98715181,13.8609148 8.00254789,14.1771227 8.20707501,14.3626578 C8.29906387,14.4461047 8.41881721,14.4923287 8.54301601,14.4923287 Z" id="Shape" fill="#000000"/>
  </g>
</svg>
</span><span class="kt-menu__link-text">Upload Data</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
<ul class="kt-menu__subnav">
<li class="kt-menu__item @php if(Request::is('admin/uploadsa/data-excel')){echo "kt-menu__item--active";} @endphp " aria-haspopup="true"><a href="{{route('uploadsa.excel')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Data - Excel</span></a></li>
<li class="kt-menu__item @php if(Request::is('admin/uploadsa/photos')){echo "kt-menu__item--active";} @endphp " aria-haspopup="true"><a href="{{route('uploadsa.photos')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Photos</span></a></li>
<li class="kt-menu__item @php if(Request::is('admin/uploadsa/photos_cropped')){echo "kt-menu__item--active";} @endphp " aria-haspopup="true"><a href="{{route('uploadsa.photos_cropped')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Photos (cropped)</span></a></li>
</ul>
</div>
</li>
<li class="kt-menu__item  kt-menu__item--submenu @php if(Request::is('admin/data/unverified')||Request::is('admin/data/verified')){echo "kt-menu__item--open";} @endphp" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <polygon points="0 0 24 0 24 24 0 24"/>
          <path d="M9.26193932,16.6476484 C8.90425297,17.0684559 8.27315905,17.1196257 7.85235158,16.7619393 C7.43154411,16.404253 7.38037434,15.773159 7.73806068,15.3523516 L16.2380607,5.35235158 C16.6013618,4.92493855 17.2451015,4.87991302 17.6643638,5.25259068 L22.1643638,9.25259068 C22.5771466,9.6195087 22.6143273,10.2515811 22.2474093,10.6643638 C21.8804913,11.0771466 21.2484189,11.1143273 20.8356362,10.7474093 L17.0997854,7.42665306 L9.26193932,16.6476484 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(14.999995, 11.000002) rotate(-180.000000) translate(-14.999995, -11.000002) "/>
          <path d="M4.26193932,17.6476484 C3.90425297,18.0684559 3.27315905,18.1196257 2.85235158,17.7619393 C2.43154411,17.404253 2.38037434,16.773159 2.73806068,16.3523516 L11.2380607,6.35235158 C11.6013618,5.92493855 12.2451015,5.87991302 12.6643638,6.25259068 L17.1643638,10.2525907 C17.5771466,10.6195087 17.6143273,11.2515811 17.2474093,11.6643638 C16.8804913,12.0771466 16.2484189,12.1143273 15.8356362,11.7474093 L12.0997854,8.42665306 L4.26193932,17.6476484 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.999995, 12.000002) rotate(-180.000000) translate(-9.999995, -12.000002) "/>
      </g>
  </svg>
</span><span class="kt-menu__link-text">Data Entries</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item kt-menu__item-@php if(Request::is('admin/data/unverified')){echo "-active";} @endphp " aria-haspopup="true"><a href="{{route('data.unverified')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Unverified</span></a></li>
            <li
                class="kt-menu__item kt-menu__item-@php if(Request::is('admin/data/verified')){echo "-active";} @endphp " aria-haspopup="true"><a href="{{route('data.verified')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Verified</span></a></li>
</ul>
</div>
</li>

<li class="kt-menu__item  kt-menu__item-@php if(Request::is('admin/data/lot')){echo "-active";} @endphp" aria-haspopup="true"><a href="{{route('lot.index')}}" class="kt-menu__link "><span class="kt-menu__link-icon">
  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <rect id="bound" x="0" y="0" width="24" height="24"/>
          <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" id="Combined-Shape" fill="#000000" opacity="0.3"/>
          <path d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z" id="check-path" fill="#000000"/>
          <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" id="Combined-Shape" fill="#000000"/>
      </g>
  </svg>
</span><span class="kt-menu__link-text">Data Lots</span></a>
</li>

<li class="kt-menu__section ">
    <h4 class="kt-menu__section-text">ID Card Generator</h4>
    <i class="kt-menu__section-icon flaticon-more-v2"></i>
</li>

<li class="kt-menu__item  kt-menu__item-@php if(Request::is('admin/id-generator/create')){echo "-active";} @endphp" aria-haspopup="true"><a href="{{route('id-generator.create')}}" class="kt-menu__link "><span class="kt-menu__link-icon">
  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <rect id="bound" x="0" y="0" width="24" height="24"/>
          <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" id="Combined-Shape" fill="#000000" opacity="0.3"/>
          <path d="M11,13 L11,11 C11,10.4477153 11.4477153,10 12,10 C12.5522847,10 13,10.4477153 13,11 L13,13 L15,13 C15.5522847,13 16,13.4477153 16,14 C16,14.5522847 15.5522847,15 15,15 L13,15 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,15 L9,15 C8.44771525,15 8,14.5522847 8,14 C8,13.4477153 8.44771525,13 9,13 L11,13 Z" id="Combined-Shape" fill="#000000"/>
      </g>
  </svg>
</span><span class="kt-menu__link-text">New Project</span></a>
</li>
<li class="kt-menu__item  kt-menu__item-@php if(Request::is('admin/id-generator/')){echo "-active";} @endphp" aria-haspopup="true"><a href="{{route('id-generator.index')}}" class="kt-menu__link "><span class="kt-menu__link-icon">
  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect id="bound" x="0" y="0" width="24" height="24"/>
        <rect id="Rectangle" fill="#000000" opacity="0.3" transform="translate(12.000000, 7.000000) rotate(-180.000000) translate(-12.000000, -7.000000) " x="11" y="1" width="2" height="12" rx="1"/>
        <path d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z" id="Path-103" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path d="M14.2928932,10.2928932 C14.6834175,9.90236893 15.3165825,9.90236893 15.7071068,10.2928932 C16.0976311,10.6834175 16.0976311,11.3165825 15.7071068,11.7071068 L12.7071068,14.7071068 C12.3165825,15.0976311 11.6834175,15.0976311 11.2928932,14.7071068 L8.29289322,11.7071068 C7.90236893,11.3165825 7.90236893,10.6834175 8.29289322,10.2928932 C8.68341751,9.90236893 9.31658249,9.90236893 9.70710678,10.2928932 L12,12.5857864 L14.2928932,10.2928932 Z" id="Path-104" fill="#000000" fill-rule="nonzero"/>
    </g>
</svg>
</span><span class="kt-menu__link-text">Open Project</span></a>
</li>
<li class="kt-menu__item  kt-menu__item-@php if(Request::is('admin/id-generator/results')){echo "-active";} @endphp" aria-haspopup="true"><a href="{{route('id-generator.results')}}" class="kt-menu__link "><span class="kt-menu__link-icon">
  <i class="fa fa-id-card"></i>
</span><span class="kt-menu__link-text">Generated Cards</span></a>
</li>
</ul>
</div>
</div>
@break

@case('agent')
<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">

  <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
    <ul class="kt-menu__nav ">
      <li class="kt-menu__item  @php if(Request::is('admin/a/dashboard')){echo "kt-menu__item--active";} @endphp" aria-haspopup="true"><a href="{{route('admin.dashboard')}}" class="kt-menu__link ">
        <span class="kt-menu__link-icon">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <polygon id="Bound" points="0 0 24 0 24 24 0 24"/>
            <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero"/>
            <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3"/>
            </g>
          </svg>
        </span>
        <span class="kt-menu__link-text">Dashboard</span></a>
      </li>

      <li class="kt-menu__section ">
          <h4 class="kt-menu__section-text">Users</h4>
          <i class="kt-menu__section-icon flaticon-more-v2"></i>
      </li>

      <li class="kt-menu__item  kt-menu__item--submenu @php if(Request::is('admin/a/customers')){echo "kt-menu__item--open";} @endphp" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
        <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
          <span class="kt-menu__link-icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon id="Shape" points="0 0 24 0 24 24 0 24"/>
                    <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                    <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero"/>
                </g>
            </svg>
          </span>
          <span class="kt-menu__link-text">Customers</span>
          <i class="kt-menu__ver-arrow la la-angle-right"></i>
        </a>
        <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
          <ul class="kt-menu__subnav">
            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Customers</span></span></li>
            <li class="kt-menu__item @php if(Request::is('admin/a/customers')){echo "kt-menu__item--active";} @endphp" aria-haspopup="true"><a href="{{route('customers.index')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">All Customers</span></a></li>
            {{-- <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Add New Customer</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Customer Reports</span></a></li> --}}
          </ul>
        </div>
      </li>

      <li class="kt-menu__section ">
        <h4 class="kt-menu__section-text">Form Settings</h4>
        <i class="kt-menu__section-icon flaticon-more-v2"></i>
      </li>


<li class="kt-menu__item  kt-menu__item--submenu @php if(Request::is('admin/a/forms/create')||Request::is('admin/a/forms')){echo "kt-menu__item--open";} @endphp" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
<rect id="bound" x="0" y="0" width="24" height="24"/>
<path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" id="Combined-Shape" fill="#000000" opacity="0.3"/>
<path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" id="Rectangle-102-Copy" fill="#000000"/>
</g>
</svg>
</span><span class="kt-menu__link-text">Digital Form</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
<ul class="kt-menu__subnav">
<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Digital Form</span></span>
</li>
<li class="kt-menu__item @php if(Request::is('admin/a/forms/create')){echo "kt-menu__item--active";} @endphp" aria-haspopup="true"><a href="{{route('forms.create')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Create New Form</span></a></li>
<li class="kt-menu__item @php if(Request::is('admin/a/forms')){echo "kt-menu__item--active";} @endphp" aria-haspopup="true"><a href="{{route('forms.index')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">View All Form</span></a></li>
{{-- <li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Form Reports</span></a></li> --}}
</div>
</li>

<li class="kt-menu__section ">
<h4 class="kt-menu__section-text">Form Data</h4>
<i class="kt-menu__section-icon flaticon-more-v2"></i>
</li>

<li class="kt-menu__item  kt-menu__item--submenu @php if(Request::is('admin/a/uploads/data-excel')|| Request::is('admin/a/uploads/photos_cropped') ||Request::is('admin/a/uploads/photos')){echo "kt-menu__item--open";} @endphp" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
      <rect id="bound" x="0" y="0" width="24" height="24"/>
      <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" id="Combined-Shape" fill="#000000" opacity="0.3"/>
      <path d="M8.54301601,14.4923287 L10.6661,14.4923287 L10.6661,16.5 C10.6661,16.7761424 10.8899576,17 11.1661,17 L12.33392,17 C12.6100624,17 12.83392,16.7761424 12.83392,16.5 L12.83392,14.4923287 L14.9570039,14.4923287 C15.2331463,14.4923287 15.4570039,14.2684711 15.4570039,13.9923287 C15.4570039,13.8681299 15.41078,13.7483766 15.3273331,13.6563877 L12.1203391,10.1211145 C11.934804,9.91658739 11.6185961,9.90119131 11.414069,10.0867264 C11.4020553,10.0976245 11.390579,10.1091008 11.3796809,10.1211145 L8.1726869,13.6563877 C7.98715181,13.8609148 8.00254789,14.1771227 8.20707501,14.3626578 C8.29906387,14.4461047 8.41881721,14.4923287 8.54301601,14.4923287 Z" id="Shape" fill="#000000"/>
  </g>
</svg>
</span><span class="kt-menu__link-text">Upload Data</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
<ul class="kt-menu__subnav">
<li class="kt-menu__item @php if(Request::is('admin/a/uploads/data-excel')){echo "kt-menu__item--active";} @endphp " aria-haspopup="true"><a href="{{route('uploads.excel')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Data - Excel</span></a></li>
<li class="kt-menu__item @php if(Request::is('admin/a/uploads/photos')){echo "kt-menu__item--active";} @endphp " aria-haspopup="true"><a href="{{route('uploads.photos')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Photos</span></a></li>
<li class="kt-menu__item @php if(Request::is('admin/a/uploads/photos_cropped')){echo "kt-menu__item--active";} @endphp " aria-haspopup="true"><a href="{{route('uploads.photos_cropped')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Photos (cropped)</span></a></li>
</ul>
</div>
</li>

<li class="kt-menu__item  kt-menu__item--submenu @php if(Request::is('admin/a/datas/unverified')||Request::is('admin/a/datas/verified')){echo "kt-menu__item--open";} @endphp" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
<polygon points="0 0 24 0 24 24 0 24"/>
<path d="M9.26193932,16.6476484 C8.90425297,17.0684559 8.27315905,17.1196257 7.85235158,16.7619393 C7.43154411,16.404253 7.38037434,15.773159 7.73806068,15.3523516 L16.2380607,5.35235158 C16.6013618,4.92493855 17.2451015,4.87991302 17.6643638,5.25259068 L22.1643638,9.25259068 C22.5771466,9.6195087 22.6143273,10.2515811 22.2474093,10.6643638 C21.8804913,11.0771466 21.2484189,11.1143273 20.8356362,10.7474093 L17.0997854,7.42665306 L9.26193932,16.6476484 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(14.999995, 11.000002) rotate(-180.000000) translate(-14.999995, -11.000002) "/>
<path d="M4.26193932,17.6476484 C3.90425297,18.0684559 3.27315905,18.1196257 2.85235158,17.7619393 C2.43154411,17.404253 2.38037434,16.773159 2.73806068,16.3523516 L11.2380607,6.35235158 C11.6013618,5.92493855 12.2451015,5.87991302 12.6643638,6.25259068 L17.1643638,10.2525907 C17.5771466,10.6195087 17.6143273,11.2515811 17.2474093,11.6643638 C16.8804913,12.0771466 16.2484189,12.1143273 15.8356362,11.7474093 L12.0997854,8.42665306 L4.26193932,17.6476484 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.999995, 12.000002) rotate(-180.000000) translate(-9.999995, -12.000002) "/>
</g>
</svg>
</span><span class="kt-menu__link-text">Data Entries</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
<ul class="kt-menu__subnav">
<li class="kt-menu__item @php if(Request::is('admin/a/datas/unverified')){echo "kt-menu__item--active";} @endphp " aria-haspopup="true"><a href="{{route('datas.unverified')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Unverified</span></a></li>
<li
    class="kt-menu__item @php if(Request::is('admin/a/datas/verified')){echo "kt-menu__item--active";} @endphp " aria-haspopup="true"><a href="{{route('datas.verified')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Verified</span></a></li>
</ul>
</div>
</li>

<li class="kt-menu__item  @php if(Request::is('admin/a/data/lots')||Request::is('admin/a/data/lots')){echo "kt-menu__item--active";} @endphp" aria-haspopup="true"><a href="{{route('lots.index')}}" class="kt-menu__link "><span class="kt-menu__link-icon">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
<rect id="bound" x="0" y="0" width="24" height="24"/>
<path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" id="Combined-Shape" fill="#000000" opacity="0.3"/>
<path d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z" id="check-path" fill="#000000"/>
<path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" id="Combined-Shape" fill="#000000"/>
</g>
</svg>
</span><span class="kt-menu__link-text">Data Lots</span></a>
</li>
{{--
<li class="kt-menu__section ">
<h4 class="kt-menu__section-text">ID Card Generator</h4>
<i class="kt-menu__section-icon flaticon-more-v2"></i>
</li>

<li class="kt-menu__item  kt-menu__item-@php if(Request::is('admin/id-generator/create')){echo "-active";} @endphp" aria-haspopup="true"><a href="{{route('id-generator.create')}}" class="kt-menu__link "><span class="kt-menu__link-icon">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
<rect id="bound" x="0" y="0" width="24" height="24"/>
<path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" id="Combined-Shape" fill="#000000" opacity="0.3"/>
<path d="M11,13 L11,11 C11,10.4477153 11.4477153,10 12,10 C12.5522847,10 13,10.4477153 13,11 L13,13 L15,13 C15.5522847,13 16,13.4477153 16,14 C16,14.5522847 15.5522847,15 15,15 L13,15 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,15 L9,15 C8.44771525,15 8,14.5522847 8,14 C8,13.4477153 8.44771525,13 9,13 L11,13 Z" id="Combined-Shape" fill="#000000"/>
</g>
</svg>
</span><span class="kt-menu__link-text">New Project</span></a>
</li>
<li class="kt-menu__item  kt-menu__item-@php if(Request::is('admin/id-generator/')){echo "-active";} @endphp" aria-haspopup="true"><a href="{{route('id-generator.index')}}" class="kt-menu__link "><span class="kt-menu__link-icon">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
<rect id="bound" x="0" y="0" width="24" height="24"/>
<rect id="Rectangle" fill="#000000" opacity="0.3" transform="translate(12.000000, 7.000000) rotate(-180.000000) translate(-12.000000, -7.000000) " x="11" y="1" width="2" height="12" rx="1"/>
<path d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z" id="Path-103" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
<path d="M14.2928932,10.2928932 C14.6834175,9.90236893 15.3165825,9.90236893 15.7071068,10.2928932 C16.0976311,10.6834175 16.0976311,11.3165825 15.7071068,11.7071068 L12.7071068,14.7071068 C12.3165825,15.0976311 11.6834175,15.0976311 11.2928932,14.7071068 L8.29289322,11.7071068 C7.90236893,11.3165825 7.90236893,10.6834175 8.29289322,10.2928932 C8.68341751,9.90236893 9.31658249,9.90236893 9.70710678,10.2928932 L12,12.5857864 L14.2928932,10.2928932 Z" id="Path-104" fill="#000000" fill-rule="nonzero"/>
</g>
</svg>
</span><span class="kt-menu__link-text">Open Project</span></a>
</li>
<li class="kt-menu__item  kt-menu__item-@php if(Request::is('admin/id-generator/results')){echo "-active";} @endphp" aria-haspopup="true"><a href="{{route('id-generator.results')}}" class="kt-menu__link "><span class="kt-menu__link-icon">
<i class="fa fa-id-card"></i>
</span><span class="kt-menu__link-text">Generated Cards</span></a>
</li> --}}
</ul>
</div>
</div>
@break

@case('customer')
<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">

  <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
    <ul class="kt-menu__nav ">
      <li class="kt-menu__item  @php if(Request::is('admin/c/dashboard')){echo "kt-menu__item--active";} @endphp" aria-haspopup="true"><a href="{{route('admin_dashboard')}}" class="kt-menu__link ">
        <span class="kt-menu__link-icon">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <polygon id="Bound" points="0 0 24 0 24 24 0 24"/>
            <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero"/>
            <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3"/>
            </g>
          </svg>
        </span>
        <span class="kt-menu__link-text">Dashboard</span></a>
      </li>



    <li class="kt-menu__section ">
    <h4 class="kt-menu__section-text">Form Data</h4>
    <i class="kt-menu__section-icon flaticon-more-v2"></i>
    </li>

    <li class="kt-menu__item  @php if(Request::is('admin/c/datac/unverified')){echo "kt-menu__item--active";} @endphp" aria-haspopup="true"><a href="{{route('datac.unverified')}}" class="kt-menu__link ">
      <span class="kt-menu__link-icon">
        <b>O</b>
      </span>
      <span class="kt-menu__link-text">Unverified Entries</span></a>
    </li>

    <li class="kt-menu__item @php if(Request::is('admin/c/datac/verified')){echo "kt-menu__item--active";} @endphp " aria-haspopup="true"><a href="{{route('datac.verified')}}" class="kt-menu__link ">
      <span class="kt-menu__link-icon">
        <b>O</b>
      </span>
      <span class="kt-menu__link-text">Verified Entries</span></a>
    </li>
    <li class="kt-menu__item  kt-menu__item-@php if(Request::is('admin/datac/lotc')){echo "-active";} @endphp" aria-haspopup="true"><a href="{{route('lotc.index')}}" class="kt-menu__link "><span class="kt-menu__link-icon">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <rect id="bound" x="0" y="0" width="24" height="24"/>
              <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" id="Combined-Shape" fill="#000000" opacity="0.3"/>
              <path d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z" id="check-path" fill="#000000"/>
              <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" id="Combined-Shape" fill="#000000"/>
          </g>
      </svg>
    </span><span class="kt-menu__link-text">Data Lots</span></a>
    </li>
    <li class="kt-menu__item  kt-menu__item--submenu @php if(Request::is('admin/c/upload/data-excel')|| Request::is('admin/c/upload/photos_cropped') ||Request::is('admin/c/upload/photos')){echo "kt-menu__item--open";} @endphp" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <rect id="bound" x="0" y="0" width="24" height="24"/>
          <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" id="Combined-Shape" fill="#000000" opacity="0.3"/>
          <path d="M8.54301601,14.4923287 L10.6661,14.4923287 L10.6661,16.5 C10.6661,16.7761424 10.8899576,17 11.1661,17 L12.33392,17 C12.6100624,17 12.83392,16.7761424 12.83392,16.5 L12.83392,14.4923287 L14.9570039,14.4923287 C15.2331463,14.4923287 15.4570039,14.2684711 15.4570039,13.9923287 C15.4570039,13.8681299 15.41078,13.7483766 15.3273331,13.6563877 L12.1203391,10.1211145 C11.934804,9.91658739 11.6185961,9.90119131 11.414069,10.0867264 C11.4020553,10.0976245 11.390579,10.1091008 11.3796809,10.1211145 L8.1726869,13.6563877 C7.98715181,13.8609148 8.00254789,14.1771227 8.20707501,14.3626578 C8.29906387,14.4461047 8.41881721,14.4923287 8.54301601,14.4923287 Z" id="Shape" fill="#000000"/>
      </g>
  </svg>
  </span><span class="kt-menu__link-text">Upload Data</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
    <ul class="kt-menu__subnav">
    <li class="kt-menu__item @php if(Request::is('admin/c/upload/data-excel')){echo "kt-menu__item--active";} @endphp " aria-haspopup="true"><a href="{{route('upload.excel')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Data - Excel</span></a></li>
    <li class="kt-menu__item @php if(Request::is('admin/c/upload/photos')){echo "kt-menu__item--active";} @endphp " aria-haspopup="true"><a href="{{route('upload.photos')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Photos</span></a></li>
    <li class="kt-menu__item @php if(Request::is('admin/c/upload/photos_cropped')){echo "kt-menu__item--active";} @endphp " aria-haspopup="true"><a href="{{route('upload.photos_cropped')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Photos (cropped)</span></a></li>
    </ul>
    </div>
    </li>
    </ul>
  </div>
</div>
@break
@endswitch
<!-- end:: Aside Menu -->
</div>
<!-- end:: Aside -->
