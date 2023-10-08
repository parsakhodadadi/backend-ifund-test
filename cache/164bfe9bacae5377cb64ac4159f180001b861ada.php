<section class="position-relative">
    <div class="container" data-sticky-container>
        <div class="row">
            <!-- Main Post START -->
            <div class="col-lg-9">
                <!-- Title -->
                <div class="mb-4">
                    <h2 class="m-0"><i class="bi bi-hourglass-top me-2"></i><?php echo e(__('main-front.posts')); ?></h2>
                    <p>آخرین اخبار، تصاویر، فیلم ها و گزارش های ویژه</p>
                </div>
                <div class="row gy-4">
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- Card item START -->
                        <div class="col-sm-6">
                            <div class="card">
                                <!-- Card img -->
                                <div class="position-relative">
                                    <img class="card-img" src="<?php echo e(route('/') . $post->photo); ?>" alt="Card image">
                                    <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                        <!-- Card overlay bottom -->
                                        <div class="w-100 mt-auto">
                                            <!-- Card category -->
                                            <a href="#" class="badge text-bg-warning mb-2"><i class="fas fa-circle me-2 small fw-bold"></i><?php echo e(current($categories->get(['id' => $post->post_category_id]))->title); ?></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pt-3">
                                    <!-- Sponsored Post -->
                                    <a href="#!" class="mb-0 text-body small" tabindex="0" role="button" data-bs-container="body" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-placement="top" data-bs-content="شما این تبلیغ را می بینید زیرا فعالیت شما با مخاطبان مورد نظر سایت ما مطابقت دارد.">
                                        <i class="bi bi-info-circle ps-1"></i> ویژه
                                    </a>
                                    <h4 class="card-title mt-2"><a href="<?php echo e(route('/posts/') . $post->id . '/add-comment'); ?>" class="btn-link text-reset"><?php echo e($post->title); ?></a></h4>
                                    <p class="card-text"><?php echo e($post->short_description); ?></p>
                                    <!-- Card info -->
                                    <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                        <li class="nav-item">
                                            <div class="nav-link">
                                                <div class="d-flex align-items-center position-relative">
                                                    <div class="avatar avatar-xs">
                                                        <img class="avatar-img rounded-circle" src="<?php echo e(route('/') . current($users->get(['id' => $post->user_id]))->photo); ?>" alt="avatar">
                                                    </div>
                                                    <span class="ms-3"><?php echo e(__('main-front.by')); ?> <a href="#" class="stretched-link text-reset btn-link"><?php echo e(current($users->get(['id' => $post->user_id]))->first_name); ?>  <?php echo e(current($users->get(['id' => $post->user_id]))->last_name); ?></a></span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item"><?php echo e($post->time . ' ' . $post->date); ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Card item END -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- Load more START -->



                    <!-- Load more END -->
                </div>
            </div>
            <!-- Main Post END -->
            <!-- Sidebar START -->
            <div class="col-lg-3 mt-5 mt-lg-0">
                <div data-sticky data-margin-top="80" data-sticky-for="767">

                    <!-- Social widget START -->

























                    <!-- Trending topics widget START -->





































                    <!-- Trending topics widget END -->

































































                </div>
            </div>
            <!-- Sidebar END -->
        </div> <!-- Row end -->
    </div>
</section><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/views/frontend/main/posts.blade.php ENDPATH**/ ?>