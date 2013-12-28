<?php

define('MANAGER_URI', get_template_directory_uri() . '/dmslider');

add_action('admin_menu', 'manager_admin_menu');
add_action('admin_init', 'manager_init');

global $slides;

if(get_option('slides')) {
	$slides = get_option('slides');
} else {
	$slides = false;	
}


//function that will output the actual code
function dm_slider() {
	
  	$slides = get_option('slides'); 
	?>
	<?php if ($slides) { ?>
	<div id="wrapFirstDM"><div id="wrapperDMfix"><div id="dm_slider_rel">
		<div id="dm_slider_images">
			
				<?php foreach($slides as $num => $slide) : 
				if ($slide['link']) {
					echo "<a href='".$slide['link']."'> <img src='".$slide['src']."' alt='".$slide['title']."' /> </a>";
				}
				else {
					echo "<img src=' ".$slide['src']." '  /> ";
				}
				endforeach; ?>
			
		</div>
		<div id="dm_slider_tabs_wrapper">
                <div id="tabsHide">
			<?php foreach($slides as $num => $slide) : ?>
			<div class="dm_slider_tab">
			<div class="timeLineDM"></div>
			<?php $title = $slide['title'];
			$titlelen = -(strlen($title) - 39);
			if (strlen($title) >39) {$title = substr($title, 0, 34 ).'...'; } ?>
                        <div class="dm_slider_tabtitle"><h1 class="shorttitle_dms"><?php echo $title;  ?></h1><h1 class="fulltitle_dms"><?php echo $slide['title'];  ?></h1></div>
                        <div class="dm_slider_play dm_play_notactive"> </div>
                        <p>
			<?php echo $slide['caption'];  ?>
			<?php if ($slide['link']) { ?> <span class="dm_slider_learnmore"><a href="<?php echo $slide['link']; ?>"><?php echo get_option('dm_ts_tr_lm'); ?></a></span> <?php ; } ?>
			</p>
			</div>
			<?php endforeach; ?>
		</div>
		</div>
	</div></div></div>
	<?php }; ?>
<?php

}

function dm_nivo_slider() {
	
  	$slides = get_option('slides'); 
	?>
	
	<?php if ($slides) { ?>	
		<?php foreach($slides as $num => $slide) : ?>
		<?php if ($slide['link']) {echo '<a href="'.$slide['link'].'">';} ?>
		<img src="<?php echo $slide['src']; ?>" <?php if ($slide['title']) {echo 'title="'.$slide['title'].'"';} ?> <?php if ($slide['caption']) {echo 'rel="'.$slide['caption'].'"';} ?> />
		<?php if ($slide['link']) {echo '</a>';} ?>
		<?php endforeach; ?>
	<?php }; ?>
<?php

}

// admin menu
function manager_admin_menu() {
	
	if(isset($_GET['page']) && $_GET['page'] == 'slidermanager') {
		
		if(isset($_POST['action']) && $_POST['action'] == 'save') {
			
			$slides = array();
			
			foreach($_POST['src'] as $k => $v) {
				$slides[] = array(
					'src' => $v,
					'link' => $_POST['link'][$k],
					'caption' => stripslashes($_POST['caption'][$k]),
					'title' => stripslashes($_POST['title'][$k])
				);
			}
			
			update_option('slides', $slides);
			
		}
		
	}
	
		add_menu_page('Homepage Slides', 'Homepage Slides', 'edit_themes', 'slidermanager', 'manager_wrap');	
}


// slider manager wrapper
function manager_wrap() {
	global $slides;
?>

	<div class="wrap" id="manager_wrap">
	
		<h2>Slider Manager</h2>
		
		<form action="" id="manager_form" method="post">
		
			<ul id="manager_form_wrap">
			
			<?php if(get_option('slides')) : ?>
				<?php $slides = get_option('slides'); ?>
				<?php foreach($slides as $k => $slide) : ?>
			
				
				<li class="slide">
					
					<label>Image Source <span>(required)</span></label>
					<input type="text" name="src[]" class="slide_src" value="<?php echo $slide['src'] ?>">
					
					<label>Slide Link</label>
					<input type="text" name="link[]" id="slide_link" value="<?php echo $slide['link'] ?>">

					<label>Slide Title</label>
					<input type="text" name="title[]" id="slide_title" value="<?php echo $slide['title'] ?>">
					
					<label>Slide Description</label>
					<textarea name="caption[]" cols="20" rows="2" class="slide_caption"><?php echo $slide['caption'] ?></textarea>
					
					<button class="remove_slide button-secondary">Remove This Slide</button>
					
				</li>
				
				<?php endforeach; ?>
				
			<?php else : ?>
			
				<li class="slide">
					
					<label>Image Source <span>(required)</span></label>
					<input type="text" name="src[]" class="slide_src">
					
					<label>Slide Link</label>
					<input type="text" name="link[]" id="slide_link">

					<label>Slide Title</label>
					<input type="text" name="title[]" id="slide_title" >
					
					<label>Slide Description</label>
					<textarea name="caption[]" cols="20" rows="2" class="slide_caption"></textarea>
					
					<button class="remove_slide button-secondary">Remove This Slide</button>
					
				</li>
				
			<?php endif; ?>
			
			</ul>
			
			<input type="submit" value="Save Changes" id="manager_submit" class="button-primary">
			<input type="hidden" name="action" value="save">
			
		</form>
		
	</div>

<?php
	
}
function dm_slider_init() {
	
    if (!(is_admin()) && get_option('dm_ts_slider') == "DM Slider" ) {
	$themedir = get_template_directory_uri()."/";
        wp_register_script( 'dm-slider', $themedir.'dmslider/jquery.dmslider.min.js', false, '1.0');
        wp_enqueue_script( 'dm-slider' );
	wp_register_script( 'jquery-background-position', $themedir.'dmslider/js/jquery.backgroundposition.js', false, '1.2.2');
        wp_enqueue_script( 'jquery-background-position' );
	
	wp_register_style( 'dm-slider-css', $themedir.'dmslider/style.css', false, '1.4.8');
	wp_enqueue_style('dm-slider-css');
    }
}

function dm_nivo_slider_init() {
	wp_enqueue_script('dm-nivo-slider');
	wp_enqueue_style('nivo-css');
}
	add_action('init', 'dm_slider_init');
	add_action('init', 'dm_nivo_slider_init');
	
// slider manager init
function manager_init() {
	
	if(isset($_GET['page']) && $_GET['page'] == 'slidermanager') {
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script('jquery-appendo', MANAGER_URI . '/js/jquery.appendo.js', false, '1.0', false);
		wp_enqueue_script('slider-manager', MANAGER_URI . '/js/manager.js', false, '1.0', false);
		wp_enqueue_style('slider-manager', MANAGER_URI . '/css/manager.css', false, '1.0', 'all');
		
	}
}



?>