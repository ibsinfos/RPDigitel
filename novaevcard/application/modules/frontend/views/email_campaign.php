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
                                        <form id="send_email" class="form-horizontal">
                                            <fieldset>
                                                <div class="span8">
                                                    <h3>1. Email Template</h3>
                                                    <br>
													
                                                    <div class="control-group">											
                                                        <label class="control-label" for="radiobtns">Template : </label>
														
                                                        <div class="controls">
															
                                                            <div class="Theme_DropDown">
																
                                                                <select name="template_name" id="templates" onchange="changeTempContent(this.value)">
                                                                    <option value="">Select Template</option>
                                                                    <?php foreach ($email_templates as $temp) { ?>
<!--                                                                        <option value="<?php //echo $temp['email_template_id'] . "@" . $temp['email_template_content']. "@" . $temp['email_template_title']. "@" . $temp['email_template_subject']; ?>"><?php //echo $temp['email_template_title']; ?></option>-->
                                                                        <option value="<?php echo $temp['email_template_id'] . "@".$temp['email_template_title']. "@" . $temp['email_template_subject']; ?>"><?php echo $temp['email_template_title']; ?></option>
																	<?php } ?>
																</select>
																
															</div>
															<!--
                                                            <div class="Reload_Button">
                                                                <button id="btnupdatetemplate">Update</button>
															</div>
															-->
															
                                                            <div class="Delete_Button">
                                                                <button id="btndeletetemplate">Delete</button>
															</div>
															
                                                            <div class="Preview_Button">
																<button id="btnpreviewtemplate" data-toggle="modal" data-target="#template_preview_modal">Preview</button>
															</div>
															
														</div>	<!-- /controls -->			
													</div>
													
                                                    <div class="control-group">											
														
                                                        <div class="controls">
															
                                                            <div class="Reload_Button">
                                                                <button id="btnnewtemplate" data-toggle="modal" data-target="#createnewtemplate_modal">Create New Template</button>
															</div>
															
														</div>	<!-- /controls -->	
														
													</div>
													
													
													
													<!--
                                                    <div class="control-group">											
                                                        <label class="control-label" for="firstname">Insert your text message here:</label>
                                                        <div class="controls">
                                                            <textarea type="text" name="emailbody" id="emailbody" maxlength="450" class="mirror" rows="4" cols="50" placeholder="Type Email Body Content Here..."></textarea> 
                                                            <p>*Merge Tags</p>
														</div>
                                                       
													</div>
													
													
                                                    <div class="control-group url_Converter">											
                                                        <label class="control-label" for="lastname">URL:</label>
                                                        <div class="controls">
                                                            <input type="text" id="longurl" class="span2" id="lastname" value="">
															
														</div>
														
                                                        <div class="Reload_Button">
															<button id="getshorturl">Shorten and Insert</button>
														</div>
                                                        <br><br>
																
													</div> 
								-->
													
													
												</div>
												
												<div class="clearfix"></div>
												<br><hr><br>
												
												
												<h3>2. Email Destination</h3>
												<br><br>
												
												
												<div class="control-group">											
													<label class="control-label">Opt-in lists:</label>
													
													
													<div class="controls">
                                                        <div class="msg_dest">
															<?php 
															// print_r($optindata);
															foreach ($optindata as $opt) { ?>
																<label class="checkbox inline">
																	<input type="checkbox" value="<?php echo $opt['id']; ?>" name="list_name[]"> <?php echo $opt['list_name']; ?>
																</label><br>
															<?php } ?>
															
														</div>
														
													</div>		<!-- /controls -->		
												</div> <!-- /control-group -->
												
												
												<div class="control-group">											
													<label class="control-label" for="to_additional_email">Add Email:</label>
													<div class="controls">
                                                        <input type="text"  name="to_additional_email" class="span4" id="to_additional_email" value="<?php if (isset($phone) && $phone != '') echo decode_url($phone) ?>">
														
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
													<button type="button" id="email_submitfrm" class="btn btn-primary">Send</button> 
													<button type="button" onclick="javascript:window.history.back();" class="btn">Cancel</button>
												</div> <!-- /form-actions -->
											</fieldset>
										</form>
									</div>
									
																   <input type="text" value="" name="preview_template_title" id="preview_template_title" class="previewtemplate" style="display:none;"><br/>
																   <input type="text" value="" name="preview_template_subject" id="preview_template_subject" class="previewtemplate"  style="display:none;"><br/>
																   <input type="text" value="" name="template_id" id="template_id" class="previewtemplate"  style="display:none;"><br/>
									
                                                    <!-- Modal for preview tepmplate Start -->
													
													
													   <div class="modal fade email-modal" id="template_preview_modal" role="dialog">
														
                                                        <div class="modal-dialog">
														
															
                                                            <div class="frmerror_template_preview"></div>
															
                                                            <form id="frm_email_template_preview">
																
                                                                <!--label for="editor1" class="email-template-title"><h3>Template Preview</h3></label-->
																<div class="modal-header">
																	 <h4 class="modal-title">Template Preview
																	 <span class="close-custom-btn" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></span>
																	 </h4>
																</div>
																
																<!--
                                                                <div class="span6 email-template-div">
                                                          
                                                                    Template Title : <br>
                                                                    <input type="text" value="" name="preview_template_title" id="preview_template_title" class="previewtemplate"><br/>
																
																</div>
																
                                                                <div class="span6 email-template-div">
                                                                Template Subject : <br>
                                                                <input type="text" value="" name="preview_template_subject" id="preview_template_subject" class="previewtemplate"><br/>
																</div>
																
																-->
																
																<!--
                                                                <textarea id="preview_editor1" name="preview_editor1" class="previewtemplate" maxlength="160"></textarea>
																-->
																 <div class="modal-body" style="padding-right:10px;height: 329px;">
																<div id="preview_template_div">
																
																<div style="clear:both"></div>
																</div>
																</div>
															
															
															
															    
                                                                <div style="position:relative;">
                                                                <div class="modal-custom-footer">
                                                                <div class="span6 email-template-div">
                                                                Email id : <br>
                                                                <input type="text" value="" name="email_id" id="email_id" class="previewtemplate form-control"><br/>
																</div>
																<div style="clear:both"></div>
                                                                <div style="text-align:center;padding-bottom:10px;">
																	<button type="button" id="send_test_mail" name="send_test_mail"  class="btn btn-danger btn-wide">Send Test mail</button>
																</div>
																</div>
																</div>
																
																
																
																<!--div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																</div-->
																
															</form>
														</div>
														
													</div>
													
                                                    <!-- Modal for email tepmplate preview End -->
													
													
                                                    <!-- Modal for new email tepmplate Start -->
                                                    <div class="modal fade  email-modal" id="createnewtemplate_modal" role="dialog">
														
                                                        <div class="modal-dialog">
															
                                                            <div class="frmerror_craete_new_template"></div>
															
                                                            <form id="frm_new_email_template" action="<?php echo base_url().'frontend/emailcampaign/save_email_template';?>" method="POST">
																
                                                                <!--label for="editor1" class="email-template-title"><h3>New Email Template </h3></label-->
																
																<div class="modal-header">
																	 <h4 class="modal-title">New Email Template
																	 <span class="close-custom-btn" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></span>
																	 </h4>
																</div>
																
																<div class="modal-body" style="padding-right:10px;height: 329px;">
                                                                <div class="span6 email-template-div" style="margin-bottom:0px">
                                                          
                                                                    Template Title : <br>
                                                                    <input type="text" value="" name="template_title" id="template_title" class="newtemplate"><br/>
																
																</div>
																
                                                                <div class="span6 email-template-div">
                                                                Template Subject : <br>
                                                                <input type="text" value="" name="template_subject" id="template_subject" class="newtemplate"><br/>
																</div>
																<div class="clearfix"></div>
																
                                                                <textarea id="editor1" name="editor1" maxlength="160"></textarea>
																</div>
																
                                                                <input type="hidden" value="<?php echo ($user_data[0]['id']) ? $user_data[0]['id'] : ''; ?>" name="id">
																
                                                                <div style="text-align:center;padding-top:10px;padding-bottom:10px;">
																	<button type="submit" id="save_template" name="save_template"  class="btn btn-danger btn-wide">Save</button>
																</div>
																
																<!--div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																</div-->
																
															</form>
														</div>
														
													</div>
													
                                                    <!-- Modal for new email tepmplate End -->
													
									
								</div>
								
								
							</div>
							
							
							
							
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
<script src="<?php echo asset_url() ?>inner/js/formjs/emailcampaign.js"></script>
<script src="<?php echo asset_url(); ?>main_vcard/plugins/ckeditor/ckeditor.js"></script>
<script>
	$(document).ready(function () {
		$('input[name="send_time"]').click(function () {
			var inputValue = $(this).attr("value");
			if (inputValue === 'schedule') {
				$("#scedule_option").show();
				} else {
				$("#scedule_option").hide();
				$("#recurring_option").hide();
			}
		});
		
		
		
		/*For CK Editor*/
		CKEDITOR.replace('editor1');
		/*For CK Editor Preview*/
		timer = setInterval(updateDiv, 100);
		function updateDiv() {
			var editorText = CKEDITOR.instances.editor1.getData();
			$('#trackingDiv').html(editorText);
		}
		
		
		/*For CK Editor*/
	/*	CKEDITOR.replace('preview_editor1');
		//*For CK Editor Preview
		timer = setInterval(updateDiv, 100);
		function updateDiv() {
			var editorText = CKEDITOR.instances.preview_editor1.getData();
			$('#trackingDiv').html(editorText);
		}
		*/
		
		
		
	});
</script>														