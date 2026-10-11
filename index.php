<?php
include 'dbcon.php';

$message = '';
$msg_type = '';
if (isset($_GET['msg'])) {
    if ($GET['msg'] == 'added') {
        $message = "User Successfully Added.";
        $msg_type = 'success';
    }elseif( $GET['msg'] == 'updated') {
        $message = "User Updated Successfully";
        $msg_type = "info";
    }elseif($GET['msg'] == 'deleted') {
        $message = 'User deleted Successfully';
        $msg_type = 'danger';
    }else{
        $message = 'Dont leave it blank!';
        $msq_type = 'warning';
    }
}
if (isset($_POST['submit_user'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);

    if (!empty($name) && !empty($email)) {
        $sql ="INSERT INTO users (name, email) VALUES ('$name, $email')";
        if ($conn->query($sql) === TRUE) {
            header('Location: index.php?msg=added');
            exit();
}
    }
}

$result = $conn->query("SELECT * FROM users  ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5" style="max-width: 700px;">
        <h2 style="text-align: center">User Management System</h2>
    </div>


    <?php if (!empty($message)): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $message; ?>
            <buton type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></buton>
        
        </div>

    <?php endif; ?>
        <div class="card-body">
            <form action="index.php" method="POST">
                <label>Full Name</label><br>
                <input type="text" name="name" required><br>

                <label>Email Address</label><br>
                <input type="text" name="email" required><br>

                <button type="submit" name="submit_user">SUBMIT</button>
            </form>
        </div>

        <div>
            <h2>LIST</h2>
        </div>

</body>
</html>