@extends('log-viewer::layout')

@section('log-viewer::title', 'Site Log')


@section('log-viewer::content')

<header class="max-w-6xl mx-auto text-gray-600 border-b">
    <div class="flex flex-wrap py-2 flex-col md:flex-row items-center">
        <a href="/showlog" class=" items-center mb-4 md:mb-0">
            <div class="mx-auto flex items-center">
                <div>
                    <svg class="w-14" viewBox="0 0 300 196.5"><defs><linearGradient id="linear-gradient" x1="188.08" x2="188.08" y1="139.66" y2="-28.13" gradientTransform="translate(124.18 -104.37) rotate(45)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#1d0054"/><stop offset="1" stop-color="#4c5fec"/></linearGradient><linearGradient id="linear-gradient-2" x1="137.86" x2="137.86" y1="179.13" y2="22.83" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#00dccc"/><stop offset="1" stop-color="#c7f0b9"/></linearGradient></defs><title>3</title><circle cx="188.08" cy="97.71" r="60.79" transform="translate(-14.01 161.61) rotate(-45)" style="opacity:.8;fill:url(#linear-gradient)"/><path d="M219.78,98q0,3.41-.28,6.73,0,.73-.12,1.47a82.17,82.17,0,0,1-3.52,16.91c-.17.53-.35,1.06-.53,1.59A81.94,81.94,0,0,1,55.94,98c0-.87,0-1.73.05-2.59a81.42,81.42,0,0,1,1.75-14.5A81.51,81.51,0,0,1,74.54,46,81.89,81.89,0,0,1,219.78,98Z" style="opacity:.8;fill:url(#linear-gradient-2)"/></svg>
                </div>
                <div>
                    <div class="font-medium">日志控制台</div>
                </div>
            </div>
        </a>
        <nav class="ml-auto flex flex-wrap items-center font-light justify-center">
            <a href="https://github.com/zhazhahan/laravel-log-view/tree/main" class="hover:text-green-600">文档</a>
        </nav>
    </div>
</header>



<div class="max-w-6xl m-auto my-20">
	<table class="bg-white mt-2 table-auto w-full text-left">
		<tr>
			<th class="border p-2">Log</th>
			<th class="border p-2 text-gray-500">ALL</th>
            @foreach ( $service::getLevels() as $v)
			<th class="border p-2 hidden-md {{$v['color']}}">{{ucfirst($v['name'])}}</th>
            @endforeach
		</tr>
		@foreach ( $service->getAllLogs() as $log)
            <?php
                $temp_s = $service;
                $temp_s->setLogPath($log);
                $data = $temp_s->getLogContents();
                $counts = [0,0,0,0,0,0,0,0,0];
                foreach ($data as $value){
                    $counts[0]++; 
                    switch ($value['level']){
                        case 'alert':
                            $counts[1]++;
                            break;
                        case 'error':
                            $counts[2]++;
                            break;
                        case 'warning':
                            $counts[3]++;
                            break;
                        case 'notice':
                            $counts[4]++;
                            break;
                        case 'info':
                            $counts[5]++;
                            break;
                        case 'debug':
                            $counts[6]++;
                            break;
                        default:
                            $counts[7]++;
                            break;
                    }
                }
            ?>
		<tr>
			<td class="border p-2">
                <a class="hover:text-green-600" href="{{ route('log-viewer-home')}}?file={{$log}}">
                    {{ ucfirst($log) }}
                </a>
            </td>
			<td class="border p-2 @if($counts[0]>0) bg-pinkish  @endif">
                <a class="text-light" href="{{route('log-viewer-home')}}?file={{$log}}">
                    {{ $counts[0] }}
                </a>                     
            </td>
			<td class="border p-2 @if($counts[1]>0) bg-red-500 @endif">
                <a class="text-light" href="{{route('log-viewer-home')}}?file={{$log}}&level=alert">
                    {{ $counts[1] }}
                </a>
            </td>
			<td class="border p-2 @if($counts[2]>0) bg-yellow-500 @endif">
                <a class="text-light" href="{{route('log-viewer-home')}}?file={{$log}}&level=error">
                    {{ $counts[2] }}
                </a>
            </td>
			<td class="border p-2 @if($counts[3]>0) bg-yellow-500 @endif">
                <a class="text-light" href="{{route('log-viewer-home')}}?file={{$log}}&level=warning">
                    {{ $counts[3] }}
                </a>
            </td>
			<td class="border p-2 @if($counts[4]>0) bg-blue-500 @endif">
                <a class="text-light" href="{{route('log-viewer-home')}}?file={{$log}}&level=notice">
                    {{ $counts[4] }}
                </a>
            </td>
			<td class="border p-2 @if($counts[5]>0) bg-info @endif">
                <a class="text-light" href="{{route('log-viewer-home')}}?file={{$log}}&level=info">
                    {{ $counts[5] }}
                </a>
            </td>
            <td class="border p-2 @if($counts[6]>0) bg-green-500 @endif">
                <a class="text-light" href="{{route('log-viewer-home')}}?file={{$log}}&level=debug">
                    {{ $counts[6] }}
                </a>
            </td>
			<td class="border p-2 @if($counts[7]>0) bg-purple-500 @endif">
                <a class="text-light" href="{{route('log-viewer-home')}}?file={{$log}}">
                    {{ $counts[7] }}
                </a>
            </td>
		</tr>
		@endforeach
	</table>
</div>
@endsection
