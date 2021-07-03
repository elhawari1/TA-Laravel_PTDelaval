<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar" style="font-family: Poppins, Arial, sans-serif;">
	<div class="container">
		<?php $keranjang = session('tambah_keranjang');
		$k = 0;
		$sum = 0;
		if ($keranjang == null) :
			$k = 0;
		else : $k += count($keranjang);
			foreach ($keranjang as $count) :
				$sum += $count['jumlah'];
			endforeach;
		endif; ?>
		<a class="navbar-brand" href="/pt_delaval">
			PT AGRI SERVIS SAKTI
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="oi oi-menu"></span> Menu
		</button>
		<div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item"><a href="/pt_delaval" class="nav-link">Home</a></li>
				<li class="nav-item"><a href="/produk" class="nav-link">Produk</a></li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Info Perusahaan</a>
					<div class="dropdown-menu" aria-labelledby="dropdown04">
						<a class="dropdown-item" href="/about">Tentang Kami</a>
						<a class="dropdown-item" href="/kontak">Kontak Kami</a>
					</div>
				</li>
				<li class="nav-item"><a href="/riwayat" class="nav-link"><i class="fas fa-bell"></i> Riwayat</a></li>
				<li class="nav-item cta cta-colored"><a href="/keranjang" class="nav-link"><span class="icon-shopping_cart"></span>{{ $sum }}</a></li>
				@if (Auth::user() != null)
				<li class="nav-item active"><a href="/logout" class="nav-link">Selamat Datang {{ Auth::user()->name }}, Logout</a></li>
				@else
				<li class="nav-item active"><a href="/login" class="nav-link">Login</a></li>
				@endif

			</ul>
		</div>
	</div>
</nav>
<!-- END nav -->
