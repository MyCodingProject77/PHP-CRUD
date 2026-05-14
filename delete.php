<?php

include 'db.php';

if (isset($_GET['id'])) {

    $id = intval($_GET['id']); // convert to integer for safety

    $sql = "DELETE FROM users WHERE id = $id";

    if ($conn->query($sql) === TRUE) {

        header("Location: index.php");
        exit();

    } else {

        echo "Error deleting record: " . $conn->error;
    }

}

$conn->close();

?>