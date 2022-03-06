<?php
/**
 * The template file for pages that are owned by page admins
 */
?>

	<?php get_header(); ?>

	<div class="page-content-container">
		
		<div id="customizable-area">
			<?php the_content(); ?>
		</div>

		<div id="published-posts-area">
			<!-- TODO: add condition that will collect all posts of the owner of this page -->
		</div>
	</div>

	<?php get_footer(); ?>
<?php