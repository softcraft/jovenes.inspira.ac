<?php
/**
 * @package WordPress
 * @subpackage Inspira
 * @since Inspira 1.0
 */?><aside class="sidebar">
    <div class="img-ad">
        <a href="<?php echo get_permalink( get_page_by_path('escribenos') ); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/img/btn-unete.gif" alt="únete" class="normal" />
            <img src="<?php echo get_template_directory_uri(); ?>/img/btn-unete-hover.gif" alt="únete" class="hover" />
        </a>
    </div>

    <div class="calendario box">
        <h2>Calendario</h2>

        <?php
            $args = array(
                        'post_type'      => 'inspira_events',
                        'post_status'    => 'publish',
                        'order'          => 'asc',
                        'orderby'        => 'meta_value',
                        'meta_key'       => 'inspira_events_enddate',
                        'meta_value'     => date('U'),
                        'meta_compare'   => '>='
                    );

            $query = new WP_Query($args);

            if ( $query->have_posts() ) { ?>
                <ol>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <li><a href="<?php the_permalink(); ?>">
                            <strong>
                                <date><?php echo date('m.d', get_post_meta(get_the_id(), 'inspira_events_startdate', true) ); ?></date>
                                <?php the_title(); ?>
                            </strong>

                            <?php echo get_post_meta(get_the_id(), 'inspira_events_address', true); ?>
                        </a></li>
                    <?php endwhile; ?>
                </ol>
            <?php }

            wp_reset_query();
        ?>
    </div>
</aside>
