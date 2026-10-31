<?php
/**
 * Jay Infoservices theme functions.
 *
 * @package jay-infoservices
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'JAY_VERSION', '1.1.0' );

require_once get_template_directory() . '/inc/contact-form.php';

/**
 * Google Fonts URL (Syne + Inter).
 */
function jay_fonts_url() {
	return 'https://fonts.googleapis.com/css2?family=Syne:wght@600;700;800&family=Inter:wght@400;500;600&display=swap';
}

/**
 * Theme setup.
 */
function jay_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 60,
			'width'       => 240,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
	add_theme_support( 'editor-styles' );
	add_editor_style( array( 'assets/css/main.css', jay_fonts_url() ) );
	register_nav_menus( array( 'primary' => 'Primary menu' ) );
}
add_action( 'after_setup_theme', 'jay_setup' );

/**
 * Front-end assets.
 */
function jay_scripts() {
	wp_enqueue_style( 'jay-fonts', jay_fonts_url(), array(), null ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
	wp_enqueue_style( 'jay-main', get_template_directory_uri() . '/assets/css/main.css', array(), JAY_VERSION );
	wp_enqueue_script( 'jay-main', get_template_directory_uri() . '/assets/js/main.js', array(), JAY_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'jay_scripts' );

/**
 * Preconnect to Google Fonts.
 *
 * @param array  $urls          URLs to print.
 * @param string $relation_type Relation type.
 * @return array
 */
function jay_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = 'https://fonts.googleapis.com';
		$urls[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => 'anonymous',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'jay_resource_hints', 10, 2 );

/**
 * Basic meta description, only when no SEO plugin is active.
 */
function jay_meta_description() {
	if ( defined( 'WPSEO_VERSION' ) || defined( 'RANK_MATH_VERSION' ) || defined( 'SEOPRESS_VERSION' ) || defined( 'AIOSEO_VERSION' ) ) {
		return;
	}

	$desc = '';
	if ( is_front_page() ) {
		$desc = 'A Canadian business working across technology, e-commerce, trade and business solutions to create new opportunities in a connected world.';
	} elseif ( is_singular() ) {
		$desc = wp_trim_words( wp_strip_all_tags( get_the_excerpt() ), 30, '' );
	}

	if ( $desc ) {
		echo '<meta name="description" content="' . esc_attr( $desc ) . '">' . "\n";
	}
}
add_action( 'wp_head', 'jay_meta_description', 1 );

/**
 * URL of the contact section.
 */
function jay_contact_url() {
	return ( is_front_page() ? '' : home_url( '/' ) ) . '#contact';
}

/**
 * Navigation items. Uses the "Primary menu" if one is assigned,
 * otherwise falls back to the one-page anchors.
 *
 * @return array
 */
function jay_nav_items() {
	$items     = array();
	$locations = get_nav_menu_locations();

	if ( ! empty( $locations['primary'] ) ) {
		$menu_items = wp_get_nav_menu_items( $locations['primary'] );
		if ( $menu_items ) {
			foreach ( $menu_items as $menu_item ) {
				if ( 0 === (int) $menu_item->menu_item_parent ) {
					$items[] = array(
						'label' => $menu_item->title,
						'url'   => $menu_item->url,
					);
				}
			}
		}
	}

	if ( empty( $items ) ) {
		$base  = is_front_page() ? '' : home_url( '/' );
		$items = array(
			array(
				'label' => 'Home',
				'url'   => $base . '#home',
			),
			array(
				'label' => 'About',
				'url'   => $base . '#about',
			),
			array(
				'label' => 'Services',
				'url'   => $base . '#services',
			),
			array(
				'label' => 'Brands',
				'url'   => $base . '#brands',
			),
			array(
				'label' => 'Contact',
				'url'   => $base . '#contact',
			),
		);
	}

	return $items;
}

/**
 * Header brand: custom logo if one is set, otherwise the text wordmark.
 */
function jay_render_brand() {
	if ( has_custom_logo() ) {
		echo '<div class="nav-brand nav-brand--logo">' . get_custom_logo() . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		return;
	}
	?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-brand">
		<span class="brand-name">Jay <span class="brand-accent">Info</span>services</span>
		<span class="brand-tagline">Technology. Trade. Business Solutions.</span>
	</a>
	<?php
}

/**
 * Line icons used on the home page (inline SVG, inherit the gold colour).
 *
 * @param string $name tech|shop|globe|chart.
 * @return string
 */
function jay_icon( $name ) {
	$paths = array(
		'tech'  => '<rect x="4" y="5" width="16" height="11" rx="1.5"/><path d="M2 19.5h20"/>',
		'shop'  => '<circle cx="9" cy="20" r="1.4"/><circle cx="18" cy="20" r="1.4"/><path d="M2 3.5h3l2.4 11.5h11.2L21 7.5H6"/>',
		'globe' => '<circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c3.2 3 3.2 15 0 18M12 3c-3.2 3-3.2 15 0 18"/>',
		'chart' => '<path d="M3 3v18h18"/><path d="M7 15l4-4 3 3 6-7"/>',
	);
	if ( ! isset( $paths[ $name ] ) ) {
		return '';
	}
	return '<svg class="service-card__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">' . $paths[ $name ] . '</svg>';
}
