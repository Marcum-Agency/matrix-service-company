<?php
/**
 * Location Partial
 *
 * @param array
 */	
$location_name = get_field('location_name', get_the_ID()) ?: 'Set Location Type';
$address = get_field('address', get_the_ID() );
if($address):
    if($address['country'] == "United States"):
        $readable_address = $address['street_number'] . " " . $address['street_name'] . " | " . $address['city'] . ", " . $address['state_short'] . " " . $address['post_code'];
    else:
        $readable_address = $address['address'];
    endif;
else:
    $readable_address = 'Set Address';
endif;

$phone = get_field('phone_number', get_the_ID());
if($phone):
    if ( !is_array($phone) && method_exists($phone, 'toArray')) {
        $phone = $phone->toArray();
        if($phone['country'] == "United States"):
            $output_number = "<a href={$phone['uri']} >{$phone['national']}</a>";
        else: 
            $output_number = "<a href={$phone['uri']} >{$phone['international']}</a>";
        endif;  
    } else {
        $output_number = 'Error With Phone Number';
    }
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