<?php
/**
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ukrops
 */

get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">

    <!-- Hero Image -->
    <?php if(get_field('hero_image')) { ?>
      <?php $background = wp_get_attachment_image_src(get_field('hero_image'), 'full', false); ?>
	     <div class="hero hero-1" style="background-image: url('<?php echo $background[0] ?>');">
         <div class="hero-text-wrapper">
           <div>
             <div class="hero-text">
               <?php echo get_field('hero_text')?>
               <?php if(get_field('button_text')) { ?>
               <div class="hero-button">
                 <a href="<?php echo get_field('button_link')?>"><?php echo get_field('button_text')?></a>
               </div>
               <?php } ?>
             </div>
           </div>
         </div>
      </div>
    <?php } ?>

    <!-- Featured Content -->
    <?php
      if( have_rows('featured_content') ) { ?>
        <div class="featured-content-wrapper">
          <div class="container-fluid">
            <?php while ( have_rows('featured_content') ) : the_row(); ?>
              <div class="featured-item">
                <div class="featured-border"></div>
                <h3><?php echo the_sub_field('heading');?></h3>
                <div class="featured-section">
                  <div class="featured-body">
                    <div class="flex-div">
                    <div>
                      <?php echo the_sub_field('body');?>
                    </div>
                    <?php if (get_sub_field('image')) { ?>
                      <div class="featured-img">
                        <?php echo wp_get_attachment_image(get_sub_field('image'), 'medium', false, array( 'class' => 'lazy-load'));?>
                      </div>
                    <?php } ?>
                    </div>
                  </div>
                  <div class="featured-button">
                    <a>
                      <?php echo the_sub_field('button_text');?>
                    </a>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
      <?php } ?>

      <!-- Hero Image -->
      <?php if(get_field('hero_2_image')) { ?>
      	<div class="hero hero-2">
          <div class="container-fluid">
            <div class="hero-img-wrapper">
              <?php echo wp_get_attachment_image(get_field('hero_2_image'), 'full', false, array( 'class' => '') ); ?>
            </div>
            <div class="hero-text-wrapper">
              <div>
                <div class="hero-text">
                  <h3>
                    <?php echo get_field('hero_header')?>
                  </h3>
                  <div>
                    <?php echo get_field('hero_2_text')?>
                  </div>
                  <?php if(get_field('button_text')) { ?>
                  <div class="hero-button">
                    <a href="<?php echo get_field('button_2_link')?>"><?php echo get_field('button_2_text')?></a>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>

  </main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();
