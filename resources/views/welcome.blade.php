@extends('layouts.frontend.app', [
    'title' => 'Beranda',
])

@push('css')
	<link href="{{ asset('template/frontend/css/modern-welcome.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endpush

@section('content')
	<main class="main-content">
		{{-- Hero Section (Keep Dark for Impact, but Max Contrast) --}}
		<section id="hero" class="hero-bento overflow-hidden">
			<div class="hero-overlay"></div>
			<img src="https://images.unsplash.com/photo-1548625361-625bc29ad089?auto=format&fit=crop&q=80&w=1920" class="hero-img"
				alt="Background">

			<div class="container position-relative z-index-2">
				<div class="row">
					<div class="col-lg-7">
						<div class="reveal-up active">
							<span class="section-label text-white opacity-75">Selamat Datang</span>
							<h1 class="display-title text-white mb-4">GMIM RUT <br>SENDANGAN</h1>
							<p class="lead text-white-50 mb-5 fs-4" style="max-width: 600px;">
								Berakar, Bertumbuh, dan Berbuah dalam Kristus. Komunitas iman yang melayani dengan kasih dan sukacita.
							</p>
							<div class="d-flex flex-wrap gap-3">
								<a href="#about" class="btn btn-modern-primary py-3 px-5">Jelajahi Pelayanan</a>
								<a href="#prayer" class="btn btn-outline-light rounded-pill px-4 py-3 border-2 fw-bold">Kirim Pokok Doa</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		{{-- About Section (Light Mode) --}}
		<section id="about" class="section-wrapper position-relative bg-white">
			<div class="mesh-bg"></div>
			<div class="container">
				<div class="row align-items-center g-5">
					<div class="col-lg-6">
						<div class="reveal-up">
							<span class="section-label">Profil Jemaat</span>
							<h2 class="display-title mb-4">Tentang <span>GMIM RUT</span></h2>
							<p class="fs-5 text-muted lh-lg mb-4">
								Gereja Masehi Injili di Minahasa (GMIM) Jemaat RUT Sendangan adalah sebuah wadah persekutuan yang berlokasi di
								Kawangkoan. Kami bertekad untuk menjadi garam dan terang dunia.
							</p>
							<div class="row g-4">
								<div class="col-md-6">
									<div class="modern-card p-4">
										<i class="fas fa-heart text-primary mb-3 fs-3"></i>
										<h5 class="fw-bold">Kasih Jemaat</h5>
										<p class="small text-muted mb-0">Membangun hubungan yang tulus antar sesama jemaat.</p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="modern-card p-4">
										<i class="fas fa-hands-helping text-cyan mb-3 fs-3" style="color: var(--accent-cyan)"></i>
										<h5 class="fw-bold">Pelayanan</h5>
										<p class="small text-muted mb-0">Melayani Tuhan melalui perbuatan nyata bagi sesama.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="reveal-up" style="transition-delay: 0.2s">
							<div class="rounded-5 overflow-hidden shadow-lg">
								<img src="{{ asset('images/church.jpg') }}" class="w-100 img-fluid" alt="Gereja">
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		{{-- Pelayan (Light Mode / Subtle Alt) --}}
		<section id="pelayan" class="section-wrapper bg-alt-section">
			<div class="container">
				<div class="text-center mb-5 reveal-up">
					<span class="section-label">Struktur Pelayanan</span>
					<h2 class="display-title mb-2">Pelayan <span>Firman & BPMJ</span></h2>
					<p class="text-muted">Periode Pelayanan 2022-2027</p>
				</div>

				{{-- Ketua Jemaat --}}
				<div class="row justify-content-center mb-5">
					<div class="col-md-4">
						<div class="modern-card text-center reveal-up">
							<img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&q=80&w=200"
								class="pelayan-profile" alt="">
							<h5 class="fw-bold mb-1">Pdt. Sapa wona, S.Th.</h5>
							<p class="text-primary small fw-bold text-uppercase mb-0">Ketua Jemaat</p>
						</div>
					</div>
				</div>

				{{-- Others --}}
				<div class="row g-4 reveal-up" style="transition-delay: 0.2s">
					<div class="col-md-4 text-center">
						<img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&q=80&w=200"
							class="pelayan-profile" alt="">
						<h6 class="fw-bold mb-1">Pdt. Sapa wona, S.Th.</h6>
						<p class="text-muted small">Pendeta Pelayan</p>
					</div>
					<div class="col-md-4 text-center">
						<img src="https://images.unsplash.com/photo-1552058544-f2b08422138a?auto=format&fit=crop&q=80&w=200"
							class="pelayan-profile" alt="">
						<h6 class="fw-bold mb-1">Pdt. Sapa wona, S.Th.</h6>
						<p class="text-muted small">Pendeta Pelayan</p>
					</div>
					<div class="col-md-4 text-center">
						<img src="https://images.unsplash.com/photo-1542909168-82c3e7fdca5c?auto=format&fit=crop&q=80&w=200"
							class="pelayan-profile" alt="">
						<h6 class="fw-bold mb-1">Pdt. Sapa wona, S.Th.</h6>
						<p class="text-muted small">Guru Agama</p>
					</div>
				</div>
			</div>
		</section>

		{{-- Content Section (White Background) --}}
		<section id="content" class="section-wrapper bg-white">
			<div class="container">
				<div class="row g-5">
					<div class="col-lg-6">
						<div class="reveal-up">
							<span class="section-label">Berita & Kabar</span>
							<h3 class="display-title h3 mb-4">Artikel <span>Terbaru</span></h3>

							<div class="modern-card p-0 overflow-hidden mb-4">
								<img src="https://images.unsplash.com/photo-1490730141103-6cac27aaab94?auto=format&fit=crop&q=80&w=800"
									class="w-100" style="height: 250px; object-fit: cover;" alt="">
								<div class="p-4">
									<h4 class="fw-bold mb-3">Visi Melangkah Bersama di Tahun 2026</h4>
									<p class="text-muted small mb-4">Menyambut tahun pelayanan baru dengan semangat kesatuan jemaat...</p>
									<a href="#" class="btn btn-link text-primary p-0 fw-bold text-decoration-none">Baca Selengkapnya <i
											class="fas fa-arrow-right ms-2"></i></a>
								</div>
							</div>

							<div class="article-list">
								@for ($i = 0; $i < 2; $i++)
									<div class="article-item d-flex align-items-center mb-2">
										<div class="flex-grow-1">
											<h6 class="fw-bold mb-1">Misi Penyelamatan: Kasih Tak Berbatas</h6>
											<small class="text-muted">24 Feb 2026 • 5 Menit Baca</small>
										</div>
										<i class="fas fa-chevron-right text-muted small"></i>
									</div>
								@endfor
							</div>
						</div>
					</div>

					<div class="col-lg-6">
						<div class="reveal-up" style="transition-delay: 0.2s">
							<span class="section-label">Rohani</span>
							<h3 class="display-title h3 mb-4">Renungan <span>Harian</span></h3>

							<div class="modern-card h-100 d-flex flex-column" style="border-left: 5px solid var(--primary-purple);">
								<div class="mb-4">
									<i class="fas fa-quote-left text-primary opacity-25 fs-1 mb-3"></i>
									<h4 class="fw-bold lh-base">Keteguhan Hati di Tengah Badai Hidup</h4>
									<p class="text-muted italic">"Sebab itu janganlah kamu kuatir akan hari besok, karena hari besok mempunyai
										kesusahannya sendiri."</p>
								</div>

								<div class="mt-auto pt-4 border-top">
									<div class="d-flex align-items-center gap-3">
										<img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&q=80&w=100"
											class="rounded-circle" style="width: 40px; height: 40px;" alt="">
										<div>
											<p class="small fw-bold mb-0">Pdt. Sapa Wona</p>
											<small class="text-muted">Rabu, 25 Februari 2026</small>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		{{-- Contact Us (Light Section) --}}
		<section id="contact_us" class="section-wrapper bg-alt-section">
			<div class="container">
				<div class="row g-5 align-items-center">
					<div class="col-lg-5">
						<div class="reveal-up">
							<span class="section-label">Hubungi Kami</span>
							<h2 class="display-title mb-4">Mari Tetap <span>Terhubung</span></h2>
							<div class="space-y-4">
								<div class="d-flex align-items-start mb-4">
									<div class="bg-white p-3 rounded-4 shadow-sm me-4">
										<i class="fas fa-map-marker-alt text-primary"></i>
									</div>
									<div>
										<h6 class="fw-bold mb-1">Alamat</h6>
										<p class="text-muted small mb-0">Jl. Raya Kawangkoan-Langowan, Kec. Kawangkoan, Kab. Minahasa</p>
									</div>
								</div>
								<div class="d-flex align-items-start mb-4">
									<div class="bg-white p-3 rounded-4 shadow-sm me-4">
										<i class="fas fa-phone text-primary"></i>
									</div>
									<div>
										<h6 class="fw-bold mb-1">Telepon</h6>
										<p class="text-muted small mb-0">+62 813 2900 1097</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-7">
						<div class="reveal-up rounded-5 overflow-hidden shadow-lg border-white border-5">
							<iframe
								src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3354.2923164986905!2d124.79055434509856!3d1.196565609711258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3287413cb25e4b69%3A0x4faafd3954813234!2sGMIM%20Sion%20Sentrum%20Sendangan!5e0!3m2!1sid!2sid!4v1672802387306"
								width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
						</div>
					</div>
				</div>
			</div>
		</section>

		{{-- Prayer Section (Focus Visual) --}}
		<section id="prayer" class="section-wrapper" style="background-color: #0f172a;">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8 text-center text-white mb-5 reveal-up">
						<span class="section-label text-white opacity-50">Pergumulan Bersama</span>
						<h2 class="display-title text-white h2">POKOK DOA</h2>
						<p class="text-white-50">Sampaikan pergumulan dan harapan Anda, kami akan mendoakan bersama dalam kasih Kristus.
						</p>
					</div>
					<div class="col-lg-7">
						<div class="rounded-5 shadow-2xl p-4 p-md-5 reveal-up"
							style="background: rgba(255,255,255,0.05); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1);">
							<form action="/">
								<div class="mb-4">
									<label class="form-label text-white small fw-bold mb-2">Nama Lengkap</label>
									<input type="text"
										class="form-control modern-input border-white border-opacity-10 bg-white bg-opacity-5 text-white"
										placeholder="Masukkan nama anda">
								</div>
								<div class="mb-5">
									<label class="form-label text-white small fw-bold mb-2">Pokok Doa</label>
									<textarea class="form-control modern-input border-white border-opacity-10 bg-white bg-opacity-5 text-white"
									 rows="5" placeholder="Tuliskan pokok doa anda..."></textarea>
								</div>
								<button type="submit" class="btn btn-modern-primary w-100 py-3">Kirim Permohonan Doa</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
@endsection

@push('js')
	<script src="{{ asset('template/frontend/js/modern-welcome.js') }}"></script>
@endpush
