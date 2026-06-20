<x-app-layout>

    <div class="dashboard-page">

        <!-- HERO -->
        <section class="dashboard-hero">

            <div>

                <span class="hero-badge">
                    Realtime Monitoring System
                </span>

                <h1 class="hero-title">
                    Air Quality Dashboard
                </h1>

                <p class="hero-subtitle">
                    Monitoring kualitas udara berbasis ESP32 secara realtime.
                </p>

            </div>

            <div class="hero-status">

                <div class="status-dot"></div>

                Online

            </div>

        </section>

        <!-- SENSOR CARDS -->
        <section class="metrics-grid">

            <div class="metric-card pm">

                <div class="metric-label">
                    PM2.5
                </div>

                <h2 id="pm25">
                    -
                </h2>

                <span>
                    μg/m³
                </span>

            </div>

            <div class="metric-card co">

                <div class="metric-label">
                    CO
                </div>

                <h2 id="co">
                    -
                </h2>

                <span>
                    ppm
                </span>

            </div>

            <div class="metric-card ozone">

                <div class="metric-label">
                    Ozone
                </div>

                <h2 id="ozone">
                    -
                </h2>

                <span>
                    ppb
                </span>

            </div>

            <div class="metric-card temp">

                <div class="metric-label">
                    Temperature
                </div>

                <h2 id="temperature">
                    -
                </h2>

                <span>
                    °C
                </span>

            </div>

            <div class="metric-card battery">

                <div class="metric-label">
                    Battery
                </div>

                <h2 id="battery">
                    -
                </h2>

                <div class="battery-progress">

                    <div
                        id="battery-fill"
                        class="battery-progress-fill">
                    </div>

                </div>

            </div>

        </section>

        <!-- STATUS -->
        <section class="status-grid">

            <div
                id="status-card"
                class="dashboard-card">

                <div class="card-title">

                    Air Quality Status

                </div>

                <h2 id="air-status">

                    Good

                </h2>

            </div>

            <div class="dashboard-card">

                <div class="card-title">

                    Telegram Bot

                </div>

                <div
                    id="telegram-status"
                    class="telegram-online">

                    Connected

                </div>

            </div>

        </section>

        <!-- ALERT -->
        <section
            id="telegram-alert"
            class="alert-card">

            <div class="alert-icon">
                📡
            </div>

            <div>

                <h3>
                    Monitoring Active
                </h3>

                <p id="alert-message">
                    Belum ada alert berbahaya
                </p>

            </div>

        </section>

        <!-- FILTER -->
        <section class="filter-card">

            <div class="filter-group">

                <label>
                    Start Date
                </label>

                <input
                    type="date"
                    id="start_date">

            </div>

            <div class="filter-group">

                <label>
                    End Date
                </label>

                <input
                    type="date"
                    id="end_date">

            </div>

            <button
                id="filterBtn"
                class="btn btn-primary">

                Filter Data

            </button>

            <a
                href="#"
                id="excelExport"
                class="btn btn-outline">

                Export Excel

            </a>

            <a
                href="#"
                id="pdfExport"
                class="btn btn-outline">

                Export PDF

            </a>

        </section>

        <!-- CHART -->
        <section class="dashboard-card">

            <div class="card-title">

                Realtime Sensor Analytics

            </div>

            <div class="chart-wrapper">

                <canvas id="airChart"></canvas>

            </div>

        </section>

        <!-- HISTORY -->
        <section class="bottom-grid">

            <div class="dashboard-card">

                <div class="card-title">

                    Data History

                </div>

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th>PM2.5</th>
                                <th>CO</th>
                                <th>Ozone</th>
                                <th>Temp</th>
                                <th>Status</th>
                                <th>Time</th>

                            </tr>

                        </thead>

                        <tbody id="historyTable">

                        </tbody>

                    </table>

                </div>

            </div>

            <div class="dashboard-card">

                <div class="card-title">

                    Alert History

                </div>

                <div
                    id="alert-history"
                    class="alert-history-list">

                    <div class="empty-alert">

                        No alerts yet

                    </div>

                </div>

            </div>

        </section>

    </div>

</x-app-layout>
