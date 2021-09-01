@include('layouts.header')
<!-- Begin page -->

<div id="app">
    <div class="main-wrapper">
        @include('layouts.topbar')
        @include('layouts.sidebar')
        @yield('content')
    </div>
</div>
@include('layouts.footer')