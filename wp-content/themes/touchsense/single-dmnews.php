<?php get_header(); ?>
<!--<div id="breadcrumbs">
    <div id="DMbreadcumbs"><?php //dm_breadcrumbs(); ?></div>
</div>-->
                

<div id="singleTitle">
    <div id="theTitle" style="width: <?php if (get_option('dm_ts_search') == 'Yes') { echo '650px'; } else { echo '900px; margin-right: 40';} ?>">
        <h1>In The News<!--<?php echo get_option("dm_ts_tr_latestnews"); ?>--></h1>
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
 <div id="bodyWrapperSingleNav">
            <div id="side_nav">
              <div id="side_nav_title"><h2><?php echo get_option("dm_ts_tr_othernews"); ?></h2></div>
              <ul>
                <?php
                $args = array( 'post_type' => 'dmnews', 'posts_per_page' => 10, 'paged'=>$paged );
                $dm_news = new WP_Query( $args ); ?>
                <?php if (  $dm_news->max_num_pages > 1 ) {
                    if (empty($paged)) {$paged = 1;};
                    
                     if($paged > 1 ) {echo "<li><a href='".get_pagenum_link($paged-1)."' >".get_option('dm_ts_tr_recentnews')."</a></li>";};
                }; ?>                 
                <?php while ( $dm_news->have_posts() ) : $dm_news->the_post();
                ?>
                    <li class="
                    <?php if ($this_title == get_the_title()) {echo 'activeNav';} ?>
                    "><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <div class="thedateSide"><?php the_time('M j, Y') ?></div>
                    </li>
                <?php endwhile; ?>
                <?php if (  $dm_news->max_num_pages > 1 ) {
                    if (empty($paged)) {$paged = 1;};
                    
                     if($paged < $dm_news->max_num_pages ) {echo "<li><a href='".get_pagenum_link($paged+1)."' >".get_option('dm_ts_tr_oldernews')."</a></li>";};
                }; ?>
                </ul>
            </div>
            
            <div id="side_cont">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <h1><?php the_title(); ?></h1>
                <div class="thedateOnly"><?php the_time('M j, Y') ?></div>
                <?php the_content(); ?>
                                       
                <?php endwhile; else: ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                <?php endif; ?>
            </div>
            <div class="clearfix"></div>
        </div>

<?php get_footer(); ?>