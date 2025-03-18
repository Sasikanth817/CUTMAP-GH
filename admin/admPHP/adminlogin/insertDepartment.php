<?php
include '../../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["departmentName"]) && !empty($_POST["departmentName"])) {
        $departmentName = $_POST["departmentName"];

        $sql = "INSERT INTO departments (d_name) VALUES ('$departmentName')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "Department added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Department name is required.";
    }
}

// Close connection
$conn->close();
?>
