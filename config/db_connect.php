<?php
// connect to database
$conn = mysqli_connect('localhost', 'outhman790', 'test123', 'annonces_database');
// check connection *
if (!$conn) {
    echo 'An error occured:' . mysqli_connect_error();
}
?>