<?php
/**
 * Location Partial
 *
 * @param array
 */	
$location_name = get_field('location_name', get_the_ID()) ?: 'Set Location Type';
$address = get_field('address', get_the_ID() );
$readable_address = $address['street_number'] . " " . $address['street_name'] . " | " . $address['city'] . "," . $address['state_short'] . " " . $address['post_code'];
$phone = get_field('phone_number', get_the_ID());
if($phone):
    $phone = $phone->toArray();
    $output_number = "<a href={$phone['uri']} >{$phone['national']}</a>";
else: 
    $output_number = "No Number Available";
endif;

?>
<div <?php post_class(); ?> data-lat="<?php echo $address['lat']; ?>" data-long="<?php echo $address['lng']; ?>">
    <span class="location_type"><?php echo $location_name; ?></span>
    <h3><?php the_title(); ?></h3>
    <address>
        <?php echo $readable_address; ?>
    </address>
    <?php echo $output_number; ?>
</div>

<style>
.type-location {
    margin-bottom: 2rem;
    padding: 1em;

    .location_type {
        text-transform: uppercase;
        color: var(--color-green);
        font-size: 18px;
        display: inline-block;
    }

    h3 {
        font-size: 36px;
        text-transform: uppercase;
        margin-bottom: 0.5rem;
    }

    address {
        font-style: normal;
    }

    a {
        color: black;
        text-decoration: none;
    }
}

</style>