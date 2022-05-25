<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('log-viewer::title')</title>
    <link href="./v2/css/tailwind.min.css" rel="stylesheet">
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
<style>
.bg{
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    position: absolute;
    background: radial-gradient(circle at 15% 50%, #ede9fe, rgba(255, 255, 255, 0) 25%), radial-gradient(circle at 85% 30%, #d8f3f6, rgba(255, 255, 255, 0) 25%);
}
</style>
</html>