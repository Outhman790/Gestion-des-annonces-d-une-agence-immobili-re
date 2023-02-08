<?php
include('config/db_connect.php');
if (isset($_GET['annonce-to-delete'])) {
    $annonce_to_delete = $_GET['annonce-to-delete'];
    $sql = "DELETE FROM annonces_table WHERE id = $annonce_to_delete";
    if (mysqli_query($conn, $sql)) {
    header('location: index.php');
echo "<script>alert(inside)</script>";
    } else {
    echo "error occured" . mysqli_error($conn);
    }
    // free result from memory
    mysqli_free_result(mysqli_query($conn, $sql));
    // close connection
    mysqli_close($conn);
}
?>