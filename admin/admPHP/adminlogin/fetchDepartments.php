<?php
    include 'adconnection.php';
    
$inputValue = $_GET['inputValue'];

$sql = "SELECT d_name FROM departments";

$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $departments = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $departments[] = $row["d_name"];
        }
        echo json_encode($departments);
    } else {
        echo json_encode("No departments found.");
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
