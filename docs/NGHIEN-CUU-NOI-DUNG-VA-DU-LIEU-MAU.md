# Nghiên cứu nội dung & dữ liệu mẫu — cổng Vegan Hub

<!-- [2026-11-26 01:11 AM Johnny Chu - Chu Hoàng Anh] HUB-VEGAN CM-1 — tài liệu research vai content marketing: kiến trúc nội dung, khuôn bài, dữ liệu mẫu cơ sở cho bản đồ, sản phẩm WooCommerce, tiến độ. -->

> **Vai:** content marketing của Vegan Hub. **Đọc cho:** chủ Hub, biên tập viên, người nhập dữ liệu. **Trạng thái:** bản nghiên cứu, **chờ chủ Hub chốt 4 câu hỏi ở §8** rồi mới tạo dữ liệu mẫu trên site thật.
> Liên quan: [CAU-HINH-NGANH-CHAY](CAU-HINH-NGANH-CHAY.md) (cấu hình ngành) · [HO-SO-CO-SO-BAN-DO](HO-SO-CO-SO-BAN-DO.md) (bậc V1–V4) · [CHECKLIST](CHECKLIST.md) (tiến độ).

## 0. Vì sao cổng đang "trống"

Ảnh veganhub.net ngày 2026-11-26 sau khi bật WP Vegan Hub: khung, màu, chữ ngành đã đúng, nhưng:

| Khối | Đang thấy | Lý do |
|---|---|---|
| Bản đồ, danh bạ, giao thương | trống / "Không tải được danh bạ" | chưa có cơ sở nào đạt **V4** (đã xác minh + đồng ý công khai + có toạ độ + khoá trợ lý đang dùng). Lỗi "không tải được" do client gọi lõi khi chưa cần — đã sửa ở open-hub-client 0.8.3 |
| Số liệu dưới trang chủ | 0 · — · — · — | đúng luật R-HUB-6: chỉ đếm dữ liệu thật |
| Tin tức | 3 bài cũ của site, ảnh thiếu | chưa có kế hoạch bài, chưa có chuyên mục |
| Sự kiện | "Chưa có sự kiện nào được đăng" | chưa có chuyên mục `su-kien` |
| Hồ sơ cơ sở | chưa có trang nào | như bản đồ |

Cổng không thiếu chỗ chứa, nó thiếu **nội dung** và **cơ sở thật**. Tài liệu này trả lời: viết gì, nhập gì, nhập thế nào để bản đồ có điểm, và sản phẩm WooCommerce đi vào đâu.

## 1. Ba nhóm người đọc, một lời hứa mỗi nhóm

| Nhóm | Họ tìm gì trên cổng | Lời hứa của Vegan Hub | Trang đích |
|---|---|---|---|
| **Người ăn chay / muốn ăn chay** | quán chay gần tôi, món ngon, ngày rằm ăn ở đâu, ăn chay đúng cách | "Tìm cơ sở chay đã được xác minh, nhắn Zalo đặt món ngay" | Bản đồ · Hồ sơ cơ sở · Tin tức |
| **Chủ cơ sở chay** (nhà hàng, cửa hàng, bếp suất ăn, cơ sở sản xuất) | thêm khách, phần mềm rẻ, chứng nhận uy tín, học vận hành | "Bộ phần mềm 0đ + có tên trên bản đồ + chứng nhận ngành" | Quyền lợi · Công nghệ 0đ · Trở thành hội viên |
| **Nhà cung cấp / đối tác** (nông trại, nguyên liệu, nhà tài trợ) | khách hàng sỉ, kết nối giao thương | "Đến thẳng hàng trăm bếp chay đã xác minh" | Giao thương · Sự kiện |

Mọi bài viết phải trỏ về **một** trong ba trang đích (CTA cuối bài).

## 2. Kiến trúc nội dung (trụ cột → cụm bài)

Tạo đủ 5 **chuyên mục** WordPress (đường dẫn cố định, cổng đã đọc sẵn `su-kien`):

| Chuyên mục | slug | Trụ cột | Nhóm đọc | Nhịp |
|---|---|---|---|---|
| Ăn chay đúng cách | `kien-thuc` | dinh dưỡng, thực đơn, chuyển dần sang ăn chay | người ăn chay | 1 bài / tuần |
| Điểm đến chay | `diem-den` | review cơ sở hội viên, "ăn gì ở <tỉnh>" | người ăn chay | 1 bài / tuần |
| Kinh doanh chay | `kinh-doanh-chay` | giá vốn, kho nguyên liệu, marketing ngày rằm, chuyển đổi số | chủ cơ sở | 2 bài / tháng |
| Sự kiện & chương trình | `su-kien` | ăn chay ngày rằm, tuần lễ ẩm thực chay, Vegan Tour, workshop | cả ba | trước mỗi dịp 10 ngày |
| Câu chuyện hội viên | `cau-chuyen-hoi-vien` | chủ cơ sở kể chuyện, số liệu trước / sau (có đồng ý) | chủ cơ sở | 1 bài / tháng |

3 bài đang có trên site xếp vào: "Tận hưởng cuộc sống đơn giản…" → `kien-thuc`; "Tứ trụ nền tảng…" → `kinh-doanh-chay`; "Review buổi chia sẻ số 03…" → `su-kien`. Cả ba cần **ảnh đại diện** (khung tin tức trang chủ đang hiện biểu tượng thay ảnh).

**Menu "Menu Hub"**: thêm mục "Tin tức" trỏ trang bài viết (Cài đặt › Đọc › Trang bài viết), hoặc từng chuyên mục vào nhóm "Khám phá" ở Giao diện › Menu — cổng tự đọc menu.

## 3. Khuôn bài (4 loại)

Quy ước chung: tiêu đề ≤ 70 ký tự · mô tả ≤ 155 ký tự · ảnh đại diện 1200×675 (16:9), ảnh thật của cơ sở hoặc ảnh có quyền dùng · không số liệu chưa có nguồn · cơ sở được nêu tên phải là hội viên **đã đồng ý** · CTA cuối bài.

### 3.1 Review "Điểm đến chay" (`diem-den`)
1. Mở: một câu vì sao nên ghé (món, không gian, giá).
2. Thông tin nhanh (bảng): địa chỉ · giờ mở cửa · phục vụ (tại chỗ / mang về / giao hàng) · khoảng giá · chứng nhận Vegan Hub (nếu có, ghi mã `VH-CERT-…` để người đọc tra).
3. 3 món nên thử (ảnh + 1–2 câu mỗi món).
4. Ưu đãi hội viên (nếu có).
5. CTA: "Xem hồ sơ & nhắn Zalo cho quán" → link `/co-so/<id>-<tên>/`.

### 3.2 Bài sự kiện (`su-kien`)
Tên sự kiện · thời gian (ghi cả âm lịch nếu là rằm / mùng một) · địa điểm · ai nên đến · danh sách cơ sở tham gia (link hồ sơ) · ưu đãi · cách đăng ký (vé là sản phẩm Woo của Hub, §6.3) · ảnh sau sự kiện cập nhật vào chính bài.

### 3.3 Hướng dẫn (`kien-thuc`, `kinh-doanh-chay`)
Vấn đề (1 đoạn) → các bước đánh số → mẫu tải về (từ Học viện / kho mẫu ngành) → lỗi thường gặp → CTA "Trở thành hội viên để nhận mẫu & Coach".

### 3.4 Câu chuyện hội viên (`cau-chuyen-hoi-vien`)
Trước khi vào Hub · đã dùng gì (bộ công nghệ, trợ lý Zalo, Coach) · sau 90 ngày (chỉ số do chính cơ sở cung cấp và đồng ý công bố) · trích lời chủ cơ sở · CTA.

## 4. Lịch 4 tuần đầu (12 bài)

| Tuần | `kien-thuc` | `diem-den` | Khác |
|---|---|---|---|
| 1 | Ăn chay 2 ngày / tuần: bắt đầu thế nào | Ăn chay ở Hoàn Kiếm: 3 quán nên thử | `su-kien`: Ăn chay ngày rằm tháng này — cơ sở hội viên có ưu đãi |
| 2 | Đạm thực vật: đậu, nấm, hạt — ăn bao nhiêu là đủ | Ăn chay ở Quận 1 & Quận 3 | `kinh-doanh-chay`: Tính giá vốn một món chay (kèm mẫu Excel) |
| 3 | Đi chợ chay cho gia đình 4 người, 1 tuần | Huế — kinh đô ẩm thực chay | `su-kien`: Tuần lễ ẩm thực chay (thông báo) |
| 4 | Ăn chay cho người tập thể thao | Đà Lạt — nông trại & bếp chay | `cau-chuyen-hoi-vien`: bài đầu tiên (khi có hội viên đồng ý) |

Ngày rằm / mùng một: tra **lịch âm** khi lập lịch tháng, đăng bài trước 10 ngày, nhắc lại trước 2 ngày. Không ghi ngày âm lịch từ trí nhớ.

## 5. Dữ liệu mẫu cơ sở cho bản đồ

### 5.1 Luật dữ liệu mẫu (không được lẫn với dữ liệu thật)

- Tên **luôn** kết thúc bằng "(mẫu)". Không dùng tên, thương hiệu, địa chỉ số nhà, số điện thoại của cơ sở có thật.
- Điện thoại / Zalo: dải giả `0900 000 0xx`, email `@example.com`, không website.
- Toạ độ: gần trung tâm quận / phường (sai số vài trăm mét), địa chỉ chỉ ghi đến phường / quận.
- Mỗi hồ sơ mẫu có cờ `_bzm_demo = 1`. **Không** đếm vào số liệu trang chủ, **không** cấp khoá thật, **không** cấp chứng nhận thật.
- Xoá được một lần toàn bộ (nút "Xoá dữ liệu mẫu" / `wp ohcl demo remove`).

Hiện tại luật bản đồ chỉ hiện **V4**, mà dữ liệu mẫu không thể đạt V4 (không có khoá dùng thật). Muốn bản đồ có điểm trước khi có hội viên thật cần **chế độ dữ liệu mẫu** (câu hỏi CM-Q1, §8): khi bật, hồ sơ `_bzm_demo` hiện trên bản đồ / danh bạ với nhãn **"Mẫu"** rõ ràng; khi tắt (mặc định lúc mở Hub chính thức) chúng biến mất.

### 5.2 24 cơ sở mẫu (6 loại hình × 8 tỉnh)

Trường theo hợp đồng ngành: loại hình (`segment`), tỉnh, địa chỉ, giờ, toạ độ, chứng nhận ngành (`cert`: thuan-chay · thuc-duong · huu-co), hình thức phục vụ (`serve`: tai-cho · mang-ve · giao-hang · suat-an), món nổi bật (`menu`), ưu đãi (`offer`).

| # | Tên (mẫu) | Loại hình | Tỉnh | Phường / quận | Vĩ độ, kinh độ | cert | serve | Món / sản phẩm nổi bật | Ưu đãi hội viên |
|---|---|---|---|---|---|---|---|---|---|
| 1 | Nhà hàng chay Sen Hồng (mẫu) | nha-hang-chay | Hà Nội | Hoàn Kiếm | 21.0285, 105.8542 | thuan-chay | tai-cho, mang-ve | Bún nấm, lẩu nấm, cơm sen | −10% ngày mùng một |
| 2 | Quán chay Bồ Đề (mẫu) | nha-hang-chay | Hà Nội | Ba Đình | 21.0340, 105.8140 | thuan-chay | tai-cho | Phở chay, nem chay | tặng chè ngày rằm |
| 3 | Bếp cơm chay Tâm An (mẫu) | bep-suat-an | Hà Nội | Cầu Giấy | 21.0362, 105.7906 | thuan-chay | suat-an, giao-hang | Suất cơm văn phòng 45k | −5% đơn tuần |
| 4 | Cửa hàng thực phẩm chay Hạt Mầm (mẫu) | cua-hang-chay | Hà Nội | Tây Hồ | 21.0700, 105.8190 | huu-co | mang-ve, giao-hang | Đậu hũ, sữa hạt, nấm khô | freeship nội quận |
| 5 | Chay Mộc Viên (mẫu) | nha-hang-chay | Huế | Phú Hội | 16.4637, 107.5909 | thuan-chay | tai-cho | Bánh bèo chay, cơm hến chay | set rằm 2 người |
| 6 | Thiền viện Trúc An — bếp dưỡng sinh (mẫu) | thien-vien | Huế | Thủy Xuân | 16.4400, 107.5800 | thuc-duong | tai-cho | Cơm gạo lứt muối mè | — |
| 7 | Sản xuất tương chao Gia Hội (mẫu) | san-xuat-chay | Huế | Gia Hội | 16.4720, 107.5960 | thuan-chay | mang-ve, giao-hang | Tương, chao, ruốc nấm | giá sỉ hội viên |
| 8 | Nhà hàng chay Hương Sen (mẫu) | nha-hang-chay | Đà Nẵng | Hải Châu | 16.0678, 108.2208 | thuan-chay | tai-cho, mang-ve | Mì Quảng chay | −10% nhóm 4 người |
| 9 | Chay quán Biển Xanh (mẫu) | nha-hang-chay | Đà Nẵng | Sơn Trà | 16.0830, 108.2440 | thuan-chay | tai-cho | Bún chả cá chay | — |
| 10 | Cơm chay Phố Hội (mẫu) | nha-hang-chay | Quảng Nam | Hội An | 15.8801, 108.3380 | thuan-chay | tai-cho | Cao lầu chay | tặng nước sâm |
| 11 | Nhà hàng chay Diệu Âm (mẫu) | nha-hang-chay | TP.HCM | Quận 1 | 10.7769, 106.7009 | thuan-chay | tai-cho, mang-ve | Cơm chiên hạt sen | tặng chè hạt sen |
| 12 | Bếp chay Thanh Tâm (mẫu) | bep-suat-an | TP.HCM | Quận 3 | 10.7840, 106.6860 | thuan-chay | suat-an, giao-hang | Suất chay văn phòng | −8% gói tháng |
| 13 | Cửa hàng chay Lá Xanh (mẫu) | cua-hang-chay | TP.HCM | Phú Nhuận | 10.7990, 106.6800 | huu-co, thuan-chay | mang-ve, giao-hang | Chả lụa chay, xúc xích nấm | tích điểm x2 |
| 14 | Xưởng đậu hũ Bình Thạnh (mẫu) | san-xuat-chay | TP.HCM | Bình Thạnh | 10.8040, 106.7070 | thuan-chay | giao-hang | Đậu hũ non, tàu hũ ky | giá sỉ hội viên |
| 15 | Quán chay Hạnh Phúc (mẫu) | nha-hang-chay | TP.HCM | Thủ Đức | 10.8500, 106.7720 | thuan-chay | tai-cho, mang-ve | Hủ tiếu chay | −10% sinh viên |
| 16 | Nông trại Rau Xanh (mẫu) | nong-trai | Lâm Đồng | Đà Lạt | 11.9404, 108.4583 | huu-co | giao-hang | Rau cải, nấm tươi, dâu | giá sỉ bếp hội viên |
| 17 | Nhà hàng chay Đồi Thông (mẫu) | nha-hang-chay | Lâm Đồng | Đà Lạt | 11.9460, 108.4420 | thuan-chay | tai-cho | Lẩu nấm Đà Lạt | — |
| 18 | Nông trại nấm Lạc Dương (mẫu) | nong-trai | Lâm Đồng | Lạc Dương | 12.0000, 108.4300 | huu-co | giao-hang | Nấm đông cô, nấm mỡ | — |
| 19 | Cơm chay Ninh Kiều (mẫu) | nha-hang-chay | Cần Thơ | Ninh Kiều | 10.0340, 105.7880 | thuan-chay | tai-cho, mang-ve | Lẩu mắm chay | −10% ngày rằm |
| 20 | Vườn rau Phong Điền (mẫu) | nong-trai | Cần Thơ | Phong Điền | 10.0000, 105.6800 | huu-co | giao-hang | Rau thơm, trái cây | — |
| 21 | Nhà hàng chay Phố Cảng (mẫu) | nha-hang-chay | Hải Phòng | Lê Chân | 20.8449, 106.6881 | thuan-chay | tai-cho | Bánh đa cua chay | — |
| 22 | Bếp suất ăn Thiện Tâm (mẫu) | bep-suat-an | Hải Phòng | Ngô Quyền | 20.8580, 106.6990 | thuan-chay | suat-an | Suất ăn từ thiện | — |
| 23 | Nhà hàng chay Biển Nhớ (mẫu) | nha-hang-chay | Khánh Hòa | Nha Trang | 12.2388, 109.1967 | thuan-chay | tai-cho, mang-ve | Bún sứa chay | tặng trà |
| 24 | Thiền viện Hải Đức — bếp chay (mẫu) | thien-vien | Bà Rịa – Vũng Tàu | Vũng Tàu | 10.3460, 107.0843 | thuc-duong | tai-cho | Thực đơn dưỡng sinh | — |

Phân bố này phủ đủ 6 loại hình, Bắc – Trung – Nam, để bộ lọc, trang Giao thương (xếp theo loại hình) và bản đồ đều có nội dung khi xem thử.

### 5.3 Cách nhập

- **Một lệnh** (đề xuất, sẽ làm sau khi chốt CM-Q1): `wp ohcl demo seed vegan` đọc bảng trên từ `wp-vegan-hub/data/demo-members.php`, tạo hồ sơ `_bzm_demo`, bật chế độ mẫu. `wp ohcl demo remove` xoá sạch.
- **Tay** (dữ liệu thật): Hub › 02 · Hội viên › Thêm → nhập đủ trường → Tiếp nhận → Cấp khoá → cơ sở dùng trợ lý (V2) → Xác minh (V3) → nhập toạ độ + tích đồng ý → V4, tự lên bản đồ.

Lấy toạ độ: Google Maps → nhấp chuột phải vào vị trí → bấm dòng số (vĩ độ, kinh độ) để chép → dán vào hai ô "Vĩ độ", "Kinh độ".

## 6. Sản phẩm WooCommerce: ba đường, dùng đường nào cho việc gì

Nguyên tắc (OPEN-HUB-CLIENT §7, R-HUB): Hub **không** đọc dữ liệu bán hàng của cơ sở và **không** thành sàn bán hộ. Sản phẩm của cơ sở thuộc site / sổ của cơ sở.

| Đường | Sản phẩm nằm ở | Hub hiển thị thế nào | Dùng cho |
|---|---|---|---|
| **A. Món nổi bật (đang có)** | chữ trong hồ sơ hội viên (`menu`) | dòng "Món / sản phẩm nổi bật" trên hồ sơ, bộ lọc tìm được | mọi cơ sở, kể cả chưa có website |
| **B. Danh mục công khai của cơ sở** (đề xuất) | WooCommerce trên **site riêng của cơ sở** (bộ công nghệ 0đ: Open Web / Woo) | Hub gọi **Store API công khai** của site đó: `GET https://<site-cơ-sở>/wp-json/wc/store/v1/products?per_page=6&orderby=popularity` → 6 thẻ sản phẩm (ảnh, tên, giá, link "Mua tại cơ sở") trên trang hồ sơ; đệm 6 giờ; chỉ khi cơ sở tích "đồng ý hiện sản phẩm" | nhà hàng có đặt món online, cửa hàng, cơ sở sản xuất |
| **C. Woo trên site Hub** | WooCommerce của **veganhub.net** | trang Woo bình thường (giữ theme) + shortcode trong trang Hub | chỉ **dịch vụ của Hub**: vé sự kiện, gói Coach, voucher hội viên dùng chéo (canon OH-Q3) |

Gọi sản phẩm Woo trên site Hub (đường C) — đặt trong một trang WordPress hoặc bài sự kiện:

```text
[products category="ve-su-kien" limit="6" columns="3" orderby="date"]
[products category="voucher-hoi-vien" limit="4" columns="4"]
[product_page id="123"]
```

Trang dùng shortcode này được vẽ trong khung Hub; CSS / JS của WooCommerce được giữ. Danh mục sản phẩm đề xuất: `ve-su-kien`, `goi-coach`, `voucher-hoi-vien`. Sản phẩm dịch vụ gắn meta `_bz_hub_service = 1` để mảng Doanh thu (Đ3) đếm.

Đường B không cần tài khoản hay khoá: Store API của WooCommerce là API đọc công khai sẵn có. Cần thêm một trường hồ sơ "Website bán hàng (có WooCommerce)" + ô đồng ý (CM-Q2).

## 7. Việc cần làm để cổng "đầy" trong 2 tuần

| # | Việc | Ai | Phụ thuộc |
|---|---|---|---|
| 1 | Tạo 5 chuyên mục (§2), xếp 3 bài cũ, thêm ảnh đại diện | biên tập | — |
| 2 | Viết 12 bài tuần 1–4 (§4) theo khuôn §3 | biên tập | 1 |
| 3 | Chốt CM-Q1…Q4 | chủ Hub | — |
| 4 | Lệnh `wp ohcl demo seed/remove` + chế độ mẫu trên bản đồ | dev | 3 |
| 5 | Nhập 24 cơ sở mẫu (§5.2) | dev (1 lệnh) | 4 |
| 6 | Mời 5–10 cơ sở thật đầu tiên, đi đủ V1→V4 | ban điều hành | — |
| 7 | Sản phẩm Woo của Hub: vé "Ăn chay ngày rằm", voucher hội viên | ban điều hành | — |
| 8 | Đường B (sản phẩm từ site cơ sở) | dev | CM-Q2 |
| 9 | Tắt chế độ mẫu khi có ≥ 10 cơ sở thật V4 | chủ Hub | 6 |

## 8. Câu hỏi cần chủ Hub chốt

| Mã | Câu hỏi | Đề xuất |
|---|---|---|
| CM-Q1 | Dữ liệu mẫu hiện **công khai** (nhãn "Mẫu") hay **chỉ quản trị viên** xem? | Công khai có nhãn, trong giai đoạn trước khi có 10 cơ sở thật; tắt khi mở chính thức |
| CM-Q2 | Cho cổng đọc sản phẩm công khai từ site riêng của cơ sở (đường B)? | Có, theo đồng ý của từng cơ sở |
| CM-Q3 | Bài viết mẫu: đăng ngay hay để nháp cho biên tập viết lại? | Nháp; chỉ đăng bài đã kiểm thông tin |
| CM-Q4 | Tỉnh ưu tiên mời cơ sở thật trước? | Hà Nội, TP.HCM, Huế, Đà Lạt |

## 9. Tiến độ (cập nhật 2026-11-26)

| Hạng mục | Mã | Trạng thái |
|---|---|---|
| Lõi `open-hub-core` Đ1 + ghép nối bằng mã | 0.2.3 | [x] chạy thật bizcity.vn ↔ veganhub.net (4/4) |
| Client Đ1a–Đ1c: hợp đồng ngành, quản trị, Member 360° | 0.4.0 | [x] mã + test · [x] chạy thật |
| Cổng P1–P4 (trang chủ, bản đồ, hồ sơ, đăng ký) | F1 · 0.5.0 | [x] mã + test · [x] chạy thật |
| Chứng nhận + tra cứu QR | Đ2a · 0.6.0 | [x] mã + test · [ ] cấp giấy thật (bộ tiêu chuẩn còn nháp) |
| Đủ trang sitemap + My Hub + khung Hub cả site | F2 · 0.7.0 | [x] mã + test · [x] chạy thật |
| Trang WordPress + "Menu Hub" | F3 · 0.8.0 | [x] mã + test · [x] chạy thật |
| Sửa giao diện site thật (chữ trống, phần thừa của theme, CSS bị giữ, màu) | 0.8.1–0.8.2 | [x] mã + test · [~] chờ tải lên |
| Bản đồ lớn dưới hero, danh mục vào hàng giữa, danh bạ không báo lỗi khi chưa có khoá, màu chọn lưu được | 0.8.3 | [x] mã + test · [ ] tải lên |
| Nội dung & dữ liệu mẫu (tài liệu này) | CM-1 | [x] nghiên cứu · [ ] chủ Hub chốt §8 |
| Chế độ dữ liệu mẫu + lệnh seed | CM-2 | [ ] chờ CM-Q1 |
| Sản phẩm từ site cơ sở (Store API) | CM-3 | [ ] chờ CM-Q2 |
| My Hub đo lượt xem / liên hệ, Marketing, Coach + hoa hồng, Doanh thu | Đ3 | [ ] chưa làm |
