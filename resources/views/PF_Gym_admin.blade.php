<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PF Gym & Fitness - Transform Your Body, Elevate Your Life</title>
    @vite(['resources/css/styles.css', 'resources/js/script_admin.js'])
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com/3.4.4"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

    <!-- right sidebar navigation -->
    <nav class="fixed right-0 top-0 hidden md:flex h-full w-16 flex-col items-center bg-slate-800/70 backdrop-blur-md border-l border-slate-700 pt-4 space-y-6 z-40">
        <a href="#home"       class="group flex flex-col items-center gap-1 text-xs hover:text-rose-500"><i class="fas fa-home text-xl"></i><span>Home</span></a>
        <a href="#jadwal"     class="group flex flex-col items-center gap-1 text-xs hover:text-rose-500"><i class="fas fa-calendar-alt text-xl"></i><span>Jadwal</span></a>
        <a href="#program"    class="group flex flex-col items-center gap-1 text-xs hover:text-rose-500"><i class="fas fa-dumbbell text-xl"></i><span>Program</span></a>
        <a href="#members"   class="group flex flex-col items-center gap-1 text-xs hover:text-rose-500"><i class="fas fa-user-friends text-xl"></i><span>Trainers</span></a>
        <a href="#fasilitas"  class="group flex flex-col items-center gap-1 text-xs hover:text-rose-500"><i class="fas fa-building text-xl"></i><span>Fasilitas</span></a>
        <a href="#harga"      class="group flex flex-col items-center gap-1 text-xs hover:text-rose-500"><i class="fas fa-tags text-xl"></i><span>Harga</span></a>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-overlay"></div>
            <div class="hero-content">
                <h1 class="hero-title border-4 border-red-500 rounded-lg" id="hero-title">Wellcome to PF Gym & Fitness</h1>
                <script>
                    window.GymTitlesGet = @json($title->pluck('title_description'));
                </script>
                <div class=" mt-1 flex justify-center">
                    <button popovertarget="editPopup" class="mt-2 mr-2 px-6 py-2 rounded-lg bg-orange-500 text-white font-semibold hover:bg-orange-600 transition">
                        Edit
                    </button>
                    <div id="editPopup"
                        popover
                        class=" popover-content
                                transition duration-300 ease-out
                                scale-95
                                origin-center bg-black-700 p-6 rounded-lg shadow-xl w-120 z-50">
                        <h3 class="text-lg text-white font-bold mb-3">Edit Title</h3>
                        <select class="bg-gray-200 text-gray-700 border border-gray-300 rounded px-4 py-2 w-full" id="selectedTitleEdit">
                            @foreach ($title as $select_title)
                                <option value="{{$select_title['id_Title']}}">{{$select_title['title_description']}}</option>
                            @endforeach
                        </select>
                        <input id="requestTitle" class="bg-gray-200 text-gray-700 border border-gray-300 rounded px-4 py-2 w-full mt-6" type="text" class="border border-gray-300 rounded px-4 py-2 w-full mb-4" placeholder="Masukkan nama title baru">
                        <div class="flex justify-end gap-2 mt-4">
                            <button popovertarget="editPopup" popovertargetaction="hide"
                                    class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Cancel</button>
                            <button popovertarget="editPopup" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600" id="btnSave">Save</button>
                        </div>
                    </div>

                    <button popovertarget="addPopup" class="mt-2 mr-2 px-6 py-2 rounded-lg bg-green-700 text-white font-semibold hover:bg-green-600 transition">
                        Add
                    </button>
                    <div id="addPopup"
                        popover
                        class=" popover-content
                                transition duration-300 ease-out
                                scale-95
                                origin-center bg-black-700 p-6 rounded-lg shadow-xl w-120 z-50">
                        <h3 class="text-lg text-white font-bold mb-3">Add Title</h3>
                        <input id="newTitle" class="bg-gray-200 text-gray-700 border border-gray-300 rounded px-4 py-2 w-full mt-6" type="text" class="border border-gray-300 rounded px-4 py-2 w-full mb-4" placeholder="Masukkan nama title baru">
                        <div class="flex justify-end gap-2 mt-4">
                            <button popovertarget="addPopup" popovertargetaction="hide"
                                    class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Cancel</button>
                            <button popovertarget="addPopup" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600" id="btnAdd">Add</button>
                        </div>
                    </div>

                    <button popovertarget="deletePopup" class="mt-2 mr-2 px-6 py-2 rounded-lg bg-red-700 text-white font-semibold hover:bg-red-600 transition">
                        Delete
                    </button>
                    <div id="deletePopup"
                        popover
                        class=" popover-content
                                transition duration-300 ease-out
                                scale-95
                                origin-center bg-black-700 p-6 rounded-lg shadow-xl w-120 z-50">
                        <h3 class="text-lg text-white font-bold mb-3">Delete Title</h3>
                        <select class="bg-gray-200 text-gray-700 border border-gray-300 rounded px-4 py-2 w-full" id="selectedTitleDelete">
                            @foreach ($title as $select_title)
                                <option value="{{$select_title['id_Title']}}">{{$select_title['title_description']}}</option>
                            @endforeach
                        </select>
                        <div class="flex justify-end gap-2 mt-4">
                            <button popovertarget="deletePopup" popovertargetaction="hide"
                                    class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Cancel</button>
                            <button popovertarget="deletePopup" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600" id="btnDelete">Delete</button>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="hero-description">Bergabunglah dengan ribuan member yang telah merasakan transformasi luar biasa. Raih tubuh impian dengan program latihan terpersonalisasi dan trainer profesional.</p>
                    <button class="cta-button">
                        <i class="fas fa-fire"></i>
                        Daftar Jadi Member
                    </button>
                </div>
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
                <div class="quote-text border-4 border-red-500 rounded-lg" id="quote-text"></div>
                <div class="quote-author border-4 border-red-500 rounded-lg" id="quote-author"></div>
                <div class=" mt-1 flex justify-center">
                    <button popovertarget="editPopupMot" class="mt-2 mr-2 px-6 py-2 rounded-lg bg-orange-500 text-white font-semibold hover:bg-orange-600 transition">
                        Edit
                    </button>
                    <div id="editPopupMot"
                        popover
                        class=" popover-content
                                transition duration-300 ease-out
                                scale-95
                                origin-center bg-black-700 p-6 rounded-lg shadow-xl w-120 z-50">
                        <h3 class="text-lg text-white font-bold mb-3">Edit Motivation letter</h3>
                        <select class="bg-gray-200 text-gray-700 border border-gray-300 rounded px-4 py-2 w-full" id="selectedMotivationId">
                            @foreach ($motivation as $select_motivation)
                                <option value="{{$select_motivation['id_Motivation']}}">
                                   Author : {{$select_motivation['author']}}
                                   Text : {{$select_motivation['motivation_letter']}}
                                </option>
                            @endforeach
                        </select>
                        <input id="requestAuthor" class="bg-gray-200 text-gray-700 border border-gray-300 rounded px-4 py-2 w-full mt-6" type="text" class="border border-gray-300 rounded px-4 py-2 w-full mb-4" placeholder="Insert new author">
                        <input id="requestMotivation" class="bg-gray-200 text-gray-700 border border-gray-300 rounded px-4 py-2 w-full mt-6" type="text" class="border border-gray-300 rounded px-4 py-2 w-full mb-4" placeholder="Insert new motivation">
                        <div class="flex justify-end gap-2 mt-4">
                            <button popovertarget="editPopupMot" popovertargetaction="hide"
                                    class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Cancel</button>
                            <button popovertarget="editPopupMot" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600" id="btnSaveMot">Save</button>
                        </div>
                    </div>


                    <button popovertarget="addPopupMot" class="mt-2 mr-2 px-6 py-2 rounded-lg bg-green-500 text-white font-semibold hover:bg-green-600 transition">
                        Add
                    </button>
                    <div id="addPopupMot"
                        popover
                        class=" popover-content
                                transition duration-300 ease-out
                                scale-95
                                origin-center bg-black-700 p-6 rounded-lg shadow-xl w-120 z-50">
                        <h3 class="text-lg text-white font-bold mb-3">Add Motivation letter</h3>
                        <input id="newAuthor" class="bg-gray-200 text-gray-700 border border-gray-300 rounded px-4 py-2 w-full mt-6" type="text" class="border border-gray-300 rounded px-4 py-2 w-full mb-4" placeholder="Insert new author">
                        <input id="newMotivationLetter" class="bg-gray-200 text-gray-700 border border-gray-300 rounded px-4 py-2 w-full mt-6" type="text" class="border border-gray-300 rounded px-4 py-2 w-full mb-4" placeholder="Insert new motivation">
                        <div class="flex justify-end gap-2 mt-4">
                            <button popovertarget="addPopupMot" popovertargetaction="hide"
                                    class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Cancel</button>
                            <button popovertarget="addPopupMot" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600" id="btnAddMot">Add</button>
                        </div>
                    </div>
                    <button popovertarget="delPopupMot" class="mt-2 mr-2 px-6 py-2 rounded-lg bg-red-500 text-white font-semibold hover:bg-red-600 transition">
                        Delete
                    </button>
                    <div id="delPopupMot"
                        popover
                        class=" popover-content
                                transition duration-300 ease-out
                                scale-95
                                origin-center bg-black-700 p-6 rounded-lg shadow-xl w-120 z-50">
                        <h3 class="text-lg text-white font-bold mb-3">Delete Motivation</h3>
                        <select class="bg-gray-200 text-gray-700 border border-gray-300 rounded px-4 py-2 w-full" id="selectedMotivationDelete">
                            @foreach ($motivation as $select_motivation)
                                <option value="{{$select_motivation['id_Motivation']}}">
                                   Author : {{$select_motivation['author']}}
                                   Text : {{$select_motivation['motivation_letter']}}
                                </option>
                            @endforeach
                        </select>
                        <div class="flex justify-end gap-2 mt-4">
                            <button popovertarget="delPopupMot" popovertargetaction="hide"
                                    class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Cancel</button>
                            <button popovertarget="delPopupMot" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600" id="btnDeleteMot">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                <span id="iconSpace" class="text-4xl"></span>
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
                <div class=" mt-1 flex justify-center">
                    <button popovertarget="addPopupTrainer" class="mt-2 mr-2 px-6 py-2 rounded-lg bg-green-500 text-white font-semibold hover:bg-green-600 transition">
                        Add
                    </button>
                    <button class="mt-2 mr-2 px-6 py-2 rounded-lg bg-orange-500 text-white font-semibold hover:bg-orange-600 transition">
                        Edit
                    </button>
                    <button class="mt-2 mr-2 px-6 py-2 rounded-lg bg-red-700 text-white font-semibold hover:bg-red-600 transition">
                        Delete
                    </button>
                </div>
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
            <button popovertarget="addPopupPrice" class="mt-2 mr-2 px-6 py-2 rounded-lg bg-green-700 text-white font-semibold hover:bg-green-600 transition">
                <i class="fa-solid fa-folder-plus mr-2"></i> Add New Package
            </button>
            <div id="addPopupPrice"
                popover
                class=" popover-content
                        transition duration-300 ease-out
                        scale-95
                        origin-center bg-black-700 p-6 rounded-lg shadow-xl w-120 z-50">
                <h3 class="text-lg text-white font-bold mb-3">Add Motivation letter</h3>
                <input id="newAuthor" class="bg-gray-200 text-gray-700 border border-gray-300 rounded px-4 py-2 w-full mt-6" type="text" class="border border-gray-300 rounded px-4 py-2 w-full mb-4" placeholder="Insert new author">
                <input id="newMotivationLetter" class="bg-gray-200 text-gray-700 border border-gray-300 rounded px-4 py-2 w-full mt-6" type="text" class="border border-gray-300 rounded px-4 py-2 w-full mb-4" placeholder="Insert new motivation">
                <div class="flex justify-end gap-2 mt-4">
                    <button popovertarget="addPopupPrice" popovertargetaction="hide"
                            class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Cancel</button>
                    <button popovertarget="addPopupPrice" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600" id="btnAddPrice">Add</button>
                </div>
            </div>
            <div class="pricing-grid">
                @foreach ($packages as $pkg)
                    <div class="pricing-card {{ $pkg->is_popular ? 'featured' : '' }}">
                        @if($pkg->is_popular)
                            <div class="popular-badge">TERPOPULER</div>
                        @endif
                        <div class="pricing-header">
                            <h3>{{ $pkg->name_package }}</h3>
                            <div class="price">
                                <span class="currency">Rp</span>
                                <span class="amount">{{ $pkg->price_amount }}</span>
                                <span class="period">{{ $pkg->price_unit }}</span>
                            </div>
                        </div>
                        <ul class="pricing-features">
                            @foreach ($pkg->features as $feature)
                                <li><i class="fas fa-check"></i> {{ $feature }}</li>
                            @endforeach
                        </ul>
                        <button class="pricing-btn">Pilih Paket</button>
                        <div class=" mt-1 flex justify-center">
                            <button class="mt-2 mr-2 px-6 py-2 rounded-lg bg-orange-500 text-white font-semibold hover:bg-orange-600 transition">
                                Edit
                            </button>
                            <button class="mt-2 mr-2 px-6 py-2 rounded-lg bg-red-700 text-white font-semibold hover:bg-red-600 transition">
                                Delete
                            </button>
                        </div>
                    </div>
                @endforeach
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
                        <span>PF Gym & Fitness</span>
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
                <p>&copy; 2025 PG Gym & Fitness. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>
