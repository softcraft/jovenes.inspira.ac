<?php
/**
 * @package WordPress
 * @subpackage Inspira
 * @since Inspira 1.0
 */

if ( ! function_exists('inspira_setup') ) :

    function inspira_setup() {
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');

        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(660, 320, false);
        add_image_size('modal-thumb', 320, 370, true);
        add_image_size('mini-thumb', 150, 150, true);

        register_nav_menus( array(
            'primary' => __('Main Nav', 'inspira')
        ) );
    }

endif;
add_action('after_setup_theme', 'inspira_setup');

function get_the_twitter_excerpt() {
    $excerpt = get_the_content();
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $the_str = substr($excerpt, 0, 140);

    return $the_str;
}

function inspira_scripts() {
    wp_enqueue_style('inspira-fonts', '//fonts.googleapis.com/css?family=Nixie+One|Lato:100,300,400,700,900');
    wp_enqueue_style('inspira-modals', get_template_directory_uri().'/css/jquery.remodal.css');
    wp_enqueue_style('inspira-carousel', get_template_directory_uri().'/css/owl.carousel.css');
    wp_enqueue_style('inspira-styles', get_stylesheet_uri());

    wp_register_script('inspira-modals', get_template_directory_uri().'/js/jquery.remodal.min.js');
    wp_register_script('inspira-carousel', get_template_directory_uri().'/js/owl.carousel.min.js');
    wp_register_script('inspira-scripts', get_template_directory_uri().'/js/scripts.js');
    wp_enqueue_script('inspira-modals');
    wp_enqueue_script('inspira-carousel');
    wp_enqueue_script('inspira-scripts');
}
add_action('wp_enqueue_scripts', 'inspira_scripts');

function create_values() {
    $labels = array(
        'name'               => _x('Valores', 'post type general name'),
        'singular_name'      => _x('Value', 'post type singular name'),
        'add_new'            => _x('Add New', 'events'),
        'add_new_item'       => __('Add New Value'),
        'edit_item'          => __('Edit Value'),
        'new_item'           => __('New Value'),
        'view_item'          => __('View Value'),
        'search_items'       => __('Search Values'),
        'not_found'          =>  __('No values found'),
        'not_found_in_trash' => __('No values found in Trash'),
        'parent_item_colon'  => ''
    );

    $args = array(
        'label'             => __('Valores'),
        'labels'            => $labels,
        'public'            => false,
        'can_export'        => true,
        'show_ui'           => true,
        '_builtin'          => false,
        'capability_type'   => 'post',
        'hierarchical'      => false,
        'rewrite'           => array('slug' => 'valores'),
        'supports'          => array('title', 'thumbnail', 'editor'),
        'show_in_nav_menus' => true
    );

    register_post_type('inspira_values', $args);
}
add_action('init', 'create_values');

function create_volunteers() {
    $labels = array(
        'name'               => _x('Voluntarios', 'post type general name'),
        'singular_name'      => _x('Volunteer', 'post type singular name'),
        'add_new'            => _x('Add New', 'events'),
        'add_new_item'       => __('Add New Volunteer'),
        'edit_item'          => __('Edit Volunteer'),
        'new_item'           => __('New Volunteer'),
        'view_item'          => __('View Volunteer'),
        'search_items'       => __('Search Activities'),
        'not_found'          =>  __('No values found'),
        'not_found_in_trash' => __('No values found in Trash'),
        'parent_item_colon'  => ''
    );

    $args = array(
        'label'             => __('Voluntarios'),
        'labels'            => $labels,
        'public'            => false,
        'can_export'        => true,
        'show_ui'           => true,
        '_builtin'          => false,
        'capability_type'   => 'post',
        'hierarchical'      => false,
        'rewrite'           => array('slug' => 'voluntarios'),
        'supports'          => array('title', 'editor'),
        'show_in_nav_menus' => true
    );

    register_post_type('inspira_volunteers', $args);
}
add_action('init', 'create_volunteers');

function create_activities() {
    $labels = array(
        'name'               => _x('Actividades', 'post type general name'),
        'singular_name'      => _x('Activity', 'post type singular name'),
        'add_new'            => _x('Add New', 'events'),
        'add_new_item'       => __('Add New Activity'),
        'edit_item'          => __('Edit Activity'),
        'new_item'           => __('New Activity'),
        'view_item'          => __('View Activity'),
        'search_items'       => __('Search Activities'),
        'not_found'          =>  __('No values found'),
        'not_found_in_trash' => __('No values found in Trash'),
        'parent_item_colon'  => ''
    );

    $args = array(
        'label'             => __('Actividades'),
        'labels'            => $labels,
        'public'            => false,
        'can_export'        => true,
        'show_ui'           => true,
        '_builtin'          => false,
        'capability_type'   => 'post',
        'hierarchical'      => false,
        'rewrite'           => array('slug' => 'actividades'),
        'supports'          => array('title', 'thumbnail', 'editor'),
        'show_in_nav_menus' => true
    );

    register_post_type('inspira_activities', $args);
}
add_action('init', 'create_activities');

function events_styles() {
    global $post_type;

    if ('inspira_events' != $post_type) {
        return;
    }
    wp_enqueue_style('ui-datepicker', get_bloginfo('template_url').'/css/admin.css');
}

function events_scripts() {
    global $post_type;

    if ('inspira_events' != $post_type) {
        return;
    }

    wp_enqueue_script('jquery-ui', get_bloginfo('template_url').'/js/jquery-ui.min.js', array('jquery'));
    wp_enqueue_script('custom_script', get_bloginfo('template_url').'/js/admin.js', array('jquery'));
}

add_action( 'admin_print_styles-post.php', 'events_styles', 1000 );
add_action( 'admin_print_styles-post-new.php', 'events_styles', 1000 );

add_action( 'admin_print_scripts-post.php', 'events_scripts', 1000 );
add_action( 'admin_print_scripts-post-new.php', 'events_scripts', 1000 );

function create_events() {
    $labels = array(
        'name'               => _x('Eventos', 'post type general name'),
        'singular_name'      => _x('Event', 'post type singular name'),
        'add_new'            => _x('Add New', 'events'),
        'add_new_item'       => __('Add New Event'),
        'edit_item'          => __('Edit Event'),
        'new_item'           => __('New Event'),
        'view_item'          => __('View Event'),
        'search_items'       => __('Search Events'),
        'not_found'          =>  __('No events found'),
        'not_found_in_trash' => __('No events found in Trash'),
        'parent_item_colon'  => '',
    );

    $args = array(
        'label'             => __('Eventos'),
        'labels'            => $labels,
        'public'            => true,
        'can_export'        => true,
        'show_ui'           => true,
        '_builtin'          => false,
        'capability_type'   => 'post',
        'hierarchical'      => false,
        'rewrite'           => array('slug' => 'eventos'),
        'supports'          => array('title', 'thumbnail', 'editor'),
        'show_in_nav_menus' => true,
        'taxonomies'        => array('category')
    );

    register_post_type('inspira_events', $args);
}
add_action('init', 'create_events');

function inspira_events_edit_columns($columns) {
    $columns = array(
            'cb'                   => '<input type=\'checkbox\' />',
            'inspira_col_ev_cat'   => 'Category',
            'inspira_col_ev_date'  => 'Dates',
            'inspira_col_ev_times' => 'Times',
            'inspira_col_ev_thumb' => 'Thumbnail',
            'title'                => 'Event',
            'inspira_col_ev_desc'  => 'Description',
        );

    return $columns;
}

function inspira_events_custom_columns($column) {
    global $post;
    $custom = get_post_custom();

    switch ($column) {

    case 'inspira_col_ev_cat':
        $eventcats      = get_the_terms($post->ID, 'category');
        $eventcats_html = array();

        if ($eventcats) {
            foreach ($eventcats as $eventcat) {
                array_push($eventcats_html, $eventcat->name);
                echo implode($eventcats_html, ', ');
            }
        } else {
            _e('None', 'themeforce');;
        }

        break;

    case 'inspira_col_ev_date':
        $startd     = $custom['inspira_events_startdate'][0];
        $endd       = $custom['inspira_events_enddate'][0];
        $startdate  = date('F j, Y', $startd);
        $enddate    = date('F j, Y', $endd);

        echo $startdate . '<br /><em>' . $enddate . '</em>';
        break;

    case 'inspira_col_ev_times':
        $startt      = $custom['inspira_events_startdate'][0];
        $endt        = $custom['inspira_events_enddate'][0];
        $time_format = get_option('time_format');
        $starttime   = date($time_format, $startt);
        $endtime     = date($time_format, $endt);

        echo $starttime . ' - ' .$endtime;
        break;

    case 'inspira_col_ev_thumb':
        $post_image_id = get_post_thumbnail_id(get_the_ID());

        if ($post_image_id) {
            $thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);

            if ($thumbnail) (string)$thumbnail = $thumbnail[0];
            echo '<img src="'.$thumbnail.'" alt="" height="100" width="100" />';
        }
        break;

    case 'inspira_col_ev_desc';
        the_excerpt();
        break;

    }
}
add_filter ('manage_edit-inspira_events_columns', 'inspira_events_edit_columns');
add_action ('manage_posts_custom_column', 'inspira_events_custom_columns');

function inspira_events_create() {
    add_meta_box('inspira_events_meta', 'Eventos', 'inspira_events_meta', 'inspira_events');
}

function inspira_events_meta() {
    global $post;
    $custom      = get_post_custom($post->ID);
    $meta_sd     = $custom['inspira_events_startdate'][0];
    $meta_ed     = $custom['inspira_events_enddate'][0];
    $meta_ad     = $custom['inspira_events_address'][0];
    $meta_st     = $meta_sd;
    $meta_et     = $meta_ed;
    $date_format = get_option('date_format');
    $time_format = get_option('time_format');

    if ($meta_sd == null) {
        $meta_sd = time();
        $meta_ed = $meta_sd;
        $meta_st = 0;
        $meta_et = 0;
        $meta_ad = '';
    }

    $clean_sd = date('D, M d, Y', $meta_sd);
    $clean_ed = date('D, M d, Y', $meta_ed);
    $clean_st = date($time_format, $meta_st);
    $clean_et = date($time_format, $meta_et);

    echo '<input type="hidden" name="inspira-events-nonce" id="inspira-events-nonce" value="'.wp_create_nonce( 'inspira-events-nonce' ).'" />';
    ?>
    <div class="inspira-meta">
        <ul>
            <li><label>Fecha de inicio:</label><input type="text" name="inspira_events_startdate" class="inspiradate" value="<?php echo $clean_sd; ?>" /></li>
            <li><label>Hora de inicio: <em>(Usar formato de 24h (7pm = 19:00))</em></label><input type="text" name="inspira_events_starttime" value="<?php echo $clean_st; ?>" /></li>
            <li><label>Fecha de termino:</label><input type="text" name="inspira_events_enddate" class="inspiradate" value="<?php echo $clean_ed; ?>" /></li>
            <li><label>Hora de termino: <em>(Usar formato de 24h (7pm = 19:00))</em></label><input type="text" name="inspira_events_endtime" value="<?php echo $clean_et; ?>" /></li>
            <li><label>Dirección:</label><textarea name="inspira_events_address" cols="60" rows="6"><?php echo $meta_ad; ?></textarea></li>
        </ul>
    </div>
    <?php
}
add_action('admin_init', 'inspira_events_create');

function save_inspira_events() {
    global $post;

    if ( !wp_verify_nonce( $_POST['inspira-events-nonce'], 'inspira-events-nonce' )) {
        return $post->ID;
    }

    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;

    if( !isset($_POST['inspira_events_startdate']) ):
        return $post;
    endif;

    $updatestartd = strtotime ( $_POST['inspira_events_startdate'].$_POST['inspira_events_starttime'] );
    update_post_meta($post->ID, 'inspira_events_startdate', $updatestartd );

    if( !isset($_POST['inspira_events_enddate']) ):
        return $post;
    endif;

    $updateendd = strtotime ( $_POST['inspira_events_enddate'].$_POST['inspira_events_endtime']);
    update_post_meta($post->ID, 'inspira_events_enddate', $updateendd );

    $updateaddress = nl2br( $_POST['inspira_events_address'] );
    update_post_meta($post->ID, 'inspira_events_address', $updateaddress);
}
add_action ('save_post', 'save_inspira_events');

function events_updated_messages($messages) {
    global $post, $post_ID;

    $messages['inspira_events'] = array(
        0 => '',
        1 => sprintf( __('Event updated. <a href="%s">View item</a>'), esc_url( get_permalink($post_ID) ) ),
        2 => __('Custom field updated.'),
        3 => __('Custom field deleted.'),
        4 => __('Event updated.'),
        5 => isset($_GET['revision']) ? sprintf( __('Event restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6 => sprintf( __('Event published. <a href="%s">View event</a>'), esc_url( get_permalink($post_ID) ) ),
        7 => __('Event saved.'),
        8 => sprintf( __('Event submitted. <a target="_blank" href="%s">Preview event</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
        9 => sprintf( __('Event scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview event</a>'),
        date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
        10 => sprintf( __('Event draft updated. <a target="_blank" href="%s">Preview event</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    );

    return $messages;
}
add_filter('post_updated_messages', 'events_updated_messages');

if ( function_exists('register_field_group') ) {
    register_field_group(array (
        'id'     => 'acf_categorias-sucursales-valores',
        'title'  => 'Categorías (Sucursales & Valores)',
        'fields' => array (
            array (
                'key'           => 'field_55420891185d5',
                'label'         => 'Dirección',
                'name'          => 'direccion',
                'type'          => 'textarea',
                'default_value' => '',
                'placeholder'   => '',
                'maxlength'     => '',
                'rows'          => '',
                'formatting'    => 'br'
            ),
            array (
                'key'           => 'field_554208a1185d6',
                'label'         => 'Teléfono',
                'name'          => 'telefono',
                'type'          => 'text',
                'default_value' => '',
                'placeholder'   => '',
                'prepend'       => '',
                'append'        => '',
                'formatting'    => 'html',
                'maxlength'     => ''
            ),
            array (
                'key'           => 'field_554208a7185d7',
                'label'         => 'Email',
                'name'          => 'email',
                'type'          => 'email',
                'default_value' => '',
                'placeholder'   => '',
                'prepend'       => '',
                'append'        => ''
            ),
            array (
                'key'           => 'field_554208ad185d8',
                'label'         => 'Facebook',
                'name'          => 'facebook',
                'type'          => 'text',
                'default_value' => '',
                'placeholder'   => '',
                'prepend'       => '',
                'append'        => '',
                'formatting'    => 'html',
                'maxlength'     => ''
            ),
            array (
                'key'           => 'field_554215aad45a0',
                'label'         => 'Facebook URL',
                'name'          => 'facebook_url',
                'type'          => 'text',
                'default_value' => '',
                'placeholder'   => '',
                'prepend'       => '',
                'append'        => '',
                'formatting'    => 'html',
                'maxlength'     => ''
            ),
            array (
                'key'          => 'field_5545564773916',
                'label'        => 'Imágen de modal',
                'name'         => 'imagen_de_modal',
                'type'         => 'image',
                'instructions' => 'Imagen que aparece en el modal de la sección de proyectos.',
                'save_format'  => 'object',
                'preview_size' => 'thumbnail',
                'library'      => 'all'
            ),
            array (
                'key'           => 'field_5545567e73917',
                'label'         => '',
                'name'          => '',
                'type'          => 'text',
                'default_value' => '',
                'placeholder'   => '',
                'prepend'       => '',
                'append'        => '',
                'formatting'    => 'html',
                'maxlength'     => ''
            ),
        ),
        'location' => array (
            array (
                array (
                    'param'     => 'ef_taxonomy',
                    'operator'  => '==',
                    'value'     => 'category',
                    'order_no'  => 0,
                    'group_no'  => 0
                ),
            ),
        ),
        'options' => array (
            'position'       => 'acf_after_title',
            'layout'         => 'no_box',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0
    ));

    register_field_group(array (
        'id' => 'acf_links-externos',
        'title'  => 'Links Externos',
        'fields' => array (
            array (
                'key'           => 'field_55420c34e0956',
                'label'         => 'Facebook',
                'name'          => 'facebook',
                'type'          => 'text',
                'default_value' => '',
                'placeholder'   => '',
                'prepend'       => '',
                'append'        => '',
                'formatting'    => 'html',
                'maxlength'     => ''
            ),
            array (
                'key'           => 'field_55420c48e0957',
                'label'         => 'Twitter',
                'name'          => 'twitter',
                'type'          => 'text',
                'default_value' => '',
                'placeholder'   => '',
                'prepend'       => '',
                'append'        => '',
                'formatting'    => 'html',
                'maxlength'     => ''
            ),
        ),
        'location' => array (
            array (
                array (
                    'param'    => 'options_page',
                    'operator' => '==',
                    'value'    => 'acf-options',
                    'order_no' => 0,
                    'group_no' => 0
                ),
            ),
        ),
        'options' => array (
            'position'       => 'normal',
            'layout'         => 'no_box',
            'hide_on_screen' => array (
            )
        ),
        'menu_order' => 0
    ));
}

include_once('acf-options-page.php');
?>
