<?php

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];

    $sql = "INSERT INTO users (id, name, email, phone, gender, dob, address)
            VALUES ('$id', '$name', '$email', '$phone', '$gender', '$dob', '$address')";

    if ($conn->query($sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

}
?>