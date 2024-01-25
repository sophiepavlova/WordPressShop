<?php
class Shop_Top_Menu extends Walker_Nav_Menu {
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        // Override start_lvl to omit output of <ul> tag
    }

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        // Override end_lvl to omit output of closing </ul> tag
    }

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        // Add custom class to the menu item link
        $output .= '<a href="' . $item->url . '" class="text-body mr-3">' . $item->title . '</a>';
    }

    public function end_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        // No closing tags needed for individual menu items
    }
}

?>