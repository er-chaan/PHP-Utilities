<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// $filename = 'xxx.csv';
$filename = 'xxx.tsv';
// header('Content-Type: text/csv; charset=utf-8');
header('Content-Type: text/tsv; charset=utf-8');
header('Content-Disposition: attachment; filename='.$filename.'');
$output = fopen('php://output', 'w');
// fputcsv($output, array('id', 'firstname', 'lastname'));

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

foreach ($result as $key => $value) {
    fputcsv($output, $value);
}
fclose($output);
exit;