<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PF Gym & Fitness - Transform Your Body, Elevate Your Life</title>
    @vite(['resources/css/styles.css', 'resources/js/script.js'])
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <div class="nav-brand">
                <i class="fas fa-dumbbell"></i>
                <span>PF Gym & Fitness</span>
            </div>
            <div class="nav-menu" id="nav-menu">
                <a href="#home" class="nav-link">Home</a>
                <a href="#jadwal" class="nav-link">Jadwal</a>
                <a href="#program" class="nav-link">Program Latihan</a>
                <a href="#trainers" class="nav-link">Trainers</a>
                <a href="#fasilitas" class="nav-link">Fasilitas</a>
                <a href="#harga" class="nav-link">Harga</a>
            </div>
            <button class="login-btn" popovertarget="">
                <a href="/admin">
                    <i class="fas fa-user-shield"></i>
                    Login Admin
                </a>
            </button>
            <div class="div">

            </div>
            <div class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title" id="hero-title">Wellcome to PF Gym & Fitness</h1>
            <script>
                window.GymTitlesGet = @json($title->pluck('title_description'));
            </script>
            <p class="hero-description">Bergabunglah dengan ribuan member yang telah merasakan transformasi luar biasa. Raih tubuh impian dengan program latihan terpersonalisasi dan trainer profesional.</p>
            <button class="cta-button">
                <i class="fas fa-fire"></i>
                Daftar Jadi Member
            </button>
        </div>
        <div class="scroll-indicator">
            <i class="fas fa-chevron-down"></i>
        </div>
    </section>

    <!-- Quotes Section -->
    <section class="quotes">
        <div class="container">
            <div class="quote-container">
                <h2 class="quote-title">Motivasi Hari Ini</h2>
                <script>
                    window.GymMotivationGet = @json($motivation->map(function($item) {
                        return [
                            'text' => $item->motivation_letter,
                            'author' => $item->author
                        ];
                    }));
                </script>
                <div class="quote-text" id="quote-text"></div>
                <div class="quote-author" id="quote-author"></div>
            </div>
        </div>
    </section>

    <!-- Schedule Section -->
    <section id="jadwal" class="schedule">
        <div class="container">
            <h2 class="section-title">Jadwal Latihan</h2>

            <!-- ─── Card ───────────────────────────────────────────────── -->
        <script>
            window.GymSchedulesGet = @json($mappedSchedules);
        </script>
        <div id="card"
            class="relative w-full max-w-lg mt-10 rounded-2xl border-t-4 border-rose-500
                    bg-slate-800/30 backdrop-blur-md border-slate-700 p-10 text-center shadow-xl
                    transition-all duration-500 ease-out will-change-transform will-change-opacity mx-auto">

            <div id="iconCircle"
                class="mx-auto h-24 w-24 -mt-16 rounded-full flex items-center justify-center
                        bg-rose-500 shadow-lg transition-all duration-500">
                <span id="iconSpace" class="text-4xl">

                </span>
            </div>

            <h2 id="day"   class="mt-6 text-3xl font-bold text-slate-100">Senin</h2>
            <p  id="label" class="mt-2 text-slate-400">Strength Training</p>

            <button id="time"
                    class="mt-6 px-8 py-2 rounded-full bg-rose-500 text-slate-50 font-semibold shadow-md
                        transition-all duration-500">
            06:00 - 22:00
            </button>
        </div>

            <!-- ─── Pagination ──────────────────────────────────────────── -->
            <div class="flex items-center gap-4 mt-10 justify-center">
                <button id="prev"
                        class="px-6 py-2 rounded-lg text-slate-400 bg-slate-700/40 hover:bg-slate-700 transition disabled:opacity-40">
                ‹ Prev
                </button>

                <span id="indicator"
                    class="px-7 py-2 rounded-lg bg-slate-700/50 text-teal-400 font-semibold">
                1 / 7
                </span>

                <button id="next"
                        class="px-6 py-2 rounded-lg text-slate-400 bg-slate-700/40 hover:bg-slate-700 transition">
                Next ›
                </button>
            </div>
        </div>
    </section>

    <!-- Program Section -->
    <section id="program" class="program">
        <div class="container">
            <h2 class="section-title">Program Latihan</h2>
            <div class="program-grid">
                @foreach ($programs as $fitnessPrograms)
                    <div class="program-card">
                        <div class="program-icon">
                            <i class="{{ $fitnessPrograms['icon'] }}"></i>
                        </div>
                        <h3>{{ $fitnessPrograms['name_Program'] }}</h3>
                        <p>{{ $fitnessPrograms['description_Program'] }}</p>
                        <button href="" class="program-btn" style="background: linear-gradient(45deg, #de7e5b, #dbcc78); border-radius: 10px; padding: 1rem 1rem">
                            Lihat Detail
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Trainers Section -->
    <section id="trainers" class="trainers">
        <div class="container">
            <h2 class="section-title">Personal Trainers</h2>
            <div class="trainers-grid">
                @foreach ($trainers as $personal_trainers)
                    <div class="trainer-card">
                        <div class="trainer-image">
                            <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=300&h=300&fit=crop&crop=face" alt="Trainer 1">
                        </div>
                        <div class="trainer-info">
                            <h3>{{ $personal_trainers['name_personal_trainer'] }}</h3>
                            <p class="specialization">{{ $personal_trainers['specialist'] }}</p>
                            <p class="experience">{{ $personal_trainers['experience'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Facilities Section -->
    <section id="fasilitas" class="facilities">
        <div class="container">
            <h2 class="section-title">Fasilitas Premium</h2>
            <div class="facilities-grid">
                @foreach($facilities as $Facility)
                    <div class="facility-card">
                        <div class="facility-icon">
                            <i class="{{ $Facility['icon_facility'] }}"></i>
                        </div>
                        <h3>{{ $Facility['facility_name'] }}</h3>
                        <p>{{ $Facility['facility_description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="harga" class="pricing">
        <div class="container">
            <h2 class="section-title">Paket Membership</h2>
            <div class="pricing-grid">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Paket 1 Bulan</h3>
                        <div class="price">
                            <span class="currency">Rp</span>
                            <span class="amount">299</span>
                            <span class="period">ribu</span>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        <li><i class="fas fa-check"></i> Akses gym 24/7</li>
                        <li><i class="fas fa-check"></i> Program latihan gratis</li>
                        <li><i class="fas fa-check"></i> Shower & locker</li>
                        <li><i class="fas fa-check"></i> Free WiFi</li>
                    </ul>
                    <button class="pricing-btn">Pilih Paket</button>
                </div>
                <div class="pricing-card featured">
                    <div class="popular-badge">TERPOPULER</div>
                    <div class="pricing-header">
                        <h3>Paket 3 Bulan</h3>
                        <div class="price">
                            <span class="currency">Rp</span>
                            <span class="amount">799</span>
                            <span class="period">ribu</span>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        <li><i class="fas fa-check"></i> Semua fitur paket 1 bulan</li>
                        <li><i class="fas fa-check"></i> Body composition monitor</li>
                        <li><i class="fas fa-check"></i> Group exercise unlimited</li>
                        <li><i class="fas fa-check"></i> 2x personal training</li>
                    </ul>
                    <button class="pricing-btn">Pilih Paket</button>
                </div>
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Paket Tahunan</h3>
                        <div class="price">
                            <span class="currency">Rp</span>
                            <span class="amount">2.99</span>
                            <span class="period">juta</span>
                        </div>
                    </div>
                    <ul class="pricing-features">
                        <li><i class="fas fa-check"></i> Semua fitur paket 3 bulan</li>
                        <li><i class="fas fa-check"></i> Personal trainer unlimited</li>
                        <li><i class="fas fa-check"></i> Nutrition consultation</li>
                        <li><i class="fas fa-check"></i> Priority support</li>
                    </ul>
                    <button class="pricing-btn">Pilih Paket</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="footer-brand">
                        <i class="fas fa-dumbbell"></i>
                        <span>PowerFit Gym</span>
                    </div>
                    <p>Transforming lives since 2018. Your journey to a better you starts here.</p>
                </div>
                <div class="footer-section">
                    <h4>Kontak</h4>
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Jl. Sudirman No. 123, Jakarta Pusat 10220</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <span>+62 21 5555 0123</span>
                    </div>
                    <div class="contact-item">
                        <i class="fab fa-whatsapp"></i>
                        <span>+62 812 3456 7890</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span>info@powerfitgym.com</span>
                    </div>
                </div>
                <div class="footer-section">
                    <h4>Follow Us</h4>
                    <div class="social-links">
                        <a href="#" class="social-link">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 PowerFit Gym. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>
