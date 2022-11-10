@extends('log-viewer::layout')

@section('log-viewer::title', 'Site Log')


@section('log-viewer::content')

<header class="max-w-6xl mx-auto text-gray-600 border-b">
    <div class="flex flex-wrap py-2 flex-col md:flex-row items-center">
        <a href="/showlog" class=" items-center mb-4 md:mb-0">
            <div class="mx-auto flex items-center">
                <div>
                    <svg class="w-14" viewBox="0 0 300 196.5"><defs><linearGradient id="linear-gradient" x1="188.08" x2="188.08" y1="139.66" y2="-28.13" gradientTransform="translate(124.18 -104.37) rotate(45)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#1d0054"/><stop offset="1" stop-color="#4c5fec"/></linearGradient><linearGradient id="linear-gradient-2" x1="137.86" x2="137.86" y1="179.13" y2="22.83" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#00dccc"/><stop offset="1" stop-color="#c7f0b9"/></linearGradient></defs><circle cx="188.08" cy="97.71" r="60.79" transform="translate(-14.01 161.61) rotate(-45)" style="opacity:.8;fill:url(#linear-gradient)"/><path d="M219.78,98q0,3.41-.28,6.73,0,.73-.12,1.47a82.17,82.17,0,0,1-3.52,16.91c-.17.53-.35,1.06-.53,1.59A81.94,81.94,0,0,1,55.94,98c0-.87,0-1.73.05-2.59a81.42,81.42,0,0,1,1.75-14.5A81.51,81.51,0,0,1,74.54,46,81.89,81.89,0,0,1,219.78,98Z" style="opacity:.8;fill:url(#linear-gradient-2)"/></svg>
                </div>
                <div>
                    <div class="font-medium">日志控制台</div>
                </div>
            </div>
        </a>
        <nav class="ml-auto flex flex-wrap items-center font-light justify-center">
            <a href="https://github.com/zhazhahan/laravel-log-view/tree/main" class="hover:text-green-600">
                <svg height="22" aria-hidden="true" viewBox="0 0 16 16" version="1.1" width="32" data-view-component="true" class="octicon octicon-mark-github v-align-middle">
                <path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path>
                </svg>
            </a>
        </nav>
    </div>
</header>



<div class="max-w-6xl m-auto my-20">
    <div class="mx-2">
        
    
	<table class="bg-white mt-2 table-auto w-full text-center">
		<tr class="bg-gray-50">
			<th class="border px-2 py-3 text-left">Log</th>
			<th class="border px-2 py-3 text-gray-500">ALL</th>
            <!-- Level -->
            @foreach ( $levels as $ll )
            <th class="border uppercase px-2 py-3 hidden-md text-{{$ll['color']}}-500">{{$ll['name']}}</th>
            @endforeach
            <!-- Level -->
		</tr>
		@foreach ( $files as $log )
		<tr class="hover:bg-gray-100">
            <td class="border p-2 capitalize text-left text-blue-900 font-bold hover:text-blue-600">
                <a class="" href="{{route('log-viewer-home')}}?file={{$log['name']}}">
                    {{$log['name'] ?? 'File'}}
                </a>
            </td>
			<td class="border p-2">
                <a class="hover:text-green-500 " href="{{route('log-viewer-home')}}?file={{$log['name']}}">
                    {{$log['sum'] ?? 0}}
                </a>
            </td>
            <!-- Level -->
            @foreach ( $levels as $ll )
			<td class="border p-2 text-white @if(isset($log[$ll['name']])) bg-{{$ll['color']}}-500 @endif">
                <a class="" href="{{route('log-viewer-home')}}?file={{$log['name']}}&level={{$ll['name']}}">
                    {{ $log[$ll['name']] ?? 0 }}
                </a>                     
            </td>
            @endforeach
            <!-- Level -->
		</tr>
		@endforeach
	</table>
    </div>
</div>
@endsection
