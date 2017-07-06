<script type="text/javascript">
    
    function removeProduct(product_name,id){
         $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>frontend/domain/removeCartItemByName',
            data: {
                product_name: product_name
            },
            dataType: 'html',
            success: function (data)
            {
              $('#ad' + id).show();
              $('#rm' + id).hide();
            }
        });
    }
    function add_to_cart(domain_name, id, price) {
        //alert(domain_name);
        if (domain_name === '') {
            alert("Unable to process.Please try again.");
            return false;
        }
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>frontend/Domain/addToCart',
            data: {
                id: id,
                qty: '1',
                price: price,
                name: domain_name,
            },
            dataType: 'json',
            success: function (data)
            {
                if (data.status === '1') {
                    $('#ad' + id).hide();
                    $('#rm' + id).show();
                    $(function () {
                        new PNotify({
                            title: 'Success',
                            text: "Domain added successfully",
                            type: 'success',
                            hide: true,
                            styling: 'bootstrap3',
                            delay: 2500,
                            history: false,
                            sticker: true,
                            addclass: "stack-modal",
                        });
                    });
                }

            }
        });
    }
    
    
</script>

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

                <form name="frm_search_domains" class="form-inline" id="frm_search_domains" action="<?php echo base_url(); ?>domains" method="POST"enctype="multipart/form-data" >
                    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url() ?>" />
                    <div class="form-group">
                        <input type="text" class="form-control" name="search" id="search" value="<?php
                        if (isset($domain_name) && $domain_name != '') {
                            echo $domain_name;
                        }
                        ?>" placeholder="Enter your domain name here....">
                    </div>
                    <!-- <button type="button" class="btn btn-default">Have a Promo Code ?</button> -->
                    <button type="button" id="btnSubmit" name="btnSubmit" class="btn btnRed" onclick="getDomainResults();">SEARCH DOMAIN</button>
                </form>
            </div>
        </div>
    </div>
</section>


<section class="domainListWrap">
    <div class="container">
        <div class="row">
            <div class="col-sm-8" id="domain_div">
                
            </div>
            <aside class="col-sm-4">
                <div class="domainSidebar">
                    <div class="extensions">
                        <h4>Extensions</h4>
                        <ul class="list-unstyled mCustomScrollbar">
                            <li>
                                <label for="all" class="checkbox-inline">
                                    <input type="checkbox" name="all" value="all" id="checkAll" checked="checked" >
                                    All extensions
                                </label>
                            </li>
                            <li>
                                <label for="com" class="checkbox-inline">
                                    <input type="checkbox" class="domainTld" name="domainTld[]" value="com" id="com" checked="checked" onchange="getDomainResults();">
                                    .com
                                </label>
                            </li>
                            <li>
                                <label for="net" class="checkbox-inline">
                                    <input type="checkbox" class="domainTld" name="domainTld[]" value="net" id="net" checked="checked" onchange="getDomainResults();">
                                    .net
                                </label>
                            </li>
                            <li>
                                <label for="cloud" class="checkbox-inline">
                                    <input type="checkbox" name="domainTld[]" value="cloud" id="cloud" checked="checked" onchange="getDomainResults();">
                                    .cloud
                                </label>
                            </li>
                            <li>
                                <label for="co" class="checkbox-inline">
                                    <input type="checkbox" class="domainTld" name="domainTld[]" value="co" id="co" checked="checked" onchange="getDomainResults();">
                                    .co
                                </label>
                            </li>
                            <li>
                                <label for="guru" class="checkbox-inline">
                                    <input type="checkbox" class="domainTld" name="domainTld[]" value="guru" id="guru" checked="checked" onchange="getDomainResults();">
                                    .guru
                                </label>
                            </li>
                            <li>
                                <label for="solution" class="checkbox-inline">
                                    <input type="checkbox" class="domainTld" name="domainTld[]" value="solution" id="solution" checked="checked" onchange="getDomainResults();">
                                    .solution
                                </label>
                            </li>
                            <li>
                                <label for="technology" class="checkbox-inline">
                                    <input type="checkbox" class="domainTld" name="domainTld[]" value="technology" id="technology" checked="checked" onchange="getDomainResults();">
                                    .technology
                                </label>
                            </li>
                            <li>
                                <label for="club" class="checkbox-inline">
                                    <input type="checkbox" class="domainTld" name="domainTld[]" value="club" id="club" checked="checked" onchange="getDomainResults();">
                                    .club
                                </label>
                            </li>
                            <li>
                                <label for="system" class="checkbox-inline">
                                    <input type="checkbox" class="domainTld" name="domainTld[]" value="system" id="system" checked="checked" onchange="getDomainResults();">
                                    .system
                                </label>
                            </li>
                            <li>
                                <label for="email" class="checkbox-inline">
                                    <input type="checkbox" class="domainTld" name="domainTld[]" value="email" id="email" checked="checked" onchange="getDomainResults();">
                                    .email
                                </label>
                            </li>
                            <li>
                                <label for="support" class="checkbox-inline">
                                    <input type="checkbox" class="domainTld" name="domainTld[]" value="support" id="support" checked="checked" onchange="getDomainResults();">
                                    .support
                                </label>
                            </li>
                            <li>
                                <label for="computer" class="checkbox-inline">
                                    <input type="checkbox" class="domainTld" name="domainTld[]" value="computer" id="computer" checked="checked" onchange="getDomainResults();">
                                    .computer
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <a href="<?php echo base_url(); ?>domain/cart" class="btn btnRed">
                     Continue to cart
                </a>
            </aside>
       	</div>
    </div>
</section>

<script type="text/javascript">

    jQuery(document).ready(function (e) {
       getDomainResults();
    });
    
    
     function getDomainResults() {
            var search = $('#search').val();
            if(search){ 
            var domainTld = [];
            $('.domainTld:checked').each(function (i, e) {
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
                success: function (data) {
                    //data is the html of the page where the request is made.
                    $('#domain_div').html(data);
                }
            });
            }else{
             alert('Please enter domain name.');
            }
        }
</script>
