@extends('admin.app')

@section('page-title', 'My Profile')

@section('page-css')
  <link href="{{asset('admin/assets/css/demo1/pages/wizard/wizard-4.css')}}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{asset('user/cropper/css/slim.min.css')}}">

  <style media="screen">
  .slim .slim-file-hopper {
    z-index: 3;
    background: rgba(244, 244, 244, 0.05);
  }
  </style>
@endsection



@section('main-content')

  @section('subheader')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">

                <h3 class="kt-subheader__title">
                  My Profile
                </h3>

                <span class="kt-subheader__separator kt-subheader__separator--v"></span>

                <div class="kt-subheader__group" id="kt_subheader_search">
                    <span class="kt-subheader__desc" id="kt_subheader_total">
                      View &lt;-&gt; Edit
                    </span>
                </div>

              </div>
            <div class="kt-subheader__toolbar">
              <a href="{{url()->previous()}}" class="btn btn-default btn-dark">Back</a>
              <button type="button" onclick="event.preventDefault(); document.getElementById('Edit').submit();" class="btn btn-brand btn-bold">Save Changes</button>
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
    <div class="kt-portlet kt-portlet--tabs">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-toolbar">
            <ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1" role="tab">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon id="Bound" points="0 0 24 0 24 24 0 24"/>
                                <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero"/>
                                <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3"/>
                            </g>
                        </svg>
                        Profile
                      </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_2" role="tab">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon id="Shape" points="0 0 24 0 24 24 0 24"/>
                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" id="Mask" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" id="Mask-Copy" fill="#000000" fill-rule="nonzero"/>
                            </g>
                        </svg>Account
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_3" role="tab">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <rect id="bound" x="0" y="0" width="24" height="24"/>
                              <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" id="Path-50" fill="#000000" opacity="0.3"/>
                              <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" id="Mask" fill="#000000" opacity="0.3"/>
                              <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" id="Mask-Copy" fill="#000000" opacity="0.3"/>
                          </g>
                      </svg>
                       Change Password
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <div class="kt-portlet__body">
      @foreach ($user as $value)
        <form id="Edit" action="{{route('myprofile.update', $id)}}"  enctype="multipart/form-data" method="post">
          @method('PUT')
          @csrf
            <div class="tab-content">
                <div class="tab-pane active" id="kt_user_edit_tab_1" role="tabpanel">
                    <div class="kt-form kt-form--label-right">
                        <div class="kt-form__body">
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body">
                                    <div class="row">
                                        <label class="col-xl-3"></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <h3 class="kt-section__title kt-section__title-sm">Customer Info:</h3>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Profile Image</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="kt-avatar kt-avatar--outline kt-avatar--circle-">
                                                <div class="kt-avatar__holder slim" data-label='<i class="fa fa-upload" style="font-size: 3em;"></i>'  data-ratio="3:3"  data-size="600,600"  data-instant-edit="true"  data-save-initial-image="true" id="my-cropper">
                                                  <img src="data:image/png;base64,@php echo $value->profile_img; @endphp" alt="">
                                                  <input type="file" name="photo" accept="image/png, image/jpg, image/jpeg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">First Name *</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control" type="text" name="firstname" value="{{$value->firstname}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Last Name *</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control" type="text" name="lastname" value="{{$value->lastname}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Company Name *</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input class="form-control" type="text" name="company_name" placeholder="Company Name..." value="{{$value->company_name}}" required>
                                            <span class="form-text text-muted">Enter Comapny Name if you want your invoices addressed to a company / Leave blank to use your full name.</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Address</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group">
                                                <input class="form-control" type="text"  placeholder="Address..." name="address" value="{{$value->address}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Postal Code</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group">
                                                <input class="form-control" type="text"  placeholder="Postal Code..." name="postal_code" value="{{$value->postal_code}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Landmark</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group">
                                                <input class="form-control" type="text"  placeholder="Landmark..." name="landmark" value="{{$value->landmark}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">City</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group">
                                                <input class="form-control" type="text"  placeholder="City..." name="city" value="{{$value->city}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">District</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group">
                                                <input class="form-control" type="text" placeholder="District..." name="district" value="{{$value->district}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">State</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <select class="form-control" name="state">

                                                <option value="">Select State...</option>
                                                <option value="Andaman and Nicobar Islands" @if($value->state == 'Andaman and Nicobar Islands') selected @endif>Andaman and Nicobar Islands</option>
                                                <option value="Andhra Pradesh" @if($value->state == 'Andhra Pradesh') selected @endif>Andhra Pradesh</option>
                                                <option value="Arunachal Pradesh" @if($value->state == 'Arunachal Pradesh') selected @endif>Arunachal Pradesh</option>
                                                <option value="Assam" @if($value->state == 'Assam') selected @endif>Assam</option>
                                                <option value="Bihar" @if($value->state == 'Bihar') selected @endif>Bihar</option>
                                                <option value="Chandigarh" @if($value->state == 'Chandigarh') selected @endif>Chandigarh</option>
                                                <option value="Chhattisgarh" @if($value->state == 'Chhattisgarh') selected @endif>Chhattisgarh</option>
                                                <option value="Dadra and Nagar Haveli" @if($value->state == 'Dadra and Nagar Haveli') selected @endif>Dadra and Nagar Haveli</option>
                                                <option value="Daman and Diu" @if($value->state == 'Daman and Diu') selected @endif>Daman and Diu</option>
                                                <option value="Delhi" @if($value->state == 'Delhi') selected @endif>Delhi</option>
                                                <option value="Goa" @if($value->state == 'Goa') selected @endif>Goa</option>
                                                <option value="Gujarat" @if($value->state == 'Gujarat') selected @endif>Gujarat</option>
                                                <option value="Haryana" @if($value->state == 'Haryana') selected @endif>Haryana</option>
                                                <option value="Himachal Pradesh" @if($value->state == 'Himachal Pradesh') selected @endif>Himachal Pradesh</option>
                                                <option value="Jammu and Kashmir" @if($value->state == 'Jammu and Kashmir') selected @endif>Jammu and Kashmir</option>
                                                <option value="Jharkhand" @if($value->state == 'Jharkhand') selected @endif>Jharkhand</option>
                                                <option value="Karnataka" @if($value->state == 'Karnataka') selected @endif>Karnataka</option>
                                                <option value="Kerala" @if($value->state == 'Kerala') selected @endif>Kerala</option>
                                                <option value="Lakshadweep" @if($value->state == 'Lakshadweep') selected @endif>Lakshadweep</option>
                                                <option value="Madhya Pradesh" @if($value->state == 'Madhya Pradesh') selected @endif>Madhya Pradesh</option>
                                                <option value="Maharashtra" @if($value->state == 'Maharashtra') selected @endif>Maharashtra</option>
                                                <option value="Manipur" @if($value->state == 'Manipur') selected @endif>Manipur</option>
                                                <option value="Meghalaya" @if($value->state == 'Meghalaya') selected @endif>Meghalaya</option>
                                                <option value="Mizoram" @if($value->state == 'Mizoram') selected @endif>Mizoram</option>
                                                <option value="Nagaland" @if($value->state == 'Nagaland') selected @endif>Nagaland</option>
                                                <option value="Orissa" @if($value->state == 'Orissa') selected @endif>Orissa</option>
                                                <option value="Pondicherry" @if($value->state == 'Pondicherry') selected @endif>Pondicherry</option>
                                                <option value="Punjab" @if($value->state == 'Punjab') selected @endif>Punjab</option>
                                                <option value="Rajasthan" @if($value->state == 'Rajasthan') selected @endif>Rajasthan</option>
                                                <option value="Sikkim" @if($value->state == 'Sikkim') selected @endif>Sikkim</option>
                                                <option value="Tamil Nadu" @if($value->state == 'Tamil Nadu') selected @endif>Tamil Nadu</option>
                                                <option value="Tripura" @if($value->state == 'Tripura') selected @endif>Tripura</option>
                                                <option value="Uttaranchal" @if($value->state == 'Uttaranchal') selected @endif>Uttaranchal</option>
                                                <option value="Uttar Pradesh" @if($value->state == 'Uttar Pradesh') selected @endif>Uttar Pradesh</option>
                                                <option value="West Bengal" @if($value->state == 'West Bengal') selected @endif>West Bengal</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="kt_user_edit_tab_2" role="tabpanel">
                    <div class="kt-form kt-form--label-right">
                        <div class="kt-form__body">
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body">
                                    <div class="row">
                                        <label class="col-xl-3"></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <h3 class="kt-section__title kt-section__title-sm">Account:</h3>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Username *</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group">
                                                <input class="form-control" type="text" name="username" value="{{$value->username}}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Contact Phone *</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                                <input type="text" class="form-control" name="contact" value="{{$value->contact}}" placeholder="Phone" aria-describedby="basic-addon1" required>
                                            </div>
                                            <span class="form-text text-muted">We'll never share your conatct no with anyone else.</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Website (optional)</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group">
                                                <input class="form-control" type="text"  placeholder="Website..." name="website" value="{{$value->website}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">GST IN</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group">
                                                <input class="form-control" type="text" name="gst_in" Placeholder="GST IN..." value="{{$value->gst_in}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">PAN no</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <div class="input-group">
                                                <input class="form-control" type="text" name="pan_no" Placeholder="PAN no..." value="{{$value->pan_no}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="kt_user_edit_tab_3" role="tabpanel">
                    <div class="kt-form kt-form--label-right">
                        <div class="kt-form__body">
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body">
                                    <div class="alert alert-solid-danger alert-bold fade show kt-margin-t-20 kt-margin-b-40" role="alert">
                                        <div class="alert-icon"><i class="fa fa-exclamation-triangle"></i></div>
                                        <div class="alert-text">Configure user passwords to Login Admin Panel.<br>Do not share this password to other Agents Except this User</div>
                                        <div class="alert-close">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true"><i class="la la-close"></i></span>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-xl-3"></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <h3 class="kt-section__title kt-section__title-sm">Change account Password:</h3>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">New Password</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input type="password" class="form-control" value="" name="password" placeholder="New password" autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="form-group form-group-last row">
                                        <label class="col-xl-3 col-lg-3 col-form-label">Confirm Password</label>
                                        <div class="col-lg-9 col-xl-6">
                                            <input type="password" class="form-control" value="" name="password_confirmation" placeholder="Confirm password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>

                        <div class="kt-form__actions">
                            <div class="row">
                                <div class="col-xl-3"></div>
                                <div class="col-lg-9 col-xl-6">
                                    <button type="submit" class="btn btn-label-brand btn-bold">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
      @endforeach
    </div>
</div>
@endsection

@section('page-scripts')
  <script src="{{asset('admin/assets/js/demo1/pages/crud/forms/validation/form-controls.js')}}" type="text/javascript"></script>
  <script src="{{asset('user/cropper/js/slim.kickstart.min.js')}}"></script>
<script src="{{asset('admin/assets/js/demo1/pages/custom/user/edit-user.js')}}" type="text/javascript"></script>
@endsection
