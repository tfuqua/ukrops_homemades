<?php
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		$queried_object = get_queried_object();
		$taxonomy = $queried_object->taxonomy;
		$term_id = $queried_object->term_id;
		$image= get_field('hero_image', $taxonomy . '_' . $term_id);
		$heroHeader = get_field('hero_header', $taxonomy . '_' . $term_id);
		$body= get_field('hero_body', $taxonomy . '_' . $term_id);
		?>

		<!-- Hero Image -->
    <?php if($image) { ?>
      <?php $background = wp_get_attachment_image_src($image, 'full', false); ?>
	     <div class="hero products-hero" style="background-image: url('<?php echo $background[0] ?>');">
         <div class="hero-text-wrapper">
           <div>
             <div class="hero-text">
							 <div class="hero-header">
								 <?php echo $heroHeader; ?>
							 </div>
							 <div class="hero-body">
								 <?php echo $body; ?>
							 </div>
             </div>
           </div>
         </div>
      </div>
    <?php } else {
			$background =  get_template_directory_uri() . '/images/hero.png'; ?>
			 <div class="hero mini-hero" style="background-image: url('<?php echo $background ?>');">
					<div class="hero-text-wrapper">
						<div>
							<div class="hero-text">
								<?php if (have_posts()) :
 								 echo single_cat_title('', false);
 							 	endif; ?>
							</div>
						</div>
					</div>
				</div>
			<?php
			 }?>

		<div class="container-fluid">
			<div class="product-list">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();

						get_template_part( 'templates/product-card', get_post_format());

					endwhile;
				endif; ?>
			</div>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
