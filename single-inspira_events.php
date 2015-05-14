<?php
/**
 * @package WordPress
 * @subpackage Inspira
 * @since Inspira 1.0
 */

get_header(); ?>

    <section class="blog single"><div class="contents">

        <?php while ( have_posts() ) : the_post(); ?>
            <article class="content">
                <header>
                    <h1><?php the_title(); ?></h1>
                </header>

                <figure class="featured_img">
                    <?php the_post_thumbnail( $size, $attr ); ?>
                </figure>

                <?php the_content(); ?>
            </article>

            <aside class="sidebar">
                <div class="event_meta">
                    <p>
                        <strong>Inicio:</strong>
                        <date><?php echo date('d - F - o', get_post_meta(get_the_id(), 'inspira_events_startdate', true) ); ?></date>
                    </p>

                    <p>
                        <strong>Término:</strong>
                        <date><?php echo date('d - F - o', get_post_meta(get_the_id(), 'inspira_events_enddate', true) ); ?></date>
                    </p>

                    <p>
                        <strong>Dirección:</strong>
                        <?php echo get_post_meta(get_the_id(), 'inspira_events_address', true); ?>
                    </p>
                </div>
            </aside>
        <?php endwhile; ?>

    </div></section>

<?php get_footer(); ?>
