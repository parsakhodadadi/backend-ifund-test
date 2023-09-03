<ul class="metismenu" id="menu">
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-home'></i>
            </div>
            <div class="menu-title"><?php echo e(__('navigation.home')); ?></div>
        </a>
        <ul>
            <li><a href="<?php echo e(route('/')); ?>"><i class="bx bx-left-arrow-alt"></i><?php echo e(__('navigation.dashboard')); ?></a>
            </li>
        </ul>
    </li>
    <?php if(!empty($user)): ?>
        <?php if($user->user_type != 'user'): ?>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="lni lni-popup"></i>
                    </div>
                    <div class="menu-title">
                        <?php echo e(__('navigation.posts')); ?>

                    </div>
                </a>
                <ul>
                    <li><a href="<?php echo e(route('/panel/add-post')); ?>"><i class="bx bx-left-arrow-alt"></i>
                            <?php echo e(__('navigation.add-post')); ?>

                        </a>
                    </li>
                    <li><a href="<?php echo e(route('/panel/my-posts')); ?>"><i class="bx bx-left-arrow-alt"></i>
                            <?php echo e(__('navigation.my-posts')); ?>

                        </a>
                    </li>
                    <?php if($user->user_type == 'fulladmin'): ?>
                        <li><a href="<?php echo e(route('/panel/posts-management')); ?>"><i class="bx bx-left-arrow-alt"></i>
                                <?php echo e(__('navigation.posts-management')); ?>

                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>
    <?php endif; ?>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class='bx bx-book'></i>
            </div>
            <div class="menu-title">
                <?php echo e(__('navigation.aaron-book')); ?>

            </div>
        </a>
        <ul>
            <li><a class="has-arrow" href="javascript:;"><i class="bx bx-left-arrow-alt"></i>
                    <?php echo e(__('navigation.books-introduce')); ?>

                </a>
                <ul>
                    <?php if(!empty($user)): ?>
                        <li><a href="<?php echo e(route('/panel/add-book')); ?>"><i class="bx bx-left-arrow-alt"></i>
                                <?php echo e(__('navigation.add-book')); ?>

                            </a>
                        </li>
                        <li><a href="<?php echo e(route('/panel/my-books')); ?>"><i class="bx bx-left-arrow-alt"></i>
                                <?php echo e(__('navigation.my-books')); ?>

                            </a>
                        </li>
                        <?php if($user->user_type == 'fulladmin'): ?>
                            <li><a href="<?php echo e(route('/panel/books-management')); ?>"><i class="bx bx-left-arrow-alt"></i>
                                    <?php echo e(__('navigation.books-management')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                    <li><a class="has-arrow" href="javascript:;"><i class="bx bx-left-arrow-alt"></i>
                            <?php echo e(__('navigation.cats')); ?>

                        </a>
                        <ul>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="javascript:;"><i class="bx bx-left-arrow-alt"></i>
                                        <?php echo e($category->title); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!empty($user)): ?>
                                <?php if($user->user_type != 'user'): ?>
                                    <li><a href="<?php echo e(route('/panel/add-category')); ?>"><i
                                                    class="bx bx-left-arrow-alt"></i>
                                            <?php echo e(__('navigation.add-category')); ?>

                                        </a>
                                    </li>
                                    <li><a href="<?php echo e(route('/panel/my-categories')); ?>"><i
                                                    class="bx bx-left-arrow-alt"></i>
                                            <?php echo e(__('navigation.my-categories')); ?>

                                        </a>
                                    </li>
                                    <?php if($user->user_type == 'fulladmin'): ?>
                                        <li><a href="<?php echo e(route('/panel/categories-management')); ?>"><i
                                                        class="bx bx-left-arrow-alt"></i>
                                                <?php echo e(__('navigation.categories-management')); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:;"><i class="bx bx-left-arrow-alt"></i>
                            <?php echo e(__('navigation.authors')); ?>

                        </a>
                        <ul>
                            <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="javascript:;"><i class="bx bx-left-arrow-alt"></i>
                                        <?php echo e($author->name); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!empty($user)): ?>
                                <li><a href="<?php echo e(route('/panel/add-author')); ?>"><i class="bx bx-left-arrow-alt"></i>
                                        <?php echo e(__('navigation.add-author')); ?>

                                    </a>
                                </li>
                                <li><a href="<?php echo e(route('/panel/my-authors')); ?>"><i class="bx bx-left-arrow-alt"></i>
                                        <?php echo e(__('navigation.my-authors')); ?>

                                    </a>
                                </li>
                                <?php if($user->user_type == 'fulladmin'): ?>
                                    <li><a href="<?php echo e(route('/panel/authors-management')); ?>"><i
                                                    class="bx bx-left-arrow-alt"></i>
                                            <?php echo e(__('navigation.authors-management')); ?>

                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="<?php echo e(route('/book-land')); ?>"><i class="bx bx-left-arrow-alt"></i>
                    <?php echo e(__('navigation.book-land')); ?>

                </a>
            </li>
        </ul>
    </li>
    <?php if(!empty($user)): ?>
        <?php if($user->user_type != 'user'): ?>
            <li>
                <a href="<?php echo e(route('/panel/users-management')); ?>">
                    <div class="parent-icon"><i class='lni lni-users'></i>
                    </div>
                    <div class="menu-title"><?php echo e(__('navigation.users-management')); ?></div>
                </a>
            </li>
        <?php endif; ?>
    <?php endif; ?>
    <?php if(empty($user)): ?>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-lock-open'></i>
                </div>
                <div class="menu-title"><?php echo e(__('navigation.authentication')); ?></div>
            </a>
            <ul>
                <li><a href="<?php echo e(route('/login')); ?>"><i class="bx bx-left-arrow-alt"></i><?php echo e(__('navigation.log-in')); ?>

                    </a>
                </li>
                <li><a href="<?php echo e(route('/register')); ?>"><i
                                class="bx bx-left-arrow-alt"></i><?php echo e(__('navigation.register')); ?></a>
                </li>
            </ul>
        </li>
    <?php endif; ?>
    <?php if(!empty($user)): ?>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-user-pin'></i>
                </div>
                <div class="menu-title"><?php echo e(__('navigation.profile')); ?></div>
            </a>
            <ul>
                <li>
                    <a href="<?php echo e(route('/panel/edit-profile')); ?>">
                        <div class="parent-icon"><i class='bx bx-left-arrow-alt'></i>
                        </div>
                        <div class="menu-title"><?php echo e(__('navigation.edit-profile')); ?></div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('/panel/change-password')); ?>">
                        <div class="parent-icon"><i class='bx bx-left-arrow-alt'></i>
                        </div>
                        <div class="menu-title"><?php echo e(__('navigation.change-password')); ?></div>
                    </a>
                </li>
            </ul>
        </li>
    <?php endif; ?>
    <li>
        <a href="<?php echo e(route('/contact-us')); ?>">
            <div class="parent-icon"><i class='bx bx-phone-call'></i>
            </div>
            <div class="menu-title"><?php echo e(__('navigation.contact-us')); ?></div>
        </a>
    </li>
    <li>
        <a href="<?php echo e(route('/about-us')); ?>">
            <div class="parent-icon"><i class='bx bx-info-circle'></i>
            </div>
            <div class="menu-title"><?php echo e(__('navigation.about-us')); ?></div>
        </a>
    </li>
    <?php if(!empty($user)): ?>
        <li>
            <a href="<?php echo e(route('/logout')); ?>">
                <div class="parent-icon"><i class='bx bx-log-out'></i>
                </div>
                <div class="menu-title"><?php echo e(__('navigation.exit')); ?></div>
            </a>
        </li>
    <?php endif; ?>
</ul><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/views/backend/main/layout/navigation.blade.php ENDPATH**/ ?>