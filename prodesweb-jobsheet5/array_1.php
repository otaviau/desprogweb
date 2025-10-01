<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h2> Array Terindex</h2>
    <?php
    $ListDosen=["Elok Nur Hamdana", "Unggul Pamenang", "Bagas Nugraha"];

    for ($i = 0; $i < count($ListDosen); $i++) {
        echo $ListDosen[$i] . "<br>";
    }
    ?>    
</body>
</html>