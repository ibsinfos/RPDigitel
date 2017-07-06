<html>
    <head></head>
    <body>
        
        <form  method="post" action='<?php echo base_url();?>mobile/webservices/register_user'>
		
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
				     <td>Name</td>
				     <td><input type="text" name="name"/></td>
				  </tr>   
                <tr>
				    <td>Email</td>
				    <td><input type="text" name="email"/></td>
				</tr> 
                <tr>
				    <td>Mobile</td>
				    <td><input type="text" name="phone"/></td>
				</tr> 
                <tr>
				    <td>Image</td>
				    <td><input type="text" name="profile_image"/></td>
				</tr>
				<tr>
				    <td><input type="hidden" value="lsdlsldsldsldlsdlsd6565656" name="device_id"/>
					<input type="hidden" value="1" name="user_type"/></td>
					<input type="hidden" value="" name="client_type"/></td>
				    <td><input type="submit" value="Register"/></td>
				</tr> 				
			</table>   
		</form>  
		
    </body>	
</html>