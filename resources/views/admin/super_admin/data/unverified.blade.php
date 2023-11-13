@extends('admin.app')

@section('page-title', 'Unverified Data')

@section('main-content')

	@if($user_pass == '1')
		@php
      $customer_name = $customer_info->firstname." ".$customer_info->lastname;
      $agent_name = $agent_info->firstname." ".$agent_info->lastname;
    @endphp

		@section('subheader')
			<!-- begin:: Content Head -->
			<div class="kt-subheader  kt-grid__item" id="kt_subheader">
			    <div class="kt-container  kt-container--fluid ">
			        <div class="kt-subheader__main">

			            <h3 class="kt-subheader__title">Customer</h3>

			            <span class="kt-subheader__separator kt-subheader__separator--v"></span>

			            <span class="kt-subheader__desc">{{$customer_name}} ({{$agent_name}}) Enteries: ({{ $dataUnverifiedCount ?? '' }}) @if($pagesCount >1) Page No.: ({{$page}}) @endif 
@if(isset($search))
@foreach($search as $sort_opt)
[{{$sort_opt}}]
@endforeach
@endif
</span>
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
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
				    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
				        <polygon id="Shape" points="0 0 24 0 24 24 0 24"/>
				        <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
				        <path d="M10.5857864,13 L9.17157288,11.5857864 C8.78104858,11.1952621 8.78104858,10.5620972 9.17157288,10.1715729 C9.56209717,9.78104858 10.1952621,9.78104858 10.5857864,10.1715729 L12,11.5857864 L13.4142136,10.1715729 C13.8047379,9.78104858 14.4379028,9.78104858 14.8284271,10.1715729 C15.2189514,10.5620972 15.2189514,11.1952621 14.8284271,11.5857864 L13.4142136,13 L14.8284271,14.4142136 C15.2189514,14.8047379 15.2189514,15.4379028 14.8284271,15.8284271 C14.4379028,16.2189514 13.8047379,16.2189514 13.4142136,15.8284271 L12,14.4142136 L10.5857864,15.8284271 C10.1952621,16.2189514 9.56209717,16.2189514 9.17157288,15.8284271 C8.78104858,15.4379028 8.78104858,14.8047379 9.17157288,14.4142136 L10.5857864,13 Z" id="Combined-Shape" fill="#000000"/>
				    </g>
				</svg>
				</span>
				<h3 class="kt-portlet__head-title">
					<button type="button" class="btn btn-danger" >Unverified Data</button>
				</h3>
			</div>
			<div class="kt-portlet__head-toolbar">
	            <div class="kt-portlet__head-wrapper">
		<div class="kt-portlet__head-actions">
				<a href="{{route('data.uexport')}}" target="_blank"   class="btn btn-default btn-icon-sm" ><i class="la la-download"></i> Export
				</a>
			{{-- &nbsp;
			<a href="#" class="btn btn-brand btn-elevate btn-icon-sm">
				<i class="la la-plus"></i>
				New Entry
			</a> --}}
		</div>
	</div>
	</div>
		</div>

		@foreach ($datas as $data)
			<form style="display:none;" action="{{ route('data.destroy', $data->id) }}" method="post" id="delete-form-{{ $data->id }}">
				@csrf
				@method('DELETE')
			</form>
			<form action="{{route('data.change_status_verify')}}" id="change-status-verify-{{$data->id}}" method="post">
				@csrf
				<input type="hidden" name="type" value="single">
				<input type="hidden" name="entry_id" value="{{$data->id}}">
			</form>
		@endforeach

		<form id='clear-filter' action="{{route('data.unverified')}}" method="post">
@csrf
<input type='hidden' name='clear_filter' value='clear' />
</form>


		<div class="kt-portlet__body">
			<div class="row">
				<form id="filter" class="col-xl-12 col-lg-12 col-md-12 col-sm-12" action="{{route('data.unverified')}}" method="post">
					@csrf
				<button type="button" id="verify_btn" onclick="event.preventDefault(); document.getElementById('multiple-verify-form').submit();" class="btn btn-outline-success col-xl-2 col-lg-2 col-md-2 col-sm-2" disabled="true">Verify Selected</button>
				&nbsp;&nbsp;&nbsp;&nbsp;

					@foreach ($fields as $field)
						@if($field->type == 'Options')

								<select name="{{$field->name}}" class="custom-select form-control col-xl-2 col-lg-2 col-md-2 col-sm-2">
								  	<option value="">{{$field->name}}</option>
										@foreach ($options as $option)
											@if ($field->id == $option->field_id)
												<option value="{{$option->option_name}}" @php

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
&nbsp;&nbsp;
<button type="button" id="clr_filtr_btn" onclick="event.preventDefault(); document.getElementById('clear-filter').submit();" class="btn btn-outline-danger col-xl-2 col-lg-2 col-md-2 col-sm-2">Clear Filter</button>

</form>

			</div>
			<div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>

			<form action="{{route('data.change_status_verify')}}" id="multiple-verify-form" method="post">
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
							<td >
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
											<a class="dropdown-item" href="{{route('data.edit', $data->id)}}"><i class="la la-edit"></i> Edit</a>

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
							<a class="btn btn-sm btn-outline-success btn-icon btn-icon-md" href="" onclick="event.preventDefault();document.getElementById('change-status-verify-{{$data->id}}').submit();"><i class="la la-check"></i></a>
							</td>
						</tr>
					@endforeach
	      </tbody>

			</table>


			@if($pagesCount > 1)
			<div class="col-sm-12 col-md-7" style="margin-top:2rem;">
				<div class="dataTables_paginate paging_simple_numbers" id="view_digital_forms_paginate">
					<ul class="pagination">
						<li class="paginate_button page-item previous {{ $page <= 1 ? 'disabled' : ''}}" id="view_digital_forms_previous">
							<a href="{{ $page <= 1 ? '' : 'https://id4u.in/admin/data/unverified/'}}{{$page >=1? ($page - 1).'/'.$limit : ''}}" aria-controls="view_digital_forms" data-dt-idx="0" tabindex="0" class="page-link">
								<i class="la la-angle-left"></i>
							</a>
						</li>
<div class="pagination" style="max-width:500px;overflow-x:auto;">
						@for($i = 1; $i <= $pagesCount; $i++)
						<li class="paginate_button page-item {{ $i == $page? 'active' : ''}}">
							<a href="https://id4u.in/admin/data/unverified/{{$i}}/{{$limit}}" aria-controls="view_digital_forms" data-dt-idx="1" tabindex="0" class="page-link">{{$i}}
							</a>
						</li>
						@endfor
</div>
						<li class="paginate_button page-item previous {{ $page >= $pagesCount ? 'disabled' : ''}}" id="view_digital_forms_previous">
							<a href="{{  $page >= $pagesCount ? '' : 'https://id4u.in/admin/data/unverified/'}}{{ $page <= $pagesCount? ($page + 1).'/'.$limit : ''}}" aria-controls="view_digital_forms" data-dt-idx="0" tabindex="0" class="page-link">
								<i class="la la-angle-right"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
			@endif




			</form>
			<!--end: Datatable -->
		</div>
	</div>
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
	<!-- end::Demo Panel -->


	<script>
	
	
// 	$(function() {
//      $("img.lazyload").lazyload({
//          effect : "fadeIn"
//      });

//   });
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
