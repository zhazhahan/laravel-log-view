<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('log-viewer::title')</title>
    <script src="https://cdn.tailwindcss.com"></script>


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