<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="images/favicon.ico">

        <title><?php echo $template['title']; ?></title>



        <?php if ($page_type == 'inner') { ?>
            <link href="<?php echo asset_url() ?>inner/css/bootstrap.min.css" rel="stylesheet">
            <link href="<?php echo asset_url() ?>inner/css/bootstrap-responsive.min.css" rel="stylesheet">
            <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
                  rel="stylesheet">
            <link href="<?php echo asset_url() ?>inner/css/font-awesome.css" rel="stylesheet">
            <link href="<?php echo asset_url() ?>inner/css/style.css" rel="stylesheet">
            <link href="<?php echo asset_url() ?>inner/css/pages/dashboard.css" rel="stylesheet">
            <link href="<?php echo asset_url() ?>inner/css/layout.css" rel="stylesheet">
            <link href="<?php echo asset_url() ?>inner/css/colorpicker.css" rel="stylesheet">
            <link rel="stylesheet" href="<?php echo asset_url() ?>inner/font/font-awesome-4.7.0/css/font-awesome.min.css">
        <?php } else if ($page != 'registration') { ?>
            <!-- Bootstrap core CSS -->
            <link href="<?php echo asset_url() ?>css/bootstrap.min.css" rel="stylesheet">
            <link href="<?php echo asset_url() ?>css/font-awesome.min.css" rel="stylesheet">

            <!-- Custom styles for this template -->
            <link href="<?php echo asset_url() ?>css/style.css" rel="stylesheet">
        <?php } ?>
        <script type="text/javascript">
            var base_url = '<?php echo base_url(); ?>';
            var asset_url = '<?php echo asset_url(); ?>';
            var fbpage = '<?php echo $page; ?>';

        </script>
    </head>
    <body>

        <?php
        if (isset($template['partials']['header'])) {
            echo $template['partials']['header'];
        }
        ?>

        <?php echo $template['body']; ?>



        <?php
        if (isset($template['partials']['footer'])) {
            echo $template['partials']['footer'];
        }
        ?>	




        <?php if ($page_type == 'inner') { ?>
            <!-- Le javascript
    ================================================== --> 
            <!-- Placed at the end of the document so the pages load faster --> 
            <!--<script src="<?php //echo asset_url()    ?>inner/js/jquery-1.7.2.min.js"></script>-->

            <script src="<?php echo asset_url() ?>inner/js/excanvas.min.js"></script> 
            <script src="<?php echo asset_url() ?>inner/js/chart.min.js" type="text/javascript"></script> 
            <script src="<?php echo asset_url() ?>inner/js/bootstrap.js"></script>
            <script language="javascript" type="text/javascript" src="<?php echo asset_url() ?>inner/js/full-calendar/fullcalendar.min.js"></script>

            <script src="<?php echo asset_url() ?>inner/js/base.js"></script> 
            <script src="<?php echo asset_url() ?>inner/js/colorpicker.js"></script> 
            <script>

            var lineChartData = {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                datasets: [
                    {
                        fillColor: "rgba(220,220,220,0.5)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        data: [65, 59, 90, 81, 56, 55, 40, 30, 60, 80, 90, 70]
                    },
                    {
                        fillColor: "rgba(151,187,205,0.5)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        data: [28, 48, 40, 19, 96, 27, 100, 80, 40, 90, 70, 100]
                    }
                ]

            }

            var myLine = new Chart(document.getElementById("area-chart").getContext("2d")).Line(lineChartData);


            var barChartData = {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                datasets: [
                    {
                        fillColor: "rgba(220,220,220,0.5)",
                        strokeColor: "rgba(220,220,220,1)",
                        data: [65, 59, 90, 81, 56, 55, 40]
                    },
                    {
                        fillColor: "rgba(151,187,205,0.5)",
                        strokeColor: "rgba(151,187,205,1)",
                        data: [28, 48, 40, 19, 96, 27, 100]
                    }
                ]

            }

            $(document).ready(function () {
                var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();
                var calendar = $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    ignoreTimezone: true,
                    selectable: true,
                    selectHelper: true,
                    select: function (start, end, allDay) {
                        var check = $.fullCalendar.formatDate(start, 'yyyy-MM-dd');
                        var today = $.fullCalendar.formatDate(new Date(), 'yyyy-MM-dd');
                        if (check < today)
                        {
                            alert("Please select future date only");
                            return false;
                        } else
                        {
                            var formDate = $.fullCalendar.formatDate(start, 'yyyy-MM-dd');
                            window.location.href = base_url + "add-appointment/" + formDate;
                        }
                        //var title = prompt('Event Title:');

                        /*if (title) {
                         calendar.fullCalendar('renderEvent',
                         {
                         title: title,
                         start: start,
                         end: end,
                         allDay: allDay
                         },
                         true // make the event "stick"
                         );
                         }*/
                        calendar.fullCalendar('unselect');
                    },
                    editable: true,
                    //                        events: [
                    //                            {
                    //                                title: 'All Day Event',
                    //                                start: new Date(y, m, 1)
                    //                            },
                    //                            {
                    //                                title: 'Long Event',
                    //                                start: new Date(y, m, d + 5),
                    //                                end: new Date(y, m, d + 7)
                    //                            },
                    //                            {
                    //                                id: 999,
                    //                                title: 'Repeating Event',
                    //                                start: new Date(y, m, d - 3, 16, 0),
                    //                                allDay: false
                    //                            },
                    //                            {
                    //                                id: 999,
                    //                                title: 'Repeating Event',
                    //                                start: new Date(y, m, d + 4, 16, 0),
                    //                                allDay: false
                    //                            },
                    //                            {
                    //                                title: 'Meeting',
                    //                                start: new Date(y, m, d, 10, 30),
                    //                                allDay: false
                    //                            },
                    //                            {
                    //                                title: 'Lunch',
                    //                                start: new Date(y, m, d, 12, 0),
                    //                                end: new Date(y, m, d, 14, 0),
                    //                                allDay: false
                    //                            },
                    //                            {
                    //                                title: 'Birthday Party',
                    //                                start: new Date(y, m, d + 1, 19, 0),
                    //                                end: new Date(y, m, d + 1, 22, 30),
                    //                                allDay: false
                    //                            },
                    //                            {
                    //                                title: 'EGrappler.com',
                    //                                start: new Date(y, m, 28),
                    //                                end: new Date(y, m, 29),
                    //                                url: 'http://EGrappler.com/'
                    //                            }
                    //                        ]
                });
            });
            </script><!-- /Calendar -->


            <script>


                function myFunction() {
                    document.getElementById("panel").style.display = "block";
                }


            </script>

            <script>
                $('input[name=flip]')
                        .click(
                                function ()
                                {
                                    $(this).hide();
                                }
                        );
                $('#colorSelector').ColorPicker({
                    color: '#0000ff',
                    onShow: function (colpkr) {
                        $(colpkr).fadeIn(500);
                        return false;
                    },
                    onHide: function (colpkr) {
                        $(colpkr).fadeOut(500);
                        return false;
                    },
                    onChange: function (hsb, hex, rgb) {
                        $('#colorSelector div').css('backgroundColor', '#' + hex);
                        $('#theme_color').val('#' + hex);
                    }
                });

            </script>
        <?php } else if ($page != 'registration') { ?>
            <!-- Bootstrap core JavaScript
    ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
            <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
            <script src="<?php echo asset_url() ?>js/bootstrap.min.js"></script>
            <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
            <script src="<?php echo asset_url() ?>js/vendor/holder.min.js"></script>
            <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
            <script src="<?php echo asset_url() ?>js/ie10-viewport-bug-workaround.js"></script>

        <?php } ?>
        
		
<?php if($page == 'home' && $page_type== 'main'){ ?>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
          <link rel="stylesheet" href="/resources/demos/style.css">
    	  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
         <script type="text/javascript">    
		
		var query_string = "<?php echo $str = (isset($_SERVER['QUERY_STRING'])) ? $_SERVER['QUERY_STRING'] : '';?>";	
		
		if('' != query_string) {
			if( 'how-it-works' == query_string) {
				 $('html,body').animate({
                                   scrollTop: $("#how_it_works").offset().top},
                                       2000);
			}
			
			if( 'pricing-plan' == query_string) {
				 $('html,body').animate({
                                   scrollTop: $("#pricing_section").offset().top},
                                       2000);

			}
			
		}
		$("#works").on("click" ,function(){ 
		 /*var x = $("#how_it_works").position(); //gets the position of the div element...
                    window.scrollTo(x.left, x.top); */
		 
		  $('html,body').animate({
                                   scrollTop: $("#how_it_works").offset().top},
                                       2000);

		  
		});
		
		$("#pricing").on("click" ,function(){ 
		
		  $('html,body').animate({
                                   scrollTop: $("#pricing_section").offset().top},
                                       2000);

		  
		});
		
		</script>
<?php }
?>
    </body>
</html>

