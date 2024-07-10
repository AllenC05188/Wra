#!/bin/bash
# 關閉 3 服務並清除 Laravel 快取

# 關閉 MariaDB 服務
echo "關閉 MariaDB 服務..."
sudo systemctl stop mariadb
if [ $? -eq 0 ]; then
    echo "MariaDB 服務已關閉。"
else
    echo "無法關閉 MariaDB 服務。請檢查日誌。"
fi

# 檢查並關閉 Laravel 開發服務器
echo "關閉 Laravel 開發服務器..."
pkill -f "php artisan serve"
sleep 2 # 等待進程關閉
pgrep -f "php artisan serve" > /dev/null
if [ $? -eq 0 ]; then
    echo "無法關閉 Laravel 開發服務器。請檢查是否有正在運行的服務器。"
else
    echo "Laravel 開發服務器已關閉。"
fi

# 檢查並關閉 Vite 開發服務器
echo "關閉 Vite 開發服務器..."
pkill -f "vite"
sleep 2 # 等待進程關閉
pgrep -f "vite" > /dev/null
if [ $? -eq 0 ]; then
    echo "無法關閉 Vite 開發服務器。請檢查是否有正在運行的服務器。"
else
    echo "Vite 開發服務器已關閉。"
fi

# 檢查 MySQL 連接狀態
echo "檢查 MySQL 連接狀態..."
if ! mysqladmin ping -u root -p0000 --silent; then
    echo "MySQL 連接失敗，無法清除 Laravel 快取。"
    exit 1
fi

# 清除 Laravel 快取
echo "清除 Laravel 快取..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

if [ $? -eq 0 ]; then
    echo "Laravel 快取已清除。"
else
    echo "無法清除 Laravel 快取。"
fi

echo "所有服務已關閉並且快取已清除。"
