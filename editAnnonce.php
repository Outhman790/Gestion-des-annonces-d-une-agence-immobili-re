<?php
include('config/db_connect.php');
?>
<?php
// if (isset($_GET['id'])) {
//     echo 'Im Inside';
//     $id = $_GET['id'];
//     $title = $_GET['edited-title'];
//     $price = $_GET['edited-price'];
//     $date = $_GET['edited-date'];
//     $type = $_GET['edited-type'];
//     $description = $_GET['edited-description'];
//     $adress = $_GET['edited-adress'];
//     $area = $_GET['edited-area'];
//     $sql = "UPDATE `annonces_table` SET `title`= $title,`description`= $description,`area`= $area,`adress`=$adress,`price`=$price,`date`=$date,`type`=$type WHERE `id`=$id";
//     $result = mysqli_query($conn, $sql);

// }


?>

<?php
if (isset($_GET['id-to-edit'])):
    $annonceId = $_GET['id-to-edit'];
    $sql = "SELECT * FROM annonces_table WHERE id = '$annonceId'";
    $result = mysqli_query($conn, $sql);
    while ($annonce = mysqli_fetch_array($result)):
        ?>


<button class="close-edit-modal">&times;</button>
<div class="more_info_modal_img">
    <img src="<?php echo $annonce['image'] ?>" alt="house image">
</div>
<form action="editAnnonce.php" class="edit_annonce_info" method="post">
    <div class="edit-Specifications">
        <p>Specifications</p>
        <hr class="bold">
        <label for="edited-title">title</label>
        <input type="text" name="edited-title" id="edited-title" class="edited-title">
        <hr>
        <div>
            <label for="edited-price">price</label>
            <input type="number" name="edited-price" id="edited-price" class="edited-price">
        </div>
        <hr>
        <div>
            <label for="edited-area">area</label>
            <input type="number" name="edited-area" id="edited-area" class="edited-area">
        </div>
        <hr>
        <div>
            <label for="edited-adress">adress</label>
            <input type="text" name="edited-adress" id="edited-adress" class="edited-adress">
        </div>
        <hr>
        <div>
            <label for="edited-date ">Date of annonce</label>
            <input type="date" name="edited-date" id="edited-date" class="edited-date">
        </div>
        <hr>
        <div>
            <label for="edited-type">Type of annonce</label>
            <select name="edited-type" id="edited-type">
                <option value="Vente">Vente</option>
                <option value="Location">Location</option>
            </select>
        </div>
        <hr>
        <label for="edited-description">description</label>
        <input type="text" name="edited-description" id="edited-description" class="edited-description">
        <hr>
        <input type="hidden" name="id-to-edit" value="<?php echo $annonce['id'] ?>">
        <input type="submit" name="updateAnnonce"></input>
    </div>
</form>
<?php
    endwhile;
endif;
?>
<?php
if (isset($_POST['updateAnnonce'])) {
    echo 'Im Inside';
    $id = $_POST['id-to-edit'];
    echo "<script>alert($id)</script>";
    $title = $_POST['edited-title'];
    $price = $_POST['edited-price'];
    $date = $_POST['edited-date'];
    $type = $_POST['edited-type'];
    $description = $_POST['edited-description'];
    $adress = $_POST['edited-adress'];
    $area = $_POST['edited-area'];
    $sql = "UPDATE annonces_table SET `title`= '$title',`description`= '$description',`area`= '$area' ,`adress`= '$adress',`price`= '$price',`date`='$date',`type`= '$type' WHERE `id`=$id";
    $result = mysqli_query($conn, $sql);
    header('location: index.php');
}
?>