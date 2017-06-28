$(document).ready(function(){
	// script used for Files popup used in add product
	$('.fileSelectModal').on('click', '.panel', function () {
		//alert('hi');
		var chkbox = $(this).find('.chkBox');
		//var chkbox = $(this).find('.chkBox').prop('checked', true);
		if(chkbox.is(':checked')) { 
			chkbox.prop('checked', false);
			} else {
			chkbox.prop('checked', true);
		}
	});
	
	// script used for datatable checkbox
	$('#datatable, .mailBoxWrap').on('click', '#checkAll', function () {
		$(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
	});
	
	// script used for mail box checkbox
	$('.mailBoxWrap').on('click', '#checkAll', function () {
		$(this).closest('.mailBoxWrap').find('td input:checkbox').prop('checked', this.checked);
	});
	
	// script used for Create product page
	$('.createProductWrap').on('click', '.businessStructureRadioWrap .radio-inline', function () {
		var attrVal = $(this).attr('data-business-structure');
		//alert(attrVal);
		$('.businessStructureInfo').hide();
		$('.'+attrVal+'-information').show();
	});
	
	
	// $("#save_basic_info").click(function () {
		validateBasicInformation();
	// });
	
	validateCompanyInformation();
	validatePublisherInformation();
	
	//
	$("#basicInfo").validate();

	// datepicker function initialized
	if ($('.datepicker').length) {
		$('.datepicker').datepicker({

		});
	}
	
});



//************************************************** Basic Inforamation save Start ***************************************************************

function validateBasicInformation() {
    ////// Rules Goes Below //////
    $('#basicInformationForm').validate({
        // alert(memberDetailsForm_save_URL);
		
        rules: {
            //// For General Sales Inquiries
            choice1: {
                required: true,
                // lettersonly: true
				}/*,
				last_name: {
                required: true,
                lettersonly: true
				},
				email: {
                required: true,
                email: true
				},
				password: 'required',
				phone: {
                minlength: 9,
                required: true
				},
				billing_address: 'required',
				billing_city: {
                required: true,
                lettersonly: true
				},
				billing_state: 'required',
			billing_zip: 'required'*/
		},
        ////// Messages for Rules Goes Below //////
		
        messages: {
            //// For General Sales Inquiries
            choice1: {
                // lettersonly: "Letters only please",
                required: "Please enter first name"
				}/*,
				last_name: {
                lettersonly: "Letters only please",
                required: "Please enter last name"
				},
				email: {
                email: "Please enter a valid email address",
                required: "Please enter an email address"
				},
				phone: {
                minlength: "Please enter a valid phone number",
                required: "Please enter phone number"
				},
				password: "Please enter a passowrd",
				billing_address: "Please enter address",
				billing_city: {
                lettersonly: "Letters only please",
                required: "Please enter city"
				},
				billing_state: "Please select state",
			billing_zip: "Please enter zip"*/
		},
        submitHandler: function (form) {
			
			
            if (typeof basicInformationForm_save_URL == "undefined" || basicInformationForm_save_URL == null) {
				} else {
				// alert('sdf');
				
				var form_data=$("#basicInformationForm").serialize();
				// alert(form_data);
				
                $.ajax({
                    url: basicInformationForm_save_URL,
                    type: 'POST',
                    
					// data: {first_name: $('#first_name').val(), last_name: $('#last_name').val(), country_code: $('#country_code').val(), phone: $('#phone').val(), email: $('#email').val(), u_password: $('#password').val(), billing_address: $('#billing_address').val(), billing_city: $('#billing_city').val(), billing_country: $('#billing_country').val(), billing_state: $('#billing_state').val(), billing_zip: $('#billing_zip').val(), role: 'user'},
					
					data: form_data,
					
                    success: function (res) {
						
                        if (res == 'exist') {
                            alert('User with this email already exist. Please try with different email.');
							} else {
                            $('li[role=presentation]').removeClass('active');
                            $('.tab-pane').removeClass('active');
                            $('.company_information').addClass('active');
                            $('#companyInfo').addClass('active');
						}
					}
				});
			}
			
			
            // $('li[role=presentation]').removeClass('active');
            // $('.tab-pane').removeClass('active');
            // $('.payment_details').removeClass('disabled').addClass('active');
		}
	});
	
	
    $.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
	}, "Letters only please");
	
	
}

//************************************************** Basic Inforamation save end ***************************************************************


//************************************************** Company Inforamation save Start ***************************************************************

function validateCompanyInformation() {
    ////// Rules Goes Below //////
    $('#companyInformationForm').validate({
        // alert(memberDetailsForm_save_URL);
		
        rules: {
            //// For General Sales Inquiries
            choice1: {
                required: true,
                // lettersonly: true
			},
            last_name: {
                required: true,
                lettersonly: true
			},
            email: {
                required: true,
                email: true
			},
            password: 'required',
            phone: {
                minlength: 9,
                required: true
			},
            billing_address: 'required',
            billing_city: {
                required: true,
                lettersonly: true
			},
            billing_state: 'required',
            billing_zip: 'required'
		},
        ////// Messages for Rules Goes Below //////
		
        messages: {
            //// For General Sales Inquiries
            choice1: {
                // lettersonly: "Letters only please",
                required: "Please enter first name"
				}/*,
				last_name: {
                lettersonly: "Letters only please",
                required: "Please enter last name"
				},
				email: {
                email: "Please enter a valid email address",
                required: "Please enter an email address"
				},
				phone: {
                minlength: "Please enter a valid phone number",
                required: "Please enter phone number"
				},
				password: "Please enter a passowrd",
				billing_address: "Please enter address",
				billing_city: {
                lettersonly: "Letters only please",
                required: "Please enter city"
				},
				billing_state: "Please select state",
			billing_zip: "Please enter zip"*/
		},
        submitHandler: function (form) {
			
			
            if (typeof companyInformationForm_save_URL == "undefined" || companyInformationForm_save_URL == null) {
				} else {
				// alert('sdf');
				
				var form_data=$("#companyInformationForm").serialize();
				// alert(form_data);
				
                $.ajax({
                    url: companyInformationForm_save_URL,
                    type: 'POST',
                    
					// data: {first_name: $('#first_name').val(), last_name: $('#last_name').val(), country_code: $('#country_code').val(), phone: $('#phone').val(), email: $('#email').val(), u_password: $('#password').val(), billing_address: $('#billing_address').val(), billing_city: $('#billing_city').val(), billing_country: $('#billing_country').val(), billing_state: $('#billing_state').val(), billing_zip: $('#billing_zip').val(), role: 'user'},
					
					data: form_data,
					
                    success: function (res) {
						
                        if (res == 'exist') {
                            alert('User with this email already exist. Please try with different email.');
							} else {
							
                         $('li[role=presentation]').removeClass('active');
                            $('.tab-pane').removeClass('active');
                            $('.upload_files').addClass('active');
                            $('#uploadFiles').addClass('active');
						}
					}
				});
			}
			
			
            // $('li[role=presentation]').removeClass('active');
            // $('.tab-pane').removeClass('active');
            // $('.payment_details').removeClass('disabled').addClass('active');
		}
	});
	
	
    $.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
	}, "Letters only please");
	
	
}

//************************************************** company Inforamation save end ***************************************************************



//********************************************** Publisher Application all Inforamation save Start ************************************************

function validatePublisherInformation() {
    ////// Rules Goes Below //////
    $('#publisherApplicationForm').validate({
        // alert(memberDetailsForm_save_URL);
		
	
        rules: {
            //// For General Sales Inquiries
            choice1: {
                required: true,
                // lettersonly: true
			},
            last_name: {
                required: true,
                lettersonly: true
			},
            email: {
                required: true,
                email: true
			},
            password: 'required',
            phone: {
                minlength: 9,
                required: true
			},
            billing_address: 'required',
            billing_city: {
                required: true,
                lettersonly: true
			},
            billing_state: 'required',
            billing_zip: 'required'
		},
        ////// Messages for Rules Goes Below //////
		
        messages: {
            //// For General Sales Inquiries
            choice1: {
                // lettersonly: "Letters only please",
                required: "Please enter first name"
				}/*,
				last_name: {
                lettersonly: "Letters only please",
                required: "Please enter last name"
				},
				email: {
                email: "Please enter a valid email address",
                required: "Please enter an email address"
				},
				phone: {
                minlength: "Please enter a valid phone number",
                required: "Please enter phone number"
				},
				password: "Please enter a passowrd",
				billing_address: "Please enter address",
				billing_city: {
                lettersonly: "Letters only please",
                required: "Please enter city"
				},
				billing_state: "Please select state",
			billing_zip: "Please enter zip"*/
		},
        submitHandler: function (form) {
						
            if (typeof companyInformationForm_save_URL == "undefined" || companyInformationForm_save_URL == null) {
				} else {
				// alert('sdf');
				
				var form_data=$("#companyInformationForm").serialize();
				// alert(form_data);
				
                $.ajax({
                    url: publisherApplicationForm_save_URL,
                    type: 'POST',
                    
					// data: {first_name: $('#first_name').val(), last_name: $('#last_name').val(), country_code: $('#country_code').val(), phone: $('#phone').val(), email: $('#email').val(), u_password: $('#password').val(), billing_address: $('#billing_address').val(), billing_city: $('#billing_city').val(), billing_country: $('#billing_country').val(), billing_state: $('#billing_state').val(), billing_zip: $('#billing_zip').val(), role: 'user'},
					
					data: form_data,
					
                    success: function (res) {
						
                        if (res == 'exist') {
                            alert('User with this email already exist. Please try with different email.');
							} else {
							
                         $('li[role=presentation]').removeClass('active');
                            $('.tab-pane').removeClass('active');
                            $('.upload_files').addClass('active');
                            $('#uploadFiles').addClass('active');
						}
					}
				});
			}
			
			
            // $('li[role=presentation]').removeClass('active');
            // $('.tab-pane').removeClass('active');
            // $('.payment_details').removeClass('disabled').addClass('active');
		}
	});
	
	
    $.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
	}, "Letters only please");
	
	
}

//********************************************** Publisher Application all Inforamation save End ************************************************



