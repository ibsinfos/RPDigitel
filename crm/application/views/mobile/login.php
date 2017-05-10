<html>
    <head></head>
    <body>
        
        <form  method="post" action='<?php echo base_url();?>mobile/webservices/login_user'>
		
		    <table>
			    <tr>
				    <td>Username</td>
				    <td><input type="text" name="username"/></td>
				</tr>
                <tr>
				    <td>Password</td>
				    <td><input type="text" name="password"/></td>
				</tr> 
                <tr>
				    <td><input type="hidden" name="login_type" value="1"/></td>
                     <td><input type="hidden" name="device_id" value="KKJDHDHDHDHDHDH56565"/></td>
				    <td><input type="submit" name="submit" value="login"/></td>
				</tr>		
			</table>   
		</form>  
		
    </body>	
</html>