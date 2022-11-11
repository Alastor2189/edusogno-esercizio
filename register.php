<?php
include __DIR__ . 'user.php';
$obj = new User();
# chiamata al metodo per la verifica della sessione
if ($obj->verifySession())
{
  #redirect in caso di esito negativo
  @header("location:areaPersonal.php");
}
# chiamata al metodo per la registrazione
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  $registered = $obj->register(htmlentities($_POST['nome'], ENT_QUOTES), htmlentities($_POST['cognome'], ENT_QUOTES), htmlentities($_POST['password'], ENT_QUOTES), htmlentities($_POST['email'], ENT_QUOTES));
  # controllo sull'esito del metodo
  if ($registrato) {
    # notifica in caso di esito positivo
    echo 'Registrazione effettuata con successo <a href="login.php">ora puoi loggarti</a>.';
  }else{
    echo 'Registrazione non effettuata correttamente.';
  }
}

include __DIR__ . '/layout/header.php';
# form per l'iscrizione
?>



<main>
    <div> <h2> </h2></div>
    <div class="container-form">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="input">
                    <label for="nome">Inserisci il nome</label>
                    <input type="text" placeholder="xxxxxx" id="nome" name="nome">
                </div>
                <div class="input">
                    <label for="cognome">Inserisci il cognome</label>
                    <input type="cognome" name="cognome" id="cognome" placeholder="xxxxxx">
                </div>
                <div class="input">
                    <label for="email">Inserisci l'e-mail</label>
                    <input type="mail" placeholder="example@gmail.com" id="email" name="email">
                </div>
                <div class="input">
                    <label for="password">Inserisci la password</label>
                    <input type="password" name="password" id="password" placeholder="">
                </div>
                <div class="actions">
                    <button type="submit" name="registrati">REGISTRATI</button>
                </div>

                <label><a href="index.php" title="Login">Sei già registrato? Fai qui il Login</a></label>
            </form>
</main>

<?php
    include __DIR__ . '/layout/footer.php';
?>
