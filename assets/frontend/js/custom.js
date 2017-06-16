$(document).ready(function(){
	
	// scrollbar applied to music list and messages in Profile page
	if ($('.mCustomScrollbar').length) {
		$(".mCustomScrollbar").mCustomScrollbar({
			theme:"dark"
		});
	}
	
	// Login page script start
	if ($(".signin_input").length) {
		$(".signin_input").keyup(function (event) {
			if (event.keyCode == 13) {
				$("#signin_button").click();
			}
		});
	}
	
	if ($("#signin_button").length) {       
		$("#signin_button").click(function () {
			
			//var a='<?php echo base_url(); ?>user/login/validate_credentials';
			//alert(checkLoginURL);
			var form_data = $('#signin_form').serialize();
			$.ajax({
				type: 'POST',
				url: checkLoginURL,
				data: form_data,
				datatype: 'text',
				success: function (data) {
					var json = JSON.parse(data);
					if (json.two_way_authentication == 'true') 
					{
						if(json.firsttime == 'true')
						{
							window.location = createPaasportURL;
						}
						else
						{   
							//window.location = "<?php //echo base_url(); ?>user/dashboard";
							//window.location = "<?php echo base_url(); ?>fiberrails";
							window.location = mainDashboardURL;
						}   
					} 
					else if (json.otp == 'otp')
					{
						//window.location = loginOtpURL;
						$('#signin_form').hide();
						$('#otp_form').show();
					} 
					else 
					{
						$('#password').val("");
						$("#errors").html(json.error);
						
					}
				}
			});
		});
	}
	
	if ($(".otp_input").length) { 
		$(".otp_input").keyup(function (event) {
			if (event.keyCode == 13) {
				$("#verify_otp_button").click();
			}
		});
	}
	
	if ($("#verify_otp_button").length) { 
		$("#verify_otp_button").click(function () {
			var form_data = $('#otp_form').serialize();
			$.ajax({
				type: 'POST',
				url: verifyOtp,
				data: form_data,
				datatype: 'text',
				success: function (data) {
					// alert(data);
					if (data == 'true') {
						// window.location = "<?php //echo base_url(); ?>user/dashboard";
						window.location = otpRedirectDashboard;
						} else {
						$("#errors").html(data);
					}
				}
			});
		});
	}
	
	if ($("#resend_otp_button").length) { 
		$("#resend_otp_button").click(function () {
			
			$("#errors").html('');
			// var mobile_no='+918806725624';
            $.ajax({
                url: resendOtp,
				// data: mobile_no,
				datatype: 'text',
                success: function (data) {
					
                    // if (data == 'true') {
					
					$("#errors").html('OTP sent successfully');
					
					// } else {
					
					// $("#errors").html(data);
					
					// }
					
				}
				
			});
			
		});
	}
	// Login page script end
	
	// bootstrap popover enable
	$('[data-toggle="popover"]').popover();

    // Validate Subscription Checkout page
    if ($('#memberDetailsForm').length) {
      validateMemberDetails();
    }
    if ($('#paymentDetailsForm').length) {
      validatePaymentDetails();
    }

	
	// Start script for Wizard used in checkout page
    // $('.wizard a[data-toggle="tab"]').on('show.bs.tab', function (e) {
    //     var $target = $(e.target);
    //     if ($target.parent().hasClass('disabled')) {
    //         return false;
    //     }
    // });
	
    // $(".next-step").click(function (e) {
    //     var $active = $('.wizard .nav-tabs li.active');
    //     $active.next().removeClass('disabled');
    //     nextTab($active);
	
    // });
	
    // $(".prev-step").click(function (e) {
    //     var $active = $('.wizard .nav-tabs li.active');
    //     prevTab($active);
    // });
    // end script for Wizard used in checkout page
	
    // Validate Subscription Checkout page
    validateMemberDetails();
    validatePaymentDetails();
	
	// script used for subscription checkout page
	$('.checkoutWrap').on('click', '.radio-inline', function () {
		var payOpt = $(this).find('.paymentOpt').data('payment-type');
		//alert(payOpt);
		if(payOpt=='paypal') {
			$('.creaditCardInfo').slideUp();
			} else {
			$('.creaditCardInfo').slideDown();
		}
	});
});

function isNumberKey(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 96 || charCode > 105) )
    return false;
	return true;
}

function validateMemberDetails() {
	$('#memberDetailsForm').validate({
		////// Rules Goes Below //////
		
		rules: {
			//// For General Sales Inquiries
			first_name: { 
				required: true,
				lettersonly: true
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
				minlength:9,
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
			first_name: {
				lettersonly: "Letters only please",
				required: "Please enter first name" 
			},
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
			billing_zip: "Please enter zip"
		},
		submitHandler: function(form) {
			
			
			/*
			if (typeof memberDetailsForm_URL == "undefined" || memberDetailsForm_URL == null){
				
				}else{
				$.ajax({
					// url: '/index.php/members/userExist',
					url: memberDetailsForm_save_URL,
					type: 'POST',
					data: {email: $('#email').val() },
					success: function (res) {
						
						if(res=='exist'){
							alert('User with this email already exist. Please try with different email.');
							} else{
							$('li[role=presentation]').removeClass('active');
							$('.tab-pane').removeClass('active');
							$('.payment_details').addClass('active');
						}
					}
				});
			}
			
			
			*/
			
			
			$('li[role=presentation]').removeClass('active');
			$('.tab-pane').removeClass('active');
			$('.payment_details').removeClass('disabled').addClass('active');
		}
	});
	$.validator.addMethod( "lettersonly", function( value, element ) {
		return this.optional( element ) || /^[a-z]+$/i.test( value );
	}, "Letters only please" );
	}
	
	function validatePaymentDetails() {
		
		$('#paymentDetailsForm').validate({
			
			rules: {
				exp_date: 'required',
				credit_number: {
					required: true,
					creditcard: true
				},
				security_code: {
					required: true,
					digits: true
					// maxlength: 5,
					// minlength: 5
				},
				terms: 'required'
			},
			
			////// Messages for Rules Goes Below //////
			
			messages: {
				//// For General Sales Inquiries
				exp_date: "Please enter month and year",
				credit_number: {
					creditcard: "Please enter a valid credit card number",
					required: "Please enter credit card number"
				},
				security_code: {
					minlength: "Please enter a valid security code",
					// maxlength: "Please enter a valid security code",
					required: "Please enter security code",
					digits: "Digits only please"
				},
				terms: 'Please access terms and conditions'
			},
			submitHandler: function(form) {
				
				// $.ajax({
				//   beforeSend: function () {
				//       $('.spinnerWrap').css('display', 'block');
				//   },
				//   url: '/index.php/members/register_member',
				//   type: 'POST',
				//   data: $('#memberDetailsForm').serialize() + '&' + $('#paymentDetailsForm').serialize(),
				//   success: function (res) {
				//     res = $.trim(res);
				//     console.log(res);
				//     if(res=='success'){
				
				//       if($('#productId').length != 0){
				//         window.location.href = 'https://insidertravelclub.clickfunnels.com/optin12186869';
				//       } else {
				//           $('.customer_name').text($('#first_name').val() + ' ' + $('#last_name').val());
				//           $('li[role=presentation]').removeClass('active');
				//           $('.tab-pane').removeClass('active');
				//           $('.status_details').addClass('active');
				//       }
				
				//     } else if(res=='error'){
				//       alert('Error in registering user. Please try again.');
				//     } else {
				//       alert(res);
				//     }
				//     $('.spinnerWrap').css('display', 'none');
				//   }
				// })
				$('li[role=presentation]').removeClass('active');
				$('.tab-pane').removeClass('active');
				$('.status_details').removeClass('disabled').addClass('active');
			}
		});
	}
