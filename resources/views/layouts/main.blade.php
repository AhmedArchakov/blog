@include('layouts.header')

    <main class="main">
        @yield('slider')

        <div class="container mt-5 mb-5">
            @yield('archive-box')
            <div class="row">
                <div class="col-lg-8">
                    @yield('content')

                </div>
                <div class="col-lg-4">
                    @include('layouts.sidebar')
                     <!-- sidebar-->
                </div> <!--col-md-4-->
            </div>
        </div>

    </main>

@include('layouts.footer')
