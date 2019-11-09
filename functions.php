<?php
/**
 * Emineo Theme Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Emineo Theme
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_EMINEO_THEME_VERSION', '1.0.0' );
define( 'JOB_FEED_URL', 'https://recruitingapp-2895.umantis.com/XMLExport/133' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'emineo-theme-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_EMINEO_THEME_VERSION, 'all' );

}

/**
 * Include shortcodes
 */
include "shortcodes/agent.php";
include "shortcodes/single-job.php";
include "shortcodes/story-filter.php";
include "shortcodes/news-filter.php";
include "shortcodes/job-filter.php";

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

add_action( 'init', function(){

	// Agents CPT
	$labels = array(
		'name'               => _x( 'Agents', 'post type general name', 'astra-theme-css' ),
		'singular_name'      => _x( 'Agent', 'post type singular name', 'astra-theme-css' ),
		'menu_name'          => _x( 'Agents', 'admin menu', 'astra-theme-css' ),
		'add_new_item'       => __( 'Add New Agent', 'astra-theme-css' ),
		'new_item'           => __( 'New Agent', 'astra-theme-css' ),
		'edit_item'          => __( 'Edit Agent', 'astra-theme-css' ),
		'view_item'          => __( 'View Agent', 'astra-theme-css' ),
		'all_items'          => __( 'All Agents', 'astra-theme-css' ),
		'search_items'       => __( 'Search Agents', 'astra-theme-css' ),
		'not_found'          => __( 'No agents found.', 'astra-theme-css' )
	);
	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Add Agents here.', 'astra-theme-css' ),
		'public'             => true,
		'rewrite'            => array( 'slug' => 'agent' ),
		'has_archive'        => true,
		'supports'           => array( 'title', 'thumbnail', 'excerpt'  )
	);
	register_post_type( 'agent', $args );

	// News CPT
	// $labels = array(
	// 	'name'               => _x( 'News', 'post type general name', 'astra-theme-css' ),
	// 	'singular_name'      => _x( 'News', 'post type singular name', 'astra-theme-css' ),
	// 	'menu_name'          => _x( 'News', 'admin menu', 'astra-theme-css' ),
	// 	'add_new_item'       => __( 'Add New News', 'astra-theme-css' ),
	// 	'new_item'           => __( 'New News', 'astra-theme-css' ),
	// 	'edit_item'          => __( 'Edit News', 'astra-theme-css' ),
	// 	'view_item'          => __( 'View News', 'astra-theme-css' ),
	// 	'all_items'          => __( 'All News', 'astra-theme-css' ),
	// 	'search_items'       => __( 'Search News', 'astra-theme-css' ),
	// 	'not_found'          => __( 'No news found.', 'astra-theme-css' )
	// );
	// $args = array(
	// 	'labels'             => $labels,
	// 	'description'        => __( 'Add News here.', 'astra-theme-css' ),
	// 	'public'             => true,
	// 	'rewrite'            => array( 'slug' => 'news' ),
	// 	'has_archive'        => true,
	// 	'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt'  )
	// );
	// register_post_type( 'news', $args );

	// Success-Stories CPT
	$labels = array(
		'name'               => _x( 'Success Stories', 'post type general name', 'astra-theme-css' ),
		'singular_name'      => _x( 'Stories', 'post type singular name', 'astra-theme-css' ),
		'menu_name'          => _x( 'Success Stories', 'admin menu', 'astra-theme-css' ),
		'add_new'            => _x( 'Add New', 'book', 'astra-theme-css' ),
		'add_new_item'       => __( 'Add New Story', 'astra-theme-css' ),
		'new_item'           => __( 'New Story', 'astra-theme-css' ),
		'edit_item'          => __( 'Edit Story', 'astra-theme-css' ),
		'view_item'          => __( 'View Story', 'astra-theme-css' ),
		'all_items'          => __( 'All Stories', 'astra-theme-css' ),
		'search_items'       => __( 'Search Stories', 'astra-theme-css' ),
		'not_found'          => __( 'No stories found.', 'astra-theme-css' ),
	);
	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Add Success Stories here.', 'astra-theme-css' ),
		'public'             => true,
		'rewrite'            => array( 'slug' => 'story' ),
		'has_archive'        => true,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt'  )
	);
	register_post_type( 'story', $args );

	// Industry taxonomy for "story" CPT
	$labels = array(
		'name'              => _x( 'Industry', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Industry', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Industry', 'textdomain' ),
		'all_items'         => __( 'All Industry', 'textdomain' ),
		'parent_item'       => __( 'Parent Industry', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Industry:', 'textdomain' ),
		'edit_item'         => __( 'Edit Industry', 'textdomain' ),
		'update_item'       => __( 'Update Industry', 'textdomain' ),
		'add_new_item'      => __( 'Add New Industry', 'textdomain' ),
		'new_item_name'     => __( 'New Industry Name', 'textdomain' ),
		'menu_name'         => __( 'Industry', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'industry' ),
	);

	register_taxonomy( 'industry', array( 'story' ), $args );

	// Service taxonomy for "story" CPT
	$labels = array(
		'name'              => _x( 'Service', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Service', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Service', 'textdomain' ),
		'all_items'         => __( 'All Service', 'textdomain' ),
		'parent_item'       => __( 'Parent Service', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Service:', 'textdomain' ),
		'edit_item'         => __( 'Edit Service', 'textdomain' ),
		'update_item'       => __( 'Update Service', 'textdomain' ),
		'add_new_item'      => __( 'Add New Service', 'textdomain' ),
		'new_item_name'     => __( 'New Service Name', 'textdomain' ),
		'menu_name'         => __( 'Service', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'service' ),
	);

	register_taxonomy( 'service', array( 'story' ), $args );

});

function process_jobs_feed($url){
	global $jobs_feed_cache;
	
	if(!isset($jobs_feed_cache) || (isset($jobs_feed_cache) && !$jobs_feed_cache)) {
		if(@simplexml_load_file($url)){
			$string = file_get_contents($url);
			$feeds = simplexml_load_string($string);
		}else{
			return '';
		}
		if(!empty($feeds)){
			$job_details = array();
			$i = 0;
			foreach($feeds->vacancies->PosID as $pos_id) {
				$single_job = [];
				$single_job['posid'] = $pos_id;
				$single_job['Job Id'] = htmlspecialchars($pos_id);
				$single_job['Last Modified'] = htmlspecialchars($feeds->{'vacancies'}->{'LastModified'}[$i]);
				$single_job['HR Manager'] = htmlspecialchars($feeds->{'vacancies'}->{'Verantwortlich_HR'}[$i]);
				$single_job['Job Details'] = array(
					'Title of job' => htmlspecialchars($feeds->{'vacancies'}->{'Ausschreibungstext'}[$i]->{'Stellentitel'}),
					'Supplement to job title' => htmlspecialchars($feeds->{'vacancies'}->{'Ausschreibungstext'}[$i]->{'Zusatz_Stellentitel'}),
					'Title of tasks' => htmlspecialchars($feeds->{'vacancies'}->{'Ausschreibungstext'}[$i]->{'TitelAufgaben'}),
					'Text for tasks' => htmlspecialchars($feeds->{'vacancies'}->{'Ausschreibungstext'}[$i]->{'TextAufgaben'}),
					'Title of requirements' => htmlspecialchars($feeds->{'vacancies'}->{'Ausschreibungstext'}[$i]->{'TitelAnforderungen'}),
					'Text for requirements' => htmlspecialchars($feeds->{'vacancies'}->{'Ausschreibungstext'}[$i]->{'TextAnforderungen'}),
					'Title What we offer' => htmlspecialchars($feeds->{'vacancies'}->{'Ausschreibungstext'}[$i]->{'TitelWirbieten'}),
					'Text What we offer' => htmlspecialchars($feeds->{'vacancies'}->{'Ausschreibungstext'}[$i]->{'TextWirbieten'}),
					'Outro' => htmlspecialchars($feeds->{'vacancies'}->{'Ausschreibungstext'}[$i]->{'Abspann'}),
					'Short description' => htmlspecialchars($feeds->{'vacancies'}->{'Ausschreibungstext'}[$i]->{'Kurzbeschreibung'})
				);
				$single_job['Criteria'] = array(
					'Type of employment' => htmlspecialchars($feeds->{'vacancies'}->{'Suchkriterien'}[$i]->{'Beschäftigungsart'}),
					'Terminability' => htmlspecialchars($feeds->{'vacancies'}->{'Suchkriterien'}[$i]->{'Befristung'}),
					'Work as' => htmlspecialchars($feeds->{'vacancies'}->{'Suchkriterien'}[$i]->{'EinstiegAls'}),
					'Deparment' => htmlspecialchars($feeds->{'vacancies'}->{'Suchkriterien'}[$i]->{'Unternehmensbereich'}),
					'Work location' => htmlspecialchars($feeds->{'vacancies'}->{'Suchkriterien'}[$i]->{'Arbeitsort'}),
				);
				$single_job['Choice of image'] = htmlspecialchars($feeds->{'vacancies'}->{'Bildwahl'}[$i]);
				$single_job['Layout Design'] = htmlspecialchars($feeds->{'vacancies'}->{'Inserate_Layout'}[$i]);
				$single_job['Application URL'] = htmlspecialchars($feeds->{'vacancies'}->{'Apply_url'}[$i]);
				$job_details[] = $single_job;
				$jobs_feed_cache[] = $single_job;
				$i++;
			}
			return $job_details;
		}
	}
	else {
		return $jobs_feed_cache;
	}
	return [];
}


 add_action('wp', function(){
 	if(is_page('jobs-feed')){
 		$jobs = process_jobs_feed(JOB_FEED_URL);
 		echo '<pre>';print_r($jobs);echo '</pre>';
 	}
 });


function Generate_job($atts) {

	$a = shortcode_atts( array(
		'howmany' => '-1',
		'offset' => '0',
		'mode' => 'light',
		'posid' => '',
		'exclude_posid' => '',
        'layout' => ''
	), $atts );

	$jobs = process_jobs_feed(JOB_FEED_URL);
	$out = '';
	if($a['mode'] == 'light') {
		$out = '<div class="elementor-row1 jobs-list-main-container">';
	}

	$posids = [];
	if($a['posid']) {
		$posids = explode(",", $a['posid']);
	}

	if($posids) {
		$splitted_jobs = [];
		if($jobs) {
			foreach($jobs as $job) {
				if(in_array($job['posid'], $posids)) {
					$splitted_jobs[] = $job;
				}
			}
		}
		$jobs = $splitted_jobs;
	}
	else {
		if($a['howmany'] == '-1') {
			$jobs = array_slice($jobs, $a['offset']);
		}
		else {
			$jobs = array_slice($jobs, $a['offset'], $a['howmany']);
		}
	}


	if($a['exclude_posid']) {
		$splitted_jobs = [];
		$ex_posids = explode(",", $a['exclude_posid']);
		if($jobs) {
			foreach($jobs as $job) {
				if(!in_array($job['posid'], $ex_posids)) {
					$splitted_jobs[] = $job;
				}
			}
		}
		$jobs = $splitted_jobs;
	}

	if($jobs) {
        // Slider on 'Karriere' page
        if($a['layout'] == 'slider') {
            $out .= '
                <div class="swiper-container">
                    <div class="swiper-wrapper">
            ';
		}
		
		$jobs = apply_filters('emineo_jobs', $jobs);

		foreach($jobs as $job) {
			if($a['mode'] == 'light') {
				$out .= '
				<div class="single-job-col-4 swiper-slide">
					<div class="single-job-container">
						<div class="single-job-inner-container">
				';
			}

			$out .= '
				<div class="job-category">_' . $job['Criteria']['Deparment'] . '</div>
				<div class="job-online-from">Online seit: ' . $job['Last Modified'] . '</div>
				<h3 class="job-title">' . $job['Job Details']['Title of job'] . '</h3>
				<div class="job-location">' . $job['Criteria']['Work location'] . '</div>
				<div class="job-description">' . $job['Job Details']['Short description'] . '</div>
				<!-- <a class="btn-link" target="_blank" href="' . $job['Application URL'] . '">Mehr Erfahren</a> -->
				<a class="btn-link" target="_blank" href="/offene-stellen​/job-description/?posid='.$job['posid'].'">Mehr Erfahren</a>
			';

			if($a['mode'] == 'light') {
				$out .= '
						</div>
					</div>
				</div>
				';
			}
		}

        if($a['layout'] == 'slider') {
            $out .= '
                    </div><!-- //.swiper-container -->
                </div><!-- //.swiper-wrapper -->
                
                <div class="swiper-pagination"></div>

                <div class="swiper-button-prev">Prev</div>
                <div class="swiper-button-next">Next</div>
            ';
        }

		if($a['mode'] == 'light') {
		$out .= '
		</div><!-- //.elementor-row1.jobs-list-main-container -->		
		';
		}
	}

    return $out;
}
add_shortcode('job', 'Generate_job');


function show_breadcrumbs() {
    astra_get_breadcrumb();
}
add_shortcode('breadcrumbs', 'show_breadcrumbs');


// Add new skin for posts listing. As we want to show logo image
add_action('elementor/widgets/widgets_registered', function() {
	require_once "skin-custom-cards.php";
});

add_action('wp_head', function() {
	?>
	<style>
		.elementor-posts--skin-customcards .elementor-post__thumbnail {
			padding-bottom: 0 !important;
		}
		body.single-emineo_download .emineo_download.post-password-required .entry-content {
			position: fixed;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			background-color: rgba(0,0,0,0.8);
			z-index: 999999;
			color: black;
		}

		body.single-emineo_download .emineo_download.post-password-required .entry-content form {
			background-color: white;
			width: 50%;
			max-width: 700px;
			margin-left: auto;
			margin-right: auto;
			margin-top: 100px;
			padding: 50px;
		}
	</style>
	<?php
});


function get_single_job($id) {
	global $job_cache;
	if(!isset($job_cache[$id])) {
		$jobs = process_jobs_feed(JOB_FEED_URL);
		if($jobs) {
			foreach($jobs as $job) {
				if($job['posid'] == $id) {
					$job_cache[$id] = $job;
					break;
				}
			}
		}
	}

	return $job_cache[$id];
}

add_action('wp_head', function() {
	?>
	<script>
		var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
	</script>
	<?php
});

add_action('wp_ajax_ajax_get_filtered_data', 'ajax_get_filtered_data_cb');
add_action('wp_ajax_nopriv_ajax_get_filtered_data', 'ajax_get_filtered_data_cb');
function ajax_get_filtered_data_cb() {
	$json = [
		'description' => '',
		'items' => ''
	];

	$term_id = $_POST['term_id'];
	$taxonomy = $_POST['type'];
	$post_type = $_POST['post_type'];
	if($post_type !== 'story' && $post_type !== 'post') {
		$post_type = 'story';
	}

	$term = get_term_by('id', $term_id, $taxonomy);
	if($term) {
		$json['description'] = $term->term_description;

		// get items
		$args = [
			'post_type' => $post_type,
			'posts_per_page' => -1,
			'post_status' => 'publish',
			'tax_query' => [
				[
					'taxonomy' => $taxonomy,
					'field' => 'id',
					'terms' => [$term_id]
				]
			]
		];

		$items = get_posts($args);
		if($items) {
			foreach($items as $item) {
				$json['items'] .= get_single_item_html($item, $taxonomy);
			}
		}
	}

	wp_send_json($json);
}


function get_single_item_html($post, $taxonomy = '') {
	ob_start();

	$term_title = '';
	if($taxonomy) {
		$terms = get_the_terms($post, $taxonomy);
		if($terms) {
			$term_title = $terms[0]->name;
		}
	}

	$date = new DateTime($post->post_date);
	?>
	<div class="single-item-container">
		<div class="single-item-inner-container">
			<div class="single-item-thumbnail">
				<a href="<?php echo get_permalink($post->ID); ?>">
					<?php
					if(has_post_thumbnail($post)) {
						echo get_the_post_thumbnail($post, 'medium_large');
					}
					?>
				</a>
			</div>
			<div class="single-item-title">
				<h3><a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a></h3>
			</div>
			<div class="single-item-description">
					<?php echo get_the_excerpt($post); ?>
			</div>
			<?php if($term_title) { ?>
				<div class="single-item-badge"><?php echo $term_title; ?></div>
			<?php } ?>
			<div class="single-item-date"><?php echo $date->format('d F, Y'); ?></div>
		</div>
	</div>
	<?php

	return ob_get_clean();
}

function emineo_jobs_cb($jobs) {

	if(isset($_GET['job_categories']) && $_GET['job_categories']) {
		foreach($jobs as $key => $job) {
			if(!in_array($job['Criteria']['Deparment'], $_GET['job_categories'])) {
				unset($jobs[$key]);
			}
		}
	}

	return $jobs;
}
add_filter('emineo_jobs', 'emineo_jobs_cb');


// Download Custom Post type
add_action('init', 'register_download_custom_post_type');
function register_download_custom_post_type() {
	$args = array(
        'public'    => true,
        'label'     => __( 'Downloads', 'emineo-theme' ),
        'menu_icon' => 'dashicons-download',
    );
    register_post_type( 'emineo_download', $args );
}

