<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

$salary = get_field('salary');
$date_time = get_field('date_time');
$place = get_field('place');
$requirement = get_field('requirement');
$benefits = get_field('benefits');
$single_class = is_single() ? 'single-offer' : '';
?>
<article id="offer-<?php the_ID(); ?>" <?php post_class($single_class); ?>>
    <?php if (is_single()) {
        echo '<header>';
        echo '<h5 class="offer-subtitle">' . __('Offer', THEME_DOMAIN) . '</h5>';
        the_title('<h2 class="offer-title">', '</h2>');
        echo '</header>';
    } ?>

    <div class="offer-wrap">
        <div class="offer-info">
            <div class="offer-left">
                <?php if (!is_single()) {
                    the_title('<h2 class="offer-title">', '</h2>');
                } else {
                    if ($benefits){
                        echo '<div class="offer-benefits page-content">' . $benefits . '</div>';
                    }
                } ?>
                <div class="offer-meta">
                    <dl>
                        <div>
                            <dt class="offer-date-label"><img width="16" height="16"
                                                              src="/wp-content/themes/skozilina/assets/icons/theme/calendar_red.svg"
                                                              alt="Date">
                            </dt>
                            <dd>
                                <abbr class="offer-abbr offer-date"
                                      title="<?= $date_time; ?>"><?= $date_time; ?></abbr>
                            </dd>
                        </div>
                        <div>
                            <dt class="offer-place"><img width="16" height="16"
                                                         src="/wp-content/themes/skozilina/assets/icons/theme/marker_red.svg"
                                                         alt="Place">
                            </dt>
                            <dd>
                                <abbr class="offer-abbr offer-place" title="<?= $place; ?>"> <?= $place; ?> </abbr>
                            </dd>
                        </div>
                        <div>
                            <dt class="offer-requirement"><img width="16" height="16"
                                                               src="/wp-content/themes/skozilina/assets/icons/theme/study_hat.svg"
                                                               alt="Requirement">
                            </dt>
                            <dd>
                                <abbr class="tribe-events-abbr tribe-events-place"
                                      title="<?= $requirement; ?>"> <?= $requirement; ?> </abbr>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
            <div class="offer-right">
                <div class="offer-salary">
                    <p>
                        <?= __('Offered salary', THEME_DOMAIN); ?>
                    </p>
                    <p>
                        <strong>
                            <?= $salary; ?>
                        </strong>
                    </p>
                </div>
                <?php if (!is_single()) {
                    ?>
                    <div class="offer-link">
                        <a class="offer-link-btn effect-btn from-top gray" title="<?= get_the_title() ?>"
                           href="<?= the_permalink() ?>">
                            <svg>
                                <rect x="0" y="0" fill="none" width="100%" height="100%"/>
                            </svg>
                            <?= __('Offer detail', THEME_DOMAIN) ?></a>
                    </div>
                    <?php
                } else {
                    $link_when_interested = get_field('offers_link_when_interested', 'options');
                    if ($link_when_interested) {
                        ?>
                        <div class="offer-link">
                            <a class="offer-link-btn effect-btn from-top red"
                               title="<?= __('I am interested', THEME_DOMAIN) ?>"
                               href="<?= $link_when_interested; ?>">
                                <svg>
                                    <rect x="0" y="0" fill="none" width="100%" height="100%"/>
                                </svg>
                                <?= __('I am interested', THEME_DOMAIN) ?></a>
                        </div>
                        <?php
                    }
                } ?>
            </div>
        </div>

        <?php if (is_single()) {
            ?>
            <div class="offer-details page-content">
                <div class="container">
                    <?php the_content(); ?>
                </div>
            </div>
            <?php
        } ?>
    </div>
</article>
<!-- #offer-<?php the_ID(); ?> -->
