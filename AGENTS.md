# AGENTS.md — Hướng dẫn cho AI Agents

## Dự án này là gì?

Website Coach Edina Trâm. Stack: HTML/CSS/JS tĩnh → WordPress theme.  
Xem `CLAUDE.md` để biết đầy đủ cấu trúc và quy trình.

## Nguyên tắc làm việc

### Trước khi bắt đầu
1. Đọc `feedback3/feedback-3.md` để hiểu kế hoạch tổng thể.
2. Đọc file `.md` tương ứng trong `feedback3/converted/` để lấy nội dung chữ chính xác.
3. Không tự đặt ra yêu cầu mới — bám sát tài liệu nguồn.

### Khi viết code
- Luôn làm trên `static-site/` trước, KHÔNG sửa `wp-theme/` trừ khi được yêu cầu rõ ràng.
- Tái sử dụng Web Components: `<site-header>`, `<site-footer>`, `<glow-blobs>`.
- Lấy NAV_ITEMS từ `static-site/js/components.js` — đó là nguồn sự thật cho điều hướng.
- Dùng CSS variables từ `static-site/css/design-system.css`; không hardcode màu/font.
- Không thêm tính năng ngoài yêu cầu. Không thêm comment thừa.

### Khi tạo trang mới
Dùng một trang HTML hiện có (ví dụ `lien-he.html`) làm template:
- Copy boilerplate, thay nội dung.
- Giữ nguyên cấu trúc `<site-header>` / `main` / `<site-footer>`.

### Khi chỉnh nav
Sửa `NAV_ITEMS` trong `static-site/js/components.js`. Mục tiêu:
```js
['Trang chủ', 'Bài viết', 'Coaching cùng Edina', 'Testimonial']
```

## Tác vụ đang dở (Feedback 3)

| Trang | File | Trạng thái |
|---|---|---|
| Trang chủ (gộp Câu chuyện) | `static-site/index.html` | Đang làm |
| Coaching cùng Edina | `static-site/coaching-cung-edina.html` | Đang làm |
| Bài viết | `static-site/bai-viet-cua-tram.html` | Cần cập nhật nội dung |
| Testimonial | `static-site/testimonial.html` | Cần tạo mới |
| Thanh toán (QR) | `static-site/thanh-toan.html` | Cần tạo mới |
| Form Book lịch | Chưa xác định file | Cần tạo mới |

## Không làm gì

- Không sửa `wp-theme/edina-tram-v2/` hay `edina-tram/` (legacy).
- Không xoá file HTML cũ (`dich-vu-1/2/3.html`, `cau-chuyen-cua-toi.html`) — redirect sau.
- Không dùng CDN JS framework nào (React, Vue, Alpine, etc.).
- Không gộp commit lớn — commit theo từng trang/tính năng.
