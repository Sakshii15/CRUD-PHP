<?php 
    include 'server.php';
    $id=$_GET['id'];
    $result=mysqli_query($conn,"SELECT * FROM INFO WHERE ID='$id'");
    $row=mysqli_fetch_assoc($result);

    if(isset($_POST['submit'])){
        $id=$_GET['id'];
        $name=htmlspecialchars($_POST['name']);
        $phone=htmlspecialchars($_POST['phone']);
        $city=htmlspecialchars($_POST['city']);
        $email=htmlspecialchars($_POST['email']);

        $sql="UPDATE INFO SET NAME='$name',EMAIL='$email',PHONE='$phone',CITY='$city' WHERE ID='$id'";

        if(mysqli_query($conn,$sql)){
        header("location:view.php");
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
                <h3 class="p-2 text-center">Edit & Save Into Database</h3>
                <hr class="bg-light">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="<?=$row['NAME'];?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="<?=$row['EMAIL'];?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" name="phone" class="form-control" id="phone" value="<?=$row['PHONE'];?>" required>
                    </div>
                    <div class="form-group">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="city" class="form-control" id="city" value="<?=$row['CITY'];?>" required>
                    </div>
                    <div class="form-group mt-3 text-center">
                        <input type="submit" name="submit" value="Update" class="btn btn-primary">
                    </div>
                    <div class="form-group mt-3 text-center ">
                        <a href="index.php" class="btn btn-danger"  role="button">Add Records</a>
                    </div>
                </form>
            </div>

        </div>
    </div>

</body>

</html>