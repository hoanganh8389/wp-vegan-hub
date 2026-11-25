# Hồ sơ cơ sở và bản đồ hội viên — Vegan Hub

<!-- [2026-11-25 12:25 PM Johnny Chu - Chu Hoàng Anh] HUB-VEGAN M-3 — phần riêng ngành chay của chuẩn CHUAN-HO-SO-CO-SO-BAN-DO. Tài liệu + mockup, chưa code. -->

> Chuẩn chung (CPT `bz_hub_member`, meta lõi, bốn bậc xác minh, REST, R-MAP-1…8): [CHUAN-HO-SO-CO-SO-BAN-DO](https://github.com/hoanganh8389/open-hub/blob/main/docs/canon/CHUAN-HO-SO-CO-SO-BAN-DO.md). Tài liệu này chỉ ghi phần Vegan Hub thêm vào.
> Mockup: [mockup/vegan-member-map.html](../mockup/vegan-member-map.html) · ảnh: [docs/shots/map/](shots/map/) · **trạng thái: chờ duyệt, chưa code**.

## 1. Tóm tắt luồng

```text
cơ sở đăng ký (V1) ─► hub cấp khoá biz-… (V2: khoá đang chạy)
   ─► quản trị viên hub xác minh: giấy phép / chứng nhận / ghé thăm (V3, hạn 12 tháng)
   ─► cơ sở đồng ý công khai trên site của mình (V4) ─► ghim lên bản đồ công khai
khoá ngưng > 30 ngày / bị thu hồi ─► ghim tạm ẩn (hồ sơ giữ nguyên)
```

## 2. Trường riêng ngành chay (`bizcity_hub_member_fields`)

| Khoá | Kiểu | Nhãn | Công khai | Lọc trên bản đồ |
|---|---|---|---|---|
| `cert` | multi: `thuan-chay` · `thuc-duong` · `huu-co` | Chứng nhận | có | có |
| `menu` | list, tối đa 6 | Món / sản phẩm nổi bật | có | không |
| `offer` | text ≤ 140 | Ưu đãi hội viên | có | không |
| `serve` | multi: `tai-cho` · `mang-ve` · `giao-hang` · `suat-an` | Hình thức phục vụ | có | có |

Chứng nhận do **cơ sở khai**, leader kiểm khi xác minh; đổi chứng nhận sau V3 phải chờ duyệt lại (R-MAP-5).

## 3. Màn và ảnh

| Ảnh | Màn | Lớp cài đặt |
|---|---|---|
| `a1-admin-danh-sach.png` (+ `a1b` trống, `a1c` không quyền) | wp-admin › Vegan Hub › Hội viên: 5 ô đếm theo bậc, cột "vì sao chưa lên bản đồ" | 2 |
| `a2-sheet-ho-so-xac-minh.png` (+ `a2b` lỗi khoá thu hồi) | sheet hồ sơ: bậc V1–V4, thay đổi chờ duyệt từ site hội viên, thông tin công khai, trường ngành, xác minh | 1 |
| `a3-admin-ban-do.png` | bản đồ quản trị mọi bậc + danh sách thiếu toạ độ, ghim tay | 2 |
| `f1-ban-do-cong-khai.png` (+ `f1b` lỗi, `f2` điện thoại) | bản đồ công khai: chỉ V4, nhãn "Đã xác minh", lọc chứng nhận | — |
| `s1-site-hoi-vien-tu-cap-nhat.png` | site của cơ sở (Twin Brain › Cài đặt › Hồ sơ trên bản đồ hub): bốn bậc, sửa hồ sơ, kéo ghim, đồng ý công khai, gửi bằng chính khoá | 4 |

Màn P2 (bản đồ & danh bạ) của persona sẽ đọc cùng REST `GET bizcity/v1/hub/members`, nên chỉ hiện V4.

## 4. Checklist

| # | Việc | Trạng thái |
|---|---|---|
| M-1 | Chủ duyệt chuẩn + mockup | [ ] |
| M-2 | Chốt MAP-Q1 Leaflet + OSM ghim tay · Q2 hạn 12 tháng · Q3 không vai riêng, quản trị viên duyệt · Q4 chưa có khoá không hiện <!-- [2026-11-25 12:44 PM Johnny Chu - Chu Hoàng Anh] HUB-VEGAN M-4 --> | [x] 2026-11-25 |
| M-3 | Mã router: CPT + meta + registry + REST + tính bậc | [ ] chưa code |
| M-4 | Mã Vegan Hub: khai 4 trường ngành; P2 đọc REST | [ ] chưa code |
| M-5 | Mã twin-ai: màn "Hồ sơ trên bản đồ hub" (cửa A) | [ ] chưa code |
| M-6 | Tự kiểm trình duyệt: REST công khai không lộ `key_id`; khoá thu hồi ⇒ ghim biến mất | [ ] |
