<?php


    class Products {
        private $db;
        private $name;
        private $date;

    function __construct() {
        //connect to database

        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if($this->db->connect_errno > 0) {
            die("fel vid anslutning: " . $this->db->connect_error);
        } 
    }


    // lägg till produkt
    public function addProduct($name, $listID) {
        if(!$this->setProdName($name)) { return false; }

        $sql = "INSERT INTO products(name, listID)VALUES('$name', '$listID')";
        $result = $this->db->query($sql);

        return $result;
    }


    // ta bort produkt
    public function deleteProduct($productID) {
        $id = intval($productID);
        $sql = "DELETE FROM products WHERE productID=$productID";
        return $this->db->query($sql);
    }


    // set list name
    public function setProdName($name) {
        if($name != "") {
            $this->name = $this->db->real_escape_string($name);
            return true;
        } else {
            return false;
        }
    }

}

    ?>