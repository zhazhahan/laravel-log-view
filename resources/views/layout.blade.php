<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('log-viewer::title')</title>
    <link href="/vendor/laravel-log-view/log.css" rel="stylesheet">
    <style type="text/css">
        .bg {
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            position: absolute;
            background: radial-gradient(circle at 15% 50%, #ede9fe, rgba(255, 255, 255, 0) 25%), radial-gradient(circle at 85% 30%, #d8f3f6, rgba(255, 255, 255, 0) 25%);
        }
    </style>
</head>

<body>
    <div class="bg">
        
        @yield('log-viewer::content')

        <!-- Footer -->
        <footer class="pt-20 text-gray-600 body-font">
            <div class="max-w-6xl m-auto border-t py-4 ">
                <p class="text-gray-500 text-sm text-center">
                    © 2020 <a href="https://twitter.com/imfeiwu" class="hover:text-green-600">@韩炸炸</a>
                </p>
            </div>
        </footer>
        <!-- Footer -->
    </div>
</body>
</html>