<?php
/**
 * Front page template.
 *
 * The whole home page lives in this file, in code. Edit the text here
 * (VS Code), upload the file, done. It does not depend on the content of
 * the "Home" page inside WordPress, so the block editor cannot break it.
 *
 * @package jay-infoservices
 */

get_header();
?>
<main id="main">

	<!-- HERO -->
	<section class="hero" id="home">
		<div class="hero-inner">
			<p class="hero-eyebrow">Canada &rarr; Global</p>
			<h1 class="hero-heading">Jay<br><span class="hero-heading--accent">Info</span>services</h1>
			<p class="hero-sub">Technology. Trade. Business Solutions.</p>
			<p class="hero-body">A Canadian business working across technology, e-commerce, trade and business solutions to create new opportunities in a connected world.</p>
			<div class="hero-actions">
				<a href="#contact" class="btn btn--gold">Contact Us &rarr;</a>
				<a href="#services" class="btn btn--outline">Explore Services &rarr;</a>
			</div>
			<p class="hero-badge">Built in Canada. Connected to Global Opportunities.</p>
		</div>
	</section>

	<!-- ABOUT -->
	<section class="section section--light" id="about">
		<div class="container section-split">
			<div class="split-text">
				<p class="section-label">Who We Are</p>
				<h2>A Canadian Business<br>with a Global Perspective</h2>
				<p>Jay Infoservices is a Canadian business based in Saskatchewan, developing opportunities across technology, e-commerce, consumer products, import/export and business solutions.</p>
				<a href="#brands" class="btn btn--navy">Explore Our Brands &rarr;</a>
			</div>
			<div class="split-card">
				<div class="about-card">
					<p class="about-card__tag">Saskatchewan, Canada</p>
					<p class="about-card__headline">A Strong Canadian Foundation for a Global Future.</p>
				</div>
			</div>
		</div>
	</section>

	<!-- SERVICES -->
	<section class="section section--dark" id="services">
		<div class="container">
			<div class="section-head">
				<div>
					<p class="section-label section-label--light">Our Services</p>
					<h2>Diverse Solutions for<br>a Connected World</h2>
				</div>
				<p class="section-intro">We work across multiple business areas to create practical solutions and new opportunities in today&rsquo;s global market.</p>
			</div>
			<div class="services-grid">
				<div class="service-card">
					<?php echo jay_icon( 'tech' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<h3>Technology &amp; IT</h3>
					<p>Computer/laptop support, IT solutions, technology services and future IT consulting.</p>
					<p class="card-link"><a href="#contact">Enquire &rarr;</a></p>
				</div>
				<div class="service-card">
					<?php echo jay_icon( 'shop' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<h3>E-Commerce</h3>
					<p>Online retail, consumer products, Amazon/e-commerce operations and product sourcing.</p>
					<p class="card-link"><a href="#contact">Enquire &rarr;</a></p>
				</div>
				<div class="service-card">
					<?php echo jay_icon( 'globe' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<h3>Import &amp; Export</h3>
					<p>International sourcing, product procurement and Canada/international trade.</p>
					<p class="card-link"><a href="#contact">Enquire &rarr;</a></p>
				</div>
				<div class="service-card">
					<?php echo jay_icon( 'chart' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<h3>Business Solutions</h3>
					<p>Business technology solutions, digital solutions and future consulting services.</p>
					<p class="card-link"><a href="#contact">Enquire &rarr;</a></p>
				</div>
			</div>
		</div>
	</section>

	<!-- BRANDS -->
	<section class="section section--light" id="brands">
		<div class="container">
			<p class="section-label">Our Brands</p>
			<h2>A Growing Business Ecosystem</h2>
			<p class="section-intro-left">Jay Infoservices operates multiple business brands and divisions, with a structure designed for future growth.</p>
			<div class="brands-grid">
				<div class="brand-card brand-card--primary">
					<p class="brand-card__role">Parent / Umbrella Business</p>
					<h3>Jay Infoservices</h3>
					<p>Technology. Trade. Business Solutions.</p>
				</div>
				<div class="brand-card">
					<p class="brand-card__role">Consumer Products &amp; E-Commerce</p>
					<h3>JD</h3>
					<p>Online retail, consumer products, Amazon and e-commerce.</p>
				</div>
				<div class="brand-card">
					<p class="brand-card__role">Technology &amp; IT</p>
					<h3>Jay InfoSystems</h3>
					<p>Computer services, laptop services, IT solutions and technology services.</p>
				</div>
			</div>
		</div>
	</section>

	<!-- WHY US -->
	<section class="section section--navy" id="why">
		<div class="container section-split section-split--rev">
			<div class="why-visual">
				<p class="why-visual__tag">Canada &rarr; Global</p>
				<p class="why-visual__sub">Building Bridges Between Canadian Innovation and Global Markets.</p>
			</div>
			<div class="split-text">
				<p class="section-label section-label--light">Why Jay Infoservices</p>
				<h2>Built for<br>What&rsquo;s Next</h2>
				<ul class="why-list">
					<li>Technology Focused</li>
					<li>Practical Solutions</li>
					<li>Diversified Business Model</li>
					<li>Global Opportunities</li>
					<li>Canadian Foundation</li>
					<li>Future-Ready Structure</li>
				</ul>
			</div>
		</div>
	</section>

	<!-- CONTACT -->
	<section class="section section--dark" id="contact">
		<div class="container contact-inner">
			<div class="contact-text">
				<p class="section-label section-label--light">Get In Touch</p>
				<h2>Let&rsquo;s Build the Future Together</h2>
				<p>Have a question or want to discuss a potential opportunity? We would be happy to hear from you.</p>
			</div>
			<div class="contact-form-col">
				<?php echo jay_contact_form_shortcode(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</div>
		</div>
	</section>

</main>
<?php
get_footer();
