	<?php
						
	/*					
header('Content-Length: '.strlen($qr_code));
header("Content-type: image/".$ext);
echo $qr_code;

*/


header('Content-Length: '.strlen($qr_code));
								header('Content-type: image/png');
								echo $qr_code;
								
						?>