

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

                                <span class="frmerror"></span>

                                <div id="Text_Message_Form">

                                    <div class="" id="formcontrols">

                                        <form method="POST" id="frmauto" class="form-horizontal">

                                            <fieldset>





                                                <div class="control-group">											

                                                    <label class="control-label" for="radiobtns">Choose List Type</label>



                                                    <div class="controls">



                                                        <div class="Theme_DropDown">



                                                            <select name="list_type" id="list_type">

                                                                <option value="1">Opt in database</option>





                                                            </select>

                                                        </div>











                                                    </div>	<!-- /controls -->			

                                                </div>







                                                <div class="control-group">											

                                                    <label class="control-label" for="username">List Name</label>

                                                    <div class="controls">

                                                        <input type="text" class="span6" required="required" id="listname" name="list_name">



                                                    </div> <!-- /controls -->				

                                                </div> <!-- /control-group -->



                                                <div class="control-group">											

                                                    <label class="control-label" for="username"></label>

                                                    <div class="controls">

                                                        <a><button name="addDom" role="button" class="btn btn-warning" type="button" data-toggle="modal" class="btn btn-warning">Add Contacts to the list</button></a>



                                                        <div class="Append_Year">

                                                        </div>

                                                    </div> <!-- /controls -->				

                                                </div> <!-- /control-group -->

                                                <div class="control-group">											

                                                    <label class="control-label" for="firstname">Select Contacts</label>

                                                    <div class="controls">

                                                        <select multiple  class="span6" id="firstname" name="existing_contacts[]">

                                                            <?php
                                                            foreach ($contacts as $contact) {

                                                                echo "<option value='" . $contact['id'] . "'>" . $contact['first_name'] . " " . $contact['last_name'] . "</option>";
                                                            }
                                                            ?>



                                                        </select>

                                                    </div> 

                                                </div> 

                                                <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                                                    <div class="modal-header">

                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>

                                                        <h3 id="myModalLabel">Auto Responder Wizard</h3>

                                                    </div>

                                                    <div class="modal-footer">

                                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>



                                                    </div>

                                                </div>



                                                <div class="controls">

                                                    <label class="checkbox inline">

                                                        <input type="checkbox"> Notify me when user opts in

                                                    </label>

                                                </div>		<!-- /controls -->		

                                                </div> <!-- /control-group -->

                                                <br />

                                                <div class="form-actions">

                                                    <button class="btn btn-primary" id="msgsubmit">Save changes</button>

                                                    <button type="button" onclick="javascript:window.history.back();" class="btn">Cancel</button>

                                                </div> <!-- /form-actions -->

                                            </fieldset>

                                        </form>

                                    </div>







                                </div>





                            </div>











                        </div> <!-- /widget-content -->



                    </div> <!-- /widget -->



                </div> <!-- /span8 -->









            </div> <!-- /row -->



        </div> <!-- /container -->



    </div> <!-- /main-inner -->



</div> <!-- /main -->

<!--include jQuery -->

<script src="<?php echo asset_url() ?>inner/js/jquery-1.7.2.min.js"></script>

<script>



                                                        $(document).ready(function () {



                                                            $("button[name='addDom']").click(function () {

                                                                var domElement = $('<div class="Text_Message_Format module_holder"><div class="top_Spacing_Each"><div class=span2><label>First Name *</label><input type=text class=form-control name=first_name[]></div><div class=span2><label>Last Name *</label><input type=text class=form-control name=last_name[]></div><div class=span2><label>Email</label><input type=text class=form-control name=email[]></div><div class=span2><label>Phone No *</label><input type=text class=form-control name=phone[]></div><div class=span5><div class=span2></div></div></div></div>');

                                                                $('.Append_Year').after(domElement);

                                                            });

                                                            $('#msgsubmit').on('click', function (e) {

                                                                //$("#step-1").validate();

                                                                e.preventDefault();

                                                                var url = base_url + "frontend/contacts/addOptinList"; // the script where you handle the form input.

                                                                //alert(url);

                                                                $.ajax({
                                                                    type: "POST",
                                                                    url: url,
                                                                    data: $("#frmauto").serialize(),
                                                                    dataType: 'json',
                                                                    success: function (data)

                                                                    {

                                                                        if (data.status == '0') {

                                                                            $(".frmerror").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + data.msg + '</div>');

                                                                            $("html, body").animate({
                                                                                scrollTop: 0

                                                                            }, 600);

                                                                        } else if (data.status == 2) {
                                                                            alert(data.msg);
                                                                            window.location.href = base_url + 'login';
                                                                        } else {

                                                                            $(".frmerror").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + data.msg + '</div>');

                                                                            $("html, body").animate({
                                                                                scrollTop: 0

                                                                            }, 600);

                                                                            $('#frmauto')[0].reset();

                                                                            return true;

                                                                        }

                                                                    }

                                                                });

                                                            });

                                                        });



</script>