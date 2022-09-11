<h1>DeLvoy Aless Thm settings</h1>
<?php settings_errors(); ?>
<?php
    $first_name = esc_attr(get_option('first_name'));
    $last_name = esc_attr(get_option('last_name'));
    $description = esc_attr(get_option('description_area'));
    $full_name = $first_name . ' ' . $last_name;
?>

<div class="delvoy-sidebar-preview">
    <div class="delvoy-sidebar">
        <h1 class="delvoy-username"><?php print $full_name; ?></h1>
        <h2 class="delvoy-description">
            <?php print $description ?>
        </h2>
        <div class="icons-wrapper">

        </div>

    </div>
</div>

<form method="post" action="options.php" class="delvoy-general-form">
    <?php settings_fields('delvoy-setting-group'); ?>
    <?php do_settings_sections('delvoy_aless'); ?>
    <?php submit_button(); ?>
</form>