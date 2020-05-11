# Laravel-full-demo
A laravel demo with lint, CI configuration.

##### Deploy
`composer install`
`cp .env.example .env`
`php artisan key:generate`
配置 nginx.conf，注意站点 root 指向的是 PROJECT_DIR.'public'
即可正常访问。