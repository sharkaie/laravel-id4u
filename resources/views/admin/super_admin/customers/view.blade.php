@extends('admin.app')

@section('page-title', 'Customers')

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
                      View Customers
                    </span>
                </div>
            </div>
            <div class="kt-subheader__toolbar">
              <a href="{{url()->previous()}}" class="btn btn-default btn-bold"> << Back </a>
            </div>
        </div>
    </div>
  @endsection
  {{-- <div class="kt-portlet">
  <div class="kt-portlet__body  kt-portlet__body--fit">
    <div class="row row-no-padding row-col-separator-xl">

      <div class="col-md-12 col-lg-3 col-xl-3">
        <!--begin::Total Profit-->
        <div class="kt-widget24">
          <div class="kt-widget24__details">
            <div class="kt-widget24__info">
              <h4 class="kt-widget24__title">
                      Customers
                  </h4>
                  <span class="kt-widget24__desc">
                      No. of Customers
                  </span>
            </div>

            <span class="kt-widget24__stats kt-font-brand">
                  1
              </span>
          </div>

            <div class="progress progress--sm">
            <div class="progress-bar kt-bg-brand" role="progressbar" style="width: 50%;" aria-valuenow="50%;" aria-valuemin="0" aria-valuemax="100"></div>
          </div>

          <div class="kt-widget24__action">
            <span class="kt-widget24__change">
              Limit 10000
            </span>
            <span class="kt-widget24__number">
            12
              </span>
          </div>
        </div>
        <!--end::Total Profit-->
      </div>

      <div class="col-md-12 col-lg-3 col-xl-3">
        <!--begin::New Feedbacks-->
        <div class="kt-widget24">
          <div class="kt-widget24__details">
            <div class="kt-widget24__info">
              <h4 class="kt-widget24__title">
                      New Feedbacks
                  </h4>
                  <span class="kt-widget24__desc">
                      Customer Review
                  </span>
            </div>

            <span class="kt-widget24__stats kt-font-warning">
                 1349
              </span>
          </div>

            <div class="progress progress--sm">
            <div class="progress-bar kt-bg-warning" role="progressbar" style="width: 84%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
          </div>

          <div class="kt-widget24__action">
            <span class="kt-widget24__change">
              Change
            </span>
            <span class="kt-widget24__number">
              84%
              </span>
          </div>
        </div>
        <!--end::New Feedbacks-->
      </div>

      <div class="col-md-12 col-lg-3 col-xl-3">
        <!--begin::New Orders-->
        <div class="kt-widget24">
          <div class="kt-widget24__details">
            <div class="kt-widget24__info">
              <h4 class="kt-widget24__title">
                      New Orders
                  </h4>
                  <span class="kt-widget24__desc">
                      Fresh Order Amount
                  </span>
            </div>

            <span class="kt-widget24__stats kt-font-danger">
                  567
              </span>
          </div>

            <div class="progress progress--sm">
            <div class="progress-bar kt-bg-danger" role="progressbar" style="width: 69%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
          </div>

          <div class="kt-widget24__action">
            <span class="kt-widget24__change">
              Change
            </span>
            <span class="kt-widget24__number">
              69%
              </span>
          </div>
        </div>
        <!--end::New Orders-->
      </div>

      <div class="col-md-12 col-lg-3 col-xl-3">
        <!--begin::New Users-->
        <div class="kt-widget24">
          <div class="kt-widget24__details">
            <div class="kt-widget24__info">
              <h4 class="kt-widget24__title">
                      New Users
                  </h4>
                  <span class="kt-widget24__desc">
                      Joined New User
                  </span>
            </div>

            <span class="kt-widget24__stats kt-font-success">
                  276
              </span>
          </div>

            <div class="progress progress--sm">
            <div class="progress-bar kt-bg-success" role="progressbar" style="width: 90%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
          </div>

          <div class="kt-widget24__action">
            <span class="kt-widget24__change">
              Change
            </span>
            <span class="kt-widget24__number">
              90%
              </span>
          </div>
        </div>
        <!--end::New Users-->
      </div>

    </div>
  </div>
  </div> --}}

  <div class="kt-portlet kt-portlet--mobile">

  <div class="kt-portlet__head kt-portlet__head--lg">
    <div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon">
        <i class="kt-font-brand flaticon2-line-chart"></i>
      </span>
      <h3 class="kt-portlet__head-title">
        Customers
      </h3>
    </div>
    <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
  <div class="kt-portlet__head-actions">

    {{-- <div class="dropdown dropdown-inline">
      <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="la la-download"></i> Export
      </button>
      <div class="dropdown-menu dropdown-menu-right">
        <ul class="kt-nav">
          <li class="kt-nav__section kt-nav__section--first">
            <span class="kt-nav__section-text">Choose an option</span>
          </li>
          <li class="kt-nav__item">
            <a href="#" class="kt-nav__link">
              <i class="kt-nav__link-icon la la-print"></i>
              <span class="kt-nav__link-text">Print</span>
            </a>
          </li>
          <li class="kt-nav__item">
            <a href="#" class="kt-nav__link">
              <i class="kt-nav__link-icon la la-copy"></i>
              <span class="kt-nav__link-text">Copy</span>
            </a>
          </li>
          <li class="kt-nav__item">
            <a href="#" class="kt-nav__link">
              <i class="kt-nav__link-icon la la-file-excel-o"></i>
              <span class="kt-nav__link-text">Excel</span>
            </a>
          </li>
          <li class="kt-nav__item">
            <a href="#" class="kt-nav__link">
              <i class="kt-nav__link-icon la la-file-text-o"></i>
              <span class="kt-nav__link-text">CSV</span>
            </a>
          </li>
          <li class="kt-nav__item">
            <a href="#" class="kt-nav__link">
              <i class="kt-nav__link-icon la la-file-pdf-o"></i>
              <span class="kt-nav__link-text">PDF</span>
            </a>
          </li>
        </ul>
      </div>
    </div> --}}
    &nbsp;

    <button type="button" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#add_customer_modal"><i class="la la-plus"></i>New Customer</button>
    <!--begin::Add New-->
    <!--begin::Modal-->
<div class="modal fade" id="add_customer_modal" role="dialog" aria-labelledby="" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="">Add new Customer</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" class="la la-remove"></span>
				</button>
			</div>

			<form class="kt-form kt-form--fit kt-form--label-left" id="Add_NewCustomer" action="{{route('customer.store')}}" method="post">
      @csrf
        <div class="modal-body">
            <div class="kt-scroll" data-scroll="true" data-height="300">
					<div class="form-group row">
						<label class="col-form-label col-lg-12 col-sm-12">Select Agent</label>
						<div class="col-lg-12 col-md-12 col-sm-12">
							<select class="form-control kt-select2" id="agent" name="refered">
							    <option value="" selected>Select Agent</option>
                  @foreach ($agents as $agent)
                    <option value="{{$agent->id}}">{{$agent->firstname}} {{$agent->lastname}}</option>
                  @endforeach

							</select>
						</div>
					</div>
          <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6">
              <div class="form-group">
                <label>Firstname</label>
                <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
                <span class="form-text text-muted">Please enter customer's Firstname.</span>
              </div>
            </div><div class="col-xl-6 col-lg-6 col-md-6">
              <div class="form-group">
                <label>Lastname</label>
                <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
                <span class="form-text text-muted">Please enter customer's Lastname.</span>
              </div>
            </div>
          </div>
          <div class="form-group">
              <label>Company Name</label>
              <input type="text" id="company_name" name="company_name" class="form-control" aria-describedby="email" placeholder="Enter Company Name" required>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" id="email" name="email" class="form-control" aria-describedby="email" placeholder="Enter Email" autocomplete="new-password" required>
              <span class="form-text text-muted">Use true email of customer or your</span>
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" id="username" name="username" class="form-control" aria-describedby="username" placeholder="Enter Username" autocomplete="new-password">
              <span class="form-text text-muted">Leave blank if you have customer's email</span>
            </div>
            <div class="form-group">
              <label>Contact No.</label>
              <input type="tel" id="phone_no" name="contact" class="form-control" placeholder="Enter Contact No" autocomplete="new-password" required>
            </div>
            </div>
				</div>
				<div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="add_customer" class="btn btn-primary">Add</button>
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
  <table class="table table-striped- table-bordered table-hover" id="table">
                <thead>
                  <tr>
                      <th>Sr. no</th>
                      <th>Customer ID</th>
                      <th>Customer Name</th>
                      <th>Company Name</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Contact</th>
                      <th>Address</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Postal Code</th>
                      <th>GST IN</th>
                      <th>Refered</th>
                      <th>Last Updated</th>
                      <th>Registered on</th>
                      <th>Actions</th>
                    </tr>
          </thead>

              <tbody>
                @foreach ($customers as $customer)
                  <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$customer->id}}</td>
                    <td>{{$customer->firstname}} {{$customer->lastname}}</td>
                    <td>{{$customer->company_name}}</td>
                    <td>{{$customer->username}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->contact}}</td>
                    <td>{{$customer->address}}</td>
                    <td>{{$customer->city}}</td>
                    <td>{{$customer->state}}</td>
                    <td>{{$customer->postal_code}}</td>
                    <td>{{$customer->gst_in}}</td>
                    <td>{{$customer->agent_refered}}</td>
                    <td>{{$customer->updated_at}}</td>
                    <td>{{$customer->created_at}}</td>
                    <td>
                        <form id="delete{{$customer->id}}" action="{{route('customer.destroy', $customer->id)}}" style="display:none;" method="post">
                      @csrf;
                      @method('delete')
                    </form>
                      <a href="{{route('customer.edit', $customer->id)}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit">
                        <i class="la la-edit"></i>
                      </a>
                      <a href="#" onclick="
                    swal.fire({
                        title: 'Are you sure to delete Agent?',
                        text: 'You won\'t be able to revert this!, Your all data will be deleted Forever!',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete Customer!'
                    }).then(function(result) {
                        if (result.value) {
                          event.preventDefault();
                          document.getElementById('delete{{$customer->id}}').submit();
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
