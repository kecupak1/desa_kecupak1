<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Ticket DISKOMINFO</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        html, body { height: 100%; font-family: 'Plus Jakarta Sans', sans-serif; }
        body { min-height: 100vh; display: flex; flex-direction: column; overflow-x: hidden; }

        /* ── Background ── */
        .page-bg {
            position: fixed; inset: 0; z-index: 0;
            background: linear-gradient(145deg, #dbeafe 0%, #f8fafc 40%, #ffedd5 100%);
        }
        .page-bg::after {
            content: ''; position: absolute; inset: 0;
            background-image: radial-gradient(circle, #94a3b8 1px, transparent 1px);
            background-size: 30px 30px; opacity: 0.2;
        }

        /* ── Orbs ── */
        .orb { position: fixed; border-radius: 50%; filter: blur(90px); z-index: 1; pointer-events: none; }
        .orb-1 { width:650px; height:650px; background:radial-gradient(circle,#60a5fa,#3b82f6); opacity:.22; top:-200px; left:-180px; animation:float1 12s ease-in-out infinite; }
        .orb-2 { width:550px; height:550px; background:radial-gradient(circle,#fb923c,#f97316); opacity:.20; bottom:-180px; right:-120px; animation:float2 15s ease-in-out infinite; }
        .orb-3 { width:380px; height:380px; background:radial-gradient(circle,#34d399,#10b981); opacity:.15; top:40%; left:36%; animation:float3 10s ease-in-out infinite; }
        .orb-4 { width:280px; height:280px; background:radial-gradient(circle,#a78bfa,#8b5cf6); opacity:.12; top:10%; right:15%; animation:float1 18s ease-in-out infinite reverse; }
        @keyframes float1 { 0%,100%{transform:translate(0,0) scale(1)} 33%{transform:translate(40px,30px) scale(1.05)} 66%{transform:translate(-20px,50px) scale(.97)} }
        @keyframes float2 { 0%,100%{transform:translate(0,0) scale(1)} 33%{transform:translate(-50px,-30px) scale(1.04)} 66%{transform:translate(30px,-50px) scale(.96)} }
        @keyframes float3 { 0%,100%{transform:translate(0,0) scale(1)} 50%{transform:translate(-30px,-40px) scale(1.08)} }

        /* ── Particles ── */
        .particles { position:fixed; inset:0; z-index:1; pointer-events:none; }
        .particle  { position:absolute; border-radius:50%; animation:rise linear infinite; opacity:0; }
        @keyframes rise { 0%{transform:translateY(0) scale(1);opacity:0} 10%{opacity:1} 90%{opacity:.6} 100%{transform:translateY(-100vh) scale(.5);opacity:0} }

        /* ── Shapes ── */
        .shapes { position:fixed; inset:0; z-index:1; pointer-events:none; overflow:hidden; }
        .shape  { position:absolute; opacity:0; animation:floatShape linear infinite; }
        .shape-ring   { border-radius:50%; border-style:solid; }
        .shape-square { border-style:solid; }
        @keyframes floatShape { 0%{transform:translateY(110vh) rotate(0deg);opacity:0} 5%{opacity:1} 95%{opacity:.5} 100%{transform:translateY(-20vh) rotate(360deg);opacity:0} }

        /* ── Shimmer lines ── */
        .shimmer-line { position:fixed; height:1px; z-index:1; pointer-events:none; animation:shimmerMove linear infinite; opacity:0; }
        @keyframes shimmerMove { 0%{transform:translateX(-100%);opacity:0} 10%{opacity:1} 90%{opacity:1} 100%{transform:translateX(100vw);opacity:0} }

        /* ════════════════════════════════════
           ── TOPBAR ──
        ════════════════════════════════════ */
        .topbar {
            position: relative; z-index: 20;
            padding: 0 40px;
            height: 68px;
            display: flex; align-items: center; justify-content: space-between;
            flex-shrink: 0;
            background: rgba(255,255,255,0.6);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(226,232,240,0.7);
            box-shadow: 0 2px 20px rgba(15,23,42,0.05);
        }

        /* Brand */
        .brand { display:flex; align-items:center; gap:12px; }
        .brand-icon {
            width:44px; height:44px; background:white;
            border-radius:12px;
            box-shadow:0 2px 10px rgba(0,0,0,0.1);
            display:flex; align-items:center; justify-content:center;
        }
        .brand-divider {
            width:1px; height:28px;
            background: linear-gradient(180deg, transparent, #e2e8f0, transparent);
            margin: 0 4px;
        }
        .brand-text-main { font-size:.95rem; font-weight:800; color:#1e293b; line-height:1.2; }
        .brand-text-sub  { font-size:.68rem; font-weight:500; color:#94a3b8; line-height:1.2; }

        /* Pill tag di sebelah brand */
        .brand-tag {
            display: inline-flex; align-items: center; gap: 5px;
            background: #eff6ff; border: 1px solid #bfdbfe;
            border-radius: 100px; padding: 3px 10px;
            font-size: 0.62rem; font-weight: 700;
            color: #2563eb; letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        /* Center — info strip */
        .topbar-center {
            display: flex; align-items: center; gap: 20px;
            position: absolute; left: 50%; transform: translateX(-50%);
        }
        .info-chip {
            display: flex; align-items: center; gap: 7px;
            background: rgba(248,250,252,0.8);
            border: 1px solid rgba(226,232,240,0.8);
            border-radius: 10px; padding: 6px 14px;
            font-size: 0.72rem; font-weight: 600; color: #475569;
            white-space: nowrap;
        }
        .info-chip svg { flex-shrink: 0; color: #3b82f6; }
        .info-chip span { color: #0f172a; font-weight: 700; }

        /* Right side */
        .topbar-right { display:flex; align-items:center; gap:10px; }

        .nav-btn {
            display: flex; align-items: center; gap: 6px;
            padding: 7px 14px;
            border-radius: 10px; border: none;
            background: transparent;
            font-size: 0.75rem; font-weight: 600;
            color: #475569; cursor: pointer;
            transition: background .2s, color .2s;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .nav-btn:hover { background: rgba(59,130,246,0.08); color: #2563eb; }
        .nav-btn svg { width:15px; height:15px; flex-shrink:0; }

        .nav-divider { width:1px; height:22px; background:#e2e8f0; }

        .online-badge {
            display:flex; align-items:center; gap:7px;
            background:rgba(240,253,244,0.9);
            border:1px solid #bbf7d0; border-radius:100px;
            padding:6px 14px;
            font-size:.68rem; font-weight:700;
            color:#16a34a; letter-spacing:.07em; text-transform:uppercase;
        }
        .online-dot { width:7px; height:7px; background:#22c55e; border-radius:50%; animation:pulse-green 2s infinite; }
        @keyframes pulse-green { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:.5;transform:scale(.75)} }

        /* ── Center wrap ── */
        .center-wrap {
            position:relative; z-index:10; flex:1;
            display:flex; align-items:center; justify-content:center;
            padding:0 24px 48px;
        }

        /* ── Card ── */
        .card {
            background:rgba(255,255,255,0.92);
            backdrop-filter:blur(20px); -webkit-backdrop-filter:blur(20px);
            border-radius:28px;
            box-shadow:0 0 0 1px rgba(226,232,240,.9),0 24px 80px rgba(15,23,42,.1),0 6px 20px rgba(15,23,42,.06);
            width:100%; max-width:520px;
            padding:52px 52px 44px;
        }
        .card-header { display:flex; align-items:flex-start; gap:14px; margin-bottom:36px; }
        .accent-bar { width:5px; height:44px; background:linear-gradient(180deg,#3b82f6,#f97316); border-radius:4px; flex-shrink:0; margin-top:3px; }
        .card-title    { font-size:1.75rem; font-weight:800; color:#0f172a; line-height:1.2; }
        .card-subtitle { font-size:.85rem; color:#94a3b8; margin-top:5px; font-weight:400; }

        /* ── Fields ── */
        .field { margin-bottom:22px; }
        .field-label { display:block; font-size:.7rem; font-weight:700; color:#64748b; text-transform:uppercase; letter-spacing:.08em; margin-bottom:8px; }
        .input-field {
            width:100%; padding:14px 18px;
            background:#f8fafc; border:1.5px solid #e2e8f0; border-radius:12px;
            font-size:.9rem; font-family:'Plus Jakarta Sans',sans-serif; color:#1e293b;
            transition:border-color .2s,box-shadow .2s,background .2s;
        }
        .input-field:focus { outline:none; border-color:#3b82f6; background:#fff; box-shadow:0 0 0 4px rgba(59,130,246,.09); }
        .input-field::placeholder { color:#cbd5e1; }
        .input-wrap { position:relative; }
        .eye-button { position:absolute; right:14px; top:50%; transform:translateY(-50%); background:none; border:none; color:#94a3b8; cursor:pointer; padding:0; display:flex; transition:color .2s; }
        .eye-button:hover { color:#3b82f6; }

        .col-2 { display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:22px; }

        .btn-submit {
            width:100%; padding:15px;
            background:linear-gradient(135deg,#3b82f6 0%,#2563eb 100%);
            color:white; border:none; border-radius:12px;
            font-size:.92rem; font-weight:700; font-family:'Plus Jakarta Sans',sans-serif;
            cursor:pointer; transition:transform .2s,box-shadow .2s;
            box-shadow:0 4px 16px rgba(59,130,246,.35); margin-top:6px;
        }
        .btn-submit:hover { transform:translateY(-2px); box-shadow:0 10px 28px rgba(59,130,246,.45); }
        .btn-submit:active { transform:translateY(0); }

        .divider { position:relative; text-align:center; margin:24px 0 18px; }
        .divider::before { content:''; position:absolute; top:50%; left:0; right:0; height:1px; background:#f1f5f9; }
        .divider span { position:relative; background:transparent; padding:0 14px; font-size:.68rem; font-weight:600; color:#cbd5e1; letter-spacing:.1em; }

        .switch-text { text-align:center; font-size:.83rem; color:#94a3b8; }
        .switch-link { color:#2563eb; font-weight:700; text-decoration:none; margin-left:4px; }
        .switch-link:hover { text-decoration:underline; }

        .footer { position:relative; z-index:10; text-align:center; padding:0 0 24px; font-size:.72rem; color:#94a3b8; flex-shrink:0; }

        .hidden-form  { display:none; opacity:0; }
        .visible-form { display:block; animation:fadeUp .38s ease forwards; }
        @keyframes fadeUp { from{opacity:0;transform:translateY(10px)} to{opacity:1;transform:translateY(0)} }

        /* ── Modal ── */
        .modal-overlay {
            position:fixed; inset:0; background:rgba(15,23,42,.45);
            backdrop-filter:blur(6px); z-index:50;
            display:none; align-items:center; justify-content:center; padding:20px;
        }
        .modal-content {
            background:white; width:100%; max-width:600px;
            border-radius:24px; padding:36px;
            position:relative; box-shadow:0 24px 60px rgba(0,0,0,0.15);
            max-height:90vh; overflow-y:auto;
            animation: modalIn .3s ease;
        }
        @keyframes modalIn { from{opacity:0;transform:translateY(16px) scale(.97)} to{opacity:1;transform:translateY(0) scale(1)} }
        .modal-close {
            position:absolute; top:20px; right:22px;
            cursor:pointer; color:#94a3b8; transition:color .2s;
            background:none; border:none; padding:4px; line-height:1;
        }
        .modal-close:hover { color:#1e293b; }

        /* FAQ */
        .faq-item { margin-bottom:10px; border-radius:12px; overflow:hidden; background:#f8fafc; transition:all .3s; }
        .faq-question { padding:16px 20px; display:flex; justify-content:space-between; align-items:center; cursor:pointer; font-weight:700; color:#1e293b; font-size:.88rem; }
        .faq-answer { max-height:0; overflow:hidden; transition:max-height .3s ease,padding .3s ease; background:#f8fafc; color:#64748b; font-size:.83rem; line-height:1.7; }
        .faq-item.active { background:#3b82f6; }
        .faq-item.active .faq-question { color:white; }
        .faq-item.active .faq-answer { max-height:200px; padding:0 20px 20px; background:#3b82f6; color:rgba(255,255,255,.9); }
        .faq-icon { transition:transform .3s; flex-shrink:0; }
        .faq-item.active .faq-icon { transform:rotate(180deg); }

        /* Contact card */
        .contact-item {
            display:flex; align-items:flex-start; gap:14px;
            padding:16px; background:#f8fafc; border-radius:14px;
            border:1px solid #e2e8f0;
        }
        .contact-icon {
            width:38px; height:38px; border-radius:10px;
            display:flex; align-items:center; justify-content:center;
            flex-shrink:0;
        }

        .logo-box { background:white; box-shadow:0 4px 10px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
    <div class="page-bg"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>
    <div class="orb orb-4"></div>
    <div class="particles" id="particles"></div>
    <div class="shapes" id="shapes"></div>
    <div id="shimmerLines"></div>

    <!-- ════════════════ TOPBAR ════════════════ -->
    <header class="topbar">

        <!-- LEFT: Brand -->
        <div class="brand">
            <div class="brand-icon">
                <img src="{{ asset('images/binjai.png') }}" alt="Logo Kominfo" class="w-7 h-7 object-contain">
            </div>
            <div>
                <div class="brand-text-main">E-TICKET</div>
                <div class="brand-text-sub">DISKOMINFO</div>
            </div>
            <div class="brand-divider"></div>
            <div class="brand-tag">
                <svg width="8" height="8" viewBox="0 0 8 8" fill="currentColor"><circle cx="4" cy="4" r="4"/></svg>
                Kota Binjai
            </div>
        </div>
        </div>

        <!-- RIGHT: nav + badge -->
        <div class="topbar-right">
            <button class="nav-btn" onclick="openModal('faq-modal')">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                FAQ
            </button>
            <button class="nav-btn" onclick="openModal('contact-modal')">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                Kontak
            </button>
            <div class="nav-divider"></div>
            <div class="online-badge">
                <span class="online-dot"></span>
                System Online
            </div>
        </div>
    </header>

    <!-- ════════ MODAL FAQ ════════ -->
    <div id="faq-modal" class="modal-overlay" onclick="closeModal('faq-modal')">
        <div class="modal-content" onclick="event.stopPropagation()">
            <button class="modal-close" onclick="closeModal('faq-modal')">
                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            <div class="flex items-center gap-3 mb-6">
                <div style="width:38px;height:38px;background:#eff6ff;border-radius:10px;display:flex;align-items:center;justify-content:center;">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#3b82f6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <div style="font-size:.7rem;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.08em;">Bantuan</div>
                    <div style="font-size:1.1rem;font-weight:800;color:#0f172a;">Panduan E-Ticket</div>
                </div>
            </div>
            <div>
                <div class="faq-item active">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <span>Apa itu sistem E-Ticket DISKOMINFO?</span>
                        <svg class="faq-icon" width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                    </div>
                    <div class="faq-answer">E-Ticket adalah sistem aplikasi bantuan teknis terpusat untuk melaporkan kendala terkait infrastruktur IT, jaringan, perangkat lunak, maupun kebutuhan digital lainnya di lingkungan instansi.</div>
                </div>
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <span>Bagaimana cara membuat tiket bantuan?</span>
                        <svg class="faq-icon" width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                    </div>
                    <div class="faq-answer">Silakan login terlebih dahulu, pilih menu "Buat Tiket", isi detail kendala Anda, lalu unggah foto bukti pendukung (jika ada) untuk memudahkan tim teknis melakukan identifikasi.</div>
                </div>
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <span>Berapa lama waktu respon tim teknis?</span>
                        <svg class="faq-icon" width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                    </div>
                    <div class="faq-answer">Setiap tiket akan direspon maksimal dalam 1x24 jam kerja sesuai dengan tingkat prioritas (Urgent, High, Medium, Low) yang ditentukan oleh sistem dan admin.</div>
                </div>
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <span>Bagaimana cara memantau status laporan saya?</span>
                        <svg class="faq-icon" width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                    </div>
                    <div class="faq-answer">Anda dapat masuk ke menu "Riwayat Tiket". Status akan berubah dari Open (Baru), In Progress (Sedang Dikerjakan), hingga Resolved (Selesai).</div>
                </div>
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFaq(this)">
                        <span>Tiket ditutup tapi kendala belum tuntas?</span>
                        <svg class="faq-icon" width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                    </div>
                    <div class="faq-answer">Anda dapat menggunakan fitur Re-open Ticket atau memberikan komentar pada tiket tersebut agar tim teknis melakukan pengecekan ulang.</div>
                </div>
            </div>
        </div>
    </div>

    <!-- ════════ MODAL KONTAK ════════ -->
    <div id="contact-modal" class="modal-overlay" onclick="closeModal('contact-modal')">
        <div class="modal-content" onclick="event.stopPropagation()" style="max-width:480px;">
            <button class="modal-close" onclick="closeModal('contact-modal')">
                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            <div class="flex items-center gap-3 mb-6">
                <div style="width:38px;height:38px;background:#fff7ed;border-radius:10px;display:flex;align-items:center;justify-content:center;">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#f97316"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                </div>
                <div>
                    <div style="font-size:.7rem;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:.08em;">Dukungan</div>
                    <div style="font-size:1.1rem;font-weight:800;color:#0f172a;">Hubungi Kami</div>
                </div>
            </div>
            <div style="display:flex;flex-direction:column;gap:10px;">
                <div class="contact-item">
                    <div class="contact-icon" style="background:#eff6ff;">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#3b82f6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div>
                        <div style="font-size:.68rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.06em;margin-bottom:2px;">Lokasi</div>
                        <div style="font-size:.85rem;color:#1e293b;font-weight:600;line-height:1.5;">Jl. Jenderal Sudirman No.6,<br>Kota Binjai, Sumatera Utara</div>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon" style="background:#fdf4ff;">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#a855f7"><rect x="2" y="2" width="20" height="20" rx="5" ry="5" stroke-width="2"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zM17.5 6.5h.01"/></svg>
                    </div>
                    <div>
                        <div style="font-size:.68rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.06em;margin-bottom:2px;">Instagram</div>
                        <div style="font-size:.85rem;color:#1e293b;font-weight:600;">@dinaskominfokotabinjai</div>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon" style="background:#f0fdf4;">
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#22c55e"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <div style="font-size:.68rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:.06em;margin-bottom:2px;">Jam Operasional</div>
                        <div style="font-size:.85rem;color:#1e293b;font-weight:600;">Senin – Jumat &nbsp;·&nbsp; 08.00 – 16.00 WIB</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ════════════════ FORM ════════════════ -->
    <div class="center-wrap">
        <div style="width:100%; max-width:520px;">

            <!-- LOGIN -->
            <div id="login-form" class="visible-form">
                <div class="card">
                    <div class="card-header">
                        <div class="accent-bar"></div>
                        <div>
                            <div class="card-title">Selamat Datang</div>
                            <div class="card-subtitle">Masuk dengan akun resmi Anda</div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="field">
                            <label class="field-label">Email Address</label>
                            <input type="email" name="email" required class="input-field" placeholder="admin@binjaikota.go.id">
                        </div>
                        <div class="field">
                            <label class="field-label">Password</label>
                            <div class="input-wrap">
                                <input type="password" id="loginPass" name="password" required class="input-field" style="padding-right:46px" placeholder="••••••••">
                                <button type="button" onclick="toggleVisibility('loginPass')" class="eye-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </button>
                            </div>
                        </div>
                        <button type="submit" class="btn-submit">Masuk ke Sistem</button>
                    </form>
                    <div class="divider"><span>ATAU</span></div>
                    <p class="switch-text">Belum punya akun? <a href="#" onclick="toggleForm('register')" class="switch-link">Daftar Sekarang</a></p>
                </div>
            </div>

            <!-- REGISTER -->
            <div id="register-form" class="hidden-form">
                <div class="card">
                    <div class="card-header">
                        <div class="accent-bar"></div>
                        <div>
                            <div class="card-title">Daftar Akun</div>
                            <div class="card-subtitle">Lengkapi data pendaftaran Anda</div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="field">
                            <label class="field-label">Nama Lengkap</label>
                            <input type="text" name="name" required class="input-field" placeholder="Nama Lengkap">
                        </div>
                        <div class="field">
                            <label class="field-label">Email Instansi</label>
                            <input type="email" name="email" required class="input-field" placeholder="nama@binjaikota.go.id">
                        </div>
                        <div class="col-2">
                            <div>
                                <label class="field-label">Password</label>
                                <div class="input-wrap">
                                    <input type="password" id="regPass" name="password" required class="input-field" style="padding-right:42px" placeholder="••••••••">
                                    <button type="button" onclick="toggleVisibility('regPass')" class="eye-button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </button>
                                </div>
                            </div>
                            <div>
                                <label class="field-label">Konfirmasi</label>
                                <div class="input-wrap">
                                    <input type="password" id="regConf" name="password_confirmation" required class="input-field" style="padding-right:42px" placeholder="••••••••">
                                    <button type="button" onclick="toggleVisibility('regConf')" class="eye-button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn-submit">Buat Akun Sekarang</button>
                    </form>
                    <div class="divider"><span>ATAU</span></div>
                    <p class="switch-text">Sudah ada akun? <a href="#" onclick="toggleForm('login')" class="switch-link">Masuk Kembali</a></p>
                </div>
            </div>

        </div>
    </div>

    <footer class="footer">&copy; 2026 E-Ticket Diskominfo. &nbsp;·&nbsp; Pemerintah Kota Binjai</footer>

<script>
    function openModal(id)  { document.getElementById(id).style.display = 'flex'; }
    function closeModal(id) { document.getElementById(id).style.display = 'none'; }

    function toggleFaq(el) {
        const item = el.parentElement;
        const isActive = item.classList.contains('active');
        document.querySelectorAll('.faq-item').forEach(f => f.classList.remove('active'));
        if (!isActive) item.classList.add('active');
    }

    function toggleVisibility(id) {
        const input = document.getElementById(id);
        input.type = input.type === "password" ? "text" : "password";
    }

    function toggleForm(target) {
        const login    = document.getElementById('login-form');
        const register = document.getElementById('register-form');
        if (target === 'register') {
            login.classList.add('hidden-form'); login.classList.remove('visible-form');
            setTimeout(() => {
                login.style.display = 'none';
                register.style.display = 'block';
                register.classList.add('visible-form'); register.classList.remove('hidden-form');
            }, 300);
        } else {
            register.classList.add('hidden-form'); register.classList.remove('visible-form');
            setTimeout(() => {
                register.style.display = 'none';
                login.style.display = 'block';
                login.classList.add('visible-form'); login.classList.remove('hidden-form');
            }, 300);
        }
    }

    /* ── Particles ── */
    (function() {
        const container = document.getElementById('particles');
        const colors = ['#3b82f6','#f97316','#10b981','#8b5cf6','#06b6d4','#f59e0b'];
        for (let i = 0; i < 28; i++) {
            const p = document.createElement('div');
            p.className = 'particle';
            const size = Math.random()*6+3, color = colors[Math.floor(Math.random()*colors.length)];
            p.style.cssText = `width:${size}px;height:${size}px;background:${color};left:${Math.random()*100}%;bottom:-20px;animation-duration:${Math.random()*18+10}s;animation-delay:${Math.random()*20}s;opacity:0;`;
            container.appendChild(p);
        }
    })();

    /* ── Shapes ── */
    (function() {
        const container = document.getElementById('shapes');
        const configs = [
            {type:'ring',size:40,color:'rgba(59,130,246,0.25)',border:2},
            {type:'ring',size:24,color:'rgba(249,115,22,0.25)',border:2},
            {type:'ring',size:60,color:'rgba(16,185,129,0.2)',border:2},
            {type:'ring',size:18,color:'rgba(139,92,246,0.3)',border:2},
            {type:'ring',size:35,color:'rgba(6,182,212,0.25)',border:2},
            {type:'sq',  size:16,color:'rgba(59,130,246,0.2)',border:2},
            {type:'sq',  size:22,color:'rgba(249,115,22,0.2)',border:2},
            {type:'sq',  size:12,color:'rgba(16,185,129,0.25)',border:2},
        ];
        configs.forEach(c => {
            const el = document.createElement('div');
            el.className = 'shape '+(c.type==='ring'?'shape-ring':'shape-square');
            el.style.cssText = `width:${c.size}px;height:${c.size}px;border-color:${c.color};border-width:${c.border}px;left:${Math.random()*95}%;bottom:-60px;animation-duration:${Math.random()*20+15}s;animation-delay:${Math.random()*25}s;`;
            container.appendChild(el);
        });
    })();

    /* ── Shimmer lines ── */
    (function() {
        const container = document.getElementById('shimmerLines');
        const lineColors = [
            'linear-gradient(90deg,transparent,rgba(59,130,246,0.35),transparent)',
            'linear-gradient(90deg,transparent,rgba(249,115,22,0.3),transparent)',
            'linear-gradient(90deg,transparent,rgba(16,185,129,0.3),transparent)',
        ];
        for (let i = 0; i < 5; i++) {
            const line = document.createElement('div');
            line.className = 'shimmer-line';
            line.style.cssText = `top:${Math.random()*90+5}%;width:${Math.random()*30+20}%;background:${lineColors[i%3]};animation-duration:${Math.random()*8+6}s;animation-delay:${Math.random()*12}s;position:fixed;z-index:1;pointer-events:none;height:1px;opacity:0;animation-name:shimmerMove;animation-timing-function:linear;animation-iteration-count:infinite;`;
            container.appendChild(line);
        }
    })();
</script>
</body>
</html>