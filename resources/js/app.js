import './bootstrap';

import Alpine from 'alpinejs';
import Chart from 'chart.js/auto';

window.Alpine = Alpine;

Alpine.start();

// ======================================================
// GLOBAL
// ======================================================

let chart;

let lastAlertId = null;

let lastStatus = '';

// ======================================================
// INIT CHART
// ======================================================

const ctx = document.getElementById('airChart');

if (ctx) {

    chart = new Chart(ctx, {

        type: 'line',

        data: {

            labels: [],

            datasets: [

                {
                    label: 'PM2.5',
                    data: [],
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59,130,246,0.1)',
                    borderWidth: 3,
                    pointRadius: 3,
                    pointHoverRadius: 5,
                    tension: 0.4,
                    fill: true
                },

                {
                    label: 'CO',
                    data: [],
                    borderColor: '#ef4444',
                    backgroundColor: 'rgba(239,68,68,0.1)',
                    borderWidth: 3,
                    pointRadius: 3,
                    pointHoverRadius: 5,
                    tension: 0.4,
                    fill: true
                },

                {
                    label: 'Ozon',
                    data: [],
                    borderColor: '#10b981',
                    backgroundColor: 'rgba(16,185,129,0.1)',
                    borderWidth: 3,
                    pointRadius: 3,
                    pointHoverRadius: 5,
                    tension: 0.4,
                    fill: true
                },

                {
                    label: 'Suhu',
                    data: [],
                    borderColor: '#f59e0b',
                    backgroundColor: 'rgba(245,158,11,0.1)',
                    borderWidth: 3,
                    pointRadius: 3,
                    pointHoverRadius: 5,
                    tension: 0.4,
                    fill: true
                }

            ]
        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            interaction: {

                mode: 'index',
                intersect: false
            },

            plugins: {

                legend: {

                    labels: {

                        color: '#0f172a',

                        font: {

                            size: 13,
                            weight: '600'
                        }
                    }
                }
            },

            scales: {

                x: {

                    ticks: {

                        color: '#334155'
                    },

                    grid: {

                        color: 'rgba(148,163,184,0.15)'
                    }
                },

                y: {

                    beginAtZero: true,

                    ticks: {

                        color: '#334155'
                    },

                    grid: {

                        color: 'rgba(148,163,184,0.15)'
                    }
                }
            }
        }
    });
}

// ======================================================
// FUZZY PM2.5
// ======================================================

function fuzzyPM25(pm25) {

    let baik = 0;
    let sedang = 0;
    let buruk = 0;

    if (pm25 <= 50) {

        baik = 1;

    } else if (pm25 > 50 && pm25 < 100) {

        baik = Math.max(
            0,
            (100 - pm25) / 50
        );
    }

    if (pm25 >= 50 && pm25 <= 100) {

        sedang = (pm25 - 50) / 50;

    } else if (pm25 > 100 && pm25 <= 150) {

        sedang = Math.max(
            0,
            (150 - pm25) / 50
        );
    }

    if (pm25 >= 100) {

        buruk = 1;
    }

    return {
        baik,
        sedang,
        buruk
    };
}

// ======================================================
// FUZZY CO
// ======================================================

function fuzzyCO(co) {

    let aman = 0;
    let sedang = 0;
    let bahaya = 0;

    if (co <= 25) {

        aman = 1;

    } else if (co > 25 && co < 50) {

        aman = Math.max(
            0,
            (50 - co) / 25
        );
    }

    if (co >= 25 && co <= 50) {

        sedang = (co - 25) / 25;

    } else if (co > 50 && co <= 75) {

        sedang = Math.max(
            0,
            (75 - co) / 25
        );
    }

    if (co >= 50) {

        bahaya = 1;
    }

    return {
        aman,
        sedang,
        bahaya
    };
}

// ======================================================
// FUZZY OZON
// ======================================================

function fuzzyOzone(ozone) {

    let rendah = 0;
    let sedang = 0;
    let tinggi = 0;

    if (ozone <= 25) {

        rendah = 1;

    } else if (ozone > 25 && ozone < 50) {

        rendah = Math.max(
            0,
            (50 - ozone) / 25
        );
    }

    if (ozone >= 25 && ozone <= 50) {

        sedang = (ozone - 25) / 25;

    } else if (ozone > 50 && ozone <= 75) {

        sedang = Math.max(
            0,
            (75 - ozone) / 25
        );
    }

    if (ozone >= 50) {

        tinggi = 1;
    }

    return {
        rendah,
        sedang,
        tinggi
    };
}

// ======================================================
// FUZZY MAMDANI
// ======================================================

function fuzzyMamdani(pm25, co, ozone) {

    const pm = fuzzyPM25(pm25);

    const gas = fuzzyCO(co);

    const oz = fuzzyOzone(ozone);

    const berbahaya = Math.max(

        pm.buruk,

        gas.bahaya,

        oz.tinggi,

        Math.min(pm.sedang, gas.sedang),

        Math.min(pm.sedang, oz.sedang),

        Math.min(gas.sedang, oz.sedang)
    );

    const waspada = Math.max(

        pm.sedang,

        gas.sedang,

        oz.sedang
    );

    const baik = Math.min(

        pm.baik,

        gas.aman,

        oz.rendah
    );

    const score = (

        (baik * 25) +
        (waspada * 65) +
        (berbahaya * 100)

    ) / (

        baik +
        waspada +
        berbahaya +
        0.0001
    );

    return {
        score
    };
}

// ======================================================
// UPDATE DASHBOARD
// ======================================================

async function updateDashboard() {

    try {

        const response =
            await fetch('/api/sensor/latest');

        const data =
            await response.json();

        if (!data) return;

        // SENSOR CARD

        setText('pm25', data.pm25 + ' µg/m³');

        setText('co', data.co + ' ppm');

        setText('ozone', data.ozone + ' ppb');

        setText('temperature', data.temperature + '°C');

        setText('battery', data.battery + '%');

        // BATTERY BAR

        const batteryFill =
            document.getElementById('battery-fill');

        if (batteryFill) {

            let batteryPercent =
                ((data.battery - 3.0) / 1.2) * 100;

            batteryPercent =
                Math.max(
                    0,
                    Math.min(100, batteryPercent)
                );

            batteryFill.style.width =
                batteryPercent + '%';

            if (batteryPercent <= 20) {

                batteryFill.style.background =
                    '#ef4444';

            } else if (batteryPercent <= 50) {

                batteryFill.style.background =
                    '#f59e0b';

            } else {

                batteryFill.style.background =
                    '#22c55e';
            }
        }

        // FUZZY SCORE

        const fuzzy =
            fuzzyMamdani(

                parseFloat(data.pm25),

                parseFloat(data.co),

                parseFloat(data.ozone)
            );

        setText(
            'fuzzy-score',
            fuzzy.score.toFixed(1)
        );

        // STATUS

        const status =
            data.status || 'aman';

        let statusClass = 'good';

        if (status === 'waspada') {

            statusClass = 'warning';

        } else if (status === 'bahaya') {

            statusClass = 'danger';
        }

        setText(
            'air-status',
            status.toUpperCase()
        );

        const statusCard =
            document.getElementById('status-card');

        if (statusCard) {

            statusCard.className =
                'status-card ' + statusClass;
        }

        // STATUS CHANGE

        if (
            status !== lastStatus &&
            lastStatus !== ''
        ) {

            showToast(
                '📡 Status berubah menjadi ' +
                status.toUpperCase()
            );
        }

        lastStatus = status;

        // UPDATE CHART

        updateChart(data);

    } catch (error) {

        console.log(
            'Dashboard Error:',
            error
        );
    }
}

// ======================================================
// UPDATE CHART
// ======================================================

function updateChart(data) {

    if (!chart) return;

    const time =
        new Date().toLocaleTimeString();

    chart.data.labels.push(time);

    chart.data.datasets[0]
        .data.push(Number(data.pm25));

    chart.data.datasets[1]
        .data.push(Number(data.co));

    chart.data.datasets[2]
        .data.push(Number(data.ozone));

    chart.data.datasets[3]
        .data.push(Number(data.temperature));

    if (chart.data.labels.length > 15) {

        chart.data.labels.shift();

        chart.data.datasets.forEach(dataset => {

            dataset.data.shift();
        });
    }

    chart.update();
}

// ======================================================
// LOAD HISTORY
// ======================================================

async function loadHistory() {

    try {

        const start =
            document.getElementById('start_date')?.value;

        const end =
            document.getElementById('end_date')?.value;

        let url =
            '/api/sensor/history';

        if (start && end) {

            url +=
                `?start_date=${start}&end_date=${end}`;
        }

        const response =
            await fetch(url);

        const datas =
            await response.json();

        let html = '';

        datas.forEach(data => {

            html += `

                <tr>

                    <td>${data.pm25}</td>

                    <td>${data.co}</td>

                    <td>${data.ozone}</td>

                    <td>${data.temperature}°C</td>

                    <td>${data.status}</td>

                    <td>

                        ${new Date(data.created_at)
                            .toLocaleTimeString()}

                    </td>

                </tr>
            `;
        });

        setHTML('historyTable', html);

    } catch (error) {

        console.log(
            'History Error:',
            error
        );
    }
}

// ======================================================
// LOAD ALERT
// ======================================================

async function loadAlert() {

    try {

        const response =
            await fetch('/api/alerts/latest');

        const alert =
            await response.json();

        if (!alert) return;

        const alertBox =
            document.getElementById('telegram-alert');

        const alertMessage =
            document.getElementById('alert-message');

        const telegramStatus =
            document.getElementById('telegram-status');

        if (telegramStatus) {

            if (alert.telegram_sent) {

                telegramStatus.innerHTML =
                    '🟢 Connected';

                telegramStatus.className =
                    'telegram-status online';

            } else {

                telegramStatus.innerHTML =
                    '🔴 Failed';

                telegramStatus.className =
                    'telegram-status offline';
            }
        }

        if (alertMessage) {

            alertMessage.innerHTML =
                alert.message;
        }

        if (alertBox) {

            if (
                alert.type === 'bahaya' ||
                alert.type === 'danger'
            ) {

                alertBox.className =
                    'telegram-alert danger';

            } else {

                alertBox.className =
                    'telegram-alert success';
            }
        }

        if (
            alert.id &&
            lastAlertId !== alert.id
        ) {

            lastAlertId = alert.id;

            showToast(
                '🚨 Alert Telegram berhasil dikirim'
            );

            addAlertHistory(alert);

            playAlarmSound();
        }

    } catch (error) {

        console.log(
            'Alert Error:',
            error
        );
    }
}

// ======================================================
// ALERT HISTORY
// ======================================================

function addAlertHistory(alert) {

    const history =
        document.getElementById('alert-history');

    if (!history) return;

    // HAPUS TEXT EMPTY
    const empty =
        history.querySelector('.empty-alert');

    if (empty) {
        empty.remove();
    }

    const item =
        document.createElement('div');

    item.className =
        'alert-history-item';

    item.innerHTML = `

        <div class="alert-history-top">

            <span class="alert-badge">

                🚨 ${alert.type.toUpperCase()}

            </span>

            <span class="alert-time">

                ${new Date(alert.created_at)
                    .toLocaleTimeString()}

            </span>

        </div>

        <div class="alert-history-message">

            ${alert.message}

        </div>
    `;

    history.prepend(item);

    while (history.children.length > 10) {

        history.removeChild(history.lastChild);
    }
}

// ======================================================
// TOAST
// ======================================================

function showToast(message) {

    const toast =
        document.createElement('div');

    toast.className =
        'toast-notification';

    toast.innerHTML = message;

    document.body.appendChild(toast);

    setTimeout(() => {

        toast.classList.add('show');

    }, 100);

    setTimeout(() => {

        toast.classList.remove('show');

        setTimeout(() => {

            toast.remove();

        }, 300);

    }, 4000);
}

// ======================================================
// SOUND ALERT
// ======================================================

function playAlarmSound() {

    const audio =
        new Audio('/sounds/alert.mp3');

    audio.play();
}

// ======================================================
// HELPERS
// ======================================================

function setText(id, value) {

    const element =
        document.getElementById(id);

    if (element) {

        element.innerText = value;
    }
}

function setHTML(id, value) {

    const element =
        document.getElementById(id);

    if (element) {

        element.innerHTML = value;
    }
}

// ======================================================
// FILTER
// ======================================================

const filterBtn =
    document.getElementById('filterBtn');

if (filterBtn) {

    filterBtn.addEventListener('click', () => {

        loadHistory();

        showToast(
            '🔍 Filter data diterapkan'
        );
    });
}

// ======================================================
// EXPORT
// ======================================================

const excelExport =
    document.getElementById('excelExport');

const pdfExport =
    document.getElementById('pdfExport');

function getFilterQuery() {

    const start =
        document.getElementById('start_date')?.value;

    const end =
        document.getElementById('end_date')?.value;

    return `?start_date=${start}&end_date=${end}`;
}

if (excelExport) {

    excelExport.addEventListener('click', () => {

        window.location.href =
            '/export/excel' +
            getFilterQuery();
    });
}

if (pdfExport) {

    pdfExport.addEventListener('click', () => {

        window.location.href =
            '/export/pdf' +
            getFilterQuery();
    });
}

// ======================================================
// AUTO LOAD
// ======================================================

updateDashboard();

loadHistory();

loadAlert();

setInterval(() => {

    updateDashboard();

    loadHistory();

    loadAlert();

}, 3000);