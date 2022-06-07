<?php
wp_add_inline_script(THEME_MODULES_EFFECTS_ID, '
const ACF_FIELDS = {"tabs" : ' . json_encode(get_sub_field('menu_items')) . '};', 'before');
?>

<!-- About -->
<div id="ajax-about" class="section about">
    <div class="container">
        <div id="about-tabs">
        </div>
    </div>
</div>