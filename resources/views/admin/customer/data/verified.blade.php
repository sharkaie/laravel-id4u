@extends('admin.app')

@section('page-title', 'Verified Data')

@section('main-content')
		@section('subheader')
			<!-- begin:: Content Head -->
			<div class="kt-subheader  kt-grid__item" id="kt_subheader">
			    <div class="kt-container  kt-container--fluid ">
			        <div class="kt-subheader__main">

			            <h3 class="kt-subheader__title">Verified Entries</h3>

			            <span class="kt-subheader__separator kt-subheader__separator--v"></span>

			            <span class="kt-subheader__desc">View</span>
			        </div>
			        <div class="kt-subheader__toolbar">
			            <div class="kt-subheader__wrapper">

			                                    <a class="btn kt-subheader__btn-daterange" id="kt_dashboard_daterangepicker" data-toggle="kt-tooltip" title="Todays Date" data-placement="left">
			                        <span class="kt-subheader__btn-daterange-title" id="">Today</span>&nbsp;
			                        <span class="kt-subheader__btn-daterange-date" id="">@php echo date("M d"); @endphp</span>
			                        <i class="flaticon2-calendar-1"></i>
			                    </a>

			                <a href="{{url()->previous()}}" class="btn btn-label-dark btn-bold btn-sm btn-icon-h kt-margin-l-10" data-placement="left">
			                    < <&nbsp;&nbsp;Back
			                </a>
			            </div>
			        </div>
			    </div>
			</div>
			<!-- end:: Content Head -->
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

	<div class="kt-portlet kt-portlet--mobile">
		<div class="kt-portlet__head kt-portlet__head--lg">
			<div class="kt-portlet__head-label">
				<span class="kt-portlet__head-icon">
					<i class="kt-font-brand flaticon2-check-mark"></i>
				</span>
				<h3 class="kt-portlet__head-title">
					 <button type="button" class="btn btn-success">Verified Data</button>
				</h3>
			</div>
			<div class="kt-portlet__head-toolbar">
	            <div class="kt-portlet__head-wrapper">
		<div class="kt-portlet__head-actions">
			<button type="button" onclick="window.location.href='{{route('datac.vexport')}}'"  class="btn btn-default btn-icon-sm" ><i class="la la-download"></i> Export
			</button>
		</div>
	</div>
	</div>
		</div>
		@foreach ($datas as $data)
			<form style="display:none;" action="{{ route('datac.destroy', $data->id) }}" method="post" id="delete-form-{{ $data->id }}">
				@csrf
				@method('DELETE')
			</form>
			<form action="{{route('datac.change_status_unverify')}}" id="change-status-unverify-{{$data->id}}" method="post">
				@csrf
				<input type="hidden" name="type" value="single">
				<input type="hidden" name="entry_id" value="{{$data->id}}">
			</form>
		@endforeach

		<div class="kt-portlet__body">
			<div class="row">

			</div>

			<div class="row">
				<form id="filter" class="col-xl-12 col-lg-12 col-md-12 col-sm-12" action="{{route('datac.verified')}}" method="post">
					@csrf
				<button type="button" id="verify_btn" onclick="event.preventDefault(); document.getElementById('multiple-unverify-form').submit();" class="btn btn-outline-danger col-xl-2 col-lg-2 col-md-2 col-sm-2" disabled="true">Unverify Selected</button>
				&nbsp;&nbsp;&nbsp;&nbsp;

				@foreach ($fields as $field)
				@if($field->type == 'Options')

						<select name="{{$field->name}}" class="custom-select form-control col-xl-2 col-lg-2 col-md-2 col-sm-2">
								<option value="">All {{$field->name}}</option>
								@foreach ($options as $option)
									@if ($field->id == $option->field_id)
										<option value="{{$option->option_name}}"
											 @php

										if(session('search')){
											$search = session('search');
											if(isset($search[$field->name])){
												if($search[$field->name] == $option->option_name){
													echo "selected";
												}

											}
										}
										@endphp >{{$option->option_name}}</option>
									@endif
								@endforeach
						</select>


				@endif
			@endforeach
					<button type="submit"  class="btn btn-outline-warning col-xl-2 col-lg-2 col-md-2 col-sm-2" >Sort</button>

</form>
			</div>
			<div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>

			<form action="{{route('datac.change_status_unverify')}}" id="multiple-unverify-form" method="post">
				@csrf
				<input type="hidden" name="type" value="multiple">
			<table class="table table-striped- table-bordered table-hover table-checkable" id="table">
				<thead>
					<tr>
						<td>
							<label class="kt-checkbox kt-checkbox--tick kt-checkbox--success">
								<input type="checkbox" id="select_all"><span></span>
							</label>
						</td>
						<td>Sr no</td>
						<td>ID</td>
						<td>Photo</td>
					  @foreach ($fields as $field)
							<td>{{$field->name}}</td>
					  @endforeach
						<td>Action</td>
					</tr>
				</thead>

	      <tbody>
					@foreach ($datas as $data)

						<tr>
							<td>
								<label class="kt-checkbox kt-checkbox--tick kt-checkbox--success">
									<input type="checkbox" class="varcheck" name="entry_id[]" value ="{{$data->id}}"><span></span>
								</label>
							</td>
							<td>{{$loop->index +1}}</td>
							<td>{{$data->id}}</td>
							<td>
								<img class="lazyload" data-src="data:{{$data->photo_type}};base64,{{$data->photo}}" src="{{asset('admin/assets/js/grey.gif')}}" alt="No Photo" style="height:100px;width:auto;">
							</td>

							@foreach ($fields as $field)
								@php
									$f_name = $field->name;
								@endphp
								<td>{{$data->$f_name}}</td>
						  @endforeach
							<td>

								<span class="dropdown">
									<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
										<i class="la la-ellipsis-h"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="{{route('datac.edit', $data->id)}}"><i class="la la-edit"></i> Edit</a>

											<a class="dropdown-item" href="#" onclick="
											swal.fire({
													title: 'Are you sure to delete?',
													text: 'You won\'t be able to revert this!',
													type: 'warning',
													showCancelButton: true,
													confirmButtonText: 'Yes, delete it!'
											}).then(function(result) {
													if (result.value) {
														event.preventDefault();
													  document.getElementById('delete-form-{{$data->id}}').submit();
													}
											});
											"><i class="la la-trash"></i> Trash</a>
									</div>
							</span>
							<a class="btn btn-sm btn-outline-danger btn-icon btn-icon-md" href="" onclick="event.preventDefault();document.getElementById('change-status-unverify-{{$data->id}}').submit();"><i class="la la-close"></i></a>
							</td>
						</tr>
					@endforeach
	      </tbody>

			</table>
			</form>
			<!--end: Datatable -->
		</div>
	</div>
	<script>
	    $(document).ready(function(){
	        $('.lazyload').lazyload();
				//select all checkboxes
				$("#select_all").change(function(){  //"select all" change
					var status = this.checked; // "select all" checked status
					$('.varcheck').each(function(){ //iterate all listed checkbox items
						this.checked = status; //change ".varcheck" checked status
						$("#verify_btn").removeAttr("disabled");
					});


					if($('.varcheck:checked').length <= 0){
						$("#verify_btn").prop('disabled', 'disabled');
					}
				});

				$('.varcheck').change(function(){ //".varcheck" change
					//uncheck "select all", if one of the listed checkbox item is unchecked
					if(this.checked == false){ //if this item is unchecked
						$("#select_all")[0].checked = false; //change "select all" checked status to false
					}

					if($('.varcheck:checked').length > 0){
						$("#verify_btn").removeAttr("disabled");
					}

					if($('.varcheck:checked').length <= 0){
						$("#verify_btn").prop('disabled', 'disabled');
					}


					//check "select all" if all checkbox items are checked
					if ($('.varcheck:checked').length == $('.varcheck').length ){
						$("#select_all")[0].checked = true; //change "select all" checked status to true
					}
				});

	    });
	    </script>
@endsection
