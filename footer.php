<?php
/**
 * @package WordPress
 * @subpackage Inspira
 * @since Inspira 1.0
 */
?>

    </div>

    <footer role="contentinfo" class="mastfoot">
        <div class="ideas">Ideas que unen</div>

        <a href="<?php echo get_permalink( get_page_by_path('escribenos') ); ?>">Escríbenos</a>
        <a href="<?php echo get_field('facebook', 'option'); ?>" class="facebook">Facebook</a>
        <a href="<?php echo get_field('twitter', 'option'); ?>" class="twitter">Twitter</a>
    </footer>

    <?php wp_footer(); ?>
    <script src="js/scripts.js"></script>
</div>
</body>
</html>
