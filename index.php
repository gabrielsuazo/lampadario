<?php
try {
    require_once "./includes/dbh.inc.php";
    $query = "SELECT id, state FROM candles";
    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $pdo = null;
    $stmt = null;

} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lampadario Test</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <script src="./includes/app.js"></script>
        <img class="lampadario" src="images/lampadario.png" alt="Lampadario">
        <?php

        if (empty($results)) {
            echo "<div>";
            echo "<p>Table recovery failed</p>";
            echo "</div>";
        }
        else {
            foreach ($results as $row) {
                $html_id = "candela" . strval($row["id"]);
                $state = $row["state"];
                if ($state == 1) {
                    $image_src = "images/candela.png";
                }
                else {
                    $image_src = "images/candela_apagada.png";
                }
                echo "<img class=candela src=" . $image_src . " id=" . $html_id . " onclick=turnCandleOn(id)>";
            }
        }

        ?>
    </div>
</body>

</html>