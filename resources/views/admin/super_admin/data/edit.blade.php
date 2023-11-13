<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8"/>

        <title>Digital Form | ID FORM</title>
        <meta name="description" content="Wizard examples">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--begin::Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">        <!--end::Fonts -->


                    <!--begin::Page Custom Styles(used by this page) -->
                             <link href="{{asset('admin/assets/css/demo1/pages/wizard/wizard-3.css')}}" rel="stylesheet" type="text/css" />
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
<link rel="stylesheet" href="{{asset('user/cropper/css/slim.min.css')}}">

                    <link href="{{asset('admin/assets/css/demo1/style.bundle.css')}}" rel="stylesheet" type="text/css" />
                <!--end::Global Theme Styles -->


        <link rel="shortcut icon" href="{{asset('admin/assets/media/logos/favicon.ico')}}" />
    </head>
    <!-- end::Head -->

    <!-- begin::Body -->
    <body style="background: #fff8eb;">

      <div class="kt-grid kt-wizard-v3" id="kt_wizard_v3" data-ktwizard-state="step-first" >
        @foreach ($customer_info as $customer)
          <h2 align="center">{{ $customer->company_name }}</h2>
          <h6 align="center">{{ $customer->company_address }}</h6>
        @endforeach




        <div class="kt-hidden kt-grid__item">
          <!--begin: Form Wizard Nav -->
          <div class="kt-wizard-v3__nav">
            <div class="kt-wizard-v3__nav-items">
              <!--doc: Replace A tag with SPAN tag to disable the step link click -->
              <a class="kt-wizard-v3__nav-item" href="#" data-ktwizard-type="step" data-ktwizard-state="current">
                <div class="kt-wizard-v3__nav-body">
                  <div class="kt-wizard-v3__nav-label">
                    <span>1</span> Choose your Photo
                  </div>
                  <div class="kt-wizard-v3__nav-bar"></div>
                </div>
              </a>
              <a class="kt-wizard-v3__nav-item" href="#" data-ktwizard-type="step">
                <div class="kt-wizard-v3__nav-body">
                  <div class="kt-wizard-v3__nav-label">
                    <span>2</span> Enter your Details
                  </div>
                  <div class="kt-wizard-v3__nav-bar"></div>
                </div>
              </a>
            </div>
          </div>
          <!--end: Form Wizard Nav -->

        </div>



        <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v3__wrapper" style="background: #fff8eb;">

          <!--begin: Form Wizard Form-->
          <form class="kt-form" id="kt_form" enctype="multipart/form-data" method="post" data-route="{{route('data.getedit')}}">
            @csrf
            <a href="{{ url()->previous() }}" class="btn btn-outline-success"> << Back </a>
            <input type="hidden" name="form_id" value="{{ $form_id }}">
            <!--begin: Form Wizard Step 1-->
            <div class="kt-wizard-v3__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
              <div class="kt-heading kt-heading--md">Choose your Photo</div>
              <div class="kt-form__section kt-form__section--first" >
                <div class="kt-wizard-v3__form" >
                  <div class="slim"
                  data-label="Choose or Select your Photo"
                  data-ratio="270:330"
                  data-size="270,330"
                  data-instant-edit="true"
                  data-save-initial-image="true"
                   id="my-cropper" >
                      @isset($values)
                        @foreach ($values as $value)
                          @if($value->photo != 'empty')
                          <img src="data:image/png;base64,@php echo $value->photo; @endphp" alt=""/>
                        @endif
                          <input type="file" name="photo" accept="image/png, image/jpeg" required/>
                        @endforeach
                      @endisset





                  </div>

                </div>
              </div>
            </div>
            <!--end: Form Wizard Step 1-->

            <!--begin: Form Wizard Step 2-->
            <div class="kt-wizard-v3__content" data-ktwizard-type="step-content">
              <div class="kt-heading kt-heading--md">Fill ID Form Carefully </div>
              <div class="kt-form__section kt-form__section--first">
                <div class="kt-wizard-v3__form">
                  @foreach ($fields as $field)
                    @switch($field->type)
                      @case('Text')
                      <div class="form-group">
                        <label>{{ $field->name }} *</label>

                            @foreach ($values as $value)
                              @php
                              $field_name = $field->name;
                              @endphp
                              <input type="text" class="form-control" name="{{ $field->name }}" value="{{ $value->$field_name }}" placeholder="Type here ..." required>
                            @endforeach


                      </div>
                        @break

                      @case('Number')
                      <div class="form-group">
                        <label>{{ $field->name }} *</label>

                            @foreach ($values as $value)
                              @php
                              $field_name = $field->name;
                              @endphp
                              <input type="number" class="form-control" name="{{ $field->name }}" value="{{ $value->$field_name }}" placeholder="Type here ..." required>
                            @endforeach

                      </div>
                        @break

                      @case('Mobile')
                      <div class="form-group">
                        <label>{{ $field->name }} *</label>

                            @foreach ($values as $value)
                              @php
                              $field_name = $field->name;
                              @endphp
                              <input type="tel" class="form-control" name="{{ $field->name }}" id="{{ $field->name }}" value="{{ $value->$field_name }}" placeholder="Type here ..." required>
                            @endforeach

                      </div>
                        @break
                        
                        @case('Gender')
                        <div class="form-group">
                        <label>Gender</label>
                        <select name="{{ $field->name }}" class="form-control" required>
                          <option value="" selected disabled>Select Blood Group</option>
                          @foreach ($values as $value)
                            @php
                            $field_name = $field->name;
                            @endphp

                          <option value="Male" @if('Male' == $value->$field_name) {{'selected'}} @endif>Male</option>
                          <option value="Female" @if('Female' == $value->$field_name) {{'selected'}} @endif>Female</option>
                          <option value="Others" @if('Others' == $value->$field_name) {{'selected'}} @endif>Others</option>
                            @endforeach
                        </select>
                      </div>
                    @break
                    
                    @case('Date_extended')
                       <div class="form-group">
                        <label>{{ $field->name }} *</label>
                        <table>
                          <tr>
                            <td><select name="{{$field->name}}dt" class="form-control" required>
                              <option value="">DD</option>
                              @for ($i = 1; $i <= 31; $i++)
                                    @foreach ($values as $value)
                                      @php
                                      $field_name = $field->name;
                                      $dex = explode( '.', $value->$field_name);
                                      $dt = $dex['0'];
                                      if(strlen($i)== '1'){
                                        $i = "0".$i;
                                      }
                                      @endphp
                                      @if($dt == $i)
                                        <option value="{{$i}}" selected>{{$i}}</option>
                                      @else
                                        <option value="{{$i}}">{{$i}}</option>
                                      @endif
                                    @endforeach
                              @endfor
                            </select></td>
                            <td><select name="{{$field->name}}mt" class="form-control" required>
                              <option value="">MM</option>
                              @for ($i = 01; $i <= 12; $i++)
                                    @foreach ($values as $value)
                                      @php
                                      $field_name = $field->name;
                                      $mex = explode( '.', $value->$field_name);
                                      $mt = $mex['1'];
                                      if(strlen($i)== '1'){
                                        $i = "0".$i;
                                      }
                                      @endphp
                                      @if($mt == $i)
                                        <option value="{{$i}}" selected>{{$i}}</option>
                                      @else
                                        <option value="{{$i}}">{{$i}}</option>
                                      @endif
                                    @endforeach
                              @endfor
                            </select></td>
                            <td><select name="{{$field->name}}yr" class="form-control" required>
                              <option value="">YY</option>
                              @for ($i = now()->year+60; $i >= 1950; $i--)
                                    @foreach ($values as $value)
                                      @php
                                      $field_name = $field->name;
                                      $yex = explode( '.', $value->$field_name);
                                      $yr = $yex['2'];
                                      @endphp
                                      @if($yr == $i)
                                        <option value="{{$i}}" selected>{{$i}}</option>
                                      @else
                                        <option value="{{$i}}">{{$i}}</option>
                                      @endif
                                    @endforeach
                              @endfor
                            </select></td>
                          </tr>
                        </table>
                      </div>
                        @break

                      @case('Date')
                       <div class="form-group">
                        <label>{{ $field->name }} *</label>
                        <table>
                          <tr>
                            <td><select name="{{$field->name}}dt" class="form-control" required>
                              <option value="">DD</option>
                              @for ($i = 1; $i <= 31; $i++)

                                    @foreach ($values as $value)
                                      @php
                                      $field_name = $field->name;
                                      $dex = explode( '.', $value->$field_name);
                                      $dt = $dex['0'];
                                      if(strlen($i)== '1'){
                                        $i = "0".$i;
                                      }
                                      @endphp
                                      @if($dt == $i)
                                        <option value="{{$i}}" selected>{{$i}}</option>
                                      @else
                                        <option value="{{$i}}">{{$i}}</option>
                                      @endif
                                    @endforeach

                              @endfor
                            </select></td>
                            <td><select name="{{$field->name}}mt" class="form-control" required>
                              <option value="">MM</option>
                              @for ($i = 01; $i <= 12; $i++)

                                    @foreach ($values as $value)
                                      @php
                                      $field_name = $field->name;
                                      $mex = explode( '.', $value->$field_name);
                                      $mt = $mex['1'];
                                      if(strlen($i)== '1'){
                                        $i = "0".$i;
                                      }
                                      @endphp
                                      @if($mt == $i)
                                        <option value="{{$i}}" selected>{{$i}}</option>
                                      @else
                                        <option value="{{$i}}">{{$i}}</option>
                                      @endif
                                    @endforeach

                              @endfor
                            </select></td>
                            <td><select name="{{$field->name}}yr" class="form-control" required>
                              <option value="">YY</option>
                              @for ($i = now()->year; $i >= 1950; $i--)

                                    @foreach ($values as $value)
                                      @php
                                      $field_name = $field->name;
                                      $yex = explode( '.', $value->$field_name);
                                      $yr = $yex['2'];
                                      @endphp
                                      @if($yr == $i)
                                        <option value="{{$i}}" selected>{{$i}}</option>
                                      @else
                                        <option value="{{$i}}">{{$i}}</option>
                                      @endif
                                    @endforeach

                              @endfor
                            </select></td>
                          </tr>
                        </table>
                      </div>
                        @break

                      @case('Email')
                      <div class="form-group">
                        <label>{{ $field->name }} *</label>

                            @foreach ($values as $value)
                              @php
                              $field_name = $field->name;
                              @endphp
                              <input type="email" class="form-control" name="{{ $field->name }}" value="{{ $value->$field_name }}" placeholder="Type here ..." required>
                            @endforeach

                      </div>
                        @break

                      @case('Options')
                      <div class="form-group">
                        <label>{{ $field->name }}</label>
                         <select name="{{ $field->name }}" class="form-control" required>
                          <option value="">Select {{ $field->name }}</option>
                          @foreach ($field_options as $field_option)
                            @if ($field->id == $field_option->field_id)

                                  @foreach ($values as $value)
                                    @php
                                    $field_name = $field->name;
                                    $field_opt = $field_option->option_name;
                                    @endphp
                                    @if($field_opt == $value->$field_name)
                                      <option value="{{$field_option->option_name}}" selected >{{$field_option->option_name}}</option>
                                    @else
                                      <option value="{{$field_option->option_name}}" >{{$field_option->option_name}}</option>
                                    @endif

                                  @endforeach

                            @endif
                          @endforeach
                        </select>
                      </div>
                        @break

                      @case('Blood-Group')
                      <div class="form-group">
                        <label>Blood Group</label>
                        <select name="{{ $field->name }}" class="form-control" required>
                          <option value="" >Select Blood Group</option>
                          @foreach ($values as $value)
                            @php
                            $field_name = $field->name;
                            @endphp

                          <option value="A + ve" @if('A + ve' == $value->$field_name) selected @endif>A + ve</option>
                          <option value="A - ve" @if('A - ve' == $value->$field_name) selected @endif>A - ve</option>
                          <option value="B + ve" @if('B + ve' == $value->$field_name) selected @endif>B + ve</option>
                          <option value="B - ve" @if('B - ve' == $value->$field_name) selected @endif>B - ve</option>
                          <option value="AB + ve" @if('AB + ve' == $value->$field_name) selected @endif>AB + ve</option>
                          <option value="AB - ve" @if('AB - ve' == $value->$field_name) selected @endif>AB - ve</option>
                          <option value="O + ve" @if('O + ve' == $value->$field_name) selected @endif>O + ve</option>
                          <option value="O - ve" @if('O - ve' == $value->$field_name) selected @endif>O - ve</option>
                          <option value="-" @if('-' == $value->$field_name) selected @endif>-</option>
                            @endforeach
                        </select>
                      </div>
                        @break

                      @default
                        Error Field
                    @endswitch
                  @endforeach
                  <div class="form-group">
        							<div class="kt-checkbox-inline">
        								<label class="kt-checkbox">
        								<input type="checkbox" name="accept" required> I accept this Form details are true and sure
        								<span></span>
        								</label>
        							</div>
        					</div>
                </div>
              </div>
            </div>
            <!--end: Form Wizard Step 2-->

            <!--begin: Form Actions -->
            <div class="kt-form__actions">
              <button class="btn btn-warning btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-prev">
                Previous
              </button>
              <button class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-submit">
                Submit
              </button>
              <button class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-next">
                Next Step
              </button>
            </div>
            <!--end: Form Actions -->
          </form>
          <!--end: Form Wizard Form-->
        </div>
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
                            {{-- <script src="{{asset('admin/assets/js/demo1/pages/wizard/digital_form.js')}}" type="text/javascript"></script> --}}
                            <script src="{{asset('user/cropper/js/slim.kickstart.min.js')}}"></script>
                        <!--end::Page Scripts -->
    <script type="text/javascript">
    @include('user.data_validator')
    </script>
  </body>
    <!-- end::Body -->
</html>
