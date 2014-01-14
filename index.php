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
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
  <div class="main-content">

    <?php if ( have_posts() ): ?>

    <section class="latest-posts">
      <h2>Our Photos</h2>
      <?php while ( have_posts() ) : the_post(); ?>
        <article class="post">
          <div class="post-info">
            <h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
            <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time>
          </div><!-- end of .post-info -->
          <span class="post-author"><?php echo get_avatar( get_the_author_meta( 'ID' )); ?></span>
          <?php the_content(); ?>

        </article>
      <?php endwhile; ?>
      <?php else: ?>
      <h2>No posts to display</h2>
    </section><!-- end of .latest-posts -->

    <?php endif; ?>

    <?php Starkers_Utilities::get_template_parts( array( 'parts/music' ) ); ?>

  </div><!-- end of .main-content -->
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>