<?php get_header(); ?>
<?php $title = get_post_custom_values("title_sel"); ?>


<div id="singleTitle">
    <div id="theTitle" style="width: <?php if (get_option('dm_ts_search') == 'Yes') { echo '650px'; } else { echo '900px; margin-right: 40';} ?>">
        <h1><?php single_cat_title(); ?></h1>
        <blockquote>Browse the latest news on K&amp;M and its clients, or view news<br/>by the categories listed in the right-hand menu.</blockquote>
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
    if (get_option('dm_ts_cat_layout') == 'Blog Classic') {
        include("dm.blog.classic.php");
    } elseif (get_option('dm_ts_cat_layout') == 'Blog Modern') {                     
        include("dm.blog.modern.php");
    };
    ?>
</div>

<?php get_footer(); ?>