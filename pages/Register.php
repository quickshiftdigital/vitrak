<?php /* Template Name: Registeration Form */ ?>
<?php get_header(); ?>
<?php
if (is_user_logged_in()) : ?>
	<p>You're already logged in and have no need to create a user profile.</p>
	<?php else :
	while (have_posts()) : the_post(); ?>
		<div id="page-<?php the_ID(); ?>">
			<section class="vh-100 bg-image">
				<div class="mask d-flex align-items-center h-100 gradient-custom-3">
					<div class="container h-100">
						<div class="row d-flex justify-content-center align-items-center h-100">
							<div class="col-12 col-md-9 col-lg-7 col-xl-6">
								<div class="card" style="border-radius: 15px;">
									<div class="card-body p-5">
										<h2 class="text-uppercase text-center mb-5">Create an account</h2>
										<form id="vicode_registeration_form" class="icode_form" action="" method="POST">
											<div class="form-outline mb-4">
												<input type="text" id="form3Example1cg" name="first-name" class="form-control form-control-lg" placeholder="First Name" />
											</div>
											<div class="form-outline mb-4">
												<input type="text" id="form3Example1cg" name="last-name" class="form-control form-control-lg" placeholder="Last Name" />
											</div>
											<div class="form-outline mb-4">
												<input type="text" id="form3Example1cg" name="phone-name" class="form-control form-control-lg" placeholder="Phone Number" />
											</div>
											<div class="form-outline mb-4">
												<input type="email" id="form3Example3cg" name="email" class="form-control form-control-lg" placeholder="Your Email" />
											</div>

											<div class="form-outline mb-4">
												<input type="password" id="form3Example4cg" name="password" class="form-control form-control-lg" placeholder="Password" />
											</div>

											<div class="form-outline mb-4">
												<input type="password" id="form3Example4cdg" class="form-control form-control-lg" placeholder="Repeat your password" />
											</div>
											<div class="form-outline mb-4">
												<select class="select form-control-lg">
													<option value="1">Select Role</option>
													<option value="2">Vendor</option>
													<option value="3">Distributor</option>
												</select>
											</div>
											<!--<div class="form-check d-flex justify-content-center mb-5">
						<input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
						<label class="form-check-label" for="form2Example3g">
							I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
						</label>
						</div>-->
											<<<<<<< HEAD <div class="d-flex justify-content-center">
												<button type="button" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" id="register">Register</button>
									</div>
									<p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="#!" class="fw-bold text-body"><u>Login here</u></a>
									</p>

									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
		</section>
		=======
		<div class="d-flex justify-content-center">
			<button type="button" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" id="register">Register</button>
		</div>
		<p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="#!" class="fw-bold text-body"><u>Login here</u></a>
		</p>

		</form>
		</div>
		</div>
		</div>
		</div>
		</div>
		>>>>>>> be726eb503587224e3a9d7281a1ea538035d5b2e
		</div>
		</section>
		</div>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>