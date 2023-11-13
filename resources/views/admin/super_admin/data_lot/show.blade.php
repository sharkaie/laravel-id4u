@extends('admin.app')

@section('page-title', 'Lot Details')





@section('main-content')

	@if($user_pass == '1')
    @php
      foreach ($customer_info as $value) {
        $customer_name = $value->firstname." ".$value->lastname;
      }
      foreach ($agent_info as $value){
        $agent_name = $value->firstname." ".$value->lastname;
      }
    @endphp

    @section('subheader-primary', 'Customer')
    @section('subheader-secondary', "$customer_name ($agent_name)")



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
								Customer
							</h3>
									<span class="kt-subheader__separator kt-subheader__separator--v"></span>
									<div class="kt-subheader__group" id="kt_subheader_search">
											<span class="kt-subheader__desc" id="kt_subheader_total">
												{{$customer_name}} ({{$agent_name}})
											</span>
									</div>
							</div>
							<div class="kt-subheader__toolbar">
								<a href="{{url()->previous()}}" class="btn btn-default btn-bold"> << Back </a>
							</div>
					</div>
			</div>
		@endsection

	<div class="kt-portlet kt-portlet--mobile">
		<div class="kt-portlet__head kt-portlet__head--lg">
			<div class="kt-portlet__head-label">
				<span class="kt-portlet__head-icon">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <rect id="bound" x="0" y="0" width="24" height="24"/>
                  <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" id="Combined-Shape" fill="#000000" opacity="0.3"/>
                  <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" id="Combined-Shape" fill="#000000"/>
                  <rect id="Rectangle-152" fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
                  <rect id="Rectangle-152-Copy-2" fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
                  <rect id="Rectangle-152-Copy-3" fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
                  <rect id="Rectangle-152-Copy" fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
                  <rect id="Rectangle-152-Copy-5" fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
                  <rect id="Rectangle-152-Copy-4" fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
              </g>
          </svg>
				</span>
				<h3 class="kt-portlet__head-title">
          Data Lots
				</h3>
			</div>
			<div class="kt-portlet__head-toolbar">
	            <div class="kt-portlet__head-wrapper">
		<div class="kt-portlet__head-actions">
			<div class="dropdown dropdown-inline">
				<button type="button" class="btn btn-outline-primary btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="la la-download"></i> Export
				</button>
				<div class="dropdown-menu dropdown-menu-right">
					<ul class="kt-nav">
						<li class="kt-nav__section kt-nav__section--first">
							<span class="kt-nav__section-text">Choose an option</span>
						</li>
						<li class="kt-nav__item">
							<a href="{{route('lot.export', $lot_no)}}" class="kt-nav__link">
								<i class="kt-nav__link-icon la la-file-excel-o"></i>
								<span class="kt-nav__link-text">Excel</span>
							</a>
						</li>
						<li class="kt-nav__item">
							<a href="{{route('lot.download_images', $lot_no)}}" class="kt-nav__link">
								<i class="kt-nav__link-icon la la-file-image-o"></i>
								<span class="kt-nav__link-text">Images</span>
							</a>
						</li>
						<li class="kt-nav__item">
							<a href="{{route('lot.export_all', $lot_no)}}" class="kt-nav__link">
								<i class="kt-nav__link-icon la la-file-zip-o"></i>
								<span class="kt-nav__link-text">Download Lot</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	</div>
		</div>
		<div class="kt-portlet__body">

			<div class="row">
				<button id="img_btn" onclick="event.preventDefault(); document.getElementById('selection').action = '{{route('lot.selected_download_images')}}';document.getElementById('selection').submit();" class="btn btn-outline-warning col-xl-2 col-lg-2 col-md-2 col-sm-2" disabled>Download Images</button>&nbsp;&nbsp;
				<button id="excel_btn" onclick="event.preventDefault(); document.getElementById('selection').action = '{{route('lot.selected_export')}}';document.getElementById('selection').submit();" class="btn btn-outline-success col-xl-2 col-lg-2 col-md-2 col-sm-2" disabled>Export Excel</button>&nbsp;&nbsp;
				<button id="all_btn" onclick="event.preventDefault(); document.getElementById('selection').action = '{{route('lot.selected_export_all')}}';document.getElementById('selection').submit();" class="btn btn-outline-info col-xl-2 col-lg-2 col-md-2 col-sm-2" disabled>Download Zip</button>&nbsp;&nbsp;
			</div>

			<div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>

<form id="selection" action="" method="post">
	@csrf
			<table class="table table-striped- table-bordered table-hover table-checkable" id="data_table">
				<thead>
					<tr>
						<td><label class="kt-checkbox kt-checkbox--tick kt-checkbox--success">
							<input type="checkbox" id="select_all"><span></span>
						</label></td>
            <td>Sr no</td>
						<td>ID</td>
						<td>Photo</td>
					  @foreach ($fields as $field)
							<td>{{$field->name}}</td>
					  @endforeach
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

						</tr>

          @endforeach
	      </tbody>

			</table>
		</form>
			<!--end: Datatable -->
		</div>
	</div>
	@else
		<div class="alert alert-warning alert-elevate" role="alert">
			<div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
			<div class="alert-text">
				Please Select Agent / Customer to Show Data, by click on right side user floating button
			</div>
		</div>
	@endif

	<script>
	    $(document).ready(function(){
	        $('.lazyload').lazyload();
				//select all checkboxes
				$("#select_all").change(function(){  //"select all" change
					var status = this.checked; // "select all" checked status
					$('.varcheck').each(function(){ //iterate all listed checkbox items
						this.checked = status; //change ".varcheck" checked status
						$("#img_btn").removeAttr("disabled");
						$("#excel_btn").removeAttr("disabled");
						$("#all_btn").removeAttr("disabled");
					});


					if($('.varcheck:checked').length <= 0){
						$("#img_btn").prop('disabled', 'disabled');
						$("#excel_btn").prop('disabled', 'disabled');
						$("#all_btn").prop('disabled', 'disabled');
					}
				});

				$('.varcheck').change(function(){ //".varcheck" change
					//uncheck "select all", if one of the listed checkbox item is unchecked
					if(this.checked == false){ //if this item is unchecked
						$("#select_all")[0].checked = false; //change "select all" checked status to false
					}

					if($('.varcheck:checked').length > 0){
						$("#img_btn").removeAttr("disabled");
						$("#excel_btn").removeAttr("disabled");
						$("#all_btn").removeAttr("disabled");
					}

					if($('.varcheck:checked').length <= 0){
						$("#img_btn").prop('disabled', 'disabled');
						$("#excel_btn").prop('disabled', 'disabled');
						$("#all_btn").prop('disabled', 'disabled');
					}


					//check "select all" if all checkbox items are checked
					if ($('.varcheck:checked').length == $('.varcheck').length ){
						$("#select_all")[0].checked = true; //change "select all" checked status to true
					}
				});
			});
</script>
@endsection
