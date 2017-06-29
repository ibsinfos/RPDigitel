<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
        <title><?php echo $template['title'] ?> </title>
		
        <!-- Bootstrap -->
        <link href="<?php echo asset_url() ?>backend/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap datepicker -->
        <link href="<?php echo asset_url() ?>backend/vendors/bootstrap-datepicker-master/dist/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
        <!-- Font Awesome -->
        <link href="<?php echo asset_url() ?>backend/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?php echo backend_asset_url() ?>vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="<?php echo backend_asset_url() ?>vendors/iCheck/skins/flat/green.css" rel="stylesheet">
		
        <!-- bootstrap-progressbar -->
        <link href="<?php echo backend_asset_url() ?>vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
        <!-- JQVMap -->
        <link href="<?php echo backend_asset_url() ?>vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
        <!-- bootstrap-daterangepicker 
        <link href="<?php echo backend_asset_url() ?>vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">-->
        <!-- FullCalendar -->
        <link href="<?php echo backend_asset_url() ?>vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
        <link href="<?php echo backend_asset_url() ?>vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">
        
        <link href="<?php echo asset_url() ?>backend/vendors/malihu-custom-scrollbar/jquery.mCustomScrollbar.min.css" rel="stylesheet">
		<!-- Dropzone -->
        <link href="<?php echo backend_asset_url() ?>vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
        <?php if ($page == 'cloud_storage') { ?>
        <link href="<?php echo backend_asset_url() ?>build/css/elfinder.css" rel="stylesheet">
        <?php } ?>
        <?php if ($page == 'project_list') { ?>
			<link href="<?php echo backend_asset_url() ?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
			<link href="<?php echo backend_asset_url() ?>vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
			<link href="<?php echo backend_asset_url() ?>vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
			<link href="<?php echo backend_asset_url() ?>vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
			<link href="<?php echo backend_asset_url() ?>vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
		<?php } ?>
        <?php if ($page == 'createpaasport') { ?>
        <link href="<?php echo asset_url() ?>backend/css/demo.css" rel="stylesheet">
        <?php } ?>
		<!-- Custom Theme Style -->
        <link href="<?php echo backend_asset_url() ?>build/css/custom.min.css" rel="stylesheet">
        <!-- Custom Style -->
        <link href="<?php echo asset_url() ?>backend/css/style.css" rel="stylesheet">
	</head>
	
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <?php if (isset($template['partials']['sidebar'])) echo $template['partials']['sidebar']; ?>
                <?php if (isset($template['partials']['header'])) echo $template['partials']['header']; ?>
                <?php echo $template['body']; ?>
                <?php if (isset($template['partials']['footer'])) echo $template['partials']['footer']; ?>
			</div>
		</div>

        <!-- Modal used for share btn in sidebar menu -->
        <div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="shareModalLabel">Share </h4>
                    </div>
                    <form>
                        <div class="err_mailsend" ></div>
                        <div class="modal-body text-center">
                            <h4 class="modalHeading">Share by Text or Email</h4>
                            
                            <div class="form-group text-left">
                                <input id="shorten_url" name="shorten_url" type="hidden" value="<?php echo ($shorten_url)?$shorten_url:current_url(); ?>" >
                                <label for="to">To <small>(required)</small></label>
                                <input id="to" name="to" type="text" class="form-control" placeholder="Recipients Email" >
                                <span id="err_to" ></span>    
                            </div>
                            <div class="form-group text-left">
                                <label for="from">From <small>(required)</small></label>
                                <input id="fromid" name="fromid" type="text"  class="form-control"  placeholder="Senders Email/Name" >
                                <span id="err_from" ></span>      
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn" id="btnemailsend">Send</button>
                            </div>
                        </form> 
                        <h4 class="modalHeading">Sharing by Social Network</h4>
                        
                        <ul class="list-unstyled list-inline socialShareWrap">
                            
                            <li>
                                <a href="//www.facebook.com/sharer/sharer.php?u=<?php echo $shorten_url; ?>" class="facebook"><i class="fa fa-facebook"></i></a>
                            </li>
                            
                            
                            <li>
                                <a href="http://twitter.com/intent/tweet?url=<?php echo $shorten_url; ?>" class="twitter"><i class="fa fa-twitter"></i></a>
                            </li>
                            
                            
                            <li>
                                <a href="//plus.google.com/share?url=<?php echo $shorten_url; ?>" class="googlePlus"><i class="fa fa-google-plus"></i></a>
                            </li>
                            
                            
                            <li>
                                <a href="//pinterest.com/pin/create/button/?url=<?php echo $shorten_url; ?>" class="pinterest"><i class="fa fa-pinterest-p"></i></a>
                            </li>
                            
                            
                            <!--<li>
                                <a href="" class="instagram"><i class="fa fa-instagram"></i></a>
                            </li>-->
                            
                            <li>
                                <a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $shorten_url; ?>" class="linkedin"><i class="fa fa-linkedin"></i></a>
                            </li>
                            
                        </ul>
                        <h4 class="modalHeading">Short URL for Sharing Page</h4>
                        <p><a href=""><?php echo $shorten_url; ?></a></p>
                        <?php if(!empty($user[0]['qr_code_image_ext']) && !empty($user[0]['qr_code_image'])) { ?>
                            <h4 class="modalHeading">Scan QRCode for Link</h4>
                            <img src="<?php echo 'data:' . $user[0]['qr_code_image_ext'] . ';base64,' . base64_encode($user[0]['qr_code_image']); ?>" width="200" />
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!--End Modal -->
		
        <!-- jQuery -->
        <script src="<?php echo asset_url() ?>backend/js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo asset_url() ?>backend/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!--Bootstrap Datepicker-->
        <script src="<?php echo asset_url(); ?>backend/vendors/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.js"></script>
        <!-- FastClick -->
        <script src="<?php echo backend_asset_url() ?>vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="<?php echo backend_asset_url() ?>vendors/nprogress/nprogress.js"></script>
        <!-- FullCalendar -->
        <script src="<?php echo backend_asset_url() ?>vendors/moment/min/moment.min.js"></script>
        <script src="<?php echo backend_asset_url() ?>vendors/fullcalendar/dist/fullcalendar.min.js"></script>
        <!-- Chart.js 
        <script src="<?php //echo backend_asset_url() ?>vendors/Chart.js/dist/Chart.min.js"></script>-->
        <!-- gauge.js 
        <script src="<?php //echo backend_asset_url() ?>vendors/gauge.js/dist/gauge.min.js"></script>-->
        <!-- bootstrap-progressbar -->
        <script src="<?php echo backend_asset_url() ?>vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="<?php echo backend_asset_url() ?>vendors/iCheck/icheck.min.js"></script>
        <!-- Skycons -->
        <script src="<?php echo backend_asset_url() ?>vendors/skycons/skycons.js"></script>
        <!-- Flot 
        <script src="<?php //echo backend_asset_url() ?>vendors/Flot/jquery.flot.js"></script>
        <script src="<?php //echo backend_asset_url() ?>vendors/Flot/jquery.flot.pie.js"></script>
        <script src="<?php //echo backend_asset_url() ?>vendors/Flot/jquery.flot.time.js"></script>
        <script src="<?php //echo backend_asset_url() ?>vendors/Flot/jquery.flot.stack.js"></script>
        <script src="<?php //echo backend_asset_url() ?>vendors/Flot/jquery.flot.resize.js"></script>-->
        <!-- Flot plugins 
        <script src="<?php //echo backend_asset_url() ?>vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
        <script src="<?php //echo backend_asset_url() ?>vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
        <script src="<?php //echo backend_asset_url() ?>vendors/flot.curvedlines/curvedLines.js"></script>-->
        <!-- DateJS -->
        <script src="<?php echo backend_asset_url() ?>vendors/DateJS/build/date.js"></script>
        <!-- JQVMap -->
        <script src="<?php echo backend_asset_url() ?>vendors/jqvmap/dist/jquery.vmap.js"></script>
        <script src="<?php echo backend_asset_url() ?>vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
        <script src="<?php echo backend_asset_url() ?>vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
        <!-- bootstrap-daterangepicker 
        <script src="<?php //echo backend_asset_url() ?>vendors/moment/min/moment.min.js"></script>
        <script src="<?php //echo backend_asset_url() ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>-->
        <?php if (($page == 'project_list') || ($page == 'productlist') || ($page == 'ordertable')) { ?>
            <script src="<?php echo backend_asset_url() ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
            <script src="<?php echo backend_asset_url() ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
            <script src="<?php echo backend_asset_url() ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
            <script src="<?php echo backend_asset_url() ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
            <script src="<?php echo backend_asset_url() ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
            <script src="<?php echo backend_asset_url() ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
            <script src="<?php echo backend_asset_url() ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
            <script src="<?php echo backend_asset_url() ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
            <script src="<?php echo backend_asset_url() ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
            <script src="<?php echo backend_asset_url() ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
            <script src="<?php echo backend_asset_url() ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
            <script src="<?php echo backend_asset_url() ?>vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
            <script src="<?php echo backend_asset_url() ?>vendors/jszip/dist/jszip.min.js"></script>
            <script src="<?php echo backend_asset_url() ?>vendors/pdfmake/build/pdfmake.min.js"></script>
            <script src="<?php echo backend_asset_url() ?>vendors/pdfmake/build/vfs_fonts.js"></script>
		<?php } ?>
		
		<?php if($page=="upload_files" || $page=="createproduct"){?>
			
			<!-- Dropzone.js -->
			<script src="<?php echo backend_asset_url() ?>vendors/dropzone/dist/min/dropzone.min.js"></script>
			
		<?php }?>
		
        <!-- validator -->
        <!--<script src="<?php //echo backend_asset_url() ?>vendors/validator/validator.js"></script>-->
        <!-- ckeditor -->
        <script src="<?php echo asset_url(); ?>backend/vendors/ckeditor/ckeditor.js"></script>
        <script src="<?php echo asset_url(); ?>backend/vendors/ckeditor/adapters/jquery.js"></script>
        <?php if ($page == 'createpaasport') { ?>
        <script src="<?php echo asset_url() ?>backend/js/demo.js"></script>
        <?php } ?>
		<!-- validator -->
        <script src="<?php echo asset_url() ?>backend/js/jquery.validate.min.js"></script>
		<!-- Parsley Form Validator 
		<script src="<?php //echo backend_asset_url() ?>vendors/parsleyjs/dist/parsley.min.js"></script>-->
        <!-- Music List Scripts used in dashboard -->
        <?php if($page=="dashboard" || $page=="edit_profile"){?>
            <script src="<?php echo asset_url() ?>backend/js/music-list.js"></script>
		<?php }?>
        <!-- Custom Scrollbar Scripts -->
        <script src="<?php echo asset_url() ?>backend/vendors/malihu-custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
        <?php if($page=="cloud_storage"){?>
        <!-- elfinder Scripts -->
        <script data-main="<?php echo backend_asset_url()?>elfinder/main.default.js" src="<?php echo backend_asset_url()?>elfinder/require.min.js"></script>
        <?php }?>
        <!-- Custom Theme Scripts -->
        <script src="<?php echo backend_asset_url() ?>build/js/custom.min.js"></script>
        <!-- Custom Scripts -->
        <script src="<?php echo backend_asset_url() ?>js/dashboard-custom.js"></script>
        <?php if($page=="createpaasport"){?>
        <script src="<?php echo asset_url() ?>backend/js/paasport-custom.js"></script>
		<?php }?>
		
		<script type="text/javascript"  >
			$(document).ready(function () {
				$('#btnemailsend').click(function() {
					
					$(".err_mailsend").html('<div class="loader"><div class="title">Sending...</div><div class="load"><div class="bar"></div></div></div>');	
					
					$("#err_to").html('');
					$("#err_from").html('');
					
					$.ajax({
						url: "<?php echo base_url() ?>backend/dashboard/sendmail",
						type: "POST",
						data: {
							to:$('#to').val(),
							fromid:$('#fromid').val(),
							shorten_url:$('#shorten_url').val()
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
							}
							else 
							{
								
								//$(".err_mailsend").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
								$("#err_to").html('<div class="text-danger">' + json.msg.to + '</div>');
								$("#err_from").html('<div class="text-danger">' + json.msg.from + '</div>');
								
								
								return false;
							}
						}
					});     
				});
			});
		</script>
		
	</body>
</html>
