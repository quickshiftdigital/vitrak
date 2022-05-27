<?php /* Template Name: Registeration Form */ ?>
<?php get_header(); ?>
<?php
if (!is_user_logged_in()) : ?>
	<p>You're already logged in and have no need to create a user profile.</p>
	<?php else :
	while (have_posts()) : the_post(); ?>
		<div id="page-<?php the_ID(); ?>">
		<div id="primary" class="content-area">
  <main id="main" class="site-main">
    <article id="post-13" class="post-13 page type-page status-publish hentry">
      <div class="entry-content">
        <div class="woocommerce">
          <div class="woocommerce-notices-wrapper"></div>
          <div class="u-columns col2-set" id="customer_login">
            <div class="u-column1 col-1">
              <h2>Login</h2>
              <form class="woocommerce-form woocommerce-form-login login" method="post">
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                  <label for="username">Username or email address&nbsp; <span class="required">*</span>
                  </label>
                  <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="">
                </p>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                  <label for="password">Password&nbsp; <span class="required">*</span>
                  </label>
                  <span class="password-input">
                    <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password">
                    <span class="show-password-input"></span>
                  </span>
                </p>
                <p class="form-row">
                  <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                    <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever">
                    <span>Remember me</span>
                  </label>
                  <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="9dc4b187fc">
                  <input type="hidden" name="_wp_http_referer" value="/my-account/?demo=17">
                  <button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="Log in">Log in</button>
                </p>
                <p class="woocommerce-LostPassword lost_password">
                  <a href="https://ecotech.kutethemes.net/my-account/lost-password/">Lost your password?</a>
                </p>
              </form>
            </div>
            <div class="u-column2 col-2">
              <h2>Register</h2>
              <form method="post" class="woocommerce-form woocommerce-form-register register">
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                  <label for="reg_username">Username&nbsp; <span class="required">*</span>
                  </label>
                  <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="">
                </p>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                  <label for="reg_email">Email address&nbsp; <span class="required">*</span>
                  </label>
                  <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="">
                </p>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                  <label for="reg_password">Password&nbsp; <span class="required">*</span>
                  </label>
                  <span class="password-input">
                    <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password">
                    <span class="show-password-input"></span>
                  </span>
                </p>
                <div class="woocommerce-privacy-policy-text">
                  <p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="https://ecotech.kutethemes.net/privacy-policy/" class="woocommerce-privacy-policy-link" target="_blank">privacy policy</a>. </p>
                </div>
                <p class="woocommerce-form-row form-row">
                  <input type="hidden" id="woocommerce-register-nonce" name="woocommerce-register-nonce" value="9be0fec208">
                  <input type="hidden" name="_wp_http_referer" value="/my-account/?demo=17">
                  <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="Register">Register</button>
                </p>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- .entry-content -->
    </article>
    <!-- #post-## -->
  </main>
  <!-- #main -->
</div>
		</div>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>