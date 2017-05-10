      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->
              <div class="row state-overview">
                  
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="icon-tags"></i>
                          </div>
                          <div class="value">
                              <h1 class="count2">
                                  <?php echo count($total_bookings);?>
                              </h1>
                              <p>Dummy</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol red">
                              <i class="icon-book"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count2">
                                  <?php echo count($todays_bookings);?>
                              </h1>
                              <p>Dummy</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="icon-book"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count2">
                                  <?php echo count($pending_bookings);?>
                              </h1>
                              <p>Dummy</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol blue">
                              <i class="icon-tags"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count2">
                                  <?php echo count($delivered_bookings);?>
                              </h1>
                              <p>Dummy</p>
                          </div>
                      </section>
                  </div>
                  
              </div>
              <!--state overview end-->

             
          </section>
      </section>
      <!--main content end-->
      <script type="text/javascript" language="javascript" src="<?php echo asset_url(); ?>backend/assets/advanced-datatable/media/js/jquery.js"></script>
<script src="<?php echo asset_url(); ?>backend/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="<?php echo asset_url(); ?>backend/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php echo asset_url(); ?>backend/js/jquery.scrollTo.min.js"></script>
<!--<script src="<?php echo asset_url(); ?>backend/js/jquery.nicescroll.js" type="text/javascript"></script>-->
<script src="<?php echo asset_url(); ?>backend/js/respond.min.js" ></script>
<script type="text/javascript" language="javascript" src="<?php echo asset_url(); ?>backend/assets/advanced-datatable/media/js/jquery.dataTables.js"></script>


<!--common script for all pages-->
<script src="<?php echo asset_url(); ?>backend/js/common-scripts.js"></script>

<script src="<?php echo asset_url(); ?>backend/js/advanced-form-components.js"></script>

<script type="text/javascript" src="<?php echo asset_url(); ?>backend/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo asset_url(); ?>backend/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>

      
     