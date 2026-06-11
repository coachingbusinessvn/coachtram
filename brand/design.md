# Brand Blueprint: Edina Trâm

Tài liệu này chứa thông tin thiết kế hệ thống nhận diện và hướng dẫn cấu trúc giao diện số (UI/UX) cho thương hiệu **Edina Trâm**, được trích xuất trực tiếp từ Brand Guidelines và Website Color Application.

---

## 1. Brand Identity & Tone (Nhận diện & Phong cách thương hiệu)

*   **Tên thương hiệu**: Edina Trâm (Professional Coach)
*   **Giá trị cốt lõi (Brand Values)**:
    *   **Elegance (Tinh tế)**: Sang trọng, chăm chút tỉ mỉ trong từng chi tiết.
    *   **Quality (Chất lượng)**: Độc bản, mang lại giá trị bền vững vượt trội.
    *   **Authenticity (Chân thực)**: Trung thực, tin cậy và giữ vững bản sắc riêng.
    *   **Timeless (Trường tồn)**: Giá trị được bảo chứng lâu dài theo thời gian.
*   **Giọng điệu truyền thông (Tone of Voice)**:
    *   **Sophisticated (Tinh tế)**: Sử dụng ngôn từ trang nhã, lịch thiệp và tôn trọng.
    *   **Confident (Tự tin)**: Thể hiện uy tín và năng lực chuyên môn một cách tự nhiên.
    *   **Approachable (Gần gũi)**: Gieo niềm tin và sự đồng hành, kết nối sâu sắc.
    *   **Inspiring (Cảm hứng)**: Khơi gợi nguồn năng lượng tích cực, hướng đến cuộc sống chất lượng và tinh tế.
*   **Phong cách trực quan (Visual Style)**: Sang trọng (Luxury), Trường tồn (Timeless), Tinh luyện (Refined), Tự nhiên (Natural), Tinh tế (Sophisticated).

---

## 2. Color Palette (Bảng màu hệ thống)

Dữ liệu màu sắc được đồng bộ từ bản phân tích bảng màu thương hiệu (Brand Guideline) và phiên bản màu tối ưu hiển thị web (Website Color Application).

| Tên Token màu | Brand Hex | Web Hex | Vai trò & Hướng dẫn sử dụng |
| :--- | :--- | :--- | :--- |
| **Pearl Ivory** | `#FBF8F0` | `#FBF8F0` | Nền chính của toàn website (Main Background) |
| **Soft Emerald Mist** | `#EAF2EC` | `#ECF5F0` | Nền phụ, các section xen kẽ, ô thông tin (Secondary Background) |
| **Royal / Fresh Emerald** | `#005B45` | `#0B8A66` | Màu thương hiệu chủ đạo, tiêu đề chính, các nút CTA quan trọng |
| **Emerald Depth/Noir** | `#012E24` | `#014F3D` | Màu lục đậm, dùng cho footer, các khối thông tin có độ tương phản cao |
| **Royal Gold** | `#C8A244` | `#C8A244` | Màu nhấn trang trí, đường line mỏng, icon viền nét thanh lịch |
| **Champagne Glow** | `#F1D89A` | `#F1D89A` | Màu highlight, trạng thái hover của các nút, nút phụ |
| **Deep Forest Ink** | `#071A15` | `#0B1F19` | Màu chữ nội dung chính (Body Text) để đảm bảo độ tương phản đọc |
| **Pale Gold Sand** | `#DED3B8` | `#DED3B8` | Màu viền (border), đường phân chia section tinh tế |

---

## 3. Typography (Hệ thống Phông chữ)

*   **Phông chữ tiêu đề (Heading Font)**: `Cormorant Garamond` (Elegant, Timeless, Refined)
    *   *Tiêu đề lớn (H1)*: Regular, 64px (`text-6xl font-normal font-heading`)
    *   *Tiêu đề mục (H2)*: Medium, 40px (`text-4xl font-medium font-heading`)
    *   *Tiêu đề nhỏ (H3)*: SemiBold, 28px (`text-3xl font-semibold font-heading`)
*   **Phông chữ nội dung & giao diện (Body/UI Font)**: `Be Vietnam Pro` (Modern, Clean, highly legible)
    *   *Tiêu đề phụ (Subheading)*: Medium, 18px (`text-lg font-medium font-body`)
    *   *Văn bản chính (Body Text)*: Regular, 16px (`text-base font-normal font-body`)
    *   *Chú thích (Caption)*: Regular, 12px (`text-xs font-normal font-body`)

---

## 4. UI Elements & Aesthetics (Thành phần giao diện & Mỹ thuật)

*   **Bố cục (Layout)**: Tối giản, thanh lịch, tạo nhiều khoảng thở (generous whitespace). Kết hợp các khối kính mờ (glassmorphism) nhẹ nhàng.
*   **Nút bấm (Buttons)**:
    *   *Nút chính (Primary)*: Nền xanh `Royal Emerald` (`#005B45` / `#0B8A66`), chữ trắng hoặc `Pearl Ivory` (`#FBF8F0`). Bo góc nhỏ nhẹ (`rounded-md`).
    *   *Nút phụ (Secondary)*: Không nền, viền vàng `Royal Gold` (`#C8A244`), chữ `Royal Gold`. Khi hover: đổi nền thành `Champagne Glow` (`#F1D89A`) hoặc chuyển sắc nhẹ.
*   **Đường kẻ & Viền (Borders & Dividers)**: Rất mỏng, nét mảnh thanh nhã sử dụng màu `Pale Gold Sand` (`#DED3B8`).
*   **Biểu tượng (Icons)**: Sử dụng các icon dạng nét (outline) thanh mảnh với màu vàng `Royal Gold` (`#C8A244`).

---

## 5. Tailwind CSS Configuration Guide

Cấu hình mẫu mở rộng (extend) cho tệp `tailwind.config.js` để dễ dàng đồng bộ các class tiện ích:

```javascript
module.exports = {
  theme: {
    extend: {
      colors: {
        brand: {
          bg: {
            primary: '#FBF8F0',     // Pearl Ivory
            secondary: '#EAF2EC',   // Soft Emerald Mist (Brand)
            secondaryWeb: '#ECF5F0',// Soft Emerald Mist (Web)
          },
          emerald: {
            DEFAULT: '#005B45',     // Royal Emerald (Brand)
            light: '#0B8A66',       // Fresh Emerald (Web)
            dark: '#012E24',        // Emerald Noir (Brand)
            depth: '#014F3D',       // Emerald Depth (Web)
          },
          gold: {
            DEFAULT: '#C8A244',     // Royal Gold
            light: '#F1D89A',       // Champagne Glow (Hover/Accent)
            sand: '#DED3B8',        // Pale Gold Sand (Border/Divider)
          },
          text: {
            primary: '#071A15',     // Deep Forest Ink (Brand)
            primaryWeb: '#0B1F19',  // Deep Forest Ink (Web)
          }
        }
      },
      fontFamily: {
        heading: ['"Cormorant Garamond"', 'serif'],
        body: ['"Be Vietnam Pro"', 'sans-serif'],
      },
      fontSize: {
        'brand-h1': ['64px', { lineHeight: '1.2' }],
        'brand-h2': ['40px', { lineHeight: '1.3' }],
        'brand-h3': ['28px', { lineHeight: '1.4' }],
        'brand-sub': ['18px', { lineHeight: '1.5' }],
        'brand-body': ['16px', { lineHeight: '1.6' }],
        'brand-caption': ['12px', { lineHeight: '1.4' }],
      }
    },
  },
}
```
