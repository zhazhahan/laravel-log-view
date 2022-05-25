# Laravel Log Viewer

## 简介

Laravel Log Viewer 

## 安装配置

安装 laravel-log-view
```php
# 如果只想在开发环境安装请加上 --dev 
composer require zha/laravel-log-view
```
添加到服务提供者

在 `config/app.php` 的 `providers` 数组中加入

Zha\LaravelLogView\LogViewerServiceProvider::class,
现在你已经可以通过访问`你的域名/logs`进入log-viewer后台，

## 自定义Log Viewer
运行`php artisan vendor:publish --provider="Zha\LaravelLogView\LogViewerServiceProvider"`会一次性生成服务提供者文件


## 权限验证
Log Viewer默认路由是 `/logs`， 默认情况下，只能在 `local` 环境下访问。
在  `app/Providers/LogViewerServiceProvider.php` 文件中，有一个 `gate` 方法。
这里授权控制 非本地 环境中的访问。 
你可以根据需要随意修改此门面，以限制对 Log Viewer 的访问：

