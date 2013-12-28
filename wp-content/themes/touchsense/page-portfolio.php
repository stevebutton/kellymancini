<?php
/*
Template Name: Portfolio
*/
portfolioScripts();
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
<div id="bodyWrapperSingle" <?php if (get_option("dm_ts_pfolio_layout") == "3 Columns") {echo 'class="nopaddgins"';} ?>>
        <div id="blogWrapFW">
            <?php if (get_option("dm_ts_pfolio_layout") == "1 Column") { ?>
            <?php $postsperpage = get_option("dm_ts_pfolio_count"); ?>
                <?php
                $args = array( 'post_type' => 'portfolio', 'posts_per_page' => $postsperpage, 'paged'=>$paged  );
                $dm_portfolio = new WP_Query( $args );
                while ( $dm_portfolio->have_posts() ) : $dm_portfolio->the_post();
                ?>
                <?php
                $portfoliothumbnail = get_post_meta($post->ID, 'thumbnailurl', true); 
                $portfolioimage = get_post_meta($post->ID, 'fullsizeurl', true);
                $portfoliodescription = get_post_meta($post->ID, 'portfoliodesc', true);         
                ?>
                <div class="pfolioItemWrap">
                    <?php if ($portfoliothumbnail)  { ?>
                    <div class="pfolioThumbBig">
                        <a rel="prettyPhoto" href="<?php echo $portfolioimage; ?>" title="">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/pfolio_cover.jpg" width="590" height="300" alt="<?php the_title(); ?>" class="thumb_cover" />
                            <img src="<?php echo $portfoliothumbnail; ?>" alt="<?php echo the_title(); ?>" title="<?php echo the_title(); ?>" />
                        </a>
                    </div>
                    <?php } ?>
                    <div class="pfolioDesc">
                        <a href="<?php the_permalink() ?>" ><h1><?php echo the_title(); ?></h1></a>
                        <div class="termsP"> <?php $cs_terms = get_the_term_list( $post->ID, 'types', '', ', ' ); echo strip_tags($cs_terms);  ?></div>
                        <div class="clearfix"></div>
                        <p><?php echo $portfoliodescription; ?> </p>
                        <a href="<?php the_permalink() ?>" class="mediumButton" ><span><?php echo get_option("dm_ts_tr_viewproj"); ?></span></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <?php        
                if( ($dm_portfolio->current_post + 1) < ($dm_portfolio->post_count) ) {
                    echo("<div class='separatorBC40'></div>");
                } 
                ?>
                <?php endwhile; ?>
                
                <?php if (  $dm_portfolio->max_num_pages > 1 ) { 
                    dm_pagination_pfolio();
                }; ?>
            <?php } else { ?>
                <div id="filterButtons">
                    <a href="#" class="mediumButton" rel="all">All</a> 
                    <?php $terms = get_terms('types');     
                    foreach ( $terms as $term ) {
                    echo '<a href="#" class="mediumButton" rel="'. $term->slug .'">'. $term->name.'</a>';
                    } ?>
                </div>
                <div class="separator2038"></div>
                <!--DESCRIPTION-->
	                <span class="arnaud-title all">The MAK Team</span>
                    <span class="arnaud-descr all">Knowledgeable, experienced, focused, tenacious.  These are just a few of the attributes shared by the MAK legal professionals who dedicate themselves to your success. Click on a picture to read a bio or use the buttons above to view our team by areas of specialization.</span>
                    <?php $terms = get_terms('types');     
                    foreach ( $terms as $term ) {
					echo '<span class="arnaud-title '.$term->slug.'">'.$term->name.'</span>';
                    echo '<span class="arnaud-descr '.$term->slug.'">'.$term->description.'</span>';
                    } ?>
                    <div class="separator2038"></div>
                <div class="portthumbwrap">
                <ul class="portfolio-list">
                    <?php
                    $counter = 1;
                    $args = array( 'post_type' => 'portfolio', 'posts_per_page' => 999 );
                    $loop = new WP_Query( $args );
                    while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <?php $portfoliothumbnail = get_post_meta($post->ID, 'thumbnailurl', true); ?>
                    <?php $portfolioimage = get_post_meta($post->ID, 'fullsizeurl', true); ?>
                    <?php $portfoliodescription = get_post_meta($post->ID, 'portfoliodesc', true); ?>
                    <li class="portfolio_wrap_small <?php
                               
                        $terms = get_the_terms( $post->ID , 'types' );
                        if ($terms) {
                            foreach ( $terms as $term ) {
                               echo $term->slug . ' ';  
                            };

                        }
                    ?>">
                               
                        
                            <?php if ($portfoliothumbnail)  { ?>
                            <div class="pfolioThumbSmall">
                            <a href="<?php the_permalink(); ?>" title="" >
                            <!--<img src="<?php echo get_template_directory_uri(); ?>/images/pfolio_coversmall.jpg" width="280" height="140" alt="<?php the_title(); ?>" class="thumb_cover" />-->
                            <img src="<?php echo $portfoliothumbnail; ?>" alt="<?php echo the_title(); ?>" width="280" height="140" />
                            </a>
                            </div>
                            <a href="<?php the_permalink() ?>"><h1><?php  the_title();?></h1></a>
                            <?php } ?>
                        <div class="potfolioDescDesc">
                            <div class="termsP"> <?php $cs_terms = get_the_term_list( $post->ID, 'types', '', ', ' ); echo strip_tags($cs_terms);  ?></div>
                            <?php echo $portfoliodescription; ?><br/>
                            <a href="<?php the_permalink() ?>" class="mediumButton"><span><?php echo get_option("dm_ts_tr_viewproj"); ?></span></a>
                        </div>
                    </li>
    <?php if ($counter % 3 == 0) echo '';?>
    <?php $counter++; endwhile; ?>

     </ul>
                
            </div><?php } ?>
    <div class="clearfix"> </div>
    </div>
    <div class="clearfix"> </div>
</div>

<?php get_footer(); ?>