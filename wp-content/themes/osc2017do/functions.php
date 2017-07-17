<?php
/**
 * 利用する JavaScript を定義.
 */
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_script('bootstrap', get_theme_file_uri('/js/bootstrap.min.js'), array('jquery'));
});

/**
 * WordPress 初期設定.
 */
add_action('init', function() {
    /**
     * 商品を格納する投稿タイプ（アイテム）定義
     */
    register_post_type('item', array(
        'labels' => array('name' => 'アイテム'),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail')
    ));
});

/**
 * WordPress REST API カスタムエンドポイント定義
 */
add_action('rest_api_init', function() {
    register_rest_route('osc2017do/v1', '/items/(?P<paged>\d+)', array(
        'method' => 'GET',
        'args' => array(
            'paged' => array(
                'default' => 1
                ,'sanitize_callback' => 'absint'
            )
        ),
        'callback' => function($r) {
            $result = array();
            // 商品一覧情報取得
            $query = new WP_Query(array(
                'post_type' => 'item',
                'posts_per_page' => 4,
                'paged' => $r->get_param('paged')
            ));
            $items = array();
            while($query->have_posts()) {
                $query->the_post();
                $item = array();
                $item['id'] = get_the_ID();
                $item['title'] = get_the_title();
                $item['excerpt'] = get_the_excerpt();
                $item['permalink'] = get_the_permalink();
                $item['thumbnail'] =
                    get_the_post_thumbnail_url(get_the_ID(), 'item');
                $item['price'] = SCF::get('price');
                $items[] = $item;
            }
            $result['items'] = $items;
            // ページネーション情報取得
            $result['pagination'] = array(
                'current' => $r->get_param('paged'),
                'max_num_pages' => $query->max_num_pages
            );
            return $result;
        }
    ));
});

/**
 * 画像サイズ追加.
 */
add_image_size('item', 242, 242);

/**
 * アイキャッチ画像サポート.
 */
add_theme_support('post-thumbnails');

/**
 * 管理バー非表示.
 */
show_admin_bar(false);
?>
