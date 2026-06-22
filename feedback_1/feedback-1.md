# Kế hoạch chỉnh sửa website Edina Trâm - Feedback 1

## 1. Tóm tắt mục tiêu

- Website đang dùng theme chính: `wp-theme/edina-tram-v2`.
- Giữ nguyên các đường dẫn dịch vụ hiện tại để tránh gãy link:
  - `/dich-vu-1/` đổi nội dung thành **Gói kết nối 3 buổi**.
  - `/dich-vu-2/` giữ là **Tina Awakening**.
  - `/dich-vu-3/` đổi nội dung thành **Tina Alignment**.
- Khi feedback ghi “giữ nguyên kịch bản” hoặc “đem y nguyên”, lấy nội dung từ file:
  `content/tina-awakening/90-ngay-chuyen-hoa-TINA_awakening_v3.md`.
- Bổ sung 2 trang mới:
  - `/cau-chuyen-cua-toi/`
  - `/bai-viet-cua-tram/`
- Trên thanh menu cần có thêm tab **Bài viết của Trâm** để dẫn vào thư viện bài viết này.

## 2. Lưu ý quan trọng khi đối chiếu với theme hiện tại

- Trang Tina Awakening đã có sẵn khá nhiều nội dung trong `page-dich-vu-2.php`, vì vậy chỉ chỉnh trực tiếp trang này, không tạo lại từ đầu.
- Cần sửa lỗi lệch tên field giữa frontend và phần nhập liệu admin:
  - Frontend hiện dùng: `dv2_what_*`, `dv2_letter_content`, `dv2_target_caveat`, `dv2_inst_intro`.
  - Metabox admin hiện dùng: `dv2_why_*`, các field thư ngỏ tách rời, `dv2_target_quote`, `dv2_inst_bio`.
  - Cần thống nhất lại để nội dung nhập trong admin hiển thị đúng ngoài website.
- Trang “Câu chuyện của tôi” hiện chưa có template riêng. Cần tạo mới template và metabox riêng, không chỉ dùng lại phần “Giới thiệu” trên trang chủ.

## 3. Chỉnh sửa trang Tina Awakening

### 3.1. Tăng độ nổi bật cho các câu chốt

- Các câu chốt nằm trong khung cần:
  - Font lớn hơn.
  - In đậm hơn.
  - Có khung/callout sang trọng, giống một câu tuyên ngôn quan trọng.
- Không để các câu này trông như đoạn văn thường.

### 3.2. Phần “Vì sao hành trình này ra đời?”

- Bổ sung khung câu chốt:

  > Tôi không chỉ truyền đạt lý thuyết chuyển hoá. Tôi đã đi qua đúng con đường mà bạn đang đi.

- Câu này lấy từ kịch bản và nên hiển thị như một callout nổi bật.

### 3.3. Phần “Vì sao khủng hoảng cứ quay lại?”

- Trong phần mô tả đầu section, bỏ câu bắt đầu bằng:

  > Nỗi đau quay lại...

- Ý này không bỏ hẳn, mà chuyển xuống một khung riêng bên dưới 2 cột so sánh.
- Thêm khung mới bên dưới 2 cột so sánh:

  > Khủng hoảng quay lại vì tiềm thức - nền tảng sống bên trong bạn - chưa được tái cấu trúc.

### 3.4. Cột “Khi chỉ xử lý phần ngọn”

- Sửa câu có đoạn “Bạn tự hỏi phải chăng...”.
- Bỏ cụm “tự hỏi phải chăng”.
- Ý sau khi sửa vẫn phải nói rõ khách hàng cảm thấy mình chưa đủ cố gắng, chưa đủ kỷ luật, chưa đủ tốt.

### 3.5. Cột “TINA làm việc ở tầng sâu hơn”

- Trong cột này, trước các gạch đầu dòng, thêm câu:

  > Chuyển hoá chỉ bền vững khi ba tầng cùng thay đổi.

- Sau đó mới liệt kê 3 tầng:
  - Nhận thức được khai mở.
  - Hành vi được làm mới.
  - Nghiệp lực / nhân cách sống được hoá giải.

### 3.6. Thêm câu chốt mạnh dưới phần so sánh

- Thêm một khung nổi bật:

  > Tôi không chỉ giúp bạn ổn hơn. Tôi giúp bạn thoát khỏi vòng lặp khiến bạn cứ quay lại bế tắc cũ.

- Câu này cần có cảm giác khẳng định mạnh, không trình bày như đoạn giải thích phụ.

### 3.7. Phần “Chuyển hoá thực sự”

- Phần “Thế nào là một sự chuyển hoá thật sự?” cần đưa về **trang chủ**.
- Trên trang Tina Awakening, bỏ cách mở đầu kiểu:

  > 90 ngày này không phải một khoảnh khắc “à há”...

- Khi chuyển sang trang chủ, dùng đúng tinh thần 6 dấu hiệu trong kịch bản.
- Các câu cần giữ đúng ý từ kịch bản:
  - “vai trò của tôi là giúp bạn nhìn rõ”
  - “Diễn ra âm thầm bên trong”
  - “Được kích hoạt bởi một biến cố giàu cảm xúc”
  - “Là tấm vé một chiều”

### 3.8. Thêm phần mới: “Điều gì khiến 90 ngày với TINA Awakening trở nên khác biệt?”

- Vị trí đặt: ngay sau phần “TINA Awakening dành cho bạn nếu / không dành cho bạn nếu”.
- Tên section mới:

  > Điều gì khiến 90 ngày với TINA Awakening trở nên khác biệt?

- Nội dung lấy nguyên từ phần “Tại sao chương trình này tốt cho bạn?” trong file kịch bản.
- Các ý chính cần có:
  - Hành trình 1:1, may đo riêng cho từng người.
  - Bốn thế giới trong một người đồng hành: Tâm lý học, Khai vấn, Tâm linh, Tài chính.
  - Không gian an toàn, kiên nhẫn, không phán xét.
  - Không chỉ thấu hiểu mà còn có công cụ.
  - Người đồng hành đã đi qua chính con đường ấy.

### 3.9. Phần testimonial của Tina Awakening

- Giữ nguyên phần testimonial như trong kịch bản đã viết.
- Không tự rút gọn hoặc viết lại nếu chưa có yêu cầu riêng.
- Vẫn dùng taxonomy/cụm testimonial hiện tại của theme, nhưng nội dung cần đúng với kịch bản.

## 4. Chỉnh sửa trang chủ

### 4.1. Vai trò của trang chủ

- Trang chủ cần gọn hơn, tập trung vào:
  - Định vị thương hiệu cá nhân Edina Trâm.
  - Giới thiệu tổng quan hệ sinh thái chuyển hoá.
  - Dẫn người đọc sang các trang riêng để đọc sâu hơn.

### 4.2. Bố cục trang chủ đề xuất

- Banner mở đầu:
  - Tiêu đề: “Cảm ơn bạn đã có mặt ở đây”.
  - Thông điệp chân thực về hành trình chuyển hoá.
- CTA chính:
  - “Khám phá dịch vụ”
  - Cuộn xuống phần giới thiệu 3 chương trình.
- Phần “Vì sao hành trình này ra đời?”
- Phần “Gốc rễ của sự chuyển hoá”.
- Phần “Chuyển hoá thực sự là gì?” dùng 6 dấu hiệu từ kịch bản.
- Hình ảnh signature:
  - Dùng ảnh `assets/images/tina-visual-triangle.png`.
  - Chỉ hiển thị biểu trưng ba tam giác chuyển hoá.
  - Không cần giải thích quá dài trên trang chủ.
- Hệ sinh thái dịch vụ:
  - Gói kết nối 3 buổi.
  - Tina Awakening.
  - Tina Alignment.
- Testimonials:
  - Hiển thị 3 phản hồi nổi bật nhất từ chương trình Awakening.

## 5. Trang “Câu chuyện của tôi”

### 5.1. Mục tiêu

- Tách riêng thành một trang để kể câu chuyện thương hiệu cá nhân.
- Giúp người chưa biết Edina Trâm hiểu:
  - Trâm là ai.
  - Vì sao Trâm làm công việc này.
  - Vì sao Trâm đủ trải nghiệm để đồng hành cùng họ.

### 5.2. Cấu trúc nội dung

- Gộp các phần:
  - “Người đồng hành”.
  - “Đôi nét về Edina Trâm”.
  - Thông tin lý lịch, nền tảng học tập, số giờ tư vấn/huấn luyện.
- Cấu trúc theo công thức 3S:
  - Story: câu chuyện cá nhân.
  - Solution: Trâm đã chuyển hoá và tìm ra hướng đi như thế nào.
  - Success: Trâm đồng hành và tạo giá trị cho người khác ra sao.

### 5.3. Các chi tiết cần chỉnh theo feedback

- Dòng:

  > Chân thực - Thấu hiểu - Truyền cảm hứng

  cần thêm dòng tiếng Anh nhỏ, in nghiêng:

  > Authenticity - Compassionate - Inspiration

- Câu bắt đầu bằng:

  > Điều thú vị ở Edina Trâm...

  cần trình bày như lời testimonial:
  - In nghiêng.
  - Ghi attribution:

    > chị Mai Hương - Giám đốc Chiến lược khách hàng, cty TNT

- Cập nhật các chỉ số:
  - `20+ năm kinh nghiệm`
  - `30+ đất nước`
  - `7,500+ giờ học tập`
  - `1000+ giờ huấn luyện, đào tạo`

## 6. Trang “Bài viết của Trâm”

- Tạo trang `/bai-viet-cua-tram/`.
- Đây là một tab/trang riêng trên menu chính, tên hiển thị: **Bài viết của Trâm**.
- Vai trò của trang này là quy hoạch lại các bài viết lẻ tẻ chị Trâm từng viết trên Facebook theo từng nhóm chủ đề rõ ràng.
- Thiết kế như thư viện bài viết cá nhân, không phải blog nội bộ phức tạp ở giai đoạn đầu.
- Phân loại theo nhóm chủ đề, ví dụ:
  - Chữa lành.
  - Thấu hiểu bản thân.
  - Chuyển hoá tâm thức.
- Mỗi bài viết hiển thị dưới dạng card ngắn gọn.
- Khi click vào bài viết, người đọc được dẫn sang bài tương ứng trên Substack.
- Giai đoạn đầu có thể nhập thủ công danh sách bài viết và link Substack trong admin/theme setting; chưa cần đồng bộ tự động API.
- Mỗi card bài viết nên có:
  - Chủ đề.
  - Tiêu đề bài.
  - Mô tả ngắn.
  - Link Substack.
- Không cần import toàn bộ nội dung Substack vào website ở giai đoạn này.

## 7. Cấu trúc menu và footer

### 7.1. Menu chính

- Cập nhật menu chính thành:
  - Trang chủ.
  - Câu chuyện của tôi.
  - Bài viết của Trâm.
  - Gói kết nối 3 buổi.
  - Tina Awakening.
  - Tina Alignment.

### 7.2. Footer

- Footer cũng cần dùng cùng hệ tên mới.
- Không để sót tên dịch vụ cũ.

### 7.3. Các mục cần ẩn hoàn toàn

- Ẩn toàn bộ dịch vụ chưa ra mắt hoặc không còn phù hợp:
  - Tina Anchoring.
  - Business Mastery.
  - Các gói tương lai khác nếu có.
- Không hiển thị trong:
  - Menu.
  - Footer.
  - Trang chủ.
  - Card dịch vụ.
  - Demo import nếu có.

## 8. Chỉnh 3 trang dịch vụ

### 8.1. `/dich-vu-1/` - Gói kết nối 3 buổi

- Đổi nội dung hiện tại thành chương trình nhập môn.
- Mục tiêu: giúp khách hàng bắt đầu kết nối và tìm hiểu bản thân.
- Thời lượng:
  - 3 ngày.
  - 3 phiên kết nối.
- Giá hiển thị:

  > 3.000.000 VNĐ

### 8.2. `/dich-vu-2/` - Tina Awakening

- Giữ là chương trình chuyên sâu 12 tuần / 90 ngày.
- Hiển thị rõ:
  - 12 modules.
  - Sau 90 ngày bạn đạt được gì.
  - Dành cho bạn nếu...
  - Không dành cho bạn nếu...
  - Phần khác biệt của 90 ngày với Tina Awakening.
  - Testimonials riêng của Awakening.

### 8.3. `/dich-vu-3/` - Tina Alignment

- Đổi nội dung từ Business Mastery sang Tina Alignment.
- Thời lượng:
  - 6 tháng đến 1 năm.
- Trọng tâm:
  - Đồng hành hiện thực hoá các mục tiêu hành động.
  - Bám theo tầm nhìn 5-10 năm và mục tiêu được xác định từ module 10 của Tina Awakening.
- Cần có phần riêng:
  - Dành cho bạn nếu...
  - Không dành cho bạn nếu...

## 9. Hệ thống đặt lịch và form qualify

### 9.1. Không dùng một form chung cho tất cả dịch vụ

- Mỗi chương trình cần có form riêng.
- Lý do:
  - Khách hàng không bị rối bởi quá nhiều lựa chọn.
  - Dữ liệu gửi về email hoặc Google Sheets được phân loại tự động.
  - Người vận hành không cần đọc thủ công từng email để biết khách quan tâm chương trình nào.

### 9.2. Các form cần có

- `first_connection`: buổi kết nối đầu tiên miễn phí.
- `connect_3`: Gói kết nối 3 buổi.
- `awakening`: Tina Awakening.
- `alignment`: Tina Alignment.

### 9.3. Điều hướng CTA

- First Connection:
  - `/lien-he/?program=first-connection`
- Gói kết nối 3 buổi:
  - `/lien-he/?program=connect-3`
- Tina Awakening:
  - `/lien-he/?program=awakening`
- Tina Alignment:
  - `/lien-he/?program=alignment`

### 9.4. Luồng qualify

- Khách điền form đăng ký theo đúng chương trình.
- Fluent Forms xử lý logic qualify.
- Nếu đạt điều kiện:
  - Hiển thị hoặc chuyển hướng sang lịch trống để đặt lịch tư vấn.
- Nếu chưa phù hợp:
  - Chuyển sang hướng nhẹ hơn, ví dụ tải eBook hoặc nhận tài nguyên miễn phí.

## 10. Phễu eBook

- Bổ sung khu vực tải eBook trên web.
- Vai trò:
  - Là quà tặng miễn phí cho First Connection.
  - Là phễu giúp khách tự đánh giá mức độ phù hợp về tư duy trước khi book lịch 1-1.
- Nội dung quản trị cần chỉnh được:
  - Tiêu đề.
  - Mô tả.
  - Ảnh bìa.
  - Nút CTA.
  - Link file PDF.
- Giai đoạn đầu có thể để placeholder:
  - Chương 1.
  - Bản rút gọn.
  - File preview.
- Sau này thay bằng bản PDF đầy đủ mà không cần sửa code.

## 11. Định hướng UI/UX

- Tránh các mảng màu phẳng lì, đơn điệu.
- Thêm chiều sâu bằng:
  - Gradient tinh tế.
  - Pattern chìm nhẹ.
  - Glass surface.
  - Viền mảnh.
  - Bóng mềm.
  - Các khung quote/callout sang trọng.
- Vẫn giữ tinh thần visual hiện tại của Edina Trâm:
  - Xanh emerald.
  - Nền pearl ivory.
  - Nhấn vàng gold.
  - Typography thanh lịch.
  - Cảm giác cao cấp, mềm, uyển chuyển.
- Các khung câu chốt cần giống editorial quote, không giống card thông tin thông thường.
- Trang chủ cần thoáng, không quá dày chữ.
- Mobile phải dễ đọc, không để card hoặc chữ bị chồng lên nhau.

## 12. Kiểm thử sau khi làm

- Chạy kiểm tra PHP:
  - `php -l wp-theme/edina-tram-v2/*.php`
  - `php -l wp-theme/edina-tram-v2/inc/*.php`
- Kiểm tra admin metabox Tina Awakening:
  - Nhập thử nội dung.
  - Đảm bảo frontend `/dich-vu-2/` hiển thị đúng nội dung vừa nhập.
- Kiểm tra các trang trên desktop và mobile:
  - Trang chủ.
  - Câu chuyện của tôi.
  - Bài viết của Trâm.
  - Gói kết nối 3 buổi.
  - Tina Awakening.
  - Tina Alignment.
  - Trang liên hệ với từng `program`.
- Tìm và loại bỏ các tên không được hiển thị:
  - Business Mastery.
  - Tina Anchoring.
  - Các dịch vụ tương lai chưa ra mắt.
- Kiểm tra CTA:
  - Mỗi CTA đi đúng form tương ứng.
  - Không có CTA dịch vụ trỏ sai sang form chung.
- Kiểm tra testimonials:
  - Tina Awakening dùng đúng nhóm testimonial của `dich-vu-2`.
  - Trang chủ chỉ hiển thị 3 testimonial nổi bật đã chọn.

## 13. Giả định khi triển khai

- File `content/tina-awakening/90-ngay-chuyen-hoa-TINA_awakening_v3.md` là nguồn nội dung chính cho phần kịch bản Tina Awakening.
- Giữ nguyên URL cũ theo yêu cầu, chỉ đổi nhãn và nội dung.
- Fluent Forms vẫn là công cụ form chính.
- Phân loại email, Google Sheets và logic qualify được cấu hình trong Fluent Forms.
- Theme chịu trách nhiệm hiển thị đúng form theo `program`.
- Substack chỉ được link ra ngoài, chưa import toàn bộ bài viết vào WordPress.
