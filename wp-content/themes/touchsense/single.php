<?php get_header(); ?>
<?php $title = get_post_custom_values("title_sel"); ?>
<!--<div id="breadcrumbs">
    <div id="DMbreadcumbs"><?php //dm_breadcrumbs(); ?></div>
</div>-->
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php
    $categories = '';
    $is_news = 0;
    foreach((get_the_category()) as $category) {
        if ($category->cat_name == "News") { $is_news = 1; }
        $categories = $categories.", ".$category->cat_name;
    }
    $categories = $categories . $is_news;
    if ((strlen($categories)) > 67) {$class = 'categories';} else {$class = 'categoriesS';};
    ?>
<div id="singleTitle">
    <div id="theTitle" style="width: <?php if (get_option('dm_ts_search') == 'Yes') { echo '650px'; } else { echo '900px; margin-right: 40';} ?>">
        <h1>In The News<!--<?php if ($title[0]) {echo $title[0]; } else { the_title(); } ?>--></h1>
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
        <div id="blogWrap">     
            
        <h2><?php the_title(); ?></h2>
        <div class="metadata marginB"><div class="thedate"><?php the_time('M j, Y') ?></div> <div class="catWrap"> <div class="<?php echo $class; ?>"> <?php the_category(', ') ?><br/> <br/> </div></div>        <div class="clearfix"> </div></div>
        <?php if ( has_post_thumbnail() && (get_option('dm_ts_thumb_disp') == 'Yes') ) { ?>
        <div class="thumbnailSingle">
                <div class="commentsNr"><span><?php comments_number('0','1','%'); ?></span></div>
                <?php $thumb = get_post_thumbnail_id();
                $image = vt_resize( $thumb,'' , 590, 200, true ); ?>
                <img src="<?php echo $image['url']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" alt="<?php the_title(); ?>" />
        </div>
        <?php };  ?>
        
        <div id="contSingleBlog"><?php the_content(); ?></div>
        
      <?php /*?>  <?php if (get_option('dm_ts_auth_disp') == 'Yes') { ?>
        <div id="aboutAuthor">
                    <h2><?php echo get_option('dm_ts_tr_ata'); ?></h2>
                    <div id="authorBoxx">
                        <div id="authorAvatar">
                            <?php echo get_avatar($post->post_author, 60); ?>
                        </div>
                        <div id="authorInfo">
                            <h3><?php the_author_posts_link(); ?></h3>
                            <p><?php the_author_meta('user_description'); ?></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
        </div>
        <?php }; ?><?php */?>
        
        <?php if (has_tag()) { ?>
        <div id="tagsSingle">
            <div class="dmtagcloud"><p><?php echo get_option('dm_ts_tr_tg'); ?></p><?php the_tags('', '', ''); ?><div class="clearfix"></div></div>   
        </div>
        <?php }; ?>
        
    <?php /*?>    <?php comments_template(); ?> <?php */?>
        
        
        <?php $categories = ''; ?>                         
        <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
    </div>
    <?php if ($is_news == 1) { get_sidebar("blogmodern"); } else { get_sidebar("blogmodern"); } ?>
    <div class="clearfix"> </div>
</div>

<?php get_footer(); ?>