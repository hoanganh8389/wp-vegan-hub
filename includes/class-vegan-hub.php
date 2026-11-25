<?php
/**
 * Nối Vegan Hub vào hai lõi, không chép mã của lõi nào:
 *   - bizcity-llm-router: đăng ký hồ sơ bizcity_industry_hub@1 (khoá, doanh thu do router giữ).
 *   - open-hub (templates/v2 của router): ghi đè dữ liệu qua filter bizcity_open_hub_data_*,
 *     thêm trang bằng khoá 'file', thêm CSS màu nhấn qua bizcity_open_hub_enqueue.
 * Thiếu lõi nào thì lặng lẽ bỏ phần đó và báo một dòng trong wp-admin.
 *
 * @package WP_Vegan_Hub
 */
// [2026-11-25 10:55 AM Johnny Chu - Chu Hoàng Anh] HUB-VEGAN V-3 — lớp nối hub ngành chay với router + open-hub.

defined( 'ABSPATH' ) || exit;

final class WP_Vegan_Hub {

	const CSS = 'wp-vegan-hub';

	/** @var array|null */
	private static $data = null;

	public static function boot() {
		add_action( 'bizcity_industry_hub_register', array( __CLASS__, 'register_profile' ) );
		add_filter( 'bizcity_open_hub_data_site', array( __CLASS__, 'site' ), 20 );
		add_filter( 'bizcity_open_hub_data_pages', array( __CLASS__, 'pages' ), 20 );
		add_filter( 'bizcity_open_hub_data_industries', array( __CLASS__, 'industries' ), 20 );
		add_filter( 'bizcity_open_hub_data_icons', array( __CLASS__, 'icons' ), 20 );
		add_filter( 'bizcity_open_hub_lead_types', array( __CLASS__, 'lead_types' ) );
		add_filter( 'bizcity_open_hub_keep_styles', array( __CLASS__, 'keep_styles' ) );
		add_action( 'bizcity_open_hub_enqueue', array( __CLASS__, 'enqueue' ) );
		add_action( 'admin_notices', array( __CLASS__, 'missing_core_notice' ) );
	}

	/** Dữ liệu hub (data/hub.php) qua filter wp_vegan_hub_data. */
	public static function data( $key = null ) {
		if ( null === self::$data ) {
			$d          = require WP_VEGAN_HUB_DIR . 'data/hub.php';
			self::$data = apply_filters( 'wp_vegan_hub_data', is_array( $d ) ? $d : array() );
		}
		if ( null === $key ) {
			return self::$data;
		}
		return isset( self::$data[ $key ] ) ? self::$data[ $key ] : null;
	}

	public static function trial_days() {
		$p = self::data( 'profile' );
		$o = get_option( 'wp_vegan_hub_settings', array() );
		if ( is_array( $o ) && isset( $o['trial_days'] ) ) {
			return max( 0, min( 365, (int) $o['trial_days'] ) );
		}
		return isset( $p['trial_days'] ) ? (int) $p['trial_days'] : 30;
	}

	/** Tên tổ chức leader ngành: cài đặt thắng data/hub.php; rỗng = chưa chốt. */
	public static function leader() {
		$o = get_option( 'wp_vegan_hub_settings', array() );
		if ( is_array( $o ) && ! empty( $o['leader'] ) ) {
			return (string) $o['leader'];
		}
		$p = self::data( 'profile' );
		return isset( $p['leader'] ) ? (string) $p['leader'] : '';
	}

	/** "{days}" trong chữ → số ngày dùng thử thật. */
	public static function days( $text ) {
		return str_replace( '{days}', (string) self::trial_days(), (string) $text );
	}

	/* ── bizcity-llm-router ── */

	public static function register_profile() {
		if ( ! class_exists( 'BizCity_Router_Industry_Hub' ) ) {
			return;
		}
		$p               = (array) self::data( 'profile' );
		$p['trial_days'] = self::trial_days();
		$p['plugin']     = 'wp-vegan-hub';
		$p['version']    = WP_VEGAN_HUB_VERSION;
		$p['segments']   = array_map(
			function ( $s ) {
				return $s['name'];
			},
			self::segments()
		);
		$o = get_option( 'wp_vegan_hub_settings', array() );
		if ( is_array( $o ) && ! empty( $o['leader'] ) ) {
			$p['leader'] = $o['leader'];
		}
		BizCity_Router_Industry_Hub::register( $p );
	}

	public static function segments() {
		$s = require WP_VEGAN_HUB_DIR . 'data/segments.php';
		return is_array( $s ) ? $s : array();
	}

	/* ── open-hub ── */

	public static function site( $site ) {
		$site['brand'] = self::data( 'brand' );
		$site['tiles'] = self::data( 'tiles' );
		return $site;
	}

	public static function industries( $list ) {
		return self::segments();
	}

	public static function pages( $pages ) {
		$dir = WP_VEGAN_HUB_DIR . 'pages/';
		if ( isset( $pages['home'] ) ) {
			$pages['home']['file']  = $dir . 'home.php';
			$pages['home']['title'] = 'Chuyển đổi số cho cả ngành chay Việt';
			$pages['home']['desc']  = 'Vegan Hub tặng nhà hàng chay, cửa hàng và cơ sở sản xuất thực phẩm chay bộ phần mềm mã nguồn mở: bán hàng, kho, kế toán, khách quen, trợ lý AI trên Zalo.';
		}
		if ( isset( $pages['giai-phap'] ) ) {
			$pages['giai-phap']['title'] = 'Giải pháp cho cơ sở chay';
			$pages['giai-phap']['desc']  = 'Bộ ứng dụng bật sẵn cho nhà hàng chay, cửa hàng, sản xuất, bếp suất ăn, thiền viện, nông trại.';
		}
		$pages['goi-tang'] = array(
			'path'  => 'nhan-goi-tang',
			'file'  => $dir . 'goi-tang.php',
			'title' => 'Nhận gói phần mềm tặng',
			'group' => 'Triển khai',
			'wave'  => 1,
			'desc'  => 'Bộ phần mềm mã nguồn mở 0đ cho cơ sở chay, dùng thử trợ lý AI miễn phí.',
		);
		$pages['hoi-vien'] = array(
			'path'  => 'cong-dong-chay',
			'file'  => $dir . 'hoi-vien.php',
			'title' => 'Cộng đồng ngành chay',
			'group' => 'Cộng đồng',
			'wave'  => 1,
			'desc'  => 'Hội viên, kho mẫu ngành, module cộng đồng của Vegan Hub.',
		);
		return $pages;
	}

	public static function icons( $icons ) {
		$icons['leaf'] = '<path d="M5 19c0-8 5-14 15-14 0 10-6 15-14 15"/><path d="M5 19l8-8"/>';
		return $icons;
	}

	public static function lead_types( $types ) {
		$types['vegan-gift'] = 'Vegan Hub — nhận gói tặng';
		return $types;
	}

	public static function keep_styles( $keep ) {
		$keep[] = self::CSS;
		return $keep;
	}

	public static function enqueue() {
		wp_enqueue_style( self::CSS, WP_VEGAN_HUB_URL . 'assets/css/vegan-hub.css', array( 'bz-oh' ), WP_VEGAN_HUB_VERSION );
	}

	public static function missing_core_notice() {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}
		$miss = array();
		if ( ! class_exists( 'BizCity_Open_Hub' ) ) {
			$miss[] = 'open-hub (templates/v2 của bizcity-llm-router)';
		}
		if ( ! class_exists( 'BizCity_Router_Industry_Hub' ) ) {
			$miss[] = 'BizCity_Router_Industry_Hub (bizcity-llm-router bản có hub ngành)';
		}
		if ( $miss ) {
			echo '<div class="notice notice-warning"><p><b>Vegan Hub</b> chạy thiếu: ' . esc_html( implode( ', ', $miss ) ) . '. Bật hoặc cập nhật bizcity-llm-router để có trang công khai và cấp khoá.</p></div>';
		}
	}
}
