# Kiến trúc Vegan Hub và mạng hub ngành

<!-- [2026-11-25 10:55 AM Johnny Chu - Chu Hoàng Anh] HUB-VEGAN V-0 — kiến trúc hub ngành chay; chuẩn chung ở canon open-hub CHUAN-HUB-NGANH. -->

> Luật chung cho mọi hub ngành: [CHUAN-HUB-NGANH](https://github.com/hoanganh8389/open-hub/blob/main/docs/canon/CHUAN-HUB-NGANH.md) (R-HUB-1…10). Tài liệu này chỉ nói phần riêng của Vegan Hub và cách repo này cắm vào lõi.

<!-- [2026-11-25 01:06 PM Johnny Chu - Chu Hoàng Anh] HUB-VEGAN D-1 — định vị lại theo OPEN-HUB CORE. -->
> **Từ 2026-11-25:** một site Hub = `bizcity-llm-router` (AI Gateway / 1API) + **`open-hub-core`** (14 module chung: hội viên, Coach, học viện, xác minh & chứng nhận, marketing, doanh thu…) + `wp-vegan-hub` (chỉ cấu hình ngành chay: [CAU-HINH-NGANH-CHAY.md](CAU-HINH-NGANH-CHAY.md)). Các mục dưới mô tả bản khung v0.1.0 chạy **trước** khi có Core; khi Core ra đời, phần quản trị của repo này chuyển sang Core. Chuẩn: [OPEN-HUB-CORE](https://github.com/hoanganh8389/open-hub/blob/main/docs/canon/OPEN-HUB-CORE.md).

## 1. Bốn vai trò của hub

| Vai | Ở Vegan Hub | Mã |
|---|---|---|
| **Leader ngành** | tổ chức đầu ngành chay đứng tên hub (Cài đặt hub › leader) | `WP_Vegan_Hub::leader()` |
| **Cộng đồng ngành** | danh bạ hội viên đã đồng ý, kho mẫu ngành, module cộng đồng | `pages/hoi-vien.php` |
| **Tặng phần mềm + dùng thử** | bộ app mã nguồn mở 0đ; trợ lý AI dùng thử N ngày | `pages/goi-tang.php`, `trial_days` |
| **Cấp khoá + theo dõi doanh thu** | cấp khoá `biz-…` cho site hội viên; xem doanh thu theo khoá | wp-admin › Vegan Hub, `BizCity_Router_Industry_Hub` |

## 2. Cắm vào lõi — không chép mã lõi

```text
wp-vegan-hub
 ├─ add_action( 'bizcity_industry_hub_register' )   ─► BizCity_Router_Industry_Hub::register()   (router)
 ├─ filter bizcity_open_hub_data_site                ─► brand, tiles (logo, lưới ứng dụng)        (open-hub)
 ├─ filter bizcity_open_hub_data_pages               ─► home → pages/home.php (khoá 'file'), + goi-tang, hoi-vien
 ├─ filter bizcity_open_hub_data_industries          ─► 6 phân khúc chay, dùng lại khuôn nganh.php
 ├─ filter bizcity_open_hub_data_icons               ─► thêm biểu tượng 'leaf'
 ├─ filter bizcity_open_hub_lead_types               ─► loại biểu mẫu 'vegan-gift'
 └─ action bizcity_open_hub_enqueue + keep_styles    ─► assets/css/vegan-hub.css (chỉ 4 biến màu nhấn)
```

| Lõi | Repo | Điểm mở rộng thêm cho hub ngành (2026-11-25) |
|---|---|---|
| `bizcity-llm-router` | router | `includes/class-router-industry-hub.php` — hồ sơ hub, `issue_trial_key()`, `key_stats()`, `revenue()`, `GET bizcity/v1/hub/profile` |
| open-hub (`templates/v2`) | open-hub | khoá `file` của trang (`tpl_path()`), `brand()`, `do_action( 'bizcity_open_hub_enqueue' )`, filter `bizcity_open_hub_lead_types` |

Không có bảng mới, không option ghi khi đọc, không gọi LLM ở PHP.

## 3. Luồng một khoá

1. Cơ sở chay gửi biểu mẫu **Nhận gói** → bài riêng tư `bz_oh_lead` loại `vegan-gift` + email quản trị.
2. Leader duyệt, tạo tài khoản WordPress cho cơ sở (và site qua open-setup khi có HUB-SITE-1).
3. wp-admin › Vegan Hub › **Cấp khoá** → `BizCity_Router_Industry_Hub::issue_trial_key()` → `BizCity_Router_Auth::generate_key()` với nhãn `[vegan] <cơ sở> · <phân khúc>`. Khoá hiện một lần.
4. Cơ sở dán khoá ở bước ① "Kết nối tài khoản BizCity" của Twin Brain.
5. Cell xác thực khoá và gửi lô dùng về hub đã cấp khoá (**HUB-CELL-1**, chưa có: Cell hiện chỉ có một Hub).
6. Trang **Khoá & doanh thu** đọc `BizCity_Router_Revenue_Admin_S107::data()`, lọc theo nhãn `[vegan] `.
7. Đối soát với bizcity.vn: **HUB-REV-1** (chưa có).

## 4. Dữ liệu và quyền

| Dữ liệu | Ở đâu | Ai xem |
|---|---|---|
| khoá, gói, sổ dùng | bảng của router trên site hub (`base_prefix`) | quản trị hub |
| lead "Nhận gói" | bài riêng tư `bz_oh_lead` | quản trị hub |
| cài đặt hub | option `wp_vegan_hub_settings` (không autoload) | quản trị hub |
| dữ liệu kinh doanh của cơ sở | site của cơ sở | chỉ cơ sở |

Khoá vừa cấp nằm trong transient của người cấp tối đa 2 phút để hiện một lần, bị xoá ngay khi hiện.

## 5. Làm hub ngành khác

| Bước | Việc |
|---|---|
| 1 | Chép repo thành `wp-<ngành>-hub`; đổi `WP_Vegan_Hub` → `WP_<Ngành>_Hub`, hằng `WP_VEGAN_HUB_*`, slug trang quản trị |
| 2 | `data/hub.php`: `profile.id`, tên, màu nhấn, phiếu quà, lưới ứng dụng, câu leader, hỏi đáp |
| 3 | `data/segments.php`: phân khúc của ngành (cùng định dạng `industries` của open-hub) |
| 4 | Mockup ngành trong `mockup/`, chủ duyệt, rồi mới sửa `pages/` |

Gợi ý phân khúc: **OCOP** (hợp tác xã, cơ sở chế biến, điểm bán OCOP) · **Retail** (chuỗi tạp hoá, siêu thị mini, cửa hàng tiện lợi) · **Baby** (cửa hàng mẹ bé, nhà sách thiếu nhi, trung tâm chăm sóc) · **Tool** (kim khí, vật tư điện nước, thiết bị) · **Expo** (gian hàng hội chợ, nhà tổ chức, đơn vị dàn dựng).

## 6. Trạng thái

Mockup chờ chủ duyệt; mã v0.1.0 là bộ khung chạy được theo mockup. Việc còn lại: [CHECKLIST](CHECKLIST.md).
