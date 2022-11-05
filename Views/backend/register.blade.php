<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{!! route('') !!}/Others/Themes/Backend/main/horizontal/assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="{!! route('') !!}/Others/Themes/Backend/main/horizontal/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="{!! route('') !!}/Others/Themes/Backend/main/horizontal/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="{!! route('') !!}/Others/Themes/Backend/main/horizontal/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="{!! route('') !!}/Others/Themes/Backend/main/horizontal/assets/css/pace.min.css" rel="stylesheet" />
	<script src="{!! route('') !!}/Others/Themes/Backend/main/horizontal/assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="{!! route('') !!}/Others/Themes/Backend/main/horizontal/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="{!! route('') !!}/Others/Themes/Backend/main/horizontal/assets/css/app.css" rel="stylesheet">
	<link href="{!! route('') !!}/Others/Themes/Backend/main/horizontal/assets/css/icons.css" rel="stylesheet">
	<title>{{ $lang['register'] }}</title>
</head>

<body class="rtl">
	<!--wrapper-->
	<div class="wrapper">
		<div class="authentication-header"></div>
		<div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
					<div class="col mx-auto">
						<div class="my-4 text-center">
							<img src="{!! route('') !!}/Others/Themes/Backend/main/horizontal/assets/images/logo-img.png" width="180" alt="" />
						</div>
						<div class="card">
							<div class="card-body">
								<div class="p-4 rounded">
									<div class="text-center">
										<h3 class="">{{ $lang['register'] }}</h3>
										<p>{{ $lang['already-account'] }}<a href="{!! route('') !!}/login">{{ $lang['sign-in'] }}</a>
										</p>
									</div>
									<div class="d-grid">
										<a class="btn my-4 shadow-sm btn-white" href="javascript:;"> <span
												class="d-flex justify-content-center align-items-center">
												<img class="me-2" src="{!! route('') !!}/Others/Themes/Backend/main/horizontal/assets/images/icons/search.svg" width="16"
													 alt="Image Description">
												<span>{{ $lang['register-google'] }}</span>
											</span>
										</a> <a href="javascript:;" class="btn btn-facebook"><i
												class="bx bxl-facebook"></i>{{ $lang['register-facebook'] }}</a>
									</div>
									<div class="login-separater text-center mb-4"> <span>{{ $lang['register-email'] }}</span>
										<hr />
									</div>
									<div class="form-body">
										<form class="row g-3" action="{!! route('') !!}/register">
											<div class="col-sm-6">
												<label for="inputFirstName" class="form-label">{{ $lang['first-name'] }}</label>
												<input type="text" class="form-control" id="inputFirstName"
													placeholder="{{ $lang['ex-first-name'] }}" name="firstname">
											</div>
											<div class="col-sm-6">
												<label for="inputLastName" class="form-label">{{ $lang['last-name'] }}</label>
												<input type="text" class="form-control" id="inputLastName"
													placeholder="{{ $lang['ex-last-name'] }}" name="lastname">
											</div>
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">{{ $lang['email-address'] }}</label>
												<input type="email" class="form-control" id="inputEmailAddress"
													placeholder="example@user.com" name="username">
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">{{ $lang['password'] }}</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0"
														id="inputChoosePassword" value="12345678"
														placeholder="{{ $lang['enter-pass'] }}" name="password"> <a href="javascript:;"
														class="input-group-text bg-transparent"><i
															class='bx bx-hide'></i></a>
												</div>
											</div>
											<div class="col-12">
												<label for="inputSelectCountry" class="form-label">{{ $lang['country'] }}</label>
												<select class="form-select" id="inputSelectCountry"
													aria-label="{{ $lang['examples'] }}" name="country">
													<option selected>{{ $lang['iran'] }}</option>
													<option value="1">{{ $lang['turkey'] }}</option>
													<option value="2">{{ $lang['china'] }}</option>
													<option value="3">{{ $lang['canada'] }}</option>
												</select>
											</div>
											<div class="col-12">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox"
														id="flexSwitchCheckChecked">
													<label class="form-check-label" for="flexSwitchCheckChecked">{{ $lang['agreement'] }}</label>
												</div>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary"><i
															class='bx bx-user'></i>{{ $lang['register'] }}</button>
												</div>
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
	<script src="{!! route('') !!}/Others/Themes/Backend/main/horizontal/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="{!! route('') !!}/Others/Themes/Backend/main/horizontal/assets/js/jquery.min.js"></script>
	<script src="{!! route('') !!}/Others/Themes/Backend/main/horizontal/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="{!! route('') !!}/Others/Themes/Backend/main/horizontal/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="{!! route('') !!}/Others/Themes/Backend/main/horizontal/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
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
	<script src="{!! route('') !!}/Others/Themes/Backend/main/horizontal/assets/js/app.js"></script>
</body>

</html>