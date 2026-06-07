#!/bin/bash
set -e

cd /var/www/stbapontianak

echo "🔄 Pulling latest code..."
git pull origin main

echo "📦 Installing dependencies..."
COMPOSER_ALLOW_SUPERUSER=1 COMPOSER_MEMORY_LIMIT=-1 \
  /usr/bin/php /usr/local/bin/composer install \
  --no-dev --optimize-autoloader --no-interaction

echo "🗄️ Running migrations..."
/usr/bin/php artisan migrate --force

echo "⚡ Clearing cache..."
/usr/bin/php artisan config:cache
/usr/bin/php artisan route:cache
/usr/bin/php artisan view:cache

echo "🔗 Linking storage..."
/usr/bin/php artisan storage:link 2>/dev/null || true

echo "🔑 Fixing permissions..."
chown -R www-data:www-data /var/www/stbapontianak
chmod -R 775 storage bootstrap/cache

echo "♻️ Restarting PHP-FPM..."
systemctl restart php8.3-fpm

echo "✅ Deploy selesai! $(date '+%Y-%m-%d %H:%M:%S')"
