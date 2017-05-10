<html>
    <head></head>
    <body>
        
        <form  method="post" action='<?php echo base_url();?>mobile/webservices/saveAttachmentForBug'>
		
		    <table>
			
			    <tr>
				    <td>Uploaded By</td>
				    <td><input type="text" name="name"/></td>
				</tr>
			    <tr>
				    <td>Image name</td>
				    <td><input type="text" name="image_name"/></td>
				</tr>
                <tr>
				    <td>Image Bitmap</td>
				    <td><input type="text" name="image"/></td>
				</tr> 
				<tr>
				    <td>Title</td>
				    <td><input type="text" name="title"/></td>
				</tr>
                <tr>
				    <td>Description</td>
				    <td><input type="text" name="description"/></td>
				</tr> 				
				
                <tr>
				    <td><input type="hidden" name="user_id" value="20"/></td>
				    <input type="hidden" name="bug_id" value="1"/>
				     <input type="hidden" name="login_type" value="1"/><td>
				    <td><input type="submit" name="submit" value="login"/></td>
				</tr>		
			</table>   
		</form>  
		
    </body>	
</html>