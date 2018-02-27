<?php 

/* 
  Theme Name: Your Theme
  Description: Add Functions
  Author: Benjamin Zekavica
  Version: 1.0 
*/ 

// Add WP Job Manger Function 

add_theme_support( 'job-manager-templates' );


/* Add Fields to Job Manager */ 

add_filter( 'job_manager_job_listing_data_fields', 'mks_feld' );


function mks_feld( $fields ) {
 

  // Add Postleitzahl
  $fields['_plz'] = array(
    'label'       => __( 'Postleitzahl', 'job_manager' ),
    'type'        => 'text',
    'placeholder' => '52066',
    'description' => 'Geben Sie hier eine Postleitzahl ein', 
  );

  // Begin the job  
  $fields['_beginjob'] = array(
    'label'       => __( 'Beginn der Arbeit', 'job_manager' ),
    'type'        => 'text',
    'placeholder' => '',
    'description' => 'Wann startet der Job?', 
    'classes'     => array( 'job-manager-datepicker' ),
  );
	
  // Begin the job  
  $fields['_endjob'] = array(
    'label'       => __( 'Ende der Arbeit', 'job_manager' ),
    'type'        => 'text',
    'placeholder' => '',
    'description' => 'Wann endet der Job?', 
    'classes'     => array( 'job-manager-datepicker' ),
  );

  return $fields;
}



// Enque Files 

function bz_enque() {
    wp_enqueue_style( 'style-name', get_stylesheet_uri() );
    wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/functions.js', array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'bz_enque' );
 