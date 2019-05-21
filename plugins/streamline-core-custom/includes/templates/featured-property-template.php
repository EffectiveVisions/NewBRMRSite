<?php
/**
 * The template for displaying featured properties from the [resortpro-featured-properties] shortcode
 *
 * This template can be overridden by copying it to yourtheme/streamline_templates/featured-property.php.
 *
 *
 * @author  Streamline
 * @package StreamlineCore/Templates
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="c-property-listings__item listing-1 col-xs-12 col-sm-6">
  <div class="c-property c-property--listing-1 property">

		<div class="c-property__header">
			<h3 class="c-property__heading">
				<a class="u-truncate" href="<?php echo $property_link ?>"><?php echo $unit['location_name'] ?></a>
			</h3>
			
			<span class="c-property__location u-truncate"><?php echo $unit['location_area_name']; ?></span>

			<div class="c-star-rating">
				<div class="c-star-rating__stars" star-rating
					rating-value="<?php echo $unit['rating_average']; ?>" data-max="5"></div>
				<span class="c-star-rating__count">(<?php echo $unit['rating_count']; ?> <?php _e( 'reviews', 'streamline-core' ) ?>)</span>
			</div>
		</div>
		<!-- /.c-property__header -->

		<div class="c-property__img">
			<?php if($unit['max_pets'] > 0): ?>
				<span class="c-property__pet-icon js-petFriendly" data-toggle="tooltip" data-placement="left" title="Pet friendly"><i class="fa fa-paw"></i></span>
			<?php endif; ?>

			<a class="c-property__img-link" href="<?php echo $property_link ?>">
        <img src="<?php echo $unit['default_thumbnail_path']; ?>" alt="<?php echo $unit['location_name'] ?>"/>
      </a>
		</div>
		<!-- /.c-property__img -->

		<div class="c-property__body">
			<ul class="c-property__details">
				<li class="c-property__details-item c-property__details-item--icon" data-toggle="tooltip" data-placement="left" title="Sleeps: <?php echo $unit['max_occupants']?>">
					<i class="fa fa-group"></i> <span><?php echo $unit['max_occupants']?></span>
				</li>
				<li class="c-property__details-item c-property__details-item--icon" data-toggle="tooltip" data-placement="left" title="Bedrooms: <?php echo $unit['bedrooms_number'] ?>">
				<i class="fa fa-hotel"></i> <span><?php echo $unit['bedrooms_number'] ?></span>
				</li>
			</ul>

			<div class="c-property__cost">
				<small><?php echo apply_filters( 'streamline-featured-from', __('Starting from', 'streamline-core') ); ?></small>
				<span>$<?php echo number_format($unit['price_data']['daily'],0); ?></span>
			</div>
		</div>
		<!-- c-property__body -->
    
  </div>
  <!-- /.c-property -->
  
</div>
<!-- /.c-property-listings__item -->
