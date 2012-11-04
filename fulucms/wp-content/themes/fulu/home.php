<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

		<aside class="placeholder">
<h2 class="innerheading">Who's Overdue for a FuLu?</h2>
<section class="photocntainer">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div class="overstay">
  <h2 class="over-title"><?php the_title(); ?></h2>
<div class="overstay-left">
<?php the_post_thumbnail('large'); ?>
</div>
<div class="overstay-right">
 <?php the_content(); ?>
<?php $email = get_post_meta($post->ID, 'Email', true) ?>
   <a href="http://fulumail.com/sendfullu-step2.php?email=<?php echo $email; ?>" class="send">Send him a FuLu</a>
</div>
</div>
<p class="devider"></p>
<?php endwhile; // end of the loop. ?>
</section>
</aside>


<?php get_footer(); ?>
