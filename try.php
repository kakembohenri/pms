<?php

session_start();


$host = 'localhost';
$username = 'root';
$password = '';
$database = 'pms_db';

$conn;



$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$newCode = 0;
$cell_id = 1;
$prison_id = 1;

// Get cell
$query = mysqli_query($conn, "SELECT * FROM cell_list WHERE id='$cell_id'");

$cell = mysqli_fetch_array($query);

// Get prison
$query = mysqli_query($conn, "SELECT * FROM prison_list WHERE id='$prison_id'");

$prison = mysqli_fetch_array($query);


// Check for users with both prisoner and cell ids

$query = mysqli_query($conn, "SELECT * FROM inmate_list WHERE cell_id='$cell_id' and prison_id='$prison_id'");

$count = mysqli_num_rows($query);

$prison_cell_block = $prison['name'] . $cell['name'];

function createPrefix($prison_cell_block)
{
    $words = str_word_count($prison_cell_block, 1);
    $cell_no = substr($prison_cell_block, -4, 4);

    $hey = '';
    foreach ($words as $word) {
        $hey = $hey . $word[0];
    }

    return $hey . $cell_no;
}

if ($count == 0) {
    $newCode = createPrefix($prison_cell_block) . '-' . '0001';
    echo $newCode;
} else {
    $newCode = createPrefix($prison_cell_block) . '-' . '000' . ($count + 1);
    echo $newCode;
}
