<?php include('db.php'); ?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <title>Sjömarkens Pizzeria</title>
</head>

<?php

if (isset($_POST['submit'])) {
    $comment = $_POST['input-comment'];
    $dishes = $_POST['input-dishes'];
    $dishesdb = implode(", ", $dishes);
    $sql = "INSERT INTO `simpleorder`(`dishes`, `comment`) VALUES ('" . $dishesdb . "', '" . $comment . "')";

    if ($conn->query($sql) === TRUE) {
        echo "Din kommentar till bagaren: " . $_POST['input-comment'] . ".";
        echo "<br>";
        echo "Du har beställt följande: " . $dishesdb . ".";
        echo "<br><br>";
        echo "Tack för din beställning!";
    } else {
        echo "Error " . $conn->error;
    }
};


?>