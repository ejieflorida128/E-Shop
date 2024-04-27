<?php
 include('conn.php');
// Headers for download
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Buyer Accounts.xls");



// Check connection
if ($connForMyDatabase->connect_error) {
    die("Connection failed: " . $connForMyDatabase->connect_error);
}

// Fetch data from your database table
$sql = "SELECT * FROM buyer_account";
$result = $connForMyDatabase->query($sql);

// Output data in Excel format
if ($result->num_rows > 0) {
    // Output Excel headers
    echo "id\tusername\tpassword\tprofile_pic\tfullname\tage\tnumber\tlocation\n"; // Adjust column names accordingly

    // Output data rows
    while($row = $result->fetch_assoc()) {
        echo $row["id"] . "\t" . $row["username"] . "\t" . $row["password"] . "\t" . $row["profile_pic"] . "\t" . $row["fullname"] . "\t" . $row["age"] . "\t" . $row["number"] . "\t" . $row["location"] . "\n"; // Adjust column names accordingly
    }
} else {
    echo "0 results";
}
$connForMyDatabase->close();
?>
