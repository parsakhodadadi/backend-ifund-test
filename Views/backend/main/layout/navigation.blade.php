<ul class="metismenu" id="menu">
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-home'></i>
            </div>
            <div class="menu-title">{{ __('navigation.home') }}</div>
        </a>
        <ul>
            <li> <a href="index.html"><i class="bx bx-left-arrow-alt"></i>{{ __('navigation.dashboard') }}</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="">
            <div class="parent-icon"><i class='bx bx-book'></i>
            </div>
            <div class="menu-title">
                {{ __('navigation.aaron-book') }}
            </div>
        </a>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-category-alt'></i>
            </div>
            <div class="menu-title">{{ __('navigation.aaron-book-management') }}</div>
        </a>
        <ul>
            <li> <a href="{{ route('/panel/admin/categories/create') }}"><i class="bx bx-left-arrow-alt"></i>{{ __('categories.create-category') }}</a>
            </li>
            <li> <a href="{{ route('/panel/management/categories') }}"><i class="bx bx-left-arrow-alt"></i>{{ __('navigation.settings') }}</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='lni lni-popup'></i>
            </div>
            <div class="menu-title">{{ __('navigation.posts-management') }}</div>
        </a>
        <ul>
            <li> <a href="{{ route('/panel/admin/posts/create') }}"><i class="bx bx-left-arrow-alt"></i>{{ __('posts.add-new-post') }}</a>
            </li>
            <li> <a href="{{ route('/panel/management/posts') }}"><i class="bx bx-left-arrow-alt"></i>{{ __('navigation.settings') }}</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='lni lni-users'></i>
            </div>
            <div class="menu-title">{{ __('navigation.users-management') }}</div>
        </a>
        <ul>
            <li> <a href="{{ route('/panel/management/users') }}"><i class="bx bx-left-arrow-alt"></i>{{ __('navigation.users-list') }}</a>
            </li>
            <li> <a href="{{ route('') }}"><i class="bx bx-left-arrow-alt"></i>{{ __('navigation.settings') }}</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class="lni lni-pencil"></i>
            </div>
            <div class="menu-title">{{ __('navigation.authors-management') }}</div>
        </a>
        <ul>
            <li> <a href="{{ route('/panel/admin/authors/create') }}"><i class="bx bx-left-arrow-alt"></i>{{ __('navigation.add-author') }}</a>
            </li>
            <li> <a href="{{ route('/panel/management/authors') }}"><i class="bx bx-left-arrow-alt"></i>{{ __('navigation.authors-list') }}</a>
            </li>
        </ul>
    </li>
    @if(session_status() === PHP_SESSION_NONE)
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-lock-open'></i>
                </div>
                <div class="menu-title">{{ __('navigation.authentication') }}</div>
            </a>
            <ul>
                <li> <a href="{{ route('/login') }}"><i class="bx bx-left-arrow-alt"></i>{{ __('navigation.log-in') }}</a>
                </li>
                <li> <a href="{{ route('/register') }}"><i class="bx bx-left-arrow-alt"></i>{{ __('navigation.register') }}</a>
                </li>
            </ul>
        </li>
    @endif
    <li>
        <a href="{{ route('/panel/edit-profile') }}">
            <div class="parent-icon"><i class='bx bx-user-pin'></i>
            </div>
            <div class="menu-title">{{ __('navigation.user-profile') }}</div>
        </a>
    </li>
    <li>
        <a href="{{ route('/logout') }}">
            <div class="parent-icon"><i class='bx bx-log-out'></i>
            </div>
            <div class="menu-title">{{ __('navigation.exit') }}</div>
        </a>
    </li>
</ul>