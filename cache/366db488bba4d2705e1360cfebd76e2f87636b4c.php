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
        <a href="">
            <div class="parent-icon"><i class='bx bx-book'></i>
            </div>
            <div class="menu-title">
                <?php echo e(__('navigation.aaron-book')); ?>

            </div>
        </a>











    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-category-alt'></i>
            </div>
            <div class="menu-title"><?php echo e(__('navigation.aaron-book-management')); ?></div>
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
            <div class="parent-icon"><i class='lni lni-popup'></i>
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
            <div class="parent-icon"><i class='lni lni-users'></i>
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
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="lni lni-pencil"></i>
            </div>
            <div class="menu-title"><?php echo e(__('navigation.authors-management')); ?></div>
        </a>
        <ul>
            <li> <a href="<?php echo e(route('/panel/admin/authors/create')); ?>"><i class="bx bx-left-arrow-alt"></i><?php echo e(__('navigation.add-author')); ?></a>
            </li>
            <li> <a href="<?php echo e(route('/panel/management/authors')); ?>"><i class="bx bx-left-arrow-alt"></i><?php echo e(__('navigation.authors-list')); ?></a>
            </li>
        </ul>
    </li>
    <?php if(session_status() === PHP_SESSION_NONE): ?>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-lock-open'></i>
                </div>
                <div class="menu-title"><?php echo e(__('navigation.authentication')); ?></div>
            </a>
            <ul>
                <li> <a href="<?php echo e(route('/login')); ?>"><i class="bx bx-left-arrow-alt"></i><?php echo e(__('navigation.log-in')); ?></a>
                </li>
                <li> <a href="<?php echo e(route('/register')); ?>"><i class="bx bx-left-arrow-alt"></i><?php echo e(__('navigation.register')); ?></a>
                </li>
            </ul>
        </li>
    <?php endif; ?>
    <li>
        <a href="<?php echo e(route('/panel/edit-profile')); ?>">
            <div class="parent-icon"><i class='bx bx-user-pin'></i>
            </div>
            <div class="menu-title"><?php echo e(__('navigation.user-profile')); ?></div>
        </a>
    </li>
    <li>
        <a href="<?php echo e(route('/logout')); ?>">
            <div class="parent-icon"><i class='bx bx-log-out'></i>
            </div>
            <div class="menu-title"><?php echo e(__('navigation.exit')); ?></div>
        </a>
    </li>
</ul><?php /**PATH /Applications/MAMP/htdocs/ParsaFramework/views/backend/main/layout/navigation.blade.php ENDPATH**/ ?>