<?php include('server.php');
function sanitize($data, $conn) {
    return htmlspecialchars(mysqli_real_escape_string($conn, trim($data)));
}

if (isset($_POST['save'])) {
    $name = sanitize($_POST['name'], $conn);
    $email = sanitize($_POST['email'], $conn);
    $phone = sanitize($_POST['phone'], $conn);
    $city = sanitize($_POST['city'], $conn);

    if (!empty($name) && !empty($address)) {
        mysqli_query($conn, "INSERT INTO info (NAME,EMAIL,PHONE,CITY) VALUES ('$name', '$email','$phone','$city')");
        $_SESSION['message'] = "Information saved"; 
        header('location: index.php');
    } else {
        $_SESSION['message'] = "All fields are required";
        header('location: index.php');
    }
}

if (isset($_POST['update'])) {
    $id = sanitize($_POST['id'], $conn);
    $name = sanitize($_POST['name'], $conn);
    $email = sanitize($_POST['email'], $conn);
    $phone = sanitize($_POST['phone'], $conn);
    $city = sanitize($_POST['city'], $db);

    if (!empty($id) && !empty($name) && !empty($address)) {
        mysqli_query($db, "UPDATE info SET NAME='$name', EMAIL='$email', CITY='$city',PHONE='$phone' WHERE id=$id");
        $_SESSION['message'] = "Information updated!"; 
        header('location: index.php');
    } else {
        $_SESSION['message'] = "All fields are required";
        header('location: index.php');
    }
}

if (isset($_GET['del'])) {
    $id = sanitize($_GET['del'], $db);
    if (!empty($id)) {
        mysqli_query($db, "DELETE FROM info WHERE id=$id");
        $_SESSION['message'] = "Id deleted!"; 
        header('location: index.php');
    } else {
        $_SESSION['message'] = "Invalid ID";
        header('location: index.php');
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<title>CRUD</title>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row p-2">
            <div class="col-lg-4 bg-light offset-lg-4 mt-4 p-3 rounded text-dark">
                <h3 class="p-2 text-center">Insert Into Database</h3>
                <hr class="bg-light">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Name" >
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" >
                    </div>
                    <div class="form-group">
                        <label for="phoneno" class="form-label">Phone No.</label>
                        <input type="tel" name="phoneno" class="form-control" id="phoneno" placeholder="PhoneNo." >
                    </div>
                    <div class="form-group">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="city" class="form-control" id="city" placeholder="City" >
                    </div>
                    <div class="form-group mt-3 text-center">
                        <input type="submit" name="submit" class="btn btn-primary">
                    </div>
                    <div class="form-group mt-3 text-center ">
                        <a href="view.php" class="btn btn-danger"  role="button">View Records</a>
                    </div>
                    <div class="form-group text-center mt-3">
                        <p class="lead "><?=$result; ?></p>
                    </div>

                </form>
            </div>

        </div>
    </div>

</body>

