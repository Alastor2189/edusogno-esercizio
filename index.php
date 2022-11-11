<?php
session_start();
# inclusione del file di funzione
include __DIR__ .'user.php';
# istanza della classe
$obj = new  User();
# chiamata al metodo per la verifica della sessione
if ($obj->verifySession())
{
  # redirect in caso di esito positivo
  @header("location:areaPersonal.php");
}
# chiamata al metodo per l'autenticazione
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
  $login = $obj->login(htmlentities($_POST['email'], ENT_QUOTES), htmlentities($_POST['password'], ENT_QUOTES));
  # controllo sull'esito del metodo
  if ($login) {
    # redirect in caso di esito positivo
    @header("location:area_riservata.php");
  }else{
    echo 'I dati indicati non sono corretti.';
  }
}

include __DIR__ . '/layout/header.php';
?>


    <main>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="form_login" name="login">
        <div class="head"><h1>Per poter accedere devi autenticarti</h1></div>
            <div class="input">
                <label>Inserisci l'email</label>
                <input type="text" name="email"/>
            </div>
            <div class="input">
                <label>Inserisci la password</label>
                <input type="password" name="password" id="password" />
            </div>
            <div class="actions">
                <input type="submit" name="submit" value="Invia"/>
            </div>
            
            <label><a href="register.php" title="Registrazione">Registrati qui</a></label>
        </form>
    </main>

<?php
    include __DIR__ . '/layout/footer.php';
?>