<!-- ====================== ADD ANNONCE ====================== -->
<?php
include("config/db_connect.php");
// initiliaze vars with empty value
$title = $image = $price = $adress = $area = $type = $description = $date = '';
// initiliaze errors array with empty values for every key(input name)
$errors = array('title' => '', 'image' => '', 'price' => '', 'adress' => '', 'area' => '', 'type' => '', 'description' => '', 'date' => '');
if (isset($_POST['submit'])) {
    $fileName = $_FILES["image"]["name"];
    $tempName = $_FILES["image"]["tmp_name"];
    $fileSize = $_FILES['image']['size'];
    $folder = "./images/" . $fileName;
    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    // echo $imageExtension;
    // here we're checking the extension of the uploaded image
    if (!in_array($imageExtension, $validImageExtension)) {
        echo "<script>alert('Invalid image extension');</script>";
    } else if ($fileSize > 1000000) {
        echo "<script>alert('Image size is too large')</script>";
    }
    // ======================= validate image ====================

    if ($fileName == "") {
        $errors['image'] = "Please enter an image";
    } else {
        $image = $_FILES['image'];
    }
    // ======================= validate title ====================
    if (empty($_POST['title'])) {
        $errors['title'] = "A title is required.";
    } else {
        // if(!preg_match('/^[a-zA-Z\s]+$/',$title)){
        //     $errors['title'] = 'Title must be letters and spaces only.';
        // }else {
        // $title = $_POST['title'];
        // }
        $title = $_POST['title'];
    }
    //  ======================= validate price ====================
    if (empty($_POST['price'])) {
        $errors['price'] = "A price is required.";
    } else {
        // if(!preg_match('/^[0-9]+$/',$price)){
        //     $errors['price'] = 'price must be numbers only.';
        // }else {
        //     $price = $_POST['price'];
        // } 
        $price = $_POST['price'];

    }
    //  ======================= validate adress ====================
    if (empty($_POST['adress'])) {
        $errors['adress'] = "An adress is required.";
    } else {
        // if(!preg_match('/^[a-zA-Z\s]+$/',$adress)){
        //     $errors['adress'] = 'adress must be letters and spaces only.';
        // }else {
        //     $adress = $_POST['adress'];
        // }
        $adress = $_POST['adress'];

    }
    //  ======================= validate area ====================
    if (empty($_POST['area'])) {
        $errors['area'] = "An area is required.";
    } else {
        // if(!preg_match('/^[0-9]+$/',$area)){
        //     $errors['area'] = 'area must be numbers only.';
        // }else {
        //     $area = $_POST['area'];
        //     } 
        $area = $_POST['area'];
    }
    //  ======================= validate type ====================
    if (empty($_POST['type']))
        $errors['type'] = "A type is required.";
    else
        $type = $_POST['type'];
    //  ======================= validate description ====================
    if (empty($_POST['description']))
        $errors['description'] = "A description is required.";
    else
        $description = $_POST['description'];
    // ==========================
    if (array_filter($errors)) {
        // header('Location: index.php');
        echo "<script> if(window.confirm('Please check inputs and try again!')){
            window.open('index.php','self');
         }</script>";
    }
 else {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $adress = mysqli_real_escape_string($conn, $_POST['adress']);
    $area = mysqli_real_escape_string($conn, $_POST['area']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $image = mysqli_real_escape_string($conn, basename($_FILES["image"]["name"]));
    // create sql query
    $sql = "INSERT INTO annonces_table(title,image,price,adress,area,type,description,date) VALUES('$title','" . $image . "','$price','$adress','$area','$type','$description','$date')";
    if (move_uploaded_file($tempName, $folder)) {
        echo "<h3>Image uploaded successfully!</h3>";
    } else {
        echo "<h3>Failed to upload image!</h3>";
    }
    // save to database and check
    if (mysqli_query($conn, $sql)) {
        header('location: index.php');
    } else {
        echo "<script> if(window.confirm('An error occured while submitting form please try again')){
                window.open('index.php','self');
             }</script>";
    }
}
}
?>