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

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'emineo-theme-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_EMINEO_THEME_VERSION, 'all' );

}

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
			$i++;
		}
		return $job_details;
	}
	return [];
}

 add_action('wp', function(){
 	if(is_page('jobs-feed')){
 		$url = 'https://recruitingapp-2895.umantis.com/XMLExport/133';
 		$jobs = process_jobs_feed($url);
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

    $url = 'https://recruitingapp-2895.umantis.com/XMLExport/133';
	$jobs = process_jobs_feed($url);
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
	    $i=0;//for counting job items (for 'karriere' page)
		foreach($jobs as $job) {
			if($a['mode'] == 'light') {

			    //wrapper for job items in 'karriere' page (4 jobs in a slide)
                if($a['layout'] == 'slider' && $i == 0) {
                    //$out .= '<div class="slide-container">';
                }
                /////////////////////////////////////

				$out .= '
				<div class="single-job-col-4">
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
				<a class="btn-link" target="_blank" href="' . $job['Application URL'] . '">Mehr Erfahren</a>
			';

			if($a['mode'] == 'light') {
				$out .= '
						</div>
					</div>
				</div>
				';
			}

            //end of the wrapper for job items in 'karriere' page
            if($a['layout'] == 'slider' && $i == 3) {
                //$out .= '</div><!-- //.slide-container -->';
            }
            $i == 3 ? $i = 0 : $i++;
            /////////////////////////////////////
		}

        // end of the wrapper for job items in 'karriere' page
        // closing tag for cases then there are less than 4 jobs in a slide
        if($a['layout'] == 'slider' && $i < 4) {
            //$out .= '</div><!-- //.slide-container -->';
        }
        /////////////////////////////////////

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
	</style>
	<?php
});