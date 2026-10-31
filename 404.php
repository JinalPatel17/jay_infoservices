<?php
/**
 * 404 template.
 *
 * @package jay-infoservices
 */

get_header();
?>
<main id="main" class="page-main">
	<div class="container page-content">
		<h1 class="entry-title">Page not found</h1>
		<p>The page you were looking for does not exist or has moved.</p>
		<p><a class="btn btn--gold" href="<?php echo esc_url( home_url( '/' ) ); ?>">Back to home</a></p>
	</div>
</main>
<?php
get_footer();
