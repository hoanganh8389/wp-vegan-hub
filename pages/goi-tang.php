<?php
/**
 * /nhan-goi-tang/ — mockup màn 2: trong gói có gì + biểu mẫu nhận gói.
 * Biểu mẫu gửi về REST bizcity-open-hub/v1/lead loại "vegan-gift" (lưu bài riêng tư, báo email quản trị).
 *
 * @package WP_Vegan_Hub
 */
// [2026-11-25 10:55 AM Johnny Chu - Chu Hoàng Anh] HUB-VEGAN V-5 — trang nhận gói tặng + dùng thử.

defined( 'ABSPATH' ) || exit;

$vh = WP_Vegan_Hub::data();

echo bz_oh_hero( // phpcs:ignore
	array(
		'crumb' => array( array( 'Trang chủ', bz_oh_url( 'home' ) ), array( 'Nhận gói tặng', '' ) ),
		'k'     => 'Bộ phần mềm tặng hội viên',
		't'     => 'Nhận gói <em>0đ</em> trong 5 phút',
		'l'     => 'Phần mềm mở, miễn phí mãi mãi. Trợ lý AI dùng thử miễn phí ' . (int) WP_Vegan_Hub::trial_days() . ' ngày; sau đó trả theo việc dùng thật, không theo đầu người.',
	)
);

$vh_rows = array();
foreach ( $vh['package'] as $vh_r ) {
	$vh_rows[] = array( esc_html( $vh_r[0] ), esc_html( WP_Vegan_Hub::days( $vh_r[1] ) ), esc_html( $vh_r[2] ) );
}
$vh_segs = array();
foreach ( bz_oh_industries() as $vh_s ) {
	$vh_segs[] = $vh_s['name'];
}

echo bz_oh_band( // phpcs:ignore
	'',
	'<div class="g2"><div>' . bz_oh_sh( 'Trong gói có gì', 'Tặng thật, <em>không cắt bớt</em>' )
	. bz_oh_table( array( 'Phần', 'Giá', 'Ghi chú' ), $vh_rows )
	. '<p class="note">' . esc_html( $vh['gift_note'] ) . '</p></div>'
	. '<div>' . bz_oh_sh( 'Đăng ký', 'Nhận gói cho cơ sở của bạn' )
	. bz_oh_form(
		'vegan-gift',
		array(
			array( 'Tên cơ sở', 'company', 'text', 'Quán chay Sen Hồng' ),
			array( 'Phân khúc', 'choice', 'select', $vh_segs ),
			array( 'Họ tên người liên hệ', 'name', 'text', '' ),
			array( 'Tỉnh / thành', 'province', 'text', '' ),
			array( 'Email', 'email', 'email', 'ban@coso.vn' ),
			array( 'Số Zalo, mã giới thiệu của hội (nếu có)', 'message', 'area', '09… · VEGAN-HN-01' ),
		),
		'Nhận gói tặng',
		'Đã nhận. Ban điều hành hub sẽ liên hệ qua Zalo hoặc email để cấp site và khoá.'
	)
	. '<p class="note">Không cần thẻ thanh toán. Hub chỉ dùng thông tin này để cấp site và khoá cho cơ sở.</p></div></div>'
);
