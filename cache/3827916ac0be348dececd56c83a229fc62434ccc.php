<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="<?php echo route(''); ?>/Others/Themes/Backend/main/horizontal/assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="<?php echo route(''); ?>/Others/Themes/Backend/main/horizontal/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="<?php echo route(''); ?>/Others/Themes/Backend/main/horizontal/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="<?php echo route(''); ?>/Others/Themes/Backend/main/horizontal/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="<?php echo route(''); ?>/Others/Themes/Backend/main/horizontal/assets/css/pace.min.css" rel="stylesheet" />
	<script src="<?php echo route(''); ?>/Others/Themes/Backend/main/horizontal/assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="<?php echo route(''); ?>/Others/Themes/Backend/main/horizontal/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo route(''); ?>/Others/Themes/Backend/main/horizontal/assets/css/app.css" rel="stylesheet">
	<link href="<?php echo route(''); ?>/Others/Themes/Backend/main/horizontal/assets/css/icons.css" rel="stylesheet">
	<title><?php echo e($lang['register']); ?></title>
</head>

<body class="rtl">
	<!--wrapper-->
	<form action="<?php echo route('/register'); ?>" method="post">
	<div class="wrapper">
		<div class="authentication-header"></div>
		<div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
					<div class="col mx-auto">
						<div class="my-4 text-center">
							<img src="<?php echo route(''); ?>/Others/Themes/Backend/main/horizontal/assets/images/logo-img.png" width="180" alt="" />
						</div>
						<div class="card">
							<div class="card-body">
								<div class="p-4 rounded">
									<div class="text-center">
										<h3 class=""><?php echo e($lang['register']); ?></h3>
										<p><?php echo e($lang['already-account']); ?><a href="<?php echo route(''); ?>/login"><?php echo e($lang['sign-in']); ?></a>
										</p>
									</div>
									<div class="d-grid">
										<a class="btn my-4 shadow-sm btn-white" href="javascript:;"> <span
												class="d-flex justify-content-center align-items-center">
												<img class="me-2" src="<?php echo route(''); ?>/Others/Themes/Backend/main/horizontal/assets/images/icons/search.svg" width="16"
													 alt="Image Description">
												<span><?php echo e($lang['register-google']); ?></span>
											</span>
										</a> <a href="javascript:;" class="btn btn-facebook"><i
												class="bx bxl-facebook"></i><?php echo e($lang['register-facebook']); ?></a>
									</div>
									<div class="login-separater text-center mb-4"> <span><?php echo e($lang['register-email']); ?></span>
										<hr />
									</div>
									<div class="form-body">
										<form class="row g-3" action="<?php echo route('/register'); ?>" method="post">
											<div class="col-sm-6">
												<label for="inputFirstName" class="form-label"><?php echo e($lang['first-name']); ?></label>
												<input type="text" class="form-control" id="inputFirstName"
													placeholder="<?php echo e($lang['ex-first-name']); ?>" name="first_name">
												<?php if(!empty($errors['first_name'])): ?>
													<div class="alert-danger"><?php echo $errors['first_name']['required']; ?></div>
												<?php endif; ?>
											</div>
											<div class="col-sm-6">
												<label for="inputLastName" class="form-label"><?php echo e($lang['last-name']); ?></label>
												<input type="text" class="form-control" id="inputLastName"
													placeholder="<?php echo e($lang['ex-last-name']); ?>" name="last_name">
												<?php if(!empty($errors['last_name'])): ?>
													<div class="alert-danger"><?php echo ($errors['last_name']['required']); ?></div>
												<?php endif; ?>
											</div>
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label"><?php echo e($lang['email-address']); ?></label>
												<input type="email" class="form-control" id="inputEmailAddress"
													placeholder="example@user.com" name="email">
												<?php if(!empty($errors['email'])): ?>
													<?php if(!empty($errors['email']['required'])): ?>
														<div class="alert-danger"><?php echo ($errors['email']['required']); ?></div>
													<?php else: ?>
														<?php if(!empty($errors['email']['email'])): ?>
															<div class="alert-danger"><?php echo ($errors['email']['email']); ?></div>
														<?php endif; ?>
													<?php endif; ?>
												<?php endif; ?>
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label"><?php echo e($lang['password']); ?></label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0"
														id="inputChoosePassword" value="12345678"
														placeholder="<?php echo e($lang['enter-pass']); ?>" name="password"> <a href="javascript:;"
														class="input-group-text bg-transparent"><i
															class='bx bx-hide'></i></a>
												</div>
												<?php if(!empty($errors['password'])): ?>
													<?php if(!empty($errors['password']['required'])): ?>
														<div class="alert-danger"><?php echo ($errors['password']['required']); ?></div>
													<?php else: ?>
														<?php if(!empty($errors['password']['password'])): ?>
															<div class="alert-danger"><?php echo ($errors['password']['password']); ?></div>
														<?php endif; ?>
													<?php endif; ?>
												<?php endif; ?>
											</div>
											<div class="col-12">
												<label for="inputSelectCountry" class="form-label"><?php echo e($lang['country']); ?></label>
												<select class="form-select" id="inputSelectCountry"
													aria-label="{ { $lang['examples'] }}" name="country">
													<option value="<?php echo e($lang['iran']); ?>"><?php echo e($lang['iran']); ?></option>
													<option value="<?php echo e($lang['turkey']); ?>"><?php echo e($lang['turkey']); ?></option>
													<option value="<?php echo e($lang['china']); ?>"><?php echo e($lang['china']); ?></option>
													<option value="<?php echo e($lang['canada']); ?>"><?php echo e($lang['canada']); ?></option>
												</select>
											</div>
											<div class="col-12">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox"
														id="flexSwitchCheckChecked">
													<label class="form-check-label" for="flexSwitchCheckChecked"><?php echo e($lang['agreement']); ?></label>
												</div>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<input type="submit" class="btn btn-primary" value='<?php echo e($lang['register']); ?>' />
												</div>
												<?php if(!empty($errorMessage)): ?>
													<div class="alert-warning"><?php echo $errorMessage; ?></div>
												<?php endif; ?>
												<?php if(!empty($successMessage)): ?>
													<div class="alert-success"><?php echo $successMessage; ?></div>
												<?php endif; ?>
											</div>
										</form>
									</div>
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
	<script src="<?php echo route(''); ?>/Others/Themes/Backend/main/horizontal/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="<?php echo route(''); ?>/Others/Themes/Backend/main/horizontal/assets/js/jquery.min.js"></script>
	<script src="<?php echo route(''); ?>/Others/Themes/Backend/main/horizontal/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="<?php echo route(''); ?>/Others/Themes/Backend/main/horizontal/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="<?php echo route(''); ?>/Others/Themes/Backend/main/horizontal/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
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
	<script src="<?php echo route(''); ?>/Others/Themes/Backend/main/horizontal/assets/js/app.js"></script>
	</form>
</body>

</html><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/views/backend/register.blade.php ENDPATH**/ ?>