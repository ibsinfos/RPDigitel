

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
                                            <option>Select Category</option>
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
                                        <input type="text" class="form-control" id="choice1" name="choice1" placeholder="">
									</div>
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="inputEmail3">2<sup>nd</sup> Choice: </label>
                                        <input type="text" class="form-control" id="choice2" name="choice2" placeholder="">
									</div>
								</div>
								<div class="row">
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="inputEmail3">3<sup>rd</sup> Choice: </label>
                                        <input type="text" class="form-control"  id="choice3" name="choice3" placeholder="">
									</div>
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="inputEmail3">4<sup>th</sup> Choice: </label>
                                        <input type="text" class="form-control"  id="choice4" name="choice4" placeholder="">
									</div>
								</div>
								<div class="row">
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="inputEmail3">5<sup>th</sup> Choice: </label>
                                        <input type="text" class="form-control"  id="choice5" name="choice5" placeholder="">
									</div>
								</div>
                                
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="businessAddress">Business Address:</label>
                                        <textarea class="form-control" id="businessAddress" name="businessAddress" rows="5" placeholder=""></textarea>
									</div>
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 form-group">
                                                <label for="businessPhone">Business Phone:</label>
                                                <input type="text" class="form-control" id="businessPhone" name="businessPhone" placeholder="">
											</div>
                                            <div class="col-xs-12 col-sm-6 form-group">
                                                <label for="fax">Fax:</label>
                                                <input type="text" class="form-control" id="fax" name="fax" placeholder="">
											</div>
                                            <div class="col-xs-12 col-sm-6 form-group">
                                                <label for="email">Email:</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="">
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
											<input type="radio" name="businessStructureRadio" value="A" checked> 
											A. Individually Owned- Fee: $150.00
										</label>
                                        <label class="radio-inline" data-business-structure="formallyOrganized">
											<input type="radio" name="businessStructureRadio" value="B">
											B. Formally Organized Corporation- Fee: $150.00
										</label>
                                        <label class="radio-inline" data-business-structure="partnership">
											<input type="radio" name="businessStructureRadio" value="C">
											C. Partnership- Fee: $150.00
										</label>
                                        <label class="radio-inline" data-business-structure="formallyOrganizedLLC">
											<input type="radio" name="businessStructureRadio" value="D">
											D. Foramally Organized LLC- Fee: $150.00
										</label>
									</div>
								</div>
                                <h4 class="text-center"><strong><i>PROCEED TO THE SECTION OF THIS APPLICATION THAT IS APPROPRIATE FOR YOUR BUSINESS STRUCTURE</i></strong></h4>
                                <br>
                                <div class="businessStructureInfo individuallyOwned-information">
                                    <h4 class="text-center"><strong>A. INDIVIDUALLY OWNED</strong></h4>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Name of Individual:</label>
										</div>
                                        <div class="col-xs-12 col-sm-4 form-group">
                                            <label>Last</label>
                                            <input type="text" id="lastName" name="lastName" class="form-control" placeholder="">
										</div>
                                        <div class="col-xs-12 col-sm-4 form-group">
                                            <label>First</label>
                                            <input type="text" id="firstName" name="firstName" class="form-control" placeholder="">
										</div>
                                        <div class="col-xs-12 col-sm-4 form-group">
                                            <label>Middle</label>
                                            <input type="text" id="middleName" name="middleName" class="form-control" placeholder="">
										</div>
									</div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-4 form-group">
                                            <label for="socailSecurityNo">Social Security Number:</label>
                                            <input type="text" class="form-control" id="socailSecurityNo" placeholder="">
										</div>
									</div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label>Complete Address:</label>
										</div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label for="street">Street:</label>
                                            <input type="text" class="form-control" id="street" name="street" placeholder="">
										</div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label for="city">City:</label>
                                            <input type="text" class="form-control" id="city" name="city" placeholder="">
										</div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label for="state">State:</label>
                                            <input type="text" class="form-control" id="state" name="state" placeholder="">
										</div>
										<div class="col-xs-12 col-sm-6 form-group">
                                            <label for="zipCode">Zip Code:</label>
                                            <input type="text" class="form-control" id="zipCode" name="zipCode" placeholder="">
										</div>
									</div>
                                    <p class="text-center">If you are now or have ever been a writer-member affiliate of BMI, ASCAP, SESAC or any foreign performing rights organization, enter the information below.</p>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label for="organizationName">Name of Organization:</label>
                                            <input type="text" class="form-control" id="organizationName" placeholder="">
										</div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label for="affiliationPeriod">Period of Affiliation:</label>
                                            <input type="text" class="form-control" id="affiliationPeriod" name="affiliationPeriod" placeholder="">
										</div>
									</div>
								</div>
								
                                <div class="businessStructureInfo formallyOrganized-information">
                                    <h4 class="text-center"><strong>B. FORMALLY ORGANIZED CORPORATION</strong></h4>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label for="corporationName">Exact Name of Corporation:</label>
                                            <input type="text" class="form-control" id="corporationName" name="corporationName" placeholder="">
										</div>
                                        <div class="col-xs-12 form-group">
                                            <label class="radioLabel">Does this corporation have a division or DBA at ASCAP or SESAC?</label>
                                            <label class="radio-inline">
												<input type="radio" name="corporationDivision" value="Y" checked> Yes
											</label>
                                            <label class="radio-inline">
												<input type="radio" name="corporationDivision" value="N"> No
											</label>
										</div>
									</div>
									
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label for="companyName">Company Name:</label>
                                            <input type="text" class="form-control" id="companyName" name="companyName" placeholder="">
										</div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label for="incorporationState">State of Incorporation:</label>
                                            <input type="text" class="form-control" id="incorporationState" name="incorporationState" placeholder="">
										</div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label for="taxIdentyNo">Tax Identification Number:</label>
                                            <input type="text" class="form-control" id="taxIdentyNo" name="taxIdentyNo" placeholder="">
										</div>
                                        <div class="col-xs-12 form-group">
                                            <label class="radioLabel">Is your BMI publishing company a division or DBA of your corporation?</label>
                                            <label class="radio-inline">
												<input type="radio" name="bmiDivisionRadio" value="division" checked> Division
											</label>
                                            <label class="radio-inline">
												<input type="radio" name="bmiDivisionRadio" value="dba"> DBA
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
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Home Address &amp; Zip Code</th>
                                                            <th>SS# or Tax ID#</th>
                                                            <th>% Of Ownership</th>
                                                            <th>Is Stockholder A Publickly Traded Corporation</th>
														</tr>
													</thead>
                                                    <body>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
														</tr>   
													</body>
												</table>
											</div>
											
                                            <h4><strong>List All Officers:</strong></h4>
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Home Address &amp; Zip Code</th>
                                                            <th>SS# or Tax ID#</th>
                                                            <th>Office Held</th>
														</tr>
													</thead>
                                                    <body>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
														</tr>   
													</body>
												</table>
											</div>
										</div>
									</div>
								</div>
								
                                <div class="businessStructureInfo partnership-information">
                                    <h4 class="text-center"><strong>C. PARTNERSHIP</strong></h4>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label for="taxIdentyNo">Tax Identification Number/EIN:</label>
                                            <input type="text" class="form-control" id="taxIdentyNo" placeholder="">
                                            <span>(cannot be a social security number)</span>
										</div>
                                        <div class="col-xs-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
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
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
														</tr>   
													</body>
												</table>
											</div>
										</div>
									</div>
								</div>
								
                                <div class="businessStructureInfo formallyOrganizedLLC-information">
                                    <h4 class="text-center"><strong>D. FORMALLY ORGANIZED LIMITED LIABILITY COMPANY</strong></h4>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label for="nameOfLLC">Exact Name of LLC:</label>
                                            <input type="text" class="form-control" id="nameOfLLC" name="nameOfLLC" placeholder="">
										</div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label for="companyName">Company Name:</label>
                                            <input type="text" class="form-control" id="companyName" name="companyName" placeholder="">
										</div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label for="incorporationState">State Where Organized:</label>
                                            <input type="text" class="form-control" id="incorporationState" name="incorporationState" placeholder="">
										</div>
                                        <div class="col-xs-12 col-sm-6 form-group">
                                            <label for="taxIdentyNo">Tax Identification Number:</label>
                                            <input type="text" class="form-control" id="taxIdentyNo" name="taxIdentyNo" placeholder="">
										</div>
                                        <div class="col-xs-12 form-group">
                                            <label class="radioLabel">Is your BMI publishing company a division or DBA of your LLC?</label>
                                            <label class="radio-inline">
												<input type="radio" name="bmiDivision" value="division" checked> Division
											</label>
                                            <label class="radio-inline">
												<input type="radio" name="bmiDivision" value="dba"> DBA
											</label>
										</div>
                                        <div class="col-xs-12">
                                            <p class="text-center redText">*** Please submit a copy of the Articles of Organization with the application *** </p>
                                            <h4><strong>List All Members</strong></h4>
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Home Address &amp; Zip Code</th>
                                                            <th>SS# or Tax ID#</th>
                                                            <th>% Of Ownership</th>
														</tr>
													</thead>
                                                    <body>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
														</tr>   
													</body>
												</table>
											</div>
										</div>
                                        <div class="col-xs-12">
                                            <h4><strong>List Manager(s) Authorized Under Articles of Organization, If Any:</strong></h4>
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
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
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
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
                                            <input type="text" class="form-control" placeholder="">
										</div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="">
										</div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="">
										</div>
									</div>
                                    <div class="col-xs-12 col-sm-4">
                                        <label>Performing Rights Organization</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="">
										</div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="">
										</div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="">
										</div>
									</div>
                                    <div class="col-xs-12 col-sm-4">
                                        <label>Position Held</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="">
										</div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="">
										</div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="">
										</div>
									</div>
								</div>
                                <div class="row">
                                    <div class="col-xs-12 form-group">
                                        <label>Do you wish to have your company information listed listed on the BMI website?</label>
                                        <label class="radio-inline">
											<input type="radio" name="companyInfoListed" value="Y" checked> Yes
										</label>
                                        <label class="radio-inline">
											<input type="radio" name="companyInfoListed" value="N"> No
										</label>
                                        <p>If yes, enter the information below:</p>
									</div>
								</div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="contactName">Contact Name:</label>
                                        <input type="text" class="form-control" id="contactName" name="contactName" placeholder="">
									</div>
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="title">Title:</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="">
									</div>
								</div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="address">Address:</label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="">
									</div>
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="city">City:</label>
                                        <input type="text" class="form-control" id="city" name="city" placeholder="">
									</div>
								</div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="state">State:</label>
                                        <input type="text" class="form-control" id="state" name="state" placeholder="">
									</div>
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="zip">Zip:</label>
                                        <input type="text" class="form-control" id="zip" name="zip" placeholder="">
									</div>
								</div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="phone">Phone:</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="">
									</div>
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="fax">FAX:</label>
                                        <input type="text" class="form-control" id="fax" name="fax" placeholder="">
									</div>
								</div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="">
									</div>
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="url">Web Page Address(URL):</label>
                                        <input type="url" class="form-control" id="url" name="url" placeholder="">
									</div>
								</div>
                                <div class="row">
                                    <div class="col-xs-12 form-group">
                                        <label>Is your publishing company currently being administered by another BMI publishing company?</label>
                                        <label class="radio-inline">
											<input type="radio" name="anotherBMICompany" value="Y" checked> Yes
										</label>
                                        <label class="radio-inline">
											<input type="radio" name="anotherBMICompany" value="N"> No
										</label>
									</div>
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="administratorName">Name of Administrator (please print)</label>
                                        <input type="text" class="form-control" id="administratorName" name="administratorName" placeholder="">
									</div>
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="contactPerson">Contact Person (please print)</label>
                                        <input type="text" class="form-control" id="contactPerson" name="contactPerson" placeholder="">
									</div>
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="">Address</label>
                                        <input type="text" class="form-control" id="" placeholder="">
									</div>
								</div>
                                <p>* You must submit a copy of your Administration Agreement with this application. The Administration Agreement will not be processed until your publisher affiliation has beed finalized.</p>
                                <div class="row">
                                    <div class="col-xs-12 form-group">
                                        <label>Do you have a contact or representative at BMI?</label>
                                        <label class="radio-inline">
											<input type="radio" name="contactAtBMI" value="Y" checked> Yes
										</label>
                                        <label class="radio-inline">
											<input type="radio" name="contactAtBMI" value="N"> No
										</label>
									</div>
                                    <div class="col-xs-12 col-sm-6 form-group">
                                        <label for="bmiContactName">If yes, please provide their name:</label>
                                        <input type="text" class="form-control" id="bmiContactName" name="bmiContactName" placeholder="">
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
                                    <a href="<?php echo base_url()."dashboard/addproduct"; ?>" class="panel addProductBtn siloSDBtn">
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
									<form action="homepage.html" class="dropzone"></form>  
                                    <br><br>
								</div>
                                <div class="col-xs-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th><label class="checkbox-inline"><input type="checkbox"> Check</label></th>
                                                    <th>File Name</th>
                                                    <th>File Type</th>
                                                    <th>Rating</th>
                                                    <th>Preview</th>
												</tr>
											</thead>
                                            <body>
                                                <tr>
                                                    <td><input type="checkbox"></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
												</tr>   
											</body>
										</table>
									</div>
								</div>
                                <div class="col-xs-12 text-right form-group">
                                    <button class="btn btnRed">Submit</button>
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
	
	
	
	<script type="text/javascript">
		
		var basicInformationForm_save_URL = "<?php echo base_url() . 'save_publish_application_basic_info'; ?>"; //refer \media\backend\js\dashboard-custom.js
		var companyInformationForm_save_URL = "<?php echo base_url() . 'save_publish_application_company_info'; ?>"; //refer \media\backend\js\dashboard-custom.js
		
		
		</script>
		
		
				