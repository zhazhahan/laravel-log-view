<?php

namespace Zha\LaravelLogView\Controllers;

use Zha\LaravelLogView\LogViewerService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @var LogViewerService
     */
    protected $service;

    /**
     * 包名
     * @var string
     */
    protected $packageName;

    /**
     * HomeController constructor.
     * @param LogViewerService $logViewerService
     */
    public function __construct(LogViewerService $logViewerService)
    {
        // $logViewerService->authorization() || die('For Safe,Log Viewer Can Run In Prod');
        $this->service     = $logViewerService;
        $this->packageName = $logViewerService->getPackageName();
    }

}
