<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WordPress REST API と Vue.js を使ったフロントエンド開発｜オープンソースカンファレンス 2017 北海道</title>
    <link href="<?php echo get_theme_file_uri('/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo get_theme_file_uri('/css/bootstrap-theme.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo get_theme_file_uri('/style.css'); ?>" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body>

<div class="container" id="cart">
    <div class="header clearfix">
        <nav>
            <ul class="nav nav-pills pull-right">
                <li role="presentation" <?php if(is_front_page()) echo 'class="active"' ?>>
                    <a href="<?php echo site_url('/'); ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> ホーム</a>
                </li>
                <li role="presentation" <?php if(is_page('items')) echo 'class="active"' ?>>
                    <a href="<?php echo site_url('/items'); ?>"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> 商品一覧</a>
                </li>
                <li role="presentation"><a href="#" v-on:click="toggleSidebar">
                    <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> カート<span class="badge">{{ baggage.length }}</span></a>
                </li>
            </ul>
        </nav>
        <h3 class="text-muted">WordPress REST API と Vue.js を使ったフロントエンド開発</h3>
    </div>
