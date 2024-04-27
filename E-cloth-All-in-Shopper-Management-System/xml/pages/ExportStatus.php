<?php
 include('conn.php');
// Headers for download
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Parcel Status.xls");



// Check connection
if ($connforMyOnlineDb->connect_error) {
    die("Connection failed: " . $connforMyOnlineDb->connect_error);
}

// Fetch data from your database table
$sql = "SELECT * FROM confirmedorder";
$result = $connforMyOnlineDb->query($sql);

// Output data in Excel format
if ($result->num_rows > 0) {
    // Output Excel headers
    echo "id\tcartPendingId\tBuyereId\tSellerId\titem_name\titem_price\titem_source\tbuyer_fullname\tbuyer_location\tbuyer_age\tseller\trider\tstatus\n"; // Adjust column names accordingly

    // Output data rows
    while($row = $result->fetch_assoc()) {
        echo $row["id"] . "\t" . $row["cartPendingId"] . "\t" . $row["BuyerId"] . "\t" . $row["SellerId"] . "\t" . $row["item_name"] . "\t" . $row["item_price"] . "\t" . $row["item_source"] . "\t" . $row["buyer_fullname"] . "\t" . $row["buyer_location"] . "\t" . $row["buyer_age"] . "\t" . $row["seller"] . "\t" . $row["rider"] .  "\t" . $row["status"] . "\n"; // Adjust column names accordingly
    }
} else {
    echo "0 results";
}
$connforMyOnlineDb->close();
?>
