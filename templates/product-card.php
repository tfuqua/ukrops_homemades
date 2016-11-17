
<div id="post-<?php the_ID(); ?>" class="product-card-wrapper">
	<div class="product-card">

		<?php
			$background = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', false);
		?>
		<div class="product-img" style="background-image: url('<?php echo $background[0] ?>');">
		</div>

		<div class="product-section">
			<h3><?php the_title(); ?></h3>
			<div class="blurb">
				<?php echo excerpt('20'); ?>
			</div>
		</div>
		<div class="product-buttons <?php if(get_field('order_link') && get_field('about_link')){echo 'two-buttons';}?>">
			<?php if(get_field('order_link')){ ?>
				<a class="button" href="<?php echo get_field('order_link');?>">Order</a>
			<?php } ?>
			<?php if(get_field('about_link')){ ?>
				<a class="button" href="<?php echo get_field('about_link');?>">About</a>
			<?php } ?>
		</div>
	</div>
</div>
