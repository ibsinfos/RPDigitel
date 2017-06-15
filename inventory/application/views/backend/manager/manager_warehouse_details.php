<ol class="breadcrumb bc-3">

	<li>
		<a href="<?php echo base_url();?>index.php?manager/dashboard">
			<i class="entypo-home"></i>
				<?php echo get_phrase('dashboard');?>
		</a>
	</li>

	<li>
		<?php echo get_phrase('warehouse');?>
	</li>
	<li class="active">
		<strong>
		<?php 
			$this->db->where('warehouse_code', $this->session->userdata('warehouse_code'));
			$result = $this->db->get('warehouse')->row_array();
			echo "<span style = 'text-align:center;'>".$result['warehouse_title']."</span>"; 
		?>
		</strong>
	</li>

</ol>

<!-- <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/warehouse_adding')"
	class="btn btn-info btn-sm btn-icon icon-left">
		<?php echo get_phrase('create_new_warehouse');?>
	<i class="entypo-plus"></i>
</a> -->

<br>

<div class="main_data">
	<?php include 'managers_specific_warehouse_details.php';?>
</div>
