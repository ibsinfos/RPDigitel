<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">

                <!-- /span6 -->
                <div class="span12">

                    <!-- /widget -->

                    <!-- /widget -->
                    <div class="widget widget-table action-table">
                        <span class=frmerror></span>
                        <div class="widget-header"> <i class="icon-th-list"></i>
                            <h3>Auto Responder Wizard</h3>
                        </div>
                        <!-- /widget-header -->
                        <form name="" id="frmauto">
                            <div class="widget-content message_Box_Panel">

                                <div class="Add_Message_Btn">
                                    <button type=button name="addDom" class="btn btn-primary"> Add Text Message </button>
                                    <p><strong>Note:</strong> Items that scheduled during 11:00 PM - 06:00 AM will be reschedule to 08:00 AM in order to prevent user interruption.</p>
                                </div>
                                <hr>
                                <div class="Append_Year">
                                </div>
                                <br>
                                <br><br><br><br>
                                <div class="Create_New_Btn">
                                    <button class="btn btn-warning" type="button" onclick="history.back(-1)">Cancel</button>
                                    <a><button href="#myModal" role="button" class="btn btn-warning" data-toggle="modal" class="btn btn-warning">Continue</button></a>
                                </div><br>



                                <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                        <h3 id="myModalLabel">Auto Responder Wizard</h3>
                                    </div>


                                    <br>
                                    <div class="control-group">											
                                        <label class="control-label2" for="password1">Auto Responder Name:</label>
                                        <div class="controls">
                                            <input type="text" name="auto_responder_name" class="span4" id="password1" value="">
                                        </div> <!-- /controls -->				
                                    </div>


                                    <div class="control-group">											
                                        <label class="control-label2" for="radiobtns">Opt-in list:</label>

                                        <div class="controls">


                                            <div class="Theme_DropDown">

                                                <select name="optin_list_id" id="templates" onchange="changeTempContent(this.value)">
                                                    <option value="">Select Optin List</option>
                                                    <?php foreach ($optindata as $opt) { ?>
                                                        <option value="<?php echo $opt['id']; ?>"><?php echo $opt['list_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>






                                        </div>	<!-- /controls -->			
                                    </div>


                                    <!--div class="control-group">											
                                        <label class="control-label2">Apply to already opted-in numbers:</label>


                                        <div class="controls">
                                            <label class="radio inline">
                                                <input type="radio" value="1" name="already_applied_numbers"  name="radiobtns">
                                            </label>


                                        </div>	<!-- /controls --			
                                    </div-->

                                    <br>




                                    <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                        <button class="btn btn-primary" id="msgsubmit">Save changes</button>
                                    </div>
                                </div>




                            </div>

                        </form>
                        <!-- /widget-content --> 
                    </div>
                    <!-- /widget --> 

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
<!-- /main -->

<script src="<?php echo asset_url() ?>inner/js/jquery-1.7.2.min.js"></script>

<script>

                                                    $(document).ready(function () {
                                                        var counter = 0;
                                                        $("button[name='addDom']").click(function () {
                                                            ++counter;
                                                            var domElement = $('<div class="Text_Message_Format module_holder" style="float:left">\n\
        <div class="top_Spacing_Each"> \n\
        <div class=span4> \n\
        <label>Text Message</label>\n\
         <textarea class=form-control rows=3 name=msgbody[]></textarea> \n\
        </div>\n\
        <div class=span5> \n\
        <div class=span5>\n\
        <label>Time from opt-in</label>\n\
        <select style="width:130px" name=number[]> \n\
        <option value=1>Select</option>\n\
        <option value=1>1</option>\n\
        <option value=2>2</option> \n\
        <option value=3>3</option> \n\
        <option value=4>4</option> \n\
        <option value=5>5</option> \n\
        <option value=6>6</option>  \n\
        <option value=7>7</option> \n\
        <option value=8>8</option> \n\
        <option value=9>9</option> \n\
        <option value=10>10</option> \n\
        <option value=11>11</option> \n\
        <option value=12>12</option>\n\
        </select> \n\
        <select style="width:130px" class"Space_bottom" onchange="check_freq(this.value,' + counter + ')" name=freq[]> \n\
        <option value=>Select</option> \n\
        <option value="min">Minute</option>     \n\
        <option value="hour">Hour</option> \n\
        <option value="day">Day</option> \n\
        <option value="week">Week</option> \n\
        <option value="month">Month</option></select> \n\
        \n\
 <span  id="' + counter + '">Hours\n\
        <select style="width:130px" name = hour[]>\n\
<option value = "06:00 AM"> 06:00 AM </option><option value = "06:15 AM"> 06:15 AM </option>\n\
<option  value = "06:30 AM"> 06:30 AM </option><option value = "06:45 AM"> 06:45 AM </option>\n\
<option value = "07:00 AM"> 07:00 AM </option><option value = "07:15 AM"> 07:15 AM </option>\n\
<option value = "07:30 AM"> 07:30 AM </option><option value = "07:45 AM"> 07:45 AM </option>\n\
<option value = "08:00 AM"> 08:00 AM </option><option value = "08:15 AM"> 08:15 AM </option>\n\
<option value = "08:30 AM"> 08:30 AM </option><option value = "08:45 AM"> 08:45 AM </option>\n\
<option value = "09:00 AM"> 09:00 AM </option><option value = "09:15 AM"> 09:15 AM </option>\n\
<option value = "09:30 AM"> 09:30 AM </option><option value = "09:45 AM"> 09:45 AM </option>\n\
<option value = "10:00 AM"> 10:00 AM </option><option value = "10:15 AM"> 10:15 AM </option>\n\
<option value = "10:30 AM"> 10:30 AM </option><option value = "10:45 AM"> 10:45 AM </option>\n\
<option value = "11:00 AM"> 11:00 AM </option><option value = "11:15 AM"> 11:15 AM </option>\n\
<option value = "11:30 AM"> 11:30 AM </option><option value = "11:45 AM"> 11:45 AM </option>\n\
<option value = "12:00 PM"> 12:00 PM </option><option value = "12:15 PM"> 12:15 PM </option>\n\
<option value = "12:30 PM"> 12:30 PM </option><option  value = "12:45 PM"> 12:45 PM </option>\n\
<option value = "01:00 PM"> 01:00 PM </option><option value = "01:15 PM"> 01:15 PM </option>\n\
<option value = "01:30 PM"> 01:30 PM </option><option value = "01:45 PM"> 01:45 PM </option>\n\
<option value = "02:00 PM"> 02:00 PM </option><option    value = "02:15 PM"> 02:15 PM </option>\n\
<option value = "02:30 PM"> 02:30 PM </option><option    value = "02:45 PM"> 02:45 PM </option>\n\
<option value = "03:00 PM"> 03:00 PM </option><option    value = "03:15 PM"> 03:15 PM </option>\n\
<option value = "03:30 PM"> 03:30 PM </option><option  value = "03:45 PM"> 03:45 PM </option>\n\
<option value = "04:00 PM"> 04:00 PM </option><option    value = "04:15 PM"> 04:15 PM </option>\n\
<option value = "04:30 PM"> 04:30 PM </option><option   value = "04:45 PM"> 04:45 PM </option>\n\
<option value = "05:00 PM"> 05:00 PM </option><option    value = "05:15 PM"> 05:15 PM </option>\n\
<option value = "05:30 PM"> 05:30 PM </option><option   value = "05:45 PM"> 05:45 PM </option>\n\
<option value = "06:00 PM"> 06:00 PM </option><option   value = "06:15 PM"> 06:15 PM </option>\n\
<option  value = "06:30 PM"> 06:30 PM </option><option   value = "06:45 PM"> 06:45 PM </option>\n\
<option value = "07:00 PM"> 07:00 PM </option><option   value = "07:15 PM"> 07:15 PM </option>\n\
<option value = "07:30 PM"> 07:30 PM </option><option   value = "07:45 PM"> 07:45 PM </option>\n\
<option value = "08:00 PM"> 08:00 PM </option>\n\
\n\<option value = "08:15 PM"> 08:15 PM </option>\n\
<option value = "08:30 PM"> 08:30 PM </option><option value = "08:45 PM"> 08:45 PM </option>\n\
<option value = "09:00 PM"> 09:00 PM </option><option value = "09:15 PM"> 09:15 PM </option>\n\
<option value = "09:30 PM"> 09:30 PM </option><option value = "09:45 PM"> 09:45 PM </option>\n\
<option value = "10:00 PM"> 10:00 PM </option></select></span>\n\
        </div>\n\
        </div>  \n\
        </div>\n\
        </div>');
                                                            $('.Append_Year').before(domElement);
                                                        });
                                                    });
                                                    $('#msgsubmit').on('click', function (e) {
                                                        //$("#step-1").validate();
                                                        e.preventDefault();
                                                        //var formData = new FormData($("#frmauto")[0]);
                                                        var url = base_url + "add-auto-responder"; // the script where you handle the form input.
                                                        //alert($("#frmauto").serialize());
                                                        $.ajax({
                                                            type: "POST",
                                                            url: url,
                                                            data: $("#frmauto").serialize(),
                                                            dataType: 'json',
                                                            success: function (data)
                                                            {
                                                                if (data.status === 1) {
                                                                    $('#myModal').modal('toggle');
                                                                    $(".frmerror").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + data.msg + '</div>');
                                                                    $("html, body").animate({
                                                                        scrollTop: 0
                                                                    }, 600);
                                                                    $('#frmauto')[0].reset();
                                                                    return true;
                                                                } else if (data.status == 2) {
                                                                    alert(data.msg);
                                                                    window.location.href = base_url + 'login';
                                                                } else {
                                                                    $('#myModal').modal('toggle');
                                                                    $(".frmerror").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + data.msg + '</div>');
                                                                    $("html, body").animate({
                                                                        scrollTop: 0
                                                                    }, 600);
                                                                }
                                                            }
                                                        });
                                                    });

                                                    function check_freq(val, counter) {
                                                        if (val == 'min' || val == 'hour') {
                                                            $("#" + counter).hide();
                                                        } else {
                                                            $("#" + counter).show();
                                                        }
                                                    }
</script>