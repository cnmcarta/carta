<?php
get_header();
ob_start();
echo do_shortcode('[interactive_cartamap]');
ob_end_flush();
get_footer();

?>