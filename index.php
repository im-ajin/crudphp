<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container ">
        <h2>List of clients</h2>
        <a href="/myshop/create.php">New Client</a>
        <table class="table">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Phone</td>
                    <td>Address</td>
                    <td>Created At</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                  $servername = "localhost";
                  $username = "root";
                  $password = "";
                  $database = "myshop";

                  $connection = new mysqli($servername, $username, $password, $database);

                  if($connection->connect_error){
                    die("Connection Failed: " .$connection->connect_error);
                  }

                  $sql = "SELECT * from clients";
                  $result = $connection->query($sql);

                  if(!$result){
                    die("Invalid query " . $connection->error);
                  }

                  while($row = $result->fetch_assoc()){
                     echo"
                     <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[created_at]</td>
                    <td>
                        <a href='/myshop/edit.php?id=$row[id]' class='btn btn-primary btn-sm' role='button'>Edit</a>
                        <a href='/myshop/delete.php?id=$row[id]' class='btn btn-primary btn-sm' role='button'>Delete</a>
                    </td>
                </tr>
                     ";
                  }
                ?>
                
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>