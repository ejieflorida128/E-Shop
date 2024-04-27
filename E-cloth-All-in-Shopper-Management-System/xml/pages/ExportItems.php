<?php
 include('conn.php');
// Headers for download
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=ITEMS.xls");



// Check connection
if ($connforMyOnlineDb->connect_error) {
    die("Connection failed: " . $connforMyOnlineDb->connect_error);
}

// Fetch data from your database table
$sql = "SELECT * FROM items";
$result = $connforMyOnlineDb->query($sql);

// Output data in Excel format
if ($result->num_rows > 0) {
    // Output Excel headers
    echo "id\tSellerId\timg\titem_name\titem_source\tseller\n"; // Adjust column names accordingly

    // Output data rows
    while($row = $result->fetch_assoc()) {
        echo $row["id"] . "\t" . $row["SellerId"] . "\t" . $row["img"] . "\t" . $row["item_name"] . "\t" . $row["item_source"] . "\t" . $row["seller"] . "\n"; // Adjust column names accordingly
    }
} else {
    echo "0 results";
}
$connforMyOnlineDb->close();
?>
