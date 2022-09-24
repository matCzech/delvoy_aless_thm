<h1>DeLvoy contact form</h1>
<?php settings_errors(); ?>
<?php
    //$avatar = esc_attr(get_option('profile_picture'));
?>



<form method="post" action="options.php" class="delvoy-general-form">
    <?php settings_fields('delvoy-contactform-group'); ?>
    <?php do_settings_sections('delvoy_theme_contact'); ?>
    <?php submit_button(); ?>
</form>