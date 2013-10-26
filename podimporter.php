<?php   
    /* 
    Plugin Name: PodImporter
    Plugin URI: http://williamagay.com
    Description: Import all the podcasts from a XML feed to wordpress articles.
    Author: William AGAY 
    Version: 1.0 
    Author URI: http://williamagay.com 
    */

    require_once('functions_main.php');
    require_once('refresh.php');

    function pi_admin_actions() {  

    	add_options_page("PodImporter", "PodImporter", 1, "PodImporter", "pi_admin_page");   
	}
	
	add_filter('cron_schedules', 'new_interval');

	// add once 10 minute interval to wp schedules
	function new_interval($interval) {
	
	    $interval['minutes_10'] = array('interval' => 10*60, 'display' => 'Once 10 minutes');
	
	    return $interval;
	}
	
	if ( ! wp_next_scheduled( 'my_task_hook' ) ) {
	  wp_schedule_event( time(), 'minutes_10', 'my_task_hook' );
	}
	
	add_action( 'my_task_hook', 'refresh_now' );

	function pi_admin_page(){

		$podcasts = get_feeds();

		include('adminpage.php');

		if($_GET['refresh']==true){
			refresh_now();
		}
	}

	function refresh_now(){

		$data = refresh();

		foreach ($data AS $elem) {
			
			addArticle($elem);
		}
	}

	function addArticle($article){

		$samearticle = get_page_by_title( $article['title'], $samearticle, 'post' );

		if($samearticle == NULL){

			// Get id of a category
			$categ = get_category_by_slug($article['slug']);

			if(!empty($article["duration"])){

				$postcontent = '<p>'.$article["summary"].'<br/><br/>Ce podcast dure <strong>'.$article["duration"].'</strong>.</p>';
			}
			else{

				$postcontent = '<p>'.$article["summary"].'</p>';
			}

			$date = date("Y-m-d H:i:s",strtotime($article['pubdate'])); 

			$post = array(
			  'post_author'    => '2',
			  'post_category'  => array(2, $categ->term_id),
			  'post_content'   => $postcontent,
			  'post_date'  => $date,
			  'post_status'    => 'publish',
			  'post_title'     => $article['title'],
			  'post_type'      => 'post',
			  'tags_input'     => $article['keywords']
			);

			$post_ID = wp_insert_post($post);
			// Image
			if(!empty($article['url_image'])){

				add_post_meta($post_ID, 'thumb-show', $article['url_image']);
			}
			
			// File
			if(!empty($article['url_file'])){

				add_post_meta($post_ID, 'file-show', $article['url_file']);
			}
		}
	}

add_action('admin_menu', 'pi_admin_actions');
add_action('admin_bar_menu', 'add_toolbar_items', 100);
	
	function add_toolbar_items($admin_bar){
		$admin_bar->add_menu( array(
			'id'    => 'podimporter',
			'title' => 'PodImporter',
			'href'  => get_bloginfo('url').'/wp-admin/options-general.php?page=PodImporter',	
			'meta'  => array(
				'title' => __('PodImporter'),			
			),
		));
	}