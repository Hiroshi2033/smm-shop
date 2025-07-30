#!/bin/bash

# 如果 vendor 目录不存在，则安装依赖
if [ ! -d /app/vendor ]; then
    composer install --ignore-platform-reqs
fi

# 如果 .env 文件不存在，则从 .env.example 复制
if [ ! -f /app/.env ]; then
    cp /app/.env.example /app/.env
fi

# 生成应用密钥
if [ -z "$(grep -E "^APP_KEY=[A-Za-z0-9+/]{40}=?$" /app/.env)" ]; then
    php artisan key:generate
fi

# 启动队列工作进程
php artisan queue:work >/tmp/work.log 2>&1 &

# 启动 supervisord
supervisord