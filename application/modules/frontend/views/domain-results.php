
<!--<form name="frm_search_domains" id="frm_search_domains" action="<?php echo base_url(); ?>domains-results" method="POST"enctype="multipart/form-data" >
   <input style="margin-left:50px;margin-top:50px;" type="text" name="search" id="search" value="" />
   <input type="checkbox" id="com" name="domainTld[]" class="domain" value=".com" />.com &nbsp;&nbsp;
   <input type="checkbox" id="org" name="domainTld[]" class="domain"  value=".org" />.org &nbsp;&nbsp;
   <input type="checkbox" id="in" name="domainTld[]" class="domain" value=".in" />.in &nbsp;&nbsp;
    <button type="button" name="btn_submit" placeholder="Enter a domain name" class="btn btn-primary" value="" id="btnSubmit" >Search Domain</button>
        <div id="domain_div">
        </div>
</form>-->





<section class="siloSDHero">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-6">
                <h1 class="heading">Silo Webhosting Service</h1>
                <h6>Extend your website with fiberrail extensions.</h6>
                <a href="" class="btn btnRed">Where to Buy SiloSD Memory Cards</a>
            </div>
            <div class="col-sm-4 col-md-6 clearfix text-center">
                <img src="<?php echo asset_url(); ?>frontend/images/domain/storage.png" class="sdCardImg">
            </div>
        </div>
    </div>
</section>

<section class="siloSDSearchDomain">    
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="heading"> CHOOSE YOUR DOMAIN <small class="white">Starting from $9.99</small></h3>
                
                    <form name="frm_search_domains" class="form-inline" id="frm_search_domains" action="<?php echo base_url(); ?>domains-results" method="POST"enctype="multipart/form-data" >
                    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url() ?>" />
                  <div class="form-group">
                    <input type="text" class="form-control" name="search" id="search" value="<?php if(isset($domain_name) && $domain_name != ''){ echo $domain_name;} ?>" placeholder="Enter your domain name here....">
                  </div>
                  <button type="button" class="btn btn-default">Have a Promo Code ?</button>
                  <button type="button" id="btnSubmit" name="btnSubmit" class="btn btnRed">SEARCH DOMAIN</button>
                </form>
            </div>
        </div>
    </div>
</section>
       

<section class="domainListWrap">
    <div class="container">
	 	<div class="row">
	        <div class="col-sm-8" id="domain_div">
<!--	            <ul class="list-unstyled domainResults">
	                <li>
	                    <div class="domainType">
	                        <span>rpdigitel.guru</span>
	                    </div>
	                    <div class="priceAction">
	                        <span class="price priceStrike">$29.99</span>
	                        <span class="price">$9.99</span>
	                        <a class="btn btnRed">
	                        	<span class="add">Select</span>
	                        	<span class="remove">Remove</span>
	                        </a>
	                    </div>
	                </li>
	                <li>
	                    <div class="domainType">
	                        <span>rpdigitel.solution</span>
	                    </div>
	                    <div class="priceAction">
	                        <span class="price priceStrike">$24.99</span>
	                        <span class="price">$19.99</span>
	                        <a class="btn btnRed">
	                        	<span class="add">Select</span>
	                        	<span class="remove">Remove</span>
	                        </a>
	                    </div>
	                </li>
	                <li>
	                    <div class="domainType">
	                        <span>rpdigitel.live</span>
	                    </div>
	                    <div class="priceAction">
	                        <span class="price priceStrike">$27.99</span>
	                        <span class="price">$14.99</span>
	                        <a class="btn btnRed">
	                        	<span class="add">Select</span>
	                        	<span class="remove">Remove</span>
	                        </a>
	                    </div>
	                </li>
	                <li>
	                    <div class="domainType">
	                        <span>rpdigitel.technology</span>
	                    </div>
	                    <div class="priceAction">
	                        <span class="price priceStrike">$24.99</span>
	                        <span class="price">$9.99</span>
	                        <a class="btn btnRed">
	                        	<span class="add">Select</span>
	                        	<span class="remove">Remove</span>
	                        </a>
	                    </div>
	                </li>
	                <li>
	                    <div class="domainType">
	                        <span>rpdigitel.cloud</span>
	                    </div>
	                    <div class="priceAction">
	                        <span class="price priceStrike">$29.99</span>
	                        <span class="price">$9.99</span>
	                        <a class="btn btnRed">
	                        	<span class="add">Select</span>
	                        	<span class="remove">Remove</span>
	                        </a>
	                    </div>
	                </li>
	                <li>
	                    <div class="domainType">
	                        <span>rpdigitel.club</span>
	                    </div>
	                    <div class="priceAction">
	                        <span class="price priceStrike">$14.99</span>
	                        <span class="price">$9.99</span>
	                        <a class="btn btnRed">
	                        	<span class="add">Select</span>
	                        	<span class="remove">Remove</span>
	                        </a>
	                    </div>
	                </li>
	                <li>
	                    <div class="domainType">
	                        <span>rpdigitel.systems</span>
	                    </div>
	                    <div class="priceAction">
	                        <span class="price priceStrike">$14.99</span>
	                        <span class="price">$8.99</span>
	                        <a class="btn btnRed">
	                        	<span class="add">Select</span>
	                        	<span class="remove">Remove</span>
	                        </a>
	                    </div>
	                </li>
	            </ul>-->
	        </div>
	        <aside class="col-sm-4">
	            <div class="domainSidebar">
	                <div class="extensions">
	                    <h4>Extensions</h4>
	                    <ul class="list-unstyled mCustomScrollbar">
	                        <li>
	                    	 	<label for="all" class="checkbox-inline">
	                            	<input type="checkbox" name="all" value="all" id="checkAll">
	                           		All extensions
	                           	</label>
	                        </li>
	                        <li>
	                        	<label for="com" class="checkbox-inline">
	                            	<input type="checkbox" class="domainTld" name="domainTld[]" value="com" id="com">
	                            	.com
	                            </label>
	                        </li>
	                        <li>
	                        	<label for="net" class="checkbox-inline">
		                            <input type="checkbox" class="domainTld" name="domainTld[]" value="net" id="net">
		                            .net
		                        </label>
	                        </li>
	                        <li>
	                        	<label for="cloud" class="checkbox-inline">
		                            <input type="checkbox" name="domainTld[]" value="cloud" id="cloud">
		                            .cloud
		                        </label>
	                        </li>
	                        <li>
	                        	<label for="co" class="checkbox-inline">
		                            <input type="checkbox" class="domainTld" name="domainTld[]" value="co" id="co">
		                            .co
		                        </label>
	                        </li>
	                        <li>
	                        	<label for="guru" class="checkbox-inline">
		                            <input type="checkbox" class="domainTld" name="domainTld[]" value="guru" id="guru">
		                            .guru
		                        </label>
	                        </li>
	                        <li>
	                        	<label for="solution" class="checkbox-inline">
		                            <input type="checkbox" class="domainTld" name="domainTld[]" value="solution" id="solution">
		                            .solution
		                        </label>
	                        </li>
	                        <li>
	                        	<label for="technology" class="checkbox-inline">
		                            <input type="checkbox" class="domainTld" name="domainTld[]" value="technology" id="technology">
		                            .technology
		                        </label>
	                        </li>
	                        <li>
	                        	<label for="club" class="checkbox-inline">
		                            <input type="checkbox" class="domainTld" name="domainTld[]" value="club" id="club">
		                            .club
		                        </label>
	                        </li>
	                        <li>
	                        	<label for="system" class="checkbox-inline">
		                            <input type="checkbox" class="domainTld" name="domainTld[]" value="system" id="system">
		                            .system
		                        </label>
	                        </li>
	                        <li>
	                        	<label for="email" class="checkbox-inline">
		                            <input type="checkbox" class="domainTld" name="domainTld[]" value="email" id="email">
		                            .email
		                        </label>
	                        </li>
	                        <li>
	                        	<label for="support" class="checkbox-inline">
		                            <input type="checkbox" class="domainTld" name="domainTld[]" value="support" id="support">
		                            .support
		                        </label>
	                        </li>
	                        <li>
	                        	<label for="computer" class="checkbox-inline">
		                            <input type="checkbox" class="domainTld" name="domainTld[]" value="computer" id="computer">
		                            .computer
		                        </label>
	                        </li>
	                    </ul>
	                </div>
	            </div>
	        </aside>
       	</div>
    </div>
</section>

<script type="text/javascript">
                
                jQuery(document).ready(function(e) { 
                  
                    
                $('#btnSubmit').click(function() { 
                    var search = $('#search').val();
                    
                    var domainTld = [];
                    $('.domainTld:checked').each(function(i, e) {
                        domainTld.push($(this).val());
                    });
                    
                    $.ajax({
                        url: "<?php echo base_url() . 'get-domain-results'; ?>", //The url where the server req would we made.
                        async: false,
                        type: "POST", //The type which you want to use: GET/POST
                        //data: "search=" + search, //The variables which are going.
                        data: {
                            search: search,
                            //domainTld: $('.domainTld:checked').serialize(),
                            'domainTld[]': domainTld.join()
                            //contact:JSON.stringify(data)
                        },
                        dataType: "html", //Return data type (what we expect).

                        //This is the function which will be called if ajax call is successful.
                        success: function(data) { 
                            //data is the html of the page where the request is made.
                            $('#domain_div').html(data);
                        }
                    });
                });


            });
    </script>

