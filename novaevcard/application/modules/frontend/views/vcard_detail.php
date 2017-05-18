<!DOCTYPE html>
<html lang="en" manifest="website.manifest" itemscope itemtype="http://schema.org/Person">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<title>PaasPort</title>

<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="msapplication-tap-highlight" content="no" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0" />
<meta name="mobileoptimized" content="0" />
<meta name="format-detection" content="telephone=no">

<link rel="stylesheet" href="<?php echo asset_url(); ?>vcard_detail/css/styling.css" />
<link rel="stylesheet" href="<?php echo asset_url(); ?>vcard_detail/css/client.css" />
<link rel="stylesheet" href="<?php echo asset_url(); ?>vcard_detail/css/materialize.css" />
<link rel="stylesheet" href="<?php echo asset_url(); ?>vcard_detail/css/material-design-iconic-font.min.css" />
<link rel="stylesheet" href="<?php echo asset_url(); ?>vcard_detail/css/jquery.mCustomScrollbar.min.css" />

<script type="text/javascript" src="<?php echo asset_url(); ?>vcard_detail/javascript/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo asset_url(); ?>vcard_detail/javascript/libraries.js"></script>
<script type="text/javascript" src="<?php echo asset_url(); ?>vcard_detail/javascript/materialize.js"></script>
<script type="text/javascript" src="<?php echo asset_url(); ?>vcard_detail/javascript/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="<?php echo asset_url(); ?>vcard_detail/javascript/jquery.mCustomScrollbar.js"></script>

<script>
		(function($){
			$(window).on("load",function(){
				
				$("#content-1").mCustomScrollbar({
					theme:"minimal"
				});
				
			});
		})(jQuery);
</script>

<script type="text/javascript" src="<?php echo asset_url(); ?>vcard_detail/javascript/unique.js"></script>
<style type="text/css">
    @media screen and (-ms-high-contrast: active),
    (-ms-high-contrast: none) {
        body.popup .body {}.group .group_header table .group_header_expandable .icon_menu,
        .group .group_header table .group_header_info .icon_menu {
            margin-top: -16px;
            margin-left: -14px;
        }
        body.mobile .body>.header TD.button {
            width: auto;
        }
        .body>.header TD.title {}
    }
</style>
<!--[if IE]>
		<style type="text/css">
			/* CSS Tweaks for <= IE9 */
			body.popup .body {
				position: absolute !important;
			}
			.group .group_header table .group_header_expandable .icon_menu,
			.group .group_header table .group_header_info .icon_menu {
				margin-top: -16px;
				margin-left: -14px;
			}
			.body > .header TD.button {
				width: auto;
			}
		</style>
	<![endif]-->
<!--[if lte IE 8]>
		<link rel="stylesheet" href="css/ie.css" /> 
	<![endif]-->
<style type="text/css">
    @-moz-document url-prefix() {
        .group .group_header table .group_header_expandable .icon_menu {
            margin-top: -14px;
            margin-left: -14px;
        }
        #first-time table td div a {
            margin-top: 6px;
        }
        #first-time table td div img+a {
            margin-top: -36px;
        }
    }
</style>
</head>

<body class="ms positionfixed landscape regular card" page="index" accent="warning">

    <!--div class="main menu" style="">
        <ul class="menu">
            <li class="header"><img src="images/logos/one_card.png">
            </li>
            <li class="button"><a target="_blank" href="http://admin.onecardme.com/new.html">Get a Free One Card™<span class="icon_menu enter"></span></a>
            </li>
            <li class="button">
                <a>  
Directory<span class="icon_menu enter"></span>
<span style="display: block;position: absolute;top: 12px;width: 207px;text-align: center;font-size: 20px;color: #1A1919;background-color: rgb(243,243,243);opacity: 0.7;">Coming Soon!</span>
</a>
            </li>
            <li class="button"><a target="_blank" href="http://onecardme.com/home/">About<span class="icon_menu enter"></span></a>
            </li>
            <li class="button"><a target="_blank" href="http://onecardme.com/home/contact/">Help<span class="icon_menu enter"></span></a>
            </li>
            <li class="button"><a target="_blank" href="http://onecardme.com/home/terms-of-services/">Terms of Services<span class="icon_menu enter"></span></a>
            </li>
            <li class="button"><a target="_blank" href="http://admin.onecardme.com">Admin Portal<span class="icon_menu enter"></span></a>
            </li>
            <li class="button refresh"><a onclick="location.reload(true);">Refresh <span id="update-notification"></span><span class="icon_menu refresh"></span></a>
            </li>
            <li class="title" style="padding: 5px 10px;">Powered by QRPro</li>
            <li class="footer" onclick="displayDeviceDetection();">
                One Card™ Version : 3.5.0.012
                <br> OS : <span class="os">Windows</span> : <span class="osversion">10</span>
                <br> Browser : <span class="browser">FirefoxOS</span> : <span class="browserversion">54</span>
                <br> Renderer : <span class="renderer">Gecko</span> : <span class="rendererversion">20100101</span>
            </li>

        </ul>
    </div-->
    <div class="body" id="index">
        <table class="header" style="">
            <tbody>
                <tr>
                    <td class="menu">
                        <a onclick="collapseAllMenus('menu');$(document.body).toggleClass('menu');"> <i class="zmdi zmdi-menu zmdi-hc-3x"></i></a>
                    </td>
                    <td class="button" id="left">
                        <ul>
                            <li><a class="showsave"><i class="zmdi zmdi-download"></i> Save</a>
                            </li>
                        </ul>
                    </td>
                    <td class="title">
                        <div>
                            <div>
                                <div>
                                    <div class="adj"><span id="name"><?php echo $user[0]['first_name'] ?>&nbsp;<?php echo $user[0]['last_name'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="button" id="right" style="">
                        <ul>
                            <li><a class="showshare"><i class="zmdi zmdi-share"></i> Share</a>
                            </li>
                        </ul>
                    </td>
                    <td class="settings" style="display: none;">
                        <a onclick="showAdminMenu('settings');"><span class="icon gear"></span></a>
                    </td>
                    <td class="qrpro">
                        <a href="#" target="_blank"><span class="icon tab-nav "></span></a>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="page " style="height: 619px; min-height: 0px;">
            <table class="banner">
                <tbody>
                    <tr>
                        <td class="banner_image fullWidth" style="" align="center">
                            <div>
                                <div id="banner_slider" class="static image" style="min-height: 220px;">
                                    <div class="slider_image_wrapper">
									<?php 
									
									if(!empty($user[0]['user_image'])) { ?>		
										<img id="profile-image" src="<?php echo base_url().'/'.$user[0]['user_image']; ?>" class="img" data-width="213" data-height="213" style="width: 200px; height: auto; display: inline;">
									<?php }else{ ?>
									<img id="profile-image" src="<?php echo asset_url(); ?>vcard_detail/images/profile.png" class="img" data-width="213" data-height="213" style="width: 200px; height: auto; display: inline;">
									<?php } ?>
								   </div>
                                </div>
                            </div>
                            <a class="video" style="display: inline-block;">Welcome Video</a>
                        </td>
                        <td class="banner_nav">

                            <div class="banner_nav_1" style=""><a href="index.html"><span class="icon_button z-depth-4"><i class="zmdi zmdi-account-box-phone zmdi-hc-4x" style="margin-top: 12px;"></i></span><span class="icon_title">Contact</span></a>
                            </div>
                            <div class="banner_nav_3"><a href="social.html"><span class="icon_button z-depth-4"><i class="zmdi zmdi-comments zmdi-hc-4x" style="margin-top: 12px;"></i></span><span class="icon_title">Social</span></a>
                            </div>
                            <div class="banner_nav_2"><a href="bio.html"><span class="icon_button z-depth-4"><i class="zmdi zmdi-account-box-o zmdi-hc-4x" style="margin-top: 12px;"></i></span><span class="icon_title">About</span></a>
                            </div>
                            <div class="banner_nav_4"><a href="info.html"><span class="icon_button z-depth-4"><i class="zmdi zmdi-alert-circle-o zmdi-hc-4x" style="margin-top: 12px;"></i></span><span class="icon_title">Info</span></a>
                            </div>

                        </td>

                    </tr>
                    <tr>
                        <td class="banner_icon" colspan="1" style="display: table-cell;"><img class="img" src="<?php echo asset_url(); ?>vcard_detail/images/profile.png">
                        </td>
                        <td class="banner_name" colspan="7" style="">
                            <div id="name" class="adj" style="width: 100px;"><span style="font-size: 28px;text-align:center"><?php echo $user[0]['first_name'] ?>&nbsp;<?php echo $user[0]['last_name'] ?></span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="grid" style="min-height: 0px;">
                <div id="pattern" class="pattern" style="opacity: 1;">
                    <div class="first"></div>
                    <div class="second"></div>
                    <div class="third"></div>
                </div>
                <table class="grid_title">
                    <tbody>
                        <tr>
                            <td class="menu">
                                <a onclick="toggleGridMenu();"><span class="icon menu"></span></a>
                            </td>
                            <td class="arrow-l">
                                <a onclick="expandPreviousSection();"><i class="zmdi zmdi-caret-left-circle zmdi-hc-2x" style="margin-top: 4px;"></i></a>
                            </td>
                            <td class="title">
                                <div class="adj" style="width: 1280px;"><span id="name" style="font-size: 23px;">Primary Information</span>
                                </div>
                            </td>
                            <td class="arrow-r">
                                <a onclick="expandNextSection();"><i class="zmdi zmdi-caret-right-circle zmdi-hc-2x" style="margin-top: 4px;"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="gn grid_nav ms rs content mCustomScrollbar" data-mcs-theme="minimal-dark" style="height: 395px;padding-bottom:40px;">
                    <div class="grid_nav_scroller">
                        <div id="0" class="group expanded" data-type="General">
                            <div class="group_header z-depth-2">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="group_header_expandable"><a onclick="expandSection('0');"><span class="icon_menu plus"></span></a>
                                            </td>
                                            <td class="group_header_title">
                                                <a onclick="expandSection('0');">
                                                    <div class="adj name" style="width: 386px;"><span style="font-size: 18px;">Primary Information</span>
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="collapsible-content">
                                <div style="white-space: nowrap;" class="company-details"><a onclick="playVideo('-O8BdydwwMo', 'youtube');">Tap to Watch Welcome Video</a>
                                </div>
                                <div class="detail-group">
                                    <div class="video-frame" style="margin: 10px;">
                                        <div class="iframeScreen"></div>
                                        <iframe class="video-embeded" src="" alt="http://www.youtube.com/embed/-O8BdydwwMo?rel=0&amp;wmode=transparent" wmode="Opaque" scrolling="no" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" style="width: 0px; height: 0px;" width="0px" height="0px" frameborder="0"></iframe>
                                    </div>
                                </div>
                                <div class="sortable-group"><a href="javascript:numberCallOrSMS('4171234567');" class="contact" data-key="40" data-type="Number" data-sortable="contacts"><span class="icon_contact cellphone"></span><div class="number"><div style="float:left;">123(417) 123-4567&nbsp;</div><div class="adj note" style="width: 0px;"><span style="font-size: 14px;"></span></div></div></a><a href="tel:1234567890" class="contact" data-key="749" data-type="Number" data-sortable="contacts"><span class="icon_contact facetime"></span><div class="number"><div style="float:left;">(123) 456-7890&nbsp;</div><div class="adj note" style="width: 0px;"><span style="font-size: 14px;">&nbsp;</span></div></div></a>
                                </div>
                            </div>
                        </div>
                        <div id="10" class="group collapsed" data-type="Company" data-sortable="groups">
                            <div class="group_header z-depth-2">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="group_header_expandable"><a onclick="expandSection('10');"><span class="icon_menu plus"></span></a>
                                            </td>
                                            <td class="group_header_title">
                                                <a onclick="expandSection('10');">
                                                    <div class="adj name" style="width: 386px;"><span style="font-size: 18px;">Company details</span>
                                                    </div>
                                                    <div class="job_title"><span><?php echo ($user[0]['job_title'])?$user[0]['job_title']:''; ?> </span>
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="group_header_info"><a onclick="showContactDetails('10', false);"><i class="zmdi zmdi-alert-circle"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="collapsible-content">
                                <div style="white-space: nowrap;" class="company-details"><a style="width: 50%;" class="showvideo">Tap to<br>Watch Commercial</a><a style="width: 50%;" onclick="showContactDetails('10', false);">Tap to<br>view details</a>
                                </div>
                                <div class="detail-group">
								
                                    <div style="margin: 10px; background-color: #BCBEC0;"><img src="<?php echo asset_url(); ?>vcard_detail/images/banner.png">
                                    </div>
                                    <div class="detail"><b>Title</b> : Sales Rep laptop</div>
                                    <div class="detail"><b>Start Date</b> : 9/2011
                                        <br>
                                    </div>
                                    <div class="detail"><b>Hours</b> : Monday - Friday (9am-7pm CST)</div>
                                    <div class="detail description">
                                        <p> World's largest office products company-providing office supplies, technology products and services, ink &amp; toner, Copy &amp; Print services and UPS shipping. Computer workstations available to rent.</p>
                                    </div>
                                </div>
                                <div onclick="showContactDetails('10', false);" class="company-logo"><img src="<?php echo asset_url(); ?>vcard_detail/mages/banner.png">
                                </div>
                                <div class="sortable-group">
                                    <div class="video-frame" style="margin: 10px;">
                                        <div class="iframeScreen"></div>
                                        <iframe class="video-embeded" src="" alt="http://www.youtube.com/embed/BBAOpGGKTt0?rel=0&amp;wmode=transparent" wmode="Opaque" scrolling="no" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" style="width: 0px; height: 0px;" width="0px" height="0px" frameborder="0"></iframe>
                                    </div><a href="tel:1234567890" class="contact" data-key="53" data-type="Number" data-sortable="contacts"><span class="icon_contact landline"></span><div class="number"><div style="float:left;">12 (123) 456-7890&nbsp;</div><div class="adj note" style="width: 0px;"><span style="font-size: 14px;">&nbsp;</span></div></div></a><a href="tel:1234567899" class="contact" data-key="54" data-type="Number" data-sortable="contacts"><span class="icon_contact fax"></span><div class="number"><div style="float:left;">(123) 456-7899&nbsp;</div><div class="adj note" style="width: 0px;"><span style="font-size: 14px;">&nbsp;</span></div></div></a><a href="mailto:support@staples.com" class="contact" data-key="24" data-type="Email" data-sortable="contacts"><span class="icon_contact email"></span><div class="email"><div class="adj" style="width: 0px;"><span style="font-size: 16px;">support@staples.com</span></div></div></a><a href="http://onecardme.com/home/" target="_blank" class="contact" data-key="931" data-type="URL" data-sortable="contacts"><span class="icon_contact safari"></span><div class="url"><div class="adj" ><span style="font-size: 16px;">Visit Web Page</span></div></div></a>
                                </div>
                            </div>
                        </div>
                        <div id="448" class="group collapsed" data-type="Company" data-sortable="groups">
                            <div class="group_header z-depth-2">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="group_header_expandable"><a onclick="expandSection('448');"><span class="icon_menu plus"></span></a>
                                            </td>
                                            <td class="group_header_title">
                                                <a onclick="expandSection('448');">
                                                    <div class="adj name" style="width: 386px;"><span style="font-size: 18px;">One Card™</span>
                                                    </div>
                                                    <div class="job_title"><span>Sales Rep</span>
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="group_header_info"><a onclick="showContactDetails('448', false);"><span class="icon_menu info"></span></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="collapsible-content">
                                <div style="white-space: nowrap;" class="company-details"><a style="width: 50%;" onclick="playVideo('R00QMJ2zgAo', 'youtube');">Tap to<br>Watch Commercial</a><a style="width: 50%;" onclick="showContactDetails('448', false);">Tap to<br>view details</a>
                                </div>
                                <div class="detail-group">
                                    <div style="margin: 10px; background-color: #BCBEC0;"><img src="<?php echo asset_url(); ?>vcard_detail/images/silo.png">
                                    </div>
                                    <div class="detail"><b>Title</b> : Sales Rep</div>
                                    <div class="detail"><b>Hours</b> : Monday - Friday (9am-7pm CST)</div>
                                    <div class="detail description">
                                        <p> One Card™ is the standard for digital business cards. It creates a digital hub where your customers can pick and choose how they connect with you. For example, you can list your standard contact information, a video introduction, a bio telling a little more about yourself, all of your social networks in one place and an info center, which allows you to create a digital brochure.</p>
                                    </div>
                                </div>
                                <div onclick="showContactDetails('448', false);" class="company-logo"><img src="http://onecardme.com/files/demo/images/one_card_powered_by_qrpro_logo.png?time=1494569508472">
                                </div>
                                <div class="sortable-group">
                                    <div class="video-frame" style="margin: 10px;">
                                        <div class="iframeScreen"></div>
                                        <iframe class="video-embeded" src="" alt="http://www.youtube.com/embed/R00QMJ2zgAo?rel=0&amp;wmode=transparent" wmode="Opaque" scrolling="no" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" style="width: 0px; height: 0px;" width="0px" height="0px" frameborder="0"></iframe>
                                    </div><a href="tel:4178930073" class="contact" data-key="1131" data-type="Number" data-sortable="contacts"><span class="icon_contact landline"></span><div class="number"><div style="float:left;">(417) 893-0073&nbsp;</div><div class="adj note" style="width: 0px;"><span style="font-size: 14px;">&nbsp;</span></div></div></a><a href="mailto:contact@onecardme.com" class="contact" data-key="439" data-type="Email" data-sortable="contacts"><span class="icon_contact email"></span><div class="email"><div class="adj" style="width: 0px;"><span style="font-size: 16px;">contact@onecardme.com</span></div></div></a>
                                </div>
                            </div>
                        </div><span class="clear"></span>
                    </div>
                </div>
                <div class="grid_content rs content mCustomScrollbar" style="height: 395px;padding-bottom:40px;">
                    <div id="grid_content_scroller" class="grid_content_scroller">
                        <div id="0" class="group expanded" data-type="General">
                            <div class="group_header">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="group_header_expandable"><a onclick="expandSection('0');"><span class="icon_menu plus"></span></a>
                                            </td>
                                            <td class="group_header_title">
                                                <a onclick="expandSection('0');">
                                                    <div class="adj name" style="width: 0px;"><span style="font-size: 18px;">Primary Information</span>
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="collapsible-content">
                                <div style="white-space: nowrap;" class="company-details"><a onclick="playVideo('-O8BdydwwMo', 'youtube');">Tap to Watch Welcome Video</a>
                                </div>
                                <div class="detail-group">
                                    <div class="video-frame" style="margin: 10px;">
                                        <div class="iframeScreen"></div>
                                        <iframe class="video-embeded" src="http://www.youtube.com/embed/-O8BdydwwMo?rel=0&amp;wmode=transparent" alt="http://www.youtube.com/embed/-O8BdydwwMo?rel=0&amp;wmode=transparent" wmode="Opaque" scrolling="no" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" style="width: 408px; height: 244.8px;" width="408px" height="244.79999999999998px" frameborder="0"></iframe>
                                    </div>
                                </div>
                                <div class="sortable-group"><a href="javascript:numberCallOrSMS('4171234567');" class="contact" data-key="40" data-type="Number" data-sortable="contacts"><span class="icon_contact cellphone"></span><div class="number"><div style="float:left;"><?php echo ($user[0]['mobile'])?$user[0]['mobile']:''; ?>&nbsp;</div><div class="adj note" style="width: 348px;"><span style="font-size: 14px;">&nbsp;</span></div></div></a><a href="tel:1234567890" class="contact" data-key="749" data-type="Number" data-sortable="contacts"><span class="icon_contact facetime"></span><div class="number"><div style="float:left;">123(123) 456-7890&nbsp;</div><div class="adj note" style="width: 348px;"><span style="font-size: 14px;">&nbsp;</span></div></div></a>
                                </div>
                            </div>
                        </div>
                        <div id="10" class="group collapsed" data-type="Company" data-sortable="groups">
                            <div class="group_header">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="group_header_expandable"><a onclick="expandSection('10');"><span class="icon_menu plus"></span></a>
                                            </td>
                                            <td class="group_header_title">
                                                <a onclick="expandSection('10');">
                                                    <div class="adj name" style="width: 0px;"><span style="font-size: 18px;">Staples</span>
                                                    </div>
                                                    <div class="job_title"><span>Sales Rep</span>
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="group_header_info"><a onclick="showContactDetails('10', false);"><i class="zmdi zmdi-alert-circle zmdi-hc-2x"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="collapsible-content">
                                <div style="white-space: nowrap;" class="company-details"><a style="width: 50%;" class="showvideo">Tap to<br>Watch Commercial</a><a style="width: 50%;" class="showdetail">Tap to<br>view details</a>
                                </div>
                                <div class="detail-group">
                                    <div style="margin: 10px; background-color: #BCBEC0;"><img src="<?php echo asset_url(); ?>vcard_detail/images/banner.png">
                                    </div>
                                    <div class="detail"><b>Title</b> : Sales Rep</div>
                                    <div class="detail"><b>Start Date</b> : 9/2011
                                        <br>
                                    </div>
                                    <div class="detail"><b>Hours</b> : Monday - Friday (9am-7pm CST)</div>
                                    <div class="detail description">
                                        <p> World's largest office products company-providing office supplies, technology products and services, ink &amp; toner, Copy &amp; Print services and UPS shipping. Computer workstations available to rent.</p>
                                    </div>
                                </div>
                                <div  class="company-logo"><img src="images/banner.png">
                                </div>
                                <div class="sortable-group">
                                    <div class="video-frame" style="margin: 10px;">
                                        <div class="iframeScreen"></div>
                                        <iframe class="video-embeded" src="" alt="" wmode="Opaque" scrolling="no" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" style="width: 0px; height: 0px;" width="0px" height="0px" frameborder="0"></iframe>
                                    </div><a href="tel:1234567890" class="contact" data-key="53" data-type="Number" data-sortable="contacts"><span class="icon_contact landline"></span><div class="number"><div style="float:left;">(123) 456-7890&nbsp;</div><div class="adj note" style="width: 0px;"><span style="font-size: 14px;">&nbsp;</span></div></div></a><a href="tel:1234567899" class="contact" data-key="54" data-type="Number" data-sortable="contacts"><span class="icon_contact fax"></span><div class="number"><div style="float:left;">(123) 456-7899&nbsp;</div><div class="adj note" style="width: 0px;"><span style="font-size: 14px;">&nbsp;</span></div></div></a><a href="mailto:support@staples.com" class="contact" data-key="24" data-type="Email" data-sortable="contacts"><span class="icon_contact email"></span><div class="email"><div class="adj" style="width: 0px;"><span style="font-size: 14px;">support@staples.com</span></div></div></a><a href="http://onecardme.com/home/" target="_blank" class="contact" data-key="931" data-type="URL" data-sortable="contacts"><span class="icon_contact safari"></span><div class="url"><div class="adj"><span style="font-size: 14px;">Visit Web Page</span></div></div></a>
                                </div>
                            </div>
                        </div>
                        <div id="448" class="group collapsed" data-type="Company" data-sortable="groups">
                            <div class="group_header">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="group_header_expandable"><a onclick="expandSection('448');"><span class="icon_menu plus"></span></a>
                                            </td>
                                            <td class="group_header_title">
                                                <a onclick="expandSection('448');">
                                                    <div class="adj name" style="width: 0px;"><span style="font-size: 18px;">One Card™</span>
                                                    </div>
                                                    <div class="job_title"><span>Sales Rep</span>
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="group_header_info"><a onclick="showContactDetails('448', false);"><i class="zmdi zmdi-alert-circle zmdi-hc-2x"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="collapsible-content">
                                <div style="white-space: nowrap;" class="company-details"><a style="width: 50%;" onclick="playVideo('R00QMJ2zgAo', 'youtube');">Tap to<br>Watch Commercial</a><a style="width: 50%;" class="showdetail">Tap to<br>view details</a>
                                </div>
                                <div class="detail-group">
                                    <div style="margin: 10px; background-color: #BCBEC0;"><img src="images/silo.png">
                                    </div>
                                    <div class="detail"><b>Title</b> : Sales Rep</div>
                                    <div class="detail"><b>Hours</b> : Monday - Friday (9am-7pm CST)</div>
                                    <div class="detail description">
                                        <p> One Card™ is the standard for digital business cards. It creates a digital hub where your customers can pick and choose how they connect with you. For example, you can list your standard contact information, a video introduction, a bio telling a little more about yourself, all of your social networks in one place and an info center, which allows you to create a digital brochure.</p>
                                    </div>
                                </div>
                                <div  class="company-logo"><img src="images/silo.png">
                                </div>
                                <div class="sortable-group">
                                    <div class="video-frame" style="margin: 10px;">
                                        <div class="iframeScreen"></div>
                                        <iframe class="video-embeded" src="" alt="http://www.youtube.com/embed/R00QMJ2zgAo?rel=0&amp;wmode=transparent" wmode="Opaque" scrolling="no" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" style="width: 0px; height: 0px;" width="0px" height="0px" frameborder="0"></iframe>
                                    </div><a href="tel:4178930073" class="contact" data-key="1131" data-type="Number" data-sortable="contacts"><span class="icon_contact landline"></span><div class="number"><div style="float:left;">(417) 893-0073&nbsp;</div><div class="adj note" style="width: 0px;"><span style="font-size: 14px;">&nbsp;</span></div></div></a><a href="mailto:contact@onecardme.com" class="contact" data-key="439" data-type="Email" data-sortable="contacts"><span class="icon_contact email"></span><div class="email"><div class="adj" style="width: 0px;"><span style="font-size: 14px;">contact@onecardme.com</span></div></div></a>
                                </div>
                            </div>
                        </div><span class="clear"></span>
                    </div>
                </div>
            </div>
        </div>
        <table class="footer" style="">
            <tbody>
                <tr>
                    <td class="item index"><a href="index.html"><span class="icon zmdi zmdi-account-box-phone zmdi-hc-3x"></span><span class="text">Contact</span></a>
                    </td>
                    <td class="item social"><a href="social.html"><span class="icon zmdi zmdi-comments zmdi-hc-3x"></span><span class="text">Social</span></a>
                    </td>
                    <td class="item bio"><a href="bio.html"><span class="icon zmdi zmdi-account-box-o zmdi-hc-3x"></span><span class="text">About</span></a>
                    </td>
                    <td class="item info"><a href="info.html"><span class="icon zmdi zmdi-alert-circle-o zmdi-hc-3x"></span><span class="text">Info</span></a>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>
    <!--script type="text/javascript">
		//Fires 1st - $(function() { alert('DOM Ready'); });
		//Fires 2nd - $(window).bind("load", function() { alert('Window'); });
		//Fires 3nd - Ajax Request for Card;

		            //Defined Variables in Header
			if( onecard.cardid != null && onecard.cardid != "" ) {
				$('#screen-cover').remove();
			}
		
		onecard.version = "3.5.0.012";		onecard.token = "";
		if(store != null) {
			var lastVersion = store.getFor('version');
			store.set('version', onecard.version);
			if( onecard.admin.isPortal && lastVersion != null && lastVersion != onecard.version ) {
				location.reload(true);
			} else {
				$(function() { BuildApplication(); });
			}
		} 
		else {
			$(function() { BuildApplication(); });
		}
				
		$(window).bind("load", function() { 
		});
	</script>
<img src="analytics/ga.php?utmac=MO-41625440-2&amp;utmn=1228596949&amp;utmr=http%3A%2F%2Fonecardme.com%2Fhome%2F&amp;utmp=%2Findex.html%3Fcardid%3Ddemo%26contact%3D0&amp;guid=ON" style="width: 1px; height: 1px; margin-left: -1px;">
-->

<div id="confirmOverlay" style="display:none">
    <div id="confirmBox" style="max-width: 499px;">
        <h1 class="showshare">Share<span class="icon_menu close"></span></h1>
        <div class="contents">
            <ul class="menu">
                <li class="title" style="padding: 5px 10px;">Share by Text or Email</li>
                <input id="share-id" name="id" value="demo" type="hidden">
                <input id="share-name" name="name" value="Jane W Smith" type="hidden">
                <li style="padding: 4px 2px 4px 50px; position: relative;">
                    <div style="position: absolute; left: 8px; margin-top: 10px; color: #4E4E4E; font-weight: bold;">To:</div><span class="placeholder" onclick="placeholderClick(this);" style="padding: 10px 3% 10px 60px; width: auto;">Recipients Number/Email</span>
                    <input id="share-number-email" name="number-email" onkeydown="if(event.keyCode==13){sendShare();}" type="text">
                </li>
                <li style="padding: 4px 80px 4px 50px; position: relative;">
                    <div style="position: absolute; left: 8px; margin-top: 10px; color: #4E4E4E; font-weight: bold;">From:</div><span class="placeholder" onclick="placeholderClick(this);" style="padding: 10px 3% 10px 60px; width: auto;">Senders Name/Email</span>
                    <input id="share-name-email" name="name-email" onkeydown="if(event.keyCode==13){sendShare();}" type="text"><a onclick="sendShare();" class="send-button">Send</a>
                </li>
                <li class="error"></li>
                <li class="title" style="padding: 5px 10px;">Sharing by Social Network</li>
                <li>
                    <table class="social-share-widgets">
                        <tbody>
                            <tr>
                                <td style="padding: 6px 0;"><a style="display: block;" href="#" target="_blank"><img src="<?php echo asset_url(); ?>vcard_detail/images/fb.png"/></a>
                                </td>
                                <td style="padding: 6px 0;"><a style="display: block;" href="#" target="_blank"><img src="<?php echo asset_url(); ?>vcard_detail/images/google.png"/></a>
                                </td>
                                <td style="padding: 6px 0;"><a style="display: block;" href="#" target="_blank"><img src="<?php echo asset_url(); ?>vcard_detail/images/twitter.png"/></a>
                                </td>
                                <td style="padding: 6px 0;"><a style="display: block;" href="#" target="_blank"><img src="<?php echo asset_url(); ?>vcard_detail/images/linkdein.png"/></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </li>
                <li class="title" style="padding: 5px 10px;">Short URL for Sharing Page</li>
                <li><a href="#" target="_blank" style="font-size: 16px;">http://www.google.com</a>
                </li>
                <li class="title" style="padding: 5px 10px;">Scan QRCode for Link</li>
                <li style="padding: 3% 0;max-width: 100%;width: 100%;">
				<img class="share-qrcode" src="<?php echo asset_url(); ?>vcard_detail/images/qrcode.jpg"/>
                </li>
            </ul>
        </div>
    </div>
</div>

<div id="confirmOverlay" class="saveDIv" style="display:none">
    <div id="confirmBox" style="max-width: 499px;">
        <h1 class="showsave">Save to Device<span class="icon_menu close"></span></h1>
        <div class="contents">
            <ul class="menu">
                <li class="title" style="padding: 5px 10px;">Save to Contacts</li>
                <input id="import-id" name="id" value="demo" type="hidden">
                <input id="import-name" name="name" value="Jane W Smith" type="hidden">
                <li class="button"><a href="#">Download<span class="icon_menu download"></span></a>
                </li>
                <li style="padding: 4px 80px 4px 2px; position: relative;"><span class="placeholder" onclick="placeholderClick(this);" style="width: auto;">Email Address for Import</span>
                    <input id="import-email" name="email" onkeydown="if(event.keyCode==13){sendImport();}" type="email"><a onclick="sendImport();" class="send-button">Send</a>
                </li>
                <li class="error"></li>
            </ul>
        </div>
    </div>
</div>

<div id="confirmOverlay" class="viewdetail" style="display:none">
	<div id="confirmBox" style="max-width: 499px;">
		<h1 class="showdetail">Staples<span class="icon_menu close"></span></h1>
		<div class="contents">
			<span class="text-align: center; display: block;">
				<img src="images/banner.png" style="max-width: 90%; max-height: 300px; width: auto; height: auto; margin: 10px auto;display: block;left: 0px;right: 0px;">
				<span style="display: block; margin: 0; background-color: #6E6F71; padding: 4px 0; color: white;">
					<b>Title</b> : Sales Rep<br>
					<b>Start Date</b> : 9/2011<br>
					<b>Hours</b> : Monday - Friday (9am-7pm CST)<br>
				</span>
				<div class="formated-text">
					<p>World's largest office products company-providing office supplies, technology products and services, ink &amp; toner, Copy &amp; Print services and 
					UPS shipping. Computer workstations available to rent.</p>
				</div>
			</span>
		</div>
	</div>
</div>

<div id="confirmOverlay" class="viewvideo" style="display:none">
	<div id="confirmBox" style="max-width: 499px;">
		<h1 class="showvideo">Video<span class="icon_menu close"></span></h1>
		<div class="contents">
			<span class="text-align: center; display: block;">
				<div class="video-frame" style="margin: 2px;">
					<iframe class="video-embeded" src="http://www.youtube.com/embed/BBAOpGGKTt0?rel=0&amp;wmode=transparent" alt="http://www.youtube.com/embed/BBAOpGGKTt0?rel=0&amp;wmode=transparent" wmode="Opaque" scrolling="no" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" style="width: 300px; height: 180px;" width="300px" height="180px" frameborder="0"></iframe>
				</div>
			</span>
		</div>
	</div>
</div>

<script type="text/javascript">//<![CDATA[
$(window).load(function(){
jQuery(function(){
         
        
        //jQuery('#confirmOverlay').hide();
        jQuery('.showshare').click(function(){
              jQuery('#confirmOverlay').toggle();
        });
		
		jQuery('.showsave').click(function(){
              jQuery('.saveDIv').toggle();
        });
		
		jQuery('.showdetail').click(function(){
              jQuery('.viewdetail').toggle();
        });
		
		jQuery('.showvideo').click(function(){
              jQuery('.viewvideo').toggle();
        });
});
});//]]> 

</script>
</body>

</html>