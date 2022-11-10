<?php 

$host = "127.0.0.1";
$user = "root";
$password = "root";
$db = "edusogno_db";

class connect {
    function __construct() {
      # connessione al DBMS
      $connectDB = mysqli_connect($host, $user, $password, $db);

        if($connectDB === false) {
            die("Errore durante la connessione:" . $connectDB->connect_error);
        }
    }
  }



?>