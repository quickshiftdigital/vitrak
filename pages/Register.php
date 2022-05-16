<?php /* Template Name: Registeration Form */ ?>
<?php get_header(); ?>
<?php
if (!is_user_logged_in()) : ?>
	<p>You're already logged in and have no need to create a user profile.</p>
	<?php else :
	while (have_posts()) : the_post(); ?>
		<div id="page-<?php the_ID(); ?>">
			<div class="container">
				<h2><?php the_title(); ?></h2>
				<div class="content">
					<?php the_content() ?>
				</div>
				<form id="vicode_registeration_form" class="icode_form" action="" method="POST">
					</fieldset>
					<p>
						<label for=" vicode_user_code"><?php _e('Username') ?></label>
						<input type="text" name="vicode_user_code" id="vicode_user_code" class="vicode_user_code" />
					</p>
					<p>
						<label for="vicode_user_email"><?php _e('Email') ?></label>
						<input type="text" name="vicode_user_email" id="vicode_user_email" class="vicode_user_email" />
					</p>
					<p>
						<label for="vicode_user_address"><?php _e('Address') ?></label>
						<input type="text" name="vicode_user_address" id="vicode_user_address" class="vicode_user_address" />
					</p>
					<p>
						<label for="vicode_user_mobile"><?php _e('Mobile Number') ?></label>
						<input type="text" name="vicode_user_mobile" id="vicode_user_code" class="vicode_user_mobile" />
					</p>
					<p>
						<label for="vicode_user_business"><?php _e('Business Name') ?></label>
						<input type="text" name="vicode_user_business" id="vicode_user_business" class="vicode_user_business" />
					</p>
					<p>
						<label for="vicode_user_gst"><?php _e('GST') ?></label>
						<input type="text" name="vicode_user_gst" id="vicode_user_gst" class="vicode_user_gst" />
					</p>
					<p>
						<label for="vicode_user_cibil"><?php _e('CIBIL Score') ?></label>
						<input type="text" name="vicode_user_cibil" id="vicode_user_cibil" class="vicode_user_cibil" />
					</p>
					<p>
						<input type="hidden" name="vicode_csrf" value="<php echo wp_creae_nonce('vicode_csrf'); ?>" />
						<button class="regFrom-submit">Submit</button>
					</p>
					</fieldset>
				</form>
			</div>
		</div>
<?php endwhile;
endif; ?>
<?php
$message = "The quick brown fox jumps over the lazy dog";
$n = 3;
$P = array();
$S = array();
for ($x = 0; $x < $n; $x++) {
	array_push($S, rand(1, 9));
	array_push($P, rand(1, 9));
}

function solution($P, $S)
{
	$arr = array();
	$response = 0;

	$totalS = array_sum($S);
	$totalP = array_sum($P);

	$balance_seats = $totalS - $totalP;
	rsort($S);
	$something = 0;

	print_r($S);

	for ($x = 0; $x < count($P); $x++) {
		if ($something <= $totalP - 1) {
			$response = $response + 1;
			$something = $something + $S[$x];
		}
	}

	return $something;
}

$sol = solution($P, $S);
echo '<pre>';
print_r($sol);
?>
<?php get_footer(); ?>