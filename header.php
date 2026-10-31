<?php
/**
 * Site header.
 *
 * @package jay-infoservices
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#main">Skip to content</a>

<div class="progress-track"><div class="progress-fill" id="progressFill"></div></div>

<header class="site-header" id="siteHeader">
	<nav class="nav-inner" aria-label="Primary">
		<?php jay_render_brand(); ?>
		<button class="nav-toggle" id="navToggle" type="button" aria-label="Toggle menu" aria-expanded="false" aria-controls="navLinks">
			<span></span><span></span><span></span>
		</button>
		<ul class="nav-links" id="navLinks">
			<?php foreach ( jay_nav_items() as $index => $item ) : ?>
				<li><a href="<?php echo esc_url( $item['url'] ); ?>" class="nav-link<?php echo ( 0 === $index && is_front_page() ) ? ' is-active' : ''; ?>"><?php echo esc_html( $item['label'] ); ?></a></li>
			<?php endforeach; ?>
			<li><a href="<?php echo esc_url( jay_contact_url() ); ?>" class="nav-cta">Contact Us</a></li>
		</ul>
	</nav>
</header>
