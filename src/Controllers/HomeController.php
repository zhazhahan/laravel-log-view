<?php

namespace Zha\LaravelLogView\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home(Request $request)
    {
        if ($request->has('file')) {
            // 设置文件
            $this->service->setLogPath($request->input('file'));

            // 返回
            return view($this->packageName.'::info',[
                'service'  => $this->service,
            ]);
        }else{

            // 获取文件
            $data = [];
            $files = $this->service->getAllLogs();
            foreach($files as $k=>$v){
                $this->service->setLogPath($v);
                $content = $this->service->getLogContents();
                $temp = array_count_values(array_column($content,'level'));
                $temp['sum'] = count($content);
                $temp['name'] = $v;
                $data[] = $temp;
            }

            // 返回
            return view($this->packageName.'::home',[
                'service'  => $this->service,
                'files' => $data,
                'levels' => $this->service->getLevels(),
            ]);
        }
    }


    /**
     * 文件下载
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function download(Request $request)
    {
        $this->service->setLogPath($request->input('file'));
        return response()->download($this->service->getLogPath());
    }

    /**
     * 删除文件
     * @param Request $request
     * @return array
     */
    public function delete(Request $request)
    {

    }
}
