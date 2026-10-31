<?php
/**
 * Site footer.
 *
 * @package jay-infoservices
 */

$jay_privacy_url = function_exists( 'get_privacy_policy_url' ) ? get_privacy_policy_url() : '';
?>
<footer class="site-footer">
	<div class="container footer-inner">
		<div class="footer-brand">
			<span class="brand-name">Jay <span class="brand-accent">Info</span>services</span>
			<span class="brand-tagline">Technology. Trade. Business Solutions.</span>
		</div>
		<nav class="footer-nav" aria-label="Footer">
			<?php foreach ( jay_nav_items() as $item ) : ?>
				<a href="<?php echo esc_url( $item['url'] ); ?>"><?php echo esc_html( $item['label'] ); ?></a>
			<?php endforeach; ?>
			<?php if ( $jay_privacy_url ) : ?>
				<a href="<?php echo esc_url( $jay_privacy_url ); ?>">Privacy Policy</a>
			<?php endif; ?>
		</nav>
		<p class="footer-location">Saskatchewan, Canada</p>
	</div>
	<div class="footer-bottom">
		<span>&copy; <span id="year"><?php echo esc_html( gmdate( 'Y' ) ); ?></span> Jay Infoservices. All rights reserved.</span>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
