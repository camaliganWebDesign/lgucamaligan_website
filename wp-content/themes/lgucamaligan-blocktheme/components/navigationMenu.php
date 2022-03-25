<?php /*Site Header Component*/ ?>
<template id="navigation-menu">
	<ul v-if="data != null">
		<li v-for="menu in data">
			{{menu.title}}
		</li>
	</ul>
</template>

<?php