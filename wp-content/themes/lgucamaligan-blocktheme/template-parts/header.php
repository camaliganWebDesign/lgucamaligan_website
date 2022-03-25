<?php
	/* Default header of the theme*/
	$theme_dir = get_template_directory();
	$component_template_loc = $theme_dir . '/components/';
	$components = [ 'navigationMenu' ];
?>
<div id="lgu-templates-container" style="display: none;">
	<?php
		foreach( $components as $component ) {
			load_template( $component_template_loc .$component .'.php' );
		}
	?>
</div>

<div class="lgu-site-content">
	<header id="lguHeader">
		<nav class="lgu-container-nav" id="nav-primary">
			<div id="lgu-govph-link">
				<a :href="govPhLink">GovPH</a>
			</div>

			<div id="lgu-menu-primary">
				<?php
					wp_nav_menu( array(
						'theme_location'  => 'main_nav',
						'items_wrap' => '%3$s',
						'container' => false,
						'fallback_cb' => false,
					));
				?>
			</div>
			
			<div id="lgu-search-container" >
				<?php get_search_form(); ?>
			</div>

			<div id="lgu-accessibles">
			<!--<div v-if="isLoggedIn"> -->
				<div>
					<image alt="accessibility">
					<div v-for='( asset, index ) in loggedInUserData.assets'>
						<>
						<img :src='asset' alt="userIcon">
					</div>
				</div>
			</div>

		</nav>

		<div class="lgu-container-banner">

		</div>

		<nav class="lgu-container-nav" id="nav-auxiliary">

		</nav>
	</header>

	<main>
		<section id="lguContent">
<?php