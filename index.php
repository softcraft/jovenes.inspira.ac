<?php
/**
 * @package WordPress
 * @subpackage Inspira
 * @since Inspira 1.0
 */

get_header(); ?>

    <header class="title-banner">
        <h1><img src="<?php echo get_template_directory_uri(); ?>/img/text-inspirando-vidas-creando-cambio.png" alt="#InspirandoVidasCreandoCambio" /></h1>
    </header>

    <section class="blog-filters contents">
        <form action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <fieldset>
                <label>Encuentra los post de tu ciudad</label>

                <label class="styled-select purple">
                    <?php
                        $args = array(
                                    'show_option_all'    => 'Todas',
                                    'show_option_none'   => ' - ',
                                    'orderby'            => 'NAME',
                                    'order'              => 'DESC',
                                    'show_count'         => 0,
                                    'child_of'           => 3,
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

    <section class="blog"><div class="contents">

        <?php get_sidebar(); ?>

        <div class="content">
            <?php if ( have_posts() ) : ?>
                <ol class="simple-posts">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <li><article>
                            <figure><?php the_post_thumbnail('mini-thumb'); ?> </figure>

                            <header>
                                <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                                <h3>
                                    <?php
                                        $count      = 0;
                                        $categories = get_the_category();

                                        foreach ($categories as $category) {
                                            $count++;

                                            if ($category->cat_name != 'Featured') {
                                                echo '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a>';

                                                if( $count != count($categories) ){
                                                    echo ', ';
                                                }

                                            }
                                        }
                                    ?>
                                </h3>
                            </header>

                            <?php the_excerpt(); ?>

                            <footer>
                                <a href="<?php echo get_permalink(); ?>">Leer más &raquo;</a>
                            </footer>
                        </article></li>
                    <?php endwhile; ?>
                </ol>
            <?php else : ?>
                <div class="no-results">
                    <h1>No se encontraron resultados</h1>
                    <p>Intenta con otra búsqueda.</p>
                </div>
            <?php endif; ?>

            <div class="pagination">
                <?php echo paginate_links(  ); ?>
            </div>
        </div>

    </div></section>

<?php get_footer(); ?>
