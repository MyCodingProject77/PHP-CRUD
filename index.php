<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PHP CRUD WITH MYSQL</title>

    <link rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>

        body{
            background: #f4f6f9;
            font-family: Arial, sans-serif;
        }

        .container{
            margin-top: 40px;
        }

        .card{
            border: none;
            border-radius: 10px;
        }

        .table th,
        .table td{
            vertical-align: middle;
            font-size: 14px;
        }

    </style>

</head>
<body>

<div class="container">

    <h2 class="text-center mb-4">
        Student Information System
    </h2>

    <!-- Add User Form -->

    <div class="card shadow p-4">

        <form action="create.php" method="POST">

            <div class="form-row">

                <div class="form-group col-md-4">
                    <label>ID</label>
                    <input type="number" name="id" class="form-control" placeholder="Enter ID" required>
                </div>

                <div class="form-group col-md-4">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                </div>

                <div class="form-group col-md-4">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                </div>

            </div>

            <div class="form-row">

                <div class="form-group col-md-4">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="Enter Phone" required>
                </div>

                <div class="form-group col-md-4">
                    <label>Gender</label>
                    <select name="gender" class="form-control" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label>Date of Birth</label>
                    <input type="date" name="dob" class="form-control" required>
                </div>

            </div>

            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" placeholder="Enter Address" required>
            </div>

            <button type="submit" class="btn btn-primary">
                Add Student
            </button>

        </form>

    </div>

    <!-- User Table -->

    <div class="card shadow mt-4">

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="thead-dark">

                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>DOB</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>

                </thead>

                <tbody>
                    <?php
                    include 'db.php';
                    $sql = "SELECT * FROM users";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['email']}</td>
                                    <td>{$row['phone']}</td>
                                    <td>{$row['gender']}</td>
                                    <td>{$row['dob']}</td>
                                    <td>{$row['address']}</td>
                                    <td>
                                        <a href='update.php?id={$row['id']}' class='btn btn-warning'>Edit</a>
                                        <a href='delete.php?id={$row['id']}' class='btn btn-danger'>Delete</a>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>No students found</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>