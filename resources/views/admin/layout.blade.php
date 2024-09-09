<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    @yield('style_select2')
    <link rel="stylesheet" href="/admin_assets/assets/css/styles.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    @yield('style_ckeditor')

    <title>@yield('title')</title>

</head>

<body>
<div id="main-wrapper">

    <aside class="left-sidebar with-vertical">

        <div class="brand-logo d-flex align-items-center justify-content-center">
            <a href="{{ route('admin.index') }}" class="text-nowrap logo-img">
                <img src="/admin_assets/assets/images/logos/logo.png" alt="Logo-Dark">

            </a>
            <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
                <i class="ti ti-x"></i>
            </a>
        </div>

        <div class="scroll-sidebar" data-simplebar>
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav" class="mb-0">
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow primary-hover-bg" href="javascript:void(0)"
                           aria-expanded="false">
                <span class="aside-icon p-2 bg-primary-subtle rounded-1">
                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-list">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M9 6l11 0"/>
  <path d="M9 12l11 0"/>
  <path d="M9 18l11 0"/>
  <path d="M5 6l0 .01"/>
  <path d="M5 12l0 .01"/>
  <path d="M5 18l0 .01"/>
</svg>
                </span>
                            <span class="hide-menu ps-1">Категории</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('categories.create') }}" class="sidebar-link">
                                    <span class="sidebar-icon"></span>
                                    <span class="hide-menu">Добавить категорию</span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a href="{{ route('categories.index') }}" class="sidebar-link">
                                    <span class="sidebar-icon"></span>
                                    <span class="hide-menu">Список категорий</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow primary-hover-bg" href="javascript:void(0)"
                           aria-expanded="false">
                <span class="aside-icon p-2 bg-primary-subtle rounded-1">

                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-tag">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M7.5 7.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"/>
  <path
      d="M3 6v5.172a2 2 0 0 0 .586 1.414l7.71 7.71a2.41 2.41 0 0 0 3.408 0l5.592 -5.592a2.41 2.41 0 0 0 0 -3.408l-7.71 -7.71a2 2 0 0 0 -1.414 -.586h-5.172a3 3 0 0 0 -3 3z"/>
</svg>
                </span>
                            <span class="hide-menu ps-1">Теги</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('tags.create') }}" class="sidebar-link">
                                    <span class="sidebar-icon"></span>
                                    <span class="hide-menu">Добавить тег</span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a href="{{ route('tags.index') }}" class="sidebar-link">
                                    <span class="sidebar-icon"></span>
                                    <span class="hide-menu">Список тегов</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow primary-hover-bg" href="javascript:void(0)"
                           aria-expanded="false">
                <span class="aside-icon p-2 bg-primary-subtle rounded-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                       stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                       class="icon icon-tabler icons-tabler-outline icon-tabler-sticker-2">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M6 4h12a2 2 0 0 1 2 2v7h-5a2 2 0 0 0 -2 2v5h-7a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2z"/>
  <path d="M20 13v.172a2 2 0 0 1 -.586 1.414l-4.828 4.828a2 2 0 0 1 -1.414 .586h-.172"/>
</svg>
                </span>
                            <span class="hide-menu ps-1">Посты</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="{{ route('posts.create') }}" class="sidebar-link">
                                    <span class="sidebar-icon"></span>
                                    <span class="hide-menu">Добавить пост</span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a href="{{ route('posts.index') }}" class="sidebar-link">
                                    <span class="sidebar-icon"></span>
                                    <span class="hide-menu">Список постов</span>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link primary-hover-bg" href="{{ route('comments.index') }}"
                           aria-expanded="false">
                <span class="aside-icon p-2 bg-primary-subtle rounded-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                       stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                       class="icon icon-tabler icons-tabler-outline icon-tabler-message">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <path d="M8 9h8"/>
  <path d="M8 13h6"/>
  <path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z"/>
</svg>
                </span>
                            <span class="hide-menu ps-1">Комментарии</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link primary-hover-bg" href="{{ route('users.index') }}"
                           aria-expanded="false">
                <span class="aside-icon p-2 bg-primary-subtle rounded-1">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-users">
  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
  <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
  <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
  <path d="M16 3.13a4 4 0 0 1 0 7.75" />
  <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
</svg>
                </span>
                            <span class="hide-menu ps-1">Пользователи</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <div class="page-wrapper">
        <div class="body-wrapper">
            <div class="container-fluid">

                <header class="topbar sticky-top">
                    <div class="with-vertical">

                        <nav class="navbar navbar-expand-lg p-0">
                            <ul class="navbar-nav">
                                <li class="nav-item nav-icon-hover-bg rounded-circle">
                                    <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
                                        <iconify-icon icon="solar:list-bold-duotone" class="fs-7"></iconify-icon>
                                    </a>
                                </li>
                            </ul>

                            <h4 class="ms-3">Админ-панель</h4>

                            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                                <div class="d-flex align-items-center justify-content-between">

                                    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">

                                        <li class="nav-item dropdown">
                                            <a class="nav-link position-relative ms-6" href="javascript:void(0)"
                                               id="drop1" aria-expanded="false">
                                                <div class="d-flex align-items-center flex-shrink-0">

                                                    <span class="d-sm-none d-block"><iconify-icon
                                                            icon="solar:alt-arrow-down-line-duotone"></iconify-icon></span>

                                                    <div class="d-none d-sm-block">
                                                        <h6 class="fs-4 mb-1 profile-name">
                                                            Admin
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                                 height="1em" viewBox="0 0 24 24">
                                                                <path fill="none" stroke="currentColor"
                                                                      stroke-linecap="round" stroke-linejoin="round"
                                                                      stroke-width="1.5" d="m19 9l-7 6l-7-6"/>
                                                            </svg>
                                                        </h6>

                                                    </div>
                                                </div>
                                            </a>
                                            <div
                                                class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                                aria-labelledby="drop1">
                                                <div class="profile-dropdown position-relative" data-simplebar>

                                                    <div class="message-body">
                                                        <a href="{{ route('users.edit', ['id' => Auth::user()->id]) }}"
                                                           class="dropdown-item px-7 d-flex align-items-center py-6">
                                <span class="btn px-3 py-2 bg-info-subtle rounded-1 text-info shadow-none">
                                  <iconify-icon icon="solar:wallet-2-line-duotone" class="fs-7"></iconify-icon>
                                </span>
                                                            <div class="w-100 ps-3 ms-1">
                                                                <h5 class="mb-0 mt-1 fs-4 fw-normal">
                                                                    Профиль
                                                                </h5>

                                                            </div>
                                                        </a>
                                                    </div>

                                                    <div class="py-6 px-7 mb-1">
                                                        <a href="{{ route('logout') }}"
                                                           class="btn btn-primary w-100">Выход</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>

                    </div>

                </header>

                @yield('content')

            </div>
        </div>
    </div>
</div>
<script src="/admin_assets/assets/js/vendor.min.js"></script>
<!-- Import Js Files -->
<script src="/admin_assets/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="/admin_assets/assets/libs/simplebar/dist/simplebar.min.js"></script>
<script src="/admin_assets/assets/js/theme/app.init.js"></script>
<script src="/admin_assets/assets/js/theme/theme.js"></script>
<script src="/admin_assets/assets/js/theme/app.min.js"></script>
<script src="/admin_assets/assets/js/theme/sidebarmenu.js"></script>


<!-- solar icons -->
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>

@yield('select2_script')
@yield('ckeditor_script')

</body>

</html>

