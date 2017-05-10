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
                                                            <textarea type="text" name="msg_body" id="msgbody" maxlength="450" class="mirror" rows="4" cols="50" placeholder="Type Message Here..."></textarea> 
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

<!--                                                        <label class="checkbox inline instructions">
                                                            <input type="checkbox"> Append Help and Stop instructions
                                                        </label>-->


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
                                                        <?php foreach ($optindata as $opt) { ?>
                                                            <label class="checkbox inline">
                                                                <input type="checkbox" value="<?php echo $opt['id']; ?>" name="list_name[]"> <?php echo $opt['list_name']; ?>
                                                            </label><br>
                                                        <?php } ?>

                                                        </div>

                                                    </div>		<!-- /controls -->		
                                                </div> <!-- /control-group -->


                                                <div class="control-group">											
                                                    <label class="control-label" for="username">Add Number:</label>
                                                    <div class="controls">
                                                        <input type="text"  name="to_additional_number" class="span4" id="username" value="<?php if(isset($phone) && $phone !='') echo decode_url($phone)?>">

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
                                                            <input type="radio" id="schedule" value="schedule" name="send_time"> Scheduled
                                                        </label>
                                                        <div id="scedule_option" style="display:none">
                                                            <input type="text" name="schedule_time" id="schedule_sms_date">
                                                            <p><label class="checkbox inline">
                                                                    <input type="checkbox" name="is_recurring" value="1" id="recurring">Recurring
                                                                </label>
                                                            </p>
                                                        </div>
                                                        <div id="recurring_option" style="display:none">
                                                            <select name="frequency" size="1">
                                                                <option>Select</option>
                                                                <option value="1">Daily</option>
                                                                <option value="2" selected="selected">Weekly</option>
                                                                <option value="3">Biweekly</option>
                                                                <option value="4">Monthly</option>
                                                                <option value="5">Quarterly</option>
                                                                <option value="6">Annualy</option>
                                                            </select>
                                                            Ends on <input type="text" name="endon" id="endon">
                                                            <input type="checkbox" name="ongoing" value="1" id="ongoing">Ongoing
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
                                                    <button type="submit" id="submitfrm" class="btn btn-primary">Send</button> 
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
                                                <script src="<?php echo asset_url() ?>/js/jquery.validate.js"></script>
                                                <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.css">
                                                <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
                                                <script src="<?php echo asset_url() ?>inner/js/jquery-1.7.2.min.js"></script>
                                                <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.js"></script>
                                                <script src="<?php echo asset_url() ?>inner/js/formjs/textmsg.js"></script>
<script>
        $(document).ready(function(){
    $('input[name="send_time"]').click(function(){
        var inputValue = $(this).attr("value");
        if(inputValue === 'schedule'){
            $("#scedule_option").show();
        }else{
            $("#scedule_option").hide();
             $("#recurring_option").hide();
        }
    });
});
</script>