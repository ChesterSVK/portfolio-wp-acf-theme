<?php
global $footer_default;
$footer_style = get_field('footer_style');
if (!$footer_style) {
    if (!$footer_default) {
        $footer_style = 'light';
    } else $footer_style = $footer_default;
}
?>
</main>
<!--END MAIN-->

<!--BEGIN FOOTER-->
<footer id="pageFooter" class="<?= $footer_style; ?>">
    <?php
    get_template_part('template-parts/footer/footer-public');
    ?>
</footer>
<!--END FOOTER-->

</div>
<!--END PAGE-->

<?php wp_footer(); ?>

</body>
</html>
