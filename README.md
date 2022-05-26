# Laravel Log Viewer

## 简介

Laravel Log Viewer 通过Web界面查看Laravel日志文件


![image](https://raw.githubusercontent.com/zhazhahan/laravel-log-view/main/public/preview.jpg)



## 安装

1.安装包

```php
composer require zha/laravel-log-view
```

2.创建CSS

```php
php artisan vendor:publish --provider="Zha\LaravelLogView\LogViewerServiceProvider" --tag="log-viewer-public"
```

## 删除

```php
composer remove zha/laravel-log-view
```

```php
rm -rf public/vendor/laravel-log-view
```