<?php
/**
 * @package listcategory Hotel Quito
 * @version 0.0
 */
/*
Plugin Name: listcategory
Plugin URI: http://wordpress.org/plugins/pua-slider/
Description: listcategory by Kanika
Author: Nicolás Vela
Version: 0.0
Author URI: http://kanika.com
*/
class listcategory {
	public function __construct(){
    	add_shortcode( 'listcategory' , array( $this, 'listcategory_ini') ); 
    }
    public function listcategory_ini($atts){
    	$list = '<ul class="'.$atts['class'].'"><li><h4>'.$atts['tit'].'</h4></li>';
    	$my_query = new WP_Query( 'category_name='.$atts['cat'] );
    	//print_r($my_query);

    	if ( $my_query->have_posts() ) {
    		while ( $my_query->have_posts() ) {
    			$currpost = '';
    			$my_query->the_post();

    			$currpost .= '<li><a href="#" onclick="popup('."'".$my_query->post->ID."'".')">'.$my_query->post->post_title.'<span>+</span></a></li>';

    			$list .= $currpost;
    		}
    		wp_reset_postdata();
    	}
    	$list .= '</ul>';

    	return $list;
    }
}
$listcategory = new listcategory();