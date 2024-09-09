<footer class="footer">
    <div class="container d-flex justify-content-between align-items-center">
        <p class="copyright">Copyright © {{ date('Y') }} Anna Weber, All Right Reserved</p>
        <ul class="footer-social">
            <li><a href="#" class="footer-social-link"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#" class="footer-social-link"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#" class="footer-social-link"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#" class="footer-social-link"><i class="fa fa-pinterest"></i></a></li>
            <li><a href="#" class="footer-social-link"><i class="fa fa-youtube"></i></a></li>
        </ul>
    </div>
</footer>
<!--modal search-->
<div class="search-overlay" x-bind:class="{ 'active' : showSearchModal }" x-on:keydown.window.escape="showSearchModal = false"  >

    <span class="search-overlay-close" @click="showSearchModal = false"><i class="fa-solid fa-xmark"></i></span>
    <div class="search-overlay-form">
        <form action="{{ route('search') }}" method="GET">

            <input name="s" type="text" class="input-search" placeholder="Поиск...">
            <button type="submit" class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>

    </div>

</div>

<!--modal login-->
@guest()
<div class="login-overlay" @keydown.window.escape="showLoginModal = false" x-bind:class="{ 'active': showLoginModal }" >
    <span class="search-overlay-close" @click="showLoginModal = false"><i class="fa-solid fa-xmark"></i></span>

    <div class="login-modal-content">
        <div class="login-tabs-header">
            <div class="login-header-item" x-bind:class="{ 'active': loginTab == 'login'}">

                <a href="" @click.prevent="loginTab = 'login'">
                    <i class="fa-solid fa-right-to-bracket me-2"></i>Вход</div>
                </a>

            <div class="login-header-item" x-bind:class="{ 'active': loginTab == 'register'}">
                <a href="" @click.prevent="loginTab = 'register'">
                    <i class="fa-solid fa-key me-2"></i>Регистрация</div>
                </a>

        </div>
        <div class="login-tabs-body">
            <div x-show="loginTab == 'login'" >
                <livewire:login-form />
            </div>

            <div x-show="loginTab == 'register'" >
                <livewire:register-form />
            </div>


        </div>

    </div>


</div>

@endguest
<!--modal login-->


</div>



<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('js/alpine3.14.1.min.js') }}"></script>
@yield('swiperScripts')

<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
