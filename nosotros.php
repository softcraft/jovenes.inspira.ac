<?php
/**
 * Template Name: Nosotros
 * @package WordPress
 * @subpackage Inspira
 * @since Inspira 1.0
 */

get_header(); ?>

    <header class="title-img" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/bg-carpe-diem.jpg')">
        <h1><img src="<?php echo get_template_directory_uri(); ?>/img/text-carpe-diem.png" alt="#CarpeDiem" /></h1>
    </header>

    <section class="norte"><div class="contents">
        <img src="<?php echo get_template_directory_uri(); ?>/img/compass.png" alt="" />
        <h1>Nuestro norte es</h1>
        <p><strong>Inspirar y acompañar</strong> a las personas para <strong>crear experiencias interiores con acciones exteriores.</strong></p>
    </div></section>

    <section class="nosotros-hacemos"><div class="contents">
        <h1><img src="<?php echo get_template_directory_uri(); ?>/img/text-provocamos.png" alt="#Provocamos" /></h1>
        <p>El desarrollo de capacidades para <strong>experimentar la vida intensamente</strong>.</p>
    </div></section>

    <section class="nosotros-hacemos"><div class="contents">
        <h1><img src="<?php echo get_template_directory_uri(); ?>/img/text-promovemos.png" alt="#Promovemos" /></h1>
        <p>El trabajo para <strong>experimentar la vida intensamente</strong>.</p>
        <p>Interacción entre <strong>personas de diferentes</strong> características para <strong>dar lo mejor</strong> que tienen para compartir.</p>
    </div></section>

    <div class="img-div">
        <img src="<?php echo get_template_directory_uri(); ?>/img/bg-cultura-movimiento.jpg" class="big" alt="Somos Cultura en Movimiento" />
        <img src="<?php echo get_template_directory_uri(); ?>/img/bg-cultura-movimiento-small.jpg" class="small" alt="Somos Cultura en Movimiento" />
    </div>

    <section class="proyectos"><div class="contents">
        <h1><strong>Inspiramos transformación</strong> a través de diversos proyectos:</h1>

        <ul>
            <?php
                $category = get_category_by_slug('proyectos');
                $cat_id   = $category->term_id;

                $args = array(
                    'parent'     => $cat_id,
                    'hide_empty' => 0
                );

                $categories = get_categories($args);

                foreach($categories as $category) {
                    $thumb = get_field('imagen_de_modal', 'category_'.$category->cat_ID);
                    $image = wp_get_attachment_image_src( $thumb['id'], 'modal-thumb' );

                    // echo '<pre>'; print_r(get_field('imagen_de_modal', 'category_'.$category->cat_ID)); echo '</pre>';
                    echo
                        '<li>
                            <a href="'.get_category_link($category->cat_ID).'" class="proyecto-'.$category->slug.'" data-remodal-target="'.$category->slug.'">
                                <span class="ico"></span>
                                Inspira
                                <strong>'.$category->name.'</strong>
                            </a>
                            <div class="proyecto-info remodal" data-remodal-id="'.$category->slug.'">
                                <img src="'.$image[0].'" alt="" />

                                <div class="content">
                                    <strong class="title">INSPIRA</strong>
                                    <em class="sub">'.$category->name.'</em>
                                    <p>'.$category->description.'</p>
                                    <a href="'.get_permalink( get_page_by_path('escribenos') ).'" class="button yellow">únete</a>
                                </div>
                            </div>
                        </li>';
                }
            ?>
        </ul>
    </div></section>

    <div class="img-div">
        <img src="<?php echo get_template_directory_uri(); ?>/img/bg-valores.jpg" class="big" alt="Con valores que nos mueven" />
        <img src="<?php echo get_template_directory_uri(); ?>/img/bg-valores-small.jpg" class="small" alt="Con valores que nos mueven" />
    </div>

    <section class="valores"><div class="contents">
        <?php
            $args = array(
                        'post_type'      => 'inspira_values',
                        'post_status'    => 'publish',
                        'posts_per_page' => -1
                    );

            $query = new WP_Query($args);

            if ( $query->have_posts() ) { ?>
                <ul>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <li><span class="hexagon" style="background-image: url('<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium', true )[0] ?>');">
                            <span class="content title"><img src="<?php echo get_template_directory_uri(); ?>/img/text-<?php echo the_title( '', '' ); ?>.png" alt="#<?php echo the_title( '', '' ); ?>" /></span>
                            <span class="content description">
                                <em class="close"></em>
                                <span><?php the_content(); ?></span>
                            </span>
                            <span class="face1"></span>
                            <span class="face2"></span>
                        </span></li>
                    <?php endwhile; ?>
                </ul>
            <?php }

            wp_reset_query();
        ?>
    </div></section>

    <div class="footer-link">
        <a href="<?php echo get_permalink( get_page_by_path('participa') ); ?>" class="inspirate-btn button yellow">inspira</a>
    </div>

<?php get_footer(); ?>
