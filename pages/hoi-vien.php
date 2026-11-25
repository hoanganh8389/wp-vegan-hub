<?php
/**
 * /cong-dong-chay/ — mockup màn 3: cộng đồng ngành chay.
 * Danh bạ hội viên chỉ hiện cơ sở đã đồng ý (R-HUB-7); rỗng thì hiện khung chờ ở preview.
 *
 * @package WP_Vegan_Hub
 */
// [2026-11-25 10:55 AM Johnny Chu - Chu Hoàng Anh] HUB-VEGAN V-6 — trang cộng đồng: ba trụ, danh bạ hội viên đã đồng ý.

defined( 'ABSPATH' ) || exit;

$vh = WP_Vegan_Hub::data();

echo bz_oh_hero( // phpcs:ignore
	array(
		'crumb' => array( array( 'Trang chủ', bz_oh_url( 'home' ) ), array( 'Cộng đồng ngành chay', '' ) ),
		'k'     => 'Cộng đồng ngành chay',
		't'     => 'Leader ngành dẫn đường,<br><em>hội viên cùng làm</em>',
		'l'     => 'Nơi các cơ sở chay chia sẻ công thức, nguồn cung, mẫu quy trình, và cùng góp module cho bộ phần mềm của ngành.',
		'acts'  => bz_oh_btn( 'Tham gia – nhận gói tặng', bz_oh_url( 'goi-tang' ) ),
	)
);

$vh_c = '';
foreach ( $vh['community'] as $vh_x ) {
	$vh_c .= '<div class="card">' . bz_oh_icon( $vh_x[0], 'lg' ) . '<h3>' . esc_html( $vh_x[1] ) . '</h3><p>' . esc_html( $vh_x[2] ) . '</p></div>';
}

$vh_m = '';
if ( ! empty( $vh['members'] ) ) {
	$vh_rows = array();
	foreach ( $vh['members'] as $vh_r ) {
		$vh_rows[] = array_map( 'esc_html', array_slice( array_values( (array) $vh_r ), 0, 4 ) );
	}
	$vh_m = bz_oh_sh( 'Hội viên', 'Cơ sở đã tham gia' ) . bz_oh_table( array( 'Cơ sở', 'Phân khúc', 'Tỉnh', 'Tham gia' ), $vh_rows );
} else {
	$vh_m = bz_oh_pending( 'Danh bạ hội viên — chỉ thêm cơ sở đã đồng ý công khai bằng văn bản' );
}

echo bz_oh_band( '', '<div class="g3">' . $vh_c . '</div>' . ( $vh_m ? '<div style="margin-top:32px">' . $vh_m . '</div>' : '' ) ); // phpcs:ignore
