<!-- Navigation -->
<style type="text/css">
.header-menu-blur {
    background-color: hsla(0,0%,100%,.8);
    -webkit-backdrop-filter: blur(20px);
    backdrop-filter: blur(20px);
}
</style>
<nav class="navbar navbar-expand-md navbar-light fixed-top border-bottom header-menu-blur">
    <div class="container">
    <a class="navbar-brand" href="{{ url('/showlog') }}">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="24" height="24" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24" xml:space="preserve"><g><path xmlns="http://www.w3.org/2000/svg" d="m19 1h-14a5.006 5.006 0 0 0 -5 5v12a5.006 5.006 0 0 0 5 5h14a5.006 5.006 0 0 0 5-5v-12a5.006 5.006 0 0 0 -5-5zm-14 2h14a3 3 0 0 1 3 3v1h-20v-1a3 3 0 0 1 3-3zm14 18h-14a3 3 0 0 1 -3-3v-9h20v9a3 3 0 0 1 -3 3zm0-8a1 1 0 0 1 -1 1h-12a1 1 0 0 1 0-2h12a1 1 0 0 1 1 1zm-4 4a1 1 0 0 1 -1 1h-8a1 1 0 0 1 0-2h8a1 1 0 0 1 1 1zm-12-12a1 1 0 1 1 1 1 1 1 0 0 1 -1-1zm3 0a1 1 0 1 1 1 1 1 1 0 0 1 -1-1zm3 0a1 1 0 1 1 1 1 1 1 0 0 1 -1-1z" fill="#766283" data-original="#000000"/></g></svg>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
        </ul>
        <div class="navbar-nav">
            @if( $service->getLogName() )
            <li class="nav-item">
                <a href="{{ route('log-viewer-download')}}?file={{ $service->getLogName() }}" class="nav-link" ><i class="fa fa-fw fa-download"></i>{{ trans('log-viewer::log-viewer.info.download_label') }}</a>
            </li>
            @else

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">文档</a>
                <div class="dropdown-menu" aria-labelledby="dropdown02">
                    <a class="dropdown-item" href="https://github.com/gouguoyin/laravel-log-viewer">{{ trans('log-viewer::log-viewer.dropdown.document_label') }}</a>
                </div>
            </li>
            @endif

            

            @if( $service->getLogName() )
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ucfirst($service->getLogName())}}</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    @foreach ($service->getAllLogs($keywords) as $log)
                    <a class="dropdown-item @if($service->getLogName() == $log ) active @endif" href="{{url('/showlog')}}?file={{$log}}">{{ucfirst($log)}}</a>
                    @endforeach
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Level</a>
                <div class="dropdown-menu" aria-labelledby="dropdown03">
                    <a class="dropdown-item @if(!isset(request()['level'])) active @endif" href="{{url('/showlog')}}?file={{$service->getLogName()}}">All</a>
                    <a class="dropdown-item @if(isset(request()['level']) && request()['level'] == 'alert') active @endif" href="{{url('/showlog')}}?file={{$service->getLogName()}}&level=alert">ALERT</a>
                    <a class="dropdown-item @if(isset(request()['level']) && request()['level'] == 'error') active @endif" href="{{url('/showlog')}}?file={{$service->getLogName()}}&level=error">ERROR</a>
                    <a class="dropdown-item @if(isset(request()['level']) && request()['level'] == 'warning') active @endif" href="{{url('/showlog')}}?file={{$service->getLogName()}}&level=warning">WRRNING</a>
                    <a class="dropdown-item @if(isset(request()['level']) && request()['level'] == 'notice') active @endif" href="{{url('/showlog')}}?file={{$service->getLogName()}}&level=notice">NOTICE</a>
                    <a class="dropdown-item @if(isset(request()['level']) && request()['level'] == 'info') active @endif" href="{{url('/showlog')}}?file={{$service->getLogName()}}&level=info">INFO</a>
                    <a class="dropdown-item @if(isset(request()['level']) && request()['level'] == 'debug') active @endif" href="{{url('/showlog')}}?file={{$service->getLogName()}}&level=debug">DEBUG</a>
                </div>
            </li>
            @endif
       </div>
    </div>
    </div>
</nav>