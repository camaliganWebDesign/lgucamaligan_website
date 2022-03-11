<?php
	/* Default header of the theme*/
?>

<div class="lgu-display-flexed lgu-flexed-vertical" id="lgu-header-container">

	<div class="lgu-display-flexed lgu-flexed-horizontal" id="lgu-main-nav-container">
		
		<div id="lgu-govph-link">
			<a href="https://www.gov.ph">GOVPH</a>
		</div>

		<div class="lgu-display-flexed lgu-flexed-horizontal" id="lgu-main-nav">
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
			<div class="lgu-display-flexed lgu-flexed-vertical" id="lgu-logged-in-user-menu">
				<img id="lgu-user-avatar" alt="user-avatar" src="<?php echo esc_url( get_avatar_url( get_current_user_id() ) ); ?>">
				<div class="lgu-display-flexed lgu-flexed-vertical" id="lgu-user-menu">
					<div class="">
						<img src="<?php echo get_stylesheet_directory_uri() .'/assets/icons/page-admin/btn-new.svg'; ?>" alt="create-new">
						<ul class="lgu-show-on-hover">
							<li><a href="">Create New Post</a></li>
							<li><a href="">Upload New File</a></li>
						</ul>
					</div>
					<a href=""><img src="<?php echo get_stylesheet_directory_uri() .'/assets/icons/page-admin/btn-all-posts.svg'; ?>" alt="all-user-posts"></a>
					<a href=""><img src="<?php echo get_stylesheet_directory_uri() .'/assets/icons/page-admin/btn-edit-userpage.svg'; ?>" alt="edit-user-page"></a>
					<a href="<?php echo esc_html( get_edit_profile_url() ); ?>"><img src="<?php echo get_stylesheet_directory_uri() .'/assets/icons/page-admin/btn-profile.svg'; ?>" alt="profile-setting"></a>
					<a href="<?php echo esc_html( wp_logout_url( get_permalink() ) ); ?>"><img src="<?php echo get_stylesheet_directory_uri() .'/assets/icons/page-admin/btn-logout.svg'; ?>" alt="logout"></a>
				</div>
			</div>
		<?php endif; ?>

	</div>

	<div class="lgu-display-flexed lgu-flexed-horizontal" id="lgu-header-banner-container">
		<div class="lgu-display-flexed lgu-flexed-vertical lgu-corner-wrapper" id="lgu-corner-left">
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
		<div class="lgu-display-flexed lgu-flexed-vertical lgu-corner-wrapper" id="lgu-corner-right">
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
<!-- TODO: add condition to show these tags if in pages owned by page administrators -->

	<div class="page-content-container">
		<div class="customizable-area">

	



<!-- </div> -->

<!-- <div class="lgu-main-content-container"> -->
<!-- TODO: add condition to show these tags if in pages owned by page administrators -->
<!--
	<div class="page-content-container">
		<div id="customizable-area">
-->
<?php