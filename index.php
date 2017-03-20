<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header', 'parts/map' ) ); ?>
  <div class="main-content">
    <h2>Our Progress</h2>
    <section class="latest-posts all-posts">
      <?php query_posts(array('posts_per_page' => -1 ) ); ?>
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
      <article class="post post-all">
        <div class="post-info">
          <h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
          <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time>
        </div><!-- end of .post-info -->
        <span class="post-author"><?php echo get_avatar( get_the_author_meta( 'ID' )); ?></span>
        <?php the_content(); ?>
        <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments', 'comments-link'); ?>
      </article>
      <?php endwhile; ?>
    </section><!-- end of .latest-posts -->

  </div><!-- end of .main-content -->

<?php // Starkers_Utilities::get_template_parts( array( 'parts/music' ) ); ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>
