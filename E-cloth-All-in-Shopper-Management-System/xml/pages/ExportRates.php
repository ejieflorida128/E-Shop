<?php
 include('conn.php');
// Headers for download
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Rates.xls");



// Check connection
if ($connforMyOnlineDb->connect_error) {
    die("Connection failed: " . $connforMyOnlineDb->connect_error);
}

// Fetch data from your database table
$sql = "SELECT * FROM irate_ratings";
$result = $connforMyOnlineDb->query($sql);

// Output data in Excel format
if ($result->num_rows > 0) {
    // Output Excel headers
    echo "id\titem_id\trate\tuser\n"; // Adjust column names accordingly

    // Output data rows
    while($row = $result->fetch_assoc()) {
        echo $row["id"] . "\t" . $row["item_id"] . "\t" . $row["rate"] . "\t" . $row["user"] ."\n"; // Adjust column names accordingly
    }
} else {
    echo "0 results";
}
$connforMyOnlineDb->close();
?>
