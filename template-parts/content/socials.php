<?php
$social_links = get_field('social_links', 'options');

if ($social_links) : ?>
    <div class="soc">
        <?php foreach ($social_links as $link) { ?>
            <a href="<?php echo esc_url($link['url']); ?>" rel="noopener" target="_blank">
                <span class="<?php echo esc_attr($link['icon']); ?>"></span>
            </a>
        <?php } ?>
    </div>
<?php endif;
