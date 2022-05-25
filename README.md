# Laravel Log Viewer

## 简介

Laravel Log Viewer 

## 安装配置

安装 laravel-log-view
```php
composer require zha/laravel-log-view
```
添加到服务提供者

在 `config/app.php` 的 `providers` 数组中加入

Zha\LaravelLogView\LogViewerServiceProvider::class,
现在你已经可以通过访问`你的域名/showlog`进入后台，


## 创建CSS
php artisan vendor:publish --provider="Zha\LaravelLogView\LogViewerServiceProvider" --tag="log-viewer-public"




