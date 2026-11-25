# Lịch sử phát hành

## 0.4.0 — 2026-11-25

- Mã chứng nhận `VH-CERT-<năm>-<số>` (`cert_prefix` trong `data/industry.php`). Dùng với `open-hub-client` 0.6.0.
- Ba bộ tiêu chuẩn (Thuần chay, Thực dưỡng, Bếp sạch chay) vẫn là **bản nháp** — cần chuyên gia ngành duyệt trước khi cấp giấy thật (CAU-HINH-NGANH-CHAY §5).
- Ảnh giao diện thật (dữ liệu mẫu) `docs/shots/portal/`: f3 tra cứu còn hiệu lực, f3b đã thu hồi, f3c không tìm thấy, f3d điện thoại, p3b hồ sơ có huy hiệu.

## 0.3.0 — 2026-11-25

- Chữ cổng cộng đồng ngành chay (`persona` trong `data/industry.php`, theo mockup persona đã duyệt): khẩu hiệu, tiêu đề, ba giá trị, năm quyền lợi, sáu danh mục trỏ đúng phân khúc. Dùng với `open-hub-client` 0.5.0.
- Nhãn công khai "Món / sản phẩm nổi bật" gọn lại (bỏ câu hướng dẫn dành cho admin).
- Ảnh chụp giao diện thật (dữ liệu mẫu) `docs/shots/portal/`: trang chủ, bản đồ & danh bạ, hồ sơ cơ sở, trở thành hội viên, điện thoại.

## 0.2.0 — 2026-11-25

- Chuyển sang hợp đồng ngành `bizcity_industry_hub@2` của `open-hub-client` (`data/industry.php`): thương hiệu, module (tắt 10), thuật ngữ, 6 phân khúc, 4 trường hồ sơ (`cert`, `menu`, `offer`, `serve`), 3 bộ tiêu chuẩn (bản nháp), Coach, Học viện, chiến dịch, app, tài sản tri thức (kịch bản trợ lý ngày rằm cài vào site hội viên).
- Có `open-hub-client` ⇒ chỉ đưa dữ liệu; trang "Khoá & doanh thu" riêng và hồ sơ `@1` gửi router **không chạy** (khoá, doanh thu do client + `open-hub-core` lo — R-HUB-2, R-HUB-14). Chưa có client ⇒ giữ đường `@1` cũ.
- Khởi động ở `plugins_loaded` (ưu tiên 5) để không phụ thuộc thứ tự nạp plugin.
- Test `php tests/run.php`: 9/9 — dữ liệu đạt bộ kiểm của client, không gọi lõi / Cell / Zalo / LLM, không bảng, không font viết tay.

## 0.1.0 — 2026-11-25

- Chủ chốt OH-Q1…Q4: nền tảng Hub = `open-hub-client`, lõi trung tâm = `open-hub-core` (bizcity.vn, viết mới); Coach + affiliate + My Coach; Woo; JSONL + rollup. Mockup + ảnh: O6b tuyển Coach & hoa hồng, F9 My Coach, F10 Trở thành Coach; chụp lại hồ sơ quyền lợi Hub.

- Định vị lại: Hub là trung tâm phát triển của ngành; repo là gói cấu hình ngành chay + case đầu của OPEN-HUB CLIENT. Mockup + 20 ảnh: Owner Center (14 module, 5 câu hỏi, tài nguyên & quyền lợi theo GitHub, tài sản cộng đồng, Member 360°, Coach, Marketing, xác minh & chứng nhận), frontend + My Hub + lộ trình 90 ngày, hồ sơ quyền lợi Hub cho Marketing. Tài liệu CAU-HINH-NGANH-CHAY, HO-SO-QUYEN-LOI-HUB; README sắp theo nhóm. Chưa code.

- Chủ chốt MAP-Q1…Q4: Leaflet + OpenStreetMap ghim tay; hạn xác minh 12 tháng; không vai riêng, quản trị viên hub duyệt; hồ sơ chưa có khoá không hiện.
- Thiết kế hồ sơ cơ sở + bản đồ hội viên: `docs/HO-SO-CO-SO-BAN-DO.md`, mockup `mockup/vegan-member-map.html`, 10 ảnh `docs/shots/map/` (admin danh sách, sheet xác minh, bản đồ quản trị, bản đồ công khai chỉ V4, site hội viên tự cập nhật). Chưa code.

- R-HUB-13: bỏ font viết tay ở cả hai mockup và trên site hub (ghi đè nhãn Caveat của open-hub); persona chỉ còn Manrope + IBM Plex Mono, một tông xanh, không chuyển màu. Chụp lại 10 ảnh.
- Bộ shots lõi được chủ duyệt làm chuẩn bắt buộc cho mọi hub ngành (canon CHUAN-HUB-NGANH 1.1.0, R-HUB-11).
- Mockup persona `mockup/vegan-persona.html` + 8 ảnh `docs/shots/persona/`: cổng ngành chay, bản đồ & danh bạ (trống, lỗi), hồ sơ cơ sở, trở thành hội viên, hai bản điện thoại (R-HUB-12, chờ duyệt).

- Mockup `mockup/vegan-hub.html` (5 màn, bản điện thoại, 5 trạng thái bảng điều khiển) — chờ duyệt.
- Plugin khung: hồ sơ hub `vegan` gửi `bizcity-llm-router`; trang chủ, nhận gói tặng, cộng đồng chay; 6 phân khúc dùng khuôn trang ngành của open-hub; màu nhấn xanh lá.
- Ảnh chụp mockup `docs/shots/` (11 ảnh: 5 màn, 4 trạng thái bảng điều khiển, 2 bản điện thoại); mockup mở thẳng một màn qua `#scr=…`.
- wp-admin › Vegan Hub: khoá & doanh thu theo khoá, cấp khoá dùng thử, cài đặt leader + số ngày dùng thử.
