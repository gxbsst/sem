<?php

function theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', [] );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 20 );

function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );


function custom_error_logging($message, $log_type = 'error') {
    switch ($log_type) {
        case 'error':
            error_log('[ERROR] ' . $message);
            break;
        case 'warning':
            error_log('[WARNING] ' . $message);
            break;
        case 'info':
            error_log('[INFO] ' . $message);
            break;
        default:
            error_log('[LOG] ' . $message);
            break;
    }
}

add_action('wp_footer', function() {
    global $wpdb;
    if (defined('WP_DEBUG_LOG') && WP_DEBUG_LOG && defined('WP_DEBUG') && WP_DEBUG) {
        foreach ($wpdb->queries as $query) {
            custom_error_logging('Query: ' . $query[0] . ' - Time: ' . $query[1]);
        }
    }
});


add_action('shutdown', function() {
    global $wpdb;
    $log_file = '/opt/homebrew/var/log/wordpress/db.log';
    $log_data = '';

    if (defined('SAVEQUERIES') && SAVEQUERIES && !empty($wpdb->queries)) {
        foreach ($wpdb->queries as $query) {
            $query_time = $query[1];
            $query_callstack = $query[2];
            $query_sql = $query[0];
            $log_data .= sprintf("[%s] %s - %s\n", date('Y-m-d H:i:s'), $query_sql, $query_time);
        }
        file_put_contents($log_file, $log_data, FILE_APPEND);
    }
});

