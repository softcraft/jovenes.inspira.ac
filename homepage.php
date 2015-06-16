<?php
/**
 * Template Name: Homepage
 * @package WordPress
 * @subpackage Inspira
 * @since Inspira 1.0
 */

get_header(); ?>

    <header class="title-img home-video" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/bg-inspira.jpg')">
        <h1><img src="<?php echo get_template_directory_uri(); ?>/img/text-inspira.png" alt="Inspira" /></h1>
        <video autoplay loop>
            <source src="<?php echo get_template_directory_uri(); ?>/video/inspira-home.mp4" type="video/mp4" />
            <source src="<?php echo get_template_directory_uri(); ?>/video/inspira-home.ogv" type="video/ogg" />
        </video>
    </header>

    <section class="home-quote">
        <blockquote>
            <p>Inspiración que revela el <strong>potencial interior</strong> y expresa el <strong>amor por la vida</strong></p>
        </blockquote>
    </section>

    <section class="home-sub"><div class="contents">
        <header>
            <h1><img src="<?php echo get_template_directory_uri(); ?>/img/text-inspira-en-movimiento.png" alt="Inspira en Movimiento" /></h1>
            <h2>forma parte de nuestros <strong>próximos eventos</strong></h2>
        </header>

        <?php
            $args = array(
                        'post_type'      => 'inspira_events',
                        'post_status'    => 'publish',
                        'order'          => 'asc',
                        'orderby'        => 'meta_value',
                        'meta_key'       => 'inspira_events_enddate',
                        'meta_value'     => date('U'),
                        'meta_compare'   => '>=',
                        'posts_per_page' => 4
                    );

            $query = new WP_Query($args);

            if ( $query->have_posts() ) { ?>
                <ul class="events-list">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <li><a href="<?php the_permalink(); ?>" class="hexagon" style="background-image: url('<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium', true )[0]; ?>');">
                            <span class="content">
                                <span class="info">
                                    <strong><?php the_title(); ?></strong>
                                    <date><?php echo date('d - F - o', get_post_meta(get_the_id(), 'inspira_events_enddate', true) ); ?></date>
                                </span>
                            </span>
                            <span class="face1"></span>
                            <span class="face2"></span>
                        </a></li>
                    <?php endwhile; ?>
                </ul>
            <?php }

            wp_reset_query();
        ?>

        <div class="links">
            <a href="<?php echo get_permalink( get_page_by_path('participa') ); ?>#eventos" class="more">Ver más</a>
        </div>
    </div></section>

    <section class="home-news"><div class="contents">
        <header>
            <h1><img src="<?php echo get_template_directory_uri(); ?>/img/text-inspira-transformacion.png" alt="Inspira Transformación" /></h1>
            <h2>equipo <strong>siempre en acción</strong></h2>
        </header>

        <?php
            $feats = array(
                        'category_name'  => 'Featured',
                        'posts_per_page' => 5
                    );

            $query = new WP_Query($feats);

            if ( $query->have_posts() ) { ?>
                <div class="news-carousel big-previews-posts owl-carousel">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <article>
                            <?php the_post_thumbnail(); ?>
                            <header>
                                <h1><?php the_title(); ?></h1>
                                <date><?php the_date(); ?></date>
                                <a href="<?php echo get_permalink(); ?>" rel="bookmark">Leer más</a>
                            </header>
                        </article>
                    <?php endwhile; ?>
                </div>
            <?php }

            wp_reset_query();
        ?>

        <div class="links">
            <a href="<?php echo get_permalink( get_page_by_path('blog') ); ?>" class="more">Más inspiración</a>
        </div>
    </div></section>

    <section class="home-importante"><div class="contents">
        <header>
            <h1><img src="<?php echo get_template_directory_uri(); ?>/img/text-inspira-importante.png" alt="Inspira es Importante" /></h1>
        </header>


        <figure>
            <img src="<?php echo get_template_directory_uri(); ?>/img/joven-importante.jpg" alt="" />
        </figure>

        <div class="conts">
            <?php
                while ( have_posts() ) : the_post();
                    the_content('');
                endwhile;
            ?>
        </div>

    </div></section>

    <div class="footer-link">
        <a href="<?php echo get_permalink( get_page_by_path('nosotros') ); ?>" class="inspirate-btn button yellow">inspírate</a>
    </div>

<?php get_footer(); ?>
