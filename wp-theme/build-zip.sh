#!/bin/bash
# ============================================================
# build-zip.sh — Tạo file ZIP để upload lên WordPress
# Usage: cd wp-theme && bash build-zip.sh
# Output: edina-tram-v2.zip
# ============================================================

set -e

THEME_DIR="edina-tram-v2"
OUTPUT="edina-tram-v2.zip"

# Kiểm tra thư mục theme tồn tại
if [ ! -d "$THEME_DIR" ]; then
    echo "❌ Không tìm thấy thư mục $THEME_DIR"
    echo "   Hãy chạy script từ thư mục wp-theme/"
    exit 1
fi

# Xóa file ZIP cũ nếu có
[ -f "$OUTPUT" ] && rm "$OUTPUT"

echo "📦 Đang tạo $OUTPUT..."

# Tạo ZIP, loại bỏ files không cần thiết
zip -r "$OUTPUT" "$THEME_DIR" \
    -x "$THEME_DIR/.DS_Store" \
    -x "$THEME_DIR/**/.DS_Store" \
    -x "$THEME_DIR/.git/*" \
    -x "$THEME_DIR/.gitignore" \
    -x "$THEME_DIR/node_modules/*" \
    -x "$THEME_DIR/.vscode/*" \
    -x "$THEME_DIR/**/__MACOSX/*" \
    -x "$THEME_DIR/*.log" \
    -x "$THEME_DIR/.env"

SIZE=$(du -h "$OUTPUT" | cut -f1)
echo ""
echo "✅ Thành công! File: $OUTPUT ($SIZE)"
echo ""
echo "📋 Hướng dẫn cài đặt:"
echo "   1. WP Admin → Giao diện → Themes → Tải theme lên"
echo "   2. Chọn file $OUTPUT → Cài đặt → Kích hoạt"
echo "   3. Vào Giao diện → Nhập Demo → Click 'Nhập nội dung mẫu'"
echo "   4. ✅ Done!"
