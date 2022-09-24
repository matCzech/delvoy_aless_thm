<h1>DeLvoy Aless theme support</h1>
<?php settings_errors(); ?>
<?php
    //$avatar = esc_attr(get_option('profile_picture'));
?>



<form method="post" action="options.php" class="delvoy-general-form">
    <?php settings_fields('delvoy-theme-support'); ?>
    <?php do_settings_sections('delvoy_theme_options_page'); ?>
    <?php submit_button(); ?>
</form>