@extends('admin.app')

@section('page-title', 'Upload Excel')

@section('page-css')
@endsection



@section('main-content')

  @section('subheader')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">

                <h3 class="kt-subheader__title">
                  Upload Excel
                </h3>

                <span class="kt-subheader__separator kt-subheader__separator--v"></span>

                <div class="kt-subheader__group" id="kt_subheader_search">
                    <span class="kt-subheader__desc" id="kt_subheader_total">
                      Add Excel Data to Digital Form
                    </span>
                </div>

              </div>
            <div class="kt-subheader__toolbar">
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
    <!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Upload Excel Bulk Data to id4u
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<form class="kt-form kt-form--fit kt-form--label-right" action="{{route('upload.excel')}}" enctype="multipart/form-data" method="post">
        @csrf
				<div class="kt-portlet__body">
					<div class="form-group row">
						<label class="col-lg-2 col-form-label">Upload Excel</label>
            <div class="custom-file col-lg-3">
						  	<input type="file" class="custom-file-input" name="excel_data" id="excel_data">
						  	<label style="text-align:left;" class="custom-file-label" for="excel_data">Choose Excel</label>
                <span class="form-text text-muted">Please Upload your Excel</span>
						</div>
            &nbsp;
						<label class="col-lg-2 col-form-label">Empty Excel</label>
						<div class="col-lg-3">
							<a href="{{route('upload.example')}}" class="btn btn-pill btn-warning"><i class="fa fa-download"></i> Download Excel</a>
							<span class="form-text text-muted">Please download this excel and enter your data according to this file,<br /> <b>Note : Don't change any column names</b></span>
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
@endsection
