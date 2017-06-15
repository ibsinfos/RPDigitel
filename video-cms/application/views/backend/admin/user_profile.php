<?php
 $system_currency_id = $this->db->get_where('settings' , array('type' =>'system_currency_id'))->row()->description;
 $this->db->where('currency_id', $system_currency_id);
 $currency_symbol = $this->db->get('currency')->row()->currency_symbol;
?>
<!-- breadcrumb start -->
<ol class="breadcrumb bc-3">
	<li>
		<a href="<?php echo site_url('admin/dashboard');?>">
			<i class="fa fa-dashboard"></i>
			<?php echo get_phrase('dashboard'); ?>
		</a>
	</li>
	<li>
    <a href="<?php echo site_url('admin/user');?>">
			<?php echo get_phrase('users'); ?>
		</a>
  </li>
  <li class="active">
    <?php echo get_phrase('user_profile'); ?>
  </li>
</ol>
<!-- breadcrumb end -->

<?php
  $profile_data = get_results_of_id('user', $user_id);
  foreach ($profile_data as $row):
?>
<div class="profile-env">
  <header class="row">
    <div class="col-sm-2">
      <div class="profile-picture">
				<img src="<?php echo get_user_image('user', $row['user_id']);?>"
          class="img-responsive img-circle" />
			</div>
    </div>

		<div class="col-sm-7">
      <ul class="profile-info-sections">
				<li>
					<div class="profile-name">
						<strong>
							<?php echo $row['name']; ?>
              <span><?php echo get_phrase('code'); ?> : <?php echo $row['code']; ?></span>
            </strong>
					</div>
				</li>
			</ul>
		</div>

		<div class="col-sm-3">
      <div class="profile-buttons">
				<a href="tel:<?php echo $row['phone'];?>" class="btn btn-primary">
					<i class="fa fa-phone"></i
				</a>
				<a href="mailto:<?php echo $row['email'];?>" class="btn btn-info">
					<i class="fa fa-envelope"></i>
				</a>
			</div>
		</div>
	</header>

	<section class="profile-info-tabs">
    <div class="row">
      <div class="col-sm-offset-2 col-sm-10">
        <ul class="user-details">
					<li>
						<a href="#">
							<i class="fa fa-globe"></i>
							<?php echo $row['address']; ?>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fa fa-bookmark"></i>
							<?php echo date('D, d M Y', $row['date_added']); ?>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</section>

  <!-- section for purchased video packs start -->
  <?php
    if ($row['purchased_video_pack_ids'] != ''):
      $video_pack_ids = explode(',', $row['purchased_video_pack_ids']);
      $number_of_packs = count($video_pack_ids) - 1;
  ?>
  <section>
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <blockquote class="blockquote-default" style="text-align: center;">
    			<p>
    				<strong>
    				  <i class="fa fa-money"></i> &nbsp; <?php echo get_phrase('purchased_video_packs'); ?>
    				</strong>
    			</p>
    		</blockquote>
      </div>
    </div>
  </section>
  <section>
	<!-- datatable of videos -->
<div class="row">
  <div class="col-md-12">
		<table class="table table-bordered datatable" id="table-3">
			<thead>
				<tr class="replace-inputs">
					<th width="3%;" style="color: rgba(221, 221, 221, 0);">i</th>
					<th><?php echo get_phrase('video_pack_title');?></th>
					<th><?php echo get_phrase('catrgory');?></th>
					<th><?php echo get_phrase('price');?></th>
					<th><?php echo get_phrase('date_added');?></th>
					<th><?php echo get_phrase('last_modified');?></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$count = 0;
				for($i = 0; $i < $number_of_packs; $i++):
          $this->db->where('video_pack_id', $video_pack_ids[$i]);
          $video_pack_details = $this->db->get('video_pack')->row_array();?>
					<tr>
						<td><?php echo ++$count; ?></td>
						<td>
              <a href="<?php echo site_url('admin/show_video_pack_details/'.$video_pack_details['code']);?>">
                <strong style="color: #7a7981;"><?php echo $video_pack_details['title']; ?></strong>
            </a>
						</td>

						<td>
              <?php
                $this->db->where('video_pack_id', $video_pack_ids[$i]);
                $video_pack_details = $this->db->get('video_pack')->row_array();
                $this->db->where('code', $video_pack_details['category']);
                $category_details = $this->db->get('category')->row_array();
               ?>
               <a href="<?php echo site_url('admin/show_category_details/'.$category_details['code']);?>">
							<strong style="color: #7a7981;"><?php echo $category_details['title']; ?></strong>
            </a>
						</td>
						<td>
							<?php
								$this->db->where('video_pack_id', $video_pack_ids[$i]);
								$video_pack_details = $this->db->get('video_pack')->row_array();
								if($video_pack_details['price'] == 0)
									echo get_phrase('free');
								else
									echo $currency_symbol.''.$video_pack_details['price'];
							?>
						</td>
						<td>
							<?php
								$this->db->where('video_pack_id', $video_pack_ids[$i]);
								$video_pack_details = $this->db->get('video_pack')->row_array();
								echo date('D, d M Y', $video_pack_details['date_added']);
							?>
						</td>
						<td>
							<?php
								$this->db->where('video_pack_id', $video_pack_ids[$i]);
								$video_pack_details = $this->db->get('video_pack')->row_array();
								if($video_pack_details['last_modified'] == '')
									echo '';
								else
								    echo date('D, d M Y', $video_pack_details['last_modified']);
							?>
						</td>

					</tr>
				<?php endfor; ?>
			</tbody>
			<tfoot>
				<tr>
					<th>i</th>
					<th><?php echo get_phrase('video_pack_title');?></th>
					<th><?php echo get_phrase('category');?></th>
					<th><?php echo get_phrase('price');?></th>
					<th><?php echo get_phrase('date_added');?></th>
					<th><?php echo get_phrase('last_modified');?></th>
				</tr>
			</tfoot>
		</table>
	</div>

</div>
  </section>
<?php endif; ?>
  <!-- section for purchased video packs end -->
</div>
<?php endforeach; ?>
<script>
	// datatable initializer with footer search
	jQuery( document ).ready( function( $ ) {
		var $table3 = jQuery("#table-3");
    var table3 = $table3.DataTable( {
			"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
		} );
    // Initalize Select Dropdown after DataTables is created
		$table3.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
			minimumResultsForSearch: -1
		});
    // Setup - add a text input to each footer cell
		$( '#table-3 tfoot th' ).each( function () {
			var title = $('#table-3 thead th').eq( $(this).index() ).text();
			$(this).html( '<input id="foot_' + title +'" type="text" class="form-control" placeholder="Search" />' );
		} );
    // disables search in the option column
		$('#foot_Options').attr("disabled",true);
		$('#foot_i').attr("disabled",true);
    // Apply the search
		table3.columns().every( function () {
			var that = this;

			$( 'input', this.footer() ).on( 'keyup change', function () {
				if ( that.search() !== this.value ) {
					that
						.search( this.value )
						.draw();
				}
			} );
		} );
	} );
</script>
