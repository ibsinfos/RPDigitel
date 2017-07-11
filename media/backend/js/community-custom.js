$(document).ready(function(){



//******************** Sign in Sign up [ref: assets/frontend/js/custom.js] Start *********************

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
            // alert('d');
            //call ajax

            var form_data = $('#signup_form').serialize();

            $.ajax({
                type: 'POST',
                url: create_member_URL,
                data: form_data,
                datatype: 'text',
                success: function (data) {

                    if (data == 'true') {
                        $("#signup_errors").html('');
                        $('#username, #email_address, #phone_number,#country,#password,#confirmpassword').val("");
                        $("#success").html('<div class="alert alert-success" style="text-shadow:none;" ><button type="button" class="close" data-dismiss="alert">X</button><strong>Your account was successfully created. We have sent you an e-mail to confirm your account.</div>');
                    } else {

                        $("#signup_errors").html(data);

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



    if ($("#signup_link").length) {
        $("#signup_link").click(function () {
          $(".joinCommunity").hide();
          $(".signUpCommunity").show();
        });
    }
    
    
    if ($("#signin_link").length) {
        $("#signin_link").click(function () {
          $(".joinCommunity").show();
          $(".signUpCommunity").hide();
        });
    }
    
    // Login page script end

//******************** Sign in Sign up [ref: assets/frontend/js/custom.js] End *********************

	// Sticky Audio player
	initPlayers($('#player-container').length);

});

// Audio Player plugin functions start 
function calculateTotalValue(length) {
  var minutes = Math.floor(length / 60),
    seconds_int = length - minutes * 60,
    seconds_str = seconds_int.toString(),
    seconds = seconds_str.substr(0, 2),
    time = minutes + ':' + seconds

  return time;
}

function calculateCurrentValue(currentTime) {
  var current_hour = parseInt(currentTime / 3600) % 24,
    current_minute = parseInt(currentTime / 60) % 60,
    current_seconds_long = currentTime % 60,
    current_seconds = current_seconds_long.toFixed(),
    current_time = (current_minute < 10 ? "0" + current_minute : current_minute) + ":" + (current_seconds < 10 ? "0" + current_seconds : current_seconds);

  return current_time;
}

function initProgressBar() {
  var player = document.getElementById('player');
  var length = player.duration
  var current_time = player.currentTime;

  // calculate total length of value
  var totalLength = calculateTotalValue(length)
  jQuery(".end-time").html(totalLength);

  // calculate current value time
  var currentTime = calculateCurrentValue(current_time);
  jQuery(".start-time").html(currentTime);

  var progressbar = document.getElementById('seekObj');
  progressbar.value = (player.currentTime / player.duration);
  progressbar.addEventListener("click", seek);

  if (player.currentTime == player.duration) {
    $('#play-btn').removeClass('pause');
  }

  function seek(evt) {
    var percent = evt.offsetX / this.offsetWidth;
    player.currentTime = percent * player.duration;
    progressbar.value = percent / 100;
  }
};

function initPlayers(num) {
  // pass num in if there are multiple audio players e.g 'player' + i

  for (var i = 0; i < num; i++) {
    (function() {

      // Variables
      // ----------------------------------------------------------
      // audio embed object
      var playerContainer = document.getElementById('player-container'),
        player = document.getElementById('player'),
        isPlaying = false,
        playBtn = document.getElementById('play-btn');

      // Controls Listeners
      // ----------------------------------------------------------
      if (playBtn != null) {
        playBtn.addEventListener('click', function() {
          togglePlay()
        });
      }

      // Controls & Sounds Methods
      // ----------------------------------------------------------
      function togglePlay() {
        if (player.paused === false) {
          player.pause();
          isPlaying = false;
          $('#play-btn').removeClass('pause');

        } else {
          player.play();
          $('#play-btn').addClass('pause');
          isPlaying = true;
        }
      }
    }());
  }
}
// Audio Player plugin functions end 