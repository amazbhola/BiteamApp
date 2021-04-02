@include('frontend.layouts.inc.header')

<div class="row">
    @yield('content-body')
    @yield('sidebar')
    <div class="span9">
        @yield('slider')
        @yield('new-product')
        @yield('featured-product')
        @yield('populer-product')
    </div>
</div>

@include('frontend.layouts.inc.footer')
