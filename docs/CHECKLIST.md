# Checklist Vegan Hub

<!-- [2026-11-25 10:55 AM Johnny Chu - Chu Hoàng Anh] HUB-VEGAN V-0 — checklist A (giao diện theo mockup) + B (giải pháp mã) + bằng chứng. -->

Mockup: [mockup/vegan-hub.html](../mockup/vegan-hub.html) — **chờ chủ duyệt**. Trạng thái: `[ ]` chưa · `[~]` đang · `[x]` xong · `[!]` chặn.

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
| A-11 | Bản điện thoại (kiểm trên máy thật) | — | [ ] |

## Checklist B — giải pháp mã

| # | Việc | Repo | Trạng thái |
|---|---|---|---|
| B-1 | `BizCity_Router_Industry_Hub` (hồ sơ, cấp khoá thử, đếm khoá, doanh thu, REST hồ sơ) | bizcity-llm-router | [x] mã · [ ] chạy thật |
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
