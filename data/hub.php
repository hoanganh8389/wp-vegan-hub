<?php
/**
 * Dữ liệu của Vegan Hub. Mọi chữ hiển thị nằm ở đây (luật open-hub: chữ trong data/).
 * Ghi đè không sửa tệp: add_filter( 'wp_vegan_hub_data', fn( $d ) => … ).
 *
 * Ô rỗng / null = chưa chốt: trang tự ẩn ở live, hiện khung chờ ở preview.
 *
 * @package WP_Vegan_Hub
 */
// [2026-11-25 10:55 AM Johnny Chu - Chu Hoàng Anh] HUB-VEGAN V-1 — dữ liệu hub ngành chay theo mockup/vegan-hub.html (chờ chủ duyệt).

defined( 'ABSPATH' ) || exit;

return array(
	/* Hồ sơ bizcity_industry_hub@1 gửi cho bizcity-llm-router. */
	'profile'   => array(
		'id'         => 'vegan',
		'name'       => 'Vegan Hub',
		'industry'   => 'Ngành chay',
		'accent'     => '#1f7a3a',
		'leader'     => '', // [chốt] tên tổ chức leader ngành chay
		'trial_days' => 30, // HUB-Q4: đề xuất 30 ngày
		'apps'       => array( 'open-pos', 'open-inventory', 'open-ke-toan', 'open-crm', 'open-brain', 'open-web' ),
	),

	'brand'     => array(
		'name' => 'Vegan Hub',
		'sub'  => 'chạy trên Bizcity Open',
	),

	'hero'      => array(
		'k'     => 'Hub ngành chay · Mã nguồn mở · Tặng miễn phí',
		't'     => 'Chuyển đổi số<br><em>cho cả ngành chay Việt</em>',
		'l'     => 'Nhà hàng chay, cửa hàng thực phẩm chay, cơ sở sản xuất, bếp suất ăn dùng chung một bộ phần mềm mở: bán hàng, kho nguyên liệu, kế toán, khách quen, trợ lý AI trên Zalo. Hội nhận gói, hội viên dùng ngay.',
		'chips' => array( '0đ cho tất cả ứng dụng', 'Dùng thử trợ lý AI miễn phí', 'Không giới hạn người dùng' ),
	),

	/* Phiếu quà: [ dòng, giá ] */
	'gift'      => array(
		array( 'Bán hàng tại quầy (POS)', 'Tặng' ),
		array( 'Kho nguyên liệu, công thức món', 'Tặng' ),
		array( 'Sổ kế toán chuẩn Việt Nam', 'Tặng' ),
		array( 'Khách quen, ngày rằm, mùng một', 'Tặng' ),
		array( 'Trợ lý AI trên Zalo', 'Dùng thử {days} ngày' ),
	),
	'gift_note' => 'Hết thời gian dùng thử, sổ sách vẫn chạy bình thường. Chỉ trợ lý AI và đám mây tính phí theo việc dùng thật.',

	/* Lưới ứng dụng. alt = cách làm chung, không nêu tên thương hiệu khác (R-HUB-9). st: run|soon|comm|'' */
	'tiles'     => array(
		array( 't' => 'Kế toán', 'app' => 'open-ke-toan', 'ic' => 'ledger', 'st' => 'run', 'alt' => 'sổ sách thuê dịch vụ' ),
		array( 't' => 'Bán hàng POS', 'app' => 'open-pos', 'ic' => 'store', 'st' => 'run', 'alt' => 'máy POS thuê bao' ),
		array( 't' => 'Khách quen', 'app' => 'open-crm', 'ic' => 'users', 'st' => 'soon', 'alt' => 'sổ tay khách quen' ),
		array( 't' => 'Kho nguyên liệu', 'app' => 'open-inventory', 'ic' => 'boxes', 'st' => 'soon', 'alt' => 'kho ghi Excel' ),
		array( 't' => 'Website đặt món', 'app' => 'open-web', 'ic' => 'web', 'st' => 'run', 'alt' => 'web đặt món thuê' ),
		array( 't' => 'AI trên Zalo', 'app' => 'open-brain', 'ic' => 'brain', 'st' => 'run', 'alt' => 'nhắn tay ngày rằm' ),
		array( 't' => 'Báo cáo', 'page' => array( 'giai-phap', '' ), 'ic' => 'chart', 'st' => 'run', 'alt' => 'cộng doanh thu tay' ),
		array( 't' => 'Tự động hoá', 'app' => 'open-automation', 'ic' => 'gear', 'st' => 'run', 'alt' => 'nhắc việc bằng giấy' ),
		array( 't' => 'Công thức & dinh dưỡng', 'app' => 'open-notebook', 'ic' => 'book', 'st' => 'soon', 'alt' => 'công thức trong vở' ),
		array( 't' => 'Sản xuất thực phẩm chay', 'page' => array( 'nganh', 'san-xuat-chay' ), 'ic' => 'factory', 'st' => 'comm', 'alt' => 'định mức tính tay' ),
		array( 't' => 'Nguồn gốc & chứng nhận chay', 'page' => array( 'hoi-vien', '' ), 'ic' => 'leaf', 'st' => 'comm', 'alt' => 'giấy chứng nhận rời' ),
		array( 't' => 'Thêm module', 'page' => array( 'marketplace', '' ), 'ic' => 'puzzle', 'st' => '', 'alt' => 'chờ nhà cung cấp' ),
	),

	'quote'     => '“Cơ sở chay nhỏ không nên phải trả tiền nhiều phần mềm mới làm được sổ sách đúng và chăm được khách quen.”',

	'steps'     => array(
		array( 'Đăng ký hội viên', 'Tên cơ sở, phân khúc, số Zalo.' ),
		array( 'Nhận site + khoá', 'Hub cấp một site và một khoá cho mọi ứng dụng.' ),
		array( 'Bật ứng dụng', 'Bộ bật sẵn theo phân khúc; tắt bớt bất cứ lúc nào.' ),
		array( 'Nối Zalo', 'Trợ lý AI nhận đặt món, nhắc ngày rằm, báo doanh thu.' ),
	),

	/* Bảng "trong gói có gì": [ phần, giá, ghi chú ] */
	'package'   => array(
		array( 'POS, kho, kế toán, khách quen, website', '0đ', 'mã nguồn mở, mãi mãi' ),
		array( 'Trợ lý AI trên Zalo', '0đ / {days} ngày', 'hạn mức dùng thử do hub đặt' ),
		array( 'Đám mây vận hành sẵn', 'theo site', 'hoặc tự cài trên máy chủ riêng' ),
		array( 'Triển khai, đào tạo', 'theo dự án', 'hub hoặc đối tác của hub' ),
	),

	'community' => array(
		array( 'users', 'Danh bạ hội viên', 'Cơ sở đồng ý công khai: tên, phân khúc, tỉnh thành. Không công khai số liệu kinh doanh.' ),
		array( 'book', 'Kho mẫu ngành', 'Thực đơn mẫu, định mức nguyên liệu, kịch bản trợ lý Zalo cho ngày rằm, mùng một, lễ Vu Lan.' ),
		array( 'puzzle', 'Module cộng đồng', 'Truy xuất nguồn gốc, nhãn chứng nhận chay, tính dinh dưỡng: hội viên đề xuất, dev cộng đồng làm.' ),
	),
	'members'   => array(), // [chốt] chỉ cơ sở đã đồng ý bằng văn bản (R-HUB-7): [ tên, phân khúc, tỉnh, tháng tham gia ]

	'faq'       => array(
		array( 'Phần mềm có thật sự miễn phí mãi?', 'Có. Mọi ứng dụng là mã nguồn mở GPL. Hub tặng bản cài sẵn; bạn có thể tự cài trên máy chủ riêng cùng mã nguồn đó.' ),
		array( 'Hết dùng thử thì sao?', 'Sổ sách, bán hàng, kho vẫn chạy và dữ liệu vẫn của bạn. Chỉ trợ lý AI tạm nghỉ cho tới khi gia hạn theo việc dùng thật.' ),
		array( 'Có tính tiền theo số nhân viên không?', 'Không. Thêm nhân viên, mở thêm cửa hàng, tiền phần mềm vẫn 0đ.' ),
		array( 'Hub có xem được dữ liệu của cơ sở tôi không?', 'Không. Dữ liệu nằm ở site của bạn. Hub chỉ thấy số lượt dùng trợ lý AI của khoá để tính phí.' ),
	),
);
