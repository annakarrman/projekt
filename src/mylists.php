<?php 
    // Error messages
    error_reporting(-1); // Report errors
    ini_set("display_errors", 1); // show errors

    $title = "Mina inköpslistor";

        include("includes/header.php"); 
        include("includes/config.php");
?>

<div id="maincontent">
        <h1 class = "listHeading">Mina inköpslistor</h1>
            <div id = "outputfield">
                <p>Vill du skapa en ny lista? Klicka <a href = "newlist.php">här</a>.</p>
                <!-- ul-lista med inköpslistor-->
                <ul id = "outputList"></ul> 
            </div><!--/outputfield-->
</div>
    <!--/maincontent-->


<script src = "../pub/js/lists.min.js"></script>

<?php include("includes/footer.php"); ?>