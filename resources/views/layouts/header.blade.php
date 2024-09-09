<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/6e028bdf79.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Open+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    <title>{{ $title ?? '' }} Блог Анны Вебер</title>
</head>
<body>
<div class="wrapper" x-data="{
        showLikeModal: false,
        showSearchModal: false,
        showLoginModal: false,
        showUserSubmenu: false,
        loginTab: 'login',
        showSubmenu: false,
        showSubmenuCategory: false

    }">

    <header class="header">
        <div class="site-brand text-center">
            <div class="container">
                <a href="{{ route('home') }}"><h2>Anna Weber</h2></a>
                <p class="site-description">Персональный блог</p>
            </div>

        </div>

        <div class="header-nav">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-8 col-xs-6 d-flex">
                        <button class="menu-toggle" @click="showSubmenu = !showSubmenu">
                            <i class="fa-solid fa-bars"></i>
                        </button>
                        <nav class="top-nav" :class="{'active': showSubmenu}">
                            <ul class="top-nav-list">
                                <li class="top-nav-item">
                                    <a href="{{ route('home') }}" class="top-nav-link">Главная</a>
                                </li>
                                <li class="top-nav-item" @mouseover="showSubmenuCategory = true"  @mouseout="showSubmenuCategory = false">
                                    <a href="" class="top-nav-link" @click.prevent="showSubmenuCategory = !showSubmenuCategory">Категории
                                        <svg style="width: 15px; height: 15px; fill: #fff"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path
                                                d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/>
                                        </svg>
                                    </a>
                                    <ul class="submenu" :class="{ 'active' : showSubmenuCategory}" >
                                        @foreach($categoryList as $category)
                                            <li class="submenu-item">
                                                <a href="{{ route('category', ['slug' => $category->slug]) }}"
                                                   class="submenu-link" wire:navigate>{{ $category->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="top-nav-item">
                                    <a href="{{ route('about') }}" class="top-nav-link" >Обо мне</a>
                                </li>

                                <li class="top-nav-item">
                                    <a href="{{ route('contact') }}" class="top-nav-link" >Контакты</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="col-md-3 col-sm-4 col-xs-6 d-flex justify-content-end">
                        <div class="user-icon">
                            <i class="fa-regular fa-user"
                               @guest()
                                   @click="showLoginModal = true"
                               @endguest
                               @auth()
                                   @click="showUserSubmenu = !showUserSubmenu"
                                @endauth
                            ></i>
                            @auth()
                                <ul class="submenu-user" x-bind:class="{ 'active': showUserSubmenu}">
                                    <li class="submenu-item">
                                        <a href="{{ route('dashboard') }}" class="submenu-link"
                                           wire:navigate>Профиль</a></li>
                                    <li class="submenu-item">
                                        <a href="{{ route('logout') }}" class="submenu-link"
                                           wire:navigate>Выход</a></li>

                                </ul>
                            @endauth

                            {{--@guest()
                                <ul class="submenu-user">
                                    <li class="submenu-item">
                                        <a href="{{ route('login') }}" class="submenu-link"
                                           wire:navigate>Вход</a></li>
                                    <li class="submenu-item">
                                        <a href="{{ route('register') }}" class="submenu-link"
                                           wire:navigate>Регистрация</a></li>

                                </ul>
                            @endguest--}}

                        </div>

                        <div class="search-toggle" x-on:click="showSearchModal = true">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </header>
