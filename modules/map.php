<?php
$title = get_sub_field('title');
$iframes = get_sub_field('iframes');

?>

<!-- Started -->
<div id="map" class="section map-section">
    <div class="container">
        <?php if ($title) : ?>
            <div class="title">
                <h2>
                    <?php echo esc_html($title); ?>
                </h2>
            </div>
        <?php endif; ?>
        <div class="mapouter">
            <div class="gmap_canvas">
                <?php
                if ($iframes) {
                    echo '<div class="iframes-wrapper">';
                    foreach ($iframes as $iframe) {
                        echo '<div class="iframe-wrapp">';
                        echo $iframe['code'];
                        echo '</div>';
                    }
                    echo '</div>';
                }
                ?>
                <!--                <iframe height="700" id="gmap_canvas"-->
                <!--                        src="https://maps.google.com/maps?q=-->
                <? //= str_replace(' ', '%20', $address);?><!--&t=&z=15&ie=UTF8&iwloc=&output=embed"-->
                <!--                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="width: 100%;"></iframe>-->
                <!--                -->
            </div>
        </div>
    </div>
</div>