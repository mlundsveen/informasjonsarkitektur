<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package _tk
 */
?>
<div class="breadcrumbs">
	<?php if (!is_home()) { ?>
		<?php if(function_exists('the_breadcrumbs')) the_breadcrumbs(); ?>
	<?php } ?>
</div>

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
