<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package glitche
 */

$documents = get_field('documents');
$status = get_field('status');

?>

<?php if (!is_single()) {
    echo '<div class="public-order-item">';
    the_title('<a class="entry-title" href="' . get_permalink() . '">', '<span class="status status-' . $status['value'] . '">' . $status['label'] . '</span></a>');
    echo '</div>';
} else { ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="single-public-order">
            <div class="public-order-meta">
                <div class="status status-<?= $status['value']; ?>">
                    <?= $status['label']; ?>
                </div>
            </div>

            <?= the_title('<h2 class="entry-title">', '</h2>'); ?>

            <div class="content-wrapper">
                <div class="content page-content">
                    <?php the_content(); ?>
                </div>

                <div class="documents">
                    <?php
                    if ($documents && count($documents)) {
                        foreach ($documents as $document) {
                            echo '<a class="icon document" href="' . $document['document'] . '" rel="noopener" target="_blank">' . basename($document['document']) . '</a>';
                        }
                    }
                    ?>
                </div>
            </div>


            <?php
            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'glitche'),
                'after' => '</div>',
            ));
            ?>
        </div>
    </article><!-- #post-<?php the_ID(); ?> -->
<?php } ?>
