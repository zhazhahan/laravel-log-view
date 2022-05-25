@extends('log-viewer::layout')

@section('log-viewer::title', 'Site Log')
<style type="text/css">
    .bg-pinkish{background: #ffa2a2}
    .text-purple{color: #a2a9ff}
    .bg-purple{background: #a2a9ff}
</style>
@section('log-viewer::content')
    @include('log-viewer::menu')
    <div class="mt-5 pt-4 container">
	    <div class="row">
	        <div class="col-lg-12">
				<table class="table bg-light table-striped table-bordered table-hover">
					<thead class="thead-dark">
						<tr>
							<th class="">Log</th>
							<th class="text-secondary">All</th>
							<th class="hidden-md text-danger">Alert</th>
							<th class="hidden-md text-danger">Error</th>
							<th class="hidden-md text-warning">Warning</th>
							<th class="hidden-md text-primary">Notice</th>
							<th class="hidden-md text-info">Info</th>
                            <th class="hidden-md text-success">Debug</th>
							<th class="hidden-md text-purple">Others</th>
						</tr>
					</thead>
					<tbody>
						@foreach ( $service->getAllLogs() as $log)
                            <?php
                                $temp_s = $service;
                                $temp_s->setLogPath($log);
                                $data = $temp_s->getLogContents();
                                $counts = [0,0,0,0,0,0,0,0];
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
							<td>
                                <a href="{{ route('log-viewer-home')}}?file={{ $log }}">
                                    <i class="fa fa-fw fa-files-o"></i> {{ ucfirst($log) }}
                                </a>
                            </td>
							<td class="@if($counts[0]>0) bg-pinkish  @endif">
                                <a class="text-light" href="{{route('log-viewer-home')}}?file={{ $log }}">
                                    {{ $counts[0] }}
                                </a>                     
                            </td>
							<td class="@if($counts[1]>0) bg-danger @endif">
                                <a class="text-light" href="{{route('log-viewer-home')}}?file={{ $log }}&level=alert">
                                    {{ $counts[1] }}
                                </a>
                            </td>
							<td class="@if($counts[2]>0) bg-danger @endif">
                                <a class="text-light" href="{{route('log-viewer-home')}}?file={{ $log }}&level=error">
                                    {{ $counts[2] }}
                                </a>
                            </td>
							<td class="@if($counts[3]>0) bg-warning @endif">
                                <a class="text-light" href="{{route('log-viewer-home')}}?file={{ $log }}&level=warning">
                                    {{ $counts[3] }}
                                </a>
                            </td>
							<td class="@if($counts[4]>0) bg-primary @endif">
                                <a class="text-light" href="{{route('log-viewer-home')}}?file={{ $log }}&level=notice">
                                    {{ $counts[4] }}
                                </a>
                            </td>
							<td class="@if($counts[5]>0) bg-info @endif">
                                <a class="text-light" href="{{route('log-viewer-home')}}?file={{ $log }}&level=info">
                                    {{ $counts[5] }}
                                </a>
                            </td>
                            <td class="@if($counts[6]>0) bg-success @endif">
                                <a class="text-light" href="{{route('log-viewer-home')}}?file={{ $log }}&level=debug">
                                    {{ $counts[6] }}
                                </a>
                            </td>
							<td class="@if($counts[7]>0) bg-purple @endif">
                                <a class="text-light" href="{{route('log-viewer-home')}}?file={{ $log }}">
                                    {{ $counts[7] }}
                                </a>
                            </td>
						</tr>
						@endforeach
					</tbody>
				</table>
              
	        </div>
	    </div>
    </div>
@endsection
