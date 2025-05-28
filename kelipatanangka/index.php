<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelipatan</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .canvas {
            background-color: #f0f0f0;
            width: 700px;
            margin: 30px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #999;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #e0e0e0;
        }
        .highlight {
            background-color: #b6fcb6;
        }
        .form-input {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="canvas">
        <form method="POST" class="form-input">
            Masukan Kelipatan : <input type="number" name="kelipatan">
            <input type="submit" value="Kirim">
        </form>
        <h2>Kelipatan dari <?php echo isset($_POST['kelipatan']) && $_POST['kelipatan'] !== "" && $_POST['kelipatan'] > 0 ? $_POST['kelipatan'] : "1"; ?></h2>

        <table>
            <tr>
                <th>Angka</th>
                <th>Kelipatan</th>
            </tr>
            <?php
            $kelipatan = 1;
            if (isset($_POST['kelipatan']) && $_POST['kelipatan'] !== "") {
                if ($_POST['kelipatan'] <= 0) {
                    echo "<script>alert('Masukkan angka positif!');</script>";
                } else {
                    $kelipatan = (int)$_POST['kelipatan'];
                }
            }

            for ($i = 1; $i <= 40; $i++) {
                echo "<tr><td>$i</td>";
                if (isset($_POST['kelipatan']) && $_POST['kelipatan'] !== "" && $_POST['kelipatan'] > 0) {
                    if ($i % $kelipatan === 0) {
                        echo "<td class='highlight'>$i (kelipatan dari $kelipatan)</td>";
                    } else {
                        echo "<td>$i</td>";
                    }
                } else {
                    echo "<td class='highlight'>$i (kelipatan dari 1)</td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
