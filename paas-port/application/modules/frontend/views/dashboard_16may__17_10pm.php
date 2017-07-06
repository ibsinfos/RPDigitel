<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">

                <div id="features">

                    <div class="span8 Features">
                        <div class="widget-header"> <i class="icon-bookmark"></i>
                            <h3>Features</h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                            <div class="shortcuts"> 
                                <a href="<?php echo base_url() ?>textmsg" class="shortcut"><i class="fa fa-commenting-o" aria-hidden="true"></i><span class="shortcut-label">Text Message</span> </a>
<!--Added by ranjit on 26 april 2017 to add one option[under dashboard menu] on dashbord page-->
								<a href="<?php echo base_url() ?>emailcampaign" class="shortcut"><i class="fa fa-commenting-o" aria-hidden="true"></i><span class="shortcut-label">E-mail</span> </a>
                                <a href="<?php echo base_url() ?>autoresponder" class="shortcut"><i class="fa fa-reply" aria-hidden="true"></i><span class="shortcut-label">Auto Responders</span> </a>
                                <!--<a href="<?php echo base_url() ?>keywords-list" class="shortcut"><i class="fa fa-search" aria-hidden="true"></i><span class="shortcut-label">Keywords</span> </a>-->
                                <a href="<?php echo base_url() ?>appointments" class="shortcut"><i class="fa fa-calendar" aria-hidden="true"></i><span class="shortcut-label">Appointments</span> </a>
                                <!--<a href="<?php echo base_url() ?>birthday-list" class="shortcut"><i class="fa fa-birthday-cake" aria-hidden="true"></i><span class="shortcut-label">Birthday Wishes</span> </a>-->
                                <a href="<?php echo base_url() ?>scheduled-task" class="shortcut"><i class="fa fa-clock-o" aria-hidden="true"></i><span class="shortcut-label">Scheduled Tasks</span> </a>
                                <!--<a href="javascript:;" class="shortcut"><i class="fa fa-envelope-o" aria-hidden="true"></i></i> <span class="shortcut-label">Email Integration</span> </a>-->
                                <!--<a href="<?php echo base_url() ?>mms-list" class="shortcut"><i class="fa fa-mobile" aria-hidden="true"></i><span class="shortcut-label">MMS</span> </a>-->
                                <!--<a href="<?php echo base_url() ?>inbox-list" class="shortcut"><i class="fa fa-comments" aria-hidden="true"></i><span class="shortcut-label">Inbox</span> </a>-->
                            </div>
                            <!-- /shortcuts --> 
                        </div>
                        <!-- /widget-content --> 
                    </div>


                    <div class="span4 Features">
                        <div class="widget-header"> <i class="icon-bookmark"></i>
                            <h3>My Accounts</h3>
                        </div>
                        <!-- /widget-header -->
						
					   
                        <div class="Accounts widget-content">

						<img src="<?php echo base_url();?>/load_image.php?user_id=<?php echo $_SESSION['user_account']['user_id'];?>">
							
						</div>

						
                        <div class="Accounts widget-content">

                            <h3>Credits</h3>

                            <div class="control-group">											
                                <label class="control-label" for="password1">Balance:</label>
                                <div class="controls">
                                    <p>497 / 500</p>
                                </div> <!-- /controls -->				
                            </div><br>


                            <div class="control-group">											
                                <label class="control-label" for="password1">Prepaid:</label>
                                <div class="controls">
                                    <p>0</p>
                                </div> <!-- /controls -->				
                            </div><br>


                            <div class="control-group">											
                                <label class="control-label" for="password1">Overages:</label>
                                <div class="controls">
                                    <p>0/0</p>
                                </div> <!-- /controls -->				
                            </div><br>


                            <div class="control-group">											
                                <label class="control-label" for="password1">MMS Prepaid:</label>
                                <div class="controls">
                                    <p>0</p>
                                </div> <!-- /controls -->				
                            </div><br>


                            <div class="control-group">											
                                <label class="control-label" for="password1">MMS Overages:</label>
                                <div class="controls">
                                    <p>0/0</p>
                                </div> <!-- /controls -->				
                            </div><br><br>

                            <div class="control-group">											
                                <label class="control-label" for="password1">Short Code:</label>
                                <div class="controls">
                                    <p>76626</p>
                                </div> <!-- /controls -->				
                            </div><br>

                            <div class="control-group">											
                                <label class="control-label" for="password1">Time Zone:</label>
                                <div class="controls">
                                    <p><strong>Eastern Time<strong></p>
                                                </div> <!-- /controls -->				
                                                </div><br><br>

                                                <div class="control-group">											
                                                    <label class="control-label" for="password1">Billing Cycle:</label>
                                                    <div class="controls">
                                                        <p><strong>9th<strong></p>
                                                                    </div> <!-- /controls -->				
                                                                    </div><br>

                                                                    <div class="control-group">											
                                                                        <label class="control-label" for="password1"><a>My Pricing</a></label>
                                                                        <div class="controls">
                                                                            <p><strong><strong></p>
                                                                                        </div> <!-- /controls -->				
                                                                                        </div><br><br>

                                                                                        <div class="Support_btn">
                                                                                            <button>SUPPORT</button>
                                                                                        </div>

                                                                                        <!-- /shortcuts --> 
                                                                                        </div>
                                                                                        <!-- /widget-content --> 
                                                                                        </div>
                                                                                        </div>
                                                                                        </div>

                                                                                        <!--                                                                                        <div id="Chart_Table">
                                                                                                                                                                                    <div class="row">
                                                                                                                                                                                        <div class="span12">
                                                                                                                                                                                            <div class="widget-header"> <i class="icon-signal"></i>
                                                                                                                                                                                                <h3> Area Chart Example</h3>
                                                                                                                                                                                            </div>
                                                                                                                                                                                             /widget-header 
                                                                                                                                                                                            <div class="widget-content">
                                                                                        
                                                                                                                                                                                                <div class="control-group">											
                                                                                                                                                                                                    <label class="control-label">Calculate From:</label>
                                                                                        
                                                                                        
                                                                                                                                                                                                    <div class="controls">
                                                                                                                                                                                                        <label class="radio inline">
                                                                                                                                                                                                        <input type="radio"  name="radiobtns">  1st of the month
                                                                                                                                                                                                        </label>
                                                                                        
                                                                                                                                                                                                        <label class="radio inline">
                                                                                                                                                                                                        <input type="radio" name="radiobtns"> Billing Cycle
                                                                                                                                                                                                        </label>
                                                                                                                                                                                                    </div>	 /controls 			
                                                                                                                                                                                                </div>
                                                                                        
                                                                                                                                                                                                <br>
                                                                                        
                                                                                                                                                                                                <div class="load_btn">
                                                                                                                                                                                                    <button name="flip" class="flip" onclick="myFunction()">Show Report</button>
                                                                                                                                                                                                </div>
                                                                                                                                                                                                <div id="panel">
                                                                                                                                                                                                    <canvas id="area-chart" class="chart-holder" height="250px" width="1130px"> </canvas>
                                                                                                                                                                                                </div>
                                                                                                                                                                                                 /area-chart  
                                                                                                                                                                                            </div>
                                                                                                                                                                                             /widget-content  
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </div>
                                                                                                                                                                                </div>-->






                                                                                        <!-- /widget --> 
                                                                                        </div>
                                                                                        <!-- /span6 -->

                                                                                        <!-- /span6 --> 
                                                                                        </div>
                                                                                        <!-- /row --> 
                                                                                        </div>
                                                                                        <script src="<?php echo asset_url() ?>inner/js/jquery-1.7.2.min.js"></script>                                                                                      <!-- /container --> 