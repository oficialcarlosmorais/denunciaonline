<?php
$servername = "localhost";
$username = "root";
$password = "horus4321";
$dbname = "pmapcorreg";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM usuario WHERE us_cpf = 85549703220";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $contar = $contar +1;
        echo $contar . " id: " . $row["us_id"]. " - Name: " . $row["us_nome"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

echo "<hr>";
$contar = 0;
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM usuario";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $contar = $contar + 1;
        echo $contar . " id: " . $row["us_id"]. " - Name: " . $row["us_nome"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
