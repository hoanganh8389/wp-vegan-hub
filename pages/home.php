<?php
/**
 * Trang chủ Vegan Hub — mockup/vegan-hub.html màn 1.
 * Dựng bằng helper bz_oh_* của open-hub; chữ trong data/hub.php.
 *
 * @package WP_Vegan_Hub
 */
// [2026-11-25 10:55 AM Johnny Chu - Chu Hoàng Anh] HUB-VEGAN V-4 — trang chủ hub ngành chay: hero + phiếu quà, lưới ứng dụng "Nếu không dùng Vegan Hub", phân khúc, lời leader, 4 bước, hỏi đáp.

defined( 'ABSPATH' ) || exit;

$vh   = WP_Vegan_Hub::data();
$vh_h = $vh['hero'];

/* 1. Hero + phiếu quà */
$vh_gift = '<div class="rcpt" aria-label="Phiếu quà ngành chay"><h3 class="rh"><span>Phiếu quà ngành chay</span><span>' . esc_html( $vh['brand']['name'] ) . '</span></h3>';
foreach ( $vh['gift'] as $vh_r ) {
	$vh_gift .= '<div class="r"><span>' . esc_html( $vh_r[0] ) . '</span><span>' . esc_html( WP_Vegan_Hub::days( $vh_r[1] ) ) . '</span></div>';
}
$vh_gift .= '<div class="tot"><span>Phí phần mềm mỗi tháng</span><span>0đ</span></div><small>' . esc_html( $vh['gift_note'] ) . '</small></div>';

echo bz_oh_hero( // phpcs:ignore WordPress.Security.EscapeOutput -- helper đã thoát.
	array(
		'k'     => $vh_h['k'],
		't'     => $vh_h['t'],
		'l'     => $vh_h['l'],
		'chips' => $vh_h['chips'],
		'acts'  => bz_oh_btn( 'Nhận gói tặng – Miễn phí', bz_oh_url( 'goi-tang' ) ) . bz_oh_btn( 'Xem cộng đồng', bz_oh_url( 'hoi-vien' ), 'line' ),
		'side'  => $vh_gift,
	)
);

/* 2. Lưới ứng dụng + "Nếu không dùng Vegan Hub" */
$vh_tiles = '';
foreach ( bz_oh_site( 'tiles' ) as $vh_t ) {
	$vh_href   = isset( $vh_t['app'] ) ? bz_oh_url( 'app', $vh_t['app'] ) : bz_oh_url( $vh_t['page'][0], $vh_t['page'][1] );
	$vh_tag    = bz_oh_tag( $vh_t['st'] );
	$vh_tiles .= '<a class="tile" href="' . esc_url( $vh_href ) . '"><span class="alt">' . esc_html( $vh_t['alt'] ) . '</span><span class="bx">' . bz_oh_icon( $vh_t['ic'] ) . '</span><b>' . esc_html( $vh_t['t'] ) . '</b>'
		. ( $vh_tag ? $vh_tag : '<span class="tag mute">Marketplace</span>' ) . '</a>';
}
echo bz_oh_band( // phpcs:ignore
	'soft',
	bz_oh_sh( 'Ứng dụng', 'Cả cơ sở chay trên <em>một bộ mã nguồn mở</em>', 'Bán hàng, kho, sổ sách, khách quen, công thức món dùng chung một dữ liệu. Cần gì bật nấy: không mua thêm phần mềm, không nhập liệu hai lần.' )
	. '<button type="button" class="sw" data-alt aria-pressed="true" aria-controls="apps-g"><span class="knob"></span>Nếu không dùng ' . esc_html( $vh['brand']['name'] ) . '</button>'
	. '<div class="apps-g" id="apps-g">' . $vh_tiles . '</div>'
	. '<div class="apps-foot"><span>Mỗi chữ viết tay là một phần mềm hoặc một việc làm tay mà cơ sở đang trả tiền riêng, nhập liệu riêng. Với ' . esc_html( $vh['brand']['name'] ) . ', tất cả dùng chung một dữ liệu và một sổ kế toán.</span><a class="lnk" href="' . esc_url( bz_oh_url( 'san-pham' ) ) . '">Xem tất cả ứng dụng →</a></div>',
	'he-sinh-thai'
);

/* 3. Phân khúc */
$vh_seg = '';
foreach ( bz_oh_industries() as $vh_k => $vh_s ) {
	$vh_seg .= '<a class="card" href="' . esc_url( bz_oh_url( 'nganh', $vh_k ) ) . '">' . bz_oh_icon( $vh_s['ic'], 'lg' ) . '<h3>' . esc_html( $vh_s['name'] ) . '</h3><p>' . esc_html( $vh_s['short'] ) . '</p></a>';
}
echo bz_oh_band( '', bz_oh_sh( 'Giải pháp theo phân khúc', 'Bật sẵn cho từng kiểu cơ sở chay' ) . '<div class="g3">' . $vh_seg . '</div>' ); // phpcs:ignore

/* 4. Lời leader ngành */
$vh_leader = WP_Vegan_Hub::leader();
echo bz_oh_band( // phpcs:ignore
	'redb',
	'<p class="kick">Vì sao hội tặng phần mềm</p><p class="quote">' . esc_html( $vh['quote'] ) . '</p>'
	. '<p class="sig">Ban điều hành ' . esc_html( $vh['brand']['name'] ) . ( $vh_leader ? ' · ' . esc_html( $vh_leader ) : bz_oh_pending( 'tên tổ chức leader: chờ chốt' ) ) . '</p>'
);

/* 5. Bốn bước */
$vh_st = '';
foreach ( $vh['steps'] as $vh_x ) {
	$vh_st .= '<li><b>' . esc_html( $vh_x[0] ) . '</b><span>' . esc_html( $vh_x[1] ) . '</span></li>';
}
echo bz_oh_band( 'dark', bz_oh_sh( 'Bắt đầu thế nào', 'Bốn bước, <em>không cần cài đặt</em>' ) . '<ol class="flow">' . $vh_st . '</ol>' ); // phpcs:ignore

/* 6. Hỏi đáp + lời mời */
echo bz_oh_band( '', bz_oh_sh( 'Hỏi đáp', 'Câu hỏi thường gặp' ) . bz_oh_faq( $vh['faq'] ) ); // phpcs:ignore
echo bz_oh_cta( 'Nhận gói tặng cho cơ sở của bạn.', 'Phần mềm mã nguồn mở 0đ mãi mãi, trợ lý AI dùng thử ' . (int) WP_Vegan_Hub::trial_days() . ' ngày.' ); // phpcs:ignore
