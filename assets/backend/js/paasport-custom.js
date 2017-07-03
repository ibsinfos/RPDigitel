$(document).ready(function(){
    // Image preview
    $("#wizard-picture").change(function () {
        readURL(this);
    });

    $('#addSectionCollapse').on('click', '.showSingle', function(){
        $('.targetDiv').hide();
        $('#div'+$(this).attr('target')).show();
    });

    $('.blogModalRadioWrap').on('click', '.radio-inline', function () {
        var inputVal = $(this).find('input').val();
        $('.blogclass').hide();
        $('#'+inputVal).show();
    });

    $('.pricingModalRadioWrap').on('click', '.radio-inline', function () {
        var inputVal = $(this).find('input').val();
        $('.priceplanimage').hide();
        $('#'+inputVal).show();
    });

    $('.portfolioModalRadioWrap').on('click', '.radio-inline', function () {
        var inputVal = $(this).find('input').val();
        $('.portfolioContent').hide();
        $('#'+inputVal).show();
    });

    // Show/hide social icons and append social id to anchor in mobile view
    // $('.socialInputGroup').on('keyup', '.form-control', function () {
    //     var attrID = $(this).attr('id');
    //     var inputVal = $(this).val();
    //     //alert(inputVal);
    //     var socialAnchor = $('.socialCircleIcon').find('a').filter('.' + attrID);
    //     if ($(this).val().length)
    //         $(socialAnchor).show();
    //     else
    //         $(socialAnchor).hide();

    //     if (attrID == 'facebook') {
    //         $(socialAnchor).attr('href', 'https://www.facebook.com/' + encodeURIComponent(inputVal));
    //     } else if (attrID == 'twitter') {
    //         $(socialAnchor).attr('href', 'https://twitter.com/' + encodeURIComponent(inputVal));
    //     } else if (attrID == 'googlePlus') {
    //         $(socialAnchor).attr('href', 'https://plus.google.com/' + encodeURIComponent(inputVal));
    //     } else if (attrID == 'linkedin') {
    //         $(socialAnchor).attr('href', 'https://in.linkedin.com/' + encodeURIComponent(inputVal));
    //     } else if (attrID == 'youtube') {
    //         $(socialAnchor).attr('href', 'https://www.youtube.com/' + encodeURIComponent(inputVal));
    //     } else if (attrID == 'pinterest') {
    //         $(socialAnchor).attr('href', 'https://in.pinterest.com/' + encodeURIComponent(inputVal));
    //     }
    // });

    // Panel open close
    $('.panel').on('click', '.panel-heading', function(e){
        var $this = $(this);
        if(!$this.hasClass('panel-collapsed')) {
            $this.closest('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            // $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
        } else {
            $this.closest('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            // $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
        }
    });

    //call video for event popup (video page)
    $('.videoPopupLink').click(function(){

        var videoId = $(this).attr('rel');
        var title = $(this).data('title');
        var description = $(this).data('description');

        if ($(window).width() <= 768) {
          var url = 'https://www.youtube.com/watch?v='+videoId;
          window.open(url, '_blank');
        }else{
          $('.videoContainer').html('<iframe width="640" height="360" src="'+ videoId +'" frameborder="0" allowfullscreen></iframe>');
          // $('.videoContainer').html('<iframe width="640" height="360" src="https://www.youtube.com/embed/'+ videoId +'" frameborder="0" allowfullscreen></iframe>');
          // $('.infoContainer h3').html(title);
          // $('.infoContainer p').html(description);
          $('#popupBg, #videoPopup').fadeIn(200);
        }
    });
    // close video
    $('#popupBg, .closePopup').click(function(event) {
        $('.videoContainer').empty();
        $('#popupBg, #videoPopup').fadeOut(200);
    });
    // end

    if ($("#uploadAudioFiles").length) {
        $('#uploadAudioFiles').dropzone({
            url: "/ajax_file_upload_handler/"
        });
    }

    if ($("#uploadVideoFiles").length) {
        $('#uploadVideoFiles').dropzone({
            url: "/ajax_file_upload_handler/"
        });
    }

    if ($("#uploadGalleryFiles").length) {
        $('#uploadGalleryFiles').dropzone({
            url: "/ajax_file_upload_handler/"
        });
    }



    //$("#basicInfo").validate();
	validateBasicInformation();
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#wizardPicturePreview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function validateBasicInformation() {
    ////// Rules Goes Below //////
    $('#basicInfo').validate({
        rules: {
            firstname: {
                required: true,
                lettersonly: true
            },
            lastname: {
                required: true,
                lettersonly: true
            },
            email: {
                required: true,
                email: true
            },
            contact:{
                required: true,
                number: true
            },
            companycontact:{
                number:true,
                minlength:10
            },
            companyname:{
                required:true,
                lettersonly:true
            },
            user_url:{
                required:true,
                email:true
            }
        },
        ////// Messages for Rules Goes Below //////
        
        messages: {
            //// For General Sales Inquiries
            firstname: {
                lettersonly: "Letters only please",
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
            
           
        }
    });
    
    
    $.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
    }, "Letters only please");
    
    
}

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
// CKEDITOR.replace('blogshortdesc');
// CKEDITOR.replace('bloglongdesc');
// CKEDITOR.replace('editor1');
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



$(document).ready(function () {
		

	// $("input[name$='blog']").click(function() {
	// 	var test = $(this).val();			
	// 	$(".blogclass").hide();
	// 	$("#" + test).show(); 
	// });


	// $('.child-section').hide();
	
	// $('.parent-section').click(function() {
	// 	$('.child-section').toggle();
	// });

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
            url: removeSkillsAndExerptiseURL,
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
            url: removeAllSkillsAndExerptiseURL,
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
		
		$(".frmerror_skillsandexpertise").html('<div class="loader"><div class="title">Saving...</div><div class="load"><div class="bar"></div></div></div>');
		
		$("#err_txt_skill").html('');
		
		
        var skill_name = $("#txt_skill").val();
        
		$.ajax({
            url: saveSkillsURL,
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
					
                    $(".frmerror_skillsandexpertise").html('');
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
            url: deleteSkillURL,
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
		
		$(".frmerror_experiencedetails").html('<div class="loader"><div class="title">Saving...</div><div class="load"><div class="bar"></div></div></div>');
		
		
		$("#err_prevCompanyName").html('');
		$("#err_prevJobTitle").html('');
		$("#err_prevStartDate").html('');
		$("#err_prevEndDate").html('');
		
        var prevCompanyName = $("#prevCompanyName").val();
        var prevJobTitle = $("#prevJobTitle").val();

        var prevStartDate = $("#prevStartDate1").val();
        var prevEndDate = $("#prevEndDate1").val();

        //var saveExperienceURL="http://localhost/RPDigitel/paas-port/frontend/Vcard/saveExperience";
        $.ajax({
            url: saveExperienceURL,
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
					
					//getExperienceData();
					//getExperienceDataMobile();						
					
					var markup = "<tr id="+cnt+"><td><input type='checkbox' name='record' value=" + json.ins_experience_id + " ></td><td>" + prevCompanyName + "</td><td>" + prevJobTitle + "</td><td>" + prevStartDate + "</td><td>" + prevEndDate + "</td></tr>";
					$(".preview-table-ex").append(markup);
					
					var markup1 = "<div id='info-remove"+cnt+"'><div class='content-company div-delete'> <strong>Company Name: </strong>" + prevCompanyName + "</div><div class='content-position div-delete'><strong>Position Title: </strong>" + prevJobTitle + "</div><div class='start-date div-delete'><strong>Start Date: </strong>" + prevStartDate + "</div><div class='end-date div-delete'><strong>End Date: </strong>" + prevEndDate + "</div><hr></div>";
					$(".preview-table-ex1").append(markup1);						
					
                    $(".frmerror_experiencedetails").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                    return true;
                } else {						
					$("#err_prevCompanyName").html('<div class="text-danger">' + json.msg.prevCompanyName + '</div>');
					$("#err_prevJobTitle").html('<div class="text-danger">' + json.msg.prevJobTitle + '</div>');
					$("#err_prevStartDate").html('<div class="text-danger">' + json.msg.prevStartDate + '</div>');
					$("#err_prevEndDate").html('<div class="text-danger">' + json.msg.prevEndDate + '</div>');
                    $(".frmerror_experiencedetails").html('');
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
            url: deleteExperienceURL,
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
		$(".frmerror_educationdetails").html('<div class="loader"><div class="title">Saving...</div><div class="load"><div class="bar"></div></div></div>');
		
		$("#err_eduInstituteName").html('');
		$("#err_degree").html('');
		$("#err_eduStartDate").html('');
		$("#err_eduEndDate").html('');	
		
        var eduInstituteName = $("#eduInstituteName").val();
        var degree = $("#degree").val();
        var eduStartDate1 = $("#eduStartDate1").val();
        var eduEndDate1 = $("#eduEndDate1").val();     

		$.ajax({
            url: saveEducationURL,
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
					
					var markup2 = "<tr id="+cnt1+"><td><input type='checkbox' name='record' value=" + json.ins_edu_id +" ></td><td>" + eduInstituteName + "</td><td>" + degree + "</td><td>" + eduStartDate1 + "</td><td>" + eduEndDate1 + "</td></tr>";
					$(".preview-table-ex2").append(markup2);
		
					var markup3 = "<div id='info-remove"+cnt1+"'><div class='content-company div-delete'><strong>Institute Name: </strong>" + eduInstituteName + "</div><div class='content-position div-delete'><strong>Degree or Certificate: </strong>" + degree + "</div><div class='start-date div-delete'><strong>Start Date: </strong>" + eduStartDate1 + "</div><div class='end-date div-delete'><strong>End Date: </strong>" + eduEndDate1 + "</div><hr></div>";
					$(".preview-table-ex3-edu").append(markup3);
					
					
					  // getEducationData();
					  // getEducationDataMobile();
					  
                    $(".frmerror_educationdetails").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                    return true;
                } else {
					$("#err_eduInstituteName").html('<div class="text-danger">' + json.msg.eduInstituteName + '</div>');
					$("#err_degree").html('<div class="text-danger">' + json.msg.degree + '</div>');
					$("#err_eduStartDate").html('<div class="text-danger">' + json.msg.eduStartDate + '</div>');
					$("#err_eduEndDate").html('<div class="text-danger">' + json.msg.eduEndDate + '</div>');
                    $(".frmerror_educationdetails").html('');
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


                $('.preview-table-ex3-edu #info-remove' + $(this).parent().parent().attr('id')).remove();
                $(this).parent().parent().remove();
				delete_edu_array.push($(this).val());
            }
        });
		
		$.ajax({
            url: deleteEducationURL,
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
		$(".frmerror").html('<div class="loader"><div class="title">Saving...</div><div class="load"><div class="bar"></div></div></div>');
		
		$("#err_email").html('');
		$("#err_firstname").html('');
		$("#err_lastname").html('');
		$("#err_contact").html('');
		
        $.ajax({
            url: saveUserinfoURL,
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
					$(".frmerror").html('');
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
	
		$(".frmerror_compinfo").html('<div class="loader"><div class="title">Saving...</div><div class="load"><div class="bar"></div></div></div>');
		
		
		$("#err_companyname").html('');
        $("#err_jobtitle1").html('');
        $("#err_companyemail").html('');
        $("#err_companywebsite").html('');
					
        $.ajax({
            url: saveCompanyInfoURL,
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
					
                    $(".frmerror_compinfo").html('');
                    return false;
                }
            }
        });

    });
    // End Save Professional information ajax call

    // Start Social information ajax call		
    $('#socialInfoSubmit').on('click', function (e) {
		
		$(".frmerror_socialinfo").html('<div class="loader"><div class="title">Saving...</div><div class="load"><div class="bar"></div></div></div>');
		
		$("#err_facebook_url").html('');
		$("#err_twitter_url").html('');
		$("#err_googleplus_url").html('');
		$("#err_linkedin_url").html('');
		$("#err_youtube_url").html('');
		$("#err_pinterest_url").html('');
		$("#err_user_url").html('');
					
        $.ajax({
            url: saveSocialInfoURL,
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
                    $(".frmerror_socialinfo").html('');
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
		
		$(".frmerror_shortbioinfo").html('<div class="loader"><div class="title">Saving...</div><div class="load"><div class="bar"></div></div></div>');

        $.ajax({
            url: saveShortBioURL,
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
            url: saveSkillsAndExerptiseURL,
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
		 
		 $(".frmerror_price_plane").html('<div class="loader"><div class="title">Saving...</div><div class="load"><div class="bar"></div></div></div>');
		 
		$("#err_pricingtitle").html('');
		$("#err_pricingdescription").html(''); 
		 
        var pricingdescription = $("#pricingdescription").val();
        var pricingprice = $("#pricingprice").val();
        var pricingtitle = $("#pricingtitle").val();
		
		
			$.ajax({
            url: savePricePlanURL,
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
					funBlogClose('frmPricingPlan');
					return true;
                } else {
					$("#err_pricingtitle").html('<div class="text-danger">' + json.msg.pricingtitle + '</div>');
					$("#err_pricingdescription").html('<div class="text-danger">' + json.msg.pricingdescription + '</div>');
					
                    $(".frmerror_price_plane").html('');
                    return false;
                }
            }
        });
		
		
		
        
    });
	
	
	
	 $('#addpricingimage').click(function()
	 {
			
		 $(".frmerror_priceplanupload").html('<div class="loader"><div class="title">Saving...</div><div class="load"><div class="bar"></div></div></div>');
		 
		 $.ajax({
            url: savePricePlanImageURL,
            type: "POST",
            data: new FormData($("#example-1")[0]),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data)
            {                
					
				$(".frmerror_priceplanupload").html('');
				
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
						funBlogClose('example-1');
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
       
	   $(".frmerror_list").html('<div class="loader"><div class="title">Saving...</div><div class="load"><div class="bar"></div></div></div>');
	   
		var listname = $("#listname").val();
		$("#err_listname").html('');
		$.ajax({
            url: saveListURL,
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
					
					var markup2 = "<tr><td> " + srlist + "</td><td>" + listname +  "</td></tr>";
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
                    $(".frmerror_list").html('');
                    return false;
                }
            }
        });	


		
		
        
    });
	
	// end add list
	
	
	
	
	// start add link
	var cntlink=0;
	 $("#btnAddLink").click(function() {  

		$(".frmerror_addlink").html('<div class="loader"><div class="title">Saving...</div><div class="load"><div class="bar"></div></div></div>');	
      
		var linkname = $("#addlink").val();
	  
		$.ajax({
            url: saveLinkURL,
            type: "POST",
            data: new FormData($("#frmaddlink")[0]),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data)
            {
				cntlink=cntlink+1;
                var json = JSON.parse(data);
                if (json.status === 1) 
				{		
			
					//getLinkData();					
					
					var markup1 = "<tr><td> "+cntlink+" </td><td>"+ linkname +"</td></tr>";
					var markup3 = "<div class='linking'><a href=''>"+ linkname +"<span class='pull-right'><i class='fa fa-external-link' aria-hidden='true'></i></span></a></div>";
					$(".link-preview").append(markup1);
					$(".link-preview-ex5").append(markup3);
					$(".link-preview-ex6").append(markup3);						
					
			
					$('#addlink,#addlink_id').val(""); 
                    $(".frmerror_addlink").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                    return true;
                } else {
                    $("#err_addlink").html('<div class="text-danger">' + json.msg + '</div>');
                    $(".frmerror_addlink").html('');
                    return false;
                }
            }
			
			
        });	

			
	   
		
        
    });		
	// end add list
	
	// start add video url
	 $("#btnvideourl").click(function() { 
	
		$(".frmerror_videourl").html('<div class="loader"><div class="title">Saving...</div><div class="load"><div class="bar"></div></div></div>');
	
		
		$('#err_videourl').html('');
	
		var videourl = $("#videourl").val();	
		var video_description = $("#video_description").val();	
     
 		$.ajax({
            url: saveVideoURL,
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
                    $(".frmerror_videourl").html('');
                    return false;
                }
            }
        });	  

		
			
    });		
	// End add video url
	
	// start add portfolio
	 $("#btnaddportfolio").click(function() 
	 {

		$(".frmerror_portfolio").html('<div class="loader"><div class="title">Saving...</div><div class="load"><div class="bar"></div></div></div>');
	
		$("#err_port_video").html('');
		var videourl_portfolio = $("#videourl_portfolio").val();	
		var file2 = $("#file-2").val();	
	 
 		$.ajax({
            url: savePortfolioURL,
            type: "POST",
            data: new FormData($("#example-2")[0]),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data)
            {
				$(".frmerror_portfolio").html('');
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
						
						$('#videourl_portfolio,#file-2').val("");
						$(".frmerror_portfolio").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
						return true;
					}
					else
					{
						 $("#err_port_video").html('<div class="text-danger">' + json.msg.videourl_portfolio + '</div>');
						 $(".frmerror_portfolio").html('');
						return false;
					}	
					
                }
            }
        });	

			
    });		
	// End add portfolio
	
	
	// Start Save blog information ajax call	
    $('#btnsaveBlogAdd').on('click', function (e) 
	{
		
		$(".frmerror_blog").html('<div class="loader"><div class="title">Saving...</div><div class="load"><div class="bar"></div></div></div>');
		
		var short_bio_data = CKEDITOR.instances.blogshortdesc.getData();
		var long_bio_data = CKEDITOR.instances.bloglongdesc.getData();
		
		$('#blogshortdesc1').val(short_bio_data);
		$('#bloglongdesc1').val(long_bio_data);
		
		var blogtitle=$('#blogTitle').val();
		var blogshortdescr=short_bio_data;
		var bloglongdescr=long_bio_data;
		
		$("#err_blogTitle").html('');
		$("#err_blogshortdesc").html('');
		$("#err_bloglongdesc").html('');                      
		$("#err_coverimage").html('');                      
		$("#err_bloguploadvideo").html(''); 
		$("#err_txtblogvideourl").html(''); 
        $.ajax({
            url: saveBloginfoURL,
            type: "POST",
            data: new FormData($("#frmblog")[0]),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data)
            {
                var json = JSON.parse(data);
                if (json.status === 1) {
                    $("#err_blogTitle").html('');
                    $("#err_blogshortdesc").html('');
                    $("#err_bloglongdesc").html('');                      
                    $("#err_coverimage").html('');                      
                    $("#err_bloguploadvideo").html('');                      
                    $("#err_txtblogvideourl").html(''); 

					var markup2 = "<tr class='blog-previewdetail-"+json.blogid+"'  ><td>" + blogtitle + "</td><td>" + blogshortdescr + "</td><td>" + bloglongdescr + "</td><td>  <a href='#' onclick=deleteBlog("+ json.blogid +"); > Delete </a> </td></tr>";
					$(".blog-preview-table-ex").append(markup2);
					
					$("#frmblog")[0].reset();
					CKEDITOR.instances.bloglongdesc.setData('');
					CKEDITOR.instances.blogshortdesc.setData('');
					$(".frmerror_blog").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
                   // window.location = mainDashboardURL;
					return true;
                } else {
					$(".frmerror_blog").html('');
                   // $("#err_email").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg.email + '</div>');
                    $("#err_blogTitle").html('<div class="text-danger">' + json.msg.blogTitle + '</div>');
                    $("#err_blogshortdesc").html('<div class="text-danger">' + json.msg.blogshortdesc + '</div>');
                    $("#err_bloglongdesc").html('<div class="text-danger">' + json.msg.bloglongdesc + '</div>');                      
                    $("#err_coverimage").html('<div class="text-danger">' + json.msg.coverimage + '</div>');                      
                    $("#err_bloguploadvideo").html('<div class="text-danger">' + json.msg.bloguploadvideo + '</div>');                      
                    $("#err_txtblogvideourl").html('<div class="text-danger">' + json.msg.txtblogvideourl + '</div>');                      
                    return false;
                }
            }
        });
    });
    // End Save blog information ajax call
	
	
	
	// adding description of pricing plans
	// $("input[name$='priceimage']").click(function() {
	// 	var test = $(this).val();
	// 	$(".priceplanimage").hide();
	// 	$("#" + test).show();
	// });
	
	//  Pricing Plan Functionality Ends here
	
	//  Start Portfolio Functionality
	
	// $("input[name$='portfolioDiv']").click(function() {
	// 	var test1 = $(this).val();
	// 	$(".portfolioContent").hide();
	// 	$("#" + test1).show();
	// });




});








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
function getSkillsData() {
	$.ajax({
        url: getSkillsAndExerptiseURL,
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

function getblockSkillData() {
	$.ajax({
        url: getSkillsAndExerptDetailURL,
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
        url: getExperienceDataURL,
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
        url: getExperienceDataMobileURL,
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
        url: getEducationDataURL,
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
        url: getEducationDataMobileURL,
		type: "POST",
        data: {},
        contentType: false,
        cache: false,
        processData: false,			        
        success: function (data)
        {					
           $(".preview-table-ex3-edu").html(''); 					 
           $(".preview-table-ex3-edu").html(data);					 
			
        }
    });
	
}

function getListData()
{
	$.ajax({
        url: getListDataURL,
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
        url: getMainListDataURL,
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
        url: getListDataMobileURL,
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
        url: getLinkDataURL,
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
        url: getVideoDataURL,
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
        url: getPriceDataURL,
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
        url: saveSkillsAndExerptise1URL,
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
function deleteBlog(id)
{
	$.ajax({
            url: deleteblogURL,
            type: "POST",
            data: { blog_id:id },                
            success: function (data)
            {
               var json = JSON.parse(data);
				 if (json.status === 1) 
				 {
					$('.blog-previewdetail-'+id).remove();	
					$(".frmblog_err").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
					return true;
				 } else {
				 $(".frmblog_err").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + json.msg + '</div>');
				 return false;
				 }
            }
        });
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
	$("#selImgPrice").attr("src",baseURL+imag);
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
	
	$("#portfolioImg").attr("src",baseURL+image);
	
	$('#portfolio').modal('show');
	$("#dropzone").css('display','none');
	$("#portfolio_image_update").css('display','block');
	
}
function funBlogClose(id)
{
	$("#"+id)[0].reset();
	
}
function deletePrice(id)
{
	$.ajax({
            url: deletePriceURL,
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

