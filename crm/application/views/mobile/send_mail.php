<html>
    <head></head>
    <body>
        
        <form  method="post" action='<?php echo base_url();?>mobile/webservices/saveUserInfoAndMail'>
		
		    <table>
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
				    <td>Subject</td>
				    <td><input type="text" name="subject"/></td>
				</tr>
				<tr>
				    <td>Message</td>
				    <td><input type="text" name="message"/></td>
				</tr>
				<tr>
				    <td><input type="hidden" value="lsdlsldsldsldlsdlsd6565656" name="device_id"/></td>
				    <td><input type="submit" value="Register"/></td>
				</tr> 				
			</table>   
		</form>  
		
    </body>	
</html>