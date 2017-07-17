<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
     <div class="jumbotron">
        <div class="row">
            <div class="col-md-4">
                <a href="#" class="thumbnail pull-left"><img src="<?php the_post_thumbnail_url() ?>" /></a>
            </div>
            <div class="col-md-8">
                <h1><?php the_title(); ?></h1>
                <div class="lead"><?php the_content(); ?></div>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">カート入れ</a></p>
            </div>
        </div>
    </div>
<?php endwhile; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
