# Hướng dẫn cho AI agent (Claude Code, Copilot, Codex, Cursor…)
<!-- [2026-11-25 10:55 AM Johnny Chu - Chu Hoàng Anh] HUB-VEGAN V-0 — luật cho agent làm việc trên wp-vegan-hub. -->

Dự án: **wp-vegan-hub** — plugin giao diện hub ngành chay trên `bizcity-llm-router` + open-hub. Đọc [README](README.md), [docs/KIEN-TRUC.md](docs/KIEN-TRUC.md), [docs/CHECKLIST.md](docs/CHECKLIST.md) và chuẩn chung CHUAN-HUB-NGANH (canon open-hub) trước khi sửa.

## Năm câu không thương lượng

1. **Giao diện bám mockup**: lớp lõi `mockup/vegan-hub.html` (đã duyệt, bộ shots lõi là chuẩn chung — không đổi cấu trúc), lớp persona `mockup/vegan-persona.html`, OPEN-HUB CLIENT `mockup/{owner-center,hub-frontend,hub-partner-profile}.html` (CSS / JS chung `hub-mockup.*`). Repo này chỉ chứa cấu hình ngành; mã lõi Hub thuộc `open-hub-client`. Đổi giao diện = sửa mockup trước, chủ duyệt, rồi mới sửa `pages/`.
2. **Không chép mã lõi.** Không copy CSS, helper, header của open-hub; không vá router cho riêng ngành chay (R-HUB-1). Thiếu điểm mở rộng thì đề xuất ở repo lõi.
3. **Không bảng, không khoá, không LLM.** Cấp khoá và đọc doanh thu chỉ qua `BizCity_Router_Industry_Hub` (R-HUB-2).
4. **Không bịa số, không bịa hội viên.** Chữ nằm trong `data/*.php`; thiếu nguồn để trống.
5. **Thoát mọi đầu ra**; PHP 7.4.

## Dấu thay đổi

`[YYYY-MM-DD HH:MM AM/PM Johnny Chu - Chu Hoàng Anh] HUB-VEGAN <mã> — <đổi gì>`, giờ đọc từ đồng hồ. Không ghi tên agent / model.

## Trước khi xong việc

```bash
for f in $(find . -name "*.php"); do php -l "$f"; done
```

Cập nhật `docs/CHECKLIST.md` và `CHANGELOG.md`.
