<!--   Core JS Files   -->
<script src="<?php echo base_url('assets/frontend/material/js/jquery.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/frontend/material/js/bootstrap.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/frontend/material/js/material.min.js');?>"></script>
<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
<script src="<?php echo base_url('assets/frontend/material/js/material-kit.js');?>" type="text/javascript"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?php echo base_url('assets/frontend/material/plugins/jasny-bootstrap.min.js');?>"></script>

<!-- slick -->
<script src="assets/frontend/material/plugins/slick/slick.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" src="<?php echo base_url('assets/frontend/material/js/main.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/frontend/material/plugins/iziToast/js/iziToast.js');?>"></script>
<!-- toastr notifications -->
<?php if(($this->session->flashdata('success_message')) != ''):?>
	<script type="text/javascript">
  iziToast.show({
  title: '<?php echo get_phrase('success:');?>',
  message: '<?php echo get_phrase($this->session->flashdata('success_message'));?>',
  position: 'topRight',
  color: 'green'
  });
	</script>
<?php endif;?>

<?php if(($this->session->flashdata('error_message')) != ''):?>
	<script type="text/javascript">
  iziToast.show({
  title: '<?php echo get_phrase('error:');?>',
  message: '<?php echo get_phrase($this->session->flashdata('error_message'));?>',
  position: 'topRight',
  color: 'red'
  });
	</script>
<?php endif;?>
<!-- toastr notifications -->
