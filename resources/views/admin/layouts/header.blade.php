<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

    <!-- begin:: Header -->
    <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

      <!-- begin:: Header Menu -->
      <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
      <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper"></div>
      <!-- end:: Header Menu -->

      <!-- begin:: Header Topbar -->
      <div class="kt-header__topbar">

       


            

            <!--begin: User Bar -->
            <div class="kt-header__topbar-item kt-header__topbar-item--user">
                <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                    <div class="kt-header__topbar-user">
                        <span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
                        <span class="kt-header__topbar-username kt-hidden-mobile">{{ Auth::guard('admin')->user()->firstname }}</span>
                        <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                        @if(Auth::guard('admin')->user()->profile_img != null)
                          <img alt="Pic" src="data:image/png;base64,{{Auth::guard('admin')->user()->profile_img}}" />
                        @else
                          <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">@php echo substr(Auth::guard('admin')->user()->firstname, 0, 1) @endphp</span>
                        @endif
                    </div>
                </div>

                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
                    <!--begin: Head -->
                    <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url({{url('admin/assets/media/misc/bg-1.jpg')}})">
                        <div class="kt-user-card__avatar">
                          @if(Auth::guard('admin')->user()->profile_img != null)
                            <img alt="Pic" src="data:image/png;base64,{{Auth::guard('admin')->user()->profile_img}}" />
                          @else
                            <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">@php echo substr(Auth::guard('admin')->user()->firstname, 0, 1) @endphp</span>
                          @endif
                        </div>
                        <div class="kt-user-card__name">
                          {{ Auth::guard('admin')->user()->firstname }}&nbsp;{{ Auth::guard('admin')->user()->lastname }}
                        </div>
                    </div>
                    <!--end: Head -->

                    <!--begin: Navigation -->
                    <div class="kt-notification">
                        <a href='
                        @switch(Auth::guard("admin")->user()->role)
                          @case("super_admin")
                            {{route("profile.index")}}
                          @break

                          @case("agent")
                          {{route("myprofile.index")}}
                          @break

                          @case("customer")
                          {{route("edit-profile.index")}}
                          @break
                        @endswitch'

                         class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-calendar-3 kt-font-success"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title kt-font-bold">
                                    My Profile
                                </div>
                                <div class="kt-notification__item-time">
                                    Account settings and more
                                </div>
                            </div>
                        </a>
                        {{-- <a href="demo1/custom/apps/user/profile-3.html" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-mail kt-font-warning"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title kt-font-bold">
                                    My Messages
                                </div>
                                <div class="kt-notification__item-time">
                                    Inbox and tasks
                                </div>
                            </div>
                        </a>
                        <a href="demo1/custom/apps/user/profile-2.html" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-rocket-1 kt-font-danger"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title kt-font-bold">
                                    My Activities
                                </div>
                                <div class="kt-notification__item-time">
                                    Logs and notifications
                                </div>
                            </div>
                        </a>
                        <a href="demo1/custom/apps/user/profile-3.html" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-hourglass kt-font-brand"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title kt-font-bold">
                                    My Tasks
                                </div>
                                <div class="kt-notification__item-time">
                                    latest tasks and projects
                                </div>
                            </div>
                        </a>

                        <a href="demo1/custom/apps/user/profile-1/overview.html" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-cardiogram kt-font-warning"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title kt-font-bold">
                                    Billing
                                </div>
                                <div class="kt-notification__item-time">
                                    billing & statements <span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--pill kt-badge--rounded">2 pending</span>
                                </div>
                            </div>
                        </a> --}}

                        <div class="kt-notification__custom kt-space-between">

                          <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>

                            <a href="#" onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();" class="btn btn-label btn-label-brand btn-sm btn-bold">{{ __('Logout') }}</a>

                            {{-- <a href="demo1/custom/user/login-v2.html" target="_blank" class="btn btn-clean btn-sm btn-bold">Upgrade Plan</a> --}}
                        </div>
                    </div>
                    <!--end: Navigation -->
                </div>

            </div>
            <!--end: User Bar -->
        </div>
        <!-- end:: Header Topbar -->
    </div>
    <!-- end:: Header -->
