<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
				
                <div id="features">
					
                    <div class="span8 Features">
                        <div class="widget-header"> <i class="icon-bookmark"></i>
                            <h3>User Details</h3>
						</div>
                        <!-- /widget-header -->
						
                        <!-- /widget-content --> 
					</div>
					
					
                    <div class="span4 Features">
                        <div class="widget-header"> <i class="icon-bookmark"></i>
                            <h3>view_qrcode</h3>
						</div>
                        <!-- /widget-header -->
                        <div class="Accounts widget-content">
							
							<img src="<?php echo base_url();?>/load_image.php?user_id=<?php echo $_SESSION['user_account']['user_id'];?>">
							<?php
								
  // echo base_url()."/load_image.php?pic_id=12";

								// header('Content-Length: '.strlen($data_qrcode['qr_code']));
								// header("Content-type: image/".$data_qrcode['ext']);
								// echo $data_qrcode['qr_code'];
								
								// echo '<img src="data:image/jpeg;base64,'.base64_decode( $data_qrcode['qr_code'] ).'"/>';
								
								
								// header('Content-Length: '.strlen($data_qrcode[0]->qr_code));
								// header('Content-type: image/png');
								// echo $data_qrcode[0]->qr_code;
								
								// echo "<img src=".$data_qrcode[0]->qr_code."/>";
								
								
								   // echo $data_qrcode[0]->qr_code;
								 
								// echo "<pre>";
								// print_r($data_qrcode);
								
								
								// echo base_url()."application/modules/frontend/views/load_image.php";
								
								
								
								// echo "<img src='".base_url()."load_image.php' alt='qr image' />";
								
								// print_r($data_qrcode);
								
							?>
							
						</div>
						<!-- /widget-content --> 
					</div>
				</div>
			</div>
			
		</div>
		<!-- /span6 -->
		
		<!-- /span6 --> 
		</div>
		<!-- /row --> 
							</div>
							<script src="<?php echo asset_url() ?>inner/js/jquery-1.7.2.min.js"></script>                                                                                      <!-- /container --> 							