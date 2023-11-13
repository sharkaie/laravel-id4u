@extends('admin.app')

@section('page-title', 'Check Fields')

@section('page-css')

@endsection

@section('main-content')
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
                      Create
                    </span>
                </div>
            </div>
            <div class="kt-subheader__toolbar">
              <a href="{{route('form.index')}}" class="btn btn-label-dark btn-bold btn-sm btn-icon-h kt-margin-l-10"> << Back </a>
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
        Fields
      </h3>
    </div>
    <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
  <div class="kt-portlet__head-actions">

    &nbsp;
    <a href="{{route('form.create')}}" class="btn btn-brand btn-elevate btn-icon-sm"><i class="la la-plus"></i>New Form</a>
  </div>
  </div>		</div>
  </div>

  <div class="kt-portlet__body">

  <!--begin: Datatable -->
  <table class="table table-striped- table-bordered table-hover" id="view_fields">
                <thead>
                  <tr>
                      <th>Sr. no</th>
                      <th>ID</th>
                      <th>Field Name</th>
                      <th>Field Type</th>
                      <th>Actions</th>
                    </tr>
          </thead>

              <tbody>
                @foreach ($fields as $field)
                  <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$field->id}}</td>
                    <td>{{$field->name}}</td>
                    <td>{{$field->type}}&nbsp;@if ($field->type=='Options')
                      <a href="{{route('field.options.index', ['customer_id'=>$id, 'field_id'=>$field->id])}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View Options">
                        <i class="la la-eye"></i>
                      </a>
                    @endif</td>
                    <td>
                      <form id="delete{{$field->id}}" action="{{route('field.delete', $field->id)}}" style="display:none;" method="post">
                        @csrf;
                        @method('delete')
                      </form>
                    <a href="#" onclick="
                    swal.fire({
                        title: 'Are you sure to delete?',
                        text: 'You won\'t be able to revert this!',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!'
                    }).then(function(result) {
                        if (result.value) {
                          event.preventDefault();
                          document.getElementById('delete{{$field->id}}').submit();
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
