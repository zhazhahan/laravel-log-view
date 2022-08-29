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
            <div class="max-w-6xl m-auto border-t py-4 flex flex-row">
                <p class="text-gray-500 text-sm text-center sm:text-left">
                    © 2020 韩炸炸
                </p>
                <span class="ml-auto">
                    <a href="https://tailwindui.com">
                        <img width="140" src="https://vitejs.dev/tailwind-labs.svg">
                    </a>
                </span>
            </div>
        </footer>
        <!-- Footer -->
    </div>
</body>
</html>