<?php
include('config/db_connect.php');

$id = mysqli_real_escape_string($conn, $_GET['id']);
// make sql
$sql = "SELECT * FROM annonces_table where id = $id";
// get the query result
$result = mysqli_query($conn, $sql);
if (isset($_GET['id'])):
    while ($annonce = mysqli_fetch_array($result)):
        ?>
        <button class="close-modal">&times;</button>
        <div id="more_info_modal_img">
            <img src="<?php echo "images/" . $annonce['image'] ?>" alt="house image">
        </div>
        <section id="annonce_info">

            <h4 id="title">
                <?php echo $annonce['title'] ?>
            </h4>
            <p id="description">
                <?php echo $annonce['description'] ?>
            </p>
            <span id="price">
                <?php echo $annonce['price'] . " MAD" ?>
            </span>
            <hr class="bold">
            <div id="Specifications">
                <p>Specifications</p>
                <div>
                    <p>area</p>
                    <p>
                        <?php echo $annonce['area'] ?>
                    </p>
                </div>
                <hr>
                <div>
                    <p>adress</p>
                    <p>
                        <?php echo $annonce['adress'] ?>
                    </p>
                </div>
                <hr>
                <div>
                    <p>Date of annonce</p>
                    <p>
                        <?php echo $annonce['date'] ?>
                    </p>
                </div>
                <hr>
                <div>
                    <p>Type of annonce</p>
                    <p>
                        <?php echo $annonce['type'] ?>
                    </p>
                </div>
                <hr>
            </div>
        </section>

    <?php endwhile ?>
<?php endif ?>