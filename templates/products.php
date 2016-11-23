<?php

/* Template Name: Products Template */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<!-- Hero Image -->
	    <?php if(get_field('hero_image')) { ?>
	      <?php $background = wp_get_attachment_image_src(get_field('hero_image'), 'full', false); ?>
		     <div class="hero product-hero" style="background-image: url('<?php echo $background[0] ?>');">
	        <div class="hero-text-wrapper">
	          <div>
	            <div class="hero-text">
								<div class="hero-header">
	              	<?php echo get_field('hero_header')?>
								</div>
								<?php if(get_field('hero_body')){ ?>
								<div class="hero-body">
		              <?php echo get_field('hero_body')?>
								</div>
								<?php
								}
								if(get_field('button_text')){ ?>
									<div class="hero-buttons">
										<a class="button" href="<?php echo get_field('button_link')?>"><?php echo get_field('button_text'); ?></a>
									</div>
								<?php
								}?>
	            </div>
	          </div>
	        </div>
	      </div>
	    <?php
				} else {
					$background =  get_template_directory_uri() . '/images/hero.png';
					?>
					 <div class="hero mini-hero" style="background-image: url('<?php echo $background ?>');">
						<div class="hero-text-wrapper">
							<div>
								<div class="hero-text">
									<?php
									while ( have_posts() ) : the_post();
										the_title();
									endwhile;
									?>
								</div>
							</div>
						</div>
					</div>
			<?php
			 }?>

		<div>

      <?php
      $products = get_terms( array(
        'taxonomy' => 'product',
        'hide_empty' => true,
        'hierarchical' => true,
        'parent'   =>  0
      ));

      if (!empty( $products ) && ! is_wp_error( $products )){
          foreach ( $products as $product) {

							$id = $product->term_id;
							$markup = '';
							$m = '';

              $markup = '<div>'.$product->name.'</div>';

							$children = get_terms( array(
								'taxonomy' => 'product',
								'hide_empty' => false,
								'hierarchical' => true,
								'parent'   =>  $id
							));

							$m = '<ul>';
							foreach ( $children as $child) {

								$link = get_field('skip_url', $child);

								if (empty($link) or $link == null){
									$link = get_term_link($child);
								}

								$m .= '<li><a href="'. $link . '">'. $child->name . '</a></li>';
							}

							$m .= '</ul>';
							?>

							<div class="product-category">
								<div class="category-header">
									<div class="container-fluid">
										<?php echo $markup;?>
									</div>
								</div>
								<div class="category-list">
										<?php echo $m;?>
								</div>
							</div>
					<?php
          }
      	}
      ?>
			<div class="clearfix"></div>
			<br /> <br />
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
