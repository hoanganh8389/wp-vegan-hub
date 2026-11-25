# Cấu hình ngành chay — phần Vegan Hub thêm vào OPEN-HUB CORE

<!-- [2026-11-25 01:06 PM Johnny Chu - Chu Hoàng Anh] HUB-VEGAN D-2 — lớp cấu hình ngành chay (OPEN-HUB-CORE §10): chỉ dữ liệu, không mã lõi. Thiết kế, chưa code. -->

> Chuẩn: [OPEN-HUB-CORE §10](https://github.com/hoanganh8389/open-hub/blob/main/docs/canon/OPEN-HUB-CORE.md). Mọi thứ dưới đây là **dữ liệu cấu hình** trong `data/`; không có bảng, module hay lớp lõi nào trong repo này.

## 1. Thương hiệu

| | |
|---|---|
| Tên | Vegan Hub |
| Khẩu hiệu | Vì sức khoẻ con người · Vì hành tinh xanh |
| Màu nhấn | `#1f7a3a` (đậm `#145a29`, nền nhạt `#e8f4ec`) — R-HUB-13 |
| Leader ngành | **chờ chốt** (tên tổ chức đứng tên Hub) |

## 2. Module bật

Bật cả 14, trừ **10 · Đối tác & nhà tài trợ** (tắt cho tới khi có đối tác đầu tiên).

## 3. Thuật ngữ

| Core | Vegan Hub |
|---|---|
| hội viên | cơ sở chay hội viên |
| sản phẩm nổi bật | món / sản phẩm nổi bật |
| chiến dịch theo dịp | ngày rằm, mùng một, Vu Lan, Tết chay |
| tour | Vegan Tour |

## 4. Phân khúc

Nhà hàng, quán chay · Cửa hàng thực phẩm chay · Sản xuất thực phẩm chay · Bếp suất ăn, giao cơm chay · Thiền viện, dưỡng sinh · Nông trại, nguồn cung (`data/segments.php`).

## 5. Bộ tiêu chuẩn (Certified) — bản nháp, cần chuyên gia ngành duyệt

| Bộ | Số tiêu chí | Hiệu lực | Ví dụ tiêu chí |
|---|---|---|---|
| Thuần chay | 12 | 12 tháng | không nguyên liệu động vật; dụng cụ riêng; nhà cung cấp gia vị có cam kết |
| Thực dưỡng | 15 | 12 tháng | thực đơn theo nguyên tắc thực dưỡng; nguồn gạo lứt rõ ràng |
| Bếp sạch chay | 20 | 6 tháng | vệ sinh an toàn thực phẩm; lưu mẫu; nguồn nước |

Nội dung tiêu chí ở bảng trên là **ví dụ để vẽ mockup**, không phải tiêu chuẩn đã ban hành.

## 6. Học viện & Coach

| Lộ trình | Chuyên môn Coach |
|---|---|
| Giá vốn món & định mức nguyên liệu | Vận hành nhà hàng chay |
| Kho nguyên liệu theo hạn dùng | Kế toán, giá vốn |
| Marketing ngày rằm & trợ lý AI chăm khách | Marketing, AI chăm sóc khách |
| Hồ sơ OCOP cho thực phẩm chay | Phát triển sản phẩm |

Lộ trình 90 ngày mẫu: Khởi tạo (hồ sơ, bộ công nghệ, Coach, đánh giá hiện trạng) → Chuẩn hoá (POS + sổ, kho nguyên liệu, Verified, hồ sơ bản đồ) → Tăng trưởng (chiến dịch ngày rằm, AI chăm khách) → Nâng tầm (Certified, kết nối giao thương).

## 7. Chiến dịch mẫu

Ăn chay ngày rằm (hằng tháng) · Tuần lễ ẩm thực chay (theo thành phố) · Vegan Tour (cuối tuần) · Voucher hội viên dùng chéo.

## 8. Trường hồ sơ ngành (`bizcity_hub_member_fields`)

`cert` chứng nhận · `menu` món nổi bật · `offer` ưu đãi hội viên · `serve` hình thức phục vụ — chi tiết: [HO-SO-CO-SO-BAN-DO.md](HO-SO-CO-SO-BAN-DO.md).

## 9. Ứng dụng bật sẵn

POS · Kế toán · Kho · CRM · Website · Trợ lý AI (dùng thử 30 ngày). Tích điểm, hoá đơn điện tử, mã vạch: chỉ thêm khi repo tương ứng nghiệm thu (R-CANON-10).
