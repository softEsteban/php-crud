<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['cli_name'];
    $lastname = $_POST['cli_last_name'];
    $email = $_POST['cli_email'];
    $type = $_POST['cli_type'];

    // Create a connection
    $con = connection();

    // Prepare the insert statement
    $sql = "INSERT INTO tbl_client (cli_name, cli_last_name, cli_email, cli_type) VALUES ('$name', '$lastname', '$email', '$type')";

    // Execute the insert statement
    if (mysqli_query($con, $sql)) {
        // Redirect back to the main page after successful insertion
        header('Location: index.php');
        exit();
    } else {
        // Handle the case when the insertion fails
        echo "Error: " . mysqli_error($con);
    }

    // Close the connection
    mysqli_close($con);
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <h1>Create User</h1>

    <form method="POST">
        <div class="mb-3">
            <label for="cli_name" class="form-label">Name</label>
            <input type="text" class="form-control" id="cli_name" name="cli_name" required>
        </div>
        <div class="mb-3">
            <label for="cli_last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="cli_last_name" name="cli_last_name" required>
        </div>
        <div class="mb-3">
            <label for="cli_email" class="form-label">Email</label>
            <input type="email" class="form-control" id="cli_email" name="cli_email" required>
        </div>
        <div class="mb-3">
            <label for="cli_type" class="form-label">Type</label>
            <input type="text" class="form-control" id="cli_type" name="cli_type" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

</body>

</html>