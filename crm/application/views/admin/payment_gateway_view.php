
<html>
	<head>
	</head>
        <body>
            
            
            <form role="form" enctype="multipart/form-data" id="form"

                  action="<?php echo base_url(); ?>admin/payment_gateway/pay_amount/<?php
/*
                  if (!empty($account_info)) {

                      echo $account_info->account_id;

                  }*/

                  ?>" method="post">
                
                
            <div>
            <input type="submit" name="pay_100" id="pay_100" value="100">
            </div>
            <br />
             <div>
            <input type="submit" name="pay_200" id="pay_200" value="200">
            </div>
            
	</form>
	</body>
	
</html>

