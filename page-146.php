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
				
				<div class="latest-posts">
					<h2>Some new posts</h2>
						<?php 
						$args = array(
							'posts_per_page' => 3,
							'post__not_in' => get_option( 'sticky_posts' )
						); 
						$custom_query = new WP_Query($args);
						while($custom_query->have_posts()) : $custom_query->the_post(); ?>
							<div class="latest-post col-md-4 col-lg-4 col-sm-12">
								<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
									<a href="<?php the_permalink(); ?>">
										<?php if (has_post_thumbnail()) {
											the_post_thumbnail();
										} else { ?>
											<img src="<?php echo get_template_directory_uri() . '/includes/img/featured.jpeg' ?> " />
										<?php } ?>
									</a>
										<h4 class="header-latest-post"><a class="header-link-latest-post" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
										<p><?php the_excerpt(); ?></p>
								</div>
							</div>
							<?php endwhile; ?>
							<?php wp_reset_postdata(); // reset the query ?>
				</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
