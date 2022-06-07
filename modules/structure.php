<?php

$title = get_sub_field('title');
$structure = get_sub_field('items');
?>

<!-- Started -->
<div class="section organizational-structure">
    <div class="container">
        <?php if ($title) : ?>
            <div class="title">
                <h2>
                    <?php echo esc_html($title); ?>
                </h2>
            </div>
        <?php endif; ?>

        <?php if ($structure) : ?>
            <div class="structure-items">
                <?php foreach ($structure as $item) { ?>
                    <div class="structure-item">
                        <?php if ($item['title']) : ?>
                            <h5 class="title">
                                <?= esc_html($item['title']); ?>
                            </h5>
                        <?php endif; ?>
                        <?php if ($item['name']) : ?>
                            <h5 class="name">
                                <?= esc_html($item['name']); ?>
                            </h5>
                        <?php endif; ?>
                        <?php if ($item['phone']) :
                            $phone = str_replace(' ', '', esc_html($item['phone']));
                            ?>
                            <a href="tel:<?= str_replace('+', '00', esc_html($item['phone'])); ?>">
                                <?php
                                if (preg_match('/^\+(\d{3})(\d{3})(\d{3})(\d{3})$/', $phone, $matches)) {
                                    echo '+' . $matches[1] . ' ' . $matches[2] . ' ' . $matches[3] . ' ' . $matches[4];
                                } else {
                                    echo $phone;
                                }
                                ?>
                            </a>
                        <?php endif; ?>
                        <?php if ($item['phone2']) :
                            $phone2 = str_replace(' ', '', esc_html($item['phone2']));
                            ?>
                            <a href="tel:<?= str_replace('+', '00', esc_html($item['phone2'])); ?>">
                                <?php
                                if (preg_match('/^\+(\d{3})(\d{3})(\d{3})(\d{3})$/', $phone2, $matches)) {
                                    echo '+' . $matches[1] . ' ' . $matches[2] . ' ' . $matches[3]. ' ' . $matches[4];
                                } else {
                                    echo $phone2;
                                }
                                ?>
                            </a>
                        <?php endif; ?>
                        <?php if ($item['email']) : ?>
                            <a href="mailto:<?= esc_html($item['email']); ?>" >
                                <?= esc_html($item['email']); ?>
                            </a>
                        <?php endif; ?>
                        <?php if ($item['email2']) : ?>
                            <a href="mailto:<?= esc_html($item['email2']); ?>">
                                <?= esc_html($item['email2']); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php } ?>
            </div>
        <?php endif; ?>
    </div>
</div>