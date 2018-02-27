<?php
/**
 * Single job listing.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-single-job_listing.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     WP Job Manager
 * @category    Template
 * @since       1.0.0
 * @version     1.28.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;
?>
<div class="single_job_listing">
	<?php if ( get_option( 'job_manager_hide_expired_content', 1 ) && 'expired' === $post->post_status ) : ?>
		<div class="job-manager-info"><?php _e( 'This listing has expired.', 'wp-job-manager' ); ?></div>
	<?php else : ?>
		<?php
			/**
			 * single_job_listing_start hook
			 *
			 * @hooked job_listing_meta_display - 20
			 * @hooked job_listing_company_display - 30
			 */
			do_action( 'single_job_listing_start' );
		?>
		<p>
		<?php
			
			add_action( 'single_job_listing_meta_end', 'display_job_salary_data' );
			function display_job_salary_data() {
			  global $post;

			  $salary = get_post_meta( $post->ID, '_plz', true );

			  if ( $salary ) {
				echo '<li>' . __( 'Salary:' ) . ' $' . esc_html( $salary ) . '</li>';
			  }
			}
	
		 ?> 
			</p>
	<?php  
	    $key_1_value = get_post_meta( get_the_ID(), '_plz', true ); ?>
	<span class="mks-plz">
	 <strong>Postleitzahl: </strong>
	  <?php echo $key_1_value; ?>	
	</span>	
		<br> 
		<?php  
		$date = get_post_meta(
		$post->ID, '_beginjob', true); if($date != ''){
			echo ('<strong>Beginn der Arbeit:</strong>'); ?>
	    <span class="mks-datum-start">
			<?php 	echo date("d.m.o", strtotime($date));
			   }  
			?> 
		</span>
	<br> 
		<?php  
		$date = get_post_meta(
		$post->ID, '_endjob', true); if($date != ''){
			echo ('<strong>Ende der Arbeit:</strong>'); ?>
	    <span class="mks-datum-ende">
			<?php 	echo date("d.m.o", strtotime($date));
			   }  
			?> 
		</span>
		<br>
	<br>

	
		<div class="job_description">
			<?php wpjm_the_job_description(); ?>
		</div>

		<?php if ( candidates_can_apply() ) : ?>
			<?php get_job_manager_template( 'job-application.php' ); ?>
		<?php endif; ?>

		<?php
			/**
			 * single_job_listing_end hook
			 */
			do_action( 'single_job_listing_end' );
		?>
	<?php endif; ?>
</div>
