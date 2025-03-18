<?php
// Include the database connection file

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

// Check if the user is logged in (assuming userid is stored in a cookie)
if(isset($_COOKIE['userid'])) {
    // Retrieve the user ID from the cookie
    $userId = $_COOKIE['userid'];

    // SQL query to select bookings for the logged-in user
    $sql = "SELECT * FROM bookings3 WHERE U_Id = $userId";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if the query executed successfully
    if($result) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Seminar Hall Dashboard</title>
            <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
            <style>
                /* Add custom styles here if needed */
            </style>
        </head>
        <body class="bg-gray-100">
            <div class="container mx-auto py-8">
                <h1 class="text-3xl font-bold mb-4">Gallaryhall 3</h1>
                
                <!-- Table of Bookings -->
                <div class="overflow-x-auto sm:px-6">
                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="px-4 py-2">Date</th>
                                <th class="px-4 py-2">Time</th>
                                <th class="px-4 py-2">Department</th>
                                <th class="px-4 py-2">Mobile No</th>
                                <th class="px-4 py-2">Booker Name</th>
                                <th class="px-4 py-2">Reason</th>
                                <th class="px-4 py-2">Status</th>
                                <th class="px-4 py-2">Request</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Loop through each booking and populate the table rows -->
                            <?php
                            // Fetch data and populate table rows
                            while($row = mysqli_fetch_assoc($result)) {
                                $date = $row['b_date'];
                                $time = $row['b_time'];
                                $department = $row['department_name'];
                                $mobile = $row['b_mobile_no'];
                                $booker_name = $row['b_booker_name'];
                                $reason = $row['b_reason'];
                                $status = $row['status'];
                                $request = $row['b_request'];

                                // Output table row
                                echo '
                                <tr>
                                    <td class="border px-4 py-2 uppercase">'.$date.'</td>
                                    <td class="border px-4 py-2">'.$time.'</td>
                                    <td class="border px-4 py-2">'.$department.'</td>
                                    <td class="border px-4 py-2">'.$mobile.'</td>
                                    <td class="border px-4 py-2">'.$booker_name.'</td>
                                    <td class="border px-4 py-2">'.$reason.'</td>';
                                // Check status and apply appropriate class for styling
                                // Check status and apply appropriate class for styling
                                if($status == "pending")
                                    echo '<td class="border px-4 py-2 bg-yellow-300 text-yellow-700 capitalize">'.$status.'</td>';
                                else if($status == "Approved") // <-- Corrected the variable name here
                                    echo '<td class="border px-4 py-2 bg-green-300 text-green-700 capitalize">'.$status.'</td>';
                                else
                                    echo '<td class="border px-4 py-2 bg-red-300 text-green-700 capitalize">'.$status.'</td>';

                                echo '<td class="border px-4 py-2">'.$request.'</td>
                                </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </body>
        </html>
        <?php
    } else {
        // Display an error message if the query fails
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    // Redirect to login page or display a message if user is not logged in
    echo "Please login to access this page.";
}
?>
