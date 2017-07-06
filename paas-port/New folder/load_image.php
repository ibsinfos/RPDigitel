<?php

mysql_connect("localhost","root","");
mysql_select_db("rpdigitel");
$q="select * from tbl_users where id=".$_GET['user_id'];
$rec=mysql_fetch_array(mysql_query($q));
$data=$rec['qr_code_image'];

header('Content-Length: '.strlen($data));
header("Content-type: image/".$rec['qr_code_image_ext']);
echo $data;

?>