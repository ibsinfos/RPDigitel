$().ready(function () {
        $.validator.setDefaults({
            submitHandler: function () {
                $("#signin").submit(function (e) {

                    var url = "<?php echo base_url() ?>submitlogin"; // the script where you handle the form input.

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#signin").serialize(),
                        dataType: 'json', // serializes the form's elements.
                        success: function (data)
                        {
                            if (data.status === 1) {
                                window.location.href = "dashboard"
                            } else {
                                $(".error").html(data.msg);
                            }
                        }
                    });

                    e.preventDefault(); // avoid to execute the actual submit of the form.
                });
            }
        });
        });

        $().ready(function () {
            // validate the comment form when it is submitted
            $("#signin").validate();
        });