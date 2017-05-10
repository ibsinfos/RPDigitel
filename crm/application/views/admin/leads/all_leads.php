<?= message_box('success'); ?>
<?= message_box('error'); ?>

<style>

#lead_length {
	margin-right: 10px !important;
}
</style>
<div class="nav-tabs-custom">
    <!-- Tabs within a box -->
    <ul class="nav nav-tabs">
        <li class="<?= $active == 1 ? 'active' : ''; ?>"><a href="#manage"
                                                            data-toggle="tab"><?= lang('all_leads') ?></a></li>
        <li class="<?= $active == 2 ? 'active' : ''; ?>"><a href="#create"
                                                            data-toggle="tab"><?= lang('new_leads') ?></a></li>
        <li><a style="background-color: #1797be;color: #ffffff"
               href="<?= base_url() ?>admin/leads/import_leads"><?= lang('import_leads') ?></a></li>
    </ul>
    <div class="tab-content bg-white">
        <!-- ************** general *************-->
        <div class="tab-pane <?= $active == 1 ? 'active' : ''; ?>" id="manage">

            <div class="table-responsive">
                <table class="table table-striped" id="lead" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                    <th>id</th>
                        <th><?= lang('lead_name') ?></th>
                        <th><?= lang('contact_name') ?></th>
                        <th><?= lang('email') ?></th>
                        <th><?= lang('phone') ?></th>
                        <th>Assigned To</th>
                        <th>Comments</th>
                        <th><?= lang('lead_status') ?></th>
                        <th class="col-options no-sort"><?= lang('action') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
					$role = $this->session->userdata('user_type');
					
                    if (!empty($all_leads)):foreach ($all_leads as $v_leads):
                        if ($v_leads->converted_client_id == 0) {
                            $can_edit = $this->items_model->can_action('tbl_leads', 'edit', array('leads_id' => $v_leads->leads_id));
                            $can_delete = $this->items_model->can_action('tbl_leads', 'delete', array('leads_id' => $v_leads->leads_id));
                            ?>
                            <tr>
                            <td><?php echo $v_leads->leads_id; ?>
                                   
                                </td>
                                <td>
                                    <a href="<?= base_url() ?>admin/leads/leads_details/<?= $v_leads->leads_id ?>"><?= $v_leads->lead_name ?></a>
                                </td>
                                <td><?= $v_leads->contact_name ?></td>
                                <td><?= $v_leads->email ?></td>
                                <td><?= $v_leads->phone ?></td>
                                 <td> <?php
                                            if ($v_leads->permission != 'all') {
                                                $get_permission = json_decode($v_leads->permission);
                                                if (!empty($get_permission)) :
                                                    foreach ($get_permission as $permission => $v_permission) :
                                                        $user_info = $this->db->where(array('user_id' => $permission))->get('tbl_users')->row();
                                                        if ($user_info->role_id == 1) {
                                                                $label = 'circle-danger';
                                                            } else {
                                                                $label = 'circle-success';
                                                            }
                                                           
                                                        $profile_info = $this->db->where(array('user_id' => $permission))->get('tbl_account_details')->row();
                                                        ?>
 <a href="#" data-toggle="tooltip" data-placement="top"
                                                               title="<?= $profile_info->fullname ?>"><img
                                                                    src="<?= base_url() . $profile_info->avatar ?>"
                                                                    class="img-circle img-xs" alt="">
                                                <span style="margin: 0px 0 8px -10px;"
                                                      class="circle <?= $label ?>  circle-lg"></span>
                                                            </a>
                                               			 <?= $profile_info->fullname ?>
                                                        <?php
                                                    endforeach;
                                                endif;
                                            } else { ?>
                                                <strong><?= lang('everyone') ?></strong>
                                                <i
                                                    title="<?= lang('permission_for_all') ?>"
                                                    class="fa fa-question-circle" data-toggle="tooltip"
                                                    data-placement="top"></i>
                                                <?php
                                            }
                                            ?></td>
                                <td><?php 
                                $comment_details = $this->db->where('leads_id', $v_leads->leads_id)->order_by("task_comment_id", "desc")->limit(1, 0)->get('tbl_task_comment')->row();
                                
                                 if (!empty( $comment_details )) {
                               		 echo $comment_details->comment;
                                 }		 
                                ?>
                                </td>
                                <td><?php
                                    if (!empty($v_leads->lead_status_id)) {
                                        $lead_status = $this->db->where('lead_status_id', $v_leads->lead_status_id)->get('tbl_lead_status')->row();

                                        if ($lead_status->lead_type == 'open') {
                                            $status = "<span class='label label-success'>" . lang($lead_status->lead_type) . "</span>";
                                        } else {
                                            $status = "<span class='label label-warning'>" . lang($lead_status->lead_type) . "</span>";
                                        }
                                        echo $status . ' ' . $lead_status->lead_status;
                                    }
                                    ?>      </td>
                                <td>

                                    <?= btn_view('admin/leads/leads_details/' . $v_leads->leads_id) ?>
                                    <?php if (!empty($can_edit) || ( 1 == $role || 4 == $role ) ) { ?>
                                        <?= btn_edit('admin/leads/index/' . $v_leads->leads_id) ?>
                                    <?php }
                                    if ( 1 == $role || 4 == $role ) {
                                        ?>
                                        <?= btn_delete('admin/leads/delete_leads/' . $v_leads->leads_id) ?>
                                    <?php } ?>
                                    <?php if (!empty($can_edit) || ( 1 == $role || 4 == $role )) { ?>
                                        <div class="btn-group">
                                            <button class="btn btn-xs btn-success dropdown-toggle"
                                                    data-toggle="dropdown">
                                                <?= lang('change_status') ?>
                                                <span class="caret"></span></button>
                                            <ul class="dropdown-menu animated zoomIn">
                                                <?php
                                                $astatus_info = $this->db->get('tbl_lead_status')->result();
                                                if (!empty($astatus_info)) {
                                                    foreach ($astatus_info as $v_status) {
                                                        ?>
                                                        <li>
                                                            <a href="<?= base_url() ?>admin/leads/change_status/<?= $v_leads->leads_id ?>/<?= $v_status->lead_status_id ?>"><?= lang($v_status->lead_type) . '-' . $v_status->lead_status ?></a>
                                                        </li>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php
                        }
                    endforeach;
                    endif;
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane <?= $active == 2 ? 'active' : ''; ?>" id="create">
            <form role="form" enctype="multipart/form-data" id="form"
                  action="<?php echo base_url(); ?>admin/leads/saved_leads/<?php
                  if (!empty($leads_info)) {
                      echo $leads_info->leads_id;
                  }
                  ?>" method="post" class="form-horizontal">

                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-lg-2 control-label"><?= lang('lead_name') ?> <span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" value="<?php
                            if (!empty($leads_info)) {
                                echo $leads_info->lead_name;
                            }
                            ?>" name="lead_name" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"><?= lang('lead_source') ?> </label>
                        <div class="col-lg-4">
                            <select name="lead_source_id" class="form-control select_box" style="width: 100%"
                                    required="">
                                <?php
                                $lead_source_info = $this->db->get('tbl_lead_source')->result();
                                if (!empty($lead_source_info)) {
                                    foreach ($lead_source_info as $v_lead_source) {
                                        ?>
                                        <option
                                            value="<?= $v_lead_source->lead_source_id ?>" <?= (!empty($leads_info) && $leads_info->lead_source_id == $v_lead_source->lead_source_id ? 'selected' : '') ?>><?= $v_lead_source->lead_source ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <label class="col-lg-2 control-label"><?= lang('lead_status') ?> </label>
                        <div class="col-lg-4">
                            <select name="lead_status_id" class="form-control select_box" style="width:100%"
                                    required="">
                                <?php

                                if (!empty($status_info)) {
                                    foreach ($status_info as $type => $v_leads_status) {
                                        if (!empty($v_leads_status)) {
                                            ?>
                                            <optgroup label="<?= lang($type) ?>">
                                                <?php foreach ($v_leads_status as $v_l_status) { ?>
                                                    <option
                                                            value="<?= $v_l_status->lead_status_id ?>" <?php
                                                    if (!empty($leads_info->lead_status_id)) {
                                                        echo $v_l_status->lead_status_id == $leads_info->lead_status_id ? 'selected' : '';
                                                    }
                                                    ?>><?= $v_l_status->lead_status ?></option>
                                                <?php } ?>
                                            </optgroup>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"><?= lang('organization') ?> </label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" value="<?php
                            if (!empty($leads_info)) {
                                echo $leads_info->organization;
                            }
                            ?>" name="organization">
                        </div>
                        <label class="col-lg-2 control-label"><?= lang('contact_name') ?> <span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" value="<?php
                            if (!empty($leads_info)) {
                                echo $leads_info->contact_name;
                            }
                            ?>" name="contact_name" required="">
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"><?= lang('email') ?> <span
                                class="text-danger">*</span></label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" value="<?php
                            if (!empty($leads_info)) {
                                echo $leads_info->email;
                            }
                            ?>" name="email" required="">
                        </div>
                        <label class="col-lg-2 control-label"><?= lang('phone') ?><span
                                class="text-danger"> *</span></label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" value="<?php
                            if (!empty($leads_info)) {
                                echo $leads_info->phone;
                            }
                            ?>" name="phone" required="">
                        </div>

                    </div>
                    <!-- End discount Fields -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label"><?= lang('mobile') ?><span class="text-danger">*</span>
                        </label>
                        <div class="col-lg-4">
                            <input type="text" required="" class="form-control" value="<?php
                            if (!empty($leads_info)) {
                                echo $leads_info->mobile;
                            }
                            ?>" name="mobile"/>
                        </div>
                        <label class="col-lg-2 control-label"><?= lang('address') ?> </label>
                        <div class="col-lg-4">
                            <textarea name="address" class="form-control"><?php
                                if (!empty($leads_info)) {
                                    echo $leads_info->address;
                                }
                                ?></textarea>
                        </div>


                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"><?= lang('city') ?> </label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" value="<?php
                            if (!empty($leads_info)) {
                                echo $leads_info->city;
                            }
                            ?>" name="city">
                        </div>
                        <label class="col-lg-2 control-label"><?= lang('state') ?> </label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" value="<?php
                            if (!empty($leads_info)) {
                                echo $leads_info->state;
                            }
                            ?>" name="state">
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"><?= lang('country') ?></label>
                        <div class="col-lg-4">
                            <select name="country" class="form-control person select_box" style="width: 100%">
                                <optgroup label="Default Country">
                                    <?php if (!empty($leads_info->country)) { ?>
                                        <option value="<?= $leads_info->country ?>"><?= $leads_info->country ?></option>
                                    <?php } else { ?>
                                        <option
                                            value="<?= $this->config->item('company_country') ?>"><?= $this->config->item('company_country') ?></option>
                                    <?php } ?>
                                </optgroup>
                                <optgroup label="<?= lang('other_countries') ?>">
                                    <?php
                                    $countries = $this->db->get('tbl_countries')->result();
                                    if (!empty($countries)): foreach ($countries as $country):
                                        ?>
                                        <option value="<?= $country->value ?>"><?= $country->value ?></option>
                                        <?php
                                    endforeach;
                                    endif;
                                    ?>
                                </optgroup>
                            </select>
                        </div>
                        <label class="col-lg-2 control-label"><?= lang('facebook_profile_link') ?> </label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" value="<?php
                            if (!empty($leads_info)) {
                                echo $leads_info->facebook;
                            }
                            ?>" name="facebook">
                        </div>


                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"><?= lang('skype_id') ?> </label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" value="<?php
                            if (!empty($leads_info)) {
                                echo $leads_info->skype;
                            }
                            ?>" name="skype">
                        </div>
                        <label class="col-lg-2 control-label"><?= lang('twitter_profile_link') ?> </label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" value="<?php
                            if (!empty($leads_info)) {
                                echo $leads_info->twitter;
                            }
                            ?>" name="twitter">
                        </div>

                    </div>
                    <div class="form-group" id="border-none">
                        <label class="col-lg-2 control-label"><?= lang('short_note') ?> </label>
                        <div class="col-lg-8">
                            <textarea name="notes" class="form-control textarea"><?php
                                if (!empty($leads_info)) {
                                    echo $leads_info->notes;
                                }
                                ?></textarea>
                        </div>
                    </div>
                    <?php
                    if (!empty($leads_info)) {
                        $leads_id = $leads_info->leads_id;
                    } else {
                        $leads_id = null;
                    }
                    ?>
                    <?= custom_form_Fields(5, $leads_id, true); ?>

                    <div class="form-group" id="border-none">
                        <label for="field-1" class="col-sm-2 control-label"><?= lang('assined_to') ?> <span
                                class="required">*</span></label>
                        <div class="col-sm-9">
                            <div class="checkbox c-radio needsclick">
                                <label class="needsclick">
                                    <input id="" <?php
                                    if (!empty($leads_info->permission) && $leads_info->permission == 'all') {
                                        echo 'checked';
                                    } elseif (empty($leads_info)) {
                                        echo 'checked';
                                    }
                                    ?> type="radio" name="permission" value="everyone">
                                    <span class="fa fa-circle"></span><?= lang('everyone') ?>
                                    <i title="<?= lang('permission_for_all') ?>"
                                       class="fa fa-question-circle" data-toggle="tooltip"
                                       data-placement="top"></i>
                                </label>
                            </div>
                            <div class="checkbox c-radio needsclick">
                                <label class="needsclick">
                                    <input id="" <?php
                                    if (!empty($leads_info->permission) && $leads_info->permission != 'all') {
                                        echo 'checked';
                                    }
                                    ?> type="radio" name="permission" value="custom_permission"
                                    >
                                    <span class="fa fa-circle"></span><?= lang('custom_permission') ?> <i
                                        title="<?= lang('permission_for_customization') ?>"
                                        class="fa fa-question-circle" data-toggle="tooltip"
                                        data-placement="top"></i>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group <?php
                    if (!empty($leads_info->permission) && $leads_info->permission != 'all') {
                        echo 'show';
                    }
                    ?>" id="permission_user_1">
                        <label for="field-1"
                               class="col-sm-2 control-label"><?= lang('select') . ' ' . lang('users') ?>
                            <span
                                class="required">*</span></label>
                        <div class="col-sm-9">
                            <?php
                            if (!empty($assign_user)) {
                                foreach ($assign_user as $key => $v_user) {

                                    if ($v_user->role_id == 1) {
                                        $disable = true;
                                        $disable_manager = false;
                                        $disable_staff = false;
                                        $role = '<strong class="badge btn-danger">' . lang('admin') . '</strong>';
                                    } elseif( $v_user->role_id == 4 ) {
                                    	$disable = false;
                                    	$disable_staff = false;
                                        $disable_manager = true;
                                        $role = '<strong class="badge btn-primary">Manager</strong>';
                                    } else {
                                        $disable = false;
                                        $disable_manager = false;
                                        $disable_staff= true;
                                        $role = '<strong class="badge btn-primary">' . lang('staff') . '</strong>';
                                    }
                                    ?>
                                    <div class="checkbox c-checkbox needsclick">
                                        <label class="needsclick">
                                            <input type="checkbox"
                                                <?php
                                                if (!empty($leads_info->permission) && $leads_info->permission != 'all') {
                                                    $get_permission = json_decode($leads_info->permission);
                                                    foreach ($get_permission as $user_id => $v_permission) {
                                                        if ($user_id == $v_user->user_id) {
                                                            echo 'checked';
                                                        }
                                                    }

                                                }
                                                ?>
                                                   value="<?= $v_user->user_id ?>"
                                                   name="assigned_to[]"
                                                   class="needsclick">
                                                        <span
                                                            class="fa fa-check"></span><?= $v_user->username . ' ' . $role ?>
                                        </label>

                                    </div>
                                    <div class="action_1 p
                                                <?php

                                    if (!empty($leads_info->permission) && $leads_info->permission != 'all') {
                                        $get_permission = json_decode($leads_info->permission);

                                        foreach ($get_permission as $user_id => $v_permission) {
                                            if ($user_id == $v_user->user_id) {
                                                echo 'show';
                                            }
                                        }

                                    }
                                    ?>
                                                " id="action_1<?= $v_user->user_id ?>">
                                        <label class="checkbox-inline c-checkbox">
                                            <input id="<?= $v_user->user_id ?>" checked type="checkbox"
                                                   name="action_1<?= $v_user->user_id ?>[]"
                                                   disabled
                                                   value="view">
                                                        <span
                                                            class="fa fa-check"></span><?= lang('can') . ' ' . lang('view') ?>
                                        </label>
                                        <label class="checkbox-inline c-checkbox">
                                            <input <?php if (!empty($disable)) {
                                                echo 'disabled' . ' ' . 'checked';
                                            } ?>
                                          <?php   if (!empty($disable_manager)) {
	                                                	echo 'disabled'. ' ' . 'checked';
	                                           		 } ?>
                                             id="<?= $v_user->user_id ?>"
                                                <?php

                                                if (!empty($leads_info->permission) && $leads_info->permission != 'all') {
                                                	
                                                    $get_permission = json_decode($leads_info->permission);

                                                    foreach ($get_permission as $user_id => $v_permission) {
                                                        if ($user_id == $v_user->user_id) {
                                                            if (in_array('edit', $v_permission)) {
                                                                echo 'checked';
                                                            };

                                                        }
                                                    }
                                                	

                                                } else {
                                                	if (!empty($disable_manager)) {
                                               			 echo 'disabled'. ' ' . 'checked';
                                                	}
	                                                if (!empty($disable_staff)) {
	                                               	 echo 'checked';
	                                            	}	 	
                                                }	
                                                ?>
                                                 type="checkbox"
                                                 value="edit" name="action_<?= $v_user->user_id ?>[]">
                                                        <span
                                                            class="fa fa-check"></span><?= lang('can') . ' ' . lang('edit') ?>
                                        </label>
                                        <label class="checkbox-inline c-checkbox">
                                            <input <?php if (!empty($disable)) {
			                                                echo 'disabled' . ' ' . 'checked';
			                                            } ?> 
                                             <?php   if (!empty($disable_manager)) {
	                                                	echo 'disabled'. ' ' . 'checked';
	                                           		 } ?>
                                            id="<?= $v_user->user_id ?>"
                                                <?php

                                                if (!empty($leads_info->permission) && $leads_info->permission != 'all') {
                                                    $get_permission = json_decode($leads_info->permission);
                                                    foreach ($get_permission as $user_id => $v_permission) {
                                                        if ($user_id == $v_user->user_id) {
                                                            if (in_array('delete', $v_permission)) {
                                                                echo 'checked';
                                                            };
                                                        }
                                                    }
													if (!empty($disable_staff)) {
		                                                echo 'disabled';
		                                            } 
                                                if (!empty($disable_manager)) {
	                                                	echo 'disabled'. ' ' . 'checked';
	                                           		 }
                                                } else {
                                                	if (!empty($disable_staff)) {
		                                                echo 'disabled';
		                                            } 
	                                                 if (!empty($disable_manager)) {
	                                                	echo 'disabled'. ' ' . 'checked';
	                                           		 }
                                                }	
                                                ?>
                                                 name="action_<?= $v_user->user_id ?>[]" <?php if (!empty($disable)) {
                                                echo 'disabled' . ' ' . 'checked';
                                            } ?>
                                                 type="checkbox"
                                                 value="delete">
                                                        <span
                                                            class="fa fa-check"></span><?= lang('can') . ' ' . lang('delete') ?>
                                        </label>
                                        <input id="<?= $v_user->user_id ?>" type="hidden"
                                               name="action_<?= $v_user->user_id ?>[]" value="view">

                                    </div>


                                    <?php
                                }
                            }
                            ?>


                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label"></label>
                        <?php if (empty($leads_info->converted_client_id) || $leads_info->converted_client_id == 0) { ?>
                            <div class="col-lg-5">
                                <button type="submit" class="btn btn-sm btn-primary"><?= lang('updates') ?></button>
                            </div>
                        <?php } ?>
                    </div>
            </form>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {

	$('.table').DataTable( {
		 'paging': true,  // Table pagination
        'ordering': true,  // Column ordering
        'info': true,  // Bottom left status text
        "scrollX": true,
	   	"aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
	   	"iDisplayLength": 25,
	    'dom': 'lBfrtip',  // Bottom left status text
       buttons: [

           {
               extend: 'print',
               text: "<i class='fa fa-print'> </i>",
               className: 'btn btn-danger btn-xs mr'
           },
           {
               extend: 'print',

               text: '<i class="fa fa-print"> </i> &nbsp;selected',
               className: 'btn btn-success mr btn-xs'
           },
           {
               extend: 'excel',
               text: '<i class="fa fa-file-excel-o"> </i>',
               className: 'btn btn-purple mr btn-xs'
           },
           {
               extend: 'csv',
               text: '<i class="fa fa-file-excel-o"> </i>',
               className: 'btn btn-primary mr btn-xs'
           },
           {
               extend: 'pdf',
               text: '<i class="fa fa-file-pdf-o"> </i>',
               className: 'btn btn-info mr btn-xs'
           }
       ],
       "columnDefs": [
                      {
                          "targets": [ 0 ],
                          "visible": false,
                          "searchable": false
                      }
                  ],
                  "order": [[ 0, "desc" ]]
	 });

});
	 
	 
	</script>