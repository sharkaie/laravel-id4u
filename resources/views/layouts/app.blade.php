<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'ID4U') }}</title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-139326840-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-139326840-1');
</script>
<script data-ad-client="ca-pub-5583069695727633" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>


    <!--begin::Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">        <!--end::Fonts -->


                <!--begin::Page Custom Styles(used by this page) -->
                         <link href="{{asset('admin/assets/css/demo1/pages/login/login-5.css')}}" rel="stylesheet" type="text/css" />
                    <!--end::Page Custom Styles -->

    <!--begin:: Global Mandatory Vendors -->
<link href="{{asset('admin/assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css" />
<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<link href="{{asset('admin/assets/vendors/general/tether/dist/css/tether.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/general/select2/dist/css/select2.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/general/nouislider/distribute/nouislider.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/general/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/general/quill/dist/quill.snow.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/general/@yaireo/tagify/dist/tagify.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/general/summernote/dist/summernote.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/general/animate.css/animate.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/general/toastr/build/toastr.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/general/dual-listbox/dist/dual-listbox.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/general/morris.js/morris.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/general/sweetalert2/dist/sweetalert2.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/general/socicon/css/socicon.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/custom/vendors/line-awesome/css/line-awesome.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/custom/vendors/flaticon/flaticon.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/custom/vendors/flaticon2/flaticon.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css" />
<!--end:: Global Optional Vendors -->

<!--begin::Global Theme Styles(used by all pages) -->

                <link href="{{asset('admin/assets/css/demo1/style.bundle.css')}}" rel="stylesheet" type="text/css" />
            <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    

<link href="{{asset('admin/assets/css/demo1/skins/header/base/light.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/css/demo1/skins/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/css/demo1/skins/brand/dark.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/css/demo1/skins/aside/dark.css" rel="stylesheet" type="text/css')}}" />        <!--end::Layout Skins -->

    <link rel="shortcut icon" href="{{asset('admin/assets/media/logos/favicon.ico')}}" />
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

            <!-- begin::Global Config(global config for global JS sciprts) -->
            <script>
                var KTAppOptions = {"colors":{"state":{"brand":"#5d78ff","dark":"#282a3c","light":"#ffffff","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
            </script>
            <!-- end::Global Config -->

        	<!--begin:: Global Mandatory Vendors -->
    <script src="{{asset('admin/assets/vendors/general/jquery/dist/jquery.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/popper.js/dist/umd/popper.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/js-cookie/src/js.cookie.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/moment/min/moment.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/sticky-js/dist/sticky.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/wnumb/wNumb.js')}}" type="text/javascript"></script>
    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->
    <script src="{{asset('admin/assets/vendors/general/jquery-form/dist/jquery.form.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/block-ui/jquery.blockUI.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/custom/js/vendors/bootstrap-datepicker.init.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/custom/js/vendors/bootstrap-timepicker.init.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/custom/js/vendors/bootstrap-switch.init.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/select2/dist/js/select2.full.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/typeahead.js/dist/typeahead.bundle.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/handlebars/dist/handlebars.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/nouislider/distribute/nouislider.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/owl.carousel/dist/owl.carousel.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/autosize/dist/autosize.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/clipboard/dist/clipboard.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/dropzone/dist/dropzone.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/custom/js/vendors/dropzone.init.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/quill/dist/quill.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/@yaireo/tagify/dist/tagify.polyfills.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/@yaireo/tagify/dist/tagify.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/summernote/dist/summernote.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/markdown/lib/markdown.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/custom/js/vendors/bootstrap-markdown.init.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/custom/js/vendors/bootstrap-notify.init.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/jquery-validation/dist/jquery.validate.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/jquery-validation/dist/additional-methods.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/custom/js/vendors/jquery-validation.init.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/toastr/build/toastr.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/dual-listbox/dist/dual-listbox.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/raphael/raphael.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/morris.js/morris.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/chart.js/dist/Chart.bundle.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/waypoints/lib/jquery.waypoints.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/counterup/jquery.counterup.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/es6-promise-polyfill/promise.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/sweetalert2/dist/sweetalert2.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/custom/js/vendors/sweetalert2.init.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/jquery.repeater/src/lib.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/jquery.repeater/src/jquery.input.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/jquery.repeater/src/repeater.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/vendors/general/dompurify/dist/purify.js')}}" type="text/javascript"></script>
    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Bundle(used by all pages) -->

    		    	   <script src="{{asset('admin/assets/js/demo1/scripts.bundle.js')}}" type="text/javascript"></script>
    				<!--end::Global Theme Bundle -->


                        <!--begin::Page Scripts(used by this page) -->
                                <script src="{{asset('admin/assets/js/demo1/pages/login/login-general.js')}}" type="text/javascript"></script>
                            <!--end::Page Scripts -->
</body>
</html>
