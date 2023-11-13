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
          <a href="{{route('forms.create')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="la la-plus"></i>New Form</a>
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
                    <a href="{{route('fields.show', $digital_form->customer_id)}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View Fields">
                      <i class="la la-list-alt"></i>
                    </a>
                    <form id="delete{{$digital_form->id}}" action="{{route('forms.destroy', $digital_form->id)}}" style="display:none;" method="post">
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
@endsection

@section('page-scripts')

@endsection
