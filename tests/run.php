<?php
/**
 * Vegan Hub: dữ liệu ngành đạt hợp đồng bizcity_industry_hub@2 và giữ ranh giới R-HUB-14 / R-HUB-15.
 * Cần repo open-hub-client nằm cạnh (../open-hub-client) hoặc biến môi trường OHCL_DIR.
 * Run: php tests/run.php — exit 0 = pass, 2 = SKIP (thiếu open-hub-client).
 *
 * @package WP_Vegan_Hub
 */
// [2026-11-25 05:52 PM Johnny Chu - Chu Hoàng Anh] HUB-VEGAN V-10 — test dữ liệu @2 bằng bộ kiểm của open-hub-client.

define( 'ABSPATH', __DIR__ . '/' );
define( 'OHCL_TESTING', true );

$root = dirname( __DIR__ );
$ohcl = getenv( 'OHCL_DIR' ) ? rtrim( getenv( 'OHCL_DIR' ), '/\\' ) : dirname( $root ) . '/open-hub-client';
if ( ! is_file( $ohcl . '/includes/class-ohcl-industry.php' ) ) {
	echo "SKIP  không thấy open-hub-client ở $ohcl (đặt OHCL_DIR)\n";
	exit( 2 );
}

class WP_Error { public function __construct( $c = '', $m = '', $d = null ) {} }
function is_wp_error( $x ) { return $x instanceof WP_Error; }
function wp_json_encode( $v ) { return json_encode( $v ); }
function get_option( $k, $d = false ) { return $d; }
function add_filter() { return true; }
function add_action() { return true; }
function apply_filters( $h, $v ) { return $v; }
function plugin_dir_path( $f ) { return dirname( $f ) . '/'; }
function plugin_dir_url( $f ) { return 'https://example.test/'; }
function is_admin() { return false; }

foreach ( array( 'class-ohcl-error', 'class-ohcl-modules', 'class-ohcl-industry', 'class-ohcl-demo' ) as $f ) {
	require $ohcl . '/includes/' . $f . '.php';
}
define( 'OHCL_VERSION', 'test' );
require $root . '/wp-vegan-hub.php';

$pass = 0; $fail = 0;
function check( $name, $ok ) { global $pass, $fail; if ( $ok ) { $pass++; echo "PASS  $name\n"; } else { $fail++; echo "FAIL  $name\n"; } }

$data = WP_Vegan_Hub::industry();
$r    = OHCL_Industry::validate( $data );
foreach ( array_merge( $r['errors'], $r['warnings'] ) as $line ) { echo "      · $line\n"; }
check( 'dữ liệu Vegan đạt @2, không lỗi, không cảnh báo, không khoá lạ', $r['ok'] && ! $r['errors'] && ! $r['warnings'] && ! $r['ignored'] );
check( 'mã Hub = vegan, màu nhấn #1f7a3a', 'vegan' === $r['config']['id'] && '#1f7a3a' === $r['config']['brand']['accent'] );
check( '6 phân khúc, 4 trường hồ sơ, 3 bộ tiêu chuẩn', 6 === count( $r['config']['segments'] ) && 4 === count( $r['config']['member_fields'] ) && 3 === count( $r['config']['standards'] ) );
check( 'module 10 tắt, các module bắt buộc vẫn bật', false === OHCL_Modules::decide( '10', array(), $r['config']['modules'] ) && OHCL_Modules::decide( '12', array(), $r['config']['modules'] ) );
check( 'có open-hub-client ⇒ đi đường @2', WP_Vegan_Hub::on_client() );

// [2026-11-26 09:59 AM Johnny Chu - Chu Hoàng Anh] HUB-VEGAN CM-2 — dữ liệu mẫu đạt gói của open-hub-client, đúng quyết định CM-Q1/Q4.
$demo = WP_Vegan_Hub::demo();
$dp   = OHCL_Demo::clean_pack( $demo, $r['config'] );
foreach ( $dp['skipped'] as $line ) { echo "      · bỏ qua: $line
"; }
check( 'dữ liệu mẫu: 24 cơ sở, 12 bài, 5 chuyên mục, không dòng nào bị bỏ', 24 === count( $dp['members'] ) && 12 === count( $dp['posts'] ) && 5 === count( $dp['categories'] ) && ! $dp['skipped'] );
check( 'ngưỡng tự ẩn = 15 cơ sở thật (CM-Q1)', 15 === $dp['threshold'] );
$by = array();
foreach ( $dp['members'] as $x ) { $by[ $x['province'] ][ $x['segment'] ] = true; }
check( 'tập trung Hà Nội + TP.HCM, mỗi thành phố đủ 6 loại hình (CM-Q4)', array( 'Hà Nội', 'TP.HCM' ) === array_keys( $by ) && 6 === count( $by['Hà Nội'] ) && 6 === count( $by['TP.HCM'] ) );
$refs = array_map( function ( $x ) { return $x['ref']; }, $dp['members'] );
preg_match_all( '/\{place:([a-z0-9-]+)\}/', implode( ' ', array_map( function ( $p ) { return $p['content']; }, $dp['posts'] ) ), $mm );
check( 'mọi link {place:…} trong bài trỏ tới một cơ sở mẫu có thật trong gói', $mm[1] && ! array_diff( $mm[1], $refs ) );
$dsrc = preg_replace( '#^\s*//.*$#m', '', preg_replace( '#/\*.*?\*/#s', '', (string) file_get_contents( $root . '/data/demo.php' ) ) ); // chỉ soi dữ liệu, bỏ chú thích
check( 'dữ liệu mẫu không có số điện thoại, email, website', '' !== trim( $dsrc ) && ! preg_match( '/\b0[0-9]{9}\b|[a-z0-9._-]+@[a-z0-9-]+\.[a-z]|https?:\/\//i', $dsrc ) );
$x = array_count_values( array_map( function ( $p ) { return $p['category']; }, $dp['posts'] ) );
check( 'lịch 12 bài: 4 kiến thức, 4 điểm đến, 2 sự kiện, 1 kinh doanh, 1 câu chuyện', array( 'kien-thuc' => 4, 'diem-den' => 4, 'su-kien' => 2, 'kinh-doanh-chay' => 1, 'cau-chuyen-hoi-vien' => 1 ) == $x ); // phpcs:ignore Universal.Operators.StrictComparisons

$src = '';
foreach ( array_merge( glob( $root . '/*.php' ), glob( $root . '/includes/*.php' ), glob( $root . '/data/*.php' ), glob( $root . '/pages/*.php' ) ) as $f ) { $src .= file_get_contents( $f ); }
check( 'không gọi lõi / mạng trực tiếp (R-HUB-2)', ! preg_match( '/OHCL_Core_Client|wp_remote_(get|post|request)|open-hub-core\/v1/', $src ) );
check( 'không gọi Cell / Zalo / LLM (R-HUB-15)', ! preg_match( '/zalo-hub|BizCity_LLM_Client|openrouter|chat\/completions/i', $src ) );
check( 'không tạo bảng', ! preg_match( '/CREATE\s+TABLE|dbDelta/i', $src ) );
$css = preg_replace( '#/\*.*?\*/#s', '', (string) file_get_contents( $root . '/assets/css/vegan-hub.css' ) ); // bỏ chú thích, chỉ soi khai báo
preg_match_all( '/font(?:-family)?\s*:[^;}]*/i', $css, $decl );
check( 'không font viết tay trong khai báo CSS (R-HUB-13)', ! preg_match( OHCL_Industry::FORBIDDEN_FONTS, implode( ';', $decl[0] ) ) );

echo "\n$pass pass, $fail fail\n";
exit( $fail ? 1 : 0 );
