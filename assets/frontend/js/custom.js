$(document).ready(function () {
    /* main login page start */
    var windowWidth = $(window).width();
    if(windowWidth > 767){
        setHeight();
    }
    $(window).resize(function(){
        if(windowWidth > 767) {
            setHeight();
        }
        // $('.scrollbar-outer').width($('.contentWrapper .sectionWhite').width() + 10);
    });
    /* main login page end */

    // scrollbar applied to music list and messages in Profile page
    if ($('.mCustomScrollbar').length) {
        $(".mCustomScrollbar").mCustomScrollbar({
            theme: "dark"
        });
    }
    
    // Sign up page script start
    if ($(".signup_input").length) {
        $(".signup_input").keyup(function (event) {
            if (event.keyCode == 13) {
                $("#signup_button").click();
            }
        });
    }
    
    if ($("#signup_button").length) {
        $("#signup_button").click(function () {
            //alert('d');
            //call ajax

            var form_data = $('#signup_form').serialize();

            $.ajax({
                type: 'POST',
                url: create_member_URL,
                data: form_data,
                datatype: 'text',
                success: function (data) {

                    if (data == 'true') {
                        $("#errors").html('');
                        $('#username, #email_address, #phone_number,#country,#password,#confirmpassword').val("");
                        $("#success").html('<div class="alert alert-success" style="text-shadow:none;" ><button type="button" class="close" data-dismiss="alert">X</button><strong>Your account was successfully created. We have sent you an e-mail to confirm your account.</div>');
                    } else {

                        $("#errors").html(data);

                    }

                }

            });

        });
    }
    // Sign up page script end
    
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
                        if (json.firsttime == 'true')
                        {
                            window.location = createPaasportURL;
                        } else
                        {
                            //window.location = "<?php //echo base_url(); ?>user/dashboard";
                            //window.location = "<?php echo base_url(); ?>fiberrails";
                            window.location = mainDashboardURL;
                        }
                    } else if (json.otp == 'otp')
                    {
                        //window.location = loginOtpURL;
                        $('#signin_form').hide();
                        $('#otp_form').show();
                    } else
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


    $('.domainResults').on('click', '.btn', function () {
        $(this).closest('li').find('.priceAction .btn').toggleClass('added');
    });
    // script used for check all checkboxes
    $('.domainSidebar').on('click', '#checkAll', function () {
        $(this).closest('.list-unstyled').find('li input:checkbox').prop('checked', this.checked);
    });

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
    // alert(memberDetailsForm_save_URL);
    validateMemberDetails();
    validatePaymentDetails();

    // script used for subscription checkout page
    $('.checkoutWrap').on('click', '.radio-inline', function () {
        var payOpt = $(this).find('.paymentOpt').data('payment-type');
        //alert(payOpt);
        if (payOpt == 'paypal') {
            $('.creaditCardInfo').slideUp();
        } else {
            $('.creaditCardInfo').slideDown();
        }
    });
});

function setHeight(){
    var windowHeight = $( window ).height();
    $(".loginPageWrap").height(windowHeight);
}

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 96 || charCode > 105))
        return false;
    return true;
}

function validateMemberDetails() {
    ////// Rules Goes Below //////
    $('#memberDetailsForm').validate({
        // alert(memberDetailsForm_save_URL);

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
        submitHandler: function (form) {



            if (typeof memberDetailsForm_save_URL == "undefined" || memberDetailsForm_save_URL == null) {
            } else {
                $.ajax({
                    // url: '/index.php/members/userExist',
                    url: memberDetailsForm_save_URL,
                    type: 'POST',
                    data: {first_name: $('#first_name').val(), last_name: $('#last_name').val(), country_code: $('#country_code').val(), phone: $('#phone').val(), email: $('#email').val(), u_password: $('#password').val(), billing_address: $('#billing_address').val(), billing_city: $('#billing_city').val(), billing_country: $('#billing_country').val(), billing_state: $('#billing_state').val(), billing_zip: $('#billing_zip').val(), role: 'user'},
                    success: function (res) {

                        if (res == 'exist') {
                            alert('User with this email already exist. Please try with different email.');
                        } else {
                            $('li[role=presentation]').removeClass('active');
                            $('.tab-pane').removeClass('active');
                            $('.payment_details').addClass('active');
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
        submitHandler: function (form) {

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
