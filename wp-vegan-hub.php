<?php
/**
 * Plugin Name:       Vegan Hub — Bizcity Open cho ngành chay
 * Plugin URI:        https://github.com/hoanganh8389/wp-vegan-hub
 * Description:       Giao diện hub ngành chay chạy trên bizcity-llm-router + open-hub: tặng bộ phần mềm mã nguồn mở, dùng thử trợ lý AI miễn phí, cấp khoá và theo dõi doanh thu khoá cho Twin Brain.
 * Version:           0.1.0
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Author:            Johnny Chu – Chu Hoàng Anh
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wp-vegan-hub
 *
 * @package WP_Vegan_Hub
 */
// [2026-11-25 10:55 AM Johnny Chu - Chu Hoàng Anh] HUB-VEGAN V-0 — plugin hub ngành đầu tiên theo chuẩn CHUAN-HUB-NGANH (open-hub canon).

defined( 'ABSPATH' ) || exit;

if ( defined( 'WP_VEGAN_HUB_VERSION' ) ) {
	return;
}

define( 'WP_VEGAN_HUB_VERSION', '0.1.0' );
define( 'WP_VEGAN_HUB_DIR', plugin_dir_path( __FILE__ ) );
define( 'WP_VEGAN_HUB_URL', plugin_dir_url( __FILE__ ) );

foreach ( array( 'includes/class-vegan-hub.php', 'admin/class-vegan-hub-admin.php' ) as $wp_vegan_hub_f ) {
	$wp_vegan_hub_p = WP_VEGAN_HUB_DIR . $wp_vegan_hub_f;
	if ( is_file( $wp_vegan_hub_p ) && is_readable( $wp_vegan_hub_p ) ) {
		require_once $wp_vegan_hub_p;
	}
}
unset( $wp_vegan_hub_f, $wp_vegan_hub_p );

if ( class_exists( 'WP_Vegan_Hub' ) ) {
	WP_Vegan_Hub::boot();
}
if ( is_admin() && class_exists( 'WP_Vegan_Hub_Admin' ) ) {
	WP_Vegan_Hub_Admin::boot();
}
