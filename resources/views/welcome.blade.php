<x-guest-layout>

<!-- NAVBAR -->
<nav class="landing-navbar">

    <div class="landing-container">

        <a href="/" class="landing-logo">

            <div class="landing-logo-icon">
                🌍
            </div>

            <div>

                <h1 class="landing-logo-title">
                    Air Monitoring
                </h1>

                <p class="landing-logo-subtitle">
                    Smart Environment System
                </p>

            </div>

        </a>

        <div class="landing-menu">

            @auth

                <a href="{{ route('login') }}"
                     class="btn btn-primary">
                    Open Dashboard
                </a>

            @else

                <a
                    href="{{ route('login') }}"
                    class="btn btn-secondary"
                >
                    Sign In
                </a>

                <a
                    href="{{ route('register') }}"
                    class="btn btn-primary"
                >
                    Get Started
                </a>

            @endauth

        </div>

    </div>

</nav>

<!-- HERO -->
<section class="hero-section">

    <div class="landing-container hero-grid">

        <!-- LEFT -->
        <div class="hero-content">

            <span class="hero-badge">

                Realtime IoT Monitoring

            </span>

            <h1 class="hero-title">

                Monitor Air Quality
                <span>
                    In Real Time
                </span>

            </h1>

            <p class="hero-description">

                Platform monitoring kualitas udara berbasis ESP32
                yang memungkinkan pemantauan PM2.5, Carbon Monoxide,
                Ozone, Temperatur, dan status perangkat secara realtime
                melalui dashboard interaktif.

            </p>

            <div class="hero-actions">

                <a href="{{ route('login') }}"
                    class="btn btn-primary">
                    Open Dashboard
                </a>

                <a href="{{ route('register') }}"
                    class="btn btn-outline">
                    Create Account
                </a>

            </div>

            <!-- STATS -->
            <div class="hero-stats">

                <div class="stat-item">

                    <h3>PM2.5</h3>

                    <p>Realtime Monitoring</p>

                </div>

                <div class="stat-item">

                    <h3>CO</h3>

                    <p>Gas Detection</p>

                </div>

                <div class="stat-item">

                    <h3>Ozone</h3>

                    <p>Air Analysis</p>

                </div>

                <div class="stat-item">

                    <h3>24/7</h3>

                    <p>Online System</p>

                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="hero-preview">

            <div class="preview-card">

                <div class="preview-header">

                    <div>

                        <h3>
                            Air Quality Dashboard
                        </h3>

                        <p>
                            Live Monitoring
                        </p>

                    </div>

                    <div class="status-live">

                        <span></span>

                        Online

                    </div>

                </div>

                <div class="preview-grid">

                    <div class="preview-sensor">

                        <small>PM2.5</small>

                        <h2>12.5</h2>

                        <span>µg/m³</span>

                    </div>

                    <div class="preview-sensor">

                        <small>CO</small>

                        <h2>8.1</h2>

                        <span>ppm</span>

                    </div>

                    <div class="preview-sensor">

                        <small>Ozone</small>

                        <h2>16.4</h2>

                        <span>ppb</span>

                    </div>

                    <div class="preview-sensor">

                        <small>Temp</small>

                        <h2>28°C</h2>

                        <span>Normal</span>

                    </div>

                </div>

                <div class="preview-battery">

                    <div class="battery-top">

                        <span>Battery Status</span>

                        <strong>86%</strong>

                    </div>

                    <div class="battery-bar">

                        <div
                            class="battery-fill"
                            style="width:86%"
                        ></div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- FEATURES -->
<section class="feature-section">

    <div class="landing-container">

        <div class="section-header">

            <h2>
                Monitoring Features
            </h2>

            <p>
                Sistem monitoring lingkungan berbasis IoT
            </p>

        </div>

        <div class="feature-grid">

            <div class="feature-card">

                <h3>PM2.5 Monitoring</h3>

                <p>
                    Pantau konsentrasi partikel udara secara realtime.
                </p>

            </div>

            <div class="feature-card">

                <h3>CO Detection</h3>

                <p>
                    Monitoring kadar Carbon Monoxide secara kontinu.
                </p>

            </div>

            <div class="feature-card">

                <h3>Ozone Analysis</h3>

                <p>
                    Pengukuran konsentrasi ozon lingkungan.
                </p>

            </div>

            <div class="feature-card">

                <h3>Telegram Alert</h3>

                <p>
                    Notifikasi otomatis saat kondisi berbahaya.
                </p>

            </div>

        </div>

    </div>

</section>

</x-guest-layout>
