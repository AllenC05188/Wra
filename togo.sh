#!/bin/bash

# 啟動 MariaDB 服務
echo "啟動 MariaDB 服務..."
sudo systemctl start mariadb
if [ $? -eq 0 ]; then
  echo "MariaDB 啟動成功"
else
  echo "MariaDB 啟動失敗"
  exit 1
fi

# 啟動 Laravel 開發伺服器
echo "啟動 Laravel 開發伺服器..."
cd ~/environment/WIRA_New
php artisan serve --host=0.0.0.0 --port=8080 &
if [ $? -eq 0 ]; then
  echo "Laravel 開發伺服器啟動成功"
else
  echo "Laravel 開發伺服器啟動失敗"
  exit 1
fi

# 啟動 Vite 開發伺服器
echo "啟動 Vite 開發伺服器..."
npm run dev &
if [ $? -eq 0 ]; then
  echo "Vite 開發伺服器啟動成功"
else
  echo "Vite 開發伺服器啟動失敗"
  exit 1
fi

echo "所有服務已啟動"
