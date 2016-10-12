<?php
    function new_excerpt_more_child($more) {
        global $post;
        return '<a href="' . get_permalink($post->ID) . '" class="read-more-link>"' . '' . __('read more', 'minti') . ' &rarr;' . '</a>';
}

add_filter('excerpt_more', 'new-excerpt_more_child');

function child_theme_setup() {
    // override parent theme's 'more' text for excerpts
    remove_filter('excerpt_more', 'new_excerpt_more');
}
add_action('after_setup_theme', 'child_theme_setup');
?>
