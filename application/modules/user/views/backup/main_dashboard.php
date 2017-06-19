
<section class="mainDashboardServices">
    <div class="container">
        <div class="row" >
            <div class="col-md-4 col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading websuitImgBox">
                        <img class="img-responsive center-block" src="<?php echo base_url(); ?>images/services/wbssuite.png" alt="wbssuite" width="177" height="61">
                    </div>
                    <div class="panel-body">
                        <h4 class="heading">WBS Business Suite</h4>
                        <p class="description">Our Saas Products Empower IT professionals to adapt to rapid change, utilise resource more
                            efficiently and deliver stronger value to organizations.</p>
                        <div class="text-center">
                            <?php
                            if ($this->session->userdata('member_service_remaining_days')) {
                                if ($this->session->userdata('member_service_remaining_days') < 0) {

                                    $websuit = base_url() . "wbs_suite";
                                } else {
                                    $websuit = base_url() . "crm/login";
                                }
                            } else if ($this->session->userdata('crm_subscription')) {
                                $websuit = base_url() . "crm/login";
                            } else {
                                $websuit = base_url() . "wbs_suite";
                            }
                            ?>
                            <a href="<?php echo $websuit; ?>" class="btn btnRed">
                                Go To Dashboard / Subscribe Now

                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading passportImgBox">
                        <img class="img-responsive center-block" src="<?php echo base_url(); ?>images/services/paasport.png" alt="paasport" height="39" width="136">
                    </div>
                    <div class="panel-body">
                        <h4 class="heading">PaaSPort</h4>
                        <p class="description">Try or purchase our latest tools, apps and software to continuously enhance your infrastructure and maintain
                            a competitive advantage.</p>
                        <div class="text-center">
                            <a href="<?php echo base_url(); ?>paas-port/dashboard" class="btn btnRed">Go To Dashboard / Subscribe Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading siloSDImgBox">
                        <img class="img-responsive center-block" src="<?php echo base_url(); ?>images/services/silo%20main%20logo.png" alt="silo" width="100">
                    </div>
                    <div class="panel-body">
                        <h4 class="heading">Silo Cloud Services</h4>
                        <p class="description">Simplify networking, domain and webhosting with a single secured solution that caters to Startup and small businesses at every stage of growth.</p>
                        <div class="text-center">
                            <a href="<?php echo base_url(); ?>dashboard" class="btn btnRed">
                                Go To Dashboard / Subscribe Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <img class="img-responsive center-block" src="<?php echo base_url(); ?>images/services/fiberrails%20main96x86.png" alt="fiberrails">
                    </div>
                    <div class="panel-body">
                        <h4 class="heading">Fiber Rails Portal</h4>
                        <p class="description">Create your company-specific portfolio and catalogs with prices and terms, and enhance tracking, global management and order processing.</p>
                        <div class="text-center">
                            <a href="<?php echo base_url(); ?>dashboard" class="btn btnRed">
                                Go To Dashboard / Subscribe Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading scandiscImgBox">
                        <img class="img-responsive center-block" src="<?php echo base_url(); ?>images/services/scandisc%20main%20logo.png" alt="scandisc" width="158">
                    </div>
                    <div class="panel-body">
                        <h4 class="heading">Scandisc Registry</h4>
                        <p class="description">User Generated Content Distribution Platform developed to protect the right and royalty of independent artisans world wide.</p>
                        <div class="text-center">
                            <a href="<?php echo base_url(); ?>dashboard" class="btn btnRed">
                                Go To Dashboard / Subscribe Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <img class="img-responsive center-block" src="<?php echo base_url(); ?>images/services/silobank.png" alt="silobank" width="109">
                    </div>
                    <div class="panel-body">
                        <h4 class="heading">Silo Bank</h4>
                        <p class="description">You have earned the right to pay less for transactions between you and your customer, Try silo bank as an option for your next gen payment gateway.</p>
                        <div class="text-center">
                            <a href="<?php echo base_url(); ?>dashboard" class="btn btnRed">
                                Go To Dashboard / Subscribe Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    function loggedin_successful() {
        $.toaster({priority: 'success', title: 'Message', message: 'You are logged in successfully'});
    }
</script>


<?php
$success_message = '';
$success_message = $this->session->flashdata('login_success_msg');
if ($success_message != '') {
    echo '<script type="text/javascript"> loggedin_successful(); </script>';
}
?>
