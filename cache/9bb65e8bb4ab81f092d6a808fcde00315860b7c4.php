<div class="page-wrapper">
    <div class="page-content">

        <div class="dash-wrapper bg-dark">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-5 row-cols-xxl-5">
                <div class="col border-end border-light-2">
                    <div class="card bg-transparent shadow-none mb-0">
                        <div class="card-body text-center">
                            <p class="mb-1 text-white">جلسات</p>
                            <h3 class="mb-3 text-white">876</h3>
                            <p class="font-13 text-white"><span class="text-success"><i
                                            class="lni lni-arrow-up"></i>2.1%</span> در 7 روز گذشته</p>
                            <div id="chart1"></div>
                        </div>
                    </div>
                </div>
                <div class="col border-end border-light-2">
                    <div class="card bg-transparent shadow-none mb-0">
                        <div class="card-body text-center">
                            <p class="mb-1 text-white">مجموع کاربران</p>
                            <h3 class="mb-3 text-white">4.5M</h3>
                            <p class="font-13 text-white"><span class="text-success"><i
                                            class="lni lni-arrow-up"></i> 4.2% </span> در 7 روز گذشته</p>
                            <div id="chart2"></div>
                        </div>
                    </div>
                </div>
                <div class="col border-end border-light-2">
                    <div class="card bg-transparent shadow-none mb-0">
                        <div class="card-body text-center">
                            <p class="mb-1 text-white">بازدید صفحه</p>
                            <h3 class="mb-3 text-white">64,835</h3>
                            <p class="font-13 text-white"><span class="text-danger"><i
                                            class="lni lni-arrow-down"></i> 3.6%</span> در 7 روز گذشته</p>
                            <div id="chart3"></div>
                        </div>
                    </div>
                </div>
                <div class="col border-end border-light-2">
                    <div class="card bg-transparent shadow-none mb-0">
                        <div class="card-body text-center">
                            <p class="mb-1 text-white">نرخ پیشرفت</p>
                            <h3 class="mb-3 text-white">42.68%</h3>
                            <p class="font-13 text-white"><span class="text-success"><i
                                            class="lni lni-arrow-up"></i> 2.5%</span> در 7 روز گذشته</p>
                            <div id="chart4"></div>
                        </div>
                    </div>
                </div>
                <div class="col col-md-12">
                    <div class="card bg-transparent shadow-none mb-0">
                        <div class="card-body text-center">
                            <p class="mb-1 text-white">میانگین زمان جلسه</p>
                            <h3 class="mb-3 text-white">00:04:60</h3>
                            <p class="font-13 text-white"><span class="text-danger"><i
                                            class="lni lni-arrow-down"></i> 5.2%</span> در 7 روز گذشته</p>
                            <div id="chart5"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>

        <div class="row row-cols-1 row-cols-xl-2">
            <div class="col d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">گزارش فروش</h6>
                            </div>
                            <div class="dropdown ms-auto">
                                <button class="btn btn-white btn-sm radius-10 dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    این ماه
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="#">این هفته</a></li>
                                    <li><a class="dropdown-item" href="#">این ماه</a></li>
                                    <li><a class="dropdown-item" href="#">امسال</a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="chart6"></div>
                    </div>
                </div>
            </div>
            <div class="col d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">وضعیت بازدیدکننده</h6>
                            </div>
                            <div class="d-flex align-items-center ms-auto font-13 gap-2">
										<span class="border px-1 rounded cursor-pointer"><i
                                                    class='bx bxs-circle text-primary me-1'></i>بازدیدکننده جدید</span>
                                <span class="border px-1 rounded cursor-pointer"><i
                                            class='bx bxs-circle text-sky-light me-1'></i>بازدیدکننده قدیمی</span>
                            </div>
                        </div>
                        <div id="chart7"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->

        <div class="row">
            <div class="col-12 col-lg-8 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">نقشه جغرافیایی</h6>
                            </div>
                            <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                            </div>
                        </div>
                        <div class="" id="geographic-map"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">فروش در هر کشور</h6>
                            </div>
                            <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-top-countries mb-3 p-3">

                        <div class="row mb-4">
                            <div class="col-2">
                                <img src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/images/icons/united-states.png" width="42" alt="">
                            </div>
                            <div class="col">
                                <p class="mb-2">آمریکا <strong class="float-end">445,85</strong></p>
                                <div class="progress radius-10" style="height:6px;">
                                    <div class="progress-bar bg-gradient-blues" role="progressbar"
                                         style="width: 86%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-2">
                                <img src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/images/icons/germany.png" width="42" alt="">
                            </div>
                            <div class="col">
                                <p class="mb-2">آلمان <strong class="float-end">683,46</strong></p>
                                <div class="progress radius-10" style="height:6px;">
                                    <div class="progress-bar bg-gradient-cosmic" role="progressbar"
                                         style="width: 66%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-2">
                                <img src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/images/icons/canada.png" width="42" alt="">
                            </div>
                            <div class="col">
                                <p class="mb-2">کانادا <strong class="float-end">982,43</strong></p>
                                <div class="progress radius-10" style="height:6px;">
                                    <div class="progress-bar bg-gradient-burning" role="progressbar"
                                         style="width: 56%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-2">
                                <img src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/images/icons/india.png" width="42" alt="">
                            </div>
                            <div class="col">
                                <p class="mb-2">هند <strong class="float-end">852,35</strong></p>
                                <div class="progress radius-10" style="height:6px;">
                                    <div class="progress-bar bg-gradient-lush" role="progressbar"
                                         style="width: 45%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-2">
                                <img src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/images/icons/netherlands.png" width="42" alt="">
                            </div>
                            <div class="col">
                                <p class="mb-2">هلند <strong class="float-end">785,24</strong></p>
                                <div class="progress radius-10" style="height:6px;">
                                    <div class="progress-bar bg-gradient-kyoto" role="progressbar"
                                         style="width: 38%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-2">
                                <img src="<?php echo e(route('Others/Themes/Backend/main/vertical/')); ?>assets/images/icons/malaysia.png" width="42" alt="">
                            </div>
                            <div class="col">
                                <p class="mb-2">مالزی <strong class="float-end">387,56</strong></p>
                                <div class="progress radius-10" style="height:6px;">
                                    <div class="progress-bar bg-gradient-moonlit" role="progressbar"
                                         style="width: 28%"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--end row-->

        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
            <div class="col d-flex">
                <div class="card radius-10 p-0 w-100 bg-transparent shadow-none">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0">جلسات جدید</p>
                                    <h5 class="mb-0">54.6%</h5>
                                </div>
                                <div class="widgets-icons bg-light-primary text-primary ms-auto"><i
                                            class="bx bxs-cookie"></i></div>
                            </div>
                            <div id="chart8"></div>
                        </div>
                    </div>
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0">میانگین بازدید صفحات</p>
                                    <h5 class="mb-0">38.5%</h5>
                                </div>
                                <div class="widgets-icons bg-light-danger text-danger ms-auto"><i
                                            class="bx bxs-bookmark-alt-plus"></i></div>
                            </div>
                            <div id="chart9"></div>
                        </div>
                    </div>
                    <div class="card radius-10 mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0">دانلود ها</p>
                                    <h5 class="mb-0">24.5K</h5>
                                </div>
                                <div class="widgets-icons bg-light-success text-success ms-auto"><i
                                            class="bx bxs-cloud-download"></i></div>
                            </div>
                            <div id="chart10"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">آمار جهانی</h6>
                            </div>
                            <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                            </div>
                        </div>
                        <div id="chart11"></div>
                        <div class="row align-items-center py-2">
                            <div class="col-auto">
                                <p class="mb-0">فروش ها</p>
                            </div>
                            <div class="col-auto">
                                <p class="mb-0">1580</p>
                            </div>
                            <div class="col-auto">
                                <p class="mb-0">875</p>
                            </div>
                            <div class="col">
                                <div class="progress radius-10 mb-0" style="height:6px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 85%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->

                        <div class="row align-items-center py-2">
                            <div class="col-auto">
                                <p class="mb-0">کاربران</p>
                            </div>
                            <div class="col-auto">
                                <p class="mb-0">1852</p>
                            </div>
                            <div class="col-auto">
                                <p class="mb-0">356</p>
                            </div>
                            <div class="col">
                                <div class="progress radius-10 mb-0" style="height:6px;">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 65%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->

                        <div class="row align-items-center py-2">
                            <div class="col-auto">
                                <p class="mb-0">بازدیدکنندگان</p>
                            </div>
                            <div class="col-auto">
                                <p class="mb-0">1280</p>
                            </div>
                            <div class="col-auto">
                                <p class="mb-0">867</p>
                            </div>
                            <div class="col">
                                <div class="progress radius-10 mb-0" style="height:6px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 45%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
            <div class="col col-lg-12 d-flex">
                <div class="card radius-10 p-0 w-100 p-3">
                    <div class="card radius-10 shadow-none bg-transparent border">
                        <div class="card-body">
                            <div
                                    class="d-flex align-items-center justify-content-center justify-content-lg-start">
                                <div id="chart12"></div>
                                <div class="">
                                    <p class="mb-0 d-flex align-items-center"><i
                                                class='bx bx-male text-danger fs-4'></i><span
                                                class="mx-2">مرد</span><span>65%</span></p>
                                    <p class="mb-0 d-flex align-items-center"><i
                                                class='bx bx-female text-primary fs-4'></i><span
                                                class="mx-2">زن</span><span>35%</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card radius-10 mb-0 shadow-none bg-transparent mb-0 border">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <div>
                                    <h6 class="mb-0">نوع دستگاه</h6>
                                </div>
                                <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                                </div>
                            </div>
                            <div class="row row-cols-3 g-3">
                                <div class="col">
                                    <div class="d-flex gap-2">
                                        <h4 class="mb-1 d-flex">61 <span class="align-self-start fs-6">%</span>
                                        </h4>
                                        <p class="mb-0 align-self-center text-success">(+8.4%)</p>
                                    </div>
                                    <p class="mb-0 d-flex align-items-center"><i
                                                class='bx bxs-circle text-info fs-6'></i><span
                                                class="mx-2">اندروید</span></p>
                                </div>
                                <div class="col">
                                    <div class="d-flex gap-2">
                                        <h4 class="mb-1 d-flex">28 <span class="align-self-start fs-6">%</span>
                                        </h4>
                                        <p class="mb-0 align-self-center text-danger">(-1.9%)</p>
                                    </div>
                                    <p class="mb-0 d-flex align-items-center"><i
                                                class='bx bxs-circle text-success fs-6'></i><span
                                                class="mx-2">iOS</span></p>
                                </div>
                                <div class="col">
                                    <div class="d-flex gap-2">
                                        <h4 class="mb-1 d-flex">11 <span class="align-self-start fs-6">%</span>
                                        </h4>
                                        <p class="mb-0 align-self-center text-success">(+6.8%)</p>
                                    </div>
                                    <p class="mb-0 d-flex align-items-center"><i
                                                class='bx bxs-circle text-warning fs-6'></i><span
                                                class="mx-2">دیگر</span></p>
                                </div>
                            </div>

                            <div class="progress radius-10 mt-4" style="height: 10px">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 45%"
                                     aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-success" role="progressbar" style="width: 30%"
                                     aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 25%"
                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->

        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card radius-10">
                    <div class="card-body">
                        <div id="chart13"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="card radius-10">
                    <div class="card-body">
                        <div id="chart14"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
</div><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/views/Backend/main/layout/page-wrapper.blade.php ENDPATH**/ ?>