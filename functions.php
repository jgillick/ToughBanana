<?php

/**
* CUSTOMIZE WORDPRESS
*/

/*
* Thumbnail support 
*/
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 100, 100, true ); 


/*
* Make excerpt 150 characters long
*/
function new_excerpt_length($length) {
	return 75;
}
add_filter('excerpt_length', 'new_excerpt_length');


/*
* Change elipsis for post excerpt
*/
function new_excerpt_more($more) {
	global $post;
	return '&hellip; <a href="'. get_permalink($post->ID) . '" class="read-more">Continue reading&rarr;</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/*
* Add thumbnail to RSS item
*/
function rss_post_thumbnail($content) {
	global $post;
	if(has_post_thumbnail($post->ID)) {
		$content = get_the_excerpt() . '<p>' . get_the_post_thumbnail($post->ID) .'</p>';
	}
	return $content;
}
add_filter('the_excerpt_rss', 'rss_post_thumbnail');
add_filter('the_content_feed', 'rss_post_thumbnail');


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
* Get the formatted nutritional facts values for the post
*/
function get_the_nutrition_facts($postId){
  $meta = get_post_custom($postId);
  $facts = array( 'servings' => '?',
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

  // Convert and round all the numbers
  $found = 0;
  foreach($facts as $key => $value) {

    if( isset($meta[$key]) && isset($meta[$key][0]) && is_numeric($meta[$key][0]) ){ 
      $found++;
      $facts[$key] = intval(round(floatval($meta[$key][0])));
    } 
  }
  
  // Get source
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

?>