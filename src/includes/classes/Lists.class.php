<?php


    class Lists {
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



    // hämta lista
    public function getList() {
        $sql = "SELECT * FROM lists ORDER BY date DESC";
        $result = $this->db->query($sql);

        $array = array();
        while($row = $result->fetch_assoc())
        $array[] = $row;
        return $array;
    }

    // lägg till lista
    public function addList($name) {
        if(!$this->setListName($name)) { return false; }

        $sql = "INSERT INTO lists(name)VALUES('$name')";
        $result = $this->db->query($sql);

        return $result;
    }


    // radera lista
    public function deleteList($id) {
        $sql = "DELETE FROM lists WHERE ID=$id";
        return $result = $this->db->query($sql);
    }



    public function setListName($name) {
        if($name != "") {
            $this->name = $this->db->real_escape_string($name);
            return true;
        } else {
            return false;
        }
    }
}

?>