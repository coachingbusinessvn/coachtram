# CLAUDE.md — Dự án CoachTram (Edina Trâm)

## Tổng quan dự án

Website cá nhân của Coach Edina Trâm – F&B Startup Coach (ICF PCC).  
Stack: HTML/CSS/JS tĩnh (`static-site/`) làm source of truth; sau đó port sang WordPress theme (`wp-theme/edina-tram-v3/`).

## Quy trình làm việc

1. **Làm trên `static-site/` trước** — HTML/CSS/JS thuần, không cần build step.
2. **Duyệt với chị Trâm** — trước khi port sang WordPress.
3. **Port sang `wp-theme/edina-tram-v3/`** — không ghi đè các version cũ.

## Cấu trúc thư mục quan trọng

```
static-site/           ← Source of truth — làm ở đây trước
  index.html           ← Trang chủ (gộp câu chuyện)
  coaching-cung-edina.html  ← Gộp 3 gói (Awareness/Awakening/Alignment)
  bai-viet-cua-tram.html
  testimonial.html     ← Trang mới (cần tạo)
  thanh-toan.html      ← Trang mới (cần tạo)
  lien-he.html
  css/
  js/
    components.js      ← Web Components: <site-header>, <glow-blobs>, <site-footer>; NAV_ITEMS ở đây
    sections.js        ← <site-section> nạp partial
    main.js
  sections/            ← Partial HTML tái sử dụng

static-site-v3/        ← Draft v3 (tham khảo)

wp-theme/
  edina-tram-v3/       ← Theme WordPress hiện tại (v3)
  edina-tram-v2/       ← Legacy
  edina-tram/          ← Legacy

feedback3/             ← Tài liệu feedback đợt 3 (nguồn yêu cầu)
  feedback-3.md        ← Kế hoạch chi tiết — đọc trước khi làm
  ke-hoach-cac-trang.md
  converted/           ← Nội dung đã bóc tách từ .docx
```

## Kiến trúc nav (mục tiêu Feedback 3)

4 tab: **Trang chủ** · **Bài viết** · **Coaching cùng Edina** · **Testimonial**  
Nav được định nghĩa trong `static-site/js/components.js` → `NAV_ITEMS`.

## Nguyên tắc code

- Không dùng framework (React, Vue, etc.) — vanilla JS + CSS thuần.
- Tái sử dụng `<site-header>`, `<site-footer>`, `<glow-blobs>` Web Components.
- Mọi thay đổi style: ưu tiên CSS variables trong `css/design-system.css` trước khi thêm rule mới.
- Không viết comment giải thích WHAT — chỉ viết khi WHY không hiển nhiên.
- Không thêm abstractions, error handling, hay features ngoài yêu cầu.

## Quy ước file

- Tên file: kebab-case tiếng Việt không dấu (ví dụ: `coaching-cung-edina.html`).
- Mỗi trang HTML có `<site-header>` và `<site-footer>` qua Web Component.

## Tài liệu tham khảo nội dung

Mọi nội dung chữ lấy từ `feedback3/converted/*.md`:
- `00-REQUEST-tong-hop.md` — 7 yêu cầu tổng thể (kim chỉ nam)
- `01-trang-chu-va-cau-chuyen.md` — Trang chủ
- `02-coaching-cung-edina.md` — Trang coaching (3 gói gộp)
- `03-bai-viet.md` — Trang bài viết
- `04-testimonial-tab.md` — Layout testimonial
- `05-testimonial-collection.md` — Kho testimonial đầy đủ

## Luồng Book lịch

Nút CTA → chọn gói → form Questionnaire (bắt buộc điền hết) → Submit → Google Calendar link.  
Thanh toán KHÔNG nằm trong luồng book — có trang `thanh-toan.html` riêng.
