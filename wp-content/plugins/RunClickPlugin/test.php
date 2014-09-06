<?php include('ppc-paginate.php');?>
<?php global $wp_query;
						 $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
						
							$args = array(
										'meta_key' => 'current_hangout_status',
										'meta_value' => 3,
										'post_type' => 'ghangout',
										'posts_per_page' => 3,
										'post__not_in' => array(get_the_ID()),
										'paged' => $paged
										
									);
									
									$wp_query = new WP_Query( $args );
									$replay_posts = $wp_query ;
//print_r($replay_posts);?>
<?php foreach($replay_posts->posts as $posts_replay){ ?>
<h1><?php echo $posts_replay->post_title; ?></h1>
<?php }
?>
<div class="pagination pagination-centered">
    					<ul>
                			<!-- <li class="disabled"><a href="#">&lsaquo;</a></li>
                			<li><a href="#">1</a></li>
                			<li><a href="#">2</a></li>
                			<li class="active"><a href="#">3</a></li>
                			<li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                			<li><a href="#">&rsaquo;</a></li> -->
							<?php  ppc_paginate(); ?>
             			</ul>
    				</div>