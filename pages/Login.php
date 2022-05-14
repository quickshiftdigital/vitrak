<?php /* Template Name: Login Form */ ?>
<?php get_header(); ?>


<form id = "vicode_registeration_form" class="icode_form" action="" method="POST>
		</fieldset>
		<p>
			<label for="vicode_user_code"><?php _e('Username') ?></label>
			<input type="text" name="vicode_user_code" id="vicode_user_code" class="vicode_user_code"/>
		</p>
		<p>
			<label for="vicode_user_password"><?php _e('Password') ?></label>
			<input type="text" name="vicode_user_password" id="vicode_user_password" class="vicode_user_password"/>
		</p>
		</fieldset>
</form>

<?php get_footer(); ?>