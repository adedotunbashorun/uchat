<!DOCTYPE html>
<html>

<head>
    @include('core::public._partials.head')
</head>

<body>
<div class="book_preload" id="preloader" style="background-image: url('{{asset('assets/public/images/loading.gif')}}')">

</div>

@include('core::public._partials.header')
@yield('main')
@include('core::public._partials.footer')
@include('core::public._partials.bottom')
</body>
</html>