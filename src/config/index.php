<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Statistiken</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h1 class="mt-5 pb-2 border-bottom">FAQ Statistiken</h1>
    <small>Copyright: <?php echo(date('Y')) ?> by Jan Harms</small>
    <div class="row mt-4">
        <div class="col">
            <p>Auf dieser Seite können die Abrufzahlen von FAQ-Links aus verschiedenen Quellen eingesehen werden.</p>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <canvas id="views"></canvas>
        </div>
    </div>
</div>

<!-- Einbindung von Bootstrap JS (optional, aber benötigt für bestimmte Funktionen) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Einbindung von Chart.js für das Diagramm -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    async function getData() {
        const response = await fetch('api.php');
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return await response.json();
    }

    const dataFetch = getData();
    dataFetch.then(data => {
        const views = data['views'];
        const descriptions = data['descriptions'];
        const ctx = document.getElementById('views').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: descriptions,
                datasets: [{
                    label: 'Abrufzahl',
                    data: views,
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
    }).catch(error => {
        console.error(error);
    });
</script>
</body>
</html>
