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

// Handle approval or rejection
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['approve'])) {
        $bookingId = $_POST['booking_id'];
        $sql = "UPDATE bookings3 SET status='Approved' WHERE b_id='$bookingId'";
        mysqli_query($conn, $sql);
        // Redirect back to dashboard
        header("Location: dashboard1.php");
        exit();
    } elseif (isset($_POST['reject'])) {
        $bookingId = $_POST['booking_id'];
        $sql = "UPDATE bookings3 SET status='Rejected' WHERE b_id='$bookingId'";
        mysqli_query($conn, $sql);
        // Redirect back to dashboard
        header("Location: dashboard1.php");
        exit();
    }
}

// Fetching data from the database for pending bookings
$sql = "SELECT b_id, u_id, b_date, status FROM bookings3 WHERE status='Pending'";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hall Booking Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="flex flex-col md:flex-row">

    <div class="bg-gray-800 text-gray-100 w-full h-screen md:w-64 flex-shrink-0">
            <div class="p-4">
                <h1 class="text-2xl font-bold">Dashboard</h1>
                <ul class="mt-4">
                    <li class="py-2 hover:bg-gray-700"><a href="C:\xampp\htdocs\cutmap gallaryhall booking\cutmap gallaryhall booking\admin\admPHP\managebooking.html" class="block px-4">Gallery Hall 1</a></li>
                    <li class="py-2 hover:bg-gray-700"><a href="dashboard2.php" class="block px-4">Gallery  Hall 2</a></li>
                    <li class="py-2 hover:bg-gray-700"><a href="dashboard3.php" class="block px-4">Gallery  Hall 3</a></li>
                    <li class="py-2 hover:bg-gray-700"><a href="Approved bookings.php" class="block px-4">Approved Bookings</a></li>
                    <li class="py-2 hover:bg-gray-700"><a href="users.php" class="block px-4">Users</a></li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="w-full px-4 py-8">
            <h2 class="text-2xl font-bold mb-4">Gallery Hall 3</h2>
            <div class="bg-white p-4 rounded-md shadow-md">
                <!-- Bookings Table -->
                <table class="w-full border">
                    <thead>
                        <tr class="border">
                            <th class="py-2">Booking ID</th>
                            <th class="py-2">User</th>
                            <th class="py-2">Date</th>
                            <th class="py-2">Status</th>
                            <th class="py-2">Actions</th>
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
                                echo "<td class='py-2 border'>";
                                echo "<form method='post'>";
                                echo "<input type='hidden' name='booking_id' value='" . $row['b_id'] . "'>";
                                echo "<button type='submit' name='approve' class='bg-green-500 text-white px-2 py-1 rounded-md'>Approve</button>";
                                echo "<button type='submit' name='reject' class='bg-red-500 text-white px-2 py-1 rounded-md'>Reject</button>";
                                echo "</form>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            // No rows found, display a message
                            echo "<tr><td colspan='5' class='py-2 border text-center'>No bookings found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>

</html>

<?php
// Close connection
mysqli_close($conn);
?>
