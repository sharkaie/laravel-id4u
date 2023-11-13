@extends('admin.app')

@section('page-title', 'ID Card Generator| Set Fields')

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


    	@if($user_pass == '1')
    		@php
          foreach ($customer_info as $value) {
            $customer_name = $value->firstname." ".$value->lastname;
          }
          foreach ($agent_info as $value){
            $agent_name = $value->firstname." ".$value->lastname;
          }


        @endphp

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
                    <a href="#" class="btn btn-default btn-bold"> << Back </a>
                  </div>
              </div>
          </div>
        @endsection

        <!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Set New Field
					</h3>
				</div>
			</div>

			<!--begin::Form-->
			<form class="kt-form kt-form--label-left" method="post" action="{{route('id-generator.store_set')}}">
        @csrf
				<div class="kt-portlet__body">
					<div class="form-group row">
						<div class="col-lg-6">
              <label for="select_field">Select Field</label>
    						<select class="form-control kt-select2" id="select_field" name="select_field" required>
    								<option value="">----Select----</option>
    							  <option value="s" >Name</option>

    						</select>
						</div>

						<div class="col-lg-6">
							<label>Card Type</label>
							<div class="kt-radio-inline">
								<label class="kt-radio kt-radio--solid">
	                <input type="radio" name="card_type" id="card_type" onclick="document.getElementById('back_design').style.display = 'none'" value="S" checked> Single Side
	                <span></span>
	              </label>
	              <label class="kt-radio kt-radio--solid">
	                <input type="radio" name="card_type" id="card_type" onclick="document.getElementById('back_design').style.display = 'block'" value="D"> Double Side
	                <span></span>
	             </label>
	            </div>
              @error('card_type')
                <div class="invalid-feedback">{{$message}}</div>
              @enderror
							<span class="form-text text-muted">Please select card Type</span>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-lg-6">
							<label>Card Width</label>
								<div class="input-group">
									<input type="text" class="form-control" name="card_width" id="card_width" placeholder="Card Height" aria-describedby="basic-addon2" required>
									<div class="input-group-append"><span class="input-group-text" id="basic-addon2">mm</span></div>
								</div>
              @error('card_width')
                <div class="invalid-feedback">{{$message}}</div>
              @enderror
							<span class="form-text text-muted">Please Enter Card Width</span>
						</div>


						<div class="col-lg-6">
							<label>Card Height</label>
								<div class="input-group">
									<input type="text" class="form-control" name="card_height" id="card_height" placeholder="Card Height" aria-describedby="basic-addon2" required>
									<div class="input-group-append"><span class="input-group-text" id="basic-addon2">mm</span></div>
								</div>
              @error('card_height')
                <div class="invalid-feedback">{{$message}}</div>
              @enderror
							<span class="form-text text-muted">Please Enter Card Height</span>
						</div>
					</div>

					<div class="form-group row">
            <div class="col-lg-6">
							<label>Card Template(Front)</label>
              <div class="custom-file">
						  	<input type="file" class="custom-file-input @error('card_template_f') is-invalid @enderror" name="card_template_f" id="card_template_f" required>
                <label class="custom-file-label" for="card_template">Choose Card Front Template</label>
                @error('card_template_f')
                  <div class="invalid-feedback">{{$message}}</div>
                @enderror
						  </div>

							<span class="form-text text-muted">Please select card front Template</span>
						</div>

						<div class="col-lg-6" id="back_design" style="display:none;">
							<label>Card Template(Back)</label>
              <div class="custom-file">
						  	<input type="file" class="custom-file-input" name="card_template_b" id="card_template_b">
                <label class="custom-file-label" for="card_template_b">Choose Card Back Template</label>
						  </div>

							<span class="form-text text-muted">Please select card back Template</span>
						</div>
					</div>

	      </div>
        <div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<div class="row">
							<div class="col-lg-6">
							</div>
							<div class="col-lg-6 kt-align-right">
								<button type="Submit" class="btn btn-success">Create</button>
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
    				Please Select Agent / Customer to Show Data, by click on right side user floating button
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
    	            Select Agent/Customer
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
    										@php
    											$agent__id = $agent->id;
    										@endphp
    										<option value="{{$agent->id}}" >{{$agent->firstname}} {{$agent->lastname}}</option>
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
    	    $(document).ready(function(){
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

    @section('page-scripts')
      <script src="{{asset('admin/assets/js/demo1/pages/crud/forms/widgets/input-mask.js')}}" type="text/javascript"></script>
    @endsection
