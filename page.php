<?php
/**
 * @package WordPress
 * @subpackage Inspira
 * @since Inspira 1.0
 */

get_header(); ?>

    <section class="page"><div class="contents">
        <?php
            while ( have_posts() ) : the_post();
                the_content('');
            endwhile;
        ?>
    </div></section>

<?php get_footer(); ?>
