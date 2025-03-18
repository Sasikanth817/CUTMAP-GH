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

// Fetching data from the database for approved bookings
$sql = "SELECT b_id, u_id, b_date, status FROM bookings1 WHERE status='Approved'";
$result = mysqli_query($conn, $sql);
$sql = "SELECT b_id, u_id, b_date, status FROM bookings2 WHERE status='Approved'";
$result = mysqli_query($conn, $sql);
$sql = "SELECT b_id, u_id, b_date, status FROM bookings3 WHERE status='Approved'";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approved Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="container mx-auto py-8">
        <h2 class="text-2xl font-bold mb-4">Approved Hall Bookings</h2>
        <div class="bg-white p-4 rounded-md shadow-md">
            <!-- Bookings Table -->
            <table class="w-full border">
                <thead>
                    <tr class="border">
                        <th class="py-2">Booking ID</th>
                        <th class="py-2">User ID</th>
                        <th class="py-2">Date</th>
                        <th class="py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if there are rows returned from the query
                    if (mysqli_num_rows($result) > 0) {
                        // Loop through each row of data
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr class='border text-center'>";
                            echo "<td class='py-2 border'>" . $row['b_id'] . "</td>";
                            echo "<td class='py-2 border'>" . $row['u_id'] . "</td>";
                            echo "<td class='py-2 border'>" . $row['b_date'] . "</td>";
                            echo "<td class='py-2 border'>" . $row['status'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        // No approved bookings found, display a message
                        echo "<tr><td colspan='4' class='py-2 border text-center'>No approved bookings found.</td></tr>";
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
