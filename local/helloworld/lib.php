<?php

/**
 * Add link to index.php into navigation drawer.
 *      
 * @param global_navigation $root Node representing the global navigation tree.
 */
function local_helloworld_extend_navigation(global_navigation $root) {
    if (isloggedin() && !isguestuser()) {
        $node = navigation_node::create(
            get_string('hello', 'local_helloworld'),
            new moodle_url('/local/helloworld/index.php'),
            navigation_node::TYPE_CUSTOM,
            null,
            null,
            new pix_icon('t/message', '')
        );
    
        if (get_config('local_helloworld', 'showinnavigation')) {
            $node->showinflatnavigation = true;
        }
    
        $root->add_node($node);
    }
}