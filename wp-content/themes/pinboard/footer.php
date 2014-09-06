<?php
/** Themify Default Variables
 @var object */
	global $themify; ?>

	<?php themify_layout_after(); //hook ?>
	</div>
	<!-- /body -->
		
	<div id="footerwrap">
    
    	<?php themify_footer_before(); //hook ?>
		<footer id="footer" class="pagewidth clearfix">
        	<?php themify_footer_start(); //hook ?>
			
			<?php get_template_part( 'includes/footer-widgets'); ?>
	
			<p class="back-top"><a href="#header">&uarr;</a></p>
		
			<?php if (function_exists('wp_nav_menu')) {
				wp_nav_menu(array('theme_location' => 'footer-nav' , 'fallback_cb' => '' , 'container'  => '' , 'menu_id' => 'footer-nav' , 'menu_class' => 'footer-nav')); 
			} ?>
	
			<div class="footer-text clearfix">
<div class="foot_0">
<div class="social_foot">
<div class="f1">
</div>
<div class="f2">
</div>
<div class="f3">
</div>
<div class="f4">
</div>
<div class="f5">
</div>
<div class="f6">
</div>
<div class="f7">
</div>
</div><!--social_foot-->
<div style="clear:both;"></div>           
</div><!--foot_0-->
				<div class="foot">
                    <p style="text-align: center;">Agile Digital Marketing Strategy by <a title="M. Anthony Librizzi | IT Team &amp; Project Management | Internet Marketing Expert | #ScrumMaster | Entrepreneur | Investor" href="http://linkedin.com/in/manthonylibrizzi/">M. Anthony Librizzi</a> | Copyright © 2014 <a title="Adwoa Dadzie | Career &amp; Personal Development Coach" href="http://adwoadadzie.com/" target="_blank">Adwoa Dadzie</a>. All Rights Reserved</p>
</div><!--foot-->
			</div>
			<!-- /footer-text --> 

			<?php themify_footer_end(); //hook ?>
		</footer>
		<!-- /#footer --> 
        <?php themify_footer_after(); //hook ?>
        
	</div>
	<!-- /#footerwrap -->
	
</div>
<!-- /#pagewrap -->

<?php
/**
 *  Stylesheets and Javascript files are enqueued in theme-functions.php
 */
?>

<!-- wp_footer -->
<?php wp_footer(); ?>

<?php themify_body_end(); //hook ?>
</body>
</html>