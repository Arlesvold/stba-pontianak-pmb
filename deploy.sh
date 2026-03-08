#!/bin/bash
set -e

cd /www/wwwroot/stbapontianak.ac.id

echo "🔄 Pulling latest code..."
git pull origin main

echo "📦 Installing dependencies..."
COMPOSER_ALLOW_SUPERUSER=1 COMPOSER_MEMORY_LIMIT=-1 \
  /www/server/php/83/bin/php /usr/local/bin/composer install \
  --no-dev --optimize-autoloader --no-interaction

echo "🗄️ Running migrations..."
/www/server/php/83/bin/php artisan migrate --force

echo "⚡ Clearing cache..."
/www/server/php/83/bin/php artisan config:cache
/www/server/php/83/bin/php artisan route:cache
/www/server/php/83/bin/php artisan view:cache

echo "🔗 Linking storage..."
/www/server/php/83/bin/php artisan storage:link 2>/dev/null || true

echo "🔑 Fixing permissions..."
chown -R www:www /www/wwwroot/stbapontianak.ac.id
chmod -R 775 storage bootstrap/cache

echo "♻️ Restarting PHP-FPM..."
systemctl restart php-fpm-83

echo "✅ Deploy selesai! $(date '+%Y-%m-%d %H:%M:%S')"
