@extends('front_end.layouts.app')

@section('title', 'HOME')

@section('content')
<div class="whole-wrap">
	<div class="container box_1170">
		<div class="section-top-border">
			<h3 class="mb-30">{{trans('navbar.about')}}</h3>
			<div class="row">
				<div class="col-md-3">
					<img src="assets/img/about/frit.jpg" alt="" class="img-fluid">
				</div>
				<div class="col-md-9 mt-sm-20">
					<p>Công ty Cổ phần Frit Hương Giang là đơn vị chuyên sản xuất các mặt hàng thủy tinh và các sản phẩm từ thủy tinh, trong đó sản xuất các loại men Frit là mặt hàng chủ yếu.</p>

					<p>Công ty Cổ phần Frit Hương Giang tọa lạc tại Khu B, KCN Phong Điền, thị trấn Phong Điền, huyện Phong Điền, tỉnh Thừa Thiên Huế, Việt Nam với diện tích hơn 3,6 hecta, công ty thành lập vào ngày 03 tháng 01 năm 2019, là chủ đầu tư dự án nhà máy sản xuất men Frit với công suất 20,000 tấn sản phẩm/năm. Là đơn vị mới thành lập, nhưng chúng tôi chắc lọc được các giá trị cốt lõi trong sản xuất frit, kết hợp với đầu tư đồng bộ trang thiết bị hiện đại để tạo ra các sản phẩm đáp ứng yêu cầu chất lượng của Khách hàng </p>
				</div>
			</div>
		</div>
		<div class="section-top-border">
			<h3 class="mb-30">Dây chuyền công nghệ, thiết bị hiện đại:</h3>
			<div class="row">
				<div class="col-lg-12">
					<blockquote class="generic-blockquote">
					Các sản phẩm của Công ty Cổ phần Frit Hương Giang được sản xuất dựa trên nguyên liệu chất lượng, chọn lọc, trải qua quá trình vận hành tuân thủ mọi quy chuẩn sản xuất nghiêm ngặt đảm bảo chất lượng ổn định cho sản phẩm.<br/>
					Áp dụng công nghệ lò hóa khí than tiết kiệm nhiên liệu, máy móc hiện đại nhằm tiết kiệm chi phí sản xuất, nâng cao năng suất, chất lượng sản phẩm, bảo vệ môi trường. Vì thế, các sản phẩm luôn đạt chất lượng với giá cả hợp lí.<br/>
					Công nghệ lò bể sản xuất Frit hiện đại, áp dụng công nghệ mới khả năng sản phẩm đạt chất lượng cao, giá cả cạnh tranh.
					</blockquote>
				</div>
			</div>
		</div>
		<div class="section-top-border">
			<h3>{{trans('navbar.photolibrary')}}</h3>
			<div class="row gallery-item">
				<div class="col-md-4">
					<a href="assets/img/elements/g1.jpg" class="img-pop-up">
						<div class="single-gallery-image" style="background: url(assets/img/elements/g1.jpg);"></div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="assets/img/elements/g2.jpg" class="img-pop-up">
						<div class="single-gallery-image" style="background: url(assets/img/elements/g2.jpg);"></div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="assets/img/elements/g3.jpg" class="img-pop-up">
						<div class="single-gallery-image" style="background: url(assets/img/elements/g3.jpg);"></div>
					</a>
				</div>
				<div class="col-md-6">
					<a href="assets/img/elements/g4.jpg" class="img-pop-up">
						<div class="single-gallery-image" style="background: url(assets/img/elements/g4.jpg);"></div>
					</a>
				</div>
				<div class="col-md-6">
					<a href="assets/img/elements/g5.jpg" class="img-pop-up">
						<div class="single-gallery-image" style="background: url(assets/img/elements/g5.jpg);"></div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="assets/img/elements/g6.jpg" class="img-pop-up">
						<div class="single-gallery-image" style="background: url(assets/img/elements/g6.jpg);"></div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="assets/img/elements/g7.jpg" class="img-pop-up">
						<div class="single-gallery-image" style="background: url(assets/img/elements/g7.jpg);"></div>
					</a>
				</div>
				<div class="col-md-4">
					<a href="assets/img/elements/g8.jpg" class="img-pop-up">
						<div class="single-gallery-image" style="background: url(assets/img/elements/g8.jpg);"></div>
					</a>
				</div>
			</div>
		</div>
		<div class="section-top-border">
			<h3 class="mb-30">Các Sản Phẩm chủ lực của công ty</h3>
			<div class="row">
				<div class="col-md-4">
					<div class="single-defination">
						<h4 class="mb-20">1.Frit trong HGT03: </h4>
						<p>Đặc điểm: là frit trong có nhiệt độ nóng chảy thấp, khoảng chảy khá rộng, độ bóng và độ phẳng cao.</br>
							Áp dụng: phù hợp cho các dòng gạch ốp tường nung 1 hoặc 2 lần.</br>
							Bài men tham khảo: frit: 88-92%; kaolin: 8-12%
						</p>
						<a href="/">Xem thêm</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="single-defination">
						<h4 class="mb-20">2.Frit trong HGT15:</h4>
						<p>Đặc điểm: là frit trong có nhiệt độ nóng chảy trung bình, khoảng chảy khá rộng, độ bóng cao.</br>
							Áp dụng: phù hợp cho gạch lát nhiệt nung thấp và trung bình, gạch ốp nhiệt nung cao.</br>
							Bài men tham khảo: frit: 88-92%; kaolin: 8-12%
						</p>
						<a href="/">Xem thêm</a>
					</div>
				</div>
				<div class="col-md-4">
					<div class="single-defination">
						<h4 class="mb-20">3.Frit trong HGT26:</h4>
						<p>Đặc điểm: là frit trong có nhiệt độ nóng chảy cao, khoảng chảy rộng, độ bóng và độ phẳng cao.</br>
						Áp dụng: phù hợp cho gạch lát có nhung lượng nhiệt nung cao.</br>
						Bài men tham khảo: frit: 84-88%; kaolin: 12-16%
						</p>
						<a href="/">Xem thêm</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection