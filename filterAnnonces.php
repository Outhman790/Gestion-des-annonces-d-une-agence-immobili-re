<?php
include("functions.php");
include('config/db_connect.php');

$conditions = array();
if (isset($_GET['min']) && $_GET['min'] !== '') {
    $minPrice = mysqli_real_escape_string($conn, $_GET['min']);
    $conditions[] = "price >= $minPrice";
}
if (isset($_GET['max']) && $_GET['max'] !== '') {
    $maxPrice = mysqli_real_escape_string($conn, $_GET['max']);
    $conditions[] = "price <= $maxPrice";
}
if (isset($_GET['type']) && $_GET['type'] !== '') {
    $type = mysqli_real_escape_string($conn, $_GET['type']);
    $conditions[] = "type = '$type'";
}

$sql = "SELECT id, title, SUBSTRING(description, 1, 100) AS shortDescription, price, image, type FROM annonces_table";
if (!empty($conditions)) {
    $sql .= ' WHERE ' . implode(' AND ', $conditions);
}
$result = mysqli_query($conn, $sql);
$filteredAnnonces = mysqli_fetch_all($result, MYSQLI_ASSOC);
foreach ($filteredAnnonces as $filteredAnnonce):
?>
    <div class="card">

        <img src="<?php echo "images/" . $filteredAnnonce['image'] ?>" alt="house image" />

        <div class="card-body">
            <h4>
                <?php $filteredAnnonce['title'] ?>
            </h4>
            <p>
                <?php
                echo $filteredAnnonce['shortDescription'] . '...'
                ?>
            </p>
            <span>
                <?php echo $filteredAnnonce['price'] . ' MAD' ?>
            </span>
            <a class="more-info" onclick="getmoreInfo(<?php echo $filteredAnnonce['id'] ?>)"> More info </a>
            <div class="card-icons">
                <i class="fa-solid fa-trash delete-annonce-icon"></i>
                <i value="<?php echo $filteredAnnonce['id'] ?>" class="fa-regular fa-pen-to-square edit-annonce-icon"
                    onclick="editAnnonce(<?php echo $filteredAnnonce['id'] ?>)"></i>
            </div>
        </div>
    </div>
<?php
endforeach;
?>