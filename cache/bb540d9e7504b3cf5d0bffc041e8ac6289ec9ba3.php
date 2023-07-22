<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/assets/css/pace.min.css" rel="stylesheet" />
	<script src="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/assets/css/app.css" rel="stylesheet">
	<link href="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/assets/css/dark-theme.css" />
	<link rel="stylesheet" href="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/assets/css/semi-dark.css" />
	<link rel="stylesheet" href="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/assets/css/header-colors.css" />
	<title><?php echo e($lang['kon-class']); ?></title>
</head>

<body class="rtl">
	<!--wrapper-->
	<div class="wrapper">
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="top-menu-left d-none d-lg-block">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/app-emailbox.html"><i class='bx bx-envelope'></i></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/app-chat-box.html"><i class='bx bx-message'></i></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/app-fullcalender.html"><i class='bx bx-calendar'></i></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/app-to-do.html"><i class='bx bx-check-square'></i></a>
							</li>
						</ul>
					</div>
					<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control" placeholder="جستجو ..."> <span
								class="position-absolute top-50 search-show translate-middle-y"><i
									class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i
									class='bx bx-x'></i></span>
						</div>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								<a class="nav-link" href="#"> <i class='bx bx-search'></i>
								</a>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button"
									data-bs-toggle="dropdown" aria-expanded="false"> <i class='bx bx-category'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<div class="row row-cols-3 g-3 p-3">
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-cosmic text-white"><i
													class='bx bx-group'></i>
											</div>
											<div class="app-title">تیم ها</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-burning text-white"><i
													class='bx bx-atom'></i>
											</div>
											<div class="app-title">پروژه ها</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-lush text-white"><i
													class='bx bx-shield'></i>
											</div>
											<div class="app-title">وظایف</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-kyoto text-dark"><i
													class='bx bx-notification'></i>
											</div>
											<div class="app-title">نظرات</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-blues text-dark"><i
													class='bx bx-file'></i>
											</div>
											<div class="app-title">فایل ها</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-moonlit text-white"><i
													class='bx bx-filter-alt'></i>
											</div>
											<div class="app-title">هشدار ها</div>
										</div>
									</div>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
									role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span
										class="alert-count">7</span>
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">اعلان ها</p>
											<p class="msg-header-clear ms-auto">علامت گذاری همه به عنوان خوانده شده</p>
										</div>
									</a>
									<div class="header-notifications-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i
														class="bx bx-group"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">کاربران جدید<span class="msg-time float-end">14
															ثانیه پیش</span></h6>
													<p class="msg-info">5 کاربر جدید ثبت نام کردند</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger"><i
														class="bx bx-cart-alt"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">سفارشات جدید <span class="msg-time float-end">2
															دقیقه پیش</span></h6>
													<p class="msg-info">شما یک سفارش جدید دریافت کردید</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success"><i
														class="bx bx-file"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">24 فایل PDF<span class="msg-time float-end">19
															دقیقه پیش</span></h6>
													<p class="msg-info">فایل های pdf جدید تولید شدند</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-warning text-warning"><i
														class="bx bx-send"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">زمان پاسخگویی <span
															class="msg-time float-end">28 دقیقه پیش</span></h6>
													<p class="msg-info">میانگین زمان پاسخوگیی 5.1 دقیقه است</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-info text-info"><i
														class="bx bx-home-circle"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">تایید محصول جدید <span
															class="msg-time float-end">2 ساعت پیش</span></h6>
													<p class="msg-info">محصول جدید شما تایید شد</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger"><i
														class="bx bx-message-detail"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">دیدگاه جدید <span class="msg-time float-end">4
															ساعت پیش</span></h6>
													<p class="msg-info">دیدگاه های جدید کاربران دریافت شد</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success"><i
														class='bx bx-check-square'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">ارسال محصول شما <span
															class="msg-time float-end">5 ساعت پیش</span></h6>
													<p class="msg-info">محصول شما با موفقیت ارسال شد</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i
														class='bx bx-user-pin'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">24 نویسنده جدید<span
															class="msg-time float-end">1 روز پیش</span></h6>
													<p class="msg-info">در هفته گذشته 24 نویسنده جدید به شرکت پیوست</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-warning text-warning"><i
														class='bx bx-door-open'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">هشدار های دفاعی <span
															class="msg-time float-end">2 هفته پیش</span></h6>
													<p class="msg-info">45% هشدار کمتر در 4 هفته گذشته</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">مشاهده همه اعلان ها</div>
									</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
									role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span
										class="alert-count">8</span>
									<i class='bx bx-comment'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">پیغام ها</p>
											<p class="msg-header-clear ms-auto">علامت گذاری همه به عنوان خوانده شده</p>
										</div>
									</a>
									<div class="header-message-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/assets/images/avatars/avatar-1.png" class="msg-avatar"
														 alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">رضا افشار <span class="msg-time float-end">5
															ثانیه پیش</span></h6>
													<p class="msg-info">این یک پیام استاندارد است</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/assets/images/avatars/avatar-2.png" class="msg-avatar"
														 alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">پریسا توکلی <span class="msg-time float-end">14
															ثانیه پیش</span></h6>
													<p class="msg-info">پکیج های جدید منتشر شدند</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/assets/images/avatars/avatar-3.png" class="msg-avatar"
														 alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">پدرام شریفی <span class="msg-time float-end">8
															دقیقه پیش</span></h6>
													<p class="msg-info">نسخه جدید قالب به روز رسانی شد</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/assets/images/avatars/avatar-4.png" class="msg-avatar"
														 alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">یلدا رسولی <span class="msg-time float-end">15
															دقیقه پیش</span></h6>
													<p class="msg-info">اولین نسخه اپلیکیشن به درستی ایجاد شد</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/assets/images/avatars/avatar-5.png" class="msg-avatar"
														 alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">امیر صبوری <span class="msg-time float-end">22
															دقیقه پیش</span></h6>
													<p class="msg-info">لورم ایپسوم متن ساختگی نامفهوم</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/assets/images/avatars/avatar-6.png" class="msg-avatar"
														 alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">ساناز پگاه <span class="msg-time float-end">2
															ساعت پیش</span></h6>
													<p class="msg-info">ویژگی های جدید محصول تعریف شد</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/assets/images/avatars/avatar-7.png" class="msg-avatar"
														 alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">سعید صادقی <span class="msg-time float-end">4
															ساعت پیش</span></h6>
													<p class="msg-info">لورم اپیسوم متن ساختگی</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/assets/images/avatars/avatar-8.png" class="msg-avatar"
														 alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">فریبا سبحانی <span class="msg-time float-end">6
															ساعت پیش</span></h6>
													<p class="msg-info">این مورد در 1960 ثانیه محبوب شد</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/assets/images/avatars/avatar-9.png" class="msg-avatar"
														 alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">علیرضا قربانی <span
															class="msg-time float-end">2 ساعت پیش</span></h6>
													<p class="msg-info">نسخه جدید قالب به روز رسانی شد</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/assets/images/avatars/avatar-10.png" class="msg-avatar"
														 alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">محمد خالقی <span class="msg-time float-end">2
															روز پیش</span></h6>
													<p class="msg-info">شما می توانید این پیام را ذخیره کنید</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/assets/images/avatars/avatar-11.png" class="msg-avatar"
														 alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">جواد علیپور <span class="msg-time float-end">5
															روز پیش</span></h6>
													<p class="msg-info">لورم ایپسوم متن ساختگی نامفهوم</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">مشاهده همه پیغام ها</div>
									</a>
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
							role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0">پریسا توکلی</p>
								<p class="designattion mb-0">طراح وب</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="javascript:;"><i
										class="bx bx-user"></i><span>پروفایل</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i
										class="bx bx-cog"></i><span>تنظیمات</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i
										class='bx bx-home-circle'></i><span>داشبورد</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i
										class='bx bx-dollar-circle'></i><span>درآمد</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-download'></i><span>دانلود
										ها</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i
										class='bx bx-log-out-circle'></i><span>خروج</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<span>
						<h4>
							ایجاد دسته بندی جدید
						</h4>
					</span>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary">تنظیمات</button>
							<button type="button"
								class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
								data-bs-toggle="dropdown"> <span class="visually-hidden">فهرست کشویی</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a
									class="dropdown-item" href="javascript:;">عمل</a>
								<a class="dropdown-item" href="javascript:;">عمل دیگر</a>
								<a class="dropdown-item" href="javascript:;">هر چیز دیگر اینجا</a>
								<div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">لینک
									جدا کننده</a>
							</div>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
			<form action="<?php echo route('/admin/category'); ?>" method="post">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0"><?php echo e($lang['title']); ?></h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="title" class="form-control" placeholder="<?php echo e($lang['title']); ?>"/>
									<?php if(!empty($errors['title'])): ?>
										<div class="alert-danger"><?php echo ($errors['title']['required']); ?></div>
									<?php endif; ?>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0"><?php echo e($lang['description']); ?></h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input class="form-control" name="description" placeholder="<?php echo e($lang['description']); ?>" />
									<?php if(!empty($errors['description'])): ?>
										<div class="alert-danger"><?php echo ($errors['description']['required']); ?></div>
									<?php endif; ?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" class="btn btn-primary px-4"
										   value="<?php echo e($lang['send']); ?>" />
								</div>
							</div>
						</div>
						<div>
							<?php if(!empty($errorMessage)): ?>
								<div class="alert-warning"><?php echo $errorMessage; ?></div>
							<?php endif; ?>
							<?php if(!empty($successMessage)): ?>
								<div class="alert-success"><?php echo $successMessage; ?></div>
							<?php endif; ?>

						</div>
					</div>
				</div>
			</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
				class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">کپی رایت © 2021. تمامی حقوق محفوظ است.</p>
		</footer>
	</div>
	<!--end wrapper-->
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/assets/js/jquery.min.js"></script>
	<script src="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--app JS-->
	<script src="<?php echo route(''); ?>Others/Themes/Backend/main/vertical/assets/js/app.js"></script>
</body>

</html><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/views/backend/main/layout/category/create.blade.php ENDPATH**/ ?>