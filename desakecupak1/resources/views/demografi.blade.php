@extends('layouts.app')
@section('content')

<style>
    .desa-dashboard {
        --hijau-tua: #14532d;
        --hijau: #1f7a43;
        --emas: #a9822b;
        --krem: #f8f6f1;
        --garis: #e6e2d8;
        --teks: #262622;
        --teks-muted: #6b6b63;
        font-family: 'Inter', ui-sans-serif, system-ui, sans-serif;
        background: var(--krem);
        color: var(--teks);
    }
    .desa-dashboard .font-serif-display {
        font-family: 'Lora', Georgia, 'Times New Roman', serif;
    }
    .desa-dashboard .eyebrow {
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        color: var(--emas);
    }
    .desa-dashboard .card {
        background: #fff;
        border: 1px solid var(--garis);
        border-radius: 0.5rem;
    }
    .desa-dashboard .section-head {
        border-bottom: 2px solid var(--hijau-tua);
        padding-bottom: 0.85rem;
        margin-bottom: 1.75rem;
    }
    .desa-dashboard .gold-rule {
        width: 56px;
        height: 3px;
        background: var(--emas);
        border-radius: 2px;
    }
</style>

<div class="desa-dashboard min-h-screen py-14">
    <div class="max-w-6xl mx-auto px-6">

        <!-- Letterhead -->
        <div class="relative border-b border-[var(--garis)] pb-8 mb-12">
            <svg class="absolute right-0 top-0 opacity-[0.07] hidden md:block" width="140" height="140" viewBox="0 0 140 140" fill="none">
                <circle cx="70" cy="70" r="66" stroke="var(--hijau-tua)" stroke-width="2"/>
                <circle cx="70" cy="70" r="54" stroke="var(--emas)" stroke-width="1.5"/>
                <path d="M70 40 L78 62 L102 62 L82 76 L90 98 L70 84 L50 98 L58 76 L38 62 L62 62 Z" fill="var(--hijau-tua)"/>
            </svg>

            <p class="eyebrow mb-2">Pemerintah Desa Kecupak 1 &middot; Kabupaten Sumatera Utara</p>
            <h1 class="font-serif-display text-3xl md:text-[2.25rem] font-bold text-[var(--hijau-tua)] leading-tight">
                Dashboard Statistik Kependudukan
            </h1>
            <p class="text-[var(--teks-muted)] mt-2 text-sm">
                Data Monografi Desa &middot; Diperbarui Tahun 2026
            </p>
            <div class="gold-rule mt-4"></div>
        </div>

        <!-- Statistik Utama -->
        @php
            $stats = [
                ['Total Penduduk', '914', 'Jiwa'],
                ['Kepala Keluarga', '248', 'KK'],
                ['Penduduk Laki-Laki', '454', 'Jiwa'],
                ['Penduduk Perempuan', '460', 'Jiwa'],
            ];
        @endphp
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-14">
            @foreach($stats as $s)
            <div class="card p-6 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-[3px]" style="background: var(--hijau-tua);"></div>
                <p class="eyebrow mb-3">{{ $s[0] }}</p>
                <p class="font-serif-display text-3xl font-bold text-[var(--hijau-tua)]">
                    {{ $s[1] }}
                    <span class="text-sm font-normal text-[var(--teks-muted)] font-sans">{{ $s[2] }}</span>
                </p>
            </div>
            @endforeach
        </div>

        <div class="grid md:grid-cols-2 gap-8">

            <!-- Penduduk Berdasarkan Dusun -->
            <div class="card p-8">
                <div class="section-head">
                    <p class="eyebrow mb-1">Bagian 01</p>
                    <h3 class="font-serif-display text-xl font-bold text-[var(--teks)]">Sebaran Penduduk per Dusun</h3>
                </div>

                @php
                    $dusun = [
                        'Dusun Delamdam I'      => ['jumlah' => 211, 'color' => '#14532d'],
                        'Dusun Delamdam II'     => ['jumlah' => 188, 'color' => '#1f7a43'],
                        'Dusun Nambunga Buluh'  => ['jumlah' => 212, 'color' => '#a9822b'],
                        'Dusun Tuppak Beak'     => ['jumlah' => 134, 'color' => '#7a6a4f'],
                        'Dusun Pulo Namuk'      => ['jumlah' => 169, 'color' => '#3f7d5c'],
                    ];
                    $totalDusun = array_sum(array_column($dusun, 'jumlah'));
                    $stops = [];
                    $cursor = 0;
                    foreach ($dusun as $item) {
                        $pct = $item['jumlah'] / $totalDusun * 100;
                        $stops[] = "{$item['color']} {$cursor}% " . ($cursor + $pct) . "%";
                        $cursor += $pct;
                    }
                    $gradient = implode(', ', $stops);
                @endphp

                <div class="flex flex-col sm:flex-row items-center gap-8">
                    <div class="w-40 h-40 rounded-full shrink-0 ring-4 ring-[var(--krem)]"
                         style="background: conic-gradient({{ $gradient }}); box-shadow: 0 0 0 1px var(--garis);">
                    </div>
                    <div class="space-y-3 w-full">
                        @foreach($dusun as $nama => $item)
                        <div class="flex items-center justify-between text-sm border-b border-[var(--garis)] pb-2 last:border-0 last:pb-0">
                            <div class="flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full inline-block" style="background: {{ $item['color'] }};"></span>
                                <span class="text-[var(--teks-muted)]">{{ $nama }}</span>
                            </div>
                            <span class="font-semibold text-[var(--teks)]">{{ $item['jumlah'] }} Jiwa</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Penduduk Berdasarkan Agama -->
            <div class="card p-8">
                <div class="section-head">
                    <p class="eyebrow mb-1">Bagian 02</p>
                    <h3 class="font-serif-display text-xl font-bold text-[var(--teks)]">Penduduk Menurut Agama &amp; Sarana Ibadah</h3>
                </div>

                @php
                    $agama = [
                        ['label' => 'Islam',   'jumlah' => '455', 'satuan' => 'Jiwa'],
                        ['label' => 'Kristen', 'jumlah' => '452', 'satuan' => 'Jiwa'],
                        ['label' => 'Katolik', 'jumlah' => '7',   'satuan' => 'Jiwa'],
                        ['label' => 'Masjid',  'jumlah' => '2',   'satuan' => 'Unit'],
                    ];
                @endphp

                <div class="grid grid-cols-2 gap-3">
                    @foreach($agama as $a)
                    <div class="p-4 rounded-md border border-[var(--garis)] bg-[var(--krem)]/40">
                        <p class="eyebrow mb-1">{{ $a['label'] }}</p>
                        <p class="font-serif-display text-lg font-bold text-[var(--hijau-tua)]">
                            {{ $a['jumlah'] }} <span class="text-xs font-sans font-normal text-[var(--teks-muted)]">{{ $a['satuan'] }}</span>
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Penduduk Berdasarkan Pekerjaan -->
            <div class="card p-8 md:col-span-2">
                <div class="section-head">
                    <p class="eyebrow mb-1">Bagian 03</p>
                    <h3 class="font-serif-display text-xl font-bold text-[var(--teks)]">Mata Pencaharian Penduduk</h3>
                </div>

                @php
                    $pekerjaan = [
                        'Petani'        => 511,
                        'Lain-lain'     => 344,
                        'Wiraswasta'    => 44,
                        'TNI/POLRI'     => 7,
                        'PNS'           => 4,
                        'Pengangguran'  => 0,
                    ];
                    arsort($pekerjaan);
                    $totalKerja = array_sum($pekerjaan);
                @endphp

                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Ranking table -->
                    <div class="rounded-md overflow-hidden border border-[var(--garis)]">
                        <div class="grid grid-cols-2 text-white text-xs font-semibold uppercase tracking-wide px-4 py-3" style="background: var(--hijau-tua);">
                            <span>Jenis Pekerjaan</span>
                            <span class="text-right">Jumlah</span>
                        </div>
                        @foreach($pekerjaan as $job => $jml)
                        <div class="grid grid-cols-2 px-4 py-3 text-sm border-t border-[var(--garis)] {{ $loop->first ? 'bg-[var(--krem)]' : 'bg-white' }}">
                            <span class="{{ $loop->first ? 'font-bold text-[var(--hijau-tua)]' : 'text-[var(--teks)]' }} flex items-center gap-2">
                                @if($loop->first)
                                    <span class="w-1.5 h-1.5 rounded-full inline-block" style="background: var(--emas);"></span>
                                @endif
                                {{ $job }}
                            </span>
                            <span class="text-right {{ $loop->first ? 'font-bold text-[var(--hijau-tua)]' : 'text-[var(--teks)]' }}">{{ $jml }}</span>
                        </div>
                        @endforeach
                    </div>

                    <!-- Proportional bars -->
                    <div class="space-y-4 flex flex-col justify-center">
                        @foreach($pekerjaan as $job => $jml)
                        @php $persen = $totalKerja > 0 ? round($jml / $totalKerja * 100, 1) : 0; @endphp
                        <div>
                            <div class="flex justify-between text-xs mb-1">
                                <span class="text-[var(--teks-muted)]">{{ $job }}</span>
                                <span class="font-semibold text-[var(--teks)]">{{ $jml }} Orang</span>
                            </div>
                            <div class="w-full h-2 rounded-full bg-[var(--garis)] overflow-hidden">
                                <div class="h-full rounded-full" style="width: {{ $persen }}%; background: var(--hijau-tua);"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- DATA TAMBAHAN: PENDIDIKAN & KESEHATAN -->
            <div class="card p-8 md:col-span-2">
                <div class="section-head">
                    <p class="eyebrow mb-1">Bagian 04</p>
                    <h3 class="font-serif-display text-xl font-bold text-[var(--teks)]">Data Pendidikan &amp; Kesehatan Masyarakat</h3>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Pendidikan -->
                    <div>
                        <h4 class="font-serif-display text-lg font-bold text-[var(--hijau-tua)] mb-4">Tingkat Pendidikan</h4>
                        @php
                            $pendidikan = [
                                'Tidak Sekolah / Tamat SD' => '120 Jiwa',
                                'PAUD' => '21 Jiwa',
                                'SD' => '107 Jiwa',
                                'SMP' => '113 Jiwa',
                                'SLTA' => '243 Jiwa',
                                'Diploma I (D-I)' => '2 Jiwa',
                                'Diploma III (D-III)' => '6 Jiwa',
                                'Strata I (S-I)' => '45 Jiwa',
                                'Strata II (S-II)' => '1 Jiwa',
                                'Buta Huruf' => '1 Jiwa'
                            ];
                        @endphp
                        <div class="space-y-2 text-sm">
                            @foreach($pendidikan as $key => $val)
                            <div class="flex justify-between border-b border-[var(--garis)] pb-2">
                                <span class="text-[var(--teks-muted)]">{{ $key }}</span>
                                <span class="font-semibold text-[var(--teks)]">{{ $val }}</span>
                            </div>
                          @endforeach
                        </div>
                    </div>

                    <!-- Kesehatan & Posyandu -->
                    <div>
                      <h4 class="font-serif-display text-lg font-bold text-[var(--hijau-tua)] mb-4">Layanan Kesehatan &amp; Imunisasi</h4>
                      @php
                          $kesehatan = [
                              'Balita' => '80 Jiwa',
                              'Pransia' => '66 Jiwa',
                              'Lansia' => '73 Jiwa',
                              'Penerima Bantuan (Raskin/BLT/Lainnya)' => '29 KK',
                          ];
                      @endphp
                      <div class="space-y-2 text-sm">
                          @foreach($kesehatan as $k => $v)
                          <div class="flex justify-between border-b border-[var(--garis)] pb-2">
                              <span class="text-[var(--teks-muted)]">{{ $k }}</span>
                              <span class="font-semibold text-[var(--teks)]">{{ $v }}</span>
                          </div>
                        @endforeach
                    </div>
                  </div>
                </div>
            </div>

        </div>

        <p class="text-center text-xs text-[var(--teks-muted)] mt-14">
            Sumber data: Monografi Desa Kecupak 1, diolah oleh Pemerintah Desa
        </p>
    </div>
</div>

@endsection