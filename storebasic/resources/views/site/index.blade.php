@extends('site.master.master')
@section('main')
		<div id="colorlib-intro" class="colorlib-intro" style="background-image: url(images/banner-1.jpg);"
			data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="intro-desc">
							<div class="text-salebox">
								<div class="text-lefts">
									<div class="sale-box">
										<div class="sale-box-top">
											<h2 class="number">45</h2>
											<span class="sup-1">%</span>
											<span class="sup-2">Off</span>
										</div>
										<h2 class="text-sale">Sale</h2>
									</div>
								</div>
								<div class="text-rights">
									<h3 class="title">Dặt hàng hôm nay,nhận ngay khuyến mãi!</h3>
									<p>Đã có hơn 1000 đơn hàng được gửi đi ở khắp quốc gia.</p>
									<p><a href="shop.html" class="btn btn-primary">Mua ngay</a> <a href="#"
											class="btn btn-primary btn-outline">Đọc
											thêm</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Sản phẩm Nổi bật</span></h2>
						<p>Đây là những sản phẩm được ưa chuộng nhất năm 2019</p>
					</div>
				</div>
				<div class="row">
					@foreach($featured as $ft)
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(../uploads/{{$ft->image}});">
								<div class="cart">
									<p>
										<span class="addtocart"><a href="{{route('site.addtocart',['id_product'=>$ft->id])}}"><i
													class="icon-shopping-cart"></i></a></span>
										<span><a href="{{route('site.detail',['id'=>$ft->id])}}"><i class="icon-eye"></i></a></span>


									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="detail.html">{{$ft->name}}</a></h3>
								<p class="price"><span>{{number_format($ft->price,0,'','.')}} đ</span></p>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Sản phẩm mới</span></h2>
						<p>Đây là những sản phẩm mới của năm năm 2019</p>
					</div>
				</div>

				<div class="row">
					@foreach($news as $new)
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(../uploads/{{$new->image}});">
								<p class="tag"><span class="new">New</span></p>
								<div class="cart">
									<p>
										<span class="addtocart"><a href="{{route('site.addtocart',['id_product'=>$ft->id])}}"><i
													class="icon-shopping-cart"></i></a></span>
										<span><a href="{{route('site.detail',['id'=>$new->id])}}"><i class="icon-eye"></i></a></span>


									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="detail.html">{{$new->name}}</a></h3>
								<p class="price"><span>{{number_format($new->price,0,'','.')}} đ</span></p>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		<!-- end main -->
@endsection