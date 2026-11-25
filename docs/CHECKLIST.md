# Checklist Vegan Hub

<!-- [2026-11-25 10:55 AM Johnny Chu - Chu Hoàng Anh] HUB-VEGAN V-0 — checklist A (giao diện theo mockup) + B (giải pháp mã) + bằng chứng. -->

Mockup lõi: [mockup/vegan-hub.html](../mockup/vegan-hub.html) — **đã duyệt 2026-11-25** (bộ shots lõi, R-HUB-11). Mockup persona: [mockup/vegan-persona.html](../mockup/vegan-persona.html) — **chờ duyệt** (R-HUB-12). Trạng thái: `[ ]` chưa · `[~]` đang · `[x]` xong · `[!]` chặn.

<!-- [2026-11-25 01:06 PM Johnny Chu - Chu Hoàng Anh] HUB-VEGAN D-1 -->
## Checklist C — OPEN-HUB CLIENT (case Vegan Hub; thiết kế, chưa code)

| # | Việc | Lớp | Trạng thái |
|---|---|---|---|
| C-1 | O0 14 module bật / tắt (5 bắt buộc) | 4 | [x] mockup + shot · [ ] chủ duyệt |
| C-2 | O1 tổng quan trả lời 5 câu hỏi | 2 | [x] mockup + shot · [ ] chủ duyệt |
| C-3 | O2 tài nguyên & quyền lợi: trạng thái + chi phí, theo dõi GitHub, "Sắp ra mắt" tách riêng | 2 | [x] mockup + shot · [ ] chủ duyệt |
| C-4 | O3 tài sản cộng đồng | 2 | [x] mockup + shot · [ ] chủ duyệt |
| C-5 | O4/O5 hội viên: 8 giai đoạn hành trình, trạng thái độc lập, Member 360° 9 tab | 1–2 | [x] mockup + shot · [ ] chủ duyệt |
| C-6 | O6 Coach Center: workspace, 30–60–90, lịch, hiệu quả Coach | 2 | [x] mockup + shot · [ ] chủ duyệt |
| C-7 | O7 Marketing Center: chiến dịch, đường dẫn theo dõi, đo gì / không đo gì | 2 | [x] mockup + shot · [ ] chủ duyệt |
| C-8 | O8 xác minh & chứng nhận: 4 loại ghi nhận, bộ tiêu chuẩn, hàng đợi, QR, gia hạn, thu hồi | 2 | [x] mockup + shot · [ ] chủ duyệt |
| C-9 | F1–F4 frontend: trang chủ hợp nhất, 8 trụ cột, tra cứu chứng nhận, chiến dịch | — | [x] mockup + shot · [ ] chủ duyệt |
| C-10 | F5/F6 My Hub + lộ trình 90 ngày | — | [x] mockup + shot · [ ] chủ duyệt |
| C-11 | Hồ sơ quyền lợi Hub cho Marketing ([HO-SO-QUYEN-LOI-HUB.md](HO-SO-QUYEN-LOI-HUB.md)) | — | [x] mockup + shot · [ ] chủ duyệt |
| C-12 | OH-Q1…Q4 <!-- [2026-11-25 01:26 PM Johnny Chu - Chu Hoàng Anh] HUB-VEGAN D-4 --> — `open-hub-client` (nền tảng Hub) / `open-hub-core` (lõi trung tâm, viết mới) · `hub_coach` + affiliate · Woo · JSONL + rollup tổng | — | [x] chủ chốt 2026-11-25 |
| C-14 | O6b tuyển Coach, chính sách affiliate, chi trả hoa hồng tháng | 2 | [x] mockup + shot · [ ] chủ duyệt |
| C-15 | F9 My Coach (hồ sơ, đường dẫn giới thiệu, hoa hồng tạm tính / đã duyệt / đã trả, căn cứ từng khoản) · F10 Trở thành Coach | — | [x] mockup + shot · [ ] chủ duyệt |
| C-16 | Lõi trung tâm `open-hub-core`: đặc tả + mockup C1–C4 (ở repo open-hub) | — | [x] thiết kế · [x] CORE-Q1…Q4 chốt 2026-11-25 |
| C-13 | <!-- [2026-11-25 01:33 PM Johnny Chu - Chu Hoàng Anh] HUB-VEGAN D-5 --> Mã `open-hub-core` Đ1 (sổ Hub, khoá theo Hub, gói, REST, CLI) | — | [x] mã + test 42/42 (repo private `open-hub-core` a9272b6) · [ ] chạy trên site thật |
| C-17 | <!-- [2026-11-25 05:52 PM Johnny Chu - Chu Hoàng Anh] HUB-VEGAN V-10 --> `open-hub-client` Đ1a (hợp đồng @2, module, ô mở rộng, một cửa gọi lõi) | — | [x] mã + test 43/43 (083a83b) · [ ] chạy trên site thật |
| C-18 | Vegan Hub sang hợp đồng @2 (`data/industry.php`), tắt đường @1 khi có client | — | [x] mã + test 9/9 · [ ] chạy trên site thật |
| C-19 | `open-hub-client` Đ1b (màn quản trị) · `open-hub-core` Đ2–Đ4 | — | [ ] chưa code |

<!-- [2026-11-26 01:11 AM Johnny Chu - Chu Hoàng Anh] HUB-VEGAN CM-1 — tiến độ cổng + nội dung. -->
## Tiến độ cổng ngành chay (2026-11-26)

| # | Việc | Trạng thái |
|---|---|---|
| C-20 | Cổng P1–P4, chứng nhận + QR, đủ trang sitemap, My Hub, trang WordPress + "Menu Hub" (open-hub-client 0.5–0.8) | [x] mã + test · [x] chạy thật veganhub.net |
| C-21 | Sửa giao diện trên site thật: chữ trống, phần thừa của theme, CSS bị Cloudflare giữ, màu, bố cục trang chủ, danh bạ báo lỗi (0.8.1–0.8.3) | [x] mã + test · [ ] tải lên + xoá bộ đệm Cloudflare |
| C-22 | Nghiên cứu nội dung & dữ liệu mẫu ([NGHIEN-CUU-NOI-DUNG-VA-DU-LIEU-MAU.md](NGHIEN-CUU-NOI-DUNG-VA-DU-LIEU-MAU.md)) | [x] tài liệu · [ ] chủ Hub chốt CM-Q1…Q4 |
| C-23 | 5 chuyên mục, xếp 3 bài cũ, 12 bài tuần 1–4 | [ ] biên tập |
| C-24 | Chế độ dữ liệu mẫu + `wp ohcl demo seed/remove` + 24 cơ sở mẫu | [ ] chờ CM-Q1 |
| C-25 | Sản phẩm từ site cơ sở qua Woo Store API (đường B) | [ ] chờ CM-Q2 |
| C-26 | Woo của Hub: vé sự kiện, voucher hội viên (đường C) | [ ] ban điều hành |
| C-27 | 5–10 cơ sở thật đi đủ V1→V4 | [ ] ban điều hành |

## Checklist A — giao diện theo mockup

| # | Màn / khối | Lớp cài đặt | Trạng thái |
|---|---|---|---|
| A-1 | Header: logo "Vegan Hub" + dòng "chạy trên Bizcity Open" | — | [x] mã (open-hub `brand()`) |
| A-2 | Màn 1 hero + phiếu quà | — | [x] mã |
| A-3 | Màn 1 lưới 12 ứng dụng + công tắc "Nếu không dùng Vegan Hub" | — | [x] mã (dùng JS `data-alt` của open-hub) |
| A-4 | Màn 1 phân khúc, lời leader, 4 bước, hỏi đáp | 2 (tên leader) | [x] mã |
| A-5 | Màn 2 bảng "trong gói có gì" + biểu mẫu nhận gói | — | [x] mã |
| A-6 | Màn 3 ba trụ cộng đồng + danh bạ hội viên | — | [x] mã (danh bạ rỗng tới khi có đồng ý) |
| A-7 | Màn 4 KPI + bảng theo khoá + trạng thái tải / trống / lỗi / không quyền | 2 | [~] trống / lỗi / không quyền có; "đang tải" không cần (trang server) |
| A-8 | Màn 4 cấp khoá trong **ActionSheet** | 1 | [ ] hiện là biểu mẫu wp-admin; chuyển sheet khi có React shell |
| A-9 | Màn 4 tab "Đối soát với Bizcity" | 2 | [ ] chờ HUB-REV-1 |
| A-10 | Màu nhấn xanh lá (chỉ 4 biến) | — | [x] mã · [ ] chủ duyệt màu |
| A-11 | Bản điện thoại (kiểm trên máy thật) | — | [ ] · ảnh mockup có ở docs/shots/06, 07 |
| A-12 | Ảnh chụp 11 màn / trạng thái của mockup (`docs/shots/`) | — | [x] 2026-11-25 · chủ duyệt làm chuẩn lõi mọi hub |
| A-13 | Persona P1 cổng ngành (hero, 8 lối tắt, tìm nhanh, bản đồ, tin, sự kiện, danh mục, dải số liệu, chân trang QR) | — | [x] mockup + shots · [ ] chủ duyệt · [ ] mã |
| A-14 | Persona P2 bản đồ + danh bạ (lọc, trống, lỗi) | — | [x] mockup + shots · [ ] mã (cần nguồn dữ liệu danh bạ) |
| A-15 | Persona P3 hồ sơ cơ sở (nút Zalo tới trợ lý của chính cơ sở) | — | [x] mockup + shots · [ ] mã |
| A-16 | Persona P4 trở thành hội viên (gói tặng + AI dùng thử đứng đầu, ô đồng ý hiện danh bạ) | — | [x] mockup + shots · [ ] mã |
| A-17 | Persona bản điện thoại | — | [x] shots p5, p6 |
| A-18 | R-HUB-13: không font viết tay, một tông màu, viền mảnh thay bóng | — | [x] mockup lõi + persona + CSS ghi đè trên site hub |

## Checklist B — giải pháp mã

| # | Việc | Repo | Trạng thái |
|---|---|---|---|
| B-1 | `BizCity_Router_Industry_Hub` (hồ sơ, cấp khoá thử, đếm khoá, doanh thu, REST hồ sơ) — **cầu tạm @1**, bỏ khi `open-hub-client` chạy | bizcity-llm-router | [x] mã · [ ] chạy thật |
| B-2 | open-hub: khoá `file`, `brand()`, `bizcity_open_hub_enqueue`, `bizcity_open_hub_lead_types` | open-hub | [x] mã · [ ] chạy thật |
| B-3 | hạn dùng thử theo khoá (ngày hết hạn, cảnh báo, không chặn sổ) — HUB-TRIAL-1 | router | [ ] |
| B-4 | Cell định tuyến khoá → hub — HUB-CELL-1 (chờ HUB-Q1) | zalo-hub | [!] chờ chủ chọn cách nhận diện hub |
| B-5 | tổng doanh thu theo khoá/ngày gửi bizcity.vn — HUB-REV-1 | router | [ ] |
| B-6 | "Nhận gói" tạo site qua open-setup — HUB-SITE-1 | open-setup | [ ] |
| B-7 | tỷ lệ chia doanh thu hub ↔ Bizcity — HUB-Q2 | hợp đồng | [!] chờ chủ |
| B-8 | tự kiểm trên trình duyệt `docs/tools/vegan-hub-selfcheck.js` (trang công khai + REST hồ sơ) | wp-vegan-hub | [ ] |

## Bằng chứng

| Ngày | Kiểm | Kết quả |
|---|---|---|
| 2026-11-25 | `php -l` mọi tệp PHP của plugin + tệp router/open-hub đã sửa | PASS |
| 2026-11-25 | chạy trên WordPress thật (trang `/v2/`, wp-admin › Vegan Hub, cấp một khoá) | SKIP — chưa chạy |
