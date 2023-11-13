@extends('admin.app')

@section('page-title', 'Agents')

@section('page-css')
@endsection



@section('main-content')

  @php
  if(isset($response)){
    echo $response;
  }

  @endphp

  @section('subheader')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
              Agents
            </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                    <span class="kt-subheader__desc" id="kt_subheader_total">
                      View All Agents
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

  {{-- <div class="kt-portlet">
  	<div class="kt-portlet__body  kt-portlet__body--fit">
  		<div class="row row-no-padding row-col-separator-xl">

  			<div class="col-md-12 col-lg-3 col-xl-3">
  				<!--begin::Total Profit-->
  				<div class="kt-widget24">
  					<div class="kt-widget24__details">
  						<div class="kt-widget24__info">
  							<h4 class="kt-widget24__title">
  					            Agents
  					        </h4>
  					        <span class="kt-widget24__desc">
  					            No. of Agents
  					        </span>
  						</div>

  						<span class="kt-widget24__stats kt-font-brand">
  					        {{$count}}
  					    </span>
  					</div>

  				    <div class="progress progress--sm">
  						<div class="progress-bar kt-bg-brand" role="progressbar" style="width: 70;" aria-valuenow="50;" aria-valuemin="0" aria-valuemax="100"></div>
  					</div>

  					<div class="kt-widget24__action">
  						<span class="kt-widget24__change">
  							Limit 1000
  						</span>
  						<span class="kt-widget24__number">
                10
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
          Agents
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
    </div>
    </div>		</div>
    </div>

  <div class="kt-portlet__body">
    <!--begin: Datatable -->
    <table class="table table-striped- table-bordered table-hover table-checkable" id="table">
      <thead>
        <tr>
            <th>Sr. no</th>
            <th>Agent ID</th>
            <th>Company Name</th>            
            <th>Username</th>
            <th>Agent Name</th>
            <th>Email</th>
            <th>Contact No</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Postal Code</th>
            <th>GST IN</th>
            <th>Last Updated</th>
            <th>Registered on</th>
            <th>Actions</th>
          </tr>
      </thead>

            <tbody>
              @foreach ($agents as $agent)
                <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$agent->id}}</td>
                  <td>{{$agent->company_name}}</td>
                  <td>{{$agent->username}}</td>
                  <td>{{$agent->firstname}}&nbsp;{{$agent->lastname}}</td>
                  <td>{{$agent->email}}</td>
                  <td>{{$agent->contact}}</td>
                  <td>{{$agent->address}}</td>
                  <td>{{$agent->city}}</td>
                  <td>{{$agent->state}}</td>
                  <td>{{$agent->postal_code}}</td>
                  <td>{{$agent->gst_in}}</td>
                  <td>{{$agent->updated_at}}</td>
                  <td>{{$agent->created_at}}</td>
                  <td>
                      <form id="delete{{$agent->id}}" action="{{route('agent.destroy', $agent->id)}}" style="display:none;" method="post">
                      @csrf;
                      @method('delete')
                    </form>

                    <a href="{{route('agent.edit', $agent->id)}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit">
                      <i class="la la-edit"></i>
                    </a>

                    <a href="#" onclick="
                    swal.fire({
                        title: 'Are you sure to delete Agent?',
                        text: 'You won\'t be able to revert this!, Your all data will be deleted Forever!',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete Agent!'
                    }).then(function(result) {
                        if (result.value) {
                          event.preventDefault();
                          document.getElementById('delete{{$agent->id}}').submit();
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
@endsection
