<?php
class dm_Widget_Most_Comments extends WP_Widget {

	function dm_Widget_Most_Comments() {
		$widget_ops = array('classname' => 'dm_most_comments', 'description' => __( 'The most commented posts on your blog.' ) );
		$this->WP_Widget('dm_most_comments', __('TouchSense Most Commented Posts.'), $widget_ops);
		$this->alt_option_name = 'dm_most_comments';

		if ( is_active_widget(false, false, $this->id_base) )
			add_action( 'wp_head', array(&$this, 'recent_comments_style') );

		add_action( 'comment_post', array(&$this, 'flush_widget_cache') );
		add_action( 'transition_comment_status', array(&$this, 'flush_widget_cache') );
	}

	function recent_comments_style() { ?>
	<style type="text/dms">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
<?php
	}

	function flush_widget_cache() {

		wp_cache_delete('dm_most_comments', 'widget');
	}

	function widget( $args, $instance ) {
		global $comments, $comment;

		$cache = wp_cache_get('dm_most_comments', 'widget');

		if ( ! is_array( $cache ) )
			$cache = array();

		if ( isset( $cache[$args['widget_id']] ) ) {
			echo $cache[$args['widget_id']];
			return;
		}

 		extract($args, EXTR_SKIP);
 		$output = '';
 		$title = apply_filters('widget_title', empty($instance['title']) ? __('TouchSense Most Commented Posts') : $instance['title']);

		if ( ! $number = (int) $instance['number'] )
 			$number = 5;
 		else if ( $number < 1 )
 			$number = 1;
			
			$settings = array (
	'orderby' => 'comment_count',
	'posts_per_page' => $number,
	'post__not_in' => array (72)
);
?>

		<?php echo $before_widget; ?>
		<?php if ( $title ) echo $before_title . $title . $after_title; ?>
<ul class="most_commented">
	<?php $popular = new WP_Query($settings); ?>
	<?php while ($popular->have_posts()) : $popular->the_post(); ?>	
	
	<li><div class="commentsNrW"><?php comments_number('0','1','%'); ?></div>
	<span class="commentsNrWTitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></span>
	<div class="clearfix"></div>
	</li>

<?php endwhile; ?>
</ul>

		<?php echo $after_widget; ?>
<?php		$cache[$args['widget_id']] = $output;
		wp_cache_set('dm_most_comments', $cache, 'widget');
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['dm_most_comments']) )
			delete_option('dm_most_comments');

		return $instance;
	}

	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$number = isset($instance['number']) ? absint($instance['number']) : 5;
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of comments to show:'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
<?php
	}
}
add_action('widgets_init', create_function('', 'return register_widget("dm_Widget_Most_Comments");'));


?>
