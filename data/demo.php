<?php
/**
 * Dữ liệu mẫu của Vegan Hub cho open-hub-client (filter open_hub_client_demo, OPEN-HUB-CLIENT §12a).
 * Nguồn: docs/NGHIEN-CUU-NOI-DUNG-VA-DU-LIEU-MAU.md §2–§5, chủ Hub chốt CM-Q1…Q4 (2026-11-26):
 *   - cơ sở mẫu công khai có nhãn "Mẫu", tự ẩn khi Hub có 15 cơ sở thật công khai;
 *   - tập trung Hà Nội và TP.HCM (12 + 12, mỗi thành phố đủ 6 loại hình);
 *   - bài mẫu đăng ngay, chủ Hub đăng / nháp / xoá hết một lần ở Hub › Dữ liệu mẫu.
 *
 * Luật: tên có "(mẫu)", không điện thoại, email, website; địa chỉ chỉ tới khu vực; toạ độ gần trung tâm khu vực.
 * Mọi tên là tên đặt ra; trùng tên một cơ sở có thật là ngẫu nhiên.
 * Không số liệu chưa có nguồn; ngày âm lịch không ghi từ trí nhớ (biên tập viên tra lịch khi sửa bài).
 * Link trong bài: {map} {join} {benefits} {place:<ref>} — client thay bằng đường dẫn thật khi nhập.
 *
 * @package WP_Vegan_Hub
 */
// [2026-11-26 09:59 AM Johnny Chu - Chu Hoàng Anh] HUB-VEGAN CM-2 — 24 cơ sở mẫu Hà Nội + TP.HCM, 5 chuyên mục, 12 bài mẫu.

defined( 'ABSPATH' ) || exit;

$m = function ( $ref, $title, $seg, $prov, $area, $lat, $lng, $cert, $serve, $menu, $offer, $hours = '9:00 – 21:00' ) {
	return array(
		'ref'      => $ref,
		'title'    => $title,
		'segment'  => $seg,
		'province' => $prov,
		'address'  => $area . ', ' . $prov,
		'hours'    => $hours,
		'lat'      => $lat,
		'lng'      => $lng,
		'fields'   => array( 'cert' => $cert, 'serve' => $serve, 'menu' => $menu, 'offer' => $offer ),
	);
};

$hn  = 'Hà Nội';
$hcm = 'TP.HCM';

return array(
	'threshold'  => 15,
	'categories' => array(
		'kien-thuc'           => 'Ăn chay đúng cách',
		'diem-den'            => 'Điểm đến chay',
		'kinh-doanh-chay'     => 'Kinh doanh chay',
		'su-kien'             => 'Sự kiện & chương trình',
		'cau-chuyen-hoi-vien' => 'Câu chuyện hội viên',
	),
	'members'    => array(
		$m( 'hn-01', 'Nhà hàng chay Sen Hồng (mẫu)', 'nha-hang-chay', $hn, 'Khu Hoàn Kiếm', 21.0285, 105.8542, array( 'thuan-chay' ), array( 'tai-cho', 'mang-ve' ), 'Bún nấm, lẩu nấm, cơm sen', 'Giảm 10% ngày mùng một', '9:00 – 21:30' ),
		$m( 'hn-02', 'Quán chay Bồ Đề (mẫu)', 'nha-hang-chay', $hn, 'Khu Ba Đình', 21.0340, 105.8140, array( 'thuan-chay' ), array( 'tai-cho' ), 'Phở chay, nem chay', 'Tặng chè ngày rằm' ),
		$m( 'hn-03', 'Bếp cơm chay Tâm An (mẫu)', 'bep-suat-an', $hn, 'Khu Cầu Giấy', 21.0362, 105.7906, array( 'thuan-chay' ), array( 'suat-an', 'giao-hang' ), 'Suất cơm chay văn phòng', 'Giảm 5% đơn đặt cả tuần', '7:00 – 14:00' ),
		$m( 'hn-04', 'Bếp suất ăn Thiện Lành (mẫu)', 'bep-suat-an', $hn, 'Khu Thanh Xuân', 20.9940, 105.8100, array( 'thuan-chay' ), array( 'suat-an' ), 'Suất ăn chay cho nhóm, sự kiện', 'Miễn phí giao từ 20 suất', '7:00 – 15:00' ),
		$m( 'hn-05', 'Cửa hàng thực phẩm chay Hạt Mầm (mẫu)', 'cua-hang-chay', $hn, 'Khu Tây Hồ', 21.0700, 105.8190, array( 'huu-co' ), array( 'mang-ve', 'giao-hang' ), 'Đậu phụ, sữa hạt, nấm khô', 'Giao miễn phí trong khu vực', '8:00 – 20:00' ),
		$m( 'hn-06', 'Siêu thị chay Lá Sen (mẫu)', 'cua-hang-chay', $hn, 'Khu Đống Đa', 21.0180, 105.8290, array( 'thuan-chay', 'huu-co' ), array( 'mang-ve', 'giao-hang' ), 'Giò chay, chả nấm, rau hữu cơ', 'Tích điểm gấp đôi cho hội viên', '8:00 – 21:00' ),
		$m( 'hn-07', 'Xưởng đậu phụ Làng Mơ (mẫu)', 'san-xuat-chay', $hn, 'Khu Hoàng Mai', 20.9740, 105.8630, array( 'thuan-chay' ), array( 'giao-hang' ), 'Đậu phụ non, tào phớ, sữa đậu nành', 'Giá sỉ cho bếp hội viên', '5:00 – 17:00' ),
		$m( 'hn-08', 'Cơ sở giò chả chay Kim Ngân (mẫu)', 'san-xuat-chay', $hn, 'Khu Long Biên', 21.0450, 105.8890, array( 'thuan-chay' ), array( 'mang-ve', 'giao-hang' ), 'Giò chay, chả quế chay, ruốc nấm', 'Giá sỉ từ 5 kg', '7:00 – 18:00' ),
		$m( 'hn-09', 'Thiền viện Trúc An — bếp dưỡng sinh (mẫu)', 'thien-vien', $hn, 'Khu Sóc Sơn', 21.2560, 105.8480, array( 'thuc-duong' ), array( 'tai-cho' ), 'Cơm gạo lứt muối mè, canh rau rừng', '', '6:00 – 17:00' ),
		$m( 'hn-10', 'Nhà dưỡng sinh Mộc Tâm (mẫu)', 'thien-vien', $hn, 'Khu Hai Bà Trưng', 21.0060, 105.8580, array( 'thuc-duong' ), array( 'tai-cho', 'mang-ve' ), 'Thực đơn dưỡng sinh theo tuần', 'Lớp nấu ăn dưỡng sinh giá hội viên', '8:00 – 20:00' ),
		$m( 'hn-11', 'Nông trại rau Xanh Bãi (mẫu)', 'nong-trai', $hn, 'Khu Gia Lâm', 21.0280, 105.9370, array( 'huu-co' ), array( 'giao-hang' ), 'Rau cải, rau thơm, củ quả theo mùa', 'Giá sỉ cho bếp hội viên', '6:00 – 16:00' ),
		$m( 'hn-12', 'Trang trại nấm Đông Anh (mẫu)', 'nong-trai', $hn, 'Khu Đông Anh', 21.1370, 105.8490, array( 'huu-co' ), array( 'giao-hang' ), 'Nấm sò, nấm kim châm, nấm mỡ', 'Tham quan trang trại cho nhóm hội viên', '7:00 – 16:00' ),
		$m( 'hcm-01', 'Nhà hàng chay Diệu Âm (mẫu)', 'nha-hang-chay', $hcm, 'Khu Quận 1 cũ', 10.7769, 106.7009, array( 'thuan-chay' ), array( 'tai-cho', 'mang-ve' ), 'Cơm chiên hạt sen, gỏi cuốn chay', 'Tặng chè hạt sen', '10:00 – 22:00' ),
		$m( 'hcm-02', 'Quán chay Hạnh Phúc (mẫu)', 'nha-hang-chay', $hcm, 'Khu Thủ Đức', 10.8500, 106.7720, array( 'thuan-chay' ), array( 'tai-cho', 'mang-ve' ), 'Hủ tiếu chay, bún riêu chay', 'Giảm 10% cho sinh viên', '6:30 – 21:00' ),
		$m( 'hcm-03', 'Bếp chay Thanh Tâm (mẫu)', 'bep-suat-an', $hcm, 'Khu Quận 3 cũ', 10.7840, 106.6860, array( 'thuan-chay' ), array( 'suat-an', 'giao-hang' ), 'Suất chay văn phòng theo tuần', 'Giảm 8% gói tháng', '7:00 – 14:00' ),
		$m( 'hcm-04', 'Cơm chay văn phòng An Nhiên (mẫu)', 'bep-suat-an', $hcm, 'Khu Tân Bình', 10.8010, 106.6520, array( 'thuan-chay' ), array( 'suat-an', 'giao-hang' ), 'Cơm phần chay, canh rau củ', 'Miễn phí giao từ 10 suất', '7:00 – 14:30' ),
		$m( 'hcm-05', 'Cửa hàng chay Lá Xanh (mẫu)', 'cua-hang-chay', $hcm, 'Khu Phú Nhuận', 10.7990, 106.6800, array( 'huu-co', 'thuan-chay' ), array( 'mang-ve', 'giao-hang' ), 'Chả lụa chay, xúc xích nấm', 'Tích điểm gấp đôi cho hội viên', '8:00 – 21:00' ),
		$m( 'hcm-06', 'Tiệm thực phẩm chay Mộc Lan (mẫu)', 'cua-hang-chay', $hcm, 'Khu Quận 7 cũ', 10.7340, 106.7220, array( 'huu-co' ), array( 'mang-ve', 'giao-hang' ), 'Hạt dinh dưỡng, sữa hạt, bánh chay', 'Giao miễn phí đơn từ 300.000 đ', '8:00 – 20:30' ),
		$m( 'hcm-07', 'Xưởng đậu hũ Bình Thạnh (mẫu)', 'san-xuat-chay', $hcm, 'Khu Bình Thạnh', 10.8040, 106.7070, array( 'thuan-chay' ), array( 'giao-hang' ), 'Đậu hũ non, tàu hũ ky', 'Giá sỉ cho bếp hội viên', '4:30 – 16:00' ),
		$m( 'hcm-08', 'Cơ sở chả lụa chay Hoa Mai (mẫu)', 'san-xuat-chay', $hcm, 'Khu Quận 5 cũ', 10.7540, 106.6630, array( 'thuan-chay' ), array( 'mang-ve', 'giao-hang' ), 'Chả lụa chay, nem chay, bì chay', 'Giá sỉ từ 5 kg', '7:00 – 18:00' ),
		$m( 'hcm-09', 'Tịnh thất Hương Trà — bếp chay (mẫu)', 'thien-vien', $hcm, 'Khu Gò Vấp', 10.8380, 106.6660, array( 'thuc-duong' ), array( 'tai-cho' ), 'Cơm chay ngày rằm, mùng một', '', '6:00 – 18:00' ),
		$m( 'hcm-10', 'Trung tâm dưỡng sinh Thảo Mộc (mẫu)', 'thien-vien', $hcm, 'Khu Quận 10 cũ', 10.7730, 106.6680, array( 'thuc-duong' ), array( 'tai-cho', 'mang-ve' ), 'Thực đơn thực dưỡng, trà thảo mộc', 'Lớp thực dưỡng giá hội viên', '8:00 – 20:00' ),
		$m( 'hcm-11', 'Nông trại rau sạch Củ Chi (mẫu)', 'nong-trai', $hcm, 'Khu Củ Chi', 11.0000, 106.4930, array( 'huu-co' ), array( 'giao-hang' ), 'Rau ăn lá, rau thơm, dưa leo', 'Tham quan nông trại cho nhóm hội viên', '6:00 – 16:00' ),
		$m( 'hcm-12', 'Vườn nấm Hóc Môn (mẫu)', 'nong-trai', $hcm, 'Khu Hóc Môn', 10.8900, 106.5940, array( 'huu-co' ), array( 'giao-hang' ), 'Nấm bào ngư, nấm rơm', 'Giá sỉ cho bếp hội viên', '6:00 – 16:00' ),
	),
	'posts'      => array(
		array(
			'ref'      => 'w1-an-chay-2-ngay',
			'category' => 'kien-thuc',
			'title'    => 'Ăn chay 2 ngày một tuần: bắt đầu thế nào cho nhẹ nhàng',
			'excerpt'  => 'Không cần bỏ hết món quen ngay. Bốn bước để ăn chay hai ngày mỗi tuần mà cả nhà vẫn thấy no, ngon và đủ chất.',
			'content'  => '<p>Nhiều người muốn ăn chay nhưng ngại thay đổi quá nhanh. Bắt đầu với hai ngày mỗi tuần là cách dễ giữ lâu dài: cơ thể và cả nhà có thời gian làm quen.</p>
<h2>Bước 1. Chọn hai ngày cố định</h2>
<p>Chọn hai ngày ít bận, ví dụ thứ Hai và thứ Năm, hoặc theo lịch rằm, mùng một nếu gia đình đã có thói quen. Ngày cố định giúp đi chợ và nấu nướng chủ động hơn.</p>
<h2>Bước 2. Giữ món quen, đổi nguyên liệu</h2>
<ul><li>Phở bò → phở nấm, đậu phụ.</li><li>Thịt kho → nấm đùi gà kho tiêu, đậu phụ kho.</li><li>Canh xương → canh rau củ nấu nấm hương, củ cải.</li></ul>
<h2>Bước 3. Mỗi bữa đủ ba phần</h2>
<p>Một phần tinh bột (cơm, bún, khoai), một phần đạm thực vật (đậu, đậu phụ, nấm, hạt) và nhiều rau. Thiếu phần đạm là lý do hay gặp khiến bữa chay nhanh đói.</p>
<h2>Bước 4. Ra ngoài thì chọn quán đã xác minh</h2>
<p>Bản đồ của Vegan Hub ghi rõ quán thuần chay, hình thức phục vụ và giờ mở cửa. <a href="{map}">Xem bản đồ ngành chay</a>.</p>
<h2>Lỗi thường gặp</h2>
<ul><li>Ăn quá nhiều đồ chiên, đồ chay chế biến sẵn.</li><li>Bỏ qua phần đạm, chỉ ăn cơm với rau.</li><li>Người có bệnh nền, phụ nữ mang thai đổi chế độ ăn mà chưa hỏi bác sĩ.</li></ul>',
		),
		array(
			'ref'      => 'w1-hoan-kiem',
			'category' => 'diem-den',
			'title'    => 'Ăn chay quanh Hoàn Kiếm: 3 điểm nên thử',
			'excerpt'  => 'Một buổi dạo phố cổ kèm ba điểm ăn chay: bún nấm, phở chay và suất cơm văn phòng. Xem hồ sơ và giờ mở cửa ngay trên bản đồ Vegan Hub.',
			'content'  => '<p>Hồ Gươm và phố cổ là nơi nhiều người dạo cuối tuần. Dưới đây là ba điểm ăn chay gần đó, đều có hồ sơ trên bản đồ Vegan Hub.</p>
<h2>1. Nhà hàng chay Sen Hồng (mẫu)</h2>
<table><tbody><tr><td>Khu vực</td><td>Hoàn Kiếm</td></tr><tr><td>Phục vụ</td><td>tại chỗ, mang về</td></tr><tr><td>Nên thử</td><td>bún nấm, lẩu nấm, cơm sen</td></tr><tr><td>Ưu đãi hội viên</td><td>giảm 10% ngày mùng một</td></tr></tbody></table>
<p><a href="{place:hn-01}">Xem hồ sơ Sen Hồng</a></p>
<h2>2. Quán chay Bồ Đề (mẫu)</h2>
<p>Đi thêm một đoạn sang Ba Đình. Phở chay nước dùng rau củ, nem chay giòn. Ngày rằm quán tặng chè. <a href="{place:hn-02}">Xem hồ sơ Bồ Đề</a></p>
<h2>3. Bếp cơm chay Tâm An (mẫu)</h2>
<p>Không đi ăn tại chỗ được thì đặt suất cơm chay giao tận nơi, phù hợp dân văn phòng. <a href="{place:hn-03}">Xem hồ sơ Tâm An</a></p>
<h2>Mẹo đi ăn</h2>
<ul><li>Gọi trước giờ cao điểm trưa ngày rằm, mùng một: quán chay thường đông.</li><li>Bấm "Nhắn Zalo" trên hồ sơ để hỏi món, đặt bàn với trợ lý của chính quán.</li></ul>
<p><a href="{map}">Mở bản đồ để tìm thêm quán quanh bạn</a></p>',
		),
		array(
			'ref'      => 'w1-ngay-ram',
			'category' => 'su-kien',
			'title'    => 'Ăn chay ngày rằm: cơ sở hội viên có ưu đãi',
			'excerpt'  => 'Mỗi tháng hai ngày rằm và mùng một, nhiều cơ sở hội viên Vegan Hub có món riêng và ưu đãi. Xem danh sách và cách nhận ưu đãi.',
			'content'  => '<p>"Ăn chay ngày rằm" là chương trình hằng tháng của Vegan Hub: vào ngày rằm và mùng một âm lịch, cơ sở hội viên chuẩn bị thực đơn riêng và ưu đãi cho khách.</p>
<h2>Thời gian</h2>
<p>Ngày rằm và mùng một âm lịch hằng tháng. Ban điều hành đăng ngày dương lịch cụ thể trước mỗi đợt 10 ngày.</p>
<h2>Cơ sở tham gia và ưu đãi</h2>
<ul><li><a href="{place:hn-01}">Nhà hàng chay Sen Hồng (mẫu)</a>, Hà Nội — giảm 10% ngày mùng một.</li><li><a href="{place:hn-02}">Quán chay Bồ Đề (mẫu)</a>, Hà Nội — tặng chè ngày rằm.</li><li><a href="{place:hcm-01}">Nhà hàng chay Diệu Âm (mẫu)</a>, TP.HCM — tặng chè hạt sen.</li><li><a href="{place:hcm-09}">Tịnh thất Hương Trà — bếp chay (mẫu)</a>, TP.HCM — cơm chay ngày rằm.</li></ul>
<h2>Cách nhận ưu đãi</h2>
<p>Mở hồ sơ cơ sở trên bản đồ, bấm "Nhắn Zalo" để đặt bàn hoặc đặt món mang về và nói "ưu đãi ngày rằm".</p>
<h2>Cơ sở của bạn muốn tham gia?</h2>
<p>Cơ sở hội viên đăng ký ưu đãi với ban điều hành; trợ lý Zalo của cơ sở có sẵn kịch bản nhắc khách quen trước ngày rằm. <a href="{join}">Trở thành hội viên</a></p>',
		),
		array(
			'ref'      => 'w2-dam-thuc-vat',
			'category' => 'kien-thuc',
			'title'    => 'Đạm thực vật: đậu, nấm, hạt — ăn thế nào là đủ',
			'excerpt'  => 'Ăn chay vẫn đủ đạm nếu biết chọn và phối nguyên liệu trong ngày. Nguồn đạm thực vật thường gặp và cách chia vào các bữa.',
			'content'  => '<p>Câu hỏi hay gặp nhất của người mới ăn chay: "Không ăn thịt thì lấy đạm ở đâu?". Câu trả lời: từ nhiều nguồn thực vật, chia đều trong ngày.</p>
<h2>Nguồn đạm thực vật thường gặp</h2>
<ul><li><b>Đậu nành và sản phẩm từ đậu nành:</b> đậu phụ, sữa đậu nành, tàu hũ ky.</li><li><b>Các loại đậu:</b> đậu đen, đậu đỏ, đậu xanh, đậu gà, đậu lăng.</li><li><b>Hạt:</b> hạt điều, hạnh nhân, óc chó, mè, hạt bí.</li><li><b>Ngũ cốc nguyên hạt:</b> gạo lứt, yến mạch.</li><li><b>Nấm:</b> ít đạm hơn đậu nhưng giúp món ăn đậm vị.</li></ul>
<h2>Phối trong ngày</h2>
<p>Ăn kết hợp ngũ cốc và đậu trong cùng ngày (ví dụ cơm gạo lứt với đậu phụ, xôi đậu xanh) giúp bữa ăn cân đối hơn. Mỗi bữa nên có ít nhất một món đạm.</p>
<h2>Bao nhiêu là đủ?</h2>
<p>Mức tham khảo phổ biến cho người trưởng thành khoẻ mạnh là khoảng 0,8 g đạm cho mỗi kg cân nặng mỗi ngày. Người tập luyện nhiều, người lớn tuổi, phụ nữ mang thai cần khác; hãy hỏi chuyên gia dinh dưỡng.</p>
<h2>Đừng quên vitamin B12</h2>
<p>B12 gần như không có trong thực phẩm thực vật. Người ăn thuần chay lâu dài nên hỏi bác sĩ về thực phẩm bổ sung B12.</p>
<p>Tìm đậu phụ, sữa hạt, nấm gần nhà trên <a href="{map}">bản đồ ngành chay</a>.</p>',
		),
		array(
			'ref'      => 'w2-quan-1-quan-3',
			'category' => 'diem-den',
			'title'    => 'Ăn chay ở trung tâm TP.HCM: Quận 1 cũ và Quận 3 cũ',
			'excerpt'  => 'Nhà hàng chay, suất cơm chay văn phòng và cửa hàng thực phẩm chay ở trung tâm TP.HCM, xem hồ sơ và nhắn Zalo đặt món.',
			'content'  => '<p>Khu trung tâm TP.HCM có nhiều lựa chọn chay cho bữa trưa văn phòng lẫn bữa tối cùng gia đình.</p>
<h2>1. Nhà hàng chay Diệu Âm (mẫu) — khu Quận 1 cũ</h2>
<p>Không gian yên tĩnh, hợp ăn tối. Nên thử cơm chiên hạt sen, gỏi cuốn chay. Hội viên được tặng chè hạt sen. <a href="{place:hcm-01}">Xem hồ sơ</a></p>
<h2>2. Bếp chay Thanh Tâm (mẫu) — khu Quận 3 cũ</h2>
<p>Suất chay văn phòng giao theo tuần, có gói tháng giảm 8%. <a href="{place:hcm-03}">Xem hồ sơ</a></p>
<h2>3. Cửa hàng chay Lá Xanh (mẫu) — Phú Nhuận</h2>
<p>Mua chả lụa chay, xúc xích nấm mang về nấu ở nhà. Hội viên tích điểm gấp đôi. <a href="{place:hcm-05}">Xem hồ sơ</a></p>
<h2>Thông tin nhanh</h2>
<table><thead><tr><th>Cơ sở</th><th>Phục vụ</th><th>Giờ mở cửa</th></tr></thead><tbody><tr><td>Diệu Âm (mẫu)</td><td>tại chỗ, mang về</td><td>10:00 – 22:00</td></tr><tr><td>Thanh Tâm (mẫu)</td><td>suất ăn, giao hàng</td><td>7:00 – 14:00</td></tr><tr><td>Lá Xanh (mẫu)</td><td>mang về, giao hàng</td><td>8:00 – 21:00</td></tr></tbody></table>
<p><a href="{map}">Xem tất cả cơ sở chay ở TP.HCM trên bản đồ</a></p>',
		),
		array(
			'ref'      => 'w2-gia-von-mon',
			'category' => 'kinh-doanh-chay',
			'title'    => 'Tính giá vốn một món chay trong 4 bước',
			'excerpt'  => 'Biết giá vốn từng món để định giá đúng và biết món nào lãi. Cách tính theo định lượng, kèm ví dụ minh hoạ.',
			'content'  => '<p>Nhiều quán chay đông khách mà cuối tháng vẫn không biết lãi bao nhiêu. Lý do thường gặp: chưa tính giá vốn theo từng món.</p>
<h2>Bước 1. Viết định lượng cho một phần</h2>
<p>Ghi từng nguyên liệu và lượng dùng cho một phần ăn, kể cả gia vị và dầu.</p>
<h2>Bước 2. Lấy đơn giá nhập gần nhất</h2>
<p>Dùng giá trên hoá đơn nhập hàng gần nhất, quy về cùng đơn vị (đồng / gam, đồng / ml).</p>
<h2>Bước 3. Cộng hao hụt</h2>
<p>Rau củ khi sơ chế bị bỏ đi một phần; nấm, đậu phụ có hao hụt khi chiên. Cộng thêm tỉ lệ hao hụt bạn đo được ở bếp.</p>
<h2>Bước 4. Tính và so với giá bán</h2>
<p>Giá vốn món = tổng (lượng × đơn giá) × (1 + tỉ lệ hao hụt). Tỉ lệ giá vốn = giá vốn ÷ giá bán.</p>
<h2>Ví dụ minh hoạ (số giả định)</h2>
<table><thead><tr><th>Nguyên liệu</th><th>Lượng</th><th>Đơn giá giả định</th><th>Thành tiền</th></tr></thead><tbody><tr><td>Bún</td><td>200 g</td><td>20 đ/g</td><td>4.000 đ</td></tr><tr><td>Nấm các loại</td><td>100 g</td><td>80 đ/g</td><td>8.000 đ</td></tr><tr><td>Đậu phụ</td><td>80 g</td><td>40 đ/g</td><td>3.200 đ</td></tr><tr><td>Rau, gia vị, nước dùng</td><td>—</td><td>—</td><td>4.800 đ</td></tr></tbody></table>
<p>Cộng 20.000 đ; hao hụt giả định 10% ⇒ giá vốn khoảng 22.000 đ. Bán 50.000 đ ⇒ tỉ lệ giá vốn 44%.</p>
<h2>Làm tự động</h2>
<p>Bộ công nghệ 0đ của Vegan Hub có kho nguyên liệu và kế toán: nhập hoá đơn một lần, giá vốn món tự cập nhật. Hội viên còn được Coach hướng dẫn và nhận mẫu định mức nguyên liệu. <a href="{benefits}">Xem quyền lợi hội viên</a></p>',
		),
		array(
			'ref'      => 'w3-di-cho-chay',
			'category' => 'kien-thuc',
			'title'    => 'Đi chợ chay cho gia đình 4 người trong một tuần',
			'excerpt'  => 'Danh sách đi chợ theo nhóm, cách chia bữa và bảo quản để cả tuần ăn chay không nhàm, không phí.',
			'content'  => '<p>Lên danh sách trước giúp đi chợ một lần cho cả tuần, đỡ tốn thời gian và ít bỏ phí.</p>
<h2>Danh sách theo nhóm</h2>
<ul><li><b>Tinh bột:</b> gạo (có thể trộn gạo lứt), bún, mì, khoai lang, khoai tây.</li><li><b>Đạm:</b> đậu phụ, tàu hũ ky, các loại đậu khô, nấm tươi, nấm khô, hạt.</li><li><b>Rau củ:</b> rau ăn lá (ăn trước), củ quả để lâu (bí, cà rốt, củ cải) ăn sau.</li><li><b>Trái cây</b> theo mùa.</li><li><b>Gia vị:</b> nước tương, hạt nêm chay, dầu ăn, mè.</li></ul>
<h2>Chia bữa</h2>
<p>Đầu tuần dùng rau lá và nấm tươi; giữa tuần dùng đậu phụ, củ quả; cuối tuần dùng đậu khô, nấm khô. Nấu một nồi nước dùng rau củ dùng cho hai, ba món.</p>
<h2>Bảo quản</h2>
<ul><li>Rau lá: bọc giấy, để ngăn mát, dùng trong 2–3 ngày.</li><li>Đậu phụ: ngâm nước sạch trong hộp, thay nước mỗi ngày.</li><li>Nấm tươi: để trong túi giấy, không rửa trước khi cất.</li></ul>
<h2>Mua ở đâu?</h2>
<p>Cửa hàng thực phẩm chay và nông trại hữu cơ trên bản đồ Vegan Hub giao hàng tận nhà, ví dụ <a href="{place:hn-05}">Hạt Mầm (mẫu)</a> ở Hà Nội và <a href="{place:hcm-06}">Mộc Lan (mẫu)</a> ở TP.HCM. <a href="{map}">Xem bản đồ</a></p>',
		),
		array(
			'ref'      => 'w3-tay-ho-ba-dinh',
			'category' => 'diem-den',
			'title'    => 'Cuối tuần ở Tây Hồ – Ba Đình: đi chợ chay và ăn trưa',
			'excerpt'  => 'Một vòng cuối tuần ở Hà Nội: mua đồ chay hữu cơ ở Tây Hồ, ăn phở chay ở Ba Đình, ghé siêu thị chay ở Đống Đa.',
			'content'  => '<p>Nếu ở Hà Nội và muốn một buổi sáng cuối tuần "xanh", có thể đi theo lộ trình dưới đây.</p>
<h2>8:30 — Cửa hàng thực phẩm chay Hạt Mầm (mẫu), Tây Hồ</h2>
<p>Mua đậu phụ, sữa hạt, nấm khô cho cả tuần. Cửa hàng giao miễn phí trong khu vực nếu không tiện mang. <a href="{place:hn-05}">Xem hồ sơ</a></p>
<h2>11:00 — Quán chay Bồ Đề (mẫu), Ba Đình</h2>
<p>Ăn trưa phở chay, nem chay. <a href="{place:hn-02}">Xem hồ sơ</a></p>
<h2>14:00 — Siêu thị chay Lá Sen (mẫu), Đống Đa</h2>
<p>Ghé mua giò chay, chả nấm và rau hữu cơ. Hội viên tích điểm gấp đôi. <a href="{place:hn-06}">Xem hồ sơ</a></p>
<h2>Gợi ý</h2>
<ul><li>Nhắn Zalo trước để hỏi món còn hay hết.</li><li>Mang túi vải, hộp đựng để giảm túi nhựa.</li></ul>
<p><a href="{map}">Lập lộ trình của riêng bạn trên bản đồ</a></p>',
		),
		array(
			'ref'      => 'w3-tuan-le-am-thuc',
			'category' => 'su-kien',
			'title'    => 'Tuần lễ ẩm thực chay Hà Nội và TP.HCM (thông báo)',
			'excerpt'  => 'Vegan Hub chuẩn bị Tuần lễ ẩm thực chay tại Hà Nội và TP.HCM: thực đơn riêng, ưu đãi, workshop nấu ăn. Cơ sở hội viên đăng ký tham gia.',
			'content'  => '<p>Vegan Hub đang chuẩn bị <b>Tuần lễ ẩm thực chay</b> tại Hà Nội và TP.HCM. Trong một tuần, các cơ sở hội viên giới thiệu thực đơn riêng, ưu đãi và mở cửa cho khách tham quan bếp.</p>
<h2>Thời gian, địa điểm</h2>
<p>Ban điều hành sẽ công bố ngày cụ thể và danh sách địa điểm trong bài này.</p>
<h2>Hoạt động dự kiến</h2>
<ul><li>Thực đơn tuần lễ tại nhà hàng chay hội viên.</li><li>Workshop nấu món chay gia đình.</li><li>Tham quan nông trại hữu cơ ngoại thành, ví dụ <a href="{place:hn-11}">Xanh Bãi (mẫu)</a> và <a href="{place:hcm-11}">Củ Chi (mẫu)</a>.</li><li>Gian hàng thực phẩm chay của cơ sở sản xuất.</li></ul>
<h2>Ai nên đến</h2>
<p>Người đang muốn ăn chay nhiều hơn, gia đình có trẻ nhỏ, chủ cơ sở muốn học hỏi mô hình.</p>
<h2>Đăng ký</h2>
<p>Vé workshop và tham quan sẽ mở bán trên site Hub khi chốt lịch. Cơ sở muốn tham gia: <a href="{join}">đăng ký làm hội viên</a> để được ban điều hành liên hệ.</p>',
		),
		array(
			'ref'      => 'w4-the-thao',
			'category' => 'kien-thuc',
			'title'    => 'Ăn chay cho người tập thể thao',
			'excerpt'  => 'Người tập luyện đều đặn vẫn ăn chay được. Cần chú ý đạm, năng lượng và bữa sau tập; vài gợi ý món dễ làm.',
			'content'  => '<p>Ngày càng nhiều người tập chạy, gym, yoga chọn ăn chay. Điểm khác so với người ít vận động là nhu cầu năng lượng và đạm cao hơn.</p>
<h2>Đủ năng lượng</h2>
<p>Bữa chay thường ít năng lượng hơn bạn nghĩ. Thêm tinh bột tốt (gạo lứt, khoai, yến mạch) và chất béo từ hạt, bơ, dầu thực vật.</p>
<h2>Đủ đạm</h2>
<p>Các khuyến nghị dinh dưỡng thể thao thường nêu khoảng 1,2–2,0 g đạm cho mỗi kg cân nặng mỗi ngày, tuỳ môn và cường độ. Chia đạm đều 3–4 bữa: đậu phụ, sữa đậu nành, đậu các loại, hạt.</p>
<h2>Bữa sau tập</h2>
<ul><li>Sữa đậu nành + chuối + yến mạch.</li><li>Cơm gạo lứt + đậu phụ sốt nấm + rau.</li><li>Bánh mì nguyên cám + bơ đậu phộng.</li></ul>
<h2>Lưu ý</h2>
<p>Người tập cường độ cao, vận động viên nên làm việc với chuyên gia dinh dưỡng, kiểm tra sắt, B12, vitamin D định kỳ.</p>
<p>Bếp suất ăn chay hội viên có thể đặt suất ăn theo tuần, ví dụ <a href="{place:hcm-04}">An Nhiên (mẫu)</a> ở TP.HCM. <a href="{map}">Tìm bếp suất ăn gần bạn</a></p>',
		),
		array(
			'ref'      => 'w4-thu-duc-binh-thanh',
			'category' => 'diem-den',
			'title'    => 'Từ Bình Thạnh tới Thủ Đức: ăn sáng chay và thăm xưởng đậu hũ',
			'excerpt'  => 'Một buổi sáng ở TP.HCM: ăn sáng hủ tiếu chay, tìm hiểu xưởng đậu hũ, đặt rau từ nông trại ngoại thành.',
			'content'  => '<p>Lộ trình cho người thích tìm hiểu món chay từ nguồn gốc nguyên liệu.</p>
<h2>Ăn sáng — Quán chay Hạnh Phúc (mẫu), Thủ Đức</h2>
<p>Hủ tiếu chay, bún riêu chay; sinh viên được giảm 10%. <a href="{place:hcm-02}">Xem hồ sơ</a></p>
<h2>Nguyên liệu — Xưởng đậu hũ Bình Thạnh (mẫu)</h2>
<p>Đậu hũ non, tàu hũ ky làm mỗi sáng sớm. Bếp hội viên được giá sỉ. <a href="{place:hcm-07}">Xem hồ sơ</a></p>
<h2>Rau và nấm — Củ Chi, Hóc Môn</h2>
<p>Đặt rau từ <a href="{place:hcm-11}">Nông trại rau sạch Củ Chi (mẫu)</a> và nấm từ <a href="{place:hcm-12}">Vườn nấm Hóc Môn (mẫu)</a>, giao về bếp nhà hoặc quán.</p>
<h2>Vì sao nên biết nguồn nguyên liệu</h2>
<p>Khi biết đậu hũ, rau, nấm từ đâu tới, người ăn yên tâm hơn và chủ quán kể được câu chuyện món ăn của mình.</p>
<p><a href="{map}">Xem cơ sở sản xuất và nông trại trên bản đồ</a></p>',
		),
		array(
			'ref'      => 'w4-cau-chuyen-dau-tien',
			'category' => 'cau-chuyen-hoi-vien',
			'title'    => '90 ngày đầu của một nhà hàng chay với bộ công nghệ 0đ (bài mẫu)',
			'excerpt'  => 'Khuôn bài "Câu chuyện hội viên": trước khi vào Hub, đã dùng gì, sau 90 ngày thay đổi ra sao. Bài thật chỉ đăng khi cơ sở đồng ý.',
			'content'  => '<p>Đây là <b>khuôn mẫu</b> cho chuyên mục Câu chuyện hội viên, viết theo một cơ sở mẫu. Bài thật sẽ do chính chủ cơ sở kể, với số liệu cơ sở cung cấp và đồng ý công bố.</p>
<h2>Trước khi vào Hub</h2>
<p>Nhà hàng chay Sen Hồng (mẫu) nhận đặt món qua điện thoại và Zalo cá nhân của chủ quán. Ngày rằm, mùng một đông khách, tin nhắn bị sót; nguyên liệu ghi sổ tay.</p>
<h2>Đã dùng gì</h2>
<ul><li>Bộ công nghệ 0đ: bán hàng, kho nguyên liệu, kế toán.</li><li>Trợ lý AI trên Zalo nhận đặt món và nhắc khách quen trước ngày rằm.</li><li>Một Coach của Hub hướng dẫn tính giá vốn món.</li></ul>
<h2>Sau 90 ngày</h2>
<p>Phần này ghi các chỉ số do chính cơ sở cung cấp (số đơn qua Zalo, tỉ lệ giá vốn, nguyên liệu hư hỏng) — bài mẫu không ghi số để tránh hiểu nhầm là số thật.</p>
<h2>Lời chủ cơ sở</h2>
<p><i>(Trích lời thật của chủ cơ sở khi có bài thật.)</i></p>
<p><a href="{place:hn-01}">Xem hồ sơ Sen Hồng (mẫu)</a> · <a href="{join}">Cơ sở của bạn muốn kể câu chuyện? Trở thành hội viên</a></p>',
		),
	),
);
