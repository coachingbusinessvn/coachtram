#!/bin/sh
# setup.sh — Cài đặt WordPress + seed data
# Chạy bên trong container cli:
#   docker compose run --rm cli sh /docker/setup.sh

set -e

WP="wp --allow-root --path=/var/www/html"
WP_CONFIG="/var/www/html/wp-config.php"

echo ""
echo "════════════════════════════════════════"
echo "  Edina Trâm V2 — Setup & Seed"
echo "════════════════════════════════════════"

# ── 1. Chờ WordPress container tạo wp-config.php ──
# wordpress:latest tự tạo wp-config.php khi khởi động lần đầu.
# cli phải đợi file này tồn tại trước khi dùng WP-CLI.
echo "⏳ Chờ wp-config.php từ WordPress container..."
TRIES=0
until [ -f "$WP_CONFIG" ]; do
  TRIES=$((TRIES + 1))
  if [ $TRIES -gt 30 ]; then
    echo "✗ Timeout: WordPress container chưa tạo wp-config.php sau 60s."
    echo "  Chạy 'docker compose logs wordpress' để kiểm tra."
    exit 1
  fi
  sleep 2
done
echo "✅ wp-config.php OK"

# ── 2. Chờ DB thực sự sẵn sàng (dùng PHP để tránh SSL issue của mysql CLI) ──
echo "⏳ Chờ database sẵn sàng..."
until php -r "
  \$db = @new mysqli('db', 'wp', 'wp', 'wordpress');
  if (\$db->connect_error) { exit(1); }
  echo 'ok';
" 2>/dev/null | grep -q ok; do
  sleep 2
done
echo "✅ Database OK"

# ── 2. Cài đặt WordPress (bỏ qua nếu đã cài) ─
if ! $WP core is-installed 2>/dev/null; then
  echo "🔧 Cài đặt WordPress core..."
  $WP core install \
    --url="http://localhost:8080" \
    --title="Edina Trâm — F&B Startup Coach" \
    --admin_user="admin" \
    --admin_password="admin123" \
    --admin_email="admin@coachtram.com" \
    --skip-email
  echo "✅ WordPress đã cài đặt"
else
  echo "ℹ️  WordPress đã cài sẵn — bỏ qua cài đặt core"
fi

# ── 3. Kích hoạt theme ───────────────────────
echo "🎨 Kích hoạt theme edina-tram-v2..."
$WP theme activate edina-tram-v2

# ── 4. Cài đặt cơ bản ───────────────────────
echo "⚙️  Cấu hình WordPress..."
$WP option update blogdescription "F&B Startup Coach · ICF PCC"
$WP option update timezone_string "Asia/Ho_Chi_Minh"
$WP option update date_format "d/m/Y"
$WP option update time_format "H:i"
$WP option update permalink_structure "/%postname%/"

# ── 5. Xoá dữ liệu mặc định ─────────────────
echo "🗑️  Dọn dẹp dữ liệu mặc định..."
$WP post delete 1 --force 2>/dev/null || true  # Hello world post
$WP post delete 2 --force 2>/dev/null || true  # Sample page
$WP comment delete 1 --force 2>/dev/null || true

# ── 6. Seed data ─────────────────────────────
echo "🌱 Seed content, pages & CPT..."
$WP eval-file /docker/seed.php

# ── 7. Flush rewrite rules ───────────────────
echo "🔄 Flush permalink..."
$WP rewrite flush --hard

echo ""
echo "════════════════════════════════════════"
echo "  ✅ Hoàn tất!"
echo "  🌐  http://localhost:8080"
echo "  🔐  http://localhost:8080/wp-admin"
echo "       User: admin / admin123"
echo "════════════════════════════════════════"
echo ""
