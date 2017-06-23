

<!-- page content -->
<div class="right_col" role="main">
	<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
			<div class="x_title">
			<h2>Create Product</h2>
			<ul class="nav navbar-right panel_toolbox">
				<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#">Settings 1</a>
						</li>
						<li><a href="#">Settings 2</a>
						</li>
					</ul>
				</li>
				<li><a class="close-link"><i class="fa fa-close"></i></a>
				</li>
			</ul>
			<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div class="row createProductWrap">
					<div class="col-md-4">
						<a href="<?php echo base_url()."dashboard/addproduct"; ?>" class="addProductBtn siloSDBtn">
							<span>Select from SiloSD</span>
						</a>
					</div>
					<div class="col-md-4">
						<a href="<?php echo base_url()."dashboard/addproduct"; ?>" class="addProductBtn scanDiscBtn">
							<span>Select from Silo Scandisc</span>
						</a>
					</div>
					<div class="col-md-4">
						<a href="<?php echo base_url()."dashboard/addproduct"; ?>" class="addProductBtn cloudBtn">
							<span>Upload files from Cloud</span>
						</a>
					</div>
				</div>
				
			</div>
			</div>
			
			<form method="post" action="<?php echo base_url().'dashboard/create_pdf'; ?>">
				
				<!--<input type="text" name="test_name" id="test_name" >-->
				<input type="submit" name="create_product" id="create_product" value="Create PDF">
			</form>
			
			
			<?php 
				
				if($this->input->post('test_name')){
					echo $this->input->post('test_name');
				}
				
				
				/*
					require_once('a/fpdf.php');
					require_once('a/fpdi.php');
					
					$pdf = new FPDI();
					$pdf->AddPage();
					
					// $filename=base_url().'assets/ARAWALI APPLICATION FORM DOWNLOAD.pdf';
					$filename='C:/xampp/htdocs/RPDigitel/assets/ARAWALI APPLICATION FORM DOWNLOAD.pdf';
					
					$pdf->setSourceFile($filename); 
					// import page 1 
					$tplIdx = $pdf->importPage(1); 
					//use the imported page and place it at point 0,0; calculate width and height
					//automaticallay and ajust the page size to the size of the imported page 
					$pdf->useTemplate($tplIdx, 0, 0, 0, 0, true); 
					
					
					
					
					// now write some text above the imported page 
					$pdf->SetFont('Arial', '', '13'); 
					$pdf->SetTextColor(0,0,0);
					//set position in pdf document
					$pdf->SetXY(20, 20);
					//first parameter defines the line height
					$pdf->Write(0, 'gift code');
					//force the browser to download the output
					$pdf->Output('gift_coupon_generated.pdf', 'D');
				*/
				
				
				
			?>
			
			</div>
	</div>
</div>



