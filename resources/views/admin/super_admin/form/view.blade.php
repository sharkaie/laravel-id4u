@extends('admin.app')

@section('page-title', 'View Forms')

@section('page-css')

@endsection

@section('main-content')
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


@if($user_pass == '1')
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
                      View
                    </span>
                </div>
                @php
                    $agent_name = $agent_info->firstname." ".$agent_info->lastname;
                @endphp
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <h3 class="kt-subheader__title">
                  Customer
                </h3>
                    <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                    <div class="kt-subheader__group" id="kt_subheader_search">
                        <span class="kt-subheader__desc" id="kt_subheader_total">
                          {{$agent_name}}
                        </span>
                    </div>
            </div>
            <div class="kt-subheader__toolbar">
              <a href="{{url()->previous()}}" class="btn btn-label-dark btn-bold btn-sm btn-icon-h kt-margin-l-10"> << Back </a>
            </div>
        </div>
    </div>
  @endsection
  <div class="kt-portlet kt-portlet--mobile">

  <div class="kt-portlet__head kt-portlet__head--lg">
    <div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon">
        <i class="kt-font-brand flaticon2-line-chart"></i>
      </span>
      <h3 class="kt-portlet__head-title">
        Digital Form
      </h3>
    </div>
    <div class="kt-portlet__head-toolbar">
      <div class="kt-portlet__head-wrapper">
        <div class="kt-portlet__head-actions">
          <a href="{{route('form.create')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="la la-plus"></i>New Form</a>
        </div>
      </div>
    </div>
  </div>

  <div class="kt-portlet__body">

  <!--begin: Datatable -->
  <table class="table table-striped- table-bordered table-hover" id="view_digital_forms">
                <thead>
                  <tr>
                      <th>Sr. no</th>
                      <th>ID</th>
                      <th>Customer ID</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Lot no</th>
                      <th>Status</th>
                      <th>Expiry Date</th>
                      <th>Last Updated</th>
                      <th>Created on</th>
                      <th>Actions</th>
                    </tr>
          </thead>

              <tbody>
                @foreach ($digital_forms as $digital_form)
                  <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$digital_form->id}}</td>
                    <td>{{$digital_form->customer_id}}</td>
                    <td>{{$digital_form->username}}</td>
                    <td>{{$digital_form->pass_id}}</td>
                    <td><span class="kt-badge kt-badge--info kt-badge--inline kt-badge--pill">{{$digital_form->lot_meter}}</span></td>
                    <td>{{$digital_form->status}}</td>
                    <td>{{$digital_form->expiry_date}}</td>
                    <td>{{$digital_form->updated_at}}</td>
                    <td>{{$digital_form->created_at}}</td>
                    <td>
                        
                   
                    
                    <a href="{{route('field.show', $digital_form->customer_id)}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View Fields">
                      <i class="la la-list-alt"></i>
                    </a>
                    
                    <form id="delete{{$digital_form->id}}" action="{{route('form.destroy', $digital_form->id)}}" style="display:none;" method="post">
                      @csrf;
                      @method('delete')
                    </form>
                    <a href="#" onclick="
                    swal.fire({
                        title: 'Are you sure to delete?',
                        text: 'You won\'t be able to revert this!, Your all data will be deleted Forever!',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!'
                    }).then(function(result) {
                        if (result.value) {
                          event.preventDefault();
                          document.getElementById('delete{{$digital_form->id}}').submit();
                        }
                    });
                    " class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete">
                      <i class="la la-trash"></i>
                    </a>
                  </td>
                  </tr>
                @endforeach
              </tbody>


        </table>
  <!--end: Datatable -->
  </div>
  </div>
@else
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
                      View
                    </span>
                </div>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <h3 class="kt-subheader__title">
                  Customer
                </h3>
                    <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                    <div class="kt-subheader__group" id="kt_subheader_search">
                        <span class="kt-subheader__desc" id="kt_subheader_total">
                          Select Agent
                        </span>
                    </div>
            </div>
            <div class="kt-subheader__toolbar">
              <a href="{{url()->previous()}}" class="btn btn-label-dark btn-bold btn-sm btn-icon-h kt-margin-l-10"> << Back </a>
            </div>
        </div>
    </div>
  @endsection
  <div class="alert alert-warning alert-elevate" role="alert">
    <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
    <div class="alert-text">
      Please Select Agent to Show Results, by click on right side user floating button
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
            Select Agent
        </h3>
        <a href="#" class="kt-demo-panel__close" id="kt_demo_panel_close"><i class="flaticon2-delete"></i></a>
    </div>

    <div class="kt-demo-panel__body">
      <form method="post" id="user-selection" action="{{route('set_agent')}}">
        @csrf
      <div class="form-group">
        <label for="agent">Agent</label>
          <select class="form-control kt-select2" onchange="event.preventDefault(); document.getElementById('user-selection').submit();" id="agent" name="agent" required>
              <option value="">----Select----</option>
              @foreach ($agents as $agent)
                  @php
                    $agent__id = $agent->id;
                    if(isset($agent_info)){
                      $agent_id = $agent_info->id;
                    }else{
                      $agent_id = null;
                    }

                  @endphp
                  <option value="{{$agent->id}}"@if($agent_id == $agent->id) {{'selected'}} @endif >{{$agent->company_name}}</option>
              @endforeach
          </select>

      </div>
    </form>

    </div>
</div>

@endsection

@section('page-scripts')

@endsection
