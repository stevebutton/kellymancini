

 <?php wp_enqueue_style('cs-bootstrap',plugins_url('/css/cs-bootstrap.css',__FILE__));?>

<style>



/* =Tooltips style

========================================================================*/



.icon1 {

	display: inline-block;

	width: 13px;

	height: 13px;

	position: relative;

	padding: 0 0px 0 0;

	vertical-align: middle;

	

	background: url(<?php echo plugins_url('images/icons1.png',__FILE__) ?>) no-repeat;

}



.tooltip1 {

	display: none;

	width: 200px;

	position: absolute;

	padding: 10px;

	margin: 4px 0 0 4px;

	top: 0;

	left: 16px;

	border: 1px solid #76B6D7;

	border-radius: 0 8px 8px 8px;

	background: #bedffe;

	font-size: 13px;

	box-shadow: 0 1px 2px -1px #21759B;

	z-index: 999;

}



/* Icons Sprite Position */



.help {

	background-position: 0 0;

}



.warning {

	background-position: -20px 0;

}



.error {

	background-position: -40px 0;

}



/* Tooltip Colors */



.help .tooltip1 {

	border-color: #76B6D7;

	background-color: #bedffe;

	box-shadow-color: #21759B;

}



.warning .tooltip1 {

	border-color: #cca863;

	background-color: #ffff70;

	box-shadow-color: #ac8c4e;

}



.error .tooltip1 {

	border-color: #b50d0d;

	background-color: #e44d4e;

	box-shadow-color: #810606;

}



.icon1:hover .tooltip1 {

	display: block;

	box-shadow: 0 10px 20px -1px rgba(0,0,0,0.5);

	

	

}

.screenshot{



max-height: 240px;

max-width: 240px;

padding: 5px;

margin-right:10px;

margin-top: 10px;

border: 1px solid  #a4bbcd;

background:  #a4bbcd;

-moz-border-radius: 3px;

-khtml-border-radius: 3px;

-webkit-border-radius: 3px;

border-radius: 3px;

}

.screenshot1{



max-height: 265px;

max-width: 500px;

padding: 5px;

margin-left:40px;

margin-top: 10px;

border: 1px solid  #a4bbcd;

background:  #a4bbcd;

-moz-border-radius: 3px;

-khtml-border-radius: 3px;

-webkit-border-radius: 3px;

border-radius: 3px;

}

</style>



  <div class="block ui-tabs-panel ui-widget-content ui-corner-bottom" id="coming_soon_pro" aria-labelledby="ui-id-1" style="display: none;" >

  <h3><img src="<?php echo plugins_url('/images/png.png',__FILE__); ?>" style="vertical-align: middle;margin-top:-10px"/>&nbsp;Coming Soon Pro Feature</h3>

  

  <pre style="font-size:15px;font-family: 'Open Sans', sans-serif;">Hello friends,

Thanks a lot for using our plugin.

We are currently working on the premium version of the Easy Coming Soon Plugin. 

 <br>

The beta version of premium plugin is ready and we are currently looking for users to try out the beta version. 

If you are interested then contact Here

Email Address-<p style="color: #3a87ad;display:inline;font-size:14px"><strong> themes@webriti.com</strong></p>

Pls use the Subject Line: "Easy Coming Soon Pro - Beta Version"

   

  </pre>

  <h3>Premium Version Features with Comparison Table</h3>

  <table class="table table-hover table-bordered" style="font-size:15px;margin-bottom:0px;" >

                <thead class="alert alert-info">

                <tr>

                   <th></th>

                    <th style="text-align: center; font-size: 16px;">Features</th>

                    <th style="text-align: center; font-size: 16px;">Free</th>

                    <th style="text-align: center; font-size: 16px;">Premium</th>

                </tr>

                </thead>

                <tbody>

    

    

                <tr style="height:6px;">

                    <td><span class="icon1 help" style="float:right">

					<span class="tooltip1"><?php  _e('Plugin is work with any wordpress theme easily.');?></span></span></td>

                    <td><p style="font-size:14px"><strong>Works With Any Wordpress Theme</strong></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                </tr>

    

					<tr>

                   <td><span class="icon1 help" style="float:right">

					<span class="tooltip1"><?php  _e('Plugin template is compatible with all devices. It have completely resposive feature.');?></span></span></td>

                    <td><p style="font-size:14px"><b>Responsive Design</b></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                </tr>

                

                <tr>

                    <td><span class="icon1 help" style="float:right">

					<span class="tooltip1"><?php  _e('Defalut template is availale in both pro and free .');?></span></span></td>

                    <td><p style="font-size:14px"><b>Free Coming Soon Page Template</b></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                </tr>

				<tr>

                   <td><span class="icon1 help" style="float:right">

					<span class="tooltip1"><?php  _e('Easily customizable admin panel and very user friendly.');?></span></span></td>

                    <td><p style="font-size:14px"><b> User-friendly Setup</b> </p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                </tr>

    

                <tr>

                    <td><span class="icon1 help" style="float:right">

					<span class="tooltip1"><?php  _e('Default fonts are availabel in both.');?></span></span></td>

                    <td><p style="font-size:14px"><b>Default fonts</b> </p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                </tr>

    

    

                <tr>

					<td><span class="icon1 help" style="float:right">

					<span class="tooltip1"><?php  _e('Buddy Press Supportive.','sis_spa');?></span></span></td>

                    <td><p style="font-size:14px"><b>BuddyPress Support</b></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                </tr>

    

    

                <tr>

                    <td><span class="icon1 help" style="float:right">

					<span class="tooltip1"><?php  _e('Visible only non loggeed user, if you are not login then you are not able to view regular site.');?></span></span></td>

                    <td><p style="font-size:14px"><b>Visible only non logged user</b></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                </tr>

    

    

                <tr>

                    <td><span class="icon1 help" style="float:right">

					<span class="tooltip1"><?php  _e('Easily collect user notify mail.');?></span></span></td>

                    <td><p style="font-size:14px"><b>Easily collect visitor emails</b> </p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                </tr>

    

    

                

    

    

                <tr>

                    <td><span class="icon1 help" style="float:right">

					<span class="tooltip1"><?php  _e('Google Analytics supportive.');?></span></span></td>

                    <td><p style="font-size:14px"><b>Google Analytics Support</b></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                </tr>

                

                <tr>

                   <td><span class="icon1 help" style="float:right">

					<span class="tooltip1"><?php  _e('Get social support.','sis_spa');?></span></span></td>

                    <td><p style="font-size:14px"><b>Social Follow Icons</b></p></td>

                    <td style="text-align: center;"><p>Facebook, Twitter, Google+</p></td>

                    <td style="text-align: center;">Twitter, Facebook, Linkedin, Google+, Youtube, Email, Pinterest, Yahoo  etc.</td>

                </tr>

				

				<tr>

                   <td><span class="icon1 help" style="float:right">

					<span class="tooltip1"><?php  _e('Google fonts api are integreted with coming soon.');?></span></span></td>

                    <td><p style="font-size:14px"><b>Google Fonts Support</b></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/cross.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                </tr>

				

				<tr>

                   <td><span class="icon1 help" style="float:right">

					<span class="tooltip1"><?php  _e('Get our fast and friendly support.');?></span></span></td>

                    <td><p style="font-size:14px"><b>Multisite Support</b></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/cross.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                </tr>

				

				<tr>

                   <td><span class="icon1 help" style="float:right">

					<span class="tooltip1"><?php  _e('Access coming soon page shortcodes.');?></span></span></td>

                    <td><p style="font-size:14px"><b>Shortcode Support</b></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/cross.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                </tr>

				

				<tr>

                   <td><span class="icon1 help" style="float:right">

					<span class="tooltip1"><?php  _e('laguage Translation is available in premium.');?></span></span></td>

                    <td><p style="font-size:14px"><b>Language Translation Support</b></p></td>

                   <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/cross.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                </tr>

				

				<tr>

                   <td><span class="icon1 help" style="float:right">

					<span class="tooltip1"><?php  _e('limit access with clients who want to view regular sites.');?></span></span></td>

                    <td><p style="font-size:14px"><b>Limit Access with Client View</b></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/cross.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                </tr>

				

				<tr>

                   <td><span class="icon1 help" style="float:right">

					<span class="tooltip1"><?php  _e('Multiple page template is available for coming soon page.');?></span></span></td>

                    <td><p style="font-size:14px"><b>Multiple Page Templates</b></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/cross.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                </tr>

				

				<tr>

                   <td><span class="icon1 help" style="float:right">

					<span class="tooltip1"><?php  _e('Add user whitelist who access the site after login.');?></span></span></td>

                    <td><p style="font-size:14px"><b>Add User Whitelist</b></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/cross.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                </tr>

				

				<tr>

                   <td><span class="icon1 help" style="float:right">

					<span class="tooltip1"><?php  _e('Add ip access for user.');?></span></span></td>

                    <td><p style="font-size:14px"><b>Access By Ip</b></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/cross.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                </tr>

				

				<tr>

                   <td><span class="icon1 help" style="float:right">

					<span class="tooltip1"><?php  _e('page landing mode is available that mean you will able to add coming soon template for single site page .');?></span></span></td>

                    <td><p style="font-size:14px"><b>Single Page View Access</b></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/cross.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                </tr>

				

				<tr>

                   <td><span class="icon1 help" style="float:right">

					<span class="tooltip1"><?php  _e('Add fullscreen background slideshow.');?></span></span></td>

                    <td><p style="font-size:14px"><b>Background Image SlideShow</b></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/cross.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                </tr>

				

				<tr>

                   <td><span class="icon1 help" style="float:right">

					<span class="tooltip1"><?php  _e('Add youtube video background.');?></span></span></td>

                    <td><p style="font-size:14px"><b>Youtube Video background</b></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/cross.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                </tr>

				

				<tr>

                   <td><span class="icon1 help" style="float:right">

					<span class="tooltip1"><?php  _e('Mailchimp Integration for Email Marketing & Data Capture.');?></span></span></td>

                    <td><p style="font-size:14px"><b>Mailchimp Support</b></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/cross.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                </tr>

				

				

				<tr>

                   <td><span class="icon1 help" style="float:right">

					<span class="tooltip1"><?php  _e('Aweber Integration for Email Marketing & Data Capture.');?></span></span></td>

                    <td><p style="font-size:14px"><b>Aweber Support</b></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/cross.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                </tr>

				

				

				<tr>

                   <td><span class="icon1 help" style="float:right">

					<span class="tooltip1"><?php  _e('feedburner Integration for Email Marketing & Data Capture.');?></span></span></td>

                    <td><p style="font-size:14px"><b>Feedburner Support</b></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/cross.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                </tr>

				

				

				<tr>

                   <td><span class="icon1 help" style="float:right">

					<span class="tooltip1"><?php  _e('Add countdown timer for coming soon page.');?></span></span></td>

                    <td><p style="font-size:14px"><b>Countdown Timer</b></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/cross.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                </tr>

				

				

				

				<tr>

                   <td><span class="icon1 help" style="float:right">

					<span class="tooltip1"><?php  _e('progress bar enable');?></span></span></td>

                    <td><p style="font-size:14px"><b>Progress Bar</b></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/cross.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                </tr>

				

				<tr>

                   <td><span class="icon1 help" style="float:right">

					<span class="tooltip1"><?php  _e('SEO supportive. Add meta title, description and favicon image. ');?></span></span></td>

                    <td><p style="font-size:14px"><b>Custom Faviceon, Meta Title and Description </b></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/cross.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                </tr>

				

				<tr>

                   <td><span class="icon1 help" style="float:right">

					<span class="tooltip1"><?php  _e('Get multiple mode of coming soon like Maintanance mode,Landing mode etc.');?></span></span></td>

                    <td><p style="font-size:14px"><b>Enable Multiple Mode of Coming Soon</b></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/cross.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                </tr>

				<tr>

                   <td><span class="icon1 help" style="float:right">

					<span class="tooltip1"><?php  _e('Company logo and credit image insertig option.','sis_spa');?></span></span></td>

                    <td><p style="font-size:14px"><b>Company Logo and Credit Links</b></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/cross.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                    <td style="text-align: center;"><p><img src="<?php echo plugins_url('/images/icon_check.png',__FILE__); ?>" style="vertical-align: middle;"/></p></td>

                </tr>

				

			

    

                </tbody>

				

            </table>

			<h3><center><strong>SCREENSHOTS</strong></center></h3>

			<div>

			

			<img src="<?php echo plugins_url('/images/img/screenshot-2.png',__FILE__); ?>" class="screenshot"/>

			<img src="<?php echo plugins_url('/images/img/screenshot-10.png',__FILE__); ?>" class="screenshot"/>

			<img src="<?php echo plugins_url('/images/img/screenshot-24.png',__FILE__); ?>" class="screenshot"/>

			<img src="<?php echo plugins_url('/images/img/screenshot-22.png',__FILE__); ?>" class="screenshot"/>

			<img src="<?php echo plugins_url('/images/img/screenshot-23.png',__FILE__); ?>" class="screenshot"/>

			<img src="<?php echo plugins_url('/images/img/screenshot-26.png',__FILE__); ?>" class="screenshot"/>

			<img src="<?php echo plugins_url('/images/img/screenshot-9.png',__FILE__); ?>" class="screenshot"/>

			<img src="<?php echo plugins_url('/images/img/screenshot-18.png',__FILE__); ?>" class="screenshot"/>

			

			

			</div>

			

			<h3 >Responsive page Design</h3>

			

			<img src="<?php echo plugins_url('/images/img/responsive page.png',__FILE__); ?>" class="screenshot1"/>

  </div>