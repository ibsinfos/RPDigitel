<style>
    .msg_dest {
        height: 64px;
        overflow-y: scroll;
        width: 175px;
        border: 1px solid #ccc;
        padding: 10px;
    }
</style>
<div class="main">

    <div class="main-inner">

        <div class="container">

            <div class="row">

                <div class="span12">      		

                    <div class="widget ">

                        <div class="widget-header">
                            <i class="icon-user"></i>
                            <h3>Your Account</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">



                            <div class="tabbable">


                                <br>

                                <div id="Text_Message_Form">
                                    <div class="submit_status"></div>
                                    <div class="" id="formcontrols">
                                        <form id="send-text-msg" class="form-horizontal">
                                            <fieldset>
                                                <div class="span6">
                                                    <h3>1. Insert a Message</h3>
                                                    <br>

                                                    <div class="control-group">											
                                                        <label class="control-label" for="radiobtns">Template</label>

                                                        <div class="controls">

                                                            <div class="Theme_DropDown">

                                                                <select name="template_name" id="templates" onchange="changeTempContent(this.value)">
                                                                    <option value="">Select Template</option>
                                                                    <?php foreach ($sms_templates as $temp) { ?>
                                                                        <option value="<?php echo $temp['id'] . "@" . $temp['template_body']; ?>"><?php echo $temp['template_name']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>">
                                                            </div>

                                                            <div class="Reload_Button">
                                                                <button id="btndupdatetemplate">Update</button>
                                                            </div>


                                                            <div class="Delete_Button">
                                                                <button id="btndeletetemplate">Delete</button>
                                                            </div>

                                                        </div>	<!-- /controls -->			
                                                    </div>

                                                    <div class="control-group">											
                                                        <label class="control-label" for="radiobtns">New Template Name:</label>

                                                        <div class="controls">

                                                            <div class="Theme_DropDown">

                                                                <input type="text" name="save_new_template" class="span3" id="template_name" value="">
                                                            </div>

                                                            <div class="Reload_Button">
                                                                <button id="btnnewtemplate">Save as  New</button>
                                                            </div>

                                                        </div>	<!-- /controls -->			
                                                    </div>






                                                    <div class="control-group">											
                                                        <label class="control-label" for="firstname">Insert your text message here:</label>
                                                        <div class="controls">
                                                            <textarea type="text"  name="msg_body" id="msgbody" maxlength="450" class="mirror" rows="4" cols="50" placeholder="Type Message Here..."><?php echo $data[0]['text_body'] ?></textarea> 
                                                            <p>*Merge Tags</p>
                                                        </div>
                                                        <!-- /controls -->				



                                                    </div> <!-- /control-group -->


                                                    <div class="control-group url_Converter">											
                                                        <label class="control-label" for="lastname">URL:</label>
                                                        <div class="controls">
                                                            <input type="text" id="longurl" class="span2" id="lastname" value="">

                                                        </div>

                                                        <div class="Reload_Button">
                                                            <button id="getshorturl">Shorten and Insert</button>
                                                        </div>
                                                        <br><br>

                                                        <label class="checkbox inline instructions">
                                                            <input type="checkbox"> Append Help and Stop instructions
                                                        </label>


                                                        <!-- /controls -->				
                                                    </div> 
                                                    <!-- /control-group -->
                                                </div>
                                                <div class="span5 Text_placement">

                                                    <div class="Mobile_Mirror_Text">
                                                        <textarea class="mirror" maxlength="450" placeholder="Type Message Here..." disabled></textarea>
                                                    </div>

                                                    <div class="Mobile_View">
                                                        <img src="<?php echo asset_url() ?>img/Mobile.png">
                                                    </div>
                                                    <p>Character Count : <span id="charcount">0</span> (Limited to 450)</p>
                                                    <p id="msgcount"></p>

                                                </div>
                                                <div class="clearfix"></div>
                                                <br><hr><br>


                                                <h3>2. Message Destination</h3>
                                                <br><br>


                                                <div class="control-group">											
                                                    <label class="control-label">Opt-in lists:</label>


                                                    <div class="controls">
                                                        <div class="msg_dest">
                                                        <?php
                                                        $ol = unserialize($data[0]['optin_list']);
                                                        foreach ($optindata as $opt) {
                                                            if (in_array($opt['id'], $ol))
                                                                $selected = 'checked';
                                                            else
                                                                $selected = '';
                                                            ?>
                                                            <label class="checkbox inline">
                                                                <input type="checkbox" <?php echo $selected; ?> value="<?php echo $opt['id']; ?>" name="list_name[]"> <?php echo $opt['list_name']; ?>
                                                            </label>
                                                            <br>
                                                        <?php } ?>

                                                        </div>

                                                    </div>		<!-- /controls -->		
                                                </div> <!-- /control-group -->


                                                <div class="control-group">											
                                                    <label class="control-label" for="username">Add Number:</label>
                                                    <div class="controls">
                                                        <input type="text" name="to_additional_number" value="<?php echo $data[0]['additional_number'] ?>" class="span4" id="username" value="">

                                                    </div> <!-- /controls -->				
                                                </div>

                                                <br><hr><br>

                                                <h3>3. Send Method</h3>
                                                <br>



                                                <!-- /control-group -->


                                                <!-- /control-group -->



                                                <!-- /control-group -->



                                                <div class="control-group">											
                                                    <label class="control-label">Method to Send:</label>


                                                    <div class="controls">
                                                        <label class="radio inline">
                                                            <input type="radio" value="send_now" name="send_time"> Send Now
                                                        </label>

                                                        <label class="radio inline">
                                                            <input type="radio" checked id="schedule" value="schedule" name="send_time"> Scheduled
                                                        </label>
                                                        <div id="scedule_option" >
                                                            <input type="text" value="<?php echo $data[0]['send_time'] ?>" name="schedule_time" id="schedule_sms_date">
                                                            <p><label class="checkbox inline">
                                                                    <input type="checkbox" <?php if ($data[0]['is_recurring'] == '1') echo 'checked'; ?> name="is_recurring" value="1" id="recurring">Recurring
                                                                </label>
                                                            </p>
                                                        </div>
                                                        <div id="recurring_option" <?php
                                                        if ($data[0]['is_recurring'] == '1')
                                                            echo "style='display:block'";
                                                        else
                                                            echo "style='display:none'"
                                                            ?>>
                                                            <select name="frequency" size="1">
                                                                <option>Select</option>
                                                                <option <?php if ($data[0]['frequency'] == '1') echo "selected='selected'"; ?> value="1">Daily</option>
                                                                <option <?php if ($data[0]['frequency'] == '2') echo "selected='selected'"; ?> value="2">Weekly</option>
                                                                <option <?php if ($data[0]['frequency'] == '3') echo "selected='selected'"; ?> value="3">Biweekly</option>
                                                                <option <?php if ($data[0]['frequency'] == '4') echo "selected='selected'"; ?> value="4">Monthly</option>
                                                                <option <?php if ($data[0]['frequency'] == '5') echo "selected='selected'"; ?> value="5">Quarterly</option>
                                                                <option <?php if ($data[0]['frequency'] == '6') echo "selected='selected'"; ?> value="6">Annually</option>
                                                            </select>
                                                            Ends on <input type="text" <?php if ($data[0]['is_ongoing'] == '1') echo "readonly" ?> value="<?php echo $data[0]['endon'] ?>" name="endon" id="endon">
                                                            <input type="checkbox" <?php if ($data[0]['is_ongoing'] == '1') echo "checked"; ?> name="ongoing" value="1" id="ongoing">Ongoing
                                                        </div>
                                                    </div>	<!-- /controls -->			
                                                </div> <!-- /control-group -->




                                                <!-- /control-group -->





                                                <!-- /control-group -->





                                                <!-- /control-group -->





                                                <!-- /control-group -->



                                                <br />


                                                <div class="form-actions">
                                                    <!--<button  href="#myModal" role="button" data-toggle="modal" type="submit" class="btn">Audience</button>-->
                                                    <button type="submit" id="edit_submitfrm" class="btn btn-primary">Update</button> 
                                                   <button type="button" onclick="javascript:window.history.back();" class="btn">Cancel</button>
                                                </div> <!-- /form-actions -->
                                            </fieldset>
                                        </form>
                                    </div>



                                </div>


                            </div>


<!--                            <div id="myModal" class="scroll_Add_Text modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                    <h3 id="myModalLabel">Target Your Audience</h3>
                                </div>


                                <br>
                                <div class="control-group">											
                                    <label class="control-label2" for="password1">Opt-In Date:</label>
                                    <div class="controls">
                                        <input type="Date" class="span2" id="Date1" placeholder="mm/dd/yyyy">
                                        <input type="date" class="span2" id="Date2" placeholder="mm/dd/yyyy">
                                    </div>  /controls 				
                                </div>


                                <div class="control-group">											
                                    <label class="control-label2" for="password1">Opt-In Date:</label>
                                    <div class="controls">
                                        <input type="date" class="span2" id="password1" placeholder="mm/dd/yyyy">
                                        <input type="date" class="span2" id="password1" placeholder="mm/dd/yyyy">
                                    </div>  /controls 				
                                </div>


                                <div class="control-group">											
                                    <label class="control-label2" for="radiobtns">Birth Month:</label>

                                    <div class="controls">


                                        <div class="Theme_DropDown">

                                            <select>
                                                <option>Select</option>
                                                <option>January</option>
                                                <option>February</option>
                                                <option>March</option>
                                                <option>April</option>
                                                <option>May</option>
                                                <option>June</option>


                                            </select>
                                        </div>






                                    </div>	 /controls 			
                                </div>


                                <div class="control-group">											
                                    <label class="control-label2" for="radiobtns">State:</label>

                                    <div class="controls">


                                        <div class="Theme_DropDown">

                                            <select>
                                                <option>Select</option>
                                                <option>Arkansas</option>
                                                <option>California</option>
                                                <option>Colorado</option>
                                                <option>Florida</option>
                                                <option>Iowa</option>
                                                <option>Kentucy</option>
                                                <option>Maryland</option>


                                            </select>
                                        </div>






                                    </div>	 /controls 			
                                </div>


                                <div class="control-group">											
                                    <label class="control-label2" for="password1">Zip Code:</label>
                                    <div class="controls">
                                        <input type="date" class="span2" id="password1" placeholder="mm/dd/yyyy">

                                    </div>  /controls 				
                                </div>


                                <div class="control-group">											
                                    <label class="control-label2" for="password1">Area Code:</label>
                                    <div class="controls">
                                        <input type="date" class="span2" id="password1" placeholder="mm/dd/yyyy">

                                    </div>  /controls 				
                                </div>


                                <div class="control-group">											
                                    <label class="control-label2" for="radiobtns">Gender:</label>

                                    <div class="controls">


                                        <div class="Theme_DropDown">

                                            <select>
                                                <option>Select</option>
                                                <option>Male</option>
                                                <option>Female</option>



                                            </select>
                                        </div>






                                    </div>	 /controls 			
                                </div>


                                <div class="control-group">											
                                    <label class="control-label2" for="password1">Number of kids:</label>
                                    <div class="controls">
                                        <input type="date" class="span2" id="password1" placeholder="From">
                                        <input type="date" class="span2" id="password1" placeholder="To">
                                    </div>  /controls 				
                                </div>





                                <div class="control-group">											
                                    <label class="control-label2" for="radiobtns">Family Status:</label>

                                    <div class="controls">


                                        <div class="Theme_DropDown">

                                            <select>
                                                <option>Select</option>
                                                <option>Married</option>
                                                <option>Single</option>



                                            </select>
                                        </div>






                                    </div>	 /controls 			
                                </div>


                                <div class="control-group">											
                                    <label class="control-label2" for="radiobtns">Carrier:</label>

                                    <div class="controls">


                                        <div class="Theme_DropDown">

                                            <select>
                                                <option>Select</option>
                                                <option>Virgin Mobile</option>
                                                <option>Truphone</option>
                                                <option>TSR Wireless</option>
                                                <option>Voce</option>
                                                <option>United Wireless</option>
                                                <option>Western Wireless</option>
                                                <option>T-Mobile</option>



                                            </select>
                                        </div>


                                        <div class="Theme_DropDown">

                                            <select>
                                                <option>Select</option>
                                                <option>Send to this carrier only</option>
                                                <option>Send to all but this carrier</option>



                                            </select>
                                        </div>






                                    </div>	 /controls 			
                                </div>


                                <div class="control-group">											
                                    <label class="control-label2" for="password1">Company:</label>
                                    <div class="controls">
                                        <input type="date" class="span2" id="password1" placeholder="From">
                                        <input type="date" class="span2" id="password1" placeholder="To">
                                    </div>  /controls 				
                                </div>



                                <div class="control-group">											
                                    <label class="control-label2" for="password1">Notes:</label>
                                    <div class="controls">
                                        <input type="date" class="span2" id="password1" placeholder="From">
                                        <input type="date" class="span2" id="password1" placeholder="To">
                                    </div>  /controls 				
                                </div>




                                <br>

                                <div class="control-group calculator">
                                    <div class="control-label2">
                                        <button>Calculate</button>	  
                                    </div>

                                    <div class="controls">
                                        <h4>Estimated Audience:<h4>
                                                </div>
                                                </div>
                                                <br>

                                                <div class="modal-footer">
                                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                                    <a href="#"><button class="btn btn-primary">Save changes</button>
                                                </div>
                                                </div>-->


                                                </div> <!-- /widget-content -->

                                                </div> <!-- /widget -->

                                                </div> <!-- /span8 -->




                                                </div> <!-- /row -->

                                                </div> <!-- /container -->

                                                </div> <!-- /main-inner -->

                                                </div> <!-- /main -->
                                                <!--<script src="<?php echo asset_url() ?>inner/js/jquery-1.7.2.min.js"></script>-->
                                                <!--<script src="<?php echo asset_url() ?>/js/jquery.validate.js"></script>-->
                                                <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.css">
                                                <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
                                                <script src="<?php echo asset_url() ?>inner/js/jquery-1.7.2.min.js"></script>
                                                <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.js"></script>
                                                <script src="<?php echo asset_url() ?>inner/js/formjs/textmsg.js"></script>
