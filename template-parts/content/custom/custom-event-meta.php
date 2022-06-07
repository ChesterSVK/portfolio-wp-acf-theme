<?php

$event_id = Tribe__Main::post_id_helper();
$time_format = get_option('time_format', Tribe__Date_Utils::TIMEFORMAT);
$time_range_separator = tribe_get_option('timeRangeSeparator', ' - ');
$show_time_zone = tribe_get_option('tribe_events_timezones_show_zone', false);
$local_start_time = tribe_get_start_date($event_id, true, Tribe__Date_Utils::DBDATETIMEFORMAT);
$time_zone_label = Tribe__Events__Timezones::is_mode('site') ? Tribe__Events__Timezones::wp_timezone_abbr($local_start_time) : Tribe__Events__Timezones::get_event_timezone_abbr($event_id);

$start_datetime = tribe_get_start_date();
$start_date = tribe_get_start_date(null, false);
$start_time = tribe_get_start_date(null, false, $time_format);
$start_ts = tribe_get_start_date(null, false, Tribe__Date_Utils::DBDATEFORMAT);

$end_datetime = tribe_get_end_date();
$end_date = tribe_get_display_end_date(null, false);
$end_time = tribe_get_end_date(null, false, $time_format);
$end_ts = tribe_get_end_date(null, false, Tribe__Date_Utils::DBDATEFORMAT);

$time_formatted = null;
if ($start_time == $end_time) {
    $time_formatted = esc_html($start_time);
} else {
    $time_formatted = esc_html($start_time . $time_range_separator . $end_time);
}

/**
 * Returns a formatted time for a single event
 *
 * @var string Formatted time string
 * @var int Event post id
 */
$time_formatted = apply_filters('tribe_events_single_event_time_formatted', $time_formatted, $event_id);

/**
 * Returns the title of the "Time" section of event details
 *
 * @var string Time title
 * @var int Event post id
 */
$time_title = apply_filters('tribe_events_single_event_time_title', __('Time:', 'the-events-calendar'), $event_id);

$cost = tribe_get_formatted_cost();
$website = tribe_get_event_website_link($event_id);
$website_title = tribe_events_get_event_website_title();
?>

<div class="tribe-events-meta-group tribe-events-meta-group-details">
    <dl>

        <?php
        do_action('tribe_events_single_meta_details_section_start');

        // All day (multiday) events
        if (tribe_event_is_all_day() && tribe_event_is_multiday()) :
            ?>

            <div>
                <dt class="tribe-events-start-date-label"><img width="16" height="16"
                                                               src="<?= THEME_ASSETS_DIR_URI . '/icons/theme/calendar.svg' ?>"
                                                               alt="Date"></dt>
                <dd>
                    <abbr class="tribe-events-abbr tribe-events-start-date published dtstart"
                          title="<?php echo esc_attr($start_ts); ?>"> <?php echo esc_html($start_date); ?> </abbr>
                </dd>

            </div>

            <div>
                <dt class="tribe-events-end-date-label"><img width="16" height="16"
                                                             src="<?= THEME_ASSETS_DIR_URI . '/icons/theme/calendar.svg' ?>"
                                                             alt="Date"></dt>
                <dd>
                    <abbr class="tribe-events-abbr tribe-events-end-date dtend"
                          title="<?php echo esc_attr($end_ts); ?>"> <?php echo esc_html($end_date); ?> </abbr>
                </dd>

            </div>

        <?php
        // All day (single day) events
        elseif (tribe_event_is_all_day()):
            ?>

            <div>

                <dt class="tribe-events-start-date-label"><img width="16" height="16"
                                                               src="<?= THEME_ASSETS_DIR_URI . '/icons/theme/calendar.svg' ?>"
                                                               alt="Date"></dt>

            </div>

            <div>
                <dd>
                    <abbr class="tribe-events-abbr tribe-events-start-date published dtstart"
                          title="<?php echo esc_attr($start_ts); ?>"> <?php echo esc_html($start_date); ?> </abbr>
                </dd>
            </div>

        <?php
        // Multiday events
        elseif (tribe_event_is_multiday()) :
            ?>

            <dt class="tribe-events-start-datetime-label"><img width="16" height="16"
                                                               src="<?= THEME_ASSETS_DIR_URI . '/icons/theme/calendar.svg' ?>"
                                                               alt="Date"></dt>
            <dd>
                <abbr class="tribe-events-abbr tribe-events-start-datetime updated published dtstart"
                      title="<?php echo esc_attr($start_ts); ?>"> <?php echo esc_html($start_datetime); ?> </abbr>
                <?php if ($show_time_zone) : ?>
                    <span class="tribe-events-abbr tribe-events-time-zone published "><?php echo esc_html($time_zone_label); ?></span>
                <?php endif; ?>
            </dd>

            <dt class="tribe-events-end-datetime-label"><img width="16" height="16"
                                                             src="<?= THEME_ASSETS_DIR_URI . '/icons/theme/calendar.svg' ?>"
                                                             alt="Date"></dt>
            <dd>
                <abbr class="tribe-events-abbr tribe-events-end-datetime dtend"
                      title="<?php echo esc_attr($end_ts); ?>"> <?php echo esc_html($end_datetime); ?> </abbr>
                <?php if ($show_time_zone) : ?>
                    <span class="tribe-events-abbr tribe-events-time-zone published "><?php echo esc_html($time_zone_label); ?></span>
                <?php endif; ?>
            </dd>

        <?php
        // Single day events
        else :
            ?>

            <div>
                <dt class="tribe-events-start-date-label"><img width="16" height="16"
                                                               src="<?= THEME_ASSETS_DIR_URI . '/icons/theme/calendar.svg' ?>"
                                                               alt="Date"></dt>
                <dd>
                    <abbr class="tribe-events-abbr tribe-events-start-date published dtstart"
                          title="<?php echo esc_attr($start_ts); ?>"> <?php echo esc_html($start_date); ?> </abbr>
                </dd>

            </div>

            <div>
                <dt class="tribe-events-start-time-label"><img width="16" height="16"
                                                               src="<?= THEME_ASSETS_DIR_URI . '/icons/theme/time.svg' ?>"
                                                               alt="Time"></dt>
                <dd>
                    <div class="tribe-events-abbr tribe-events-start-time published dtstart"
                         title="<?php echo esc_attr($end_ts); ?>">
                        <?php echo $time_formatted; ?>
                        <?php if ($show_time_zone) : ?>
                            <span class="tribe-events-abbr tribe-events-time-zone published "><?php echo esc_html($time_zone_label); ?></span>
                        <?php endif; ?>
                    </div>
                </dd>

            </div>

            <?php

            // Include venue meta if appropriate.
            if ( tribe_get_venue_id() ) {
                $venue_name = tribe_get_venue_details()['linked_name'];
                ?>

                <div>
                    <dt class="tribe-events-place"><img width="16" height="16"
                                                        src="<?= THEME_ASSETS_DIR_URI . '/icons/theme/marker2.svg' ?>"
                                                        alt="Place"></dt>
                    <dd>
                        <abbr class="tribe-events-abbr tribe-events-place"
                              title="<?php echo esc_attr($venue_name); ?>"> <?php echo esc_html($venue_name); ?> </abbr>
                    </dd>
                </div>
                <?php

            }

            ?>


        <?php endif ?>

        <?php
        // Event Cost
        //        if ( ! empty( $cost ) ) : ?>
        <!---->
        <!--            <dt class="tribe-events-event-cost-label"> -->
        <?php //esc_html_e( 'Cost:', 'the-events-calendar' ); ?><!-- </dt>-->
        <!--            <dd class="tribe-events-event-cost"> --><?php //echo esc_html( $cost ); ?><!-- </dd>-->
        <!--        --><?php //endif ?>

        <?php do_action('tribe_events_single_meta_details_section_end'); ?>
    </dl>
</div>