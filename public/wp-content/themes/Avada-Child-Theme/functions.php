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


//add_filter('fusion_element_menu_content', 'custom_fusion_element_menu_content', 10, 2);

function custom_fusion_element_menu_content($content, $args) {
    // 这里是你的自定义逻辑
    // 例如，你可以修改$content或者添加新的元素
    // 确保返回修改后的$content

    // 示例：添加一个新的菜单项
//    $new_menu_item = '<li class="menu-item"><a href="#">新菜单项</a></li>';
//    $content .= $new_menu_item;

    // 使用正则表达式检查并替换
// 这里的正则表达式假定<nav>标签中只有一个class属性，并且s_block__menu如果存在，会出现在class列表中
// 如果<nav>标签中包含s_block__menu类，则所有其他类都会被移除，只保留这一个
//    $pattern = '/(<nav[^>]*class="[^"]*)\b(?!s_block__menu\b)[^"]*([^"]*s_block__menu[^"]*)(")/i';
//    $replacement = '$1$2$3';
//// 如果s_block__menu在class中，则进行替换
//    if (preg_match($pattern, $conten)) {
//        $conten = preg_replace($pattern, '$1s_block__menu$3', $conten);
//    }
//

    $dom = new DOMDocument();
    @$dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));

// Find the nav element
    $nav = $dom->getElementsByTagName('nav')->item(0); // Assuming there's only one <nav>

// Check if nav has class 's_block__menu'
    if (strpos($nav->getAttribute('class'), 's_block__menu') !== false) {
        // Set the class attribute to 's_block__menu' only
        $nav->setAttribute('class', 's_block__menu');
    } else {
        // If 's_block__menu' is not found, you might want to keep the classes as they are or handle differently
    }

// Save the changes
    $content = $dom->saveHTML();


//    $dom = new DOMDocument();

    return $content;
}
