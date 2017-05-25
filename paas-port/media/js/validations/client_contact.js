$().ready(function () {

    // validate signup form on keyup and submit
    $("#contactme").validate({
        rules: {
            firstname: "required",
            lastname: "required",
            email: {
                required: true,
                email: true
            },
            mobile: {
                required: true,
                number: true
            },
            agree: "required"
        },
        messages: {
            firstname: "Please enter your first name",
            lastname: "Please enter your last name",
            email: "Please enter a valid email address",
            agree: "Please accept terms and conditions"
        },
        submitHandler: function () {
          
                var url = base_url + "submitsignup"; // the script where you handle the form input.
                //alert(url);
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#signup").serialize(),
                    dataType: 'json', // serializes the form's elements.
                    success: function (data)
                    {
                        if (data.status === 1) {
                            window.location.href = "payment"
                        } else {
                            $(".error").html(data.msg);
                        }
                    }
                });

        }
    });

});


