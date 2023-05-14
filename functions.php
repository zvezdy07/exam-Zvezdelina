<?php 

/**
 * This functions update the jobs post meta for the count of views
 * 
 * @param [type] $job_id
 * @return void
 */
function zvezdelina_update_job_views_count ( $job_id ) {
    if (empty($job_id)) {
       return;
    }

    if ( !is_single('job') ) {
       return;
    }

    //var_dump( $view_count); die();

    $view_count = get_post_meta($job_id, 'views_count', true );
    if ( ! empty ($view_count)) {
       $view_count = $view_count + 1;
    } else{
        $view_count = 1;
    }
    update_post_meta($job_id, 'views_count', $view_count );

}

/**
 * Displays the current user name when the user is logged in
 * 
 * @return void
 */
function zvezdelina_display_username() {
   if( is_user_logged_in() == true ) {
      var_dump( 'Yes, we are logged in') ;
   } else {
      var_dump('no,we are not');
   }
}

function zvezdelina_register_nav_menu(){
   register_nav_menus(array(
      'primary_menu' => __( 'Primary Menu Name', 'zvezdelina'),
      'footer_menu'  => __('Footer Menu','zvezdelina'),
   ));
}
add_action('after_setup_theme','zvezdelina_register_nav_menu', 0 );


