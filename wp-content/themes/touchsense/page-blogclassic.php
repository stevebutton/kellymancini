<?php
/*
Template Name: Blog Classic
*/
?>

<?php get_header(); ?>

<div id="breadcrumbs">
    <div id="DMbreadcumbs"><?php dm_breadcrumbs(); ?></div>
</div>
<div id="singleTitle">
    <div id="theTitle" style="width: <?php if (get_option('dm_ts_search') == 'Yes') { echo '650px'; } else { echo '900px; margin-right: 40';} ?>">
        <h1><?php single_post_title(); ?></h1>
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
<?php 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$wp_query = new WP_Query('post_type=post&paged=' . $paged);
?>
<div id="blogWrap">
    <?php if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
    <?php 
        global $more;    
        $more = 0; 
    ?>
    <?php $thumb_size = get_post_custom_values("thumb_sel"); ?>
    <?php
    $categories = '';
    foreach((get_the_category()) as $category) {
        $categories = $categories.", ".$category->cat_name;
    }
    if ((strlen($categories)) > 20) {$class = 'categories';} else {$class = 'categoriesS';}
    ?>
    
    
    
    <?php /*the layout*/
    if(has_post_thumbnail() && $thumb_size[0] == "half" ) { ?>
        <div class="postWrap">
            <div class="thumbnail">
                <div class="commentsNr"><span><a href="<?php comments_link(); ?>"><?php comments_number('0','1','%'); ?></a></span></div>
                <?php $thumb = get_post_thumbnail_id();
                $image = vt_resize( $thumb,'' , 280, 200, true ); ?>
                <a href="<?php the_permalink(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/thumb_small.jpg" width="280" height="200" alt="<?php the_title(); ?>" class="thumb_cover" />
                <img src="<?php echo $image['url']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" alt="<?php the_title(); ?>" />
                </a>
            </div>
            <div class="postExcerpt">
                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                <div class="metadata"><div class="thedate"><?php the_time('M j, Y') ?></div> <div class="catWrap"> <div class="<?php echo $class; ?>"> <?php the_category(', ') ?><br/> <br/> </div></div></div>
                <div class="clearfix"></div>
                <?php if (get_option("dm_ts_blog_shrt") == "Yes") { ?>
                
                <?php the_content(''); ?>
                
                <?php } else { ?>
                
                <?php   $content =  strip_shortcodes( get_the_content('') );
                $content = strip_tags($content, '<a>');   ?>
                <?php echo "<p>".$content."</p>"; }; ?>
                
                <?php if ($pos=strpos($post->post_content, '<!--more-->')) { ?>
                <a href="<?php the_permalink() ?>" class="mediumButton"><span><?php echo get_option('dm_ts_tr_rm'); ?></span></a>
                <?php } ?>
            </div>
            <div class="clearfix"></div>
        </div>
    <?php } elseif (has_post_thumbnail() && $thumb_size[0] == "full") { ?>
        <div class="postWrap">
            <h1 class="fwh1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <div class="thumbnailFW">
                <div class="commentsNr"><span><a href="<?php comments_link(); ?>"><?php comments_number('0','1','%'); ?></a></span></div>
                <?php $thumb = get_post_thumbnail_id();
                $image = vt_resize( $thumb,'' , 590, 200, true ); ?>
                <a href="<?php the_permalink(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/thumb_big.jpg" width="590" height="200" alt="<?php the_title(); ?>" class="thumb_cover" />
                <img src="<?php echo $image['url']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" alt="<?php the_title(); ?>" />
                </a>
            </div>        
            <div class="postExcerptFW">
                <div class="metadata"><div class="thedate"><?php the_time('M j, Y') ?></div> <div class="catWrap"> <div class="categoriesS"> <?php the_category(', ') ?><br/> <br/> </div></div></div>
                <div class="clearfix"></div>
                <?php if (get_option("dm_ts_blog_shrt") == "Yes") { ?>
                
                <?php the_content(''); ?>
                
                <?php } else { ?>
                
                <?php   $content =  strip_shortcodes( get_the_content('') );
                $content = strip_tags($content, '<a>');   ?>
                <?php echo "<p>".$content."</p>"; }; ?>
                <?php if ($pos=strpos($post->post_content, '<!--more-->')) { ?>
                <a href="<?php the_permalink() ?>" class="mediumButton"><span><?php echo get_option('dm_ts_tr_rm'); ?></span></a>
                <?php } ?>
            </div>
        </div>
    <?php } else { ?>
        <div class="postWrap">
            <h1 class="fwh1 h1nt"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <div class="postExcerptFW">
                <div class="metadata"><div class="thedate"><?php the_time('M j, Y') ?></div> <div class="catWrap"> <div class="categoriesS"> <?php the_category(', ') ?><br/> <br/> </div></div></div>
                <div class="clearfix"></div>
                <?php if (get_option("dm_ts_blog_shrt") == "Yes") { ?>
                
                <?php the_content(''); ?>
                
                <?php } else { ?>
                
                <?php   $content =  strip_shortcodes( get_the_content('') );
                $content = strip_tags($content, '<a>');   ?>
                <?php echo "<p>".$content."</p>"; }; ?>
                <?php if ($pos=strpos($post->post_content, '<!--more-->')) { ?>
                <a href="<?php the_permalink() ?>" class="mediumButton"><span><?php echo get_option('dm_ts_tr_rm'); ?></span></a>
                <?php } ?>
            </div>
        </div>
    <?php }; ?>        
    <?php        
    if( ($wp_query->current_post + 1) < ($wp_query->post_count) ) {
        echo("<div class='separatorBC'></div>");
    } 
    ?>
        
        
    <?php $categories = ''; ?>       
    <?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
    <?php if (  $wp_query->max_num_pages > 1 ) { 
        dm_pagination();
    }; ?>
</div>
 <?php get_sidebar(); ?>
<div class="clearfix"></div>
</div>

<?php get_footer(); ?>