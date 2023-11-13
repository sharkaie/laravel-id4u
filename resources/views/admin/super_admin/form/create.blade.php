@extends('admin.app')

@section('page-title', 'Create Form')

@section('page-css')
  <link href="{{asset('admin/assets/css/demo1/pages/wizard/wizard-3.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('main-content')
  @section('subheader')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
              Digital Form
            </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                    <span class="kt-subheader__desc" id="kt_subheader_total">
                      Create
                    </span>
                </div>
            </div>
            <div class="kt-subheader__toolbar">
              <a href="{{url()->previous()}}" class="btn btn-label-dark btn-bold btn-sm btn-icon-h kt-margin-l-10"> << Back </a>
            </div>
        </div>
    </div>
  @endsection
<div class="kt-portlet">
<div class="kt-portlet__body kt-portlet__body--fit">
<div class="kt-grid kt-wizard-v3 kt-wizard-v3--white" id="kt_wizard_v3" data-ktwizard-state="step-first">
  <div class="kt-grid__item">
    <!--begin: Form Wizard Nav -->
    <div class="kt-wizard-v3__nav">
      <div class="kt-wizard-v3__nav-items">
        <!--doc: Replace A tag with SPAN tag to disable the step link click -->
        <a class="kt-wizard-v3__nav-item" href="#" data-ktwizard-type="step" data-ktwizard-state="current">
          <div class="kt-wizard-v3__nav-body">
            <div class="kt-wizard-v3__nav-label">
              <span>1</span> Enter Details
            </div>
            <div class="kt-wizard-v3__nav-bar"></div>
          </div>
        </a>
        <a class="kt-wizard-v3__nav-item" href="#" data-ktwizard-type="step">
          <div class="kt-wizard-v3__nav-body">
            <div class="kt-wizard-v3__nav-label">
              <span>2</span> Select Fields
            </div>
            <div class="kt-wizard-v3__nav-bar"></div>
          </div>
        </a>
        <a class="kt-wizard-v3__nav-item" href="#" data-ktwizard-type="step">
          <div class="kt-wizard-v3__nav-body">
            <div class="kt-wizard-v3__nav-label">
              <span>3</span> Finalize
            </div>
            <div class="kt-wizard-v3__nav-bar"></div>
          </div>
        </a>
      </div>
    </div>
    <!--end: Form Wizard Nav -->

  </div>
  <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v3__wrapper">
    <!--begin: Form Wizard Form-->
    <form class="kt-form" id="kt_form" method="post" data-route="{{route('form.store')}}">
      @csrf
      <!--begin: Form Wizard Step 1-->
      <div class="kt-wizard-v3__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
        <div class="kt-heading kt-heading--md">Enter Form Details</div>
        <div class="kt-form__section kt-form__section--first">
          <div class="kt-wizard-v3__form">
            <div class="form-group row">
  						<label class="col-form-label col-lg-12 col-sm-12">Select Agent</label>
  						<div class="col-lg-12 col-md-12 col-sm-12">
  							<select class="form-control kt-select2" id="agent" name="refered">
  							    <option value="" selected>Select Agent</option>
                    @foreach ($agents as $agent)
                      <option value="{{$agent->id}}">{{$agent->firstname}} {{$agent->lastname}}</option>
                    @endforeach

  							</select>
  						</div>
  					</div>

            <div class="form-group">
              <label for="customer_select">Select Customer</label>
              <select class="form-control kt-select2" name="customer_id" id="customer" required>
                <option value="">Select Customer</option>
              </select>
            </div>

            <div class="form-group">
              <label>Form Username</label>
              <input type="text" class="form-control" name="form_username" placeholder="Type Here ..." required>
              <span class="form-text text-muted">Please enter Form Username.</span>
            </div>
          </div>
        </div>
      </div>
      <!--end: Form Wizard Step 1-->

      <!--begin: Form Wizard Step 2-->
      <div class="kt-wizard-v3__content" data-ktwizard-type="step-content">
        <div class="kt-heading kt-heading--md">Select Form Fields</div>
        <div class="kt-form__section kt-form__section--first">
          <div class="kt-wizard-v3__form">
            {{-- <label class="col-3 col-form-label">Enable Photo Input</label>
            <div class="col-3">
              <span class="kt-switch kt-switch--icon">
                <label>
                  <input type="checkbox" checked="checked" name="photo_en" value="1">
                  <span></span>
                </label>
              </span>
            </div> --}}
            <div class="kt-scroll" data-scroll="true" data-height="300">

            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                    <th>Select</th>
                    <th>Field</th>
                    <th>Type</th>
                </tr>
              </thead>

                <tbody>

                  @foreach ($fields as $field)
                    <tr>
                      <td>
                        <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                          <input type="checkbox" name="field_id[]" value="{{$field->id}}"><span></span>
                        </label>
                      </td>
                      <td>{{$field->name}}</td>
                      <td>{{$field->type}}</td>
                    </tr>
                  @endforeach
                </tbody>
            </table>

            </div>
            <!-- add checkboxes to table -->


          </div>
        </div>
      </div>
      <!--end: Form Wizard Step 2-->

      <!--begin: Form Wizard Step 3-->
      <div class="kt-wizard-v3__content" data-ktwizard-type="step-content">
        <div class="kt-heading kt-heading--md">Finalize</div>
        <div class="kt-form__section kt-form__section--first">
          <div class="kt-wizard-v3__form">
            <div class="form-group">
              <label>Form Active Duration</label>
              <div class="kt-radio-inline">
                <label class="kt-radio">
                  <input type="radio" name="duration" value="al_tm"> 5 days
                  <span></span>
                </label>
                <label class="kt-radio">
                  <input type="radio" name="duration" value="al_tm"> 10 days
                  <span></span>
                </label>
                <label class="kt-radio">
                  <input type="radio" name="duration" value="al_tm"> 15 days
                  <span></span>
                </label>
                <label class="kt-radio">
                  <input type="radio" name="duration" value="al_tm" checked> All time
                  <span></span>
                </label>
              </div>
              <span class="form-text text-muted">Select duration for Form Active Period</span>
            </div>
            <label class="kt-checkbox kt-checkbox--bold kt-checkbox--success">
              <input type="checkbox" name="accept" value="1"> Accept that form settings are final.
              <span></span>
            </label>
          </div>
        </div>
      </div>
      <!--end: Form Wizard Step 3-->


      <!--begin: Form Actions -->
      <div class="kt-form__actions">
        <button class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-prev">
          Previous
        </button>
        <button type="submit" name="create_form" class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-submit">
          Submit
        </button>
        <button class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-next">
          Next
        </button>
      </div>
      <!--end: Form Actions -->
    </form>
    <!--end: Form Wizard Form-->
  </div>
</div>
</div>
</div>
<script>
    $(document).ready(function(){
        $('#agent').on('change', function(e){
            var agent_id = e.target.value;
            $.get('../json-customers/'+ agent_id,function(data){
              $('#customer').empty();
              $('#customer').append('<option value="" disabled selected>Select Customer</option>');

              $.each(data, function(index, customerObj){
                $('#customer').append('<option value="'+ customerObj.id +'">'+ customerObj.firstname +' '+ customerObj.lastname +'</option>');
              });
            });
        });
    });
    </script>
@endsection

@section('page-scripts')
  <script src="{{asset('admin/assets/js/demo1/pages/wizard/wizard-3.js')}}" type="text/javascript"></script>
@endsection
