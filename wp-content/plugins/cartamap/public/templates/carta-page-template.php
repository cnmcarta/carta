<?php
get_header();
echo do_shortcode('[interactive_cartamap]');

$c_post = get_taxonomies();
foreach($c_post as $c_post){
    echo $c_post . " ";
};

get_footer();
?>