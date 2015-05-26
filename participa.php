<?php
/**
 * Template Name: Participa
 * @package WordPress
 * @subpackage Inspira
 * @since Inspira 1.0
 */

get_header(); ?>

    <div class="img-div no-full headless-slider">
        <img src="<?php echo get_template_directory_uri(); ?>/img/bg-rock-clasica.jpg" alt="Rock/Clásica" />
        <img src="<?php echo get_template_directory_uri(); ?>/img/bg-cafe-te.jpg" alt="Café/Té" />
        <img src="<?php echo get_template_directory_uri(); ?>/img/bg-amanecer-atardecer.jpg" alt="Amanecer/Atardecer" />
        <img src="<?php echo get_template_directory_uri(); ?>/img/bg-tradicion-moderno.jpg" alt="Tradición/Moderno" />
        <img src="<?php echo get_template_directory_uri(); ?>/img/bg-dulce-salado.jpg" alt="Dulce/Salado" />
    </div>

    <section class="actividades"><div class="contents">
        <h1>cada quien se <strong>INSPIRA</strong> de manera <strong>DIFERENTE</strong></h1>
        <p>Hay muchas formas de participar en nuestras actividades. ¡tú eliges!</p>

        <?php
            $args = array(
                        'post_type'      => 'inspira_activities',
                        'post_status'    => 'publish',
                        'posts_per_page' => 3
                    );

            $query = new WP_Query($args);

            if ( $query->have_posts() ) { ?>
                <ul>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <li>
                            <a href="<?php the_permalink(); ?>" data-remodal-target="<?php the_title(); ?>">
                                <span class="icon ico-<?php the_title(); ?>"></span>
                                INSPIRA
                                <strong><?php the_title(); ?></strong>
                            </a>
                            <div data-remodal-id="<?php the_title(); ?>" class="remodal proyecto-info">
                                <?php the_post_thumbnail('modal-thumb'); ?>

                                <div class="content">
                                    <strong class="title">INSPIRA</strong>
                                    <em class="sub"><?php the_title(); ?></em>
                                    <?php the_content(); ?>
                                    <a href="<?php echo get_permalink( get_page_by_path('escribenos') ); ?>" class="button yellow">únete</a>
                                </div>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php }

            wp_reset_query();
        ?>
    </div></section>

    <header class="title-img short" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/bg-cambios.jpg')">
        <h1><img src="<?php echo get_template_directory_uri(); ?>/img/text-yo-inspiro-cambios.png" alt="#YoInspiroCambios" /></h1>
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
                    'posts_per_page' => 8
                );

        $query = new WP_Query($args);

        if ( $query->have_posts() ) { ?>

            <section class="blog-filters contents centered">
                <form action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <fieldset>
                        <label>Encuentra y elige el proyecto para ti</label>
                        <input type="hidden" name="post_type" value="inspira_events" />

                        <label class="styled-select purple">
                            <?php
                                $args = array(
                                            'show_option_all'    => 'Todas',
                                            'show_option_none'   => ' - ',
                                            'orderby'            => 'NAME',
                                            'order'              => 'DESC',
                                            'show_count'         => 0,
                                            'child_of'           => 1,
                                            'echo'               => 1,
                                            'name'               => 'cat',
                                            'id'                 => 'ciudades',
                                            'taxonomy'           => 'category',
                                            'value_field'        => 'term_id'
                                        );

                                wp_dropdown_categories($args);
                            ?>
                        </label>

                        <div class="submit">
                            <input type="image" src="<?php echo get_template_directory_uri(); ?>/img/btn-busqueda.png" alt="Buscar" />
                        </div>
                    </fieldset>
                </form>
            </section>

            <section class="events"><div class="contents">
                <ul class="events-squared">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <li><a href="<?php the_permalink() ?>" style="background-image: url('<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium', true )[0]; ?>');">
                            <span class="info">
                                <strong class="title"><?php the_title(); ?></strong>
                                <em>fecha de inicio</em>
                                <date><?php echo date('d - F - o, g:i a', get_post_meta(get_the_id(), 'inspira_events_enddate', true) ); ?></date>
                                <?php echo get_the_twitter_excerpt(); ?>
                                <span class="button yellow">únete</span>
                            </span>
                        </a></li>
                    <?php endwhile; ?>
                </ul>
            </div></section>
    <?php } wp_reset_query(); ?>

    <div class="img-div no-full">
        <img src="<?php echo get_template_directory_uri(); ?>/img/bg-voluntario.jpg" alt="#Voluntario" />
    </div>

    <section class="voluntarios"><div class="contents">
        <h1>todos inspiramos de formas <img src="<?php echo get_template_directory_uri(); ?>/img/text-diferentes.png" alt="#diferentes" /></h1>
        <?php
            $args = array(
                        'post_type'      => 'inspira_volunteers',
                        'post_status'    => 'publish',
                        'order'          => 'asc',
                        'posts_per_page' => 8
                    );

            $query = new WP_Query($args);

            if ( $query->have_posts() ) { ?>
                <ul class="membresias">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <li>
                            <a href="#" data-remodal-target="<?php the_title(); ?>">
                                <?php the_title(); ?>
                            </a>
                            <div data-remodal-id="<?php the_title(); ?>" class="remodal volunteer-info">
                                <strong class="title">voluntario</strong>
                                <em class="sub"><?php the_title(); ?></em>
                                <?php the_content(); ?>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php } wp_reset_query(); ?>
    </div></section>

<?php get_footer(); ?>
