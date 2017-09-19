<div class='wrap'>
	<h2>Marchex Call Tracking Setup</h2>

<?php 

if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] === 'true') {
	echo '
		<div id="setting-error-settings_updated" class="updated settings-error"> 
			<p><strong>Settings saved.</strong></p>
		</div>';
}

?>	

	<p>Simply enter your Marchex account ID below and your site will be ready for call tracking.</p>  
	
	<form method='post' name='marchex' >

		<?php wp_nonce_field( 'marchex' ); ?>

		<table class="form-table">
			<tr>

				<th scope="row">
					<label for="marchex_id">Marchex ID</label>
				</th>

				<td> 
					<input id='marchex_id' type='text' class="regular-text" name='marchex_id' value="<?php echo get_option( 'marchex_id' ); ?>"/>
				</td>

			</tr>

		</table>

		<p class="submit">
			<input type="submit" name='save' id="submit" class="button button-primary" value="Save ID">
		</p>

	</form>
</div>