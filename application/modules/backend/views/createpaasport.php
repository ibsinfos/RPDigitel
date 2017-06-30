<!-- page content -->
<div class="right_col createPaasportWrap" role="main">
	<div class="row">
		<div class="col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>BUILD YOUR PAASPORT<br><small>This information will get used to build your PAASPORT.</small></h2>
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
							<a href="#basicInfoTab" aria-controls="basicInfoTab" role="tab" data-toggle="tab">Basic Information</a>
						</li>
						<li role="presentation" class="">
							<a href="#socialInfo" aria-controls="socialInfo" role="tab" data-toggle="tab">Social</a>
						</li>
						<li role="presentation" class="">
							<a href="#aboutInfo" aria-controls="aboutInfo" role="tab" data-toggle="tab">About</a>
						</li>
						<li role="presentation" class="">
							<a href="#additionalInfo" aria-controls="additionalInfo" role="tab" data-toggle="tab">Additional Information</a>
						</li>
						<li role="presentation" class="">
							<a href="#blog" aria-controls="blog" role="tab" data-toggle="tab">Blog</a>
						</li>
					</ul>
					
					<!-- Tab panes -->
					<div class="tab-content">
						<!-- BASIC INFORMATION TAB START -->
						<div role="tabpanel" class="tab-pane active" id="basicInfoTab">
							<div class="row">
								<div class="col-xs-12">
									<h3 class="heading"> Let's start with the basic information </h3>
									<div class="frmerror"></div>
									<form id="basicInfo" method="POST" role="form" action="" novalidate="novalidate" enctype="mutlipart/form-data" >
										<div class="row">
											<div class="col-xs-12 col-sm-6">
												<div class="form-group">
													<div class="pictureContainer">
													 	<div class="picture">
															<img src="<?php echo asset_url(); ?>backend/images/paasport/default-avatar.png" class="picture-src img-circle" id="wizardPicturePreview" title="" height="106"/>
															<input type="file" id="wizard-picture" name="wizard-picture">
														</div>
														<input type="hidden" value="<?php //echo ($user_data[0]['user_image']) ? $user_data[0]['user_image'] : ''; ?>" name="old_user_image">
														<h4 style="margin: 10px 0 15px;">Choose Picture</h4>
													</div>
												</div>
												<div class="form-group">
													<label>Email
														<small>(required)</small>
													</label>
													<input type="hidden" value="<?php //echo ($user_data[0]['id']) ? $user_data[0]['id'] : ''; ?>" name="id">
													<input name="email" type="email" class="form-control" placeholder="eg. johndoe@website.com" value="">
													<span id="err_email" ></span>	   
												</div>
												<div class="form-group">
													<label>Address</label>
													<textarea name="address" class="form-control" rows="4" placeholder="123 6th St.Melbourne, FL 32904" maxlength="100"></textarea>
												</div>
											</div>
											<div class="col-xs-12 col-sm-6">
												<p></p>
												<div class="form-group">
													<label>First Name
														<small>(required)</small>
													</label>
													<input name="firstname" id="firstname" type="text" class="form-control"
													placeholder="Enter your name" value="" maxlength="10">
													<span id="err_firstname" ></span>	
												</div> 
												<div class="form-group">
													<label>Last Name
														<small>(required)</small>
													</label>
													<input name="lastname" type="text" class="form-control" value="" placeholder="Enter your surname"  maxlength="10">
													<span id="err_lastname" ></span>	   
												</div>
												<div class="form-group">
													<label>Contact Number
														<small>(required)</small>
													</label>
													<input name="contact" type="tel" class="form-control" placeholder="eg.(417) 123-4567" value="">
													<span id="err_contact" ></span>	   
												</div>
												<div class="form-group">
													<label>Pincode</label>
													<input name="pincode" type="text" class="form-control" placeholder="422010" value="" >
												</div>
												<div class="form-group">
													<label>Cover Image</label>
													<input name="cover_image"  type="file"   value="" >
												</div>
											</div>
											<div class="col-lg-12">
												<ul class="list-unstyled list-inline">
													<li>
														<h4>Company details:</h4>
													</li>
													<li>
														<input id="addbtn" type="button" class="btn btnRed"
														data-toggle="modal" data-target="#professionalInfoModal" value="Add +">
													</li>
												</ul>
												<div class="text-center">
													<button type="button" id="basicInfoSubmit" name="basicInfoSubmit" class="btn btnRed btn-lg">Save</button>
												</div>	
											</div>
										</div>
									</form>
								</div>
	                		</div>
	            		</div>

			            <!-- SOCIAL INFORMATION TAB START -->
			            <div role="tabpanel" class="tab-pane" id="socialInfo">
			            	<div class="row">
			            		<div class="col-xs-12">
			            			<h3 class="heading"> Enter Some of your social links to add </h3>
			            			<div class="frmerror_socialinfo" ></div>
			            		</div>
			            	</div>
	            			<form id="frmSocialInfo" class="socialInputGroup">
	            				<div class="row">
		            				<div class="col-sm-6 form-group">
	            						<label for="facebook">Facebook</label>
	            						<div class="input-group">
	            							<span class="input-group-addon facebook">
	            								<i class="fa fa-facebook"></i>
	            							</span>
	            							<input type="hidden" value="<?php //echo ($user_data[0]['id']) ? $user_data[0]['id'] : ''; ?>" name="id">
	            							<input id="facebook" name="facebook_url" type="text" class="form-control" placeholder="facebook id only" value="" >
	            						</div>
	            						<span id="err_facebook_url" ></span>
	            					</div>
	            					<div class="col-sm-6 form-group">
	            						<label for="twitter">Twitter</label>
	            						<div class="input-group">
	            							<span class="input-group-addon twitter">
	            								<i class="fa fa-twitter"></i>
	            							</span>
	            							<input id="twitter" name="twitter_url" type="text" class="form-control" value="" placeholder="Enter Twitter page id">
	            						</div>
	            						<span id="err_twitter_url" ></span>	
	            					</div>
	            				</div>
	            				<div class="row">
	            					<div class="col-sm-6 form-group">
	            						<label for="googleplus">Google plus</label>
	            						<div class="input-group">
	            							<span class="input-group-addon googlePlus">
	            								<i class="fa fa-google-plus"></i>
	            							</span>
	            							<input id="googlePlus" name="googleplus_url" type="text" class="form-control" value="" placeholder="Enter google plus page id">
	            						</div>
	            						<span id="err_googleplus_url" ></span>	
	            					</div>
	            					<div class="col-sm-6 form-group">
	            						<label for="linkedin">Linkedin</label>
	            						<div class="input-group">
	            							<span class="input-group-addon linkedin">
	            								<i class="fa fa-linkedin"></i>
	            							</span>
	            							<input id="linkedin" name="linkedin_url" type="text" class="form-control" value="" placeholder="Enter Linked in page id">
	            						</div>
	            						<span id="err_linkedin_url" ></span>
	            					</div>
	            				</div>
	            				<div class="row">
	            					<div class="col-sm-6 form-group">
	            						<label for="youtube">Youtube</label>
	            						<div class="input-group">
	            							<span class="input-group-addon youtube">
	            								<i class="fa fa-youtube-play"></i>
	            							</span>
	            							<input id="youtube" name="youtube_url" type="text" class="form-control" value="" placeholder="Enter Youtube page url">
	            						</div>
	            						<span id="err_youtube_url" ></span>	
	            					</div>
	            					<div class="col-sm-6 form-group">
	            						<label for="pinterest">Pinterest</label>
	            						<div class="input-group">
	            							<span class="input-group-addon pinterest">
	            								<i class="fa fa-pinterest"></i>
	            							</span>
	            							<input id="pinterest" name="pinterest_url" type="text"
	            							class="form-control" value=""
	            							placeholder="Enter pinterest url">
	            						</div>
	            						<span id="err_pinterest_url" ></span>
	            					</div>
	            				</div>
	            				<div class="row">
	            					<div class="col-sm-6 form-group">
	            						<label>Email:
	            							<small>(Enter Your Email To receive mails from contact form)</small>
	            						</label>
	            						<div class="input-group">
	            							<span class="input-group-addon email">
	            								<i class="fa fa-envelope"></i>
	            							</span>
	            							<input name="user_url" type="text" class="form-control" value=""
	            							placeholder="johndoe@website.com">
	            						</div>
	            						<span id="err_user_url" ></span>
		            				</div>
		            				<div class="col-xs-12 text-center">
		            					<button type="button" id="socialInfoSubmit" name="socialInfoSubmit"  class="btn btnRed btn-lg">Save</button>
		            				</div>
		            			</div>
	            			</form>
			            </div>

			            <!-- ABOUT INFORMATION TAB START -->
			            <div role="tabpanel" class="tab-pane" id="aboutInfo">
			            	<div class="row">
			            		<div class="col-xs-12">
			            			<h3 class="heading"> Tell Us More About You </h3>
			            			<div class="tabbable-panel">
			            				<div class="tabbable-line">
			            					<ul class="nav nav-tabs ">
			            						<li class="active">
			            							<a href="#shortBio" data-toggle="tab">Short Bio </a>
			            						</li>
			            						<li>
			            							<a href="#skillExpertise" data-toggle="tab">Skills &amp; Expertise </a>
			            						</li>
			            						<li>
			            							<a href="#experice" data-toggle="tab">Experience </a>
			            						</li>
			            						<li>
			            							<a href="#education" data-toggle="tab">Education </a>
			            						</li>
			            					</ul>
			            					<div class="tab-content">
			            						<div class="tab-pane active" id="shortBio">
			            							<div class="frmerror_shortbioinfo" ></div>
			            							<form id="frmshortBioInfo">
			            								<label for="editor1">Add About or Short Bio :</label>
			            								<textarea id="editor1" class="editor" name="editor1" maxlength="160"></textarea>
			            								<input type="hidden" value="<?php //echo ($user_data[0]['id']) ? $user_data[0]['id'] : ''; ?>" name="id">
			            								<div class="text-center">
			            									<button type="button" id="shortBioSubmit" name="shortBioSubmit"  class="btn btnRed btn-lg">Save</button>
			            								</div>
			            							</form>
			            						</div>
			            						<div class="tab-pane" id="skillExpertise">
			            							<h3>Skills &amp; Expertise</h3>
			            							<div class="panel panel-default">
			            								<div class="frmerror_skillsandexpertise"></div>
			            								<form id="frmskillsAndExerptise">															
			            									<div class="panel-body form-horizontal Experience-form">
			            										<div class="form-group">
			            											<label for="prevCompanyName" class="col-sm-3 control-label">Skill &amp; Expertise</label>
			            											<div class="col-sm-9">
			            												<input class="form-control" id="txt_skill" name="txt_skill" placeholder="Enter Skill &amp; Expertise" type="text">
			            												<span id="err_txt_skill"></span>	   
			            											</div>
			            										</div>																
			            										<div class="form-group">
			            											<div class="col-xs-12 text-right">
			            												<button type="button" class="btn btn-default preview-add-button-skill" id="btnadd_skill" name="btnadd_skill">
			            													<span class="fa fa-plus"></span>
			            													Add
			            												</button>
			            											</div>
			            										</div>

			            										<div class="col-xs-12">
			            											<div class="table-responsive">
			            												<table class="table preview-table-ex-skill">
			            													<thead>
			            														<tr>
			            															<th>Select</th>
			            															<th>Skill &amp; Expertise</th>																					
			            															<th></th>
			            														</tr>
			            													</thead>
			            													<tbody>
			            													</tbody>
			            													<!-- preview content goes here-->
			            												</table>
			            												<button type="button" class="delete-row-skill">Delete Row</button>
			            											</div>
			            										</div>
			            									</div>
			            								</form>   
			            							</div>                     
			            						</div>
			            						<div class="tab-pane" id="experice">
			            							<h3>Experience</h3>
			            							<div class="panel panel-default">
			            								<div class="frmerror_experiencedetails" ></div>
			            								<form id="frmExperience">
			            									<div class="panel-body form-horizontal Experience-form">
			            										<div class="frmerror_experience" ></div>
			            										<div class="row">
			            											<div class="col-sm-6">
			            												<div class="form-group">
					            											<label for="prevCompanyName"
					            											class="col-sm-4 control-label">Company
					            											Name</label>
					            											<div class="col-sm-8">
					            												<input type="hidden" id="exp_det_id" name="exp_det_id" value="" />
					            												<input type="text" class="form-control"
					            												id="prevCompanyName"
					            												name="prevCompanyName"
					            												placeholder="Enter name of firm or company">
					            												<span id="err_prevCompanyName" ></span>	   
					            											</div>
					            										</div>
			            											</div>
			            											<div class="col-sm-6">
			            												<div class="form-group">
					            											<label for="prevJobTitle"
					            											class="col-sm-4 control-label">Position
					            											Title</label>
					            											<div class="col-sm-8">
					            												<input type="text" class="form-control"
					            												id="prevJobTitle"
					            												name="prevJobTitle"
					            												placeholder="eg. Web Developer">
					            												<span id="err_prevJobTitle" ></span>	   
					            											</div>
					            										</div>
			            											</div>
			            										</div>
			            										<div class="row">
			            											<div class="col-sm-6">
					            										<div id="prevStartDate" class="form-group ">
					            											<label for="prevStartDate"
					            											class="col-sm-4 control-label">Start Date</label>
					            											<div class="col-sm-8">
					            												<input type="text" class="form-control datepicker" id="prevStartDate1"
					            												value="" name="prevStartDate">
					            												<span id="err_prevStartDate" ></span>	 	   
					            											</div>
					            										</div>
					            									</div>
					            									<div class="col-sm-6">
					            										<div id="prevEndDate" class="form-group ">
					            											<label for="prevEndDate"
					            											class="col-sm-4 control-label">End Date</label>
					            											<div class="col-sm-8">
					            												<input type="text" class="form-control datepicker" id="prevEndDate1"
					            												value="" name="prevEndDate">
					            												<span id="err_prevEndDate" ></span>		   
					            											</div>
					            										</div>
					            									</div>
					            								</div>
			            										<div class="form-group">
			            											<div class="col-xs-12 text-right">
			            												<button type="button" class="btn btn-default preview-add-button1" id="add_experience" name="add_experience">
			            													<span class="fa fa-plus"></span>
			            													Add
			            												</button>
			            											</div>
			            										</div>
			            										<div class="col-xs-12">
			            											<div class="table-responsive">
			            												<table class="table preview-table-ex">
			            													<thead>
			            														<tr>
			            															<th>Select</th>
			            															<th>Company Name</th>
			            															<th>Position Title</th>
			            															<th>Start Date</th>
			            															<th>End Date</th>
			            															<th></th>
			            														</tr>
			            													</thead>
			            													<tbody>
			            														<?php
                                                                                /*$exp_count = 0;
                                                                                foreach ($user_exp_data as $user_exp) {
                                                                                    $exp_count++;
                                                                                    ?>

                                                                                    <tr id="<?php echo ($user_exp['id']) ? $user_exp['id'] : ''; ?>">
                                                                                        <td><input name="record" type="checkbox" value="<?php echo ($user_exp['id']) ? $user_exp['id'] : ''; ?>"></td>
                                                                                        <td><?php echo ($user_exp['company_name']) ? $user_exp['company_name'] : ''; ?></td>
                                                                                        <td><?php echo ($user_exp['position_title']) ? $user_exp['position_title'] : ''; ?></td>
                                                                                        <td><?php echo ($user_exp['start_date']) ? $user_exp['start_date'] : ''; ?></td>
                                                                                        <td><?php echo ($user_exp['end_date']) ? $user_exp['end_date'] : ''; ?></td>
                                                                                        <td>
																						<?php if($this->uri->segment(1)=='vcard-update') { ?>
																								<a href="#" onclick="getExpDetailUpdate('<?php echo $user_exp['id']; ?>','<?php echo $user_exp['company_name']; ?>','<?php echo $user_exp['position_title']; ?>','<?php echo $user_exp['start_date']; ?>','<?php echo $user_exp['end_date']; ?>');" >Edit</a>
																						<?php } ?>		
																						</td>
                                                                                    </tr>

                                                                                <?php }*/ ?>

                                                                            </tbody>
                                                                                <!-- preview content goes here-->
                                                                        </table>
                                                                        <button type="button" class="delete-row">Delete Row</button>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </form>   
                                                    </div>                     
                                                </div>
                                                <div class="tab-pane" id="education">
	                                            	<form id="frmEducationDetails">   
	                                            		<div class="frmerror_educationdetails" ></div>
	                                            		<h3>Education</h3>

	                                            		<div class="panel panel-default">
	                                            			<div class="panel-body form-horizontal Education-form">
	                                            				<div class="row">
			            											<div class="col-sm-6">
				                                            			<div class="form-group">
				                                            				<label for="eduInstituteName"
				                                            				class="col-sm-4 control-label">Institute
				                                            				Name</label>
				                                            				<div class="col-sm-8">

				                                            					<input type="hidden" class="form-control" id="edu_det_id" name="edu_det_id">
				                                            					<input type="text" class="form-control"
				                                            					id="eduInstituteName"
				                                            					name="eduInstituteName">
				                                            					<span id="err_eduInstituteName" ></span>	   
				                                            				</div>
				                                            			</div>
				                                            		</div>
				                                            		<div class="col-sm-6">
				                                            			<div class="form-group">
				                                            				<label for="degree" class="col-sm-4 control-label">Degree or Certificate</label>
			                                            					<div class="col-sm-8">
			                                            						<input type="text" class="form-control" id="degree"
			                                            						name="degree">
			                                            						<span id="err_degree" ></span>		   
			                                            					</div>
			                                            				</div>
			                                            			</div>
			                                            		</div>
			                                            		<div class="row">
			            											<div class="col-sm-6">
			                                            				<div id="eduStartDate" class="form-group ">
			                                            					<label for="eduStartDate" class="col-sm-4 control-label">Start Date</label>
			                                            					<div class="col-sm-8">
			                                            						<input type="text" class="form-control datepicker" id="eduStartDate1"
			                                            						value="" name="eduStartDate">
			                                            						<span id="err_eduStartDate" ></span>		   
			                                            					</div>
			                                            				</div>
			                                            			</div>
		                                            				<div class="col-sm-6">
			                                            				<div id="eduEndDate" class="form-group ">
			                                            					<label for="eduEndDate" class="col-sm-4 control-label">End Date</label>
			                                            					<div class="col-sm-8">
			                                            						<input type="text" class="form-control datepicker" id="eduEndDate1"
			                                            						value="" name="eduEndDate">
			                                            						<span id="err_eduEndDate" ></span>	   
			                                            					</div>
			                                            				</div>
			                                            			</div>
			                                            		</div>

	                                            				<div class="form-group">
	                                            					<div class="col-xs-12 text-right">
	                                            						<button type="button"
	                                            						class="btn btn-default preview-add-button2" id="educationSubmit">
	                                            						<span class="fa fa-plus"></span>
	                                            						Add
	                                            					</button>
	                                            				</div>
	                                            			</div>

	                                            			<div class="col-xs-12">
	                                            				<div class="table-responsive">
	                                            					<table class="table preview-table-ex2">
	                                            						<thead>
	                                            							<tr>
	                                            								<th>Select</th>
	                                            								<th>Company Name</th>
	                                            								<th>Position Title</th>
	                                            								<th>Start Date</th>
	                                            								<th>End Date</th>
	                                            								<th></th>
	                                            							</tr>
	                                            						</thead>
	                                            						<tbody>

	                                            							<?php
	                                                                        /*$edu_count = 0;
	                                                                        foreach ($user_edu_data as $user_edu) {
	                                                                            $edu_count++;
	                                                                            ?>

	                                                                            <tr id="<?php echo $edu_count; ?>">
	                                                                                <td><input name="record" type="checkbox" value="<?php echo ($user_edu['id']) ? $user_edu['id'] : ''; ?>" ></td>
	                                                                                <td><?php echo ($user_edu['institute_name']) ? $user_edu['institute_name'] : ''; ?></td>
	                                                                                <td><?php echo ($user_edu['degree_or_certificate']) ? $user_edu['degree_or_certificate'] : ''; ?></td>
	                                                                                <td><?php echo ($user_edu['start_date']) ? $user_edu['start_date'] : ''; ?></td>
	                                                                                <td><?php echo ($user_edu['end_date']) ? $user_edu['end_date'] : ''; ?></td>
	                                                                                 <td>
																					<?php if($this->uri->segment(1)=='vcard-update') { ?>
																							<a href="#" onclick="getEduDetailUpdate('<?php echo $user_edu['id']; ?>','<?php echo $user_edu['institute_name']; ?>','<?php echo $user_edu['degree_or_certificate']; ?>','<?php echo $user_edu['start_date']; ?>','<?php echo $user_edu['end_date']; ?>');" >Edit</a>
																					<?php } ?>		
																					</td>
	                                                                            </tr>

	                                                                            <?php } */ ?>


	                                                                        </tbody>
	                                                                        <!-- preview content goes here-->
	                                                                    </table>

	                                                                    <button type="button" class="delete-row1">Delete Row</button>
	                                                                </div>
	                                                            </div>
	                                                        </div>
	                                                    </div>
	                                                    <!--/ panel preview -->
	                                                </form>
	                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

	                    <!-- ADDITIONAL INFORMATION TAB START -->
	                    <div role="tabpanel" class="tab-pane" id="additionalInfo">
	                    	<div class="col-xs-12">
	                    		<a class="btn addSectionBtn" role="button" data-toggle="collapse" href="#addSectionCollapse" aria-expanded="false" aria-controls="addSectionCollapse">
								  Add Section
								</a>
	                    		<div class="collapse" id="addSectionCollapse">
	                    			<a data-toggle="modal" data-target="#pricingModal" class="showSingle" target="1">
	                    				<i class="fa fa-usd" aria-hidden="true"></i><br> Pricing
	                    			</a>
	                    			<a data-toggle="modal" data-target="#portfolioModal" class="showSingle" target="2">
	                    				<i class="fa fa-user" aria-hidden="true"></i><br> Portfolio
	                    			</a>
	                    			<a class="showSingle" target="3" data-toggle="modal" data-target="#listModal">
	                    				<i class="fa fa-list-ul" aria-hidden="true"></i><br> List
	                    			</a>
	                    			<a class="showSingle" target="4" data-toggle="modal" data-target="#linksModal">
	                    				<i class="fa fa-link" aria-hidden="true"></i><br> Links
	                    			</a>
	                    			<a class="showSingle" target="5" data-toggle="modal" data-target="#videoModal">
	                    				<i class="fa fa-video-camera" aria-hidden="true"></i><br> Video
	                    			</a>
	                    		</div>
	                    		
	                    		<div class="err_priceplandetail" ></div>
	                    		<div id="div1" class="pricing-plan-content desc-panel targetDiv preview-table-ex5">
	                    			<?php 
									/*if(!empty($user_priceplan))
									{
										foreach($user_priceplan as $u_plan)
										{
											if(!empty($u_plan['plan_title']))
											{
									?>	
									
										<div class="panel panel-danger">
										<div class="panel-heading">
										<h3 class="panel-title"><?php echo $u_plan['plan_title'] ?></h3>
										<div class="pull-right">
										<?php if($this->uri->segment(1)=='vcard-update') { ?>
										<span id="editpanel" class="badge editbutton" onclick="openPrice('<?php echo $u_plan['id']; ?>','<?php echo $u_plan['plan_title']; ?>','<?php echo $u_plan['plan_description']; ?>','<?php echo $u_plan['price']; ?>');" title="Edit">
										<?php } ?>
										<i class="fa fa-pencil-square-o"></i></span>
										<span id="deletepanel" class="badge editbutton" title="Delete">
										<i class="fa fa-trash"></i></span><span class="pull-right clickable">
										<i class="glyphicon glyphicon-chevron-up"></i></span></div></div>
										<div class="panel-body"><div class="panel-body-content"><?php echo $u_plan['plan_description'] ?> </div><div class="footer1"><?php echo $u_plan['price'] ?></div>
										</div></div>
										
									<?php
											}
											else if(!empty($u_plan['plan_image']))
											{ ?>
											<div class="panel panel-danger">
											<div class="panel-heading">
											<h3 class="panel-title"></h3>
											<div class="pull-right">
											<?php if($this->uri->segment(1)=='vcard-update') { ?>
											<span id="editpanel" class="badge editbutton" onclick="openPriceImage('<?php echo $u_plan['id']; ?>','<?php echo $u_plan['plan_image']; ?>');" title="Edit" >
											<?php } ?>
											<i class="fa fa-pencil-square-o"></i></span>
											<span id="deletepanel" class="badge editbutton" title="Delete">
											<i class="fa fa-trash"></i></span><span class="pull-right clickable">
											<i class="glyphicon glyphicon-chevron-up"></i></span></div></div>
											<div class="panel-body"><div class="panel-body-content"><img src="<?php echo base_url().$u_plan['plan_image']; ?>" class="img-responsive"/> </div><div class="footer1"></div>
											</div></div>	
												
										<?php
											}	
										}
									} */
									?>
								</div>
								<div class="clear"></div>
								<div id="div2" class="targetDiv view-portfolio desc-panel">
									<div class="panel panel-danger">
										<div class="panel-heading">
											<h3 class="panel-title">Portfolio</h3>
										</div>
										<div class="panel-body portfolio-preview5">

											<?php /*if(!empty($user_portfolio)) { 
												foreach($user_portfolio as $u_portfolio)
												{
											?>
												<div class="panel-body-content text-center">
												<?php if(!empty($u_portfolio['image'])) {?>
													<?php if($this->uri->segment(1)=='vcard-update') { ?>
													<div class='pull-right'>
														<span id='editpanelportfolio' class='badge editbutton' title='Edit' onclick="openPortfolioImage('<?php echo $u_portfolio['id']; ?>','<?php echo $u_portfolio['image']; ?>')" ><i class="fa fa-pencil-square-o"></i>
														</span>
													</div>
													<?php } ?>
													<img src="<?php echo base_url().$u_portfolio['image']; ?>" class="img-responsive"/>
												<?php } ?>	
												<hr>
												<?php if(!empty($u_portfolio['video_url'])) { ?>
												<?php if($this->uri->segment(1)=='vcard-update') { ?>
													<div class='pull-right'>
														<span id='editpanelportfolio' class='badge editbutton' title='Edit' onclick="openPortfolioVideo('<?php echo $u_portfolio['id']; ?>','<?php echo $u_portfolio['video_url']; ?>')" ><i class="fa fa-pencil-square-o"></i>
														</span>
													</div>
													<?php } ?>
												<div class="embed-responsive embed-responsive-4by3">
												  <iframe class="embed-responsive-item" src="<?php echo $u_portfolio['video_url'] ?>"></iframe>
												</div>									
												<?php } ?>
												</div>
											<?php
												}
											}*/ ?>	
										</div>
									</div>
								</div>
								<div class="clear"></div>
								<div id="div3" class="targetDiv view-portfolio desc-panel">
									<div class="panel panel-danger">
										<div class="panel-heading">
											<h3 class="panel-title">List</h3>
										</div>
										<div class="panel-body">
											<div class="panel-body-content">
												<ul class="list list-preview-table-ex5">
													<?php
													/*if(!empty($user_list))
													{
														foreach($user_list as $ulist)
														{
												?>
												<li><?php echo $ulist['list'] ?> 
												<?php if($this->uri->segment(1)=='vcard-update') { ?>
												<div class="pull-right">
												<span id="editpanellists" class="badge editbutton" title="Edit" onclick="openList('<?php echo $ulist['id'] ?>','<?php echo $ulist['list'] ?>');" >
												<i class="fa fa-pencil-square-o"></i></span></div>
												<?php } ?>
											
												</li>
													<?php
														}
													}*/ ?>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="clear"></div>
								<div id="div4" class="targetDiv view-portfolio desc-panel">
									<div class="panel panel-danger">
										<div class="panel-heading">
											<h3 class="panel-title">Links</h3>
										</div>
										<div class="panel-body">
											<div class="panel-body-content text-center link-preview-ex5">
											<?php /*if(!empty($user_link)) { 
												foreach($user_link as $u_link) {
											?>
												<div class="linking"><a href=""><?php echo $u_link['link'];  ?></a><span class="pull-right"><i class="fa fa-external-link" aria-hidden="true"></i></span>
												<?php if($this->uri->segment(1)=='vcard-update') { ?>
												<div class="pull-right">
												<span id="editpanellinks" class="badge editbutton" title="Edit" onclick="openLink('<?php echo $u_link['id'] ?>','<?php echo $u_link['link'] ?>');">
												<i class="fa fa-pencil-square-o"></i></span>
												</div>
												<?php } ?>	
												</div>
											<?php 
												}
											} */ ?>
											</div>
										</div>
									</div>
								</div>
								<div id="div5" class="targetDiv view-portfolio desc-panel">
									<div class="panel panel-danger">
										<div class="panel-heading">
											<h3 class="panel-title">Video</h3>
										</div>
										<div class="panel-body video-preview5">
											<?php 
												/*if(!empty($user_video_url))
												{
													foreach($user_video_url as $u_video_url) 
													{	
												?>
												<div class="panel-body-content text-center">
												
												<div class="embed-responsive embed-responsive-4by3">
												  <iframe class="embed-responsive-item" src="<?php echo $u_video_url['video_url']; ?>"></iframe>
												</div>									
												<hr>
												<div>
												<?php echo $u_video_url['video_description']; ?>
												<!--update -->
												<div class="pull-right">
													<span id="editpanellists" class="badge editbutton" title="Edit" onclick="openvideo('<?php echo $u_video_url['id']; ?>','<?php echo $u_video_url['video_url']; ?>','<?php echo $u_video_url['video_description']; ?>');">
													<i class="fa fa-pencil-square-o"></i></span></div>
												<!--update -->
												</div>
												
												</div>
												<?php 
													}
												}*/ ?>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Blog TAB START -->
						<div role="tabpanel" class="tab-pane" id="blog">
							<div class="frmblog_err" ></div>
							<button id="addbtnblog" class="btn btnRed btn-lg" data-toggle="modal" data-target="#myModalblog" type="button">Add Blog</button>
							<div class="table-responsive">
								<table class="table blog-preview-table-ex">
									<thead>
										<tr>
											<th>Title</th>
											<th>Short Description</th>
											<th>Long Description</th>																
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										if(!empty($user_blog)) { 
											foreach($user_blog as $ub) {
												?>
												<tr class="blog-previewdetail-<?php echo $ub['id']; ?>" >
													<td><?php echo $ub['title']; ?></td>
													<td><?php echo $ub['short_desc']; ?></td>
													<td><?php echo $ub['long_desc']; ?></td>																						 
													<td> <a href="#" onclick="deleteBlog('<?php echo $ub['id'] ?>');" > Delete </a></td>
												</tr>				
												<?php 
											}
										} ?>
									</tbody>
								</table>                                                                      
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="professionalInfoModal" tabindex="-1" role="dialog" aria-labelledby="professionalInfoModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="professionalInfoModalLabel">Professional Information</h4>
			</div>
			<div class="modal-body">
				<div class="frmerror_compinfo"></div>
				<div class="form-group">
					<label for="companyname">Company Name
						<small>(required)</small>
					</label>
					<input id="companyname" name="companyname" type="text" class="form-control" placeholder="Enter company name" value="" maxlength="20">
					<span id="err_companyname" ></span>	   
				</div>
				<div class="form-group">
					<label for="jobTitle">Job Title
						<small>(required)</small>
					</label>
					<input id="jobTitle" name="jobtitle1" type="text" class="form-control" placeholder="Enter Job Title" value="" maxlength="20">
					<span id="err_jobtitle1" ></span>	 	   
				</div>
				<div class="form-group">
					<label>Start Date</label>
					<div id="sandbox-container" class="input-group date">
						<input type="text" class="form-control datepicker" value="" name="startdate"  placeholder="12-02-2017" >
						<div class="input-group-addon">
							<span class="fa fa-calendar"></span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="companyContact">Contact Number
					</label>
					<input id="companyContact" name="companycontact" type="tel" class="form-control" placeholder="Enter Company Contact Number" value="" maxlength="17">
				</div>
				<div class="form-group">
					<label for="companyEmail">Email
						<small>(required)</small>
					</label>
					<input id="companyEmail" name="companyemail" type="text" class="form-control" placeholder="Enter Company Email" value="">
					<span id="err_companyemail" ></span>	   
				</div>
				<div class="form-group">
					<label for="companyWebsite">Website
						<small>(required)</small>
					</label>
					<input id="companyWebsite" name="companywebsite" type="text" class="form-control" placeholder="Company Website URL" value="">
					<span id="err_companywebsite" ></span>	   
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btnRed" id="showAdd">Save</button>
				<button type="button" class="btn btnRed btn-o" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>									
<!--End Modal -->

<!-- Start blog Modal -->
<div class="modal fade" id="myModalblog" tabindex="-1" role="dialog" aria-labelledby="myModalblogLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalblogLabel">Blog</h4>
			</div>
			<div class="modal-body">
				<form id="frmblog" class="form-horizontal" enctype="multipart/form-data" >
					<div class="frmerror_blog"></div>
					<div class="form-group blogModalRadioWrap">
						<label class="radio-inline">
							<input type="radio" name="blog" id="blogcoverimg" value="coverimagediv" checked="checked"> Upload Cover Image
						</label>
						<label class="radio-inline">
							<input type="radio" name="blog" id="blogvideoupload" value="blogvideodiv"> Upload Video
						</label>
						<label class="radio-inline">
							<input type="radio" name="blog" id="blogvideourl" value="blogvideourldiv"> Video URL
						</label>
					</div> 
					<div class="form-group blogclass" id="coverimagediv">
						<label for="coverimage">Cover Image
							<small>(required)</small>
						</label>
						<input type="file" name="coverimage" id="coverimage" />
						<span id="err_coverimage"></span>	
					</div>
					<div class="form-group blogclass" id="blogvideodiv" style="display:none;" >
						<label for="bloguploadvideo">Upload Video
							<small>(required)</small>
						</label>
						<input type="file" name="bloguploadvideo" id="bloguploadvideo" />	
						<span id="err_bloguploadvideo"></span>		
					</div>
					<div class="form-group blogclass" id="blogvideourldiv" style="display:none;" >
						<label for="txtblogvideourl">Video URL
							<small>(required)</small>
						</label>	
						<input id="txtblogvideourl" name="txtblogvideourl" class="form-control" placeholder="Enter Video URL" value=""  type="text">
						<span id="err_txtblogvideourl"></span>		
					</div>	
					<div class="form-group">
						<label for="blogTitle">Title
							<small>(required)</small>
						</label>
						<input id="blogid" name="blogid"  type="hidden">
						<input id="vcard_id" name="vcard_id"  type="hidden">
						<input id="blogTitle" name="blogTitle" class="form-control" placeholder="Enter Title" value=""  type="text">
						<span id="err_blogTitle"></span>	 	   
					</div>                                                            
					<div class="form-group">
						<label for="companyContact">Short Description <small>(required)</small>
						</label>
						<textarea id="blogshortdesc" name="blogshortdesc" class="form-control editor" placeholder="Enter Short Description" >

						</textarea>
						<input type="hidden" id="blogshortdesc1" name="blogshortdesc1" >
						<span id="err_blogshortdesc"></span>	   
					</div>
					<div class="form-group">
						<label for="companyContact">Long Description <small>(required)</small>
						</label>                                                               
						<textarea id="bloglongdesc" name="bloglongdesc" class="form-control editor" placeholder="Enter Long Description" value=""  ></textarea>
						<input type="hidden" id="bloglongdesc1" name="bloglongdesc1" >
						<span id="err_bloglongdesc"></span>		   
					</div>    
					<div class="form-group">
						<label class="checkbox-inline">
							<input type="checkbox" name="popular" id="popular" value="1"> Popular Post
						</label>
					</div> 	
				</form>
				<div class="modal-footer">
					<button type="button" class="btn btnRed" id="btnsaveBlogAdd">Save</button>
					<button type="button" class="btn btnRed btn-o" onclick="funBlogClose('frmblog')"  data-dismiss="modal">
						Close
					</button>
				</div>
			</div>
		</div>
	</div>	
</div>								
<!--End blog Modal -->

<!-- Start pricing Modal -->
<div class="modal fade" id="pricingModal" tabindex="-1" role="dialog" aria-labelledby="pricingModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="pricingModalLabel">Add Pricing Plan Details</h4>
			</div>
			<div class="modal-body">
			    <div class="frmerror_priceplanupload" ></div>
			    <div class="frmerror_price_plane" ></div>
			    <div class="form-group pricingModalRadioWrap">
			    	<label class="radio-inline" for="radio1">
			    		<input type="radio" name="priceimage" id="radio1" value="imagediv" checked="checked" >
			    		Upload Image
			    	</label>
			    	<label class="radio-inline" for="radio2">
			    		<input type="radio" name="priceimage" id="radio2" value="descprining">
			    		Add Pricing plan desciption
			    	</label>
			    </div>
		    	
    			<div id="imagediv" class="priceplanimage">
					<!-- 
					<div class="form-group">
					<label for="jobTitle">Upload Image
								<small>(required)</small>
							</label>
					<div class="input-group" style="width:100%">
							
						<div class="clear"></div>
						<input type="file" name="img[]" class="file">
						<div class="input-group col-xs-12">
						  <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
						  <input type="text" class="form-control input-lg" disabled placeholder="Upload Image">
						  <span class="input-group-btn">
							<button class="browse btn btn-primary input-lg" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
						  </span>
						</div>
					</div>
					</div>
					--> 
					<div class="form-group">
						<form id="example-1" action="" method="POST" enctype="multipart/form-data" class="page">
							<input type="hidden" name="pricing_id" id="pricing_id" >
							<table id="price_image_update"  style="display:none;">
								<thead><tr><th width='80'>Image</th><th>Select</th></tr></thead>
								<tbody>
									<tr>
										<td><img src="" id="selImgPrice" class="img-responsive" /></td>
										<td><input type="file" name="updatefile" id="updatefile" /></td>
									</tr>
								</tbody>
							</table>	
							<div id="dropzone-0">																				
								<input type="file" name="file[]" id="file" multiple />
							</div>
						</form>
					</div>
					<div class="form-group text-center">
						<button type="button" id="addpricingimage" class="btn btnRed">Add                                                 
						</button>
					</div>
				</div>
				<div id="descprining" class="priceplanimage" style="display: none;">
					<form id="frmPricingPlan">	
						<div class="form-group">
							<label for="jobTitle">Pricing Plan Title
								<small>(required)</small>
							</label>
							<input type="hidden" name="pricing_id1" id="pricing_id1" >
							<input id="pricingtitle" name="pricingtitle" type="text" class="form-control" placeholder="">
							<span id="err_pricingtitle"></span>	   
						</div>
						<div class="form-group">
							<label for="jobTitle">Pricing Plan Description
								<small>(required)</small>
							</label>
							<textarea id="pricingdescription" name="pricingdescription" class="form-control" rows="3"></textarea>
							<span id="err_pricingdescription"></span>	 
						</div>
						<div class="form-group">
							<label for="companyContact">Price</label>
							<input id="pricingprice" name="pricingprice" type="text" class="form-control" placeholder="" value="" maxlength="17">
						</div>
						<div class="form-group text-center">
							<button type="button" id="addpricingdetails" class="btn btnRed">Add</button>
						</div>
					</form>	
					<hr>
					<div class="form-group">
						<div class="table-responsive">
							<table class="table preview-table-ex4">
								<thead>
									<tr>
										<th>Pricing Plan Title</th>
										<th>Description</th>
										<th>Price</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
	            <button type="button" class="btn btnRed btn-o" data-dismiss="modal">
		            Close
		        </button>
		    </div>
		</div>
    </div>
</div>
<!-- end pricing Modal -->

<!-- Start portfolio Modal -->
<div class="modal fade" id="portfolioModal" tabindex="-1" role="dialog" aria-labelledby="portfolioModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="portfolioModalLabel">Portfolio</h4>
			</div>
			<div class="modal-body">
				<div class="frmerror_portfolio" ></div>
				<form id="example-2" method="POST" enctype="multipart/form-data"  >
					<input type="hidden" name="videourl_portfolio_id" id="videourl_portfolio_id" />
					<div class="form-group portfolioModalRadioWrap">
						<label class="radio-inline" for="radio3">
							<input type="radio" name="portfolioDiv" id="radio3" value="imagediv1" checked="checked">
							Upload Image
						</label>
						<label class="radio-inline" for="radio4">
							<input type="radio" name="portfolioDiv" id="radio4" value="descprining1">
							Add a video
						</label>
					</div>
					<div id="imagediv1" class="portfolioContent page">
						<table id="portfolio_image_update"  style="display:none;">
							<thead><tr><th width='80'>Image</th><th>Select</th></tr></thead>
							<tbody>
								<tr>
									<td><img src="" id="portfolioImg" class="img-responsive" /></td>
									<td><input type="file" name="portfolioImg_updatefile" id="portfolioImg_updatefile" /></td>
								</tr>
							</tbody>
						</table>
						<div class="form-group">
							<!--<form id="example-2" action="index.html" >-->
							<div id="dropzone"><input type="file" name="file-2[]" id="file-2" multiple  /></div>
							<p class="demo-text"></p>
							<!--</form>-->
						</div>
					</div>
					<div id="descprining1" class="portfolioContent" style="display: none;">
						<div class="form-group">
							<label for="jobTitle">Video URL
								<small>(required)</small>
							</label>
							<input id="videourl_portfolio" name="videourl_portfolio" type="text" class="form-control" required placeholder="www.google.com">
							<span id="err_port_video" ></span>	   
						</div>															
					</div>
					<div class="form-group text-center">
						<button type="button" id="btnaddportfolio" class="btn btnRed">Add</button>
					</div>
				</form>
				<hr>
				<div class="table-responsive">
					<table class="table portfolio-preview">
						<thead>
							<tr>
								<th>Image</th>
								<th>Video URL</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btnRed btn-o" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end portfolio Modal -->

<!-- Start lists Modal -->
<div class="modal fade" id="listModal" tabindex="-1" role="dialog" aria-labelledby="listModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="listModalLabel">List</h4>
			</div>
			<div class="modal-body">
				<div class="frmerror_list" ></div>
				<form id="frmlist" >
					<div class="form-group">
						<label for="jobTitle">List Name
							<small>(required)</small>
						</label>
						<input id="list_id" name="list_id" type="hidden" >
						<input id="listname" name="listname" type="text" class="form-control" placeholder="">
						<span id="err_listname" ></span>	   
					</div>
					<div class="form-group text-center">
						<button type="button" id="btnlistadd" class="btn btnRed">Add</button>
					</div>
				</form>
				<hr>
				<div class="table-responsive">
					<table class="table list-preview-table-ex4">
						<thead>
							<tr>
								<th width="80">Sr. No.</th>
								<th>List Names</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btnRed btn-o" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- end lists Modal -->

<!-- Start links Modal -->
<div class="modal fade" id="linksModal" tabindex="-1" role="dialog" aria-labelledby="linksModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="linksModalLabel">Links</h4>
			</div>
			<div class="modal-body">
				<div class="frmerror_addlink"></div>
				<form id="frmaddlink">
					<div class="form-group">
						<label for="jobTitle">Add Your Links
							<small>(required)</small>
						</label>
						<input id="addlink_id" name="addlink_id" type="hidden" >
						<input id="addlink" name="addlink" type="text" class="form-control" placeholder="">
						<span id="err_addlink" ></span>  
					</div>
					<div class="form-group text-center">
						<button type="button" id="btnAddLink" class="btn btnRed">Add</button>
					</div>
				</form>
				<hr>
				<div class="table-responsive">
					<table class="table link-preview">
						<thead>
							<tr>
								<th width="80">Sr. No.</th>
								<th>Links</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btnRed btn-o" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end links Modal -->

<!-- Start video Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="videoModalLabel">Video</h4>
			</div>
			<div class="modal-body">
				<div class="frmerror_videourl" ></div>
				<form id="frmvideourl" >
					<div class="form-group">
						<label for="jobTitle">Video URL
							<small>(required)</small>
						</label>
						<input id="videourl_id" name="videourl_id" type="hidden"    >
						<input id="videourl" name="videourl" type="text" class="form-control" placeholder="">
						<span id="err_videourl" ></span>	   
					</div>
					<div class="form-group">
						<label for="jobTitle">Video Description</label>
						<textarea id="video_description" name="video_description" type="text" class="form-control" placeholder=""></textarea>
					</div>
					<div class="form-group text-center">
						<button type="button" id="btnvideourl" class="btn btnRed">Add</button>
					</div>
				</form>
				<hr>
				<div class="table-responsive">
					<table class="table video-preview">
						<thead>
							<tr>
								<th width="80">Sr. No.</th>
								<th>Video URL</th>
							</tr>
						</thead>
						<tbody>								
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
               <button type="button" class="btn btnRed btn-o" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end video Modal -->

<script type="text/javascript">
	var baseURL = '<?php echo base_url(); ?>';
	var mainDashboardURL = "<?php echo base_url(); ?>dashboard";
	var removeSkillsAndExerptiseURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/removeSkillsAndExerptise";
	var removeAllSkillsAndExerptiseURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/removeAllSkillsAndExerptise";
	var saveSkillsURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/saveSkills";
	var deleteSkillURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/deleteSkill";
	var saveExperienceURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/saveExperience";
	var deleteExperienceURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/deleteExperience";
	var saveEducationURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/saveEducation";
	var deleteEducationURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/deleteEducation";
	var deleteblogURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/deleteblog";
	var deletePriceURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/deletePrice";
	var saveUserinfoURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/saveUserinfo";
	var saveCompanyInfoURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/saveCompanyInfo";
	var saveSocialInfoURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/saveSocialInfo";
	var saveShortBioURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/saveShortBio";
	var saveSkillsAndExerptiseURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/saveSkillsAndExerptise";
	var savePricePlanURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/savePricePlan";
	var savePricePlanImageURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/savePricePlanImage";
	var saveListURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/saveList";
	var saveLinkURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/saveLink";
	var saveVideoURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/saveVideoUrl";
	var savePortfolioURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/savePortfolio";
	var saveBloginfoURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/saveBloginfo";
	var getSkillsAndExerptiseURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/getSkillsAndExerptise";
	var getSkillsAndExerptDetailURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/getSkillsAndExerptDetail";
	var getExperienceDataURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/getExperienceData";
	var getExperienceDataMobileURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/getExperienceDataMobile";
	var getEducationDataURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/getEducationData";
	var getEducationDataMobileURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/getEducationDataMobile";
	var getListDataURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/getListData";
	var getMainListDataURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/getMainListData";
	var getListDataMobileURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/getListDataMobile";
	var getLinkDataURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/getLinkData";
	var getVideoDataURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/getVideoData";
	var getPriceDataURL = "<?php echo base_url() ?>paas-port/frontend/Vcard/getPriceData";
	var saveSkillsAndExerptise1URL = "<?php echo base_url() ?>paas-port/frontend/Vcard/saveSkillsAndExerptise1";
</script>
