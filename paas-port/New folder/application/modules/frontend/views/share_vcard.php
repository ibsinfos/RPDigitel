<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>

        <title>Lilly Ortiz | myEcon </title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />



        <link rel="stylesheet" href="<?php echo asset_url() ?>vcard_lp/css/styles.css?v=1.0.0.257" type="text/css" media="all" />
        <link rel="stylesheet" href="<?php echo asset_url() ?>vcard_lp/css/styles-ltr.css?v=1.0.0.257" type="text/css" media="all" />

        <!--[if IE 7]><link  rel="stylesheet" href="//files.mobilebuilder.net/Styles/mobile-frontend/css/ie7Fix.css?v=1.0.0.257"/><![endif]-->
        <!--[if IE 8]><link  rel="stylesheet" href="//files.mobilebuilder.net/Styles/mobile-frontend/css/ie8Fix.css?v=1.0.0.257"/><![endif]-->
        <noscript><link href="<?php echo asset_url() ?>vcard_lp/css/styles-no-script.css?v=1.0.0.257" rel="stylesheet" type="text/css" media="all" /></noscript>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

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
        <link href="" type="text/css" rel="stylesheet" media="all"/>



        <style type="text/css" data-type="mobile"></style>
        <style type="text/css" data-type="medium">
            @media (min-width: 41rem) {
            }
            .error p{color:#d9534f;margin:0px}
            .success p{color:green;margin:0px}
            .ui-accordion-content-active {height:auto !important}
        </style>
    </head>
    <body is_preview="False" mode="page" storage_start_url="#" relative_start_url="/">
        <div class="content-mobile">
            <div><div id="root">





                    <div id="accordion" class="border-div">
                        <h3>
                            <span class="pad10">Share ? refer a friend
                            </span>
                        </h3>
                        <div><span class="pad10">
                                <div class="gmail_default"><font style="font-size: 14pt" face="Arial">
                                    </font>
                                    <font face="Arial" style="font-size: 14pt"><b><br>
                                        Would you like to refer <?php echo ucfirst($data[0]['first_name'])." ".ucfirst($data[0]['last_name'])?> to your friends 
                                        and family?</b></font><p>
                                        <font face="Arial" style="font-size: 13pt">You can share 
                                        this Mobile vCard with them by entering their details 
                                        below:</font></p>
                                    <table border="0" width="15%" cellpadding="0" style="border-collapse: collapse" height="175" bordercolor="#666666">
                                        <tbody><tr>
                                                <td align="center" valign="top"><div style="background-color: #FFFFFF"> <form id="sendForm" action="http://login.mobiletivity.com/fbAPI" method="post" target="_self">
                                                            <div align="center">
                                                                &nbsp;<table cellpadding="0" cellspacing="4" height="99" width="290"><tbody><tr>
                                                                            <td style="font-size:14px;text-align:left" nowrap="nowrap" width="93">
                                                                                <p style="text-align: right">
                                                                                    <font color="#FF0000">*</font><span style="font-size:12pt;font-family:arial,sans-serif; ">Mobile #:</span></p></td>
                                                                            <td width="185">
                                                                                <input id="mN" name="mN" style="width:162; height:30; font-size:14pt" type="tel" size="15"></td></tr><tr><td style="font-size:14px;text-align:left">
                                                                                <p style="text-align: right">
                                                                                    <font color="#FF0000">*</font><span style="font-size:12pt;font-family:arial,sans-serif; ">First 
                                                                                        Name:</span></p></td>
                                                                            <td width="185">
                                                                                <input id="first" name="first" style="width:162; height:30; font-size:14pt" type="text" size="15"></td></tr><tr><td style="font-size:14px;text-align:left">
                                                                                <p style="text-align: right">
                                                                                    <span style="font-size:12pt;font-family:arial,sans-serif; ">Last Name:</span></p></td>
                                                                            <td width="185">
                                                                                <input id="last" name="last" style="width:162; height:30; font-size:14pt" type="text" size="15"></td></tr>
                                                                        <tr>
                                                                            <td style="font-size:14px;text-align:left">
                                                                                <p style="text-align: right">
                                                                                    <font size="3">
                                                                                    <span style="font-family: arial,sans-serif">Email</span></font><span style="font-size:12pt;font-family:arial,sans-serif; "> 
                                                                                        Address:</span></p></td>
                                                                            <td width="185">
                                                                                <input id="email" name="email" style="width:162; height:30
                                                                                       ; font-size:14pt" type="text" size="15"></td>
                                                                        </tr>

                                                                    </tbody></table>
                                                            </div>
                                                            <div align="right">
                                                                <table cellpadding="0" width="262"><tbody><tr>
                                                                            <td style="text-align:left" width="240">
                                                                                <p style="text-align: right">
                                                                                    <input id="submitButton" value="TEXT vCARD" type="submit" style="color:#FFFFFF;background-color:#7c7a79;border-color:#ffffff;font-size:14pt;line-height:1.33;border-radius:6px; float:right; padding-left:1px; padding-right:1px; padding-top:2px; padding-bottom:2px"><br>
                                                                                    &nbsp; </p></td></tr></tbody></table>
                                                            </div>
                                                            <input type="hidden" id="sc" name="sc" value="lillyo1raf (76626)"><input type="hidden" id="ev" name="ev" value="send"><input type="hidden" id="ac" name="ac" value="7"><input type="hidden" id="me" name="me" value="MobileWebPage"><input type="hidden" id="forwardLink" name="forwardLink" value="http://m.mvcard.me/lilly_referral_notification"></form></div>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    <p style="text-align: center">
                                        <font face="Arial" style="font-size: 16pt"><b>Thank You 
                                            For Your Referrals!</b></font></p></div>
                            </span>
                        </div>

                        <h3><span class="pad10">Share on facebook</span></h3>
                        <div><span class="pad10">

                                <div class="block-content clearfix collapsible-content" style="display: block;">               





                                    <div align="center">
                                        <div align="center">
                                            <table border="0" width="96%" cellspacing="0" cellpadding="4">
                                                <tbody><tr>
                                                        <td align="center" valign="top">
                                                            <p align="left">
                                                                <font face="Arial" style="font-size: 13pt">Click link below to 
                                                                quickly share this vCard with your Facebook friends:</font></p><p align="left">
                                                                <font style="font-size: 13pt; font-weight:700" face="Arial"> 
                                                                <a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo base_url() . "/" . $data[0]['slug']; ?>">
                                                                    Share on Facebook</a></font></p></td></tr>
                                                </tbody></table>
                                        </div></div>




                                </div>
                            </span></div>
                        <h3><span class="pad10">Share vcard/optin</span></h3>
                        <div><span class="pad10">

                                <ul class="accordion">


                                    <li>
                                        <a class="toggle" href="javascript:void(0);">Business Prospects</a>

                                        <ul class="inner">

                                            <div class="block-content clearfix collapsible-content" style="display: block;">               





                                                <div align="center">
                                                    <table border="0" width="15%" cellpadding="0" style="border-collapse: collapse" height="175" bordercolor="#666666">
                                                        <tbody><tr>
                                                                <td align="center" valign="top"><div style="background-color: #FFFFFF"> <form id="sendForm" action="http://login.mobiletivity.com/fbAPI" method="post" target="_self">
                                                                            <div align="center">
                                                                                &nbsp;<table cellpadding="0" cellspacing="4" height="99" width="290"><tbody><tr>
                                                                                            <td style="font-size:14px;text-align:left" nowrap="nowrap" width="93">
                                                                                                <p style="text-align: right">
                                                                                                    <font color="#FF0000">*</font><span style="font-size:12pt;font-family:arial,sans-serif; ">Mobile #:</span></p></td>
                                                                                            <td width="185">
                                                                                                <input id="mN" name="mN" style="width:162; height:30; font-size:14pt" type="tel" size="15"></td></tr><tr><td style="font-size:14px;text-align:left">
                                                                                                <p style="text-align: right">
                                                                                                    <font color="#FF0000">*</font><span style="font-size:12pt;font-family:arial,sans-serif; ">First 
                                                                                                        Name:</span></p></td>
                                                                                            <td width="185">
                                                                                                <input id="first" name="first" style="width:162; height:30; font-size:14pt" type="text" size="15"></td></tr><tr><td style="font-size:14px;text-align:left">
                                                                                                <p style="text-align: right">
                                                                                                    <span style="font-size:12pt;font-family:arial,sans-serif; ">Last Name:</span></p></td>
                                                                                            <td width="185">
                                                                                                <input id="last" name="last" style="width:162; height:30; font-size:14pt" type="text" size="15"></td></tr>
                                                                                        <tr>
                                                                                            <td style="font-size:14px;text-align:left">
                                                                                                <p style="text-align: right">
                                                                                                    <font size="3">
                                                                                                    <span style="font-family: arial,sans-serif">Email</span></font><span style="font-size:12pt;font-family:arial,sans-serif; "> 
                                                                                                        Address:</span></p></td>
                                                                                            <td width="185">
                                                                                                <input id="email" name="email" style="width:162; height:30
                                                                                                       ; font-size:14pt" type="text" size="15"></td>
                                                                                        </tr>
                                                                                        <tr><td style="font-size:14px;color:#000000" align="center">
                                                                                                <p align="right"><font size="3">
                                                                                                    <span style="font-family: arial,sans-serif">Company</span></font><span style="font-size:12pt;font-family:arial,sans-serif; ">:</span></p></td>
                                                                                            <td align="center">
                                                                                                <p align="center">
                                                                                                    <input id="userDefine1" name="userDefine1" style="width:162; font-size:14pt; height:30; float:left" size="15" "=""></p></td>
                                                                                        </tr>
                                                                                        <tr><td style="font-size:14px;color:#000000" align="center">
                                                                                                <p align="right"><font size="3">
                                                                                                    <span style="font-family: arial,sans-serif">Notes</span></font><span style="font-size:12pt;font-family:arial,sans-serif; ">:</span></p></td>
                                                                                            <td align="center">
                                                                                                <p align="center">
                                                                                                    <input id="userDefine2" name="userDefine2" style="width:162; font-size:14pt; height:30; float:left" size="15" "=""></p></td>

                                                                                        </tr></tbody></table>
                                                                            </div>
                                                                            <div align="right">
                                                                                <table cellpadding="0" width="262"><tbody><tr>
                                                                                            <td style="text-align:left" width="240">
                                                                                                <p style="text-align: right">
                                                                                                    <input id="submitButton" value="TEXT vCARD" type="submit" style="color:#FFFFFF;background-color:#7c7a79;border-color:#ffffff;font-size:14pt;line-height:1.33;border-radius:6px; float:right; padding-left:1px; padding-right:1px; padding-top:2px; padding-bottom:2px"><br>
                                                                                                    &nbsp; </p></td></tr></tbody></table>
                                                                                <p style="text-align: center"><font face="Arial">*The recipient 
                                                                                    will need to reply "YES" to receive the Mobile vCard.</font></p></div>
                                                                            <input type="hidden" id="sc" name="sc" value="lillyo1optin (76626)"><input type="hidden" id="ev" name="ev" value="send"><input type="hidden" id="ac" name="ac" value="7"><input type="hidden" id="me" name="me" value="MobileWebPage"><input type="hidden" id="forwardLink" name="forwardLink" value="http://m.mvcard.me/lilly_sharevcard"></form></div>
                                                                </td>
                                                            </tr>
                                                        </tbody></table>
                                                </div>




                                            </div>  
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="toggle" href="javascript:void(0);">Customer Prospects</a>

                                        <ul class="inner">

                                            <div class="block-content clearfix collapsible-content" style="display: block;">               





                                                <div align="center">
                                                    <table border="0" width="15%" cellpadding="0" style="border-collapse: collapse" height="175" bordercolor="#666666">
                                                        <tbody><tr>
                                                                <td align="center" valign="top"><div style="background-color: #FFFFFF"> <form id="sendForm" action="http://login.mobiletivity.com/fbAPI" method="post" target="_self">
                                                                            <div align="center">
                                                                                &nbsp;<table cellpadding="0" cellspacing="4" height="99" width="290"><tbody><tr>
                                                                                            <td style="font-size:14px;text-align:left" nowrap="nowrap" width="93">
                                                                                                <p style="text-align: right">
                                                                                                    <font color="#FF0000">*</font><span style="font-size:12pt;font-family:arial,sans-serif; ">Mobile #:</span></p></td>
                                                                                            <td width="185">
                                                                                                <input id="mN" name="mN" style="width:162; height:30; font-size:14pt" type="tel" size="15"></td></tr><tr><td style="font-size:14px;text-align:left">
                                                                                                <p style="text-align: right">
                                                                                                    <font color="#FF0000">*</font><span style="font-size:12pt;font-family:arial,sans-serif; ">First 
                                                                                                        Name:</span></p></td>
                                                                                            <td width="185">
                                                                                                <input id="first" name="first" style="width:162; height:30; font-size:14pt" type="text" size="15"></td></tr><tr><td style="font-size:14px;text-align:left">
                                                                                                <p style="text-align: right">
                                                                                                    <span style="font-size:12pt;font-family:arial,sans-serif; ">Last Name:</span></p></td>
                                                                                            <td width="185">
                                                                                                <input id="last" name="last" style="width:162; height:30; font-size:14pt" type="text" size="15"></td></tr>
                                                                                        <tr>
                                                                                            <td style="font-size:14px;text-align:left">
                                                                                                <p style="text-align: right">
                                                                                                    <font size="3">
                                                                                                    <span style="font-family: arial,sans-serif">Email</span></font><span style="font-size:12pt;font-family:arial,sans-serif; "> 
                                                                                                        Address:</span></p></td>
                                                                                            <td width="185">
                                                                                                <input id="email" name="email" style="width:162; height:30
                                                                                                       ; font-size:14pt" type="text" size="15"></td>
                                                                                        </tr>
                                                                                        <tr><td style="font-size:14px;color:#000000" align="center">
                                                                                                <p align="right"><font size="3">
                                                                                                    <span style="font-family: arial,sans-serif">Company</span></font><span style="font-size:12pt;font-family:arial,sans-serif; ">:</span></p></td>
                                                                                            <td align="center">
                                                                                                <p align="center">
                                                                                                    <input id="userDefine1" name="userDefine1" style="width:162; font-size:14pt; height:30; float:left" size="15" "=""></p></td>
                                                                                        </tr>
                                                                                        <tr><td style="font-size:14px;color:#000000" align="center">
                                                                                                <p align="right"><font size="3">
                                                                                                    <span style="font-family: arial,sans-serif">Notes</span></font><span style="font-size:12pt;font-family:arial,sans-serif; ">:</span></p></td>
                                                                                            <td align="center">
                                                                                                <p align="center">
                                                                                                    <input id="userDefine2" name="userDefine2" style="width:162; font-size:14pt; height:30; float:left" size="15" "=""></p></td>

                                                                                        </tr></tbody></table>
                                                                            </div>
                                                                            <div align="right">
                                                                                <table cellpadding="0" width="262"><tbody><tr>
                                                                                            <td style="text-align:left" width="240">
                                                                                                <p style="text-align: right">
                                                                                                    <input id="submitButton" value="TEXT vCARD" type="submit" style="color:#FFFFFF;background-color:#7c7a79;border-color:#ffffff;font-size:14pt;line-height:1.33;border-radius:6px; float:right; padding-left:1px; padding-right:1px; padding-top:2px; padding-bottom:2px"><br>
                                                                                                    &nbsp; </p></td></tr></tbody></table>
                                                                                <p style="text-align: center"><font face="Arial">*The recipient 
                                                                                    will need to reply "YES" to receive the Mobile vCard.</font></p></div>
                                                                            <input type="hidden" id="sc" name="sc" value="lillyo1optin (76626)"><input type="hidden" id="ev" name="ev" value="send"><input type="hidden" id="ac" name="ac" value="7"><input type="hidden" id="me" name="me" value="MobileWebPage"><input type="hidden" id="forwardLink" name="forwardLink" value="http://m.mvcard.me/lilly_sharevcard"></form></div>
                                                                </td>
                                                            </tr>
                                                        </tbody></table>
                                                </div>




                                            </div> 
                                        </ul>
                                    </li>

                                    <ul class="inner">

                                        <div class="block-content clearfix collapsible-content" style="display: block;">               





                                            <div align="center">
                                                <table border="0" width="15%" cellpadding="0" style="border-collapse: collapse" height="175" bordercolor="#666666">
                                                    <tbody><tr>
                                                            <td align="center" valign="top"><div style="background-color: #FFFFFF"> <form id="sendForm" action="http://login.mobiletivity.com/fbAPI" method="post" target="_self">
                                                                        <div align="center">
                                                                            &nbsp;<table cellpadding="0" cellspacing="4" height="99" width="290"><tbody><tr>
                                                                                        <td style="font-size:14px;text-align:left" nowrap="nowrap" width="93">
                                                                                            <p style="text-align: right">
                                                                                                <font color="#FF0000">*</font><span style="font-size:12pt;font-family:arial,sans-serif; ">Mobile #:</span></p></td>
                                                                                        <td width="185">
                                                                                            <input id="mN" name="mN" style="width:162; height:30; font-size:14pt" type="tel" size="15"></td></tr><tr><td style="font-size:14px;text-align:left">
                                                                                            <p style="text-align: right">
                                                                                                <font color="#FF0000">*</font><span style="font-size:12pt;font-family:arial,sans-serif; ">First 
                                                                                                    Name:</span></p></td>
                                                                                        <td width="185">
                                                                                            <input id="first" name="first" style="width:162; height:30; font-size:14pt" type="text" size="15"></td></tr><tr><td style="font-size:14px;text-align:left">
                                                                                            <p style="text-align: right">
                                                                                                <span style="font-size:12pt;font-family:arial,sans-serif; ">Last Name:</span></p></td>
                                                                                        <td width="185">
                                                                                            <input id="last" name="last" style="width:162; height:30; font-size:14pt" type="text" size="15"></td></tr>
                                                                                    <tr>
                                                                                        <td style="font-size:14px;text-align:left">
                                                                                            <p style="text-align: right">
                                                                                                <font size="3">
                                                                                                <span style="font-family: arial,sans-serif">Email</span></font><span style="font-size:12pt;font-family:arial,sans-serif; "> 
                                                                                                    Address:</span></p></td>
                                                                                        <td width="185">
                                                                                            <input id="email" name="email" style="width:162; height:30
                                                                                                   ; font-size:14pt" type="text" size="15"></td>
                                                                                    </tr>
                                                                                    <tr><td style="font-size:14px;color:#000000" align="center">
                                                                                            <p align="right"><font size="3">
                                                                                                <span style="font-family: arial,sans-serif">Company</span></font><span style="font-size:12pt;font-family:arial,sans-serif; ">:</span></p></td>
                                                                                        <td align="center">
                                                                                            <p align="center">
                                                                                                <input id="userDefine1" name="userDefine1" style="width:162; font-size:14pt; height:30; float:left" size="15" "=""></p></td>
                                                                                    </tr>
                                                                                    <tr><td style="font-size:14px;color:#000000" align="center">
                                                                                            <p align="right"><font size="3">
                                                                                                <span style="font-family: arial,sans-serif">Notes</span></font><span style="font-size:12pt;font-family:arial,sans-serif; ">:</span></p></td>
                                                                                        <td align="center">
                                                                                            <p align="center">
                                                                                                <input id="userDefine2" name="userDefine2" style="width:162; font-size:14pt; height:30; float:left" size="15" "=""></p></td>

                                                                                    </tr></tbody></table>
                                                                        </div>
                                                                        <div align="right">
                                                                            <table cellpadding="0" width="262"><tbody><tr>
                                                                                        <td style="text-align:left" width="240">
                                                                                            <p style="text-align: right">
                                                                                                <input id="submitButton" value="TEXT vCARD" type="submit" style="color:#FFFFFF;background-color:#7c7a79;border-color:#ffffff;font-size:14pt;line-height:1.33;border-radius:6px; float:right; padding-left:1px; padding-right:1px; padding-top:2px; padding-bottom:2px"><br>
                                                                                                &nbsp; </p></td></tr></tbody></table>
                                                                            <p style="text-align: center"><font face="Arial">*The recipient 
                                                                                will need to reply "YES" to receive the Mobile vCard.</font></p></div>
                                                                        <input type="hidden" id="sc" name="sc" value="lillyo1optin (76626)"><input type="hidden" id="ev" name="ev" value="send"><input type="hidden" id="ac" name="ac" value="7"><input type="hidden" id="me" name="me" value="MobileWebPage"><input type="hidden" id="forwardLink" name="forwardLink" value="http://m.mvcard.me/lilly_sharevcard"></form></div>
                                                            </td>
                                                        </tr>
                                                    </tbody></table>
                                            </div>




                                        </div> 
                                    </ul>
                                    </li>
                                    <li>
                                        <a class="toggle" href="javascript:void(0);">Clients</a>

                                        <ul class="inner">

                                            <div class="block-content clearfix collapsible-content" style="display: block;">               





                                                <div align="center">
                                                    <table border="0" width="15%" cellpadding="0" style="border-collapse: collapse" height="175" bordercolor="#666666">
                                                        <tbody><tr>
                                                                <td align="center" valign="top"><div style="background-color: #FFFFFF"> <form id="sendForm" action="http://login.mobiletivity.com/fbAPI" method="post" target="_self">
                                                                            <div align="center">
                                                                                &nbsp;<table cellpadding="0" cellspacing="4" height="99" width="290"><tbody><tr>
                                                                                            <td style="font-size:14px;text-align:left" nowrap="nowrap" width="93">
                                                                                                <p style="text-align: right">
                                                                                                    <font color="#FF0000">*</font><span style="font-size:12pt;font-family:arial,sans-serif; ">Mobile #:</span></p></td>
                                                                                            <td width="185">
                                                                                                <input id="mN" name="mN" style="width:162; height:30; font-size:14pt" type="tel" size="15"></td></tr><tr><td style="font-size:14px;text-align:left">
                                                                                                <p style="text-align: right">
                                                                                                    <font color="#FF0000">*</font><span style="font-size:12pt;font-family:arial,sans-serif; ">First 
                                                                                                        Name:</span></p></td>
                                                                                            <td width="185">
                                                                                                <input id="first" name="first" style="width:162; height:30; font-size:14pt" type="text" size="15"></td></tr><tr><td style="font-size:14px;text-align:left">
                                                                                                <p style="text-align: right">
                                                                                                    <span style="font-size:12pt;font-family:arial,sans-serif; ">Last Name:</span></p></td>
                                                                                            <td width="185">
                                                                                                <input id="last" name="last" style="width:162; height:30; font-size:14pt" type="text" size="15"></td></tr>
                                                                                        <tr>
                                                                                            <td style="font-size:14px;text-align:left">
                                                                                                <p style="text-align: right">
                                                                                                    <font size="3">
                                                                                                    <span style="font-family: arial,sans-serif">Email</span></font><span style="font-size:12pt;font-family:arial,sans-serif; "> 
                                                                                                        Address:</span></p></td>
                                                                                            <td width="185">
                                                                                                <input id="email" name="email" style="width:162; height:30
                                                                                                       ; font-size:14pt" type="text" size="15"></td>
                                                                                        </tr>
                                                                                        <tr><td style="font-size:14px;color:#000000" align="center">
                                                                                                <p align="right"><font size="3">
                                                                                                    <span style="font-family: arial,sans-serif">Company</span></font><span style="font-size:12pt;font-family:arial,sans-serif; ">:</span></p></td>
                                                                                            <td align="center">
                                                                                                <p align="center">
                                                                                                    <input id="userDefine1" name="userDefine1" style="width:162; font-size:14pt; height:30; float:left" size="15" "=""></p></td>
                                                                                        </tr>
                                                                                        <tr><td style="font-size:14px;color:#000000" align="center">
                                                                                                <p align="right"><font size="3">
                                                                                                    <span style="font-family: arial,sans-serif">Notes</span></font><span style="font-size:12pt;font-family:arial,sans-serif; ">:</span></p></td>
                                                                                            <td align="center">
                                                                                                <p align="center">
                                                                                                    <input id="userDefine2" name="userDefine2" style="width:162; font-size:14pt; height:30; float:left" size="15" "=""></p></td>

                                                                                        </tr></tbody></table>
                                                                            </div>
                                                                            <div align="right">
                                                                                <table cellpadding="0" width="262"><tbody><tr>
                                                                                            <td style="text-align:left" width="240">
                                                                                                <p style="text-align: right">
                                                                                                    <input id="submitButton" value="TEXT vCARD" type="submit" style="color:#FFFFFF;background-color:#7c7a79;border-color:#ffffff;font-size:14pt;line-height:1.33;border-radius:6px; float:right; padding-left:1px; padding-right:1px; padding-top:2px; padding-bottom:2px"><br>
                                                                                                    &nbsp; </p></td></tr></tbody></table>
                                                                                <p style="text-align: center"><font face="Arial">*The recipient 
                                                                                    will need to reply "YES" to receive the Mobile vCard.</font></p></div>
                                                                            <input type="hidden" id="sc" name="sc" value="lillyo1optin (76626)"><input type="hidden" id="ev" name="ev" value="send"><input type="hidden" id="ac" name="ac" value="7"><input type="hidden" id="me" name="me" value="MobileWebPage"><input type="hidden" id="forwardLink" name="forwardLink" value="http://m.mvcard.me/lilly_sharevcard"></form></div>
                                                                </td>
                                                            </tr>
                                                        </tbody></table>
                                                </div>




                                            </div>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="toggle" href="javascript:void(0);">Team Members</a>

                                        <ul class="inner">

                                            <div class="block-content clearfix collapsible-content" style="display: block;">               





                                                <div align="center">
                                                    <table border="0" width="15%" cellpadding="0" style="border-collapse: collapse" height="175" bordercolor="#666666">
                                                        <tbody><tr>
                                                                <td align="center" valign="top"><div style="background-color: #FFFFFF"> <form id="sendForm" action="http://login.mobiletivity.com/fbAPI" method="post" target="_self">
                                                                            <div align="center">
                                                                                &nbsp;<table cellpadding="0" cellspacing="4" height="99" width="290"><tbody><tr>
                                                                                            <td style="font-size:14px;text-align:left" nowrap="nowrap" width="93">
                                                                                                <p style="text-align: right">
                                                                                                    <font color="#FF0000">*</font><span style="font-size:12pt;font-family:arial,sans-serif; ">Mobile #:</span></p></td>
                                                                                            <td width="185">
                                                                                                <input id="mN" name="mN" style="width:162; height:30; font-size:14pt" type="tel" size="15"></td></tr><tr><td style="font-size:14px;text-align:left">
                                                                                                <p style="text-align: right">
                                                                                                    <font color="#FF0000">*</font><span style="font-size:12pt;font-family:arial,sans-serif; ">First 
                                                                                                        Name:</span></p></td>
                                                                                            <td width="185">
                                                                                                <input id="first" name="first" style="width:162; height:30; font-size:14pt" type="text" size="15"></td></tr><tr><td style="font-size:14px;text-align:left">
                                                                                                <p style="text-align: right">
                                                                                                    <span style="font-size:12pt;font-family:arial,sans-serif; ">Last Name:</span></p></td>
                                                                                            <td width="185">
                                                                                                <input id="last" name="last" style="width:162; height:30; font-size:14pt" type="text" size="15"></td></tr>
                                                                                        <tr>
                                                                                            <td style="font-size:14px;text-align:left">
                                                                                                <p style="text-align: right">
                                                                                                    <font size="3">
                                                                                                    <span style="font-family: arial,sans-serif">Email</span></font><span style="font-size:12pt;font-family:arial,sans-serif; "> 
                                                                                                        Address:</span></p></td>
                                                                                            <td width="185">
                                                                                                <input id="email" name="email" style="width:162; height:30
                                                                                                       ; font-size:14pt" type="text" size="15"></td>
                                                                                        </tr>
                                                                                        <tr><td style="font-size:14px;color:#000000" align="center">
                                                                                                <p align="right"><font size="3">
                                                                                                    <span style="font-family: arial,sans-serif">Company</span></font><span style="font-size:12pt;font-family:arial,sans-serif; ">:</span></p></td>
                                                                                            <td align="center">
                                                                                                <p align="center">
                                                                                                    <input id="userDefine1" name="userDefine1" style="width:162; font-size:14pt; height:30; float:left" size="15" "=""></p></td>
                                                                                        </tr>
                                                                                        <tr><td style="font-size:14px;color:#000000" align="center">
                                                                                                <p align="right"><font size="3">
                                                                                                    <span style="font-family: arial,sans-serif">Notes</span></font><span style="font-size:12pt;font-family:arial,sans-serif; ">:</span></p></td>
                                                                                            <td align="center">
                                                                                                <p align="center">
                                                                                                    <input id="userDefine2" name="userDefine2" style="width:162; font-size:14pt; height:30; float:left" size="15" "=""></p></td>

                                                                                        </tr></tbody></table>
                                                                            </div>
                                                                            <div align="right">
                                                                                <table cellpadding="0" width="262"><tbody><tr>
                                                                                            <td style="text-align:left" width="240">
                                                                                                <p style="text-align: right">
                                                                                                    <input id="submitButton" value="TEXT vCARD" type="submit" style="color:#FFFFFF;background-color:#7c7a79;border-color:#ffffff;font-size:14pt;line-height:1.33;border-radius:6px; float:right; padding-left:1px; padding-right:1px; padding-top:2px; padding-bottom:2px"><br>
                                                                                                    &nbsp; </p></td></tr></tbody></table>
                                                                                <p style="text-align: center"><font face="Arial">*The recipient 
                                                                                    will need to reply "YES" to receive the Mobile vCard.</font></p></div>
                                                                            <input type="hidden" id="sc" name="sc" value="lillyo1optin (76626)"><input type="hidden" id="ev" name="ev" value="send"><input type="hidden" id="ac" name="ac" value="7"><input type="hidden" id="me" name="me" value="MobileWebPage"><input type="hidden" id="forwardLink" name="forwardLink" value="http://m.mvcard.me/lilly_sharevcard"></form></div>
                                                                </td>
                                                            </tr>
                                                        </tbody></table>
                                                </div>




                                            </div> 
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="toggle" href="javascript:void(0);">General/ Other</a>

                                        <ul class="inner">
                                            <div class="block-content clearfix collapsible-content" style="display: block;">               





                                                <div align="center">
                                                    <table border="0" width="15%" cellpadding="0" style="border-collapse: collapse" height="175" bordercolor="#666666">
                                                        <tbody><tr>
                                                                <td align="center" valign="top"><div style="background-color: #FFFFFF"> <form id="sendForm" action="http://login.mobiletivity.com/fbAPI" method="post" target="_self">
                                                                            <div align="center">
                                                                                &nbsp;<table cellpadding="0" cellspacing="4" height="99" width="290"><tbody><tr>
                                                                                            <td style="font-size:14px;text-align:left" nowrap="nowrap" width="93">
                                                                                                <p style="text-align: right">
                                                                                                    <font color="#FF0000">*</font><span style="font-size:12pt;font-family:arial,sans-serif; ">Mobile #:</span></p></td>
                                                                                            <td width="185">
                                                                                                <input id="mN" name="mN" style="width:162; height:30; font-size:14pt" type="tel" size="15"></td></tr><tr><td style="font-size:14px;text-align:left">
                                                                                                <p style="text-align: right">
                                                                                                    <font color="#FF0000">*</font><span style="font-size:12pt;font-family:arial,sans-serif; ">First 
                                                                                                        Name:</span></p></td>
                                                                                            <td width="185">
                                                                                                <input id="first" name="first" style="width:162; height:30; font-size:14pt" type="text" size="15"></td></tr><tr><td style="font-size:14px;text-align:left">
                                                                                                <p style="text-align: right">
                                                                                                    <span style="font-size:12pt;font-family:arial,sans-serif; ">Last Name:</span></p></td>
                                                                                            <td width="185">
                                                                                                <input id="last" name="last" style="width:162; height:30; font-size:14pt" type="text" size="15"></td></tr>
                                                                                        <tr>
                                                                                            <td style="font-size:14px;text-align:left">
                                                                                                <p style="text-align: right">
                                                                                                    <font size="3">
                                                                                                    <span style="font-family: arial,sans-serif">Email</span></font><span style="font-size:12pt;font-family:arial,sans-serif; "> 
                                                                                                        Address:</span></p></td>
                                                                                            <td width="185">
                                                                                                <input id="email" name="email" style="width:162; height:30
                                                                                                       ; font-size:14pt" type="text" size="15"></td>
                                                                                        </tr>
                                                                                        <tr><td style="font-size:14px;color:#000000" align="center">
                                                                                                <p align="right"><font size="3">
                                                                                                    <span style="font-family: arial,sans-serif">Company</span></font><span style="font-size:12pt;font-family:arial,sans-serif; ">:</span></p></td>
                                                                                            <td align="center">
                                                                                                <p align="center">
                                                                                                    <input id="userDefine1" name="userDefine1" style="width:162; font-size:14pt; height:30; float:left" size="15" "=""></p></td>
                                                                                        </tr>
                                                                                        <tr><td style="font-size:14px;color:#000000" align="center">
                                                                                                <p align="right"><font size="3">
                                                                                                    <span style="font-family: arial,sans-serif">Notes</span></font><span style="font-size:12pt;font-family:arial,sans-serif; ">:</span></p></td>
                                                                                            <td align="center">
                                                                                                <p align="center">
                                                                                                    <input id="userDefine2" name="userDefine2" style="width:162; font-size:14pt; height:30; float:left" size="15" "=""></p></td>

                                                                                        </tr></tbody></table>
                                                                            </div>
                                                                            <div align="right">
                                                                                <table cellpadding="0" width="262"><tbody><tr>
                                                                                            <td style="text-align:left" width="240">
                                                                                                <p style="text-align: right">
                                                                                                    <input id="submitButton" value="TEXT vCARD" type="submit" style="color:#FFFFFF;background-color:#7c7a79;border-color:#ffffff;font-size:14pt;line-height:1.33;border-radius:6px; float:right; padding-left:1px; padding-right:1px; padding-top:2px; padding-bottom:2px"><br>
                                                                                                    &nbsp; </p></td></tr></tbody></table>
                                                                                <p style="text-align: center"><font face="Arial">*The recipient 
                                                                                    will need to reply "YES" to receive the Mobile vCard.</font></p></div>
                                                                            <input type="hidden" id="sc" name="sc" value="lillyo1optin (76626)"><input type="hidden" id="ev" name="ev" value="send"><input type="hidden" id="ac" name="ac" value="7"><input type="hidden" id="me" name="me" value="MobileWebPage"><input type="hidden" id="forwardLink" name="forwardLink" value="http://m.mvcard.me/lilly_sharevcard"></form></div>
                                                                </td>
                                                            </tr>
                                                        </tbody></table>
                                                </div>




                                            </div>

                                        </ul>
                                    </li>





                                </ul>
                            </span></div>

                        <h3><span class="pad10">Other Options</span></h3>
                        <div><span class="pad10">

                                <ul class="accordion">


                                    <li>
                                        <a class="toggle" href="javascript:void(0);">Share From Your Phone</a>

                                        <ul class="inner">

                                            <div class="block-content clearfix collapsible-content" style="display: block;">               





                                                <div align="center">
                                                    <div align="center">
                                                        <table border="0" width="96%" cellspacing="0" cellpadding="4">
                                                            <tbody><tr>
                                                                    <td align="center" valign="top">
                                                                        <p align="left">
                                                                            <font face="Arial" style="font-size: 13pt">You can share this 
                                                                            vCard directly with people on your phone's contact list.</font></p><p align="left">
                                                                            <font face="Arial" style="font-size: 13pt">Choose 
                                                                            the phone that you are sending from:</font></p><p align="left">
                                                                            <span style="font-weight: 700">
                                                                                <font face="Arial" style="font-size: 13pt">&nbsp;&nbsp;
                                                                                <a href="sms:&body=Check out my Mobile vCard <?php echo base_url().$data['0']['slug']?>">Text 
                                                                                    From iPhone</a></font></span></p><p align="left">
                                                                            <span style="font-weight: 700">
                                                                                <font face="Arial" style="font-size: 13pt">&nbsp;&nbsp;
                                                                                <a href="sms:&body=Check out my Mobile vCard <?php echo base_url().$data['0']['slug']?>">Text 
                                                                                    From Android</a></font></span></p><p align="left">
                                                                            <span style="font-weight: 700">
                                                                                <font face="Arial" style="font-size: 13pt">&nbsp;&nbsp;
                                                                                <a href="sms:&body=Check out my Mobile vCard <?php echo base_url().$data['0']['slug']?>">
                                                                                    Text From Windows</a></font></span></p><p align="left">
                                                                            <span style="font-weight: 700">
                                                                                <font face="Arial" style="font-size: 13pt">Note: </font></span>
                                                                            <font face="Arial" style="font-size: 13pt">You can also use this 
                                                                            option when the recipient's phone is blocked from receiving a 
                                                                            text from a short code (5-digit number)</font></p></td>
                                                                </tr>
                                                            </tbody></table>
                                                    </div></div>




                                            </div>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="toggle" href="javascript:void(0);">Share by Email</a>

                                        <ul class="inner">

                                            <div class="block-content clearfix collapsible-content" style="display: block;">               





                                                <div align="center">
                                                    <div align="center">
                                                        <table border="0" width="96%" cellspacing="0" cellpadding="4">
                                                            <tbody><tr>
                                                                    <td align="center" valign="top">
                                                                        <p align="left">
                                                                            <font face="Arial" style="font-size: 13pt">Prefer to share this 
                                                                            vCard by email? Click link below.</font></p><p align="left">
                                                                            <font face="Arial" style="font-size: 13pt; font-weight: 700">
                                                                            <a class="email_link" target="_blank" href="mailto:?subject=<?php echo $data[0]['first_name']." ".$data[0]['last_name']?> Mobile vcard&amp;body=Hi there, Check out my Mobile vCard <?php echo base_url().$data['0']['slug']?>">Share By Email</a></font></p></td>
                                                                </tr>
                                                            </tbody></table>
                                                    </div></div>




                                            </div> 
                                        </ul>
                                    </li>

                                    <ul class="inner">

                                        <div class="block-content clearfix collapsible-content" style="display: block;">               





                                            <div align="center">
                                                <div align="center">
                                                    <table border="0" width="96%" cellspacing="0" cellpadding="4">
                                                        <tbody><tr>
                                                                <td align="center" valign="top">
                                                                    <p align="left">
                                                                        <font face="Arial" style="font-size: 13pt">You can also COPY and 
                                                                        PASTE this vCard link to share:</font></p><p align="left">
                                                                        <font style="font-size: 13pt; font-weight:700" face="Arial"> 
                                                                        <a target="_blank" href="http://m.mvcard.me/lilly">http://m.mvcard.me/lilly</a></font></p></td></tr>
                                                        </tbody></table>
                                                </div></div>




                                        </div>
                                    </ul>
                                    </li>
                                    <li>
                                        <a class="toggle" href="javascript:void(0);">Copy vCard Link</a>

                                        <ul class="inner">

                                            <div class="block-content clearfix collapsible-content" style="display: block;">               





                                                <div align="center">
                                                    <div align="center">
                                                        <table border="0" width="96%" cellspacing="0" cellpadding="4">
                                                            <tbody><tr>
                                                                    <td align="center" valign="top">
                                                                        <p align="left">
                                                                            <font face="Arial" style="font-size: 13pt">You can also COPY and 
                                                                            PASTE this vCard link to share:</font></p><p align="left">
                                                                            <font style="font-size: 13pt; font-weight:700" face="Arial"> 
                                                                            <a target="_blank" href="<?php echo base_url().$data[0]['slug']?>"><?php echo base_url().$data[0]['slug']?></a></font></p></td></tr>
                                                            </tbody></table>
                                                    </div></div>




                                            </div>
                                        </ul>
                                    </li>






                                </ul>
                            </span></div>

                    </div>

                </div>

                <div id="" row-id="17" row-reusable-id="" elements-width-medium="" elements-width-mobile="" class="row-outer clearfix u_0293739545">

                    <div class="row-inner clearfix">
                        <div id="" container-id="19" elements-width-medium="" elements-width-mobile="" class="container clearfix u_6535191716">

                            <div class="container-content">


                                <div id="" snippet-id="27" allow-user-edit="false" snippet-type="Text" snippet-reusable-id="" class="block clearfix u_7297998338 text">
                                    <div class="block-content clearfix">               

                                        <div class="text-box">
                                            <p style="text-align: center;"><a href="<?php echo base_url() . $data[0]['slug'] ?>"><span style="color:#a7b5ac;"><span style="font-size: 23px;"><strong>Return to vCard</strong></span></span></a></p>

                                        </div> 
                                    </div>          
                                </div><!--endsnippet-id="27"-->

                            </div>
                        </div><!--endcontainer-id="19"-->
                    </div>
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
                                    // window.location.href = "payment"
                                } else {
                                    $(".error").html(data.msg);
                                }
                            }
                        });
                        e.preventDefault();
                    });
                </script>

                </body>
                <div id="https-redirect-wrapper"></div>
                </html>