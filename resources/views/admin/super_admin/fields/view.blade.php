@extends('admin.app')

@section('page-title', 'Manage Fields')


@section('page-css')

@endsection

@section('main-content')
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
              Digital Form
            </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                    <span class="kt-subheader__desc" id="kt_subheader_total">
                      Create
                    </span>
                </div>
            </div>
            <div class="kt-subheader__toolbar">
              <a href="{{url()->previous()}}" class="btn btn-label-dark btn-bold btn-sm btn-icon-h kt-margin-l-10"> << Back </a>
            </div>
        </div>
    </div>
  @endsection

   <!-- <div class="kt-portlet">
      <div class="kt-portlet__body  kt-portlet__body--fit">
        <div class="row row-no-padding row-col-separator-xl">
    
          <div class="col-md-6 col-lg-6 col-xl-6">
            
            <div class="kt-widget24">
              <div class="kt-widget24__details">
                <div class="kt-widget24__info">
                  <h4 class="kt-widget24__title">
                          All Fields
                      </h4>
                </div>
    
                <span class="kt-widget24__stats kt-font-brand">
                      {{$count}}
                  </span>
              </div>
            </div>
          </div>
    
          <div class="col-md-6 col-lg-6 col-xl-6">
            <div class="kt-widget24">
              <div class="kt-widget24__details">
                <div class="kt-widget24__info">
                  <h4 class="kt-widget24__title">
                          Active
                      </h4>
                </div>
    
                <span class="kt-widget24__stats kt-font-brand">
                  {{$active}}
                  </span>
              </div>
            </div>
          </div>
    
        </div>
      </div>
    </div>-->

<div class="kt-portlet kt-portlet--mobile">

  <div class="kt-portlet__head kt-portlet__head--lg">
    <div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon">
        <i class="kt-font-brand flaticon2-line-chart"></i>
      </span>
      <h3 class="kt-portlet__head-title">
        Form Fields
      </h3>
    </div>
    <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
  <div class="kt-portlet__head-actions">
    <button type="button" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#add_field_modal"><i class="la la-plus"></i>New Record</button>
    <!--begin::Add New-->
    <div class="modal fade" id="add_field_modal" tabindex="-1" role="dialog" aria-labelledby="AddNewAgent" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addnewfield">Add Form Field&nbsp;<button type="button" class="btn btn-outline-hover-info btn-elevate btn-circle btn-icon" data-toggle="kt-popover" title="Add Agent" data-content="Enter short details for registering Agent, for Activating Account."><i class="flaticon-questions-circular-button"></i></button></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form class="kt-form" id="Add_NewField" action="{{route('field.store')}}" method="post">
                <div class="modal-body">
                    <div class="kt-scroll" data-scroll="true" data-height="300">
                      @csrf
                          <div class="form-group">
                            <label>Field Name</label>
                            <input type="text" name="field_name" class="form-control" aria-describedby="field_name" placeholder="Type here . . ." autocomplete="new-password"  required>
                          </div>
                          <div class="form-group">
                            <label>Field Name(Hindi)</label>
                            <input type="text" name="field_name_hi" class="form-control" aria-describedby="field_name" placeholder="Type here . . ." autocomplete="new-password"  >
                          </div>
                          <div class="form-group">
                          <label>Field Sequence</label>
                          <select name="where" class="form-control kt-select2 " id="where" required>
                              @php
                              $count = 0;
                              foreach ($fields as $value){
                                $count++;
                              }
                              @endphp
                            @if($count>0)<option value="at_beginning">At First</option>@endif
                            @foreach ($fields as $position)
                              <option value="at_{{$position->id}}">After {{$position->name}}</option>
                            @endforeach
                            <option value="at_end" selected>At End</option>
                          </select>
                        </div>
                          <div class="form-group">
                          <label>Field Type</label>
                          <select name="field_type" class="form-control kt-select2 " onchange="show_selected();" id="field_type" required>
                            <option value="">Type</option>
                            <option value="Text">Text (numbers & text)</option>
                            <option value="Number">Number (only numbers)</option>
                            <option value="Mobile">Mobile (validated Mobile no)</option>
                            <option value="Date">Date (like bank)</option>
                            <option value="Date_extended">Date (extended year)</option>
                            <option value="Email">Email (validated email)</option>
                            <option value="Options">Options (option selector)</option>
                            <option value="Calender">Calender (shows calender)</option>
                            <option value="Blood-Group">Blood-Group (pre-defined bloodgroups)</option>
                            <option value="Gender">Gender (pre-defined genders)</option>
                          </select>
                        </div>
                        <div class="kt-checkbox-inline" id="cat_form" >
                        </div>
                        <script type="text/javascript">

                        function show_selected() {
                          var selector = document.getElementById('field_type');
                          var value = selector[selector.selectedIndex].value;

                          if(value == 'Options'){
                            document.getElementById('cat_form').innerHTML = `
                        		<label class="kt-radio">
                        		<input type="radio" name="label" value="category"> Category
                        		<span></span>
                        	</label>
                        	<label class="kt-radio">
                        			<input type="radio" name="label" value="subcategory"> Subcategory
                        			<span></span>
                        		</label>
                        		<label class="kt-radio">
                        			<input type="radio" name="label" value="ignore" checked> Ignore
                        		<span></span>
                        	</label>
                        	`;
                          }
                        }
                        </script>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="add_field" class="btn btn-primary">Add</button>
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
  <table class="table table-striped- table-bordered table-hover table-checkable" id="view_fields">
                <thead>
                  <tr>
                      <th>Sr. no</th>
                      <th>Field Name</th>
                      <th>Field type</th>
                      <th>Status</th>
                      <th>Last Updated</th>
                      <th>Created on</th>
                      <th>Actions</th>
                    </tr>
          </thead>

              <tbody>
                @foreach ($fields as $field)
                  <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$field->name}} {{ $field->name_hi }}</td>
                    <td>{{$field->type}}</td>
                    <td>{{$field->status}}</td>
                    <td>{{$field->updated_at}}</td>
                    <td>{{$field->created_at}}</td>
                    <td>

                      <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="modal" data-target="#edit{{$field->id}}" title="Edit">
                        <i class="la la-edit"></i>
                      </a>
                      <div class="modal fade" id="edit{{$field->id}}" role="dialog" aria-labelledby="" aria-hidden="true">
                      	<div class="modal-dialog modal-dialog-centered" role="document">
                      		<div class="modal-content">
                      			<div class="modal-header">
                      				<h5 class="modal-title" id="">Edit Field</h5>
                      				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      					<span aria-hidden="true" class="la la-remove"></span>
                      				</button>
                      			</div>
                      			<form class="kt-form kt-form--fit kt-form--label-left" action="{{route('field.update',$field->id)}}" method="post">
                              @csrf
                              @method('PATCH')
                              <div class="modal-body">
                                <div class="form-group">
                                  <label>Field Name</label>
                                  <input type="text" name="field_name" class="form-control" aria-describedby="field_name" value="{{$field->name}}" placeholder="Type here . . ." autocomplete="new-password"  required>
                                </div>
                                <div class="form-group">
                            <label>Field Name(Hindi)</label>
                            <input type="text" name="field_name_hi" class="form-control" aria-describedby="field_name" value="{{$field->name_hi}}" placeholder="Type here . . ." autocomplete="new-password"  >
                          </div>
                                <div class="form-group">
                                <label>Field Sequence</label>
                                <select name="where" class="form-control kt-select2 " id="where" required>
                                    @php
                                    $count = 0;
                                    foreach ($fields as $value){
                                      $count++;
                                    }
                                    @endphp
                                  @if($count>0)<option value="at_beginning">At First</option>@endif
                                  @foreach ($fields as $position)
                                    <option value="at_{{$position->id}}">After {{$position->name}}</option>
                                  @endforeach
                                  
                                </select>
                              </div>
                                <div class="form-group">
                                <label>Field Type</label>
                                <select name="field_type" class="form-control kt-select2 " id="field_type" required>
                                  <option value="">Type</option>
                                  <option value="Text" @if($field->type=='Text') {{'selected'}} @endif>Text (numbers & text)</option>
                                  <option value="Number"@if($field->type=='Number') {{'selected'}} @endif>Number (only numbers)</option>
                                  <option value="Mobile"@if($field->type=='Mobile') {{'selected'}} @endif>Mobile (validated Mobile no)</option>
                                  <option value="Date"@if($field->type=='Date') {{'selected'}} @endif>Date (like bank)</option>
                                  <option value="Email"@if($field->type=='Email') {{'selected'}} @endif>Email (validated email)</option>
                                  <option value="Options"@if($field->type=='Options') {{'selected'}} @endif>Options (option selector)</option>
                                  <option value="Calender"@if($field->type=='Calender') {{'selected'}} @endif>Calender (shows calender)</option>
                                  <option value="Blood-Group"@if($field->type=='Blood-Group') {{'selected'}} @endif>Blood-Group (pre-defined bloodgroups)</option>
                                </select>
                              </div>
                      				</div>
                      				<div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Edit</button>
                      				</div>
                      			</form>
                      		</div>
                      	</div>
                      </div>
                      <form id="delete-form-{{ $field->id }}" action="{{route('field.destroy',$field->id)}}" style="display:none;" method="post">
                        @csrf
                        @method('DELETE')
                      </form>
                      <button type="button" class="btn btn-sm btn-clean btn-icon btn-icon-md" onclick="
                      swal.fire({
                          title: 'Are you sure to delete?',
                          text: 'You won\'t be able to revert this!, Your all data will be deleted Forever!',
                          type: 'warning',
                          showCancelButton: true,
                          confirmButtonText: 'Yes, delete it!'
                      }).then(function(result) {
                          if (result.value) {
                            event.preventDefault();
                            document.getElementById('delete-form-{{ $field->id }}').submit();
                          }
                      });
                      " title="Delete Field">
                        <i class="la la-trash"></i>
                      </button>


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
<script src="{{asset('admin/assets/js/demo1/pages/components/extended/sweetalert2.js')}}" type="text/javascript"></script>
@endsection
