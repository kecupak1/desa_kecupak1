@extends('layouts.app')

@section('title', 'Sejarah & Kebudayaan - Desa Kecupak 1')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700;800&family=Lora:ital,wght@0,400;0,600;1,400&display=swap');

    .desa-site {
        --hijau-tua: #1d5c3a;
        --hijau: #2e7d52;
        --biru-tua: #1b5c6b;
        --emas: #c99a2e;
        --emas-terang: #eec25f;
        --merah: #b3272c;
        --tinta: #1c1b17;
        --tinta-lembut: #57564e;
        --kertas: #faf9f6;
        --garis: #e3dfd3;
        font-family: 'Public Sans', ui-sans-serif, system-ui, sans-serif;
        color: var(--tinta);
        background: var(--kertas);
    }
    .desa-site .f-display { font-family: 'Public Sans', ui-sans-serif, system-ui, sans-serif; }
    .desa-site .f-serif { font-family: 'Lora', Georgia, serif; }

    .desa-site .kicker {
        font-family: 'Public Sans', ui-sans-serif, system-ui, sans-serif;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.16em;
        text-transform: uppercase;
        color: var(--hijau);
    }
    .desa-site .rule-double {
        display: flex;
        align-items: center;
        gap: 6px;
        margin-top: 0.75rem;
        margin-bottom: 2rem;
    }
    .desa-site .rule-double span:first-child {
        width: 48px; height: 3px; background: var(--emas); border-radius: 2px;
    }
    .desa-site .rule-double span:last-child {
        width: 16px; height: 3px; background: var(--hijau); border-radius: 2px;
    }
</style>

<div class="desa-site min-h-screen pb-24">

    {{-- HERO SECTION --}}
    <section class="relative py-20 md:py-28 bg-[var(--tinta)] text-white overflow-hidden border-b-4 border-[var(--emas)]">
        <div class="absolute inset-0 opacity-15 bg-[radial-gradient(#c99a2e_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="max-w-5xl mx-auto px-6 sm:px-8 relative z-10 text-center">
            <p class="inline-block kicker text-[var(--emas-terang)] mb-3 bg-white/10 px-4 py-1.5 rounded-full backdrop-blur-sm">Monografi &amp; Warisan Budaya</p>
            <h1 class="f-display text-4xl sm:text-5xl md:text-6xl font-bold tracking-tight mb-6 leading-tight">
                Sejarah, Legenda &amp; Adat<br>Desa Kecupak I
            </h1>
            <p class="text-gray-300 text-base sm:text-lg md:text-xl max-w-3xl mx-auto font-normal leading-relaxed">
                Menelusuri jejak historis Tanoh Pakpak, filosofis mata air kehidupan, legenda air terjun, hingga sakralitas tradisi Menanda Tahun yang diwariskan leluhur.
            </p>
        </div>
    </section>

    {{-- KONTEN UTAMA --}}
    <div class="max-w-5xl mx-auto px-6 sm:px-8 mt-12 space-y-16">

        {{-- 1. SEJARAH DESA KECUPAK I & FILOSOFI CUPAK --}}
        <article class="bg-white p-8 sm:p-12 md:p-14 rounded-2xl border border-[var(--garis)] shadow-sm">
            <div class="flex items-center gap-3 mb-2">
                <span class="w-9 h-9 rounded-lg bg-[var(--hijau-tua)] text-white flex items-center justify-center font-bold text-base shadow-sm">01</span>
                <p class="kicker mb-0">Asal-Usul Penamaan Wilayah</p>
            </div>
            <h2 class="f-display text-2xl sm:text-3xl md:text-4xl font-bold text-[var(--tinta)]">Sejarah Desa Kecupak I &amp; Filosofi "Cupak"</h2>
            <div class="rule-double"><span></span><span></span></div>

            <div class="space-y-6 text-[var(--tinta-lembut)] text-base leading-relaxed">
                <p class="f-serif text-lg text-[var(--tinta)] leading-relaxed italic border-l-4 border-[var(--hijau)] pl-5 py-1 bg-[var(--kertas)] rounded-r-lg">
                    "Masyarakat asli Pakpak Bharat disebut dengan suku Pakpak yang mendiami wilayah tradisional Tanoh Pakpak. Sejak Kabupaten Pakpak Bharat mekar pada tahun 2003, pembangunan dan pelestarian identitas budaya di desa-desa terus diperkuat sebagai landasan kehidupan bermasyarakat."
                </p>

                <p>
                    Berdasarkan hasil wawancara mendalam dengan tokoh masyarakat setempat, <strong>Bapak Tema Manik</strong>, nama Desa Kecupak I berakar dari sebuah sumber mata air legendaris yang dikenal oleh leluhur dengan sebutan <strong>"Le Kecupak"</strong>. Secara etimologis dalam kebudayaan masyarakat Pakpak, kata <em>cupak</em> merujuk pada alat ukur volume tradisional berbahan bambu atau kayu yang digunakan sehari-hari untuk menakar hasil pertanian, khususnya padi dan beras.
                </p>

                <p>
                    Keunikan utama dari mata air <em>Le Kecupak</em> ini terletak pada karakteristik debit airnya yang sangat stabil. Masyarakat sejak masa lampau mengamati bahwa sebanyak apapun air diambil oleh warga untuk kebutuhan sehari-hari maupun pengairan ladang, volume air di mata air tersebut tidak pernah berkurang dan selalu kembali ke batas titik ukuran semula. Fenomena alam inilah yang kemudian dianalogikan dengan sifat <em>cupak</em>—sebuah takaran yang konsisten, pasti, dan berukuran tetap.
                </p>

                <p>
                    Lebih dari sekadar identitas geografis, istilah <em>cupak</em> juga menyimpan filosofi mendalam bagi kepribadian masyarakat Desa Kecupak I. Dalam ungkapan tua masyarakat Pakpak, kata <em>cupak</em> melambangkan prinsip hidup yang <strong>sederhana, hemat, berkecukupan, dan apa adanya</strong>. Penamaan ini mencerminkan kearifan lokal masyarakat agraris yang hidup selaras dengan alam serta memanfaatkan sumber daya air dan tanah secara bijaksana tanpa keserakahan.
                </p>

                {{-- SUB-BAB: ASAL USUL DUSUN --}}
                <div class="mt-8 pt-8 border-t border-[var(--garis)]">
                    <h3 class="f-display text-xl sm:text-2xl font-bold text-[var(--tinta)] mb-6">Asal-Usul Penamaan Dusun di Kecupak I</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-[var(--kertas)] p-6 rounded-xl border border-[var(--garis)]">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="w-2.5 h-2.5 rounded-full bg-[var(--emas)]"></span>
                                <h4 class="font-bold text-[var(--tinta)] text-lg">Dusun Nambunga Buluh</h4>
                            </div>
                            <p class="text-sm text-[var(--tinta-lembut)] leading-relaxed">
                                Dinamai berdasarkan fenomena alam pada masa lampau, di mana kawasan ini dipenuhi oleh rumpun bambu (<em>buluh</em>). Pada rumpun bambu tersebut sering hinggap koloni serangga berwarna kuning cerah yang oleh masyarakat disebut <em>munga buluh</em>. Serangga ini memiliki keunikan hanya akan terbang dan beterbangan ketika kelopak sayapnya terkena sinar matahari pagi. Ingatan visual ini kemudian diabadikan menjadi nama dusun.
                            </p>
                        </div>

                        <div class="bg-[var(--kertas)] p-6 rounded-xl border border-[var(--garis)]">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="w-2.5 h-2.5 rounded-full bg-[var(--hijau)]"></span>
                                <h4 class="font-bold text-[var(--tinta)] text-lg">Dusun Pulau Namu (Pulo Namuk)</h4>
                            </div>
                            <p class="text-sm text-[var(--tinta-lembut)] leading-relaxed">
                                Merujuk pada kondisi topografi masa lalu kawasan tersebut yang memiliki banyak genangan air alami serta rawa-rawa. Dataran yang menonjol di antara genangan air itu terlihat menyerupai pulau-pulau kecil (<em>pulau</em>) dan menjadi habitat yang dipenuhi oleh banyak nyamuk (<em>namu/namuk</em>). Karakteristik lingkungan inilah yang melekat menjadi sebutan turun-temurun bagi dusun tersebut.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </article>

        {{-- 2. LEGENDA & SEJARAH AIR TERJUN LAE UNE --}}
        <article class="bg-white p-8 sm:p-12 md:p-14 rounded-2xl border border-[var(--garis)] shadow-sm">
            <div class="flex items-center gap-3 mb-2">
                <span class="w-9 h-9 rounded-lg bg-[var(--hijau-tua)] text-white flex items-center justify-center font-bold text-base shadow-sm">02</span>
                <p class="kicker mb-0">Objek Wisata &amp; Legenda</p>
            </div>
            <h2 class="f-display text-2xl sm:text-3xl md:text-4xl font-bold text-[var(--tinta)]">Sejarah Air Terjun Lae Une (Sampuren Lae Une)</h2>
            <div class="rule-double"><span></span><span></span></div>

            <div class="space-y-6 text-[var(--tinta-lembut)] text-base leading-relaxed">
                <p>
                    Air Terjun Lae Une atau yang dikenal masyarakat lokal sebagai <em>Sampuren Lae Une</em> merupakan salah satu objek wisata alam unggulan di Kabupaten Pakpak Bharat yang terletak di wilayah Desa Kecupak I. Berjarak sekitar 7 km dari Kota Salak (Ibu Kota Kabupaten), air terjun ini menawarkan panorama alam yang masih sangat asri, sejuk, dan belum banyak tersentuh eksploitasi modern. Di balik keindahannya, Lae Une menyimpan histori nama dan dua versi cerita rakyat yang diwariskan secara turun-temurun.
                </p>

                {{-- DUA VERSI SEJARAH --}}
                <div class="space-y-6 my-8">
                    <div class="bg-[var(--kertas)] p-6 sm:p-8 rounded-xl border-l-4 border-[var(--hijau-tua)] border-y border-r border-[var(--garis)]">
                        <h3 class="f-display font-bold text-[var(--tinta)] text-xl mb-3 flex items-center gap-2">
                            <span>📜 Versi Literatur: Mitos Perjanjian Siumang</span>
                        </h3>
                        <p class="text-sm sm:text-base text-[var(--tinta-lembut)] leading-relaxed">
                            Berdasarkan literatur jurnal kebudayaan, dikisahkan pada zaman dahulu terdapat sepasang suami istri yang telah lama membina rumah tangga namun tak kunjung dikaruniai keturunan. Dalam keputusasaannya, mereka menyampaikan permohonan kepada entitas penunggu Lae Une yang dikenal dengan nama <strong>Siumang</strong>. Siumang mengabulkan doa tersebut dengan satu syarat mutlak: kelak setelah bayi itu lahir, mereka wajib mempersembahkan sesajen berupa <em>manuk mbettar</em> (ayam putih bersih), <em>itak</em> (kue adat), dan <em>sada minak</em> (minyak kelapa). 
                        </p>
                        <p class="text-sm sm:text-base text-[var(--tinta-lembut)] leading-relaxed mt-3">
                            Namun setelah sang anak lahir dan tumbuh sehat, pasangan tersebut lalai dan mengabaikan perjanjian adat itu. Siumang yang murka akhirnya mengambil kembali bayi yang pernah dianugerahkannya. Dari peristiwa tragedi kesedihan dan penyesalan inilah, masyarakat percaya nama aliran air terjun ini bermula menjadi <em>Lae Une</em>.
                        </p>
                    </div>

                    <div class="bg-[var(--kertas)] p-6 sm:p-8 rounded-xl border-l-4 border-[var(--emas)] border-y border-r border-[var(--garis)]">
                        <h3 class="f-display font-bold text-[var(--tinta)] text-xl mb-3 flex items-center gap-2">
                            <span>🗣️ Versi Penuturan Tokoh Adat: Kisah Boru Manik &amp; "Unena"</span>
                        </h3>
                        <p class="text-sm sm:text-base text-[var(--tinta-lembut)] leading-relaxed">
                            Menurut penuturan historis Bapak Tema Manik, secara geografis nama asli aliran sungai dari hulu ke hilir sesungguhnya adalah <strong>Lae Leurdi</strong> (sebagaimana tercatat dalam peta Belanda/lama). Sebutan <em>Lae Une</em> pada awalnya hanya merujuk khusus pada titik lokasi air terjun, yang kemudian berkembang menjadi nama wilayah/desa lama.
                        </p>
                        <p class="text-sm sm:text-base text-[var(--tinta-lembut)] leading-relaxed mt-3">
                            Dikisahkan pada masa lampau, hiduplah seorang gadis dari marga Manik (<em>Boru Manik</em>) yang kerap mandi di air terjun bersama teman-temannya. Kala itu sedang berkecamuk perang antarkelompok. Seorang pemuda dari kelompok lawan jatuh hati dan ingin mempersunting Boru Manik. Pihak keluarga perempuan mengajukan syarat berat: pemuda itu harus mampu menaklukkan seluruh musuh yang ada di wilayah tersebut.
                        </p>
                        <p class="text-sm sm:text-base text-[var(--tinta-lembut)] leading-relaxed mt-3">
                            Pemuda itu berhasil mengalahkan hampir semua lawannya, menyisakan satu orang musuh terakhir. Namun, musuh terakhir ini tidak dapat dibunuh karena ia telah melakukan <strong>"bersembah"</strong> (menyerah total dan meminta suaka adat). Dalam hukum adat Pakpak yang luhur, orang yang telah <em>bersembah</em> pantang hukumnya untuk dibunuh. Akibatnya, syarat pernikahan tidak terpenuhi secara utuh dan pernikahan pun dibatalkan.
                        </p>
                        <p class="text-sm sm:text-base text-[var(--tinta-lembut)] leading-relaxed mt-3 font-medium text-[var(--tinta)]">
                            Menerima takdir tersebut, Boru Manik memutuskan untuk pergi meninggalkan lokasi dan melangkah menuju Delang Singgabit. Keputusan bulat untuk pergi atau "berangkat dengan keputusan demikianlah adanya" dalam bahasa Pakpak disebut <span class="text-[var(--merah)] font-bold">"Unena"</span>. Dari kata <em>Le</em> (Air) dan <em>Unena</em> (Keputusan/Berangkat), lahirlah nama <strong class="text-[var(--hijau-tua)]">Leune</strong> atau <strong>Lae Une</strong>.
                        </p>
                    </div>
                </div>

                {{-- KEPERCAYAAN & PERISTIWA NYATA --}}
                <div class="bg-red-950/5 border border-red-900/20 p-6 rounded-xl mt-6">
                    <h4 class="font-bold text-[var(--merah)] text-base uppercase tracking-wider mb-2 flex items-center gap-2">
                        <span>⚠️ Kepercayaan Masyarakat &amp; Catatan Peristiwa</span>
                    </h4>
                    <p class="text-sm text-[var(--tinta-lembut)] leading-relaxed">
                        Sebagai kawasan yang disakralkan, Lae Une tidak lepas dari kisah mistis. Sebagian masyarakat meyakini adanya suara tangisan bayi yang sayup-sayup terdengar di sekitar air terjun dan mitos penunggu alam yang "meminta tumbal". Kepercayaan ini diperkuat oleh peristiwa nyata pada tahun 2021, di mana seorang wisatawan remaja berusia 20 tahun bernama Riko Tumangger dilaporkan hilang dan tenggelam terbawa arus deras saat berenang. Peristiwa ini sempat membuat kunjungan ke Lae Une menurun karena rasa takut warga, sekaligus menjadi pengingat bagi setiap pengunjung untuk selalu menjaga kesopanan, kehati-hatian, dan menghormati kearifan lokal saat berkunjung.
                    </p>
                </div>

            </div>
        </article>

        {{-- 3. TRADISI MENANDA TAHUN DI DELLENG SIMENOTO --}}
        <article class="bg-white p-8 sm:p-12 md:p-14 rounded-2xl border border-[var(--garis)] shadow-sm">
            <div class="flex items-center gap-3 mb-2">
                <span class="w-9 h-9 rounded-lg bg-[var(--hijau-tua)] text-white flex items-center justify-center font-bold text-base shadow-sm">03</span>
                <p class="kicker mb-0">Adat Istiadat &amp; Ritual Agraris</p>
            </div>
            <h2 class="f-display text-2xl sm:text-3xl md:text-4xl font-bold text-[var(--tinta)]">Tradisi Menanda Tahun di Delleng Simenoto</h2>
            <div class="rule-double"><span></span><span></span></div>

            <div class="space-y-6 text-[var(--tinta-lembut)] text-base leading-relaxed">
                <p>
                    <strong>Delleng Simenoto</strong> (Gunung/Bukit Simenoto) merupakan kawasan perbukitan yang berkedudukan sangat penting dan sakral dalam tatanan adat masyarakat Desa Kecupak I. Sejak ratusan tahun lalu, bukit ini menjadi pusat pelaksanaan upacara adat agraris terbesar masyarakat Pakpak, yaitu tradisi <strong>Menanda Tahun</strong>. 
                </p>
                <p>
                    Nama <em>Simenoto</em> berasal dari kata bahasa Pakpak <em>"Menoto"</em>, yang berarti permulaan bekerja atau penanda langkah awal. Dahulu, apabila para leluhur (<em>opung</em>) hendak membuka lahan hutan untuk dijadikan ladang pertanian baru, prosesi langkah pertamanya disebut <em>menoto</em>. Dari situlah nama bukit ini abadi sebagai tempat memulai kalender musim tanam.
                </p>

                {{-- PERPINDAHAN DARI CIBEDAK --}}
                <div class="bg-[var(--kertas)] p-6 sm:p-8 rounded-xl border border-[var(--garis)] my-6">
                    <h3 class="font-bold text-[var(--tinta)] text-lg mb-3">Sejarah Perpindahan Lokasi dari Cibedak ke Simenoto</h3>
                    <p class="text-sm sm:text-base leading-relaxed mb-3">
                        Bapak Tema Manik menuturkan bahwa pelaksanaan tradisi Menanda Tahun hanya pernah mengalami satu kali perpindahan lokasi sepanjang sejarah, yakni dari sebuah tempat bernama <strong>Cibedak</strong> (berlokasi di seberang Kantor Camat saat ini) menuju ke <strong>Delleng Simenoto</strong>.
                    </p>
                    <p class="text-sm sm:text-base leading-relaxed mb-3">
                        Pada masa lalu di Cibedak, batu pertanda adat yang digunakan memiliki bentuk menyerupai kalajengking. Namun setiap kali upacara digelar di lokasi tersebut, sering terjadi kejadian aneh di mana batu kalajengking itu "menggigit" atau membawa firasat buruk, serta pelaksanaan ritual kerap diwarnai oleh pertengkaran dan perselisihan antarwarga. Fenomena ini dimaknai para tetua adat sebagai tanda bahwa Cibedak tidak lagi membawa keberkahan.
                    </p>
                    <p class="text-sm sm:text-base leading-relaxed">
                        Melihat kondisi itu, seorang tokoh dari pihak <strong>Marga Bancin</strong> berinisiatif membuatkan <em>sesak</em> (batu pertanda adat) yang baru di kawasan Delleng Simenoto. Batu tanda lama di Cibedak tidak dipindahkan, melainkan langsung dikuburkan di tempat asalnya sebagai tanda penutupan masa suram. Sejak dipindahkan ke Simenoto hingga detik ini, upacara Menanda Tahun selalu berjalan damai, rukun, stabil, dan membawa hasil panen yang melimpah bagi masyarakat.
                    </p>
                </div>

                {{-- FUNGSI & SIMBOLISME --}}
                <h3 class="f-display font-bold text-[var(--tinta)] text-xl pt-4">Simbolisme &amp; Tahapan Pelaksanaan Menanda Tahun</h3>
                <p>
                    Di puncak Delleng Simenoto terdapat <strong>Batu Tetal</strong>, yaitu batu perjanjian berbentuk <em>secak</em> yang melambangkan hukum adat yang pantang dilanggar. Di tempat ini pula dipasang <strong>Lambe</strong>, yakni hiasan janur segitiga dari pucuk daun pohon aren yang menyimbolkan tiga tungku kekuatan desa: <em>Pemerintahan, Agama, dan Masyarakat Adat</em>.
                </p>

                <div class="grid md:grid-cols-3 gap-6 pt-2">
                    <div class="p-5 rounded-xl border border-[var(--garis)] bg-white shadow-sm">
                        <span class="inline-block w-8 h-8 rounded-full bg-[var(--emas)]/20 text-[var(--emas)] font-bold text-center leading-8 mb-3">1</span>
                        <h4 class="font-bold text-[var(--tinta)] text-base mb-2">Musyawarah (Runggu)</h4>
                        <p class="text-xs sm:text-sm text-[var(--tinta-lembut)] leading-relaxed">
                            Sebelum hari H, tokoh adat, kepala desa, dan warga menggelar <em>runggu</em> untuk menentukan hari baik (<em>meniti ari</em>), memilih penanggung jawab (<em>sukut</em>) dan pemimpin ritual (<em>guru/sibaso</em>), serta bergotong royong mengumpulkan beras dan dana upacara.
                        </p>
                    </div>

                    <div class="p-5 rounded-xl border border-[var(--garis)] bg-white shadow-sm">
                        <span class="inline-block w-8 h-8 rounded-full bg-[var(--hijau)]/20 text-[var(--hijau)] font-bold text-center leading-8 mb-3">2</span>
                        <h4 class="font-bold text-[var(--tinta)] text-base mb-2">Prosesi &amp; Ramalan</h4>
                        <p class="text-xs sm:text-sm text-[var(--tinta-lembut)] leading-relaxed">
                            Dilakukan dengan perlengkapan sakral seperti makanan khas <em>Pelleng</em>, ranting rube, parang adat (<em>jenab</em>), dan ayam kurban. Guru memotong ayam lalu membaca organ tubuhnya untuk meramalkan tanaman yang cocok ditanam tahun itu serta memprediksi hama.
                        </p>
                    </div>

                    <div class="p-5 rounded-xl border border-[var(--garis)] bg-white shadow-sm">
                        <span class="inline-block w-8 h-8 rounded-full bg-[var(--merah)]/20 text-[var(--merah)] font-bold text-center leading-8 mb-3">3</span>
                        <h4 class="font-bold text-[var(--tinta)] text-base mb-2">Pantangan (Rebbu)</h4>
                        <p class="text-xs sm:text-sm text-[var(--tinta-lembut)] leading-relaxed">
                            Setelah upacara, wajib mematuhi <em>Rebbu</em>: seluruh warga desa <strong class="text-[var(--tinta)]">dilarang bekerja selama 1 hari penuh</strong> (wajib beristirahat di rumah), dan khusus keluarga <em>sukut</em> <strong class="text-[var(--tinta)]">dilarang memasak selama 3 hari</strong> agar desa terhindar dari bencana.
                        </p>
                    </div>
                </div>

                <p class="pt-4">
                    Tradisi Menanda Tahun di Delleng Simenoto berfungsi sebagai pengikat persatuan bagi tiga desa sekitarnya. Tujuan utamanya adalah menciptakan keserentakan waktu bercocok tanam, memutus siklus hama pertanian secara ekologis, dan memperkuat rasa syukur serta gotong royong antarwarga.
                </p>
            </div>
        </article>

        {{-- BOX SUMBER REFERENSI & NARASUMBER --}}
        <div class="bg-[var(--tinta)] text-white p-8 sm:p-10 rounded-2xl border-2 border-[var(--emas)]">
            <div class="flex items-center gap-3 mb-4">
                <svg class="w-6 h-6 text-[var(--emas-terang)]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                <h3 class="f-display font-bold text-lg sm:text-xl text-[var(--emas-terang)]">Daftar Pustaka &amp; Rujukan Sejarah</h3>
            </div>
            <p class="text-xs sm:text-sm text-gray-400 mb-6 border-b border-gray-800 pb-4">
                Seluruh materi sejarah, cerita rakyat, dan data monografi budaya pada halaman ini disusun dan divalidasi berdasarkan literatur ilmiah serta penuturan langsung tokoh adat Desa Kecupak I:
            </p>
            <ul class="space-y-3 text-xs sm:text-sm text-gray-300 leading-relaxed">
                <li class="flex items-start gap-2.5">
                    <span class="text-[var(--emas-terang)] font-bold mt-0.5">&bull;</span>
                    <span><strong>Wawancara Eksklusif Tokoh Masyarakat:</strong> Bapak Tema Manik, warga dan sesepuh adat Desa Kecupak I, Kecamatan Pergetteng-getteng Sengkut, Kabupaten Pakpak Bharat (Arsip Rekaman Audio, 18 Juli 2026).</span>
                </li>
                <li class="flex items-start gap-2.5">
                    <span class="text-[var(--emas-terang)] font-bold mt-0.5">&bull;</span>
                    <span><strong>Jurnal Penelitian Wisata &amp; Budaya:</strong> Daulay, N. S., Purba, P. F., Banjarnahor, P. G., Ritonga, S. F. S., Ginting, Q., &amp; Lubis, F. (2023). <em>Potensi dan Strategi Pengembangan Objek Wisata Alam Air Terjun Lae Une di Kabupaten Pakpak Barat</em>. Al-Hayat: Natural Sciences, Health &amp; Environment Journal, 1(1), 12-25.</span>
                </li>
                <li class="flex items-start gap-2.5">
                    <span class="text-[var(--emas-terang)] font-bold mt-0.5">&bull;</span>
                    <span><strong>Jurnal Antropologi &amp; Ekologi:</strong> Supsiloani, &amp; Manik, P. P. (2015). <em>Makna Upacara Menanda Tahun dan Pelestarian Lingkungan pada Masyarakat Pakpak Desa Kecupak I Pakpak Bharat</em>. Anthropos: Jurnal Antropologi Sosial dan Budaya, 1(2), 175-188.</span>
                </li>
                <li class="flex items-start gap-2.5">
                    <span class="text-[var(--emas-terang)] font-bold mt-0.5">&bull;</span>
                    <span><strong>Dokumentasi Kemendikbud:</strong> Liyansyah, M. (2019). <em>Upacara Menanda Tahun</em>. Balai Pelestarian Nilai Budaya Aceh, Direktorat Jenderal Kebudayaan, Kementerian Pendidikan dan Kebudayaan RI.</span>
                </li>
            </ul>
        </div>

    </div>

</div>

@endsection