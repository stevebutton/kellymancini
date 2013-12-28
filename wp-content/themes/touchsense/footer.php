<div id="footer">
        <?php if (get_option( "dm_ts_foot_tweet" )) { ?>
        <div id="twitter_footer"><div id="minskin">
            <div id="the_tweet">
                <ul id="twitter_update_list"></ul>
            </div>
            <a class="bigButton" href="http://www.twitter.com/<?php echo get_option( "dm_ts_foot_tweet" ); ?>" target="_BLANK" ><span><?php echo get_option('dm_ts_tr_atw'); ?></span></a>
        </div></div>
        <?php }; ?>
<?php if ( is_active_sidebar( 'ftl' ) || is_active_sidebar( 'ftc' ) || is_active_sidebar( 'ftr' )) { ?>
<?php if (get_option("dm_ts_footer_showhide") == "Yes") { ?>
<div id="minskin2">
    <div id="foot_widgets_hide">
        <div id="minskin3">
        <p class="showless <?php if(get_option("dm_ts_footer_showhidepos") == "Top Footer") { echo 'showlessTF';}
        elseif(get_option("dm_ts_footer_showhidepos") == "Bottom Footer") { echo 'showlessBF';} 
        elseif(get_option("dm_ts_footer_showhidepos") == "Whole Footer") { echo 'showlessWF';} ?>"><?php echo get_option('dm_ts_tr_shml'); ?></p>
        
        <p class="showmore <?php if(get_option("dm_ts_footer_showhidepos") == "Top Footer") { echo 'showmoreTF';}
        elseif(get_option("dm_ts_footer_showhidepos") == "Bottom Footer") { echo 'showmoreBF';} 
        elseif(get_option("dm_ts_footer_showhidepos") == "Whole Footer") { echo 'showmoreWF';} ?>"><?php echo get_option('dm_ts_tr_shmm'); ?></p>
        </div>
    </div>
    <?php } ?>
<?php }; ?>
    <div id="foot_widgets">
        <?php if ( is_active_sidebar( 'ftl' ) || is_active_sidebar( 'ftc' ) || is_active_sidebar( 'ftr' )) { ?>
        <div id="foot_widgets_topB">
            <div id="foot_widgets_top">                
            <div class="footer_l">
                <ul>
                <?php if ( !function_exists('dynamic_sidebar')  
                    || !dynamic_sidebar( 'ftl' ) ) : ?>   
                <?php endif; ?>
                </ul>
            </div>
            <div class="footer_l">
                <ul>
                <?php if ( !function_exists('dynamic_sidebar')  
                    || !dynamic_sidebar( 'ftc' ) ) : ?>   
                <?php endif; ?>
                </ul>
            </div>
            <div class="footer_r">
                <ul>
                <?php if ( !function_exists('dynamic_sidebar')  
                    || !dynamic_sidebar( 'ftr' ) ) : ?>   
                <?php endif; ?>
                </ul>
            </div>
            <div class="clearfix"></div>
            <?php if ( is_active_sidebar( 'fb' )) { ?>
            <div class="separator_foo"></div>
            <?php }; ?>
            </div>
        </div>
        <?php }; ?>
        <?php if ( is_active_sidebar( 'fb' )) { ?>
        <div id="foot_widgets_botB"> 
        <div id="foot_widgets_bot">                
            <ul>
            <?php if ( !function_exists('dynamic_sidebar')  
                || !dynamic_sidebar( 'fb' ) ) : ?>   
            <?php endif; ?>
            </ul>
            <div class="clearfix"></div>
        </div>
        </div>
        <?php }; ?>
    </div>
<div id="foot_last">
    <div id="footer_copyright">
        <?php echo get_option('dm_ts_footer_text'); ?>
    </div>
   <?php /*?> <div id="socnet_links">
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
    </div><?php */?>
</div>
</div>
</div>
    </div>
</div>
<?php if (get_option( "dm_ts_foot_tweet" )) { ?>
      <script type="text/javascript">
         jQuery(document).ready(function() {
            GetTwitterFeedIncRT('<?php echo get_option( "dm_ts_foot_tweet" ); ?>', 1, 'twitter_update_list', 0);
	 });
      </script>
<?php }; ?>
<?php wp_footer(); ?>
<?php if(get_option("dm_ts_ga_code")) { ?>
    <?php echo get_option("dm_ts_ga_code");  ?>
<?php } ?>
</body>
</html>