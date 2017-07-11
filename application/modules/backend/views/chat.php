

<!-- page content -->
        <div class="right_col" role="main">
				
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Chat</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Chat</h2>
                    <!--ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul-->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="broadcastChatForm" method="post" action="<?php echo base_url();?>backend/project/saveNewProject" data-parsley-validate class="form-horizontal form-label-left">




 					<div class="form-group" id="broadcast-div">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Broadcast Name : <span class="required"></span>
                        </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="broadcast_name" name="broadcast_name" required="required">
                          <button type="button" class="btn btn-success" id="chat_broadcast">Go</button>
                        </div>
                    </div>
                     

 					<div class="form-group" id="broadcast-list">
                    <!--
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Bjshdjkash 1 : <span class="required"></span>
                        </label>
                          <button type="button" class="btn btn-success join_broadcast_list" id="testtt">Join</button>
                        </div>
                    -->
                    </div>
                     

                      <div class="form-group">

                       <div class="col-md-6 col-sm-6 col-xs-12" id="message_history">
                          
                        </div>
                      </div>




                      <div class="form-group message-box-div">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Message <span class="required">*</span>
                        </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                          <!--<textarea id="user_message" name="user_message" required="required" class="form-control col-md-7 col-xs-12"></textarea>
                          -->
                          <input type="text" name="user_message" id="user_message">
                        </div>
                      </div>
                     
                     
                      <!--<div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="button" class="btn btn-success" id="send_msg">Submit</button>
                        </div>
                      </div>-->

                    </form>
                  </div>
                </div>
              </div>
            </div>
			</div>
			</div>
    <!-- /page content -->
	
	
<script src="https://www.gstatic.com/firebasejs/4.1.3/firebase.js"></script>
