<!-- Imported styles -->

<link rel="stylesheet" href="assets/js/datatables/responsive/css/datatables.responsive.css">
<link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
<link rel="stylesheet" href="assets/js/select2/select2.css">
<link rel="stylesheet" href="assets/js/selectboxit/jquery.selectBoxIt.css">
<link rel="stylesheet" href="assets/js/icheck/skins/flat/_all.css">
<link rel="stylesheet" href="assets/css/font-icons/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-select.css">

<!-- Bottom scripts (common) -->
<script src="assets/js/datatables/datatables.js"></script>
<script src="assets/js/gsap/TweenMax.min.js"></script>
<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/joinable.js"></script>
<script src="assets/js/resizeable.js"></script>
<script src="assets/js/neon-api.js"></script>
<script src="assets/js/toastr.js"></script>
<script src="assets/js/select2/select2.min.js"></script>
<script src="assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>
<script src="assets/js/bootstrap-datepicker.js"></script>
<script src="assets/js/icheck/icheck.min.js"></script>
<script src="assets/js/fileinput.js"></script>
<script src="assets/js/neon-chat.js"></script>
<script src="assets/js/bootstrap-select.js"></script>



<script type="text/javascript" src="assets/fancybox/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="assets/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />


<!-- JavaScripts initializations and stuff -->
<script src="assets/js/neon-custom.js"></script>

<!--<script src="assets/js/jquery.dataTables.min.js"></script>-->
<script src="<?php echo base_url();?>assets/js/datatables/TableTools.min.js"></script>
<script src="<?php echo base_url();?>assets/js/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/js/datatables/jquery.dataTables.columnFilter.js"></script>
<script src="<?php echo base_url();?>assets/js/datatables/lodash.min.js"></script>
<script src="<?php echo base_url();?>assets/js/datatables/responsive/js/datatables.responsive.js"></script>


<script src="assets/js/fullcalendar/fullcalendar.min.js"></script>
<script src="assets/js/neon-calendar.js"></script>

<!-- Demo Settings -->
<script src="assets/js/neon-demo.js"></script>

<?php if(($this->session->flashdata('flash_message')) != ''):?>
    <script type="text/javascript">
        toastr.success('<?php echo $this->session->flashdata('flash_message'); ?>')
    </script>
<?php endif;?>

<?php if(($this->session->flashdata('update_message')) != ''):?>
	<script type="text/javascript">
		toastr.success('<?php echo $this->session->flashdata('update_message');?>' , '<?php echo get_phrase('success');?>')
	</script>
<?php endif;?>

<?php if(($this->session->flashdata('success_message')) != ''):?>
	<script type="text/javascript">
		toastr.success('<?php echo $this->session->flashdata('success_message');?>' , '<?php echo get_phrase('success');?>')
	</script>
<?php endif;?>