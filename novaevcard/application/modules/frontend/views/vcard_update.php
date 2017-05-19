<div class="container vcard-block card wizard-card" data-color="red">
    <div class=" vcard-box">
        <div class="row">
            <div>
                <h1 class="center"><b>BUILD</b> YOUR PAASPORT</h1>
                <h4 class="center" style="color:#8c8c8c">This information will get used to build your PAASPORT.</h4>
            </div>
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1default" data-toggle="tab">Basic Information</a></li>
                        <li><a href="#tab2default" data-toggle="tab">Social</a></li>
                        <li><a href="#tab3default" data-toggle="tab">About</a></li>
                        <li><a href="#tab4default" data-toggle="tab">Additional Information</a></li>
                        <li><a href="#tab5default" data-toggle="tab">Lorem Ipsum</a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1default">
                            <div class="row ">
                                <div class="col-lg-8">
                                    <h3 class="info-text"> Let's start with the basic information </h3>
                                    <div class="frmerror"></div>
                                    <form id="basicInfo" method="POST" enctype="mutlipart/form-data" >
                                        <div class="col-lg-6">
                                            <div class="picture-container">
                                                <div class="picture">
                                                    <img src="<?php echo asset_url(); ?>main_vcard/images/plus-sign-in-a-black-circle(1).png" height="105"
                                                         class="center-block">
                                                    <input type="file" id="wizard-picture" name="wizard-picture">

                                                </div>
                                                <input type="hidden" value="<?php echo ($user_data[0]['user_image']) ? $user_data[0]['user_image'] : ''; ?>" name="old_user_image">
                                                <h4 style="margin: 10px 0 15px;">Choose Picture</h4>
                                            </div>
                                            <div class="form-group">
                                                <div class="margin-top-25">
                                                    <label>Email
                                                        <small>(required)</small>
                                                    </label>
                                                    <input type="hidden" value="<?php echo ($user_data[0]['id']) ? $user_data[0]['id'] : ''; ?>" name="id">
                                                    <input name="email" type="email" class="form-control"
                                                           placeholder="eg. johndoe@website.com" value="<?php echo ($user_data['0']['email']) ? $user_data['0']['email'] : ''; ?>" >
													<span id="err_email" ></span>	   
                                                </div>
                                                <div class="margin-top-10">
                                                    <label>Address</label>
                                                    <textarea name="address" class="form-control"
                                                              placeholder="123 6th St.Melbourne, FL 32904"
                                                              maxlength="100"><?php echo ($user_data['0']['home_address']) ? $user_data['0']['home_address'] : ''; ?></textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>First Name
                                                    <small>(required)</small>
                                                </label>
                                                <input name="firstname" id="firstname" type="text" class="form-control"
                                                       placeholder="Enter your name" value="<?php echo ($user_data['0']['first_name']) ? $user_data['0']['first_name'] : ''; ?>" maxlength="10">
												<span id="err_firstname" ></span>	   
                                                <div class="margin-top-10">
                                                    <label>Last Name
                                                        <small>(required)</small>
                                                    </label>
                                                    <input name="lastname" type="text" class="form-control" value="<?php echo ($user_data['0']['last_name']) ? $user_data['0']['last_name'] : ''; ?>"
                                                           placeholder="Enter your surname"  maxlength="10">
													<span id="err_lastname" ></span>	   
                                                </div>
                                                <div class="margin-top-25">
                                                    <label>Contact Number
                                                        <small>(required)</small>
                                                    </label>
                                                    <input name="contact" type="tel" class="form-control"
                                                           placeholder="eg.(417) 123-4567" value="<?php echo ($user_data['0']['mobile']) ? $user_data['0']['mobile'] : ''; ?>">
													<span id="err_contact" ></span>	   
                                                </div>
                                                <div class="margin-top-10">
                                                    <label>Pincode
                                                    </label>
                                                    <input name="pincode" type="text" class="form-control"
                                                           placeholder="422010" value="<?php echo ($user_data['0']['home_postal_code']) ? $user_data['0']['home_postal_code'] : ''; ?>" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="col-lg-3">
                                                <h4>Company details:</h4>
                                            </div>
                                            <div class="col-lg-3">
                                                <input  id="addbtn" type="button" class="btn btn-danger pull-right btn-block"
                                                       data-toggle="modal"
                                                       data-target="#myModal" value=" Edit  ">

                                            </div>

                                            <!--Start Modal -->
                                            <div id="myModal" class="modal fade" role="dialog">

                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                &times;
                                                            </button>
                                                            <h4 class="modal-title">Professional Information </h4>
                                                        </div>
                                                        <div class="frmerror_compinfo"></div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="companyname">Company Name
                                                                    <small>(required)</small>
                                                                </label>
																<input type="hidden" value="<?php echo ($user_company[0]['id']) ? $user_company[0]['id'] : ''; ?>" name="company_id">
                                                                <input id="companyname" name="companyname" type="text"
                                                                       class="form-control"
                                                                       placeholder="Enter company name" value="<?php echo ($user_company['0']['company_name']) ? $user_company['0']['company_name'] : ''; ?>"
                                                                       maxlength="20">
																<span id="err_companyname" ></span>	   
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jobTitle">Job Title
                                                                    <small>(required)</small>
                                                                </label>
                                                                <input id="jobTitle" name="jobtitle1" type="text"
                                                                       class="form-control"
                                                                       placeholder="Enter Job Title" value="<?php echo ($user_company['0']['job_title']) ? $user_company['0']['job_title'] : ''; ?>"
                                                                       maxlength="20">
																<span id="err_jobtitle1" ></span>	 	   
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Start Date</label>
                                                                <div id="sandbox-container" class="input-group date">
                                                                    <input type="text" class="form-control"
                                                                           value="<?php echo ($user_company['0']['start_date']) ? $user_company['0']['start_date'] : ''; ?>" name="startdate"  placeholder="12-02-2017" >
                                                                    <div class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-th"></span>
                                                                    </div>
																	
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="companyContact">Contact Number
                                                                </label>
                                                                <input id="companyContact" name="companycontact"
                                                                       type="tel"
                                                                       class="form-control"
                                                                       placeholder="Enter Company Contact Number"
                                                                       value="<?php echo ($user_company['0']['work_phone']) ? $user_company['0']['work_phone'] : ''; ?>" maxlength="17">
																	   
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="companyEmail">Email
                                                                    <small>(required)</small>
                                                                </label>
                                                                <input id="companyEmail" name="companyemail"
                                                                       type="text"
                                                                       class="form-control"
                                                                       placeholder="Enter Company Email" value="<?php echo ($user_company['0']['work_email']) ? $user_company['0']['work_email'] : ''; ?>">
																<span id="err_companyemail" ></span>	   
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="companyWebsite">Website
                                                                    <small>(required)</small>
                                                                </label>
                                                                <input id="companyWebsite" name="companywebsite"
                                                                       type="text"
                                                                       class="form-control"
                                                                       placeholder="Company Website URL" value="<?php echo ($user_company['0']['work_website']) ? $user_company['0']['work_website'] : ''; ?>">
																<span id="err_companywebsite" ></span>	   
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                    id="showAdd">Save
                                                            </button>
                                                            <button type="button" class="btn btn-danger btn-o"
                                                                    data-dismiss="modal">
                                                                Close
                                                            </button>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>									
                                            <!--End Modal -->



                                        </div>
                                        <div class="center">
                                            <button type="button" id="basicInfoSubmit" name="basicInfoSubmit"  class="btn btn-danger btn-wide" style="width: 200px; margin:10px 0 10px 0;">Save</button>
                                        </div>
                                    </form>
                                    <!--Start Modal -->
                                    <!--End Modal -->		

                                </div>


                                <div class="col-lg-4">
                                    <div style="position: relative">
                                        <img src="<?php echo asset_url(); ?>main_vcard/images/phone.png" alt="" class="center-block"
                                             style="position:relative; margin:0; margin-left:18px;" height="550">

                                        <div class="mobile-content mCustomScrollbar" id="preview"
                                             data-mcs-theme="minimal-dark">
                                            <div class="picture-container center">
                                                <div class="picture">
                                                    <?php
                                                    if (!empty($user_data['0']['user_image']))
                                                        $wizard_pic_preview = $user_data['0']['user_image'];
                                                    else
                                                        $wizard_pic_preview = asset_url() . "main_vcard/images/default-avatar.png";
													
													
                                                    ?>
                                                    <img src="<?php echo $wizard_pic_preview; ?>" class="picture-src"
                                                         id="wizardPicturePreview"
                                                         title="" height="106"/>
                                                </div>
                                            </div>
                                            <ul class="list-inline center margin-bottom-0">
                                                <li class="padding-right-0">
                                                    <h2 data-preview="firstname"></h2>
                                                </li>
                                                <li class="padding-left-0">
                                                    <h2 data-preview="lastname"></h2>
                                                </li>
                                            </ul>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-collapse " data-toggle="collapse"
                                                        data-target="#basicdata" >Basic
                                                    Information
                                                </button>
                                                <button type="button" class="btn btn-collapse dropdown-toggle"
                                                        data-toggle="collapse"
                                                        data-target="#basicdata" style="padding: 8px 8px;">
                                                    <span class="caret"></span>
                                                </button>
                                                <div id="basicdata" class="collapse padding-5"
                                                     style="background:#f5f5f5; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;">
                                                    Email: <span data-preview="email">
                                                    </span><br>
                                                    <div class="margin-top-5">
                                                        Contact: <span data-preview="contact">
                                                        </span><br></div>
                                                    <div class="margin-top-5">
                                                        Address: <span data-preview="address">
                                                        </span><br></div>
                                                    <div class="margin-top-5">
                                                        PinCode: <span data-preview="pincode">
                                                        </span></div>
                                                </div>
                                            </div>

                                            <div class="btn-group margin-top-5">
                                                <button type="button" class="btn btn-collapse " data-toggle="collapse"
                                                        data-target="#companydata"> &emsp; Company Info &emsp;
                                                </button>
                                                <button type="button" class="btn btn-collapse dropdown-toggle"
                                                        data-toggle="collapse"
                                                        data-target="#companydata" style="padding: 8px 8px;">
                                                    <span class="caret"></span>
                                                </button>
                                                <div id="companydata" class="collapse padding-5"
                                                     style="background:#f5f5f5; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;">
                                                    Company: <span data-preview="companyname">
                                                    </span><br>
                                                    <div class="margin-top-5">
                                                        JobTitle: <span data-preview="jobtitle1">
                                                        </span><br></div>
                                                    <div class="margin-top-5">
                                                        Contact: <span data-preview="companycontact">
                                                        </span><br></div>
                                                    <div class="margin-top-5">
                                                        Startdate: <span data-preview="startdate">
                                                        </span><br></div>
                                                    <div class="margin-top-5">
                                                        Email: <span data-preview="companyemail">
                                                        </span><br></div>
                                                    <div class="margin-top-5">
                                                        Website: <span data-preview="companywebsite">
                                                        </span><br></div>

                                                </div>
                                            </div>
                                        </div>
                                        <ul class="list-inline bottom-buttons">
                                            <li class="center col-lg-6">
                                                <button type="button"
                                                        class="btn btn-danger btn-dropdown btn-o btn-sm margin-left-5"
                                                        style="padding-left:15px; padding-right:15px;"><i
                                                        class="fa fa-share-alt"
                                                        aria-hidden="true"></i>
                                                    Share
                                                </button>
                                            </li>
                                            <li class="center col-lg-4 margin-left-15">
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        style="padding-left:20px; padding-right:20px;"><i
                                                        class="fa fa-floppy-o"
                                                        aria-hidden="true"></i>
                                                    Save
                                                </button>
                                            </li>
                                        </ul>
                                        <div style="clear:both"></div>
                                    </div>
                                </div>
                                <div style="clear:both"></div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab2default">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h3 class="info-text"> Enter Some of your social links to add </h3>

                                    <div class="frmerror_socialinfo" ></div>
                                    <form id="frmSocialInfo">

                                        <div class="col-lg-offset-1 col-sm-9">
                                            <div class="form-group">
                                                <label for="facebook">Facebook</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon" style="background:#3a559f">
                                                        <i class="fa fa-facebook"
                                                           aria-hidden="true"
                                                           style="font-size:20px; color:#ffffff;">
                                                        </i></span>
                                                    <input type="hidden" value="<?php echo ($user_data[0]['id']) ? $user_data[0]['id'] : ''; ?>" name="social_id">
                                                    <input id="facebook" name="facebook_url" type="text"
                                                           class="form-control"
                                                           placeholder="facebook id only" value="<?php echo ($user_data['0']['facebook_link']) ? $user_data['0']['facebook_link'] : ''; ?>" >
														   

                                                </div>
												<span id="err_facebook_url" ></span>
                                                <label for="twitter">Twitter</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon" style="background:#50abf1"><i class="fa fa-twitter"
                                                                                                                  aria-hidden="true"
                                                                                                                  style="font-size:15px; color:#ffffff;"></i></span>
                                                    <input id="twitter" name="twitter_url" type="text"
                                                           class="form-control" value="<?php echo ($user_data['0']['twitter_link']) ? $user_data['0']['twitter_link'] : ''; ?>"
                                                           placeholder="Enter Twitter page id">
														   
                                                </div>
												<span id="err_twitter_url" ></span>	

                                                <label for="googleplus">Google plus</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon" style="background:#dd4b39"><i
                                                            class="fa fa-google-plus" aria-hidden="true"
                                                            style="font-size:16px; color:#ffffff;"></i></span>
                                                    <input id="googleplus" name="googleplus_url" type="text"
                                                           class="form-control" value="<?php echo ($user_data['0']['google_plus_link']) ? $user_data['0']['google_plus_link'] : ''; ?>"
                                                           placeholder="Enter google plus page id">
														   
                                                </div>
												<span id="err_googleplus_url" ></span>	

                                                <label for="linkedin">Linkedin</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon" style="background:#0077b7"><i class="fa fa-linkedin"
                                                                                                                  aria-hidden="true"
                                                                                                                  style="font-size:16px; color:#ffffff;"></i></span>
                                                    <input id="linkedin" name="linkedin_url" type="text"
                                                           class="form-control" value="<?php echo ($user_data['0']['linkedin_link']) ? $user_data['0']['linkedin_link'] : ''; ?>"
                                                           placeholder="Enter Linked in page id">
															   
                                                </div>
												<span id="err_linkedin_url" ></span>

                                                <label for="youtube">Youtube</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon" style="background:#c4302b"><i
                                                            class="fa fa-youtube-play" aria-hidden="true"
                                                            style="font-size:15px; color:#ffffff;"></i></span>
                                                    <input id="youtube" name="youtube_url" type="text"
                                                           class="form-control" value="<?php echo ($user_data['0']['youtube_link']) ? $user_data['0']['youtube_link'] : ''; ?>"
                                                           placeholder="Enter Youtube page url">
													   
                                                </div>
												<span id="err_youtube_url" ></span>	
                                                <label for="pinterest">Pinterest</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon" style="background:#D12627"><i
                                                            class="fa fa-pinterest" aria-hidden="true"
                                                            style="font-size:18px; color:#ffffff;"></i></span>
                                                    <input id="pinterest" name="pinterest_url" type="text"
                                                           class="form-control" value="<?php echo ($user_data['0']['pinterest_link']) ? $user_data['0']['pinterest_link'] : ''; ?>"
                                                           placeholder="Enter pinterest url">
															   
                                                </div>
												<span id="err_pinterest_url" ></span>
                                                <label>Email:
                                                    <small>(Enter Your Email To receive mails from contact form)</small>
                                                </label>
                                                <div class="input-group">
                                                    <span class="input-group-addon" style="background:#34495e"><i
                                                            class="fa fa-envelope" aria-hidden="true"
                                                            style="font-size:18px; color:#ffffff;"></i></span>
                                                    <input name="user_url" type="text" class="form-control" value="<?php echo ($user_data['0']['received_email']) ? $user_data['0']['received_email'] : ''; ?>"
                                                           placeholder="johndoe@website.com">
															   
                                                </div>
												<span id="err_user_url" ></span>

                                            </div>
                                        </div>
                                        <div class="center">
                                            <button type="button" id="socialInfoSubmit" name="socialInfoSubmit"  class="btn btn-danger btn-wide" style="width: 200px; margin:10px 0 10px 0;">Save</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-lg-4">
                                    <div style="position: relative">
                                        <img src="<?php echo asset_url(); ?>main_vcard/images/socialphone.png" alt="" class="center-block"
                                             style="position:relative; margin:0; margin-left:18px;" height="550">

                                        <div class="mobile-content mCustomScrollbar" id="preview"
                                             data-mcs-theme="minimal-dark">
                                            <h2 class="center">Social Links</h2>
                                            <div class="col-lg-12 padding-bottom-10">
												
                                                <div class="col-lg-6 facebook"  >		
														
														
                                                    <a id="fb_url" href="<?php echo ($user_data['0']['facebook_link']) ? $user_data['0']['facebook_link'] : ''; ?>" >
                                                        <img src="<?php echo asset_url(); ?>main_vcard/images/005-facebook.png" alt="" class="center-block"
                                                             height="50">
                                                        <p class="center">facebook</p>
													</a>
													
                                                </div>
												
                                                <div class="col-lg-6 twitter">
                                                    <a id="twit_url" href="<?php echo ($user_data['0']['twitter_link']) ? $user_data['0']['twitter_link'] : ''; ?>">
                                                        <img src="<?php echo asset_url(); ?>main_vcard/images/004-twitter.png" alt="" class="center-block"
                                                             height="50">
                                                        <p class="center">twitter</p></a>
                                                </div>
                                                <div class="col-lg-6 googleplus">
                                                    <a id="gplus_url" href="<?php echo ($user_data['0']['google_plus_link']) ? $user_data['0']['google_plus_link'] : ''; ?>">
                                                        <img src="<?php echo asset_url(); ?>main_vcard/images/001-google-plus.png" alt=""
                                                             class="center-block"
                                                             height="50">
                                                        <p class="center">Google+</p></a>
                                                </div>
                                                <div class="col-lg-6 linkedin">
                                                    <a id="linkdn_url" href="<?php echo ($user_data['0']['linkedin_link']) ? $user_data['0']['linkedin_link'] : ''; ?>">
                                                        <img src="<?php echo asset_url(); ?>main_vcard/images/002-linkedin.png" alt="" class="center-block"
                                                             height="50">
                                                        <p class="center">Linkedin</p></a>
                                                </div>
                                                <div class="col-lg-6 youtube">
                                                    <a  id="utube_url" href="<?php echo ($user_data['0']['youtube_link']) ? $user_data['0']['youtube_link'] : ''; ?>">
                                                        <img src="<?php echo asset_url(); ?>main_vcard/images/003-youtube.png" alt="" class="center-block"
                                                             height="50">
                                                        <p class="center">Youtube</p></a>
                                                </div>
                                                <div class="col-lg-6 pinterest">
                                                    <a  id="pin_url" href="<?php echo ($user_data['0']['pinterest_link']) ? $user_data['0']['pinterest_link'] : ''; ?>">
                                                        <img src="<?php echo asset_url(); ?>main_vcard/images/pinterest.png" alt="" class="center-block"
                                                             height="50">
                                                        <p class="center">Pinterest</p></a>
                                                </div>
                                            </div>
                                            <div class="padding-10">
                                                <h4 class="center padding-top-10">Contact Form</h4>
                                                <label for="visitor-email">Your Email:</label>
                                                <input id="visitor-email" type="text" placeholder="Enter Your Email"
                                                       class="form-control">
                                                <label for="subject">Subject :</label>
                                                <input id="subject" type="text" placeholder="Enter subject"
                                                       class="form-control">
                                                <label for="message">Your Message :</label>
                                                <textarea id="message" placeholder="Your Message" class="form-control">
                                                </textarea>
                                                <button type="submit" class="btn btn-danger btn-sm btn-block">
                                                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                    Send
                                                </button>
                                            </div>
                                        </div>
                                        <ul class="list-inline bottom-buttons">
                                            <li class="center col-lg-6">
                                                <button type="button"
                                                        class="btn btn-danger btn-dropdown btn-o btn-sm margin-left-5"
                                                        style="padding-left:15px; padding-right:15px;"><i
                                                        class="fa fa-share-alt"
                                                        aria-hidden="true"></i>
                                                    Share
                                                </button>
                                            </li>
                                            <li class="center col-lg-4 margin-left-15">
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        style="padding-left:20px; padding-right:20px;"><i
                                                        class="fa fa-floppy-o"
                                                        aria-hidden="true"></i>
                                                    Save
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab3default">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h3 class="info-text"> Tell Us More About You </h3>
                                    <div class="tabbable-panel">
                                        <div class="tabbable-line">
                                            <ul class="nav nav-tabs ">
                                                <li class="active">
                                                    <a href="#tab_default_1" data-toggle="tab">
                                                        Short Bio </a>
                                                </li>
                                                <li>
                                                    <a href="#tab_default_2" data-toggle="tab">
                                                        Skills & Expertise </a>
                                                </li>
                                                <li>
                                                    <a href="#tab_default_3" data-toggle="tab">
                                                        Experience </a>
                                                </li>
                                                <li>
                                                    <a href="#tab_default_4" data-toggle="tab">
                                                        Education </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab_default_1">
                                                    <div class="frmerror_shortbioinfo" ></div>
                                                    <form id="frmshortBioInfo">

                                                        <label for="editor1">Add About or Short Bio :</label>
                                                        <textarea id="editor1" name="editor1" maxlength="160">
                                                           <?php echo ($user_data[0]['short_bio']) ? $user_data[0]['short_bio'] : ''; ?>
                                                        </textarea>
														
                                                        <input type="hidden" value="<?php echo ($user_data[0]['id']) ? $user_data[0]['id'] : ''; ?>" name="id">

                                                        <div class="center">
                                                            <button type="button" id="shortBioSubmit" name="shortBioSubmit"  class="btn btn-danger btn-wide" style="width: 200px; margin:10px 0 10px 0;">Save</button>
                                                        </div>

                                                    </form>

                                                </div>

                                                <div class="tab-pane" id="tab_default_2">
                                                    <h3>Skills & Expertise</h3>

													<div class="panel panel-default">
														<div class="frmerror_skillsandexpertise"></div>
														<form id="frmskillsAndExerptise">															
															<div class="panel-body form-horizontal Experience-form" style="padding:15px;">

																<div class="form-group">
																	<label for="prevCompanyName" class="col-sm-3 control-label">Skill & Expertise</label>
																	<div class="col-sm-9">
																		
																		<input class="form-control" id="txt_skill" name="txt_skill" placeholder="Enter Skill & Expertise" type="text">
																		<span id="err_txt_skill"></span>	   
																	</div>
																</div>																
																<div class="form-group">
																	<div class="col-sm-12 text-right">
																		<button type="button" class="btn btn-default preview-add-button-skill" id="btnadd_skill" name="btnadd_skill">
																			<span class="glyphicon glyphicon-plus"></span>
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
																					<th>Skill & Expertise</th>																					
																					<th></th>
																				</tr>
																			</thead>
																			<tbody>
																				<?php
                                                                                $edu_count = 0;
                                                                                foreach ($user_skills as $user_skill) 
																				{
                                                                                    $edu_count++;
                                                                                    ?>

                                                                                    <tr id="<?php echo $user_skill['id']; ?>">
                                                                                        <td><input name="record" type="checkbox" value="<?php echo ($user_skill['id']) ? $user_skill['id'] : ''; ?>" ></td>
                                                                                        <td><?php echo ($user_edu['institute_name']) ? $user_edu['institute_name'] : ''; ?></td>
                                                                                                                     
                                                                                         <td>
																						
																								<a href="#" onclick="getEduDetailUpdate('<?php echo $user_edu['id']; ?>','<?php echo $user_edu['institute_name']; ?>','<?php echo $user_edu['degree_or_certificate']; ?>','<?php echo $user_edu['start_date']; ?>','<?php echo $user_edu['end_date']; ?>');" >Edit</a>
																								
																						</td>
                                                                                    </tr>

                                                                                <?php }  ?>
																				

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


                                                <div class="tab-pane" id="tab_default_3">
                                                    <h3>Experience</h3>

                                                    <div class="panel panel-default">
                                                        <div class="frmerror_experiencedetails" ></div>
                                                        <form id="frmExperience">

                                                            <div class="panel-body form-horizontal Experience-form"
                                                                 style="padding:15px;">

                                                                <div class="frmerror_experience" ></div>


                                                                <div class="form-group">
                                                                    <label for="prevCompanyName"
                                                                           class="col-sm-3 control-label">Company
                                                                        Name</label>
                                                                    <div class="col-sm-9">
																		<input type="hidden" id="exp_det_id" name="exp_det_id" value="" />
                                                                        <input type="text" class="form-control"
                                                                               id="prevCompanyName"
                                                                               name="prevCompanyName"
                                                                               placeholder="Enter name of firm or company">
																		<span id="err_prevCompanyName" ></span>	   
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="prevJobTitle"
                                                                           class="col-sm-3 control-label">Position
                                                                        Title</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control"
                                                                               id="prevJobTitle"
                                                                               name="prevJobTitle"
                                                                               placeholder="eg. Web Developer">
																		<span id="err_prevJobTitle" ></span>	   
                                                                    </div>
                                                                </div>
                                                                <div id="prevStartDate" class="form-group ">
                                                                    <label for="prevStartDate"
                                                                           class="col-sm-3 control-label">Start Date</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" id="prevStartDate1"
                                                                               value="" name="prevStartDate">
																		<span id="err_prevStartDate" ></span>	 	   
                                                                    </div>
                                                                </div>

                                                                <div id="prevEndDate" class="form-group ">
                                                                    <label for="prevEndDate"
                                                                           class="col-sm-3 control-label">End Date</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" id="prevEndDate1"
                                                                               value="" name="prevEndDate">
																		<span id="err_prevEndDate" ></span>		   
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="col-sm-12 text-right">
                                                                        <button type="button" class="btn btn-default preview-add-button1" id="add_experience" name="add_experience">
                                                                            <!--<span class="glyphicon glyphicon-plus"></span>
                                                                            Add -->
																			Edit
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
                                                                                $exp_count = 0;
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
																							<a href="#" onclick="getExpDetailUpdate('<?php echo $user_exp['id']; ?>','<?php echo $user_exp['company_name']; ?>','<?php echo $user_exp['position_title']; ?>','<?php echo $user_exp['start_date']; ?>','<?php echo $user_exp['end_date']; ?>');" >Edit</a>
																							
																						</td>
                                                                                    </tr>

                                                                                <?php }?>


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
                                                <div class="tab-pane" id="tab_default_4">
                                                   
                                                    <form id="frmEducationDetails">   
														 <div class="frmerror_educationdetails" ></div>
                                                        <h3>Education</h3>

                                                        <div class="panel panel-default">
                                                            <div class="panel-body form-horizontal Education-form"
                                                                 style="padding:15px;">
                                                                <div class="form-group">
                                                                    <label for="eduInstituteName"
                                                                           class="col-sm-3 control-label">Institute
                                                                        Name</label>
                                                                    <div class="col-sm-9">
																		
																		<input type="hidden" class="form-control" id="edu_det_id" name="edu_det_id">
                                                                        <input type="text" class="form-control"
                                                                               id="eduInstituteName"
                                                                               name="eduInstituteName">
																		<span id="err_eduInstituteName" ></span>	   
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="degree" class="col-sm-3 control-label">Degree
                                                                        or Certificate</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" id="degree"
                                                                               name="degree">
																		<span id="err_degree" ></span>		   
                                                                    </div>
                                                                </div>
                                                                <div id="eduStartDate" class="form-group ">
                                                                    <label for="eduStartDate"
                                                                           class="col-sm-3 control-label">Start Date</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" id="eduStartDate1"
                                                                               value="" name="eduStartDate">
																		<span id="err_eduStartDate" ></span>		   
                                                                    </div>
                                                                </div>

                                                                <div id="eduEndDate" class="form-group ">
                                                                    <label for="eduEndDate"
                                                                           class="col-sm-3 control-label">End Date</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" id="eduEndDate1"
                                                                               value="" name="eduEndDate">
																		<span id="err_eduEndDate" ></span>	   
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="col-sm-12 text-right">
                                                                        <button type="button"
                                                                                class="btn btn-default preview-add-button2" id="educationSubmit">
																				<!--<span class="glyphicon glyphicon-plus"></span>-->
                                                                            Edit
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
                                                                                $edu_count = 0;
                                                                                foreach ($user_edu_data as $user_edu) {
                                                                                    $edu_count++;
                                                                                    ?>

                                                                                    <tr id="<?php echo $user_edu['id']; ?>">
                                                                                        <td><input name="record" type="checkbox" value="<?php echo ($user_edu['id']) ? $user_edu['id'] : ''; ?>" ></td>
                                                                                        <td><?php echo ($user_edu['institute_name']) ? $user_edu['institute_name'] : ''; ?></td>
                                                                                        <td><?php echo ($user_edu['degree_or_certificate']) ? $user_edu['degree_or_certificate'] : ''; ?></td>
                                                                                        <td><?php echo ($user_edu['start_date']) ? $user_edu['start_date'] : ''; ?></td>
                                                                                        <td><?php echo ($user_edu['end_date']) ? $user_edu['end_date'] : ''; ?></td>
                                                                                         <td>
																						
																								<a href="#" onclick="getEduDetailUpdate('<?php echo $user_edu['id']; ?>','<?php echo $user_edu['institute_name']; ?>','<?php echo $user_edu['degree_or_certificate']; ?>','<?php echo $user_edu['start_date']; ?>','<?php echo $user_edu['end_date']; ?>');" >Edit</a>
																								
																						</td>
                                                                                    </tr>

                                                                                <?php }  ?>


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


                                <div class="col-lg-4">
                                    <div style="position: relative">
                                        <img src="<?php echo asset_url(); ?>main_vcard/images/aboutphone.png" alt="" class="center-block"
                                             style="position:relative; margin:0px; margin-left:15px;" height="550">

                                        <div class="mobile-content mCustomScrollbar" id="preview"
                                             data-mcs-theme="minimal-dark">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-collapse " data-toggle="collapse"
                                                        data-target="#aboutdata" style="width:180px;">About
                                                </button>
                                                <button type="button" class="btn btn-collapse dropdown-toggle"
                                                        data-toggle="collapse"
                                                        data-target="#aboutdata" style="padding: 8px 8px;">
                                                    <span class="caret"></span>
                                                </button>
                                                <div id="aboutdata" class="collapse padding-5"
                                                     style="background:#f5f5f5; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;">
                                                    <div id="trackingDiv"></div>
                                                </div>
                                            </div>

                                            <div class="btn-group margin-top-5">
                                                <button type="button" class="btn btn-collapse " data-toggle="collapse"
                                                        data-target="#skillsdata" style="width:180px;">Skills &
                                                    Expertise
                                                </button>
                                                <button type="button" class="btn btn-collapse dropdown-toggle"
                                                        data-toggle="collapse"
                                                        data-target="#skillsdata" style="padding: 8px 8px;">
                                                    <span class="caret"></span>
                                                </button>
                                                <div id="skillsdata" class="collapse padding-5"
                                                     style="background:#f5f5f5; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;">
                                                    <div  class="content-append">
                                                        
                                                        <div style="padding: 5px;" id="blockSkillDataMobile" >
                                                                        <p><b>
                                                                                Skills you have added: 
                                                                            </b></p>
														 </div>		
														 
                                                                     <?php 
																	if(!empty($user_skills)) 
																	{
																	?>                            
                                                                    
                                                                    
                                                                            
                                                                                <?php
                                                                                $exp_count = 0;
                                                                                foreach ($user_skills as $user_skill) {
                                                                                    $exp_count++;
                                                                                    ?>
                                                                    
                                                                       
                                            <?php //echo ($user_skill['skill']) ? $user_skill['skill'] : ''; ?><br>
                                                                   
                                                                    
                                                                    
                                                                                <?php } ?>
                                                                       
                                                        
                                                 
																	<?php } ?>		
												 </div>
                                                </div>
                                            </div>

                                            <div class="btn-group margin-top-5">
                                                <button type="button" class="btn btn-collapse " data-toggle="collapse"
                                                        data-target="#experiencedata" style="width:180px;">Experience
                                                </button>
                                                <button type="button" class="btn btn-collapse dropdown-toggle"
                                                        data-toggle="collapse"
                                                        data-target="#experiencedata" style="padding: 8px 8px;">
                                                    <span class="caret"></span>
                                                </button>
                                                <div id="experiencedata" class="collapse padding-5"
                                                     style="background:#f5f5f5; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;">
                                                    <div class="preview-table-ex1">
                                                      <?php
                                                        $exp_count = 0;
                                                        foreach ($user_exp_data as $user_exp) {
                                                            $exp_count++;
                                                            ?>

                                                            <div id="info-remove<?php echo $user_exp['id']; ?>">
                                                                <div class="content-company div-delete"> 
                                                                    <strong>Company Name: </strong><?php echo ($user_exp['company_name']) ? $user_exp['company_name'] : ''; ?>
                                                                </div>
                                                                <div class="content-position div-delete"><strong>Position Title: </strong><?php echo ($user_exp['position_title']) ? $user_exp['position_title'] : ''; ?>
                                                                </div>
                                                                <div class="start-date div-delete"><strong>Start Date: </strong><?php echo ($user_exp['start_date']) ? $user_exp['start_date'] : ''; ?>
                                                                </div>
                                                                <div class="end-date div-delete"><strong>End Date: </strong><?php echo ($user_exp['end_date']) ? $user_exp['end_date'] : ''; ?>
                                                                </div>
                                                                <hr>
                                                            </div>



                                                        <?php }  ?>



                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn-group margin-top-5">
                                                <button type="button" class="btn btn-collapse " data-toggle="collapse"
                                                        data-target="#educationdata" style="width:180px;">Education
                                                </button>
                                                <button type="button" class="btn btn-collapse dropdown-toggle"
                                                        data-toggle="collapse"
                                                        data-target="#educationdata" style="padding: 8px 8px;">
                                                    <span class="caret"></span>
                                                </button>
                                                <div id="educationdata" class="collapse padding-5"
                                                     style="background:#f5f5f5; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;">

                                                    <div class="preview-table-ex3">

                                                        <?php
                                                        $edu_count = 0;
                                                        foreach ($user_edu_data as $user_edu) 
														{
                                                            $edu_count++;
                                                            ?>


                                                            <div id="info-remove<?php echo $user_edu['id']; ?>">
                                                                <div class="content-company div-delete">
                                                                    <strong>Institute Name: </strong><?php echo ($user_edu['institute_name']) ? $user_edu['institute_name'] : ''; ?>
                                                                </div>
                                                                <div class="content-position div-delete"><strong>Degree or Certificate: </strong><?php echo ($user_edu['degree_or_certificate']) ? $user_edu['degree_or_certificate'] : ''; ?>
                                                                </div><div class="start-date div-delete"><strong>Start Date: </strong><?php echo ($user_edu['start_date']) ? $user_edu['start_date'] : ''; ?>
                                                                </div><div class="end-date div-delete"><strong>End Date: </strong><?php echo ($user_edu['end_date']) ? $user_edu['end_date'] : ''; ?>
                                                                </div>
                                                                <hr>
                                                            </div>

                                                        <?php }  ?>



                                                    </div>


                                                </div>
                                            </div>

                                            <span data-preview="prev1"></span>
                                        </div>
                                        <ul class="list-inline bottom-buttons">
                                            <li class="center col-lg-6">
                                                <button type="button"
                                                        class="btn btn-danger btn-dropdown btn-o btn-sm margin-left-5"
                                                        style="padding-left:15px; padding-right:15px;"><i
                                                        class="fa fa-share-alt"
                                                        aria-hidden="true"></i>
                                                    Share
                                                </button>
                                            </li>
                                            <li class="center col-lg-4 margin-left-15">
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        style="padding-left:20px; padding-right:20px;"><i
                                                        class="fa fa-floppy-o"
                                                        aria-hidden="true"></i>
                                                    Save
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
						<div class="tab-pane fade" id="tab4default">
							
							<div class="col-lg-8">
							<div class="parent-section">
							Add Section
							</div>
							<div class="clear"></div>
							<div class="child-section">
							<a data-toggle="modal" data-target="#pricing" class="showSingle" target="1"><i class="fa fa-usd" aria-hidden="true"></i><br> Pricing</a>
							<a data-toggle="modal" data-target="#portfolio" class="showSingle" target="2"><i class="fa fa-user" aria-hidden="true"></i><br> Portfolio</a>
							<a class="showSingle" target="3" data-toggle="modal" data-target="#lists"><i class="fa fa-list-ul" aria-hidden="true"></i><br> List</a>
							<a class="showSingle" target="4" data-toggle="modal" data-target="#links"><i class="fa fa-link" aria-hidden="true"></i><br> Links</a>
							<a class="showSingle" target="5" data-toggle="modal" data-target="#Video1"><i class="fa fa-video-camera" aria-hidden="true"></i><br> Video</a>
							</div>
							<div class="clear"></div>
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
								
									<div class="panel panel-success">
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
										<div class="panel panel-success">
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
							<div class="panel panel-success">
									<div class="panel-heading">
										<h3 class="panel-title">Portfolio</h3>
										<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
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
							<div class="panel panel-success">
									<div class="panel-heading">
										<h3 class="panel-title">List</h3>
										<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
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
							<div class="panel panel-success">
									<div class="panel-heading">
										<h3 class="panel-title">Links</h3>
										<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
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
							<div class="panel panel-success">
									<div class="panel-heading">
										<h3 class="panel-title">Video</h3>
										<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
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
							
							
							
							<div class="col-lg-4">
                                    <div style="position: relative">
                                        <img src="<?php echo asset_url(); ?>main_vcard/images/Info_mobile.png" alt="" class="center-block"
                                             style="position:relative; margin:0px; margin-left:15px;" height="550">

                                        <div class="mobile-content mCustomScrollbar" id="preview"
                                             data-mcs-theme="minimal-dark">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-collapse " data-toggle="collapse"
                                                        data-target="#pricing-plan" style="width:180px;">Pricing Plan
                                                </button>
                                                <button type="button" class="btn btn-collapse dropdown-toggle"
                                                        data-toggle="collapse"
                                                        data-target="#pricing-plan" style="padding: 8px 8px;">
                                                    <span class="caret"></span>
                                                </button>
                                                <div id="pricing-plan" class="collapse padding-5"
                                                     style="background:#f5f5f5; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;">
                                                    
													
													<!-- Pricing plan Starts Here-->
													<div class="desc-panel preview-table-ex6" style="margin-top:48px">
													<?php 
														/*if(!empty($user_priceplan))
														{
															foreach($user_priceplan as $u_plan)
															{
																if(!empty($u_plan['plan_title']))
																{
														?>	
															<div class='panel panel-success'>
																<div class='panel-heading'>
																	<h3 class='panel-title'> <?php echo $u_plan['plan_title']; ?> </h3>
																	<span class='pull-right clickable'>
																	<i class='glyphicon glyphicon-chevron-up'></i></span></div>
																	<div class='panel-body'>
																	<div class='panel-body-content'> <?php echo $u_plan['plan_description']; ?> </div>
																	<div class='footer1'> <?php echo $u_plan['price']; ?> </div>
																</div>
															</div>
													<?php
																}
																else if(!empty($u_plan['plan_image']))
																{ ?>
																<div class='panel panel-success'>
																	<div class='panel-heading'>
																		<h3 class='panel-title'>  </h3>
																		<span class='pull-right clickable'>
																		<i class='glyphicon glyphicon-chevron-up'></i></span></div>
																		<div class='panel-body'>
																		<div class='panel-body-content'><img src="<?php echo base_url().$u_plan['plan_image']; ?>" class="img-responsive"/> </div>
																		<div class='footer1'>  </div>
																	</div>
																</div>				
																	
															<?php
																}	
															}
														} */
												    ?>
													</div>
													<!--End Here-->
                                                </div>
                                            </div>

                                            <div class="btn-group margin-top-5">
                                                <button type="button" class="btn btn-collapse " data-toggle="collapse"
                                                        data-target="#Portfolio" style="width:180px;">Portfolio
                                                </button>
                                                <button type="button" class="btn btn-collapse dropdown-toggle"
                                                        data-toggle="collapse"
                                                        data-target="#Portfolio" style="padding: 8px 8px;">
                                                    <span class="caret"></span>
                                                </button>
                                                <div id="Portfolio" class="collapse padding-5"
                                                     style="background:#f5f5f5; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;">
                                                  
												  <div class="desc-panel" style="margin-top:48px">
													<div class="panel panel-success">
															<div class="panel-heading">
																<h3 class="panel-title">&nbsp;</h3>
																<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
															</div>
															<div class="panel-body portfolio-preview6">
															<?php /* if(!empty($user_portfolio)) { 
																foreach($user_portfolio as $u_portfolio)
																{
															?>
																<div class="panel-body-content text-center">
																<?php if(!empty($u_portfolio['image'])) {?>
																	<img src="<?php echo base_url().$u_portfolio['image']; ?>" class="img-responsive"/>
																<?php } ?>	
																<hr>
																<?php if(!empty($u_portfolio['video_url'])) { ?>
																<div class="embed-responsive embed-responsive-4by3">
																  <iframe class="embed-responsive-item" src="<?php echo $u_portfolio['video_url'] ?>"></iframe>
																</div>									
																<?php } ?>
																</div>
															<?php
																}
															}  */ ?>
															
															</div>
													</div>
													</div>
												  
												  
                                                </div>
                                            </div>

                                            <div class="btn-group margin-top-5">
                                                <button type="button" class="btn btn-collapse " data-toggle="collapse"
                                                        data-target="#List" style="width:180px;">List
                                                </button>
                                                <button type="button" class="btn btn-collapse dropdown-toggle"
                                                        data-toggle="collapse"
                                                        data-target="#List" style="padding: 8px 8px;">
                                                    <span class="caret"></span>
                                                </button>
                                                <div id="List" class="collapse padding-5"
                                                     style="background:#f5f5f5; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;">
                                               

										<div class=" desc-panel" style="margin-top:48px">
											<div class="panel panel-success">
													<div class="panel-heading">
														<h3 class="panel-title">List</h3>
														<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
													</div>
													<div class="panel-body">
													<div class="panel-body-content">
													<ul class="list list-preview-table-ex6">
														<?php
														/*if(!empty($user_list))
														{
															foreach($user_list as $ulist)
															{
														?>
														<li><?php echo $ulist['list'] ?></li>
														<?php
															}
														} */?>
													</ul>
													</div>
													
													</div>
											</div>
											</div>											   
													
											
							
							
                                                </div>
                                            </div>
                                            <div class="btn-group margin-top-5">
                                                <button type="button" class="btn btn-collapse " data-toggle="collapse"
                                                        data-target="#Links" style="width:180px;">Links
                                                </button>
                                                <button type="button" class="btn btn-collapse dropdown-toggle"
                                                        data-toggle="collapse"
                                                        data-target="#Links" style="padding: 8px 8px;">
                                                    <span class="caret"></span>
                                                </button>
                                                <div id="Links" class="collapse padding-5"
                                                     style="background:#f5f5f5; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;">
                                                    
													
													<div class=" desc-panel" style="margin-top:48px">
											<div class="panel panel-success">
													<div class="panel-heading">
														<h3 class="panel-title">Links</h3>
														<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
													</div>
													<div class="panel-body">
													<div class="panel-body-content">
													<ul class="list link-preview-ex6">
														<?php /* if(!empty($user_link)) { 
															foreach($user_link as $u_link) {
														?>
															<div class="linking"><a href=""><?php echo $u_link['link'];  ?><span class="pull-right"><i class="fa fa-external-link" aria-hidden="true"></i></span></a></div>
														<?php 
															}
														} */ ?>

													</ul>
													</div>
													
													</div>
											</div>
											</div>
													
													
                                                </div>
                                            </div>

                                            <div class="btn-group margin-top-5">
                                                <button type="button" class="btn btn-collapse " data-toggle="collapse"
                                                        data-target="#Video" style="width:180px;">Video
                                                </button>
                                                <button type="button" class="btn btn-collapse dropdown-toggle"
                                                        data-toggle="collapse"
                                                        data-target="#Video" style="padding: 8px 8px;">
                                                    <span class="caret"></span>
                                                </button>
                                                <div id="Video" class="collapse padding-5"
                                                     style="background:#f5f5f5; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;">
                                                    
													<div class="preview-table-ex3"></div>
													
													<div  class="desc-panel" style="margin-top:48px">
													<div class="panel panel-success">
															<div class="panel-heading">
																<h3 class="panel-title">Video</h3>
																<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
															</div>
															<div class="panel-body video-preview6">
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
                                        </div>
                                        <ul class="list-inline bottom-buttons">
                                            <li class="center col-lg-6">
                                                <button type="button"
                                                        class="btn btn-danger btn-dropdown btn-o btn-sm margin-left-5"
                                                        style="padding-left:15px; padding-right:15px;"><i
                                                        class="fa fa-share-alt"
                                                        aria-hidden="true"></i>
                                                    Share
                                                </button>
                                            </li>
                                            <li class="center col-lg-4 margin-left-15">
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        style="padding-left:20px; padding-right:20px;"><i
                                                        class="fa fa-floppy-o"
                                                        aria-hidden="true"></i>
                                                    Save
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            
							
							
						</div>
						
                        <div class="tab-pane fade" id="tab5default">Default 5</div>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>

<!-- jQuery -->
<script src="<?php echo asset_url(); ?>main_vcard/js/jquery.js"></script>
<script src="<?php echo asset_url(); ?>main_vcard/js/demo.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo asset_url(); ?>main_vcard/js/bootstrap.min.js"></script>
<script src="<?php echo asset_url(); ?>main_vcard/js/form-preview.js"></script>
<script src="<?php echo asset_url(); ?>main_vcard/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
<!--Bootstrap Datepicker-->
<script src="<?php echo asset_url(); ?>main_vcard/plugins/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.js"></script>
<!-- custom scrollbar plugin -->
<script src="<?php echo asset_url(); ?>main_vcard/js/jquery.mCustomScrollbar.concat.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="<?php echo asset_url(); ?>main_vcard/js/gsdk-bootstrap-wizard.js"></script>
<script src="<?php echo asset_url(); ?>main_vcard/plugins/ckeditor/ckeditor.js"></script>
<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src="<?php echo asset_url(); ?>main_vcard/js/jquery.validate.min.js"></script>
<script>
                                                    jQuery(document).on('click', '.mega-dropdown', function (e) {
                                                        e.stopPropagation()
                                                    })
</script>
<script  type="text/javascript">
    $("#basicInfo").validate();
    $('#sandbox-container input').datepicker({});
    $('#eduStartDate input').datepicker({});
    $('#eduEndDate input').datepicker({});
    $('#prevStartDate input').datepicker({});
    $('#prevEndDate input').datepicker({});
	
		jQuery(function(){
			 jQuery('.targetDiv').hide();
			jQuery('.showSingle').click(function(){
				  jQuery('.targetDiv').hide();
				  jQuery('#div'+$(this).attr('target')).show();
			});
	});
</script>
<script type="text/javascript">
    (function ($) {
        $(window).on("load", function () {

            $.mCustomScrollbar.defaults.scrollButtons.enable = true; //enable scrolling buttons by default
            $.mCustomScrollbar.defaults.axis = "yx"; //enable 2 axis scrollbars by default
            $("#preview").mCustomScrollbar({theme: "minimal-dark"});
            $(".all-themes-switch a").click(function (e) {
                e.preventDefault();
                var $this = $(this),
                        rel = $this.attr("rel"),
                        el = $(".content");
                switch (rel) {
                    case "toggle-content":
                        el.toggleClass("expanded-content");
                        break;
                }
            });

        });
    })(jQuery);

    /*for dynamic field addition*/
    $(function () {
        $(document).on('click', '.btn-add', function (e) {
            e.preventDefault();

            var controlForm = $('.controls form:first'),
                    currentEntry = $(this).parents('.entry:first'),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);

            newEntry.find('input').val('');
            controlForm.find('.entry:not(:last) .btn-add')
                    .removeClass('btn-add').addClass('btn-remove')
                    .removeClass('btn-red').addClass('btn-danger')
                    .html('<span class="glyphicon glyphicon-minus"></span>');
        }).on('click', '.btn-remove', function (e) {
            $(this).parents('.entry:first').remove();

            e.preventDefault();
            return false;
        });
    });


    /*For CK Editor*/
    CKEDITOR.replace('editor1');
    /*For CK Editor Preview*/
    timer = setInterval(updateDiv, 100);
    function updateDiv() {
        var editorText = CKEDITOR.instances.editor1.getData();
        $('#trackingDiv').html(editorText);
    }


    $(document).on('click', '.input-remove-row', function () {
        var tr = $(this).closest('tr');
        tr.fadeOut(200, function () {
            tr.remove();
            calc_total()
        });
    });

    $(function () {
        $('.preview-add-button').click(function () {
            var form_data = {};
            form_data["eduInstituteName"] = $('.Education-form input[name="eduInstituteName"] ').val();
            form_data["degree"] = $('.Education-form input[name="degree"]').val();
//            form_data["amount"] = parseFloat($('.Education-form input[name="amount"]').val()).toFixed(2);
//            form_data["eduStartDate"] = $('.Education-form #eduStartDate option:selected').text();
            form_data["eduStartDate"] = $('.Education-form input[name="eduStartDate"]').val();
            form_data["eduEndDate"] = $('.Education-form input[name="eduEndDate"]').val();
            form_data["remove-row"] = '<span class="glyphicon glyphicon-remove"></span>';
            var row = $('<tr></tr>');
            $.each(form_data, function (type, value) {
                $('<td class="input-' + type + '"></td>').html(value).appendTo(row);
            });
            $('.preview-table > tbody:last').append(row);
        });
    });
</script>
<script>

    $(document).on('click', '.input-remove-row', function () {
        var tr = $(this).closest('tr');
        tr.fadeOut(200, function () {
            tr.remove();
        });
    });



    function change() // no ';' here
    {
        var elem = document.getElementById("addbtn");
        if (elem.value == " Add + ")
            elem.value = " Edit ";
//        else elem.value = " Add + ";
    }
</script>
<script>
    $('#facebook').keyup(function () {
        if ($(this).val().length)
		{				
            $('div.facebook').show();
			//$("#fb_url").attr('href',$("#facebook").val());
		}	
        else
            $('div.facebook').hide();
    });
	if($('#facebook').val()) {		
		$('div.facebook').show();
		
	}	
	else
		$('div.facebook').hide();
	
    $('#twitter').keyup(function () {
        if ($(this).val().length)
		{	
            $('div.twitter').show();
			//$("#twit_url").attr('href',$(this).val());
		}	
        else
            $('div.twitter').hide();
    });
	if($('#twitter').val())
		$('div.twitter').show();
	else
		$('div.twitter').hide();
    
    $('#googleplus').keyup(function () {
        if ($(this).val().length)
            $('div.googleplus').show();
        else
            $('div.googleplus').hide();
    });
	if($('#googleplus').val())
		$('div.googleplus').show();
	else
		$('div.googleplus').hide();
    $('#linkedin').keyup(function () {
        if ($(this).val().length)
            $('div.linkedin').show();
        else
            $('div.linkedin').hide();
    });
	if($('#linkedin').val())
		$('div.linkedin').show();
	else
		$('div.linkedin').hide();
    
    $('#youtube').keyup(function () {
        if ($(this).val().length)
            $('div.youtube').show();
        else
            $('div.youtube').hide();
    });
    if($('#youtube').val())
		$('div.youtube').show();
	else
		$('div.youtube').hide();
    $('#pinterest').keyup(function () {
        if ($(this).val().length)
            $('div.pinterest').show();
        else
            $('div.pinterest').hide();
    });
	if($('#pinterest').val())
		$('div.pinterest').show();
	else
		$('div.pinterest').hide();
    
</script>
<script>
	$('input[name="facebook_url"]').on('change', function () {
			
        var self = this,
                $self = $(self),
                link = $self.next();
        $(".mobile-content div div div div a").attr('href', 'https://www.facebook.com/' + encodeURIComponent(self.value));
        link.prop('href', function () {
//            this.href = this.protocol + '//' + this.hostname + '/' + encodeURIComponent(self.value);
        });
    });
    $('input[name="twitter_url"]').on('change', function () {
        var self = this,
                $self = $(self),
                link = $self.next();
        $(".mobile-content div div div div a").attr('href', 'https://https://twitter.com/' + encodeURIComponent(self.value));
        link.prop('href', function () {
//            this.href = this.protocol + '//' + this.hostname + '/' + encodeURIComponent(self.value);
        });
    });
    $('input[name="googleplus_url"]').on('change', function () {
        var self = this,
                $self = $(self),
                link = $self.next();
        $(".mobile-content div div div div a").attr('href', 'https://plus.google.com/' + encodeURIComponent(self.value));
        link.prop('href', function () {
//            this.href = this.protocol + '//' + this.hostname + '/' + encodeURIComponent(self.value);
        });
    });
    $('input[name="linkedin_url"]').on('change', function () {
        var self = this,
                $self = $(self),
                link = $self.next();
        $(".mobile-content div div div div a").attr('href', 'https://in.linkedin.com/' + encodeURIComponent(self.value));
        link.prop('href', function () {
//            this.href = this.protocol + '//' + this.hostname + '/' + encodeURIComponent(self.value);
        });
    });
    $('input[name="youtube_url"]').on('change', function () {
        var self = this,
                $self = $(self),
                link = $self.next();
        $(".mobile-content div div div div a").attr('href', 'https://www.youtube.com/' + encodeURIComponent(self.value));
        link.prop('href', function () {
//            this.href = this.protocol + '//' + this.hostname + '/' + encodeURIComponent(self.value);
        });
    });
    $('input[name="pinterest_url"]').on('change', function () {
        var self = this,
                $self = $(self),
                link = $self.next();
        $(".mobile-content div div div div a").attr('href', 'https://in.pinterest.com/' + encodeURIComponent(self.value));
        link.prop('href', function () {
//            this.href = this.protocol + '//' + this.hostname + '/' + encodeURIComponent(self.value);
        });
    });

</script>

<script type="text/javascript">
    $(document).ready(function () {

		
		
		$('.child-section').hide();
		
		$('.parent-section').click(function() {
			$('.child-section').toggle();
		});

        var iCnt = 0;
        // CREATE A "DIV" ELEMENT AND DESIGN IT USING jQuery ".css()" CLASS.
        var container = $(document.createElement('div')).css({

        });

        $('#btAdd').click(function () {

            $('.remove-div').show();
            if (iCnt <= 19) {

                iCnt = iCnt + 1;

                // ADD TEXTBOX.
                $(container).append('<div class="form-group"><input type=text name="txt_skill[]" class="input form-control skill-text-add skill-text" id=tb' + iCnt + ' ' +
                        'value="Your content... ' + iCnt + '" /></div>');

                // SHOW SUBMIT BUTTON IF ATLEAST "1" ELEMENT HAS BEEN CREATED.
                if (iCnt == 1) {

                    var divSubmit = $(document.createElement('div'));
                  /* $(divSubmit).append('<input type=button class="bt btn btn-danger btn-sm"' +
                            'onclick="GetTextValue()"' +
                            'id=btSubmit value=Submit />'); */
					
                }

                // ADD BOTH THE DIV ELEMENTS TO THE "main" CONTAINER.
                $('#main').after(container, divSubmit);
            }
            // AFTER REACHING THE SPECIFIED LIMIT, DISABLE THE "ADD" BUTTON.
            // (20 IS THE LIMIT WE HAVE SET)
            else {
                $(container).append('<label>Reached the limit</label>');
                $('#btAdd').attr('class', 'bt-disable');
                $('#btAdd').attr('disabled', 'disabled');
            }
        });

        // REMOVE ONE ELEMENT PER CLICK.
        $('#btRemove').click(function () {		
			
            if (iCnt != 0) {
                $('#tb' + iCnt).remove();
                iCnt = iCnt - 1;
            }

            if (iCnt == 0) {
                $(container)
                        .empty()
                        .remove();

               // $('#btSubmit').remove();
                $('#btAdd')
                        .removeAttr('disabled')
                        .attr('class', 'bt');
            }
			
			$.ajax({
                url: "<?php echo base_url() ?>frontend/Vcard/removeSkillsAndExerptise",
                type: "POST",
                data: {skillid:$('.input_update_id:first').val()},
                success: function (data)
                {
                    var json = JSON.parse(data);
                    if (json.status === 1) {	
							getSkillsData(); 
							getblockSkillData();
                        $(".frmerror_skillsandexpertise").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return true;
                    } else {
                        $(".frmerror_skillsandexpertise").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return false;
                    }
                }
            });		
			
        });


        // REMOVE ALL THE ELEMENTS IN THE CONTAINER.
        $('#btRemoveAll').click(function () {
            //$('.content-append').empty();
            $(container)
                    .empty()
                    .remove();

            //$('#btSubmit').remove();
            iCnt = 0;

            $('#btAdd')
                    .removeAttr('disabled')
                    .attr('class', 'btn btn-primary btn-warning bt addbtn');
					
					
			$.ajax({
                url: "<?php echo base_url() ?>frontend/Vcard/removeAllSkillsAndExerptise",
                type: "POST",
                data: '',
                success: function (data)
                {
                    var json = JSON.parse(data);
                    if (json.status === 1) {	
						
						getSkillsData();
						getblockSkillData();
                        $(".frmerror_skillsandexpertise").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return true;
                    } else {
                        $(".frmerror_skillsandexpertise").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return false;
                    }
                }
            });		
        });
		
		
		
		// save skill
		var scnt = 1;
        $("#btnadd_skill").click(function () {
			
			$("#err_txt_skill").html('');
			
			
            var skill_name = $("#txt_skill").val();
            
			$.ajax({
                url: "<?php echo base_url() ?>frontend/Vcard/saveSkills",
                type: "POST",
                data: $("#frmskillsAndExerptise").serialize(),
                success: function (data)
                {
                    var json = JSON.parse(data);
                    if (json.status === 1) {
						
										
						
						var markup = "<tr id="+scnt+"><td><input type='checkbox' name='record' value=" + json.ins_skill_id + " ></td><td>" + skill_name + "</td></tr>";
						$(".preview-table-ex-skill").append(markup);
						
						var mark1="<div class='skill-remove-"+ json.ins_skill_id +"' >"+skill_name + "</div><br>";
						
						$("#blockSkillDataMobile").append(mark1);
						/*var markup1 = "<div id='info-remove"+cnt+"'><div class='content-company div-delete'> <strong>Company Name: </strong>" + prevCompanyName + "</div><div class='content-position div-delete'><strong>Position Title: </strong>" + prevJobTitle + "</div><div class='start-date div-delete'><strong>Start Date: </strong>" + prevStartDate + "</div><div class='end-date div-delete'><strong>End Date: </strong>" + prevEndDate + "</div><hr></div>";
						$(".preview-table-ex1").append(markup1);						*/
						
						$("#err_txt_skill").html('');			
						$("#txt_skill").val('');	
                        $(".frmerror_skillsandexpertise").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return true;
                    } else {						
						$("#err_txt_skill").html('<div class="text-danger">' + json.msg.txt_skill + '</div>');
						
                        //$(".frmerror_skillsandexpertise").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return false;
                    }
                }
            });          
            scnt++;

            $('#prevCompanyName, #prevJobTitle, #prevStartDate1, #prevEndDate1,#exp_det_id').val("");
        });		
		// save skill
		// delete skill		 
        $(".delete-row-skill").click(function () {
            var delete_exp_array = [];

            $("table tbody").find('input[name="record"]').each(function (index) {

                if ($(this).is(":checked")) 
				{
						
					
				    $('.skill-remove-'+$(this).val()).remove();
                    $(this).parent().parent().remove();

                    //delete_exp_array.push($(this).parent().parent().attr('id'));
                    delete_exp_array.push($(this).val());

                }
            });      
            
             
			 $.ajax({
                url: "<?php echo base_url() ?>frontend/Vcard/deleteSkill",
                type: "POST",
                data: { skill_ids:delete_exp_array },                
                success: function (data)
                {
                   var json = JSON.parse(data);
					 if (json.status === 1) {
					 $(".frmerror_skillsandexpertise").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
					 return true;
					 } else {
					 $(".frmerror_skillsandexpertise").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
					 return false;
					 }
                }
            });

        });
		// delete skill
		

        //	Code for Experience tab where add row and delete functionality
        var cnt = 1;
        $(".preview-add-button1").click(function () {
			
			$("#err_prevCompanyName").html('');
			$("#err_prevJobTitle").html('');
			$("#err_prevStartDate").html('');
			$("#err_prevEndDate").html('');
			
            var prevCompanyName = $("#prevCompanyName").val();
            var prevJobTitle = $("#prevJobTitle").val();

            var prevStartDate = $("#prevStartDate1").val();
            var prevEndDate = $("#prevEndDate1").val();

			$.ajax({
                url: "<?php echo base_url() ?>frontend/Vcard/updateExperience",
                type: "POST",
                data: $("#frmExperience").serialize(),
                success: function (data)
                {
                    var json = JSON.parse(data);
                    if (json.status === 1) {
						
						$("#err_prevCompanyName").html('');
						$("#err_prevJobTitle").html('');
						$("#err_prevStartDate").html('');
						$("#err_prevEndDate").html('');
						
						getExperienceData();
						getExperienceDataMobile();						
						
						/*var markup = "<tr id="+json.ins_experience_id+"><td><input type='checkbox' name='record' value=" + json.ins_experience_id + " ></td><td>" + prevCompanyName + "</td><td>" + prevJobTitle + "</td><td>" + prevStartDate + "</td><td>" + prevEndDate + "</td></tr>";
						$(".preview-table-ex").append(markup);
						
						var markup1 = "<div id='info-remove"+cnt+"'><div class='content-company div-delete'> <strong>Company Name: </strong>" + prevCompanyName + "</div><div class='content-position div-delete'><strong>Position Title: </strong>" + prevJobTitle + "</div><div class='start-date div-delete'><strong>Start Date: </strong>" + prevStartDate + "</div><div class='end-date div-delete'><strong>End Date: </strong>" + prevEndDate + "</div><hr></div>";
						$(".preview-table-ex1").append(markup1); */						
						
                        $(".frmerror_experiencedetails").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return true;
                    } else {						
						$("#err_prevCompanyName").html('<div class="text-danger">' + json.msg.prevCompanyName + '</div>');
						$("#err_prevJobTitle").html('<div class="text-danger">' + json.msg.prevJobTitle + '</div>');
						$("#err_prevStartDate").html('<div class="text-danger">' + json.msg.prevStartDate + '</div>');
						$("#err_prevEndDate").html('<div class="text-danger">' + json.msg.prevEndDate + '</div>');
                        //$(".frmerror_experiencedetails").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return false;
                    }
                }
            });          
            cnt++;

            $('#prevCompanyName, #prevJobTitle, #prevStartDate1, #prevEndDate1,#exp_det_id').val("");
        });

		
		
		
		
		
		
        // Find and remove selected information
        $(".delete-row").click(function () {
            var delete_exp_array = [];

            $("table tbody").find('input[name="record"]').each(function (index) {

                if ($(this).is(":checked")) 
				{
						
					//alert($(this).val());
                    $('.preview-table-ex1 #info-remove' + $(this).parent().parent().attr('id')).remove();
                    $(this).parent().parent().remove();

                    //delete_exp_array.push($(this).parent().parent().attr('id'));
                    delete_exp_array.push($(this).val());

                }
            });      
            
             
			 $.ajax({
                url: "<?php echo base_url() ?>frontend/Vcard/deleteExperience",
                type: "POST",
                data: { exp_ids:delete_exp_array },                
                success: function (data)
                {
                   var json = JSON.parse(data);
					 if (json.status === 1) {
					 $(".frmerror_experiencedetails").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
					 return true;
					 } else {
					 $(".frmerror_experiencedetails").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
					 return false;
					 }
                }
            });

        });


        //	Code for Education tab where add row and delete functionality

        var cnt1 = 1;
        $(".preview-add-button2").click(function () 
		{
			$("#err_eduInstituteName").html('');
			$("#err_degree").html('');
			$("#err_eduStartDate").html('');
			$("#err_eduEndDate").html('');	
			
            var eduInstituteName = $("#eduInstituteName").val();
            var degree = $("#degree").val();
            var eduStartDate1 = $("#eduStartDate1").val();
            var eduEndDate1 = $("#eduEndDate1").val();     

			$.ajax({
                url: "<?php echo base_url() ?>frontend/Vcard/updateEducation",
                type: "POST",
                data: new FormData($("#frmEducationDetails")[0]),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data)
                {

                    var json = JSON.parse(data);
                    if (json.status === 1) 
					{
						$("#err_eduInstituteName").html('');
						$("#err_degree").html('');
						$("#err_eduStartDate").html('');
						$("#err_eduEndDate").html('');	
						
						/*var markup2 = "<tr id="+cnt1+"><td><input type='checkbox' name='record' value=" + json.ins_edu_id +" ></td><td>" + eduInstituteName + "</td><td>" + degree + "</td><td>" + eduStartDate1 + "</td><td>" + eduEndDate1 + "</td></tr>";
						$(".preview-table-ex2").append(markup2);
			
						var markup3 = "<div id='info-remove"+cnt1+"'><div class='content-company div-delete'><strong>Institute Name: </strong>" + eduInstituteName + "</div><div class='content-position div-delete'><strong>Degree or Certificate: </strong>" + degree + "</div><div class='start-date div-delete'><strong>Start Date: </strong>" + eduStartDate1 + "</div><div class='end-date div-delete'><strong>End Date: </strong>" + eduEndDate1 + "</div><hr></div>";
						$(".preview-table-ex3").append(markup3);
						*/
						
						   getEducationData();
						   getEducationDataMobile();
						  
                        $(".frmerror_educationdetails").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return true;
                    } else {
						$("#err_eduInstituteName").html('<div class="text-danger">' + json.msg.eduInstituteName + '</div>');
						$("#err_degree").html('<div class="text-danger">' + json.msg.degree + '</div>');
						$("#err_eduStartDate").html('<div class="text-danger">' + json.msg.eduStartDate + '</div>');
						$("#err_eduEndDate").html('<div class="text-danger">' + json.msg.eduEndDate + '</div>');
                        //$(".frmerror_educationdetails").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return false;
                    }
                }
            });
			
           
            cnt1++;
            $('#eduInstituteName, #degree, #eduStartDate1, #eduEndDate1, #edu_det_id').val("");
        });


        // Find and remove selected information
        $(".delete-row1").click(function () {
			var delete_edu_array = [];
            $("table tbody").find('input[name="record"]').each(function (index) {

                if ($(this).is(":checked")) {


                    $('.preview-table-ex3 #info-remove' + $(this).parent().parent().attr('id')).remove();
                    $(this).parent().parent().remove();
					delete_edu_array.push($(this).val());
                }
            });
			
			$.ajax({
                url: "<?php echo base_url() ?>frontend/Vcard/deleteEducation",
                type: "POST",
                data: { edu_ids:delete_edu_array },                
                success: function (data)
                {
                   var json = JSON.parse(data);
					 if (json.status === 1) {
					 $(".frmerror_educationdetails").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
					 return true;
					 } else {
					 $(".frmerror_educationdetails").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
					 return false;
					 }
                }
            });
			
        });


        // Start Save basic information ajax call	
        $('#basicInfoSubmit').on('click', function (e) {
			
    		$("#err_email").html('');
			$("#err_firstname").html('');
			$("#err_lastname").html('');
			$("#err_contact").html('');
			
            $.ajax({
                url: "<?php echo base_url() ?>frontend/Vcard/updateUserinfo",
                type: "POST",
                data: new FormData($("#basicInfo")[0]),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data)
                {
                    var json = JSON.parse(data);
                    if (json.status === 1) {
                        $("#err_email").html('');
                        $("#err_firstname").html('');
                        $("#err_lastname").html('');
                        $("#err_contact").html('');
						$(".frmerror").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return true;
                    } else {
                       // $("#err_email").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg.email + '</div>');
                        $("#err_email").html('<div class="text-danger">' + json.msg.email + '</div>');
                        $("#err_firstname").html('<div class="text-danger">' + json.msg.firstname + '</div>');
                        $("#err_lastname").html('<div class="text-danger">' + json.msg.lastname + '</div>');
                        $("#err_contact").html('<div class="text-danger">' + json.msg.contact + '</div>');
                        return false;
                    }
                }
            });

        });
        // End Save basic information ajax call

        // Start Save Professional information ajax call	
        $('#showAdd').on('click', function (e) {
			
			var elem = document.getElementById("addbtn");
			if (elem.value == " Add + ")
				elem.value = " Edit ";
		
			
			$("#err_companyname").html('');
            $("#err_jobtitle1").html('');
            $("#err_companyemail").html('');
            $("#err_companywebsite").html('');
						
            $.ajax({
                url: "<?php echo base_url() ?>frontend/Vcard/updateCompanyInfo",
                type: "POST",
                data: new FormData($("#basicInfo")[0]),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data)
                {
                    var json = JSON.parse(data);
                    if (json.status === 1) {
						$("#err_companyname").html('');
						$("#err_jobtitle1").html('');
						$("#err_companyemail").html('');
						$("#err_companywebsite").html('');
                        $(".frmerror_compinfo").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return true;
                    } else {
						$("#err_companyname").html('<div class="text-danger">' + json.msg.companyname + '</div>');
                        $("#err_jobtitle1").html('<div class="text-danger">' + json.msg.jobtitle1 + '</div>');
                        $("#err_companyemail").html('<div class="text-danger">' + json.msg.companyemail + '</div>');
                        $("#err_companywebsite").html('<div class="text-danger">' + json.msg.companywebsite + '</div>');
						
                        //$(".frmerror_compinfo").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return false;
                    }
                }
            });

        });
        // End Save Professional information ajax call

        // Start Social information ajax call		
        $('#socialInfoSubmit').on('click', function (e) {
			$("#err_facebook_url").html('');
			$("#err_twitter_url").html('');
			$("#err_googleplus_url").html('');
			$("#err_linkedin_url").html('');
			$("#err_youtube_url").html('');
			$("#err_pinterest_url").html('');
			$("#err_user_url").html('');
						
            $.ajax({
                url: "<?php echo base_url() ?>frontend/Vcard/updateSocialInfo",
                type: "POST",
                data: new FormData($("#frmSocialInfo")[0]),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data)
                {
                    var json = JSON.parse(data);
                    if (json.status === 1) {
						$("#err_facebook_url").html('');
						$("#err_twitter_url").html('');
						$("#err_googleplus_url").html('');
						$("#err_linkedin_url").html('');
						$("#err_youtube_url").html('');
						$("#err_pinterest_url").html('');
						$("#err_user_url").html('');	
                        $(".frmerror_socialinfo").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return true;
                    } else {
						$("#err_facebook_url").html('<div class="text-danger">' + json.msg.facebook_url + '</div>');
						$("#err_twitter_url").html('<div class="text-danger">' + json.msg.twitter_url + '</div>');
						$("#err_googleplus_url").html('<div class="text-danger">' + json.msg.googleplus_url + '</div>');
						$("#err_linkedin_url").html('<div class="text-danger">' + json.msg.linkedin_url + '</div>');
						$("#err_youtube_url").html('<div class="text-danger">' + json.msg.youtube_url + '</div>');
						$("#err_pinterest_url").html('<div class="text-danger">' + json.msg.pinterest_url + '</div>');
						$("#err_user_url").html('<div class="text-danger">' + json.msg.user_url + '</div>');
                        //$(".frmerror_socialinfo").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return false;
                    }
                }
            });

        });
        // End Social information ajax call


        // Start Short Bio ajax call [Ranjit, 09 May 2017]
        $('#shortBioSubmit').on('click', function (e) {		

            var shortbio_formdata = new FormData($("#frmshortBioInfo")[0]);

            var short_bio_data = CKEDITOR.instances.editor1.getData();

            shortbio_formdata.append('short_bio', short_bio_data);

            $.ajax({
                url: "<?php echo base_url() ?>frontend/Vcard/updateShortBio",
                type: "POST",
                data: shortbio_formdata,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data)
                {
                    var json = JSON.parse(data);
                    if (json.status === 1) {
						
                        $(".frmerror_shortbioinfo").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return true;
                    } else {
						$(".frmerror_shortbioinfo").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');                       
                        
                        return false;
                    }
                }
            });

        });
        // End Short Bio ajax call [Ranjit, 09 May 2017]





        // Start Skill ajax call		
        $('#ddddddddddddddddddddd').on('click', function () {

            $.ajax({
                url: "<?php echo base_url() ?>frontend/Vcard/saveSkillsAndExerptise",
                type: "POST",
                data: $("#frmskillsAndExerptise").serialize(),
                success: function (data)
                {
                    var json = JSON.parse(data);
                    if (json.status === 1) {
                        $(".frmerror_skillsandexpertise").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return true;
                    } else {
                        $(".frmerror_skillsandexpertise").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return false;
                    }
                }
            });
        });

        // End Skill ajax call





        // Start Experience ajax call		
        $('#add_experience').on('click', function () {

           /* $.ajax({
                url: "<?php echo base_url() ?>frontend/Vcard/saveExperience",
                type: "POST",
                data: $("#frmExperience").serialize(),
                success: function (data)
                {
                    var json = JSON.parse(data);
                    if (json.status === 1) {
                        $(".frmerror_experiencedetails").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return true;
                    } else {
                        $(".frmerror_experiencedetails").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return false;
                    }
                }
            }); */
        });

        // End Experience ajax call






// Start Education ajax call		
        $('#educationSubmit').on('click', function (e) {
           /* $.ajax({
                url: "<?php echo base_url() ?>frontend/Vcard/saveEducation",
                type: "POST",
                data: new FormData($("#frmEducationDetails")[0]),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data)
                {

                    var json = JSON.parse(data);
                    if (json.status === 1) {
                        $(".frmerror_educationdetails").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return true;
                    } else {
                        $(".frmerror_educationdetails").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return false;
                    }
                }
            }); */

        });
        // End Education ajax call




		//	Code for Education tab where add row and delete functionality
		
		//var cnt2=1;
		 $("#addpricingdetails").click(function() {
			 
			$("#err_pricingtitle").html('');
			$("#err_pricingdescription").html(''); 
			 
            var pricingdescription = $("#pricingdescription").val();
            var pricingprice = $("#pricingprice").val();
            var pricingtitle = $("#pricingtitle").val();
			
			
				$.ajax({
                url: "<?php echo base_url() ?>frontend/Vcard/savePricePlan",
                type: "POST",
                data: new FormData($("#frmPricingPlan")[0]),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data)
                {

                    var json = JSON.parse(data);
                    if (json.status === 1) 
					{
						//getPriceData();
						
						$("#err_pricingtitle").html('');
						$("#err_pricingdescription").html('');
						
						var markup4 = "<tr class='panel-price-plan-"+json.ins_price_id+"' ><td> "  +  pricingtitle + " </td><td>" + pricingdescription + "</td><td>" + pricingprice + "</td></tr>";
						$(".preview-table-ex4").append(markup4);
						
						var markup5 = "<div class='panel panel-success panel-price-plan-"+json.ins_price_id+" '><div class='panel-heading'><h3 class='panel-title'>" + pricingtitle + "</h3><div class='pull-right'><span id='deletepanel' class='badge editbutton' title='Delete' onclick='deletePrice("+ json.ins_price_id +");' ><i class='fa fa-trash'></i></span><span class='pull-right clickable'><i class='glyphicon glyphicon-chevron-up'></i></span></div></div><div class='panel-body'><div class='panel-body-content'>" + pricingdescription + "</div><div class='footer1'>"+ pricingprice +"</div></div></div>";
						$(".preview-table-ex5").append(markup5);
						
						var markup6 = "<div class='panel panel-success panel-price-plan-"+json.ins_price_id+" '><div class='panel-heading'><h3 class='panel-title'>" + pricingtitle + "</h3><span class='pull-right clickable'><i class='glyphicon glyphicon-chevron-up'></i></span></div><div class='panel-body'><div class='panel-body-content'>" + pricingdescription + "</div><div class='footer1'>"+ pricingprice +"</div></div></div>";
						$(".preview-table-ex6").append(markup6);
						
					
						$('#pricingdescription, #pricingprice, #pricingtitle,#pricing_id1').val("");
			
                        $(".frmerror_price_plane").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return true;
                    } else {
						$("#err_pricingtitle").html('<div class="text-danger">' + json.msg.pricingtitle + '</div>');
						$("#err_pricingdescription").html('<div class="text-danger">' + json.msg.pricingdescription + '</div>');
						
                        //$(".frmerror_price_plane").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return false;
                    }
                }
            });
			
			
			
            
        });
		
		
		
		 $('#addpricingimage').click(function(){
			  $.ajax({
                url: "<?php echo base_url() ?>frontend/Vcard/savePricePlanImage",
                type: "POST",
                data: new FormData($("#example-1")[0]),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data)
                {                
								
					var json = JSON.parse(data);
					if(json.img_upload_flag === 1)
					{
						//getPriceData();
						$('#file,#pricing_id,#updatefile').val(""); 
						for (var i = 0; i < json.image.length; i++)
						{
							var obj = json.image[i];
							var pricemarkup5='<div class="panel panel-success panel-price-plan-'+ obj.ins_price_id +'" ><div class="panel-heading"><h3 class="panel-title"></h3><div class="pull-right"><span id="deletepanel" class="badge editbutton" onclick="deletePrice('+ obj.ins_price_id +')" title="Delete"><i class="fa fa-trash"></i></span><span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span></div></div><div class="panel-body"><div class="panel-body-content"><img src="'+obj.user_img+'" class="img-responsive"/> </div><div class="footer1"></div></div></div>';
							$(".preview-table-ex5").append(pricemarkup5);
							$(".preview-table-ex6").append(pricemarkup5);
							
						}
						
						if (json.status === 1) 
						{
						    $(".frmerror_priceplanupload").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
							return true;
						} else {
							$(".frmerror_priceplanupload").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
							return false;
						}
					}                   
                }
            });
			 
		 });
		
		//   Pricing plan functionality
		
		
		// start add list
		var srlist=0;
		 $("#btnlistadd").click(function() 
		 {
           
			var listname = $("#listname").val();
			$("#err_listname").html('');
			$.ajax({
                url: "<?php echo base_url() ?>frontend/Vcard/saveList",
                type: "POST",
                data: new FormData($("#frmlist")[0]),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data)
                {
					srlist = srlist + 1;
                    var json = JSON.parse(data);
                    if (json.status === 1) {
						
						
						$("#err_listname").html('');
						
						var markup2 = "<tr><td> " + cnt + "</td><td>" + listname +  "</td></tr>";
						$(".list-preview-table-ex4").append(markup2);
						
						var markup3 = "<li> " + listname  + " </li>";
						$(".list-preview-table-ex5").append(markup3);
						
						//var markup4 = "<tr><td> " + cnt + "</td><td>" + listname +  "</td></tr>";
						$(".list-preview-table-ex6").append(markup3);
						
						//getListData();
						
						//getMainListData();
						
						//getListDataMobile();
						
						
						
						$('#listname, #list_id').val(""); 	
						
						$(".frmerror_list").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return true;
                    } else {
						$("#err_listname").html('<div class="text-danger">' + json.msg.listname + '</div>');
                        //$(".frmerror_list").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return false;
                    }
                }
            });	


			
			
            
        });
		
		// end add list
		
		
		
		
		// start add link
		var cntlink=1;
		 $("#btnAddLink").click(function() {           
          
			var linkname = $("#addlink").val();
		  
			$.ajax({
                url: "<?php echo base_url() ?>frontend/Vcard/saveLink",
                type: "POST",
                data: new FormData($("#frmaddlink")[0]),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data)
                {

                    var json = JSON.parse(data);
                    if (json.status === 1) 
					{		
				
						//getLinkData();					
						
						var markup1 = "<tr><td> 1 </td><td>"+ linkname +"</td></tr>";
						var markup3 = "<div class='linking'><a href=''>"+ linkname +"<span class='pull-right'><i class='fa fa-external-link' aria-hidden='true'></i></span></a></div>";
						$(".link-preview").append(markup1);
						$(".link-preview-ex5").append(markup3);
						$(".link-preview-ex6").append(markup3);
						
						
						
						
				
						$('#addlink,#addlink_id').val(""); 
                        $(".frmerror_addlink").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return true;
                    } else {
                        $("#err_addlink").html('<div class="text-danger">' + json.msg + '</div>');
                        //$(".frmerror_addlink").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return false;
                    }
                }
				
				
            });	

				
		   
			
            
        });		
		// end add list
		
		// start add video url
		 $("#btnvideourl").click(function() { 
		
			$('#err_videourl').html('');
		
			var videourl = $("#videourl").val();	
			var video_description = $("#video_description").val();	
         
     		$.ajax({
                url: "<?php echo base_url() ?>frontend/Vcard/saveVideoUrl",
                type: "POST",
                data: new FormData($("#frmvideourl")[0]),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data)
                {

                    var json = JSON.parse(data);
                    if (json.status === 1) 
					{	
				
						//getVideoData();
						$('#err_videourl').html('');
						
						var videomarkup4 = "<tr><td>1</td><td>" + videourl + "</td>";
						$(".video-preview").append(videomarkup4);
						
						var videomarkup5 = '<div class="panel-body-content text-center"><div class="embed-responsive embed-responsive-4by3"><iframe class="embed-responsive-item" src="'+ videourl +'"></iframe></div><hr><div>'+ video_description +'</div></div>';
						$(".video-preview5").append(videomarkup5);					
						
						$(".video-preview6").append(videomarkup5); 
						
						$('#videourl,#video_description,#videourl_id').val(""); 
                        $(".frmerror_videourl").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return true;
                    } else {
						$('#err_videourl').html('<div class="text-danger">' + json.msg.videourl +'</div>');
                       // $(".frmerror_videourl").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                        return false;
                    }
                }
            });	  

			
				
        });		
		// End add video url
		
		// start add portfolio
		 $("#btnaddportfolio").click(function() {
	
			$("#err_port_video").html('');
			var videourl_portfolio = $("#videourl_portfolio").val();	
			var file2 = $("#file-2").val();	
		 
     		$.ajax({
                url: "<?php echo base_url() ?>frontend/Vcard/savePortfolio",
                type: "POST",
                data: new FormData($("#example-2")[0]),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data)
                {
                    var json = JSON.parse(data);
					if(json.img_upload_flag === 1)
					{
						for (var i = 0; i < json.image.length; i++)
						{
							var obj = json.image[i];
							
							var portmarkup4 = "<tr><td>" + obj.user_img + "</td><td></td>";
							$(".portfolio-preview").append(portmarkup4);
							
							var portmarkup5 = '<div class="panel-body-content text-center">';
							portmarkup5 += '<img src="'+ obj.user_img +'" class="img-responsive"/>';
						    portmarkup5 += '<hr>';
							portmarkup5 += '</div>';
							
														
							$(".portfolio-preview5").append(portmarkup5);
							$(".portfolio-preview6").append(portmarkup5);
						}
						$('#videourl_portfolio,#file-2').val("");
						if (json.status === 1) 
						{
							$(".frmerror_portfolio").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
							return true;
						}
						else
						{
							 $(".frmerror_portfolio").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
							return false;
						}
					}
					
                    if (json.img_upload_flag === 2) 
					{
							
						if (json.status === 1) 
						{
							$("#err_port_video").html('');
							
							var portmarkup4 = "<tr><td></td><td>" + videourl_portfolio + "</td>";
							$(".portfolio-preview").append(portmarkup4);
							
							
							var portmarkup5 = '<div class="panel-body-content text-center">'
							 if(videourl_portfolio !== '')
							 {
								portmarkup5 += '<div class="embed-responsive embed-responsive-4by3"><iframe class="embed-responsive-item" src="'+ videourl_portfolio +'"></iframe></div>';
							 }
							portmarkup5 += '</div>';						 
							$(".portfolio-preview5").append(portmarkup5);
							$(".portfolio-preview6").append(portmarkup5);
							
							
							$(".frmerror_portfolio").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
							return true;
						}
						else
						{
							 $("#err_port_video").html('<div class="text-danger">' + json.msg.videourl_portfolio + '</div>');
							 //$(".frmerror_portfolio").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
							return false;
						}	
						
                    }
                }
            });	

				
        });		
		// End add portfolio
		
		
		// adding description of pricing plans
		$("input[name$='priceimage']").click(function() {
			var test = $(this).val();
			$(".priceplanimage").hide();
			$("#" + test).show();
		});
		
		//  Pricing Plan Functionality Ends here
		
		//  Start Portfolio Functionality
		
		$("input[name$='portfolioDiv']").click(function() {
			var test1 = $(this).val();
			$(".portfolioContent").hide();
			$("#" + test1).show();
		});




    });

	
	
	
	
	
	// Panel open close
	$(document).on('click', '.panel-heading span.clickable', function(e){
		var $this = $(this);
		if(!$this.hasClass('panel-collapsed')) {
			$this.closest('.panel').find('.panel-body').slideUp();
			$this.addClass('panel-collapsed');
			$this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
		} else {
			$this.closest('.panel').find('.panel-body').slideDown();
			$this.removeClass('panel-collapsed');
			$this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
		}
	})
	
	//End Panel
	
	//File Upload 
	
	$(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        }, 
         function () {
           $('.image-preview').popover('hide');
        }
    );    
});

$(document).on('click', '.browse', function(){
  var file = $(this).parent().parent().parent().find('.file');
  file.trigger('click');
});
$(document).on('change', '.file', function(){
  $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});


    //$('.remove-div').hide();

    // PICK THE VALUES FROM EACH TEXTBOX WHEN "SUBMIT" BUTTON IS CLICKED.
	function getSkillsData()
	{
		$.ajax({
            url: "<?php echo base_url() ?>frontend/Vcard/getSkillsAndExerptise",
			type: "POST",
            data: new FormData($("#frmskillsAndExerptise")[0]),
            contentType: false,
            cache: false,
            processData: false,			        
            success: function (data)
            {		
				$('.skill-text-add').hide();	
                $('#updatedSkillData').html('');
                $('#updatedSkillData').html(data);
				
            }
        });
		
	}
	function getblockSkillData()
	{
		$.ajax({
            url: "<?php echo base_url() ?>frontend/Vcard/getSkillsAndExerptDetail",
			type: "POST",
            data: new FormData($("#frmskillsAndExerptise")[0]),
            contentType: false,
            cache: false,
            processData: false,			        
            success: function (data)
            {					
                $('#blockSkillData').html('');
                $('#blockSkillDataMobile').html('');
                $('#blockSkillData').html(data);
                $('#blockSkillDataMobile').html(data);
				
            }
        });
		
	}
	
	function getExperienceData()
	{
		$.ajax({
            url: "<?php echo base_url() ?>frontend/Vcard/getExperienceData",
			type: "POST",
            data: {},
            contentType: false,
            cache: false,
            processData: false,			        
            success: function (data)
            {					
               $(".preview-table-ex").html(''); 					 
               $(".preview-table-ex").html(data); 					 
				
            }
        });
	}
	
	function getExperienceDataMobile()
	{
		$.ajax({
            url: "<?php echo base_url() ?>frontend/Vcard/getExperienceDataMobile",
			type: "POST",
            data: {},
            contentType: false,
            cache: false,
            processData: false,			        
            success: function (data)
            {					
               $(".preview-table-ex1").html(''); 					 
               $(".preview-table-ex1").html(data);					 
				
            }
        });
		
	}
	
	function getEducationData()
	{
		$.ajax({
            url: "<?php echo base_url() ?>frontend/Vcard/getEducationData",
			type: "POST",
            data: {},
            contentType: false,
            cache: false,
            processData: false,			        
            success: function (data)
            {					
               $(".preview-table-ex2").html(''); 					 
               $(".preview-table-ex2").html(data); 					 
				
            }
        });
	}
	
	function getEducationDataMobile()
	{
		$.ajax({
            url: "<?php echo base_url() ?>frontend/Vcard/getEducationDataMobile",
			type: "POST",
            data: {},
            contentType: false,
            cache: false,
            processData: false,			        
            success: function (data)
            {					
               $(".preview-table-ex3").html(''); 					 
               $(".preview-table-ex3").html(data);					 
				
            }
        });
		
	}
	
	function getListData()
	{
		$.ajax({
            url: "<?php echo base_url() ?>frontend/Vcard/getListData",
			type: "POST",
            data: {},
            contentType: false,
            cache: false,
            processData: false,			        
            success: function (data)
            {		
			
               $(".list-preview-table-ex4").html(''); 					 
               $(".list-preview-table-ex4").html(data); 					 
				
            }
        });
	}
	
	function getMainListData()
	{
		$.ajax({
            url: "<?php echo base_url() ?>frontend/Vcard/getMainListData",
			type: "POST",
            data: {},
            contentType: false,
            cache: false,
            processData: false,			        
            success: function (data)
            {					
               $(".list-preview-table-ex5").html(''); 					 
               $(".list-preview-table-ex5").html(data); 					 
				
            }
        });
		
	}
	function getListDataMobile()
	{
		$.ajax({
            url: "<?php echo base_url() ?>frontend/Vcard/getListDataMobile",
			type: "POST",
            data: {},
            contentType: false,
            cache: false,
            processData: false,			        
            success: function (data)
            {					
               $(".list-preview-table-ex6").html(''); 					 
               $(".list-preview-table-ex6").html(data); 					 
				
            }
        });
	}
	function getLinkData()
	{
		$.ajax({
            url: "<?php echo base_url() ?>frontend/Vcard/getLinkData",
			type: "POST",
            data: {},
            contentType: false,
            cache: false,
            processData: false,			        
            success: function (data)
            {		
				 var json = JSON.parse(data);					
				 $(".link-preview").html('');	
				 $(".link-preview").html(json.table);	
				 $(".link-preview-ex5").html('');	
				 $(".link-preview-ex5").html(json.main_table);	
				 $(".link-preview-ex6").html('');	
				 $(".link-preview-ex6").html(json.moblie_table);	
              
				
            }
        });
	}
	function getVideoData()
	{
		$.ajax({
            url: "<?php echo base_url() ?>frontend/Vcard/getVideoData",
			type: "POST",
            data: {},
            contentType: false,
            cache: false,
            processData: false,			        
            success: function (data)
            {		
				 var json = JSON.parse(data);					
				 $(".video-preview").html('');	
				 $(".video-preview").html(json.table);	
				 $(".video-preview5").html('');	
				 $(".video-preview5").html(json.main_table);	
				 $(".video-preview6").html('');	
				 $(".video-preview6").html(json.moblie_table);	
              
				
            }
        });
	}
	function getPriceData()
	{
		$.ajax({
            url: "<?php echo base_url() ?>frontend/Vcard/getPriceData",
			type: "POST",
            data: {},
            contentType: false,
            cache: false,
            processData: false,			        
            success: function (data)
            {		
				// var json = JSON.parse(data);					
				 $(".preview-table-ex5").html('');	
				 $(".preview-table-ex5").html(data);	
				
				$(".preview-table-ex6").html('');	
				 $(".preview-table-ex6").html(data);
				
            }
        });
	}
    var divValue, values,values_update,values_update_id,skill_list_update,skill_list_update_id,skill_list = '';	
    function GetTextValue() {
		
        $(divValue)
                .empty()
                .remove();

        values = '';
        values_update = '';
        values_update_id = '';
       
        skill_list = '';
        skill_list_update = '';
        skill_list_update_id = '';

        $('.input').each(function () {
            divValue = $(document.createElement('div')).css({
                padding: '5px'
            });
            values += this.value + '<br />'

            //Added by Ranjit Start
            if (skill_list != '') {
                skill_list += ','
            }
            skill_list += this.value
            //Added by Ranjit End

        });
		
		$('.input_update').each(function () {
            divValue = $(document.createElement('div')).css({
                padding: '5px'
            });
            values_update += this.value + '<br />'
            values_update_id += this.id + '<br />'
		    if (skill_list_update != '') {
                skill_list_update += ','
            }
			if (skill_list_update_id != '') {
                skill_list_update_id += ','
            }
            skill_list_update += values_update
            skill_list_update_id += values_update_id
			
 
        });
 



// Start Skills and Expertise ajax call		



/*        var dataString ='skill_list=' + skill_list;
        $.ajax({
            url: "<?php echo base_url() ?>frontend/Vcard/saveSkillsAndExerptise",
            type: "GET",
            data: dataString,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data)
            {

                var json = JSON.parse(data);
                if (json.status === 1) {
                    $(".frmerror_skillsandexpertise").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                    return true;
                } else {
                    $(".frmerror_skillsandexpertise").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                    return false;
                }
            }
        });
*/
        // End Skills and Expertise ajax call

		    $.ajax({
            url: "<?php echo base_url() ?>frontend/Vcard/saveSkillsAndExerptise1",
			type: "POST",
            data: new FormData($("#frmskillsAndExerptise")[0]),
            contentType: false,
            cache: false,
            processData: false,			        
            success: function (data)
            {
				var json = JSON.parse(data);
                if (json.status === 1) {
					
					getSkillsData();
					getblockSkillData();
                    $(".frmerror_skillsandexpertise").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                    return true;
                } else {
                    $(".frmerror_skillsandexpertise").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                    return false;
                }
               
            }
        });

		


//        $('.content-append').empty();
//        $(divValue).append('<p><b>Skills you have added: </b></p>' + values);
        $(divValue).append(values);
        $('.content-append').append(divValue);

    }
	

	
	
	// Start update Experience
	function getExpDetailUpdate(id,name,title,sdate,edate)
	{
		$('#exp_det_id').val(id);
		$('#prevCompanyName').val(name);
		$('#prevJobTitle').val(title);
		$('#prevStartDate1').val(sdate);
		$('#prevEndDate1').val(edate);
	}
	// End update Experience
	// Start update Experience
	function getEduDetailUpdate(id,name,degree,sdate,edate)
	{
		$('#edu_det_id').val(id);
		$('#eduInstituteName').val(name);
		$('#degree').val(degree);
		$('#eduStartDate1').val(sdate);
		$('#eduEndDate1').val(edate);
	}
	// End update Experience
	// start update for list
	function openList(id,name)
	{
		
		$('#list_id').val(id);
		$('#listname').val(name);
		$('#lists').modal('show');
		var markup4 = "<tr><td>1</td><td>" + name + "</td>";
		$(".list-preview-table-ex4").append(markup4);
	}
	// end update for list
	function openLink(id,name)
	{
		$('#addlink_id').val(id);
		$('#addlink').val(name);
		$('#links').modal('show');
		 var linkmarkup4 = "<tr><td>1</td><td>" + name + "</td>";
						$(".link-preview").append(linkmarkup4);
		
	}
	// end update for link
	function openvideo(id,name,desc)
	{
		$('#videourl_id').val(id);
		$('#videourl').val(name);
		$('#video_description').val(desc);
		$('#Video1').modal('show');
		
		var videomarkup4 = "<tr><td>1</td><td>" + name + "</td>";
						$(".video-preview").append(videomarkup4);
		
	}
	// open pricing
	function openPrice(id,title,descr,price)
	{		
		$("#radio2").attr('checked',true).trigger("click");
		$('#pricing_id1').val(id);
		$('#pricingtitle').val(title);
		$('#pricingdescription').val(descr);	
		$('#pricingprice').val(price);	
		$('#pricing').modal('show');
	}
	function openPriceImage(id,imag)
	{
		$("#radio1").attr('checked',true).trigger("click");
		$('#pricing_id').val(id);
		$('#pricing').modal('show');
		$("#selImgPrice").attr("src",'<?php echo base_url(); ?>'+imag);
		$("#price_image_update").css('display','block');
		$("#dropzone-0").css('display','none');
		
	}
	function openPortfolioVideo(id,video)
	{		
		$("#radio4").attr('checked',true).trigger("click");
		$('#videourl_portfolio_id').val(id);
		$('#videourl_portfolio').val(video);
		$('#portfolio').modal('show');
		
	}
	function openPortfolioImage(id,image)
	{
		$("#radio3").attr('checked',true).trigger("click");
		$('#videourl_portfolio_id').val(id);
		
		$("#portfolioImg").attr("src",'<?php echo base_url(); ?>'+image);
		
		$('#portfolio').modal('show');
		$("#dropzone").css('display','none');
		$("#portfolio_image_update").css('display','block');
		
	}
	function deletePrice(id)
	{
		$.ajax({
                url: "<?php echo base_url() ?>frontend/Vcard/deletePrice",
                type: "POST",
                data: { price_id:id },                
                success: function (data)
                {
                   var json = JSON.parse(data);
					 if (json.status === 1) 
					 {
						$('.panel-price-plan-'+id).remove();	
						$(".err_priceplandetail").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
						return true;
					 } else {
					 $(".err_priceplandetail").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
					 return false;
					 }
                }
            });
		
	}
	
	</script>



										<!-- Modal -->
                                            <div id="pricing" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                &times;
                                                            </button>
                                                            <h4 class="modal-title"> Add Pricing Plan Details </h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            
															 <div class="radio radio-primary col-md-4">
																
																<input type="radio" name="priceimage" id="radio1" value="imagediv" checked="checked" >
																<label for="radio1">
																	Upload Image
																</label>
															</div>
															<div class="radio radio-primary col-md-5">
																<input type="radio" name="priceimage" id="radio2" value="descprining">
																<label for="radio2">
																	Add Pricing plan desciption
																</label>
															</div>
															
															<div class="clear"></div>
															
															    <div id="imagediv" class="priceplanimage" style="display: block;">
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
																			<div class="frmerror_priceplanupload" ></div>
																			
																			
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
																	<button type="button" id="addpricingimage" class="btn btn-danger width150">Add                                                 
																	</button>
																	</div>
																</div>
														<div id="descprining" class="priceplanimage" style="display: none;">
																
														<form id="frmPricingPlan">	
															<div class="frmerror_price_plane" ></div>
															<div class="form-group">
                                                                <label for="jobTitle">Pricing Plan Title
                                                                    <small>(required)</small>
                                                                </label>
                                                               <input type="hidden" name="pricing_id1" id="pricing_id1" >
																<input id="pricingtitle" name="pricingtitle"
                                                                       type="text"
                                                                       class="form-control"
                                                                       placeholder="">
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
                                                                <label for="companyContact">Price
                                                                </label>
                                                                <input id="pricingprice" name="pricingprice"
                                                                       type="text"
                                                                       class="form-control"
                                                                       placeholder=""
                                                                       value="" maxlength="17">
                                                            </div>
															
															<div class="form-group text-center">
															<button type="button" id="addpricingdetails" class="btn btn-danger width150">Add                                                 
															</button>
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
                                                            <!--<button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal" id="showAdd">Save
                                                            </button>-->
                                                            <button type="button" class="btn btn-danger btn-o"
                                                                    data-dismiss="modal">
                                                                Close
                                                            </button>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
											
											
											<!-- Modal -->
                                            <div id="portfolio" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                &times;
                                                            </button>
                                                            <h4 class="modal-title"> Portfolio </h4>
                                                        </div>
                                                        <div class="modal-body">
															<form id="example-2" method="POST" enctype="multipart/form-data"  >
															
															<input type="hidden" name="videourl_portfolio_id" id="videourl_portfolio_id" />
															<div class="frmerror_portfolio" ></div>
															<div class="radio radio-primary col-md-4">
																<input type="radio" name="portfolioDiv" id="radio3" value="imagediv1" checked="checked">
																<label for="radio3">
																	Upload Image
																</label>
															</div>
															<div class="radio radio-primary col-md-5">
																<input type="radio" name="portfolioDiv" id="radio4" value="descprining1">
																<label for="radio4">
																	Add a video
																</label>
															</div>
															
															<div class="clear"></div>
																	
															
															 <div id="imagediv1" class="portfolioContent page" style="display: block;" >
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
                                                                <input id="videourl_portfolio" name="videourl_portfolio"
                                                                       type="text"
                                                                       class="form-control" required
                                                                       placeholder="www.google.com">
																<span id="err_port_video" ></span>	   
																</div>															
															</div>
                                                            
															
			
                                                           
															<div class="form-group text-center">
															<button type="button" id="btnaddportfolio" class="btn btn-danger width150">Add                                                 
															</button>
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
                                                            <!--<button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal" id="showAdd">Save
                                                            </button> -->
                                                            <button type="button" class="btn btn-danger btn-o"
                                                                    data-dismiss="modal">
                                                                Close
                                                            </button>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
											
											<!-- Modal -->
                                            <div id="lists" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                &times;
                                                            </button>
                                                            <h4 class="modal-title"> List </h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            
															<form id="frmlist" >
															<div class="frmerror_list" ></div>
                                                            <div class="form-group">
                                                                <label for="jobTitle">List Name
                                                                    <small>(required)</small>
                                                                </label>
																<input id="list_id" name="list_id"
                                                                       type="hidden" >
                                                                <input id="listname" name="listname"
                                                                       type="text"
                                                                       class="form-control"
                                                                       placeholder="">
																<span id="err_listname" ></span>	   
                                                            </div>
															
															<div class="form-group text-center">
															<button type="button" id="btnlistadd" class="btn btn-danger width150">Add                                                 
															</button>
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
                                                           
                                                            <button type="button" class="btn btn-danger btn-o"
                                                                    data-dismiss="modal">
                                                                Close
                                                            </button>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
											
											<!-- Modal -->
                                            <div id="links" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                &times;
                                                            </button>
                                                            <h4 class="modal-title"> Links </h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            
															<form id="frmaddlink">
																
																<div class="frmerror_addlink"></div>
																<div class="form-group">
																	<label for="jobTitle">Add Your Links
																		<small>(required)</small>
																	</label>
																	<input id="addlink_id" name="addlink_id" type="hidden" >
																	<input id="addlink" name="addlink"
																		   type="text"
																		   class="form-control"
																		   placeholder="">
																		 <span id="err_addlink" ></span>  
																</div>
															
																<div class="form-group text-center">
																<button type="button" id="btnAddLink" class="btn btn-danger width150">Add                                                 
																</button>
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
                                                            <!--<button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal" id="showAdd">Save
                                                            </button>-->
                                                            <button type="button" class="btn btn-danger btn-o"
                                                                    data-dismiss="modal">
                                                                Close
                                                            </button>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
											
											
											<!-- Modal -->
                                            <div id="Video1" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                &times;
                                                            </button>
                                                            <h4 class="modal-title"> Video </h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            
															
														<form id="frmvideourl" >
															<div class="frmerror_videourl" ></div>
                                                            <div class="form-group">
                                                                <label for="jobTitle">Video URL
                                                                    <small>(required)</small>
                                                                </label>
																 <input id="videourl_id" name="videourl_id"
                                                                       type="hidden"    >
                                                                <input id="videourl" name="videourl"
                                                                       type="text"
                                                                       class="form-control"
                                                                       placeholder="">
																<span id="err_videourl" ></span>	   
                                                            </div>
															<div class="form-group">
                                                                <label for="jobTitle">Video Description
                                                                   
                                                                </label>
                                                                <textarea id="video_description" name="video_description"
                                                                       type="text"
                                                                       class="form-control"
                                                                       placeholder=""></textarea>
                                                            </div>
															
															<div class="form-group text-center">
															<button type="button" id="btnvideourl" class="btn btn-danger width150">Add                                                 
															</button>
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
                                                           <!-- <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal" id="showAdd">Save
                                                            </button> -->
                                                            <button type="button" class="btn btn-danger btn-o"
                                                                    data-dismiss="modal">
                                                                Close
                                                            </button>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
