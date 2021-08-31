@include('layouts.header')
<!-- Begin page -->

<div id="app">
    <div class="main-wrapper">
        @include('layouts.topbar')
        @include('layouts.sidebar')
        <h4 class="page-title">{{$title}}</h4>
        @yield('content')
    </div>
</div>
@include('layouts.footer')