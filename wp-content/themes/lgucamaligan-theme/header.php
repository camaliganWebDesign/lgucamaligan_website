<?php
	/* Default header of the theme*/
?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php wp_head(); ?>

		<style <?php the_tags(); ?>>

		</style>

		<script type="text/javascript" language="javascript">

		</script>
	</head>

	<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
		<div id="lgu-header-container">

			<div class="lgu-nav" id="lgu-main-nav-container">
				
				<div id="lgu-govph-link">
					<a href="https://www.gov.ph">GOVPH</a>
				</div>

				<div id="lgu-main-nav">
					<?php
						wp_nav_menu( array(
							'theme_location'  => 'main_nav',
							'items_wrap' => '%3$s',
							'container' => false,
							'fallback_cb' => false,
						));
					?>
				</div>

				<div id="lgu-searchbar">
					<?php get_search_form(); ?>
				</div>

				<?php if( is_user_logged_in() /*&& current_user_can('page-admin')*/ ) : ?>
					<div id="lgu-logged-in-user-menu">
						<img id="lgu-user-avatar" alt="user-avatar" src="<?php echo esc_url( get_avatar_url( get_current_user_id() ) ); ?>">
						<div id="lgu-user-menu">
							<img src="" alt="create-new-post">
							<img src="" alt="all-user-posts">
							<img src="" alt="edit-user-page">
							<a href="<?php echo esc_html( get_edit_profile_url() ); ?>"><img src="" alt="profile-setting"></a>
							<a href="<?php echo esc_html( wp_logout_url( get_permalink() ) ); ?>"><img src="" alt="logout"></a>
						</div>
					</div>
				<?php endif; ?>

			</div>

			<div id="lgu-header-banner-container">
				<div class="lgu-corner-wrapper" id="lgu-corner-left">
					<?php if(is_active_sidebar('Upper Left Corner')): ?>
						<div id="lgu-corner-upperleft">
							<?php dynamic_sidebar( 'Upper Left Corner' ) ?>
						</div>
					<?php endif; ?>
					<?php if(is_active_sidebar('Lower Left Corner')): ?>
						<div id="lgu-corner-lowerleft">
							<?php dynamic_sidebar( 'Lower Left Corner' ) ?>
						</div>
					<?php endif; ?>
				</div>
				<div id="lgu-image-banner-wrapper">
					<img alt="site-banner-image" src="">
				</div>
				<div class="lgu-corner-wrapper" id="lgu-corner-right">
					<?php if(is_active_sidebar('Upper Right Corner')): ?>
						<div id="lgu-corner-upperright">
							<?php dynamic_sidebar( 'Upper Right Corner' ) ?>
						</div>
					<?php endif; ?>
					<?php if(is_active_sidebar('Lower Right Corner')): ?>
						<div id="lgu-corner-lowerright">
							<?php dynamic_sidebar( 'Lower Right Corner' ) ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
			
			<div class="lgu-nav" id="lgu-aux-nav">
				<?php
					wp_nav_menu( array(
						'theme_location'  => 'aux_nav',
						'items_wrap' => '%3$s',
						'container' => false,
						'fallback_cb' => false,
					));
				?>
			</div>

		</div>

		<div class="lgu-main-content-container">
<?php