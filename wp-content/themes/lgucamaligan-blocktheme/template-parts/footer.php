<?php
	/* Default footer of the theme*/
?>
<!-- TODO: add condition to show these tags if in pages owned by page administrators -->
<!--		</div>
		<div id="sidebar-area"> -->
			<!-- TODO: add condition that will collect all posts of the owner of this page -->

			<?php if(is_active_sidebar('Sidebar Widget Area')): ?>
<!--			<div id="lgu-sidebar-widget-area">-->
					<?php dynamic_sidebar( 'Sidebar Widget Area' ) ?>
<!--			</div> -->
			<?php endif; ?>
<!--	</div>
	</div>-->


	<?php if(is_active_sidebar('Main Widget Area')): ?>
		<div id="lgu-main-widget-area">
			<?php dynamic_sidebar( 'Main Widget Area' ) ?>
		</div>
	<?php endif; ?>

</div>

<div id="lgu-footer-container">
	<div id="lgu-gov-footer">
		
		<div id="govph-seal-container">
			<img src="<?php echo get_stylesheet_directory_uri() .'/assets/icons/govph-official-seal.svg' ?>" alt="govph-seal">
			<div id="content-public-message-wrapper">
				<h4>Republic of the Philippines</h4>
				<p>All content is in the public domain unless otherwise stated.</p>
			</div>
		</div>
		
		<div id="govph-about">
			<h4>About GOVPH</h4>
			<p>Learn more about the Philippine government, its structure, how government works and the people behind it.</p>
			<div class="lgu-group-of-links">
				<a href="https://www.gov.ph/">GOV.PH</a>
				<a href="https://www.gov.ph/data">Open Daata Portal</a>
				<a href="https://www.gov.ph/">Official Gazette</a>
			</div>
		</div>

		<div id="govph-links">
			<h4>Government Links</h4>
			<div class="lgu-group-of-links">
				<a href="https://president.gov.ph/">Office of the President</a>
				<a href="https://ovp.gov.ph/">Office of the Vice President</a>
				<a href="https://www.senate.gov.ph/">Senate of the Philippines</a>
				<a href="https://www.congress.gov.ph/">House of Representatives</a>
				<a href="https://sc.judiciary.gov.ph/">Supreme Court</a>
				<a href="https://ca.judiciary.gov.ph/">Court of Appeals</a>
				<a href="https://sb.judiciary.gov.ph/">Sandiganbayan</a>
			</div>
		</div>
	</div>
</div>