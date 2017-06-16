<?php
  $total_likes = 0;
  $total_dislikes = 0;
  $uri_segment_1 = $this->uri->segment(4);
  $system_currency_id = $this->db->get_where('settings' , array('type' =>'system_currency_id'))->row()->description;
  $this->db->where('currency_id', $system_currency_id);
  $currency_symbol = $this->db->get('currency')->row()->currency_symbol;

  $this->db->where('code', $video_pack_code);
  $video_pack = $this->db->get('video_pack')->row_array();

  // $this->db->where('video_pack_code', $video_pack_code);
  // $num_rows = $this->db->get('video')->num_rows();
  $this->db->where('video_pack_code', $video_pack_code);
  $video_details = $this->db->get('video', $per_page_item, $uri_segment_1)->result_array();
  foreach ($video_details as $videos) {
   $total_likes    = $total_likes + $videos['likes'];
   $total_dislikes = $total_dislikes + $videos['dislikes'];
  }
 ?>
<body class="blog-posts">
  <nav class="navbar navbar-<?php echo $color_scheme;?> navbar-transparent navbar-fixed-top navbar-color-on-scroll">
    <?php include 'navigation.php'; ?>
  </nav>
  <div class="page-header header-filter header-small" data-parallax="active"
    style="background-image: url('<?php echo base_url('uploads/video_pack/video_pack_banner_').$video_pack['code'].'.jpg';?>');">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
          <h2 class="title" style="margin-top: -20px; margin-bottom: 0px;">
            <?php echo $video_pack['title']; ?>
          </h2>
          
          <div class="buttons">
            <i class="fa fa-thumbs-up"></i> <?php echo $total_likes; ?> &nbsp;
            <i class="fa fa-thumbs-down"></i> <?php echo $total_dislikes; ?> &nbsp;
            <i class="fa fa-clock-o"></i> <?php echo date('D, d M Y', $video_pack['date_added']); ?> <br>
            <!-- <i class="fa fa-user"></i> John Doe -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section">
        <div class="row">
          <div class="col-md-8">
            <div class="content">
              <p class="description">
              <?php echo $video_pack['description']; ?>
              </p>
            </div>
            <h3 class="title">Videos</h3>
            <div class="row">
              <?php foreach ($video_details as $video): ?>
                <!-- item -->
                <div class="col-md-12">
                  <div class="card card-plain card-blog">
        						<div class="row">
        							<div class="col-md-5">
        								<div class="card-image">
                          <a href="<?php echo site_url('home/watch_video/'.slugify($video['title']).'/'.$video['code']); ?>">
                          <?php if($video['source'] == 1): ?>
                             <img src="<?php echo $video['thumbnail'];?>"/>
                          <?php endif; ?>
                          <?php if($video['source'] == 2): ?>
                             <img src="<?php echo base_url('uploads/video_thumbnail/'.$video['thumbnail']);?>"/>
                          <?php endif; ?>
                        </a>
        								</div>
        							</div>
        							<div class="col-md-7">
        								<h3 class="card-title">
        									<a href="<?php echo site_url('home/watch_video/'.slugify($video['title']).'/'.$video['code']);?>"><?php echo substr($video['title'], 0, 30).'...'; ?></a>
        								</h3>
        								<p class="card-description">
                          <?php echo substr($video['description'], 0, 200).'...'; ?>
        								</p>
        								<p class="author">by<b>
                          <?php
                          $this->db->where('code', $video['uploader']);
                          $uploader = $this->db->get('admin')->row()->name;
                          echo $uploader;
                          ?>
                        </b>,
                        <?php echo date('D, d M Y', $video['date_added']); ?>
                      </p>
        							</div>
        						</div>
        					</div>
                </div>
                <!-- item -->
            <?php endforeach; ?>
            <?php if (sizeof($video_details) == 0): ?>
              <h4><?php echo get_phrase('no_video_found'); ?></h4>
            <?php endif ?>
            </div>
          </div>
          <div class="col-md-1"></div>
          <!-- sidebar -->
          <div class="col-md-3">
            <div class="card card-pricing card-raised">
              <div class="content content-<?php echo $color_scheme;?>">
                <h6 class="category text-info">Video Pack</h6>
                <?php if ($video_pack['price'] == 0 || $video_pack['price'] == ''): ?>
                  <h1 class="card-title video_pack_price" id = "<?php echo $video_pack['price'];?>"><?php echo get_phrase('free'); ?></h1>
                <?php endif; ?>
                <?php if ($video_pack['price'] > 0): ?>
                  <h1 class="card-title video_pack_price" id = "<?php echo $video_pack['price'];?>"><small><?php echo $currency_symbol; ?></small><?php echo $video_pack['price']; ?></h1>
                <?php endif; ?>
                <ul>
                  <li><b><?php $this->db->where('video_pack_code', $video_pack_code);  echo $this->db->get('video')->num_rows(); ?></b> Videos</li>
                  <li>One-time Purchase</li>
                  <li>Free Updates</li>
                  <li>Watch any time, anyehere</li>
                </ul>

                    <?php if($this->session->userdata('user_login') !=1):?>
                      <a href="<?php echo site_url('home/login');?>" class="btn btn-white btn-round">
                        <?php
                            if ($video_pack['price'] > 0) {
                              echo get_phrase('purchase_now');
                            }
                            else{
                              echo get_phrase('enjoy_more');
                            }

                         ?>
                      </a>
                    <?php endif;?>
                    <?php
                          $validation = 0;
                          if ($this->session->userdata('user_login') == 1):
                          $this->db->where('code', $this->session->userdata('code'));
                          $user_info = $this->db->get('user')->row_array();
                          $purchased_video_pack = $user_info['purchased_video_pack_ids'];
                          $purchased_video_pack_array = explode(',', $purchased_video_pack);
                          for($i = 0; $i < sizeof($purchased_video_pack_array) - 1; $i++){
                            if($purchased_video_pack_array[$i] == $video_pack['video_pack_id']){
                              $validation++;
                            }
                          }?>
                          <?php if ($validation > 0): ?>
                            <span class="btn btn-white btn-round purchase_button"><?php echo get_phrase('enjoy');?></span>
                          <?php endif; ?>
                          <?php if ($validation == 0): ?>
                            <span id = "<?php echo $video_pack['code'];?>" class="btn btn-white btn-round select_payment purchase_button"><?php echo get_phrase('purchase_now');?></span>
                          <?php endif; ?>
                    <?php endif; ?>
                </a>
                <div class="payment_options" style="display: none;">
                  <a href = "<?php echo site_url('payment/paypal_payment/'.$video_pack['code']);?>" target = "_blank" style="color: white;"><span style="display: block; margin:5px 0px 10px 0px;"><i class="fa fa-cc-paypal" aria-hidden="true" style="margin-right: 5px; font-size: 40px;"></i></span></a>
                  <span id = "show_stripe_form" style="color: white;"><span style="display: block; margin:5px 0px 10px 0px; font-size: 16px;"><i class="fa fa-cc-stripe" aria-hidden="true" style="margin-right: 5px; font-size: 40px;"></i></span></span>
               </div>
              </div>
            </div>
          </div>
          <!-- stripe payment form -->
          <div class="col-md-offset-1 col-md-3" id = "stripe_form" style="display: none;">
            <div class="card card-pricing card-raised">
              <div class="content content-<?php echo $color_scheme;?>">
                <h4 class="category text-info">Stripe Payment Form</h4>
                <?php echo form_open(site_url('payment/stripe_payment/pay/'.$video_pack['code']), array(
                'id' => 'payment-form' , 'class' => 'form-horizontal form-groups-bordered' , 'enctype' => 'multipart/form-data'));?>
                 <input type="text" class="form-control col-md-12" name="card-number" id="card-number"
                  placeholder="<?php echo get_phrase('card_number') ?>" required style = "text-align: center; display: block; color: #fff;">
                  <input type="text" class="form-control col-md-12" name="card-cvc" id="card-cvc"
                  placeholder="<?php echo get_phrase('c_v_c') ?>" required style = "text-align: center; display: block; color: #fff;">
                  <input type="text" class="form-control col-md-12" name="card-expiry-month" id="card-expiry-month"
                  placeholder="MM" required style = "text-align: center; display: block; color: #fff;" min="1" max="12" maxlength="2">
                  <input type="text" class="form-control col-md-12" name="card-expiry-year" id="card-expiry-year"
                  placeholder="YYYY" required style = "text-align: center; display: block; color: #fff;" maxlength="4">

                  <button type="submit" class="btn btn-white btn-round" id="submit-button" style="color: green;"><?php echo get_phrase('done');?></button>
                  <span id = "cancel_stripe_form_submission" class="btn btn-white btn-round" style="color: red; font-size: 11px;"><?php echo get_phrase('cancel');?></span>
                <?php echo form_close();?>
              </div>
            </div>
          </div>
          <!-- sidebar -->

        </div>

        <div class="row" style="text-align: center;">
          <div class="col-md-12">
            <?php echo $this->pagination->create_links(); ?>
          </div>
        </div>
        <hr />
      </div>
    </div>
  </div>
  <?php
    $publishable_key = $this->db->get_where('settings' , array('type' => 'stripe_publishable_key'))->row()->description;
  ?>
  <?php include 'footer.php'; ?>
  <?php include 'includes_bottom.php'; ?>
</body>

<style>
input::-webkit-input-placeholder {
color: #fff !important;
font-size: 10px;
}

 input:-moz-placeholder { /* Firefox 18- */
color: #fff !important;
font-size: 10px;
}

 input::-moz-placeholder {  /* Firefox 19+ */
color: #fff !important;
font-size: 10px;
}

 input:-ms-input-placeholder {
color: #fff !important;
font-size: 10px;
}
.form-control{
  height: 21px;
}
.form-group .form-control {
    margin-bottom: -1px;
}
</style>
<script type="text/javascript" src="https://js.stripe.com/v1/"></script>
<script type="text/javascript">
$(document).ready(function(){
  if($('.video_pack_price').attr('id') === '0' || $('.video_pack_price').attr('id') === ''){
    $('.purchase_button').hide();
  }
  else{
    $('.purchase_button').show();
  }
});
  var check = 0;
  function post_a_comment(){
    <?php if($this->session->userdata('user_login') == 1){ ?>
      var comment = jQuery.trim($('.comment_box').val());
      if(comment == ''){
        }
      else{
        var item_code = '<?php echo $video_pack_code; ?>';
        var user_code = '<?php echo $this->session->userdata("code");?>';
        $.ajax({
          type: 'POST',
          url :'<?php echo site_url('home/post_comment/');?>',
          data: {'comment' : comment, 'item_code' : item_code, 'user_code' : user_code, 'item_type' : 'video_pack' },
          success: function(response){
          $('#comment_section2').html(response);
          $('.comment_box').val('');
          }
        });
      }
      <?php } else { ?>
        window.location.href = "<?php echo site_url('home/login');?>";
        <?php } ?>
  }
  $('.select_payment').mouseenter(function(){
    $('.select_payment').css('cursor', 'point');
  });
  $('.select_payment').click(function(){
    $('.payment_options').slideToggle();
    check++;
    if(check % 2 !== 0){
      $('.select_payment').text('<?php echo get_phrase('choose_payment_system');?>');
    }
    else{
      $('.select_payment').text('<?php echo get_phrase('purchase_now');?>');
    }
  });

  $('#show_stripe_form').mouseenter(function() {
    $('#show_stripe_form').css('cursor', 'pointer');
  });
  $('#scancel_stripe_form_submission').mouseenter(function() {
    $('#cancel_stripe_form_submission').css('cursor', 'pointer');
  });
  $('#cancel_stripe_form_submission').click(function() {
    $('#stripe_form').slideToggle();
  });

  $('#show_stripe_form').click(function(){
    $('#stripe_form').slideToggle('slow');
  });

  // this identifies your website in the createToken call below
    Stripe.setPublishableKey('<?php echo $publishable_key;?>'); // the key will come from system payment settings

    function stripeResponseHandler(status, response) {
        if (response.error) {
            // re-enable the submit button
            $('#submit-button').removeAttr("disabled");
            // show the errors on the form
            iziToast.show({
            title: '<?php echo get_phrase('error:');?>',
            message: response.error.message,
            position: 'topRight',
            color: 'red'
            });

        } else {
            var form$ = $("#payment-form");
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
            // and submit
            form$.get(0).submit();
        }
    }

        $("#payment-form").submit(function(event) {
            // disable the submit button to prevent repeated clicks
            $('#submit-button').attr("disabled", "disabled");

            // createToken returns immediately - the supplied callback submits the form if there are no errors
            Stripe.createToken({
                number: document.getElementById('card-number').value,
                cvc: document.getElementById('card-cvc').value,
                exp_month: document.getElementById('card-expiry-month').value,
                exp_year: document.getElementById('card-expiry-year').value
            }, stripeResponseHandler);
            return false; // submit from callback
        });
</script>
