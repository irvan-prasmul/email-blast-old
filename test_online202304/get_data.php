<?php
date_default_timezone_set('Asia/Jakarta');
// print_r(date("Y-m-d H:i:s"));
// exit();
require_once 'conn.php';

$sql = "SELECT * FROM blast_email_test_online where `email_send` = 'N' AND `cycle` = '202304' LIMIT 50";
$result = $conn->query($sql);

// print_r($result);


if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  	// print_r($row);
  	$temp["EMAIL"] = $row["email"];
	$temp["NAME"] = $row["name"];
	$temp["USERNAME"] = $row["username"];
	$temp["PASSWORD"] = $row["password"];
	$temp["KELAS"] = $row["kelas"];
	$temp["LINK_PSIKO"] = $row["link_psiko"];
	$temp["LINK_ZOOM"] = $row["link_zoom"];
	$temp["MEETING_ID"] = $row["meeting_id"];
	$temp["MEETING_PASS"] = $row["meeting_pass"]; 
	$temp["MEETING_NAME"] = $row["meeting_name"];
  	$data[] = $temp;
    // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}

$conn->close();

// print_r($data);


?>



