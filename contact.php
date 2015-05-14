<?php
/**
 * Template Name: Contact
 * @package WordPress
 * @subpackage Inspira
 * @since Inspira 1.0
 */

get_header(); ?>

    <section class="contact"><div class="contents">

        <h1><img src="<?php echo get_template_directory_uri(); ?>/img/text-tu-nos-inspiras.png" alt="Tu Nos Inspiras" /></h1>

        <div class="address-selector">
            <header class="contact-head">
                <h2>Visítanos</h2>
                <strong class="sub">estamos donde tú estés</strong>
            </header>

            <?php
                $category = get_category_by_slug('ciudades');
                $cat_id   = $category->term_id;

                $args = array(
                    'parent'     => $cat_id,
                    'hide_empty' =>0
                );

                $categories = get_categories($args); ?>

            <label class="styled-select">
                <select class="contacto-ciudad">
                    <option>CIUDAD</option>
                    <?php
                        foreach($categories as $category) {
                            echo '<option value="'.$category->name.'">'.$category->name.'</option>';
                        }
                    ?>
                </select>
            </label>

            <div class="address">
                <?php
                    foreach($categories as $category) {
                        $email = get_field('email', 'category_'.$category->cat_ID);

                        echo
                            '<div class="address-wrap" data-city="'.$category->name.'">
                                <h2>INSPIRA</h2>
                                <strong class="sub">'.$category->name.'</strong>'
                                .get_field('direccion', 'category_'.$category->cat_ID).'
                                <br /><br />
                                <a href="mailto:"'.$email.'">'.$email.'</a>
                            </div>';
                    }
                ?>
            </div>
        </div>

         <section class="contact-form">
            <header class="contact-head">
                <h2>Escríbenos</h2>
                <strong class="sub">queremos conocerte</strong>
            </header>

            <?php
                while ( have_posts() ) : the_post();
                    the_content('');
                endwhile;
            ?>
        </section>
    </div></section>

<?php get_footer(); ?>
