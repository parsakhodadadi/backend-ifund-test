<ul class="metismenu" id="menu">
    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bx-home'></i>
            </div>
            <div class="menu-title">{{ __('navigation.home') }}</div>
        </a>
        <ul>
            <li><a href="{{ route('/') }}"><i class="bx bx-left-arrow-alt"></i>{{ __('navigation.dashboard') }}</a>
            </li>
        </ul>
    </li>
    @if(!empty($user))
        @if($user->user_type != 'user')
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="lni lni-popup"></i>
                    </div>
                    <div class="menu-title">
                        {{ __('navigation.posts') }}
                    </div>
                </a>
                <ul>
                    <li><a href="{{ route('/panel/add-post') }}"><i class="bx bx-left-arrow-alt"></i>
                            {{ __('navigation.add-post') }}
                        </a>
                    </li>
                    <li><a href="{{ route('/panel/my-posts') }}"><i class="bx bx-left-arrow-alt"></i>
                            {{ __('navigation.my-posts') }}
                        </a>
                    </li>
                    @if($user->user_type == 'fulladmin')
                        <li><a href="{{ route('/panel/posts-management') }}"><i class="bx bx-left-arrow-alt"></i>
                                {{ __('navigation.posts-management') }}
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
    @endif
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"><i class='bx bx-book'></i>
            </div>
            <div class="menu-title">
                {{ __('navigation.aaron-book') }}
            </div>
        </a>
        <ul>
            <li><a class="has-arrow" href="javascript:;"><i class="bx bx-left-arrow-alt"></i>
                    {{ __('navigation.books-introduce') }}
                </a>
                <ul>
                    @if(!empty($user))
                        <li><a href="{{ route('/panel/add-book') }}"><i class="bx bx-left-arrow-alt"></i>
                                {{ __('navigation.add-book') }}
                            </a>
                        </li>
                        <li><a href="{{ route('/panel/my-books') }}"><i class="bx bx-left-arrow-alt"></i>
                                {{ __('navigation.my-books') }}
                            </a>
                        </li>
                        @if($user->user_type == 'fulladmin')
                            <li><a href="{{ route('/panel/books-management') }}"><i class="bx bx-left-arrow-alt"></i>
                                    {{ __('navigation.books-management') }}
                                </a>
                            </li>
                        @endif
                    @endif
                    <li><a class="has-arrow" href="javascript:;"><i class="bx bx-left-arrow-alt"></i>
                            {{ __('navigation.cats') }}
                        </a>
                        <ul>
                            @foreach($categories as $category)
                                <li><a href="javascript:;"><i class="bx bx-left-arrow-alt"></i>
                                        {{ $category->title }}
                                    </a>
                                </li>
                            @endforeach
                            @if(!empty($user))
                                @if($user->user_type != 'user')
                                    <li><a href="{{ route('/panel/add-category') }}"><i
                                                    class="bx bx-left-arrow-alt"></i>
                                            {{ __('navigation.add-category') }}
                                        </a>
                                    </li>
                                    <li><a href="{{ route('/panel/my-categories') }}"><i
                                                    class="bx bx-left-arrow-alt"></i>
                                            {{ __('navigation.my-categories') }}
                                        </a>
                                    </li>
                                    @if($user->user_type == 'fulladmin')
                                        <li><a href="{{ route('/panel/categories-management') }}"><i
                                                        class="bx bx-left-arrow-alt"></i>
                                                {{ __('navigation.categories-management') }}
                                            </a>
                                        </li>
                                    @endif
                                @endif
                            @endif
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:;"><i class="bx bx-left-arrow-alt"></i>
                            {{ __('navigation.authors') }}
                        </a>
                        <ul>
                            @foreach($authors as $author)
                                <li><a href="javascript:;"><i class="bx bx-left-arrow-alt"></i>
                                        {{ $author->name }}
                                    </a>
                                </li>
                            @endforeach
                            @if(!empty($user))
                                <li><a href="{{ route('/panel/add-author') }}"><i class="bx bx-left-arrow-alt"></i>
                                        {{ __('navigation.add-author') }}
                                    </a>
                                </li>
                                <li><a href="{{ route('/panel/my-authors') }}"><i class="bx bx-left-arrow-alt"></i>
                                        {{ __('navigation.my-authors') }}
                                    </a>
                                </li>
                                @if($user->user_type == 'fulladmin')
                                    <li><a href="{{ route('/panel/authors-management') }}"><i
                                                    class="bx bx-left-arrow-alt"></i>
                                            {{ __('navigation.authors-management') }}
                                        </a>
                                    </li>
                                @endif
                            @endif
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="{{ route('/book-land') }}"><i class="bx bx-left-arrow-alt"></i>
                    {{ __('navigation.book-land') }}
                </a>
            </li>
        </ul>
    </li>
    @if(!empty($user))
        @if($user->user_type != 'user')
            <li>
                <a href="{{ route('/panel/users-management') }}">
                    <div class="parent-icon"><i class='lni lni-users'></i>
                    </div>
                    <div class="menu-title">{{ __('navigation.users-management') }}</div>
                </a>
            </li>
        @endif
    @endif
    @if(empty($user))
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-lock-open'></i>
                </div>
                <div class="menu-title">{{ __('navigation.authentication') }}</div>
            </a>
            <ul>
                <li><a href="{{ route('/login') }}"><i class="bx bx-left-arrow-alt"></i>{{ __('navigation.log-in') }}
                    </a>
                </li>
                <li><a href="{{ route('/register') }}"><i
                                class="bx bx-left-arrow-alt"></i>{{ __('navigation.register') }}</a>
                </li>
            </ul>
        </li>
    @endif
    @if(!empty($user))
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-user-pin'></i>
                </div>
                <div class="menu-title">{{ __('navigation.profile') }}</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('/panel/edit-profile') }}">
                        <div class="parent-icon"><i class='bx bx-left-arrow-alt'></i>
                        </div>
                        <div class="menu-title">{{ __('navigation.edit-profile') }}</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('/panel/change-password') }}">
                        <div class="parent-icon"><i class='bx bx-left-arrow-alt'></i>
                        </div>
                        <div class="menu-title">{{ __('navigation.change-password') }}</div>
                    </a>
                </li>
            </ul>
        </li>
    @endif
    <li>
        <a href="{{ route('/contact-us') }}">
            <div class="parent-icon"><i class='bx bx-phone-call'></i>
            </div>
            <div class="menu-title">{{ __('navigation.contact-us') }}</div>
        </a>
    </li>
    <li>
        <a href="{{ route('/about-us') }}">
            <div class="parent-icon"><i class='bx bx-info-circle'></i>
            </div>
            <div class="menu-title">{{ __('navigation.about-us') }}</div>
        </a>
    </li>
    @if(!empty($user))
        <li>
            <a href="{{ route('/logout') }}">
                <div class="parent-icon"><i class='bx bx-log-out'></i>
                </div>
                <div class="menu-title">{{ __('navigation.exit') }}</div>
            </a>
        </li>
    @endif
</ul>