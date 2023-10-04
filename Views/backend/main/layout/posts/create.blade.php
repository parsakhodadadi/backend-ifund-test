<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <title>Blogzine - قالب HTML مجله خبری و وبلاگ</title>

    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Blogzine">
    <meta name="description" content="قالب وبلاگ و مجله خبری مبتنی بر بوت استرپ">

    <!-- Dark mode -->
    <script>
        const storedTheme = localStorage.getItem('theme')

        const getPreferredTheme = () => {
            if (storedTheme) {
                return storedTheme
            }
            return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
        }

        const setTheme = function (theme) {
            if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.setAttribute('data-bs-theme', 'dark')
            } else {
                document.documentElement.setAttribute('data-bs-theme', theme)
            }
        }

        setTheme(getPreferredTheme())

        window.addEventListener('DOMContentLoaded', () => {
            var el = document.querySelector('.theme-icon-active');
            if (el != 'undefined' && el != null) {
                const showActiveTheme = theme => {
                    const activeThemeIcon = document.querySelector('.theme-icon-active use')
                    const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
                    const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

                    document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
                        element.classList.remove('active')
                    })

                    btnToActive.classList.add('active')
                    activeThemeIcon.setAttribute('href', svgOfActiveBtn)
                }

                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                    if (storedTheme !== 'light' || storedTheme !== 'dark') {
                        setTheme(getPreferredTheme())
                    }
                })

                showActiveTheme(getPreferredTheme())

                document.querySelectorAll('[data-bs-theme-value]')
                    .forEach(toggle => {
                        toggle.addEventListener('click', () => {
                            const theme = toggle.getAttribute('data-bs-theme-value')
                            localStorage.setItem('theme', theme)
                            setTheme(theme)
                            showActiveTheme(theme)
                        })
                    })

            }
        })

    </script>

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css"
          href="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/font-awesome/css/all.min.css">
    <link rel="stylesheet" type="text/css"
          href="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css"
          href="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/apexcharts/css/apexcharts.css">
    <link rel="stylesheet" type="text/css"
          href="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/quill/css/quill.snow.css">

    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css"
          href="{{ route('/Others/Themes/Frontend/Theme/assets/css') }}/style-rtl.css">

</head>

<body>
<!-- Preloader START -->
{{ $view->make('backend/main/layout/preloader') }}
<!-- Preloader END -->

<!-- =======================
Header START -->
{!! $header !!}
<!-- =======================
Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>
    <!-- =======================
    Main contain START -->
    <section class="py-4">
        <div class="container">
            <div class="row pb-4">
                <div class="col-12">
                    <!-- Title -->
                    <h1 class="mb-0 h3">{{ $lang['create-new-post'] }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Chart START -->
                    <div class="card border">
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Form START -->
                            <form action="{{ route('') . $action }}" method="post" enctype="multipart/form-data">
                                <!-- Main form -->
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Post name -->
                                        <div class="mb-3">
                                            <label class="form-label">{{ $lang['title'] }}</label>
                                            <input id="con-name" name="title" type="text" class="form-control"
                                                   placeholder="{{ $lang['post-title'] }}"
                                                   value="@if(!empty($post)) {{ $post->title }} @endif">
                                            @if(!empty($errors['title']))
                                                <div class="form-control bg-danger">{{ $errors['title']['required'] }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Short description -->
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">{{ $lang['short_description'] }}</label>
                                            <textarea class="form-control" name="short_description" rows="3"
                                                      placeholder="{{ $lang['short_description-placeholder'] }}">@if(!empty($post))
                                                    {{ $post->short_description }}
                                                @endif</textarea>
                                            @if(!empty($errors['short_description']))
                                                <div class="form-control bg-danger">{{ $errors['short_description']['required'] }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Main toolbar -->
                                    <div class="col-md-12">
                                        <!-- Subject -->
                                        <div class="mb-3">
                                            <label class="form-label">{{ $lang['text'] }}</label>
                                            <!-- Editor toolbar -->
                                            <!-- Main toolbar -->
                                            <textarea class="form-control" name="text" rows="10"
                                                      id="myCKEditortextarea">@if(!empty($post))
                                                    {{ $post->text }}
                                                @endif</textarea>
                                            @if(!empty($errors['text']))
                                                <div class="form-control bg-danger">{{ $errors['text']['required'] }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <!-- Image -->
                                            @if(!empty($post))
                                                <div class="row align-items-center mb-2">
                                                    <div class="col-4 col-md-2">
                                                        <div class="position-relative">
                                                            <img class="rounded" src="{{ route('/') . $post->photo }}"
                                                                 alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8 col-md-10 position-relative">
                                                        <h6 class="my-2">{{ $lang['edit-photo'] }}</h6>
                                                        <label class="w-100" style="cursor:pointer;">
                                                            <div class="input-group flex-row-reverse">
                                                                <input type="text" class="form-control upload-name"/>
                                                                <span class="btn btn-custom cursor-pointer upload-button">{{ $lang['upload-file'] }}</span>
                                                            </div>
                                                            <input class="form-control stretched-link d-none hidden-upload"
                                                                   type="file" name="photo"
                                                                   accept="image/gif, image/jpeg, image/png"/>
                                                            @if(!empty($errors['files']))
                                                                @if(!empty($errors['files']['photo_required']))
                                                                    <div class="form-control bg-danger">{{ $errors['files']['photo_required'] }}</div>
                                                                @else
                                                                    <div class="form-control bg-danger">{{ $errors['files']['photo'] }}</div>
                                                                @endif
                                                            @endif
                                                        </label>
                                                    </div>
                                                    <p class="small mb-0 mt-2">
                                                        <b>{{ $lang['hint'] }}</b>{{ $lang['hint-upload-file'] }} </p>
                                                </div>
                                            @else
                                                <div class="position-relative">
                                                    <h6 class="my-2">{{ $lang['add-photo'] }}</h6>
                                                    <label class="w-100" style="cursor:pointer;">
                                                        <input class="form-control"
                                                               type="file" name="photo"
                                                               accept="image/gif, image/jpeg, image/png"/>
                                                        @if(!empty($errors['files']))
                                                            @if(!empty($errors['files']['photo_required']))
                                                                <div class="form-control bg-danger">{{ $errors['files']['photo_required'] }}</div>
                                                            @else
                                                                <div class="form-control bg-danger">{{ $errors['files']['photo'] }}</div>
                                                            @endif
                                                        @endif
                                                    </label>
                                                </div>
                                                <p class="small mb-0 mt-2">
                                                    <b>{{ $lang['hint'] }}</b>{{ $lang['hint-upload-file'] }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <!-- tagss -->
                                        <div class="mb-3">
                                            <label class="form-label">{{ $lang['tags'] }}</label>
                                            <textarea class="form-control" name="tags" rows="1"
                                                      placeholder="{{ $lang['tags-placeholder'] }}">@if(!empty($post->tags))
                                                    {{ $post->tags }}
                                                @endif</textarea>
                                            <small>{{ $lang['hint-tags'] }}</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <!-- Message -->
                                        <div class="mb-3">
                                            <label class="form-label">{{ $lang['category'] }}</label>
                                            <select class="form-select" name="post_category_id"
                                                    aria-label="Default select example">
                                                @if(!empty($post))
                                                    @foreach($categories as $category)
                                                        @if($category->id == $post->post_category_id)
                                                            <option value="{{ $category->id }}"
                                                                    selected>{{ $category->title }}</option>
                                                        @else
                                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <option selected>{{ $lang['select-category'] }}</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @if(!empty($errors['post_category_id']))
                                                @if(!empty($errors['post_category_id']['required']))
                                                    <div class="form-control bg-danger">{{ $errors['post_category_id']['required'] }}</div>
                                                @else
                                                    <div class="form-control bg-danger">{{ $errors['post_category_id']['post_cat_valid'] }}</div>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    <!-- Create post button -->
                                    <div class="col-md-12 text-start">
                                        <button class="btn btn-primary w-100"
                                                type="submit">{{ $lang['submit-changes'] }}</button>
                                    </div>
                                </div>
                            </form>
                            <!-- Form END -->
                        </div>
                    </div>
                    <!-- Chart END -->
                    @if(!empty($successMessage))
                        <div class="form-control bg-success">{{ $successMessage }}</div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Main contain END -->
</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- =======================
Footer START -->
{{ $view->make('backend/main/layout/footer') }}
<!-- =======================
Footer END -->

<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short"></i></div>

<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Vendors -->
<script src="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/apexcharts/js/apexcharts.min.js"></script>
<script src="{{ route('/Others/Themes/Frontend/Theme/assets/vendor') }}/quill/js/quill.min.js"></script>

<!-- Template Functions -->
<script src="{{ route('/Others/Themes/Frontend/Theme/assets/js') }}/functions.js"></script>
<!-- Btn Upload -->
<script>
    document.querySelector(".upload-button").addEventListener("click", () => {
        //clicks on the file input
        document.querySelector(".hidden-upload").click();
    });
    //adds event listener on the hidden file input to listen for any changes
    document.querySelector(".hidden-upload").addEventListener("change", (event) => {
        //gets the file name
        document.querySelector(".upload-name").value = event.target.files[0].name;
    });
</script>
<script>
    tinymce.init({
        selector: '#mytextarea',
        height: 400,
        theme: 'silver',
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
        ],
        toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
        image_advtab: true,
        templates: [{
            title: 'متن نمونه 1',
            content: 'متن 1'
        },
            {
                title: 'متن نمونه 2',
                content: 'متن 2'
            }
        ],
        content_css: []
    });

    CKEDITOR.replace('myCKEditortextarea')
</script>
</body>

</html>