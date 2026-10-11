<?=
$host = "localhost";
$username = "root";
$password = "";
$database = "php_db";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error){
    die("DATABASE LOST CONNECTION: " . 
    $conn-> error);
}
?>