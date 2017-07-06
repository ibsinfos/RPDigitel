<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Paasport</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="<?php echo asset_url(); ?>vcard_detail_view/css/bootstrap.min.css"  rel="stylesheet" />
        <link href="<?php echo asset_url(); ?>vcard_detail_view/font-awesome/css/font-awesome.min.css"  rel="stylesheet" />
        <link href="<?php echo asset_url(); ?>vcard_detail_view/css/jquery.mCustomScrollbar.min.css"  rel="stylesheet" />
        <link href="<?php echo asset_url(); ?>vcard_detail_view/css/vcard-style.css"  rel="stylesheet" />
        <?php if ($page == "vcard_detail_view") { ?>
            <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
        <?php } ?>
        <!--[if lt IE 9]>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
        <![endif]-->
    <body>
        <!-- Navigation -->
        <!--Start Header -->
        <?php
        if (isset($template['partials']['header'])) {
            echo $template['partials']['header'];
        }
        ?>        
        <!--End Header -->
        <!--Start Body -->
        <?php echo $template['body']; ?>
        <!--End Body -->


        <?php if ($page == "vcard_detail_view") { ?>
            <script type="text/javascript" src="<?php echo asset_url(); ?>vcard_detail_view/js/jquery-3.2.1.min.js"></script>
            <script type="text/javascript" src="<?php echo asset_url(); ?>vcard_detail_view/js/bootstrap.min.js"></script>
            <script type="text/javascript"  >
                $(document).ready(function () {
                    $('#btnemailsend').click(function () {

                        $(".err_mailsend").html('<div class="loader"><div class="title">Sending...</div><div class="load"><div class="bar"></div></div></div>');

                        $("#err_to").html('');
                        $("#err_from").html('');

                        $.ajax({
                            url: "<?php echo base_url() ?>frontend/Vcard/sendmail",
                            type: "POST",
                            data: {
                                to: $('#to').val(),
                                fromid: $('#fromid').val(),
                                shorten_url: $('#shorten_url').val()
                            },
                            success: function (data)
                            {
                                $(".err_mailsend").html('');
                                var json = JSON.parse(data);
                                if (json.status === 1)
                                {

                                    $("#err_to").html('');
                                    $("#err_from").html('');
                                    $(".err_mailsend").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                                    return true;
                                } else
                                {

                                    //$(".err_mailsend").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                                    $("#err_to").html('<div class="text-danger">' + json.msg.to + '</div>');
                                    $("#err_from").html('<div class="text-danger">' + json.msg.from + '</div>');


                                    return false;
                                }
                            }
                        });
                    });
                    
                     //call video for event popup (video page)
                    $('.videoPopupLink').click(function () {

                        var videoId = $(this).attr('rel');
                        var title = $(this).data('title');
                        var description = $(this).data('description');

                        if ($(window).width() <= 768) {
                            var url = 'https://www.youtube.com/watch?v=' + videoId;
                            window.open(url, '_blank');
                        } else {
                            $('.videoContainer').html('<iframe width="640" height="360" src="' + videoId + '" frameborder="0" allowfullscreen></iframe>');
                            // $('.videoContainer').html('<iframe width="640" height="360" src="https://www.youtube.com/embed/'+ videoId +'" frameborder="0" allowfullscreen></iframe>');
                            // $('.infoContainer h3').html(title);
                            // $('.infoContainer p').html(description);
                            $('#popupBg, #videoPopup').fadeIn(200);
                        }
                    });
                    // close video
                    $('#popupBg, .closePopup').click(function (event) {
                        $('.videoContainer').empty();
                        $('#popupBg, #videoPopup').fadeOut(200);
                    });
                    // end

    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
    
    
                });
                
                
function update_audio_modal_details(audio_id,name,genere) {
    $(".audio-modal-body #audio_file_id").val(audio_id);
    $(".audio-modal-body #audio_file_name").val(name);
    $(".audio-modal-body #audio_file_genre").val(genere);
}


function update_video_modal_details(video_id,name,genere) {
    $(".video-modal-body #video_file_id").val(video_id);
    $(".video-modal-body #video_file_name").val(name);
    $(".video-modal-body #video_file_genre").val(genere);
    //$(".video-modal-body #video_file_name").val('');
    //$(".video-modal-body #video_file_genre").val('');
}

            </script>

            <!-- custom scrollbar plugin -->
            <script src="<?php echo asset_url(); ?>vcard_detail_view/js/jquery.mCustomScrollbar.concat.min.js"></script>
            <script src="<?php echo asset_url(); ?>vcard_detail_view/js/vcard-custom.js"></script>

            <script type="text/javascript">
                // audio player script start
                // html5media enables <video> and <audio> tags in all major browsers
                // External File: http://api.html5media.info/1.1.8/html5media.min.js


                // Add user agent as an attribute on the <html> tag...
                // Inspiration: http://css-tricks.com/ie-10-specific-styles/
                var b = document.documentElement;
                b.setAttribute('data-useragent', navigator.userAgent);
                b.setAttribute('data-platform', navigator.platform);


                // HTML5 audio player + playlist controls...
                // Inspiration: http://jonhall.info/how_to/create_a_playlist_for_html5_audio
                // Mythium Archive: https://archive.org/details/mythium/
                jQuery(function ($) {
                    var response_new;
                    $.ajax({
                        url: "<?php echo base_url(); ?>getaudiolist",
                        type: 'POST',
                        data: {"slug": "<?php echo $user[0]['slug']; ?>"},
                        // data:{"slug":"ss"},
                        success: function (response) {
                            var response = JSON.parse(response);
                            // console.log(response);
                            // response_new=response;
                            // for (i=0; i < obj.length; i++){
                            // alert(obj.name);

                            // }
                            //**********************************************************************************
                            var supportsAudio = !!document.createElement('audio').canPlayType;
							var audio_user_id="<?php echo $membership[0]['user_id']; ?>";
							var host_ip="<?php echo $_SERVER['HTTP_HOST']; ?>";
							//alert(audio_user_id);
                            if (supportsAudio) {
                                // alert(response);

                                var index = 0,
                                        playing = false,
                                        // mediaPath = 'https://archive.org/download/mythium/',
                                        mediaPath = "http://"+host_ip+"/RPDigitel/paas-port/uploads/media/audio/"+audio_user_id+"/",
                                        extension = '',
                                        // tracks = [{
                                        // "track": 1,
                                        // "name": "1499082702aaaaaaaa",
                                        // "length": "6:21",
                                        // "file": "1499082702aaaaaaaa"
                                        // }],
                                        // tracks =[{"track":"29","name":"audio_test","file":"audio_test","length":"6:12"},{"track":"30","name":"audio_testsss","file":"audio_testsss","length":"6:12"}],
                                        tracks = response,
                                        buildPlaylist = $.each(tracks, function (key, value) {
                                            var trackNumber = value.track,
                                                    trackName = value.name,
                                                    trackLength = value.length;
                                            if (trackNumber.toString().length === 1) {
                                                trackNumber = '0' + trackNumber;
                                            } else {
                                                trackNumber = '' + trackNumber;
                                            }
                                            $('#plList').append('<li><div class="plItem"><div class="plNum">' + trackNumber + '.</div><div class="plTitle">' + trackName + '</div><div class="plLength">' + trackLength + '</div></div></li>');
                                        }),
                                        trackCount = tracks.length,
                                        npAction = $('#npAction'),
                                        npTitle = $('#npTitle'),
                                        audio = $('#audio1').bind('play', function () {
                                    playing = true;
                                    npAction.text('Now Playing...');
                                }).bind('pause', function () {
                                    playing = false;
                                    npAction.text('Paused...');
                                }).bind('ended', function () {
                                    npAction.text('Paused...');
                                    if ((index + 1) < trackCount) {
                                        index++;
                                        loadTrack(index);
                                        audio.play();
                                    } else {
                                        audio.pause();
                                        index = 0;
                                        loadTrack(index);
                                    }
                                }).get(0),
                                        btnPrev = $('#btnPrev').click(function () {
                                    if ((index - 1) > -1) {
                                        index--;
                                        loadTrack(index);
                                        if (playing) {
                                            audio.play();
                                        }
                                    } else {
                                        audio.pause();
                                        index = 0;
                                        loadTrack(index);
                                    }
                                }),
                                        btnNext = $('#btnNext').click(function () {
                                    if ((index + 1) < trackCount) {
                                        index++;
                                        loadTrack(index);
                                        if (playing) {
                                            audio.play();
                                        }
                                    } else {
                                        audio.pause();
                                        index = 0;
                                        loadTrack(index);
                                    }
                                }),
                                        li = $('#plList li').click(function () {
                                    var id = parseInt($(this).index());
                                    if (id !== index) {
                                        playTrack(id);
                                    }
                                }),
                                        loadTrack = function (id) {
                                            $('.plSel').removeClass('plSel');
                                            $('#plList li:eq(' + id + ')').addClass('plSel');
                                            npTitle.text(tracks[id].name);
                                            index = id;
                                            audio.src = mediaPath + tracks[id].file + extension;
                                        },
                                        playTrack = function (id) {
                                            loadTrack(id);
                                            audio.play();
                                        };
                                extension = audio.canPlayType('audio/mpeg') ? '.mp3' : audio.canPlayType('audio/ogg') ? '.ogg' : '';
                                loadTrack(index);
                            }
                            //**********************************************************************************

                            // alert(response);
                        }

                    });

                    // alert(response_new);

                });

                // audio player script end
            </script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>		
        <?php } ?>

    </body>
</html>		