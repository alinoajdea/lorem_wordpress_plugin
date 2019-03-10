<?php 
/*
    Plugin Name: Lorem for text and images
    Plugin URI: https://wordpress.org/plugins/
    Description: Custom text or images generator using placehold.it and loripsum.net / Read the documentation for available shortcodes and parameters.
    Author: Alin Oajdea
    Author URI: https://github.com/alinoajdea
    Version: 0.1
*/



function placeholdit(  $atts ) {
    $a = shortcode_atts( array(
        'type' => 'img',
        'w' => 100,
        'h' => 300,
        'bgcolor' => 'f1f1f1',
        'textcolor' => '000000',
        'text' => '',
        'elements' => 'headers',
        'length' => 'short',
        'p' => '5'
    ) , $atts );
    
    $type = $a['type'];

    switch($type) {
        case "img":
        $w = $a['w'];
        $h = $a['h'];
        $c = $a['bgcolor'];
        $f = $a['textcolor'];
        $t = $a['text'];
            
        return "<img src='http://placehold.it/".$w."x".$h."/".$c."/".$f."/?text=".$t."'>";
        break;

        case "text":
        $length = $a['length'];
        $p = $a['p'];
        $elements = $a['elements'];
        
            
        return file_get_contents("https://loripsum.net/api/".$length."/".$p."/".$elements);
        break;
    }


    
    
    
}
add_shortcode( 'placeholder', 'placeholdit' );
