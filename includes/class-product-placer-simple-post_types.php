<?php
function my_first_post_type(){

$args = array(
    
    'Labels' => array(
        
        'name' => 'cars',
        'singular_name' => 'car',
        
        
),

    'public' => true,
    'Has_archive' =>true,
    'Supports' => array('title', 'editor','thumbnail'),
    
    
);

register_post_type('cars', $args);


}
