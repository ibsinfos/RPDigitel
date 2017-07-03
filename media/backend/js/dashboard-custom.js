$(document).ready(function(){
	// script used for Files popup used in add product
	$('.fileSelectModal').on('click', '.panel', function () {
		//alert('hi');
		var chkbox = $(this).find('.chkBox');
		//var chkbox = $(this).find('.chkBox').prop('checked', true);
		if(chkbox.is(':checked')) { 
			chkbox.prop('checked', false);
			} else {
			chkbox.prop('checked', true);
		}
	});
	
	// script used for datatable checkbox
	$('#datatable, .mailBoxWrap').on('click', '#checkAll', function () {
		$(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
	});
	
	// script used for mail box checkbox
	$('.mailBoxWrap').on('click', '#checkAll', function () {
		$(this).closest('.mailBoxWrap').find('td input:checkbox').prop('checked', this.checked);
	});
	
	// script used for Create product page
	$('.createProductWrap').on('click', '.businessStructureRadioWrap .radio-inline', function () {
		var attrVal = $(this).attr('data-business-structure');
		//alert(attrVal);
		$('.businessStructureInfo').removeClass('active');
		$('.'+attrVal+'-information').addClass('active');
	});
	
	
	//To update publisher Application Info
	
	// validateUpdateBasicInformation();
	
	
	
	
	// $("#save_basic_info").click(function () {
	validateBasicInformation();
	// });
	
	validateCompanyInformation();
	validatePublisherInformation();
	
	// datepicker function initialized
	if ($('.datepicker').length) {
		$('.datepicker').datepicker({
			autoclose: true
		});
	}
	
	// Script used for CK Editor
	if ($('textarea.editor').length) {
		$('textarea.editor').ckeditor();
	}

	// Script used for Share modal in sidebar to send mail
	if ($('#btnemailsend').length) {
		$('#btnemailsend').click(function() {
						
			$(".err_mailsend").html('<div class="loader"><div class="title">Sending...</div><div class="load"><div class="bar"></div></div></div>');	
			
			$("#err_to").html('');
			$("#err_from").html('');
			
			$.ajax({
				url: shareModalSendMailURL,
				type: "POST",
				data: {
					to:$('#to').val(),
					fromid:$('#fromid').val(),
					shorten_url:$('#shorten_url').val()
				},
				success: function (data)
				{
					$(".err_mailsend").html('');	
					var json = JSON.parse(data);
					if (json.status === 1) 
					{						
						
						$("#err_to").html('');
						$("#err_from").html('');						
						$(".err_mailsend").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
						return true;
					}
					else 
					{
						
						//$(".err_mailsend").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
						$("#err_to").html('<div class="text-danger">' + json.msg.to + '</div>');
						$("#err_from").html('<div class="text-danger">' + json.msg.from + '</div>');
						
						
						return false;
					}
				}
			});     
		});
	}
	
});



//******************************************** Basic Inforamation save Start ****************************************************

function validateBasicInformation() {
    ////// Rules Goes Below //////
    $('#basicInformationForm').validate({
        // alert(memberDetailsForm_save_URL);
		
        rules: {
            //// For General Sales Inquiries
            choice1: {
                required: true,
                // lettersonly: true
				}/*,
				last_name: {
                required: true,
                lettersonly: true
				},
				email: {
                required: true,
                email: true
				},
				password: 'required',
				phone: {
                minlength: 9,
                required: true
				},
				billing_address: 'required',
				billing_city: {
                required: true,
                lettersonly: true
				},
				billing_state: 'required',
			billing_zip: 'required'*/
		},
        ////// Messages for Rules Goes Below //////
		
        messages: {
            //// For General Sales Inquiries
            choice1: {
                // lettersonly: "Letters only please",
                required: "Please enter first name"
				}/*,
				last_name: {
                lettersonly: "Letters only please",
                required: "Please enter last name"
				},
				email: {
                email: "Please enter a valid email address",
                required: "Please enter an email address"
				},
				phone: {
                minlength: "Please enter a valid phone number",
                required: "Please enter phone number"
				},
				password: "Please enter a passowrd",
				billing_address: "Please enter address",
				billing_city: {
                lettersonly: "Letters only please",
                required: "Please enter city"
				},
				billing_state: "Please select state",
			billing_zip: "Please enter zip"*/
		},
        submitHandler: function (form) {
			
			
            if (typeof basicInformationForm_save_URL == "undefined" || basicInformationForm_save_URL == null) {
				} else {
				// alert('sdf');
				
				var form_data=$("#basicInformationForm").serialize();
				// alert(form_data);
				
                $.ajax({
                    url: basicInformationForm_save_URL,
                    type: 'POST',
                    
					// data: {first_name: $('#first_name').val(), last_name: $('#last_name').val(), country_code: $('#country_code').val(), phone: $('#phone').val(), email: $('#email').val(), u_password: $('#password').val(), billing_address: $('#billing_address').val(), billing_city: $('#billing_city').val(), billing_country: $('#billing_country').val(), billing_state: $('#billing_state').val(), billing_zip: $('#billing_zip').val(), role: 'user'},
					
					data: form_data,
					
                    success: function (res) {
						
                        if (res == 'exist') {
                            alert('User with this email already exist. Please try with different email.');
							} else {
                            $('li[role=presentation]').removeClass('active');
                            $('.tab-pane').removeClass('active');
                            $('.company_information').addClass('active');
                            $('#companyInfo').addClass('active');
						}
					}
				});
			}
			
			
            // $('li[role=presentation]').removeClass('active');
            // $('.tab-pane').removeClass('active');
            // $('.payment_details').removeClass('disabled').addClass('active');
		}
	});
	
	
    $.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
	}, "Letters only please");
	
	
}

//************************************************** Basic Inforamation save end ******************************************


//************************************************** Company Inforamation save Start ***************************************************************

function validateCompanyInformation() {
    ////// Rules Goes Below //////
    $('#companyInformationForm').validate({
        // alert(memberDetailsForm_save_URL);
		
        rules: {
            //// For General Sales Inquiries
            choice1: {
                required: true,
                // lettersonly: true
			},
            last_name: {
                required: true,
                lettersonly: true
			},
            email: {
                required: true,
                email: true
			},
            password: 'required',
            phone: {
                minlength: 9,
                required: true
			},
            billing_address: 'required',
            billing_city: {
                required: true,
                lettersonly: true
			},
            billing_state: 'required',
            billing_zip: 'required'
		},
        ////// Messages for Rules Goes Below //////
		
        messages: {
            //// For General Sales Inquiries
            choice1: {
                // lettersonly: "Letters only please",
                required: "Please enter first name"
				}/*,
				last_name: {
                lettersonly: "Letters only please",
                required: "Please enter last name"
				},
				email: {
                email: "Please enter a valid email address",
                required: "Please enter an email address"
				},
				phone: {
                minlength: "Please enter a valid phone number",
                required: "Please enter phone number"
				},
				password: "Please enter a passowrd",
				billing_address: "Please enter address",
				billing_city: {
                lettersonly: "Letters only please",
                required: "Please enter city"
				},
				billing_state: "Please select state",
			billing_zip: "Please enter zip"*/
		},
        submitHandler: function (form) {
			
			
            if (typeof companyInformationForm_save_URL == "undefined" || companyInformationForm_save_URL == null) {
				} else {
				// alert('sdf');
				
				var form_data=$("#companyInformationForm").serialize();
				// alert(form_data);
				
                $.ajax({
                    url: companyInformationForm_save_URL,
                    type: 'POST',
                    
					// data: {first_name: $('#first_name').val(), last_name: $('#last_name').val(), country_code: $('#country_code').val(), phone: $('#phone').val(), email: $('#email').val(), u_password: $('#password').val(), billing_address: $('#billing_address').val(), billing_city: $('#billing_city').val(), billing_country: $('#billing_country').val(), billing_state: $('#billing_state').val(), billing_zip: $('#billing_zip').val(), role: 'user'},
					
					data: form_data,
					
                    success: function (res) {
						
                        if (res == 'exist') {
                            alert('User with this email already exist. Please try with different email.');
							} else {
							
							$('li[role=presentation]').removeClass('active');
                            $('.tab-pane').removeClass('active');
                            $('.upload_files').addClass('active');
                            $('#uploadFiles').addClass('active');
						}
					}
				});
			}
			
			
            // $('li[role=presentation]').removeClass('active');
            // $('.tab-pane').removeClass('active');
            // $('.payment_details').removeClass('disabled').addClass('active');
		}
	});
	
	
    $.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
	}, "Letters only please");
	
	
}

//************************************************** company Inforamation save end ***************************************************************



//********************************************** Publisher Application all Inforamation save Start ************************************************

function validatePublisherInformation() {
    ////// Rules Goes Below //////
    $('#publisherApplicationForm').validate({
        // alert(memberDetailsForm_save_URL);
		
		
        rules: {
            //// For General Sales Inquiries
            choice1: {
                required: true,
                // lettersonly: true
			},
            last_name: {
                required: true,
                lettersonly: true
			},
            email: {
                required: true,
                email: true
			},
            password: 'required',
            phone: {
                minlength: 9,
                required: true
			},
            billing_address: 'required',
            billing_city: {
                required: true,
                lettersonly: true
			},
            billing_state: 'required',
            billing_zip: 'required'
		},
        ////// Messages for Rules Goes Below //////
		
        messages: {
            //// For General Sales Inquiries
            choice1: {
                // lettersonly: "Letters only please",
                required: "Please enter first name"
				}/*,
				last_name: {
                lettersonly: "Letters only please",
                required: "Please enter last name"
				},
				email: {
                email: "Please enter a valid email address",
                required: "Please enter an email address"
				},
				phone: {
                minlength: "Please enter a valid phone number",
                required: "Please enter phone number"
				},
				password: "Please enter a passowrd",
				billing_address: "Please enter address",
				billing_city: {
                lettersonly: "Letters only please",
                required: "Please enter city"
				},
				billing_state: "Please select state",
			billing_zip: "Please enter zip"*/
		},
        submitHandler: function (form) {
			
            if (typeof companyInformationForm_save_URL == "undefined" || companyInformationForm_save_URL == null) {
				} else {
				// alert('sdf');
				
				var form_data=$("#companyInformationForm").serialize();
				// alert(form_data);
				
                $.ajax({
                    url: publisherApplicationForm_save_URL,
                    type: 'POST',
                    
					// data: {first_name: $('#first_name').val(), last_name: $('#last_name').val(), country_code: $('#country_code').val(), phone: $('#phone').val(), email: $('#email').val(), u_password: $('#password').val(), billing_address: $('#billing_address').val(), billing_city: $('#billing_city').val(), billing_country: $('#billing_country').val(), billing_state: $('#billing_state').val(), billing_zip: $('#billing_zip').val(), role: 'user'},
					
					data: form_data,
					
                    success: function (res) {
						
                        if (res == 'exist') {
                            alert('User with this email already exist. Please try with different email.');
							} else {
							
							$('li[role=presentation]').removeClass('active');
                            $('.tab-pane').removeClass('active');
                            $('.upload_files').addClass('active');
                            $('#uploadFiles').addClass('active');
						}
					}
				});
			}
			
			
            // $('li[role=presentation]').removeClass('active');
            // $('.tab-pane').removeClass('active');
            // $('.payment_details').removeClass('disabled').addClass('active');
		}
	});
	
	
    $.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
	}, "Letters only please");
	
	
}

//********************************************** Publisher Application all Inforamation save End ************************************************








//*************************************************** Stockhoders Table Grid [B. FOC] Start ****************************************************

var add_f_cont=0;
var all_records=[];
function foc_add_stockholders(){
	
	
	add_f_cont++;
	// alert(add_f_cont);
	
	
	
	// $("#table_plan_features > tbody tr#"+feature_id).remove();
	
	var stockholdersName=$("#stockholdersName").val();
	var homeAddressZipCode=$("#homeAddressZipCode").val();
	var ssOrTaxId=$("#ssOrTaxId").val();
	var percentageOfOwnership=$("#percentageOfOwnership").val();
	var isPublicklyTradedCorporation=$("#isPublicklyTradedCorporation").val();
	$("#stockholdersName").val('');
	$("#homeAddressZipCode").val('');
	$("#ssOrTaxId").val('');
	$("#percentageOfOwnership").val('');
	$("#isPublicklyTradedCorporation").val('');
	
	$("#table_stockholder_foc > tbody").append("<tr id='new_"+add_f_cont+"'><td><input type='hidden' name='foc_stock_stockholdersName[]' value='"+stockholdersName+"'>"+stockholdersName+"</td><td><input type='hidden' name='foc_stock_homeAddressZipCode[]' value='"+homeAddressZipCode+"'>"+homeAddressZipCode+"</td><td><input type='hidden' name='foc_stock_ssOrTaxId[]' value='"+ssOrTaxId+"'>"+ssOrTaxId+"</td><td><input type='hidden' name='foc_stock_percentageOfOwnership[]' value='"+percentageOfOwnership+"'>"+percentageOfOwnership+"</td><td><input type='hidden' name='foc_stock_isPublicklyTradedCorporation[]' value='"+isPublicklyTradedCorporation+"'>"+isPublicklyTradedCorporation+"</td><td><input style='text-align:right;' type='button' value='X' class='btn btn-sm btnRed' onclick=\"delete_selected_stockholder_foc('new_"+add_f_cont+"')\" name='del_featureid' id='del_new"+add_f_cont+"'></td></tr>");
	
	$("#stockholdersName").focus();
	
	/*
		if((all_records.indexOf(name) == -1)){ //To check Duplicate
		
		
		
		// all_records.push(name);
		
		all_records.push({title:cat,link:name});
		
		// alert(JSON.stringify(all_records));
		
		// delete all_records['fiber'];
		
		
		// const index = all_records.indexOf('Fiber plan 3');
		// array.splice(index, 1);
		// alert(index);
		
		
		
		$("#table_subcription_plans > tbody tr#"+cat).remove();
		
		
		
		$("#table_subcription_plans > tbody").append("<tr id='"+cat+"'><td>"+name+"</td><td>"+duration+"</td><td class='plan_price'>"+price+" <input type='button' value='X' onclick=\"delete_selected_plan('"+cat+"')\" name='del_"+cat+"' id='del_"+cat+"'></td></tr>");
		
		//*AJAX Request to add plan start
		$.ajax({
		
		url:'<?php echo base_url();?>user/fiberrails/addToCart_Plan',
		
		method:'post',
		
		async: false,
		
		data:{'plan_cat':cat,'plan_name':name,'plan_duration':duration,'plan_price':price},
		
		success:function(data){
		
		// $("#project_portfolio").empty();
		// alert(data);
		// $("#billing_state").html(data);
		
		}					
		
		});
		//*AJAX Request to add plan end
		
		
		var pre_total=$("#subcription_plans_total").text();
		
		
		var new_total=0;
		$( ".plan_price" ).each(function() {
		
		var single_plan_price=($(this).html());
		// alert(strr);
		new_total=parseInt(new_total)+parseInt(single_plan_price);
		});
		
		
		// var new_total=parseInt(pre_total)+parseInt(price);
		
		$("#subcription_plans_total").text(parseInt(new_total));
		$("#pricing_plan_total").val(parseInt(new_total));
		
		}
		
	*/
	
}



function delete_selected_stockholder_foc(stockholder_foc_id){
	
	$("#table_stockholder_foc > tbody tr#"+stockholder_foc_id).remove();
	
}

//*************************************************** Stockhoders Table Grid [B. FOC] End ****************************************************


//*************************************************** Officers Table Grid [B. FOC] Start ****************************************************

var add_f_cont=0;
var all_records=[];
function foc_add_officers(){
	
	add_f_cont++;
	var officers_name=$("#officers_name").val();
	var officers_homeAddressZipCode=$("#officers_homeAddressZipCode").val();
	var officers_ssOrTaxId=$("#officers_ssOrTaxId").val();
	var officers_officeHeld=$("#officers_officeHeld").val();
	$("#officers_name").val('');
	$("#officers_homeAddressZipCode").val('');
	$("#officers_ssOrTaxId").val('');
	$("#officers_officeHeld").val('');
	
	$("#table_officer_foc > tbody").append("<tr id='new_"+add_f_cont+"'><td><input type='hidden' name='foc_officers_officerssName[]' value='"+officers_name+"'>"+officers_name+"</td><td><input type='hidden' name='foc_officers_homeAddressZipCode[]' value='"+officers_homeAddressZipCode+"'>"+officers_homeAddressZipCode+"</td><td><input type='hidden' name='foc_officers_ssOrTaxId[]' value='"+officers_ssOrTaxId+"'>"+officers_ssOrTaxId+"</td><td><input type='hidden' name='foc_officers_officeHeld[]' value='"+officers_officeHeld+"'>"+officers_officeHeld+"</td><td><input style='text-align:right;' type='button' value='X' class='btn btn-sm btnRed' onclick=\"delete_selected_officers_foc('new_"+add_f_cont+"')\" name='del_featureid' id='del_new"+add_f_cont+"'></td></tr>");
	
	$("#officers_name").focus();
	
}


function delete_selected_officers_foc(officer_foc_id){
	
	$("#table_officer_foc > tbody tr#"+officer_foc_id).remove();
	
}

//*************************************************** Officers Table Grid [B. FOC] End ****************************************************


//*************************************************** Partners Table Grid [C. Partership] Start ****************************************************

var add_f_cont=0;
var all_records=[];
function fol_add_partners(){
	
	add_f_cont++;
	var partners_name=$("#partners_name").val();
	var partners_homeAddressZipCode=$("#partners_homeAddressZipCode").val();
	var partners_ssOrTaxId=$("#partners_ssOrTaxId").val();
	var partners_ownership=$("#partners_ownership").val();
	$("#partners_name").val('');
	$("#partners_homeAddressZipCode").val('');
	$("#partners_ssOrTaxId").val('');
	$("#partners_ownership").val('');
	
	$("#table_partner_fol > tbody").append("<tr id='new_"+add_f_cont+"'><td><input type='hidden' name='foc_partners_Name[]' value='"+partners_name+"'>"+partners_name+"</td><td><input type='hidden' name='foc_partners_homeAddressZipCode[]' value='"+partners_homeAddressZipCode+"'>"+partners_homeAddressZipCode+"</td><td><input type='hidden' name='foc_partners_ssOrTaxId[]' value='"+partners_ssOrTaxId+"'>"+partners_ssOrTaxId+"</td><td><input type='hidden' name='foc_partners_percentageOfOwnership[]' value='"+partners_ownership+"'>"+partners_ownership+"</td><td><input style='text-align:right;' type='button' value='X' class='btn btn-sm btnRed' onclick=\"delete_selected_partners_foc('new_"+add_f_cont+"')\" name='del_partnerid' id='del_new"+add_f_cont+"'></td></tr>");
	
	$("#partners_name").focus();
	
}


function delete_selected_partners_foc(partner_fol_id){
	
	$("#table_partner_fol > tbody tr#"+partner_fol_id).remove();
	
}

//*************************************************** Partners Table Grid [C. Partership] End ****************************************************


//*************************************************** Members Table Grid [D. FOL] End ****************************************************

var add_f_cont=0;
var all_records=[];
function fol_add_members(){
	
	add_f_cont++;
	var members_name=$("#members_name").val();
	var members_homeAddressZipCode=$("#members_homeAddressZipCode").val();
	var members_ssOrTaxId=$("#members_ssOrTaxId").val();
	var members_ownership=$("#members_ownership").val();
	$("#members_name").val('');
	$("#members_homeAddressZipCode").val('');
	$("#members_ssOrTaxId").val('');
	$("#members_ownership").val('');
	
	$("#table_member_fol > tbody").append("<tr id='new_"+add_f_cont+"'><td><input type='hidden' name='foc_members_Name[]' value='"+members_name+"'>"+members_name+"</td><td><input type='hidden' name='foc_members_homeAddressZipCode[]' value='"+members_homeAddressZipCode+"'>"+members_homeAddressZipCode+"</td><td><input type='hidden' name='foc_members_ssOrTaxId[]' value='"+members_ssOrTaxId+"'>"+members_ssOrTaxId+"</td><td><input type='hidden' name='foc_members_percentageOfOwnership[]' value='"+members_ownership+"'>"+members_ownership+"</td><td><input style='text-align:right;' type='button' value='X' class='btn btn-sm btnRed' onclick=\"delete_selected_members_foc('new_"+add_f_cont+"')\" name='del_memberid' id='del_new"+add_f_cont+"'></td></tr>");
	
	$("#members_name").focus();
	
}


function delete_selected_members_foc(member_fol_id){
	
	$("#table_member_fol > tbody tr#"+member_fol_id).remove();
	
}

//*************************************************** Members Table Grid [D. FOL] End ****************************************************


//*************************************************** Managers Table Grid [D. FOL] Start ****************************************************

var add_f_cont=0;
var all_records=[];
function fol_add_managers(){
	
	add_f_cont++;
	var managers_name=$("#managers_name").val();
	var managers_homeAddressZipCode=$("#managers_homeAddressZipCode").val();
	var managers_ssOrTaxId=$("#managers_ssOrTaxId").val();
	var managers_ownership=$("#managers_ownership").val();
	$("#managers_name").val('');
	$("#managers_homeAddressZipCode").val('');
	$("#managers_ssOrTaxId").val('');
	$("#managers_ownership").val('');
	
	$("#table_manager_fol > tbody").append("<tr id='new_"+add_f_cont+"'><td><input type='hidden' name='foc_managers_Name[]' value='"+managers_name+"'>"+managers_name+"</td><td><input type='hidden' name='foc_managers_homeAddressZipCode[]' value='"+managers_homeAddressZipCode+"'>"+managers_homeAddressZipCode+"</td><td><input type='hidden' name='foc_managers_ssOrTaxId[]' value='"+managers_ssOrTaxId+"'>"+managers_ssOrTaxId+"</td><td><input type='hidden' name='foc_managers_is_have_authority[]' value='"+managers_ownership+"'>"+managers_ownership+"</td><td><input style='text-align:right;' type='button' value='X' class='btn btn-sm btnRed' onclick=\"delete_selected_managers_foc('new_"+add_f_cont+"')\" name='del_memberid' id='del_new"+add_f_cont+"'></td></tr>");
	
	$("#managers_name").focus();
	
}

function delete_selected_managers_foc(manager_fol_id){
	
	$("#table_manager_fol > tbody tr#"+manager_fol_id).remove();
	
}

//*************************************************** Managers Table Grid [D. FOL] End ****************************************************



/*
	$('#publisher_application_upload_dropzone').on('drop', function() {
	var args = Array.prototype.slice.call(arguments);
	
	// Look at the output in you browser console, if there is something interesting
	console.log(args);
	alert('asd');
	});
	
*/




$(document).ready(function () {
	
	if ($('.dropzone').length) {
	
	Dropzone.autoDiscover = false;
	var thumbs = [];
	var file_row_count=0;
	if ($('#publisher_application_upload').length) {
	$("#publisher_application_upload").dropzone({
		url: uploadProductFiles_URL,
		addRemoveLinks: true,
		maxFilesize: 25,
		acceptedFiles: "image/jpeg,image/png",
		success: function (file, response) {
			file_row_count++;
			var file_info=JSON.parse(response);
			// alert(file_info.type);
			
			$("#table_publisher_files > tbody").append("<tr id='file_row_"+file_row_count+"'><td>"+file_row_count+"</td><td>"+file_info.file_name+"</td><td>"+file_info.type+"</td><td><input style='text-align:right;' type='button' value='Delete' class='btn btn-sm btnRed' onclick=\"delete_selected_files('file_row_"+file_row_count+"','"+file_info.file_id+"')\" name='del_memberid' id='del_new"+file_row_count+"'></td></tr>");
			
						
			
			/*
				
				var imgName = response;
				thumbs.push(imgName);
				$("#thumbval").val(thumbs);
				file.previewElement.classList.add("dz-success");
				new PNotify({
				title: 'Success',
				text: imgName + ' uploaded successfully.',
				type: 'success',
				hide: true,
				styling: 'bootstrap3',
				delay: 2500,
				history: false,
				sticker: true
				});
			*/
		},
		removedfile: function (file) {
			// $.post('<?= base_url() ?>backend/project/deleteThumbnail', {filename: file.name});
			$.post(deleteThumbnail_URL, {filename: file.name});
			$(document).find(file.previewElement).remove();
			thumbs.splice($.inArray(file.name, thumbs), 1);
			console.log(thumbs);
			$("#thumbval").val(thumbs);
			// alert(file.name);
			
			// $("#table_publisher_files > tbody tr#"+file.name").remove();
			
			/*
				new PNotify({
				title: 'Success',
				text: file.name + ' removed successfully.',
				type: 'success',
				hide: true,
				styling: 'bootstrap3',
				delay: 2500,
				history: false,
				sticker: true
			});*/
			
		},
		error: function (file, response) {
			file.previewElement.classList.add("dz-error");
			new PNotify({
				title: 'Error',
				text: 'Unable to upload image',
				type: 'error',
				hide: true,
				styling: 'bootstrap3'
			});
		}
		
	});  
	}
	
	
	
	$('#upload_files_from_silo_cloud').on('click', function () {
		// alert('df');
		
		var silo_form_data=$("#siosd_upload_files_form").serialize();
		// var silo_sd_files=$("#silo_sd_files").value();
		
		// alert(silo_sd_files);
		
		
		$.ajax({
			
			url:upload_from_silo_sd_URL,
			
			method:'post',
			
			async: false,
			
			// data:{'upload_files_silo_sd':silo_form_data},
			data:silo_form_data,
			// data:{'upload_files_silo_sd':silo_sd_files},
			
			success:function(data){
				
				$('#myModal').modal('hide');
				// $("#comments").val('');
				
				// $("#comments").val(data);
				
			}							 
		});
		
	});
	
	
	
	
	

	
	
	
/*
//******************************************** Basic Inforamation Update Start ****************************************************

function validateUpdateBasicInformation() {
    ////// Rules Goes Below //////
    $('#validateUpdateBasicInformation').validate({
        // alert(memberDetailsForm_save_URL);
		
        rules: {
            //// For General Sales Inquiries
            choice1: {
                required: true,
                // lettersonly: true
			}
		},
        ////// Messages for Rules Goes Below //////
		
        messages: {
            //// For General Sales Inquiries
            choice1: {
                // lettersonly: "Letters only please",
                required: "Please enter first name"
			}
		},
        submitHandler: function (form) {
			
            if (typeof basicInformationForm_update_URL == "undefined" || basicInformationForm_update_URL == null) {
				} else {
				// alert('sdf');
				
				var form_data=$("#updateBasicInformationForm").serialize();
				// alert(form_data);
				
                $.ajax({
                    url: basicInformationForm_update_URL,
                    type: 'POST',
					data: form_data,
                    success: function (res) {
                        if (res == 'exist') {
                            alert('User with this email already exist. Please try with different email.');
							} else {
                            $('li[role=presentation]').removeClass('active');
                            $('.tab-pane').removeClass('active');
                            $('.company_information').addClass('active');
                            $('#companyInfo').addClass('active');
						}
					}
				});
			}
		}
	});
	
    $.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
	}, "Letters only please");
	
	
}

//************************************** Basic Inforamation Update end ******************************************

*/

}
	
});


	
function delete_selected_files(file_row_id,file_id){
	// alert(file_row_id);
	$("#table_publisher_files > tbody tr#"+file_row_id).remove();
	

		// var silo_form_data=$("#siosd_upload_files_form").serialize();
		// var silo_sd_files=$("#silo_sd_files").value();
		
		// alert(silo_sd_files);
		
		
		$.ajax({
			
			url:delete_publisher_file_URL,
			
			method:'post',
			
			async: false,
			
			// data:{'upload_files_silo_sd':silo_form_data},
			data:{'file_id':file_id},
			// data:{'upload_files_silo_sd':silo_sd_files},
			
			success:function(data){
				// alert('sdf');
				// $('#myModal').modal('hide');
				// $("#comments").val('');
				
				// $("#comments").val(data);
				
			}							 
		});
	
}