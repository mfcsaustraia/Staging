<?php
/**
 * Template to display social share buttons.
 * @since 1.2.1
 */
 
?>

<div class="social-share msss<?php the_ID(); ?>">
	
    <div class="twitter-share" data-url="<?php the_permalink(); ?>" data-text="<?php the_title_attribute(); ?>"></div>
    
    <div class="facebook-share" data-url="<?php the_permalink(); ?>" data-text="<?php the_title_attribute(); ?>"></div>
    
    <div class="pinterest-share" data-url="<?php the_permalink(); ?>" data-media="<?php echo themify_get('post_image'); ?>" data-description="<?php the_title_attribute(); ?>"></div>
    
    <div class="googleplus-share" data-url="<?php the_permalink(); ?>" data-text="<?php the_title_attribute(); ?>"></div>
    
</div>