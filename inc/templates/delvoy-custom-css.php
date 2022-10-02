<h1>DeLvoy Custom CSS</h1>
<?php settings_errors(); ?>
<?php
    //$avatar = esc_attr(get_option('profile_picture'));
?>



<form id="save-custom-css-form" method="post" action="options.php" class="delvoy-general-form">
    <?php settings_fields('delvoy-custom-css-options'); ?>
    <?php do_settings_sections('delvoy_custom_css'); ?>
    <?php submit_button(); ?>
</form>