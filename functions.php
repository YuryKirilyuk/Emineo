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
        $job_details['Job Id'] = htmlspecialchars($feeds->{'vacancies'}->{'PosID'});
        $job_details['Last Modified'] = htmlspecialchars($feeds->{'vacancies'}->{'LastModified'});
        $job_details['HR Manager'] = htmlspecialchars($feeds->{'vacancies'}->{'Verantwortlich_HR'});
        $job_details['Job Details'] = array(
            'Title of job' => htmlspecialchars($feeds->{'vacancies'}->{'Ausschreibungstext'}->{'Stellentitel'}),
            'Supplement to job title' => htmlspecialchars($feeds->{'vacancies'}->{'Ausschreibungstext'}->{'Zusatz_Stellentitel'}),
            'Title of tasks' => htmlspecialchars($feeds->{'vacancies'}->{'Ausschreibungstext'}->{'TitelAufgaben'}),
            'Text for tasks' => htmlspecialchars($feeds->{'vacancies'}->{'Ausschreibungstext'}->{'TextAufgaben'}),
            'Title of requirements' => htmlspecialchars($feeds->{'vacancies'}->{'Ausschreibungstext'}->{'TitelAnforderungen'}),
            'Text for requirements' => htmlspecialchars($feeds->{'vacancies'}->{'Ausschreibungstext'}->{'TextAnforderungen'}),
            'Title What we offer' => htmlspecialchars($feeds->{'vacancies'}->{'Ausschreibungstext'}->{'TitelWirbieten'}),
            'Text What we offer' => htmlspecialchars($feeds->{'vacancies'}->{'Ausschreibungstext'}->{'TextWirbieten'}),
            'Outro' => htmlspecialchars($feeds->{'vacancies'}->{'Ausschreibungstext'}->{'Abspann'}),
            'Short description' => htmlspecialchars($feeds->{'vacancies'}->{'Ausschreibungstext'}->{'Kurzbeschreibung'})
        );
        $job_details['Criteria'] = array(
            'Type of employment' => htmlspecialchars($feeds->{'vacancies'}->{'Suchkriterien'}->{'Beschäftigungsart'}),
            'Terminability' => htmlspecialchars($feeds->{'vacancies'}->{'Suchkriterien'}->{'Befristung'}),
            'Work as' => htmlspecialchars($feeds->{'vacancies'}->{'Suchkriterien'}->{'EinstiegAls'}),
            'Deparment' => htmlspecialchars($feeds->{'vacancies'}->{'Suchkriterien'}->{'Unternehmensbereich'}),
            'Work location' => htmlspecialchars($feeds->{'vacancies'}->{'Suchkriterien'}->{'Arbeitsort'}),
        );
        $job_details['Choice of image'] = htmlspecialchars($feeds->{'vacancies'}->{'Bildwahl'});
        $job_details['Layout Design'] = htmlspecialchars($feeds->{'vacancies'}->{'Inserate_Layout'});
        $job_details['Application URL'] = htmlspecialchars($feeds->{'vacancies'}->{'Apply_url'});
        return $job_details;
    }
    return '';
}

/*
add_action('wp', function(){
    if(is_page('home')){
        $url = 'https://recruitingapp-2895.umantis.com/XMLExport/133';
        $jobs = process_jobs_feed($url);
        echo '<pre>';print_r($jobs);echo '</pre>';
    }
});
*/


function Generate_job() {

    $url = 'https://recruitingapp-2895.umantis.com/XMLExport/133';
    $jobs = process_jobs_feed($url);

    $out = '
	<div class="job-category">_' . $jobs['Criteria']['Deparment'] . '</div>
    <h3 class="job-title">' . $jobs['Job Details']['Title of job'] . '</h3>
    <div class="job-location">' . $jobs['Criteria']['Work location'] . '</div>
    <div class="job-description">' . $jobs['Job Details']['Short description'] . '</div>
    <a class="btn-link" href="' . $jobs['Application URL'] . '">Mehr Erfahren</a>
	';

    return $out;
}
add_shortcode('job', 'Generate_job');


function show_breadcrumbs() {
    $parents_id = array_reverse(get_ancestors(get_the_ID(), 'page'));
    $out = '<div class="breadcrumbs">
               <a href="' . get_site_url() . '">Home</a> 
               <span class="separator">/</span>
           ';
    if($parents_id) {
        foreach($parents_id as $page_id) {
            $out .= '<a href="'. get_permalink($page_id) .'">'. get_the_title($page_id) .'</a>
                     <span class="separator">/</span>
                     ';
        }
    }
    $out .= '<span class="current-page">' . get_the_title() . '</span></div>';
    return $out;
}
add_shortcode('breadcrumbs', 'show_breadcrumbs');
