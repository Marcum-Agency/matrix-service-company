<?php
get_header();

get_template_part( 'partials/header' );
?>
<div class="content container--site__sub">
<?php echo do_blocks(
    '<!-- wp:mrcm/split-media {
        "name":"mrcm/split-media",
        "data":{
            "field_67e0b295bced4":"We cant seem to Find that.",
            "field_67e0b295bced9":"The page you were looking for doesnt exist. It might have been moved or deleted. Please check the URL for any typos or try the navigation menu to find what youre looking for.\r\n\r\nOtherwise, you can return to our homepage by clicking the button below.",
            "field_67e0b295bcede":"",
            "field_67e0b295bcee3":{
                "row-0":{
                    "field_67e0b295c4436_field_67a9baf87bf6c":{
                        "field_67a9bc5f76bb4":"link",
                        "field_67a9bbcc76bb3":{
                            "title":"Go to Homepage",
                            "url":"https://matrixservicecompany.com/",
                            "target":""
                        }
                    }
                }
            },
            "field_67e0b295bceec":"13786",
            "field_67e6b8d5104df":"",
            "field_67f535bb071a8":{
                "field_67f535bb071a8_field_67eecdbfdfce1":{
                    "field_67eecdcedfce2":"l2r",
                    "field_67eece02dfce3":"arrow-right",
                    "field_67eece22dfce4":"0"
                }
            }
        },
        "mode":"auto"} /-->'); ?>
</div>
<div class="footer_blocks">
<?php 
echo do_blocks( 
    '<!-- wp:mrcm/cta-image-banner {
        "name": "mrcm/cta-image-banner",
        "data": {
            "green_header": "Let\'s Talk:",
            "_green_header": "field_67d79c2436dc1",
            "white_header_text": "Invitation to bid",
            "ctas_0_magic-cta_type": "link",
            "ctas_0_magic-cta_link": {
                "title": "Submit",
                "url": "/contact/"
            },
            "ctas_0_magic-cta": "",
            "ctas": 1,
            "_ctas": "field_67d79b3e9c3a6",
            "media_type": "image",
            "background_image": 225
        },
        "mode": "auto"
    } /-->'
); 
?>    <?php echo do_blocks(
    '<!-- wp:mrcm/fifty-fifty-no-media {
        "name": "mrcm/fifty-fifty-no-media",
        "data": {
            "title": "Explore Careers",
            "description": "<p>Great people make a company great. We\'re looking for people who are ready to make a difference, deliver results, and live our values.</p>",
            "ctas_0_magic-cta_type": "link",
            "ctas_0_magic-cta_link": {
                "title": "Careers",
                "url": "/careers/"
            },
            "ctas_0_magic-cta": "",
            "ctas": 1,
            "call_out_header": "We Want You",
            "block_visuals_orientation": "r2l",
            "block_visuals_arrow_direction": "arrow-left",
            "block_visuals_hide_arrow": "0",
            "block_visuals": "",
            "_block_visuals": "field_67eecd6578834"
        },
        "mode": "auto",
        "className": "explore-career"
    } /-->'
    ); ?>
</div>
<?php get_footer();