<?php
$themename = "TouchSense";
$shortname = "dm_ts";

if (!get_option("dm_ts_activated")) {
    import_default_touchsense();
    update_option("dm_ts_activated", "1");
    update_option("dm_ts_home_stat_img", get_template_directory_uri()."/images/welcome.jpg");
    update_option("dm_ts_slider", "Static Image");
}



/*Enque jQuery*/
function loadScripts() {
    if (!is_admin()) {
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js', false, '1.6.0');
        wp_enqueue_script( 'jquery' );
	$themedir = get_template_directory_uri()."/";
	$scriptdir = get_template_directory_uri()."/scripts/";
	wp_register_script( 'superfish', $scriptdir.'superfish.js', false, '1.4.8');
	wp_register_script( 'touchsense-twitter', $scriptdir.'twitter-rss-with-rt.js', false, '1.0');
	wp_register_script( 'touchsense', $scriptdir.'effects.js', false, '1.0');
	wp_register_script( 'dm-nivo-slider', $scriptdir.'jquery.nivo.slider.pack.js', false, '2.5.2');
	wp_register_style( 'superfish-css', $themedir.'superfish.css', false, '1.4.8');
	wp_register_style( 'nivo-css', $scriptdir.'nivo.css', false, '1.4.8');
	if (get_option("dm_ts_fonts") == "Titillium Text") {
	  wp_register_style(  'custom-fonts', $themedir.'fonts/stylesheet.css', false, '1.0');
	} elseif (get_option("dm_ts_fonts") == "Luxi Sans") {
	  wp_register_style(  'custom-fonts', $themedir.'fonts/stylesheetluxi.css', false, '1.0');
	} elseif (get_option("dm_ts_fonts") == "Droid Serif") {
	  wp_register_style(  'custom-fonts', $themedir.'fonts/stylesheetdroid.css', false, '1.0');
	} elseif (get_option("dm_ts_fonts") == "Liberation Sans") {
	  wp_register_style(  'custom-fonts', $themedir.'fonts/stylesheetliberation.css', false, '1.0');
	} elseif (get_option("dm_ts_fonts") == "Nobile") {
	  wp_register_style(  'custom-fonts', $themedir.'fonts/stylesheetnobile.css', false, '1.0');
	} elseif (get_option("dm_ts_fonts") == "Lucida Sans") {
	  wp_register_style(  'custom-fonts', $themedir.'fonts/stylesheetlucida.css', false, '1.0');
	}
	
	wp_register_style(  'ts-shortcodes', $themedir.'shortcodes.css', false, '1.0');
	wp_register_style(  'pretty-photo', $scriptdir.'prettyPhoto.css', false, '1.0');
	wp_register_script( 'jquery-easing', $themedir.'dmslider/js/jquery.easing.1.3.js', false, '1.3');
        wp_enqueue_script( 'jquery-easing' );
	
	wp_register_script( 'pretty-photo', $scriptdir.'jquery.prettyPhoto.js', false, '3.1.2');
	wp_enqueue_script( 'pretty-photo' );
	wp_enqueue_style('pretty-photo');
	
	wp_register_script( 'dm_gallery', $scriptdir.'gallery.js', false, '1.0.0');
	wp_enqueue_script('dm_gallery');
	
	wp_enqueue_script('superfish');
	wp_enqueue_script('touchsense');
	wp_enqueue_script('touchsense-twitter');
	wp_enqueue_style('superfish-css');
	wp_enqueue_style('ts-shortcodes');
	wp_enqueue_style('custom-fonts');
    }
}

add_action('init', 'loadScripts', 5);


function portfolioScripts() {
wp_register_script('cs_quicksand', (get_template_directory_uri()."/scripts/jquery.quicksand.min.js"), false);
wp_enqueue_script('cs_quicksand');
wp_register_script('cs_quicksand_script', (get_template_directory_uri()."/scripts/script.js"), false);
wp_enqueue_script('cs_quicksand_script');
};


function register_my_menus() {
  register_nav_menus(
    array('header-menu' => __( 'Header Menu' ) )
  );
};
add_action( 'init', 'register_my_menus' );



/*---------------Admin Panel ----------*/
$hpages = get_pages();
$wp_pages = array();
$wp_IDs = array();
foreach ($hpages as $hpage ) {
       $wp_pages[$hpage->ID] = $hpage->post_title;
       $wp_IDs[$hpage->post_title] = $hpage->ID;
};


/*$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}
array_unshift($wp_cats, "All Categories");*/ 

$options = array (
 
array( "name" => $themename." Options",
	"type" => "title"),
 

array( "name" => "General",
	"type" => "section"),
array( "type" => "open"),
 
array( "name" => "Color Scheme",
	"desc" => "Select the color scheme for the theme",
	"id" => $shortname."_color_scheme",
	"type" => "select",
	"options" => array("Blue Grey", "Blue", "Blue Sky", "Coffee", "Cherry", "Fire", "Golden", "Lime", "Green", "Pink", "Purple", "White Minimal"),
	"std" => ""),
	
array( "name" => "Logo URL",
	"desc" => "Enter the link to your logo image",
	"id" => $shortname."_logo",
	"type" => "text",
	"std" => ""),
	
array( "name" => "Search field on posts/pages",
	"desc" => "Should the search field be displayed on top of the posts/pages?",
	"id" => $shortname."_search",
	"type" => "select",
	"options" => array("Yes", "No"),
	"std" => ""),

array( "name" => "Font replacement",
	"desc" => "Select the font that you would like to use.",
	"id" => $shortname."_fonts",
	"type" => "select",
	"options" => array("Titillium Text", "Luxi Sans", "Droid Serif", "Liberation Sans", "Nobile", "Lucida Sans" ),
	"std" => ""),

array( "name" => "Custom CSS",
	"desc" => "Want to add any custom CSS code? Put in here, and the rest is taken care of. This overrides any other stylesheets. eg: a.button{color:green}",
	"id" => $shortname."_custom_css",
	"type" => "textarea",
	"std" => ""),


array( "type" => "close"),
array( "name" => "Blog",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Display Thumbnails on Blog Detail View",
	"desc" => "Should the thumbnail selected for the post be displayed when viewing full post as well?",
	"id" => $shortname."_thumb_disp",
	"type" => "select",
	"options" => array("Yes", "No"),
	"std" => ""),

array( "name" => "Display Author Details on Blog Detail View",
	"desc" => "Should the Author Details ('About the Author') be displayed on blog posts?",
	"id" => $shortname."_auth_disp",
	"type" => "select",
	"options" => array("Yes", "No"),
	"std" => ""),

array( "name" => "Category, Tag and Author Blog Layout",
	"desc" => "Select the layout of the posts when viewing a category, author or a tag blog layout.",
	"id" => $shortname."_cat_layout",
	"type" => "select",
	"options" => array("Blog Classic", "Blog Modern"),
	"std" => ""),

array( "name" => "Display Images and Shortcodes on Blog List View",
	"desc" => "Should the shortcodes and images be dipsplayed on blog list view?",
	"id" => $shortname."_blog_shrt",
	"type" => "select",
	"options" => array("Yes", "No"),
	"std" => ""),
	
	
array( "type" => "close"),
array( "name" => "Homepage",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Homepage Layout",
	"desc" => "Select the layout of the homepage.",
	"id" => $shortname."_home_layout",
	"type" => "select",
	"options" => array("Blog Classic", "Blog Modern", "Homepage Mix Classic", "Homepage Mix Modern", "Homepage Corporate" ),
	"std" => ""),

array( "name" => "Homepage Page",
	"desc" => "If you have selected 'Homepage Corporate' or 'Homepage Mix' in the above drop-down, select a page here which will be shown on homepage.",
	"id" => $shortname."_home_pg",
	"type" => "select",
	"options" => $wp_pages,
	"homepageid" => $wp_IDs,
	"std" => ""),

array( "name" => "Homepage Slider",
	"desc" => "Select the slider you would like to use on homepage - if any.",
	"id" => $shortname."_slider",
	"type" => "select",
	"options" => array("DM Slider", "Nivo Slider", "Static Image", "No Slider"),
	"std" => ""),

array( "name" => "Homepage Static Image",
	"desc" => "If you have selected 'Static Image' in the above drop-down, enter URI to the image here which will be shown on homepage. For best aesthetical results, use image that's 940px wide.",
	"id" => $shortname."_home_stat_img",
	"type" => "text",
	"std" => ""),

array( "name" => "Homepage Top Caption",
	"desc" => "Enter the caption that should appear on the homepage, below the main menu and logo. Hint: wrap the text in &lt;span> &lt;/span> tags to make it bold. Leave blank if none.",
	"id" => $shortname."_home_capt",
	"type" => "textarea",
	"std" => ""),

array( "name" => "Homepage Top Caption Size",
	"desc" => "Enter the size of the Homepage Top Caption (just the numerical value, without units).",
	"id" => $shortname."_home_capt_size",
	"type" => "text",
	"std" => "44"),

array( "name" => "Homepage Middle Caption",
	"desc" => "Enter the caption that should appear on the homepage, below the slider, above the content. Hint: wrap the text in &lt;span> &lt;/span> tags to make it bold. Leave blank if none.",
	"id" => $shortname."_home_capt_mid",
	"type" => "textarea",
	"std" => ""),

array( "name" => "Homepage Middle Caption Size",
	"desc" => "Enter the size of the Homepage Middle Caption (just the numerical value, without units).",
	"id" => $shortname."_home_capt_mid_size",
	"type" => "text",
	"std" => "20"),

array( "name" => "Middle Caption Icon",
	"desc" => "Enter the URI to the icon. This icon will be displayed next to the caption. Leave blank if none.",
	"id" => $shortname."_home_capt_icon",
	"type" => "text",
	"std" => ""),

array( "name" => "Middle Caption Button",
	"desc" => "Enter the button text. This button will be displayed next to the caption. Leave blank if none.",
	"id" => $shortname."_home_capt_button",
	"type" => "text",
	"std" => ""),

array( "name" => "Middle Caption Button Link",
	"desc" => "Enter the link of the button. Leave blank if none.",
	"id" => $shortname."_home_capt_button_link",
	"type" => "text",
	"std" => ""),
	

array( "type" => "close"),
array( "name" => "Footer",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Display Footer Show/Hide text?",
	"desc" => "Should the Show/Hide be displayed in the footer?",
	"id" => $shortname."_footer_showhide",
	"type" => "select",
	"options" => array("Yes", "No"),
	"std" => ""),

array( "name" => "Which part of the footer should show/hide affect?",
	"desc" => "Which part of the footer should show/hide affect?",
	"id" => $shortname."_footer_showhidepos",
	"type" => "select",
	"options" => array("Top Footer", "Bottom Footer", "Whole Footer"),
	"std" => ""),

array( "name" => "Footer copyright text",
	"desc" => "Enter text used in the right side of the footer. It can be HTML",
	"id" => $shortname."_footer_text",
	"type" => "text",
	"std" => ""),
	
array( "name" => "Google Analytics Code",
	"desc" => "You can paste your Google Analytics or other tracking code in this box. This will be automatically added to the footer.",
	"id" => $shortname."_ga_code",
	"type" => "textarea",
	"std" => ""),


array( "type" => "close"),
array( "name" => "Portfolio",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Portfolio List Layout",
	"desc" => "Select the layout for your portfolio items",
	"id" => $shortname."_pfolio_layout",
	"type" => "select",
	"options" => array("1 Column", "3 Columns"),
	"std" => ""),

array( "name" => "Projects per page",
	"desc" => "Number of projects per page to be displayed on 1 column layout.",
	"id" => $shortname."_pfolio_count",
	"type" => "text",
	"std" => ""),

array( "type" => "close"),
array( "name" => "Social Networks",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Last Tweet Widget",
	"desc" => "Enter your Twitter username to display your latest tweet above footer. Leave blank if you don't want to display latest tweet above footer. Example: if the url to your profile is http://www.twitter.com/dmthemes, then enter dmthemes here.",
	"id" => $shortname."_foot_tweet",
	"type" => "text",
	"std" => ""),

array( "name" => "Twitter Link",
	"desc" => "Enter your Twitter username to display link to your Twitter profile in footer",
	"id" => $shortname."_sn_twitter",
	"type" => "text",
	"std" => ""),

array( "name" => "Facebook Link",
	"desc" => "Enter FULL link (including http://) to your Facebook profile/page to diplay link to it in footer.",
	"id" => $shortname."_sn_facebook",
	"type" => "text",
	"std" => ""),

array( "name" => "Digg Link",
	"desc" => "Enter your Digg username to display link to your Digg profile in footer",
	"id" => $shortname."_sn_digg",
	"type" => "text",
	"std" => ""),

array( "name" => "Vimeo Link",
	"desc" => "Enter your Vimeo username to display link to your Vimeo profile in footer",
	"id" => $shortname."_sn_vimeo",
	"type" => "text",
	"std" => ""),

array( "name" => "Youtube Link",
	"desc" => "Enter your YouTube username to display link to your YouTube profile in footer",
	"id" => $shortname."_sn_youtube",
	"type" => "text",
	"std" => ""),


array( "type" => "close"),
array( "name" => "Translation/Labels",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Read More",
	"desc" => "Read more to be displayed on blog posts.",
	"id" => $shortname."_tr_rm",
	"type" => "text",
	"std" => ""),

array( "name" => "Next",
	"desc" => "Next, to be displayed on page navigation button for next page.",
	"id" => $shortname."_tr_pagenext",
	"type" => "text",
	"std" => ""),

array( "name" => "Previous",
	"desc" => "Previous, to be displayed on page navigation button for previous page.",
	"id" => $shortname."_tr_pageprev",
	"type" => "text",
	"std" => ""),

array( "name" => "Search Results",
	"desc" => "Search Title, to be displayed as title for search results page.",
	"id" => $shortname."_tr_srch",
	"type" => "text",
	"std" => ""),

array( "name" => "Learn More",
	"desc" => "Learn more to be displayed on DM Slider, on slides with links.",
	"id" => $shortname."_tr_lm",
	"type" => "text",
	"std" => ""),
 
array( "name" => "About the Author",
	"desc" => "About the Author to be displayed above blog posts.",
	"id" => $shortname."_tr_ata",
	"type" => "text",
	"std" => ""),

array( "name" => "Tags",
	"desc" => "Tags to be displayed above blog posts.",
	"id" => $shortname."_tr_tg",
	"type" => "text",
	"std" => ""),

array( "name" => "All Tweets",
	"desc" => "All Tweets to be displayed on button in last tweet widget.",
	"id" => $shortname."_tr_atw",
	"type" => "text",
	"std" => ""),

array( "name" => "Show me less content in the footer",
	"desc" => "Show me less content in the footer to be displayed above footer, for hiding the top widgets. Hint: wrap the text in &lt;span> &lt;/span> tags to make it bold.",
	"id" => $shortname."_tr_shml",
	"type" => "text",
	"std" => ""),

array( "name" => "Show me more content in the footer",
	"desc" => "Show me more content in the footer to be displayed above footer, for hiding the top widgets. Hint: wrap the text in &lt;span> &lt;/span> tags to make it bold.",
	"id" => $shortname."_tr_shmm",
	"type" => "text",
	"std" => ""),

array( "name" => "Comments",
	"desc" => "",
	"id" => $shortname."_tr_comm",
	"type" => "text",
	"std" => ""),

array( "name" => "Name",
	"desc" => "Name to be displayed on the comment form, for the name input.",
	"id" => $shortname."_tr_cname",
	"type" => "text",
	"std" => ""),

array( "name" => "Email",
	"desc" => "Email to be displayed on the comment form, for the email input.",
	"id" => $shortname."_tr_cmail",
	"type" => "text",
	"std" => ""),

array( "name" => "Website",
	"desc" => "Website to be displayed on the comment form, for the website input.",
	"id" => $shortname."_tr_csite",
	"type" => "text",
	"std" => ""),

array( "name" => "Reply",
	"desc" => "Reply to be displayed as the link for replying, below the comment author avatar.",
	"id" => $shortname."_tr_creply",
	"type" => "text",
	"std" => ""),

array( "name" => "Leave a Reply",
	"desc" => "Leave a Reply to be displayed as the title of the comment form.",
	"id" => $shortname."_tr_clrep",
	"type" => "text",
	"std" => ""),

array( "name" => "Leave a Reply to",
	"desc" => "Leave a Reply to be displayed as the title of the comment form, when replying to someone. Hint: you can insert the <strong>%s</strong> here to include the name of the comment author being replied to. ",
	"id" => $shortname."_tr_clrepto",
	"type" => "text",
	"std" => ""),

array( "name" => "Or cancel reply",
	"desc" => "Or cancel reply button  to be displayed next to the comment form when reply to someone.",
	"id" => $shortname."_tr_crcancel",
	"type" => "text",
	"std" => ""),

array( "name" => "Post Comment",
	"desc" => "Post Comment button to be displayed as the comment submit.",
	"id" => $shortname."_tr_cpost",
	"type" => "text",
	"std" => ""),

array( "name" => "Our Works.",
	"desc" => "Our Works title to be displayed on top of portfolio pages.",
	"id" => $shortname."_tr_pfolio_title",
	"type" => "text",
	"std" => ""),

array( "name" => "View Project",
	"desc" => "View Project button to be displayed on portfolio pages.",
	"id" => $shortname."_tr_viewproj",
	"type" => "text",
	"std" => ""),

array( "name" => "Latest News",
	"desc" => "Latest News to be displayed on News custom posts.",
	"id" => $shortname."_tr_latestnews",
	"type" => "text",
	"std" => ""),

array( "name" => "Other News",
	"desc" => "Other News to be displayed on News custom posts.",
	"id" => $shortname."_tr_othernews",
	"type" => "text",
	"std" => ""),

array( "name" => "Older News",
	"desc" => "Older News to be displayed on News custom posts pagination.",
	"id" => $shortname."_tr_oldernews",
	"type" => "text",
	"std" => ""),

array( "name" => "Recent News",
	"desc" => "Recent News to be displayed on News custom posts pagination.",
	"id" => $shortname."_tr_recentnews",
	"type" => "text",
	"std" => ""),
 
array( "type" => "close")
 
);




function touchsense_add_admin() {
 
global $themename, $shortname, $options;
 
if (( isset($_GET['page'])) && ($_GET['page'] == basename(__FILE__) )) {
 
	if ( isset($_REQUEST['action']) && 'save' == $_REQUEST['action'] ) {
 
		foreach ($options as $value) {
		update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
 
foreach ($options as $value) {
	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
 
	header("Location: admin.php?page=functions.php&saved=true");
die;
 
} 
else if( isset($_REQUEST['action']) && 'reset' == $_REQUEST['action'] ) {
 
	foreach ($options as $value) {
		delete_option( $value['id'] ); }
 
	header("Location: admin.php?page=functions.php&reset=true");
die;
 
} else if( isset($_REQUEST['action']) && 'defaults' == $_REQUEST['action'] ) {
  
	import_default_touchsense();
	 
	header("Location: admin.php?page=functions.php&defaults=true");
die;
 
}
}
 
add_menu_page($themename, $themename, 'administrator', basename(__FILE__), 'touchsense_admin');
}

function touchsense_add_init() {

$file_dir= get_template_directory_uri();
wp_enqueue_style("functions", $file_dir."/functions/functions.css", false, "1.0", "all");
wp_enqueue_script("rm_script", $file_dir."/functions/rm_script.js", false, "1.0");

}
function touchsense_admin() {
 
global $themename, $shortname, $options;
$i=0;
 
if ( isset($_REQUEST['saved']) && $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( isset($_REQUEST['reset']) && $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
if ( isset($_REQUEST['defaults']) && $_REQUEST['defaults'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reverted to defaults.</strong></p></div>';
 
?>
<div class="wrap rm_wrap">
<h2><?php echo $themename; ?> Admin Panel</h2>
 
<div class="rm_opts">
<form method="post">
<?php foreach ($options as $value) {
switch ( $value['type'] ) {
 
case "open":
?>
 
<?php break;
 
case "close":
?>
 
</div>
</div>
<br />

 
<?php break;
 
case "title":
?>
<p>
<br/><strong>General</strong> - if you want to change the skins, logo etc. look here.
<br/><strong>Blog</strong> - Various blog settings are located here.
<br/><strong>Homepage</strong> - Change the homepage slider, homepage layout etc. here.
<br/><strong>Footer</strong> - Add google analytics, change copyright message.
<br/><strong>Social Networks</strong> - Add the social networks you want to be displayed on site here.
<br/><strong>Translation/Labels</strong> - If you would like to translate the inbuilt theme labels, or just change them, look here.
</p>

 
<?php break;
 
case 'text':
?>

<div class="rm_input rm_text">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 
 </div>
<?php
break;
 
case 'textarea':
?>

<div class="rm_input rm_textarea">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 
 </div>
  
<?php
break;
 
case 'select':
if ($value['id'] == 'dm_ts_home_pg') {  
?>

<div class="rm_input rm_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
		<option value="<?php echo $value['homepageid'][$option]; ?>" <?php if (get_option( $value['id'] ) == $value['homepageid'][$option]) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
</select>

	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php
} else {
?>
<div class="rm_input rm_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
		<option <?php if (get_option( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
</select>

	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php
}

break;
 
case "checkbox":
?>

<div class="rm_input rm_checkbox">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />


	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
<?php break; 
case "section":

$i++;

?>

<div class="rm_section">
<div class="rm_title"><h3><img src="<?php echo get_template_directory_uri();?>/functions/images/trans.png" class="inactive" alt="""><?php echo $value['name']; ?></h3><span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save changes" />
</span><div class="clearfix"></div></div>
<div class="rm_options">

 
<?php break;
 
}
}
?>
 
<input type="hidden" name="action" value="save" />

</form>
<form method="post" style="float: left; margin-right:20px;">
<p class="submit">
<input name="default" type="submit" value="Return Default Values" />
<input type="hidden" name="action" value="defaults" />
</p>
</form>

</form>
<form method="post" >
<p class="submit">
<input name="reset" type="submit" value="Remove ALL Values" />
<input type="hidden" name="action" value="reset" />
</p>
</form>


 </div> 
 

<?php
};

add_action('admin_init', 'touchsense_add_init');
add_action('admin_menu', 'touchsense_add_admin');

REQUIRE_ONCE(TEMPLATEPATH."/dmslider/dmslider.php");

add_theme_support( 'post-thumbnails', array( 'post' ) );


function vt_resize( $attach_id = null, $img_url = null, $width, $height, $crop = false ) {

	// this is an attachment, so we have the ID
	if ( $attach_id ) {
	
		$image_src = wp_get_attachment_image_src( $attach_id, 'full' );
		$file_path = get_attached_file( $attach_id );
	
	// this is not an attachment, let's use the image url
	} else if ( $img_url ) {
		
		$file_path = parse_url( $img_url );
		$file_path = ltrim( $file_path['path'], '/' );
		//$file_path = rtrim( ABSPATH, '/' ).$file_path['path'];
		
		$orig_size = getimagesize( $file_path );
		
		$image_src[0] = $img_url;
		$image_src[1] = $orig_size[0];
		$image_src[2] = $orig_size[1];
	}
	
	$file_info = pathinfo( $file_path );
	$extension = '.'. $file_info['extension'];

	// the image path without the extension
	$no_ext_path = $file_info['dirname'].'/'.$file_info['filename'];

	$cropped_img_path = $no_ext_path.'-'.$width.'x'.$height.$extension;

	// checking if the file size is larger than the target size
	// if it is smaller or the same size, stop right here and return
	if ( $image_src[1] > $width || $image_src[2] > $height ) {

		// the file is larger, check if the resized version already exists (for crop = true but will also work for crop = false if the sizes match)
		if ( file_exists( $cropped_img_path ) ) {

			$cropped_img_url = str_replace( basename( $image_src[0] ), basename( $cropped_img_path ), $image_src[0] );
			
			$vt_image = array (
				'url' => $cropped_img_url,
				'width' => $width,
				'height' => $height
			);
			
			return $vt_image;
		}

		// crop = false
		if ( $crop == false ) {
		
			// calculate the size proportionaly
			$proportional_size = wp_constrain_dimensions( $image_src[1], $image_src[2], $width, $height );
			$resized_img_path = $no_ext_path.'-'.$proportional_size[0].'x'.$proportional_size[1].$extension;			

			// checking if the file already exists
			if ( file_exists( $resized_img_path ) ) {
			
				$resized_img_url = str_replace( basename( $image_src[0] ), basename( $resized_img_path ), $image_src[0] );

				$vt_image = array (
					'url' => $resized_img_url,
					'width' => $proportional_size[0],
					'height' => $proportional_size[1]
				);
				
				return $vt_image;
			}
		}

		// no cached files - let's finally resize it
		$new_img_path = image_resize( $file_path, $width, $height, $crop );
		$new_img_size = getimagesize( $new_img_path );
		$new_img = str_replace( basename( $image_src[0] ), basename( $new_img_path ), $image_src[0] );

		// resized output
		$vt_image = array (
			'url' => $new_img,
			'width' => $new_img_size[0],
			'height' => $new_img_size[1]
		);
		
		return $vt_image;
	}

	// default output - without resizing
	$vt_image = array (
		'url' => $image_src[0],
		'width' => $image_src[1],
		'height' => $image_src[2]
	);
	
	return $vt_image;
}




add_action( 'add_meta_boxes', 'myplugin_add_custom_box' );

add_action( 'save_post', 'myplugin_save_postdata' );

function myplugin_add_custom_box() {
    add_meta_box( 
        'thumb_sectionid',
        __( 'Thumbnail Size', 'myplugin_textdomain' ),
        'thumbnail_inner_custom_box',
        'post',
	'side',
	'core'
    );
    add_meta_box( 
        'title_sectionid',
        __( 'Post Caption', 'title_textdomain' ),
        'title_inner_custom_box',
        'post',
	'side',
	'core'
    );
}

function thumbnail_inner_custom_box() {

  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'myplugin_noncename' );
  global $post;
     $custom = get_post_custom($post->ID);
     $thumb_sel = $custom["thumb_sel"][0];
  echo '<label for="thumb_sel">';
       _e("<p>Thumbnails are automatically resized and croped to fit the right dimensions.<br/>
	  <strong>This option affects only posts on  'Blog Classic' layout!</strong> On 'Blog Modern' layout all thumbnails are the same - 280 x 140 px</p>", 'myplugin_textdomain' );
  echo '</label> ';
?>
<select id="thumb_sel" name="thumb_sel">
<option value="nothumb" <?php if ($thumb_sel =='nothumb') { echo 'selected="selected"';} ?> >No Thumbnail / Blog Modern</option>
<option value="full" <?php if ($thumb_sel =='full') { echo 'selected="selected"';} ?>>Full Width</option>
<option value="half" <?php if ($thumb_sel =='half') { echo 'selected="selected"';} ?>>Half Width</option>
</select><?php 
}

function title_inner_custom_box() {

  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'myplugin_noncename' );
    global $post;
     $custom = get_post_custom($post->ID);
     $title_sel = $custom["title_sel"][0];
  echo '<label for="title_sele">';
       _e("<p>This caption will appear on top of the blog post, you can use it to emphasize someting important related to the post, or just use it as 'second title'. If you leave it blank, standard post title will appear here.</p>", 'title_textdomain' );
  echo '</label> ';
?>

<input type="text" id="title_sel" name="title_sel" value="<?php echo $title_sel; ?>" size="35" />
<?php 
}


function myplugin_save_postdata( $post_id ) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;

  if ( isset($_POST['myplugin_noncename']) && !wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename( __FILE__ ) ) )
      return;

  if ( 'page' == $_POST['post_type'] ) 
  {
    if ( !current_user_can( 'edit_page', $post_id ) )
        return;
  }
  else
  {
    if ( !current_user_can( 'edit_post', $post_id ) )
        return;
  }
update_post_meta($post_id, "thumb_sel", $_POST["thumb_sel"]);
update_post_meta($post_id, "title_sel", $_POST["title_sel"]);

}

/*function dm_query() {
            if (get_option('dm_ts_feat_cat') == "All Categories") { 
                $dm_query = new WP_Query('post_type=post');
		return $dm_query;
            } else {
                $parameters = "category_name=".get_option('dm_ts_feat_cat');
                $dm_query = new WP_Query($parameters);
		return $dm_query;
            };
}*/

/* Comments Template */
function dm_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php if($depth > 1) {echo comment_class('comm_reply');}  else {echo comment_class();};  ?> id="li-comment-<?php comment_ID() ?>">
    <div id="comment-<?php comment_ID(); ?>" class="commentWrap">
      <div class="com_author_namer">

        <?php echo get_avatar($comment,$size='60'); ?>
        <div class="comm_reply_box">
	  <?php $args['reply_text'] = get_option('dm_ts_tr_creply'); ?>
          <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
        </div>
      </div>
      
      <div class="com_wrap">
        <div class="comment-meta commentmetadata">
          <span class="authorFont"><?php printf(__('%s'), get_comment_author_link()) ?></span>  <?php if($depth > 1) {echo 'replied:';} else {echo 'said:'; };    ?><br/>
          <span class="commentDate"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?><?php edit_comment_link(__('(Edit)'),'  ','') ?></span></div>
         <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.') ?></em>
         <br />
      <?php endif; ?>
        <?php comment_text() ?>

      </div><div class="clearfix"> </div>
  </div>
    <div class="clearfix"> </div>
    <div class="commentSeparator"> </div>
    <div class="clearfix"> </div>
<?php
        };

register_sidebar(array(
  'name' => 'Sidebar-News',
  'id' => 'sidebar-news',
  'description' => 'Sidebar Widgets. (News page)',
  'before_title' => '<h2>',
  'after_title' => '</h2>',
  'before_widget' => '<li class="widgetSidebar">',
  'after_widget'  => '</li>'
));
register_sidebar(array(
  'name' => 'Sidebar-Practice',
  'id' => 'sidebar-practice',
  'description' => 'Sidebar Widgets. (Practice child pages)',
  'before_title' => '<h2>',
  'after_title' => '</h2>',
  'before_widget' => '<li class="widgetSidebar">',
  'after_widget'  => '</li>'
));

/* SIDEBARS*/
register_sidebar(array(
  'name' => 'Sidebar',
  'id' => 'sidebar',
  'description' => 'Sidebar Widgets.',
  'before_title' => '<h2>',
  'after_title' => '</h2>',
  'before_widget' => '<li class="widgetSidebar">',
  'after_widget'  => '</li>'
));

register_sidebar(array(
  'name' => 'Footer Top Left',
  'id' => 'ftl',
  'description' => 'Footer top left widget position.',
  'before_title' => '<h2>',
  'after_title' => '</h2>',
  'before_widget' => '<li class="footerSidebar">',
  'after_widget'  => '</li>'
));

register_sidebar(array(
  'name' => 'Footer Top Center',
  'id' => 'ftc',
  'description' => 'Footer top center widget position.',
  'before_title' => '<h2>',
  'after_title' => '</h2>',
  'before_widget' => '<li class="footerSidebar">',
  'after_widget'  => '</li>'
));

register_sidebar(array(
  'name' => 'Footer Top Right',
  'id' => 'ftr',
  'description' => 'Footer top right widget position.',
  'before_title' => '<h2>',
  'after_title' => '</h2>',
  'before_widget' => '<li class="footerSidebar">',
  'after_widget'  => '</li>'
));

register_sidebar(array(
  'name' => 'Footer Bottom',
  'id' => 'fb',
  'description' => 'Footer bottom widget positions.',
  'before_title' => '<h2>',
  'after_title' => '</h2>',
  'before_widget' => '<li class="footerSidebarBot">',
  'after_widget'  => '</li>'
));

register_sidebar(array(
  'name' => 'Legal Team (Left)',
  'id' => 'leg-tm-l',
  'description' => 'Footer bottom widget positions.',
  'before_title' => '<h2 class="legalteam-left">',
  'after_title' => '</h2>',
  'before_widget' => '<div class="legalteam-left" >',
  'after_widget'  => '</div>'
));

/*breadcrumbs*/
include("scripts/breadcrumb_navxt_class.php");
  function dm_breadcrumbs() {
    if(class_exists('bcn_breadcrumb_trail'))
    {
	    //Make new breadcrumb object
	    $breadcrumb_trail = new bcn_breadcrumb_trail;
	    //Setup our options
	    //Set the home_title to Blog
	    $breadcrumb_trail->opt['home_title'] = "Home";
	    //Set the current item to be surrounded by a span element, start with the prefix
	    $breadcrumb_trail->opt['current_item_prefix'] = '<span class="current">';
	    //Set the suffix to close the span tag
	    $breadcrumb_trail->opt['current_item_suffix'] = '</span>';
	    $breadcrumb_trail->opt['post_portfolio_prefix'] = '<span class="current">';
	    $breadcrumb_trail->opt['post_portfolio_suffix'] = '</span>';
	    $breadcrumb_trail->opt['post_dmnews_prefix'] = '<span class="current">';
	    $breadcrumb_trail->opt['post_dmnews_suffix'] = '</span>';
	    $breadcrumb_trail->opt['post_portfolio_root'] = 'Home';
	    $breadcrumb_trail->opt['post_dmnews_root'] = 'Home';
	    
	    $breadcrumb_trail->opt['post_portfolio_taxonomy_display'] = false;
	    $breadcrumb_trail->opt['post_dmnews_taxonomy_display'] = false;
	    //Fill the breadcrumb trail
	    $breadcrumb_trail->fill();
	    //Display the trail
	    $breadcrumb_trail->display();
    }      
};

function dm_pagination($next='Next', $prev='Previous',  $pages = '', $range = 4)
{
  $next = get_option('dm_ts_tr_pagenext');
  $prev = get_option('dm_ts_tr_pageprev');
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='paginationPG'><div class='separator25'></div>";
    
         if($paged > 1) {echo "<a href='".get_pagenum_link($paged - 1)."'class='mediumButtonLeft' ><span>".$prev."</span></a>";};

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                if ($paged == $i) {
		  echo "<span class='currentPG'>".$i."</span>";
		  }
		else {
		  echo "<a href='".get_pagenum_link($i)."' class='activePG' >".$i."</a>";
                }
             }
         }

         if ($paged < $pages) {echo "<a href='".get_pagenum_link($paged + 1)."' class='mediumButton' ><span>".$next."</span></a>";};  

         echo "</div>\n";
     }
}

function dm_pagination_pfolio($next='Next', $prev='Previous',  $pages = '', $range = 4)
{
  $next = get_option('dm_ts_tr_pagenext');
  $prev = get_option('dm_ts_tr_pageprev');
  $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $dm_portfolio;
         $pages = $dm_portfolio->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='paginationPG'><div class='separator25'></div>";
    
         if($paged > 1) {echo "<a href='".get_pagenum_link($paged - 1)."'class='mediumButtonLeft' ><span>".$prev."</span></a>";};

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                if ($paged == $i) {
		  echo "<span class='currentPG'>".$i."</span>";
		  }
		else {
		  echo "<a href='".get_pagenum_link($i)."' class='activePG' >".$i."</a>";
                }
             }
         }

         if ($paged < $pages) {echo "<a href='".get_pagenum_link($paged + 1)."' class='mediumButton' ><span>".$next."</span></a>";};  

         echo "</div>\n";
     }
}


/* include widgets*/
include("widget.search.php");
include("widget.latest.posts.php");
include("widget.most.commented.posts.php");
include("widget.tag.cloud.php");
include("widget.twitter.php");
add_theme_support('automatic-feed-links');

/*---------------------SHORTCODES------------------*/
/*HIGLIGHTS*/
function highlight1($atts, $content = null) {
	return '<span class="highlight1">'.$content.'</span>';
}
function highlight2($atts, $content = null) {
	return '<span class="highlight2">'.$content.'</span>';
}


/* BLOCKQUOTES */
function bquoteleft($atts, $content = null) {
	return '<blockquote class="bqleft">'.$content.'</blockquote>';
}
function bquote($atts, $content = null) {
	return '<blockquote class="bqcenter">'.$content.'</blockquote>';
}
function bquoteright($atts, $content = null) {
	return '<blockquote class="bqright">'.$content.'</blockquote>';
}


/*COLUMNS*/
function oneHalf($atts, $content = null) {
     $content = do_shortcode($content);
	return '<div class="oneHalf">'.$content.'</div>';
}

function oneHalfLast($atts, $content = null) {
     $content = do_shortcode($content);
	return '<div class="oneHalfLast">'.$content.'</div><div class="clearfix"></div>';
}

function oneThird($atts, $content = null) {
     $content = do_shortcode($content);
	return '<div class="oneThird">'.$content.'</div>';
}


function oneThirdLast($atts, $content = null) {
        $content = do_shortcode($content);
	return '<div class="oneThirdLast">'.$content.'</div><div class="clearfix"></div>';
}

function twoThirds($atts, $content = null) {
     $content = do_shortcode($content);
	return '<div class="twoThirds">'.$content.'</div>';
}

function twoThirdsLast($atts, $content = null) {
     $content = do_shortcode($content);
	return '<div class="twoThirdsLast">'.$content.'</div><div class="clearfix"></div>';
}

function oneFourth($atts, $content = null) {
     $content = do_shortcode($content);
	return '<div class="oneFourth">'.$content.'</div>';
}

function oneFourthLast($atts, $content = null) {
     $content = do_shortcode($content);
	return '<div class="oneFourthLast">'.$content.'</div><div class="clearfix"></div>';
}

function threeFourths($atts, $content = null) {
     $content = do_shortcode($content);
	return '<div class="threeFourths">'.$content.'</div>';
}

function threeFourthsLast($atts, $content = null) {
     $content = do_shortcode($content);
	return '<div class="threeFourthsLast">'.$content.'</div><div class="clearfix"></div>';
}


function IconColumn($atts, $content = null) {
     	extract(shortcode_atts(array(
		"icon_url48x48" => 'http://',
                "title" => '',
                "subtitle" => ''
	), $atts));
        $content = do_shortcode($content);
	return '<div class="oneThird"><div class="icon48"><img src="'.$icon_url48x48.'" alt="'.$title.'" width="48" height="48" /></div><div class="titleSubtitle"><h2 class="h2Blue">'.$title.'</h2><h5 class="h5regular">'.$subtitle.'</h5></div><div class="clearfix"></div><p class="iconPar">'.$content.'</p></div>';
}

function IconColumnLast($atts, $content = null) {
     	extract(shortcode_atts(array(
		"icon_url48x48" => 'http://',
                "title" => '',
                "subtitle" => ''
	), $atts));
       $content = do_shortcode($content);
	return '<div class="oneThirdLast"><div class="icon48"><img src="'.$icon_url48x48.'" alt="'.$title.'" width="48" height="48" /></div><div class="titleSubtitle"><h2 class="h2Blue">'.$title.'</h2><h5 class="h5regular">'.$subtitle.'</h5></div><div class="clearfix"></div><p class="iconPar">'.$content.'</p></div><div class="clearfix"></div>';
}


/* DROPCAPS */

function dropcap1($atts, $content = null) {
	return '<span class="dropcap1">'.$content.'</span>';
}
function dropcap2($atts, $content = null) {
	return '<span class="dropcap2">'.$content.'</span>';
}
function dropcap3($atts, $content = null) {
	return '<span class="dropcap3">'.$content.'</span>';
}


/* LISTS */

function ularrow1($atts, $content = null) {
     $content = do_shortcode($content);
	return '<ul class="arrow1_bullets">'.$content.'</ul>';
}
function ularrow2($atts, $content = null) {
     $content = do_shortcode($content);
	return '<ul class="arrow2_bullets">'.$content.'</ul>';
}

/* SEPARATORS */
function separatorDots($atts, $content = null) {
	return '<div class="separatorDots"></div>';
}

function separatorLines($atts, $content = null) {
	return '<div class="separator40"></div>';
}

function sliderDM($atts, $content = null) {
     	extract(shortcode_atts(array(
                "height" => '',
		"width" => '',
		"pause" => '5000'
	), $atts));
	$heightnav = $height + 45;
	return strip_tags('<script type="text/javascript">
	jQuery(window).load(function() {
	  jQuery(".slider-inline").nivoSlider({
		  pauseTime:'.$pause.',  captionOpacity: 1, prevText: "", nextText: "", directionNavHide:false, captionOpacity: 1, slices:10, boxCols: 6, boxRows: 3 
	});
});
</script>
<div class="slider-wrapinline" style=" height:'.$heightnav.'px; width:'.$width.'px;" ><div class="slider-inline" style=" height:'.$height.'px; width:'.$width.'px;"> '.$content.'</div></div> ', '<a><img><div><script>');
}

/*TESTIMONIALS*/
function testimonials1($atts, $content = null) {
     	extract(shortcode_atts(array(
                "by" => '',
		"from" => ''
	), $atts));
	return '<div class="testimonials1"><p>'.$content.'</p></div><div class="testimonialauthor"><p>'.$by.'</p><p class="testfrom">'.$from.'</p></div>';
}

/* INFOBOXES  */
function InfoBox1($atts, $content = null) {
     	extract(shortcode_atts(array(
		"button_text" => 'More Info',
                "button_link"  => '#'
	), $atts));
	return '<div class="infobox4"><p>'.$content.'</p><a href="'.$button_link.'" class="mediumButton buttonhover2">'.$button_text.'</a></div>';
}

function InfoBox2($atts, $content = null) {
     	extract(shortcode_atts(array(
		"button_text" => 'More Info',
                "button_link"  => '#'
	), $atts));
	return '<div class="infobox5"><p>'.$content.'</p><a href="'.$button_link.'" class="mediumButton">'.$button_text.'</a></div>';
}

function InfoBox3($atts, $content = null) {
     	extract(shortcode_atts(array(
		"title" => ''
	), $atts));
	return '<div class="infobox2"><div class="titlebox2"><p>'.$title.'</p></div><div class="contentbox2"><p>'.$content.'</p></div></div>';
}

function slidingContent($atts, $content = null) {
     	extract(shortcode_atts(array(
                "title" => '',
	), $atts));
	return '<div class="slidingContent"><div class="slidingContentTitle"><p class="scsP">'.$title.'</p><p class="schidP">'.$title.'</p></div><div class="slidingContentContent">'.$content.'</div></div>';
}

function mediumbuttons($atts, $content = null) {
     	extract(shortcode_atts(array(
		"title" => ''
	), $atts));
	return '<div class="infobox2"><div class="titlebox2"><p>'.$title.'</p></div><div class="contentbox2"><p>'.$content.'</p></div></div>';
}

function bigbuttonsDD($atts, $content = null) {
     	extract(shortcode_atts(array(
                "link" => '',
	), $atts));
	return '<a href="'.$link.'" class="bigButton">'.$content.'</a>';
}

function mediumbuttonsDD($atts, $content = null) {
     	extract(shortcode_atts(array(
                "link" => '',
	), $atts));
	return '<a href="'.$link.'" class="mediumButton">'.$content.'</a>';
}

add_shortcode("small_button", "mediumbuttonsDD");
add_shortcode("big_button", "bigbuttonsDD");

add_shortcode("toggle", "slidingContent");
add_shortcode("info_box1", "InfoBox1");
add_shortcode("info_box2", "InfoBox2");
add_shortcode("info_box3", "InfoBox3");

add_shortcode("testimonial", "testimonials1");

add_shortcode("highlight_1", "highlight1");
add_shortcode("highlight_2", "highlight2");

add_shortcode("bquote_left", "bquoteleft");
add_shortcode("bquote", "bquote");
add_shortcode("bquote_right", "bquoteright");

add_shortcode("one_half", "oneHalf");
add_shortcode("one_half_last", "oneHalfLast");
add_shortcode("one_third", "oneThird");
add_shortcode("one_third_last", "oneThirdLast");
add_shortcode("two_thirds", "twoThirds");
add_shortcode("two_thirds_last", "twoThirdsLast");
add_shortcode("one_fourth", "oneFourth");
add_shortcode("one_fourth_last", "oneFourthLast");
add_shortcode("three_fourths", "threeFourths");
add_shortcode("three_fourths_last", "threeFourthsLast");
add_shortcode("icon_column", "IconColumn");
add_shortcode("icon_column_last", "IconColumnLast");

add_shortcode("dropcap1", "dropcap1");
add_shortcode("dropcap2", "dropcap2");
add_shortcode("dropcap3", "dropcap3");

add_shortcode("list_arrow1", "ularrow1");
add_shortcode("list_arrow2", "ularrow2");

add_shortcode("separator_dots", "separatorDots");
add_shortcode("separator_lines", "separatorLines");

add_shortcode("slider", "sliderDM");

/*------------------END SHORTCODES---------------- */

/* ---------------GALLERY ----------------------- */
remove_shortcode('gallery', 'gallery_shortcode');

add_shortcode('gallery', 'dm_gallery_shortcode');

add_shortcode('gallery_modern', 'dm_gallery_modern');

add_shortcode('gallery_modern_thumbs', 'dm_gallery_modern_thumbs');

function dm_gallery_modern($atts, $content = null) {
     	extract(shortcode_atts(array(
		"hidden" => "true",
                "title" => '',
		"height" => '200',
		"width" => '590'
	), $atts));
	if ($hidden == "true") {$minus = 'style="display:none;"'; $imghid='display:none;'; $plus = 'style="display:inline;"';} else
	{$minus = 'style="display:inline;"';  $imghid='display:block;'; $plus = 'style="display:none;"';};
	$images = $content;
	$content = '<div class="gallerymodern">
	<div class="gallerymodernTitle"><p class="pluss" '.$plus.'>'.$title.'</p><p class="minuss" '.$minus.'>'.$title.'</p><p class="imGalCount"></p><div class="clearfix"></div></div>
	<div class="gallimages" style="width:'.$width.'px; height: '.$height.'px; '.$imghid.'">';  
	$content .= $images; 
	$content.='<div class="galImgDesc"><p></p></div> </div><div class="gal-nav" style="'.$imghid.'"><p class="navleft"></p></div><div class="separatorBC0"></div></div>';
	
	$content = strip_tags($content, '<div><img><p><span>');
	return $content;
}

function dm_gallery_modern_thumbs($atts, $content = null) {
global $post, $wp_locale;

	static $instance = 0;
	$instance++;

	// Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $atts);
	if ( $output != '' )
		return $output;

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
	      'gallery_nr' => '',
		'order'      => 'ASC',
		"hidden" => "true",
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
                'atttile'    => $post->post_title,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => '',
		'title' => ''
		
	), $atts));
     
	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$include = preg_replace( '/[^0-9,]+/', '', $include );
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}

	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$columns = intval($columns);
	$itemwidth = '280';
	$float = is_rtl() ? 'right' : 'left';

	$selector = "gallery-{$instance}";

	$gallery_style = $gallery_div = '';
	if ( apply_filters( 'use_default_gallery_style', true ) )
		$gallery_style = "
		<style type='text/css'>
			#{$selector} {
				margin: auto;
			}
			#{$selector} .gallery-item {
				float: {$float};
				margin-top: 10px;
				text-align: center;
				width: {$itemwidth}px;
			}
			#{$selector} img {
				
			}
			#{$selector} .gallery-caption {
				margin-left: 0;
			}
			.gallery-item {
			position: relative;
			}
		</style>
		<!-- see gallery_shortcode() in wp-includes/media.php -->";
	$size_class = sanitize_html_class( $size );
	$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
	$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );
	
	if ($hidden == "true") {$minus = 'style="display:none;"'; $imghid='display:none;'; $plus = 'style="display:inline;"';} else
	{$minus = 'style="display:inline;"';  $imghid='display:block;'; $plus = 'style="display:none;"';};
	$images = $content;
	$output .= '<div class="gallerymodern">
	<div class="gallerymodernTitle"><p class="pluss" '.$plus.'>'.$title.'</p><p class="minuss" '.$minus.'>'.$title.'</p><p class="imGalCountTH"></p><div class="clearfix"></div></div>
	<div class="gallimagesTH" style="'.$imghid.'">';  

	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
	 
	   if ( $gallery_nr == $attachment->post_excerpt) {
		$image = vt_resize( $id,'' , 280, 140, true );
		$imagedd = vt_resize( $id,'' , 50, 33, true );
		$link = "<a href='".wp_get_attachment_url( $id )."' rel='prettyPhoto[".$gallery_nr."]' title=''>
		<img src='".get_template_directory_uri()."/images/thumb_modern.jpg' width='280' height='140' class='thumb_cover' />
		<img src='".$image['url']."' alt='".$attachment->post_title."' /></a>";
                if (++$i % $columns == 0) {$galstyle = 'style="margin-right:0px;"';} else {$galstyle = 'style="margin-right:30px;"';} ;
		
		$output .= "<{$itemtag} class='gallery-item'".$galstyle.">";
		$output .= "
			<{$icontag}  class='gallery-icon'>
				$link
			</{$icontag}>";
		$output .= "</{$itemtag}>";
		if ( $columns > 0 && $i % $columns == 0 )
			$output .= '<br style="clear: both" />';
	}}

	$output .= "</div></div><div class='clearfix'></div><div class='separatorBC0'></div></div>";
	
	return $output;
      
}

function dm_gallery_shortcode($attr) {
	global $post, $wp_locale;

	static $instance = 0;
	$instance++;

	// Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' )
		return $output;

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
                'atttile'    => $post->post_title,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => ''
	), $attr));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$include = preg_replace( '/[^0-9,]+/', '', $include );
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}

	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$columns = intval($columns);
	$itemwidth = '280';
	$float = is_rtl() ? 'right' : 'left';

	$selector = "gallery-{$instance}";

	$gallery_style = $gallery_div = '';
	if ( apply_filters( 'use_default_gallery_style', true ) )
		$gallery_style = "
		<style type='text/css'>
			#{$selector} {
				margin: auto;
			}
			#{$selector} .gallery-item {
				float: {$float};
				margin-top: 10px;
				text-align: center;
				width: {$itemwidth}px;
			}
			#{$selector} img {
				
			}
			#{$selector} .gallery-caption {
				margin-left: 0;
			}
			.gallery-item {
			position: relative;
			}
		</style>
		<!-- see gallery_shortcode() in wp-includes/media.php -->";
	$size_class = sanitize_html_class( $size );
	$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
	$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
		$image = vt_resize( $id,'' , 280, 140, true );
		$imagedd = vt_resize( $id,'' , 50, 33, true );
		$link = "<a href='".wp_get_attachment_url( $id )."' rel='prettyPhoto[43]'>
		<img src='".get_template_directory_uri()."/images/thumb_modern.jpg' width='280' height='140' class='thumb_cover' />
		<img src='".$image['url']."' alt='".$attachment->post_title."' /></a>";
                if (++$i % $columns == 0) {$galstyle = 'style="margin-right:0px;"';} else {$galstyle = 'style="margin-right:30px;"';} ;
		$output .= "<{$itemtag} class='gallery-item'".$galstyle.">";
		$output .= "
			<{$icontag}  class='gallery-icon'>
				$link
			</{$icontag}>" ;
		$output .= "</{$itemtag}>";
		if ( $columns > 0 && $i % $columns == 0 )
			$output .= '<br style="clear: both" />';
	}

	$output .= "
			<br style='clear: both;' />
		</div>\n";
	
	return $output;
}



/*****************PORTFOLIO AND NEWS*****************/


add_action( 'init', 'register_custom_post' );
function register_custom_post() {
	register_post_type( 'portfolio',
		array(
			'label' => 'Portfolio',
			'labels' => array(
				'name' => __( 'Portfolio' ),
				'singular_name' => __( 'Portfolio' ),
                              'add_new' => __( 'Add New' ),
                              'add_new_item' => __( 'Add New Portfolio Item' ),
                              'edit' => __( 'Edit' ),
                              'edit_item' => __( 'Edit Portfolio Item' ),
                              'new_item' => __( 'New Portfolio Item' ),
                              'view' => __( 'View Portfolio Item' ),
                              'view_item' => __( 'View Portfolio Item' ),
                              'search_items' => __( 'Search Portfolio Items' ),
                              'not_found' => __( 'No portfolio items found' ),
                              'not_found_in_trash' => __( 'No portfolio items found in Trash' )
			      
			),
               'supports' => array( 'title', 'editor' ),
		'public' => true,
               'rewrite' => true,
	       'menu_position' => 105
		)
	);
	
	register_post_type( 'dmnews',
		array(
			'labels' => array(
			      'name' => __( 'News' ),
			      'singular_name' => __( 'News' ),
                              'add_new' => __( 'Add New' ),
                              'add_new_item' => __( 'Add New News Post ' ),
                              'edit' => __( 'Edit' ),
                              'edit_item' => __( 'Edit News Post' ),
                              'new_item' => __( 'New News Post' ),
                              'view' => __( 'View News Post' ),
                              'view_item' => __( 'View News Post' ),
                              'search_items' => __( 'Search News Posts' ),
                              'not_found' => __( 'No news found' ),
                              'not_found_in_trash' => __( 'No news found in Trash' )
			      
			),
               'supports' => array( 'title', 'editor' ),
	       'public' => true,
               'rewrite' => true,
	       'menu_position' => 110
		)
	);
}

  $labels = array(
    'name' => _x( 'Project Types', 'project types' ),
    'singular_name' => _x( 'Project Type', 'project type' ),
    'search_items' =>  __( 'Search Project Types' ),
    'all_items' => __( 'All Project Types' ),
    'parent_item' => __( 'Parent Project Type' ),
    'parent_item_colon' => __( 'Parent Project Type:' ),
    'edit_item' => __( 'Edit Project Type' ), 
    'update_item' => __( 'Update Project Type' ),
    'add_new_item' => __( 'Add Project Type' ),
    'new_item_name' => __( 'New Project Type' ),
    'menu_name' => __( 'Project Type' ),
  ); 	



register_taxonomy("types", array("portfolio"), array("hierarchical" => true, 'labels' => $labels, "rewrite" => true));

add_action('add_meta_boxes', 'touchsense_portfolio');
 
function touchsense_portfolio(){
  add_meta_box("project_description-meta", "Project Description", "project_description", "portfolio", "normal");
  add_meta_box("project_navigation-meta", "Portfolio Navigation", "project_navigation", "portfolio", "side");
}

 
function project_description(){
  global $post;
  $custom = get_post_custom($post->ID);
  $thumbnailurl = $custom["thumbnailurl"][0];
  $fullsizeurl = $custom["fullsizeurl"][0];
  $portfolioDescription = $custom["portfoliodesc"][0];
  ?>
  <label><p>Thumbnail URL:</p></label>
  <input name="thumbnailurl" id="thumbnailurl" value="<?php echo $thumbnailurl; ?>" style="width: 300px;" />
  <p><em>Enter the location of the thumbnail for this portfolio item. This will be the thumbnail of the portfolio item when displaying it in portfolio items list.<br/>Dimensions:280x140px for grid view, or 590x300px for list view<br/>Example: www.yoursite.com/image.jpg</em></p>
  <br/> <br/>
  <label><p>Full size image OR Video URL: </p></label> 
  <input name="fullsizeurl" id="fullsizeurl" value="<?php echo $fullsizeurl; ?>" style="width: 300px;" />
  <p><em>Enter the location of the image/video for this portfolio item. This image/video will be shown in a lightbox when a user clicks on this item's thumbnail.<br/>Example: www.yoursite.com/image2.jpg OR http://www.youtube.com/embed/GLvWLn3hkBk</em></p><br/><br/>
  <label><p>Decription:</p></label>
  <textarea name="portfoliodesc" id="portfoliodesc" cols="50" rows="5" ><?php echo $portfolioDescription; ?></textarea>
  <p><em>Enter short decription of your project.</em></p>
  
  <?php
}

function project_navigation(){
  global $post;
  $custom = get_post_custom($post->ID);
  $navigation_true = $custom["navigation_true"][0];
  $items_count = $custom["items_count"][0];
  ?>
  <label><p>Display portfolio navigation: </p></label>
  <select id="navigation_true" name="navigation_true">
  <option value="no" <?php if ($navigation_true =='no') { echo 'selected="selected"';} ?> >No  </option>
  <option value="yes" <?php if ($navigation_true =='yes') { echo 'selected="selected"';} ?>>Yes  </option>
  </select>
  <label><p>Number of portfolio items in navigation: </p></label>
  <select id="items_count" name="items_count">
  <option value="all" <?php if ($items_count =='all') { echo 'selected="selected"';} ?> >All</option>
  <option value="5" <?php if ($items_count =='5') { echo 'selected="selected"';} ?>>5</option>
  <option value="10" <?php if ($items_count =='10') { echo 'selected="selected"';} ?>>10</option>
  <option value="20" <?php if ($items_count =='20') { echo 'selected="selected"';} ?>>20</option>
  </select>
  
  <?php
}
 

add_action('save_post', 'save_details');

function save_details(){
global $post;

if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return $post->ID;
}


$type = $post->post_type;
     if( $type == 'portfolio') { 
	update_post_meta($post->ID, "thumbnailurl", $_POST["thumbnailurl"]);
	update_post_meta($post->ID, "fullsizeurl", $_POST["fullsizeurl"]);
	update_post_meta($post->ID, "portfoliodesc", $_POST["portfoliodesc"]);
	 
	update_post_meta($post->ID, "items_count", $_POST["items_count"]);
	update_post_meta($post->ID, "navigation_true", $_POST["navigation_true"]);
     }
}

function import_default_touchsense() {
  
          //general
	$logofol = get_template_directory_uri()."/images/logo.png";
	$iconfol = get_template_directory_uri()."/images/icon.jpg";
	update_option("dm_ts_color_scheme", "Blue Grey");
	update_option("dm_ts_logo", $logofol);
	update_option("dm_ts_search", "Yes");
	update_option("dm_ts_fonts", "Titillium Text");
	
	//blog
	update_option("dm_ts_thumb_disp", "Yes");
	update_option("dm_ts_auth_disp", "Yes");
	update_option("dm_ts_cat_layout", "Blog Classic");
	update_option("dm_ts_blog_shrt", "No");
	
	//homepage 
	update_option("dm_ts_home_layout", "Blog Classic");
	update_option("dm_ts_home_capt", "Welcome to the <span>Next Generation Theming</span>");
	update_option("dm_ts_home_capt_size", "44");
	update_option("dm_ts_home_capt_icon", $iconfol);
	update_option("dm_ts_home_capt_mid", "<span>Another great theme from our hands.</span> Perfect for corporate business or any blog. Some unique solutions will make your visitors smile :)");
	update_option("dm_ts_home_capt_mid_size", "20");
	update_option("dm_ts_home_capt_button", "Learn More");
	update_option("dm_ts_home_capt_button_link", "#");
	
	//Footer
	update_option("dm_ts_footer_text", "Copyright TouchSense");
	update_option("dm_ts_footer_showhide", "Yes");
	update_option("dm_ts_footer_showhidepos", "Top Footer");
	
	//Social
	update_option("dm_ts_foot_tweet", "dm_themes");
	
	//Portfolio
	update_option("dm_ts_pfolio_layout", "1 Column");
	update_option("dm_ts_pfolio_count", "4");

	
	//translate
	update_option("dm_ts_tr_rm", "Read More");
	update_option('dm_ts_tr_pagenext', 'Next');
	update_option('dm_ts_tr_pageprev', 'Previous');
	update_option("dm_ts_tr_lm", "Learn More");
	update_option("dm_ts_tr_ata", "About the Author");
	update_option("dm_ts_tr_tg", "Tags:");
	update_option("dm_ts_tr_atw", "All Tweets");
	update_option("dm_ts_tr_shml", "<span>show me less</span> content in the footer ");
	update_option("dm_ts_tr_shmm", "<span>show me more</span> content in the footer ");
	update_option("dm_ts_tr_comm", "Comments");
	update_option("dm_ts_tr_cname", "Name:");
	update_option("dm_ts_tr_cmail", "Email:");
	update_option("dm_ts_tr_srch", "Search");
	update_option("dm_ts_tr_csite", "Website:");
	update_option("dm_ts_tr_creply", "Reply");
	update_option("dm_ts_tr_clrep", "Leave a Reply");
	update_option("dm_ts_tr_clrepto", "Leave a Reply to %s");
	update_option("dm_ts_tr_crcancel", "or cancel reply");
	update_option("dm_ts_tr_cpost", "Post Comment");
	
	update_option("dm_ts_tr_pfolio_title", "Our Works");
	update_option("dm_ts_tr_viewproj", "View Project");
	update_option("dm_ts_tr_latestnews", "Latest News");
	update_option("dm_ts_tr_othernews", "Other News");
	update_option("dm_ts_tr_oldernews", "Older News");
	update_option("dm_ts_tr_recentnews", "Recent News");
  
}

if (!is_admin())
  add_filter('widget_text', 'do_shortcode', 11);

function show_post( $ID ) {
  $post = get_page( $ID, 'edit' );
  $content = apply_filters('the_content', $post->post_content);
  echo $content;
}

function dm_load_skin() {
      if (!is_admin()) {
	if (get_option('dm_ts_color_scheme') == 'Blue Grey' ) {
	   wp_register_style(  'blue-grey-skin', get_template_directory_uri().'/skin.bluegrey.css', false, '1.0');
	   wp_enqueue_style('blue-grey-skin');
	};
	if (get_option('dm_ts_color_scheme') == 'Blue' ) {  
	   wp_register_style(  'blue-skin', get_template_directory_uri().'/skin.blue.css', false, '1.0');
	   wp_enqueue_style('blue-skin');
	};
	if (get_option('dm_ts_color_scheme') == 'Blue Sky' ) {  
	   wp_register_style(  'blue-sky-skin', get_template_directory_uri().'/skin.bluesky.css', false, '1.0');
	   wp_enqueue_style('blue-sky-skin');
	};
	if (get_option('dm_ts_color_scheme') == 'Coffee' ) {  
	   wp_register_style(  'coffee-skin', get_template_directory_uri().'/skin.coffee.css', false, '1.0');
	   wp_enqueue_style('coffee-skin');
	};
	if (get_option('dm_ts_color_scheme') == 'Cherry' ) {  
	   wp_register_style(  'cherry-skin', get_template_directory_uri().'/skin.cherry.css', false, '1.0');
	   wp_enqueue_style('cherry-skin');
	};
	if (get_option('dm_ts_color_scheme') == 'Fire' ) {  
	   wp_register_style(  'fire-skin', get_template_directory_uri().'/skin.fire.css', false, '1.0');
	   wp_enqueue_style('fire-skin');
	};
	if (get_option('dm_ts_color_scheme') == 'Golden' ) {  
	   wp_register_style(  'golden-skin', get_template_directory_uri().'/skin.golden.css', false, '1.0');
	   wp_enqueue_style('golden-skin');
	};
	if (get_option('dm_ts_color_scheme') == 'Lime' ) {  
	   wp_register_style(  'lime-skin', get_template_directory_uri().'/skin.lime.css', false, '1.0');
	   wp_enqueue_style('lime-skin');
	};
	if (get_option('dm_ts_color_scheme') == 'Green' ) {  
	   wp_register_style(  'green-skin', get_template_directory_uri().'/skin.green.css', false, '1.0');
	   wp_enqueue_style('green-skin');
	};
	if (get_option('dm_ts_color_scheme') == 'Pink' ) {  
	   wp_register_style(  'pink-skin', get_template_directory_uri().'/skin.pink.css', false, '1.0');
	   wp_enqueue_style('pink-skin');
	};
	if (get_option('dm_ts_color_scheme') == 'Purple' ) {  
	   wp_register_style(  'purple-skin', get_template_directory_uri().'/skin.purple.css', false, '1.0');
	   wp_enqueue_style('purple-skin');
	};
	if (get_option('dm_ts_color_scheme') == 'White Minimal' ) {  
	   wp_register_style(  'minimal-skin', get_template_directory_uri().'/skin.white-minimal.css', false, '1.0');
	   wp_enqueue_style('minimal-skin');
	};
      }
}
add_action('init', 'dm_load_skin', 4);


add_action('init', 'ts_typo');  

function ts_typo() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
     return;
   }
     add_filter( 'mce_external_plugins', 'add_plugin' );
     add_filter( 'mce_buttons', 'register_button' );

}
function register_button( $buttons ) {
 array_push( $buttons, "|", "tstypo" );
 return $buttons;
}

function add_plugin( $plugin_array ) {
   $plugin_array['tstypo'] = get_template_directory_uri() . '/scripts/shortcodes.js';
   return $plugin_array;
}

add_action('init', 'ts_columns');  

function ts_columns() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
     return;
   }
     add_filter( 'mce_external_plugins', 'add_plugincol' );
     add_filter( 'mce_buttons', 'register_buttoncol' );

}
function register_buttoncol( $buttons ) {
 array_push( $buttons, "|", "tscol" );
 return $buttons;
}

function add_plugincol( $plugin_array ) {
   $plugin_array['tscol'] = get_template_directory_uri() . '/scripts/shortcodes.js';
   return $plugin_array;
}

add_action('init', 'ts_slidebox');  

function ts_slidebox() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
     return;
   }
     add_filter( 'mce_external_plugins', 'add_pluginslidebox' );
     add_filter( 'mce_buttons', 'register_buttonslidebox' );

}
function register_buttonslidebox( $buttons ) {
 array_push( $buttons, "|", "slidebox" );
 return $buttons;
}

function add_pluginslidebox( $plugin_array ) {
   $plugin_array['slidebox'] = get_template_directory_uri() . '/scripts/shortcodes.js';
   return $plugin_array;
}



?>