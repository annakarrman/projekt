<?php 
$title = "Skapa ny inköpslista";
$errMsg = "";
include("includes/header.php"); 
include("includes/config.php");

// lägg till ny lista
if(isset($_POST['name'])) { // om ruta med id "name" är ifyllt
    $name = $_POST['name']; // skapa variabel innehållande värdet i rutan

    $lists = new Lists();
            $lists->addList($name);

            // omdirigerar
            header("location: mylists.php");
}
?>

<div id="maincontent">
        <h1>Skapa ny inköpslista</h1>
            <?php echo $errMsg; ?>
            
        <!--formulär för att registrera ny lista-->
        <form method = "post" id = "addListForm">
            <p>Namn: <input type = "text" name = "name" id = "name"/></p>
            <input type = "submit" value = "Lägg till" id = "addList"/>
        </form>

</div> <!--/maincontent-->

<?php include("includes/footer.php"); ?>