<style>
    #colorSelector {
        position: relative;
        width: 36px;
        height: 36px;
        background: url(<?php echo base_url() ?>media/inner/img/select.png);
    }

</style>
<!--main content start-->

<section id="main-content">

    <section class="wrapper site-min-height">



        <div class="row">

            <div class="col-md-12">

                <section class="panel">

                    <div class="bio-graph-heading project-heading">

                        <strong> Edit User Details</strong>

                    </div>

                    <div class="panel-body bio-graph-info">

                        <!--<h1>New Dashboard BS3 </h1>-->

                        <div class="row p-details">

                            <span class="frmerror"></span>
                            <form class="cmxform form-horizontal" id="frmstep-1" enctype="multipart/form-data" method="post" >
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                                    Basic Information</a>
                                            </h4>
                                        </div>
                                        <div id="collapse1" class="panel-collapse collapse in">
                                            <section class="panel">
                                                <div class="panel-body">
                                                    <div class=" form">

                                                        <div class="form-group ">
                                                            <label for="cname" class="control-label col-lg-2">First Name</label>
                                                            <div class="col-lg-5">
                                                                <input  maxlength="100" name="first_name" id="first_name" required type="text"  value="<?php echo $user_data[0]['first_name']; ?>" class="form-control" placeholder="Enter First Name"  />
                                                                <input type="hidden" value="<?php echo $user_data[0]['id']; ?>" name="userid">
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label for="cemail" class="control-label col-lg-2">Last Name</label>
                                                            <div class="col-lg-5">
                                                                <input maxlength="100" name="last_name" id="last_name" type="text"  value="<?php echo $user_data[0]['last_name']; ?>" class="form-control" placeholder="Enter Last Name" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label for="curl" class="control-label col-lg-2">Mobile</label>
                                                            <div class="col-lg-5">
                                                                <input required="required" name="mobile" id="mobile" class="form-control"  value="<?php echo $user_data[0]['mobile']; ?>" placeholder="Enter your mobile number" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label for="curl" class="control-label col-lg-2">Email Address</label>
                                                            <div class="col-lg-5">
                                                                <input required="required" name="email" id="email" class="form-control"  value="<?php echo $user_data[0]['email']; ?>" placeholder="Enter your email id" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label for="curl" class="control-label col-lg-2">User Image</label>
                                                            <div class="col-lg-5">
                                                                <input required="required" name="user_image" type="file" class="form-control"  /><br>
                                                                <img src="<?php echo $user_data[0]['user_image']; ?>" width="200px">
                                                                <input type="hidden" name="user_image_old" value="<?php echo $user_data[0]['user_image']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label for="curl" class="control-label col-lg-2">Company Logo</label>
                                                            <div class="col-lg-5">
                                                                <input required="required" name="company_logo" type="file" class="form-control"  /><br>
                                                                <img src="<?php echo $user_data[0]['company_logo']; ?>" width="250px">
                                                                <input type="hidden" name="company_logo_old" value="<?php echo $user_data[0]['company_logo']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label for="curl" class="control-label col-lg-2">Tab Color</label>
                                                            <div class="col-lg-5">
                                                                <input type='hidden' style="width:25px" value="<?php echo $user_data[0]['theme_color']; ?>" size='10' id="theme_color" name='theme_color'>
                                                                <div id="colorSelector" style="background-color: <?php echo $user_data[0]['theme_color']; ?>"><div ></div></div>
                                                            </div>
                                                        </div>



                                                    </div>

                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                                    Work Information</a>
                                            </h4>
                                        </div>
                                        <div id="collapse2" class="panel-collapse collapse">
                                            <section class="panel">
                                                <div class="panel-body">
                                                    <div class="form-group ">
                                                        <label for="cname" class="control-label col-lg-2">Company Name</label>
                                                        <div class="col-lg-5">
                                                            <input type="hidden" value="<?php echo $user_data[0]['id']; ?>" name="id">
                                                            <input type="text" id="company_name" value="<?php echo $user_data[0]['company_name']; ?>" name="company_name" class="form-control span6" placeholder="Enter Company Name" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="cname" class="control-label col-lg-2">Job Title</label>
                                                        <div class="col-lg-5">
                                                            <input id="job_title" name="job_title" value="<?php echo $user_data[0]['job_title']; ?>" type="text" required="required" class="span6 form-control" placeholder="Enter Job title"  />
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="cname" class="control-label col-lg-2">Phone</label>
                                                        <div class="col-lg-5">
                                                            <input id="company_phone" name="company_phone" value="<?php echo $user_data[0]['work_phone']; ?>" type="text" required="required" class="span6 form-control" placeholder="Enter Work Phone"  />
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="cname" class="control-label col-lg-2">Website</label>
                                                        <div class="col-lg-5">
                                                            <input id="company_website" name="company_website" value="<?php echo $user_data[0]['work_website']; ?>" type="text" required="required" class="span6 form-control" placeholder="Enter work website"  />
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="cname" class="control-label col-lg-2">Address</label>
                                                        <div class="col-lg-5">
                                                            <textarea id="work_address" name="work_address" type="text" required="required" class="span6 form-control" placeholder="Enter work address" ><?php echo $user_data[0]['work_address']; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="cname" class="control-label col-lg-2">Country / Region</label>
                                                        <div class="col-lg-5">
                                                            <select class="span6 form-control" name="work_country" onchange="selectState1(this.options[this.selectedIndex].value)">
                                                                <option value="-1">Select country</option>
                                                                <?php
                                                                //echo $user_data[0]['work_country']; die();
                                                                //if($user_data[0]['work_country'] != NULL || $user_data[0]['work_country'] !=''){
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
                                                                // }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="cname" class="control-label col-lg-2">State</label>
                                                        <div class="col-lg-5">
                                                            <select name="work_state" id="state_dropdown1" class="span6 form-control" onchange="selectCity1(this.options[this.selectedIndex].value)">
                                                                <option value="">Select state</option>
                                                                <?php
                                                                if ($user_data[0]['work_state'] != NULL || $user_data[0]['work_state'] != '') {
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
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="cname" class="control-label col-lg-2">City</label>
                                                        <div class="col-lg-5">
                                                            <select name="work_city" class="span6 form-control" id="city_dropdown1">
                                                                <option value="">Select City</option>
                                                                <?php
                                                                if ($user_data[0]['work_city'] != NULL || $user_data[0]['work_city'] != '') {
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
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="cname" class="control-label col-lg-2">Postal Code</label>
                                                        <div class="col-lg-5">
                                                            <input id="work_postal_code" value="<?php echo $user_data[0]['work_postal_code']; ?>" name="work_postal_code" type="text" required="required" class="span6 form-control" placeholder="Enter Company Postal code"  />
                                                        </div>
                                                    </div>

                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                                    Personal / Home Information</a>
                                            </h4>
                                        </div>
                                        <div id="collapse3" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="form-group ">
                                                    <label for="cname" class="control-label col-lg-2">Phone</label>
                                                    <div class="col-lg-5">
                                                        <input type="hidden" value="<?php echo $user_data[0]['id']; ?>"  name="id">
                                                        <input id="home_phone" value="<?php echo $user_data[0]['home_phone']; ?>"  name="home_phone" type="text" required="required" class="span6 form-control" placeholder="Enter home phone" />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="cname" class="control-label col-lg-2">Personal Title</label>
                                                    <div class="col-lg-5">
                                                        <select class="span6 form-control" name="personal_title">
                                                            <option value="">Select Personal Title</option>
                                                            <option value="Mr." <?php if ($user_data[0]['personal_title'] == 'Mr.') echo 'selected'; ?>>Mr</option>
                                                            <option value="Miss." <?php if ($user_data[0]['personal_title'] == 'Miss.') echo 'selected'; ?>>Miss</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="cname" class="control-label col-lg-2">Nick Name</label>
                                                    <div class="col-lg-5">
                                                        <input id="nick_name" value="<?php echo $user_data[0]['nick_name']; ?>" name="nick_name" type="text" required="required" class="span6 form-control" placeholder="Enter Nick Name"  />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="cname" class="control-label col-lg-2">Address</label>
                                                    <div class="col-lg-5">
                                                        <textarea id="home_address" name="home_address" type="text" required="required" class="span6 form-control" placeholder="Enter home address" ><?php echo $user_data[0]['home_address']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="cname" class="control-label col-lg-2">Country /Region</label>
                                                    <div class="col-lg-5">
                                                        <select class="span6 form-control" name="home_country" onchange="selectState(this.options[this.selectedIndex].value)">
                                                            <option value="-1">Select country</option>
                                                            <?php
                                                            //if($user_data[0]['home_country'] !='' || $user_data[0]['home_country'] != NULL){
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
                                                            // }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="cname" class="control-label col-lg-2">State</label>
                                                    <div class="col-lg-5">
                                                        <select id="state_dropdown" name="home_state" class="span6 form-control" onchange="selectCity(this.options[this.selectedIndex].value)">
                                                            <option value="">Select State</option>
                                                            <?php
                                                            if ($user_data[0]['home_state'] != NULL || $user_data[0]['home_state'] != '') {
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
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="cname" class="control-label col-lg-2">City</label>
                                                    <div class="col-lg-5">
                                                        <select class="span6 form-control" name="home_city" id="city_dropdown">
                                                            <option value="">Select City</option>
                                                            <?php
                                                            if ($user_data[0]['home_city'] != NULL || $user_data[0]['home_city'] != '') {
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
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="cname" class="control-label col-lg-2">Postal Code</label>
                                                    <div class="col-lg-5">
                                                        <input id="home_postal_code" value="<?php echo $user_data[0]['home_postal_code']; ?>" name="home_postal_code" type="text" class="span6 form-control" placeholder="Enter home postal code"  />

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                                    Event Information</a>
                                            </h4>
                                        </div>
                                        <div id="collapse4" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="form-group ">
                                                    <label for="cname" class="control-label col-lg-2">Gender</label>
                                                    <div class="col-lg-5">
                                                        <select class="span6 form-control" name="gender">
                                                            <option value="">Select Genders</option>
                                                            <option value="male" <?php if ($user_data[0]['gender'] == 'male') echo 'selected'; ?>>Male</option>
                                                            <option value="female" <?php if ($user_data[0]['gender'] == 'female') echo 'selected'; ?>>Female</option>
                                                        </select>
                                                        <input type="hidden" value="<?php echo $user_data[0]['id']; ?>"  name="id">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="cname" class="control-label col-lg-2">Birthday</label>
                                                    <div class="col-lg-5">
                                                        <input id="birthdate" value="<?php echo date("Y-m-d",strtotime($user_data[0]['birthday'])); ?>" name="birthday" type="text" required="required" class="span6 form-control" placeholder="Enter birth date"  />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="cname" class="control-label col-lg-2">Anniversary</label>
                                                    <div class="col-lg-5">
                                                        <input id="anniversary" name="anniversary" value="<?php echo date("Y-m-d",strtotime($user_data[0]['anniversary'])); ?>" type="text" required="required" class="span6 form-control" placeholder="Select anniversary date"  />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="cname" class="control-label col-lg-2">Address</label>
                                                    <div class="col-lg-5">
                                                        <textarea id="home_address" name="home_address" type="text" required="required" class="span6 form-control" placeholder="Enter home address" ><?php echo $user_data[0]['home_address']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="cname" class="control-label col-lg-2">Notes</label>
                                                    <div class="col-lg-5">
                                                        <textarea id="notes" name="notes" type="text" required="required" class="span6 form-control" placeholder="Enter Notes" ><?php echo $user_data[0]['notes']; ?></textarea>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                                                    Why Choose Section</a>
                                            </h4>
                                        </div>
                                        <div id="collapse5" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="form-group ">
                                                    <label for="cname" class="control-label col-lg-2">Upload Why Choose Video</label>
                                                    <div class="col-lg-5">
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
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="cname" class="control-label col-lg-2">Upload Why Choose Image</label>
                                                    <div class="col-lg-5">
                                                        <input id="why_choose_image" name="why_choose_image" type="file"  class="span6 form-control" />
                                                        <p class="help-text">Upload only .jpg, .jpeg , .gif, .png files</p>
                                                        <p class="help-text">Image dimension should be 1024x768</p>
                                                        <p class="help-text">Image size should be 1MB</p>
                                                        <img width="100px" src="<?php echo $user_data[0]['why_choose_image']; ?>">
                                                        <input type="hidden" name="why_choose_image_old" value="<?php echo $user_data[0]['why_choose_image']; ?>"/>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="cname" class="control-label col-lg-2">Why Choose Description</label>
                                                    <div class="col-lg-5">
                                                        <textarea id="why_choose_desc" name="why_choose_desc" type="text" required="required" class="span6 form-control" placeholder="Enter choose description" ><?php echo $user_data[0]['why_choose_desc']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="cname" class="control-label col-lg-2">Increase Your Credit Description</label>
                                                    <div class="col-lg-5">
                                                        <textarea id="why_choose_desc" name="increase_your_credit_desc" type="text" required="required" class="span6 form-control" placeholder="Enter choose description" ><?php echo $user_data[0]['increase_your_credit_desc']; ?></textarea>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">
                                                    Business Strategies Section</a>
                                            </h4>
                                        </div>
                                        <div id="collapse8" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <span class="straterror"></span>
                                                <div class="input_fields_wrap" style="text-align:center;margin-bottom:10px" >
                                                    <button class="add_field_button btn btn-success btn-small">Add More Business Strategies</button>
                                                    <?php
                                                    $sr = 0;
                                                    foreach ($business_strat as $bst) {
                                                        $sr++;
                                                        ?>

                                                        <div class="dyna_bs row" id="rmid<?php echo $sr; ?>">
                                                            <div class="col-sm-2">
                                                                <input type="hidden" id="of<?php echo $bst['id']; ?>" value="<?php echo $bst['video']; ?>" name="old_file">
                                                                <input type="text" class="form-control" name="strat_name" id="stn<?php echo $bst['id']; ?>" value="<?php echo $bst['strat_name'] ?>" placeholder="Enter Strategy Name">
                                                            </div>

                                                            <div class="col-sm-3">
                                                                <input type="hidden" id="oi<?php echo $bst['id']; ?>" value="<?php echo $bst['id']; ?>" name="old_id">
                                                                <textarea class="form-control" name="business_strategy" id="std<?php echo $bst['id']; ?>"  placeholder="Enter Busines Strategy description"><?php echo $bst['description'] ?></textarea>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <input  class="form-control" type="file" id="stv<?php echo $bst['id']; ?>"  name="business_strat_video">
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <video class="strat_video" width="100" height="100" controls>
                                                                    <source src="<?php echo $bst['video']; ?>" type="video/mp4">
                                                                    <source src="<?php echo $bst['video']; ?>" type="video/ogg">
                                                                    Your browser does not support the video tag.
                                                                </video>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <a href="javascript:;" onclick="removeStrat(<?php echo $sr; ?>,<?php echo $bst['id']; ?>)" class="btn btn-danger dropdown-toggle btn-xs"><i class="btn-icon-only icon-remove"> Delete </i></a>
                                                                <a href="javascript:;" onclick="updateStrat('<?php echo $bst['id']; ?>')" class="btn btn-success dropdown-toggle btn-xs"><i class="btn-icon-only icon-edit"> Update </i></a>        
                                                            </div>             

                                                        </div>

                                                    <?php } ?>
                                                </div>

                                                <div class="form-group ">
                                                    <label for="cname" class="control-label col-lg-2">Business Opprtunity Video</label>
                                                    <div class="col-lg-5">
                                                        <input name="business_opportunity_video" type="file"  class="span6 form-control" />
                                                        <input id="" value="<?php echo $user_data[0]['business_opportunity_video']; ?>" name="old_file" type="hidden"  class="span6 form-control" />
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <video class="strat_video" width="100" height="100" controls>
                                                            <source src="<?php echo $user_data[0]['business_opportunity_video']; ?>" type="video/mp4">
                                                            <source src="<?php echo $user_data[0]['business_opportunity_video']; ?>" type="video/ogg">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                    </div>


                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
                                                    Social Information</a>
                                            </h4>
                                        </div>
                                        <div id="collapse6" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="form-group ">
                                                    <label for="cname" class="control-label col-lg-2">Instagram</label>
                                                    <div class="col-lg-5">
                                                        <input id="twitter_link" value="<?php echo $user_data[0]['instagram_link']; ?>" name="instagram_link" type="text"  class="span6 form-control" placeholder="Enter twitter link" />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="cname" class="control-label col-lg-2">Youtube</label>
                                                    <div class="col-lg-5">
                                                        <input id="twitter_link" value="<?php echo $user_data[0]['youtube_link']; ?>" name="youtube_link" type="text"  class="span6 form-control" placeholder="Enter twitter link" />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="cname" class="control-label col-lg-2">Facebook</label>
                                                    <div class="col-lg-5">
                                                        <input type="hidden" id="hidden_down_id" value="<?php echo $user_data[0]['slug']; ?>"  name="id">
                                                        <input type="hidden" id="" value="<?php echo $user_data[0]['id']; ?>"  name="id">
                                                        <input id="facebook_link" value="<?php echo $user_data[0]['facebook_link']; ?>" name="facebook_link" type="text"  class="span6 form-control" placeholder="Enter facebook link" />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="cname" class="control-label col-lg-2">Twitter</label>
                                                    <div class="col-lg-5">
                                                        <input id="twitter_link" value="<?php echo $user_data[0]['twitter_link']; ?>" name="twitter_link" type="text"  class="span6 form-control" placeholder="Enter twitter link" />
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="cname" class="control-label col-lg-2">Linkedin</label>
                                                    <div class="col-lg-5">
                                                        <input id="linkedin_link" name="linkedin_link" value="<?php echo $user_data[0]['linkedin_link']; ?>" type="text"  class="span6 form-control" placeholder="Enter linkedin link" />
                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">
                                                    Edit vcard tabs</a>
                                            </h4>
                                        </div>
                                        <div id="collapse7" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <?php foreach ($tabs as $tab) { ?>
                                                    <div class="control-group">    										
                                                        <label class="control-label" for="firstname"></label>
                                                        <div class="controls">
                                                            <input type="hidden" name="edit_id[]" value="<?php echo $tab['id'] ?>">
                                                            <input id="linkedin_link" name="tab_name[]" value="<?php echo $tab['tab_name']; ?>" type="text"  class="span6 form-control" placeholder="Enter linkedin link" />
                                                        </div> <!-- /controls -->				
                                                    </div> <!-- /control-group -->
                                                <?php } ?>

                                                <div class="input_fields_wrap1">
                                                    <button class="add_field_button">Add More Tabs</button>

                                                    <?php foreach ($custom_tabs as $custom_tabs) { ?>
                                                        <div>
                                                            <input type="text" placeholder="Enter tab name" value="<?php echo $custom_tabs['tab_name'] ?>" name="tab_name_more[]"/><input value="<?php echo $custom_tabs['tab_val'] ?>" type="text" placeholder="Enter link" name="tab_val_more[]"/> <a href="javascript:;" id="<?php echo $custom_tabs['id'] ?>" onclick="removetabs(<?php echo $custom_tabs['id'] ?>)" class="">Remove</a> <br>
                                                        </div>
                                                    <?php } ?>
<!--<input type="text" placeholder="Enter tab name" name="tab_name_more[]"/><input type="text" placeholder="Enter link" name="tab_val_more[]"/></div>-->

                                                </div> <!-- /controls -->	



                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-5">
                                                <button class="btn btn-danger" id="updatevcard" type="button">Save</button>
                                                <!--<button class="btn btn-default" type="button">Cancel</button>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>





                        </div>



                    </div>



                </section>



            </div>

        </div>

        <!-- page end-->

    </section>

</section>

<link href="<?php echo asset_url() ?>inner/css/colorpicker.css" rel="stylesheet">
<!--main content end-->
<script type="text/javascript" language="javascript" src="<?php echo asset_url(); ?>backend/assets/advanced-datatable/media/js/jquery.js"></script>
<script src="<?php echo asset_url() ?>inner/js/colorpicker.js"></script> 
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
                                                                            $(wrapper).append('<div class="row"><div class="col-sm-2"><input name="strat_name" class="form-control" id="stn' + x + 'd" placeholder="Enter Strategy Name" type="text"></div><div class="col-sm-3"><textarea class="form-control" id="std' + x + 'd" placeholder="Enter Busines Strategy description" name="business_strategy"></textarea> </div><div class="col-sm-3"><input type="file" class="form-control" id="stv' + x + 'd" name="business_strat_video"></div><div class="col-sm-3"><input type="hidden" value="" id="oi' + x + 'd"  name="old_id"><input type="hidden" value="" id="of' + x + 'd" name="old_file"></div><div class="col-sm-3"><a href="#" class="remove_field btn btn-danger dropdown-toggle btn-xs"><i class="btn-icon-only icon-remove"> Remove </i></a><a href="javascript:;" onclick="updateStrat(&#34;' + x + 'd&#34;);" class="btn btn-success dropdown-toggle btn-xs"><i class="btn-icon-only icon-remove"> Update </i></a></div></div><p></p>'); //add input box
                                                                        }
                                                                    });

                                                                    $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                                                                        e.preventDefault();
                                                                        $(this).closest(".row").remove();
                                                                        x--;
                                                                    })
                                                                });

                                                                $(document).ready(function () {
                                                                    $('#updatevcard').on('click', function (e) {
                                                                        e.preventDefault();
                                                                        $('#updatevcard').attr('disabled', true);
                                                                        $('#updatevcard').val('Updating data...');
                                                                        var url = "<?php echo base_url() ?>backend/users/updatevCard"; // the script where you handle the form input.

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

                                                                    var url = "<?php echo base_url() ?>backend/users/updateStrategy1"; // the script where you handle the form input.
                                                                    var file_data = $("#stv" + val).prop("files")[0];   // Getting the properties of file from file field
                                                                    var form_data = new FormData();                  // Creating object of FormData class
                                                                    form_data.append("video", file_data);             // Appending parameter named file with properties of file_field to form_data
                                                                    form_data.append("strat_name", $("#stn" + val).val());
                                                                    form_data.append("userid", <?php echo $userid ?>);
                                                                    form_data.append("strat_desc", $("#std" + val).val());
                                                                    form_data.append("edit_id", $("#oi" + val).val());
                                                                    form_data.append("old_file", $("#of" + val).val());
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
                                                                    var add_button = $(".add_field_button"); //Add button ID

                                                                    var x = 1; //initlal text box count
                                                                    $(add_button).click(function (e) { //on add input button click
                                                                        e.preventDefault();
                                                                        if (x < max_fields) { //max input box allowed
                                                                            x++; //text box increment
                                                                            $(wrapper).append('<div><input type="text" placeholder="Enter tab name" name="tab_name_more[]"/><input type="text" placeholder="Enter link" name="tab_val_more[]"/><a href="#" class="remove_field1">Remove</a></div>'); //add input box
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

                                                                var downpayment1 = document.getElementById('business_opportunity_video');
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

<script type="text/javascript">

//    $(document).ready(function () {
//        var max_fields = 10; //maximum input boxes allowed
//        var wrapper = $(".input_fields_wrap"); //Fields wrapper
//        var add_button = $(".add_field_button"); //Add button ID
//
//        var x = 1; //initlal text box count
//        $(add_button).click(function (e) { //on add input button click
//            e.preventDefault();
//            if (x < max_fields) { //max input box allowed
//                x++; //text box increment
//                $(wrapper).append('<div><input name="strat_name[]" placeholder="Enter Strategy Name" type="text"><textarea placeholder="Enter Busines Strategy description" name="business_strategy[]"></textarea> <input type="file" name="business_strat_video[]"><a href="#" class="remove_field btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> Delete </i></a></a></div>'); //add input box
//            }
//        });
//
//        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
//            e.preventDefault();
//            $(this).parent('div').remove();
//            x--;
//        })
//    });

    function removeStrat(id, id1) {
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
//            alert(hex);
//            $('#colorSelector div').css('backgroundColor', '#' + hex);
            $("#colorSelector").css('background-color', '#' + hex);
            $('#theme_color').val('#' + hex);
        }
    });
</script>

<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
<link rel="stylesheet" href="<?php echo asset_url() ?>css/pikaday.css">
   <!--<link rel="stylesheet" href="<?php echo asset_url() ?>/theme.css">-->
   <!--<link rel="stylesheet" href=".<?php echo asset_url() ?>/triangle.css">-->
   <!--<link rel="stylesheet" href="<?php echo asset_url() ?>/site.css">-->
<script src="<?php echo asset_url() ?>js/pikaday.js"></script>
 
<script>


    var start_yr = new Date();
    var sy = start_yr.getFullYear() - 100;
    var sm = start_yr.getMonth();
    var sd = start_yr.getDate();
    var disable = false,
            picker = new Pikaday({
                field: document.getElementById('birthdate'),
                maxDate: new Date(start_yr.getFullYear() - 10, sm, sd),
                minDate: new Date(start_yr.getFullYear() - 100, sm, sd),
                yearRange: [sy, start_yr.getFullYear() - 10],
                onSelect: function () {
                    var date = document.createTextNode(this.getMoment().format('Do MMMM YYYY') + ' ');
                    document.getElementById('selected').appendChild(date);
                    },
                    disableDayFn: function (theDate) {
                    return disable = disable;
                }

            });
    var disable1 = false,
            picker = new Pikaday({
                field: document.getElementById('anniversary'),
                maxDate: new Date(start_yr.getFullYear(), sm, sd),
                minDate: new Date(start_yr.getFullYear() - 100, sm, sd),
                yearRange: [sy, start_yr.getFullYear()],
                disableDayFn: function (theDate) {
                    return disable1 = disable1;
                }

            });


</script>


<!--main content end--><!-- js placed at the end of the document so the pages load faster -->   <!--<script src="js/jquery.js"></script>-->
<!--common script for all pages-->
<script type="text/javascript" language="javascript" src="<?php echo asset_url(); ?>backend/assets/advanced-datatable/media/js/jquery.js"></script>
<script src="<?php echo asset_url(); ?>backend/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="<?php echo asset_url(); ?>backend/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php echo asset_url(); ?>backend/js/jquery.scrollTo.min.js"></script>
<!--<script src="<?php echo asset_url(); ?>backend/js/jquery.nicescroll.js" type="text/javascript"></script>-->
<script src="<?php echo asset_url(); ?>backend/js/respond.min.js" ></script>
<script type="text/javascript" language="javascript" src="<?php echo asset_url(); ?>backend/assets/advanced-datatable/media/js/jquery.dataTables.js"></script>


<!--common script for all pages-->
<script src="<?php echo asset_url(); ?>backend/js/common-scripts.js"></script>

<script src="<?php echo asset_url(); ?>backend/js/advanced-form-components.js"></script>

<script type="text/javascript" src="<?php echo asset_url(); ?>backend/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo asset_url(); ?>backend/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script>
    $(document).ready(function () {
        $('#example1').DataTable();
    });
</script>







