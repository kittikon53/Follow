<?php 
session_start();
if(isset($_SESSION['unique_id'])){
    header("location: users.php");
}

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'followup';

$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'id' is set in the URL
if(isset($_GET['id'])){
    $id_account = $_GET['id'];

    // Use prepared statement to avoid SQL injection
    $sql = "SELECT fname FROM account WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_account);
    $stmt->execute();
    $stmt->bind_result($fname);
    
    // Fetch the result
    if ($stmt->fetch()) {
        // Data fetched successfully
    } else {
        echo "0 results";
    }

    $stmt->close();
} else {
    echo "ID not set in the URL";
}

$conn->close();
?>

<?php include_once "header.php"; ?>
<body>
    <!-- Your HTML code continues... -->
</body>
</html>
