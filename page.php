<?php
/**
 * Default page template.
 *
 * @package jay-infoservices
 */

get_header();
?>
<main id="main" class="page-main">
	<div class="container page-content">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article <?php post_class( 'entry' ); ?>>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="entry-content"><?php the_content(); ?></div>
			</article>
			<?php
		endwhile;
		?>
	</div>
</main>
<?php
get_footer();
