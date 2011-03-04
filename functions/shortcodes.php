<?php
/**
*
* This file defines shortcodes for the theme
*
*/

/**
* Wrap a page anchor around some text
*/
function anchor_shortcode( $atts, $content = ""){
  extract(shortcode_atts( array(
     'id' => false
     ), $atts));
  
  // No ID, no page anchor
  if( $id === false ){
    return $content;
  }

  return "<span id='{$id}' class='page-anchor'>{$content}</span>";
}
add_shortcode( 'anchor', 'anchor_shortcode' );

/**
* Injects the nutritional information box.
* It will use the current post by default, or you can pass it all the nutrition
* info as attributes: servings, calories, cal-fat, fat, sat-fat, cholesterol, sodium, carbohydrate, fiber, sugars, protein, source
*/
function nutrition_shortcode( $atts ) {

  if( count($atts) > 1){
    $nutrFact = shortcode_atts( get_the_nutrition_facts_array(), $atts );
  }
  else{
  	$nutrFact = get_the_nutrition_facts(); 
  }
  
	$output = get_include_contents( template_path('nutrition-facts.php'), array("nutrFact" => $nutrFact) );
	unset($nutrFact);
	
	return $output;
}
add_shortcode( 'nutrition', 'nutrition_shortcode' );

?>