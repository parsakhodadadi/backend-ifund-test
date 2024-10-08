<section class="position-relative">
    <div class="container" data-sticky-container>
        <div class="row">
            <!-- Main Post START -->
            <div class="col-lg-12">
                <!-- Title -->
                <div class="mb-4">
                    <h2 class="m-0"><i class="bi bi-hourglass-top me-2"></i>{{ __('main-front.posts') }}</h2>
                    <p>مجله ارون</p>
                </div>
                <div class="row gy-4">
                    @foreach($posts as $post)
                        <!-- Card item START -->
                        <div class="col-sm-6">
                            <div class="card">
                                <!-- Card img -->
                                <div class="position-relative">
                                    <img class="card-img" src="{{ route('/') . $post->photo }}" alt="Card image">
                                    <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                        <!-- Card overlay bottom -->
                                        <div class="w-100 mt-auto">
                                            <!-- Card category -->
                                            <a href="#" class="badge text-bg-warning mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>{{ current($categories->get(['id' => $post->post_category_id]))->title }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pt-3">
                                    <h4 class="card-title mt-2"><a href="{{ route('/posts/') . $post->id . '/add-comment' }}" class="btn-link text-reset">{{ $post->title }}</a></h4>
                                    <p class="card-text">{{ $post->short_description  }}</p>
                                    <!-- Card info -->
                                    <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <div class="d-flex align-items-center position-relative">
                                                    <div class="avatar avatar-xs">
                                                        <img class="avatar-img rounded-circle" src="{{ route('/') . current($users->get(['id' => $post->user_id]))->photo }}" alt="avatar">
                                                    </div>
                                                    <span class="ms-3">{{ __('main-front.by') }} <a href="#" class="stretched-link text-reset btn-link">{{ current($users->get(['id' => $post->user_id]))->first_name }}  {{ current($users->get(['id' => $post->user_id]))->last_name }}</a></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">{{ $post->time . ' ' . $post->date }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Card item END -->
                    @endforeach
                    <!-- Load more START -->
{{--                    <div class="col-12 text-center mt-5">--}}
{{--                        <button type="button" class="btn btn-primary-soft">مشاهده بیشتر <i class="bi bi-arrow-down-circle ms-2 align-middle"></i></button>--}}
{{--                    </div>--}}
                    <!-- Load more END -->
                </div>
            </div>
            <!-- Main Post END -->
            <!-- Sidebar START -->
{{--            <div class="col-lg-3 mt-5 mt-lg-0">--}}
{{--                <div data-sticky data-margin-top="80" data-sticky-for="767">--}}

                    <!-- Social widget START -->
{{--                    <div class="row g-2">--}}
{{--                        <div class="col-4">--}}
{{--                            <a href="#" class="bg-facebook rounded text-center text-white-force p-3 d-block">--}}
{{--                                <i class="fab fa-facebook-square fs-5 mb-2"></i>--}}
{{--                                <h6 class="m-0">1.5K</h6>--}}
{{--                                <span class="small">طرفدار</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="col-4">--}}
{{--                            <a href="#" class="bg-instagram-gradient rounded text-center text-white-force p-3 d-block">--}}
{{--                                <i class="fab fa-instagram fs-5 mb-2"></i>--}}
{{--                                <h6 class="m-0">1.8M</h6>--}}
{{--                                <span class="small">حامیان</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="col-4">--}}
{{--                            <a href="#" class="bg-youtube rounded text-center text-white-force p-3 d-block">--}}
{{--                                <i class="fab fa-youtube-square fs-5 mb-2"></i>--}}
{{--                                <h6 class="m-0">22K</h6>--}}
{{--                                <span class="small">بازدید</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- Social widget END -->--}}

                    <!-- Trending topics widget START -->
{{--                    <div>--}}
{{--                        <h4 class="mt-4 mb-3">برگزیده ها</h4>--}}
{{--                        <!-- Category item -->--}}
{{--                        <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded bg-dark-overlay-4 " style="background-image:url({{ route('/Others/Themes/Frontend/Theme/assets/images/') }}blog/4by3/01.jpg); background-position: center left; background-size: cover;">--}}
{{--                            <div class="p-3">--}}
{{--                                <a href="#" class="stretched-link btn-link text-white h5">گردشگری</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- Category item -->--}}
{{--                        <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded" style="background-image:url({{ route('/Others/Themes/Frontend/Theme/assets/images/') }}blog/4by3/02.jpg); background-position: center left; background-size: cover;">--}}
{{--                            <div class="bg-dark-overlay-4 p-3">--}}
{{--                                <a href="#" class="stretched-link btn-link text-white h5">اقتصاد</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- Category item -->--}}
{{--                        <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded" style="background-image:url({{ route('/Others/Themes/Frontend/Theme/assets/images/') }}blog/4by3/03.jpg); background-position: center left; background-size: cover;">--}}
{{--                            <div class="bg-dark-overlay-4 p-3">--}}
{{--                                <a href="#" class="stretched-link btn-link text-white h5">فرهنگ</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- Category item -->--}}
{{--                        <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded" style="background-image:url({{ route('/Others/Themes/Frontend/Theme/assets/images/') }}blog/4by3/04.jpg); background-position: center left; background-size: cover;">--}}
{{--                            <div class="bg-dark-overlay-4 p-3">--}}
{{--                                <a href="#" class="stretched-link btn-link text-white h5">تکنولوژی</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- Category item -->--}}
{{--                        <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded" style="background-image:url({{ route('/Others/Themes/Frontend/Theme/assets/images/') }}blog/4by3/05.jpg); background-position: center left; background-size: cover;">--}}
{{--                            <div class="bg-dark-overlay-4 p-3">--}}
{{--                                <a href="#" class="stretched-link btn-link text-white h5">ورزش</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- View All Category button -->--}}
{{--                        <div class="text-center mt-3">--}}
{{--                            <a href="#" class="text-body text-primary-hover"><u>مشاهده همه</u></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <!-- Trending topics widget END -->

{{--                    <div class="row">--}}
{{--                        <!-- Recent post widget START -->--}}
{{--                        <div class="col-12 col-sm-6 col-lg-12">--}}
{{--                            <h4 class="mt-4 mb-3">پربحث ها</h4>--}}
{{--                            <!-- Recent post item -->--}}
{{--                            <div class="card mb-3">--}}
{{--                                <div class="row g-3">--}}
{{--                                    <div class="col-4">--}}
{{--                                        <img class="rounded" src="{{ route('/Others/Themes/Frontend/Theme/assets/images/') }}blog/4by3/thumb/01.jpg" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-8">--}}
{{--                                        <h6><a href="{{ route('/Others/Themes/Frontend/Theme/') }}post-single-2.html" class="btn-link stretched-link text-reset">خرید و فروش ارز در کانال 37 هزار تومانی</a></h6>--}}
{{--                                        <div class="small mt-1">17 بهمن، 1400</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- Recent post item -->--}}
{{--                            <div class="card mb-3">--}}
{{--                                <div class="row g-3">--}}
{{--                                    <div class="col-4">--}}
{{--                                        <img class="rounded" src="{{ route('/Others/Themes/Frontend/Theme/assets/images/') }}blog/4by3/thumb/02.jpg" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-8">--}}
{{--                                        <h6><a href="{{ route('/Others/Themes/Frontend/Theme/') }}post-single-2.html" class="btn-link stretched-link text-reset">کاهش 192 هزار میلیارد تومانی بدهی دولت</a></h6>--}}
{{--                                        <div class="small mt-1">4 مهر، 1400</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- Recent post item -->--}}
{{--                            <div class="card mb-3">--}}
{{--                                <div class="row g-3">--}}
{{--                                    <div class="col-4">--}}
{{--                                        <img class="rounded" src="{{ route('/Others/Themes/Frontend/Theme/assets/images/') }}blog/4by3/thumb/03.jpg" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-8">--}}
{{--                                        <h6><a href="{{ route('/Others/Themes/Frontend/Theme/') }}post-single-2.html" class="btn-link stretched-link text-reset">ساخت مسکن موتور محرک کاهش تورم</a></h6>--}}
{{--                                        <div class="small mt-1">30 تیر، 1400</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- Recent post item -->--}}
{{--                            <div class="card mb-3">--}}
{{--                                <div class="row g-3">--}}
{{--                                    <div class="col-4">--}}
{{--                                        <img class="rounded" src="{{ route('/Others/Themes/Frontend/Theme/assets/images/') }}blog/4by3/thumb/04.jpg" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-8">--}}
{{--                                        <h6><a href="{{ route('/Others/Themes/Frontend/Theme/') }}post-single-2.html" class="btn-link stretched-link text-reset">آشنایی با کلید موفقیت نهضت ملی مسکن‌</a></h6>--}}
{{--                                        <div class="small mt-1">29 دی 1400</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- Recent post widget END -->--}}

{{--                        <!-- ADV widget START -->--}}
{{--                        <div class="col-12 col-sm-6 col-lg-12 my-4">--}}
{{--                            <a href="#" class="d-block card-img-flash">--}}
{{--                                <img src="{{ route('/Others/Themes/Frontend/Theme/assets/images/') }}adv.png" alt="">--}}
{{--                            </a>--}}
{{--                            <div class="smaller text-end mt-2">تبلیغ در سایت <a href="#" class="text-body"><u>انتخاب</u></a></div>--}}
{{--                        </div>--}}
{{--                        <!-- ADV widget END -->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <!-- Sidebar END -->
        </div> <!-- Row end -->
    </div>
</section>