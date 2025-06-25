<?php
//  ====================== GET ALL ANNONCES ====================== 
require 'functions.php';
// // connect to database 
include('config/db_connect.php');
// write query for all annonces
$sql = 'SELECT * FROM annonces_table ORDER BY date';
// make query and get result 
$result = mysqli_query($conn, $sql);
// fetch the resulting rows as an array
$annonces = mysqli_fetch_all($result, MYSQLI_ASSOC);
// // free result from memory
// mysqli_free_result($result);
// // close connection
// mysqli_close($conn);
?>
<?php
if (isset($_POST['submit-filter'])):
    $minPrice = $_POST['minPrice'];
    $maxPrice = $_POST['maxPrice'];
    $type = $_POST['type'];
    $sql = "SELECT * FROM annonces_table WHERE 'price' BETWEEN  $minPrice   AND $maxPrice  AND 'type' LIKE '$type' ";
    $result = mysqli_query($conn, $sql);
    $filteredAnnonces = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo 'Heere';
    print_r($filteredAnnonces);
endif;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Agence d'annonces</title>
    <link rel="stylesheet" href="style.css" />
    <script defer src="https://kit.fontawesome.com/c1f4059a23.js" crossorigin="anonymous"></script>
    <script defer src="script.js"></script>
    <script src="https://kit.fontawesome.com/c1f4059a23.js" crossorigin="anonymous"></script>

</head>

<body>
    <header>
        <h1>Immobilien always strives to create an ideal win-win situation</h1>
    </header>
    <section class="container">
        <div id="filter-annonces">
            <select name="type" id="annonces-type">
                <option value="">All</option>
                <option value="Vente">Vente</option>
                <option value="Location">Location</option>
            </select>
            <label for="min">Min:</label>
            <input type="number" min="0" name="minPrice" id="minPrice" />
            <label for="max">Max:</label>
            <input type="number" min="1" name="maxPrice" id="maxPrice" />
            <button id="filter_btn">Filter</button>
            <input type="button" value="Add" id="add_annonce_btn" />
        </div>
        <section id="cards-section">
            <h1>All annonces</h1>
            <div class="cards">

                <?php
                foreach ($annonces as $annonce):
                ?>
                    <div class="card">

                        <img src="<?php echo "images/" . $annonce['image'] ?>" alt="house image" />

                        <div class="card-body">
                            <h4>
                                <?php echo cutStr($annonce['title'], 'title', 100) ?>
                            </h4>
                            <p>
                                <?php
                                echo cutStr($annonce['description'], 'description', 100)
                                ?>
                            </p>
                            <span>
                                <?php echo $annonce['price'] . ' MAD' ?>
                            </span>
                            <a class="more-info" onclick="getmoreInfo(<?php echo $annonce['id'] ?>)"> More info </a>
                            <div class="card-icons">
                                <i class="fa-solid fa-trash delete-annonce-icon"
                                    onclick="idOfDeletion(<?php echo $annonce['id'] ?>)"></i>
                                <i value="<?php echo $annonce['id'] ?>"
                                    class="fa-regular fa-pen-to-square edit-annonce-icon"
                                    onclick="editAnnonce(<?php echo $annonce['id'] ?>)"
                                    value="<?php echo $annonce['id'] ?>"></i>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </section>
    </section>

    <footer class="site-footer">
        <div class="part1">
            <h6>LEGACY HOMES</h6>
            <p>REAL STATE AGENCY</p>
            <hr class="hr1">
        </div>
        <hr class="hr2">
        <div class="social-icons icon">
            <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
            <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
            <a class="instagram" href="#"> <i class="fa-brands fa-instagram"></i></a>
            <a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a>
            <a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>
        </div>
        <p class="copyright-text">Copyright &copy; 2023 All Rights Reserved by </p>
    </footer>


    <!-- ====================== ANNONCE MODAL====================== -->
    <div id="add_annonce_modal" class="hidden">
        <button class="close-add-modal">&times;</button>
        <h4>Add an ad</h4>
        <form action="addAnnonce.php" method="post" enctype="multipart/form-data">
            <div id="add-image-div">
                <!--  !!!!!!!!! not finished !!!!!!!! -->
                <label for="add_image">
                </label>
                <input type="file" name="image" id="add_image" value="" accept="jpg, jpeg, png">
                <!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
            </div>
            <div id="inputs_info">
                <div>
                    <label for="add_title">Title</label>
                    <input type="text" name="title" id="add_title" />
                </div>
                <div>
                    <label for="add_price">Price</label>
                    <input type="text" name="price" id="add_price" />
                </div>
                <div>
                    <label for="add_adress">Adress</label>
                    <input type="text" name="adress" id="add_adress" />
                </div>
                <div>
                    <label for="add_area">area</label>
                    <input type="text" name="area" id="add_area" />
                </div>
                <div>
                    <label for="add_type">Type</label>
                    <select name="type" id="add_type">
                        <option value="" selected>Please choose a type</option>
                        <option value="Vente">Vente</option>
                        <option value="Location">Location</option>
                    </select>
                </div>
                <div>
                    <label for="add_date">date</label>
                    <input type="date" name="date" id="add_date" />
                </div>
                <div>
                    <label for="add_description">Description</label>
                    <input type="text" name="description" id="add_description" />
                </div>
                <input type="submit" value="Add" name="submit" />
            </div>
        </form>
    </div>
    <!-- ==================== CONFIRM ANNONCE DELETION ================== -->

    <div id="delete-confirmation" class="hidden">
        <button class="close-delete-modal">&times;</button>
        <div>
            <p>Delete Card</p>
            <p>Are you sure you wanna delete this?</p>
        </div>
        <!-- Delete Annonce form-->
        <div id="delete-confirmation-choice">
            <button id="delete-confirmation-btn">
                Delete
            </button>
            <button>Cancel</button>
        </div>
    </div>
    <!-- ====================== More infos modal ====================== -->

    <div id="more_info_modal" class="hidden">
    </div>
    <div class="overlay hidden"></div>

    <!-- ====================== Edit infos modal ====================== -->

    <div class="edit-annonce-modal hidden">
    </div>

</body>

</html>