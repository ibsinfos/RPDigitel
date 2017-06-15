<!-- datatables -->
<script src="<?php echo base_url('assets/backend/js/datatables/datatables.js');?>"></script>
<!-- tweenmax -->
<script src="<?php echo base_url('assets/backend/js/gsap/TweenMax.min.js');?>"></script>
<!-- jquery ui -->
<script src="<?php echo base_url('assets/backend/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js');?>"></script>
<!-- base bootstarp -->
<script src="<?php echo base_url('assets/backend/js/bootstrap.js');?>"></script>
<!-- joinable -->
<script src="<?php echo base_url('assets/backend/js/joinable.js');?>"></script>
<!-- resizeable -->
<script src="<?php echo base_url('assets/backend/js/resizeable.js');?>"></script>
<!-- neon core api -->
<script src="<?php echo base_url('assets/backend/js/neon-api.js');?>"></script>
<!-- toastr notification -->
<script src="<?php echo base_url('assets/backend/js/toastr.js');?>"></script>
<!-- jquery form validator -->
<script src="<?php echo base_url('assets/backend/js/jquery.validate.min.js');?>"></script>
<!-- slect 2 -->
<script src="<?php echo base_url('assets/backend/js/select2/select2.min.js');?>"></script>
<!-- selectboxit -->
<script src="<?php echo base_url('assets/backend/js/selectboxit/jquery.selectBoxIt.min.js');?>"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/backend/js/bootstrap-datepicker.js');?>"></script>
<!-- fileinput -->
<script src="<?php echo base_url('assets/backend/js/fileinput.js');?>"></script>
<!-- bootstrap select -->
<script src="<?php echo base_url('assets/backend/js/bootstrap-select.js');?>"></script>
<!-- neon custom scripts initializers -->
<script src="<?php echo base_url('assets/backend/js/neon-custom.js');?>"></script>
<!-- demo settings js of neon theme -->
<script src="<?php echo base_url('assets/backend/js/neon-demo.js');?>"></script>
<!-- custom js -->
<script src="<?php echo base_url('assets/backend/js/custom.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/backend/js/daterangepicker/moment.min.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/backend/js/daterangepicker/daterangepicker.js');?>"></script>

<!-- toastr notifications -->
<?php if(($this->session->flashdata('success_message')) != ''):?>
	<script type="text/javascript">
		toastr.success('<?php echo $this->session->flashdata('success_message');?>' , '<?php echo get_phrase('success');?>');
	</script>
<?php endif;?>

<?php if(($this->session->flashdata('error_message')) != ''):?>
	<script type="text/javascript">
		toastr.error('<?php echo $this->session->flashdata('error_message');?>' , '<?php echo get_phrase('error');?>');
	</script>
<?php endif;?>
<!-- toastr notifications -->
