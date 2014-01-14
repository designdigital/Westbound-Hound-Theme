<header class="main-header">
	<h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
	<span class="main-description"><?php bloginfo( 'description' ); ?></span>
</header>

<?php Starkers_Utilities::get_template_parts( array( 'parts/map' ) ); ?>
