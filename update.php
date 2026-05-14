<?php

include 'db.php';

$id = $_GET['id'];

if (isset($_GET['id'])) {

    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

    }

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];

    $sql = "UPDATE users SET
            name='$name',
            email='$email',
            phone='$phone',
            gender='$gender',
            dob='$dob',
            address='$address'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {

        header("Location: index.php");

    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;

    }

    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Update User</title>

    <link rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>

        body{
            background:#f4f6f9;
        }

        .container{
            max-width:900px;
        }

        .card{
            border:none;
            border-radius:10px;
        }

    </style>

</head>

<body>

<div class="container mt-5">

    <div class="card shadow p-4">

        <h2 class="text-center mb-4">
            Update Student
        </h2>

        <form action="update.php?id=<?= $id ?>" method="POST">

            <div class="form-row">

                <div class="form-group col-md-6">

                    <label>Name</label>

                    <input type="text"
                    class="form-control"
                    name="name"
                    value="<?= $row['name'] ?>"
                    required>

                </div>

                <div class="form-group col-md-6">

                    <label>Email</label>

                    <input type="email"
                    class="form-control"
                    name="email"
                    value="<?= $row['email'] ?>"
                    required>

                </div>

            </div>

            <div class="form-row">

                <div class="form-group col-md-6">

                    <label>Phone</label>

                    <input type="text"
                    class="form-control"
                    name="phone"
                    value="<?= $row['phone'] ?>"
                    required>

                </div>

                <div class="form-group col-md-6">

                    <label>Gender</label>

                    <select class="form-control"
                    name="gender"
                    required>

                        <option value="Male"
                        <?= ($row['gender'] == 'Male') ? 'selected' : '' ?>>
                        Male
                        </option>

                        <option value="Female"
                        <?= ($row['gender'] == 'Female') ? 'selected' : '' ?>>
                        Female
                        </option>

                    </select>

                </div>

            </div>

            <div class="form-row">

                <div class="form-group col-md-6">

                    <label>Date of Birth</label>

                    <input type="date"
                    class="form-control"
                    name="dob"
                    value="<?= $row['dob'] ?>"
                    required>

                </div>

            </div>

            <div class="form-group">

                <label>Address</label>

                <textarea class="form-control"
                name="address"
                rows="3"
                required><?= $row['address'] ?></textarea>

            </div>

            <button type="submit"
            class="btn btn-primary">
                Update Student
            </button>

            <a href="index.php"
            class="btn btn-secondary">
                Back
            </a>

        </form>

    </div>

</div>

</body>
</html>