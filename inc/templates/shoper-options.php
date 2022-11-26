<div class="wrap shoper-options">

    <h1> <?php __('Theme Options Page', 'shoper') ?></h1>

    <?php settings_errors(); ?>

    <form action="options.php" method="post">

        <?php settings_fields( 'shoper_general_group' ) ?>

        <?php do_settings_sections( 'shoper-options' ) ?>

        <?php submit_button(); ?>

    </form>

</div>
