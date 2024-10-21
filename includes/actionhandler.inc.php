<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data["id"];

    try {
        require_once "./dbh.inc.php";
        $query = "UPDATE candles SET state = 1 WHERE id = :id;";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("Location: ../index.php");

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}

else {
    header("Location: ../index.php");
}