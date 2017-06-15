<?php
	$logged_in_user_code = $this->db->get_where('user' , array(
		'user_id' => $this->session->userdata('login_user_id')
	))->row()->user_code;
?>
<center>
	<img src="uploads/user_image/<?php echo $logged_in_user_code;?>.jpg" width="150">
	<br><br>
	<h4 style="color: #797979">
		<?php echo $this->db->get_where('user' , array(
						'user_id' => $this->session->userdata('login_user_id')
					))->row()->name;?>
	</h4>
	<i class="entypo-mail"></i> &nbsp; <?php echo $this->db->get_where('user' , array('user_id' => $this->session->userdata('login_user_id')))->row()->email;?>
</center>
