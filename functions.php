<?php
	/**
	 * Starkers functions and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
 	 * @package 	WordPress
 	 * @subpackage 	Starkers
 	 * @since 		Starkers 4.0
	 */

	/* ========================================================================================================================

	Required external files

	======================================================================================================================== */

	require_once( 'external/starkers-utilities.php' );

	/* ========================================================================================================================

	Theme specific settings

	Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme

	======================================================================================================================== */

	add_theme_support('post-thumbnails');

	// register_nav_menus(array('primary' => 'Primary Navigation'));

	/* ========================================================================================================================

	Actions and Filters

	======================================================================================================================== */

	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

	/* ========================================================================================================================

	Custom Post Types - include custom post types and taxonimies here e.g.

	e.g. require_once( 'custom-post-types/your-custom-post-type.php' );

	======================================================================================================================== */



	/* ========================================================================================================================

	Scripts

	======================================================================================================================== */

	/**
	 * Add scripts via wp_head()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */

	function starkers_script_enqueuer() {
  	wp_deregister_script('jquery');
  	wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js', array(), '2.0.3', true);
  	wp_enqueue_script('jquery');

		wp_register_script( 'packery', get_template_directory_uri().'/js/packery.js', array( 'jquery' ) );
		wp_enqueue_script( 'packery' );

		wp_register_script( 'images', get_template_directory_uri().'/js/imagesLoaded.js', array( 'jquery' ) );
		wp_enqueue_script( 'images' );

		wp_register_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAT9_O5fxS43DTmY60URsjNpIMV92ZJgZ4', array( 'jquery' ) );
		wp_enqueue_script( 'google-maps' );

		wp_register_script( 'map', get_template_directory_uri().'/js/map.js', array( 'jquery' ) );
		wp_enqueue_script( 'map' );

		wp_register_script( 'lastfm', get_template_directory_uri().'/js/lastfm.js', array( 'jquery' ) );
		wp_enqueue_script( 'lastfm' );

		wp_enqueue_script( 'thesnug_typekit', '//use.typekit.net/ijm0hfz.js');

		wp_register_script( 'main', get_template_directory_uri().'/js/main.js', array( 'jquery' ) );
		wp_enqueue_script( 'main' );

		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}


	/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_head', 'thesnug_typekit_inline' );
function thesnug_typekit_inline() {
	if ( wp_script_is( 'thesnug_typekit', 'done' ) ) { ?>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	<?php }
}


	/* ========================================================================================================================

	Comments

	======================================================================================================================== */

	/**
	 * Custom callback for outputting comments
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	function starkers_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</article>
		<?php endif;
	}

	/**
 * Remove the text - 'You may use these <abbr title="HyperText Markup
 * Language">HTML</abbr> tags ...'
 * from below the comment entry box.
 */

add_filter('comment_form_defaults', 'remove_comment_styling_prompt');

function remove_comment_styling_prompt($defaults) {
	$defaults['comment_notes_after'] = '';
	return $defaults;
}

add_filter('comment_form_default_fields', 'url_filtered');
function url_filtered($fields)
{
  if(isset($fields['url']))
   unset($fields['url']);
  return $fields;
}
