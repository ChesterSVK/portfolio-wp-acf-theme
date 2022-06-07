<?php
/**
 * Single Event Meta Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta.php
 *
 * @version 4.6.10
 *
 * @package TribeEventsCalendar
 */

do_action('tribe_events_single_meta_before');

// Check for skeleton mode (no outer wrappers per section)
$not_skeleton = !apply_filters('tribe_events_single_event_the_meta_skeleton', false, get_the_ID());

// Do we want to group venue meta separately?
$set_venue_apart = apply_filters('tribe_events_single_event_the_meta_group_venue', false, get_the_ID());

$program = get_field('program');
$gallery = get_field('gallery');
wp_add_inline_script(THEME_MODULES_EFFECTS_ID, '
                const ACF_FIELDS = {"lightbox_images" : ' . json_encode($gallery) . '};', 'before');
?>

    <div class="tribe-events-single-section tribe-events-event-meta primary tribe-clearfix">


        <div class="event-buttons-wrapper event-buttons-wrapper-v2 ">
            <?php
            $website = tribe_get_event_website_url($event_id);
            $website_title = tribe_events_get_event_website_title();
            if (!empty($website)) : ?>
                <a class="btn btn-primary effect-btn red" title="<?= __('Buy tickets', THEME_DOMAIN); ?>"
                   href="<?= $website ?>" target="_blank" rel="noopener">
                    <svg>
                        <rect x="0" y="0" fill="none" width="100%" height="100%"/>
                    </svg>
                    <?= __('Buy tickets', THEME_DOMAIN) ?>
                </a>
            <?php endif; ?>
            <?php do_action('tribe_events_single_event_after_the_content') ?>
        </div>



        <?php if ($program) {
            echo '<div class="program">';
            echo '<h2 class="title">' . __('Program', THEME_DOMAIN) . '</h2>';
            echo $program;
            echo '</div>';
        }

        if ($gallery) : ?>
            <div id="lightbox-gallery" class="gallery-row">
            </div>
        <?php endif; ?>
    </div>


    <div class="tribe-events-single-section tribe-events-event-meta secondary tribe-clearfix">

<?php
//do_action('tribe_events_single_event_meta_primary_section_start');

// Always include the main event details in this first section
tribe_get_template_part('modules/meta/details');

// Include venue meta if appropriate.
if (tribe_get_venue_id()) {
    // If we have no map to embed and no need to keep the venue separate...
    if (!$set_venue_apart && !tribe_embed_google_map()) {
        tribe_get_template_part('modules/meta/venue');
    } elseif (!$set_venue_apart && !tribe_has_organizer() && tribe_embed_google_map()) {
        // If we have no organizer, no need to separate the venue but we have a map to embed...
        tribe_get_template_part('modules/meta/venue');
        echo '<div class="tribe-events-meta-group tribe-events-meta-group-gmap">';
        tribe_get_template_part('modules/meta/map');
        echo '</div>';
    } else {
        // If the venue meta has not already been displayed then it will be printed separately by default
        $set_venue_apart = true;
    }
}

// Include organizer meta if appropriate
if (tribe_has_organizer()) {
    tribe_get_template_part('modules/meta/organizer');
}

//do_action('tribe_events_single_event_meta_primary_section_end');

//do_action('tribe_events_single_event_meta_secondary_section_start');

tribe_get_template_part('modules/meta/venue');
tribe_get_template_part('modules/meta/map');

//do_action('tribe_events_single_event_meta_secondary_section_end');

do_action('tribe_events_single_meta_after');
