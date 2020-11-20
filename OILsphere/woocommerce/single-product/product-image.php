<?php


global $product;

$attachment_ids = $product->get_gallery_image_ids();

?>


<div class="col-lg-8">
	<div class="single-product-slider slider3">

		<?php

			if ( $attachment_ids && $product->get_image_id() ) {

				foreach ( $attachment_ids as $attachment_id ) {

					?>
					
					<div class="single-product-slider__item" style="background-image: url('<?php echo wp_get_attachment_image_url($attachment_id, 'large'); ?>')"></div>

					<?php
					// echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', wc_get_gallery_image_html( $attachment_id ), $attachment_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
				}
			} else { ?>

				<div class="single-product-slider__item" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>

			<?php }

		?>

	</div>
</div>

<div class="col d-none d-lg-block">
	<div class="change-slider">

		<?php

			$count = -1;

			if ( $attachment_ids && $product->get_image_id() ) {

				foreach ( $attachment_ids as $attachment_id ) {

					?>

					<?php $count++ ?>

					<?php if ( $count == 0) { ?>
					

					<div class="change-slider__img change-slider__img--active" style="background-image: url('<?php echo wp_get_attachment_image_url($attachment_id, 'large'); ?>')" data-index="<?php echo $count ?>"></div>

					<?php } else { ?>

						<div class="change-slider__img" style="background-image: url('<?php echo wp_get_attachment_image_url($attachment_id, 'large'); ?>')" data-index="<?php echo $count ?>"></div>

					<?php } ?>

					<?php
				}
			}

		?>

	</div>
</div>
