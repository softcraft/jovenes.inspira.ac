<?php
/**
 * Template Name: Dona
 * @package WordPress
 * @subpackage Inspira
 * @since Inspira 1.0
 */

get_header(); ?>

    <header class="title-img short" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/bg-ayuda.jpg')">
        <h1><img src="<?php echo get_template_directory_uri(); ?>/img/text-ayuda.png" alt="#Ayuda" /></h1>
    </header>

    <section class="diferencia"><div class="contents">
        <header>
            <hgroup>
                <h1>1 peso, 1 hora, 1 minuto o 1 segundo hacen la...</h1>
                <h2><img src="<?php echo get_template_directory_uri(); ?>/img/text-diferencia.png" alt="#Diferencia" /></h2>
            </hgroup>
        </header>

        <ul>
            <li><a href="<?php echo get_permalink( get_page_by_path('escribenos') ); ?>">
                <figure>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/peso.png" alt="" />
                </figure>
                <strong>1 peso</strong>
                <span>
                    diario es 1 planta al mes
                </span>
            </a></li>

            <li><a href="<?php echo get_permalink( get_page_by_path('escribenos') ); ?>">
                <figure>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/01.png" alt="01" />
                </figure>
                <strong>1 hora</strong>
                <span>
                    plantas 5 árboles
                </span>
            </a></li>

            <li><a href="<?php echo get_field('facebook', 'option'); ?>">
                <figure>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/01.png" alt="01" />
                </figure>
                <strong>1 minuto</strong>
                <span>
                    das share en facebook
                </span>
            </a></li>

            <li><a href="<?php echo get_field('twitter', 'option'); ?>">
                <figure>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/01.png" alt="01" />
                </figure>
                <strong>1 segundo</strong>
                <span>
                    nos retuiteas
                </span>
            </a></li>
        </ul>
    </div></section>

    <section class="presencia"><div class="contents">
        <h1><img src="<?php echo get_template_directory_uri(); ?>/img/text-hechos-que-inspiran.png" alt="#HechosQueInspiran" /></h1>
        <h2>Tenemos presencia en 12 estados de la república.</h2>

        <figure>
            <img src="<?php echo get_template_directory_uri(); ?>/img/mapa.jpg" alt="" />
        </figure>

        <ul>
            <?php
                $category = get_category_by_slug('ciudades');
                $cat_id   = $category->term_id;

                $args = array(
                    'parent'     => $cat_id,
                    'hide_empty' => 0
                );

                $categories = get_categories($args);

                foreach($categories as $category) {
                    echo
                        '<li><a href="'.get_field('facebook_url', 'category_'.$category->cat_ID).'">
                            <strong>INSPIRA</strong>
                            <em>'.$category->name.'</em>

                            <span class="tel">Teléfono: '.get_field('telefono', 'category_'.$category->cat_ID).'</span>
                            <span class="fb">Facebook: '.get_field('facebook', 'category_'.$category->cat_ID).'</span>
                        </a></li>';
                }
            ?>
        </ul>

    </div></section>

    <section class="logros"><div class="contents">
        <h1>Y todos nuestros donativos nos han ayudado a inspirar a muchos.</h1>

        <ul>
            <li>
                <img src="<?php echo get_template_directory_uri(); ?>/img/logros-01.jpg" alt="" />
                <strong>11 parques</strong>
                rehabilitados en 1 año
            </li>

            <li>
                <img src="<?php echo get_template_directory_uri(); ?>/img/logros-02.jpg" alt="" />
                <strong>11 escuelas</strong>
                renovadas por INSPIRA en 1 año
            </li>

            <li>
                <img src="<?php echo get_template_directory_uri(); ?>/img/logros-03.jpg" alt="" />
                <strong>228 árboles</strong>
                y plantas sembrados
            </li>

            <li>
                <em class="number">943</em>
                <strong>voluntarios</strong>
                participando activamente
            </li>

            <li>
                <em class="number">69</em>
                <strong>murales</strong>
                pintados
            </li>

            <li>
                <em class="number">41,300</em>
                <strong>metros cuadrados</strong>
                de parques y espacios renovados
            </li>
        </ul>

        <a href="<?php echo get_permalink( get_page_by_path('blog') ); ?>" class="button red">lee más</a>
    </div></section>

    <footer class="title-banner alt">
        <h1><img src="<?php echo get_template_directory_uri(); ?>/img/text-yo-hago-la-diferencia.png" alt="#YoHagolaDiferencia" /></h1>
    </footer>

<?php get_footer(); ?>
