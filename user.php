<?php 
include_once __DIR__ . 'database.php';

class User {
    

    public function __construct() {
        $connectDB = new connect();
    }

    public function register($name, $surname, $password, $email) 
    {
        $name = trim($name);
        $surname = trim($surname);
        $password = trim($password);
            if (strlen($name) == 0 || strlen($surname) == 0 || strlen($password) == 0) 
                return false;
            else {
                $password = @sha1($password);
                $query = @mysql_query("SELECT id FROM utenti WHERE nome = '$name' OR email = '$email'") or die('Errore: ' . mysql_error());
                $count = @mysql_num_rows($query); 
            if ($count == 0)    {
                $result = @mysql_query("INSERT INTO utenti(nome, password, surname, email) VALUES ('$name', '$password','$surname','$email')") or die('Errore: ' .mysql_error());
                return $result;
                }else{
                    return false;
                }
                }

    }

    public function login($emailUser, $password) 
    {
    $password = @sha1($password);
    $query = @mysql_query("SELECT id FROM utenti WHERE (email = '$emailUser' OR nome='$emailUser') AND password = '$password'") or die('Errore: ' . mysql_error());
    $count = @mysql_num_rows($query);

    if ($count == 1) {

        $result = @mysql_fetch_object($query);
        $_SESSION['login'] = true;
        $_SESSION['id'] = $risultato->id;

        return true;

        }else{

        return false;
    }
    }

    public function userLogged($id) 
        {
        $query = @mysql_query("SELECT nome FROM utenti WHERE id = '$id'") or die('Errore: ' . mysql_error());
        $risultato = @mysql_fetch_object($query);
        echo $risultato->nome;
        }

    public function verifySession() 
        {
          if(isset($_SESSION['login']))
          {
            return $_SESSION['login'];

          }else{
            
            return false;
          }
        }
    public function esc()
        {
          $_SESSION['login'] = FALSE;
          @session_destroy();
          }
}



?>