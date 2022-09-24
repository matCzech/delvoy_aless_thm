<h1>DeLvoy Aless Thm sidebar</h1>
<?php settings_errors(); ?>
<?php
    $avatar = esc_attr(get_option('profile_picture'));
    $first_name = esc_attr(get_option('first_name'));
    $last_name = esc_attr(get_option('last_name'));
    $description = esc_attr(get_option('description_area'));
    $full_name = $first_name . ' ' . $last_name;
?>

<div class="delvoy-sidebar-preview">
    <div class="delvoy-sidebar">
        <div class="image-container">
            <div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php print $avatar ?>)"></div>
        </div>
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
    <?php submit_button('Zapisz zmiany', 'primary', 'submitbtn'); ?>
</form>