    <?php
    include './models/btjs.php';
include './models/User.php';
$servername = "localhost";
$username = "root";
$password = "";
$db = "mydatuks";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
if($_SERVER['REQUEST_METHOD'] =="POST"){
    User::save($conn);
}
// Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";
$conn = new mysqli($servername, $username, $password, $db);
$sql = "SELECT * FROM `users`";
$result = $conn->query($sql);
// print_r($result);

$users = [];
while($row = $result->fetch_assoc()) {
    $users[] = new User($row["id"], $row["name"], $row["surname"], $row["mail"], $row["number"]);
}

  $conn->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    include './models/btcss.php';
    ?>
    <link rel="stylesheet" href="./css/main.css">
    <title>Document</title>
</head>
<body>

    <form action="" method="post">
            <p>name</p>
            <input type="text" name="name">    
            <p>surname</p>
            <input type="text" name="surname">
            <p>mail</p>
            <input type="text" name="mail">
            <p>number</p>
            <input type="text" name="number">
            <button type="submit">išsaugoti</button>
        <div class="container">
        </form>
<table class="table table-bordered">
    <tr>
        <th>name</th>
        <th>surname</th>
        <th>mail</th>
        <th>number</th>
    </tr>
    <?php
    foreach ($users as $user) {
        echo "<tr>";
        echo "<td>".$user->name."</td>";
        echo "<td>".$user->surname."</td>";
        echo "<td>".$user->mail."</td>";
        echo "<td>".$user->number."</td>";
        echo "</tr>";
    }
    ?>
    </div>
</body>
</html>