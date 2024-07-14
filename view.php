<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<title>CRUD</title>
</head>
<body class="bg-light">
    <div class="container">
        <div class="row ">
            <div class="col-lg-10 offset-lg-1 mt-3">
                <table class="table table-striped table-bordered ">
                    <thead >
                        <tr>
                            <th class="bg-dark text-center text-light">ID</th>
                            <th class="bg-dark text-center text-light">Name</th>
                            <th class="bg-dark text-center text-light">Email</th>
                            <th class="bg-dark text-center text-light">City</th>
                            <th class="bg-dark text-center text-light">Phone</th>
                            <th class="bg-dark text-center text-light">Edit</th>
                            <th class="bg-dark text-center text-light">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include 'server.php';
                        $sql="select * from info";
                        $result=mysqli_query($conn,$sql);
                     
                         if(!$result){
                            die("query failed".mysqli_error());
                         }
                         else{
                            while($row=mysqli_fetch_assoc($result)){
                        ?>
                        <tr class="text-center">
                            <td><?=$row['ID'];?></td>
                            <td><?=$row['NAME'];?></td>
                            <td><?=$row['EMAIL'];?></td>
                            <td><?=$row['CITY'];?></td>
                            <td><?=$row['PHONE'];?></td>
                            <td><a class="btn btn-primary" href="edit.php?id=<?=$row['ID'];?>">Edit</a> </td>
                            <td><a class="btn btn-danger" href="del.php?id=<?=$row['ID'];?>">Delete</a> </td>
                        </tr> 
                    <?php } } ?>
                    </tbody>
                </table>
                <div> <a class="btn btn-danger" href="index.php">Add Record</a>
                </div>
                
            </div>
        </div>

        </div>

</body>

