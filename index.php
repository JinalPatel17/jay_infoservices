<?php
/**
 * Fallback template.
 *
 * @package jay-infoservices
 */

get_header();
?>
<main id="main" class="page-main">
	<div class="container page-content">
		<?php if ( have_posts() ) : ?>
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article <?php post_class( 'entry' ); ?>>
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="entry-content"><?php the_excerpt(); ?></div>
				</article>
			<?php endwhile; ?>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<h1 class="entry-title">Nothing found</h1>
			<p>We could not find what you were looking for.</p>
		<?php endif; ?>
	</div>
</main>
<?php
get_footer();
