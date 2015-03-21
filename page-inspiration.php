<?php
/**
 * @package Sefrijn
 * Template Name: Inspiration
 */

	get_header();
?>
<div class="page">

	<div class="grid">
			<?php 
			$pages = query_posts('post_type=post');
			if($pages){ /* display the children content  */
	  		foreach ($pages as $post) :
	  			setup_postdata($post); ?>
					<a class="post" href="<?php the_permalink(); ?>">
		  			<?php if ( has_post_thumbnail() ) { ?>
		  				<?php echo get_the_post_thumbnail( get_the_ID(), 'news-thumb'); ?>
						<?php } ?>		
		  			<h3><?php the_title(); ?></h3>
		  			<p class="subtitle"><?php echo get_post_field( 'subtitle', get_the_ID(), true) ?></p>
					</a>
	  		<?php endforeach;
			} 
			?>
	</div>
<?php get_footer() ?>