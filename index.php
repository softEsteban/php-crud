<?php
include('connection.php');

$con = connection();
$sql = "SELECT * FROM `tbl_client`";
$query = mysqli_query($con, $sql);

// Delete user
if (isset($_POST['delete'])) {
    $userId = $_POST['delete'];
    $deleteSql = "DELETE FROM `tbl_client` WHERE `cli_id` = $userId";
    mysqli_query($con, $deleteSql);
    header("Location: index.php"); // Redirect to the index page after deleting the user
    exit();
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dataclau PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <h1>Users</h1>

    <a href="create.php" class="btn btn-primary mb-3">Create User</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Type</th>
                <th>Actions</th> <!-- Add a new column for the delete button -->
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($query)): ?>
                <tr>
                    <td>
                        <?php echo $row['cli_name']; ?>
                    </td>
                    <td>
                        <?php echo $row['cli_last_name']; ?>
                    </td>
                    <td>
                        <?php echo $row['cli_email']; ?>
                    </td>
                    <td>
                        <?php echo $row['cli_type']; ?>
                    </td>
                    <td>
                        <button type="submit" name="delete"
                            style="background-color: #dc3545; color: #fff; border-color: #dc3545;">Delete</button>


                        <!-- <form method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                            <button type="submit" name="delete" value="<?php echo $row['cli_id']; ?>"
                                style="background-color: #dc3545; color: #fff; border-color: #dc3545;">Delete</button>
                        </form> -->
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

</body>

</html>