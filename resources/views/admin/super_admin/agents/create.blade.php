@extends('admin.app')

@section('page-title', 'New Agent')

@section('page-css')
@endsection



@section('main-content')


  @section('subheader')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
              Agent
            </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                    <span class="kt-subheader__desc" id="kt_subheader_total">
                      Create New
                    </span>
                </div>
            </div>
            <div class="kt-subheader__toolbar">
              <a href="{{url()->previous()}}" class="btn btn-default btn-bold"> << Back </a>
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


    <!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						New Agent
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<form class="kt-form kt-form--fit kt-form--label-right" id="new_agent" action="{{route('agent.store')}}" method="post" >
        @csrf
				<div class="kt-portlet__body">
					<div class="form-group row">
						<label class="col-lg-2 col-form-label">Firstname :</label>
						<div class="col-lg-3">
							<input type="text" class="form-control" name="firstname" placeholder="Enter First Name" required>
							<span class="form-text text-muted">Please enter agent firstname</span>
						</div>
						<label class="col-lg-2 col-form-label">Lastname</label>
						<div class="col-lg-3">
							<input type="text" class="form-control" name="lastname" placeholder="Enter Last Name" required>
							<span class="form-text text-muted">Please enter agent lastname</span>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-2 col-form-label">Company Name :</label>
						<div class="col-lg-3">
							<div class="kt-input-icon">
								<input type="text" class="form-control" name="company_name" placeholder="Enter Company Name" required>
								<span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la a-building"></i></span></span>
							</div>
							<span class="form-text text-muted">Please enter agent company name</span>
						</div>
						<label class="col-lg-2 col-form-label">Email :</label>
            <div class="col-lg-3">
							<div class="kt-input-icon">
								<input type="email" name="email" class="form-control" placeholder="Enter Email" autocomplete="new-password" required>
								<span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-envelope"></i></span></span>
							</div>
							<span class="form-text text-muted">Please enter agent Email</span>
						</div>
					</div>
          <div class="form-group row">
						<label class="col-lg-2 col-form-label">Contact no :</label>
						<div class="col-lg-3">
							<div class="kt-input-icon">
								<input type="tel" id="phone_no" name="contact" class="form-control" placeholder="Enter Contact No" required>
								<span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-phone"></i></span></span>
							</div>
							<span class="form-text text-muted">Please enter agent Contact no</span>
						</div>
					</div>
	            </div>
	            <div class="kt-portlet__foot kt-portlet__foot--fit-x">
					<div class="kt-form__actions">
						<div class="row">
							<div class="col-lg-2"></div>
							<div class="col-lg-10">
								<button type="submit" class="btn btn-success">Submit</button>
								<button type="reset" class="btn btn-secondary">Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			<!--end::Form-->
		</div>
		<!--end::Portlet-->


@endsection

@section('page-scripts')
<script src="{{asset('admin/assets/js/demo1/pages/crud/forms/validation/form-controls.js')}}" type="text/javascript"></script>
@endsection
