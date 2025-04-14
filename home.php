<?php

get_header();
get_template_part( 'partials/header' ); 


?>
<style>
.filter-container__inner {
    display: flex;
    margin-top: 1em;
    justify-content: space-between;
    gap: 3rem;

    .btn {
        background: var(--color-green);
        color: white;
    }

    .facetwp-input-wrap {
        .facetwp-icon {
            left: 0;
            right: auto;
        }

        .facetwp-search{
            padding-left: 30px;
            padding-right: 0;
            background: none;
        }
    }

    .facetwp-facet {
        margin: 0;
        padding: 0;
        opacity: 1;
    }

    .single {
        background: none;
    }

    .fs-label {
        text-transform: uppercase;
    }

    .fs-label-wrap {
        border: none;
        background: none;
    }

    .fs-options {
        box-shadow: 0 2px 15px rgba(0,0,0, .15);

        .fs-option-label {
            line-height: 1.4em;

            &:hover {
               color: var(--color-green);
            }

        }
    }

    .facetwp-type-sort {
        display: flex;
        flex-direction: column;
        padding: 1rem;
        box-shadow: 0 2px 15px rgba(0,0,0, .15);
        justify-content: center;

        select {
            background: none;
        }

    }
}
.filter-group {
    flex: 1;
    padding: 1em;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 2px 15px rgba(0,0,0, .15);

}
    </style>
<div class="filter-container">
    <div class="container--site">
        <div class="filter-container__inner">
                <div class="filter-group">
                <?php echo facetwp_display( 'facet',"media_search" ); ?>
                <?php echo facetwp_display( 'facet',"categories" ); ?>
                <button value="Reset" onclick="FWP.reset()" class="btn facet-reset">Reset</button>
            </div>
            <?php echo facetwp_display( 'facet',"sort_" ); ?>
        </div>
           
    </div>
</div>
<div class='container--site'>
    <div class="archive-container">
        <?php if( have_posts() ):
            while( have_posts() ): the_post();
            
            $post_type = get_post_type();
            get_template_part( 'partials/card', $post_type );
            endwhile;
        else:
            ?><p>No Posts Found</p><?php
        endif; ?>
    </div>
    
</div>
<?php echo facetwp_display('facet','load_more'); ?>
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