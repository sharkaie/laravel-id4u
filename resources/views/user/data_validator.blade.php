"use strict";
var KTWizard3 = function () {

	var wizardEl;
	var formEl;
	var validator;
	var wizard;

	var initWizard = function () {

		wizard = new KTWizard('kt_wizard_v3', {
			startStep: 1,
		});


		wizard.on('beforeNext', function(wizardObj) {
			if (validator.form() !== true) {
				wizardObj.stop();
			}
		});

		wizard.on('beforePrev', function(wizardObj) {
			if (validator.form() !== true) {
				wizardObj.stop();
			}
		});

		// Change event
		wizard.on('change', function(wizard) {
			KTUtil.scrollTop();
		});
	}

	var initValidation = function() {
		validator = formEl.validate({

			ignore: ":hidden",


			rules: {

				photo: {
					required: true
				},
        @foreach ($fields as $field)
          @switch($field->type)
            @case('Text')
            {{$field->name}}:{
              required:true
            },
            @break

            @case('Number')
            {{$field->name}}:{
              digits:true,
              required:true
            },
            @break

            @case('Mobile')
            {{$field->name}}:{
              required:true,
              digits:true
            },
            @break

            @case('Date')
            {{$field->name}}dt:{
              required:true
            },
            {{$field->name}}mt:{
              required:true
            },
            {{$field->name}}yr:{
              required:true
            },
            @break

            @case('Email')
            {{$field->name}}:{
              required:true,
              email:true
            },
            @break

            @case('Blood-Group')
            {{$field->name}}:{
              required:true
            },
            @break

            @case('Calender')
            {{$field->name}}:{
              required:true
            },
            @break

          @endswitch
        @endforeach
				accept: {
					required: true
				}
			},

			// Validation messages
            messages: {
                accept: {
                    required: "You must accept Form details are True"
                }
            },

			// Display error
			invalidHandler: function(event, validator) {
				KTUtil.scrollTop();

				swal.fire({
					"title": "Error",
					"text": "Something is missing",
					"type": "error",
					"confirmButtonClass": "btn btn-secondary"
				});
			},

			// Submit valid form
			submitHandler: function (form) {

			}
		});
	}

	var initSubmit = function() {
		var btn = formEl.find('[data-ktwizard-type="action-submit"]');
		var route = $('#kt_form').data('route');
		btn.on('click', function(e) {
			e.preventDefault();

			if (validator.form()) {

				KTApp.progress(btn);
				//KTApp.block(formEl);

				formEl.ajaxSubmit({

					type: 'post',
					url: route,
					data: $(this).serialize(),
					success: function(data) {
						KTApp.unprogress(btn);
						//KTApp.unblock(formEl);
						console.log(data);
						if(data == '1'){
							swal.fire({
								"title": "Submitted Successfully",
								"type": "success",
								"showConfirmButton": false,
								"timer": 1000,
							}).then(function(result) {
							if (result.dismiss === 'timer') {
                    @isset($preview)
											window.location = '{{ url('/digital-form/preview')}}'
										@endisset
                }
	            });
						}
						else if(data == 'err_expire'){
							swal.fire({
								"title": "Form Expired",
								"text": "Please Re-Login or Click OK",
								"type": "error",
								"confirmButtonClass": "btn btn-secondary"
							}).then(function(result) {
	                if (result.value) {
										@isset($preview)
										event.preventDefault();
										document.getElementById('logout-form').submit();
										@endisset
	                }
	            });
						}else if(data == 'err_img'){
							swal.fire({
								"title": "No Image Found",
								"text": "Please Re-Login and Submit Again",
								"type": "error",
								"confirmButtonClass": "btn btn-secondary"
							}).then(function(result) {
	                if (result.value) {
										@isset($preview)
										event.preventDefault();
										document.getElementById('logout-form').submit();
									@endisset
	                }
	            });
						}
						else{
							swal.fire({
								"title": "Submission Failed",
								"text": "Form can't Submitted",
								"type": "error",
								"confirmButtonClass": "btn btn-secondary"
							});
						}

					}
				});
			}
		});
	}

	return {
		// public functions
		init: function() {
			wizardEl = KTUtil.get('kt_wizard_v3');
			formEl = $('#kt_form');

			initWizard();
			initValidation();
			initSubmit();
		}
	};
}();

jQuery(document).ready(function() {
	KTWizard3.init();
});
