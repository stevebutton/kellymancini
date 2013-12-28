<?php
/*
Template Name: Blog Modern
*/
?>

<?php get_header(); ?>

<?php /*?><div id="breadcrumbs">
    <div id="DMbreadcumbs"><?php dm_breadcrumbs(); ?></div>
</div><?php */?>
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
    <?php $counter = 1; ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
    <?php if ($counter % 2 == 0) {$float = 'right';} else  {$float = 'left';} ?>
    
    
    
    <?php /*the layout*/
    if(has_post_thumbnail() ) { ?>
        <div class="postWrapModern" style="float:<?php echo $float; ?>">
            <h1 class="news"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <div class="thumbnail nofloatimg">
                <div class="commentsNr"><span><a href="<?php comments_link(); ?>"><?php comments_number('0','1','%'); ?></a></span></div>
                <?php $thumb = get_post_thumbnail_id();
                $image = vt_resize( $thumb,'' , 280, 140, true ); ?>
                <a href="<?php the_permalink(); ?>">
                <!--<img src="<?php echo get_template_directory_uri(); ?>/images/thumb_modern.jpg" width="280" height="140" alt="<?php the_title(); ?>" class="thumb_cover" />-->
                <img src="<?php echo $image['url']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" alt="<?php the_title(); ?>" />
                </a>
            </div>
            <div class="postExcerpt nofloat">
                <div class="metadata"><div class="thedate"><?php the_time('M j, Y') ?></div> <div class="catWrap"> <div class="<?php echo $class; ?>"> <?php the_category(', ') ?><br/> <br/> </div></div></div>
                <div class="clearfix"></div>
                <?php if (get_option("dm_ts_blog_shrt") == "Yes") { ?>
                
                <?php the_excerpt(); ?>
                <?  } else { ?>
                
                <?php   $content = strip_shortcodes( get_the_excerpt() ); //strip_shortcodes( get_the_content('') );
                $content = strip_tags($content, '<a>');   ?>
                <?php echo "<p>".$content."</p>"; }; ?>
                <?php if ($pos=strpos($post->post_content, '<!--more-->')) { ?>
                <?php } ?>
                <a href="<?php the_permalink() ?>" class="mediumButton"><span><?php echo get_option('dm_ts_tr_rm'); ?></span></a>
            </div>
        </div>
    <?php } else { ; ?>
        <div class="postWrapModern" style="float:<?php echo $float; ?>">
            <h1 class="news"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <div class="postExcerpt nofloat">
                <div class="metadata"><div class="thedate"><?php the_time('M j, Y') ?></div> <div class="catWrap"> <div class="<?php echo $class; ?>"> <?php the_category(', ') ?><br/> <br/> </div></div></div>
                <div class="clearfix"></div>
                <?php if (get_option("dm_ts_blog_shrt") == "Yes") { ?>
                
                <?php the_excerpt(); ?>
                
                <?php } else { ?>
                
                <?php   $content =  strip_shortcodes( get_the_excerpt() );
                $content = strip_tags($content, '<a>');   ?>
                <?php echo "<p>".$content."</p>"; }; ?>
                <?php if ($pos=strpos($post->post_content, '<!--more-->')) { ?>
                <a href="<?php the_permalink() ?>" class="mediumButton"><span><?php echo get_option('dm_ts_tr_rm'); ?></span></a>
                <?php } ?>
            </div>
        </div>
    <?php }; ?>        
    <?php        
    if( ($counter % 2 == 0) &&  (($wp_query->current_post + 1) < ($wp_query->post_count)) ) {
        echo("<div class='clearfix'></div><div class='separatorBC'></div>");
    } 
    ?>
    
    
    
    
        
    <?php $counter++; ?>
    <?php $categories = ''; ?>
    <?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
    <div class='clearfix'></div>
    <?php if (  $wp_query->max_num_pages > 1 ) { 
          dm_pagination();
    }; ?>
</div>
 <?php get_sidebar("blogmodern"); ?>
<div class="clearfix"></div>
</div>

<?php get_footer(); ?>