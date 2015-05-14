<?php
/**
 * @package WordPress
 * @subpackage Inspira
 * @since Inspira 1.0
 */

get_header(); ?>

    <section class="blog single"><div class="contents">

        <article class="content">
            <?php while ( have_posts() ) : the_post(); ?>
                <header>
                    <span>proyecto de inspira:</span>
                    <h1><?php the_title(); ?></h1>
                    <date><?php the_date(); ?></date>

                    publicado por <?php the_author_posts_link(); ?>
                </header>

                <figure class="featured_img">
                    <?php the_post_thumbnail( $size, $attr ); ?>
                </figure>

                <?php the_content(); ?>

                <?php comments_template(); ?>
            <?php endwhile; ?>
        </article>

        <?php get_sidebar(); ?>

    </div></section>

<?php get_footer(); ?>
