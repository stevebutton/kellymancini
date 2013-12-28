<?php get_header(); ?>
<?php /*?><div id="breadcrumbs">
    <div id="DMbreadcumbs"><?php dm_breadcrumbs(); ?></div>
</div><?php */?>

<div id="singleTitle">
    <div id="theTitle" style="width: <?php if (get_option('dm_ts_search') == 'Yes') { echo '650px'; } else { echo '900px; margin-right: 40';} ?>">
        <h1><?php echo get_option('dm_ts_tr_srch') ?></h1>
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
<div id="bodyWrapperSingle">
        <div id="blogWrapFW">
        <h1> Search results for "<?php the_search_query(); ?>" </h1>
        <br/>
        <div class="separator40"></div>
        
        <div id="contSingle">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
        <h3><a href="<?php the_permalink(); ?>" style="text-decoration: none;"><?php the_title(); ?></a></h3>
        <?php the_excerpt(); ?><br/>
        <div class="separatorBC40"></div> 
                               
        <?php endwhile; else: ?>
        </div>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
    </div>
    <div class="clearfix"> </div>
</div></div>

<?php get_footer(); ?>