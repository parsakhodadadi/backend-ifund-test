<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="<?php echo route(''); ?>/Others/Themes/Backend/main/vertical/assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="<?php echo route(''); ?>/Others/Themes/Backend/main/vertical/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="<?php echo route(''); ?>/Others/Themes/Backend/main/vertical/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="<?php echo route(''); ?>/Others/Themes/Backend/main/vertical/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="<?php echo route(''); ?>/Others/Themes/Backend/main/vertical/assets/css/pace.min.css" rel="stylesheet" />
	<script src="<?php echo route(''); ?>/Others/Themes/Backend/main/vertical/assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="<?php echo route(''); ?>/Others/Themes/Backend/main/vertical/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo route(''); ?>/Others/Themes/Backend/main/vertical/assets/css/app.css" rel="stylesheet">
	<link href="<?php echo route(''); ?>/Others/Themes/Backend/main/vertical/assets/css/icons.css" rel="stylesheet">
	<title><?php echo e($lang['sign_in']); ?></title>
</head>

<body class="rtl">
	<!--wrapper-->
	<div class="wrapper">
		<div class="authentication-header"></div>
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="mb-4 text-center">
							<img src="<?php echo route(''); ?>/Others/Themes/Backend/main/vertical/assets/images/logo-img.png" width="180" alt="" />
						</div>
						<div class="card">
							<div class="card-body">
								<div class="p-4 rounded">
									<form action="<?php echo route('/login'); ?>" method="post">
									<div class="text-center">
										<h3 class=""><?php echo e($lang['form_name']); ?></h3>
										<p><?php echo e($lang['no_account']); ?><a href="<?php echo route(''); ?>/register"><?php echo e($lang['register']); ?></a>
										</p>
									</div>
									<div class="d-grid">
										<a class="btn my-4 shadow-sm btn-white" href="javascript:;"> <span
												class="d-flex justify-content-center align-items-center">
												<img class="me-2" src="<?php echo route(''); ?>/Others/Themes/Backend/main/vertical/assets/images/icons/search.svg" width="16"
													 alt="Image Description">
												<span><?php echo e($lang['google_sign_in']); ?></span>
											</span>
										</a> <a href="javascript:;" class="btn btn-facebook"><i
												class="bx bxl-facebook"></i><?php echo e($lang['facebook_sign_in']); ?></a>
									</div>
									<div class="login-separater text-center mb-4"> <span><?php echo e($lang['email_sign_in']); ?></span>
										<hr />
									</div>
									<div class="form-body">
										<form class="row g-3" action="<?php echo e(route('login')); ?>" method="post">
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label"><?php echo e($lang['email_address']); ?></label>
												<input type="text" class="form-control" id="inputEmailAddress"
													placeholder="نام کاربری خود را وارد کنید" name="email">
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label"><?php echo e($lang['password']); ?></label>
												<div class="input-group" id="show_hide_password">
													<div>
														<input type="hidden" name="csrf_token" value="<?php echo e($security->csrfToken()); ?>">
													</div>
													<input type="password" class="form-control border-end-0"
														id="inputChoosePassword" value="12345678"
														placeholder="رمز عبور خود را وارد کنید" name="password"> <a href="javascript:;"
														class="input-group-text bg-transparent"><i
															class='bx bx-hide'></i></a>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox"
														id="flexSwitchCheckChecked" checked>
													<label class="form-check-label" for="flexSwitchCheckChecked"><?php echo e($lang['remember_me']); ?></label>
												</div>
											</div>
											<div class="col-md-6 text-end"> <a
													href="<?php echo route(''); ?>/Others/Themes/Backend/main/vertical/authentication-forgot-password.html"><?php echo e($lang['forget_password']); ?></a>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<input type="submit" class="btn btn-primary">
												</div>
											</div>
										</form>
									</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="<?php echo route(''); ?>/Others/Themes/Backend/main/vertical/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="<?php echo route(''); ?>/Others/Themes/Backend/main/vertical/assets/js/jquery.min.js"></script>
	<script src="<?php echo route(''); ?>/Others/Themes/Backend/main/vertical/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="<?php echo route(''); ?>/Others/Themes/Backend/main/vertical/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="<?php echo route(''); ?>/Others/Themes/Backend/main/vertical/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="<?php echo route(''); ?>/Others/Themes/Backend/main/vertical/assets/js/app.js"></script>
</body>

</html><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/views/backend/user-password-login.blade.php ENDPATH**/ ?>