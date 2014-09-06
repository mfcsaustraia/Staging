<?php if(!is_single()) { global $more; $more = 0; } //enable more link ?>
<?php
/** Themify Default Variables
 *  @var object */
global $themify; ?>
	
<?php if($themify->hide_image != "yes"): ?>
	
	<?php
		//check if there is a video url in the custom field
		if( themify_get("video_url") != '' ){
			global $wp_embed;
			echo $wp_embed->run_shortcode('[embed]' . themify_get('video_url') . '[/embed]');
		} else{ ?>
		<?php
		//otherwise display the featured image
		if( $post_image = themify_get_image($themify->auto_featured_image . $themify->image_setting . "w=".$themify->width."&h=".$themify->height) ){ ?>
			<?php themify_before_post_image(); // Hook ?>
			<figure class="post-image <?php echo $themify->image_align; ?>">
				<?php if( 'yes' == $themify->unlink_image): ?>
					<?php echo $post_image; ?>
				<?php else: ?>
					<?php
					$in_lightbox = $the_class = $the_rel = '';
					if( !is_single() && themify_get('setting-open_inline') ){
						$in_lightbox = '?post_in_lighbox=true&iframe=true&width=700&height=90%';
						$the_class = 'class="lightbox" ';
						$the_rel = 'rel="prettyPhoto[iframes' . get_the_ID() . '-1]"';
					} ?>
					<a href="<?php echo $themify->get_featured_image_link() . $in_lightbox ?>" <?php echo $the_class . $the_rel ?>><?php echo $post_image; ?></a>
				<?php endif; ?>
			</figure>
			<?php themify_after_post_image(); // Hook ?>
		<?php } ?>
		  
	<?php }// end if video/image ?>
		
<?php endif; //post image ?>

<?php themify_post_before(); //hook ?>
<div class="post-content">
	<?php themify_post_start(); //hook ?>

	<p class="author-pic">
		<?php echo get_avatar( get_the_author_meta('ID'), 40 ); ?>
	</p>
	<?php if($themify->hide_title != "yes"): ?>
		<?php themify_before_post_title(); // Hook ?>
		<?php if($themify->unlink_title == "yes"): ?>
			<h1 class="post-title"><?php the_title(); ?></h1>
		<?php else: ?>
			<?php
			$in_lightbox = $the_class = $the_rel = '';
			if( !is_single() && themify_get('setting-open_inline') ){
				$in_lightbox = '?post_in_lighbox=true&iframe=true&width=700&height=90%';
				$the_class = 'class="lightbox" ';
				$the_rel = 'rel="prettyPhoto[iframes' . get_the_ID() . '-2]"';
			} ?>
			<h1 class="post-title"><a href="<?php echo get_permalink() . $in_lightbox; ?>" <?php echo $the_class . $the_rel ?>><?php the_title(); ?></a></h1>
		<?php endif; //unlink post title ?>
		<?php themify_after_post_title(); // Hook ?>
	<?php endif; //post title ?>
	
	<?php if($themify->hide_date != "yes"): ?>
		<time datetime="<?php the_time('o-m-d') ?>" class="post-date" pubdate><?php the_time(apply_filters('themify_loop_date', 'M j, Y')) ?></time>
	<?php endif; //post date ?>    

	<?php if($themify->hide_meta != 'yes'): ?>
		<p class="post-meta">
			
			<span class="post-author">
				<?php
					if( is_multisite() ){
						if( themify_get('authorname') != '' ){
							if( themify_get('authorlink') != '' )
								echo '<a href="' , themify_get('authorlink') , '">' , themify_get('authorname') , '</a>';
							else
								echo themify_get('authorname');
						} else {
							
							echo '<a href="' . site_url() . '">' . get_the_author_meta('display_name', $post->post_author) . '</a>';
						}
					} else {
						the_author_posts_link();
					}
				?> <em>&sdot;</em>
			</span>
			<span class="post-category">
				<?php
					if( themify_get('termscat') != '' ){
						echo themify_get('termscat');
					} else {
						the_category(', ');
					}
				?> <em>&sdot;</em>
			</span>
			<?php the_tags(' <span class="post-tag">', ', ', ' <em>&sdot;</em> </span>'); ?>
			<?php  if( !themify_get('setting-comments_posts') && comments_open() ) : ?>
				<span class="post-comment">
					<?php comments_popup_link( __( 'No comments', 'themify' ), __( '1 comment', 'themify' ), __( '% comments', 'themify' ) ); ?>
				</span>
			<?php endif; //post comment ?>
		</p>
	
	<?php endif; //post meta ?>    
	
	<?php if($themify->display_content == 'excerpt'): ?>

		<?php the_excerpt(); ?>

	<?php elseif($themify->display_content == 'none'): ?>

	<?php else: ?>
	
		<?php the_content(themify_check('setting-default_more_text')? themify_get('setting-default_more_text') : __('More &rarr;', 'themify')); ?>
	
	<?php endif; //display content ?>
	
	
	<?php
		if( (is_singular() && '' != $themify->query_category && !themify_get('setting-hidesocial_index')) ||
			(is_singular() && '' == $themify->query_category && !themify_get('setting-hidesocial_single')) ||
			(!is_singular() && !themify_get('setting-hidesocial_index'))){
		 	get_template_part('includes/social-share');
		}
	?>
	
	<?php
		global $withcomments;
		$withcomments = true; // enable comments in index
		comments_template('/includes/home-comments.php');
	?>

	
	<?php edit_post_link(__('Edit', 'themify'), '[', ']'); ?>
	
    <?php themify_post_end(); //hook ?>
</div>
<!-- /.post-content -->
<?php themify_post_after(); //hook ?>