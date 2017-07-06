<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">

                <!-- /span6 -->
                <div class="span12">

                    <!-- /widget -->

                    <!-- /widget -->
                    <div class="widget widget-table action-table">
                        <div class="widget-header"> <i class="icon-user"></i>
                            <h3>Total <b><?php echo count($users); ?></b> Registered Numbers</h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th> ID </th>
                                        <th> MOBILE </th>                                        
                                        <th> FIRST NAME </th>
                                        <th> LAST NAME </th>
                                        <th> CREATED DATE</th>
                                        <th> MORE </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sr = 1;
                                    foreach ($users as $users) {
                                        ?>
                                        <tr>                                            
                                            <td> <?php echo $sr++; ?> </td>
                                            <td> <?php echo $users['phone'] ?> </td>
                                            <td><?php echo $users['first_name']; ?>  </td>
                                            <td><?php echo $users['last_name']; ?>  </td>
                                            <td> <?php echo date("d F Y h:i:s a", strtotime($users['created_time'])) ?></td>
                                            <td class=""><a alt="Remove number from this list" href="<?php echo base_url() . "textmsg/" . encode_url($users['phone']) ?>" class="btn btn-small btn-success"><i class="btn-icon-only icon-share"> Send</i></a>
                                                <a href="javascript:;" onClick="assign_values('<?php echo $users['first_name'] . "^" . $users['last_name'] . "^" . $users['email'] . "^" . $users['phone'] . "^" . $users['id'] ?>');" class="btn btn-warning btn-small"><i class="btn-icon-only icon-edit" data-toggle="modal" data-target=".myModal"> Edit </i></a>

                                                <a href="<?php echo base_url() . "delete-optinlist-user/" . encode_url($users['mapping_id']) ?>" class="btn btn-danger btn-small" onclick="return confirm('Are you sure to delete?')"><i class="btn-icon-only icon-remove"> Delete </i></a>
                                            </td>
                                        </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
                            <!-- Modal -->
                            <div id="" class="modal fade myModal" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Edit User</h4>
                                        </div>
                                        <div class="modal-body">
                                            <span class="frmerror"></span>
                                            <form method="POST" id="frmauto">
                                                <div class="control-group">											
                                                    <label class="control-label" for="radiobtns">First name</label>

                                                    <div class="controls">

                                                        <input type="text" id="first_name" name="first_name">

                                                    </div>	<!-- /controls -->			
                                                </div>
                                                <div class="control-group">											
                                                    <label class="control-label" for="radiobtns">Last name</label>

                                                    <div class="controls">

                                                        <input type="text" name="last_name" id="last_name">

                                                    </div>	<!-- /controls -->			
                                                </div>
                                                <div class="control-group">											
                                                    <label class="control-label" for="radiobtns">Email</label>

                                                    <div class="controls">

                                                        <input type="text" name="email" id="email">

                                                    </div>	<!-- /controls -->			
                                                </div>
                                                <div class="control-group">											
                                                    <label class="control-label" for="radiobtns">Mobile</label>

                                                    <div class="controls">

                                                        <input type="text" name="phone" id="mobile">
                                                        <input type="hidden" name="edit_id" id="edit_id">

                                                    </div>	<!-- /controls -->			
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success" id="edit_user">Submit</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

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

<script type="application/javascript">
    function assign_values(val){
    //alert(val);
    var data = val.split('^');
    $('#first_name').val(data[0]);
    $('#last_name').val(data[1]);
    $('#email').val(data[2]);
    $('#mobile').val(data[3]);
    $('#edit_id').val(data[4]);
    }

    $('#edit_user').on('click', function (e) {
    //$("#step-1").validate();
    e.preventDefault();
    var url = base_url + "frontend/contacts/editUser"; // the script where you handle the form input.
    // alert(url);
    $.ajax({
    type: "POST",
    url: url,
    data: $("#frmauto").serialize(),
    dataType: 'json',
    success: function (data)
    {
    //alert(data);
    if (data.status == '0') {
    $(".frmerror").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + data.msg + '</div>');
    $("html, body").animate({
    scrollTop: 0
    }, 600);
    } else {
    $(".frmerror").html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">X</button><strong>' + data.msg + '</div>');
    $("html, body").animate({
    scrollTop: 0
    }, 600);
    return true;
    }
    }
    });
    });
</script>