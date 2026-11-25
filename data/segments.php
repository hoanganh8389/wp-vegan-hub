<?php
/**
 * Sáu phân khúc ngành chay. Cùng định dạng data/industries.php của open-hub để dùng lại
 * khuôn /giai-phap/<khoá>/ (pages/nganh.php) — không chép trang.
 *
 * @package WP_Vegan_Hub
 */
// [2026-11-25 10:55 AM Johnny Chu - Chu Hoàng Anh] HUB-VEGAN V-2 — phân khúc ngành chay thay cho 6 ngành chung khi chạy trên site Vegan Hub.

defined( 'ABSPATH' ) || exit;

return array(
	'nha-hang-chay'   => array(
		'id'    => 'nha-hang-chay',
		'name'  => 'Nhà hàng, quán chay',
		'ic'    => 'store',
		'short' => 'Đơn tại quầy, mang về, đặt món Zalo về một chỗ',
		'hero'  => 'Đơn tại quầy, mang về, đặt món Zalo về một chỗ',
		'pains' => array( 'Ngày rằm, mùng một đông khách, đơn Zalo bị sót', 'Nguyên liệu tươi hư hỏng không ai ghi lại', 'Cuối tháng mới biết lãi lỗ' ),
		'apps'  => array( 'open-pos', 'open-brain', 'open-inventory', 'open-ke-toan' ),
		'day'   => array(
			array( '6:00', 'Trợ lý AI nhắc khách quen: mai là ngày rằm, mời đặt món trước' ),
			array( '9:00', 'Nhận đặt bàn, đặt món qua Zalo, ghi vào sổ khách' ),
			array( '11:00', 'Bán tại quầy trên Open POS' ),
			array( '15:00', 'Nhập rau, nấm, đậu; phiếu nhập vào sổ' ),
			array( '22:00', 'Chốt ca; chủ quán nhận doanh thu trong ngày qua Zalo' ),
		),
	),
	'cua-hang-chay'   => array(
		'id'    => 'cua-hang-chay',
		'name'  => 'Cửa hàng thực phẩm chay',
		'ic'    => 'boxes',
		'short' => 'Tồn kho theo hạn dùng, nhiều chi nhánh, một sổ',
		'hero'  => 'Tồn kho theo hạn dùng cho mọi chi nhánh, trên một sổ',
		'pains' => array( 'Hàng chay đông lạnh, khô có hạn dùng khác nhau', 'Tồn kho lệch giữa các chi nhánh', 'Khách hỏi hàng qua Zalo, không ai trả lời kịp' ),
		'apps'  => array( 'open-pos', 'open-inventory', 'open-ke-toan', 'open-brain' ),
		'day'   => array(
			array( '7:30', 'Trợ lý AI báo hàng sắp hết hạn trong tuần' ),
			array( 'Cả ngày', 'Bán tại quầy và đơn Zalo trên cùng một sổ' ),
			array( '14:00', 'Chuyển hàng giữa hai chi nhánh' ),
			array( '17:00', 'Kế toán xem công nợ nhà cung cấp' ),
		),
	),
	'san-xuat-chay'   => array(
		'id'    => 'san-xuat-chay',
		'name'  => 'Sản xuất thực phẩm chay',
		'ic'    => 'factory',
		'short' => 'Định mức nguyên liệu, lô sản xuất, sẵn sàng hồ sơ OCOP',
		'hero'  => 'Định mức nguyên liệu và lô sản xuất trên cùng sổ kế toán',
		'pains' => array( 'Giá thành tính tay, không biết lãi từng sản phẩm', 'Lô sản xuất không truy được nguyên liệu', 'Công nợ đại lý theo dõi bằng Excel' ),
		'apps'  => array( 'open-inventory', 'open-ke-toan', 'open-crm', 'open-automation' ),
		'note'  => 'Module sản xuất (định mức, lô) do cộng đồng làm; trạng thái theo Marketplace.',
		'day'   => array(
			array( '7:00', 'Xuất nguyên liệu cho lô sản xuất trong ngày' ),
			array( '13:00', 'Nhập thành phẩm, gắn số lô' ),
			array( '16:00', 'Giao đại lý; công nợ cập nhật' ),
			array( '18:00', 'Chủ hỏi trợ lý AI giá thành và tồn kho' ),
		),
	),
	'bep-suat-an'     => array(
		'id'    => 'bep-suat-an',
		'name'  => 'Bếp suất ăn, giao cơm chay',
		'ic'    => 'truck',
		'short' => 'Đơn định kỳ, công nợ khách đoàn, giao theo tuyến',
		'hero'  => 'Đơn định kỳ và công nợ khách đoàn không cần sổ tay',
		'pains' => array( 'Đơn đặt định kỳ ghi trên giấy', 'Công nợ văn phòng, khách đoàn dồn cuối tháng', 'Suất ăn thừa, thiếu không đo được' ),
		'apps'  => array( 'open-crm', 'open-pos', 'open-ke-toan', 'open-automation' ),
		'day'   => array(
			array( '8:00', 'Trợ lý AI chốt số suất của từng khách đoàn qua Zalo' ),
			array( '10:30', 'Giao theo tuyến; phiếu giao vào sổ' ),
			array( '15:00', 'Nhắc nợ đến hạn tự động' ),
		),
	),
	'thien-vien'      => array(
		'id'    => 'thien-vien',
		'name'  => 'Thiền viện, dưỡng sinh',
		'ic'    => 'heart',
		'short' => 'Bếp chay, công quả, sổ thu chi minh bạch',
		'hero'  => 'Bếp chay và sổ thu chi minh bạch cho cả cộng đồng',
		'pains' => array( 'Công quả, cúng dường ghi sổ tay', 'Bếp nấu cho khoá tu không biết trước số người', 'Báo cáo thu chi mất nhiều công' ),
		'apps'  => array( 'open-ke-toan', 'open-inventory', 'open-brain', 'open-web' ),
		'day'   => array(
			array( '5:00', 'Trợ lý AI tổng hợp số người đăng ký khoá tu' ),
			array( '9:00', 'Xuất kho cho bếp theo số suất' ),
			array( '20:00', 'Sổ thu chi trong ngày sẵn cho ban quản lý' ),
		),
	),
	'nong-trai'       => array(
		'id'    => 'nong-trai',
		'name'  => 'Nông trại, nguồn cung',
		'ic'    => 'home',
		'short' => 'Nhận đơn từ hội viên, truy xuất lô rau',
		'hero'  => 'Nhận đơn của các cơ sở chay và giao đúng lô',
		'pains' => array( 'Đơn của nhiều quán chay đến qua nhiều kênh', 'Không truy được lô rau đã giao cho ai', 'Công nợ khách sỉ rời rạc' ),
		'apps'  => array( 'open-crm', 'open-inventory', 'open-ke-toan', 'open-brain' ),
		'day'   => array(
			array( '5:30', 'Thu hoạch; nhập kho theo lô' ),
			array( '7:00', 'Trợ lý AI gom đơn Zalo của các quán' ),
			array( '9:00', 'Giao hàng; công nợ cập nhật' ),
		),
	),
);
