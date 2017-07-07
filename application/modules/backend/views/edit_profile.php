<!-- page content -->
<?php $session_data = $this->session->userdata('user_account'); ?>
<?php
	$userImg=backend_asset_url()."images/img.jpg";	
	if(!empty($user[0]['user_image']))
	$userImg=backend_passport_url().$user[0]['user_image'];
?>	
<div class="right_col editProfileWrap" role="main">
    <div class="row">
        <div class="col-lg-9"> 
        	<div class="row">
                <div class="col-sm-6">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      	<h4>Basic Information</h4>
                    </div>
                    <div class="panel-body">
                      	<div class="row">
                      		<div class="col-sm-12 form-group">
                      			<div class="row">
                      				<div class="col-xs-5 col-sm-3">
	                          			<img src="<?php echo $userImg; ?>" alt="" class="img-responsive editImg">
	                          		</div>
	                          		<div class="col-xs-7 col-sm-9">
	                          			<button class="btn grayBtn editImgBtn">Replace Image</button>
	                          		</div>
	                          	</div>
	                        </div>
	                        <div class="col-xs-12 col-sm-6 form-group">
	                          <label for="firstName">First Name</label>
	                          <input type="text" class="form-control" id="firstName" placeholder="First Name" value="<?php
                                                           if (!empty($user)) {
                                                               echo $user[0]['first_name'];
                                                           }
                                                           ?>">
	                        </div>
	                        <div class="col-xs-12 col-sm-6 form-group">
	                          <label for="lastName">Last Name</label>
	                          <input type="text" class="form-control" id="lastName" placeholder="Last Name" value="<?php
                                                    if (!empty($user)) {
                                                        echo $user[0]['last_name'];
                                                    }
                                                    ?>">
	                        </div>
	                        <div class="col-xs-12 col-sm-12 form-group">
	                          <label for="occupation">Occupation</label>
	                          <input type="text" class="form-control" id="occupation" placeholder="Occupation">
	                        </div>
	                        <div class="col-xs-12 col-xs-12 col-sm-12 form-group">
	                          <label for="company">Company</label>
	                          <input type="text" class="form-control" id="company" placeholder="Company">
	                        </div>
	                        <div class="col-xs-12 col-sm-6 form-group">
	                          <label for="country">Country</label>
	                          <input type="text" class="form-control" id="country" placeholder="Country">
	                        </div>
	                        <div class="col-xs-12 col-sm-6 form-group">
	                          <label for="city">City</label>
	                          <input type="text" class="form-control" id="city" placeholder="City">
	                        </div>
	                        <div class="col-xs-12 col-sm-12 form-group">
	                          <label for="websiteURL">Website URL</label>
	                          <input type="url" class="form-control" id="websiteURL" placeholder="Website URL">
	                        </div>
	                        <div class="col-xs-12 col-sm-12">
	                          <h4>Password</h4>
	                        </div>
	                        <div class="col-xs-12 col-sm-6 form-group">
	                          <label for="oldPassword">Old Password</label>
	                          <input type="password" class="form-control" id="oldPassword" placeholder="">
	                        </div>
	                        <div class="col-xs-12 col-sm-6 form-group">
	                          <label for="newPassword">New Password</label>
	                          <input type="password" class="form-control" id="newPassword" placeholder="">
	                        </div>
	                        <div class="col-xs-12 col-sm-6 form-group">
	                          <label for="confirmPassword">Confirm Password</label>
	                          <input type="password" class="form-control" id="confirmPassword" placeholder="">
	                        </div>
	                        <div class="col-xs-12 col-sm-6">
	                        	<label class="hidden-xs">&nbsp;<br></label>
	                          	<button type="submit" class="btn btnRed">Change Password</button>
	                        </div>
                        </div>
                    </div>
                  </div>

                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4>About Me</h4>
                    </div>
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-xs-12 col-sm-6 form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" id="email" placeholder="name@gmail.com">
                        </div>
                        <div class="col-xs-12 col-sm-6 form-group">
                          <label for="avatar">Avatar/Logo</label>
                          <input type="file" class="form-control" id="avatar" placeholder="">
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-12 col-sm-12 form-group">
                          <label for="description">Description</label>
                          <textarea class="form-control" id="description" rows="5" placeholder="Description"></textarea>
                        </div>
                        <div class="col-xs-12 col-sm-12 form-group">
                          <label for="projectTags">Project Tags</label>
                          <textarea class="form-control" id="projectTags" rows="5" placeholder="Project Tags"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4>Content Category</h4>
                    </div>
                    <div class="panel-body">
                    	<div class="row">
                    		<div class="col-xs-12 col-sm-12 form-group">
	                          <label for="linkTitle">Link Title</label>
	                          <input type="text" class="form-control" id="linkTitle" placeholder="Enter Title">
	                        </div>
	                        <div class="col-xs-12 col-sm-12 form-group">
	                          <label for="linkDescription">Link Description</label>
	                          <input type="password" class="form-control" id="linkDescription" placeholder="Enter Description">
	                        </div>
	                        <div class="col-xs-12 col-sm-12">
	                          <button type="submit" class="btn btnRed">Add</button>
	                        </div>
	                    </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="panel panel-default onWebWrap">
                    <div class="panel-heading">
                      <h4>On The Web</h4>
                    </div>
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-12 form-group">
                        	<div class="input-group">
							  <span class="input-group-addon facebook" id="basic-addon1"><i class="fa fa-facebook"></i></span>
							  <input type="text" class="form-control" placeholder="http://facebook.com/taylor" aria-describedby="basic-addon1">
							</div>
                        </div>
                        <div class="col-md-12 form-group">
                        	<div class="input-group">
							  <span class="input-group-addon twitter" id="basic-addon1"><i class="fa fa-twitter"></i></span>
							  <input type="text" class="form-control" placeholder="http://twitter.com/taylor" aria-describedby="basic-addon1">
							</div>
                        </div>
                        <div class="col-md-12 form-group">
                        	<div class="input-group">
							  <span class="input-group-addon googlePlus" id="basic-addon1"><i class="fa fa-google-plus"></i></span>
							  <input type="text" class="form-control" placeholder="http://plus.google.com/taylor" aria-describedby="basic-addon1">
							</div>
                        </div>
                        <div class="col-md-12 form-group">
                        	<div class="input-group">
							  <span class="input-group-addon pinterest" id="basic-addon1"><i class="fa fa-pinterest-p"></i></span>
							  <input type="text" class="form-control" placeholder="https://pinterest.com/taylor" aria-describedby="basic-addon1">
							</div>
                        </div>
                        <div class="col-md-12 form-group">
                        	<div class="input-group">
							  <span class="input-group-addon instagram" id="basic-addon1"><i class="fa fa-instagram"></i></span>
							  <input type="text" class="form-control" placeholder="https://www.instagram.com/taylor" aria-describedby="basic-addon1">
							</div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4>Project Details</h4>
                    </div>
                    <div class="panel-body">
                    	<div class="row">
                    		<div class="col-xs-12 col-sm-6 form-group">
	                          <label for="sectionTitle">Section Title</label>
	                          <input type="text" class="form-control" id="sectionTitle" placeholder="Section Title">
	                        </div>
	                        <div class="col-xs-12 col-sm-6 form-group">
	                          <label for="logo">Logo</label>
	                          <input type="file" class="form-control" id="logo" placeholder="">
	                        </div>
	                        <div class="col-xs-12 col-sm-12 form-group">
	                          <label for="projectDescr">Description</label>
	                          <textarea class="form-control" id="projectDescr" rows="5" placeholder="Description"></textarea>
	                        </div>
	                    </div>
                    </div>
                  </div>

                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4>Web References</h4>
                    </div>
                    <div class="panel-body">
                    	<div class="row">
                    		<div class="col-xs-12 col-sm-6 form-group">
	                          <label for="linkTitle">Link Title</label>
	                          <input type="text" class="form-control" id="linkTitle" placeholder="Enter Title">
	                        </div>
	                        <div class="col-xs-12 col-sm-6 form-group">
	                          <label for="linkDescription">Link Description</label>
	                          <input type="password" class="form-control" id="linkDescription" placeholder="Enter Description">
	                        </div>
	                        <div class="col-xs-12 col-sm-6">
	                          <button type="submit" class="btn btnRed">Add</button>
	                        </div>
	                    </div>
	                    <h4>Creative Fields</h4>
	                    <div class="personalInfoWrap text-center">
	                        <div class="musicianWrap">
	                            <div class="musicianImageName">
	                                <img src="http://localhost/RPDigitel/paas-port/uploads/users/0a783b39fb464f12ec255b70a3c32c9d.jpg" alt="" class="img-circle">
	                                <p class="musicianName text-muted">Vaishali Manvar</p>
	                                <p class="text-muted">Pune</p>
								</div>
							</div>
	                        <p class="profession">Music Maker, Artist, Writer</p>
	                        <ul class="list-unstyled list-inline">
	                        	<li><i class="fa fa-thumbs-o-up"></i> 270</li>
	                        	<li><i class="fa fa-eye"></i> 710</li>
	                        </ul>
	                        <button type="submit" class="btn btnRed">Follow</button>
						</div>
						<h4>ADD MEDIA</h4>
	                    <ul class="list-group infoListWrap addMediaWrap">
							<li class="list-group-item clearfix">
								<i class="fa fa-cloud-upload"></i> Upload Files
							</li>
							<li class="list-group-item clearfix">
								<i class="fa fa-edit"></i> Embed media
							</li>
							<li class="list-group-item clearfix">
								<i class="fa fa-text-width"></i> Add text
							</li>
							<li class="list-group-item clearfix">
								<i class="fa fa-cloud"></i> Creative cloud
							</li>
						</ul>
						<h4>CUSTOMIZE DESIGN</h4>
	                    <div class="panel-group accordion" id="accordion" role="tablist" aria-multiselectable="true">
						  <div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="headingOne">
						      <h4 class="panel-title">
						        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          Dividers &amp; Spacing
						        </a>
						      </h4>
						    </div>
						    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
						      <div class="panel-body">
						        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
						      </div>
						    </div>
						  </div>
						  <div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="headingTwo">
						      <h4 class="panel-title">
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						          Background
						        </a>
						      </h4>
						    </div>
						    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
						      <div class="panel-body">
						        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
						      </div>
						    </div>
						  </div>
						</div>
                    </div>
                  </div>
                  <p class="text-right">
                  	<button type="submit" class="btn btnRed">SAVE</button>
                  </p>
                </div>
          	</div>
        </div>

        <div class="col-lg-3 visible-lg musicicListShow">
			<div class="musicListWrap" style="height: 1000px;">
				<div class="hidden-lg text-center">
					<a href="javascript:void(0)" class="closeBtn"><i class="fa fa-times"></i></a>
				</div>
				<div id="nowPlay">
					<h4 class="" id="npTitle"></h4>
				</div>
				<div id="audiowrap">
					<div id="audio0">
						<audio preload id="audio1" controls="controls">Your browser does not support HTML5 Audio!</audio>
					</div>
					<div id="tracks">
						<a id="btnPrev" class="btn"><i class="fa fa-backward"></i></a>
						<a id="btnNext" class="btn"><i class="fa fa-forward"></i></a>
					</div>
				</div>
				<div id="plwrap" class="mCustomScrollbar">
					<ul id="plList" class="list-unstyled"></ul>
				</div>
			</div>
		</div>
    </div>
</div>

<script type="text/javascript">
	var getaudiolist_URL="<?php echo base_url(); ?>paas-port/getaudiolist";
	var edituser_slug_URL="<?php echo $user[0]['slug']; ?>";
	var audio_user_id="<?php echo $membership[0]['user_id']; ?>";
	var host_ip="<?php echo $_SERVER['HTTP_HOST']; ?>";
	                        alert(audio_user_id);
</script>