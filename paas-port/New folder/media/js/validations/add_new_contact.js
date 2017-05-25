$().ready(function () {

    // validate signup form on keyup and submit
    $("#contactfrm").validate({
        rules: {
            listname: "required",
            list_type: "required"
        },
        messages: {
            listname: "Please enter listname",
            list_type: "Please select list type",
            
        },
        submitHandler: function () {
          
                var url = base_url + "submitcontact"; // the script where you handle the form input.
                //alert(url);
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#contactfrm").serialize(),
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


