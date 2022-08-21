<h1>DeLvoy Aless Thm settings</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php">
    <?php settings_fields('delvoy-setting-group'); ?>
    <?php do_settings_sections('delvoy_aless'); ?>
    <?php submit_button(); ?>
</form>