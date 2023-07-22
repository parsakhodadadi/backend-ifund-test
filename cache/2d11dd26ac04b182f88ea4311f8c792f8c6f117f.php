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
<form action="<?php echo route("/$action"); ?>" method="post">
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
										<h3 class=""><?php echo e($lang['email-verification']); ?></h3>
									</div>
									<div class="form-body">
										<form class="form-control row g-3" action="<?php echo route('/verifyEmail'); ?>" method="post">
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label"><?php echo e($lang['verification-code']); ?></label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0"
														   id="inputChoosePassword" value=""
														   placeholder="<?php echo e($lang['enter-verification-code']); ?>" name="verification-code"> <a href="javascript:;"
																													   class="input-group-text bg-transparent"><i
																class='bx bx-hide'></i></a>
												</div>
											</div>
											<div class="col-md-6 text-end"> <a
														href="<?php echo route('/login'); ?>"><?php echo e($lang['send-again-code']); ?></a>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<input type="submit" class="btn btn-primary" value='<?php echo e($lang['confirm-code']); ?>' />
												</div>
												<?php if(!empty($errorMessage)): ?>
													<div class="form-control alert-danger"><?php echo $errorMessage; ?></div>
												<?php endif; ?>
												<?php if(!empty($successMessage)): ?>
													<div class="form-control alert-success"><?php echo $successMessage; ?></div>
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

</html><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/Views/backend/email-verification.blade.php ENDPATH**/ ?>