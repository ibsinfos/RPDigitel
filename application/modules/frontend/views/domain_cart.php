<section class="checkoutHeroWrap">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h4 class="heading">Checkout</h4>
            </div>
        </div>
    </div>
</section>

<section class="checkoutWrap">
    <div class="container" id="cart_item">
        <table id="cart" class="table table-hover table-condensed">
            <?php if(isset($contents) && count($contents) > 0){ ?>
            <thead>
                <tr>
                    <th style="width:50%">Product</th>
                    <th style="width:10%">Price</th>
                    <th style="width:22%" class="text-center">Subtotal</th>
                    <th style="width:10%"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($contents as $content) {
                    $total = $total + $content['subtotal'];
                    ?>
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive"/></div>
                                <div class="col-sm-10">
                                    <h4 class="nomargin"><?php echo $content['name'] ?></h4>

                                </div>
                            </div>
                        </td>
                        <td data-th="Price">$<?php echo $content['price'] ?></td>

                        <td data-th="Subtotal" class="text-center">$<?php echo $content['subtotal'] ?></td>
                        <td class="actions" data-th="">
                            <button onclick="removeItem('<?php echo $content['rowid'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>								
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr class="visible-xs">
                    <td class="text-center"><strong>Total $<?php echo $total; ?></strong></td>
                </tr>
                <tr>
                    <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                    <td colspan="2" class="hidden-xs"></td>
                    <td class="hidden-xs text-center"><strong>Total $<?php echo $total; ?></strong></td>
                    <td><a href="<?php echo base_url() ?>check_out" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
                </tr>
            </tfoot>
            <?php }else{ ?>
                Your cart is empty.
            <?php } ?>
        </table>
    </div>
</section>


<script type="text/javascript">

    function removeItem(rowid) {
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>frontend/domain/removeCartItem',
            data: {
                rowid: rowid
            },
            dataType: 'html',
            success: function (data)
            {
                $("#cart_item").html(data);
                alert("Domain removed successfully");
//                if (data.status === '1') {
//                    alert("Domain removed successfully");
//                }

            }
        });
    }
    $("#billing_country").on('change', function (e) {

        if (this.value != 'select') {
            $.ajax({
                url: '<?php echo base_url(); ?>frontend/subscription/getcities',
                method: 'post',
                async: false,
                data: {'country_id': this.value},
                success: function (data) {

                    // $("#project_portfolio").empty();
                    // alert(data);
                    $("#billing_state").html(data);

                }

            });
        } else {

            $("#billing_state").html("<option value='select'>Select State</option>");

        }

    });




    var payment_successful = "<?php
                if ($this->session->userdata('payment_successfull')) {
                    echo $this->session->userdata('payment_successfull');
                    $this->session->unset_userdata('payment_successfull');
                } else {
                    echo '';
                }
                ?>";

    if (payment_successful != '') {
        $('li[role=presentation]').removeClass('active');
        $('.tab-pane').removeClass('active');
        $('.status_details').removeClass('disabled').addClass('active');
    }

    var memberDetailsForm_save_URL = "<?php echo base_url() . 'checkout_save_member'; ?>"; //refer \assets\frontend\js\custom.js
    // alert(memberDetailsForm_save_URL);
</script>
