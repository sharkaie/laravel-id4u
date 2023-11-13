@extends('admin.app')

@section('page-title', 'Upload Excel')

@section('page-css')
@endsection



@section('main-content')

  @if($user_pass == '1')

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
                      {{$agent_info->company_name}}&nbsp;({{$customer->company_name}})
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
			<form class="kt-form kt-form--fit kt-form--label-right" action="{{route('uploadsa.excel')}}" enctype="multipart/form-data" method="post">
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
							<a href="{{route('uploadsa.example')}}" class="btn btn-pill btn-warning"><i class="fa fa-download"></i> Download Excel</a>
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
  @else
    <div class="alert alert-warning alert-elevate" role="alert">
      <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
      <div class="alert-text">
        Please Select Agent & Customer to Show Data, by click on right side user floating button
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
	            Select Agent & Customer
	        </h3>
	        <a href="#" class="kt-demo-panel__close" id="kt_demo_panel_close"><i class="flaticon2-delete"></i></a>
	    </div>

      <div class="kt-demo-panel__body">
				<form method="post" id="user-selection" action="{{route('set_user')}}">
					@csrf
				<div class="form-group">
					<label for="agent">Agent</label>
						<select class="form-control kt-select2" id="agent" name="agent" required>
              <option value="">----Select----</option>
              @foreach ($agents as $agent)
                  <option value="{{$agent->id}}" >{{$agent->company_name}}</option>
              @endforeach
						</select>

				</div>

				<div class="form-group">
					<label for="customer">Customer</label>
					<select class="form-control kt-select2" onchange="event.preventDefault(); document.getElementById('user-selection').submit();" name="customer" id="customer" required>
						<option value="">----Select----</option>
					</select>
				</div>
			</form>

	    </div>
	</div>

@endsection

@section('page-scripts')
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
