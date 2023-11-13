<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8">

        <title>Digital Form | ID FORM</title>
        <meta name="description" content="Wizard examples">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--begin::Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">        <!--end::Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet"> 
        <style media="screen">
          .slim .slim-area .slim-status .slim-label{
            font-size: 40px;
          }
        </style>

                    <!--begin::Page Custom Styles(used by this page) -->
                             <link href="{{asset('admin/assets/css/demo1/pages/wizard/wizard-3.css')}}" rel="stylesheet" type="text/css" />
                        <!--end::Page Custom Styles -->

        <!--begin:: Global Mandatory Vendors -->
<link href="{{asset('admin/assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css" />
<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<link href="{{asset('admin/assets/vendors/general/tether/dist/css/tether.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/general/select2/dist/css/select2.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/general/sweetalert2/dist/sweetalert2.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/custom/vendors/flaticon/flaticon.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/custom/vendors/flaticon2/flaticon.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin/assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css" />

<!--end:: Global Optional Vendors -->
<style>
    .boxandshadow{
        border-radius:0px; border:0px;box-shadow:0px 0px 18px 0px rgb(0 0 0 / 0.15);
    }
    label{
        color:#676767;
    }
</style>
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
          <h2 style="padding-top:1rem;" align="center">{{ $customer_info->company_name }}</h2>
          <h6 align="center">{{ $customer_info->address }}</h6>





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
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          <!--begin: Form Wizard Form-->
          <form class="kt-form" id="kt_form" enctype="multipart/form-data" method="post" data-route="{{route('dataformnew')}}" style="padding-top: 0px;">
            @csrf
            <input type="hidden" name="form_id" value="{{ $form_id }}">
            <!--begin: Form Wizard Step 1-->
            <div class="kt-wizard-v3__content" data-ktwizard-type="step-content" data-ktwizard-state="current">

                <div class="kt-wizard-v3__form" >
                  <div class="slim"
                  data-label="Click Here for Photo"
                  data-ratio="327:400"
                  data-size="327,400"
                  data-instant-edit="true"
                  data-save-initial-image="true"
                   id="my-cropper" >
                    @if (Request::is('digital-form/edit'))
                      @isset($values)
                        @foreach ($values as $value)
                          <img src="data:image/png;base64,@php echo $value->photo; @endphp" alt=""/>
                        @endforeach
                      @endisset
                    @endif
                  <input type="file" name="photo" accept="image/png, image/jpeg" required/>


                  </div>

                </div>

            </div>
            <!--end: Form Wizard Step 1-->

            <!--begin: Form Wizard Step 2-->
            <div class="kt-wizard-v3__content" data-ktwizard-type="step-content">
              <p align="center" style="text-align:center;" class="kt-font-danger">Please Fill the Relevent information Carefully</p>
              <div class="kt-form__section kt-form__section--first">
                <div class="kt-wizard-v3__form">
                  @foreach ($fields as $field)
                    @switch($field->type)
                      @case('Text')
                      <div class="form-group">
                        <label>{{ $field->name }} *</label>
                        @if (Request::is('digital-form/edit'))
                          @isset($values)
                            @foreach ($values as $value)
                              @php
                              $field_name = $field->name;
                              @endphp
                              <input style="box-shadow: 0px 0px 18px 0px rgb(0 0 0 / 0.06);border-radius:0px;border:0px;" type="text" class="form-control" name="{{ $field->name }}" value="{{ $value->$field_name }}" autocapitalize="words" placeholder="Type here ..." required>
                            @endforeach
                          @endisset
                        @else
                          <input style="box-shadow: 0px 0px 18px 0px rgb(0 0 0 / 0.06);border-radius:0px;border:0px;" type="text" class="form-control" name="{{ $field->name }}" autocapitalize="words" placeholder="Type here ..." required>
                        @endif

                      </div>
                        @break

                      @case('Number')
                      <div class="form-group">
                        <label>{{ $field->name }} *</label>
                        @if (Request::is('digital-form/edit'))
                          @isset($values)
                            @foreach ($values as $value)
                              @php
                              $field_name = $field->name;
                              @endphp
                              <input style="box-shadow: 0px 0px 18px 0px rgb(0 0 0 / 0.06);border-radius:0px;border:0px;" type="number" class="form-control" name="{{ $field->name }}" value="{{ $value->$field_name }}" placeholder="Type here ..." required>
                            @endforeach
                          @endisset
                        @else
                        <input style="box-shadow: 0px 0px 18px 0px rgb(0 0 0 / 0.06);border-radius:0px;border:0px;" type="number" class="form-control" name="{{ $field->name }}" placeholder="Type here ..." required>
                        @endif
                      </div>
                        @break

                      @case('Mobile')
                      <div class="form-group">
                        <label>{{ $field->name }} *</label>
                        @if (Request::is('digital-form/edit'))
                          @isset($values)
                            @foreach ($values as $value)
                              @php
                              $field_name = $field->name;
                              @endphp
                              <input style="box-shadow: 0px 0px 18px 0px rgb(0 0 0 / 0.06);border-radius:0px;border:0px;" type="tel" class="form-control" pattern="[1-9]{1}[0-9]{9}" title="Enter 10 digit mobile number" name="{{ $field->name }}" id="{{ $field->name }}" value="{{ $value->$field_name }}" placeholder="Type here ..." required>
                            @endforeach
                          @endisset
                        @else
                        <input style="box-shadow: 0px 0px 18px 0px rgb(0 0 0 / 0.06);border-radius:0px;border:0px;" type="tel" class="form-control" pattern="[1-9]{1}[0-9]{9}" title="Enter 10 digit mobile number" name="{{ $field->name }}" id="{{ $field->name }}" placeholder="Type here ..." required>
                        @endif
                      </div>
                        @break

                      @case('Date')
                       <div class="form-group">
                        <label>{{ $field->name }} *</label>
                        <table>
                          <tr>
                            <td><select style="box-shadow: 0px 0px 18px 0px rgb(0 0 0 / 0.06);border-radius:0px;border:0px;" name="{{$field->name}}dt" class="form-control" required>
                              <option value="">DD</option>
                              @for ($i = 1; $i <= 31; $i++)
                                @if (Request::is('digital-form/edit'))
                                  @isset($values)
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
                                  @endisset
                                @else
                                  @php
                                  if(strlen($i)== '1'){
                                    $i = "0".$i;
                                  }
                                  @endphp
                                <option value="{{$i}}">{{$i}}</option>
                                @endif
                              @endfor
                            </select></td>
                            <td><select style="box-shadow: 0px 0px 18px 0px rgb(0 0 0 / 0.06);border-radius:0px;border:0px;" name="{{$field->name}}mt" class="form-control" required>
                              <option value="">MM</option>
                              @for ($i = 01; $i <= 12; $i++)
                                @if (Request::is('digital-form/edit'))
                                  @isset($values)
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
                                  @endisset
                                @else
                                  @php
                                  if(strlen($i)== '1'){
                                    $i = "0".$i;
                                  }
                                  @endphp
                                <option value="{{$i}}">{{$i}}</option>
                                @endif
                              @endfor
                            </select></td>
                            <td><select style="box-shadow: 0px 0px 18px 0px rgb(0 0 0 / 0.06);border-radius:0px;border:0px;" name="{{$field->name}}yr" class="form-control" required>
                              <option value="">YY</option>
                              @for ($i = now()->year + 30; $i >= 1930; $i--)
                                @if (Request::is('digital-form/edit'))
                                  @isset($values)
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
                                  @endisset
                                @else
                                <option value="{{$i}}">{{$i}}</option>
                                @endif
                              @endfor
                            </select></td>
                          </tr>
                        </table>
                      </div>
                        @break
                        
                        @case('Date_extended')
                       <div class="form-group">
                        <label>{{ $field->name }} *</label>
                        <table>
                          <tr>
                            <td><select style="box-shadow: 0px 0px 18px 0px rgb(0 0 0 / 0.06);border-radius:0px;border:0px;" name="{{$field->name}}dt" class="form-control" required>
                              <option value="">DD</option>
                              @for ($i = 1; $i <= 31; $i++)
                                @if (Request::is('digital-form/edit'))
                                  @isset($values)
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
                                  @endisset
                                @else
                                  @php
                                  if(strlen($i)== '1'){
                                    $i = "0".$i;
                                  }
                                  @endphp
                                <option value="{{$i}}">{{$i}}</option>
                                @endif
                              @endfor
                            </select></td>
                            <td><select style="box-shadow: 0px 0px 18px 0px rgb(0 0 0 / 0.06);border-radius:0px;border:0px;" name="{{$field->name}}mt" class="form-control" required>
                              <option value="">MM</option>
                              @for ($i = 01; $i <= 12; $i++)
                                @if (Request::is('digital-form/edit'))
                                  @isset($values)
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
                                  @endisset
                                @else
                                  @php
                                  if(strlen($i)== '1'){
                                    $i = "0".$i;
                                  }
                                  @endphp
                                <option value="{{$i}}">{{$i}}</option>
                                @endif
                              @endfor
                            </select></td>
                            <td><select style="box-shadow: 0px 0px 18px 0px rgb(0 0 0 / 0.06);border-radius:0px;border:0px;" name="{{$field->name}}yr" class="form-control" required>
                              <option value="">YY</option>
                              @for ($i = now()->year+60; $i >= 1950; $i--)
                                @if (Request::is('digital-form/edit'))
                                  @isset($values)
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
                                  @endisset
                                @else
                                <option value="{{$i}}">{{$i}}</option>
                                @endif
                              @endfor
                            </select></td>
                          </tr>
                        </table>
                      </div>
                        @break

                      @case('Email')
                      <div class="form-group">
                        <label>{{ $field->name }} *</label>
                        @if (Request::is('digital-form/edit'))
                          @isset($values)
                            @foreach ($values as $value)
                              @php
                              $field_name = $field->name;
                              @endphp
                              <input style="box-shadow: 0px 0px 18px 0px rgb(0 0 0 / 0.06);border-radius:0px;border:0px;" type="email" class="form-control" name="{{ $field->name }}" value="{{ $value->$field_name }}" placeholder="Type here ..." required>
                            @endforeach
                          @endisset
                        @else
                        <input style="box-shadow: 0px 0px 18px 0px rgb(0 0 0 / 0.06);border-radius:0px;border:0px;" type="email" class="form-control" name="{{ $field->name }}"  placeholder="Type E-Mail here ..." required>
                        @endif
                      </div>
                        @break

                      @case('Options')
                      <div class="form-group">
                        <label>{{ $field->name }}</label>
                         <select style="box-shadow: 0px 0px 18px 0px rgb(0 0 0 / 0.06);border-radius:0px;border:0px;" name="{{ $field->name }}" class="form-control" required>
                          <option value="">Select {{ $field->name }}</option>
                          @foreach ($field_options as $field_option)
                            @if ($field->id == $field_option->field_id)
                              @if (Request::is('digital-form/edit'))
                                @isset($values)
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
                                @endisset
                              @else
                                <option value="{{$field_option->option_name}}" >{{$field_option->option_name}}</option>
                              @endif

                            @endif
                          @endforeach
                        </select>
                      </div>
                        @break
                        
                        
                        @case('Gender')
                      <div class="form-group">
                        <label>Gender</label>
                        <select style="box-shadow: 0px 0px 18px 0px rgb(0 0 0 / 0.06);border-radius:0px;border:0px;" name="{{ $field->name }}" class="form-control" required>
                          <option value="" >Select Gender</option>
                          @if (Request::is('digital-form/edit'))
                            @isset($values)
                              @foreach ($values as $value)
                                @php
                                $field_name = $field->name;
                                @endphp
                                <option value="Male" @if($value->$field_name == 'Male') {{'selected'}} @endif>Male</option>
                                <option value="Female" @if($value->$field_name == 'Female') {{'selected'}} @endif>Female</option>
                                <option value="Others" @if($value->$field_name == 'Others') {{'selected'}} @endif>Others</option>
                              @endforeach
                            @endisset
                          @else
                            <option value="Male" >Male</option>
                            <option value="Female" >Female</option>
                            <option value="Others" >Others</option>

                          @endif

                        </select>
                      </div>
                        @break

                      @case('Calender')
                      <div class="form-group">
                				<label>@if($loc == 'hi'){{ $field->name_hi }}@else {{ $field->name }} @endif</label>
                					<input style="box-shadow: 0px 0px 18px 0px rgb(0 0 0 / 0.06);border-radius:0px;border:0px;" type="text" class="form-control" name="{{ $field->name }}" id="kt_datepicker_1" readonly placeholder="Select Date"/>
                			</div>
                        @break

                      @case('Blood-Group')
                      <div class="form-group">
                        <label>Blood Group</label>
                        <select style="box-shadow: 0px 0px 18px 0px rgb(0 0 0 / 0.06);border-radius:0px;border:0px;" name="{{ $field->name }}" class="form-control" required>
                          <option value="" >Select Blood Group</option>
                          @if (Request::is('digital-form/edit'))
                            @isset($values)
                              @foreach ($values as $value)
                                @php
                                $field_name = $field->name;
                                @endphp
                                <option value="A + ve" @if($value->$field_name == 'A + ve') {{'selected'}} @endif>A + ve</option>
                                <option value="A - ve" @if($value->$field_name == 'A - ve') {{'selected'}} @endif>A - ve</option>
                                <option value="B + ve" @if($value->$field_name == 'B + ve') {{'selected'}} @endif>B + ve</option>
                                <option value="B - ve" @if($value->$field_name == 'B - ve') {{'selected'}} @endif>B - ve</option>
                                <option value="AB + ve" @if($value->$field_name == 'AB + ve') {{'selected'}} @endif>AB + ve</option>
                                <option value="AB - ve" @if($value->$field_name == 'AB - ve') {{'selected'}} @endif>AB - ve</option>
                                <option value="O + ve" @if($value->$field_name == 'O + ve') {{'selected'}} @endif>O + ve</option>
                                <option value="O - ve" @if($value->$field_name == 'O - ve') {{'selected'}} @endif>O - ve</option>
                                <option value="-" @if($value->$field_name == '-') {{'selected'}} @endif>-</option>
                              @endforeach
                            @endisset
                          @else
                            <option value="-" >-</option>
                            <option value="A + ve" >A + ve</option>
                            <option value="A - ve" >A - ve</option>
                            <option value="B + ve" >B + ve</option>
                            <option value="B - ve" >B - ve</option>
                            <option value="AB + ve">AB + ve</option>
                            <option value="AB - ve">AB - ve</option>
                            <option value="O + ve" >O + ve</option>
                            <option value="O - ve" >O - ve</option>

                          @endif

                        </select>
                      </div>
                        @break

                      @default
                        Error Field
                    @endswitch
                  @endforeach
                  <div class="form-group">
        							<div class="kt-checkbox-inline">
        								<label class="kt-checkbox kt-checkbox--dark kt-font-dark" >
        								<input type="checkbox" name="accept" required> I accept that the above Information is true and correct
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
              <button style="border:0px;border-radius:0px;" class="btn btn-warning btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-prev">
                Previous
              </button>
              <button style="border:0px;border-radius:0px;" class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-submit">
                Submit
              </button>
              <button style="border:0px;border-radius:0px;" class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-next">
                Next
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
<script src="{{asset('admin/assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/assets/vendors/general/sticky-js/dist/sticky.min.js')}}" type="text/javascript"></script>
<!--<script src="{{asset('admin/assets/vendors/general/wnumb/wNumb.js')}}" type="text/javascript"></script>-->
<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<script src="{{asset('admin/assets/vendors/general/jquery-form/dist/jquery.form.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/assets/vendors/general/jquery-validation/dist/jquery.validate.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/assets/vendors/general/jquery-validation/dist/additional-methods.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/assets/vendors/custom/js/vendors/jquery-validation.init.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/assets/vendors/general/sweetalert2/dist/sweetalert2.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/assets/vendors/custom/js/vendors/sweetalert2.init.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/assets/vendors/general/jquery.repeater/src/lib.js')}}" type="text/javascript"></script>
<script src="{{asset('admin/assets/vendors/general/jquery.repeater/src/jquery.input.js')}}" type="text/javascript"></script>
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
