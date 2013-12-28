<?php
/*
Template Name: Full-Width Page
*/
?>

<?php get_header(); ?>
<div id="breadcrumbs">
    <div id="DMbreadcumbs"><?php dm_breadcrumbs(); ?></div>
</div>
                

<div id="singleTitle">
    <div id="theTitle" style="width: <?php if (get_option('dm_ts_search') == 'Yes') { echo '650px'; } else { echo '900px; margin-right: 40';} ?>">
        <h1>Page doesn't exist</h1>
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
            <div id="contSingle" style=" text-align: center;">
            <h1>404 error</h1>
            <h3>The page you were looking can' be found or doesn't exist anymore.</h3>
            <div class="clearfix"></div></div>
        </div>
    <div class="clearfix"> </div>
</div>

<?php get_footer(); ?>