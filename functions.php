<?php
require("functions/wordpress.php");
require("functions/shortcodes.php");



/**
* THEME FUNCTIONS
*/

/*
* Return directory paths. By default it returns the template directorys
*/
function banana_url($name, $append = ""){
	$tmpl = get_bloginfo( 'template_url' );
	$url =  $tmpl;
	
	switch($name){
		case "images":
			 $url = $tmpl . "/images/";
		break;
		default:
			$url = $tmpl;
	}
	
	$url .= "/". $append;
	
	return $url;
}

/**
* Return the template file path
*/
function template_path( $scriptName = "" ){
  return dirname(__FILE__) ."/". $scriptName;
}

/*
* Is the post a recipe
*/
function is_recipe_post($postId){
  $tags = get_the_tags($wp_query->post->ID);
  
  // Go through the tags and look for the recipe tag
  if ($tags) {
    foreach($tags as $tag) {
      if( $tag->name == 'recipe' ){ 
        return true;
      } 
    }
  }
  
  return false;
}

/*
* Add ?print to the post URL
*/
function the_printable_url($postId){
  $url = get_permalink($postId);
  
  if( strrpos($url, "?") != FALSE ){
    $url .= "&print";
  }
  else{
    $url .= "?print";
  }
  
  return $url;
}

/*
* Are we viewing the printable version of a page
*/
function is_printable(){
  return (isset($_REQUEST['print']));
}

/*
* Returns the default array of nutrition facts
*/
function get_the_nutrition_facts_array(){ 
  return array( 'servings' => '?',
                  'calories' => '?',
                  'cal-fat' => '?',
                  'fat' => '?',
                  'sat-fat' => '?',
                  'cholesterol' => '?',
                  'sodium' => '?',
                  'carbohydrate' => '?',
                  'fiber' => '?',
                  'sugars' => '?',
                  'protein' => '?',
                  'source' => 'http://www.livestrong.com/profile/jgillick/' );
}

/*
* Get the formatted nutritional facts values for the post
*/
function get_the_nutrition_facts($postId = -1){
  global $post;
  
  if( $postId < 0 ){
    $postId = $post->ID;
  }
  
  $meta = get_post_custom($postId);
  $facts = get_the_nutrition_facts_array();

  // Convert and round all the numbers
  $found = 0;
  foreach($facts as $key => $value) {

    if( isset($meta[$key]) && isset($meta[$key][0]) && is_numeric($meta[$key][0]) ){ 
      $found++;
      $facts[$key] = intval(round(floatval($meta[$key][0])));
    } 
  }
  
  // Get source URL
  if( isset($meta['livestrong-url']) && !empty($meta['livestrong-url'][0]) ){
   $facts['source'] = $meta['livestrong-url'][0];
  }
  
  if( $found > 0 ){
    return $facts;
  }
  return false;
}

/*
* The post excerpt or blog description without any HTML tags
*/
function get_page_description(){
  global $post;
  
  $excerpt = get_bloginfo('description');
  
  // Get post excerpt
  if ( is_single() ){

    if(!empty($post->post_excerpt) ) {
      $excerpt = strip_tags($post->post_excerpt);
      
    } elseif (!empty($post->post_content)){
      $len = new_excerpt_length(55);
      $excerpt = strip_tags($post->post_content); // remove tags
      $excerpt = preg_replace("/\s+/", " ", $excerpt); // collapse multiple spaces
      $words = explode(" ", $excerpt);
        
      // Trim
      if( count($words) > $len ){
        $words = array_slice($words, 0, $len);
        $excerpt = implode(" ", $words) ."...";
      }
    }
     
  }
  
  return $excerpt;
}

/**
* Process a template and return the output
*/
function get_include_contents($filename, $vars = array()) {
    if (is_file($filename)) {
        ob_start();
        
        // Set variables
        extract($vars);
        
        // Include script and get content
        include $filename;
        $contents = ob_get_contents();
        ob_end_clean();
        return $contents;
    }
    return "";
}

?>

