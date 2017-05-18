<script src="<?php echo base_url(); ?>assets/backend/js/select-all-delete.js"></script>
<script type="text/javascript">
    function changeStatus(newsletter_id, newsletter_status) {
        /* changing the newsletter status*/
        var obj_params = new Object();
        obj_params.newsletter_id = newsletter_id;
        obj_params.newsletter_status = newsletter_status;
        jQuery.post("<?php echo base_url(); ?>backend/newsletter/change-status",
                obj_params, function (msg) {
                    alert(msg.error_message);
                    document.location.reload();
                }, "json");
    }
</script><!--main content start-->
<section id="main-content">   
    <section class="wrapper">     
        <?php
        $msg = $this->session->userdata('msg');
        ?>        <?php if ($msg != '') { ?>   
            <div class="msg_box alert alert-success"> 
                <button type="button" class="close" data-dismiss="alert" id="msg_close" name="msg_close">X</button>   
                <?php
                echo $msg;
                $this->session->unset_userdata('msg');
                ?>      
            </div>  
            <?php
        }
        ?>   
        <section class="panel">
            <header class="panel-heading">
                Users List              
            </header>         
            <div class="panel-body"> 
                <div class="adv-table">  
                    <table id="example1" class="table table-bordered table-striped"> 
                        <thead>             
                            <tr>                
                                <th>Sr No</th>      
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Mobile</th>      
                                <th>Company Name</th>  
                                                        <!--<th>Last Visit</th>-->
                                <th>Status</th>         
                                <th style="width:230px !important">Action</th>         
                            </tr>                   
                        </thead>                
                        <tbody>                 
                            <?php
                            $sr = 0;
                            foreach ($arr_user_data as $user) {
                                $sr++;
                                ?>                  
                                <tr>                
                                    <td><?php echo $sr; ?></td> 
                                    <td>
                                        <a title="View Details" href="<?php echo base_url(); ?>backend/user/detail/<?php echo $user['id']; ?>"><?php echo $user['first_name'] . " " . $user['last_name']; ?></a></td> 
                                    <td><?php echo $user['email']; ?></td>  
                                    <td><?php echo $user['mobile']; ?></td>   
                                    <td><?php echo $user['company_name']; ?></td>   
                                    <!--<td><?php // if($user['last_visit_date'] == NULL) echo "Not visited";else echo date("d F Y H:i a",strtotime($user['last_visit_date']));               ?></td>-->  
                                    <td><?php
                                        if ($user['verified'] == 0)
                                            echo "Inactive";
                                        else
                                            echo "Active";
                                        if ($user['email_verify'] != '1')
                                            echo "(Email not verified)";
                                        ?></td>    
                                    <td>          
                                        <a title="Edit User" href="<?php echo base_url(); ?>backend/users/editUser/<?php echo $user['id']; ?>" class="btn btn-success dropdown-toggle btn-xs"><i class="fa fa-cross"></i>Edit</a>  
                                        <a title="Delete User" onclick="return confirm('Are you sure to delete this user?')" href="<?php echo base_url(); ?>backend/users/deleteUser/<?php echo $user['id']; ?>" class="btn btn-danger dropdown-toggle btn-xs"><i class="fa fa-cross"></i>Delete</a>
                                        <a data-toggle="modal" data-target="#myModal<?php echo $sr ?>" title="Send Email" class="btn btn-success dropdown-toggle btn-xs"><i class="fa fa-cross"></i>Reset Password</a>         
                                    </td>           
                                </tr>  
                                <!-- Modal -->
                            <div id="myModal<?php echo $sr ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            
                                            <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reset Password</h4>
      </div>
                                            <div class="modal-body">
                                                <span class="status"></span>
                                                <form>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="form-control-label">Password:</label>
                                                        <input type="password" name="password" class="form-control" id="pass<?php echo $sr; ?>">
                                                        <input type="hidden" name="password" value="<?php echo $user['id'] ?>" class="form-control" id="userid<?php echo $sr; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="form-control-label">Confirm Password:</label>
                                                        <input type="password" name="confirm_password" class="form-control" id="confirmpass<?php echo $sr; ?>">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" onclick="resetpass(<?php echo $sr; ?>)" class="btn btn-primary pull-left">Reset password</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>              
                        </tbody>        
                    </table>   

                </div>    
            </div>
        </section>  
    </section>
</section>


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
<script>
                                                    function resetpass(id) {
                                                        var dataString = 'password=' + $("#pass" + id).val() + '&confirmpass=' + $("#confirmpass" + id).val() + '&userid=' + $("#userid" + id).val();
                                                        //alert(dataString);
                                                        $.ajax({
                                                            type: "POST",
                                                            url: "<?php echo base_url() ?>backend/users/resetPassword",
                                                            data: dataString,
                                                            cache: false,
                                                            dataType: 'json',
                                                            success: function (result) {
                                                                if (result.status === 1) {
                                                                    $(".status").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>'+result.msg+'</div>');
                                                                    $("#pass" + id).val("");
                                                                     $("#confirmpass" + id).val("");
                                                                }else{
                                                                    $(".status").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>'+result.msg+'</div>');
                                                                }
                                                            }

                                                        });
                                                    }
</script>