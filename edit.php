<?php
    require_once 'vendor/autoload.php';

    use App\Database;

    $db = new Database();
    $pdo = $db->connect();

    $id = $_GET['id'];

    if(isset($_POST['submit'])){
        // echo "<script>alert('Are you sure you want to delete this record?')</script>";
        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        echo $name;
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $address = $_POST['address'];
        $address = filter_var($address, FILTER_SANITIZE_STRING);

        $sql = "UPDATE users SET id = :id, name = :name, email = :email, address = :address WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':name' => $name, ':email' => $email, ':address' => $address, ':id' => $id]);

        header('Location: index.php');
    }


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        .container {
            margin-top: 50px;
        }

        .card {
            padding: 10px;
            width: 445px;
        }

        .form-control {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">

                <!-- <hr> -->
                <?php
                    $sql = "SELECT * FROM users WHERE id = :id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([':id' => $id]);
                    $user = $stmt->fetch(PDO::FETCH_OBJ);
                ?>
                <form action="edit.php" class="card bg-dark" method="post">
                    <h1 class="text-white">Add Data</h1>
                    <div class="form-group">
                        <label class="text-white" for="name">Name</label>
                        <input value="<?php echo $user->name; ?>" type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="text-white" for="email">Email</label>
                        <input  value="<?php echo $user->email; ?>" type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="text-white" for="address">Address</label>
                        <input value="<?php echo $user->address; ?>" type="text" name="address" id="address" class="form-control">
                    </div>
                    <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>