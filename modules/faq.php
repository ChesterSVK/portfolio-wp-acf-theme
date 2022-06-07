<?php

$title = get_sub_field('title');
$faqs = get_sub_field('faqs');


?>

<!-- FAQ -->
<div class="section faqs-section">
    <div class="container">
        <?php if ($title) : ?>
            <div class="title">
                <h2>
                    <?php echo esc_html($title); ?>
                </h2>
            </div>
        <?php endif; ?>

        <?php if ($faqs) : ?>
            <div class="faq-items">
                <?php foreach ($faqs as $item) { ?>
                    <details class="faq-item">
                        <summary>
                            <?php if ($item['heading']) : ?>
                                <h5 class="faq-title">
                                    <?= esc_html($item['heading']); ?>
                                </h5>
                            <?php endif; ?>
                        </summary>
                        <div class="faq-description page-content">
                            <?= ($item['description']); ?>
                        </div>
                    </details>
                <?php } ?>
            </div>
        <?php endif; ?>
    </div>
</div>