<?php get_header(); ?>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

 <?php  
    $user_id = get_the_author_meta('ID');
    


?>
<div class="container-fluid blog-header" style="background : url(<?php the_permalink(); ?>) ;">
        <div class="">
            <h1><?php the_title() ?></h1>
        </div>
    </div>
	<main role="main" class="container">
		<!-- section -->
		<section>




           	<!-- post thumbnail -->
		<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
			<div  class="text-center">
				<a  href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail(); // Declare pixel size you need inside the array ?>
			</a>
			
			</div>
		
		<?php endif; ?>
		<!-- /post thumbnail -->
			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<p><?php the_content(); ?></p>
                <p>
		<!-- post details -->
        Countries: <?php echo get_the_term_list( get_the_ID(), 'country', '<span class="label label-primary">', ', ', '</span>' ) ?>
        <br>
        Genres: <?php echo get_the_term_list( get_the_ID(), 'genre', '<span class="label label-info">', ', ', '</span>' ) ?>
<br>
 Ticket price : <?php the_field("ticket_price"); ?> $
 <br>
 Release date : <?php the_field("release_date"); ?>
                <p>
<p><?php the_tags( ); ?></p>
				<?php comments_template( '', true ); // Remove if you don't want comments ?>
				<?php  paginate_comments_links();  ?>

				<br class="clear">
                 
				<?php edit_post_link(); ?>

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'bloody-mary' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>


<?php get_footer(); ?>