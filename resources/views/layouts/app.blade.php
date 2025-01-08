<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="/assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    @if(isset($tailwindcss)) <link href="/css/tailwind.css" rel="stylesheet" /> @endif
    <link href="/css/styles.css" rel="stylesheet" />
    <link href="/css/my_styles.css" rel="stylesheet" />
</head>
<body>
<div id="bgHead">
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#!">Future Magazine</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About s</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->route()->named('blog') ? 'active' : '' }}" href="{{ route('blog') }}">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact us</a></li>
{{--                    <li class="nav-item"><a class="nav-link" href="#">[]</a></li>--}}
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page header with logo and tagline-->
    <header class="py-5 mb-4">
        <div class="container">
            {{ $page_title }}
        </div>
    </header>
</div>
<!-- Page content-->
<div class="content">
    {{ $slot }}
</div>
<!-- Footer-->
<footer class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p class="m-0 text-left">© 2025 Future magazine. All rights reserved.</p>
            </div>
            <div class="col-md-6" style="text-align: right;">
                    <span>Terms of Service</span>
                    <span>Privacy Policy</span>
                    <span>Cookies</span>
            </div>
        </div>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="/js/scripts.js"></script>
</body>
</html>
