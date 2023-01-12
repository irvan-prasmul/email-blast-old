<?php
date_default_timezone_set('Asia/Jakarta');
// print_r(date("Y-m-d H:i:s"));
// exit();
require_once 'conn.php';

$sql = "SELECT * FROM blast_email_um WHERE `email_send` = 'N' GROUP BY email LIMIT 1000";
$result = $conn->query($sql);

// print_r($result);


if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  	// print_r($row);
	$temp["nik"] = $row["nik"];
	$temp["name"] = $row["name"];
	$temp["title"] = $row["title"];
	$temp["email"] = $row["email"];
  	$temp["pic"] = $row["pic"];
	$temp["pic_email"] = $row["pic_email"];
  	$data[] = $temp;
    // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  $data = "0 results";
}

// $conn->close();

// print_r($data);


?>