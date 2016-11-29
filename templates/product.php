<?php

/* Template Name: Product Page */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<!-- Hero Image -->
	    <?php
			if(get_field('hero_image')) {
	      $background = wp_get_attachment_image_src(get_field('hero_image'), 'full', false);
				$img = $background[0];
			} else {
				$background =  get_template_directory_uri() . '/images/hero.png';
				$img = $background;
			}
			?>

	     <div class="hero mini-hero product-hero" style="background-image: url('<?php echo $img ?>');">
         <div class="hero-text-wrapper">
           <div>
						 <div class="hero-text">
               <div class="hero-header">
                <?php
									if (get_field('hero_heading')){
										echo get_field('hero_heading');
									} else {
										while ( have_posts() ) : the_post();
											the_title();
										endwhile;
									}
								?>
                </div>
							<?php if (get_field('hero_body')){?>
								<div class="hero-body">
									<?php echo get_field('hero_body')?>
								</div>
							<?php
							}?>
							<?php if(get_field('hero_button')) { ?>
								<div>
									<a class="button" href="<?php echo get_field('hero_button_link')?>"><?php echo get_field('hero_button')?></a>
								</div>
							<?php } ?>
						</div>
					 </div>
				 </div>
			 </div>

		 <?php if(get_field('child_products')) { ?>
			 <div class="container-fluid">
 				<div class="row">
					<div class="product-list">
						<?php
						$pageID = get_the_ID();

						 $args = array(
							'sort_order' => 'asc',
							'sort_column' => 'ID',
							'parent' => $pageID,
							'post_type' => 'page',
						);
						$pages = get_pages($args);

						foreach ($pages as $page){
							$post = $page;
							setup_postdata( $post);
							get_template_part( 'templates/product-child-card', get_post_format());
							wp_reset_postdata();
						}
						?>
					</div>
				</div>
			</div>
		 <?php
			} else {
			?>
      <div class="container-fluid product-content">
				<div class="row">
					<div class="col-lg-8 col-lg-push-2 col-md-10 col-md-push-1">
							<?php
			        while ( have_posts() ) : the_post();

			  				the_content();

			  				wp_link_pages( array(
			  					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ukrops' ),
			  					'after'  => '</div>',
			  				));

			        endwhile; // End of the loop.
			        ?>
					</div>
				</div>
      </div>

			<!-- Carousel -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-8 col-lg-push-2 col-md-10 col-md-push-1">
						<?php
							if( have_rows('carousel') ) { ?>
								<div class="product-carousel">
									<?php
									while ( have_rows('carousel') ) : the_row();
			          		if (get_sub_field('carousel_image') != '') { ?>
											<div>
												<?php echo wp_get_attachment_image(get_sub_field('carousel_image'), 'full', false, array( 'class' => '') ); ?>
											</div>
				        		<?php
										}
									endwhile; ?>
								</div>
			    		<?php
							}?>
					</div>
				</div>
			</div>


			<!-- extra content -->
     <?php if(get_field('extra_content')) { ?>
			<div class="container-fluid product-content">
				<div class="row">
					<div class="col-lg-8 col-lg-push-2 col-md-10 col-md-push-1">
						<?php echo get_field('extra_content') ?>
					</div>
				</div>
			</div>
			<?php } ?>

			<!-- Quote Carousel -->
		 <?php if(get_field('quote_background')) { ?>
			 <?php $back = wp_get_attachment_image_src(get_field('quote_background'), 'full', false); ?>
				<div class="hero quote-hero" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('<?php echo $back[0] ?>');">
					<?php if( have_rows('quotes')) { ?>

						<div class="container-fluid product-content">
							<div class="row">
								<div class="col-lg-10 col-lg-push-1">
									<div class="quote-carousel">
					      		<?php while ( have_rows('quotes') ) : the_row(); ?>
											<div>
												<div class="quote"><?php echo get_sub_field('quote'); ?></div>
												<div class="source"><?php echo get_sub_field('source'); ?></div>
											</div>
										<?php endwhile; ?>
									</div>
									<div class="text-center">
										<div id="carousel-nav" class="carousel-nav"></div>
									</div>
								</div>
							</div>
						</div>

					<?php } ?>
				</div>
		<?php }
		}	//End of check if has children
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
