<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?> ><head>
    <title><?php wp_title(' | ', 1, right); ?> <?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen,projection" />
    <meta charset="UTF-8"> 
<?php wp_head(); ?>

    <script type="text/javascript">
    // initialise plugins
    <?php if (get_option('dm_ts_slider') == "Nivo Slider") { ?>
    jQuery(window).load(function() {
        jQuery('#dm_nivo_wrap').nivoSlider({pauseTime:5000, captionOpacity: 1, slices:10, boxCols: 6, boxRows: 3, prevText: "", nextText: "", effect: 'fade' });
    });
<?php }; ?>    
    jQuery(document).ready(function(){ 
        jQuery('ul.sf-menu').superfish();
        <?php if (get_option('dm_ts_slider') == "DM Slider") { ?> jQuery('#dm_slider_images').DMSlider({"blogUrl" : "<?php echo get_template_directory_uri(); ?>", "bluegrey" : <?php if (get_option('dm_ts_color_scheme') == 'Blue Grey' ) {echo 'true';} else {echo 'false';}; ?>}); <?php }; ?>
    jQuery("a[rel^='prettyPhoto']").prettyPhoto({
        deeplinking: false,
        social_tools: false
        });

    });  
    </script>
<?php if(get_option("dm_ts_custom_css")) { ?>
    <style type="text/css">
    <?php echo get_option("dm_ts_custom_css");  ?>
    </style>
<?php } ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-47561256-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body <?php body_class(); ?>>
            <div id="navtop">
            <div id="logoMenu">
                <div id="logo">
                    <a href="<?php echo home_url(); ?>"><img src="<?php echo get_option('dm_ts_logo'); ?>" alt="<?php bloginfo('name'); ?>" /> </a>
                </div>
                
                 <div id="socnet_links">
        <img src="<?php echo get_template_directory_uri(); ?>/images/social/block.png" />
    <?php if(get_option("dm_ts_sn_twitter")) { ?>
        <a href="http://www.twitter.com/<?php echo get_option("dm_ts_sn_twitter"); ?>" target="_BLANK"><img src="<?php echo get_template_directory_uri(); ?>/images/social/twitter.png" alt="Twitter" /> </a>
    <?php } ?>
    <?php if(get_option("dm_ts_sn_facebook")) { ?>
        <a href="<?php echo get_option("dm_ts_sn_facebook"); ?>" target="_BLANK"><img src="<?php echo get_template_directory_uri(); ?>/images/social/face.png" alt="Facebook" /> </a>
    <?php } ?>
    <?php if(get_option("dm_ts_sn_digg")) { ?>
        <a href="http://www.digg.com/<?php echo get_option("dm_ts_sn_digg"); ?>" target="_BLANK"><img src="<?php echo get_template_directory_uri(); ?>/images/social/digg.png" alt="Digg" /> </a>
    <?php } ?>
    <?php if(get_option("dm_ts_sn_vimeo")) { ?>
        <a href="http://www.vimeo.com/<?php echo get_option("dm_ts_sn_vimeo"); ?>" target="_BLANK"><img src="<?php echo get_template_directory_uri(); ?>/images/social/vimeo.png" alt="Vimeo" /> </a>
    <?php } ?>
    <?php if(get_option("dm_ts_sn_youtube")) { ?>
        <a href="http://www.youtube.com/user/<?php echo get_option("dm_ts_sn_youtube"); ?>" target="_BLANK"><img src="<?php echo get_template_directory_uri(); ?>/images/social/youtube.png" alt="YouTube" /> </a>
    <?php } ?>
    </div>
                
                <div id="mainMenu">
                    <?php wp_nav_menu( array('menu_class' => 'sf-menu') ); ?>
                </div>
                <div class="clearfix"></div>
            </div>
            </div>
            <div id="bgWrapper">
                <div id="mainWrapper">
            <?php if (is_home()) { ?>
           <?php /*?> <div id="topCaption">
                <?php ; echo "<p style='font-size: ".get_option('dm_ts_home_capt_size')."px '>".get_option('dm_ts_home_capt')."</p>";?>                 
            </div><?php */?>
            <?php ;} ?>