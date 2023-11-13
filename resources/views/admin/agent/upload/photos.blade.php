@extends('admin.app')

@section('page-title', 'Upload Photos')

@section('page-css')
  <link rel="stylesheet" href="{{asset('user/cropper/css/slim.min.css')}}">
  <style media="screen">
          .slim .slim-area .slim-status .slim-label{
            font-size: 15px;
          }
        </style>
@endsection



@section('main-content')

@if($user_pass == '1')
  @section('subheader')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">

                <h3 class="kt-subheader__title">
                  Upload Photos
                </h3>

                <span class="kt-subheader__separator kt-subheader__separator--v"></span>

                <div class="kt-subheader__group " id="kt_subheader_search">
                    <span class="kt-subheader__desc" id="kt_subheader_total">
                      Add
                    </span>

                </div>

              </div>
            <div class="kt-subheader__toolbar">
              <button type="button" onclick="event.preventDefault(); document.getElementById('data-entry').submit();" class="btn btn-success btn-elevate-hover btn-square"><i class="fa fa-pen"></i>&nbsp;Save</button>
              &nbsp;&nbsp;&nbsp;
              <a href="{{url()->previous()}}" class="btn btn-default btn-dark">Back</a>
            </div>
        </div>
    </div>
  @endsection

  @if (session('notification'))
      <script type="text/javascript">
      setTimeout(function(){
        toastr.options = {
        'closeButton': false,'debug': false,'newestOnTop': true,'progressBar': false,'positionClass': 'toast-top-right','preventDuplicates': false,'onclick': null,'showDuration': '300','hideDuration': '1000',
        'timeOut': '5000','extendedTimeOut': '3000','showEasing': 'swing','hideEasing': 'linear','showMethod': 'fadeIn','hideMethod': 'fadeOut'
      };

      toastr['{{session('notification_type')}}']('{{session('notification_title')}}', '{{session('notification')}}');
    }, 1000);
      </script>
    @endif

    @if($errors->any())
      @foreach ($errors->all() as $error)
      <script type="text/javascript">
      setTimeout(function(){
        toastr.options = {
        'closeButton': false,'debug': false,'newestOnTop': true,'progressBar': false,'positionClass': 'toast-top-right','preventDuplicates': false,'onclick': null,'showDuration': '300','hideDuration': '1000',
        'timeOut': '10000','extendedTimeOut': '3000','showEasing': 'swing','hideEasing': 'linear','showMethod': 'fadeIn','hideMethod': 'fadeOut'
      };

          toastr['error']('Form error', '{{$error}}');
        }, 1000);
        </script>
      @endforeach
    @endif


<form id="data-entry" action="{{route('uploads.photos')}}" method="post">
  @csrf
      <div class="row">
      @foreach ($data as $entry)
      <div class="col-lg-6">
        <div style="padding-left:1.5rem;padding-right:1.5rem;padding-top:0.3rem;padding-bottom:0.3rem;" class="kt-portlet kt-callout">
          <div style="padding: 10px;" class="kt-portlet__body">
            <div class="kt-callout__body">
              <div class="kt-callout__content">
                <p class="kt-callout__desc kt-font-dark">
                    @foreach ($fields as $field)
                      @php
                        $field_name = $field->name;
                      @endphp
        							<b style="color:#444445">{{$field->name}} :&nbsp;</b>{{$entry->$field_name}}<br />
        					  @endforeach
                </p>

              </div>
              <div style="width:20%;" class="kt-callout__action slim"
                data-label="Choose or Select Photo"
                data-ratio="327:400"
                data-size="327,400"
                data-instant-edit="true"
                data-save-initial-image="true"
                 id="my-cropper" >
                  <input type="file" name="photo_{{$entry->id}}" accept="image/png, image/jpeg"/>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

</form>
@else
  <div class="alert alert-warning alert-elevate" role="alert">
    <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
    <div class="alert-text">
      Please Select Customer to Show Data, by click on right side user floating button
    </div>
  </div>
@endif
<ul class="kt-sticky-toolbar" >
    <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--danger" id="kt_demo_panel_toggle" data-toggle="kt-tooltip" title="Change User" data-placement="right">
        <a href="#" class=""><i class="flaticon2-user-1"></i></a>
    </li>
</ul>

<!-- begin::Demo Panel -->

<div id="kt_demo_panel" class="kt-demo-panel">
    <div class="kt-demo-panel__head">
        <h3 class="kt-demo-panel__title">
            Select Customer
        </h3>
        <a href="#" class="kt-demo-panel__close" id="kt_demo_panel_close"><i class="flaticon2-delete"></i></a>
    </div>

    <div class="kt-demo-panel__body">
      <form method="post" id="user-selection" action="{{route('set_customer')}}">
        @csrf

      <div class="form-group">
        <label for="customer">Customer</label>
          <select class="form-control kt-select2" onchange="event.preventDefault(); document.getElementById('user-selection').submit();" name="customer" id="customer" required>
              <option value="">----Select----</option>
              @foreach ($customers as $user)
                  <option value="{{$user->id}}" >{{$user->company_name}}</option>
              @endforeach
          </select>

      </div>
    </form>

    </div>
</div>
@endsection

@section('page-scripts')
  <script src="{{asset('user/cropper/js/slim.kickstart.min.js')}}"></script>
@endsection
