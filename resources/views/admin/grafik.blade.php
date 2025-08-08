<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Grafik Donasi</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Grafik Donasi Bulanan</h1>
    <canvas id="donasiChart" width="400" height="200"></canvas>

    <script>
        const ctx = document.getElementById('donasiChart').getContext('2d');
        const donasiChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Total Donasi (Rp)',
                    data: @json($data),
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
