<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">

                <!-- /span6 -->
                <div id="Step_Wizard_Form" class="span12">

                    <!-- /widget -->

                    <!-- /widget -->

                    <!-- /widget --> 


                    <div id="Wizard_form_steps" class="container">
                        <div class="row form-group">
                            <div class="span12">
                            <h2 style="text-align:center;margin-bottom:10px">Complete your vCard steps</h2>
                                <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                                    <li class="active"><a href="#step-1">
                                            <h4 class="list-group-item-heading">Step 1</h4>

                                        </a></li>
                                    <li class="disabled"><a href="#step-2">
                                            <h4 class="list-group-item-heading">Step 2</h4>

                                        </a></li>
                                    <li class="disabled"><a href="#step-3">
                                            <h4 class="list-group-item-heading">Step 3</h4>

                                        </a></li>
                                    <li class="disabled"><a href="#step-4">
                                            <h4 class="list-group-item-heading">Step 4</h4>

                                        </a></li>
                                    <li class="disabled"><a href="#step-5">
                                            <h4 class="list-group-item-heading">Step 5</h4>

                                        </a></li> 
                                    <li class="disabled"><a href="#step-6">
                                            <h4 class="list-group-item-heading">Step 6</h4>

                                        </a></li> 
                                    <li class="disabled"><a href="#step-7">
                                            <h4 class="list-group-item-heading">Step 7</h4>

                                        </a></li> 
                                    <li class="disabled"><a href="#step-8">
                                            <h4 class="list-group-item-heading">Step 8</h4>

                                        </a></li> 
                                   

                                </ul>
                            </div>
                        </div>
                    </div>	
                    <?php $data = $this->session->userdata(); ?>
                    <div class="container">

                        <div class="row setup-content" id="step-1">
                            <div class="span12">
                                <div class="well text-center">
                                    <h1> STEP 1</h1><br>

                                    <!-- <form> -->               

                                    <div class="">
                                        <div class="row clearfix">
                                            <div class="span11 column">
                                                <div class="tab-pane" id="formcontrols">
                                                    <div class="frmerror"></div>
                                                    <form id="frmstep-1" name="step-1" class="form-horizontal">
                                                        <fieldset>

                                                            <div class="control-group">											
                                                                <label class="control-label" for="firstname">First Name<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input  maxlength="100" name="first_name" id="first_name" required type="text"  value="<?php echo $user_data[0]['first_name']; ?>" class="span6" placeholder="Enter First Name"  />
                                                                    <input type="hidden" value="<?php echo $user_data[0]['id']; ?>" name="id">
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->


                                                            <div class="control-group">											
                                                                <label class="control-label" for="lastname">Last Name<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input maxlength="100" name="last_name" id="last_name" type="text"  value="<?php echo $user_data[0]['last_name']; ?>" class="span6" placeholder="Enter Last Name" />
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">											
                                                                <label class="control-label" for="lastname">Mobile<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input required="required" name="mobile" id="mobile" class="span6"  value="<?php echo $user_data[0]['mobile']; ?>" placeholder="Enter your mobile number" />
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->


                                                            <div class="control-group">											
                                                                <label class="control-label" for="email">Email Address<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input required="required" name="email" readonly id="email" class="span6"  value="<?php echo $user_data[0]['email']; ?>" placeholder="Enter your email id" />
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">											
                                                                <label class="control-label" for="email">User Image<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input required="required" name="user_image" type="file" class="span6"  /><br>
                                                                    <?php if ($user_data[0]['user_image'] != '') { ?><img src="<?php echo $user_data[0]['user_image']; ?>" width="200px"><?php } ?>
                                                                    <input type="hidden" name="user_image_old" value="<?php echo $user_data[0]['user_image']; ?>">
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">											
                                                                <label class="control-label" for="email">Company Logo<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input required="required" name="company_logo" type="file" class="span6"  /><br>
                                                                    <?php if ($user_data[0]['company_logo'] != '') { ?><img src="<?php echo $user_data[0]['company_logo']; ?>" width="250px"><?php } ?>
                                                                    <input type="hidden" name="company_logo_old" value="<?php echo $user_data[0]['company_logo']; ?>">
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->

                                                            <div class="control-group">											
                                                                <label class="control-label" for="email">Tab color<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type='hidden' style="width:25px" value="<?php echo $user_data[0]['theme_color']; ?>" size='10' id="theme_color" name='theme_color'>
                                                                    <div id="colorSelector"><div style="background-color: <?php echo $user_data[0]['theme_color']; ?>"></div></div>
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <br />


                                                            <!-- /form-actions -->
                                                        </fieldset>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- </form> -->
                                    <div class="Btn_center">

                                        <input id="activate-step-2" class="btn btn-primary btn-md" type="submit" value="Save and Continue">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="container">

                        <div class="row setup-content" id="step-2">
                            <div class="">
                                <div class="span12 well text-center">
                                    <h1 class="text-center"> Work Information</h1>
                                    <div class="">
                                        <div class="row clearfix">
                                            <div class="span11 column">
                                                <div class="tab-pane" id="formcontrols">
                                                    <div class="frmerror2"></div>
                                                    <form id="frmstep-2" class="form-horizontal">
                                                        <fieldset>
                                                            <div class="control-group">											
                                                                <label class="control-label" for="firstname">Company Name<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="hidden" value="<?php echo $user_data[0]['id']; ?>" name="id">
                                                                    <input type="text" id="company_name" value="<?php echo $user_data[0]['company_name']; ?>" name="company_name" class="form-control span6" placeholder="Enter Company Name" />
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">											
                                                                <label class="control-label">Job Title<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input id="job_title" name="job_title" value="<?php echo $user_data[0]['job_title']; ?>" type="text" required="required" class="span6 form-control" placeholder="Enter Job title"  />
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">											
                                                                <label class="control-label">Phone<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input id="company_phone" name="company_phone" value="<?php echo $user_data[0]['work_phone']; ?>" type="text" required="required" class="span6 form-control" placeholder="Enter Work Phone"  />
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">											
                                                                <label class="control-label">Website<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input id="company_website" name="company_website" value="<?php echo $user_data[0]['work_website']; ?>" type="text" required="required" class="span6 form-control" placeholder="Enter work website"  />
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">											
                                                                <label class="control-label">Address</label>
                                                                <div class="controls">
                                                                    <textarea id="work_address" name="work_address" type="text" required="required" class="span6 form-control" placeholder="Enter work address" ><?php echo $user_data[0]['work_address']; ?></textarea>
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">											
                                                                <label class="control-label" for="firstname">Country/Region</label>
                                                                <div class="controls">
                                                                    <select class="span6 " name="work_country" onchange="selectState1(this.options[this.selectedIndex].value)">
                                                                        <option value="-1">Select country</option>
                                                                        <?php
                                                                        foreach ($country as $listElement) {
                                                                            if ($user_data[0]['work_country'] == $listElement->id) {
                                                                                $selected = 'selected';
                                                                            } else {
                                                                                $selected = '';
                                                                            }
                                                                            ?>
                                                                            <option <?php echo $selected; ?> value="<?php echo $listElement->id ?>"><?php echo $listElement->name ?></option>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">											
                                                                <label class="control-label" for="firstname">State</label>
                                                                <div class="controls">
                                                                    <select name="work_state" id="state_dropdown1" class="span6" onchange="selectCity1(this.options[this.selectedIndex].value)">
                                                                        <option value="">Select state</option>
                                                                        <?php
                                                                        if ($user_data[0]['work_state'] != NULL) {
                                                                            foreach ($this->common_model->getRecords(TABLES::$STATES, '*', array('country_id' => $user_data[0]['work_country'])) as $state) {
                                                                                if ($user_data[0]['work_state'] == $state['id']) {
                                                                                    $selected = 'selected';
                                                                                } else {
                                                                                    $selected = '';
                                                                                }
                                                                                ?>
                                                                                <option <?php echo $selected; ?> value="<?php echo $state['id'] ?>"><?php echo $state['name']; ?></option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <span id="state_loader"></span>
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">											
                                                                <label class="control-label">City</label>
                                                                <div class="controls">
                                                                    <select name="work_city" class="span6" id="city_dropdown1">
                                                                        <option value="">Select City</option>
                                                                        <?php
                                                                        if ($user_data[0]['work_city'] != NULL) {
                                                                            foreach ($this->common_model->getRecords(TABLES::$CITIES, '*', array('state_id' => $user_data[0]['work_state'])) as $city) {
                                                                                if ($user_data[0]['work_city'] == $city['id']) {
                                                                                    $selected = 'selected';
                                                                                } else {
                                                                                    $selected = '';
                                                                                }
                                                                                ?>
                                                                                <option <?php echo $selected; ?> value="<?php echo $city['id'] ?>"><?php echo $city['name']; ?></option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <span id="city_loader"></span>
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">											
                                                                <label class="control-label" for="firstname">Postal Code</label>
                                                                <div class="controls">
                                                                    <input id="work_postal_code" value="<?php echo $user_data[0]['work_postal_code']; ?>" name="work_postal_code" type="text" required="required" class="span6 form-control" placeholder="Enter Company Postal code"  />
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->


                                                            <br />


                                                            <!-- /form-actions -->
                                                        </fieldset>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--<form></form> --> 
                                    <div class="Btn_center">
                                        <input type="submit" id="activate-step-3" class="btn btn-primary btn-md" value="Save and contnue">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="container">

                        <div class="row setup-content" id="step-3">
                            <div class="">
                                <div class="span12 well text-center">
                                    <h1 class="text-center"> Personal / Home Information</h1>
                                    <div class="">
                                        <div class="row clearfix">
                                            <div class="span11 column">
                                                <div class="tab-pane" id="formcontrols">
                                                    <div class="frmerror3"></div>
                                                    <form id="frmstep-3" class="form-horizontal">
                                                        <fieldset>
                                                            <div class="control-group">											
                                                                <label class="control-label" for="firstname">Phone<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="hidden" value="<?php echo $user_data[0]['id']; ?>"  name="id">
                                                                    <input id="home_phone" value="<?php echo $user_data[0]['home_phone']; ?>"  name="home_phone" type="text" required="required" class="span6 form-control" placeholder="Enter home phone" />
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">											
                                                                <label class="control-label">Personal Title<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <select class="span6" name="personal_title">
                                                                        <option value="">Select Personal Title</option>
                                                                        <option value="Mr." <?php if ($user_data[0]['personal_title'] == 'Mr.') echo 'selected'; ?>>Mr</option>
                                                                        <option value="Miss." <?php if ($user_data[0]['personal_title'] == 'Miss.') echo 'selected'; ?>>Miss</option>
                                                                    </select>
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">											
                                                                <label class="control-label">Nick Name</label>
                                                                <div class="controls">
                                                                    <input id="nick_name" value="<?php echo $user_data[0]['nick_name']; ?>" name="nick_name" type="text" required="required" class="span6 form-control" placeholder="Enter Nick Name"  />
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">											
                                                                <label class="control-label">Address</label>
                                                                <div class="controls">
                                                                    <textarea id="home_address" name="home_address" type="text" required="required" class="span6 form-control" placeholder="Enter home address" ><?php echo $user_data[0]['home_address']; ?></textarea>
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->


                                                            <div class="control-group">											
                                                                <label class="control-label" for="firstname">Country/Region</label>
                                                                <div class="controls">
                                                                    <select class="span6 " name="home_country" onchange="selectState(this.options[this.selectedIndex].value)">
                                                                        <option value="-1">Select country</option>
                                                                        <?php
                                                                        foreach ($country as $listElement) {
                                                                            if ($user_data[0]['home_country'] == $listElement->id) {
                                                                                $selected = 'selected';
                                                                            } else {
                                                                                $selected = '';
                                                                            }
                                                                            ?>
                                                                            <option <?php echo $selected; ?> value="<?php echo $listElement->id ?>"><?php echo $listElement->name ?></option>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">											
                                                                <label class="control-label" for="firstname">State</label>
                                                                <div class="controls">
                                                                    <select id="state_dropdown" name="home_state" class="span6" onchange="selectCity(this.options[this.selectedIndex].value)">
                                                                        <option value="">Select State</option>
                                                                        <?php
                                                                        if ($user_data[0]['home_state'] != NULL) {
                                                                            foreach ($this->common_model->getRecords(TABLES::$STATES, '*', array('country_id' => $user_data[0]['home_country'])) as $state) {
                                                                                if ($user_data[0]['home_state'] == $state['id']) {
                                                                                    $selected = 'selected';
                                                                                } else {
                                                                                    $selected = '';
                                                                                }
                                                                                ?>
                                                                                <option <?php echo $selected; ?> value="<?php echo $state['id'] ?>"><?php echo $state['name']; ?></option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <span id="state_loader"></span>
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">											
                                                                <label class="control-label">City</label>
                                                                <div class="controls">
                                                                    <select class="span6" name="home_city" id="city_dropdown">
                                                                        <option value="">Select City</option>
                                                                        <?php
                                                                        if ($user_data[0]['home_city'] != NULL) {
                                                                            foreach ($this->common_model->getRecords(TABLES::$CITIES, '*', array('state_id' => $user_data[0]['home_state'])) as $city) {
                                                                                if ($user_data[0]['home_city'] == $city['id']) {
                                                                                    $selected = 'selected';
                                                                                } else {
                                                                                    $selected = '';
                                                                                }
                                                                                ?>
                                                                                <option <?php echo $selected; ?> value="<?php echo $city['id'] ?>"><?php echo $city['name']; ?></option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <span id="city_loader"></span>
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">											
                                                                <label class="control-label" for="firstname">Postal Code</label>
                                                                <div class="controls">
                                                                    <input id="home_postal_code" value="<?php echo $user_data[0]['home_postal_code']; ?>" name="home_postal_code" type="text" class="span6 form-control" placeholder="Enter home postal code"  />
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->



                                                            <br />


                                                            <!-- /form-actions -->
                                                        </fieldset>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--<form></form> --> 
                                    <div class="Btn_center">
                                        <input type="submit" id="activate-step-4" class="btn btn-primary btn-md" value="Save and contnue">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="container">

                        <div class="row setup-content" id="step-4">
                            <div class="">
                                <div class="span12 well text-center">
                                    <h1 class="text-center"> STEP 4</h1>
                                    <div class="">
                                        <div class="row clearfix">
                                            <div class="span11 column">
                                                <div class="tab-pane" id="formcontrols">
                                                    <div class="frmerror4"></div>
                                                    <form id="frmstep-4" class="form-horizontal">
                                                        <fieldset>
                                                            <div class="control-group">											
                                                                <label class="control-label" for="firstname">Gender<span class="required">*</span></label>
                                                                <select class="span6" name="gender">
                                                                    <option value="">Select Genders</option>
                                                                    <option value="male" <?php if ($user_data[0]['gender'] == 'male') echo 'selected'; ?>>Male</option>
                                                                    <option value="female" <?php if ($user_data[0]['gender'] == 'female') echo 'selected'; ?>>Female</option>
                                                                </select>
                                                                <input type="hidden" value="<?php echo $user_data[0]['id']; ?>"  name="id">
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">											
                                                                <label class="control-label">Birthday</label>
                                                                <div class="controls">
                                                                    <input id="birthdate" value="<?php echo $user_data[0]['birthday']; ?>" name="birthday" type="text" required="required" class="span6 form-control" placeholder="Enter birth date"  />
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">											
                                                                <label class="control-label">Anniversary</label>
                                                                <div class="controls">
                                                                    <input id="anniversary" name="anniversary" value="<?php echo $user_data[0]['anniversary']; ?>" type="text" required="required" class="span6 form-control" placeholder="Select anniversary date"  />
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">											
                                                                <label class="control-label">Notes</label>
                                                                <div class="controls">
                                                                    <textarea id="notes" name="notes" type="text" required="required" class="span6 form-control" maxlength="100" placeholder="Enter Notes" ><?php echo $user_data[0]['notes']; ?></textarea>
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->

                                                            <br />


                                                            <!-- /form-actions -->
                                                        </fieldset>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--<form></form> -->  
                                    <div class="Btn_center">              
                                        <input type="submit" id="activate-step-5" class="btn btn-primary btn-md" value="Save and continue">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="container">

                        <div class="row setup-content" id="step-5">
                            <div class="">
                                <div class="span12 well text-center">
                                    <h1 class="text-center"> Why Choose section</h1>
                                    <div class="">
                                        <div class="row clearfix">
                                            <div class="span11 column">
                                                <div class="tab-pane" id="formcontrols">
                                                    <div class="frmerror5"></div>
                                                    <form id="frmstep-5" enctype="mutlipart/form-data" class="form-horizontal">
                                                        <fieldset>
                                                            <div class="control-group">											
                                                                <label class="control-label" for="firstname">Upload why choose Video<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="hidden" value="<?php echo $user_data[0]['id']; ?>"  name="id">
                                                                    <input id="why_choose_video" name="why_choose_video" type="file"  class="span4 form-control" /> OR
                                                                    <input id="why_choose_video_url" name="why_choose_video_url" type="text" placeholder="Enter video URL"  class="span4 form-control" />
                                                                    <p class="help-text">Upload only .mp4, .3gp files</p>
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">											
                                                                <label class="control-label" for="firstname">Upload why choose Image<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input id="why_choose_image" name="why_choose_image" type="file"  class="span6 form-control" />
                                                                    <p class="help-text">Upload only .jpg, .jpeg , .gif, .png files</p>
                                                                    <p class="help-text">Image size should be 1MB</p>
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">											
                                                                <label class="control-label" for="firstname">Why choose Description<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <textarea id="why_choose_desc" name="why_choose_desc" type="text" required="required" class="span6 form-control" placeholder="Enter choose description" ><?php echo $user_data[0]['why_choose_desc']; ?></textarea>
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            
                                                            <div class="control-group">											
                                                                <label class="control-label" for="firstname">Increase your credit description<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <textarea id="why_choose_desc" name="increase_your_credit_desc" type="text" required="required" class="span6 form-control" placeholder="Enter choose description" ><?php echo $user_data[0]['increase_your_credit_desc']; ?></textarea>
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">    										
                                                                <label class="control-label" for="firstname">Product Page url<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input id="product_page_url" name="product_page_url" type="text" required="required" class="span6 form-control" placeholder="Enter choose description" value="<?php echo $user_data[0]['product_page_url']; ?>">
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->

                                                            <br />


                                                            <!-- /form-actions -->
                                                        </fieldset>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--<form></form> -->   
                                    <div class="Btn_center">             
                                        <input id="activate-step-6" class="btn btn-primary btn-md" type="submit" value="Save and continue">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="container">

                        <div class="row setup-content" id="step-6">
                            <div class="">
                                <div class="span12 well text-center">
                                    <h1 class="text-center"> Business Strategy Section</h1>
                                    <div class="">
                                        <div class="row clearfix">
                                            <div class="span11 column">
                                                <div class="tab-pane" id="formcontrols">
                                                    <div class="frmerror6"></div>
                                                    <form id="frmstep-6" class="form-horizontal">
                                                        <fieldset>

                                                            <div class="control-group">											
                                                                <label class="control-label" for="firstname">Business Strategy Videos<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <div class="input_fields_wrap">
                                                                        <button class="add_field_button">Add More Fields</button>
                                                                        <div>
                                                                            <input type="text" name="strat_name[]" placeholder="Enter Strategy Name">
                                                                            <textarea name="business_strategy[]" placeholder="Enter Busines Strategy description"></textarea>

                                                                            <input class="span2" type="file" name="business_strat_video[]">
<!--                                                                            OR
                                                                            <input id="business_strat_video_url" name="business_strat_video_url[]" type="text" placeholder="Enter video url"  class="form-control span2" />-->

                                                                        </div>
                                                                    </div>
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">											
                                                                <label class="control-label" for="firstname">Business Opportunity Video<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input type="hidden" value="<?php echo $user_data[0]['id']; ?>"  name="id">
                                                                    <input id="business_opportunity_video" name="business_opportunity_video" type="file"  class="form-control span4" /> OR
                                                                    <input id="business_opportunity_video_url" name="business_opportunity_video_url" type="text" placeholder="Enter video url"  class="form-control span4" />
                                                                    <p class="help-text">Upload only mp4, mpeg , avi, 3gp files</p>
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->

                                                            <br />


                                                            <!-- /form-actions -->
                                                        </fieldset>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--<form></form> -->    
                                    <div class="Btn_center">            
                                        <input id="activate-step-7" class="btn btn-primary btn-md" type="submit" value="Save and continue">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="container">

                        <div class="row setup-content" id="step-7">
                            <div class="">
                                <div class="span12 well text-center">
                                    <h1 class="text-center"> Social Contact</h1>
                                    <div class="">
                                        <div class="row clearfix">
                                            <div class="span11 column">
                                                <div class="tab-pane" id="formcontrols">
                                                    <div class="frmerror7"></div>
                                                    <form id="frmstep-7" class="form-horizontal">
                                                        <fieldset>
                                                            <div class="control-group">											
                                                                <label class="control-label" for="firstname">Instagram<span class="required">*</span></label>
                                                                <div class="controls">
                                                                    <input id="twitter_link" value="<?php echo $user_data[0]['instagram_link']; ?>" name="instagram_link" type="text"  class="span6 form-control" placeholder="Enter twitter link" />
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">											
                                                                <label class="control-label" for="firstname">Youtube</label>
                                                                <div class="controls">
                                                                    <input id="twitter_link" value="<?php echo $user_data[0]['youtube_link']; ?>" name="youtube_link" type="text"  class="span6 form-control" placeholder="Enter twitter link" />
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->

                                                            <div class="control-group">											
                                                                <label class="control-label" for="firstname">Facebook</label>
                                                                <div class="controls">
                                                                    <input type="hidden" id="hidden_down_id" value="<?php echo $user_data[0]['slug']; ?>"  name="id">
                                                                    <input type="hidden" id="" value="<?php echo $user_data[0]['id']; ?>"  name="id">
                                                                    <input id="facebook_link" value="<?php echo $user_data[0]['facebook_link']; ?>" name="facebook_link" type="text"  class="span6 form-control" placeholder="Enter facebook link" />
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">											
                                                                <label class="control-label" for="firstname">Twitter</label>
                                                                <div class="controls">
                                                                    <input id="twitter_link" value="<?php echo $user_data[0]['twitter_link']; ?>" name="twitter_link" type="text"  class="span6 form-control" placeholder="Enter twitter link" />
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->
                                                            <div class="control-group">											
                                                                <label class="control-label" for="firstname">Linkedin</label>
                                                                <div class="controls">
                                                                    <input id="linkedin_link" name="linkedin_link" value="<?php echo $user_data[0]['linkedin_link']; ?>" type="text"  class="span6 form-control" placeholder="Enter linkedin link" />
                                                                </div> <!-- /controls -->				
                                                            </div> <!-- /control-group -->

                                                            <br />


                                                            <!-- /form-actions -->
                                                        </fieldset>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--<form></form> -->   
                                    <div class="Btn_center">             
                                        <input id="activate-step-8" class="btn btn-primary btn-md" type="submit" value="Save and continue">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="container">

                        <div class="row setup-content" id="step-8">
                            <div class="">
                                <div class="span12 well text-center">
                                    <h1 class="text-center">Edit Tabs Title</h1>
                                    <div class="">
                                        <div class="row clearfix">
                                            <div class="span11 column">
                                                <div class="tab-pane" id="formcontrols">
                                                    <div class="frmerror8"></div>
                                                    <form id="frmstep-8" class="form-horizontal">
                                                        <fieldset>
                                                            <?php foreach ($tabs as $tab) { ?>
                                                                <div class="control-group">											
                                                                    <label class="control-label" for="firstname"></label>
                                                                    <div class="controls">
                                                                        <input type="hidden" name="edit_id[]" value="<?php echo $tab['id'] ?>">
                                                                        <input id="linkedin_link" name="tab_name[]" value="<?php echo $tab['tab_name']; ?>" type="text"  class="span6 form-control" placeholder="Enter linkedin link" />
                                                                    </div> <!-- /controls -->				
                                                                </div> <!-- /control-group -->
                                                            <?php } ?>
                                                            <br>
                                                            <div class="control-group">											
                                                                <label class="control-label" for="firstname"></label>
                                                                <div class="controls">
                                                                    <div class="input_fields_wrap1">
                                                                        <button class="add_field_button1">Add More Tabs</button>
                                                                        <div>
                                                                            <?php foreach ($custom_tabs as $custom_tabs) { ?>
                                                                                <input type="text" placeholder="Enter tab name" value="<?php echo $custom_tabs['tab_name'] ?>" name="tab_name_more[]"/><input value="<?php echo $custom_tabs['tab_val'] ?>" type="text" placeholder="Enter link" name="tab_val_more[]"/> <br>
                                                                            <?php } ?>
                                                                    <!--<input type="text" placeholder="Enter tab name" name="tab_name_more[]"/><input type="text" placeholder="Enter link" name="tab_val_more[]"/></div>-->
                                                                        </div>
                                                                    </div> <!-- /controls -->

                                                                </div> <!-- /control-group -->

                                                                <br />


                                                                <!-- /form-actions -->
                                                        </fieldset>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <!--<form></form> -->   
                                    <div class="Btn_center">             
                                        <input class="btn btn-primary btn-md" id="activate-step-9" type="submit" value="Save and generate your card">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- /widget -->
                </div>
                <!-- /span6 --> 
            </div>
            <!-- /row --> 
        </div>
        <!-- /container --> 
    </div>
    <!-- /main-inner --> 
</div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="<?php echo asset_url() ?>inner/js/jquery-1.7.2.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
                                                                        $(document).ready(function () {
                                                                            var navListItems = $('ul.setup-panel li a'),
                                                                                    allWells = $('.setup-content');
                                                                            allWells.hide();
                                                                            navListItems.click(function (e)
                                                                            {
                                                                                e.preventDefault();
                                                                                var $target = $($(this).attr('href')),
                                                                                        $item = $(this).closest('li');

                                                                                if (!$item.hasClass('disabled')) {
                                                                                    navListItems.closest('li').removeClass('active');
                                                                                    $item.addClass('active');
                                                                                    allWells.hide();
                                                                                    $target.show();
                                                                                }
                                                                            });
                                                                            $('ul.setup-panel li.active a').trigger('click');

                                                                            // DEMO ONLY //
                                                                            $('#activate-step-2').on('click', function (e) {
                                                                                //$("#step-1").validate();
                                                                                var formData = new FormData($("#frmstep-1")[0]);
                                                                                var url = base_url + "savevcard-step1"; // the script where you handle the form input.
                                                                                //alert($("#frmstep-1").serialize());
                                                                                $.ajax({
                                                                                    type: "POST",
                                                                                    url: url,
                                                                                    data: formData,
                                                                                    cache: false,
                                                                                    contentType: false,
                                                                                    processData: false,
                                                                                    mimeType: "multipart/form-data",
                                                                                    dataType: 'json',
                                                                                    success: function (data)
                                                                                    {
                                                                                        //alert(data);

                                                                                        if (data.status === 1) {
                                                                                            $('ul.setup-panel li:eq(1)').removeClass('disabled');
                                                                                            $('ul.setup-panel li a[href="#step-2"]').trigger('click');
                                                                                            $(this).remove();
                                                                                            return true;
                                                                                        } else {
                                                                                            $(".frmerror").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + data.msg + '</div>');
                                                                                            return false;
                                                                                        }
                                                                                    }
                                                                                });


                                                                            })
                                                                            $('#activate-step-3').on('click', function (e) {
                                                                                var url = base_url + "savevcard-step2"; // the script where you handle the form input.

                                                                                $.ajax({
                                                                                    type: "POST",
                                                                                    url: url,
                                                                                    data: $("#frmstep-2").serialize(),
                                                                                    dataType: 'json', // serializes the form's elements.
                                                                                    success: function (data)
                                                                                    {
                                                                                        //alert(data);

                                                                                        if (data.status === 1) {
                                                                                            $('ul.setup-panel li:eq(2)').removeClass('disabled');
                                                                                            $('ul.setup-panel li a[href="#step-3"]').trigger('click');
                                                                                            $(this).remove();
                                                                                            return true;
                                                                                        } else {
                                                                                            $(".frmerror2").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + data.msg + '</div>');
                                                                                            return false;
                                                                                        }
                                                                                    }
                                                                                });

                                                                            })

                                                                            $('#activate-step-4').on('click', function (e) {
                                                                                var url = base_url + "savevcard-step3"; // the script where you handle the form input.
                                                                                //alert($("#frmstep-3").serialize());
                                                                                $.ajax({
                                                                                    type: "POST",
                                                                                    url: url,
                                                                                    data: $("#frmstep-3").serialize(),
                                                                                    dataType: 'json', // serializes the form's elements.
                                                                                    success: function (data)
                                                                                    {
                                                                                        //alert(data);

                                                                                        if (data.status === 1) {
                                                                                            $('ul.setup-panel li:eq(3)').removeClass('disabled');
                                                                                            $('ul.setup-panel li a[href="#step-4"]').trigger('click');
                                                                                            $(this).remove();
                                                                                            return true;
                                                                                        } else {
                                                                                            $(".frmerror3").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + data.msg + '</div>');
                                                                                            return false;
                                                                                        }
                                                                                    }
                                                                                });

                                                                            })

                                                                            $('#activate-step-5').on('click', function (e) {
                                                                                var url = base_url + "savevcard-step4"; // the script where you handle the form input.
                                                                                //alert($("#frmstep-4").serialize());
                                                                                $.ajax({
                                                                                    type: "POST",
                                                                                    url: url,
                                                                                    data: $("#frmstep-4").serialize(),
                                                                                    dataType: 'json', // serializes the form's elements.
                                                                                    success: function (data)
                                                                                    {
                                                                                        //alert(data);

                                                                                        if (data.status === 1) {
                                                                                            $('ul.setup-panel li:eq(4)').removeClass('disabled');
                                                                                            $('ul.setup-panel li a[href="#step-5"]').trigger('click');
                                                                                            $(this).remove();
                                                                                            return true;
                                                                                        } else {
                                                                                            $(".frmerror4").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + data.msg + '</div>');
                                                                                            return false;
                                                                                        }
                                                                                    }
                                                                                });

                                                                            })

                                                                            $('#activate-step-6').on('click', function (e) {
                                                                                e.preventDefault();
                                                                                var url = base_url + "savevcard-step5"; // the script where you handle the form input.

                                                                                var formData = new FormData($("#frmstep-5")[0]);
                                                                                //alert(formData);
                                                                                $.ajax({
                                                                                    type: "POST",
                                                                                    url: url,
                                                                                    data: formData,
                                                                                    cache: false,
                                                                                    contentType: false,
                                                                                    processData: false,
                                                                                    mimeType: "multipart/form-data",
                                                                                    dataType: 'json',
                                                                                    success: function (data)
                                                                                    {
                                                                                        //alert(data);

                                                                                        if (data.status === 1) {
                                                                                            $('ul.setup-panel li:eq(5)').removeClass('disabled');
                                                                                            $('ul.setup-panel li a[href="#step-6"]').trigger('click');
                                                                                            $(this).remove();
                                                                                            return true;
                                                                                        } else {
                                                                                            $(".frmerror5").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + data.msg + '</div>');
                                                                                            return false;
                                                                                        }
                                                                                    }
                                                                                });

                                                                            })

                                                                            $('#activate-step-7').on('click', function (e) {
                                                                                e.preventDefault();
                                                                                var url = base_url + "savevcard-step6"; // the script where you handle the form input.

                                                                                var formData = new FormData($("#frmstep-6")[0]);
                                                                                //alert(formData);
                                                                                $.ajax({
                                                                                    type: "POST",
                                                                                    url: url,
                                                                                    data: formData,
                                                                                    cache: false,
                                                                                    contentType: false,
                                                                                    processData: false,
                                                                                    mimeType: "multipart/form-data",
                                                                                    dataType: 'json',
                                                                                    success: function (data)
                                                                                    {
                                                                                        //alert(data);

                                                                                        if (data.status === 1) {
                                                                                            $('ul.setup-panel li:eq(6)').removeClass('disabled');
                                                                                            $('ul.setup-panel li a[href="#step-7"]').trigger('click');
                                                                                            $(this).remove();
                                                                                            return true;
                                                                                        } else {
                                                                                            $(".frmerror6").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + data.msg + '</div>');
                                                                                            return false;
                                                                                        }
                                                                                    }
                                                                                });

                                                                            })

                                                                            $('#activate-step-8').on('click', function (e) {
                                                                                e.preventDefault();
                                                                                var url = base_url + "savevcard-step7"; // the script where you handle the form input.

                                                                                var formData = new FormData($("#frmstep-7")[0]);
                                                                                //alert(formData);
                                                                                $.ajax({
                                                                                    type: "POST",
                                                                                    url: url,
                                                                                    data: formData,
                                                                                    cache: false,
                                                                                    contentType: false,
                                                                                    processData: false,
                                                                                    mimeType: "multipart/form-data",
                                                                                    dataType: 'json',
                                                                                    success: function (data)
                                                                                    {
                                                                                        //alert(data);

                                                                                        if (data.status === 1) {
                                                                                            $('ul.setup-panel li:eq(7)').removeClass('disabled');
                                                                                            $('ul.setup-panel li a[href="#step-8"]').trigger('click');
                                                                                            $(this).remove();
                                                                                            return true;
                                                                                        } else {
                                                                                            $(".frmerror7").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + data.msg + '</div>');
                                                                                            return false;
                                                                                        }
                                                                                    }
                                                                                });

                                                                            })

                                                                            $('#activate-step-9').on('click', function (e) {
                                                                                var url = base_url + "savevcard-step8"; // the script where you handle the form input.
                                                                                //alert($("#hidden_down_id").val());
                                                                                $.ajax({
                                                                                    type: "POST",
                                                                                    url: url,
                                                                                    data: $("#frmstep-8").serialize(),
                                                                                    dataType: 'json',
                                                                                    success: function (data)
                                                                                    {
                                                                                        //alert(data);

                                                                                        if (data.status === 1) {
                                                                                            alert("All data saved successfully.");
                                                                                            //window.location.href = base_url + "generate-vcard/" + $("#hidden_down_id").val();
                                                                                            window.location.href = base_url + 'dashboard';
                                                                                            return true;
                                                                                        } else {
                                                                                            $(".frmerror8").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + data.msg + '</div>');
                                                                                            return false;
                                                                                        }
                                                                                    }
                                                                                });

                                                                            })



                                                                        });

                                                                        $(document).ready(function () {
                                                                            var max_fields = 10; //maximum input boxes allowed
                                                                            var wrapper = $(".input_fields_wrap"); //Fields wrapper
                                                                            var add_button = $(".add_field_button"); //Add button ID

                                                                            var x = 1; //initlal text box count
                                                                            $(add_button).click(function (e) { //on add input button click
                                                                                e.preventDefault();
                                                                                if (x < max_fields) { //max input box allowed
                                                                                    x++; //text box increment
                                                                                    $(wrapper).append('<div><input name="strat_name[]" placeholder="Enter Strategy Name" type="text"><textarea placeholder="Enter Busines Strategy description" name="business_strategy[]"></textarea> <input type="file" class="span2" name="business_strat_video[]"><a href="javascript:;" class="remove_field btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> Delete </i></a></a></div>'); //add input box
                                                                                }
                                                                            });

                                                                            $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                                                                                e.preventDefault();
                                                                                $(this).parent('div').remove();
                                                                                x--;
                                                                            })
                                                                        });

                                                                        function selectState(country_id) {
                                                                            //alert(country_id);
                                                                            if (country_id != "-1") {
                                                                                loadData('state', country_id);
                                                                                $("#city_dropdown").html("<option value='-1'>Select city</option>");
                                                                            } else {
                                                                                $("#state_dropdown").html("<option value='-1'>Select state</option>");
                                                                                $("#city_dropdown").html("<option value='-1'>Select city</option>");
                                                                            }
                                                                        }
                                                                        function selectCity(state_id) {
                                                                            if (state_id != "-1") {
                                                                                loadData('city', state_id);
                                                                            } else {
                                                                                $("#city_dropdown").html("<option value='-1'>Select city</option>");
                                                                            }
                                                                        }
                                                                        function loadData(loadType, loadId) {
                                                                            var dataString = 'loadType=' + loadType + '&loadId=' + loadId;
                                                                            $("#" + loadType + "_loader").show();
                                                                            $("#" + loadType + "_loader").fadeIn(400).html('Loading ' + loadType + '...');
                                                                            $.ajax({
                                                                                type: "POST",
                                                                                url: "<?php echo base_url() ?>frontend/location/loadData",
                                                                                data: dataString,
                                                                                cache: false,
                                                                                success: function (result) {
                                                                                    $("#" + loadType + "_loader").hide();
                                                                                    $("#" + loadType + "_dropdown").html("<option value='-1'>Select " + loadType + "</option>");
                                                                                    $("#" + loadType + "_dropdown").append(result);
                                                                                }
                                                                            });
                                                                        }
                                                                        function selectState1(country_id) {
                                                                            //alert(country_id);
                                                                            if (country_id != "-1") {
                                                                                loadData1('state', country_id);
                                                                                $("#city_dropdown1").html("<option value='-1'>Select city</option>");
                                                                            } else {
                                                                                $("#state_dropdown1").html("<option value='-1'>Select state</option>");
                                                                                $("#city_dropdown1").html("<option value='-1'>Select city</option>");
                                                                            }
                                                                        }
                                                                        function selectCity1(state_id) {
                                                                            if (state_id != "-1") {
                                                                                loadData1('city', state_id);
                                                                            } else {
                                                                                $("#city_dropdown1").html("<option value='-1'>Select city</option>");
                                                                            }
                                                                        }
                                                                        function loadData1(loadType, loadId) {
                                                                            var dataString = 'loadType=' + loadType + '&loadId=' + loadId;
                                                                            $("#" + loadType + "_loader").show();
                                                                            $("#" + loadType + "_loader").fadeIn(400).html('Loading ' + loadType + '...');
                                                                            $.ajax({
                                                                                type: "POST",
                                                                                url: "<?php echo base_url() ?>frontend/location/loadData",
                                                                                data: dataString,
                                                                                cache: false,
                                                                                success: function (result) {
                                                                                    $("#" + loadType + "_loader").hide();
                                                                                    $("#" + loadType + "_dropdown1").html("<option value='-1'>Select " + loadType + "</option>");
                                                                                    $("#" + loadType + "_dropdown1").append(result);
                                                                                }
                                                                            });
                                                                        }

</script>
<script src="<?php echo asset_url() ?>/js/jquery.validate.js"></script>
<script>
                                                                        $(function () {
                                                                            $("#birthdate").datepicker({minDate: '-100Y',
                                                                                maxDate: ("-10Y"),
                                                                                changeMonth: true,
                                                                                changeYear: true,
                                                                                yearRange: '1920:'+new Date().getFullYear()
                                                                            });
                                                                            $("#anniversary").datepicker({minDate: '-100Y',
                                                                              maxDate: new Date,
                                                                                changeMonth: true,
                                                                                changeYear: true,
                                                                                yearRange: '1920:'+new Date().getFullYear()
                                                                            });
                                                                        });
                                                                        var downpayment = document.getElementById('why_choose_video'),
                                                                                full_payment = document.getElementById('why_choose_video_url');

                                                                        function enableToggle(current, other) {
                                                                            other.disabled = current.value.replace(/\s+/, '').length > 0 ? true : false;
                                                                        }

                                                                        downpayment.onchange = function () {
                                                                            enableToggle(this, full_payment);
                                                                        }
                                                                        full_payment.onkeyup = function () {
                                                                            enableToggle(this, downpayment);
                                                                        }

                                                                        var downpayment1 = document.getElementById('business_opportunity_video'),
                                                                                full_payment1 = document.getElementById('business_opportunity_video_url');

                                                                        function enableToggle1(current, other) {
                                                                            other.disabled = current.value.replace(/\s+/, '').length > 0 ? true : false;
                                                                        }

                                                                        downpayment1.onchange = function () {
                                                                            enableToggle1(this, full_payment1);
                                                                        }
                                                                        full_payment1.onkeyup = function () {
                                                                            enableToggle1(this, downpayment1);
                                                                        }
                                                                        $(document).ready(function () {
                                                                            var max_fields = 5; //maximum input boxes allowed
                                                                            var wrapper = $(".input_fields_wrap1"); //Fields wrapper
                                                                            var add_button = $(".add_field_button1"); //Add button ID

                                                                            var x = 1; //initlal text box count
                                                                            $(add_button).click(function (e) { //on add input button click
                                                                                e.preventDefault();
                                                                                if (x < max_fields) { //max input box allowed
                                                                                    x++; //text box increment
                                                                                    $(wrapper).append('<div><input type="text" placeholder="Enter tab name" name="tab_name_more[]"/><input type="text" placeholder="Enter link" name="tab_val_more[]"/><a href="javascript:;" class="remove_field btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> Delete <i/></a></div>'); //add input box
                                                                                }
                                                                            });

                                                                            $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                                                                                e.preventDefault();
                                                                                $(this).parent('div').remove();
                                                                                x--;
                                                                            })
                                                                        });

</script>

 <script type="text/javascript">
        $(document).ready(function () {
            $("#why_choose_video").change(function () {
                // Get uploaded file extension
                var extension = $(this).val().split('.').pop().toLowerCase();
                // Create array with the files extensions that we wish to upload
                var validFileExtensions = ['mp4', '3gp', 'mpeg', 'avi'];
         //Check file extension in the array.if -1 that means the file extension is not in the list. 
                if ($.inArray(extension, validFileExtensions) == -1) {
                    $("#why_choose_video_url").attr("readonly", false); 
                    $(".frmerror5").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>Please Upload only mp4, 3gp, mpeg, avi file</div>');
//                   alert("Sorry!! Upload only mp4, 3gp, mpeg, avi file");
                    // Clear fileuload control selected file
                    
                    $(this).replaceWith($(this).val('').clone(true));
                    return false;
                }
                else {
                    // Check and restrict the file size to 32 KB.
                    if ($(this).get(0).files[0].size > (10485760)) {
                        $(".frmerror5").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>Sorry!! Max allowed file size is 10MB</div>');
                     // Clear fileuload control selected file
                        $(this).replaceWith($(this).val('').clone(true));
                        //Disable Submit Button
                        return false;
                    }
                    else {return true;
                    }
                }
            });
            
            
            $("#why_choose_image").change(function () {
                // Get uploaded file extension
                var extension = $(this).val().split('.').pop().toLowerCase();
                // Create array with the files extensions that we wish to upload
                var validFileExtensions = ['jpg', 'jpeg', 'gif', 'png'];
         //Check file extension in the array.if -1 that means the file extension is not in the list. 
                if ($.inArray(extension, validFileExtensions) == -1) {
                   $(".frmerror5").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>Sorry!! Upload only jpg, jpeg, gif, png file</div>');
                    // Clear fileuload control selected file
                    $(this).replaceWith($(this).val('').clone(true));
                    return false;
                }
                else {
                    // Check and restrict the file size to 32 KB.
                    if ($(this).get(0).files[0].size > (1048576)) {
                       $(".frmerror5").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>Sorry!! Max allowed file size is 1MB</div>');
                     // Clear fileuload control selected file
                        $(this).replaceWith($(this).val('').clone(true));
                        //Disable Submit Button
                        return false;
                    }
                    else {return true;
                    }
                }
            });
        });
    </script>