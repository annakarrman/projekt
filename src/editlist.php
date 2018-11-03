<?php 
// titel på sidan
$title = "Redigera lista";
$errMsg = "";

// includes
include("includes/config.php");
include("includes/header.php");

if(isset($_GET['listID'])) {
    $listID = $_GET['listID'];
} else {
    $listID = "";
}

$lists = new Lists();
$products = new Products();

// lägg till produkt i listan
if(isset($_POST['addproduct'])) {   // om knappen med id "addproduct" trycks ned
    $name = $_POST['productname'];  // skapa variabel med värdet som finns i textrutan med id "productname"
    $listID = $_GET['listID'];      // skapa variabel med värdet som listID är satt till i URL'en


        // skapa produkt och lägg till i listan
        $products->addProduct($name, $listID);


}


// radera produkt
if(isset($_GET['deleteproduct'])) {         // om deleteproduct är satt i URL'en
    $productID = $_GET['deleteproduct'];    // skapa variabel med värdet

    // radera produkt ur lista
    $products->deleteProduct($productID);
} 


// radera lista
if(isset($_GET['deleteid'])) {  // om deleteid är satt i URL'en
    $id = $_GET['deleteid'];    // skapa variabel med värdet
    
    // radera lista ur databas
    $lists->deleteList($id);  

    // omdirigera till mylists.php där resterande listor syns
    header("Location: mylists.php");
} 




?>

<div id="maincontent">
    <!--Rubrik för listan-->
        <h1 class = "listHeading" id = "<?php echo $listID; ?>"></h1>
        
            <div id = "outputfield"> 
                <div id = "editListMain">

                <!--Formulär för att lägga till produkter i lista samt ta bort en hel lista-->
                    <form method = "post" action = "">
                        <input type = "text" id = "productname" name = "productname"/>
                        <input type = "submit" id = "addproduct" name = "addproduct" value = "Lägg till produkt" />
                        <a href = "editlist.php?deleteid=<?php echo $listID; ?>" class = "deleteList" id = "deleteProd" title = "Radera lista"><img src = "images/trash_icon_big.png" />Radera lista</a>
                    </form>
                
                    
                    <div id = "editList">
                        <?php echo $errMsg; ?>
                        <p>Produkter i din lista:</p>
                    </div><!--/editList-->

                    <div id = "outputProducts">
                        <ul id = "outputProd"></ol>
                    </div><!--/outputProducts-->

                </div><!--/editListMain-->
            </div><!--/outputfield-->
</div>
    <!--/maincontent-->


<!--JS FOR WIDGET-->


<script src = "../pub/js/products.min.js"></script>

<?php include("includes/footer.php"); ?>