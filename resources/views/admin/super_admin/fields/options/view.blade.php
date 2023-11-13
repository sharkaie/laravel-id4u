@extends('admin.app')

@section('page-title', 'View options')

@section('page-css')

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
                      Options
                    </span>
                </div>
            </div>
            <div class="kt-subheader__toolbar">
              <a href="{{route('field.show', $customer_id)}}" class="btn btn-label-dark btn-bold btn-sm btn-icon-h kt-margin-l-10"> << Back </a>
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

  <div class="kt-portlet kt-portlet--mobile">

  <div class="kt-portlet__head kt-portlet__head--lg">
    <div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon">
        <i class="kt-font-brand flaticon2-line-chart"></i>
      </span>
      <h3 class="kt-portlet__head-title">
        Options
      </h3>
    </div>
    <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
  <div class="kt-portlet__head-actions">

    <button type="button" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#add_customer_modal"><i class="la la-plus"></i>Add Option</button>
    <!--begin::Add New-->
    <!--begin::Modal-->
<div class="modal fade" id="add_customer_modal" role="dialog" aria-labelledby="" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="">Add Option</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-remove"></span>
				</button>
			</div>
			<form class="kt-form kt-form--fit kt-form--label-left" id="Add_newOption" action="{{route('field.options.store',$field_id)}}" method="post">
        @csrf
        <div class="modal-body">
            <div class="form-group">
              <label>Option Name</label>
              <input type="text" id="option_name" name="option_name" class="form-control" placeholder="Enter Option Name" autocomplete="new-password" required autofocus>
            </div>
				</div>
				<div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
				</div>
			</form>
		</div>
	</div>
</div>

    <!--end::Add New-->
  </div>
  </div>		</div>
  </div>

  <div class="kt-portlet__body">

  <!--begin: Datatable -->
  <table class="table table-striped- table-bordered table-hover" id="view_options">
                <thead>
                  <tr>
                      <th>Sr. no</th>
                      <th>Option Name</th>
                      <th>Actionss</th>
                    </tr>
          </thead>

              <tbody>
                @foreach ($options as $option)
                  <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$option->option_name}}</td>
                    <td>
                    <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="modal" data-target="#edit{{$option->id}}" title="Edit">
                      <i class="la la-edit"></i>
                    </a>
                    <div class="modal fade" id="edit{{$option->id}}" role="dialog" aria-labelledby="" aria-hidden="true">
                    	<div class="modal-dialog modal-dialog-centered" role="document">
                    		<div class="modal-content">
                    			<div class="modal-header">
                    				<h5 class="modal-title" id="">Edit Option</h5>
                    				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    					<span aria-hidden="true" class="la la-remove"></span>
                    				</button>
                    			</div>
                    			<form class="kt-form kt-form--fit kt-form--label-left" action="{{route('option.edit',$option->id)}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                  <label>Option Name</label>
                                  <input type="text" id="option" name="option" class="form-control" placeholder="Enter New Option Name" value="{{$option->option_name}}" autocomplete="new-password" autofocus required>
                                </div>
                    				</div>
                    				<div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Edit</button>
                    				</div>
                    			</form>
                    		</div>
                    	</div>
                    </div>
                    <form id="delete{{$option->id}}" action="{{route('field.delete_option', $option->id)}}" style="display:none;" method="post">
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
                        document.getElementById('delete{{$option->id}}').submit();
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
<script src="{{asset('admin/assets/js/demo1/pages/crud/forms/validation/form-controls.js')}}" type="text/javascript"></script>
@endsection
