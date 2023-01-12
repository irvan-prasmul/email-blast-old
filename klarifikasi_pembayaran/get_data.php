<?php
date_default_timezone_set('Asia/Jakarta');
// print_r(date("Y-m-d H:i:s"));
// exit();
require_once 'conn.php';

$sql = "SELECT * FROM blast_email_klarifikasi_pembayaran where `email_send` = 'N' LIMIT 100";
$result = $conn->query($sql);

// print_r($result);


if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  	// print_r($row);
	$temp["email"] = $row["email"];
	$temp["name"] = $row["name"];
	$temp["first_name"] = $row["first_name"];
	$temp["last_name"] = $row["last_name"];
  	$temp["nim"] = $row["nim"];
	$temp["bp"] = $row["bp"];
	$temp["prodi"] = $row["prodi"];
	$temp["total"] = $row["total"];
	$temp["fixed_fee"] = $row["fixed_fee"];
	$temp["sks_fee"] = $row["sks_fee"];
	$temp["lab_fee"] = $row["lab_fee"];
	$temp["due_date"] = $row["due_date"];
  	$data[] = $temp;
    // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}

$conn->close();

print_r($data);


?>