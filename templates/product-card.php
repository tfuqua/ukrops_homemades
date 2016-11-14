
<div id="post-<?php the_ID(); ?>" class="product-card-wrapper">
	<div class="product-card">
		<div class="product-img">
			<?php if ( has_post_thumbnail() ) : ?>
	      <?php the_post_thumbnail(); ?>
			<?php endif; ?>
		</div>

		<div class="product-section">
			<h3><?php the_title(); ?></h3>
			<div class="blurb">
				<?php the_excerpt() ?>
			</div>
		</div>
		<div class="product-buttons">
			<?php if(get_field('show_order_link')){ ?>
				<a class="btn btn-danger" href="<?php echo get_permalink();?>">Order</a>
			<?php } ?>
			<?php if(get_field('show_about_link')){ ?>
				<a class="btn btn-danger" href="<?php echo get_permalink();?>">About</a>
			<?php } ?>
		</div>
	</div>
</div>
