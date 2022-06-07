<?php

$height = get_sub_field('height');
$min_height = get_sub_field('min_height');
$max_height = get_sub_field('max_height');
?>

<!-- Started -->
<div class="section spacer" style="height: <?= $height; ?>; <?= ($min_height ? 'min-height:' . $min_height . ';' : '')?> <?= ($max_height ? 'max-height:' . $max_height . ';' : '')?>">
</div>