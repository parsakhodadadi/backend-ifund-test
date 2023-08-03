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
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-spa'></i>
            </div>
            <div class="menu-title">
                {{ __('navigation.subj-cat') }}
            </div>
        </a>
        <ul>
            @foreach($categories as $category)
                @if($category->status == 'approved')
                    <li>
                        <a href="{{ route('/panel/admin/categories') }}"><i class="bx bx-left-arrow-alt"></i>{{  $category->title }}</a>
                    </li>
                @endif
            @endforeach
            <li> <a href="{{ route('/panel/management/categories') }}"><i class="bx bx-left-arrow-alt"></i>{{  __('navigation.settings') }}</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-cart-alt'></i>
            </div>
            <div class="menu-title">{{ __('navigation.categories-management') }}</div>
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
            <div class="parent-icon"><i class='bx bx-cart-alt'></i>
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
            <div class="parent-icon"><i class='bx bx-cart-alt'></i>
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
        <a href="{{ route('/panel/edit-profile') }}">
            <div class="parent-icon"><i class='bx bx-cart-alt'></i>
            </div>
            <div class="menu-title">{{ __('navigation.user-profile') }}</div>
        </a>
    </li>
    <li>
        <a href="{{ route('/logout') }}">
            <div class="parent-icon"><i class='bx bx-user-pin'></i>
            </div>
            <div class="menu-title">{{ __('navigation.exit') }}</div>
        </a>
    </li>
</ul>