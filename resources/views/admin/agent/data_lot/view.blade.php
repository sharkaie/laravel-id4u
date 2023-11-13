@extends('admin.app')

@section('page-title', 'Data Lots')

@section('main-content')
	@if($user_pass == '1')
    @php
      foreach ($customer_info as $value) {
        $customer_name = $value->firstname." ".$value->lastname;
      }
    @endphp

		@section('subheader')
			<!-- begin:: Content Head -->
			<div class="kt-subheader  kt-grid__item" id="kt_subheader">
					<div class="kt-container  kt-container--fluid ">
							<div class="kt-subheader__main">

									<h3 class="kt-subheader__title">Customer</h3>

									<span class="kt-subheader__separator kt-subheader__separator--v"></span>

									<span class="kt-subheader__desc">{{$customer_name}}</span>
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
		</div>

		<div class="kt-portlet__body">


				<input type="hidden" name="type" value="multiple">
			<table class="table table-striped- table-bordered table-hover table-checkable" id="lot_table">
				<thead>
					<tr>
						<td>Sr no</td>
            <td>Lot No</td>
            <td>Data Count</td>
            <td>Admin Status</td>
            <td>Submitted at</td>
					</tr>
				</thead>

	      <tbody>
          @foreach ($lots as $lot)

            <tr>
							<td>{{$loop->index + 1}}</td>
              <td><a href="{{route('lots.show',$lot->lot_no)}}" class="btn btn-outline-info">Lot {{$lot->lot_no}}</a></td>
              <td>{{$lot->count}}</td>
              <td>{{$lot->status}}</td>
              <td>{{$lot->created_at}}</td>
						</tr>

          @endforeach
	      </tbody>

			</table>
			<!--end: Datatable -->
		</div>
	</div>
	@else
		<div class="alert alert-warning alert-elevate" role="alert">
			<div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
			<div class="alert-text">
				Please Select Customer to Show Data, by click on right side user floating button
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
	            Select Customer
	        </h3>
	        <a href="#" class="kt-demo-panel__close" id="kt_demo_panel_close"><i class="flaticon2-delete"></i></a>
	    </div>

	    <div class="kt-demo-panel__body">
				<form method="post" id="user-selection" action="{{route('set_customer')}}">
					@csrf

				<div class="form-group">
					<label for="customer">Customer</label>
						<select class="form-control kt-select2" onchange="event.preventDefault(); document.getElementById('user-selection').submit();" name="customer" id="customer" required>
								<option value="">----Select----</option>
								@foreach ($customers as $customer)
										@php
											$customer__id = $customer->id;
										@endphp
										<option value="{{$customer->id}}" >{{$customer->firstname}} {{$customer->lastname}}</option>
								@endforeach
						</select>

				</div>
			</form>

	    </div>
	</div>
	<!-- end::Demo Panel -->

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
