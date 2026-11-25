<?php
/**
 * Dữ liệu ngành chay theo hợp đồng bizcity_industry_hub@2 (OPEN-HUB-CLIENT §10).
 * Chỉ dữ liệu: không khoá, không tiền, không gọi lõi / Cell / Zalo / LLM (R-HUB-14, R-HUB-15).
 * Nguồn: docs/CAU-HINH-NGANH-CHAY.md, docs/HO-SO-CO-SO-BAN-DO.md.
 *
 * @package WP_Vegan_Hub
 */
// [2026-11-25 05:52 PM Johnny Chu - Chu Hoàng Anh] HUB-VEGAN V-10 — chuyển Vegan Hub sang hợp đồng ngành @2 của open-hub-client.

defined( 'ABSPATH' ) || exit;

$segments = array();
foreach ( WP_Vegan_Hub::segments() as $slug => $s ) {
	$segments[ $slug ] = $s['name'];
}

return array(
	'contract'           => 'bizcity_industry_hub@2',
	'id'                 => 'vegan',
	'name'               => 'Vegan Hub',
	'industry'           => 'Ngành chay',
	'leader'             => WP_Vegan_Hub::leader(), // rỗng = chưa chốt
	'brand'              => array(
		'accent' => '#1f7a3a',
		'logo'   => '',
		'slogan' => 'Vì sức khoẻ con người · Vì hành tinh xanh',
	),
	'modules'            => array( '10' => false ), // Đối tác & nhà tài trợ: tắt tới khi có đối tác đầu tiên
	'terms'              => array(
		'member'   => 'cơ sở chay hội viên',
		'business' => 'cơ sở chay',
		'product'  => 'món / sản phẩm',
		'campaign' => 'chiến dịch theo dịp',
	),
	'segments'           => $segments,
	'member_fields'      => array(
		array( 'key' => 'cert', 'label' => 'Chứng nhận', 'type' => 'multi', 'options' => array( 'thuan-chay' => 'Thuần chay', 'thuc-duong' => 'Thực dưỡng', 'huu-co' => 'Hữu cơ' ), 'public' => true ),
		array( 'key' => 'menu', 'label' => 'Món / sản phẩm nổi bật (tối đa 6, cách nhau bằng dấu phẩy)', 'type' => 'text', 'public' => true ),
		array( 'key' => 'offer', 'label' => 'Ưu đãi hội viên', 'type' => 'text', 'public' => true ),
		array( 'key' => 'serve', 'label' => 'Hình thức phục vụ', 'type' => 'multi', 'options' => array( 'tai-cho' => 'Tại chỗ', 'mang-ve' => 'Mang về', 'giao-hang' => 'Giao hàng', 'suat-an' => 'Suất ăn' ), 'public' => true ),
	),
	// Bản nháp để vẽ mockup, chưa ban hành — cần chuyên gia ngành duyệt (CAU-HINH-NGANH-CHAY §5).
	'standards'          => array(
		array( 'code' => 'thuan-chay', 'label' => 'Thuần chay', 'criteria' => array( 'Không nguyên liệu động vật', 'Dụng cụ chế biến riêng', 'Nhà cung cấp gia vị có cam kết' ), 'evidence' => array( 'Ảnh bếp', 'Danh sách nhà cung cấp' ), 'validity_months' => 12 ),
		array( 'code' => 'thuc-duong', 'label' => 'Thực dưỡng', 'criteria' => array( 'Thực đơn theo nguyên tắc thực dưỡng', 'Nguồn gạo lứt rõ ràng' ), 'evidence' => array( 'Thực đơn', 'Hoá đơn nguyên liệu' ), 'validity_months' => 12 ),
		array( 'code' => 'bep-sach-chay', 'label' => 'Bếp sạch chay', 'criteria' => array( 'Vệ sinh an toàn thực phẩm', 'Lưu mẫu', 'Nguồn nước' ), 'evidence' => array( 'Giấy ATTP', 'Ảnh khu lưu mẫu' ), 'validity_months' => 6 ),
	),
	'coach_skills'       => array(
		array( 'code' => 'van-hanh-nha-hang', 'label' => 'Vận hành nhà hàng chay' ),
		array( 'code' => 'ke-toan-gia-von', 'label' => 'Kế toán, giá vốn' ),
		array( 'code' => 'marketing-ai', 'label' => 'Marketing, AI chăm sóc khách' ),
		array( 'code' => 'phat-trien-san-pham', 'label' => 'Phát triển sản phẩm' ),
	),
	'academy_tracks'     => array(
		array( 'code' => 'gia-von-mon', 'label' => 'Giá vốn món & định mức nguyên liệu' ),
		array( 'code' => 'kho-han-dung', 'label' => 'Kho nguyên liệu theo hạn dùng' ),
		array( 'code' => 'marketing-ngay-ram', 'label' => 'Marketing ngày rằm & trợ lý AI chăm khách' ),
		array( 'code' => 'ocop-thuc-pham-chay', 'label' => 'Hồ sơ OCOP cho thực phẩm chay' ),
	),
	'campaign_templates' => array(
		array( 'code' => 'an-chay-ngay-ram', 'label' => 'Ăn chay ngày rằm', 'description' => 'Hằng tháng, rằm và mùng một.' ),
		array( 'code' => 'tuan-le-am-thuc-chay', 'label' => 'Tuần lễ ẩm thực chay', 'description' => 'Theo thành phố.' ),
		array( 'code' => 'vegan-tour', 'label' => 'Vegan Tour', 'description' => 'Cuối tuần, đưa khách tới cơ sở.' ),
		array( 'code' => 'voucher-hoi-vien', 'label' => 'Voucher hội viên dùng chéo' ),
	),
	'apps'               => array( 'open-pos', 'open-ke-toan', 'open-inventory', 'open-crm', 'open-web', 'open-brain' ),
	'trial_days'         => max( 1, min( 90, WP_Vegan_Hub::trial_days() ) ), // @2: 1–90, lõi còn cắt theo trần
	'knowledge_assets'   => array(
		array( 'code' => 'thuc-don-mau', 'label' => 'Thực đơn mẫu nhà hàng chay', 'type' => 'template' ),
		array( 'code' => 'dinh-muc-nguyen-lieu', 'label' => 'Định mức nguyên liệu món chay', 'type' => 'template' ),
		array( 'code' => 'kich-ban-ngay-ram', 'label' => 'Kịch bản trợ lý Zalo ngày rằm, mùng một, Vu Lan', 'type' => 'ai_skill', 'description' => 'Hội viên cài vào site của mình; Cell đọc như mọi kỹ năng của site (R-HUB-15).' ),
	),
	'plugin'             => 'wp-vegan-hub',
	'version'            => WP_VEGAN_HUB_VERSION,
);
