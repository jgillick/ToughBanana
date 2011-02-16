<?php get_header(); ?>
<?php the_post(); ?>

<?php if( !ie4mac_isHomepage()): ?>
	<h1><?php the_title(); ?></h1>
<?php endif; ?>
<?php the_content(); ?>


<?php get_footer(); ?>