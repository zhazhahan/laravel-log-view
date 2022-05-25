@extends('log-viewer::layout')

@section('log-viewer::title', 'CRM Log')

@section('log-viewer::content')
@include('log-viewer::menu')
<div class="mt-5 pt-4 container">
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped table-bordered" style="word-break:break-all; word-wrap:break-all;">
                <thead class="thead-dark">
                <tr>
                    <th width="9%">{{ trans('log-viewer::log-viewer.info.log_level') }}</th>
                    <th width="16%">{{ trans('log-viewer::log-viewer.info.log_datetime') }}</th>
                    <th width="75%">{{ trans('log-viewer::log-viewer.info.log_content') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($service->getLogContents() as $content)
                    @if( !isset(request()['level']) || (isset(request()['level']) && request()['level'] == $content['level']) )
                    <tr class="odd gradeX">
                        <td  class="{{ $service->getLevelColor($content['level']) }}"><b>{{ strtoupper($content['level']) }}</b></td>
                        <td>{{ $content['datetime'] }}</td>
                        <td>{{ $content['message'] }}</td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section("log-viewer::script")
@parent
@endsection