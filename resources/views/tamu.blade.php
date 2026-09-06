<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Buku Tamu Digital - DISKOMINFOSAN Aceh Tamiang</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Fonts: Space Grotesk (display) / Inter (body) / JetBrains Mono (data & tags) -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@600;700;800&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600;700&display=swap"
          rel="stylesheet">

    <style>

        /* =====================================================
           DESIGN TOKENS
        ===================================================== */

        :root {
            --ink: #0b1e33;
            --ink-2: #123354;

            --signal: #0891b2;
            --signal-dark: #075985;

            --amber: #f5a524;
            --amber-dark: #c2790a;

            --purple: #6d28d9;
            --purple-tint: #eee7fc;

            --green: #16a34a;
            --green-tint: #dcfce7;

            --paper: #f7f5f0;
            --paper-line: #e7e2d6;

            --ink-muted: #64748b;
            --signal-tint: #e0f2fe;
            --amber-tint: #fef3c7;
        }


        /* =====================================================
           GLOBAL
        ===================================================== */

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: 'Inter', 'Segoe UI', sans-serif;
            color: #172033;
            background: var(--paper);
        }

        a {
            text-decoration: none;
        }

        .font-display {
            font-family: 'Space Grotesk', 'Inter', sans-serif;
        }

        .mono-tag {
            font-family: 'JetBrains Mono', monospace;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1.6px;
            text-transform: uppercase;
        }

        /* subtle dot-grid texture */
        .dot-grid {
            background-image: radial-gradient(rgba(255,255,255,.16) 1px, transparent 1.4px);
            background-size: 22px 22px;
        }

        .dot-grid-dark {
            background-image: radial-gradient(rgba(11,30,51,.10) 1px, transparent 1.4px);
            background-size: 22px 22px;
        }

        /* scroll reveal */
        .reveal {
            opacity: 0;
            transform: translateY(22px);
            transition: opacity .7s cubic-bezier(.2,.7,.2,1), transform .7s cubic-bezier(.2,.7,.2,1);
        }

        .reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        @media (prefers-reduced-motion: reduce) {
            .reveal { opacity: 1; transform: none; transition: none; }
        }


        /* =====================================================
           NAVBAR
        ===================================================== */

        .navbar-topline {
            height: 3px;
            width: 100%;
            background: linear-gradient(90deg, var(--signal-dark), var(--signal) 55%, var(--amber));
        }

        .navbar-custom {
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
        }

        .navbar-brand {
            padding: 0;
        }

        .logo-navbar {
            width: 44px;
            height: 44px;
            object-fit: contain;
        }

        .brand-wrapper {
            line-height: 1.15;
        }

        .brand-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: .2px;
            color: var(--signal-dark);
        }

        .brand-subtitle {
            font-family: 'JetBrains Mono', monospace;
            font-size: 9px;
            font-weight: 600;
            color: #64748b;
            letter-spacing: 1.2px;
            margin-top: 3px;
        }

        .nav-link {
            position: relative;
            font-size: 13px;
            font-weight: 600;
            color: #475569 !important;
            padding: 10px 15px !important;
            transition: .25s ease;
        }

        .nav-link:hover {
            color: var(--signal-dark) !important;
        }

        .nav-link::after {
            content: "";
            position: absolute;
            left: 15px;
            right: 15px;
            bottom: 2px;
            height: 2px;
            border-radius: 10px;
            background: var(--signal-dark);
            transform: scaleX(0);
            transition: .25s ease;
        }

        .nav-link:hover::after {
            transform: scaleX(1);
        }


        /* =====================================================
           BUTTONS
        ===================================================== */

        .btn-visitor {
            border: 0;
            color: white;
            background: linear-gradient(135deg, var(--signal-dark), var(--signal));
            border-radius: 10px;
            padding: 10px 18px;
            font-size: 13px;
            font-weight: 700;
            box-shadow: 0 7px 18px rgba(7, 89, 133, .18);
            transition: .25s ease;
        }

        .btn-visitor:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(7, 89, 133, .25);
        }

        .btn-admin {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: var(--signal-dark);
            background: #eff8ff;
            border: 1px solid #d7edf9;
            border-radius: 10px;
            padding: 9px 15px;
            font-size: 13px;
            font-weight: 700;
            transition: .25s ease;
        }

        .btn-admin:hover {
            color: white;
            background: var(--signal-dark);
            border-color: var(--signal-dark);
            transform: translateY(-2px);
        }

        .btn-main {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--amber), var(--amber-dark));
            color: white;
            border: 0;
            padding: 14px 24px;
            border-radius: 11px;
            font-weight: 700;
            font-size: 14px;
            box-shadow: 0 10px 25px rgba(245,165,36,.28);
            transition: .25s ease;
        }

        .btn-main:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 14px 30px rgba(245,165,36,.35);
        }

        .btn-ghost-light {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            border: 1px solid rgba(255,255,255,.4);
            background: rgba(255,255,255,.06);
            backdrop-filter: blur(8px);
            padding: 13px 22px;
            border-radius: 11px;
            font-weight: 600;
            font-size: 14px;
            transition: .25s ease;
        }

        .btn-ghost-light:hover {
            color: var(--signal-dark);
            background: white;
            border-color: white;
        }

        .btn-ghost-dark {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: var(--ink);
            border: 1px solid var(--paper-line);
            background: white;
            padding: 13px 22px;
            border-radius: 11px;
            font-weight: 600;
            font-size: 14px;
            transition: .25s ease;
        }

        .btn-ghost-dark:hover {
            border-color: var(--signal);
            color: var(--signal-dark);
            transform: translateY(-2px);
        }


        /* =====================================================
           HERO
        ===================================================== */

        .hero {
            position: relative;
            height: 700px;
            overflow: hidden;
            background: var(--ink);
        }

        .carousel,
        .carousel-inner,
        .carousel-item {
            height: 100%;
        }

        .carousel-item img,
        .foto-slider {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            z-index: 2;
            background:
                linear-gradient(90deg, rgba(6,20,35,.94) 0%, rgba(8,42,63,.82) 40%, rgba(9,70,94,.42) 74%, rgba(9,70,94,.14) 100%);
        }

        .hero-overlay::after {
            content: "";
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(255,255,255,.14) 1px, transparent 1.4px);
            background-size: 26px 26px;
            opacity: .5;
        }

        .hero-content {
            position: absolute;
            z-index: 3;
            top: 50%;
            left: 0;
            width: 100%;
            transform: translateY(-52%);
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 8px 15px;
            border-radius: 50px;
            background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.22);
            backdrop-filter: blur(8px);
            color: #cdeffc;
            font-family: 'JetBrains Mono', monospace;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1.4px;
            margin-bottom: 22px;
        }

        .hero-badge .ping-dot {
            position: relative;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--amber);
        }

        .hero-badge .ping-dot::after {
            content: "";
            position: absolute;
            inset: -5px;
            border-radius: 50%;
            border: 1.5px solid var(--amber);
            animation: pingRing 1.8s ease-out infinite;
        }

        @keyframes pingRing {
            0%   { transform: scale(.5); opacity: .9; }
            100% { transform: scale(1.9); opacity: 0; }
        }

        .hero h1 {
            max-width: 860px;
            font-family: 'Space Grotesk', sans-serif;
            font-size: clamp(38px, 5vw, 60px);
            font-weight: 700;
            line-height: 1.08;
            letter-spacing: -1.6px;
            color: white;
        }

        .hero h1 .highlight {
            background: linear-gradient(90deg, #fbbf24, #fde68a);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .hero-description {
            max-width: 630px;
            font-size: 16px;
            line-height: 1.8;
            color: rgba(255,255,255,.82);
        }

        .hero-buttons {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .hero-ticker {
            position: absolute;
            z-index: 4;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(6,20,35,.55);
            border-top: 1px solid rgba(255,255,255,.12);
            backdrop-filter: blur(10px);
        }

        .ticker-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 16px 0;
            color: rgba(255,255,255,.82);
            font-size: 12.5px;
        }

        .ticker-item i {
            font-size: 15px;
            color: var(--amber);
        }

        .ticker-divider {
            width: 1px;
            align-self: stretch;
            background: rgba(255,255,255,.14);
        }


        /* =====================================================
           SECTION SHELL
        ===================================================== */

        .section-padding {
            padding: 96px 0;
        }

        .section-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--signal-dark);
        }

        .section-eyebrow .bar {
            width: 22px;
            height: 2px;
            background: var(--amber);
            display: inline-block;
        }

        .section-title {
            color: var(--ink);
            font-family: 'Space Grotesk', sans-serif;
            font-size: clamp(28px, 4vw, 38px);
            font-weight: 700;
            letter-spacing: -.6px;
        }

        .section-description {
            color: var(--ink-muted);
            max-width: 680px;
            margin: auto;
            line-height: 1.8;
            font-size: 14px;
        }

        .bg-panel {
            background: white;
        }


        /* =====================================================
           SCAN QR SECTION (signature moment)
        ===================================================== */

        .qr-stage {
            position: relative;
            width: 270px;
            height: 270px;
            margin: 0 auto;
        }

        .qr-radar {
            position: absolute;
            inset: 0;
            border-radius: 30px;
            border: 2px solid var(--signal);
            animation: radarPulse 2.6s ease-out infinite;
        }

        .qr-radar.delay {
            animation-delay: 1.3s;
        }

        @keyframes radarPulse {
            0%   { transform: scale(.86); opacity: .55; }
            100% { transform: scale(1.28); opacity: 0; }
        }

        .qr-frame {
            position: absolute;
            inset: 0;
            background: white;
            border-radius: 26px;
            padding: 20px;
            box-shadow: 0 24px 55px rgba(11,30,51,.18);
            overflow: hidden;
        }

        .qr-frame img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 8px;
            position: relative;
            z-index: 1;
        }

        .qr-corner {
            position: absolute;
            width: 22px;
            height: 22px;
            border-color: var(--amber);
            z-index: 2;
        }

        .qr-corner.tl { top: 10px;  left: 10px;  border-top: 4px solid;  border-left: 4px solid;  border-radius: 6px 0 0 0; }
        .qr-corner.tr { top: 10px;  right: 10px; border-top: 4px solid;  border-right: 4px solid; border-radius: 0 6px 0 0; }
        .qr-corner.bl { bottom: 10px; left: 10px;  border-bottom: 4px solid; border-left: 4px solid;  border-radius: 0 0 0 6px; }
        .qr-corner.br { bottom: 10px; right: 10px; border-bottom: 4px solid; border-right: 4px solid; border-radius: 0 0 6px 0; }

        .qr-scanline {
            position: absolute;
            left: 18px;
            right: 18px;
            height: 2px;
            border-radius: 2px;
            background: linear-gradient(90deg, transparent, var(--signal), transparent);
            box-shadow: 0 0 14px 2px rgba(8,145,178,.7);
            z-index: 2;
            animation: scanMove 2.8s ease-in-out infinite;
        }

        @keyframes scanMove {
            0%   { top: 18px;  opacity: 0; }
            8%   { opacity: 1; }
            50%  { top: calc(100% - 34px); }
            92%  { opacity: 1; }
            100% { top: calc(100% - 34px); opacity: 0; }
        }

        .qr-live-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 15px;
            border-radius: 50px;
            background: var(--green-tint);
            color: var(--green);
            font-family: 'JetBrains Mono', monospace;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .6px;
        }

        .qr-live-badge .dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--green);
            animation: livePulse 1.5s ease-in-out infinite;
        }

        @keyframes livePulse {
            0%, 100% { opacity: 1; }
            50%      { opacity: .3; }
        }

        .qr-steps {
            position: relative;
            padding-left: 46px;
        }

        .qr-steps::before {
            content: "";
            position: absolute;
            left: 17px;
            top: 6px;
            bottom: 6px;
            width: 2px;
            background: var(--paper-line);
        }

        .qr-step {
            position: relative;
            margin-bottom: 26px;
        }

        .qr-step:last-child {
            margin-bottom: 0;
        }

        .qr-step-num {
            position: absolute;
            left: -46px;
            top: 0;
            width: 34px;
            height: 34px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'JetBrains Mono', monospace;
            font-weight: 700;
            font-size: 13px;
            background: white;
            border: 2px solid var(--paper-line);
            color: var(--ink);
            z-index: 1;
        }

        .qr-step-num.active {
            border-color: var(--signal);
            color: var(--signal-dark);
            background: var(--signal-tint);
        }


        /* =====================================================
           TENTANG KAMI / STAT PANEL
        ===================================================== */

        .about-blob {
            position: absolute;
            border-radius: 50%;
            z-index: 0;
            pointer-events: none;
        }

        .stat-panel {
            background: white;
            border: 1px solid var(--paper-line);
            border-radius: 20px;
            box-shadow: 0 18px 46px rgba(11,30,51,.06);
            overflow: hidden;
        }

        .stat-cell {
            padding: 30px 22px;
            border-right: 1px solid var(--paper-line);
        }

        .stat-cell:last-child {
            border-right: 0;
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 11px;
            font-size: 18px;
            margin-bottom: 16px;
        }

        .stat-icon.teal   { background: var(--signal-tint); color: var(--signal-dark); }
        .stat-icon.amber  { background: var(--amber-tint);  color: var(--amber-dark); }
        .stat-icon.green  { background: var(--green-tint);  color: var(--green); }
        .stat-icon.purple { background: var(--purple-tint); color: var(--purple); }

        .stat-number {
            font-family: 'JetBrains Mono', monospace;
            font-size: 28px;
            font-weight: 700;
            color: var(--ink);
            line-height: 1;
        }

        .stat-label {
            font-size: 12px;
            font-weight: 600;
            color: var(--ink-muted);
            margin-top: 8px;
        }

        @media (max-width: 767px) {
            .stat-cell:nth-child(2n) { border-right: 0; }
            .stat-cell:nth-child(n+3) { border-top: 1px solid var(--paper-line); }
        }


        /* =====================================================
           FEATURE CARDS (Manfaat)
        ===================================================== */

        .feature-card {
            position: relative;
            height: 100%;
            padding: 30px;
            background: white;
            border: 1px solid var(--paper-line);
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(11,30,51,.045);
            transition: .3s ease;
            overflow: hidden;
        }

        .feature-card::after {
            content: "";
            position: absolute;
            width: 120px;
            height: 120px;
            right: -50px;
            top: -50px;
            border-radius: 50%;
            background: var(--tint, var(--signal-tint));
        }

        .feature-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 20px 45px rgba(11,30,51,.10);
            border-color: #d8eaf4;
        }

        .feature-card.tint-amber::after  { background: var(--amber-tint); }
        .feature-card.tint-green::after  { background: var(--green-tint); }

        .feature-tag {
            display: inline-block;
            font-family: 'JetBrains Mono', monospace;
            font-size: 10.5px;
            font-weight: 700;
            letter-spacing: 1px;
            color: var(--ink-muted);
            margin-bottom: 14px;
            position: relative;
            z-index: 2;
        }

        .feature-icon {
            position: relative;
            z-index: 2;
            width: 56px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            background: var(--signal-tint);
            color: var(--signal-dark);
            font-size: 24px;
            margin-bottom: 18px;
        }

        .feature-icon.amber  { background: var(--amber-tint); color: var(--amber-dark); }
        .feature-icon.green  { background: var(--green-tint); color: var(--green); }

        .feature-card h5,
        .feature-card p {
            position: relative;
            z-index: 2;
        }

        .feature-card p {
            font-size: 13px;
            line-height: 1.75;
        }


        /* =====================================================
           CARA PENGISIAN
        ===================================================== */

        .flow-rail {
            position: relative;
        }

        .flow-rail::before {
            content: "";
            position: absolute;
            top: 28px;
            left: 8%;
            right: 8%;
            height: 2px;
            background: repeating-linear-gradient(90deg, var(--paper-line) 0 8px, transparent 8px 14px);
        }

        .flow-step {
            position: relative;
            text-align: center;
        }

        .flow-number {
            width: 58px;
            height: 58px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 18px;
            border-radius: 16px;
            background: white;
            border: 2px solid var(--paper-line);
            font-family: 'JetBrains Mono', monospace;
            font-weight: 700;
            font-size: 15px;
            color: var(--ink);
            position: relative;
            z-index: 1;
        }

        .flow-number.on-teal   { border-color: var(--signal); color: var(--signal-dark); background: var(--signal-tint); }
        .flow-number.on-amber  { border-color: var(--amber);  color: var(--amber-dark);  background: var(--amber-tint); }
        .flow-number.on-green  { border-color: var(--green);  color: var(--green);       background: var(--green-tint); }


        /* =====================================================
           CTA
        ===================================================== */

        .cta-section {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, var(--ink), var(--ink-2));
        }

        .cta-blob {
            position: absolute;
            bottom: -80px;
            left: -60px;
            width: 280px;
            height: 280px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(245,165,36,.24), transparent 70%);
            pointer-events: none;
        }

        .cta-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 30px;
            font-weight: 700;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        footer {
            background: var(--ink);
        }

        .footer-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 14px;
            font-weight: 700;
        }

        .footer-text,
        .footer-link {
            color: rgba(255,255,255,.62);
            font-size: 12.5px;
            line-height: 2;
        }

        .footer-link {
            display: block;
            transition: .2s ease;
        }

        .footer-link:hover {
            color: white;
        }

        footer hr {
            border-color: rgba(255,255,255,.12);
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 991px) {

            .navbar-collapse { padding: 15px 0 5px; }
            .nav-link { padding: 10px 0 !important; }
            .nav-link::after { display: none; }
            .navbar-actions { margin-top: 12px; }

            .btn-admin, .btn-visitor {
                display: flex;
                justify-content: center;
                width: 100%;
            }

            .hero { height: 720px; }
            .flow-rail::before { display: none; }
        }

        @media (max-width: 576px) {

            .logo-navbar { width: 40px; height: 40px; }
            .brand-title { font-size: 13px; }
            .brand-subtitle { font-size: 8px; }

            .hero { height: 740px; }
            .hero-content { padding: 0 20px; }
            .hero h1 { font-size: 36px; letter-spacing: -1px; }
            .hero-description { font-size: 14px; line-height: 1.7; }
            .hero-buttons { display: block; }
            .hero-buttons a { width: 100%; margin-bottom: 10px; }

            .ticker-item { font-size: 11px; padding: 12px 0; }

            .section-padding { padding: 64px 0; }
            .feature-card { padding: 25px; }
            .cta-title { font-size: 23px; }
            .qr-stage { width: 230px; height: 230px; }
        }

    </style>
</head>


<body>


<!-- ========================================================= -->
<!-- NAVBAR -->
<!-- ========================================================= -->

<div class="navbar-topline sticky-top"></div>

<nav class="navbar navbar-expand-lg navbar-custom sticky-top">
    <div class="container py-2">

        <a class="navbar-brand d-flex align-items-center" href="/tamu">
            <img src="{{ asset('images/logo-diskominfosan.png') }}" alt="Logo DISKOMINFOSAN" class="logo-navbar me-2">
            <div class="brand-wrapper">
                <div class="brand-title">DISKOMINFOSAN</div>
                <div class="brand-subtitle">ACEH TAMIANG</div>
            </div>
        </a>

        <button class="navbar-toggler border-0 shadow-none" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarMenu"
                aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list fs-2 text-primary"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item"><a class="nav-link" href="/tamu">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="#scan-qr">Scan QR</a></li>
                <li class="nav-item"><a class="nav-link" href="#tentang">Tentang Kami</a></li>
                <li class="nav-item"><a class="nav-link" href="#cara">Cara Pengisian</a></li>

                <li class="nav-item ms-lg-2 navbar-actions">
                    <div class="d-flex flex-column flex-lg-row gap-2">
                        <a href="/login" class="btn-admin">
                            <i class="bi bi-shield-lock"></i> Login Admin
                        </a>
                        <a href="/tamu/form" class="btn-visitor">
                            <i class="bi bi-person-plus me-1"></i> Isi Buku Tamu
                        </a>
                    </div>
                </li>

            </ul>
        </div>

    </div>
</nav>



<!-- ========================================================= -->
<!-- HERO -->
<!-- ========================================================= -->

<section class="hero">

    <div id="heroSlider" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner">

            <div class="carousel-item active">
                <img src="{{ asset('images/kantordiskominfo.png') }}" class="foto-slider" alt="Kantor DISKOMINFOSAN Aceh Tamiang">
            </div>

            <div class="carousel-item">
    <img src="{{ asset('images/opd.jpeg') }}"
    class="foto-slider"
    alt="Interior kantor">
</div>


<div class="carousel-item">
    <img src="{{ asset('images/kantordiskominfo.png') }}"
    class="foto-slider"
    alt="Ruang kantor">
</div>

        </div>
    </div>

    <div class="hero-overlay"></div>

    <div class="hero-content">
        <div class="container">
            <div class="col-lg-9">

                <span class="hero-badge">
                    <span class="ping-dot"></span>
                     BUKU-TAMU-DIGITAL · AKTIF
                </span>

                <h1 class="mb-4">
                    Selamat Datang di
                    <br>
                    <span class="highlight">DISKOMINFOSAN</span>
                    <br>
                    Aceh Tamiang
                </h1>

                <p class="hero-description mb-4">
                    Dinas Komunikasi, Informatika, Persandian dan
                    Statistik Kabupaten Aceh Tamiang. Silakan lakukan
                    registrasi kunjungan Anda melalui Buku Tamu Digital.
                </p>

                <div class="hero-buttons">
                    <a href="/tamu/form" class="btn-main">
                        <i class="bi bi-pencil-square me-2"></i> Isi Buku Tamu <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                    <a href="#scan-qr" class="btn-ghost-light">
                        <i class="bi bi-qr-code me-2"></i> Scan QR Code
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="hero-ticker">
        <div class="container">
            <div class="row g-0">

                <div class="col-4">
                    <div class="ticker-item">
                        <i class="bi bi-clock-fill"></i>
                        <span>Layanan: Senin&ndash;Jumat, 08.00&ndash;16.00 WIB</span>
                    </div>
                </div>

                <div class="col-4 d-flex">
                    <div class="ticker-divider d-none d-md-block"></div>
                    <div class="ticker-item">
                        <i class="bi bi-phone-fill"></i>
                        <span>Registrasi cukup lewat smartphone</span>
                    </div>
                </div>

                <div class="col-4 d-flex">
                    <div class="ticker-divider d-none d-md-block"></div>
                    <div class="ticker-item">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>Kabupaten Aceh Tamiang, Aceh</span>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>



<!-- ========================================================= -->
<!-- SCAN QR CODE -->
<!-- ========================================================= -->

<section id="scan-qr" class="section-padding bg-panel position-relative overflow-hidden">

    <div class="container position-relative" style="z-index:1;">

        <div class="row align-items-center g-5">

            <!-- QR VISUAL -->

            <div class="col-lg-5 order-lg-2 text-center reveal">

                <div class="qr-stage">
                    <div class="qr-radar"></div>
                    <div class="qr-radar delay"></div>

                    <div class="qr-frame">
                        <div class="qr-corner tl"></div>
                        <div class="qr-corner tr"></div>
                        <div class="qr-corner bl"></div>
                        <div class="qr-corner br"></div>
                        <div class="qr-scanline"></div>

                        <img
                            src="https://api.qrserver.com/v1/create-qr-code/?size=240x240&color=0b1e33&bgcolor=ffffff&data={{ urlencode(url('/tamu/form')) }}"
                            alt="QR Code Buku Tamu Digital DISKOMINFOSAN Aceh Tamiang">
                    </div>
                </div>

                <div class="mt-4">
                    <span class="qr-live-badge">
                        <span class="dot"></span>
                        LIVE &middot; TANPA LOGIN
                    </span>
                </div>

            </div>


            <!-- TEXT + STEPS -->

            <div class="col-lg-7 order-lg-1 reveal">

                <span class="mono-tag section-eyebrow">
                    <span class="bar"></span> SCAN &amp; DAFTAR
                </span>

                <h2 class="section-title mt-3 mb-3">
                    Scan QR Code untuk<br>Isi Buku Tamu
                </h2>

                <p class="text-muted mb-4" style="font-size:14px; line-height:1.85;">
                    Arahkan kamera smartphone Anda ke kode QR di samping,
                    atau gunakan QR Code yang tersedia di meja resepsionis
                    kantor DISKOMINFOSAN Aceh Tamiang untuk membuka form
                    registrasi kunjungan.
                </p>

                <div class="qr-steps mb-4">

                    <div class="qr-step">
                        <div class="qr-step-num active">01</div>
                        <div class="fw-bold small mb-1">Buka Kamera</div>
                        <div class="text-muted small">Gunakan aplikasi kamera atau pemindai QR di HP Anda.</div>
                    </div>

                    <div class="qr-step">
                        <div class="qr-step-num">02</div>
                        <div class="fw-bold small mb-1">Arahkan ke QR Code</div>
                        <div class="text-muted small">Posisikan kode dalam bingkai hingga terbaca otomatis.</div>
                    </div>

                    <div class="qr-step">
                        <div class="qr-step-num">03</div>
                        <div class="fw-bold small mb-1">Isi Form Kunjungan</div>
                        <div class="text-muted small">Lengkapi data diri dan keperluan kunjungan Anda.</div>
                    </div>

                </div>

                <div class="d-flex gap-3 flex-wrap">
                    <a href="/tamu/form" class="btn-main">
                        <i class="bi bi-pencil-square me-2"></i> Isi Manual Tanpa Scan
                    </a>
                    <a
                        href="https://api.qrserver.com/v1/create-qr-code/?size=500x500&color=0b1e33&bgcolor=ffffff&data={{ urlencode(url('/tamu/form')) }}"
                        download="qr-buku-tamu-diskominfosan.png"
                        class="btn-ghost-dark">
                        <i class="bi bi-download me-2"></i> Unduh QR Code
                    </a>
                </div>

            </div>

        </div>

    </div>

</section>



<!-- ========================================================= -->
<!-- TENTANG KAMI -->
<!-- ========================================================= -->

<section id="tentang" class="section-padding position-relative overflow-hidden">

    <div class="about-blob" style="width:340px;height:340px;top:-110px;right:-110px;background:radial-gradient(circle,var(--signal-tint),transparent 70%);"></div>
    <div class="about-blob" style="width:280px;height:280px;bottom:-90px;left:-90px;background:radial-gradient(circle,var(--amber-tint),transparent 70%);"></div>

    <div class="container position-relative" style="z-index:1;">

        <div class="row g-5 align-items-start">

            <div class="col-lg-5 reveal">

                <span class="mono-tag section-eyebrow">
                    <span class="bar"></span> TENTANG KAMI
                </span>

                <h2 class="section-title mt-3 mb-3">
                    Dinas Komunikasi, Informatika,
                    Persandian dan Statistik
                </h2>

                <p class="text-muted mb-3" style="font-size:14px; line-height:1.85;">
                    DISKOMINFOSAN Kabupaten Aceh Tamiang adalah unsur
                    pelaksana urusan pemerintahan di bidang komunikasi
                    dan informatika, persandian, dan statistik yang
                    dipimpin oleh seorang Kepala Dinas.
                </p>

                <p class="text-muted mb-4" style="font-size:14px; line-height:1.85;">
                    Kami berkomitmen untuk mewujudkan tata kelola
                    pemerintahan yang transparan, akuntabel, dan
                    berbasis teknologi informasi demi pelayanan
                    publik yang lebih baik.
                </p>

                <a href="/tamu/form" class="btn-main">
                    <i class="bi bi-pencil-square me-2"></i> Isi Buku Tamu <i class="bi bi-arrow-right ms-2"></i>
                </a>

            </div>

            <div class="col-lg-7 reveal">

                <div class="stat-panel">
                    <div class="row g-0">

                        <div class="col-6 col-md-3 stat-cell">
                            <div class="stat-icon teal"><i class="bi bi-calendar3"></i></div>
                            <div class="stat-number">2016</div>
                            <div class="stat-label">Tahun Pembentukan</div>
                        </div>

                        <div class="col-6 col-md-3 stat-cell">
                            <div class="stat-icon amber"><i class="bi bi-people-fill"></i></div>
                            <div class="stat-number">40+</div>
                            <div class="stat-label">Pegawai</div>
                        </div>

                        <div class="col-6 col-md-3 stat-cell">
                            <div class="stat-icon green"><i class="bi bi-laptop"></i></div>
                            <div class="stat-number">3</div>
                            <div class="stat-label">Layanan Utama Digital</div>
                        </div>

                        <div class="col-6 col-md-3 stat-cell">
                            <div class="stat-icon purple"><i class="bi bi-geo-alt-fill"></i></div>
                            <div class="stat-number">12</div>
                            <div class="stat-label">Kecamatan</div>
                        </div>

                    </div>
                </div>

                <div class="row g-3 mt-1">

                    <div class="col-md-4">
                        <div class="d-flex align-items-start gap-2">
                            <i class="bi bi-broadcast text-primary mt-1"></i>
                            <div class="small text-muted">Komunikasi &amp; Informatika publik</div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="d-flex align-items-start gap-2">
                            <i class="bi bi-shield-lock-fill text-primary mt-1"></i>
                            <div class="small text-muted">Persandian &amp; keamanan data</div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="d-flex align-items-start gap-2">
                            <i class="bi bi-bar-chart-fill text-primary mt-1"></i>
                            <div class="small text-muted">Statistik sektoral daerah</div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- ========================================================= -->
<!-- MANFAAT BUKU TAMU DIGITAL -->
<!-- ========================================================= -->

<section id="manfaat" class="section-padding bg-panel">

    <div class="container">

        <div class="text-center mb-5 reveal">
            <span class="mono-tag section-eyebrow">
                <span class="bar"></span> BUKU TAMU DIGITAL
            </span>
            <h2 class="section-title mt-3">Registrasi Kunjungan Lebih Mudah</h2>
            <p class="section-description mt-3">
                Buku Tamu Digital DISKOMINFOSAN Aceh Tamiang membantu
                proses pencatatan kunjungan menjadi lebih cepat,
                praktis, dan terorganisir.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-md-4 reveal">
                <div class="feature-card">
                    <span class="feature-tag">FITUR / 01</span>
                    <div class="feature-icon"><i class="bi bi-lightning-charge-fill"></i></div>
                    <h5 class="fw-bold mb-3">Cepat</h5>
                    <p class="text-muted mb-0">
                        Tamu dapat melakukan registrasi tanpa harus
                        mengisi buku tamu secara manual.
                    </p>
                </div>
            </div>

            <div class="col-md-4 reveal">
                <div class="feature-card tint-amber">
                    <span class="feature-tag">FITUR / 02</span>
                    <div class="feature-icon amber"><i class="bi bi-phone-fill"></i></div>
                    <h5 class="fw-bold mb-3">Praktis</h5>
                    <p class="text-muted mb-0">
                        Cukup scan QR Code menggunakan smartphone
                        kemudian isi data kunjungan.
                    </p>
                </div>
            </div>

            <div class="col-md-4 reveal">
                <div class="feature-card tint-green">
                    <span class="feature-tag">FITUR / 03</span>
                    <div class="feature-icon green"><i class="bi bi-database-check"></i></div>
                    <h5 class="fw-bold mb-3">Terorganisir</h5>
                    <p class="text-muted mb-0">
                        Data kunjungan tersimpan secara digital
                        sehingga lebih mudah dikelola oleh petugas.
                    </p>
                </div>
            </div>

        </div>

    </div>

</section>



<!-- ========================================================= -->
<!-- CARA PENGISIAN -->
<!-- ========================================================= -->

<section id="cara" class="section-padding">

    <div class="container">

        <div class="text-center mb-5 reveal">
            <span class="mono-tag section-eyebrow">
                <span class="bar"></span> MUDAH DAN CEPAT
            </span>
            <h2 class="section-title mt-3">Cara Mengisi Buku Tamu</h2>
            <p class="text-muted">Hanya membutuhkan tiga langkah sederhana.</p>
        </div>

        <div class="row g-5 flow-rail reveal">

            <div class="col-md-4 flow-step">
                <div class="flow-number on-teal">01</div>
                <h5 class="fw-bold">Scan QR Code</h5>
                <p class="text-muted small">
                    Scan QR Code Buku Tamu Digital yang tersedia
                    di area resepsionis.
                </p>
            </div>

            <div class="col-md-4 flow-step">
                <div class="flow-number on-amber">02</div>
                <h5 class="fw-bold">Isi Data Kunjungan</h5>
                <p class="text-muted small">
                    Masukkan data diri dan keperluan kunjungan Anda.
                </p>
            </div>

            <div class="col-md-4 flow-step">
                <div class="flow-number on-green">03</div>
                <h5 class="fw-bold">Registrasi Selesai</h5>
                <p class="text-muted small">
                    Data kunjungan tersimpan secara otomatis
                    ke dalam sistem.
                </p>
            </div>

        </div>

    </div>

</section>



<!-- ========================================================= -->
<!-- CTA -->
<!-- ========================================================= -->

<section class="cta-section text-white">

    <div class="cta-blob"></div>

    <div class="container py-5 position-relative" style="z-index:1;">
        <div class="row align-items-center">

            <div class="col-lg-8">
                <div class="cta-title">Siap melakukan registrasi kunjungan?</div>
                <p class="mb-0 mt-2 opacity-75 small">
                    Silakan isi Buku Tamu Digital sebelum memulai kunjungan Anda.
                </p>
            </div>

            <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                <a href="/tamu/form" class="btn-main">
                    <i class="bi bi-person-plus me-2"></i> Isi Buku Tamu
                </a>
            </div>

        </div>
    </div>

</section>



<!-- ========================================================= -->
<!-- FOOTER -->
<!-- ========================================================= -->

<footer>

    <div class="container py-5">

        <div class="row g-4">

            <div class="col-lg-4">
                <div class="footer-title text-white mb-3">DISKOMINFOSAN ACEH TAMIANG</div>
                <p class="footer-text">
                    Dinas Komunikasi, Informatika, Persandian dan
                    Statistik Kabupaten Aceh Tamiang.
                </p>
            </div>

            <div class="col-lg-3 col-6">
                <div class="footer-title text-white mb-3">Tautan</div>
                <a href="/tamu" class="footer-link">Beranda</a>
                <a href="#tentang" class="footer-link">Tentang Kami</a>
                <a href="#cara" class="footer-link">Cara Pengisian</a>
                <a href="/tamu/form" class="footer-link">Isi Buku Tamu</a>
            </div>

            <div class="col-lg-2 col-6">
                <div class="footer-title text-white mb-3">Layanan</div>
                <span class="footer-link">Buku Tamu Digital</span>
                <span class="footer-link">Persandian</span>
                <span class="footer-link">Statistik Daerah</span>
            </div>

            <div class="col-lg-3">
                <div class="footer-title text-white mb-3">Kontak</div>
                <div class="footer-text">
                    <i class="bi bi-geo-alt-fill me-2"></i>Kabupaten Aceh Tamiang, Aceh<br>
                    <i class="bi bi-clock-fill me-2"></i>Senin&ndash;Jumat, 08.00&ndash;16.00 WIB
                </div>
            </div>

        </div>

        <hr class="my-4">

        <div class="text-center">
            <small class="text-white-50">
                &copy; {{ date('Y') }} DISKOMINFOSAN Aceh Tamiang. Semua hak dilindungi.
            </small>
        </div>

    </div>

</footer>



<!-- ========================================================= -->
<!-- BOOTSTRAP JS -->
<!-- ========================================================= -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Scroll-reveal for elements marked with .reveal
    document.addEventListener('DOMContentLoaded', function () {
        var revealEls = document.querySelectorAll('.reveal');

        if (!('IntersectionObserver' in window)) {
            revealEls.forEach(function (el) { el.classList.add('is-visible'); });
            return;
        }

        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15 });

        revealEls.forEach(function (el) { observer.observe(el); });
    });
</script>

</body>
</html>
