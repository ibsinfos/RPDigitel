<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>    
        <title>Lilly Ortiz | myEcon </title>  
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />     
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" /> 
        <meta name="keywords" content="" />        <meta name="description" content="" />  
        <link rel="stylesheet" href="<?php echo asset_url() ?>vcard_lp/css/styles.css?v=1.0.0.257" type="text/css" media="all" />  
        <link rel="stylesheet" href="<?php echo asset_url() ?>vcard_lp/css/styles-ltr.css?v=1.0.0.257" type="text/css" media="all" />
        <!--[if IE 7]><link  rel="stylesheet" href="//files.mobilebuilder.net/Styles/mobile-frontend/css/ie7Fix.css?v=1.0.0.257"/><![endif]-->   
        <!--[if IE 8]><link  rel="stylesheet" href="//files.mobilebuilder.net/Styles/mobile-frontend/css/ie8Fix.css?v=1.0.0.257"/><![endif]-->  
        <noscript><link href="<?php echo asset_url() ?>vcard_lp/css/styles-no-script.css?v=1.0.0.257" rel="stylesheet" type="text/css" media="all" /></noscript>        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo asset_url() ?>vcard_lp/js/jquery-1.10.0.min.js?v=1.0.0.257"></script>    
        <script type="text/javascript" src="<?php echo asset_url() ?>vcard_lp/js/modernizr-2.8.3.min.js?v=1.0.0.257"></script>  
        <script type="text/javascript" src="<?php echo asset_url() ?>vcard_lp/js/jquery.vide.min.js?v=1.0.0.257"></script>    
        <script type="text/javascript" src="<?php echo asset_url() ?>vcard_lp/js/jquery.scrollTo.min.js?v=1.0.0.257"></script> 
        <link rel="stylesheet" href="<?php echo asset_url() ?>vcard_lp/css/jquery.lightbox-0.5.css?v=1.0.0.257" type="text/css" media="all" />  
        <script type="text/javascript" src="<?php echo asset_url() ?>vcard_lp/js/jquery.lightbox-0.5.min.js?v=1.0.0.257"></script>     
        <script type="text/javascript" src="<?php echo asset_url() ?>vcard_lp/js/jquery-ui-1.10.4.min.js?v=1.0.0.257"></script>     
        <script type="text/javascript" src="<?php echo asset_url() ?>vcard_lp/js/app.main.js?v=1.0.0.257"></script>     
        <!--<script type="text/javascript" src="<?php echo asset_url() ?>vcard_lp/js/jquery.js.js"></script>-->       
        <link rel="stylesheet" href="<?php echo asset_url() ?>vcard_lp/css/jquery-ui/jquery-ui.min.css" type="text/css" media="all"/> 
        <link rel="stylesheet" href="<?php echo asset_url() ?>vcard_lp/css/jquery-ui/jquery-ui.structure.min.css" type="text/css" media="all"/> 
        <link rel="stylesheet" href="<?php echo asset_url() ?>vcard_lp/css/jquery-ui/jquery-ui.theme.min.css" type="text/css" media="all"/>  
        <link href="" type="text/css" rel="stylesheet" media="all"/>        <style type="text/css" data-type="mobile"></style>     
        <style type="text/css" data-type="medium">

            @media (min-width: 41rem) {

            }

            .error p{color:#d9534f;margin:0px}

            .success p{color:green;margin:0px}

            .ui-accordion-content-active {height:auto !important}



            .head-top { background-color:<?php echo $data[0]['theme_color']; ?>

            }

            .theme-color {

                color : <?php echo $data[0]['theme_color']; ?>

            }

            .title{ background-color:transparent !important}

            #accordion  h3 {

                background-color: <?php echo $data[0]['theme_color']; ?> 

            }




        </style>
    </head>   
    <body is_preview="False" mode="page" storage_start_url="#" relative_start_url="/">
        <div class="content-mobile">   
            <div><div id="root">          
                    <div  id="" row-id="1" row-reusable-id="" elements-width-medium="" elements-width-mobile="" class="row-outer clearfix u_9533608310">
                        <div class="row-inner clearfix">   
                            <div  id="" container-id="1" elements-width-medium="" elements-width-mobile="" class="container clearfix u_3703691539">   
                                <div class="container-content">            
                                    <div  id="" snippet-id="1" allow-user-edit="false" snippet-type="Picture" snippet-reusable-id="" class="block clearfix u_3395582488 picture">   
                                        <div class='block-content clearfix'>        
                                            <div class="image-box image-snippet">       
                                                <div class="main-bg">                       
                                                    <div class="head-top">                      
                                                        <a href="tel:<?php echo $data[0]['work_phone'] ?>" class="head-links">Call Me</a> 
                                                        <span class="link-seperator">&nbsp;</span>               
                                                        <a href="sms:<?php echo $data[0]['mobile'] ?>" class="head-links">Text Me</a>    
                                                        <span class="link-seperator">&nbsp;</span>                                       
                                                        <a href="mailto:<?php echo $data[0]['email'] ?>" class="head-links">Email Me</a>   
                                                        <div class="clear"></div>                                             
                                                    </div>                                             
                                                    <div class="side-content">                      
                                                        <img src="<?php echo $data[0]['company_logo'] ?>" class="logo-img"/> 
                                                        <h3 class="theme-color"><?php echo $data[0]['first_name'] . " " . $data[0]['last_name'] ?> </h3>   
                                                        <h5><?php echo $data[0]['job_title'] ?></h5>                                                    
                                                        <h3 class="theme-color"><a style="text-decoration:none;border-bottom:0" href="tel:<?php echo $data[0]['work_phone'] ?>"><?php echo $data[0]['work_phone'] ?></a></h3>  
                                                    </div>        
                                                    <?php if ($data[0]['user_image'] != '') { ?>     
                                                        <div class="side-image">                     
                                                            <img src="<?php echo $data[0]['user_image'] ?>" class="character-image"/>  
                                                        </div>                              
                                                    <?php } ?>                                       
                                                    <div class="overlaybg">                          
                                                        <img src="<?php echo asset_url() ?>vcard_lp/images/mainbg.png" class="overlay-image"/>     
                                                    </div>                                  
                                                    <div style="clear:both"></div>         
                                                    <div class="save-contact">          
                                                        <a style="text-decoration:none;border-bottom:0" href="<?php echo base_url() ?>generate-vcard/<?php echo $data[0]['slug'] ?>">Save My Contact Info</a>    
                                                    </div>             
                                                </div>             
                                                <map class='image-action-map' id='picture-d1a831' name='picture-d1a831' data-initial-width='413'> 
                                                    <area shape="rect" href="tel:6785213376"  onclick="clickPhone(288170, 37471)"  coords="0,0,160,50"/>
                                                    <area shape="rect" href="sms:6785213376"  onclick="clickSms(288170, 37471)"  coords="207,0,382,52"/>
                                                    <area shape="rect" href="mailto:lillyhelpsyou@gmail.com"  onclick="return clickEmailTell('', '', true, 288170, 37471);"  coords="418,0,599,59"/>        
                                                    <area shape="rect" href="tel:6785213376"  onclick="clickPhone(288170, 37471)"  coords="0,108,600,367"/>     
                                                    <area shape="rect" href="http://www.mvcard.me/clients/lortiz/Lilly_Ortiz.vcf"  target="_self" coords="2,388,380,434"/>  
                                                </map>    
                                            </div>    
                                        </div>    
                                    </div><!--endsnippet-id="1"-->  
                                </div>                          
                            </div><!--endcontainer-id="1"--> 
                        </div>               
                    </div><!--endrow-id="1"-->  
                    <div id="accordion" class="border-div">
                        <h3>                       
                            <span class="pad10"><?php echo $tabs[0]['tab_name'] ?>    
                            </span>     
                        </h3>             
                        <div><span class="">   
                         <!--                                <p <?php

                                if ($data[0]['why_choose_image'] != '') {

                                    echo "style='width:50%;float:right'";

                                }

                                ?>><?php if ($data[0]['why_choose_desc'] != '') echo $data[0]['why_choose_desc']; ?></p>

                                <p><?php

                                if ($data[0]['why_choose_image'] != '') {

                                    echo "<img style='width:250px' src=" . $data[0]['why_choose_image'] . ">";

                                }

                                ?></p>-->                    
                               <p><?php

                                    if ($data[0]['why_choose_video'] != '') {

//                                    if (strpos($data[0]['why_choose_video'], 'embed') !== false){

//                                        return true;

//                                    }else{

//                                        

//                                    }

                                        ?>



                                        <iframe frameBorder="0" style="width: 90%;padding: 20px;float: left;" autoplay=false height="315"

                                                src="<?php echo $data[0]['why_choose_video']; ?>">

                                        </iframe>

                                    <?php }

                                    ?></p>  
                            </span></div>  
                        <h3><span class="pad10"><?php echo $tabs[1]['tab_name'] ?></span></h3> 
                        <div><span class="pad10">     
                                <ul class="accordion">       
                                    <?php
                                    $sr = 0;
                                    foreach ($busi_strat as $bdata) {
                                        $sr++;
                                        ?>                                 
                                        <li>                               
                                            <a class="toggle" href="javascript:void(0);"><?php echo $sr . " - " . $bdata['strat_name']; ?></a> 
                                            <ul class="inner">                     
                                                <p><?php echo $bdata['description']; ?></p>    
                                                <p><?php if ($bdata['video'] != '')  ?><video width = "550" height = "240" controls>   
                                                        <source src = "<?php echo $bdata['video']; ?>" type = "video/mp4">              
                                                        <source src = "<?php echo $bdata['video']; ?>" type = "video/ogg">              
                                                        Your browser does not support the video tag.                                    
                                                    </video></p>                                            </ul>                   
                                        </li>      
                                    <?php } ?>    
                                </ul>         
                            </span></div> 
                        <h3><span class="pad10"><?php echo $tabs[2]['tab_name'] ?></h3>  
                        <div><span class="pad10">                  
                                <a href="javascript:;" onclick="website_link('<?php echo $data[0]['product_page_url'] ?>');" >Click to see products</a>  
                            </span></div>                
                        <h3><span class="pad10"><?php echo $tabs[3]['tab_name'] ?></h3>  
                        <div><span class="">                              
                                <h4 style="text-align:center;font-size:20px"><?php echo ucfirst($data[0]['company_name']) ?> Business Opportunity</h4>   
                                <p><?php if ($data[0]['business_opportunity_video'] != '')  ?>
                                    <iframe frameBorder="0" style="width: 90%;padding: 20px;float: left;" autoplay=false height="315"

                                                src="<?php echo $data[0]['business_opportunity_video']; ?>">

                                        </iframe>
                                    </p>                          
                            </span></div>              
                        <h3><span class="pad10"><?php echo $tabs[4]['tab_name'] ?></h3>     
                        <div><span class="pad10">                           
                                <p><?php echo $data[0]['increase_your_credit_desc'] ?></p>    
                                <div id="contactform0" class="form">                         
                                    <div>                                      
                                        <span class="success"></span>                 
                                        <span class="error"></span>                    
                                        <form id="contactme" method="post" enctype="multipart/form-data" action="">   
                                            <div class="form-fields">                                               
                                                <label class="field-text-label">                                        
                                                    <span class="form-field-name">FIRST NAME                                
                                                        <span title="FIRST NAME is required." id="span_First Name">*</span>     
                                                    </span>                                               
                                                    <input title="FIRST NAME" class="field-text text valid" type="text" required name="first_name">     
                                                    <input type="hidden" name="hidden_email" value="<?php echo $data[0]['email'] ?>" />   
                                                    <input type="hidden" name="hidden_id" value="<?php echo $data[0]['id'] ?>" />         
                                                </label>                                            
                                                <label class="field-text-label">                   
                                                    <span class="form-field-name">LAST NAME            
                                                        <span title="LAST NAME is required."  id="span_Last Name">*</span>    
                                                    </span>                                                
                                                    <input title="LAST NAME" required class="field-text text valid" type="text" name="last_name"> 
                                                </label>                              
                                                <label class="field-phone-label">     
                                                    <span class="form-field-name">MOBILE #   
                                                        <span title="MOBILE # is required." id="span_Phone">*</span> 
                                                    </span>                                                 
                                                    <input title="MOBILE #" required class="field-text phone valid" type="text" name="mobile">   
                                                </label>                                       
                                                <label class="field-bigtext-label">                
                                                    <span class="form-field-name">COMMENTS/QUESTIONS   
                                                        <span title="COMMENTS/QUESTIONS is required." id="span_Message">*</span>  
                                                    </span>                                                
                                                    <textarea class="field-textarea bigtext valid" required rows="3" name="comment" title="COMMENTS/QUESTIONS"></textarea> 
                                                </label>                                 
                                            </div>                                   
                                            <div style="display: none;"><input type="text" name="PrevSp" id="PrevSp"></div>  
                                            <div class="ta-center">                                            
                                                <input id="contactme1" style="padding:11px;border-radius:2px;background-color:<?php echo $data[0]['theme_color']; ?>;color:#fff;border:0px;margin-top:10px" type="button" value="Submit">     
                                            </div>               
                                        </form>              
                                    </div>               
                                </div>         
                            </span></div>  
                        <h3><span class="pad10"><?php echo $tabs[5]['tab_name'] ?></h3>   
                        <div><span class="pad10">                                
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">   
                                    <tbody>                                
                                        <tr>               
                                            <td>  
                                                <h3 class="title" style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif;"><b>
                                                        <font color="#003e7a" face="Arial" style="font-size: 14pt">
                                                        <?php echo ucfirst($data[0]['first_name']) . " " . ucfirst($data[0]['last_name']) ?></font><br>   
                                                        <font face="Arial" style="font-size: 14pt"><span style="font-weight: 400"><?php echo $data[0]['job_title'] ?><br> 
                                                            &#8203;&#8203;</span></font><font face="Arial" style="font-size: 13pt">&nbsp; &nbsp; &nbsp;</font></b>
                                                    <font color="#808080" face="Arial" style="font-size: 11pt">&nbsp; &nbsp; &nbsp; &nbsp;</font><br>    
                                                    <font color="#003e7a" face="Arial" style="font-size: 14pt; font-weight: 400">Mobile&nbsp;</font>
                                                    <font face="Arial" style="font-size: 14pt"><span style="font-weight: 400"><font color="#003e7a">#:&nbsp;<br>  
                                                        &#8203;</font><?php echo $data[0]['mobile'] ?></span></font><br>                                         
                                                    <br>                                                
                                                    <font color="#5F1933" style="font-size: 14pt; font-family: Arial;">
                                                    <a href="mailto:<?php echo $data[0]['email'] ?>"><font color="#003e7a">Email Me</font></a></font>
                                                    <font color="#003e7a" style="font-size: 14pt; font-family: Arial;"> | </font>
                                                    <span style="font-size: 14pt; font-family: Arial;"> </span>
                                                    <font color="#5F1933" style="font-size: 14pt; font-family: Arial;">
                                                    <a href="javascript:;" onclick="website_link('<?php echo $data[0]['work_website'] ?>')" target="_blank">
                                                        <font color="#003e7a"> Visit Website</font></a></font></h3>                                            
                                                <p class="title" style="color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif;"><br>   
                                                    <font face="Arial" style="font-size: 14pt"><span style="font-weight: 400">
                                                        <font color="#003e7a">Connect with me: </font> </span></font><br>      
                                                    <font face="Arial" style="font-size: 13pt">
                                                    <a href="javascript:;" onclick="website_link('<?php echo $data[0]['facebook_link']; ?>')"">
                                                        <img border="0" height="34" src="http://www.myvbc.net/images/fb-icon.jpg" width="34"></a>
                                                    <a href="javascript:;" onclick="website_link('<?php echo $data[0]['linkedin_link']; ?>')""> 
                                                        <img border="0" height="33" src="http://www.myvbc.net/images/lin-icon.jpg" width="33"></a>
                                                    <a href="javascript:;" onclick="website_link('<?php echo $data[0]['twitter_link']; ?>')">
                                                        <img border="0" height="33" src="http://www.myvbc.net/images/twitter-icon.jpg" width="33"></a></font><br> 
                                                    <br>                               
                                                    <font face="Arial"><b><font color="#5F1933">
                                                        <a href="<?php echo base_url() ?>generate-vcard/<?php echo $data[0]['slug'] ?>" >
                                                            <font color="#003e7a" style="font-size: 14pt; font-weight: 400">Save My Contact Info</font></a></font></b></font></p> 
                                            </td>                                    
                                        </tr>                                
                                    </tbody>                               
                                </table>                       
                            </span></div>                     
                        <?php
                        if ($custom_tabs != '') {
                            foreach ($custom_tabs as $ctab) {
                                ?>  
                                <h3><span class="pad10"><?php echo $ctab['tab_name'] ?></h3> 
                                <div><span class="pad10">                                    
                                         <?php

                                        $regex = "((https?|ftp)\:\/\/)?"; // SCHEME 

                                        $regex .= "([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?"; // User and Pass 

                                        $regex .= "([a-z0-9-.]*)\.([a-z]{2,3})"; // Host or IP 

                                        $regex .= "(\:[0-9]{2,5})?"; // Port 

                                        $regex .= "(\/([a-z0-9+\$_-]\.?)+)*\/?"; // Path 

                                        $regex .= "(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)?"; // GET Query 

                                        $regex .= "(#[a-z_.-][a-z0-9+\$_.-]*)?"; // Anchor 



                                        if (preg_match("/^$regex$/i", $ctab['tab_val'])) { // `i` flag for case-insensitive

                                            echo '<a href="javascript:;" onclick="website_link(&quot;'.$ctab["tab_val"].'&quot;);" >'.$ctab["tab_val"].'</a>';

                                        }else{

                                            echo '<p>'.$ctab['tab_val'].'</p>';

                                        }

                                        ?>                           
                                    </span></div>                    
                                <?php
                            }
                        }
                        ?>                  
                    </div>                 
                    <div id="" row-id="16" row-reusable-id="" elements-width-medium="" elements-width-mobile="" class="row-outer clearfix u_4784047089">   
                        <div class="row-inner clearfix">  
                            <div id="" container-id="19" elements-width-medium="" elements-width-mobile="" class="container clearfix u_8208120536">
                                <div class="container-content">   
                                    <div id="" snippet-id="29" allow-user-edit="false" snippet-type="CustomHTML" snippet-reusable-id="" class="block clearfix u_5655728244 customhtml">    
                                        <div class="block-content clearfix">
                                            <div align="left">                   
                                                <table border="0" width="100%" cellspacing="0" cellpadding="0" style='background:#424242' bgcolor="#424242" height="61">  
                                                    <tbody><tr>                 
                                                            <td><font face="Arial" color="#ffffff">&nbsp;&nbsp;&nbsp;&nbsp;   
                                                                <a target="_blank" style='text-decoration:none' href="<?php echo base_url() ?>"> 
                                                                    <font color="#ffffff">
                                                                    <span style="font-size: 12pt">Powered by Novae vCard<sup>TM</sup></span></font></a>
                                                                <span style="font-size: 11pt">&nbsp; &nbsp;   
                                                                </span>                                    
                                                                <font color="#ffffff"><span style="font-size: 12pt">  
                                                                    <!--a target="_blank" style='text-decoration:none' href="<?php echo base_url() ?>share/<?php echo $data[0]['slug'] ?>">   
                                                                        <font color="#ffffff">Share vCard</font></a></span></font></font-->
                                                                        </td>                                          
                                                        </tr>                                                
                                                    </tbody></table>                           
                                            </div>                                   
                                        </div>                                    
                                    </div><!--endsnippet-id="29"-->           
                                </div>                        
                            </div><!--endcontainer-id="19"-->   
                        </div>                    
                    </div>                    
                    <div class="main-footer">     
                        <div>                         
                            <!-- See Full Website -->              
                        </div>                 
                    </div>       
                </div>
            </div>       
        </div> 
        <div id="" row-id="16" row-reusable-id="" elements-width-medium="" elements-width-mobile="" class="row-outer clearfix u_4784047089">  
            <div class="row-inner clearfix">   
                <div id="" container-id="19" elements-width-medium="" elements-width-mobile="" class="container clearfix u_8208120536">    
                    <div class="container-content">         
                        <div id="" snippet-id="29" allow-user-edit="false" snippet-type="CustomHTML" snippet-reusable-id="" class="block clearfix u_5655728244 customhtml">     
                            <div class="block-content clearfix">   
                                <div align="left">                     
                                    <table border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#424242" height="61"> 
                                        <tbody><tr>                    
                                                <td><font face="Arial" color="#ffffff">&nbsp;&nbsp;&nbsp;&nbsp;   
                                                    <a target="_blank" href="http://m.mobiletivity.com">   
                                                        <font color="#ffffff"><span style="font-size: 12pt">Powered by vCardIQ�</span></font></a>
                                                    <span style="font-size: 11pt">&nbsp; |&nbsp;     
                                                    </span>                                         
                                                    <font color="#ffffff"><span style="font-size: 12pt">  
                                                        <!--a target="_blank" href="http://m.mvcard.me/lilly_sharevcard">
                                                            <font color="#ffffff">Share vCard</font></a></span></font></font-->
                                                            </td> 
                                            </tr>                                   
                                        </tbody></table>                      
                                </div>                            
                            </div>                             
                        </div><!--endsnippet-id="29"-->         
                    </div>              
                </div><!--endcontainer-id="19"-->  
            </div>     
        </div>       
        <div class="main-footer">  
            <div>            
                <!-- See Full Website -->
            </div>      
        </div>      
        <div class="resolution-indicator"> 
        </div>     
         <script>

            $("#accordion, #accordion1").accordion();

            // Hover states on the static widgets

            $("#dialog-link, #icons li").hover(

                    function () {

                        $(this).addClass("ui-state-hover");

                    },

                    function () {

                        $(this).removeClass("ui-state-hover");

                    }

            );



            $('.toggle').click(function (e) {

                e.preventDefault();



                var $this = $(this);



                if ($this.next().hasClass('show')) {

                    $this.next().removeClass('show');

                    $this.next().slideUp(350);

                } else {

                    $this.parent().parent().find('li .inner').removeClass('show');

                    $this.parent().parent().find('li .inner').slideUp(350);

                    $this.next().toggleClass('show');

                    $this.next().slideToggle(350);

                }

            });

            function website_link(url) {

                if (url == '') {

                    alert("No website url found");

                    return false;

                }

                if (!/^https?:\/\//i.test(url)) {

                    url = 'http://' + url;

                    console.log(url);

                    var win = window.open(url, '_blank');

                    win.focus();

                } else {

                    var win = window.open(url, '_blank');

                }

            }



            $("#contactme1").click(function () {



                var url = base_url + "contactme"; // the script where you handle the form input.

                // alert($("#contactme").serialize());

                $.ajax({

                    type: "POST",

                    url: url,

                    data: $("#contactme").serialize(),

                    dataType: 'json', // serializes the form's elements.

                    success: function (data)

                    {

                        // alert(data);

                        if (data.status === 1) {

                            $(".success").html(data.msg);

                            $('#contactme')[0].reset();

                             $(".error").hide();
                             setTimeout("location.reload(true);",5000);

                            // window.location.href = "payment"

                        } else {

                            $(".error").html(data.msg);

                        }

                    }

                });

                e.preventDefault();

            });
            $("#accordion").accordion({ header: "h3", collapsible: true, active: false });



        </script>
    </body>  
    <div id="https-redirect-wrapper"></div></html>