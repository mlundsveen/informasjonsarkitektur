<?php
/**
 * The template for display on page 146
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package _tk
 */

get_header(); ?>


	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="page-header">
				<h1 class="page-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php the_content(); ?>
				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', '_tk' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->
			<?php edit_post_link( __( 'Edit', '_tk' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
		</article><!-- #post-## -->		

		<?php wp_reset_postdata(); ?>
		<?php endwhile; // end of the loop. ?>

<div id="prosjekter">
										<?php
											$args = array(
												'post_type' => 'prosjekter',
												'posts_per_page' => 12,
											);
											$prosjekter = new WP_Query( $args );
											if( $prosjekter->have_posts() ) {
												while( $prosjekter->have_posts() ) {
													$prosjekter->the_post();
													?>
														<div class="prosjekter col-md-4 col-lg-4 col-sm-12">
																	<div class="image">
																			<?php $image = get_post_meta ( get_the_ID(), 'logo', true);
																			$url = get_post_meta( get_the_ID(), 'url', true);
																			if ($image) { ?>
																				<img src="<?php echo $image; ?>" alt="<?php echo the_title(); ?>" >
																			<?php } ?>
																		<div class="customer">
																			<h4><?php the_title(); ?></h4>
																			<a href="<?php echo get_post_meta( get_the_ID(), 'url', true); ?>"> <?php echo get_post_meta( get_the_ID(), 'url', true); ?> </a>
																		</div>
																	</div>
														</div>
													<?php
												}
											}
											else {
												echo '';
											}
										?>
			</div>



<?php get_sidebar(); ?>
<?php get_footer(); ?>