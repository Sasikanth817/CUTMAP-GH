<?php
// Establishing database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "hallbooking";

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetching data from the database for users
$sql = "SELECT u_id, u_email FROM users";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="container mx-auto py-8">
        <h2 class="text-2xl font-bold mb-4">User Information</h2>
        <div class="bg-white p-4 rounded-md shadow-md">
            <!-- Users Table -->
            <table class="w-full border">
                <thead>
                    <tr class="border">
                        <th class="py-2">User ID</th>
                        <th class="py-2">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if there are rows returned from the query
                    if (mysqli_num_rows($result) > 0) {
                        // Loop through each row of data
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr class='border text-center'>";
                            echo "<td class='py-2 border'>" . $row['u_id'] . "</td>";
                            echo "<td class='py-2 border'>" . $row['u_email'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        // No users found, display a message
                        echo "<tr><td colspan='2' class='py-2 border text-center'>No users found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>

<?php
// Close connection
mysqli_close($conn);
?>
