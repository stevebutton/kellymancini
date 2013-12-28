<div id="blogWrap">

    <?php if (is_author()) { ?>
            <div id="aboutAuthor">
                    <div id="authorBoxx" style="margin-top: 0px !important;">
                        <div id="authorAvatar">
                            <?php echo get_avatar($post->post_author, 60); ?>
                        </div>
                        <div id="authorInfo">
                            <h3><?php echo $curauth->display_name; ?></h3>
                            <p><?php echo $curauth->description; ?></p>
                        </div>
                        <div class="clearfix"></div>
                </div>
        </div>
    <?php }; ?>    
    <?php $counter = 1; ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
            <h2 class="fwh1m"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="thumbnail nofloatimg">
                <div class="commentsNr"><span><a href="<?php comments_link(); ?>"><?php comments_number('0','1','%'); ?></a></span></div>
                <?php $thumb = get_post_thumbnail_id();
                $image = vt_resize( $thumb,'' , 280, 140, true ); ?>
                <a href="<?php the_permalink(); ?>">
                <!--<img src="<?php echo get_template_directory_uri(); ?>/images/thumb_modern.jpg" width="280" height="140" alt="<?php the_title(); ?>" class="thumb_cover" />-->
                <img src="<?php echo $image['url']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" alt="<?php the_title(); ?>" />
                </a>
            </div>
            test
            <div class="postExcerpt nofloat">
                <div class="metadata"><div class="thedate"><?php the_time('M j, Y') ?></div> <div class="catWrap"> <div class="<?php echo $class; ?>"> <?php the_category(', ') ?><br/> <br/> </div></div></div>
                <div class="clearfix"></div>
                <?php if (get_option("dm_ts_blog_shrt") == "Yes") { ?>
                
                <?php the_content(''); ?>
                
                <?php } else { ?>
                
                <?php   $content =  strip_shortcodes( get_the_content('') );
                $content = strip_tags($content, '<a>');   ?>
                <?php echo "<p>".$content."</p>"; }; ?>
                <?php if ($pos=strpos($post->post_content, '<!--more-->')) { ?>
                <?php } ?>
                <a href="<?php the_permalink() ?>" class="mediumButton"><span><?php echo get_option('dm_ts_tr_rm'); ?></span></a>
            </div>
        </div>
    <?php } else { ; ?>
        <div class="postWrapModern" style="float:<?php echo $float; ?>">
            <h1 class="fwh1m h1nt"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <div class="postExcerpt nofloat">
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
 <?php get_sidebar('blogmodern'); ?>
<div class="clearfix"></div>