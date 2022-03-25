<?php
	/* Default footer of the theme*/
?>
		</section>
		<?php if(is_active_sidebar('Sidebar Widget Area')): ?>
			<aside id="lgutWidgetArea">
					<?php dynamic_sidebar( 'Sidebar Widget Area' ) ?>
			</aside>
		<?php endif; ?>
	</main>

	<footer id="lguFooter">
	</footer>
</div>
<?php