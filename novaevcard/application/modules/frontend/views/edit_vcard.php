<style>
    .strat_video {
        float: right;
        position: relative;
        bottom: 64px;
        right: 108px;
    }
    .dyna_bs{
        width:98%;
        float:left;
    }
</style>
<div id="accordian_form">
    <div class="main">
        <div class="main-inner">
            <div class="container">
                <div class="row">
                    <div id="Wizard_form_steps" class="container">
                        <div class="row form-group">
                            <div class="span12">


                                <div class="widget-header">
                                    <i class="icon-user"></i>
                                    <h3>Edit vCard Details</h3>
                                </div>

                            </div>
                            <div class="span12">
                                <div class="control-group">

                                    <div class="controls">

                                        <div class="frmerror"></div>
                                        <form id="frmstep-1" name="step-1" class="form-horizontal">
                                            <div class="accordion" id="accordion2">
                                                <div class="accordion-group">
                                                    <div class="accordion-heading">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                                            Basic Information
                                                        </a>
                                                    </div>
                                                    <div id="collapseOne" class="accordion-body collapse in">
                                                        <div class="accordion-inner">
                                                            <div class="row" id="">
                                                                <div class="span12 Form_Panel">

                                                                    <div class="well text-center">

                                                                        <!-- <form> -->               

                                                                        <div class="">
                                                                            <div class="row clearfix">
                                                                                <div class="span11 column">
                                                                                    <div class="tab-pane" id="formcontrols">


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
                                                                                                    <img src="<?php echo $user_data[0]['user_image']; ?>" width="200px">
                                                                                                    <input type="hidden" name="user_image_old" value="<?php echo $user_data[0]['user_image']; ?>">
                                                                                                </div> <!-- /controls -->				
                                                                                            </div> <!-- /control-group -->
                                                                                            <div class="control-group">											
                                                                                                <label class="control-label" for="email">Company Logo<span class="required">*</span></label>
                                                                                                <div class="controls">
                                                                                                    <input required="required" name="company_logo" type="file" class="span6"  /><br>
                                                                                                    <img src="<?php echo $user_data[0]['company_logo']; ?>" width="250px">
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
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-group">
                                                    <div class="accordion-heading">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                                            Work Information
                                                        </a>
                                                    </div>
                                                    <div id="collapseTwo" class="accordion-body collapse">
                                                        <div class="accordion-inner">
                                                            <div class="row" id="">
                                                                <div class="span12 Form_Panel">

                                                                    <div class="well text-center">

                                                                        <!-- <form> -->               

                                                                        <div class="">
                                                                            <div class="row clearfix">
                                                                                <div class="span11 column">
                                                                                    <div class="tab-pane" id="formcontrols">
                                                                                        <div class="frmerror2"></div>
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
                                                                                                        foreach ($this->common_model->getRecords(TABLES::$STATES, '*', array('country_id' => $user_data[0]['work_country'])) as $state) {
                                                                                                            if ($user_data[0]['work_state'] == $state['id']) {
                                                                                                                $selected = 'selected';
                                                                                                            } else {
                                                                                                                $selected = '';
                                                                                                            }
                                                                                                            ?>
                                                                                                            <option <?php echo $selected; ?> value="<?php echo $state['id'] ?>"><?php echo $state['name']; ?></option>
                                                                                                        <?php } ?>
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
                                                                                                        foreach ($this->common_model->getRecords(TABLES::$CITIES, '*', array('state_id' => $user_data[0]['work_state'])) as $city) {
                                                                                                            if ($user_data[0]['work_city'] == $city['id']) {
                                                                                                                $selected = 'selected';
                                                                                                            } else {
                                                                                                                $selected = '';
                                                                                                            }
                                                                                                            ?>
                                                                                                            <option <?php echo $selected; ?> value="<?php echo $city['id'] ?>"><?php echo $city['name']; ?></option>
                                                                                                        <?php } ?>
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
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="accordion-group">
                                                    <div class="accordion-heading">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                                                            Personal / Home Information
                                                        </a>
                                                    </div>
                                                    <div id="collapseThree" class="accordion-body collapse">
                                                        <div class="accordion-inner">
                                                            <div class="row" id="">
                                                                <div class="span12 Form_Panel">

                                                                    <div class="well text-center">

                                                                        <!-- <form> -->               

                                                                        <div class="">
                                                                            <div class="row clearfix">
                                                                                <div class="span11 column">
                                                                                    <div class="tab-pane" id="formcontrols">
                                                                                        <div class="frmerror3"></div>
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
                                                                                                        foreach ($this->common_model->getRecords(TABLES::$STATES, '*', array('country_id' => $user_data[0]['home_country'])) as $state) {
                                                                                                            if ($user_data[0]['home_state'] == $state['id']) {
                                                                                                                $selected = 'selected';
                                                                                                            } else {
                                                                                                                $selected = '';
                                                                                                            }
                                                                                                            ?>
                                                                                                            <option <?php echo $selected; ?> value="<?php echo $state['id'] ?>"><?php echo $state['name']; ?></option>
                                                                                                        <?php } ?>
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
                                                                                                        foreach ($this->common_model->getRecords(TABLES::$CITIES, '*', array('state_id' => $user_data[0]['home_state'])) as $city) {
                                                                                                            if ($user_data[0]['home_city'] == $city['id']) {
                                                                                                                $selected = 'selected';
                                                                                                            } else {
                                                                                                                $selected = '';
                                                                                                            }
                                                                                                            ?>
                                                                                                            <option <?php echo $selected; ?> value="<?php echo $city['id'] ?>"><?php echo $city['name']; ?></option>
                                                                                                        <?php } ?>
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
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-group">
                                                    <div class="accordion-heading">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
                                                            Events Information
                                                        </a>
                                                    </div>
                                                    <div id="collapseFour" class="accordion-body collapse">
                                                        <div class="accordion-inner">
                                                            <div class="row" id="">
                                                                <div class="span12 Form_Panel">

                                                                    <div class="well text-center">

                                                                        <!-- <form> -->               

                                                                        <div class="">
                                                                            <div class="row clearfix">
                                                                                <div class="span11 column">
                                                                                    <div class="tab-pane" id="formcontrols">
                                                                                        <div class="frmerror4"></div>
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
                                                                                                    <textarea id="notes" name="notes" type="text" required="required" class="span6 form-control" placeholder="Enter Notes" ><?php echo $user_data[0]['notes']; ?></textarea>
                                                                                                </div> <!-- /controls -->				
                                                                                            </div> <!-- /control-group -->

                                                                                            <br />


                                                                                            <!-- /form-actions -->
                                                                                        </fieldset>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-group">
                                                    <div class="accordion-heading">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive">
                                                            Why Choose Section
                                                        </a>
                                                    </div>
                                                    <div id="collapseFive" class="accordion-body collapse">
                                                        <div class="accordion-inner">
                                                            <div class="row" id="">
                                                                <div class="span12 Form_Panel">

                                                                    <div class="well text-center">

                                                                        <!-- <form> -->               

                                                                        <div class="">
                                                                            <div class="row clearfix">
                                                                                <div class="span11 column">
                                                                                    <div class="tab-pane" id="formcontrols">
                                                                                        <div class="frmerror5"></div>
                                                                                        <fieldset>
                                                                                            <div class="control-group">											
                                                                                                <label class="control-label" for="firstname">Upload why choose Video<span class="required">*</span></label>
                                                                                                <div class="controls">
                                                                                                    <input type="hidden" value="<?php echo $user_data[0]['id']; ?>"  name="id">
                                                                                                    <input id="why_choose_video" class="span4 form-control"  name="why_choose_video" type="file"  class="span6 form-control" /> OR
                                                                                                    <input id="why_choose_video_url" name="why_choose_video_url" value="<?php echo $user_data[0]['why_choose_video']; ?>" type="text" placeholder="Enter video URL"  class="span4 form-control" />
                                                                                                    <input type="hidden" name="why_choose_video_old" value="<?php echo $user_data[0]['why_choose_video']; ?>"/>

                                                                                                    <p class="help-text">Upload only .mp4, .3gp files</p>

                                                                                                    <!--                                                                                                    <video width="320" height="240" controls>
                                                                                                                                                                                                        <source src="<?php echo $user_data[0]['why_choose_video']; ?>" type="video/mp4">
                                                                                                                                                                                                        <source src="<?php echo $user_data[0]['why_choose_video']; ?>" type="video/ogg">
                                                                                                                                                                                                        Your browser does not support the video tag.
                                                                                                    <?php if ($user_data[0]['why_choose_video'] != '') { ?>                                                                                               </video>-->
                                                                                                        <iframe frameBorder="0" height="315"
                                                                                                                src="<?php echo $user_data[0]['why_choose_video']; ?>">
                                                                                                        </iframe>
                                                                                                    <?php } ?>
                                                                                                </div> <!-- /controls -->				
                                                                                            </div> <!-- /control-group -->
                                                                                            <div class="control-group">											
                                                                                                <label class="control-label" for="firstname">Upload why choose Image<span class="required">*</span></label>
                                                                                                <div class="controls">
                                                                                                    <input id="why_choose_image" name="why_choose_image" type="file"  class="span6 form-control" />
                                                                                                    <p class="help-text">Upload only .jpg, .jpeg , .gif, .png files</p>
                                                                                                    <p class="help-text">Image dimension should be 1024x768</p>
                                                                                                    <p class="help-text">Image size should be 1MB</p>
                                                                                                    <img width="100px" src="<?php echo $user_data[0]['why_choose_image']; ?>">
                                                                                                    <input type="hidden" name="why_choose_image_old" value="<?php echo $user_data[0]['why_choose_image']; ?>"/>
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
                                                                                                    <input  id="why_choose_desc" name="product_page_url" type="text" required="required" class="span6 form-control" placeholder="Enter choose description" value="<?php echo $user_data[0]['product_page_url']; ?>" >
                                                                                                </div> <!-- /controls -->				
                                                                                            </div> <!-- /control-group -->

                                                                                            <br />


                                                                                            <!-- /form-actions -->
                                                                                        </fieldset>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-group">
                                                    <div class="accordion-heading">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseSix">
                                                            Business Strategy Section
                                                        </a>
                                                    </div>
                                                    <div id="collapseSix" class="accordion-body collapse">
                                                        <div class="accordion-inner">
                                                            <div class="row" id="">
                                                                <div class="span12 Form_Panel">

                                                                    <div class="well text-center">

                                                                        <form>                

                                                                            <div class="">
                                                                                <div class="row clearfix">
                                                                                    <div class="span11 column">
                                                                                        <div class="tab-pane" id="formcontrols">
                                                                                            <div class="frmerror6"></div>
                                                                                            <span class="straterror"></span>
                                                                                            <div class="progress-bar progress-bar-success myprogress" role="progressbar" style="width:0%">0%</div>
                                                                                            
                                                                                            <fieldset>

                                                                                                <div class="control-group">											
                                                                                                    <label class="control-label" for="firstname">Business Strategies<span class="required">*</span></label>
                                                                                                    <div class="controls">

                                                                                                        <div class="input_fields_wrap">
                                                                                                            <button class="add_field_button">Add More Fields</button>
                                                                                                            <?php
                                                                                                            $sr = 0;
                                                                                                            foreach ($business_strat as $bst) {
                                                                                                                $sr++;
                                                                                                                ?>

                                                                                                                <div class="dyna_bs" id="rmid<?php echo $sr; ?>">
                                                                                                                    <input type="text" name="strat_name" id="stn<?php echo $bst['id']; ?>" value="<?php echo $bst['strat_name'] ?>" placeholder="Enter Strategy Name">
                                                                                                                    <input type="hidden" id="of<?php echo $bst['id']; ?>" value="<?php echo $bst['video']; ?>" name="old_file">
                                                                                                                    <input type="hidden" id="oi<?php echo $bst['id']; ?>" value="<?php echo $bst['id']; ?>" name="old_id">
                                                                                                                    <textarea name="business_strategy" id="std<?php echo $bst['id']; ?>"  placeholder="Enter Busines Strategy description"><?php echo $bst['description'] ?></textarea>
                                                                                                                    <input class="span4" type="file" id="stv<?php echo $bst['id']; ?>"  name="business_strat_video">
                                                                                                                    <video class="strat_video" width="100" height="100" controls>
                                                                                                                        <source src="<?php echo $bst['video']; ?>" type="video/mp4">
                                                                                                                        <source src="<?php echo $bst['video']; ?>" type="video/ogg">
                                                                                                                        Your browser does not support the video tag.
                                                                                                                    </video>

                                                                                                                    <a href="javascript:;" onclick="removeStrat(<?php echo $sr; ?>,<?php echo $bst['id']; ?>)" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> Delete </i></a>
                                                                                                                    <a href="javascript:;" onclick="updateStrat('<?php echo $bst['id']; ?>')" class="btn btn-success btn-small"><i class="btn-icon-only icon-edit"> Update </i></a>        

                                                                                                                </div>

                                                                                                            <?php } ?>
                                                                                                        </div>
                                                                                                    </div> 
<div class="msg"></div>                                                                                                    
                                                                                                </div>  
                                                                                                <div class="control-group">											
                                                                                                    <label class="control-label" for="firstname">Business Opportunity Video<span class="required">*</span></label>
                                                                                                    <div class="controls">
                                                                                                        <input type="hidden" value="<?php echo $user_data[0]['id']; ?>"  name="id">
                                                                                                        <input id="business_opportunity_video" name="business_opportunity_video" type="file"  class="form-control" />
                                                                                                        <p class="help-text">Upload only mp4, mpeg , avi, 3gp files</p>
                                                                                                        <video class="strat_video" width="100" height="100" controls>
                                                                                                            <source src="<?php echo $user_data[0]['business_opportunity_video']; ?>" type="video/mp4">
                                                                                                            <source src="<?php echo $user_data[0]['business_opportunity_video']; ?>" type="video/ogg">
                                                                                                            Your browser does not support the video tag.
                                                                                                        </video>
                                                                                                    </div>  			
                                                                                                </div>  

                                                                                                <br />



                                                                                            </fieldset>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-group">
                                                    <div class="accordion-heading">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseSeven">
                                                            Social Information
                                                        </a>
                                                    </div>
                                                    <div id="collapseSeven" class="accordion-body collapse">
                                                        <div class="accordion-inner">
                                                            <div class="row" id="">
                                                                <div class="span12 Form_Panel">

                                                                    <div class="well text-center">

                                                                        <!-- <form> -->               

                                                                        <div class="">
                                                                            <div class="row clearfix">
                                                                                <div class="span11 column">
                                                                                    <div class="tab-pane" id="formcontrols">
                                                                                        <div class="frmerror7"></div>

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

                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-group">
                                                    <div class="accordion-heading">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseEight">
                                                            Edit vcard tabs
                                                        </a>
                                                    </div>
                                                    <div id="collapseEight" class="accordion-body collapse">
                                                        <div class="accordion-inner">
                                                            <div class="row" id="">
                                                                <div class="span12 Form_Panel">

                                                                    <div class="well text-center">

                                                                        <!-- <form> -->               

                                                                        <div class="">
                                                                            <div class="row clearfix">
                                                                                <div class="span11 column">
                                                                                    <div class="tab-pane" id="formcontrols">
                                                                                        <div class="frmerror7"></div>

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

                                                                                            <br />
                                                                                            <div class="control-group">											
                                                                                                <label class="control-label" for="firstname"></label>
                                                                                                <div class="controls">
                                                                                                    <div class="input_fields_wrap1">
                                                                                                        <button class="add_field_button1">Add More Tabs</button>

                                                                                                        <?php foreach ($custom_tabs as $custom_tabs) { ?>
                                                                                                            <div>
                                                                                                                <input type="text" placeholder="Enter tab name" value="<?php echo $custom_tabs['tab_name'] ?>" name="tab_name_more[]"/><input value="<?php echo $custom_tabs['tab_val'] ?>" type="text" placeholder="Enter link" name="tab_val_more[]"/> <a href="javascript:;" id="<?php echo $custom_tabs['id'] ?>" onclick="removetabs(<?php echo $custom_tabs['id'] ?>)" class="">Remove</a> <br>
                                                                                                            </div>
                                                                                                        <?php } ?>
                                                               <!--<input type="text" placeholder="Enter tab name" name="tab_name_more[]"/><input type="text" placeholder="Enter link" name="tab_val_more[]"/></div>-->

                                                                                                    </div> <!-- /controls -->				
                                                                                                </div> <!-- /control-group -->


                                                                                                <!-- /form-actions -->
                                                                                        </fieldset>

                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="" style="text-align:center;margin-top:15px;"><input type="submit" class="btn btn-primary btn-md" id="updatevcard" value="Submit"></div>
                                            </div>
                                        </form>
                                    </div> <!-- /controls -->	
                                </div>
                            </div>
                        </div> <option value="Mr." <?php if ($user_data[0]['personal_title'] == 'Mr.') echo 'selected'; ?>>Mr</option>
                                                           
                    </div>	





                    <!-- /widget -->

                    <!-- /span6 --> 
                </div>
                <!-- /row --> 
            </div>
            <!-- /container --> 
        </div>
        <!-- /main-inner --> 
    </div>
</div>
<!-- /main -->

<script src="<?php echo asset_url() ?>inner/js/jquery-1.7.2.min.js"></script>


<script type="text/javascript">


                                                                                                                    function removeStrat(id, id1) {
                                                                                                                        alert(id1);
                                                                                                                        if (confirm("Are you sure you want to delete this record?")) {
                                                                                                                            var dataString = 'id=' + id1;
                                                                                                                            $.ajax({
                                                                                                                                type: "POST",
                                                                                                                                url: "<?php echo base_url() ?>delete-dynamic-image",
                                                                                                                                data: dataString,
                                                                                                                                cache: false,
                                                                                                                                success: function (result) {
                                                                                                                                    $("#rmid" + id).remove();
                                                                                                                                }
                                                                                                                            });
                                                                                                                            return true;
                                                                                                                        } else {
                                                                                                                            return false;
                                                                                                                        }
                                                                                                                    }

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
                                                                                                                    $(function () {
                                                                                                                        $("#birthdate").datepicker({maxDate: '-10Y',
                                                                                                                            minDate: '-70Y',
                                                                                                                            changeMonth: true,
                                                                                                                            changeYear: true,
                                                                                                                            yearRange: '1920:2017'
                                                                                                                        });
                                                                                                                        $("#anniversary").datepicker({maxDate: 0,
                                                                                                                            minDate: '-70Y',
                                                                                                                            changeMonth: true,
                                                                                                                            changeYear: true,
                                                                                                                            yearRange: '1920:2017'
                                                                                                                        });
                                                                                                                    });

</script>

<script src="<?php echo asset_url() ?>/js/jquery.validate.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>


                                                                                                                    $(document).ready(function () {
                                                                                                                        var max_fields = 10; //maximum input boxes allowed
                                                                                                                        var wrapper = $(".input_fields_wrap"); //Fields wrapper
                                                                                                                        var add_button = $(".add_field_button"); //Add button ID

                                                                                                                        var x = 1; //initlal text box count
                                                                                                                        $(add_button).click(function (e) { //on add input button click
                                                                                                                            e.preventDefault();
                                                                                                                            if (x < max_fields) { //max input box allowed
                                                                                                                                x++; //text box increment
                                                                                                                                $(wrapper).append('<div><input name="strat_name" id="stn' + x + 'd" placeholder="Enter Strategy Name" type="text"><textarea id="std' + x + 'd" placeholder="Enter Busines Strategy description" name="business_strategy"></textarea> <input type="file" id="stv' + x + 'd" name="business_strat_video"><input type="hidden" value="" id="oi' + x + 'd"  name="old_id"><input type="hidden" value="" id="of' + x + 'd" name="old_file"><a href="#" class="remove_field btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> Remove </i></a><a href="javascript:;" onclick="updateStrat(&#34;' + x + 'd&#34;);" class="btn btn-success btn-small"><i class="btn-icon-only icon-remove"> Update </i></a></div>'); //add input box
                                                                                                                            }
                                                                                                                        });

                                                                                                                        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                                                                                                                            e.preventDefault();
                                                                                                                            $(this).parent('div').remove();
                                                                                                                            x--;
                                                                                                                        })
                                                                                                                    });

                                                                                                                    $(document).ready(function () {
                                                                                                                        $('#updatevcard').on('click', function (e) {
                                                                                                                            e.preventDefault();
                                                                                                                            $('#updatevcard').attr('disabled', true);
                                                                                                                            $('#updatevcard').val('Updating data...');
                                                                                                                            var url = base_url + "update-vcard"; // the script where you handle the form input.

                                                                                                                            var formData = new FormData($("#frmstep-1")[0]);
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
                                                                                                                                    $('#updatevcard').attr('disabled', false);
                                                                                                                                    $('#updatevcard').val('Submit');
                                                                                                                                    if (data.status === 1) {

                                                                                                                                        $(".frmerror").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + data.msg + '</div>');
                                                                                                                                        $("html, body").animate({
                                                                                                                                            scrollTop: 0
                                                                                                                                        }, 600);
                                                                                                                                        return true;
                                                                                                                                    } else {
                                                                                                                                        $(".frmerror").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + data.msg + '</div>');
                                                                                                                                        $("html, body").animate({
                                                                                                                                            scrollTop: 0
                                                                                                                                        }, 600);
                                                                                                                                        return false;
                                                                                                                                    }
                                                                                                                                }
                                                                                                                            });

                                                                                                                        });







                                                                                                                    });

                                                                                                                    function updateStrat(val) {
                                                                                                                        //e.preventDefault();

                                                                                                                        var url = base_url + "frontend/dashboard/updateStrategy/"; // the script where you handle the form input.
                                                                                                                        var file_data = $("#stv" + val).prop("files")[0];   // Getting the properties of file from file field
                                                                                                                        var form_data = new FormData();                  // Creating object of FormData class
                                                                                                                        form_data.append("video", file_data);             // Appending parameter named file with properties of file_field to form_data
                                                                                                                        form_data.append("strat_name", $("#stn" + val).val());
                                                                                                                        form_data.append("strat_desc", $("#std" + val).val());
                                                                                                                        form_data.append("edit_id", $("#oi" + val).val());
                                                                                                                        form_data.append("old_file", $("#of" + val).val());
                                                                                                                        $('.msg').text('Uploading in progress...');
                                                                                                                        //alert(form_data);
                                                                                                                        $.ajax({
                                                                                                                            type: "POST",
                                                                                                                            url: url,
                                                                                                                            data: form_data,
                                                                                                                            //cache: false,
                                                                                                                            contentType: false,
                                                                                                                            processData: false,
                                                                                                                            mimeType: "multipart/form-data",
                                                                                                                            dataType: 'json',
                                                                                                                            xhr: function () {
                                                                                                                                var xhr = new window.XMLHttpRequest();
                                                                                                                                xhr.upload.addEventListener("progress", function (evt) {
                                                                                                                                    if (evt.lengthComputable) {
                                                                                                                                        var percentComplete = evt.loaded / evt.total;
                                                                                                                                        percentComplete = parseInt(percentComplete * 100);
                                                                                                                                        $('.myprogress').text(percentComplete + '%');
                                                                                                                                        $('.myprogress').css('width', percentComplete + '%');
                                                                                                                                    }
                                                                                                                                }, false);
                                                                                                                                return xhr;
                                                                                                                            },
                                                                                                                            success: function (data)
                                                                                                                            {
                                                                                                                                if (data.status === 1) {

                                                                                                                                    $(".straterror").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + data.msg + '</div>');

                                                                                                                                    return true;
                                                                                                                                } else {
                                                                                                                                    $(".straterror").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + data.msg + '</div>');

                                                                                                                                    return false;
                                                                                                                                }
                                                                                                                            }
                                                                                                                        });
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
                                                                                                                                $(wrapper).append('<div><input type="text" placeholder="Enter tab name" name="tab_name_more[]"/><input type="text" placeholder="Enter link" name="tab_val_more[]"/><a href="#" class="remove_field1">Remove</a></div>'); //add input box
                                                                                                                            } else {
                                                                                                                                alert("You can not add more tabs.");
                                                                                                                            }
                                                                                                                        });

                                                                                                                        $(wrapper).on("click", ".remove_field1", function (e) { //user click on remove text
                                                                                                                            e.preventDefault();
                                                                                                                            $(this).parent('div').remove();
                                                                                                                            x--;
                                                                                                                        })
                                                                                                                    });
                                                                                                                    function removetabs(id) {
                                                                                                                        //alert(id);
                                                                                                                        $("#" + id).parent('div').remove();
                                                                                                                    }
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
                                                                                                                        }
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
                $(".frmerror").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>Please Upload only mp4, 3gp, mpeg, avi file</div>');
//                   alert("Sorry!! Upload only mp4, 3gp, mpeg, avi file");
                // Clear fileuload control selected file
                $("html, body").animate({
                    scrollTop: 0
                }, 600);
                $(this).replaceWith($(this).val('').clone(true));
                return false;
            } else {
                // Check and restrict the file size to 32 KB.
                if ($(this).get(0).files[0].size > (10485760)) {
                    $(".frmerror").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>Sorry!! Max allowed file size is 10MB</div>');
                    $("html, body").animate({
                        scrollTop: 0
                    }, 600);
                    // Clear fileuload control selected file
                    $(this).replaceWith($(this).val('').clone(true));
                    //Disable Submit Button
                    return false;
                } else {
                    return true;
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
                $(".frmerror").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>Sorry!! Upload only jpg, jpeg, gif, png file</div>');
                $("html, body").animate({
                    scrollTop: 0
                }, 600);
                // Clear fileuload control selected file
                $(this).replaceWith($(this).val('').clone(true));
                return false;
            } else {
                // Check and restrict the file size to 32 KB.
                if ($(this).get(0).files[0].size > (1048576)) {
                    $(".frmerror").html('<div class="alert alert-danger"><button type="button" class="close btn btn-danger btn-small" data-dismiss="alert"><i class="btn-icon-only icon-remove"> Delete </i></button><strong>Sorry!! Max allowed file size is 1MB</div>');
                    $("html, body").animate({
                        scrollTop: 0
                    }, 600);
                    // Clear fileuload control selected file
                    $(this).replaceWith($(this).val('').clone(true));
                    //Disable Submit Button
                    return false;
                } else {
                    return true;
                }
            }
        });
    });
</script>