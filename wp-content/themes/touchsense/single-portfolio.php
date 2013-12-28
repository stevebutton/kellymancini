<?php get_header(); ?>
<?php /*?><div id="breadcrumbs">
    <div id="DMbreadcumbs"><?php dm_breadcrumbs(); ?></div>
</div><?php */?>
                

<div id="singleTitle">
    <div id="theTitle" style="width: <?php if (get_option('dm_ts_search') == 'Yes') { echo '650px'; } else { echo '900px; margin-right: 40';} ?>">
        <h1><?php echo get_option("dm_ts_tr_pfolio_title"); ?></h1>
        <?php $this_title = single_post_title('', false); ?>
    </div>
    <?php if (get_option('dm_ts_search') == 'Yes') { ?>
        <div id="searchW">
            <form role="search" method="get" id="searchform" action="<?php echo home_url(); ?>" >
                <div><input type="text" value="" name="s" id="s" class="CS_searchform" onfocus="" /><input type="submit" id="searchsubmit" value="" class="CS_searchform_button" />
                </div>
            </form>    
        </div>
    <?php }; ?>
    <div class="clearfix"></div>
</div>

        <?php $display_navigation = get_post_meta($post->ID, 'navigation_true', true); ?>
        <?php if ($display_navigation == 'no') { ?>
        <div id="bodyWrapperSingle">
            <div id="blogWrapFW">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
            <div id="contSingle"><?php the_content(); ?></div>
                                   
            <?php endwhile; else: ?>
            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
            </div>
            <div class="clearfix"> </div>
        </div>
        <?php } else { ?>
        <div id="bodyWrapperSingleNav">
            <div id="side_nav">
              <!--<div id="side_nav_title"><h2>Our Works</h2></div>-->
              <ul>
                <?php
                $items_count = get_post_meta($post->ID, 'items_count', true);
                if ($items_count == 'all') {$items_count = 999;};
                $args = array( 'post_type' => 'portfolio', 'posts_per_page' => $items_count );
                $dm_portfolio = new WP_Query( $args );
                while ( $dm_portfolio->have_posts() ) : $dm_portfolio->the_post();
                ?>
                    <li class="
                    <?php if ($this_title == get_the_title()) {echo 'activeNav';} ?>
                    "><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php endwhile; ?>
              </ul>
              <!--<div class="bigButton"><a href="/legal-team/">Back to Our Team</a></div>-->
              <?php if ( !function_exists('dynamic_sidebar')  
                    || !dynamic_sidebar( 'leg-tm-l' ) ) : ?>   
                <?php endif; ?>
            </div>
            
            <div id="side_cont">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
                <?php the_content(); ?>
                                       
                <?php endwhile; else: ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                <?php endif; ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <?php }?>


<?php get_footer(); ?>