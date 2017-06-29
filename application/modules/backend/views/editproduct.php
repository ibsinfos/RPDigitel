

<!-- page content -->
<div class="right_col createProductWrap" role="main">
	<div class="row">
        <div class="col-md-12 col-xs-12 col-xs-12">
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
				
				
                <div class="x_content navTabWrap">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#basicInfo" aria-controls="basicInfo" role="tab" data-toggle="tab">Basic Information</a>
						</li>
                        <li role="presentation" class="company_information">
                            <a href="#companyInfo" aria-controls="companyInfo" role="tab" data-toggle="tab">Group/Company Information</a>
						</li>
                        <li role="presentation" class="upload_files">
                            <a href="#uploadFiles" aria-controls="uploadFiles" role="tab" data-toggle="tab">Upload Files</a>
						</li>
					</ul>
					
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- BASIC INFORMATION TAB START -->
                        <div role="tabpanel" class="tab-pane active" id="basicInfo">
                            <form class="form-horizontal" id="basicInformationForm" name="basicInformationForm">
                                <ul class="list-unstyled list-inline">
                                    <li><label>Select Category:</label></li>
                                    <li>
                                        <select id="productCategory" name="productCategory" class="form-control">
                                            
											<?php if(!empty($basic_info_data)){ echo "<option value='".$basic_info_data[0]['category']."' style='display:none;'>".strtoupper($basic_info_data[0]['category'])."</option>";}else{echo "<option value='select'>Select Category</option>";}?>
											
                                            <option value="movie">Movie</option>
                                            <option value="music">Music</option>
                                            <option value="apk">APK</option>
                                            <option value="code">Code</option>
										</select>
									</li>
								</ul>
                                
                                <div class="row">
                                    <h4 class="text-center"><strong>PUBLISHER APPLICATION</strong></h4>
                                    <div class="col-xs-12">
                                        <br>
                                        <p class="redText">PLEASE READ THE INSTRUCTION PAGES BEFORE BEGINNING. YOUR APPLICATION CANNOT BE PROCESSED UNLESS ALL QUESTIONS HAVE BEEN FULLY ANSWERED. REMEMBER TO COMPLETE AND SIGN ALL DOCUMENTS AND INCLUDE THE APPROPRIATE PROCESSING FEE.</p>
                                        <label>Name of Your Proposed Publishing Company:</label>
                                        <p>(In order to eliminate confusion, it is necessary to reject any name identical with, or similar to, that of an established publishing company.)</p>
									</div>
								</div>
								<div class="row">
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="inputEmail3">1<sup>st</sup> Choice: </label>
                                        <input type="text" class="form-control" id="choice1" name="choice1" placeholder="" value="<?php if(!empty($basic_info_data)){ echo $basic_info_data[0]['choice1'];}?>">
									</div>
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="inputEmail3">2<sup>nd</sup> Choice: </label>
                                        <input type="text" class="form-control" id="choice2" name="choice2" placeholder="" value="<?php if(!empty($basic_info_data)){ echo $basic_info_data[0]['choice2'];}?>">
									</div>
								</div>
								<div class="row">
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="inputEmail3">3<sup>rd</sup> Choice: </label>
                                        <input type="text" class="form-control"  id="choice3" name="choice3" placeholder="" value="<?php if(!empty($basic_info_data)){ echo $basic_info_data[0]['choice3'];}?>">
									</div>
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="inputEmail3">4<sup>th</sup> Choice: </label>
                                        <input type="text" class="form-control"  id="choice4" name="choice4" placeholder="" value="<?php if(!empty($basic_info_data)){ echo $basic_info_data[0]['choice4'];}?>">
									</div>
								</div>
								<div class="row">
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="inputEmail3">5<sup>th</sup> Choice: </label>
                                        <input type="text" class="form-control"  id="choice5" name="choice5" placeholder="" value="<?php if(!empty($basic_info_data)){ echo $basic_info_data[0]['choice5'];}?>">
									</div>
								</div>
                                
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="businessAddress">Business Address:</label>
                                        <textarea class="form-control" id="businessAddress" name="businessAddress" rows="5" placeholder=""> <?php if(!empty($basic_info_data)){ echo $basic_info_data[0]['business_address'];}?></textarea>
									</div>
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 form-group">
                                                <label for="businessPhone">Business Phone:</label>
                                                <input type="text" class="form-control" id="businessPhone" name="businessPhone" placeholder="" value="<?php if(!empty($basic_info_data)){ echo $basic_info_data[0]['business_phone'];}?>">
											</div>
                                            <div class="col-xs-12 col-sm-6 form-group">
                                                <label for="fax">Fax:</label>
                                                <input type="text" class="form-control" id="fax" name="fax" placeholder="" value="<?php if(!empty($basic_info_data)){ echo $basic_info_data[0]['business_fax'];}?>">
											</div>
                                            <div class="col-xs-12 col-sm-6 form-group">
                                                <label for="email">Email:</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="" value="<?php if(!empty($basic_info_data)){ echo $basic_info_data[0]['business_email'];}?>">
											</div>
										</div>
									</div>
								</div>
								
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label>Business Structure: </label> 
                                        <small>Check only one box</small>
                                        <p class="text-center redText">*** FEE MUST BE RECEIVED WITH APPLICATION ***</p>
									</div>
                                    <div class="col-xs-12 form-group businessStructureRadioWrap">
                                        <label class="radio-inline" data-business-structure="individuallyOwned">
											<input type="radio" name="businessStructureRadio" value="A" <?php if(!empty($basic_info_data)){ if($basic_info_data[0]['business_structure_cat']=='A'){ echo "checked";}}?>> 
											A. Individually Owned- Fee: $150.00
										</label>
                                        <label class="radio-inline" data-business-structure="formallyOrganized">
											<input type="radio" name="businessStructureRadio" value="B" <?php if(!empty($basic_info_data)){ if($basic_info_data[0]['business_structure_cat']=='B'){ echo "checked";}}?>>
											B. Formally Organized Corporation- Fee: $150.00
										</label>
                                        <label class="radio-inline" data-business-structure="partnership">
											<input type="radio" name="businessStructureRadio" value="C" <?php if(!empty($basic_info_data)){ if($basic_info_data[0]['business_structure_cat']=='C'){ echo "checked";}}?>>
											C. Partnership- Fee: $150.00
										</label>
                                        <label class="radio-inline" data-business-structure="formallyOrganizedLLC">
											<input type="radio" name="businessStructureRadio" value="D" <?php if(!empty($basic_info_data)){ if($basic_info_data[0]['business_structure_cat']=='D'){ echo "checked";}}?>>
											D. Foramally Organized LLC- Fee: $150.00
										</label>
									</div>
								</div>
                                <h4 class="text-center"><strong><i>PROCEED TO THE SECTION OF THIS APPLICATION THAT IS APPROPRIATE FOR YOUR BUSINESS STRUCTURE</i></strong></h4>
                                <br>
                                <div class="businessStructureInfo individuallyOwned-information <?php if(!empty($basic_info_data)){ if($basic_info_data[0]['business_structure_cat']=='A'){ echo "active";}}?>">
                                    <h4 class="text-center"><strong>A. INDIVIDUALLY OWNED</strong></h4>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Name of Individual:</label>
										</div>
                                        <div class="col-xs-12 col-sm-4 form-group">
                                            <label>Last</label>
                                            <input type="text" id="io_lastName" name="io_lastName" class="form-control" placeholder="" value="<?php if(!empty($busi_io_data)){ echo $busi_io_data[0]['last_name'];}?>">
										</div>
                                        <div class="col-xs-12 col-sm-4 form-group">
                                            <label>First</label>
                                            <input type="text" id="io_firstName" name="io_firstName" class="form-control" placeholder="" value="<?php if(!empty($busi_io_data)){ echo $busi_io_data[0]['first_name'];}?>">
										</div>
                                        <div class="col-xs-12 col-sm-4 form-group">
                                            <label>Middle</label>
                                            <input type="text" id="io_middleName" name="io_middleName" class="form-control" placeholder="" value="<?php if(!empty($busi_io_data)){ echo $busi_io_data[0]['middle_name'];}?>">
										</div>
									</div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-4 form-group">
                                            <label for="socailSecurityNo">Social Security Number:</label>
                                            <input type="text" class="form-control" id="io_socailSecurityNo" name="io_socailSecurityNo" placeholder="" value="<?php if(!empty($busi_io_data)){ echo $busi_io_data[0]['social_security_number'];}?>">
										</div>
									</div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Complete Address:</label>
										</div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label for="street">Street:</label>
                                            <input type="text" class="form-control" id="io_street" name="io_street" placeholder="" value="<?php if(!empty($busi_io_data)){ echo $busi_io_data[0]['street'];}?>">
										</div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label for="city">City:</label>
                                            <input type="text" class="form-control" id="io_city" name="io_city" placeholder="" value="<?php if(!empty($busi_io_data)){ echo $busi_io_data[0]['city'];}?>">
										</div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label for="state">State:</label>
                                            <input type="text" class="form-control" id="io_state" name="io_state" placeholder="" value="<?php if(!empty($busi_io_data)){ echo $busi_io_data[0]['state'];}?>">
										</div>
										<div class="col-xs-12 col-sm-6 form-group">
                                            <label for="zipCode">Zip Code:</label>
                                            <input type="text" class="form-control" id="io_zipCode" name="io_zipCode" placeholder="" value="<?php if(!empty($busi_io_data)){ echo $busi_io_data[0]['zip_code'];}?>">
										</div>
									</div>
                                    <p class="text-center">If you are now or have ever been a writer-member affiliate of BMI, ASCAP, SESAC or any foreign performing rights organization, enter the information below.</p>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label for="organizationName">Name of Organization:</label>
                                            <input type="text" class="form-control" id="io_organizationName" name="io_organizationName" placeholder="" value="<?php if(!empty($busi_io_data)){ echo $busi_io_data[0]['organization_name'];}?>">
										</div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label for="affiliationPeriod">Period of Affiliation:</label>
                                            <input type="text" class="form-control" id="io_affiliationPeriod" name="io_affiliationPeriod" placeholder="" value="<?php if(!empty($busi_io_data)){ echo $busi_io_data[0]['affiliation_period'];}?>">
											
										</div>
									</div>
								</div>
								
                                <div class="businessStructureInfo formallyOrganized-information <?php if(!empty($basic_info_data)){ if($basic_info_data[0]['business_structure_cat']=='B'){ echo "active";}}?>">
                                    <h4 class="text-center"><strong>B. FORMALLY ORGANIZED CORPORATION</strong></h4>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label for="corporationName">Exact Name of Corporation:</label>
                                            <input type="text" class="form-control" id="foc_corporationName" name="foc_corporationName" placeholder="">
										</div>
                                        <div class="col-xs-12 form-group">
                                            <label class="radioLabel">Does this corporation have a division or DBA at ASCAP or SESAC?</label>
                                            <label class="radio-inline">
												<input type="radio" name="foc_is_corporationDivision" value="Y" checked> Yes
											</label>
                                            <label class="radio-inline">
												<input type="radio" name="foc_is_corporationDivision" value="N"> No
											</label>
										</div>
									</div>
									
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label for="companyName">Company Name:</label>
                                            <input type="text" class="form-control" id="foc_companyName" name="foc_companyName" placeholder="">
										</div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label for="incorporationState">State of Incorporation:</label>
                                            <input type="text" class="form-control" id="foc_incorporationState" name="foc_incorporationState" placeholder="">
										</div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label for="taxIdentyNo">Tax Identification Number:</label>
                                            <input type="text" class="form-control" id="foc_taxIdentyNo" name="foc_taxIdentyNo" placeholder="">
										</div>
                                        <div class="col-xs-12 form-group">
                                            <label class="radioLabel">Is your BMI publishing company a division or DBA of your corporation?</label>
                                            <label class="radio-inline">
												<input type="radio" name="foc_bmiDivisionRadio" value="division" checked> Division
											</label>
                                            <label class="radio-inline">
												<input type="radio" name="foc_bmiDivisionRadio" value="dba"> DBA
											</label>
										</div>
									</div>
									<p class="text-center redText">*** Please submit a copy of the Certificate of Incorporation with the application *** </p>
									<!--	<div class="row">
										<div class="col-xs-12">
										<h4><strong>Add Stockholders:</strong></h4>
										</div>
										<div class="col-xs-12 col-sm-4">
										<div class="form-group">
										<label for="companyName">Name:</label>
										<input type="text" class="form-control" id="" name="" placeholder="">
										</div>
										<div class="form-group">
										<label for="companyName">SS# or Tax ID#:</label>
										<input type="text" class="form-control" id="" name="" placeholder="">
										</div>
										<div class="form-group">
										<label for="companyName">Zip Code:</label>
										<input type="text" class="form-control" id="" name="" placeholder="">
										</div>
										
										
										
										</div>
										<div class="col-xs-12 col-sm-4">
										<div class="form-group">
										<label for="companyName">% Of Ownership:</label>
										<input type="text" class="form-control" id="" name="" placeholder="">
										</div>
										<div class="form-group">
										<label for="companyName">Is Stockholder A Publickly Traded Corporation:</label>
										<input type="text" class="form-control" id="" name="" placeholder="">
										</div>
										</div>
										<div class="col-xs-12 col-sm-4 form-group">
										<label for="companyName">Home Address:</label>
										<textarea type="text" class="form-control" id="" name="" placeholder="" style="height: 107px;"></textarea>
										</div>
										
										
										<div class="col-xs-12 text-right">
										<button type="button" class="btn btnRed">Add</button>
										</div>
										</div>
									-->
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4><strong>List All Stockholders:</strong></h4>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="table_stockholder_foc">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Home Address &amp; Zip Code</th>
                                                            <th>SS# or Tax ID#</th>
                                                            <th>% Of Ownership</th>
                                                            <th>Is Stockholder A Publickly Traded Corporation</th>
														</tr>
													</thead>
													
                                                    <tbody>
														
														
                                                        <tr>
                                                            
															<td>
																<input type="text" name="stockholdersName[]" id="stockholdersName" class="form-control">
															</td>
                                                            <td>
																<input type="text" name="homeAddressZipCode[]" id="homeAddressZipCode" class="form-control">
															</td>
                                                            <td>
																<input type="text" name="ssOrTaxId[]" id="ssOrTaxId" class="form-control">
															</td>
                                                            <td>
																<input type="text" name="percentageOfOwnership[]" id="percentageOfOwnership" class="form-control">
															</td>
															<td>
																<input type="text" name="isPublicklyTradedCorporation[]" id="isPublicklyTradedCorporation" class="form-control">
															</td>
                                                            <td>
																<input type="button" name="add_new" id="add_new" onclick="foc_add_stockholders()" value="Add" class=" btn btn-sm btnRed">
															</td>
                                                            
														</tr>   
														
														
													</tbody>
												</table>
											</div>
											
                                            <h4><strong>List All Officers:</strong></h4>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="table_officer_foc">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Home Address &amp; Zip Code</th>
                                                            <th>SS# or Tax ID#</th>
                                                            <th>Office Held</th>
														</tr>
													</thead>
													
                                                    <tbody>
                                                        <tr>
															<td>
																<input type="text" name="officers_name[]" id="officers_name"  class="form-control">
															</td>
                                                            <td>
																<input type="text" name="officers_homeAddressZipCode[]" id="officers_homeAddressZipCode" class="form-control">
															</td>
                                                            <td>
																<input type="text" name="officers_ssOrTaxId[]" id="officers_ssOrTaxId" class="form-control">
															</td>
                                                            <td>
																<input type="text" name="officers_officeHeld[]" id="officers_officeHeld" class="form-control">
															</td>
                                                            <td>
																<input type="button" name="add_new" id="add_new" onclick="foc_add_officers()" value="Add" class=" btn btn-sm btnRed">
															</td>
                                                            
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								
                                <div class="businessStructureInfo partnership-information <?php if(!empty($basic_info_data)){ if($basic_info_data[0]['business_structure_cat']=='C'){ echo "active";}}?>">
                                    <h4 class="text-center"><strong>C. PARTNERSHIP</strong></h4>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label for="taxIdentyNo">Tax Identification Number/EIN:</label>
                                            <input type="text" class="form-control" id="p_taxIdentyNo" name="p_taxIdentyNo" placeholder="">
                                            <span>(cannot be a social security number)</span>
										</div>
                                        <div class="col-xs-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="table_partner_fol">
                                                    <thead>
                                                        <tr>
                                                            <th>Name of Partners</th>
                                                            <th>Home Address &amp; Zip Code</th>
                                                            <th>SS# or Tax ID#</th>
                                                            <th>% Of Ownership</th>
														</tr>
													</thead>
                                                    <body>
                                                        <tr>
															<td>
																<input type="text" name="partners_name[]" id="partners_name" class="form-control">
															</td>
                                                            <td>
																<input type="text" name="partners_homeAddressZipCode[]" id="partners_homeAddressZipCode" class="form-control">
															</td>
                                                            <td>
																<input type="text" name="partners_ssOrTaxId[]" id="partners_ssOrTaxId" class="form-control">
															</td>
                                                            <td>
																<input type="text" name="partners_ownership[]" id="partners_ownership" class="form-control">
															</td>
                                                            <td>
																
																<input type="button" name="add_new" id="add_new" onclick="fol_add_partners()" value="Add" class=" btn btn-sm btnRed">
															</td>
                                                            
														</tr>   
													</body>
												</table>
											</div>
										</div>
									</div>
								</div>
								
                                <div class="businessStructureInfo formallyOrganizedLLC-information <?php if(!empty($basic_info_data)){ if($basic_info_data[0]['business_structure_cat']=='D'){ echo "active";}}?>">
                                    <h4 class="text-center"><strong>D. FORMALLY ORGANIZED LIMITED LIABILITY COMPANY</strong></h4>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label for="nameOfLLC">Exact Name of LLC:</label>
                                            <input type="text" class="form-control" id="fol_nameOfLLC" name="fol_nameOfLLC" placeholder="">
										</div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label for="companyName">Company Name:</label>
                                            <input type="text" class="form-control" id="fol_companyName" name="fol_companyName" placeholder="">
										</div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label for="incorporationState">State Where Organized:</label>
                                            <input type="text" class="form-control" id="fol_incorporationState" name="fol_incorporationState" placeholder="">
										</div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label for="taxIdentyNo">Tax Identification Number:</label>
                                            <input type="text" class="form-control" id="fol_taxIdentyNo" name="fol_taxIdentyNo" placeholder="">
										</div>
                                        <div class="col-xs-12 form-group">
                                            <label class="radioLabel">Is your BMI publishing company a division or DBA of your LLC?</label>
                                            <label class="radio-inline">
												<input type="radio" name="fol_bmiDivision" value="division" checked> Division
											</label>
                                            <label class="radio-inline">
												<input type="radio" name="fol_bmiDivision" value="dba"> DBA
											</label>
										</div>
                                        <div class="col-xs-12">
                                            <p class="text-center redText">*** Please submit a copy of the Articles of Organization with the application *** </p>
                                            <h4><strong>List All Members</strong></h4>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="table_member_fol">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Home Address &amp; Zip Code</th>
                                                            <th>SS# or Tax ID#</th>
                                                            <th>% Of Ownership</th>
															
                                                            <th>Action</th>
														</tr>
													</thead>
                                                    <body>
                                                        <tr>
															<td>
																<input type="text" name="members_name[]" id="members_name" class="form-control">
															</td>
                                                            <td>
																<input type="text" name="members_homeAddressZipCode[]" id="members_homeAddressZipCode" class="form-control">
															</td>
                                                            <td>
																<input type="text" name="members_ssOrTaxId[]" id="members_ssOrTaxId" class="form-control">
															</td>
                                                            <td>
																<input type="text" name="members_ownership[]" id="members_ownership" class="form-control">
															</td>
                                                            <td>
																<input type="button" name="add_new" id="add_new" onclick="fol_add_members()" value="Add" class=" btn btn-sm btnRed">
															</td>
                                                            
														</tr>   
													</body>
												</table>
											</div>
										</div>
                                        <div class="col-xs-12">
                                            <h4><strong>List Manager(s) Authorized Under Articles of Organization, If Any:</strong></h4>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="table_manager_fol">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Home Address &amp; Zip Code</th>
                                                            <th>SS# or Tax ID#</th>
                                                            <th width="200">Do they have authority to sign agreements and otherwise act on behalf of the company?</th>
														</tr>
													</thead>
                                                    <body>
                                                        <tr>
                                                            <td>
																<input type="text" name="managers_name[]" id="managers_name" class="form-control">
															</td>
                                                            <td>
																<input type="text" name="managers_homeAddressZipCode[]" id="managers_homeAddressZipCode" class="form-control">
															</td>
                                                            <td>
																<input type="text" name="managers_ssOrTaxId[]" id="managers_ssOrTaxId" class="form-control">
															</td>
                                                            <td>
																<input type="text" name="managers_ownership[]" id="managers_ownership" class="form-control">
															</td>
                                                            <td>
																
																<input type="button" name="add_new" id="add_new" onclick="fol_add_managers()" value="Add" class=" btn btn-sm btnRed">
															</td>
                                                            
														</tr>   
													</body>
												</table>
											</div>
										</div>
									</div>
								</div>
								
                                <!-- <h4 class=""><strong>SUBSTITUTE W-9</strong> <small>(Request for Taxpayer Identification and Certification)</small></h4> -->
								
                                <div class="col-xs-12 text-right form-group">
                                    <button type="submit" class="btn btnRed" id="save_basic_info">Save</button>
								</div>
							</form>
						</div>
						
                        <!-- COMPANY INFORMATION TAB START -->
                        <div role="tabpanel" class="tab-pane" id="companyInfo">
                            <form class="form-horizontal" id="companyInformationForm" name="companyInformationForm">
                                <p>If any owner, stockholder, officer, partner, member/manager, or executive has been or is connected with any other publishing company engaged in the solicitation of music, please give following information:</p>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4">
                                        <label>Publishing Company Name</label>
                                        <div class="form-group">
                                            <input type="text" name="publishing_company_name1" class="form-control" placeholder="" value="<?php if(!empty($company_info_data)){ echo $company_info_data[0]['publishing_company_name1'];}?>">
										</div>
                                        <div class="form-group">
                                            <input type="text" name="performing_rights_organization1" class="form-control" placeholder="" value="<?php if(!empty($company_info_data)){ echo $company_info_data[0]['performing_rights_organization1'];}?>">
										</div>
                                        <div class="form-group">
                                            <input type="text" name="position_held1" class="form-control" placeholder="" value="<?php if(!empty($company_info_data)){ echo $company_info_data[0]['position_held1'];}?>">
										</div>
									</div>
                                    <div class="col-xs-12 col-sm-4">
                                        <label>Performing Rights Organization</label>
										<div class="form-group">
                                            <input type="text" name="publishing_company_name2" class="form-control" placeholder="" value="<?php if(!empty($company_info_data)){ echo $company_info_data[0]['publishing_company_name2'];}?>">
										</div>
                                        <div class="form-group">
                                            <input type="text" name="performing_rights_organization2" class="form-control" placeholder="" value="<?php if(!empty($company_info_data)){ echo $company_info_data[0]['performing_rights_organization2'];}?>">
										</div>
                                        <div class="form-group">
                                            <input type="text" name="position_held2" class="form-control" placeholder="" value="<?php if(!empty($company_info_data)){ echo $company_info_data[0]['position_held2'];}?>">
										</div>
									</div>
                                    <div class="col-xs-12 col-sm-4">
                                        <label>Position Held</label>
                                        <div class="form-group">
                                            <input type="text" name="publishing_company_name3" class="form-control" placeholder="" value="<?php if(!empty($company_info_data)){ echo $company_info_data[0]['publishing_company_name3'];}?>">
										</div>
                                        <div class="form-group">
                                            <input type="text" name="performing_rights_organization3" class="form-control" placeholder="" value="<?php if(!empty($company_info_data)){ echo $company_info_data[0]['performing_rights_organization3'];}?>">
										</div>
                                        <div class="form-group">
                                            <input type="text" name="position_held3" class="form-control" placeholder="" value="<?php if(!empty($company_info_data)){ echo $company_info_data[0]['position_held3'];}?>">
										</div>
									</div>
								</div>
                                <div class="row">
                                    <div class="col-xs-12 form-group">
                                        <label>Do you wish to have your company information listed listed on the BMI website?</label>
                                        <label class="radio-inline">
											<input type="radio" name="companyInfoListed" value="Y" <?php if(!empty($company_info_data)){ if($company_info_data[0]['is_listed_on_bmi_website']=='Y'){ echo "checked";}}?>> Yes
										</label>
                                        <label class="radio-inline">
											<input type="radio" name="companyInfoListed" value="N" <?php if(!empty($company_info_data)){ if($company_info_data[0]['is_listed_on_bmi_website']=='N'){ echo "checked";}}?>> No
										</label>
                                        <p>If yes, enter the information below:</p>
									</div>
								</div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="contactName">Contact Name:</label>
                                        <input type="text" class="form-control" id="contactName" name="contactName" placeholder="" value="<?php if(!empty($company_info_data)){ echo $company_info_data[0]['contact_name'];}?>">
									</div>
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="title">Title:</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="" value="<?php if(!empty($company_info_data)){ echo $company_info_data[0]['title'];}?>">
									</div>
								</div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="address">Address:</label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="" value="<?php if(!empty($company_info_data)){ echo $company_info_data[0]['address'];}?>">
									</div>
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="city">City:</label>
                                        <input type="text" class="form-control" id="city" name="city" placeholder="" value="<?php if(!empty($company_info_data)){ echo $company_info_data[0]['city'];}?>">
									</div>
								</div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="state">State:</label>
                                        <input type="text" class="form-control" id="state" name="state" placeholder="" value="<?php if(!empty($company_info_data)){ echo $company_info_data[0]['state'];}?>">
									</div>
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="zip">Zip:</label>
                                        <input type="text" class="form-control" id="zip" name="zip" placeholder="" value="<?php if(!empty($company_info_data)){ echo $company_info_data[0]['zip'];}?>">
									</div>
								</div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="phone">Phone:</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="<?php if(!empty($company_info_data)){ echo $company_info_data[0]['phone'];}?>">
									</div>
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="fax">FAX:</label>
                                        <input type="text" class="form-control" id="fax" name="fax" placeholder="" value="<?php if(!empty($company_info_data)){ echo $company_info_data[0]['fax'];}?>">
									</div>
								</div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="" value="<?php if(!empty($company_info_data)){ echo $company_info_data[0]['email'];}?>">
									</div>
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="url">Web Page Address(URL):</label>
                                        <input type="url" class="form-control" id="url" name="url" placeholder="" value="<?php if(!empty($company_info_data)){ echo $company_info_data[0]['url'];}?>">
									</div>
								</div>
                                <div class="row">
                                    <div class="col-xs-12 form-group">
                                        <label>Is your publishing company currently being administered by another BMI publishing company?</label>
                                        <label class="radio-inline">
											<input type="radio" name="anotherBMICompany" value="Y" <?php if(!empty($company_info_data)){ if($company_info_data[0]['is_administratered_by_bmi']=='Y'){ echo "checked";}}?>> Yes
										</label>
                                        <label class="radio-inline">
											<input type="radio" name="anotherBMICompany" value="N" <?php if(!empty($company_info_data)){ if($company_info_data[0]['is_administratered_by_bmi']=='Y'){ echo "checked";}}?>> No
										</label>
									</div>
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="administratorName">Name of Administrator (please print)</label>
                                        <input type="text" class="form-control" id="administratorName" name="administratorName" placeholder="" value="<?php if(!empty($company_info_data)){ echo $company_info_data[0]['administrator_name'];}?>">
									</div>
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="contactPerson">Contact Person (please print)</label>
                                        <input type="text" class="form-control" id="contactPerson" name="contactPerson" placeholder="" value="<?php if(!empty($company_info_data)){ echo $company_info_data[0]['contact_person'];}?>">
									</div>
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="">Address</label>
                                        <input type="text" name="administratorAddress" class="form-control" id="" placeholder="" value="<?php if(!empty($company_info_data)){ echo $company_info_data[0]['administrator_address'];}?>">
									</div>
								</div>
                                <p>* You must submit a copy of your Administration Agreement with this application. The Administration Agreement will not be processed until your publisher affiliation has beed finalized.</p>
                                <div class="row">
                                    <div class="col-xs-12 form-group">
                                        <label>Do you have a contact or representative at BMI?</label>
                                        <label class="radio-inline">
											<input type="radio" name="contactAtBMI" value="Y"  <?php if(!empty($company_info_data)){ if($company_info_data[0]['is_representative_at_bmi']=='Y'){ echo "checked";}}?>> Yes
										</label>
                                        <label class="radio-inline">
											<input type="radio" name="contactAtBMI" value="N" <?php if(!empty($company_info_data)){ if($company_info_data[0]['is_representative_at_bmi']=='Y'){ echo "checked";}}?>> No
										</label>
									</div>
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="bmiContactName">If yes, please provide their name:</label>
                                        <input type="text" class="form-control" id="bmiContactName" name="bmiContactName" placeholder="" value="<?php if(!empty($company_info_data)){ echo $company_info_data[0]['representative_name'];}?>">
									</div>
                                    <div class="col-xs-12 text-right form-group">
                                        <button class="btn btnRed">Save</button>
									</div>
								</div>
							</form>
						</div>
						
                        <!-- UPLOAD FILES TAB START -->
                        <div role="tabpanel" class="tab-pane" id="uploadFiles">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
									<a href="" class="panel addProductBtn siloSDBtn" data-toggle="modal" data-target="#myModal">
										<!--<a href="<?php //echo base_url()."dashboard/addproduct"; ?>" class="panel addProductBtn siloSDBtn">-->
                                        <span>Select from SiloSD</span>
									</a>
									
								</div>
                                <div class="col-xs-12 col-sm-4">
                                    <a href="<?php echo base_url()."dashboard/addproduct"; ?>" class="panel addProductBtn scanDiscBtn">
                                        <span>Select from Silo Scandisc</span>
									</a>
								</div>
                                <div class="col-xs-12 col-sm-4">
                                    <a href="<?php echo base_url()."dashboard/addproduct"; ?>" class="panel addProductBtn cloudBtn">
                                        <span>Upload files from Cloud</span>
									</a>
								</div>
							</div>
							
                            <div class="row">
                                <div class="col-xs-12">
                                    <br><br>
									<!--
										<form action="<?php //echo base_url().'upload_files_publish_application'; ?>" class="dropzone" id="publisher_application_upload_dropzone"></form>  
										
									-->
									
									
									<div id="publisher_application_upload" class="dropzone">
										<div class="dz-default dz-message">Drag and Drop Files here</div>
										<input type="hidden" name="thumbnails" id="thumbval">
									</div>
									
									<br><br>
								</div>
                                <div class="col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="table_publisher_files">
                                            <thead>
                                                <tr>
                                                    <!--<th><label class="checkbox-inline"><input type="checkbox"> Check</label></th>-->
                                                    <th>Sr. No.</label></th>
                                                    <th>File Name</th>
                                                    <th>File Type</th>
                                                    <th>Action</th>
                                                    <!--<th>Rating</th>
														<th>Preview</th>
													-->
												</tr>
											</thead>
                                            <tbody>
											</tbody>
										</table>
									</div>
								</div>
                                <div class="col-xs-12 text-right form-group">
									
								 	<form class="form-horizontal" id="publisherApplicationForm" name="publisherApplicationForm">
										
										<button class="btn btnRed">Submit</button>
										
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<?php
					/*		if($this->session->userdata('publisher_basic_info')){
						echo "<pre>";
						print_r($this->session->userdata('publisher_basic_info'));
						}
						
						if($this->session->userdata('publisher_company_info')){
						echo "<pre>";
						print_r($this->session->userdata('publisher_company_info'));
					}*/
				?>
			</div>
		</div>
	</div>
	<!--
		<form method="post" action="<?php //echo base_url().'dashboard/create_pdf'; ?>">
		
		<input type="submit" name="create_product" id="create_product" value="Create PDF">
		</form>
		
	-->
	<?php 
		
		// if($this->input->post('test_name')){
		// echo $this->input->post('test_name');
		// }
		
		
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



<!-- Modal -->
<div class="modal fade fileSelectModal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="siosd_upload_files_form" name="siosd_upload_files_form" >
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Select Files</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						
						
						<?php
								$count_file=0;
							foreach($silosd_files as $silosd_file){
								$count_file++;
							?>
							
							<div class="col-md-3">
								<div class="panel panel-default">
									<input type="checkbox" name="silo_sd_files_chk_<?php echo $count_file;?>" id="silo_sd_files_chk_<?php echo $count_file;?>" value="<?php echo base_url().$silosd_file;?>"  class="chkBox">
									<!--<input type="text" name="silo_sd_files[]" value="<?php //echo base_url().$silosd_file;?>">-->
									<img src="<?php echo base_url().$silosd_file;?>" class="img-responsive"></img>
								</div>
							</div>
							
							<?php
							}
						?>
						
						<!--
							<div class="col-md-3">
							<div class="panel panel-default">
							<input type="checkbox" class="chkBox">
							<img src="<?php //echo backend_asset_url() ?>images/dedicated_server.jpg" class="img-responsive">
							</div>
							</div>
							<div class="col-md-3">
							<div class="panel panel-default">
							<input type="checkbox" class="chkBox">
							<img src="<?php //echo backend_asset_url() ?>images/dedicated_server.jpg" class="img-responsive">
							</div>
							</div>
							<div class="col-md-3">
							<div class="panel panel-default">
							<input type="checkbox" class="chkBox">
							<img src="<?php //echo backend_asset_url() ?>images/dedicated_server.jpg" class="img-responsive">
							</div>
							</div>
						-->
						
						
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btnRed" id="upload_files_from_silo_cloud">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>




<script type="text/javascript">
	
	var basicInformationForm_save_URL = "<?php echo base_url() . 'save_publish_application_basic_info'; ?>"; //refer \media\backend\js\dashboard-custom.js
	var companyInformationForm_save_URL = "<?php echo base_url() . 'save_publish_application_company_info'; ?>"; //refer \media\backend\js\dashboard-custom.js
	var publisherApplicationForm_save_URL = "<?php echo base_url() . 'save_publish_application_all_info'; ?>"; //refer \media\backend\js\dashboard-custom.js
	
	var uploadProductFiles_URL = "<?php echo base_url() . 'uploadProductFiles'; ?>"; //refer \media\backend\js\dashboard-custom.js
	var deleteThumbnail_URL = "<?php echo base_url() . 'deleteThumbnail'; ?>"; //refer \media\backend\js\dashboard-custom.js
	var upload_from_silo_sd_URL = '<?php echo  base_url();?>upload_from_silo_sd'; //refer \media\backend\js\dashboard-custom.js
	
	
</script>


