<?php 
$employee = $this->db->get_where('user', array('user_code' => $user_code))->result_array();
foreach ($employee as $row):
?>
<ol class="breadcrumb" style="margin-bottom: 0px;">
    <li>
        <a href="<?php echo base_url() ?>index.php?admin/dashboard">
            <i class="entypo-folder"></i>
            <?php echo get_phrase('dashboard'); ?>
        </a>
    </li>
    <li>
        <a href="<?php echo base_url(); ?>index.php?admin/employee/list">
            <?php echo get_phrase('employee_list') ?>
        </a>
    </li>
    <li><?php echo get_phrase('employee_profile') ?></li>
</ol>
<div class="row">

    <div class="col-md-12">

        <ul class="nav nav-tabs bordered"><!-- available classes "bordered", "right-aligned" -->
            <li class="active">
                <a href="#personal_details" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-home"></i></span>
                    <span class="hidden-xs"><?php echo get_phrase('personal_details'); ?></span>
                </a>
            </li>
            <li>
                <a href="#company_details" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-user"></i></span>
                    <span class="hidden-xs"><?php echo get_phrase('company_details'); ?></span>
                </a>
            </li>
            <li>
                <a href="#bank_account_details" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-user"></i></span>
                    <span class="hidden-xs"><?php echo get_phrase('bank_account_details'); ?></span>
                </a>
            </li>
            <li>
                <a href="#document" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-user"></i></span>
                    <span class="hidden-xs"><?php echo get_phrase('documents'); ?></span>
                </a>
            </li>
        </ul>

        <br>
            
        

                <div class="tab-content">
                    <div class="tab-pane active" id="personal_details">

                        <table class="table table-striped">

                            <tr>
                                <td><?php echo get_phrase('photo');?></td>
                                <td>
                                    <?php
                                    $image_path = 'uploads/user_image/' . $user_code . '.jpg';
                                    if(!file_exists($image_path))
                                        $image_path = 'uploads/user.jpg';
                                    ?>
                                    <img src="<?php echo $image_path; ?>" width="200" />
                                </td>
                            </tr>
                
                            <tr>
                                <td><?php echo get_phrase('name');?></td>
                                <td><b><?php echo $row['name']; ?></b></td>
                            </tr>

                            <tr>
                                <td><?php echo get_phrase('email');?></td>
                                <td><b><?php echo $row['email']; ?></b></td>
                            </tr>

                            <tr>
                                <td><?php echo get_phrase('father_name'); ?></td>
                                <td><b><?php echo $row['father_name']; ?></b></td>
                            </tr>

                            <tr>
                                <td><?php echo get_phrase('date_of_birth');?></td>
                                <td><b><?php if($row['date_of_birth'] != '') echo date('d/m/Y', $row['date_of_birth']); ?></b></td>
                            </tr>

                            <tr>
                                <td><?php echo get_phrase('gender');?></td>
                                <td><b><?php echo $row['gender']; ?></b></td>
                            </tr>

                            <tr>
                                <td><?php echo get_phrase('phone');?></td>
                                <td><b><?php echo $row['phone']; ?></b></td>
                            </tr>

                            <tr>
                                <td><?php echo get_phrase('local_address');?></td>
                                <td><b><?php echo $row['local_address']; ?></b></td>
                            </tr>

                            <tr>
                                <td><?php echo get_phrase('permanent_address');?></td>
                                <td><b><?php echo $row['permanent_address']; ?></b></td>
                            </tr>

                            <tr>
                                <td><?php echo get_phrase('nationality');?></td>
                                <td><b><?php echo $row['nationality']; ?></b></td>
                            </tr>

                            <tr>
                                <td><?php echo get_phrase('martial_status');?></td>
                                <td><b><?php echo get_phrase($row['martial_status']); ?></b></td>
                            </tr>
                            
                        </table>

                    </div>

                    <div class="tab-pane" id="company_details">

                        <table class="table table-striped">

                            <tr>
                                <td><?php echo get_phrase('department');?></td>
                                <td><b><?php echo $this->db->get_where('department', array('department_id' => $row['department_id']))->row()->name; ?></b></td>
                            </tr>

                            <tr>
                                <td><?php echo get_phrase('designation');?></td>
                                <td><b><?php echo $this->db->get_where('designation', array('designation_id' => $row['designation_id']))->row()->name; ?></b></td>
                            </tr>

                            <tr>
                                <td><?php echo get_phrase('date_of_joining');?></td>
                                <td><b><?php if($row['date_of_joining'] != '') echo date('d/m/Y', $row['date_of_joining']); ?></b></td>
                            </tr>

                            <tr>
                                <td><?php echo get_phrase('joining_salary'); ?></td>
                                <td><b><?php echo $row['joining_salary']; ?></b></td>
                            </tr>

                            <tr>
                                <td><?php echo get_phrase('date_of_leaving');?></td>
                                <td><b><?php if($row['date_of_leaving'] != '') echo date('d/m/Y', $row['date_of_leaving']); ?></b></td>
                            </tr>

                            <tr>
                                <td><?php echo get_phrase('status');?></td>
                                <td><b><?php if($row['status'] == 1) echo get_phrase('active'); else echo get_phrase('inactive'); ?></b></td>
                            </tr>

                        </table>

                    </div>

                    <div class="tab-pane" id="bank_account_details">

                        <?php
                        $bank = $this->db->get_where('bank', array('bank_id' => $row['bank_id']))->result_array();
                        foreach ($bank as $row2) { ?>

                            <table class="table table-striped">

                                <tr>
                                    <td><?php echo get_phrase('account_holder_name'); ?></td>
                                    <td><b><?php echo $row2['account_holder_name']; ?></b></td>
                                </tr>

                                <tr>
                                    <td><?php echo get_phrase('account_number'); ?></td>
                                    <td><b><?php echo $row2['account_number']; ?></b></td>
                                </tr>

                                <tr>
                                    <td><?php echo get_phrase('bank_name');?></td>
                                    <td><b><?php echo $row2['name']; ?></b></td>
                                </tr>

                                <tr>
                                    <td><?php echo get_phrase('branch');?></td>
                                    <td><b><?php echo $row2['branch']; ?></b></td>
                                </tr>

                            </table>

                        <?php } ?>

                    </div>

                    <div class="tab-pane" id="document">

                        <?php
                        if($row['document_id'] != 0) {
                            $documents = $this->db->get_where('document', array('document_id' => $row['document_id']))->row(); ?>

                            <table class="table table-striped">

                                <?php if($documents->resume != '') { ?>
                                    <tr>
                                        <td><?php echo get_phrase('resume_file'); ?></td>
                                        <td>
                                            <a href="<?php echo base_url().'uploads/document/resume/' . $documents->resume; ?>" class="btn btn-blue btn-icon icon-left">
                                                <i class="entypo-download"></i>
                                                <?php echo get_phrase('download') ?>
                                            </a>
                                            <b><?php echo ' (' . $documents->resume . ')'; ?></b>
                                        </td>
                                    </tr>
                                <?php } ?>

                                <?php if($documents->offer_letter != '') { ?>
                                    <tr>
                                        <td><?php echo get_phrase('offer_letter'); ?></td>
                                        <td>
                                            <a href="<?php echo base_url().'uploads/document/offer_letter/' . $documents->offer_letter; ?>" class="btn btn-blue btn-icon icon-left">
                                                <i class="entypo-download"></i>
                                                <?php echo get_phrase('download') ?>
                                            </a>
                                            <b><?php echo ' (' . $documents->offer_letter . ')'; ?></b>
                                        </td>
                                    </tr>
                                <?php } ?>

                                <?php if($documents->joining_letter != '') { ?>
                                    <tr>
                                        <td><?php echo get_phrase('joining_letter'); ?></td>
                                        <td>
                                            <a href="<?php echo base_url().'uploads/document/joining_letter/' . $documents->joining_letter; ?>" class="btn btn-blue btn-icon icon-left">
                                                <i class="entypo-download"></i>
                                                <?php echo get_phrase('download') ?>
                                            </a>
                                            <b><?php echo ' (' . $documents->joining_letter . ')'; ?></b>
                                        </td>
                                    </tr>
                                <?php } ?>

                                <?php if($documents->contract_agreement != '') { ?>
                                    <tr>
                                        <td><?php echo get_phrase('contract_&_agreement'); ?></td>
                                        <td>
                                            <a href="<?php echo base_url().'uploads/document/contract_agreement/' . $documents->contract_agreement; ?>" class="btn btn-blue btn-icon icon-left">
                                                <i class="entypo-download"></i>
                                                <?php echo get_phrase('download') ?>
                                            </a>
                                            <b><?php echo ' (' . $documents->contract_agreement . ')'; ?></b>
                                        </td>
                                    </tr>
                                <?php } ?>

                                <?php if($documents->others != '') { ?>
                                    <tr>
                                        <td><?php echo get_phrase('other'); ?></td>
                                        <td>
                                            <a href="<?php echo base_url().'uploads/document/others/' . $documents->others; ?>" class="btn btn-blue btn-icon icon-left">
                                                <i class="entypo-download"></i>
                                                <?php echo get_phrase('download') ?>
                                            </a>
                                            <b><?php echo ' (' . $documents->others . ')'; ?></b>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </table>

                        <?php } ?>

                    </div>

                </div>

            
    </div>
</div> 
<?php endforeach; ?>