<ul class="metismenu" id="menu">
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-home'></i>
            </div>
            <div class="menu-title"><?php echo e(__('navigation.home')); ?></div>
        </a>
        <ul>
            <li> <a href="index.html"><i class="bx bx-left-arrow-alt"></i><?php echo e(__('navigation.dashboard')); ?></a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-spa'></i>
            </div>
            <div class="menu-title">
                <?php echo e(__('navigation.subj-cat')); ?>

            </div>
        </a>
        <ul>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($category->status == 'approved'): ?>
                    <li>
                        <a href="<?php echo e(route('/panel/admin/categories')); ?>"><i class="bx bx-left-arrow-alt"></i><?php echo e($category->title); ?></a>
                    </li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <li> <a href="<?php echo e(route('/panel/management/categories')); ?>"><i class="bx bx-left-arrow-alt"></i><?php echo e(__('navigation.settings')); ?></a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-cart-alt'></i>
            </div>
            <div class="menu-title"><?php echo e(__('navigation.categories-management')); ?></div>
        </a>
        <ul>
            <li> <a href="<?php echo e(route('/panel/admin/categories/create')); ?>"><i class="bx bx-left-arrow-alt"></i><?php echo e(__('categories.create-category')); ?></a>
            </li>
            <li> <a href="<?php echo e(route('/panel/management/categories')); ?>"><i class="bx bx-left-arrow-alt"></i><?php echo e(__('navigation.settings')); ?></a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-cart-alt'></i>
            </div>
            <div class="menu-title"><?php echo e(__('navigation.posts-management')); ?></div>
        </a>
        <ul>
            <li> <a href="<?php echo e(route('/panel/admin/posts/create')); ?>"><i class="bx bx-left-arrow-alt"></i><?php echo e(__('posts.add-new-post')); ?></a>
            </li>
            <li> <a href="<?php echo e(route('/panel/management/posts')); ?>"><i class="bx bx-left-arrow-alt"></i><?php echo e(__('navigation.settings')); ?></a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-cart-alt'></i>
            </div>
            <div class="menu-title"><?php echo e(__('navigation.users-management')); ?></div>
        </a>
        <ul>
            <li> <a href="<?php echo e(route('/panel/management/users')); ?>"><i class="bx bx-left-arrow-alt"></i><?php echo e(__('navigation.users-list')); ?></a>
            </li>
            <li> <a href="<?php echo e(route('')); ?>"><i class="bx bx-left-arrow-alt"></i><?php echo e(__('navigation.settings')); ?></a>
            </li>
        </ul>
    </li>
    <li>
        <a href="<?php echo e(route('/panel/edit-profile')); ?>">
            <div class="parent-icon"><i class='bx bx-cart-alt'></i>
            </div>
            <div class="menu-title"><?php echo e(__('navigation.user-profile')); ?></div>
        </a>
    </li>
    <li>
        <a href="<?php echo e(route('/logout')); ?>">
            <div class="parent-icon"><i class='bx bx-user-pin'></i>
            </div>
            <div class="menu-title"><?php echo e(__('navigation.exit')); ?></div>
        </a>
    </li>
</ul><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/views/backend/main/layout/navigation.blade.php ENDPATH**/ ?>