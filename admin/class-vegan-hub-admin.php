<?php
/**
 * wp-admin › Vegan Hub — mockup màn 4 (bảng điều khiển của leader ngành).
 *   Tab "Khoá & doanh thu": số khoá + doanh thu theo khoá, đọc từ BizCity_Router_Industry_Hub (router giữ sổ).
 *   Tab "Cài đặt": tên tổ chức leader, số ngày dùng thử.
 * Cấp khoá: một biểu mẫu POST (nonce + manage_options); khoá hiện MỘT lần rồi xoá khỏi bộ đệm.
 *
 * @package WP_Vegan_Hub
 */
// [2026-11-25 10:55 AM Johnny Chu - Chu Hoàng Anh] HUB-VEGAN V-8 — trang quản trị leader: khoá & doanh thu, cấp khoá dùng thử, cài đặt.

defined( 'ABSPATH' ) || exit;

final class WP_Vegan_Hub_Admin {

	const SLUG     = 'wp-vegan-hub';
	const SETTINGS = 'wp_vegan_hub_settings';

	public static function boot() {
		add_action( 'admin_menu', array( __CLASS__, 'menu' ) );
		add_action( 'admin_post_wp_vegan_hub_issue', array( __CLASS__, 'handle_issue' ) );
		add_action( 'admin_post_wp_vegan_hub_settings', array( __CLASS__, 'handle_settings' ) );
	}

	public static function menu() {
		add_menu_page( 'Vegan Hub', 'Vegan Hub', 'manage_options', self::SLUG, array( __CLASS__, 'render' ), 'dashicons-carrot', 3 );
	}

	private static function url( $args = array() ) {
		return add_query_arg( array_merge( array( 'page' => self::SLUG ), $args ), admin_url( 'admin.php' ) );
	}

	private static function flash_key() {
		return 'wp_vegan_hub_flash_' . get_current_user_id();
	}

	public static function render() {
		if ( ! current_user_can( 'manage_options' ) ) {
			echo '<div class="wrap"><h1>Vegan Hub</h1><p><b>Bạn không có quyền xem doanh thu hub.</b> Nhờ quản trị viên cấp quyền. <code>hub_forbidden</code></p></div>';
			return;
		}
		$tab = isset( $_GET['tab'] ) ? sanitize_key( wp_unslash( $_GET['tab'] ) ) : 'keys'; // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- chỉ chọn tab.
		echo '<div class="wrap"><h1>Vegan Hub</h1><nav class="nav-tab-wrapper">';
		foreach ( array( 'keys' => 'Khoá &amp; doanh thu', 'settings' => 'Cài đặt hub' ) as $k => $label ) {
			echo '<a class="nav-tab' . ( $tab === $k ? ' nav-tab-active' : '' ) . '" href="' . esc_url( self::url( array( 'tab' => $k ) ) ) . '">' . $label . '</a>'; // phpcs:ignore WordPress.Security.EscapeOutput -- nhãn cố định.
		}
		echo '</nav>';
		self::flash();
		if ( 'settings' === $tab ) {
			self::render_settings();
		} else {
			self::render_keys();
		}
		echo '</div>';
	}

	private static function flash() {
		$f = get_transient( self::flash_key() );
		if ( ! is_array( $f ) ) {
			return;
		}
		delete_transient( self::flash_key() );
		if ( ! empty( $f['key'] ) ) {
			echo '<div class="notice notice-success"><p><b>Đã cấp khoá cho ' . esc_html( $f['business'] ) . '.</b> Khoá chỉ hiện một lần, chép gửi cơ sở ngay:</p><p><code style="font-size:15px">' . esc_html( $f['key'] ) . '</code></p><p>Dùng thử trợ lý AI ' . (int) $f['trial_days'] . ' ngày. Hết hạn chỉ cảnh báo, sổ sách không dừng.</p></div>';
		} elseif ( ! empty( $f['error'] ) ) {
			echo '<div class="notice notice-error"><p><b>' . esc_html( $f['error']['message'] ) . '</b> ' . esc_html( $f['error']['hint'] ) . ' <code>' . esc_html( $f['error']['code'] ) . '</code></p></div>';
		} elseif ( ! empty( $f['ok'] ) ) {
			echo '<div class="notice notice-success"><p>' . esc_html( $f['ok'] ) . '</p></div>';
		}
	}

	private static function render_keys() {
		if ( ! class_exists( 'BizCity_Router_Industry_Hub' ) ) {
			echo '<div class="notice notice-error inline"><p><b>Không đọc được sổ dùng.</b> Bật hoặc cập nhật plugin bizcity-llm-router (bản có hub ngành) rồi tải lại trang. <code>hub_router_missing</code></p></div>';
			return;
		}
		$days  = isset( $_GET['days'] ) ? max( 1, min( 90, (int) $_GET['days'] ) ) : 30; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$stats = BizCity_Router_Industry_Hub::key_stats();
		$rev   = BizCity_Router_Industry_Hub::revenue( $days );
		$rate  = ! empty( $rev['rate'] ) ? (float) $rev['rate'] : 0.0;
		$money = function ( $usd ) use ( $rate ) {
			return $rate > 0 ? number_format( $usd * $rate, 0, ',', '.' ) . 'đ' : '$' . number_format( $usd, 2 );
		};

		echo '<form method="get" style="margin:14px 0"><input type="hidden" name="page" value="' . esc_attr( self::SLUG ) . '"><label>Khoảng: <select name="days" onchange="this.form.submit()">';
		foreach ( array( 7, 30, 90 ) as $d ) {
			echo '<option value="' . (int) $d . '"' . selected( $days, $d, false ) . '>' . (int) $d . ' ngày</option>';
		}
		echo '</select></label></form>';

		$kpi = function ( $label, $value, $note ) {
			return '<div style="background:#fff;border:1px solid #dcdcde;border-radius:8px;padding:12px 16px;min-width:190px"><div style="color:#646970">' . esc_html( $label ) . '</div><div style="font-size:24px;font-weight:700">' . esc_html( $value ) . '</div><div style="color:#646970;font-size:12px">' . esc_html( $note ) . '</div></div>';
		};
		echo '<div style="display:flex;gap:12px;flex-wrap:wrap">';
		echo $kpi( 'Cơ sở đã nhận khoá', (string) $stats['members'], 'tài khoản có khoá của hub' ); // phpcs:ignore
		echo $kpi( 'Khoá đang chạy', (string) $stats['active'], $stats['total'] . ' khoá đã cấp' ); // phpcs:ignore
		echo $kpi( 'Doanh thu khoá (' . $days . ' ngày)', empty( $rev['success'] ) ? '—' : $money( (float) $rev['total_usd'] ), 'token + công cụ, từ sổ dùng' ); // phpcs:ignore
		echo $kpi( 'Phần của hub', '—', 'tỷ lệ chia chưa chốt (HUB-Q2)' ); // phpcs:ignore
		echo '</div>';

		echo '<h2 style="margin-top:24px">Theo khoá</h2>';
		if ( empty( $rev['success'] ) ) {
			echo '<p><b>Chưa đọc được doanh thu.</b> Sổ doanh thu của router chưa sẵn sàng. <code>' . esc_html( isset( $rev['code'] ) ? $rev['code'] : 'hub_revenue_unavailable' ) . '</code></p>';
		} elseif ( ! $rev['keys'] ) {
			echo '<p><b>Chưa có khoá nào phát sinh dùng trong ' . (int) $days . ' ngày.</b> Cấp khoá dùng thử đầu tiên ở dưới.</p>';
		} else {
			echo '<table class="widefat striped"><thead><tr><th>Cơ sở</th><th>Tên miền</th><th>Gói</th><th>Trạng thái</th><th>Token</th><th>Lượt công cụ</th><th>Doanh thu</th><th>Dùng gần nhất</th></tr></thead><tbody>';
			foreach ( $rev['keys'] as $k ) {
				echo '<tr><td>' . esc_html( $k['business'] ) . '</td><td>' . esc_html( $k['domain'] ) . '</td><td>' . esc_html( $k['plan'] ) . '</td><td>' . ( $k['is_active'] ? 'Đang chạy' : 'Đã thu hồi' ) . '</td><td>' . esc_html( number_format( $k['tokens'], 0, ',', '.' ) ) . '</td><td>' . (int) $k['calls'] . '</td><td>' . esc_html( $money( $k['total_usd'] ) ) . '</td><td>' . esc_html( $k['last_used'] ) . '</td></tr>';
			}
			echo '</tbody></table>';
		}
		echo '<p class="description">Số liệu đọc từ sổ dùng của BizCity Hub trên chính site này. Trang này không lưu bản sao nào.</p>';

		echo '<h2 style="margin-top:28px">Cấp khoá dùng thử</h2><form method="post" action="' . esc_url( admin_url( 'admin-post.php' ) ) . '">';
		wp_nonce_field( 'wp_vegan_hub_issue' );
		echo '<input type="hidden" name="action" value="wp_vegan_hub_issue"><table class="form-table"><tr><th><label for="vh-user">Tài khoản cơ sở</label></th><td><input id="vh-user" name="user" class="regular-text" required placeholder="email hoặc tên đăng nhập"></td></tr>'
			. '<tr><th><label for="vh-biz">Tên cơ sở</label></th><td><input id="vh-biz" name="business" class="regular-text" required maxlength="60"></td></tr>'
			. '<tr><th><label for="vh-seg">Phân khúc</label></th><td><select id="vh-seg" name="segment">';
		foreach ( WP_Vegan_Hub::segments() as $s ) {
			echo '<option>' . esc_html( $s['name'] ) . '</option>';
		}
		echo '</select></td></tr></table>';
		submit_button( 'Cấp khoá' );
		echo '</form>';
	}

	private static function render_settings() {
		$o = get_option( self::SETTINGS, array() );
		$o = is_array( $o ) ? $o : array();
		echo '<form method="post" action="' . esc_url( admin_url( 'admin-post.php' ) ) . '">';
		wp_nonce_field( 'wp_vegan_hub_settings' );
		echo '<input type="hidden" name="action" value="wp_vegan_hub_settings"><table class="form-table">'
			. '<tr><th><label for="vh-leader">Tổ chức leader ngành</label></th><td><input id="vh-leader" name="leader" class="regular-text" maxlength="120" value="' . esc_attr( isset( $o['leader'] ) ? $o['leader'] : '' ) . '"><p class="description">Hiện dưới lời giới thiệu trang chủ. Để trống: chưa chốt.</p></td></tr>'
			. '<tr><th><label for="vh-days">Số ngày dùng thử AI</label></th><td><input id="vh-days" name="trial_days" type="number" min="0" max="365" value="' . (int) WP_Vegan_Hub::trial_days() . '"></td></tr>'
			. '</table>';
		submit_button( 'Lưu' );
		echo '</form>';
	}

	public static function handle_issue() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'Bạn không có quyền cấp khoá.', 'wp-vegan-hub' ), 403 );
		}
		check_admin_referer( 'wp_vegan_hub_issue' );
		$who  = isset( $_POST['user'] ) ? sanitize_text_field( wp_unslash( $_POST['user'] ) ) : '';
		$biz  = isset( $_POST['business'] ) ? sanitize_text_field( wp_unslash( $_POST['business'] ) ) : '';
		$seg  = isset( $_POST['segment'] ) ? sanitize_text_field( wp_unslash( $_POST['segment'] ) ) : '';
		$user = is_email( $who ) ? get_user_by( 'email', $who ) : get_user_by( 'login', $who );
		if ( ! class_exists( 'BizCity_Router_Industry_Hub' ) ) {
			$res = new WP_Error( 'hub_router_missing', 'Bộ cấp khoá của BizCity Hub chưa sẵn sàng.', array( 'hint' => 'Bật plugin bizcity-llm-router bản có hub ngành.' ) );
		} else {
			$res = BizCity_Router_Industry_Hub::issue_trial_key( $user ? $user->ID : 0, $biz, $seg );
		}
		if ( is_wp_error( $res ) ) {
			$d    = (array) $res->get_error_data();
			$flash = array(
				'error' => array(
					'code'    => $res->get_error_code(),
					'message' => $res->get_error_message(),
					'hint'    => isset( $d['hint'] ) ? (string) $d['hint'] : '',
				),
			);
		} else {
			$flash = array( 'key' => $res['key'], 'business' => $biz, 'trial_days' => $res['trial_days'] );
		}
		set_transient( self::flash_key(), $flash, 2 * MINUTE_IN_SECONDS );
		wp_safe_redirect( self::url() );
		exit;
	}

	public static function handle_settings() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'Bạn không có quyền sửa cài đặt hub.', 'wp-vegan-hub' ), 403 );
		}
		check_admin_referer( 'wp_vegan_hub_settings' );
		$o = array(
			'leader'     => isset( $_POST['leader'] ) ? mb_substr( sanitize_text_field( wp_unslash( $_POST['leader'] ) ), 0, 120 ) : '',
			'trial_days' => isset( $_POST['trial_days'] ) ? max( 0, min( 365, (int) $_POST['trial_days'] ) ) : 30,
		);
		update_option( self::SETTINGS, $o, false );
		set_transient( self::flash_key(), array( 'ok' => 'Đã lưu cài đặt hub.' ), MINUTE_IN_SECONDS );
		wp_safe_redirect( self::url( array( 'tab' => 'settings' ) ) );
		exit;
	}
}
