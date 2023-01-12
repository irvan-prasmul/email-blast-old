<?php
// $db_hostname = 'localhost';
// $db_username = 's1_pmdb';
// $db_password = 's1_PMDB2017';
$db_hostname = '10.10.200.70';
$db_username = 'developer';
$db_password = '@P5gcmxdevel!';
$db_database = 's1_admission';

$db_hostname_va = '10.10.200.40';
// $db_username_va = 'pmb@admission2VA';
// $db_password_va = 'VA2017@admission';
$db_username_va = 'development';
$db_password_va = 'permits1311';
// $db_hostname_va = 'ws-dev.prasetiyamulya.ac.id';
// $db_username_va = 'developer';
// $db_password_va = '@P5gcmxdevel!';
$db_database_va = 'civa';


// NEW_VA_BCA: START
$db_hostname_va_bca = '10.10.200.29';
$db_username_va_bca = 'developer';
$db_password_va_bca = '@Permits0512Devel!';
$db_database_va_bca = 'vabca';

$db_hostname_va_bca_dev = '10.10.200.28';
$db_username_va_bca_dev = 'developer';
$db_password_va_bca_dev = '@Permits0512Devel!';
$db_database_va_bca_dev = 'vabca';
// NEW_VA_BCA: END


$db_hostname_siakad = '10.10.200.160';
$db_username_siakad = 'moorly';
$db_password_siakad = '1113';
// $db_hostname_siakad = 'ws-dev.prasetiyamulya.ac.id';
// $db_username_siakad = 'developer';
// $db_password_siakad = '@P5gcmxdevel!';
$db_database_siakad = 'pmdb';


function conn_admission(){
global $conn_adm, $db_adm, $db_hostname,$db_username,$db_password, $db_database;

$conn_adm	=mysqli_connect($db_hostname,$db_username,$db_password,$db_database);
$db_adm	=mysqli_select_db($conn_adm, $db_database);
}

function conn_virtualaccount(){
global $conn_va, $db_va, $db_hostname_va,$db_username_va,$db_password_va, $db_database_va;
$conn_va	=mysqli_connect($db_hostname_va,$db_username_va,$db_password_va);
$db_va	=mysqli_select_db($conn_va, $db_database_va);
}


// NEW_VA_BCA: START
function conn_virtualaccount_bca(){
global $conn_va_bca, $db_va_bca, $db_hostname_va_bca,$db_username_va_bca,$db_password_va_bca, $db_database_va_bca;
$conn_va_bca	=mysqli_connect($db_hostname_va_bca,$db_username_va_bca,$db_password_va_bca);
$db_va_bca	=mysqli_select_db($conn_va_bca, $db_database_va_bca);
}

function conn_virtualaccount_bca_dev(){
global $conn_va_bca_dev, $db_va_bca_dev, $db_hostname_va_bca_dev,$db_username_va_bca_dev,$db_password_va_bca_dev, $db_database_va_bca_dev;
$conn_va_bca_dev	=mysqli_connect($db_hostname_va_bca_dev,$db_username_va_bca_dev,$db_password_va_bca_dev);
$db_va_bca_dev	=mysqli_select_db($conn_va_bca_dev, $db_database_va_bca_dev);
}
// NEW_VA_BCA: END


function conn_siakad(){
global $conn_siakad, $db_siakad, $db_hostname_siakad,$db_username_siakad,$db_password_siakad, $db_database_siakad;
$conn_siakad	=mysqli_connect($db_hostname_siakad,$db_username_siakad,$db_password_siakad);
$db_siakad	=mysqli_select_db($conn_siakad, $db_database_siakad);
}
?>