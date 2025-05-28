<?php
$labels = ["January", "February", "March", "April", "May"];
$data = [10, 20, 15, 25, 30];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grafik Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <input type="text" id="labelInput" placeholder="Label">
            <input type="number" id="valueInput" placeholder="Value">
            <button onclick="addData()">Add Data</button>
        </div>
        <canvas id="chartCanvas" width="700" height="400"></canvas>
    </div>

    <script>
        let labels = <?php echo json_encode($labels); ?>;
        let data = <?php echo json_encode($data); ?>;
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="script.js"></script>
</body>
</html>
