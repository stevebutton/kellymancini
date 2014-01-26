<?php get_header(); ?>
            <div id="bodyWrapper">
                <div id="centerWrap">
                <?php if (is_home() && get_option('dm_ts_slider') == "DM Slider") { ?>
                    <?php if (function_exists('dm_slider')) {dm_slider();} ?>
                <?php } elseif(is_home() && get_option('dm_ts_slider') == "Nivo Slider") { ?>
                    <div id="dm_nivo_wrap">
                        <?php dm_nivo_slider(); ?>
                    </div>
                <?php } elseif(is_home() && get_option('dm_ts_slider') == "Static Image") { ?>
                    <div style="margin: 0 auto; text-align: center;">
                        <img src="<?php echo get_option("dm_ts_home_stat_img")?>" alt="" /> 
                    </div>
                <?php }; ?>
                <div id="contentWrap">
                    <?php if (is_home() && get_option('dm_ts_home_capt_mid') ) { ?>
                    <div id="midCaption" <?php if (get_option('dm_ts_slider') == "No Slider") {echo 'style="margin:0px !important; padding-bottom:29px;"';}; ?>>
                        <?php if (get_option('dm_ts_home_capt_icon')) { ?>
                            <img src="<?php echo get_option('dm_ts_home_capt_icon'); ?>" alt="<?php bloginfo('name'); ?>"/>
                        <?php }; ?>
                        
                        <p style="width: <?php
                        if (get_option('dm_ts_home_capt_icon') && get_option('dm_ts_home_capt_button')) {echo '610';}
                        elseif (!get_option('dm_ts_home_capt_icon') && get_option('dm_ts_home_capt_button')) {echo '670';}
                        elseif (get_option('dm_ts_home_capt_icon') && !get_option('dm_ts_home_capt_button')) {echo '820';}
                        else {echo '900';};
                        ?>px; font-size:<?php echo get_option('dm_ts_home_capt_mid_size'); ?>px">
                        <?php echo get_option('dm_ts_home_capt_mid'); ?>
                        </p>
                        
                        <?php if (get_option('dm_ts_home_capt_button')) { ?>
                            <a href="<?php echo get_option('dm_ts_home_capt_button_link'); ?>" class="bigButton"><span><?php echo get_option('dm_ts_home_capt_button'); ?></span> </a>
                        <?php }; ?>
                        
                        <div class="clearfix"></div>  
                    </div>
                    <div class="separator40"></div>
                    <?php } elseif (is_home() && !get_option('dm_ts_home_capt_mid')) { ?>
                    <div style="height:50px;"></div>
                    <?php } ?>
                    
    <?php if (get_option('dm_ts_home_layout') == 'Blog Classic') { ?>
            <?php
            include("dm.blog.classic.php");
            ?>
    <?php } elseif (get_option('dm_ts_home_layout') == 'Blog Modern') { ?>
            <?php
            include("dm.blog.modern.php");
            ?>
    <?php } elseif (get_option('dm_ts_home_layout') == 'Homepage Corporate') { ?>
            <?php
            $page_id2 = get_option( 'dm_ts_home_pg' );
            //show_post($page_id2);
            echo '<div class="twoThirds"></p>
           
            <div class="icon48"><img src=" /gfx/icon_case.png" alt="Our Clients" width="48" height="48" /></div><div class="titleSubtitle"><h2 class="h2Blue">Our Clients&#8230;</h2><h5 class="h5regular"></h5></div><div class="clearfix"></div><p class="iconPar"></p> 
<p>Our clients include some of the leading real estate, construction, and business corporations<br>in Rhode Island and Massachusetts</p> 
<p>&nbsp;</p> 
 
<h3>Blackstone Smithfield Corporation  |  Bucci Development, Inc.</h3>
<h3>Capital Associates, Inc.  |  Cullion Concrete</h3>

<h3>Rhode Island Builders Association  |  Smithfield Peat Co., Inc.</h3>

<h3>Cashman Equipment Corp  |  Paolino Properties</h3>

<p></div> 
<div class="oneThirdLast"></p> 
            <div class="icon48"><img src=" /gfx/icon_news.png" alt="In The News" width="48" height="48" /></div><div class="titleSubtitle"><h2 class="h2Blue">In The News&#8230;</h2><h5 class="h5regular"></h5></div><div class="clearfix"></div><p class="iconPar"></p>
<p>';
            $args = array( 'numberposts' => 1, 'category' => 7 );
            $postslist = get_posts( $args );
            foreach ($postslist as $post){
                setup_postdata($post);
                echo '<div><h3>' . get_the_title() .'</h3>' . get_the_date() . '<br />';
                //echo preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', get_the_excerpt());
                echo get_the_excerpt() . '<br />';
                echo '<div class="mediumButton"><a href="'; the_permalink(); echo '">Read more...</a></div>';
                echo '</div>';
            }
            echo '</div><div class="clearfix"></div> ';
            ?>
    <?php } elseif (get_option('dm_ts_home_layout') == 'Homepage Mix Classic') { ?>
            <?php
            $page_id2 = get_option( 'dm_ts_home_pg' );
            show_post($page_id2);
            ?><br/><br/><div class="separatorBC40"></div><?php
            include("dm.blog.classic.php");
            ?>
    <?php } elseif (get_option('dm_ts_home_layout') == 'Homepage Mix Modern') { ?>
            <?php
            $page_id2 = get_option( 'dm_ts_home_pg' );
            show_post($page_id2);
            ?><br/><br/><div class="separatorBC40"></div><?php
            include("dm.blog.modern.php");
            ?>
    <?php } else { ?>
            <?php
            $page_id2 = get_option( 'dm_ts_home_pg' );
            show_post($page_id2);
            ?>
    <?php } ?>
</div>    
</div>
</div>
<?php get_footer(); ?>