<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">

                <!-- /span6 -->
                <div class="span12">

                    <!-- /widget -->

                    <!-- /widget -->
                    <div class="widget widget-table action-table">
					<span><?php if($this->session->flashdata('msg')!=''){?>
							<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong><?php echo $this->session->flashdata('msg');?></strong>
							</div>
							<?php }?>
							</span>
                        <div class="widget-header"> <i class="icon-th-list"></i>
                            <h3>Optin Lists</h3>
							
                        </div>
                        
                        <!-- /widget-header -->
                        <div class="widget-content">
                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
										<th> ID </th>
                                        <th> TYPE </th>                                        
                                        <th> LIST NAME </th>
                                        <th> USERS OPTED </th>
                                        <th> MODIFIED </th>
                                        <th> MORE </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sr = 1;
                                    foreach ($lists as $list) { 
                                        $opted_users = $this->common_model->getRecords(TABLES::$CONTACT_MAPPING, 'mapping_id', array('list_id' => $list['id']));
                                        ?>
                                        <tr>
                                            
                                            <td> <?php echo $sr++; ?> </td>
											<td> Optin List </td>
                                            <td> <?php echo $list['list_name'] ?> </td>
                                            <td><?php echo count($opted_users);?>  </td>
                                            <td> <?php echo date("d F Y", strtotime($list['created_time'])) ?></td>
                                            <td class=""><a href="<?php echo base_url()."edit-optinlist/".encode_url($list['id'])?>" class="btn btn-small btn-warning"><i class="btn-icon-only icon-edit"> Edit </i></a>
                                                <a href="<?php echo base_url()."delete-optinlist/".encode_url($list['id'])?>" class="btn btn-danger btn-small" onclick="return confirm('Are you sure to delete?')"><i class="btn-icon-only icon-remove"> Delete </i></a>
                                                <a href="<?php echo base_url()."optinlist-users/".encode_url($list['id'])?>" class="btn btn-success btn-small"><i class="btn-icon-only icon-user"> Users </i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                         <?php echo $pagination; ?>
                        <!-- /widget-content --> 
                        <div class="Create_New_Btn">
                            <a href="<?php echo base_url() ?>new-optinlist"><button class="btn btn-warning">CREATE NEW</button></a>
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