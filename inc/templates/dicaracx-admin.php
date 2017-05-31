<h2>General Settings</h2>
<hr>
<?php settings_errors(); ?>
<form action="options.php" method="post">
	<?php settings_fields( 'dicaracx-settings-group' ); ?>
	<?php do_settings_sections( 'dicaracx_premiun' ); ?>
	<?php submit_button(); ?>
</form>
