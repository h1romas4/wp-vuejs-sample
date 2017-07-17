<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
     <div class="jumbotron">
        <div class="lead"><?php the_content(); ?></div>
    </div>
<?php endwhile; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
